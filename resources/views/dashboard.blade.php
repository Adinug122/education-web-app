<x-app-layout>

     <x-slot name="header">
         <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
       
             <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48" class="z-50">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>        
    </x-slot>
  

   

    <!-- MAIN CONTENT -->

<div>
            <h2 class="text-3xl font-bold  mb-1">
                Dashboard
            </h2>
            <p class="text-slate-600 text-lg">
                Selamat datang kembali, <span class="font-semibold ">{{ Auth::user()->name }}</span>!
            </p>
            
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-5">
              <div class="bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden group">
                    <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2 group-hover:scale-110 transition-transform">
                        <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="text-blue-100 text-sm font-medium uppercase tracking-wider">Total User</p>
                        <h3 class="text-3xl font-bold mt-1">{{ $totalUser }}</h3>
                        <p class="text-blue-200 text-xs mt-2 flex items-center gap-1">
                            
                        </p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-600 to-indigo-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden group">
                    <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2 group-hover:scale-110 transition-transform">
                        <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="text-purple-100 text-sm font-medium uppercase tracking-wider">Roadmap Terbuat</p>
                        <h3 class="text-3xl font-bold mt-1">{{ $roadmaps }}</h3>
                        <p class="text-purple-200 texts-xs mt-2 flex items-center gap-1">
                        
                        </p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden group">
                    <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2 group-hover:scale-110 transition-transform">
                        <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="text-emerald-100 text-sm font-medium uppercase tracking-wider">Total Materi</p>
                        <h3 class="text-3xl font-bold mt-1">{{ $totalMateri }}</h3>
                        <p class="text-emerald-200 text-xs mt-2">
                            Video & Artikel terindeks
                        </p>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-amber-500 to-orange-600 rounded-2xl shadow-xl p-6 text-white relative overflow-hidden group">
                    <div class="absolute right-0 top-0 opacity-10 transform translate-x-2 -translate-y-2 group-hover:scale-110 transition-transform">
                        <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <p class="text-amber-100 text-sm font-medium uppercase tracking-wider">Laporan</p>
                        <h3 class="text-3xl font-bold mt-1">{{ $laporan }}</h3>
                        <p class="text-amber-200 text-xs mt-2">
                     
                        </p>
                    </div>
                </div>
            </div>
    


            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="mt-10 bg-white p-6 rounded-xl shadow-md">

    <h2 class="text-2xl font-semibold mb-4">Statistik Roadmap</h2>

    <div class="w-full">
        <canvas id="roadmapChart" height="120"></canvas>
    </div>

</div>
                    <div class="mt-10 bg-white p-6 rounded-xl shadow-md">

    <h2 class="text-2xl font-semibold mb-4">Statistik Laporan</h2>

    <div class="w-full flex justify-center">

     <div class="w-[60%]">
        <canvas id="reportChart"></canvas>
    </div>
    </div>

</div>
            </div>

   
    
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('roadmapChart');
const report = document.getElementById('reportChart');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json($roadmapPerMonth->pluck('month')),
        datasets: [{
            label: 'Roadmap Dibuat',
            data: @json($roadmapPerMonth->pluck('total')),
        }]
    }
});

new Chart(report, {
    type: 'pie',
    data: {
        labels: @json($laporanStatus->pluck('status')),
        datasets: [{
            label: 'Laporan',
            data: @json($laporanStatus->pluck('total')),
        }]
    }
});
</script>
</x-app-layout>
