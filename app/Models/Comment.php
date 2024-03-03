<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['blog_id', 'content', 'status', 'name']; // เพิ่ม 'name' ใน $fillable

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
