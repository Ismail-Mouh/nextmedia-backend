<?php

namespace App\Http\Repositories;


use App\Models\Category;

class CategoryRepository
{
    public function create($category)
    {
        $newCategory = new Category();
        $newCategory->name = $category['name'];
        $newCategory->save();
    }

    public function deleteByName($name)
    {
        return Category::whereName($name)->delete();
    }
}
