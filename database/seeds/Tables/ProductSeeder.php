<?php

use Illuminate\Database\Seeder;
use App\Models\Quotes\Product;

class ProductSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $product = new Product();
        $product->folio = 'PR0001';
        $product->description = 'Primer producto';
        $product->total_amount = 1000000 ;
        $product->status = "Activo";
        $product->notes = "Primer producto";
        $product->estimated_date = "2020-03-24 14:36:28";
        $product->bidding = 1;
        $product->user_id = 1;
        $product->save();

        $product = new Product();
        $product->folio = 'PR0002';
        $product->description = 'Segundo producto';
        $product->total_amount = 2001000 ;
        $product->status = "Activo";
        $product->notes = "Segundo producto";
        $product->estimated_date = "2020-04-24 14:36:28";
        $product->bidding = 1;
        $product->user_id = 1;
        $product->save();
    }
}
