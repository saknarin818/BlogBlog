@extends('layouts.app')
@section('title', __('Confirm Password'))

@section('content')
<div class="max-w-md mx-auto my-8">
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sm:p-10 space-y-6">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-slate-900">{{ __('Confirm Password') }}</h2>
            <p class="text-slate-500 mt-1.5">{{ __('Please confirm your password before continuing.') }}</p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}" class="space-y-4">
            @csrf

            <!-- Password -->
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

            <div class="pt-4">
                <button type="submit" class="btn btn-primary w-full bg-indigo-600 hover:bg-indigo-700 border-none rounded-xl text-white font-bold transition shadow-sm">
                    {{ __('Confirm Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
