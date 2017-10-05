<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    public function thread()
    {
        return $this->belongsTo(App\Thread::class);
    }

    public function user()
    {
        return $this->belongsTo(App\User::class);
    }
}
