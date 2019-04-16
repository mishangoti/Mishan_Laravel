<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posttype extends Model
{

    protected $table = 'posttypes';

    public function post()
    {
        return $this->belongsTo('App\Post');
    }   

}
