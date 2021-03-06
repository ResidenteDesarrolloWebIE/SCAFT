<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProjectTypeSeeder::class);  
        $this->call(CoinSeeder::class); 
        $this->call(ContactSeeder::class);
        /* $this->call(ProjectSeeder::class);
        $this->call(AdmDatabaseSyncSeeder::class);  
        $this->call(TechnicalAdvanceSeeder::class); 
        $this->call(EconomicAdvanceSeeder::class); 
        $this->call(ContactSeeder::class);  */
    }
}