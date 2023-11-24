<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comsumption_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'purchase_id',
        'serial_number',
        'type',
        'date',
        'remarks',
    ];

    public function product_type()
    {
        return $this->belongsTo(Product_type::class, 'product_id', 'id');
    }

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }
}
