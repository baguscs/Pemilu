<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PenggunaSeeder::class);
        $this->call(DesaSeeder::class);
        $this->call(KelurahanSeeder::class);
        $this->call(AksesSeeder::class);
    }
}
