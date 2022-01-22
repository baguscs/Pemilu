<?php

use Illuminate\Database\Seeder;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelurahan')->insert([
        	'nama' => 'Bringin',
        ]);
        DB::table('kelurahan')->insert([
            'nama' => 'Made',
        ]);
        DB::table('kelurahan')->insert([
            'nama' => 'Lontar',
        ]);
        DB::table('kelurahan')->insert([
            'nama' => 'Sambikerep',
        ]);
    }
}
