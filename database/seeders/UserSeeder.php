<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'username' => 'Admin',
            'email' => 'bangadmin@mail.com',
            'password' => 'bangadmin',
            'position' => 'admin'
        ]);

        DB::table('users')->insert([
            'username' => 'Mbacantik',
            'email' => 'mbacantik@mail.com',
            'password' => 'mbacantik',
            'position' => 'artist'
        ]);

        DB::table('users')->insert([
            'username' => 'Masganteng',
            'email' => 'masganteng@mail.com',
            'password' => 'masganteng',
            'position' => 'public'
        ]);
    }
}
