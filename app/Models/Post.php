<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // Define the table associated with the model
    protected $table = 'posts';

    // Define the fillable attributes for mass assignment
    protected $fillable = ['user_id', 'content', 'image','video', 'media'];

    // Define relationships with other models
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likedPosts()
    {
        return $this->hasMany(Like::class)->where('like', true);
    }
}
