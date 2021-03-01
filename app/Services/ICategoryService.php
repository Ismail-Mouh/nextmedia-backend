<?php

namespace App\Services;

interface ICategoryService
{
    public function create($category);

    public function deleteByName(string $name);

    public function all();
}
