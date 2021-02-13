<?php

namespace App\Http\Repositories;


use App\Models\Product;

class ProductRepository
{

    public function create($product)
    {
        $newProduct = new Product();
        $newProduct->name = $product['name'];
        $newProduct->description = $product['description'];
        $newProduct->price = $product['price'];
        $newProduct->save();
    }
}
