<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_comment','post_id','user_id',
    ];



    public function user()
    {
        return $this->belongsTo(User::class ,'user_id');
    }

    public function posts()
    {
        return $this->belongsTo(Post::class);
    }
}
