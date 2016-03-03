<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Product;
use App\Http\Controllers;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function indexProductShouldNotBeNull()
    {
        $this->visit('/product')
            ->see('Wojb');
    }
}
