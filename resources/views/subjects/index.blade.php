<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('จัดการข้อมูลรายวิชา') }}</h2>
            <a href="{{ route('subjects.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">+ เพิ่มรายวิชา</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))<div class="mb-6 p-4 bg-green-50 border-l-4 border-green-400 text-green-700">{{ session('success') }}</div>@endif

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('subjects.index') }}" method="GET" class="mb-6 flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="ค้นหาด้วยรหัสหรือชื่อวิชา..." class="border p-2 rounded-md flex-1">
                    <button class="px-4 py-2 bg-gray-800 text-white rounded-md">ค้นหา</button>
                    @if(request('search')) <a href="{{ route('subjects.index') }}" class="px-4 py-2 border rounded-md">ล้าง</a> @endif
                </form>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">รหัส</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ชื่อวิชา</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">หน่วยกิต</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($subjects as $subject)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-indigo-600 font-semibold">{{ $subject->code }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $subject->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ $subject->credits ?? '-' }}</td>
                                    <td class="px-6 py-4 text-right text-sm font-medium">
                                        <a href="{{ route('subjects.edit', $subject) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">แก้ไข</a>
                                        <form action="{{ route('subjects.destroy', $subject) }}" method="POST" class="inline-block" onsubmit="return confirm('ลบรายวิชานี้?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">ลบ</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="px-6 py-10 text-center text-gray-500">ไม่พบข้อมูล</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">{{ $subjects->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
