<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['name', 'uuid'];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
