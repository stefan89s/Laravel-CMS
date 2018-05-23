<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTag extends Model
{
    public function news() {
    	return $this->belongsToMany('App\News');
    }
}
