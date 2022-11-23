<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = new Role();
        $roles->id = 1;
        $roles->nombre_rol = "Admin";
        $roles->descripcion_rol = "administrador principal";
        $roles->status = 1;
        $roles->save();

        $user = new User();
        $user->name = "Root";
        $user->email = "root@example.com";
        $user->password = bcrypt('12345678');
        $user->direccion = "Col. leiva , Usulutan El salvador";
        $user->telefono = "6032-5896";
        $user->status = 1;
        $user->id_roles = 1;
        $user->save();
        
    }
}
