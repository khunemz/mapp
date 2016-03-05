<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $fillable = ['image', 'product_id'];
    function product(){
        return $this->belongsTo('App\Product');
    }
}
