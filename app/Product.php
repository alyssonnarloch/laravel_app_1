<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function orders() {
    	return $this->belongsToMany('App\Order');
    }

    public function getCreatedAtAttribute($value) {
    	return Carbon::parse($value)->format('d/m/Y h:i:s');
    }

    public function getUpdatedAtAttribute($value) {
    	return Carbon::parse($value)->format('d/m/Y h:i:s');
    }

    public function getPriceAttribute($value) {
    	return number_format($value, 2, ',', '.');
    }
}
