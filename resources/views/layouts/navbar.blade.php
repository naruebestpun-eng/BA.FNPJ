<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบตรวจสอบเวลาเรียน</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Kanit', sans-serif; }
        .aspect-video { aspect-ratio: 16 / 9; }
    </style>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">

    <nav class="bg-gray-800 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <div class="flex items-center">
                    <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                        <img src="{{ asset('images/โลโก้.png') }}" alt="Logo" class="h-16 w-auto transform transition group-hover:scale-105">
                        <div class="flex flex-col">
                            <span class="text-white font-bold text-lg leading-tight tracking-wide">ระบบตรวจสอบเวลาเรียน</span>
                            <span class="text-gray-400 text-xs uppercase">Study Time Checking System</span>
                        </div>
                    </a>
                </div>

                <div class="hidden md:block">
                    <div class="flex items-center space-x-8">
                        <div class="flex space-x-6">
                            <a href="#" class="text-gray-300 hover:text-white text-sm font-medium transition duration-200">หน้าแรก</a>
                            <a href="#" class="text-gray-300 hover:text-white text-sm font-medium transition duration-200">บริการ</a>
                            <a href="#" class="text-gray-300 hover:text-white text-sm font-medium transition duration-200">เกี่ยวกับ</a>
                            <a href="#" class="text-gray-300 hover:text-white text-sm font-medium transition duration-200">ติดต่อเรา</a>
                        </div>
                        
                        <div class="h-6 w-px bg-gray-600 mx-2"></div>

                        <div class="flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-white bg-indigo-600 hover:bg-indigo-700 px-5 py-2 rounded-full text-sm font-medium transition shadow-md">แดชบอร์ด</a>
                            @else
                                <a href="{{ route('login') }}" class="text-gray-300 hover:text-white text-sm font-medium transition">เข้าสู่ระบบ</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="bg-white text-gray-800 px-5 py-2 rounded-full text-sm font-medium hover:bg-gray-200 transition shadow-sm font-bold">สมัครสมาชิก</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-button" type="button" class="text-gray-400 hover:text-white p-2">
                        <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden md:hidden bg-gray-900 border-t border-gray-700 shadow-xl" id="mobile-menu">
            <div class="px-4 pt-4 pb-6 space-y-2">
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-3 rounded-md text-base">หน้าแรก</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-3 rounded-md text-base">บริการ</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-3 rounded-md text-base">เกี่ยวกับ</a>
                <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-3 rounded-md text-base">ติดต่อเรา</a>
                <div class="border-t border-gray-700 my-4 pt-4 flex flex-col space-y-3">
                    <a href="{{ route('login') }}" class="text-white text-center py-2">เข้าสู่ระบบ</a>
                    <a href="{{ route('register') }}" class="bg-indigo-600 text-white text-center py-3 rounded-md font-bold">สมัครสมาชิก</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 text-center">
            
            <div class="mb-16">
                <h2 class="text-indigo-600 font-bold tracking-widest uppercase text-sm mb-2">ยินดีต้อนรับสู่ระบบของเรา</h2>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight">
                    ระบบตรวจสอบเวลาเรียน
                </h1>
                <div class="mt-5 w-24 h-1.5 bg-indigo-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center text-left">
                <div class="relative">
                    <img class="rounded-3xl shadow-2xl w-full object-cover h-64 md:h-[450px]" 
                         src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                         alt="Education and Technology">
                    <div class="absolute inset-0 rounded-3xl ring-1 ring-inset ring-black/10"></div>
                </div>

                <div class="bg-black rounded-3xl shadow-2xl overflow-hidden aspect-video border-[8px] border-white shadow-indigo-100">
                    <iframe class="w-full h-full" 
                            src="https://www.youtube.com/embed/f9ddrwoJLJk?rel=0" 
                            title="Study Time Checking System Showcase" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-gray-300">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 border-b border-gray-800 pb-12">
                
                <div class="md:col-span-5">
                    <div class="flex items-center space-x-3 mb-6">
                        <img src="{{ asset('images/โลโก้.png') }}" alt="Footer Logo" class="h-12 w-auto brightness-110">
                        <span class="text-white text-xl font-bold tracking-tight">Study Time Checking System</span>
                    </div>
                    <p class="text-gray-400 leading-relaxed max-w-md">
                        นวัตกรรมการตรวจสอบเวลาเรียนที่แม่นยำและรวดเร็ว เพื่อยกระดับการศึกษาด้วยเทคโนโลยีที่ทันสมัย เข้าถึงข้อมูลได้ทุกที่ทุกเวลา
                    </p>
                </div>

                <div class="md:col-span-4">
                    <h3 class="text-sm font-bold text-indigo-400 tracking-widest uppercase mb-6">ช่องทางการติดต่อ</h3>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-start">
                            <span class="text-indigo-500 mr-3 text-lg">📍</span>
                            <span>123 ถนนสุขุมวิท เขตวัฒนา กรุงเทพฯ 10110</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-indigo-500 mr-3 text-lg">📞</span>
                            <span>095-710-4946 / 099-635-2837</span>
                        </li>
                        <li class="flex items-center">
                            <span class="text-indigo-500 mr-3 text-lg">✉️</span>
                            <a href="mailto:naruebest.pun@rmutto.ac.th" class="hover:text-white transition">naruebest.pun@rmutto.ac.th</a>
                        </li>
                        <li class="flex items-center">
                            <span class="text-indigo-500 mr-3 text-lg">✉️</span>
                            <a href="mailto:naruebest.pun@rmutto.ac.th" class="hover:text-white transition">pichakorn.bus@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="md:col-span-3">
                    <h3 class="text-sm font-bold text-indigo-400 tracking-widest uppercase mb-6">เมนู</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-indigo-400 transition">นโยบายความเป็นส่วนตัว</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition">เงื่อนไขการใช้งาน</a></li>
                        <li><a href="#" class="hover:text-indigo-400 transition">คำถามที่พบบ่อย</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="flex flex-col md:flex-row justify-between items-center pt-8 text-xs text-gray-500 uppercase tracking-widest">
                <p>&copy; {{ date('Y') }} ระบบตรวจสอบเวลาเรียน (STCS). สงวนลิขสิทธิ์.</p>
                <div class="mt-4 md:mt-0 flex space-x-6">
                    <span>RMUTTO University</span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>