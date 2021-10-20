<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes ;

    protected $guarded = [];

    protected $casts = [
        'rating'    => 'integer'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeActive(){
        return $this->where('is_active', 1);
    }
}
