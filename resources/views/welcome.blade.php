<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillPath AI - Bangun Karir Impianmu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-white text-gray-900 font-sans">

    <nav class="flex items-center justify-between px-6 py-4 max-w-7xl mx-auto border-b border-gray-100">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">S</div>
            <span class="text-xl font-bold text-gray-800 tracking-tight">SkillPath AI</span>
        </div>

        <div class="flex items-center gap-4">
            @auth
                <div class="hidden sm:flex flex-col items-end mr-2">
                    <span class="text-sm font-bold text-gray-900">{{ Auth::user()->name }}</span>
                    <span class="text-xs text-gray-500">{{ Auth::user()->email }}</span>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-red-600 hover:text-red-800 border border-red-200 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                        Keluar
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">Masuk</a>
                <a href="{{ route('register') }}" class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                    Daftar
                </a>
            @endauth
        </div>
    </nav>

    <main class="mt-16 sm:mt-20 px-6 mb-20">
        <div class="max-w-4xl mx-auto">

            @auth
                <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden">
                    <div class="p-8 sm:p-12 text-center bg-gradient-to-b from-blue-50 to-white">
                        <span class="inline-block py-1 px-3 rounded-full bg-blue-100 text-blue-700 text-xs font-bold tracking-wide mb-4">
                            AI LEARNING GENERATOR
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 mb-4">
                            Halo, {{ explode(' ', Auth::user()->name)[0] }}! 👋
                        </h2>
                        <p class="text-lg text-gray-600 mb-8">
                            Ketik skill atau karir apa yang ingin kamu pelajari.<br>
                            AI akan membuatkan roadmap lengkap dalam hitungan detik.
                        </p>

                        <form action="#" method="POST" class="max-w-2xl mx-auto relative">
                            @csrf
                            <div class="relative">
                                <textarea
                                    name="prompt"
                                    rows="3"
                                    class="block w-full rounded-2xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-lg p-5 pr-32 resize-none"
                                    placeholder="Contoh: Saya ingin belajar Laravel 10 dari nol sampai bisa membuat website toko online..."></textarea>

                                <button type="submit" class="absolute bottom-3 right-3 px-6 py-2 bg-gray-900 text-white font-bold rounded-xl hover:bg-gray-800 transition shadow-lg flex items-center gap-2">
                                    <span>Generate</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                </button>
                            </div>
                            <p class="text-xs text-gray-400 mt-3 text-left pl-2">
                                *Tips: Semakin detail permintaanmu, semakin akurat kurikulumnya.
                            </p> b
                        </form>
                    </div>

                    <div class="bg-gray-50 p-8 border-t border-gray-100">
                        <h3 class="font-bold text-gray-700 mb-4">Roadmap Saya</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center text-gray-400">
                                <p class="text-sm">Belum ada roadmap dibuat.</p>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                <div class="text-center">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-xs font-semibold uppercase tracking-wide mb-6">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                        Powered by PNM
                    </div>

                    <h1 class="text-5xl sm:text-6xl font-extrabold text-gray-900 tracking-tight leading-tight mb-6">
                        Belajar Skill Baru Tanpa <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Bingung Arah.</span>
                    </h1>

                    <p class="text-lg sm:text-xl text-gray-600 mb-10 leading-relaxed max-w-2xl mx-auto">
                        SkillPath AI membuatkan kurikulum belajar personal untukmu. Hemat waktu riset, fokus belajar, dan capai target karir lebih cepat.
                    </p>

                    <div class="flex justify-center gap-4">
                        <a href="{{ route('register') }}" class="px-8 py-3.5 text-base font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition shadow-xl shadow-blue-500/20">
                            Mulai Gratis Sekarang &rarr;
                        </a>
                    </div>

                    <div class="mt-16 rounded-2xl border border-gray-200 bg-gray-50/50 p-2 shadow-2xl rotate-1 hover:rotate-0 transition duration-500">
                        <div class="rounded-xl overflow-hidden bg-white border border-gray-200 aspect-[16/9] flex items-center justify-center text-gray-400">
                             <span class="text-sm font-medium">✨ Dashboard SkillPath AI Preview</span>
                        </div>
                    </div>
                </div>
            @endauth

        </div>
    </main>

    <footer class="mt-auto py-8 border-t border-gray-100 text-center text-gray-500 text-sm">
        &copy; {{ date('Y') }} SkillPath AI. Techcomfest 2026.
    </footer>

</body>
</html>
