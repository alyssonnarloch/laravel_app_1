<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function getCreatedAtAttribute($value) {
    	return Carbon::parse($value)->format('d/m/Y h:i:s');
    }
}
