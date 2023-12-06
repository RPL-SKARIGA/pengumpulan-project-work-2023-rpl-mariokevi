<?php

namespace App\Models;

use App\models\Dokter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_baru extends Model
{
    protected $primaryKey = 'id_jadwal';
    protected $table = 'jadwal_barus';
    protected $guarded = [];
    
    use HasFactory;

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dr', 'id_dokter');
    }
}
