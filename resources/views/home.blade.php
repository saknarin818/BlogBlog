@extends('layouts.app')
@section('title', 'แผงควบคุมผู้ใช้')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    <!-- Profile summary card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sm:p-10 text-center space-y-4 relative overflow-hidden">
        <div class="absolute inset-x-0 top-0 h-2 bg-gradient-to-r from-indigo-500 to-purple-600"></div>
        
        <!-- User Avatar Circle -->
        <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-indigo-100 to-purple-100 text-indigo-700 font-extrabold text-2xl flex items-center justify-center shadow-inner uppercase tracking-wider">
            {{ substr(Auth::user()->name, 0, 2) }}
        </div>
        
        <div class="space-y-1">
            <h2 class="text-2xl font-black text-slate-800">{{ Auth::user()->name }}</h2>
            <p class="text-slate-500 text-sm font-medium">{{ Auth::user()->email }}</p>
        </div>

        <div>
            @if(Auth::user()->is_admin)
                <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100 shadow-sm">
                    👑 ผู้ดูแลระบบ (Admin)
                </span>
            @else
                <span class="inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full text-xs font-semibold bg-slate-50 text-slate-600 border border-slate-200/50">
                    📖 ผู้อ่านทั่วไป (Reader)
                </span>
            @endif
        </div>
    </div>

    <!-- Main Dashboard Section -->
    <div class="space-y-6">
        <div>
            <h3 class="text-xl font-bold text-slate-800">เครื่องมือจัดการ</h3>
            <p class="text-sm text-slate-500 mt-1">เลือกการดำเนินการที่รวดเร็วเพื่อเข้าถึงส่วนต่างๆ ของระบบ</p>
        </div>

        @if(Auth::user()->is_admin)
            <!-- Admin command center -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Go to Home -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between hover:shadow-md transition group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold transition group-hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-bold text-slate-800 text-lg">หน้าแรกของเว็บ</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">เข้าชมหน้าแรกเพื่อดูโพสต์และบทความล่าสุดที่เผยแพร่ลงสู่ระบบ</p>
                        </div>
                    </div>
                    <a href="/" class="btn btn-sm btn-ghost hover:bg-blue-50 text-blue-600 border border-blue-100/50 mt-6 rounded-xl font-bold transition">
                        ไปยังหน้าแรก
                    </a>
                </div>

                <!-- Create Post -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between hover:shadow-md transition group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold transition group-hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-bold text-slate-800 text-lg">เขียนบทความใหม่</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">เปิดเครื่องมือแก้ไขเพื่อเขียน ใส่ข้อมูล และจัดเตรียมโพสต์ใหม่ของคุณ</p>
                        </div>
                    </div>
                    <a href="/create" class="btn btn-sm btn-primary bg-indigo-600 hover:bg-indigo-700 border-none mt-6 rounded-xl text-white font-bold transition">
                        เขียนบทความเลย
                    </a>
                </div>

                <!-- Manage Posts -->
                <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col justify-between hover:shadow-md transition group">
                    <div class="space-y-4">
                        <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold transition group-hover:scale-110">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                        <div class="space-y-1">
                            <h4 class="font-bold text-slate-800 text-lg">จัดการบทความ</h4>
                            <p class="text-xs text-slate-500 leading-relaxed">เปิดหน้ารวมเพื่อแก้ไข ลบ หรือสลับสถานะร่าง/เผยแพร่บทความทั้งหมด</p>
                        </div>
                    </div>
                    <a href="/blog" class="btn btn-sm btn-ghost hover:bg-purple-50 text-purple-600 border border-purple-100/50 mt-6 rounded-xl font-bold transition">
                        จัดการบทความทั้งหมด
                    </a>
                </div>
            </div>
        @else
            <!-- Regular user welcome dashboard -->
            <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sm:p-10 flex flex-col md:flex-row items-center gap-8">
                <div class="w-16 h-16 sm:w-20 sm:h-20 shrink-0 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center">
                    <svg class="w-8 h-8 sm:w-10 sm:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <div class="space-y-4 text-center md:text-left flex-grow">
                    <div class="space-y-1">
                        <h4 class="text-xl font-bold text-slate-800">ยินดีต้อนรับสู่ชุมชน BlogBlogs!</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">
                            คุณอยู่ในสถานะผู้อ่านทั่วไปในระบบ คุณสามารถสำรวจบทความน่าสนใจของนักเขียนอื่นๆ แสดงความคิดเห็น หรือกดถูกใจบทความเพื่อแบ่งปันกำลังใจได้
                        </p>
                    </div>
                    <div class="pt-2">
                        <a href="/" class="btn btn-primary bg-indigo-600 hover:bg-indigo-700 border-none px-6 rounded-xl text-white font-bold transition shadow-sm inline-flex items-center gap-2">
                            <span>สำรวจบทความล่าสุด</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
