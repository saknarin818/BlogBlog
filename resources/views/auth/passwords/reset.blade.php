@extends('layouts.app')
@section('title', __('Reset Password'))

@section('content')
<div class="max-w-md mx-auto my-8">
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sm:p-10 space-y-6">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-slate-900">{{ __('Reset Password') }}</h2>
            <p class="text-slate-500 mt-1.5">กำหนดรหัสผ่านใหม่เพื่อกู้คืนการเข้าถึงบัญชีผู้ใช้ของคุณ</p>
        </div>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email Address -->
            <div class="space-y-1.5">
                <label for="email" class="block text-sm font-semibold text-slate-700">{{ __('Email Address') }}</label>
                <input id="email" type="email" class="input input-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-xl @error('email') border-red-500 @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">
                @error('email')
                    <span class="text-red-500 text-xs mt-1 block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div class="space-y-1.5">
                <label for="password" class="block text-sm font-semibold text-slate-700">{{ __('Password') }}</label>
                <input id="password" type="password" class="input input-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-xl @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password" placeholder="••••••••">
                @error('password')
                    <span class="text-red-500 text-xs mt-1 block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="space-y-1.5">
                <label for="password-confirm" class="block text-sm font-semibold text-slate-700">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="input input-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-xl" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
            </div>

            <div class="pt-4">
                <button type="submit" class="btn btn-primary w-full bg-indigo-600 hover:bg-indigo-700 border-none rounded-xl text-white font-bold transition shadow-sm">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
