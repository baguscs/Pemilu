<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('role')->insert([
            'role' => 'Admin',
        ]);

         DB::table('role')->insert([
            'role' => 'Petugas',
        ]);

        DB::table('role')->insert([
            'role' => 'Pengawas',
        ]);

        DB::table('role')->insert([
            'role' => 'Voters',
        ]);
        DB::table('role')->insert([
            'role' => 'Lurah',
        ]);
        DB::table('role')->insert([
            'role' => 'Camat',
        ]);
    }
}
