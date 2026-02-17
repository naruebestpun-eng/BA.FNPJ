<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('เพิ่มภาคเรียนใหม่') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('terms.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">ชื่อภาคเรียน</label>
                        <input id="name" name="name" value="{{ old('name') }}" required class="mt-1 block w-full border-gray-300 rounded-md p-2">
                        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700">วันที่เริ่ม</label>
                            <input type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                            @error('start_date')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700">วันที่สิ้นสุด</label>
                            <input type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                            @error('end_date')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="active" class="form-checkbox" checked>
                            <span class="ms-2">เปิดใช้งาน</span>
                        </label>
                    </div>

                    <div class="mt-6 flex items-center gap-4">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">บันทึก</button>
                        <a href="{{ route('terms.index') }}" class="text-gray-600">ยกเลิก</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
