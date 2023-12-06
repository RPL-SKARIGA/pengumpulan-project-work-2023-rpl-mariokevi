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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->string('nama_pasien');
            $table->integer('umur');
            $table->enum('jeniskelamin', ['Laki-laki', 'perempuan']);
            $table->integer('no_hp');
            $table->string('alamat');
            $table->string('foto');
            $table->integer('nik');
            $table->timestamps();
        });
        // Schema::create('dokter', function (Blueprint $table) {
        //     $table->id('id_dokter');
        //     $table->string('nama_dokter');
        //     $table->string('poli');
        //     $table->enum('jeniskelamin', ['Laki-laki', 'perempuan']);
        //     $table->string('foto');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
        Schema::dropIfExists('dokter');
    }
};
