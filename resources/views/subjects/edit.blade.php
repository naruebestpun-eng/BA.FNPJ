<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('แก้ไขรายวิชา') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('subjects.update', $subject) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">รหัสวิชา</label>
                        <input name="code" value="{{ old('code', $subject->code) }}" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                        @error('code')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">ชื่อวิชา</label>
                        <input name="name" value="{{ old('name', $subject->name) }}" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                        @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">หน่วยกิต</label>
                            <input name="credits" value="{{ old('credits', $subject->credits) }}" type="number" min="0" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                            @error('credits')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">คำอธิบาย (ไม่บังคับ)</label>
                            <input name="description" value="{{ old('description', $subject->description) }}" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                        </div>
                    </div>

                    <div class="mt-6 flex items-center gap-4">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">บันทึก</button>
                        <a href="{{ route('subjects.index') }}" class="text-gray-600">ยกเลิก</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
