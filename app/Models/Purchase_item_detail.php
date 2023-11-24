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

    public function purchase()
    {
        return $this->belongsTo(Purchase::class, 'purchase_id', 'id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
    public function product_type()
    {
        return $this->belongsTo(Product_type::class, 'product_id', 'id');
    }
}
