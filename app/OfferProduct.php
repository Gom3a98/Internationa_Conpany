<?php

namespace App;
use App\Offer;
use Illuminate\Database\Eloquent\Model;

class OfferProduct extends Model
{
    protected $fillable = ['offer_id','product_id','productPrice' , 'productCount' ];
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

}
