<?php

use Illuminate\Database\Seeder;
use App\Models\Projects\Coin;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $coin = new Coin();
        $coin->code = 'MXN';
        $coin->name = 'PESOS';
        $coin->save();

        $coin = new Coin();
        $coin->code = 'USD';
        $coin->name = 'DOLARES';
        $coin->save();
    }
}
