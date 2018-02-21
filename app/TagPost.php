<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagPost extends Model
{
    protected $table = 'tag_posts';
    protected $fillable = ['post_id', 'tag_id'];
}
