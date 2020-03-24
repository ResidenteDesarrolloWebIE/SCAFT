<?php

use App\Models\Projects\ProjectType;
use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = new ProjectType();
        $type->name = 'SUMINISTRO';
        $type->save();

        $type = new ProjectType();
        $type->name = 'SERVICIO';
        $type->save();
    }
}
