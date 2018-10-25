<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'description', 'parent_id'];

    public function childs() {
        return $this->hasMany('App\Category','parent_id','id');
    }

    public function posts() {
        return $this->hasMany('App\Post', 'category_id', 'id');
    }

}
