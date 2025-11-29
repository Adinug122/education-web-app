<x-guest-layout>
    <x-slot name="title">DevLev AI | Register</x-slot>
    <div class="mb-10">
        <h2 class="text-3xl font-bold text-gray-900">Buat Akun Baru 🚀</h2>
        <p class="text-gray-500 mt-2 text-base">Mari daftarkan akun anda disini untuk memulai belajar.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap</label>
            <input id="name" class="block w-full rounded-xl border-gray-200 bg-white shadow-sm px-4 py-3.5 text-gray-700 focus:border-brand-500 focus:ring-brand-500 transition-all duration-200" 
                   type="text" name="name" :value="old('name')" required autofocus autocomplete="name" 
                   placeholder="Masukkan Nama Anda" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
            <input id="email" class="block w-full rounded-xl border-gray-200 bg-white shadow-sm px-4 py-3.5 text-gray-700 focus:border-brand-500 focus:ring-brand-500 transition-all duration-200" 
                   type="email" name="email" :value="old('email')" required autocomplete="username" 
                   placeholder="Masukkan Email Anda" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
            <input id="password" class="block w-full rounded-xl border-gray-200 bg-white shadow-sm px-4 py-3.5 text-gray-700 focus:border-brand-500 focus:ring-brand-500 transition-all duration-200"
                   type="password" name="password" required autocomplete="new-password" 
                   placeholder="Minimal 8 Karakter" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Konfirmasi Password</label>
            <input id="password_confirmation" class="block w-full rounded-xl border-gray-200 bg-white shadow-sm px-4 py-3.5 text-gray-700 focus:border-brand-500 focus:ring-brand-500 transition-all duration-200"
                   type="password" name="password_confirmation" required autocomplete="new-password" 
                   placeholder="Masukkan Kembali Password Anda" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-4 bg-brand-600 border border-transparent rounded-xl font-bold text-white text-base hover:bg-brand-700 focus:bg-brand-700 active:bg-brand-900 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2 transition-all shadow-lg shadow-brand-500/30 hover:shadow-brand-500/50 hover:-translate-y-0.5">
                Daftar Sekarang
            </button>
        </div>

        <p class="text-center text-gray-600 text-sm mt-6">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="font-bold text-brand-600 hover:text-brand-800 hover:underline transition">Masuk disini</a>
        </p>
    </form>
</x-guest-layout>