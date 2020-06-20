<?php

namespace App;
use App\Bill;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['product_id' , 'bill_id' , 'product_count' , 'price'];
    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

}
