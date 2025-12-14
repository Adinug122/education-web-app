<x-userlayouts>
    <div class="bg-gray-50/80 backdrop-blur p-8 sm:p-10 border-t border-gray-100">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="font-bold text-gray-800 text-lg flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                                    </path>
                                </svg>
                                Roadmap Saya
                            </h3>
                            <button class="text-sm text-blue-600 font-semibold hover:underline">Lihat Semua</button>
                        </div>

                        <div  class="relative">
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                @forelse ($roadmaps as $item)
                                   <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition duration-300 flex flex-col h-full relative group overflow-hidden">
    
    @php
        $totalSteps = $item->steps->count();
        $completedSteps = auth()->user() 
            ? auth()->user()->completedSteps()->where('roadmap_id', $item->id)->count() 
            : 0;
        $percentage = $totalSteps > 0 ? round(($completedSteps / $totalSteps) * 100) : 0;
    @endphp

    <div class="p-6 flex-grow">
        <div class="flex justify-between items-start mb-4">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0121 18.382V7.618a1 1 0 01-.553-.894L15 7m0 13V7m0 0L9 4" />
                </svg>
            </div>
            <span class="bg-gray-100 text-gray-600 text-xs font-bold px-2 py-1 rounded-lg">
                {{ $loop->iteration }}
            </span>
        </div>

        <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight">
            {{ $item->title }}
        </h3>

        <div class="flex items-center text-sm text-gray-500 mt-2">
            <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ $item->estimasi }}</span>
        </div>

        <div class="mt-6">
            <div class="flex justify-between items-end mb-1">
                <span class="text-xs font-medium text-gray-500">Progress Belajar</span>
                <span class="text-xs font-bold text-blue-600">{{ $percentage }}%</span>
            </div>
            <div class="w-full bg-gray-100 rounded-full h-2">
                <div class="bg-blue-600 h-2 rounded-full transition-all duration-500 ease-out" 
                     style="width: {{ $percentage }}%">
                </div>
            </div>
            <p class="text-[10px] text-gray-400 mt-1 text-right">
                {{ $completedSteps }} / {{ $totalSteps }} langkah selesai
            </p>
        </div>
        </div>

    <div class="px-6 py-4 flex items-center justify-between mt-auto border-t border-gray-50">
        
        <button 
            @click="openDelete = true; deleteId = {{ $item->id }}"
            class="text-sm font-medium text-slate-700 hover:text-red-600 transition-colors flex items-center gap-1 group/del">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 group-hover/del:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            Hapus
        </button>

        <a href="{{ route('roadmap.detail', $item->id) }}"
           class="text-sm font-semibold text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-1">
            Lihat Detail &rarr;
        </a>
    </div>
</div>
                                @empty
                                    <div class="col-span-full border-2 border-dashed border-gray-200 rounded-2xl p-8 text-center hover:border-blue-300 hover:bg-blue-50/30 transition-colors cursor-pointer group">
                                        <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3 text-gray-400 group-hover:text-blue-500 group-hover:bg-blue-100 transition-colors">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </div>
                                        <p class="text-sm font-medium text-gray-500 group-hover:text-gray-700">Buat Roadmap Baru</p>
                                    </div>
                                @endforelse
                            </div>

                           
                            </div>
                        </div>
</x-userlayouts>