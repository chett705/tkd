@extends('backend.layout.app')

@section('title', 'Page Sections')
@section('page-title', 'Page Sections')
@section('page-subtitle', 'Manage CMS page sections')

@section('content')

<div class="space-y-4">

    

    {{-- MAIN SECTION CARD --}}
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-3">

        <h2 class="text-xl text-white font-bold">
            {{ $section->title_en }}
        </h2>

        <p class="text-gray-400">
            {{ $section->subtitle_en }}
        </p>

        <div class="text-sm text-gray-500">
            Page:
            <span class="text-orange-400">
                {{ $section->page }}
            </span>
        </div>

        <div class="text-sm text-gray-500">
            Section Key:
            {{ $section->section_key }}
        </div>

        <div class="text-sm text-gray-500">
            Sort:
            {{ $section->sort_order }}
        </div>

        {{-- STATUS --}}
        <div>
            @if($section->is_active)
                <span class="text-green-400 text-xs">Active</span>
            @else
                <span class="text-red-400 text-xs">Inactive</span>
            @endif
        </div>

        {{-- MEDIA --}}
        @if($section->media_url)
            <div class="pt-3">
                @if($section->media_type === 'image')
                    <img src="{{ asset('storage/' . $section->media_url) }}"
                         class="w-90 h-40 rounded-lg border border-gray-700">
                @elseif($section->media_type === 'video')
                    <video controls class="w-60 h-70 rounded-lg border border-gray-700">
                        <source src="{{ asset('storage/' . $section->media_url) }}">
                    </video>
                @endif
            </div>
        @endif

    </div>

    {{-- ITEMS (CHILD CARDS) --}}
    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">

        <h3 class="text-white font-semibold mb-4">
            Section Items
        </h3>

        @forelse($section->items as $item)

            <div class="border border-gray-800 rounded-lg p-4 mb-3">

                <div class="text-white font-medium">
                    {{ $item->title_en }}
                </div>

                <div class="text-gray-400 text-sm">
                    {{ $item->description_en }}
                </div>

                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}"
                         class="h-16 mt-2 rounded">
                @endif

            </div>

        @empty
            <p class="text-gray-500 text-sm">No items found</p>
        @endforelse

    </div>

    {{-- ACTION BUTTONS --}}
    <div class="flex justify-end gap-3">

        {{-- CANCEL --}}
        <a href="{{ route('admin.page-sections.index') }}"
           class="px-4 py-2 bg-gray-800 border border-gray-700 text-white rounded-xl hover:bg-gray-700 transition">
            Cancel
        </a>

        {{-- EDIT --}}
        <a href="{{ route('admin.page-sections.edit', $section->id) }}"
           class="px-4 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600 transition">
            Edit
        </a>

    </div>

</div>

@endsection