<?php

use Illuminate\Database\Seeder;

class AksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       DB::table('akses')->insert([
            'akses' => 'voters',
            'status' => 'buka'
        ]);

       DB::table('akses')->insert([
            'akses' => 'camat',
            'status' => 'buka'
        ]);

       DB::table('akses')->insert([
            'akses' => 'lurah',
            'status' => 'buka'
        ]);

       DB::table('akses')->insert([
            'akses' => 'fasilitas',
            'status' => 'buka'
        ]);
       DB::table('akses')->insert([
            'akses' => 'tps',
            'status' => 'buka'
        ]);
    }
}
