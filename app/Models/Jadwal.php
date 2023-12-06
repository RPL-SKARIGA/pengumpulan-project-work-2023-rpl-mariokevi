<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $primaryKey = 'id_jadwal';
    protected $table = 'jadwal';
    protected $guarded = [];
    use HasFactory;
}
