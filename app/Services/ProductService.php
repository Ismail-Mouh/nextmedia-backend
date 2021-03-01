<?php

namespace App\Services;

use App\Helpers\ImageHelper;
use App\Repositories\IProductRepository;
use App\Services\IProductService;

class ProductService implements IProductService
{
    private $productRepository;

    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create($product)
    {
        if (isset($product['image']))
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
