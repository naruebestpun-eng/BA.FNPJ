<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('เพิ่มนักศึกษาใหม่') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('students.store') }}">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">รหัสนักศึกษา</label>
                            <input name="student_id" value="{{ old('student_id') }}" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                            @error('student_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">ชื่อ</label>
                            <input name="firstname" value="{{ old('firstname') }}" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                            @error('firstname')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">นามสกุล</label>
                            <input name="lastname" value="{{ old('lastname') }}" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                            @error('lastname')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">คณะ</label>
                            <input name="faculty" value="{{ old('faculty') }}" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">สาขาวิชา</label>
                            <input name="field_of_study" value="{{ old('field_of_study') }}" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">ห้องเรียน</label>
                            <select name="classroom_id" class="mt-1 block w-full border-gray-300 rounded-md p-2">
                                <option value="">-- เลือกห้องเรียน --</option>
                                @foreach($classrooms as $room)
                                    <option value="{{ $room->id }}" {{ old('classroom_id') == $room->id ? 'selected' : '' }}>{{ $room->room_name }}{{ $room->building ? ' — ' . $room->building : '' }}</option>
                                @endforeach
                            </select>
                            @error('classroom_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="flex items-center mt-6">
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="active" class="form-checkbox" checked>
                                <span class="ms-2">เปิดใช้งาน</span>
                            </label>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center gap-4">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md">บันทึก</button>
                        <a href="{{ route('students.index') }}" class="text-gray-600">ยกเลิก</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
