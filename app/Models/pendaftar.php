<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendaftar extends Model
{
    protected $primaryKey = 'id_pasien';
    protected $table = 'pendaftars';
    protected $guarded = [];
    use HasFactory;

    public static function boot()
{
    parent::boot();

    static::creating(function ($pasien) {
        // Hanya berlaku untuk pasien baru
        if (!$pasien->exists) {
            // Ambil nomor antrean terakhir untuk dokter ini
            $nomorAntreanTerakhir = pendaftar::where('id_dr', $pasien->id_dr)
                ->max('antrean') ?? 0;

            // Atur nomor antrean untuk pasien baru
            $pasien->antrean = $nomorAntreanTerakhir + 1;
        }
    });

    static::deleted(function ($pasien) {
        // Jika ada pasien dihapus, update nomor antrean
        $pasien->updateAntrean();
    });

    static::updating(function ($pasien) {
        // Jika ada perubahan pada relasi dokter atau poli, atur ulang nomor antrean
        if ($pasien->isDirty(['id_dr', 'id_poli'])) {
            $pasien->updateAntrean();
        }
    });
}

public function updateAntrean()
{
    // Ambil nomor antrean terbesar untuk dokter ini setelah penghapusan
    $nomorAntreanTerbesar = pendaftar::where('id_dr', $this->id_dr)
        ->max('antrean') ?? 0;

    // Jika nomor antrean yang dihapus adalah yang terendah, atur nomor antrean untuk pasien baru
    if ($this->antrean === 1) {
        $nomorAntreanBaru = $nomorAntreanTerbesar + 1;
    } else {
        // Jika nomor antrean yang dihapus bukan yang terendah, tidak perlu atur ulang nomor antrean
        return;
    }

    // Atur ulang nomor antrean
    $this->update(['antrean' => $nomorAntreanBaru]);
}



    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dr', 'id_dokter');
    }

    public function poli()
    {
        return $this->belongsTo(Poli::class, 'id_poli', 'id_poli');
    }
}
