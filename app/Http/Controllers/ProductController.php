<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Services\IProductService;

class ProductController extends Controller
{
    private $productService;

    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->productService->all();
    }

    public function store(StoreProductRequest $request)
    {
        $this->productService->create($request);
    }
}
