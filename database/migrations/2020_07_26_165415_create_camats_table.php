<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('nip');
            $table->string('nama');
            $table->Integer('umur');
            $table->string('agama');
            $table->string('alamat');
            $table->string('jkl');
            $table->string('kontribusi');
            $table->string('ex')->nullable();
            $table->Integer('norut')->nullable()->unique();
            $table->string('visi');
            $table->string('misi');
            $table->string('skck');
            $table->string('ijazah');
            $table->string('foto');
            $table->string('status')->nullable();
            $table->string('pesan');
            $table->string('oleh');
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
        Schema::dropIfExists('camats');
    }
}
