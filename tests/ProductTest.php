<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Product;

class productTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function should_show_retrieved_data()
    {
        $this->visit('/product')
            ->see('OveSeA');
    }

    public function should_show_data_with_id(){
        $this->visit('/product/2')
            ->see('2')
            ->see('wiAKXI');
    }

    public function should_show_create_form(){
        $this->visit('/product/create')
            ->see('Create');
    }

    public function should_show_edit_form_with_data(){
        $this->visit('/product/{product}/edit')
            ->see('Edit');
    }

    public function should_store_and_redirect_to_index(){
        $this->visit('/product/store')
            ->assertRedirectedToRoute('product.index');
    }
}
