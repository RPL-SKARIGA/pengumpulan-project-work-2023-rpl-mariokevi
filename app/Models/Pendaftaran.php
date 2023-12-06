<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $primaryKey = 'id_pasien';
    protected $table = 'pendaftars';
    protected $guarded = [];
    use HasFactory;
}
