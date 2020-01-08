<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outlet;
use App\Supplier;
use App\Product;
use App\PurchaseOrder;
use App\PurchaseOrderInfo;
use App\StockEntry;
use App\StockEntryInfo;
use Helper;

class PurchaseOrderController extends Controller
{
    private $outlet;
    private $supplier;
    private $produk;
    private $purchaseOrder;
    private $purchaseOrderInfo;

    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();   
        \Config::set('global.active_nav', 'inventori');

        $this->outlet = Outlet::where('user_id', session('user')->id)->get();
        $this->supplier = Supplier::where('user_id', session('user')->id)->get();
        $this->produk = Product::where('user_id', session('user')->id)->get();
        $this->purchaseOrder = PurchaseOrder::where('user_id', session('user')->id)->get();
        $this->purchaseOrderInfo = PurchaseOrderInfo::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('inventori.purchaseorder.index', [
            'title' => 'Purchase Order',
            'purchaseOrders' => $this->purchaseOrder,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventori.purchaseorder.tambah', [
            'title' => 'Purchase Order',
            'outlets' => $this->outlet,
            'suppliers' => $this->supplier,
            'produks' => $this->produk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Simpan
        $model = new PurchaseOrder();
        $model->nomor = $request->nomorPo;
        $model->outlet_id = $request->outlet;
        $model->supplier_id = $request->supplier;
        $model->tanggal = Helper::tanggalToMysql($request->tanggal);
        $model->catatan = $request->catatan;
        $model->user_id = session('user')->id;
        $model->status = "Dipesan";
        $model->save();

        // Deklarasi panjang produk.
        $produkLength = count($request->produk);

        // Simpan informasi
        for ($i=0; $i < $produkLength; $i++) { 
            $model_info = new PurchaseOrderInfo();
            $model_info->purchase_order_id = $model->id;
            $model_info->product_id = $request->produk[$i];
            $model_info->jumlah = $request->jumlah[$i];
            $model_info->harga_beli_per_unit = $request->hargaBeli[$i];
            $model_info->total_harga_beli = $request->total[$i];
            $model_info->save();
        }

        return redirect('/purchaseorder');
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

    public function tambahProduk()
    {
        return view('inventori.purchaseorder.tambah_produk', [
            'produks' => $this->produk,
        ]);
    }

    public function penerimaanPo($id)
    {
        return view('inventori.purchaseorder.penerimaan', [
            'po' => $this->purchaseOrder->find($id),
        ]);
    }

    public function penerimaanPoProses(Request $request)
    {
        $po = $this->purchaseOrder->find($request->idPo);
        $po->status = "Diterima";
        $po->save();

        $produkLength = count($request->produk);

        for ($i=0; $i < $produkLength; $i++) { 
            $poInfo = $po->infos->where('product_id', $request->idProduk[$i])->first();
            $poInfo->jumlah_diterima = $request->jumlahDiterima[$i];
            $poInfo->total_harga_beli = $poInfo->harga_beli_per_unit * $poInfo->jumlah_diterima;
            $poInfo->save();
        }

        // Simpan stok masuk.
        $stokMasuk = new StockEntry();
        $stokMasuk->outlet_id = $po->outlet_id;
        $stokMasuk->description = $po->catatan;
        $stokMasuk->user_id = $po->user_id;
        $stokMasuk->tanggal = $po->tanggal;
        $stokMasuk->save();

        // Deklarasi panjang produk.
        $produkLength = count($po->infos);

        // Simpan informasi stok masuk.
        for ($i=0; $i < $produkLength; $i++) { 
            $stokMasukInfo = new StockEntryInfo();
            $stokMasukInfo->stock_entry_id = $stokMasuk->id;
            $stokMasukInfo->jumlah = $po->infos[$i]->jumlah_diterima;
            $stokMasukInfo->harga_beli_per_unit = $po->infos[$i]->harga_beli_per_unit;
            $stokMasukInfo->total_harga_beli = $po->infos[$i]->total_harga_beli;
            $stokMasukInfo->product_id = $po->infos[$i]->product_id;
            $stokMasukInfo->save();
        }

        return redirect('/purchaseorder');
    }

    public function pembatalanPo($id)
    {
        $po = $this->purchaseOrder->find($id);
        $po->status = "Dibatalkan";
        $po->save();

        return redirect('/purchaseorder');
    }
}
