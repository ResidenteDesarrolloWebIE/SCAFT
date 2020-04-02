<?php

use App\Models\Projects\EconomicAdvance;
use Illuminate\Database\Seeder;

class EconomicAdvanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advance = new EconomicAdvance();
        $advance->initial_advance_percentage = 0 ;
        $advance->initial_advance_mount = 0;
        $advance->initial_advance_completed = 0;

        $advance->engineering_release_payment_percentage = 0;
        $advance->engineering_release_payment_mount = 0;
        $advance->engineering_release_payment_completed = 0;

        $advance->final_payment_percentage = 0;
        $advance->final_payment_mount = 0;
        $advance->final_payment_completed = 0;

        $advance->final_payment_completed = 1;
        $advance->save();
    }
}
