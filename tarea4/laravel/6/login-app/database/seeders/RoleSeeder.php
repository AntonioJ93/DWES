<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=Role::create(["name"=>"admin"]);
        $usuario=Role::create(["name"=>"usuario"]);

        $accesoAdmin=Permission::create(["name"=>"acceso-admin"])->assignRole($admin);

        //$admin->permissions()->attach(1);//le asignamos al rol admin el permiso de acceso
            //attach para escribir en la tabla intermedia
            //es lo mismo que assignRole($role)
    }
}
