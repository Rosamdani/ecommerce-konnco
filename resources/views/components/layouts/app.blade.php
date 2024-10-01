<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @livewireStyles
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Market' }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>

    <style>
        <style>.ripple-effect::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background-color: rgba(56, 189, 248, 0.5);
            /* sky-300 color with opacity */
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 0.5s ease, opacity 0.5s ease;
            z-index: 0;
        }

        .ripple-effect:active::before {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0;
        }

        .ripple-effect {
            position: relative;
            z-index: 1;
        }

        .ripple-effect span {
            position: relative;
            z-index: 2;
        }

        #snap-midtrans {
            position: relative;
            /* Pastikan ini diatur jika belum */
            z-index: 9999;
            /* Atau angka yang cukup tinggi */
        }
    </style>
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <main>
        @livewire('partials.navbar')
        {{ $slot }}
        @livewire('partials.footer')
        @livewire('search-bar')
    </main>
    @livewireScripts
</body>

</html>