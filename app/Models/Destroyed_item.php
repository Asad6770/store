<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destroyed_item extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_item_detail_id',
        'product_id',
        'remarks',
    ];
}
