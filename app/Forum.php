<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $table = 'fora';
    
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function threads()
    {
        return $this->hasMany('App\Thread', 'forum_id');
    }
}