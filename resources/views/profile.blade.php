@extends('layouts.app')

@section('title', 'แก้ไขโปรไฟล์')

@section('content')
<div class="max-w-md mx-auto my-8">
    <!-- Status / Success Alert -->
    @if (session('success'))
        <div class="alert alert-success shadow-sm rounded-2xl mb-4 bg-emerald-50 text-emerald-800 border-emerald-200 flex gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sm:p-10 space-y-6">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-slate-900">แก้ไขโปรไฟล์</h2>
            <p class="text-slate-500 mt-1.5">ปรับปรุงข้อมูลบัญชีของคุณ</p>
        </div>

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
            @csrf

            <div class="space-y-1.5">
                <label for="name" class="block text-sm font-semibold text-slate-700">ชื่อ</label>
                <input id="name" type="text" class="input input-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-xl @error('name') border-red-500 @enderror" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus placeholder="ชื่อของคุณ">
                @error('name')
                    <span class="text-red-500 text-xs mt-1 block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="space-y-1.5">
                <label for="email" class="block text-sm font-semibold text-slate-700">อีเมล</label>
                <input id="email" type="email" class="input input-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-xl @error('email') border-red-500 @enderror" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email" placeholder="name@example.com">
                @error('email')
                    <span class="text-red-500 text-xs mt-1 block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="h-px bg-slate-100 my-4"></div>
            
            <div class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">เปลี่ยนรหัสผ่าน (เว้นว่างไว้หากไม่ต้องการเปลี่ยน)</div>

            <div class="space-y-1.5">
                <label for="password" class="block text-sm font-semibold text-slate-700">รหัสผ่านใหม่</label>
                <input id="password" type="password" class="input input-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-xl @error('password') border-red-500 @enderror" name="password" autocomplete="new-password" placeholder="••••••••">
                @error('password')
                    <span class="text-red-500 text-xs mt-1 block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="space-y-1.5">
                <label for="password-confirm" class="block text-sm font-semibold text-slate-700">ยืนยันรหัสผ่านใหม่</label>
                <input id="password-confirm" type="password" class="input input-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-xl" name="password_confirmation" autocomplete="new-password" placeholder="••••••••">
            </div>

            <div class="pt-4 flex gap-3">
                <a href="/" class="btn btn-ghost border border-slate-200 hover:bg-slate-50 rounded-xl w-1/3 text-slate-600 transition font-bold flex items-center justify-center">
                    ยกเลิก
                </a>
                <button type="submit" class="btn btn-primary w-2/3 bg-indigo-600 hover:bg-indigo-700 border-none rounded-xl text-white font-bold transition shadow-sm">
                    บันทึกข้อมูล
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
