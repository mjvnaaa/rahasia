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
            ['nim'=>'362458302039','nama'=>'Virdan Andi Wardana','prodi'=>'TRPL','kota'=>'banyuwangi'],
            ['nim'=>'362458302040','nama'=>'Moh.Nuris Gustian Arrafi','prodi'=>'TRPL','kota'=>'Songgon'],
            ['nim'=>'362458302041','nama'=>'Salam Rizqi Mulia','prodi'=>'TRPL','kota'=>'Banyuwangi'],
            ['nim'=>'362458302042','nama'=>'Febriyan Putra Hariadi','prodi'=>'TRPL','kota'=>'Songgon'],
            ['nim'=>'362458302043','nama'=>'Dino Febiyan','prodi'=>'TRPL','kota'=>'songgon'],
            ['nim'=>'362458302044','nama'=>'Rusydi Jabir Alawfa','prodi'=>'TRPL','kota'=>'rogojampi'],
            ['nim'=>'362458302091','nama'=>'Rizky Bintang Putra','prodi'=>'TRPL','kota'=>'rogojampi'],
            ['nim'=>'362458302092','nama'=>'Muhammad Rakha Widya Ardhana','prodi'=>'TRPL','kota'=>'jombang'],
            ['nim'=>'362458302093','nama'=>'Alfin Nazati Kirom','prodi'=>'TRPL','kota'=>'songgon'],
            ['nim'=>'362458302094','nama'=>'Dian Restu Khoirunnisa','prodi'=>'TRPL','kota'=>'situbondo'],
            ['nim'=>'362458302095','nama'=>'Vina Faizatus Sofita','prodi'=>'TRPL','kota'=>'situbondo'],
            ['nim'=>'362458302096','nama'=>'Achmad Fahmi Fuady','prodi'=>'TRPL','kota'=>'srono'],
            ['nim'=>'362458302097','nama'=>'Daniel Fandino','prodi'=>'TRPL','kota'=>'purwoharjo'],
            ['nim'=>'362458302098','nama'=>'Danish Naisyila Azka','prodi'=>'TRPL','kota'=>'blimbingsari'],
            ['nim'=>'362458302099','nama'=>'Intan Rahma Safira','prodi'=>'TRPL','kota'=>'srono'],
            ['nim'=>'362458302100','nama'=>'Firman Ardiansyah','prodi'=>'TRPL','kota'=>'kabat'],
            ['nim'=>'362458302101','nama'=>'Nadhifah Afiyah Qurota\'ain','prodi'=>'TRPL','kota'=>'srono'],
            ['nim'=>'362458302119','nama'=>'Nicko Sugiarto','prodi'=>'TRPL','kota'=>'banyuwangi'],
            ['nim'=>'362458302120','nama'=>'Yushril Huda Ramadhany','prodi'=>'TRPL','kota'=>'banyuwangi'],
            ['nim'=>'362458302124','nama'=>'Adelia Fioren Zety','prodi'=>'TRPL','kota'=>'rogojampi'],
            ['nim'=>'362458302125','nama'=>'Leni Ayu Pratiwi','prodi'=>'TRPL','kota'=>'srono'],
            ['nim'=>'362458302126','nama'=>'Tio Krisna Mukti','prodi'=>'TRPL','kota'=>'Wongsorejo'],
            ['nim'=>'362458302145','nama'=>'Anisa Suci Rahmawati','prodi'=>'TRPL','kota'=>'banyuwangi'],
            ['nim'=>'362458302146','nama'=>'Ahmad Maulidin','prodi'=>'TRPL','kota'=>'kabat'],
            ['nim'=>'362458302147','nama'=>'Achmad Alfarizy Satriya','prodi'=>'TRPL','kota'=>'banyuwangi'],
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