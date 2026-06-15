@extends('layouts.app')
@section('title', 'บทความทั้งหมด')

@section('content')
    <div class="max-w-6xl mx-auto space-y-6">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center border-b border-slate-200 pb-5">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900">จัดการบทความ</h1>
                <p class="text-slate-500 mt-1">แก้ไข ลบ หรือเปลี่ยนแปลงสถานะของบทความทั้งหมดของคุณ</p>
            </div>
            <a href="/create" class="btn btn-primary bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 border-none px-5 py-2.5 rounded-xl text-white shadow-md hover:shadow-lg transition active:scale-95 font-semibold mt-4 sm:mt-0 flex items-center gap-1.5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"></path></svg>
                <span>เขียนบทความใหม่</span>
            </a>
        </div>

        @if (count($blogs) > 0)
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="table w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-50/75 border-b border-slate-100 text-slate-600 font-semibold text-sm">
                                <th class="p-4 pl-6">ชื่อบทความ</th>
                                <th class="p-4 text-center">สถานะบทความ</th>
                                <th class="p-4 text-center">การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @foreach ($blogs as $item)
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="p-4 pl-6 font-semibold text-slate-800 max-w-md truncate">
                                        <a href="/detail/{{ $item->id }}" class="hover:text-indigo-600 transition">
                                            {{ $item->title }}
                                        </a>
                                    </td>
                                    <td class="p-4 text-center">
                                        @if ($item->status == true)
                                            <a href="{{ route('change', $item->id) }}" class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200/50 hover:bg-emerald-100 hover:border-emerald-300 transition">
                                                ● เผยแพร่
                                            </a>
                                        @else
                                            <a href="{{ route('change', $item->id) }}" class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-semibold bg-slate-50 text-slate-500 border border-slate-200/50 hover:bg-slate-100 hover:border-slate-300 transition">
                                                ○ ฉบับร่าง
                                            </a>
                                        @endif
                                    </td>
                                    <td class="p-4 text-center whitespace-nowrap">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('edit', $item->id) }}" class="btn btn-sm btn-ghost hover:bg-amber-50 hover:text-amber-700 text-amber-600 border border-amber-200/50 hover:border-amber-300 rounded-xl transition flex items-center gap-1.5 px-3">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                <span>แก้ไข</span>
                                            </a>
                                            <a href="{{ route('delete', $item->id) }}" class="btn btn-sm btn-ghost hover:bg-rose-50 hover:text-rose-700 text-rose-600 border border-rose-200/50 hover:border-rose-300 rounded-xl transition flex items-center gap-1.5 px-3"
                                               onclick="return confirm('คุณต้องการลบข้อมูล {{ $item->title }} หรือไม่ ?')">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                <span>ลบ</span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-6 flex justify-center">
                {{ $blogs->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-2xl border border-slate-100 shadow-sm">
                <span class="text-4xl">📭</span>
                <h3 class="mt-4 text-lg font-bold text-slate-800">ไม่มีบทความในระบบ</h3>
                <p class="text-slate-500 text-sm mt-1">มาเริ่มต้นเขียนบทความแรกของคุณกันเถอะ!</p>
                <a href="/create" class="btn btn-primary mt-6 bg-indigo-600 hover:bg-indigo-700 border-none rounded-xl">
                    เขียนบทความเลย
                </a>
            </div>
        @endif
    </div>
@endsection
