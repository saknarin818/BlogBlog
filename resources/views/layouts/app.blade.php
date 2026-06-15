<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | BlogBlogs</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Prompt', sans-serif;
            background-color: #f8fafc;
        }
        .ck-editor__editable_inline {
            min-height: 250px;
            color: #1f2937;
        }
        .ck.ck-editor {
            color: #1f2937 !important;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-slate-50 text-slate-800">
    <div id="app" class="flex flex-col min-h-screen">
        <!-- Navigation Bar -->
        <header class="sticky top-0 z-50 w-full border-b border-slate-200/80 bg-white/80 backdrop-blur-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16 items-center">
                    <div class="flex-shrink-0">
                        <a href="{{ url('/') }}" class="flex items-center gap-1.5 text-xl sm:text-2xl font-black tracking-tight text-indigo-600 transition hover:opacity-90">
                            <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            <span class="hidden min-[360px]:inline">BlogBlogs</span>
                        </a>
                    </div>
                    <div class="flex items-center gap-2 sm:gap-4">
                        @guest
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="text-xs sm:text-sm font-medium text-slate-600 hover:text-indigo-600 transition px-2.5 sm:px-3 py-2 rounded-lg hover:bg-slate-50">เข้าสู่ระบบ</a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-xs sm:text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 transition px-3 sm:px-4 py-2 rounded-lg shadow-sm">สมัครสมาชิก</a>
                            @endif
                        @else
                            <div class="dropdown dropdown-end">
                                <label tabindex="0" class="btn btn-ghost btn-circle avatar bg-indigo-100 text-indigo-700 font-semibold uppercase hover:bg-indigo-200">
                                    {{ substr(Auth::user()->name, 0, 2) }}
                                </label>
                                <ul tabindex="0" class="mt-3 z-[1] p-2 shadow-lg menu menu-sm dropdown-content bg-white rounded-xl w-56 border border-slate-100 text-slate-700">
                                    <li class="menu-title px-4 py-2 text-xs font-semibold text-slate-400 uppercase tracking-wider">สวัสดี, {{ Auth::user()->name }}</li>
                                    @if(Auth::user()->is_admin)
                                        <li><a href="/blog" class="py-2.5 rounded-lg hover:bg-slate-50"><span class="mr-2">📋</span> จัดการบทความ</a></li>
                                        <li><a href="/create" class="py-2.5 rounded-lg hover:bg-slate-50"><span class="mr-2">📝</span> เขียนบทความ</a></li>
                                    @endif
                                    <li><a href="{{ route('profile.edit') }}" class="py-2.5 rounded-lg hover:bg-slate-50"><span class="mr-2">👤</span> แก้ไขโปรไฟล์</a></li>
                                    <div class="h-px bg-slate-100 my-1"></div>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="py-2.5 rounded-lg hover:bg-red-50 text-red-600 hover:text-red-700 font-medium">
                                            <span class="mr-2">🚪</span> ออกจากระบบ
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endguest
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow py-8 max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-slate-200 text-slate-500 py-8 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-2 text-lg font-bold text-slate-800">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                    </svg>
                    <span>BlogBlogs</span>
                </div>
                <div class="flex gap-6 text-sm font-medium">
                    <a href="/" class="hover:text-indigo-600 transition">หน้าแรก</a>
                    <a href="/blog" class="hover:text-indigo-600 transition">บทความทั้งหมด</a>
                    <a href="/create" class="hover:text-indigo-600 transition">เขียนบทความ</a>
                </div>
                <div class="text-xs">
                    &copy; {{ date('Y') }} BlogBlogs. สงวนลิขสิทธิ์ทั้งหมด.
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
