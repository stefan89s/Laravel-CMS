<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //posts belongs to user
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    //coments belongs to the post
    public function comments() {
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }
}
