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
        Schema::create('jadwal_barus', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->integer('id_dr');
            $table->string('senin_awal');
            $table->string('senin_akhir');
            $table->string('selasa_awal');
            $table->string('selasa_akhir');
            $table->string('rabu_awal');
            $table->string('rabu_akhir');
            $table->string('kamis_awal');
            $table->string('kamis_akhir');
            $table->string('jumat_awal');
            $table->string('jumat_akhir');
            $table->string('sabtu_awal');
            $table->string('sabtu_akhir');
            $table->string('minggu_awal');
            $table->string('minggu_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_barus');
    }
};
