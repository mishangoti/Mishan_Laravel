<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category()
    {
        return $this->hasMany('App\Category', 'id', 'category_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
    
    public function user1()
    {
        return $this->hasMany('App\User', 'user_id', 'id');
    }
}
