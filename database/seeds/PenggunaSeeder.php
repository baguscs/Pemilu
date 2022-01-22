<?php

use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('pengguna')->insert([
            'nama' => 'Bagus Cahyo Sulistiyo',
            'role_id' => 3,
            'desa_id' => 2,
            'no_ket' => '1232340394230121234',
            'ttg' => 'Surabaya, 12 Maret 2002',
            'telpon' => '08943534932',
            'jkl' => 'Laki-Laki',
            'foto' => 'bagus.jpg'
        ]);
    }
}
