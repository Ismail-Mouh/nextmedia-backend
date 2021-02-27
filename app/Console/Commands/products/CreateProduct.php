<?php

namespace App\Console\Commands\products;

use App\Console\Commands\CustomCommand;
use App\Services\ProductService;

class CreateProduct extends CustomCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Product creation command';

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
        $product['name'] = $this->recursiveAsk("Product Name ?");
        $product['description'] = $this->ask("Product Description ?");
        $product['price'] = $this->recursiveAsk("Product Price ?");

        try {
            $this->productService->create($product);
            $this->info("Product created successfully");
        } catch (\Exception $e) {
            $this->error("Product creation failed");
        }
    }
}
