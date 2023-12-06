<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dokter')->insert([
            'nama_dokter' => 'Marianus stefano',
            'poli' => 'Gigi',
            'jeniskelamin' => 'Laki-laki',
            'foto' => 'bahbhab',
        ]);
    }
}
