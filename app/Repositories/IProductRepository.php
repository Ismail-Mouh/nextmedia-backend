<?php

namespace App\Repositories;

interface IProductRepository
{
    public function create($product);

    public function deleteByName(string $name);

    public function all();
}
