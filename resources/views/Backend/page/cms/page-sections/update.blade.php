@extends('Backend.layout.app')

@section('title', 'Page Sections')
@section('page-title', 'Page Sections')
@section('page-subtitle', 'Manage CMS page sections')

@section('content')

    <div class="max-w-full mx-auto">

        <form action="{{ route('admin.page-sections.update', $section->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-6">

            @csrf
            @method('PUT')

            {{-- PAGE + SECTION KEY --}}
            <div class="grid grid-cols-2 gap-4 ">

                {{-- PAGE --}}
                <div>
                    <label class="text-xs text-gray-400">Page *</label>

                    <select id="pageSelect" name="page"
                        class="w-full mt-2  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

                        <option value="">Select Page</option>

                        @foreach ($pages as $page)
                            <option value="{{ $page->slug }}" {{ $section->page == $page->slug ? 'selected' : '' }}>
                                {{ $page->name_en }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- SECTION KEY --}}
                <div>
                    <label class="text-xs text-gray-400">Section Key *</label>

                    <input type="text" name="section_key" value="{{ old('section_key', $section->section_key) }}"
                        placeholder="hero, services, why-us"
                        class="w-full mt-2  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">
                </div>

            </div>

            {{-- TITLE + SUBTITLE --}}
            <div class="grid grid-cols-2 gap-4 mt-4 mb-4">

                <input type="text" name="title_en" value="{{ old('title_en', $section->title_en) }}" placeholder="Title"
                    class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

                <input type="text" name="subtitle_en" value="{{ old('subtitle_en', $section->subtitle_en) }}"
                    placeholder="Subtitle"
                    class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

            </div>

            {{-- DESCRIPTION --}}
            {{-- <div>
                <textarea name="description_en"
                    class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none"
                    placeholder="Description">{{ old('description_en', $section->description_en) }}</textarea>
            </div> --}}

            {{-- BUTTON --}}
            <div class="grid grid-cols-2 gap-4 mt-4">

                <input type="text" name="button_text_en" value="{{ old('button_text_en', $section->button_text_en) }}"
                    placeholder="Button Text"
                    class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

                <input type="text" name="button_link_en" value="{{ old('button_link_en', $section->button_link_en) }}"
                    placeholder="Button Link"
                    class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

            </div>

            {{-- BUTTON --}}
            <div class="grid grid-cols-2 gap-4 mt-4">

                <input type="text" name="button_text_km"
                    value="{{ old('button_text_km', $section->button_text_km) }}" placeholder="Button Text"
                    class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

                <input type="text" name="button_link_km"
                    value="{{ old('button_link_km', $section->button_link_km) }}" placeholder="Button Link"
                    class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

            </div>

            {{-- MEDIA + TYPE --}}
            <div class="grid grid-cols-2 gap-4 mt-4 mb-4">

                <div>
                    <label class="text-xs text-gray-400">Media (Image / Video)</label>

                    <input type="file" name="media_url"
                        class="w-full mt-2  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700">

                    @if ($section->media_url)
                        <img src="{{ asset('storage/' . $section->media_url) }}"
                            class="h-16 mt-2 rounded border border-gray-700">
                    @endif
                </div>

                <div>
                    <label class="text-xs text-gray-400">Media Type</label>

                    <select name="media_type"
                        class="w-full  bg-gray-800 text-gray-300 p-2 mt-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

                        <option value="">Select Media Type</option>

                        @foreach ($mediaTypes as $key => $label)
                            <option value="{{ $key }}"
                                {{ old('media_type', $section->media_type ?? '') == $key ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach

                    </select>
                </div>

            </div>

            {{-- SORT + STATUS --}}
            <div class="grid grid-cols-2 gap-4">

                <input type="number" name="sort_order" value="{{ old('sort_order', $section->sort_order) }}"
                    placeholder="Sort Order"
                    class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

                <select name="is_active"
                    class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

                    <option value="1" {{ $section->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$section->is_active ? 'selected' : '' }}>Inactive</option>

                </select>

            </div>

            {{-- ACTION --}}
            <div class="flex justify-end gap-3 pt-4 border-t border-gray-800">

                <a href="{{ route('admin.page-sections.index') }}"
                    class="px-5 py-2  bg-gray-800 text-white rounded-xl border border-gray-700 hover:bg-gray-700">
                    Cancel
                </a>

                <button class="px-5 py-2 bg-[#0d66b5] text-white rounded-xl hover:bg-[#0a4f97]">
                    Update Section
                </button>

            </div>

        </form>

    </div>

@endsection


