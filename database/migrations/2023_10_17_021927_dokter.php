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
        Schema::create('dokter', function (Blueprint $table) {
            $table->id('id_dokter');
            $table->string('nama_dokter');
            $table->string('poli');
            $table->enum('jeniskelamin', ['Laki-laki', 'perempuan']);
            $table->string('foto');
            $table->timestamps();
        });
        // Schema::create('jadwal', function (Blueprint $table) {
        //     $table->id('id_jadwal');
        //     $table->int('id_dokter');
        //     $table->string('senin');
        //     $table->string('selasa');
        //     $$table->string('rabu');
        //     $table->string('kamis');
        //     $table->string('jumaat');
        //     $table->string('sabtu');
        //     $table->string('minggu');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
