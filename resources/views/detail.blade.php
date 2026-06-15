@extends('layouts.app')
@section('title', $blog->title)

@section('content')
    <div class="max-w-4xl mx-auto space-y-8">
        <!-- Back Button -->
        <div>
            <a href="/" class="btn btn-sm btn-ghost border border-slate-200 hover:bg-slate-100 text-slate-600 rounded-xl transition-colors flex gap-2 w-fit">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                <span>กลับไปหน้าแรก</span>
            </a>
        </div>

        <!-- Article Card -->
        <article class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
            <!-- Header/Gradient block -->
            <div class="h-16 bg-gradient-to-r from-indigo-500 to-purple-600 px-8 py-4 relative flex items-center">
                <div class="absolute inset-0 bg-black/10"></div>
                <div class="relative z-10 text-white">
                    <span class="text-xs font-semibold bg-white/20 px-2.5 py-1 rounded-full backdrop-blur-md">บทความ</span>
                </div>
            </div>

            <div class="p-8 sm:p-10 space-y-6">
                <div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 leading-tight">
                        {{ $blog->title }}
                    </h1>
                    <div class="flex items-center gap-3 text-sm text-slate-400 mt-4 pb-6 border-b border-slate-100">
                        <span>📅 {{ $blog->created_at ? $blog->created_at->locale('th')->translatedFormat('d M Y') : 'ไม่ระบุวันที่' }}</span>
                        <span>•</span>
                        <span>👤 ผู้เขียน: Admin</span>
                    </div>
                </div>

                <!-- Article Content -->
                <div class="text-slate-700 leading-relaxed text-lg prose max-w-none">
                    {!! $blog->content !!}
                </div>

                <!-- Like / Unlike Bar -->
                <div class="pt-6 border-t border-slate-100 flex flex-wrap items-center justify-between gap-4">
                    @auth
                        <div class="inline-flex items-center border border-slate-200/60 rounded-full overflow-hidden shadow-sm">
                            <!-- Like Form -->
                            <form action="{{ route('like') }}" method="post" class="inline">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                @if($blog->likedByUser(Auth::user()->id))
                                    <button type="submit" class="btn btn-sm h-10 px-5 rounded-none border-none bg-blue-600 hover:bg-blue-700 text-white font-semibold transition flex items-center gap-2 border-r border-slate-200/60">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 21h1v-8H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2zM20.86 10.05A2 2 0 0 0 19 8h-5.63l.9-4.29a1 1 0 0 0-.25-.83 1 1 0 0 0-.76-.32l-.46.46-5.83 5.84A2 2 0 0 0 6 10.26V19a2 2 0 0 0 2 2h7.86a2 2 0 0 0 1.9-1.37l2.85-6.66a2 2 0 0 0-.15-1.92z"/></svg>
                                        <span>{{ $blog->likesCount() }} ถูกใจ</span>
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-sm h-10 px-5 rounded-none border-none bg-blue-50/50 hover:bg-blue-100 text-blue-700 hover:text-blue-800 font-semibold transition flex items-center gap-2 border-r border-slate-200/60">
                                        <svg class="w-4 h-4 fill-blue-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 21h1v-8H4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2zM20.86 10.05A2 2 0 0 0 19 8h-5.63l.9-4.29a1 1 0 0 0-.25-.83 1 1 0 0 0-.76-.32l-.46.46-5.83 5.84A2 2 0 0 0 6 10.26V19a2 2 0 0 0 2 2h7.86a2 2 0 0 0 1.9-1.37l2.85-6.66a2 2 0 0 0-.15-1.92z"/></svg>
                                        <span>{{ $blog->likesCount() }} ถูกใจ</span>
                                    </button>
                                @endif
                            </form>

                            <!-- Unlike Form -->
                            <form action="{{ route('unlike') }}" method="post" class="inline">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                @if($blog->unlikedByUser(Auth::user()->id))
                                    <button type="submit" class="btn btn-sm h-10 px-5 rounded-none border-none bg-rose-600 hover:bg-rose-700 text-white font-semibold transition flex items-center gap-2">
                                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 3h-1v8h1a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM3.14 13.95A2 2 0 0 0 5 16h5.63l-.9 4.29a1 1 0 0 0 .25.83 1 1 0 0 0 .76.32l.46-.46 5.83-5.84A2 2 0 0 0 18 13.74V5a2 2 0 0 0-2-2H8.14a2 2 0 0 0-1.9 1.37L3.39 12a2 2 0 0 0 .15 1.92z"/></svg>
                                        <span>{{ $blog->unlikesCount() }} ไม่ชอบ</span>
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-sm h-10 px-5 rounded-none border-none bg-rose-50/50 hover:bg-rose-100 text-rose-700 hover:text-rose-800 font-semibold transition flex items-center gap-2">
                                        <svg class="w-4 h-4 fill-rose-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 3h-1v8h1a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM3.14 13.95A2 2 0 0 0 5 16h5.63l-.9 4.29a1 1 0 0 0 .25.83 1 1 0 0 0 .76.32l.46-.46 5.83-5.84A2 2 0 0 0 18 13.74V5a2 2 0 0 0-2-2H8.14a2 2 0 0 0-1.9 1.37L3.39 12a2 2 0 0 0 .15 1.92z"/></svg>
                                        <span>{{ $blog->unlikesCount() }} ไม่ชอบ</span>
                                    </button>
                                @endif
                            </form>
                        </div>
                    @else
                        <div class="flex flex-wrap items-center gap-4">
                            <div class="inline-flex items-center border border-slate-200/60 rounded-full overflow-hidden shadow-sm">
                                <span class="flex items-center gap-1.5 px-4 py-2 bg-blue-50/50 text-blue-700 text-xs font-semibold border-r border-slate-200/60">
                                    👍 {{ $blog->likesCount() }} ถูกใจ
                                </span>
                                <span class="flex items-center gap-1.5 px-4 py-2 bg-rose-50/50 text-rose-700 text-xs font-semibold">
                                    👎 {{ $blog->unlikesCount() }} ไม่ชอบ
                                </span>
                            </div>
                            <span class="text-slate-500 text-sm font-medium">
                                <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:text-indigo-700 hover:underline">เข้าสู่ระบบ</a> เพื่อแสดงความรู้สึก
                            </span>
                        </div>
                    @endauth
                </div>
            </div>
        </article>

        <!-- Comments Section -->
        <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 sm:p-10 space-y-8">
            <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-2">
                💬 ความคิดเห็น ({{ count($comments) }})
            </h2>

            <!-- Add Comment Form -->
            <div>
                @auth
                    <form action="{{ route('comments.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                        
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label for="comment_name" class="block text-sm font-semibold text-slate-600 mb-1">ชื่อผู้แสดงความคิดเห็น</label>
                                <input type="text" name="name" id="comment_name" value="{{ Auth::user()->name }}" class="input input-bordered w-full bg-slate-50 text-slate-500 border-slate-200 cursor-not-allowed font-medium" readonly>
                            </div>
                            <div>
                                <label for="comment_content" class="block text-sm font-semibold text-slate-600 mb-1">ข้อความ</label>
                                <textarea name="content" id="comment_content" rows="3" placeholder="เขียนแสดงความคิดเห็นที่นี่..." class="textarea textarea-bordered w-full border-slate-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500" required></textarea>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-primary bg-indigo-600 hover:bg-indigo-700 border-none px-6 rounded-xl text-white font-bold transition shadow-md flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                <span>ส่งความคิดเห็น</span>
                            </button>
                        </div>
                    </form>
                @else
                    <div class="bg-slate-50 border border-slate-200/60 rounded-2xl p-6 text-center text-slate-600 text-sm">
                        กรุณา <a href="{{ route('login') }}" class="font-bold text-indigo-600 hover:underline">เข้าสู่ระบบ</a> เพื่อแสดงความคิดเห็น
                    </div>
                @endauth
            </div>

            <div class="h-px bg-slate-100"></div>

            <!-- Comments List -->
            <div class="space-y-4">
                @forelse ($comments as $comment)
                    <div class="flex gap-4 p-4 rounded-2xl bg-slate-50/50 border border-slate-100/80">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 text-indigo-700 font-bold flex items-center justify-center shrink-0 uppercase">
                            {{ substr($comment->name, 0, 2) }}
                        </div>
                        <div class="space-y-1 flex-grow">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-slate-800 text-sm">{{ $comment->name }}</span>
                                <span class="text-[11px] text-slate-400">{{ $comment->created_at ? $comment->created_at->diffForHumans() : '' }}</span>
                            </div>
                            <p class="text-slate-600 text-sm whitespace-pre-line leading-relaxed">
                                {{ $comment->content }}
                            </p>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-slate-400 py-4">ยังไม่มีใครแสดงความคิดเห็นในบทความนี้</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
