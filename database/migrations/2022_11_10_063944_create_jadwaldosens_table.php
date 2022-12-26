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
        Schema::create('jadwaldosens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matkul');
            $table->string('kode_matkul');
            $table->foreignId('nama_dosen');
            $table->string('nip');
            $table->foreignId('kode_ruang');
            $table->string('waktu');
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
        Schema::dropIfExists('jadwaldosens');
    }
};
