<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    public function category()
    {
        return $this->belongsTo('App\ProductCategory');
    }
    public function unit()
    {
        return $this->belongsTo('App\Unit');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function keranjang()
    {
        return $this->hasOne('App\Cart');
    }

    public function stokmasuks()
    {
        return $this->belongsToMany('App\StockEntry', 'stock_entry_infos')->withPivot('jumlah');;
    }

    public function stokkeluars()
    {
        return $this->belongsToMany('App\StockOut', 'stock_out_infos')->withPivot('jumlah');;
    }

    public function sales()
    {
        return $this->belongsToMany('App\Sale', 'sale_infos');
    }

    public function saleInfos()
    {
        return $this->hasMany('App\SaleInfo', 'product_id');
    }
}
