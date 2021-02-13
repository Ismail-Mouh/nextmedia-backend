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

        $categories = $product['categories'] ?? [];
        $newProduct->categories()->attach($categories);
    }

    public function deleteByName($name)
    {
        return Product::whereName($name)->delete();
    }

    public function all()
    {
        return Product::latest()->get([
            'id',
            'name',
            'description',
            'price',
            'image',
        ]);
    }
}
