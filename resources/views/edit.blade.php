@extends('layouts.app')
@section('title', 'แก้ไขบทความ')
@section('content')
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold text-center mb-6">แก้ไขบทความ</h2>
        <form method="POST" action="{{ route('update', $blog->id) }}" class="max-w-md mx-auto">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-gray-700">ชื่อบทความ</label>
                <input type="text" name="title" class="form-input mt-1 block w-full border border-gray-300 rounded-md" id="title"
                    value="{{ $blog->title }}">
                @error('title')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700">เนื้อหาบทความ</label>
                <textarea name="content" rows="5" class="form-textarea mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" id="content">{{ $blog->content }}</textarea>
                @error('content')
                    <div class="text-red-500 mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-between">
                <input type="submit" value="อัปเดต" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 cursor-pointer">
                <a href="/blog" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 cursor-pointer">บทความทั้งหมด</a>
            </div>
        </form>
    </div>

    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
