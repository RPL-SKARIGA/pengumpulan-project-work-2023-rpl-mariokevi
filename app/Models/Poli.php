<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    protected $primaryKey = 'id_poli';
    protected $table = 'polis';
    protected $guarded = [];
    use HasFactory;
}
