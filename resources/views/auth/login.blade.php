<x-guest-layout>
    <x-slot name="title">Defind | Login</x-slot>

    <div class="mb-10">
        <h2 class="text-3xl font-bold text-gray-900">Selamat Datang!</h2>
        <p class="text-gray-500 mt-2 text-base">Masukan detail akun anda untuk login.</p>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
            <input id="email" class="block w-full rounded-xl border-gray-200 bg-white shadow-sm px-4 py-3.5 text-gray-700 focus:border-brand-500 focus:ring-brand-500 transition-all duration-200" 
                   type="email" name="email" :value="old('email')" required autofocus autocomplete="username" 
                   placeholder="Masukkan Email Anda" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <div class="flex items-center justify-between mb-2">
                <label for="password" class="block text-sm font-semibold text-gray-700">Password</label>
            </div>
            <input id="password" class="block w-full rounded-xl border-gray-200 bg-white shadow-sm px-4 py-3.5 text-gray-700 focus:border-brand-500 focus:ring-brand-500 transition-all duration-200"
                   type="password" name="password" required autocomplete="current-password" 
                   placeholder="••••••••" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-brand-600 shadow-sm focus:ring-brand-500 transition cursor-pointer" name="remember">
                <span class="ms-2 text-sm text-gray-600 group-hover:text-gray-900">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-brand-600 hover:text-brand-800 hover:underline transition" href="{{ route('password.request') }}">
                    Lupa Password?
                </a>
            @endif
        </div>

        <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-4 bg-brand-600 border border-transparent rounded-xl font-bold text-white text-base hover:bg-brand-700 focus:bg-brand-700 active:bg-brand-900 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 transition-all shadow-lg shadow-brand-500/30 hover:shadow-brand-500/50 hover:-translate-y-0.5">
            Masuk Sekarang
        </button>

        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="bg-gray-50 px-2 text-gray-500">Atau</span>
            </div>
        </div>

        <p class="text-center text-gray-600 text-sm">
            Belum memiliki akun? 
            <a href="{{ route('register') }}" class="font-bold text-brand-600 hover:text-brand-800 hover:underline transition">Daftar Gratis</a>
        </p>
    </form>
</x-guest-layout>