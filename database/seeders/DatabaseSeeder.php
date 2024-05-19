<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UbicacionSeeder::class,
            AmbienteSeeder::class,
            GrupoSeeder::class,
            MateriaSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleHasPermissionSeeder::class,
            UserSeeder::class,
            DocmateriaSeeder::class,

            //SolicitudSeeder::class,
            //NotificacionSeeder::class,
            //ReservaSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
