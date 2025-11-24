<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillPath AI - Bangun Karir Impianmu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('layouts.navbar')
   <div class="bg-gray-50 p-8 border-t border-gray-100">
  
<main class="mt-6 mb-20"">
    
    <div class="max-w-7xl mx-auto">
        <a href="{{ route('home') }}" class="flex items-center gap-2 font-bold text-gray-700 mb-4">
    <img src="{{ asset('img/back.svg') }}" class="w-5" alt="back">
    Roadmap Saya
</a>

          <div class="bg-gradient-to-r from-blue-600 to-indigo-500  rounded-3xl p-8 tet-white shadow-xl mt-10 text-white">

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold">Belajar Web Development dengan React</h2>

        <div class="flex gap-2">
            <span class="px-3 py-1 text-sm bg-white/20 rounded-full flex items-center gap-1">
               <img src="{{ asset('img/Clock.svg') }}" class="w-[18px] items-center">  69 bulan
            </span>
            <span class="px-3 py-1 text-sm bg-white/20 rounded-full flex items-center gap-1">
                 Menengah
            </span>
        </div>
    </div>

    <p class="text-white/90 text-lg mb-6">
        Roadmap pembelajaran yang dipersonalisasi untuk Anda.
    </p>

    <div class="flex items-center justify-between text-sm mb-2">
        <span>Progress Pembelajaran</span>
        <span>0 / 12 langkah</span>
    </div>

  
    <div class="w-full bg-white/30 h-2 rounded-full overflow-hidden">
        <div class="h-full bg-white rounded-full" style="width: 0%;"></div>
    </div>

</div>

           <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
          <div class="bg-white order-first mt-10 p-5 rounded-xl shadow-md space-x-6">
    <h1 class="font-semibold flex items-center gap-2 text-gray-700">
        <img src="{{ asset('img/book.svg') }}" class="w-6 h-6" alt="buku">
        Timeline Belajar
    </h1>
       <div class="flex ml-1 gap-4 mt-3">
     
        <div class="flex flex-col  items-center">
            <div class="w-4 h-4 border-2 border-blue-400 rounded-full"></div>
            <div class="w-[2px] h-10 bg-gray-300"></div>
        </div>


        <div>
            <h2 class="font-semibold text-gray-800">Langkah 1: Fundamental HTML & CSS</h2>
            <p class="text-sm text-gray-500">4-6 minggu</p>
        </div>
    </div>
    
</div>
    <div class="col-span-2 bg-white rounded-xl mt-10 p-5 gap-3 shadow-md">
        <div class="flex items-center gap-2">
            <div class="bg-[#DBEAFE] text-blue-800 rounded-full w-10 h-10 flex items-center justify-center">
    1
</div>
<div class="flex-row">
    <h1 class="font-semibold     text-gray-800">Fundamental HTML CSS</h1>
<h2 class=" text-gray-600 font-semibold">4 Minggu</h2>
</div>

        </div>
        <div class="mt-5 text-gray-600 ">
            Pelajari dasar-dasar pembuatan website dengan HTML dan CSS untuk membuat tampilan web yang menarik
        </div>
       <div class="mt-5 text-gray-700 flex gap-2">
        <img src="{{ asset('img/book.svg') }}" alt="buku">
        <h1>Topik Yang dipelajari</h1>
       </div>
       <div class="flex gap-3">
            <div class="bg-[#DBEAFE] text-blue-700 mt-2 rounded-xl ">
                <h1 class="text-sm px-2 py-1  " >HTML5 Semantic</h1>
            </div>
            <div class="bg-[#DBEAFE] text-blue-700 mt-2 rounded-xl ">
                <h1 class="text-sm px-2 py-1  " >CSS Flexbox</h1>
            </div>
            <div class="bg-[#DBEAFE] text-blue-700 mt-2 rounded-xl ">
                <h1 class="text-sm px-2 py-1  " >CSS Animasi</h1>
            </div>
       </div>
         <div class="mt-6 flex items-center gap-2 text-gray-700">
        <img src="{{ asset('img/check.svg') }}" class="w-5" alt="">
        <h1 class="font-semibold">Skills yang Dikuasai</h1>
    </div>
<ul class="mt-2 text-gray-600 space-y-2">
    <li class="flex items-center gap-2">
        <img src="{{ asset('img/check.svg') }}" alt="Check" class="w-5 h-5">
        Membuat layout responsive
    </li>
    <li class="flex items-center gap-2">
        <img src="{{ asset('img/check.svg') }}" alt="Check" class="w-5 h-5">
        Styling komponen
    </li>
    <li class="flex items-center gap-2">
        <img src="{{ asset('img/check.svg') }}" alt="Check" class="w-5 h-5">
        CSS best practices
    </li>
</ul>


   
    <div class="mt-6 flex items-center gap-2 text-gray-700">
        <img src="{{ asset('img/link.svg') }}" class="w-5" alt="">
        <h1 class="font-semibold">Sumber Belajar</h1>
    </div>

    <div class="grid grid-cols-2 gap-3 mt-3">
        <a href="#" class="bg-gray-100 rounded-lg px-3 py-2 hover:bg-gray-200">MDN Web Docs</a>
        <a href="#" class="bg-gray-100 rounded-lg px-3 py-2 hover:bg-gray-200">freeCodeCamp</a>
        <a href="#" class="bg-gray-100 rounded-lg px-3 py-2 hover:bg-gray-200">CSS Tricks</a>
        <a href="#" class="bg-gray-100 rounded-lg px-3 py-2 hover:bg-gray-200">W3Schools</a>
    </div>
<button class="bg-gradient-to-r from-blue-600 to-indigo-500 mt-4 w-full rounded-md py-2 text-white font-semibold hover:brightness-110">
        Tandai selesai
    </button>
    
</div>
    
    
    </div>
    </div>
 
</main>
 
</div> 
</body>

