

@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Daftar Mahasiswa & Mata Kuliah</h1>

  <form action="{{ route('krs.search') }}" method="GET" class="flex gap-2 mb-4">
  <input type="text" name="q" value="{{ $keyword ?? '' }}" placeholder="Cari nama atau NIM..." class="border p-2 rounded w-full">
  <button type="submit" class="bg-blue-600 text-white px-4 rounded">Cari</button>
</form>


  {{-- Tampilkan mahasiswa yang NIM ganjil dalam tabel --}}
  <h2 class="text-xl mt-4">Mahasiswa dengan NIM Ganjil (Tabel)</h2>
  @php
    $ganjil = $mahas->filter(function($m){ return intval(substr($m->nim, -1)) % 2 === 1; });
    $genap = $mahas->filter(function($m){ return intval(substr($m->nim, -1)) % 2 === 0; });
  @endphp

  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 mt-2">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prodi</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mata Kuliah (SKS)</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semester</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-200">
        @foreach($ganjil as $m)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $m->nama }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $m->nim }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $m->prodi }}</td>
            <td class="px-6 py-4">
              <ul class="list-disc pl-5">
                @forelse($m->matakuliah as $mk)
                  <li>{{ $mk->nama_matakuliah }} ({{ $mk->sks }} SKS)</li>
                @empty
                  <li>-</li>
                @endforelse
              </ul>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
              @if($m->matakuliah->count())
                {{ $m->matakuliah->first()->pivot->semester }}
              @else
                -
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Mahasiswa dengan NIM genap: card grid --}}
  <h2 class="text-xl mt-8">Mahasiswa dengan NIM Genap (Card Grid)</h2>
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-2">
    @foreach($genap as $m)
      <div class="bg-white p-4 rounded shadow">
        <h3 class="font-semibold">{{ $m->nama }}</h3>
        <p class="text-sm">NIM: {{ $m->nim }}</p>
        <p class="text-sm">Prodi: {{ $m->prodi }}</p>
        <div class="mt-2">
          <h4 class="font-medium">Mata Kuliah:</h4>
          <ul class="list-disc pl-5">
            @forelse($m->matakuliah as $mk)
              <li>{{ $mk->nama_matakuliah }} ({{ $mk->sks }} SKS) — <span class="italic">{{ $mk->pivot->semester }}</span></li>
            @empty
              <li>-</li>
            @endforelse
          </ul>
        </div>
      </div>
    @endforeach
  </div>
@endsection