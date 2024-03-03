@extends('layouts.app')
@section('title', 'หน้าแรกของเว็บไซต์')

@section('content')
    <div class=" text-center">
        <h2>หน้าแรกของเว็บไซต์บทความล่าสุด</h2>
        <hr>

        <div class="flex justify-center items-center flex-wrap">
            @foreach ($blogs as $item)
                <a href="/detail/{{ $item->id }}" class="no-underline inline-block mb-4">
                    <div class="w-80 bg-white rounded-lg shadow-xl mx-4 my-4 transform hover:scale-110 transition duration-300">
                        <div class="px-6 py-4">
                            <h2 class="text-lg font-bold text-black tracking-wide">{{ $item->title }}</h2>
                            <p class="text-black">{!! Str::limit($item->content, 50) !!}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    @endsection


