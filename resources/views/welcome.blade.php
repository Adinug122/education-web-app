<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillPath AI - Bangun Karir Impianmu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .bg-grid-pattern {
            background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
            background-size: 24px 24px;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-white text-gray-900 bg-grid-pattern relative">


    <div
        class="absolute top-0 left-0 right-0 -z-10 h-[500px] bg-gradient-to-b from-blue-50/80 to-transparent pointer-events-none">
    </div>

    <nav class="flex items-center justify-between px-6 py-4 max-w-7xl mx-auto border-b border-gray-100">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">S
            </div> <span class="text-xl font-bold text-gray-800 tracking-tight">SkillPath AI</span>
        </div>
        <div class="flex items-center gap-4"> @auth <div class="hidden sm:flex flex-col items-end mr-2"> <span
                    class="text-sm font-bold text-gray-900">{{ Auth::user()->name }}</span> <span
                    class="text-xs text-gray-500">{{ Auth::user()->email }}</span> </div>
            <form method="POST" action="{{ route('logout') }}"> 
                @csrf <button type="submit"
                    class="text-sm font-medium text-red-600 hover:text-red-800 border border-red-200 px-4 py-2 rounded-lg hover:bg-red-50 transition">
        Keluar </button> </form> 
        @else 
        <a href="{{ route('login') }}"
                        class="text-sm font-medium text-gray-600 hover:text-gray-900">Masuk</a> <a
                        href="{{ route('register') }}"
                        class="px-5 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-full hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                    Daftar </a> @endauth
        </div>
    </nav>
    <main class="mt-12 sm:mt-16 px-6 mb-20 relative z-10">
        <div class="max-w-5xl mx-auto">

            @auth
                {{-- User Dashboard View --}}
                <div
                    class="bg-white rounded-[2rem] shadow-2xl shadow-blue-900/5 border border-white overflow-hidden ring-1 ring-gray-100">
                    <div class="p-8 sm:p-14 text-center bg-gradient-to-b from-blue-50/50 via-white to-white">

                        <div
                            class="inline-flex items-center gap-2 py-1.5 px-4 rounded-full bg-blue-100/50 text-blue-700 text-xs font-bold tracking-wide mb-6 border border-blue-100">
                            <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                            AI LEARNING GENERATOR
                        </div>

                        <h2 class="text-3xl sm:text-5xl font-extrabold text-gray-900 mb-5 tracking-tight">
                            Halo, <span class="text-blue-600">{{ explode(' ', Auth::user()->name)[0] }}!</span> 👋
                        </h2>
                        <p class="text-lg text-gray-500 mb-10 max-w-2xl mx-auto leading-relaxed">
                            Mau belajar apa hari ini? Ketik skill impianmu, biar AI yang buatkan peta jalannya.
                        </p>

                        <form action="#" method="POST" class="max-w-2xl mx-auto relative group">
                            @csrf
                            <div class="relative transition-all duration-300 transform group-focus-within:scale-[1.01]">
                                <div
                                    class="absolute -inset-0.5 bg-gradient-to-r from-blue-400 to-cyan-400 rounded-2xl opacity-20 group-focus-within:opacity-50 blur transition duration-300">
                                </div>
                                <textarea name="prompt" rows="3"
                                    class="relative block w-full rounded-2xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-lg p-6 pr-36 resize-none placeholder:text-gray-400 bg-white"
                                    placeholder="Contoh: Saya ingin belajar Laravel 10 dari nol sampai bisa membuat website toko online..."></textarea>

                                <button type="submit"
                                    class="absolute bottom-3 right-3 px-5 py-2.5 bg-gray-900 text-white font-bold rounded-xl hover:bg-blue-600 transition-all shadow-md flex items-center gap-2 group-hover:shadow-lg">
                                    <span>Generate</span>
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </button>
                            </div>
                            <p class="text-xs text-gray-400 mt-3 text-left pl-3 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Tips: Semakin detail permintaanmu, semakin akurat kurikulumnya.
                            </p>
                        </form>
                    </div>

                    <div class="bg-gray-50/80 backdrop-blur p-8 sm:p-10 border-t border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-bold text-gray-800 text-lg flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                                Roadmap Saya
                            </h3>
                            <button class="text-sm text-blue-600 font-semibold hover:underline">Lihat Semua</button>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                            <div
                                class="border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center hover:border-blue-300 hover:bg-blue-50/30 transition-colors cursor-pointer group">
                                <div
                                    class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 text-gray-400 group-hover:text-blue-500 group-hover:bg-blue-100 transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-500 group-hover:text-gray-700">Buat Roadmap Baru</p>
                            </div>
                        </div>
                    </div>
                </div>

            @else
                    <div class="text-center">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 border border-blue-100 text-blue-600 text-xs font-semibold uppercase tracking-wide mb-6">
                            <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span> Powered by PNM
                        </div>
                        <h1 class="text-5xl sm:text-6xl font-extrabold text-gray-900 tracking-tight leading-tight mb-6"> Belajar
                            Skill Baru Tanpa <span
                                class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500">Bingung
                                Arah.</span> </h1>
                        <p class="text-lg sm:text-xl text-gray-600 mb-10 leading-relaxed max-w-2xl mx-auto"> SkillPath AI
                            membuatkan kurikulum belajar personal untukmu. Hemat waktu riset, fokus belajar, dan capai target
                            karir lebih cepat. </p>
                        <div class="flex justify-center gap-4"> <a href="{{ route('register') }}"
                                class="px-8 py-3.5 text-base font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition shadow-xl shadow-blue-500/20">
                                Mulai Gratis Sekarang &rarr; </a>
                            <a href="#how-it-works"
                                class="px-8 py-4 text-base font-bold text-gray-700 bg-white border border-gray-200 rounded-xl hover:bg-gray-50 transition-all shadow-sm hover:shadow-md">
                                Pelajari Cara Kerja
                            </a>
                        </div>

                    </div>


                    <div class="relative max-w-4xl mx-auto mt-16">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-2xl opacity-20 blur-lg">
                        </div>

                        <div
                            class="relative rounded-xl border border-gray-200 bg-white shadow-2xl overflow-hidden aspect-[16/9]  flex flex-col transform rotate-1 hover:rotate-0 transition-transform duration-700 ease-out">
                            <div class="h-8 bg-gray-50 border-b border-gray-100 flex items-center px-4 gap-2">
                                <div class="w-2.5 h-2.5 rounded-full bg-red-400"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-yellow-400"></div>
                                <div class="w-2.5 h-2.5 rounded-full bg-green-400"></div>
                            </div>
                            <div class="flex flex-1 overflow-hidden">
                                <div class="w-1/4 bg-gray-50 border-r border-gray-100 p-4 hidden sm:block">
                                    <div class="h-4 w-24 bg-gray-200 rounded mb-6"></div>
                                    <div class="space-y-3">
                                        <div class="h-3 w-full bg-blue-100 rounded"></div>
                                        <div class="h-3 w-3/4 bg-gray-200 rounded"></div>
                                        <div class="h-3 w-5/6 bg-gray-200 rounded"></div>
                                    </div>
                                </div>
                                <div class="flex-1 p-6 text-left">
                                    <div class="flex items-center gap-3 mb-6">
                                        <div
                                            class="h-10 w-10 bg-blue-600 rounded-lg flex items-center justify-center text-white text-xs">
                                            AI</div>
                                        <div>
                                            <div class="h-4 w-32 bg-gray-800 rounded mb-1"></div>
                                            <div class="h-2 w-20 bg-gray-300 rounded"></div>
                                        </div>
                                    </div>
                                    <div class="space-y-4">
                                        <div class="p-4 border border-gray-100 rounded-lg flex items-center gap-3">
                                            <div class="w-6 h-6 rounded-full border-2 border-blue-500"></div>
                                            <div class="h-3 w-1/2 bg-gray-600 rounded"></div>
                                        </div>
                                        <div class="p-4 border border-gray-100 rounded-lg flex items-center gap-3 opacity-50">
                                            <div class="w-6 h-6 rounded-full border-2 border-gray-300"></div>
                                            <div class="h-3 w-2/3 bg-gray-300 rounded"></div>
                                        </div>
                                        <div class="p-4 border border-gray-100 rounded-lg flex items-center gap-3 opacity-50">
                                            <div class="w-6 h-6 rounded-full border-2 border-gray-300"></div>
                                            <div class="h-3 w-1/3 bg-gray-300 rounded"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endauth



        </div>

        <div id="features" class="py-24 relative">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Kenapa Memilih SkillPath AI?</h2>
                <p class="text-gray-500 text-lg">Kami menggabungkan kurikulum standar industri dengan personalisasi AI.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">

                <div
                    class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg  hover:shadow-xl transition duration-300">
                    <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Roadmap Otomatis</h3>
                    <p class="text-gray-500 leading-relaxed">Ai Menciptakan roadmap belajar yang terstruktur dan sesuai
                        dengan tujuan karirmu</p>
                </div>


                <div
                    class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg  hover:shadow-xl transition duration-300">
                    <div class="w-12 h-12 bg-teal-100 text-teal-600 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Tersusun Rapi</h3>
                    <p class="text-gray-500 leading-relaxed">Materi disusun dari level pemula hingga mahir (Zero to
                        Hero) secara logis agar kamu tidak bingung harus mulai darimana.</p>
                </div>


                <div
                    class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg  hover:shadow-xl transition duration-300">
                    <div
                        class="w-12 h-12 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center mx-auto mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Karir Oriented</h3>
                    <p class="text-gray-500 leading-relaxed">AI kami dilatih berdasarkan deskripsi pekerjaan nyata,
                        memastikan skill yang kamu pelajari relevan dengan industri.</p>
                </div>
            </div>
        </div>



        <div id="how-it-works"
            class="py-20 bg-gradient-to-br from-blue-900 to-indigo-950 rounded-[3rem] text-white overflow-hidden relative isolate shadow-2xl shadow-blue-900/40 my-20">

            <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full blur-[100px] -z-10"></div>
            <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-purple-500/20 rounded-full blur-[100px] -z-10"></div>

            <div class="relative z-10 px-6 sm:px-12 text-center max-w-7xl mx-auto">
                <h2 class="text-3xl sm:text-4xl font-extrabold mb-4 tracking-tight">Hanya 4 Langkah Mudah</h2>
                <p class="text-blue-200 mb-16 max-w-2xl mx-auto">Tidak perlu bingung mulai darimana. Ikuti alur yang
                    sudah kami rancang untuk kesuksesan karirmu.</p>


                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 relative">

                    <div
                        class="hidden md:block absolute top-[3.5rem] left-[10%] w-[80%] h-1 bg-blue-800/50 rounded-full -z-10">
                    </div>

                    <div class="group relative flex flex-col items-center">
                        <div
                            class="w-28 h-28 bg-blue-950 border-4 border-blue-600 rounded-full flex items-center justify-center mb-6 shadow-xl shadow-blue-900/50 group-hover:scale-110 transition-transform duration-300 relative">
                            <div
                                class="absolute inset-0 bg-blue-600 rounded-full opacity-0 group-hover:opacity-20 transition-opacity">
                            </div>
                            <span class="text-4xl"><img src="{{ asset('img/keyboard.png') }}" alt=""
                                    class="rounded-full"></span>
                            <div
                                class="absolute -top-3 -right-3 w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center text-sm font-bold border-2 border-blue-900">
                                1</div>
                        </div>
                        <h3 class="text-xl font-bold mb-3 group-hover:text-blue-300 transition-colors">Input Prompt</h3>
                        <p class="text-blue-200/80 text-sm leading-relaxed px-2">
                            Ketik skill impianmu. <br>
                            <span class="text-blue-400 italic text-xs">"Contoh: Belajar Data Science"</span>
                        </p>
                    </div>


                    <div class="group relative flex flex-col items-center">
                        <div
                            class="w-28 h-28 bg-blue-950 border-4 border-indigo-500 rounded-full flex items-center justify-center mb-6 shadow-xl shadow-indigo-900/50 group-hover:scale-110 transition-transform duration-300 relative">
                            <div
                                class="absolute inset-0 bg-indigo-500 rounded-full opacity-0 group-hover:opacity-20 transition-opacity">
                            </div>
                            <span class="text-4xl"><img src="{{ asset('img/ai.png') }}" class="rounded-full w-2/2"
                                    alt="ai"></span>
                            <div
                                class="absolute -top-3 -right-3 w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center text-sm font-bold border-2 border-blue-900">
                                2</div>
                        </div>
                        <h3 class="text-xl font-bold mb-3 group-hover:text-indigo-300 transition-colors">AI Bekerja</h3>
                        <p class="text-blue-200/80 text-sm leading-relaxed px-2">
                            Sistem menganalisa kebutuhan industri dan menyusun silabus personal.
                        </p>
                    </div>


                    <div class="group relative flex flex-col items-center">
                        <div
                            class="w-28 h-28 bg-blue-950 border-4 border-cyan-500 rounded-full flex items-center justify-center mb-6 shadow-xl shadow-cyan-900/50 group-hover:scale-110 transition-transform duration-300 relative">
                            <div
                                class="absolute inset-0 bg-cyan-500 rounded-full opacity-0 group-hover:opacity-20 transition-opacity">
                            </div>
                            <span class="text-4xl"><img src="{{ asset('img/roadmap.png') }}" class="rounded-full p-2"
                                    alt=""></span>
                            <div
                                class="absolute -top-3 -right-3 w-8 h-8 bg-cyan-500 rounded-full flex items-center justify-center text-sm font-bold border-2 border-blue-900">
                                3</div>
                        </div>
                        <h3 class="text-xl font-bold mb-3 group-hover:text-cyan-300 transition-colors">Terima Roadmap
                        </h3>
                        <p class="text-blue-200/80 text-sm leading-relaxed px-2">
                            Dapatkan kurikulum "Zero to Hero" lengkap dengan sumber belajarnya.
                        </p>
                    </div>

                    <div class="group relative flex flex-col items-center">
                        <div
                            class="w-28 h-28 bg-white border-4 border-white rounded-full flex items-center justify-center mb-6 shadow-xl shadow-white/20 group-hover:scale-110 transition-transform duration-300 relative">
                            <span class="text-4xl"><img src="{{ asset('img/grafik.jpg') }}" class="rounded-full"
                                    alt=""></span>
                            <div
                                class="absolute -top-3 -right-3 w-8 h-8 bg-gray-900 text-white rounded-full flex items-center justify-center text-sm font-bold border-2 border-white">
                                4</div>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white group-hover:text-blue-200 transition-colors">Mulai
                            & Pantau</h3>
                        <p class="text-blue-200/80 text-sm leading-relaxed px-2">
                            Pelajari materi, checklist progressmu, dan bangun portofolio.
                        </p>
                    </div>

                </div>
            </div>
        </div>
{{-- cocok --}}
        <div class="">
               <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Cocok untuk Siapa Saja</h2>
                <p class="text-gray-500 text-lg">Kami membuat Platform ini cock untuk Siapa Saja
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg  hover:shadow-xl transition duration-300"">
                    <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300"><img src="{{ asset('img/person.svg') }}" alt="person" class="w-10 h-10"></div>
                    <h1 class="text-slate-900 font-semibold text-2xl text-center mb-3">Pemula</h1>
                 <p class="text-center text-gray-500 text-sm leading-tight">
        Baru mulai belajar? Dapatkan panduan lengkap dari nol hingga mahir.
    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg  hover:shadow-xl transition duration-300"">
                    <div class="w-14 h-14 bg-pink-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-pink-600 group-hover:text-white transition-colors duration-300"><img src="{{ asset('img/chart.svg') }}" alt="person" class="w-10 h-10 p-2"></div>
                    <h1 class="text-slate-900 font-semibold text-2xl text-center mb-3">Career Switcher</h1>
                 <p class="text-center text-gray-500 text-sm leading-tight">
       Ingin ganti karir? Dapatkan roadmap transisi yang efektif
    </p>
                </div>
                <div class="bg-white p-8 rounded-2xl border border-gray-100 shadow-lg  hover:shadow-xl transition duration-300"">
                    <div class="w-14 h-14 bg-teal-100 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300"><img src="{{ asset('img/rocket.svg') }}" alt="person" class="w-10 h-10 p-2 "></div>
                    <h1 class="text-slate-900 font-semibold text-2xl text-center mb-3">Profesional</h1>
                 <p class="text-center text-gray-500 text-sm leading-tight">
        Upgrade skill dengan roadmap advanced yang terstruktur
    </p>
                </div>
                
            </div>
        </div>
        





        <div class="py-24 max-w-3xl mx-auto">
            <h2 class="text-3xl font-bold text-gray-900 mb-10 text-center">Sering Ditanyakan</h2>

            <div class="space-y-4">
                <details
                    class="group bg-gray-50 p-6 rounded-2xl border border-gray-100 cursor-pointer open:bg-white open:shadow-lg open:ring-1 open:ring-blue-100 transition-all duration-300">
                    <summary class="flex justify-between items-center font-bold text-gray-800 list-none">
                        Apakah SkillPath AI gratis?
                        <span class="transition group-open:rotate-180">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span>
                    </summary>
                    <p class="text-gray-600 mt-4 leading-relaxed animate-fade-in-down">
                        Ya! Saat ini SkillPath AI dapat digunakan sepenuhnya gratis untuk membantu teman-teman belajar
                        teknologi baru.
                    </p>
                </details>

                <details
                    class="group bg-gray-50 p-6 rounded-2xl border border-gray-100 cursor-pointer open:bg-white open:shadow-lg open:ring-1 open:ring-blue-100 transition-all duration-300">
                    <summary class="flex justify-between items-center font-bold text-gray-800 list-none">
                        Seberapa akurat roadmap yang dibuat?
                        <span class="transition group-open:rotate-180">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span>
                    </summary>
                    <p class="text-gray-600 mt-4 leading-relaxed animate-fade-in-down">
                        AI kami menggunakan data kurikulum terbaru, namun kami menyarankan untuk tetap menggunakannya
                        sebagai panduan awal (outline) dan melakukan riset mendalam pada setiap topiknya.
                    </p>
                </details>

                <details
                    class="group bg-gray-50 p-6 rounded-2xl border border-gray-100 cursor-pointer open:bg-white open:shadow-lg open:ring-1 open:ring-blue-100 transition-all duration-300">
                    <summary class="flex justify-between items-center font-bold text-gray-800 list-none">
                        Apakah saya bisa menyimpan roadmap saya?
                        <span class="transition group-open:rotate-180">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </span>
                    </summary>
                    <p class="text-gray-600 mt-4 leading-relaxed animate-fade-in-down">
                        Tentu saja. Setelah mendaftar (Sign Up), semua roadmap yang kamu generate akan tersimpan
                        otomatis di dashboard akunmu.
                    </p>
                </details>
            </div>
        </div>

     
        <div class="text-center pb-12 bg-gradient-to-br from-blue-600 to-cyan-500 rounded-[3rem]">
            <div class="p-10 max-w-2xl mx-auto ">
                     <h3 class="text-3xl font-bold text-white mb-6 ">Siap Memulai Perjalanan Belajarmu?</h3>
                     <p class="text-base text-white mb-8">Bergabunglah dengan ribuan learner yang sudah menggunakan Devlef untuk mencapai goals mereka</p>
        <a href="{{ route('register') }}"
   class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-blue-900 bg-white rounded-full  transition-all shadow-xl hover:shadow-blue-50 hover:-translate-y-1">
    Buat Akun Sekarang - Gratis
</a>
            </div>
       
        </div>


        </div>

        
    </main>

    <footer class="mt-auto py-8 border-t border-gray-100 bg-white relative z-10">
        <div class="text-center">
            <p class="text-gray-500 text-sm font-medium">&copy; {{ date('Y') }} SkillPath AI. Developed for Techcomfest
                2026.</p>
        </div>
    </footer>

</body>

</html>