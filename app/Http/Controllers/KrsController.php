<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class KrsController extends Controller
{

    public function index()
    {
        $mahas = Mahasiswa::with('matakuliah')->get();
        $keyword = null;
        return view('krs', compact('mahas', 'keyword'));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('q');
        $mahas = Mahasiswa::with('matakuliah')
                    ->where('nama', 'like', "%$keyword%")
                    ->orWhere('nim', 'like', "%$keyword%")
                    ->get();

        return view('krs', compact('mahas', 'keyword'));
    }
}