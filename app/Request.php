<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
	// protected $table = 'requests';
    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
