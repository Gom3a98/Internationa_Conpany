<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
	protected $guarded = ['desc','price','duration'];
    public function products()
    {

        return $this->belongsToMany('App\Product');
    }
}
