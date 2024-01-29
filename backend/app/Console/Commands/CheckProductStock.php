<?php

namespace App\Console\Commands;

use App\Jobs\CheckProductStockJob;
use App\Services\Base\ProductService;
use App\Services\Database\DatabaseConnectionService;
use App\Services\Mail\MailService;
use Illuminate\Console\Command;

class CheckProductStock extends Command
{
    protected $signature = 'product:check-stock';

    protected $description = 'Check product stock and send warnings via email';

    private ProductService $productService;

    private MailService $mailService;

    public function __construct(ProductService $productService, MailService $mailService)
    {
        parent::__construct();

        $this->productService = $productService;
        $this->mailService = $mailService;
    }

    public function handle()
    {
        $this->checkDatabase();

        $products = $this->productService->get();

        foreach ($products as $product) {
            dispatch(new CheckProductStockJob($product, $this->mailService));
        }
    }

    public function checkDatabase()
    {
        try {
            DatabaseConnectionService::getInstance();
        } catch (\Exception $e) {
            $this->error($e->getMessage());

            exit(Command::FAILURE);
        }
    }
}
