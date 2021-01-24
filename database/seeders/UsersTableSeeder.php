<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Ruben',
            'email' => 'ruben@iescelia.edu',
            'password' => md5('ruben'),
        ]);

        DB::table('users')->insert([
            'name' => 'Paolo',
            'email' => 'paolo@iescelia.edu',
            'password' => md5('paolo'),
        ]);
    }
}
