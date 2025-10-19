<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'nama','nim','prodi','email','telepon','alamat'
    ];

    public function matakuliah()
    {
        return $this->belongsToMany(Matakuliah::class, 'krs')
                    ->withPivot('semester')
                    ->withTimestamps();
    }
}