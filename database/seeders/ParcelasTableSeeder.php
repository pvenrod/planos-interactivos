<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParcelasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('parcelas')->insert([
          'nombre' => 'Casa del gnomo',
          'descripcion' => 'Una casa donde vivia un gnomo ETP',
          'anyo_inicio' => '1900',
          'anyo_fin' => '2021',
          'imagen' => '1.png',
          'zona_id' => '1'
     ]);
    }
}
