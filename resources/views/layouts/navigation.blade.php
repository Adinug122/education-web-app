<aside class="w-64 bg-gradient-to-br from-blue-600 to-cyan-500 text-white p-6 min-h-screen">
    <div class="flex items-center gap-3 mb-8">
        <img src="{{ asset('img/4x4.png') }}" alt="logo" class="bg-white rounded-lg w-10 h-10 object-contain p-1">
        <span class="text-2xl font-extrabold tracking-tight text-transparent bg-clip-text bg-white">
            Define
        </span>
    </div>

    <nav class="space-y-2">
        
        <a href="{{ route('dashboard') }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-white/10 hover:translate-x-1 {{ request()->routeIs('dashboard') ? 'bg-white/20 font-semibold' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
            </svg>
            <span class="text-lg">Dashboard</span>
        </a>
        <a href="{{ route('admin.reports') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-white/10 hover:translate-x-1 {{ request()->routeIs('admin.reports') ? 'bg-white/20 font-semibold': '' }}">
           <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5" />
</svg>

            <span class="text-lg">Laporan</span>
        </a>

        <a href="{{ route('user') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 hover:bg-white/10 hover:translate-x-1 {{ request()->routeIs('user') ? 'bg-white/20 font-semibold': '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" view    Box="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
            <span class="text-lg">Users</span>
        </a>

      

    </nav>
</aside>