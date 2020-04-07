<?php

use App\Models\Projects\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $user = new Contact();
        $user->name = 'Moises Escobar Martinez';
        $user->email = 'residente.desarrolloweb@integracion-energia.com';
        $user->job_position = "Residente";
        $user->cellphone = '9661006467';
        $user->user_id = 1;
        $user->save();

        $user = new Contact();
        $user->name = 'Jesus Israel';
        $user->email = 'residente.desarrolloweb@integracion-energia.com';
        $user->job_position = "Residente";
        $user->cellphone = '6781006467';
        $user->user_id = 2;
        $user->save();

        $user = new Contact();
        $user->name = 'Jose Erasmo';
        $user->email = 'residente.desarrolloweb@integracion-energia.com';
        $user->job_position = "Residente";
        $user->cellphone = '8781006467';
        $user->user_id = 3;
        $user->save();
    }
}
