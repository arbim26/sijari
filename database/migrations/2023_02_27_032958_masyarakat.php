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
            $table->string('nama', 35);
            $table->string('alamat');
            $table->string('tps');
            $table->enum('keterangan', ['Aktif', 'Tidak Aktif']);
            $table->integer('status_id')->unsigned();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('status');
        });

        Schema::table('masyarakat', function (Blueprint $table) {
            $table->char('nik', 16)->after('id')->primary();
            $table->dropColumn('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
