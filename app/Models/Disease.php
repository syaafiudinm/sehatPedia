<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $table = [
        'name',
        'description',
        'image'
    ];

    public function category(){
        $this->belongsTo(Category::class);
    }

    public function comments(){
        $this->hasMany(Comment::class);
    }
}
