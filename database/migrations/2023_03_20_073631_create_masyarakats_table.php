<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masyarakat', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->string('tangal_lahir');
            $table->string('jenis_kelamin');
            $table->string('jalan/desa');
            $table->string('rt');
            $table->string('rw');
            $table->string('disabilitas');
            $table->string('keterangan');
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
        Schema::dropIfExists('masyarakats');
    }
};
