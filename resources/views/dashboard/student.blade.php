<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">ยินดีต้อนรับ นักศึกษา {{ Auth::user()->name }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- ห้องเรียนที่เข้าร่วม -->
                        <a href="{{ route('classrooms.index') }}" class="bg-blue-50 p-4 rounded-lg hover:bg-blue-100 transition">
                            <div class="text-2xl mb-2">📚</div>
                            <h4 class="font-semibold">ห้องเรียนของฉัน</h4>
                            <p class="text-sm text-gray-600">ดูห้องเรียนที่เข้าร่วม</p>
                        </a>

                        <!-- ค้นหาห้องเรียน -->
                        <a href="#" class="bg-green-50 p-4 rounded-lg hover:bg-green-100 transition">
                            <div class="text-2xl mb-2">🔍</div>
                            <h4 class="font-semibold">ค้นหาห้องเรียน</h4>
                            <p class="text-sm text-gray-600">ค้นหาและเข้าร่วมห้องเรียน</p>
                        </a>

                        <!-- งานของฉัน -->
                        <a href="#" class="bg-yellow-50 p-4 rounded-lg hover:bg-yellow-100 transition">
                            <div class="text-2xl mb-2">📝</div>
                            <h4 class="font-semibold">งานของฉัน</h4>
                            <p class="text-sm text-gray-600">ดูงานที่ต้องส่ง</p>
                        </a>

                        <!-- ส่งงาน -->
                        <a href="#" class="bg-purple-50 p-4 rounded-lg hover:bg-purple-100 transition">
                            <div class="text-2xl mb-2">📤</div>
                            <h4 class="font-semibold">ส่งงาน</h4>
                            <p class="text-sm text-gray-600">ส่งงานของฉัน</p>
                        </a>

                        <!-- คะแนนของฉัน -->
                        <a href="#" class="bg-red-50 p-4 rounded-lg hover:bg-red-100 transition">
                            <div class="text-2xl mb-2">⭐</div>
                            <h4 class="font-semibold">คะแนนของฉัน</h4>
                            <p class="text-sm text-gray-600">ดูคะแนนของฉัน</p>
                        </a>

                        <!-- ตารางเรียน -->
                        <a href="#" class="bg-orange-50 p-4 rounded-lg hover:bg-orange-100 transition">
                            <div class="text-2xl mb-2">📅</div>
                            <h4 class="font-semibold">ตารางเรียน</h4>
                            <p class="text-sm text-gray-600">ดูตารางเรียนของฉัน</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
