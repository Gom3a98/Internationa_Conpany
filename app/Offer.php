<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OfferProduct;
class Offer extends Model
{
	protected $fillable = ['desc','price','duration'];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function offerProducts()
    {
        return $this->hasMany(OfferProduct::class);
    }
}
