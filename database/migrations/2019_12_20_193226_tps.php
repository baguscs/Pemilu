<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('desa_id');
            $table->string('nama')->unique();
            $table->Integer('petugas');
            $table->string('alamat');
            $table->string('foto');
            $table->string('ketua');
            $table->string('status')->nullable();
            $table->string('pesan')->nullable();
            $table->string('oleh')->nullable();
            $table->string('pengawas');
            $table->string('luas');
            $table->string('link');
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
        Schema::dropIfExists('tps');
    }
}
