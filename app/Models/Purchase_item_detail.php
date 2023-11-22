<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_item_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'purchase_id',
        'project_id',
        'serial_number',
        'location',
        'remarks',
    ];
}
