<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function create(Category $category)
    {
        $this->categoryRepository->create($category);
    }

    public function deleteByName(string $name)
    {
        return $this->categoryRepository->deleteByName($name);
    }

    public function all()
    {
        return $this->categoryRepository->all();
    }
}
