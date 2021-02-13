<?php

namespace App\Console\Commands\categories;

use App\Console\Commands\CustomCommand;
use App\Http\Services\CategoryService;

class DeleteCategory extends CustomCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:delete';

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
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
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
        $name = $this->recursiveAsk("Name of the category ?");
        try {
            $count = $this->categoryService->deleteByName($name);
            $this->info($count . ' Categor(y)(ies) deleted');
        } catch (\Exception $e) {
            $this->error("Category deletion failed");
        }
    }
}