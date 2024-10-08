<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function disease(){
        return $this->belongsTo(Disease::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
