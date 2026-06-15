@extends('layouts.app')
@section('title', 'หน้าแรกของเว็บไซต์')

@section('content')
    <!-- Hero Section -->
    <div class="relative overflow-hidden rounded-3xl bg-slate-900 text-white mb-12 shadow-xl">
        <div class="absolute inset-0 bg-gradient-to-r from-indigo-900 to-purple-900 opacity-90"></div>
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-purple-500 rounded-full blur-3xl opacity-30"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-indigo-500 rounded-full blur-3xl opacity-30"></div>
        
        <div class="relative max-w-4xl mx-auto px-6 py-16 sm:py-24 text-center">
            <h1 class="text-4xl sm:text-5xl font-black leading-normal py-2 mb-6 bg-gradient-to-r from-indigo-200 via-purple-100 to-pink-200 text-transparent bg-clip-text">
                แบ่งปันความคิดและเรื่องราวของคุณ
            </h1>
            <p class="text-lg text-slate-300 mb-8 max-w-2xl mx-auto">
                พื้นที่สำหรับนักอ่านและนักเขียน ร่วมแบ่งปันสาระความรู้ ประสบการณ์ และแรงบันดาลใจใหม่ๆ ได้ทุกวัน
            </p>
            <div class="flex justify-center gap-3 sm:gap-4">
                <a href="#articles" class="btn btn-sm sm:btn-md btn-primary bg-indigo-600 hover:bg-indigo-700 border-none px-4 sm:px-6 rounded-xl shadow-lg transition hover:-translate-y-0.5 flex items-center gap-1.5 sm:gap-2 text-xs sm:text-sm">
                    <svg class="w-4 h-4 sm:w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <span>อ่านบทความ</span>
                </a>
                @if(Auth::check() && Auth::user()->is_admin)
                <a href="/create" class="btn btn-sm sm:btn-md btn-outline border-slate-400 text-white hover:bg-white hover:text-slate-900 px-4 sm:px-6 rounded-xl transition hover:-translate-y-0.5 flex items-center gap-1.5 sm:gap-2 text-xs sm:text-sm">
                    <svg class="w-4 h-4 sm:w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    <span>เขียนบทความใหม่</span>
                </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div id="articles" class="space-y-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-slate-200 pb-5">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">บทความล่าสุด</h2>
                <p class="text-slate-500 mt-1">อัปเดตเรื่องราวน่าสนใจล่าสุดจากนักเขียนของเรา</p>
            </div>
            @if(Auth::check() && Auth::user()->is_admin)
            <a href="/blog" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 mt-2 sm:mt-0 flex items-center gap-1">
                จัดการบทความทั้งหมด
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
            @endif
        </div>

        @if(count($blogs) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pt-4">
                @foreach ($blogs as $item)
                    @php
                        $gradients = [
                            'from-indigo-500 to-purple-600',
                            'from-pink-500 to-rose-600',
                            'from-cyan-500 to-blue-600',
                            'from-emerald-400 to-teal-600',
                            'from-amber-400 to-orange-600'
                        ];
                        $grad = $gradients[$loop->index % count($gradients)];
                    @endphp
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl border border-slate-100 transition-all duration-300 flex flex-col h-full transform hover:-translate-y-1">
                        <!-- Colored header simulation -->
                        <div class="h-32 bg-gradient-to-r {{ $grad }} flex items-center justify-center p-6 relative">
                            <div class="absolute inset-0 bg-black/10"></div>
                            <span class="text-white font-extrabold text-xl tracking-tight line-clamp-2 text-center relative z-10">
                                {{ $item->title }}
                            </span>
                        </div>
                        
                        <div class="p-6 flex flex-col flex-grow">
                            <!-- Date & Status -->
                            <div class="flex items-center gap-2 mb-3 text-xs text-slate-400">
                                <span>{{ $item->created_at ? $item->created_at->locale('th')->translatedFormat('d M Y') : 'ไม่ระบุวันที่' }}</span>
                                <span>•</span>
                                <span class="badge badge-sm {{ $item->status ? 'badge-success text-white' : 'badge-ghost' }}">
                                    {{ $item->status ? 'เผยแพร่แล้ว' : 'ฉบับร่าง' }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h3 class="font-bold text-slate-800 text-lg mb-2 line-clamp-1 group-hover:text-indigo-600 transition-colors">
                                {{ $item->title }}
                            </h3>

                            <!-- Excerpt -->
                            <div class="text-slate-500 text-sm line-clamp-3 mb-6 flex-grow">
                                {!! strip_tags($item->content) !!}
                            </div>

                            <!-- Footer Stats & Link -->
                            <div class="flex items-center justify-between pt-4 border-t border-slate-100 text-xs font-semibold text-slate-500">
                                <div class="flex items-center gap-1.5">
                                    <span class="flex items-center gap-1 px-2.5 py-1 rounded-full bg-blue-50 text-blue-700 border border-blue-100/30">
                                        👍 {{ $item->likesCount() }}
                                    </span>
                                    <span class="flex items-center gap-1 px-2.5 py-1 rounded-full bg-rose-50 text-rose-700 border border-rose-100/30">
                                        👎 {{ $item->unlikesCount() }}
                                    </span>
                                </div>
                                <a href="/detail/{{ $item->id }}" class="btn btn-sm btn-ghost border-0 text-indigo-600 hover:bg-indigo-50 hover:text-indigo-700 rounded-lg transition flex items-center gap-1 px-3">
                                    อ่านเพิ่มเติม
                                    <svg class="w-3.5 h-3.5 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-2xl border border-slate-100 shadow-sm">
                <span class="text-4xl">📭</span>
                <h3 class="mt-4 text-lg font-bold text-slate-800">ยังไม่มีบทความในระบบ</h3>
                <p class="text-slate-500 text-sm mt-1">มาเริ่มต้นเขียนบทความแรกของคุณกันเถอะ!</p>
                @if(Auth::check() && Auth::user()->is_admin)
                <a href="/create" class="btn btn-primary mt-6 bg-indigo-600 hover:bg-indigo-700 border-none rounded-xl">
                    เขียนบทความเลย
                </a>
                @endif
            </div>
        @endif
    </div>
@endsection


