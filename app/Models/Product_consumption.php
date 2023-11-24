<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_consumption extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'remarks',
        
    ];

    // protected function User(){
    //     return $this->belongsTo(User::class,'user_id','id');
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function created_by()
    {
        return $this->belongsTo(User::class, 'create_by', 'id');
    }
    
}
