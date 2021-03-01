<?php

namespace App\Http\Controllers;

use App\Services\ICategoryService;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return $this->categoryService->all();
    }
}
