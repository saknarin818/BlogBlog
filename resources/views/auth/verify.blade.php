@extends('layouts.app')
@section('title', __('Verify Your Email Address'))

@section('content')
<div class="max-w-md mx-auto my-8">
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sm:p-10 space-y-6">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-slate-900">{{ __('Verify Your Email') }}</h2>
            <p class="text-slate-500 mt-1.5">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
        </div>

        @if (session('resent'))
            <div class="alert alert-success bg-emerald-50 text-emerald-700 border border-emerald-200/50 rounded-2xl p-4 text-sm font-semibold flex gap-2">
                <span>✅</span>
                <span>{{ __('A fresh verification link has been sent to your email address.') }}</span>
            </div>
        @endif

        <div class="text-slate-600 text-sm text-center leading-relaxed">
            {{ __('If you did not receive the email') }},
        </div>

        <form class="space-y-4" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-primary w-full bg-indigo-600 hover:bg-indigo-700 border-none rounded-xl text-white font-bold transition shadow-sm">
                {{ __('click here to request another') }}
            </button>
        </form>
    </div>
</div>
@endsection
