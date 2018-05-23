<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function newsCategory() {
        return $this->belongsTo('App\NewsCategory');
    }

    public function newsTags() {
    	return $this->belongsToMany('App\NewsTag');
    }
}
