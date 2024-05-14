<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'estadoCuenta' => 'Habilitado',
            'departamento' => 'Informatica',
            'password' => 'admin',
            'ci' => '1234567',

        ]);

        $user->assignRole('Admin');

        $user2 = User::create([
            'name' => 'Leticia Blanco',
            'email' => 'docente@doc.umss.edu',
            'estadoCuenta' => 'Deshabilitado',
            'departamento' => 'Informatica',
            'password' => 'docente',
            'ci' => '5432101',
        ]);

        $user2->assignRole('User');

        $user3 = User::create([
            'name' => 'Paco Fernandez',
            'email' => 'docente2@gmail.com',
            'estadoCuenta' => 'Habilitado',
            'departamento' => 'Sistemas',
            'password' => 'docente',
            'ci' => '4232332',
        ]);

        $user3->assignRole('User');

        $user4 = User::create([
            'name' => 'Carmen Rosa',
            'email' => 'docente2@gdoc.umss.edu',
            'estadoCuenta' => 'Deshabilitado',
            'departamento' => 'Industrial',
            'password' => 'docente',
            'ci' => '4236798',
        ]);

        $user3->assignRole('User');
    }
}
