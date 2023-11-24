<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'number',
        'cnic',
        'address',
        'email',
    ];
    public function Purchase()
    {
        return $this->hasMany(Purchase::class);
    }
}
