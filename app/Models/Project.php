<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
    ];

    public function Purchase_item_detail()
    {
        return $this->hasMany(Purchase_item_detail::class);
    }

    public function project_category()
    {
        return $this->belongsTo(Project_category::class, 'category_id', 'id');
    }
}
