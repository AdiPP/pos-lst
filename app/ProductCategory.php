<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public function produk()
    {
        return $this->hasMany('App\Product', 'category_id');
    }
}
