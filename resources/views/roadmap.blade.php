<x-userlayouts>
       <title>{{ $roadmap->title }}</title>
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

                <div class="flex gap-2 text-xs sm:text-sm md:text-base">
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
                <span>{{ $completedCount }} / {{ $roadmap->steps->count() }} langkah</span>
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

                    <div class="flex items-center gap-2 w-full">
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
                        
                       <div class="flex items-center justify-between bg-gray-100 rounded-lg px-3 py-2 hover:bg-gray-200 transition group">
            
            <a href="{{ $res->url }}" 
               target="_blank"
               class="flex-1 font-medium text-gray-700 hover:text-blue-600 truncate mr-2">
               {{ $res->title }}
            </a>

            <a href="{{ route('report.create', $res->id) }}" 
               title="Laporkan Masalah"
               class="flex-shrink-0 text-gray-400 hover:text-red-500 transition">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#a5a3ff"><path d="M480-280q17 0 28.5-11.5T520-320q0-17-11.5-28.5T480-360q-17 0-28.5 
                    11.5T440-320q0
                     17 11.5 28.5T480-280Zm-40-160h80v-240h-80v240ZM330-120 120-330v-300l210-210h300l210 210v300L630-120H330Zm34-80h232l164-164v-232L596-760H364L200-596v232l164 164Zm116-280Z"/></svg>
            </a>

        </div>
                        @endforeach
                    </div>
@php
                // Cek apakah user sudah menyelesaikan langkah ini
                $isCompleted = auth()->user()->hasCompleted($step->id);
            @endphp

            <form action="{{ route('roadmap.step.complete', $step->id) }}#step-{{ $step->id }}" method="POST">
                @csrf
                <button type="submit" 
                    class="w-full rounded-lg py-2.5 font-semibold transition-all text-sm flex items-center justify-center gap-2 mt-5
                    {{ $isCompleted ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-gradient-to-r from-blue-600 to-indigo-500 text-white hover:shadow-lg hover:brightness-110' }}">
                    
                    @if($isCompleted)
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    @endif

                    <span>{{ $isCompleted ? 'Selesai' : 'Tandai Selesai' }}</span>
                </button>
            </form>

                </div>
                @endforeach

            </div>

        </div>

    </div>
</main>
</div>
</x-userlayouts>


