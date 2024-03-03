<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'status'
    ];
    public function likesCount()
    {
        return $this->hasMany(Like::class)->count();
    }

    public function unlikesCount()
    {
        return $this->hasMany(Unlike::class)->count();
    }
};
