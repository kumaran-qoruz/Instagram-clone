<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = [
        'post_caption', 'post_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function like()
    {
       return $this->hasMany(Like::class);
    }

    public function likeduser()
    {
        return $this->belongsToMany(User::class);
    }

    public function followers()
    {
        $this->hasMany(UserFollower::class);
    }

    public function follows()
    {
        $this->hasMany(UserFollowing::class);
    }

}
