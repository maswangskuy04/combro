<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'picture',
        'nama_lengkap',
        'alamat',
        'no_tlp',
        'email',
        'facebook',
        'twitter',
        'description',
        'status'
    ];
    protected $date = ['deleted_at'];
}
