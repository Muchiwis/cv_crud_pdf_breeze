<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name'=>"administrador"]);
        $role2 = Role::create(['name'=>"usuario"]);

        Permission::create(['name'=>"ventas.home"])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>"ventas.home.index"])->syncRoles([$role1,$role2]);
        Permission::create(['name'=>"ventas.home.create"])->assignRole($role1);
        Permission::create(['name'=>"ventas.home.edit"])->assignRole($role1);
        Permission::create(['name'=>"ventas.home.delete"])->assignRole($role1);
    }
}
