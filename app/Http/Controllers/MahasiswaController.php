<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;

class MahasiswaController extends Controller
{
    public function create()
    {
        $matakuliah = Matakuliah::all();
        return view('form-mahasiswa', compact('matakuliah'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim'  => 'required|string|unique:mahasiswas,nim',
            'prodi'=> 'required|string|max:255',
            'matakuliah' => 'nullable|array',
            'semester' => 'required|string',
        ]);

        $mahasiswa = Mahasiswa::create([
            'nama' => $validated['nama'],
            'nim'  => $validated['nim'],
            'prodi'=> $validated['prodi'],
            // tidak langsung mengisi email/telepon/alamat di form; sesuai aturan akhiran bisa diisi kosong
        ]);

        if(!empty($validated['matakuliah'])) {
            foreach($validated['matakuliah'] as $mk_id) {
                $mahasiswa->matakuliah()->attach($mk_id, ['semester'=>$validated['semester']]);
            }
        }

        return redirect()->back()->with('success','Data mahasiswa dan KRS berhasil disimpan!');
    }
}