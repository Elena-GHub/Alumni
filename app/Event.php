<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'user_id', 'group', 'language', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
