<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('บัญชีผู้ใช้') }}
        </h2>
    </x-slot>
<div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-6 text-gray-800">จัดการข้อมูลผู้ใช้งาน</h1>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">จัดการข้อมูลผู้ใช้งาน</h1>
    <a href="{{ route('users.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md shadow-md">
        + เพิ่มผู้ใช้งานใหม่
    </a>
</div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- ฟอร์มค้นหา --}}
    <form action="{{ route('users.index') }}" method="GET" class="mb-4">
        <div class="flex">
            <input type="text" name="search" placeholder="ค้นหาด้วยชื่อหรืออีเมล..." 
                   value="{{ request('search') }}"
                   class="flex-grow p-2 border border-gray-300 rounded-l-md focus:ring-blue-500 focus:border-blue-500">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-r-md">
                ค้นหา
            </button>
            @if(request('search'))
                <a href="{{ route('users.index') }}" class="ml-2 bg-gray-300 hover:bg-gray-400 text-gray-800 p-2 rounded-md">
                    ล้าง
                </a>
            @endif
        </div>
    </form>

    {{-- ตารางแสดงผล --}}
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Updated At</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->role }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->updated_at->format('Y-m-d H:i') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-center">
                            {{-- ปุ่มแก้ไข --}}
                            <a href="{{ route('users.edit', $user->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">
                                แก้ไข
                            </a>
                            {{-- ปุ่มลบ --}}
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบผู้ใช้งานนี้?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    ลบ
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- การแบ่งหน้า (Pagination) --}}
    <div class="mt-4">
        {{ $users->links() }} {{-- Laravel Pagination Links with Tailwind CSS --}}
    </div>
</div>
</x-app-layout>