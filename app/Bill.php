<?php

namespace App;
use App\Sale;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['customer_name' , 'phone_number' , 'total_price' , 'discount'];
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
