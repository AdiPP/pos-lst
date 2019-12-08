<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StockEntry as StokMasuk;
use App\Product as Produk;
use App\Sale;
use App\Outlet;

class InventoriController extends Controller
{
    public function __construct()
    {
        \App\Helpers\AppHelper::userCheck();   
        // Config::set('global.active_nav', 'produk');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Kartu Stok';

        // $produk = Produk::withCount('stokmasuks')->get();

        $produk = Produk::where('user_id', '=', session('user')->id)->get();

        $outlet = Outlet::all();

        // $produk = Produk::with(['sales' => function($q){
        //     $q->where('sales.outlet_id', '=', 3);
        // }])->where('user_id', '=', session('user')->id)->get();

        // $model = Sale::where('outlet_id', 2)->get();

        // $model = Produk::with(['sales' => function($q){
        //     $q->with(['infos' => function($q){
        //         $q->where('product_id', 12);
        //     }])->where('outlet_id', 2);
        // }])->where('user_id', session('user')->id)->get();
        
        // $sale = Sale::with(['infos' => function($q) use ($produk){
        //     $q->where('product_id', $produk[0]->id);
        // }])->where('outlet_id', 2)->get()
        // ->reduce(function($carry, $item){
        //     return $carry + ($item->infos->reduce(function($carry, $item){
        //         return $carry + ($item->jumlah);
        //     }));
        // });

        // dd($sale);

        // dd($produk[0]->sales->reduce(function($carry, $item){
        //     return $carry + 1;
        // }));

        // dd($i);

        // dd($produk[0]->sales[1]->infos);

        // $model = Produk::with(['sales' => function($q){
        //     $q->where('outlet_id', 2);
        // }])->where('user_id', session('user')->id)->get();

        // dd($model[0]);

        // dd($model[0]->sales->reduce(function($carry, $item){
        //     return $carry + $item->infos->reduce(function($carry, $item){
        //         return $carry + $item->jumlah;
        //     });
        // }));

        // dd($produk[0]
        //     ->sales
        //     ->where('outlet_id', 2)
        //     ->reduce(function ($carry, $item){
        //         return $carry + ($item->infos->reduce(function ($carry, $item){
        //             return $carry + $item->jumlah;
        //         }));
        //     })
        // );

        // dd($produk[0]
        //     ->sales
        //     ->where('outlet_id', 2)
        //     ->reduce(function($carry, $item) {
        //         return $carry + $item->infos->reduce(function($carry2, $item2){
        //             return $carry2 + $item2->jumlah;
        //         });
        //     }));

        // $models = $produk[0]->sales->where('outlet_id', 2);
        
        // foreach ($models as $model) {
            
        // }
        // dd($produk[0]
        // ->sales
        // ->where('outlet_id', 2)
        // );

        // $produk = Produk::with(['sales' => function($query){
        //     $query->where('sales.outlet_id', 3);
        // }])->where('user_id', '=', session('user')->id)->get();

        // $produk = Produk::whereHas('sales', function ($query) {
        //     $query->where('outlet_id', 2);
        // })->where('user_id', '=', session('user')->id)->get();

        // dd($produk[0]->saleInfos->reduce(function($carry, $item) {
        //     return $carry + $item->jumlah;
        // }));

        // dd($produk[0]->stokkeluars->reduce(function($carry, $item){
        //     return $carry + $item->infos[0]->jumlah;
        // }));

        // dd($produk[0]->stokmasuks[0]->infos);

        // dd($produk[0]->stokmasuks->reduce(function($carry, $item){
        //     return $carry + $item->infos[0]->jumlah;
        // }));

        // dd($produk[0]->stokmasuks_count);

        // dd($produk[0]->stokmasuks[0]->pivot->jumlah);

        // dd($produk->reduce(function($carry, $item){
        //     return $carry + $item->stokmasuks[]->pivot->jumlah;
        // }));

        return view('inventori.index', ['title' => $title, 'produks' => $produk, 'outlets' => $outlet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function tampilKartuStok()
    {
        if ($_GET['outlet'] != 0) {
            $outlet = $_GET['outlet'];
        } else {
            $outlet = 0;
        }

        $produk = Produk::where('user_id', '=', session('user')->id)->get();

        return view('inventori.tampilKartuStok', ['produks' => $produk, 'outlet' => $outlet]);
    }
}
