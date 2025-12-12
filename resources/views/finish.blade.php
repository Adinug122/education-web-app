<x-userlayouts>
 <title>Selesai! - {{ $roadmap->title }}</title>


    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="max-w-2xl w-full bg-white rounded-3xl shadow-xl overflow-hidden text-center p-10 relative">
            
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500"></div>

            <div class="mb-6 inline-flex p-5 rounded-full bg-blue-50 text-blue-600 mb-6 animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>

            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-800 mb-4">
                Luar Biasa, {{ Auth::user()->name }}! 🎉
            </h1>
            <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                Selamat! Anda telah menyelesaikan semua langkah di roadmap <br>
                <span class="font-bold text-blue-600">"{{ $roadmap->title }}"</span>.
                <br>Satu skill baru telah dikuasai.
            </p>

            <div class="flex justify-center gap-4 mb-10">
                <div class="bg-gray-50 px-6 py-3 rounded-xl border border-gray-100">
                    <span class="block text-2xl font-bold text-gray-800">{{ $roadmap->steps->count() }}</span>
                    <span class="text-xs text-gray-500 uppercase font-semibold">Langkah</span>
                </div>
                <div class="bg-gray-50 px-6 py-3 rounded-xl border border-gray-100">
                    <span class="block text-2xl font-bold text-green-600">100%</span>
                    <span class="text-xs text-gray-500 uppercase font-semibold">Tuntas</span>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('home') }}" class="px-8 py-3 bg-gray-100 text-gray-700 font-semibold rounded-xl hover:bg-gray-200 transition">
                    Kembali ke Dashboard
                </a>
                
              
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            var duration = 3 * 1000;
            var animationEnd = Date.now() + duration;
            var defaults = { startVelocity: 30, spread: 360, ticks: 60, zIndex: 0 };

            function randomInRange(min, max) {
                return Math.random() * (max - min) + min;
            }

            var interval = setInterval(function() {
                var timeLeft = animationEnd - Date.now();

                if (timeLeft <= 0) {
                    return clearInterval(interval);
                }

                var particleCount = 50 * (timeLeft / duration);
                confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } }));
                confetti(Object.assign({}, defaults, { particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } }));
            }, 250);
        });
    </script>
</x-userlayouts>
   
