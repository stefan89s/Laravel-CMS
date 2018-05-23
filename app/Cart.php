<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //Products in the cart
    public function products() {
        return $this->hasMany('App\Product');
    }
}
