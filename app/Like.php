<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Like extends Model
{
    public function user()
    {
        return $this->HasMany(User::class);

    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
