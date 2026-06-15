@extends('layouts.app')
@section('title', __('Reset Password'))

@section('content')
<div class="max-w-md mx-auto my-8">
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sm:p-10 space-y-6">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-slate-900">{{ __('Reset Password') }}</h2>
            <p class="text-slate-500 mt-1.5">ป้อนที่อยู่อีเมลของคุณเพื่อขอรับลิงก์รีเซ็ตรหัสผ่าน</p>
        </div>

        @if (session('status'))
            <div class="alert alert-success bg-emerald-50 text-emerald-700 border border-emerald-200/50 rounded-2xl p-4 text-sm font-semibold flex gap-2">
                <span>✅</span>
                <span>{{ session('status') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf

            <div class="space-y-1.5">
                <label for="email" class="block text-sm font-semibold text-slate-700">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="input input-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-xl @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                @error('email')
                    <span class="text-red-500 text-xs mt-1 block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="pt-4 flex flex-col gap-3">
                <button type="submit" class="btn btn-primary w-full bg-indigo-600 hover:bg-indigo-700 border-none rounded-xl text-white font-bold transition shadow-sm">
                    {{ __('Send Password Reset Link') }}
                </button>
                <a href="{{ route('login') }}" class="text-center text-sm font-semibold text-slate-500 hover:text-indigo-600 transition">
                    ย้อนกลับไปหน้าเข้าสู่ระบบ
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
