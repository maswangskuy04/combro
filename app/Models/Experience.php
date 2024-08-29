<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'posisi',
        'job',
        'periode',
        'id_profile'
    ];
}
