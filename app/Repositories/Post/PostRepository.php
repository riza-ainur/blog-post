<?php

namespace App\Repositories\Post;

use App\Post;
use App\Repositories\RepositoryInterface;

class PostRepository implements RepositoryInterface
{
    public function store(array $data)
    {
        return Post::create($data);
    }

    public function showAll()
    {
        return Post::all();
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function showByUuid($uuid)
    {
        return Post::OfUuid($uuid)->first();
    }

    public function showBySlug($slug)
    {
        return Post::where('slug', $slug)->first();
    }
}