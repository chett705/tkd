@extends('backend.layout.app')

@section('title', 'Page Detail')
@section('page-title', 'Page Detail')
@section('page-subtitle', 'View CMS Page Information')

@section('content')

<div class="space-y-6">

    {{-- ACTION BUTTONS --}}
    <div class="flex justify-end gap-3">

        <a href="{{ route('admin.pages.index') }}"
           class="px-4 py-2 bg-gray-800 text-white rounded-xl border border-gray-700 hover:bg-gray-700">
            Cancel
        </a>

        <a href="{{ route('admin.pages.edit', $page->id) }}"
           class="px-4 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600">
            Edit Page
        </a>

    </div>

    {{-- MAIN CARD --}}
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-4 mt-4">

        {{-- TITLE --}}
        <div>
            <h1 class="text-2xl font-bold text-white">
                {{ $page->title_en }}
            </h1>

            <p class="text-gray-400 mt-1">
                {{ $page->subtitle_en }}
            </p>
        </div>

        {{-- META INFO --}}
        <div class="grid grid-cols-2 gap-4 text-sm">

            <div>
                <p class="text-gray-500">Slug</p>
                <p class="text-orange-400">{{ $page->slug }}</p>
            </div>

            <div>
                <p class="text-gray-500">Type</p>
                <p class="text-white">{{ $page->type }}</p>
            </div>

            <div>
                <p class="text-gray-500">Status</p>
                @if($page->is_active)
                    <span class="text-green-400 text-xs">Active</span>
                @else
                    <span class="text-red-400 text-xs">Inactive</span>
                @endif
            </div>

            <div>
                <p class="text-gray-500">Created At</p>
                <p class="text-white">{{ $page->created_at }}</p>
            </div>

        </div>

        {{-- CONTENT --}}
        <div class="grid grid-cols-1 gap-4 mt-4">

           @if ($page->content_en)
            <div class="prose prose-invert prose-sm max-w-none
                    prose-headings:text-white prose-headings:font-semibold
                    prose-p:text-gray-400 prose-p:leading-relaxed
                    prose-li:text-gray-400
                    prose-strong:text-white
                    prose-a:text-orange-400 prose-a:no-underline hover:prose-a:text-orange-300
                    rounded-xl border border-white/5   p-6 sm:p-8">

            {!! nl2br(e($page->content_en)) !!}

            </div>
        @else
            <div class="rounded-xl border border-white/5 bg-[#1a222e] p-8 text-center text-sm text-gray-500">
                No content available.
            </div>
        @endif

        </div>

        {{-- FEATURE IMAGE --}}
        @if($page->featured_image)
            <div class="mt-4">
                <p class="text-gray-500 text-sm mb-2">Featured Image</p>

                <img src="{{ asset('storage/' . $page->featured_image) }}"
                     class="w-full max-h-[400px] object-cover rounded-xl border border-gray-700">
            </div>
        @endif

        {{-- SEO --}}
        <div class="mt-6 border-t border-gray-800 pt-4">

            <h3 class="text-white font-semibold mb-3">SEO</h3>

            <div class="grid grid-cols-1 gap-3 text-sm">

                <div>
                    <p class="text-gray-500">Meta Title</p>
                    <p class="text-white">{{ $page->meta_title }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Meta Description</p>
                    <p class="text-gray-400">{{ $page->meta_description }}</p>
                </div>

                <div>
                    <p class="text-gray-500">Meta Keywords</p>
                    <p class="text-gray-400">{{ $page->meta_keywords }}</p>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection