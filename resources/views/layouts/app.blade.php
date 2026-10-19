<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Rental Sepeda') - UTS Rekayasa Web</title>
    <link rel="stylesheet" href="{{ asset('Bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    @include('layouts.partials.header')

    {{-- Catatan: .container TIDAK lagi dipasang di sini.
         Alasannya: beranda butuh seksi yang latarnya selebar layar
         (hero berwarna). Jadi tiap halaman sekarang membuat
         <section> sendiri, lalu memasang .container di dalamnya
         untuk isi yang tetap rapi di tengah. --}}
    <main class="flex-grow-1">
        @yield('content')
    </main>

    @include('layouts.partials.footer')

    <script src="{{ asset('Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
