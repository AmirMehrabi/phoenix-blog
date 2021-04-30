<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $appends = array('url');
    use HasFactory;

    public function author()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function getUrlAttribute()
    {
        return route('api.v1.posts.show', $this->id);
    }
}
