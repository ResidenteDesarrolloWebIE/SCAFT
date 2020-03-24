<?php

use Illuminate\Database\Seeder;
use App\Models\UserDetails\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'client';
        $role->description = 'Cliente';
        $role->save();

        $role = new Role();
        $role->name = 'oferta';
        $role->description = 'Tecnico de ofertas';
        $role->save();

        $role = new Role();
        $role->name = 'ingenieria';
        $role->description = 'Ingenieria';
        $role->save();

        $role = new Role();
        $role->name = 'manufactura';
        $role->description = 'Manufactura';
        $role->save();

        $role = new Role();
        $role->name = 'servicio';
        $role->description = 'Ingeniero de servicio';
        $role->save();

        $role = new Role();
        $role->name = 'almacen';
        $role->description = 'Almacen';
        $role->save();

        $role = new Role();
        $role->name = 'finanzas';
        $role->description = 'Administrador de finanzas';
        $role->save();
    }
}
