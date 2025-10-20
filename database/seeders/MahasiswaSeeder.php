<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nim'=>'362458302034','nama'=>'Heri Herlambang','prodi'=>'TRPL','kota'=>'situbondo'],
            ['nim'=>'362458302035','nama'=>'Moh. Jevon Attaillah','prodi'=>'TRPL','kota'=>'banyuwangi'],
            ['nim'=>'362458302036','nama'=>'Muhammad Rendra Irawan','prodi'=>'TRPL','kota'=>'srono'],
            ['nim'=>'362458302037','nama'=>'Cheryl Aurellya Bangun Jaya','prodi'=>'TRPL','kota'=>'songgon'],
            ['nim'=>'362458302038','nama'=>'Husnul Alisah','prodi'=>'TRPL','kota'=>'gintangan'],
            ['nim'=>'362458302039','nama'=>'Virdan Andi Wardana','prodi'=>'TRPL','kota'=>'banyuwangi']
            ];

        foreach($data as $d) {
            $last = substr($d['nim'],-1);
            $mahaData = [
                'nama'=>$d['nama'],
                'nim'=>$d['nim'],
                'prodi'=>$d['prodi'],
            ];

            // sesuai aturan akhiran nim:
            if(in_array($last, ['0','1','2','3'])) {
                $mahaData['email'] = strtolower(str_replace(' ','',explode(' ', $d['nama'])[0])) . '@example.com';
            } elseif(in_array($last, ['4','5','6'])) {
                $mahaData['telepon'] = '08' . rand(100000000,999999999);
            } else {
                $mahaData['alamat'] = $d['kota'];
            }

            \App\Models\Mahasiswa::create($mahaData);
        }
    }
}