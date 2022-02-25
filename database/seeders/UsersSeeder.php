<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['name' => 'Super Bernat', 'email' => 'superbernat@email.com',
                'password' => Hash::make('12345678'), 'role' => 'super'],
            ['name' => 'Bernat', 'email' => 'bernat@email.com',
                'password' => Hash::make('12345678'), 'role' => 'admin'],
            ['name' => 'Margalida', 'email' => 'margalida@email.com',
                'password' => Hash::make('12345678'), 'role' => 'user'],
            ['name' => 'Miquel', 'email' => 'miquel@email.com',
                'password' => Hash::make('12345678'), 'role' => 'visitor'],
        ];

        DB::table('users')->insert($users);
    }
}
