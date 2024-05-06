<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ubicaciones')->insert([
            'nombre' => 'Edificio nuevo',
            'facultad' => 'Fcyt',

        ]);
        DB::table('ubicaciones')->insert([
            'nombre' => 'bloque antiguo',
            'facultad' => 'Economia',

        ]);
        DB::table('ubicaciones')->insert([
            'nombre' => 'laboratorios',
            'facultad' => 'Derecho',

        ]);
        DB::table('ubicaciones')->insert([
            'nombre' => 'edificio memi',
            'facultad' => 'Fcyt',

        ]);
    }
}
