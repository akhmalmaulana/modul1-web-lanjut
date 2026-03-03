<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'matakuliah'
    ];

    // Relasi many-to-many dengan MataKuliah
    public function matakuliahs()
    {
        return $this->belongsToMany(
            MataKuliah::class, 
            'mahasiswa_matakuliah', 
            'nim', 
            'kode_mk'
        )->withPivot('nilai')
         ->withTimestamps();
    }
}