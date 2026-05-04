@extends('backend.layout.app')

@section('title', isset($page) ? 'Update Page' : 'Create Page')
@section('page-title', isset($page) ? 'Update Page' : 'Create Page')
@section('page-subtitle', 'Manage CMS Page')

@section('content')

<div class="max-w-full mx-auto">

    <form action="{{ isset($page)
            ? route('admin.pages.update', $page->id)
            : route('admin.pages.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-6">

        @csrf
        @if(isset($page))
            @method('PUT')
        @endif

        {{-- SLUG + TYPE --}}
        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="text-xs text-gray-400">Slug</label>
                <input type="text"
                       name="slug"
                       value="{{ old('slug', $page->slug ?? '') }}"
                       placeholder="page-slug"
                       class="mt-2 w-full bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">
            </div>

            <div>
                <label class="text-xs text-gray-400">Type</label>
                <input type="text"
                       name="type"
                       value="{{ old('type', $page->type ?? '') }}"
                       placeholder="page type"
                       class="mt-2 w-full bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">
            </div>

        </div>

        {{-- TITLE --}}
        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="text-xs text-gray-400">Title</label>
                <input type="text"
                       name="title_en"
                       value="{{ old('title_en', $page->title_en ?? '') }}"
                       placeholder="Page title"
                       class="mt-2 w-full bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">
            </div>

            <div>
                <label class="text-xs text-gray-400">Subtitle</label>
                <input type="text"
                       name="subtitle_en"
                       value="{{ old('subtitle_en', $page->subtitle_en ?? '') }}"
                       placeholder="Page subtitle"
                       class="mt-2 w-full bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">
            </div>

        </div>

        {{-- CONTENT + STATUS --}}
        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="text-xs text-gray-400">Content</label>
                <textarea name="content_en"
                          placeholder="Page content..."
                          class="mt-2 w-full bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">{{ old('content_en', $page->content_en ?? '') }}</textarea>
            </div>

            <div>
                <label class="text-xs text-gray-400">Status</label>

                <select name="is_active"
                        class="mt-2 w-full bg-gray-800 text-gray-400 p-5 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">

                    <option value="1" {{ (isset($page) && $page->is_active) ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ (isset($page) && !$page->is_active) ? 'selected' : '' }}>Inactive</option>

                </select>
            </div>

        </div>

        {{-- SEO --}}
        <div class="grid grid-cols-2 gap-4">

            <div>
                <label class="text-xs text-gray-400">Meta Title</label>
                <input type="text"
                       name="meta_title"
                       value="{{ old('meta_title', $page->meta_title ?? '') }}"
                       placeholder="SEO title"
                       class="mt-2 w-full bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">
            </div>

            <div>
                <label class="text-xs text-gray-400">Meta Keywords</label>
                <input type="text"
                       name="meta_keywords"
                       value="{{ old('meta_keywords', $page->meta_keywords ?? '') }}"
                       placeholder="keyword1, keyword2"
                       class="mt-2 w-full bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">
            </div>

        </div>

        {{-- META DESCRIPTION --}}
        <div>
            <label class="text-xs text-gray-400">Meta Description</label>
            <textarea name="meta_description"
                      placeholder="SEO description..."
                      class="mt-2 w-full bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">{{ old('meta_description', $page->meta_description ?? '') }}</textarea>
        </div>

        {{-- IMAGE --}}
        <div>
            <label class="text-xs text-gray-400">Featured Image</label>

            <input type="file"
                   name="featured_image"
                   class="mt-2 w-full bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700">

            @if(isset($page) && $page->featured_image)
                <img src="{{ asset('storage/' . $page->featured_image) }}"
                     class="h-24 mt-3 rounded-lg border border-gray-700">
            @endif
        </div>

        {{-- ACTION --}}
        <div class="flex justify-end gap-3 pt-4 border-t border-gray-800">

            <a href="{{ route('admin.pages.index') }}"
               class="px-5 py-2 bg-gray-800 text-white rounded-xl border border-gray-700 hover:bg-gray-700">
                Cancel
            </a>

            <button class="px-5 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600">
                {{ isset($page) ? 'Update Page' : 'Create Page' }}
            </button>

        </div>

    </form>

</div>

@endsection