<?php

namespace Tests\Unit\Jobs;

use App\Jobs\CheckProductStockJob;
use App\Models\Product;
use App\Services\Mail\MailService;
use Tests\TestCase;

class CheckProductStockJobTest extends TestCase
{
    /** @test */
    public function handle_out_of_stock()
    {
        $product = new Product([
            'name' => 'Test Product',
            'stock' => 0,
        ]);

        $mailServiceMock = $this->createMock(MailService::class);
        $mailServiceMock->expects($this->once())
            ->method('send')
            ->with(
                'admin@example.com',
                'Out_of_stock Warning: Product \'Test Product\'',
                'Product \'Test Product\' is out_of_stock. Current stock: 0'
            );

        $job = new CheckProductStockJob($product, $mailServiceMock);
        $job->handle();
    }

    /** @test */
    public function handle_low_stock()
    {
        $product = new Product([
            'name' => 'Test Product',
            'stock' => 5,
        ]);

        $mailServiceMock = $this->createMock(MailService::class);
        $mailServiceMock->expects($this->once())
            ->method('send')
            ->with(
                'admin@example.com',
                'Low_stock Warning: Product \'Test Product\'',
                'Product \'Test Product\' is low_stock. Current stock: 5'
            );

        $job = new CheckProductStockJob($product, $mailServiceMock);
        $job->handle();
    }
}
