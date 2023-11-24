<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'part_number',
        'name',
        'photo',
        'supplier_id',
    ];

    public function Purchase_item_detail()
    {
        return $this->hasMany(Purchase_item_detail::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
