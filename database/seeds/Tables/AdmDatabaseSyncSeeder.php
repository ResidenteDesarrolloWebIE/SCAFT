<?php

use Illuminate\Database\Seeder;
use App\Models\Synchronization\AdmDatabaseSync;

class AdmDatabaseSyncSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $syncup = new AdmDatabaseSync();
        $syncup->name = 'Customer';
        $syncup->child_table = 'users';
        $syncup->parent_table = 'customer';
        $syncup->database = 'agate';
        $syncup->active = 1;
        $syncup->save();


        $syncup = new AdmDatabaseSync();
        $syncup->name = 'Coins';
        $syncup->child_table = 'cat_coins';
        $syncup->parent_table = 'cat_coins';
        $syncup->database = 'agate';
        $syncup->active = 1;
        $syncup->save();

        $syncup = new AdmDatabaseSync();
        $syncup->name = 'Contacts';
        $syncup->child_table = 'contacts';
        $syncup->parent_table = 'contacts';
        $syncup->database = 'agate';
        $syncup->active = 1;
        $syncup->save();

        $syncup = new AdmDatabaseSync();
        $syncup->name = 'Products';
        $syncup->child_table = 'products_quotations';
        $syncup->parent_table = 'products_quotations';
        $syncup->database = 'agate';
        $syncup->active = 1;
        $syncup->save();

        $syncup = new AdmDatabaseSync();
        $syncup->name = 'Projects';
        $syncup->child_table = 'projects';
        $syncup->parent_table = 'projects';
        $syncup->database = 'agate';
        $syncup->active = 1;
        $syncup->save();

        $syncup = new AdmDatabaseSync();
        $syncup->name = 'Payments';
        $syncup->child_table = 'quotations_payments';
        $syncup->parent_table = 'quotations_payments';
        $syncup->database = 'agate';
        $syncup->active = 1;
        $syncup->save();

        $syncup = new AdmDatabaseSync();
        $syncup->name = 'Progress';
        $syncup->child_table = 'quotations_progress';
        $syncup->parent_table = 'quotations_progress';
        $syncup->database = 'agate';
        $syncup->active = 1;
        $syncup->save();

        $syncup = new AdmDatabaseSync();
        $syncup->name = 'Revisions';
        $syncup->child_table = 'revisions_quotations';
        $syncup->parent_table = 'revisions_quotations';
        $syncup->database = 'agate';
        $syncup->active = 1;
        $syncup->save();

        $syncup = new AdmDatabaseSync();
        $syncup->name = 'Services';
        $syncup->child_table = 'services_quotations';
        $syncup->parent_table = 'services_quotations';
        $syncup->database = 'agate';
        $syncup->active = 1;
        $syncup->save();
    }
}
