<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface RepositoryInterface
{

    public function store(array $data);

}