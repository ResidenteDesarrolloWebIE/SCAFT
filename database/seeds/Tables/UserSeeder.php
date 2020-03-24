<?php

use Illuminate\Database\Seeder;
use App\Models\UserDetails\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_client = Role::where('name', 'client')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->name = 'Cliente';
        $user->email = 'cliente@example.com';
        $user->password = bcrypt('cliente1');
        $user->code = 'C1110';
        $user->save();
        $user->roles()->attach($role_client); 
        
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('administrador1');
        $user->code = 'C1111';
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'Moises';
        $user->email = 'residente.desarrolloweb@integracion-energia.com';
        $user->password = bcrypt('moises1');
        $user->code = 'C1112';
        $user->save();
        $user->roles()->attach($role_client); 
    }
}
