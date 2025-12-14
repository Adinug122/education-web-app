<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Defind') }}</title>

    <link rel="icon" href="{{ asset('img/4x4.png') }}" type="image/jpeg">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white">
    <div id="preloader" class="fixed inset-0 z-[9999] bg-brand-900 flex flex-col items-center justify-center transition-opacity duration-700 ease-in-out">
        
        <div class="absolute inset-0 opacity-10 bg-[url('https://grainy-gradients.vercel.app/noise.svg')]"></div>

        <div class="relative z-10 text-center animate-pulse">
            <img src="{{ asset('img/splash.jpeg') }}" alt="Logo" class="w-20 h-20 rounded-2xl mx-auto mb-4 shadow-2xl border-4 border-brand-700">
            <h1 class="text-3xl font-extrabold text-white tracking-tight">DEFIND</h1>
            <p class="text-brand-200 text-sm mt-1">Define Your Future, Find Your Path</p>
        </div>

        <div class="mt-8 relative z-10">
            <div class="w-10 h-10 border-4 border-brand-700 border-t-white rounded-full animate-spin"></div>
        </div>

        <div class="absolute bottom-10 text-brand-300 text-xs font-medium tracking-widest uppercase opacity-60">
            Powered by 404 ide not found
        </div>
    </div>

    <div class="min-h-screen flex">
        
        <div class="hidden lg:flex lg:w-1/2 relative bg-brand-900 overflow-hidden flex-col justify-between p-12 text-white">
            
            <div class="absolute inset-0 bg-gradient-to-br from-brand-600 to-brand-900 opacity-90 z-0"></div>
            <div class="absolute inset-0 z-0" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 32px 32px; opacity: 0.1;"></div>
            
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-brand-400 blur-3xl opacity-20"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-cyan-400 blur-3xl opacity-20"></div>

            <div class="relative z-10 flex items-center gap-2">
                <img src="{{ asset('img/4x4.png') }}" alt="Logo" class="w-10 h-10 rounded-lg bg-blue-600 md:bg-white p-0.5">
                <span class="text-2xl font-bold tracking-tight">Defind</span>
            </div>

            <div class="relative z-10 max-w-lg">
                <h1 class="text-5xl font-extrabold leading-tight mb-6">
                    Mulai Masa Depanmu <br>
                    <span class="text-cyan-300">Tanpa Batas.</span>
                </h1>
            <p class="text-brand-100 text-lg leading-relaxed opacity-90">
                    Kelola perjalanan karir, roadmap belajar, dan portofolio <b>keahlianmu</b> dalam satu platform terintegrasi.
                </p>
            </div>

            <div class="relative z-10 text-sm text-brand-200">
                &copy; {{ date('Y') }} Defind Inc.
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 bg-white relative">
            <div class="w-full max-w-md">
                <div class="lg:hidden flex items-center gap-2 mb-8 justify-center">
                  <img src="{{ asset('img/4x4.png') }}" alt="DevLev AI Logo" class="w-10 h-10 object-contain">
                    <span class="text-2xl font-bold text-gray-900 tracking-tight">Defind</span>
                </div>

                {{ $slot }}
            </div>
        </div>
    </div>

    <script>
      
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            
            // 1. Beri sedikit jeda (misal 800ms) agar loading terlihat user
            setTimeout(() => {
                // 2. Bikin transparan (Fade Out)
                preloader.classList.add('opacity-0');
                
                // 3. Hapus dari layar setelah transisi selesai (sesuai duration-700 di CSS)
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 700);
                
            }, 800); 
        });
    </script>
</body>
</html>