<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'uuid',
        'title',
        'slug',
        'content',
        'photo',
        'published_at'
    ];

    public function scopeOfUuid($query, $uuid)
    {
        return $query->where('uuid', $uuid);
    }
}
