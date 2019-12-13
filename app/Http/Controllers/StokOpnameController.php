<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\StockOpnameTemp;
use App\Outlet;
use App\StockOpname;
use App\StockOpnameInfo;

class StokOpnameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stokopname = StockOpname::where('user_id', session('user')->id)->get();

        return view('inventori.stokopname.index', ['title' => 'Stok Opname', 'stokopnames' => $stokopname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Product::where('user_id', session('user')->id)->get();
        $outlet = Outlet::where('user_id', session('user')->id)->get();

        return view('inventori.stokopname.tambah', ['title' => 'Tambah Stok Opname', 'produks' => $produk, 'outlets' => $outlet]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        date_default_timezone_set("Asia/Bangkok");

        $model = new StockOpname();
        $model->outlet_id = session('idOutlet');
        $model->user_id = session('user')->id;
        $model->tanggal = date('Y-m-d');
        $model->catatan = $request->catatan;
        if ($model->save()) {
            
            session()->forget('idOutlet');

            $temps = StockOpnameTemp::where('user_id', session('user')->id)->get();

            foreach ($temps as $temp) {
                $modelInfo = new StockOpnameInfo();
                $modelInfo->product_id = $temp->product_id;
                $modelInfo->selisih = $temp->selisih;
                $modelInfo->stok_opname_id = $model->id;
                $modelInfo->save();
                StockOpnameTemp::find($temp->id)->delete();
            }

        }

        return redirect('/inventori/stokopname');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function infoProduk()
    {
        $idProduk = $_GET['idProduk'];

        $produk = Product::find($idProduk);

        $stokmasuk = $produk
                    ->stokmasuks
                    ->where('outlet_id', 2)
                    ->reduce(function($carry, $item){
                        return $carry + $item->infos[0]->jumlah;
                    });

        if (is_null($stokmasuk)) {
            $stokmasuk = 0;
        }

        $stokkeluar = $produk
                    ->stokkeluars
                    ->where('outlet_id', 2)
                    ->reduce(function($carry, $item){
                        return $carry + $item->infos[0]->jumlah;
                    });

        if (is_null($stokkeluar)) {
            $stokkeluar = 0;
        }

        $i = 0;

        foreach ($produk->sales as $sale) {
            if ($sale->outlet_id == 2) {
                foreach ($sale->infos as $info) {
                    if ($info->product_id == $produk->id) {
                        $i = $i + $info->jumlah;
                    }
                }
            }
        }

        $penjualan = $i;

        if (is_null($penjualan)) {
            $penjualan = 0;
        }

        $stokakhir = $stokmasuk - $stokkeluar - $penjualan;

        return view('inventori.stokopname.infoproduk', ['produk' => $produk, 'stokakhir' => $stokakhir]);
    }

    public function tambahProduk(Request $request)
    {
        $idProduk = $request->idProduk;

        if ($model = StockOpnameTemp::where('product_id', $idProduk)->where('user_id', 25)->first()) {
            return 'Data sudah pernah dimasukan';
        } else {
            $model = new StockOpnameTemp();
            $model->product_id = $request->idProduk;
            $model->user_id = session('user')->id;
            $model->selisih = $request->stokAkhir - $request->jumlahProduk;
            if ($model->save()) {
                return 'Data berhasil disimpan';   
            }
        }
    }

    public function tampilTemp()
    {
        $temp = StockOpnameTemp::where('user_id', session('user')->id)->get();

        return view('inventori.stokopname.tampiltemp', ['temps' => $temp]);
    }

    public function hapusTemp()
    {
        $id = $_GET['id'];

        $temp = StockOpnameTemp::find($id);
        if ($temp->delete()) {
            return 'Berhasil dihapus';
        } else return 'Tidak berhasil';
    }

    public function setOutlet()
    {
        $idOutlet = $_GET['idOutlet'];

        session(['idOutlet' => $idOutlet]);

        return session('idOutlet');
    }
}
