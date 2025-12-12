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
    <h1 class="text-3xl font-bold mb-6">User Management</h1>

    <div class="flex items-center justify-between mb-4">
    <form action="" method="GET" class="flex items-center gap-2">
    <input 
        type="text" 
        name="search"
        class="border rounded-lg px-4 py-2 w-64 focus:ring-2 focus:ring-blue-400 outline-none"
        placeholder="Search user..."
    />

    <button 
        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
        Search
    </button>
</form>

    </div>

    <div class="bg-wh   ite rounded-xl shadow overflow-hidden">
        <table class="w-full table-auto">
            <thead class="bg-blue-600 text-left">
                <tr class="text-white"> 
                    <th class="p-4">User</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Joined</th>
                    <th class="p-4 text-right">Action</th>
                </tr>
            </thead>

            <tbody>
                
                @foreach ($user as $item)
            @if ($item->role == "user")
             <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-medium">{{ $item->name }}</td>
                    <td class="p-4">{{ $item->email }}</td>

                    <td class="p-4">{{ $item->created_at->format('Y-m-d') }}</td>

                    <td class="p-4 text-right">

                        <form action="{{ route('user.destroy',$item->id) }}" 
                              method="POST" 
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>    
            @endif
                
                @endforeach
            </tbody>

        </table>
    </div>
</div>
</x-app-layout>
