@if ($paginator->hasPages())
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 w-full">
        <!-- Totals indicator -->
        <div class="text-sm text-slate-500 font-medium order-2 sm:order-1">
            @if ($paginator->firstItem())
                แสดง <span class="font-bold text-slate-800">{{ $paginator->firstItem() }}</span> ถึง <span class="font-bold text-slate-800">{{ $paginator->lastItem() }}</span> จาก <span class="font-bold text-slate-800">{{ $paginator->total() }}</span> รายการ
            @else
                แสดงทั้งหมด <span class="font-bold text-slate-800">{{ $paginator->count() }}</span> รายการ
            @endif
        </div>

        <!-- Pagination Buttons Group -->
        <div class="join flex-nowrap border border-slate-200/60 rounded-xl overflow-hidden shadow-sm bg-white order-1 sm:order-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="join-item btn btn-sm h-10 min-h-10 px-3 bg-slate-50 text-slate-300 border-none cursor-not-allowed" disabled>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="join-item btn btn-sm h-10 min-h-10 px-3 bg-white hover:bg-slate-50 text-slate-600 border-none flex items-center justify-center transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <button class="join-item btn btn-sm h-10 min-h-10 px-3 bg-slate-50 text-slate-400 border-none cursor-default" disabled>{{ $element }}</button>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <button class="join-item btn btn-sm h-10 min-h-10 px-4 bg-indigo-600 hover:bg-indigo-600 text-white border-none font-extrabold">{{ $page }}</button>
                        @else
                            <a href="{{ $url }}" class="join-item btn btn-sm h-10 min-h-10 px-4 bg-white hover:bg-slate-50 text-slate-600 border-none font-semibold transition">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="join-item btn btn-sm h-10 min-h-10 px-3 bg-white hover:bg-slate-50 text-slate-600 border-none flex items-center justify-center transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                </a>
            @else
                <button class="join-item btn btn-sm h-10 min-h-10 px-3 bg-slate-50 text-slate-300 border-none cursor-not-allowed" disabled>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
                </button>
            @endif
        </div>
    </div>
@endif
