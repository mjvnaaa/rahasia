<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    public function run()
    {
        $list = [
            ['kode'=>'PW','nama_matakuliah'=>'Pemrograman Web','sks'=>3],
            ['kode'=>'BD','nama_matakuliah'=>'Basis Data','sks'=>2],
            ['kode'=>'ALGO','nama_matakuliah'=>'Algoritma & Struktur Data','sks'=>3],
        ];

        foreach($list as $m) {
            Matakuliah::create($m);
        }
    }
}