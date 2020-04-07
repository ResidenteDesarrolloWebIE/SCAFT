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
        /* $role_client = Role::where('name', 'Cliente')->first(); */
        $role_admin = Role::where('name', 'Administrador')->first();
        $role_consulta = Role::where('name', 'Consulta')->first();


        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'administrador@integracion-energia.com';
        $user->password = bcrypt('Energia2020');
        $user->save();
        $user->roles()->attach($role_admin);
        $user->roles()->attach($role_consulta);
        

/*         $user = new User();
        $user->name = 'Moises';
        $user->email = 'residente.desarrolloweb@integracion-energia.com';
        $user->password = bcrypt('moises1');
        $user->code = 'C1112';
        $user->save();
        $user->roles()->attach($role_client); 

        $user = new User();
        $user->name = 'Cliente';
        $user->email = 'cliente@example.com';
        $user->password = bcrypt('cliente1');
        $user->code = 'C1110';
        $user->save();
        $user->roles()->attach($role_client,); */
    } 
}
