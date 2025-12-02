<x-app-layout>
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

        <select class="border rounded-lg px-4 py-2">
            <option value="">All Status</option>
            <option value="active">Active</option>
            <option value="banned">Banned</option>
        </select>
    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full table-auto">
            <thead class="bg-blue-600 text-left">
                <tr class="text-white">
                    <th class="p-4">User</th>
                    <th class="p-4">Email</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Role</th>
                    <th class="p-4">Joined</th>
                    <th class="p-4 text-right">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($user as $item)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-4 font-medium">{{ $item->name }}</td>
                    <td class="p-4">{{ $item->email }}</td>

                    <td class="p-4">
                        @if ($item->status == 'banned')
                            <span class="px-2 py-1 rounded-full bg-red-100 text-red-600 text-xs">
                                Banned
                            </span>
                        @else
                            <span class="px-2 py-1 rounded-full bg-green-100 text-green-600 text-xs">
                                Active
                            </span>
                        @endif
                    </td>

                    <td class="p-4">{{ $item->role }}</td>
                    <td class="p-4">{{ $item->created_at->format('Y-m-d') }}</td>

                    <td class="p-4 text-right">
                        <a href="" 
                           class="text-blue-600 hover:underline mr-4">
                           View
                        </a>

                        <form action="" 
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
                @endforeach
            </tbody>

        </table>
    </div>
</div>
</x-app-layout>
