@extends('layouts.app')
@section('title', 'แก้ไขบทความ')
@section('content')
    <div class="max-w-2xl mx-auto space-y-6">
        <div>
            <a href="/blog" class="inline-flex items-center text-sm font-semibold text-slate-500 hover:text-indigo-600 transition">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                กลับไปหน้าจัดการ
            </a>
        </div>

        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sm:p-10 space-y-6">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-slate-900">แก้ไขบทความ</h2>
                <p class="text-slate-500 mt-1.5">ปรับปรุงและแก้ไขข้อมูลของบทความของคุณให้ถูกต้องเป็นปัจจุบัน</p>
            </div>

            <form method="POST" action="{{ route('update', $blog->id) }}" class="space-y-6">
                @csrf
                <div class="space-y-1.5">
                    <label for="title" class="block text-sm font-semibold text-slate-700">ชื่อบทความ</label>
                    <input type="text" name="title" id="title" value="{{ $blog->title }}" class="input input-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-xl @error('title') border-red-500 @enderror">
                    @error('title')
                        <div class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <span>⚠️</span> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="space-y-1.5">
                    <label for="content" class="block text-sm font-semibold text-slate-700">เนื้อหาบทความ</label>
                    <textarea name="content" id="content" rows="6" class="textarea textarea-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-xl @error('content') border-red-500 @enderror">{{ $blog->content }}</textarea>
                    @error('content')
                        <div class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            <span>⚠️</span> {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                    <a href="/blog" class="btn btn-ghost hover:bg-slate-100 text-slate-500 rounded-xl px-5 flex items-center gap-1.5 transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        <span>ยกเลิก</span>
                    </a>
                    <button type="submit" class="btn btn-primary bg-indigo-600 hover:bg-indigo-700 border-none px-6 rounded-xl text-white font-bold transition shadow-md flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path></svg>
                        <span>อัปเดตบทความ</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
