<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productimage extends Model
{
    protected $table = 'productimages';
    protected $fillable = array('product_id', 'path');
}
