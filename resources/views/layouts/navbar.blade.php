<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>SkillPath AI - Bangun Karir Impianmu</title>
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
</head>
