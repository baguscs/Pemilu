<?php

use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desa')->insert([
            'desa' => 'Sawo',
        ]);

        DB::table('desa')->insert([
            'desa' => 'Bringin',
        ]);
         DB::table('desa')->insert([
            'desa' => 'Alas Malang',
        ]);
          DB::table('desa')->insert([
            'desa' => 'Ngemplak',
        ]);
           DB::table('desa')->insert([
            'desa' => 'Made',
        ]);
            DB::table('desa')->insert([
            'desa' => 'Tengger Kandangan',
        ]);
             DB::table('desa')->insert([
            'desa' => 'Manukan',
        ]);
              DB::table('desa')->insert([
            'desa' => 'Candi Lontar',
        ]);
    }
}
