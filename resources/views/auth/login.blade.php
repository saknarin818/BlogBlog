@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto my-8">
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sm:p-10 space-y-6">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-slate-900">{{ __('Login') }}</h2>
            <p class="text-slate-500 mt-1.5">เข้าสู่ระบบเพื่อสร้างสรรค์บทความของคุณ</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
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

            <div class="space-y-1.5">
                <div class="flex justify-between items-center">
                    <label for="password" class="text-sm font-semibold text-slate-700">{{ __('Password') }}</label>
                    @if (Route::has('password.request'))
                        <a class="text-xs font-semibold text-indigo-600 hover:text-indigo-700 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <input id="password" type="password" class="input input-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 rounded-xl @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                @error('password')
                    <span class="text-red-500 text-xs mt-1 block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex items-center">
                <input class="checkbox checkbox-primary checkbox-sm rounded-md" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="label cursor-pointer text-sm font-medium text-slate-600 ml-2" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="pt-2">
                <button type="submit" class="btn btn-primary w-full bg-indigo-600 hover:bg-indigo-700 border-none rounded-xl text-white font-bold transition shadow-sm">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
