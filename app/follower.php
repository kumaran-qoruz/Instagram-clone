<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class follower extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

}
