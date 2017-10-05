<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function path()
    {
        return route('threads.show', $this->id);
    }

    public function user()
    {
        return $this->belongsTo(App\User::class);
    }

    public function replies()
    {
        return $this->hasMany(App\Reply::class);
    }
}
