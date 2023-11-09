<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comsumption_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'serial_number',
        'type',
        'date',
        'remarks',
    ];
}
