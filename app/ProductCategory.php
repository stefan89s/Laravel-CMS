<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //Has many products
    public function products() {
        return $this->hasMany('App\Product');
    }
}
