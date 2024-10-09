<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    protected $table = 'diseases';

    protected $fillable = [
        'name',
        'description',
        'image',
        'status'
    ];

    public function category(){
        $this->belongsTo(Category::class);
    }

    public function comments(){
        $this->hasMany(Comment::class);
    }
}
