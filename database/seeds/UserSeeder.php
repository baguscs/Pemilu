<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'pengguna_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('test'),
            'akses' => 'test',
            // 'role_id' => 1,
        ]);
    }
}
