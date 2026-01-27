<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('เพิ่มห้องเรียนใหม่') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('classrooms.store') }}">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="room_name" :value="__('ชื่อห้องเรียน')" />
                        <x-text-input id="room_name" class="block mt-1 w-full" type="text" name="room_name" :value="old('room_name')" required autofocus />
                        <x-input-error :messages="$errors->get('room_name')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="building" :value="__('อาคาร / สถานที่')" />
                        <x-text-input id="building" class="block mt-1 w-full" type="text" name="building" :value="old('building')" />
                        <x-input-error :messages="$errors->get('building')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="capacity" :value="__('ความจุ (จำนวนที่นั่ง)')" />
                        <x-text-input id="capacity" class="block mt-1 w-full" type="number" name="capacity" :value="old('capacity')" required />
                        <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('classrooms.index') }}" class="mr-3 text-sm text-gray-600 hover:underline">ยกเลิก</a>
                        <x-primary-button>{{ __('บันทึกข้อมูล') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>