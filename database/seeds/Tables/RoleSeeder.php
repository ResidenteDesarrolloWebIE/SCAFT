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
        $role->name = 'Administrador';
        $role->description = 'Administrador total del sistema';
        $role->save();

        $role = new Role();
        $role->name = 'Cliente';
        $role->description = 'Cliente';
        $role->save();

        $role = new Role();
        $role->name = 'Ofertas';
        $role->description = 'Tecnico de ofertas';
        $role->save();

        $role = new Role();
        $role->name = 'Ventas';
        $role->description = 'Tecnico de Ventas';
        $role->save();

        $role = new Role();
        $role->name = 'Ingenieria';
        $role->description = 'Ingenieria';
        $role->save();

        $role = new Role();
        $role->name = 'Manufactura';
        $role->description = 'Ingeniero de Manufactura';
        $role->save();

        $role = new Role();
        $role->name = 'Servicio';
        $role->description = 'Ingeniero de Servicio';
        $role->save();

        $role = new Role();
        $role->name = 'Almacen';
        $role->description = 'Almacen';
        $role->save();

        $role = new Role();
        $role->name = 'Finanzas';
        $role->description = 'Administrador de finanzas';
        $role->save();

        $role = new Role();
        $role->name = 'Consulta';
        $role->description = 'Consultas al sistema';
        $role->save();
    }
}
