<?php

namespace App\Console\Commands\products;

use App\Console\Commands\CustomCommand;
use App\Services\ProductService;

class DeleteProduct extends CustomCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Product deletion command';

    private $productService;

    /**
     * Create a new command instance.
     *
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        parent::__construct();
        $this->productService = $productService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->recursiveAsk("Name of the product ?");
        try {
            $count = $this->productService->deleteByName($name);
            $this->info($count . ' Product(s) deleted');
        } catch (\Exception $e) {
            $this->error("Product deletion failed");
        }
    }
}
