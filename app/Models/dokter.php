<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $primaryKey = 'id_dokter';
    protected $table = 'dokter';
    protected $guarded = [];
    protected $fillable = ['nama_dokter', 'poli', 'jeniskelamin', 'foto'];

    use HasFactory;

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'poli', 'id_poli');
    }
}
