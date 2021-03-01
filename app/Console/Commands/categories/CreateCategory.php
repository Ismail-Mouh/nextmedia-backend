<?php

namespace App\Console\Commands\categories;

use App\Console\Commands\CustomCommand;
use App\Services\ICategoryService;

class CreateCategory extends CustomCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private $categoryService;

    /**
     * Create a new command instance.
     *
     * @param ICategoryService $categoryService
     */
    public function __construct(ICategoryService $categoryService)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $category['name'] = $this->recursiveAsk("Category Name ?");

        try {
            $this->categoryService->create($category);
            $this->info("Category created successfully");
        } catch (\Exception $e) {
            $this->error("Category creation failed");
        }
    }
}
