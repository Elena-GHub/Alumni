<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $table = 'forum_categories';
    
    public function fora()
    {
        return $this->hasMany('App\Forum', 'forum_category_id');
    }
}