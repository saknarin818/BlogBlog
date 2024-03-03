@extends('layouts.app')
@section('title', $blog->title)

@section('content')
    <div class="container mx-auto">
        <div class="mt-8">
            <h2 class="text-3xl font-bold">{{ $blog->title }}</h2>
            <hr class="my-4">
            <div class="text-lg leading-relaxed">
                {!! $blog->content !!}
            </div>
        </div>

        @auth
            <div class="mt-8 flex justify-between items-center">
                <div class="flex">
                    <div class="mr-4">
                        <p>{{ $blog->likesCount() }} likes</p>
                        <form action="{{ route('like') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Like</button>
                        </form>
                    </div>
                    <div>
                        <p>{{ $blog->unlikesCount() }} unlikes</p>
                        <form action="{{ route('unlike') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Unlike</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <p class="mt-8"><a href="{{ route('login') }}" class="text-blue-500">Login</a>เพื่อเข้าสู่ระบบและสามารถแสดงความเห็นได้</p>
        @endauth

        <hr class="my-8">

        <div>
            <h3 class="text-xl font-semibold mb-4">เพิ่มความคิดเห็น</h3>
            @auth
            <form action="{{ route('comments.store') }}" method="POST" class="mb-8">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                <div class="mb-4">
                    <label for="comment_name" class="block text-sm font-medium text-gray-700">ชื่อผู้คอมเม้น</label>
                    <input type="text" name="name" id="comment_name" value="{{ Auth::user()->name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" readonly>
                </div>
                <div class="mb-4">
                    <label for="comment_content" class="block text-sm font-medium text-gray-700">เพิ่มความคิดเห็น</label>
                    <textarea name="content" id="comment_content" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">เพิ่มความคิดเห็น</button>
            </form>
        @else
            <p><a href="{{ route('login') }}" class="text-blue-500">Login</a> เพื่อเข้าสู่ระบบและสามารถแสดงความเห็นได้</p>
        @endauth

        </div>

        <hr class="my-8">

        <div>
            <h3 class="text-xl font-semibold mb-4">ความคิดเห็น</h3>
            @foreach ($comments as $comment)
                <div class="mb-4">
                    <p class="text-lg font-semibold">ชื่อ : {{ $comment->name }}</p>
                    <p class="text-gray-700">{{ $comment->content }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
