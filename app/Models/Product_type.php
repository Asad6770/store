<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_type extends Model
{
    use HasFactory;


    public function Purchase_item_detail()
    {
        return $this->hasMany(Purchase_item_detail::class);
    }

    public function comsumption_detail()
    {
        return $this->hasMany(Comsumption_detail::class);
    }
}
