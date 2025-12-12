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
  

    <div class="p-6">
        <h1 class="text-3xl font-bold mb-6">Report Management</h1>

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="w-full table-auto">
                <thead class="bg-blue-600 text-left">
                    <tr class="text-white">
                        <th class="p-4">User</th>
                        <th class="p-4">Resource URL</th> 
                        <th class="p-4">Reason / Description</th> 
                        <th class="p-4">Date</th>
                        <th class="p-4 text-right">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($reports as $item)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4 font-medium">
                            {{ $item->user->name ?? 'Unknown User' }}
                        </td>

                        <td class="p-4 text-blue-500">
                            <a href="{{ $item->resource->url ?? '#' }}" target="_blank" class="hover:underline">
                                View Resource
                            </a>
                        </td>

                        <td class="p-4">
                            {{ $item->reason ?? $item->description ?? '-' }}
                        </td>

                        <td class="p-4">
                            {{ $item->created_at->format('d M Y') }}
                        </td>

                        <td class="p-4 text-right flex justify-end items-center gap-2">

                            <a href="{{ request()->fullUrlWithQuery(['edit_id' => $item->id]) }}" 
                               class="bg-indigo-100 text-indigo-700 px-3 py-1.5 rounded-lg text-sm font-semibold hover:bg-indigo-200 transition flex items-center gap-1">
                                <span>🔧 Fix</span>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">
                            No reports found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>

    {{-- modal popup --}}
    @if(isset($editing) && $editing)
    <div class="fixed inset-0 z-50 overflow-y-auto" >
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            
            <a href="{{ route('admin.reports') }}" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity cursor-default"></a>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#803;</span>
            
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full z-10 relative">
                
                <form method="POST" action="{{ route('admin.reports.fixLink', $editing->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    Perbaiki Link Resource
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 mb-2">
                                        Judul Materi: <strong class="text-gray-800">{{ $editing->resource->title ?? 'Judul Tidak Ditemukan' }}</strong>
                                    </p>

                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1">Link Rusak / Lama</label>
                                    <div class="flex gap-2 mb-4">
                                        <input type="text" 
                                            value="{{ $editing->resource->url ?? '' }}" 
                                            class="w-full bg-red-50 text-red-600 text-sm border border-red-200 rounded px-2 py-1" 
                                            readonly>
                                        
                                        <a href="https://www.google.com/search?q={{ urlencode(($editing->resource->title ?? '') . ' tutorial') }}" 
                                           target="_blank" 
                                           class="flex-shrink-0 bg-gray-100 border border-gray-300 text-gray-700 px-3 py-1 rounded text-xs flex items-center hover:bg-gray-200 font-bold">
                                             Cari
                                        </a>
                                    </div>

                                    <label class="block text-xs font-semibold text-green-700 uppercase tracking-wide mb-1">Link Baru (Perbaikan)</label>
                                    <input type="url" name="new_url" required autofocus
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 outline-none shadow-sm"
                                        placeholder="Tempel link yang benar di sini...">
                                    
                                    <p class="text-xs text-gray-400 mt-2 italic">
                                        *Laporan akan otomatis ditandai 'Resolved' setelah disimpan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                            Simpan Perubahan
                        </button>
                        
                        <a href="{{ route('admin.reports') }}" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

</x-app-layout>