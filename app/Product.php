<?php

namespace App;
use App\Category;
use App\ProductImage;
use App\Offer;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function offers()
    {
        return $this->belongsTo(Offer::class);
    }

}
