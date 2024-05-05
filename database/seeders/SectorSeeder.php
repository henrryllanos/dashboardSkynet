<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sectors')->insert([
            'nombre' => 'Edificio nuevo',
            'facultad' => 'Fcyt',

        ]);
        DB::table('sectors')->insert([
            'nombre' => 'bloque antiguo',
            'facultad' => 'Economia',

        ]);
        DB::table('sectors')->insert([
            'nombre' => 'laboratorios',
            'facultad' => 'Derecho',

        ]);
        DB::table('sectors')->insert([
            'nombre' => 'edificio memi',
            'facultad' => 'Fcyt',

        ]);
    }
}
