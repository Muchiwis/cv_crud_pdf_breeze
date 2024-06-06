<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
  
        User::create([
            'name' => "cristian",
            'email' => "jhordcristian75@gmail.com",
            'password' => Hash::make("cristian322muchi"),
            'rol' => "administrador",
        ])->assignRole('administrador');

        User::create([
            'name' => "jhord",
            'email' => "jhordcristian76@gmail.com",
            'password' => Hash::make("cristian322muchi"),
            'rol' => "usuario",
        ])->assignRole('usuario');

    }
}
