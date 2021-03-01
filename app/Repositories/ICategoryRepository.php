<?php

namespace App\Repositories;

interface ICategoryRepository
{
    public function create($category);

    public function deleteByName(string $name);
    
    public function all();
}
