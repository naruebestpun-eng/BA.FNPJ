<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('จัดการข้อมูลภาคเรียน') }}
            </h2>
            <a href="{{ route('terms.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                + เพิ่มภาคเรียนใหม่
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-400 text-green-700 shadow-sm">{{ session('success') }}</div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-6">
                    <form action="{{ route('terms.index') }}" method="GET" class="flex gap-2">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="ค้นหาชื่อภาคเรียน..." class="border-gray-300 rounded-md p-2 w-full">
                        <button class="px-4 py-2 bg-gray-800 text-white rounded-md">ค้นหา</button>
                        @if(request('search'))
                            <a href="{{ route('terms.index') }}" class="px-4 py-2 border rounded-md">ล้าง</a>
                        @endif
                    </form>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ลำดับ</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ชื่อภาคเรียน</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">วันที่เริ่ม</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">วันที่สิ้นสุด</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($terms as $index => $term)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $term->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $term->start_date?->format('Y-m-d') ?? '-' }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $term->end_date?->format('Y-m-d') ?? '-' }}</td>
                                    <td class="px-6 py-4 text-right text-sm font-medium">
                                        <a href="{{ route('terms.edit', $term) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">แก้ไข</a>
                                        <form action="{{ route('terms.destroy', $term) }}" method="POST" class="inline-block" onsubmit="return confirm('คุณแน่ใจที่จะลบภาคเรียนนี้?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">ลบ</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-gray-500">ไม่พบข้อมูลภาคเรียน</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">{{ $terms->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
