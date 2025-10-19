<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>UTS - KRS</title>
  <!-- Tailwind CDN cepat untuk tugas -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
  <div class="container mx-auto">
    <nav class="mb-6">
      <a href="{{ url('/krs') }}" class="mr-4">KRS</a>
      <a href="{{ url('/form-mahasiswa') }}">Form Mahasiswa</a>
    </nav>

    @if(session('success'))
      <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
      </div>
    @endif

    @yield('content')
  </div>
</body>
</html>