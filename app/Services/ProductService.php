<?php

namespace App\Services;

use App\Helpers\ImageHelper;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create(Product $product)
    {
        $product['image'] = ImageHelper::imageDecode($product['image'], 'products');
        $this->productRepository->create($product);
    }

    public function deleteByName(string $name)
    {
        return $this->productRepository->deleteByName($name);
    }

    public function all()
    {
        return $this->productRepository->all();
    }
}
