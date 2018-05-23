<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Products belongs to the cart
    public function cart() {
        return $this->belongsTo('App\Cart');
    }

    //Products belong to category
    public function product_category() {
        return $this->belongsTo('App\ProductCategory');
    }
}
