<?php

namespace App\Repositories\Tag;

use App\Tag;
use App\Repositories\RepositoryInterface;

class TagRepository implements RepositoryInterface
{
    public function store(array $data)
    {
        return Tag::create($data);
    }

    public function showAll()
    {
        return Tag::all();
    }

    public function show($id)
    {
        return Tag::find($id);
    }

    public function showByUuid($uuid)
    {
        return Tag::OfUuid($uuid)->first();
    }
}