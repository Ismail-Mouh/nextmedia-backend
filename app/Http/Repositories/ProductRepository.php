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
        $newProduct->image = $product['image'] ?? null;
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
        return Product::latest()->with('categories')->get([
            'id',
            'name',
            'description',
            'price',
            'image',
        ]);
    }
}
