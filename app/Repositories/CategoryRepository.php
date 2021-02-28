<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function create($category)
    {
        $newCategory = new Category();
        $newCategory->name = $category['name'];
        $newCategory->save();
    }

    public function deleteByName(string $name)
    {
        return Category::whereName($name)->delete();
    }

    public function all()
    {
        return Category::get([
            'id',
            'name',
        ]);
    }
}
