<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">ยินดีต้อนรับ ผู้ดูแลระบบ</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- จัดการผู้ใช้ -->
                        <a href="{{ route('users.index') }}" class="bg-blue-50 p-4 rounded-lg hover:bg-blue-100 transition">
                            <div class="text-2xl mb-2">👥</div>
                            <h4 class="font-semibold">จัดการผู้ใช้</h4>
                            <p class="text-sm text-gray-600">ดูและแก้ไขข้อมูลผู้ใช้</p>
                        </a>

                        <!-- จัดการห้องเรียน -->
                        <a href="{{ route('classrooms.index') }}" class="bg-green-50 p-4 rounded-lg hover:bg-green-100 transition">
                            <div class="text-2xl mb-2">📚</div>
                            <h4 class="font-semibold">จัดการห้องเรียน</h4>
                            <p class="text-sm text-gray-600">ดูและแก้ไขห้องเรียน</p>
                        </a>

                        <!-- จัดการนักศึกษา -->
                        <a href="{{ route('students.index') }}" class="bg-yellow-50 p-4 rounded-lg hover:bg-yellow-100 transition">
                            <div class="text-2xl mb-2">🎓</div>
                            <h4 class="font-semibold">จัดการนักศึกษา</h4>
                            <p class="text-sm text-gray-600">ดูและแก้ไขข้อมูลนักศึกษา</p>
                        </a>

                        <!-- รายงาน -->
                        <a href="#" class="bg-purple-50 p-4 rounded-lg hover:bg-purple-100 transition">
                            <div class="text-2xl mb-2">📊</div>
                            <h4 class="font-semibold">รายงาน</h4>
                            <p class="text-sm text-gray-600">ดูรายงานสถิติ</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
