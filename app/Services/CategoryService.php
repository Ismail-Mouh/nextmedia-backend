<?php

namespace App\Services;

use App\Repositories\ICategoryRepository;
use App\Services\ICategoryService;

class CategoryService implements ICategoryService
{
    private $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function create($category)
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
