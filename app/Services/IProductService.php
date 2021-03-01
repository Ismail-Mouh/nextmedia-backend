<?php

namespace App\Services;

interface IProductService
{
    public function create($product);

    public function deleteByName(string $name);

    public function all();
}
