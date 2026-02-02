<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absen extends Model
{
    //hasmany stuff and shit i forgot
    use HasFactory;
    protected $fillable = [
    'user_id',
    'kategori',
    'status',
    'tanggal',
    'alasan',
    'task',
    'lat',
    'long',
    'photo',
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
