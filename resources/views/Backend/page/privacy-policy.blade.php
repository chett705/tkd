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
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
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

    {{-- Back / Next --}}
    <div class="mt-6 flex items-center justify-between">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 text-xs text-gray-400 hover:text-orange-400 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Back to Dashboard
        </a>
        <a href="{{ route('terms') }}" class="inline-flex items-center gap-2 text-xs text-orange-400 hover:text-orange-300 transition">
            View Terms of Service
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
        </a>
    </div>

</div>

@endsection
