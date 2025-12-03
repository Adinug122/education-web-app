<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $roadmap->title }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('layouts.navbar')

<div class="bg-gray-50 p-8 border-t border-gray-100">

<main class="mt-6 mb-20">
    <div class="max-w-7xl mx-auto">

        <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-gray-700 mb-4">
            <img src="{{ asset('img/back.svg') }}" class="w-5">
            Roadmap Saya
        </a>

        <div class="bg-gradient-to-r from-blue-600 to-indigo-500 rounded-3xl p-8 text-white shadow-xl mt-10">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold">{{ $roadmap->title }}</h2>

                <div class="flex gap-2">
                    <span class="px-3 py-1 text-sm bg-white/20 rounded-full flex items-center gap-1">
                        <img src="{{ asset('img/Clock.svg') }}" class="w-[18px]">  
                        {{ $roadmap->estimasi ?? '-' }}
                    </span>
                </div>
            </div>

            <p class="text-white/90 text-lg mb-4">
                Roadmap pembelajaran yang dipersonalisasi untuk Anda.
            </p>

            <div class="flex items-center justify-between text-sm mb-2">
                <span>Progress Pembelajaran</span>
                <span>0 / {{ $roadmap->steps->count() }} langkah</span>
            </div>

            <div class="w-full bg-white/30 h-2 rounded-full overflow-hidden">
                <div class="h-full bg-white rounded-full" style="width: 0%;"></div>
            </div>
        </div>

        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">

            <div class="bg-white mt-10 p-5 rounded-xl shadow-md space-y-3">
                <h1 class="font-semibold flex items-center gap-2 text-gray-700">
                    <img src="{{ asset('img/book.svg') }}" class="w-6 h-6">
                    Timeline Belajar
                </h1>

                @foreach ($roadmap->steps as $step)
                <div class="flex ml-1 gap-4 mt-3">
                    <div class="flex flex-col items-center">
                        <div class="w-4 h-4 border-2 border-blue-400 rounded-full"></div>
                        <div class="w-[2px] h-10 bg-gray-300"></div>
                    </div>

                    <div>
                        <h2 class="font-semibold text-gray-800">
                            Langkah {{ $loop->iteration }}: {{ $step->title }}
                        </h2>
                        <p class="text-sm text-gray-500">{{ $step->description }}</p>
                    </div>
                </div>
                @endforeach

            </div>

            <div class="col-span-2 bg-white rounded-xl mt-10 p-5 gap-3 shadow-md">

                @foreach ($roadmap->steps as $step)
                <div class="mb-8">

                    <div class="flex items-center gap-2">
                        <div class="bg-[#DBEAFE] text-blue-800 rounded-full w-10 h-10 flex items-center justify-center">
                            {{ $loop->iteration }}
                        </div>

                        <div>
                            <h1 class="font-semibold text-gray-800">{{ $step->title }}</h1>
                        
                        </div>
                    </div>

                    
                    <div class="mt-6 flex items-center gap-2 text-gray-700">
                        <img src="{{ asset('img/link.svg') }}" class="w-5">
                        <h1 class="font-semibold">Sumber Belajar</h1>
                    </div>

                    <div class="grid grid-cols-2 gap-3 mt-3">
                        @foreach ($step->resources as $res)
                        <a href="{{ $res->url }}" 
                           target="_blank"
                           class="bg-gray-100 rounded-lg px-3 py-2 hover:bg-gray-200">
                           {{ $res->title }}
                        </a>
                        @endforeach
                    </div>

                    <button class="bg-gradient-to-r from-blue-600 to-indigo-500 mt-4 w-full rounded-md py-2 text-white font-semibold hover:brightness-110">
                        Tandai selesai
                    </button>

                </div>
                @endforeach

            </div>

        </div>

    </div>
</main>
</div>
</body>
</html>
