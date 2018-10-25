<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'description', 'category_id', 'author_id'];

    public function author() {
        return $this->belongsTo('App\User','author_id','id');
    }

    public function category() {
        return $this->belongsTo('App\Category','category_id','id');
    }
}
