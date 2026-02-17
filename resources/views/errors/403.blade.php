@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-lg text-center">
        <h1 class="text-4xl font-bold text-red-600 mb-4">403 — ไม่มีสิทธิ์เข้าใช้งาน</h1>
        <p class="text-gray-600 mb-6">คุณไม่มีสิทธิ์เข้าถึงหน้านี้ หากคิดว่าเป็นความผิดพลาด โปรดติดต่อผู้ดูแลระบบ</p>
        <a href="{{ url('/') }}" class="inline-block px-6 py-2 bg-indigo-600 text-white rounded-md">กลับหน้าหลัก</a>
    </div>
</div>
@endsection
