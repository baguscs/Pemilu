<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengguna extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('role_id');
            $table->Integer('desa_id')->nullable();
            $table->Integer('kelurahan_id')->nullable();
            $table->string('nama');
            $table->bigInteger('no_ket')->unique();
            $table->string('asal')->nullable();
            $table->string('ttg')->nullable();
            $table->bigInteger('telpon')->nullable();
            $table->string('jkl')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('foto')->nullable();
            $table->string('bukti')->nullable();
            $table->string('cek')->nullable();
            $table->string('akses')->nullable();
            $table->string('status')->nullable();
            $table->string('pesan')->nullable();
            $table->string('pilih')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
