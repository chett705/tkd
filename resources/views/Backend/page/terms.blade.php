@extends('backend.layout.app')

@section('title', $page->meta_title ?? $page->title_en)
@section('page-title', $page->title_en)
@section('page-subtitle', $page->subtitle_en ?? '')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- Header Card --}}
    <div class="relative overflow-hidden rounded-2xl border border-orange-500/15 bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-6 sm:p-8 mb-6">
        <div class="relative z-10 flex flex-col sm:flex-row sm:items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-orange-500/15 border border-orange-500/25 flex items-center justify-center flex-shrink-0">
                <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-lg sm:text-xl font-bold text-white">{{ $page->title_en }}</h2>
                @if ($page->subtitle_en)
                    <p class="text-xs text-gray-400 mt-0.5">{{ $page->subtitle_en }}</p>
                @endif
                <p class="text-xs text-gray-600 mt-0.5">Last updated: {{ $page->updated_at?->format('F d, Y') ?? date('F d, Y') }}</p>
            </div>
        </div>
        <div class="absolute -top-8 -right-8 w-40 h-40 rounded-full bg-orange-500/5 blur-2xl pointer-events-none"></div>
    </div>

    {{-- Content from DB --}}
    @if ($page->content_en)
        <div class="prose prose-invert prose-sm max-w-none
               prose-headings:text-white prose-headings:font-semibold
               prose-p:text-gray-400 prose-p:leading-relaxed
               prose-li:text-gray-400
               prose-strong:text-white
               prose-a:text-orange-400 prose-a:no-underline hover:prose-a:text-orange-300
               rounded-xl border border-white/5 bg-[#1a1a2e] p-6 sm:p-8">

            {!! nl2br(e($page->content_en)) !!}

        </div>
    @else
        <div class="rounded-xl border border-white/5 bg-[#1a1a2e] p-8 text-center text-sm text-gray-500">
            No content available.
        </div>
    @endif

    {{-- Back / Prev --}}
    <div class="mt-6 flex items-center justify-between">
        <a href="{{ route('privacy') }}" class="inline-flex items-center gap-2 text-xs text-gray-400 hover:text-orange-400 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            View Privacy Policy
        </a>
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-xs text-orange-400 hover:text-orange-300 transition">
            Back to Dashboard
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>

</div>

@endsection
