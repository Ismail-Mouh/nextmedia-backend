<?php

namespace App\Http\Services;


use App\Http\Repositories\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create($product)
    {
        $this->productRepository->create($product);
    }
}
