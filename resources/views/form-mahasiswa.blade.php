@extends('layouts.app')

@section('content')
  <h1 class="text-2xl font-bold mb-4">Form Tambah Mahasiswa</h1>

  <form id="formMahasiswa" action="{{ route('mahasiswa.store') }}" method="POST" class="bg-white p-6 rounded shadow max-w-lg">
    @csrf

    <div class="mb-4">
      <label class="block mb-1">Nama</label>
      <input type="text" name="nama" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
      <label class="block mb-1">NIM</label>
      <input type="text" name="nim" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
      <label class="block mb-1">Prodi</label>
      <input type="text" name="prodi" class="w-full border rounded px-3 py-2">
    </div>

    <div class="mb-4">
      <label class="block mb-1">Pilihan Mata Kuliah</label>
      <div class="space-y-1">
        @foreach($matakuliah as $mk)
          <label class="inline-flex items-center">
            <input type="checkbox" name="matakuliah[]" value="{{ $mk->id }}" class="mr-2">
            <span>{{ $mk->nama_matakuliah }} ({{ $mk->sks }} SKS)</span>
          </label><br>
        @endforeach
      </div>
    </div>

    <div class="mb-4">
      <label class="block mb-1">Semester</label>
      <select name="semester" class="w-full border rounded px-3 py-2">
        <option value="Ganjil">Ganjil</option>
        <option value="Genap">Genap</option>
      </select>
    </div>

    <div>
      <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </div>
  </form>

  <p id="msg" class="mt-4 font-semibold text-green-600"></p>

  {{-- Tambahkan script AJAX --}}
  <script>
    document.getElementById('formMahasiswa').addEventListener('submit', async (e) => {
      e.preventDefault();
      const form = e.target;
      const data = new FormData(form);

      const response = await fetch(form.action, {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: data
      });

      if (response.ok) {
        document.getElementById('msg').innerText = 'Data mahasiswa dan KRS berhasil disimpan!';
        form.reset();
      } else {
        document.getElementById('msg').innerText = 'Gagal menyimpan data.';
      }
    });
  </script>
@endsection