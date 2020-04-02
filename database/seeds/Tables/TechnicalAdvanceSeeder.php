<?php

use App\Models\Projects\TechnicalAdvance;
use Illuminate\Database\Seeder;

class TechnicalAdvanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advance = new TechnicalAdvance();
        $advance->receive_order = 0;
        $advance->engineering_release = 0;
        $advance->work_progress = 0;
        $advance->delivery_customer = 0;
        $advance->project_id = 1;
        $advance->save();
    }
}
