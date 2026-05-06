@extends('Backend.layout.app')

@section('title', 'Create Page Section')
@section('page-title', 'Create Page Section')
@section('page-subtitle', 'Add new CMS page section')

@section('content')

<div class="max-w-full mx-auto">

<form action="{{ route('admin.page-sections.store') }}"
      method="POST"
      enctype="multipart/form-data"
      class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-6">

    @csrf

    <div class="grid grid-cols-2 gap-4">

        {{-- PAGE --}}
        <div>
            <label class="text-xs text-gray-400">Page *</label>
            <select id="pageSelect"
                    name="page"
                    class="w-full border mt-1 bg-gray-800 text-gray-400 p-2 rounded-xl">

                <option value="">Select Page</option>

                @foreach($pages as $page)
                    <option value="{{ $page->slug }}" data-id="{{ $page->id }}">
                        {{ $page->name_en }}
                    </option>
                @endforeach

            </select>
        </div>

        {{-- SECTION KEY --}}
        <div>
            <label class="text-xs text-gray-400">Section Key *</label>
            <input type="text"
                   name="section_key"
                   class="w-full mt-2  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none"
                   placeholder="hero, services, why-us">
        </div>

    </div>

    {{-- TITLE --}}
    <div class="grid grid-cols-2 gap-4 mt-4">

        <input type="text"
               name="title_en"
               placeholder="Title"
               class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

        <input type="text"
               name="subtitle_en"
               placeholder="Subtitle"
               class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

    </div>

    {{-- DESCRIPTION --}}
    {{-- <div class="mt-4">
        <textarea name="description_en"
                  placeholder="Description"
                  class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none"></textarea>
    </div> --}}

    {{-- BUTTON --}}
    <div class="grid grid-cols-2 gap-4 mt-4">

        <input type="text"
               name="button_text_en"
               placeholder="Button Text"
               class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

        <input type="text"
               name="button_link_en"
               placeholder="Button Link"
               class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

    </div>

    {{-- BUTTON --}}
    <div class="grid grid-cols-2 gap-4 mt-4">

        <input type="text"
               name="button2_text_en"
               placeholder="Button Text"
               class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

        <input type="text"
               name="button2_link_en"
               placeholder="Button Link"
               class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

    </div>

    {{-- MEDIA --}}
    <div class="mt-4">
        <label class="text-xs text-gray-400">Media (Image / Video)</label>
        <input type="file"
               name="media_url"
               class="w-full mt-2  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700">
    </div>

    {{-- TYPE + SORT --}}
    <div class="grid grid-cols-2 gap-4 mt-4">

        <select name="media_type"
                class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

            <option value="">Select Media Type</option>

            @foreach($mediaTypes as $key => $label)
                <option value="{{ $key }}"
                    {{ old('media_type', $section->media_type ?? '') == $key ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach

        </select>
        <input type="number"
               name="sort_order"
               placeholder="Sort Order"
               class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">

    </div>

    {{-- STATUS --}}
    <div class="mt-4">
        <select name="is_active"
                class="w-full  bg-gray-800 text-gray-300 p-2 rounded-xl border border-gray-700 focus:border-[#0d66b5] outline-none">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    </div>

    {{-- ACTION --}}
    <div class="flex justify-end gap-3 mt-6">

        <a href="{{ route('admin.page-sections.index') }}"
           class="px-5 py-2 border rounded-2xl bg-gray-700 text-white   hover:bg-gray-600">
            Cancel
        </a>

        <button class="px-5 py-2 bg-[#0d66b5] text-white rounded-xl hover:bg-[#0a4f97]">
            Create Section
        </button>

    </div>

</form>

</div>

@endsection


