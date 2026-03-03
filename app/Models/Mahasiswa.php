<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Matakuliah;
use App\Models\User;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    // Primary key = nim
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'matakuliah_id',
        'user_id'
    ];

    /*
    |--------------------------------------------------------------------------
    | Relasi
    |--------------------------------------------------------------------------
    */

    // Relasi ke MataKuliah (Many to One)
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'matakuliah_id');
    }

    // Relasi ke User (Many to One)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}