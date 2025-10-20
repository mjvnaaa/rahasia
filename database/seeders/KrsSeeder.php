<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class KrsSeeder extends Seeder
{
    public function run()
    {
        $mks = Matakuliah::all();
        $mahas = Mahasiswa::limit(15)->get();

        foreach($mahas as $idx => $mhs) {
            $take = rand(1,3);
            $selected = $mks->random($take);
            foreach($selected as $mk) {
                $semester = (rand(0,1) ? 'Ganjil' : 'Genap');
                $mhs->matakuliah()->attach($mk->id, ['semester'=>$semester]);
            }
        }
    }
}