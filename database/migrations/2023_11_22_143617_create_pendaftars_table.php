<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->biginteger('antrean');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->integer('id_poli');
            $table->integer('id_dr');
            $table->biginteger('nik');
            $table->string('penanggung');
            $table->biginteger('no_penanggung');
            $table->biginteger('no_hp');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftars');
    }
};
