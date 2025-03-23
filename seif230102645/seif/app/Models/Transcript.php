<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transcript extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course', 'grade'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

