<x-userlayouts>

  
     <div class="min-h-screen pt-28 pb-12 px-4 flex justify-center">
                <div class="bg-white border border-slate-200 pt-20 shadow-xl w-full h-fit max-w-lg rounded-lg p-10">
                <div class="mb-6 text-center">
                <h2 class="text-2xl font-bold text-gray-800">Laporkan Masalah</h2>
                <p class="text-gray-500 text-sm mt-2">Bantu kami memperbaiki kualitas materi belajar.</p>
            </div>
            <form action="{{ route('report.store',$resource->id) }}" method="POST">
                @csrf
                <div>
                <label for="Alasan" class="block text-sm font-medium text-gray-700 mb-1 rounded-md">Alasan Pelaporan</label>
                <select name="alasan" id="alasan" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-gray-700 bg-white">
                        <option value="link_rusak">Link Rusak / Error 404</option>
                        <option value="konten_tidak_sesuai">Konten Tidak Sesuai</option>
                        <option value="spam">Spam / Iklan Mengganggu</option>
                        <option value="lainnya">Lainnya</option>
                    </select>
                </div>
               <div>
                  <label for="description" class="block text-sm font-medium text-gray-700 mb-1 rounded-md mt-3"> Deskripsi Laporan</label>
                <textarea name="description" id="description" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 py-3 px-4 text-gray-700 bg-white"></textarea>
               </div>
              
<div class="flex gap-3 pt-2">
        <a href="{{route('roadmap.detail', $resource->step->roadmap_id) }}" class="w-1/2 text-center px-4 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
            Batal
        </a>
        
        <button type="submit" class="w-1/2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium py-3 px-4 shadow-lg transition transform active:scale-95">
            Kirim Laporan
        </button>
    </div>
        </div>
        </div>
    
        
     @if (session('success'))
<script>
    document.addEventListener("DOMContentLoaded", function() {
        swal({
            title: "Berhasil!",
            text: "{{ session('success') }}",
            icon: "success",
            button: "Siap!",
        });
    });
</script>

@endif
</x-userlayouts>