<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZonasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('zonas')->insert([
               'nombre' => 'Plaza Vieja',
               'descripcion' => 'Plaza situada en casco histórico de Almería.',
               'imagen' => '1.png'
          ]);
    }
}
