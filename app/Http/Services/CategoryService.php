<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function create($category)
    {
        $this->categoryRepository->create($category);
    }

    public function deleteByName($name)
    {
        return $this->categoryRepository->deleteByName($name);
    }

    public function all()
    {
        return $this->categoryRepository->all();
    }
}
