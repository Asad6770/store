<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_consumption extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'remarks',
    ];
}
