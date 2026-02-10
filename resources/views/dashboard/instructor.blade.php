<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Instructor Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">ยินดีต้อนรับ อาจารย์ {{ Auth::user()->name }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        <!-- ห้องเรียนของฉัน -->
                        <a href="{{ route('classrooms.index') }}" class="bg-blue-50 p-4 rounded-lg hover:bg-blue-100 transition">
                            <div class="text-2xl mb-2">📚</div>
                            <h4 class="font-semibold">ห้องเรียนของฉัน</h4>
                            <p class="text-sm text-gray-600">ดูและจัดการห้องเรียน</p>
                        </a>

                        <!-- สร้างห้องเรียน -->
                        <a href="{{ route('classrooms.create') }}" class="bg-green-50 p-4 rounded-lg hover:bg-green-100 transition">
                            <div class="text-2xl mb-2">➕</div>
                            <h4 class="font-semibold">สร้างห้องเรียน</h4>
                            <p class="text-sm text-gray-600">สร้างห้องเรียนใหม่</p>
                        </a>

                        <!-- นักศึกษา -->
                        <a href="{{ route('students.index') }}" class="bg-yellow-50 p-4 rounded-lg hover:bg-yellow-100 transition">
                            <div class="text-2xl mb-2">🎓</div>
                            <h4 class="font-semibold">นักศึกษา</h4>
                            <p class="text-sm text-gray-600">ดูรายชื่อนักศึกษา</p>
                        </a>

                        <!-- งาน/ส่งการบ้าน -->
                        <a href="#" class="bg-purple-50 p-4 rounded-lg hover:bg-purple-100 transition">
                            <div class="text-2xl mb-2">📝</div>
                            <h4 class="font-semibold">งานที่ได้รับ</h4>
                            <p class="text-sm text-gray-600">ดูและให้คะแนนงาน</p>
                        </a>

                        <!-- คะแนน -->
                        <a href="#" class="bg-red-50 p-4 rounded-lg hover:bg-red-100 transition">
                            <div class="text-2xl mb-2">⭐</div>
                            <h4 class="font-semibold">ให้คะแนน</h4>
                            <p class="text-sm text-gray-600">ให้คะแนนนักศึกษา</p>
                        </a>

                        <!-- รายงาน -->
                        <a href="#" class="bg-orange-50 p-4 rounded-lg hover:bg-orange-100 transition">
                            <div class="text-2xl mb-2">📊</div>
                            <h4 class="font-semibold">รายงาน</h4>
                            <p class="text-sm text-gray-600">ดูรายงานห้องเรียน</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
