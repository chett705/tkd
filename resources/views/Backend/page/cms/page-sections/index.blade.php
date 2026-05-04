@extends('backend.layout.app')

@section('title', 'Page Sections')
@section('page-title', 'Page Sections')
@section('page-subtitle', 'Manage CMS Page Sections')

@section('content')

 
<form method="GET"
      class="bg-gray-900 border border-gray-800 p-4 rounded-xl mb-4">

    <div class="flex flex-wrap items-center justify-between gap-3">

        {{-- LEFT SIDE (FILTERS) --}}
        <div class="flex flex-wrap gap-3 items-center">

            {{-- PAGE FILTER --}}
            <select name="page"
                    class="bg-gray-800 text-white px-3 py-2 rounded text-sm">

                <option value="">All Pages</option>

                @foreach($pages as $page)
                    <option value="{{ $page }}"
                        {{ request('page') == $page ? 'selected' : '' }}>
                        {{ $page }}
                    </option>
                @endforeach

            </select>

            {{-- SECTION KEY FILTER --}}
            <select name="section_key"
                    class="bg-gray-800 text-white px-3 py-2 rounded text-sm">

                <option value="">All Keys</option>

                @foreach($sectionKeys as $key)
                    <option value="{{ $key }}"
                        {{ request('section_key') == $key ? 'selected' : '' }}>
                        {{ $key }}
                    </option>
                @endforeach

            </select>

            {{-- SEARCH --}}
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="Search ..."
                   class="bg-gray-800 text-white px-3 py-2 rounded text-sm w-52">

            {{-- STATUS --}}
            <select name="status"
                    class="bg-gray-800 text-white px-3 py-2 rounded text-sm">

                <option value="">All Status</option>
                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>

            </select>

            {{-- FILTER BUTTON --}}
            <button class="bg-orange-500 text-white px-4 py-2 rounded text-sm hover:bg-orange-600">
                Filter
            </button>

            {{-- RESET --}}
            <a href="{{ route('admin.page-sections.index') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded text-sm hover:bg-gray-600">
                Reset
            </a>

        </div>

        {{-- RIGHT SIDE (CREATE BUTTON) --}}
        <div class="flex items-center">

            <a href="{{ route('admin.page-sections.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2 bg-orange-500 text-white text-sm rounded-lg hover:bg-orange-600 transition">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 4v16m8-8H4"/>
                </svg>

                Create Item
            </a>

        </div>

    </div>

</form>

<div class="space-y-4">

    @foreach($sections as $page => $items)

        {{-- PAGE CARD --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">

            {{-- PAGE HEADER --}}
            <div class="px-4 py-3 border-b border-gray-800">
                <h2 class="text-white font-semibold uppercase">
                    {{ $page }}
                </h2>
            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-300">

                    <thead class="text-xs text-gray-400 border-b border-gray-800">
                        <tr>
                            <th class="px-4 py-3">Key</th>
                            <th class="px-4 py-3">Title</th>
                            <th class="px-4 py-3">Subtitle</th>
                            <th class="px-4 py-3">Media</th>
                            <th class="px-4 py-3">Order</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($items as $section)

                            <tr class="border-b border-gray-800 hover:bg-gray-800/40">

                                {{-- KEY --}}
                                <td class="px-4 py-3 text-white">
                                    {{ $section->section_key }}
                                </td>

                                {{-- TITLE --}}
                                <td class="px-4 py-3 text-white">
                                    {{ $section->title_en }}
                                </td>

                                {{-- SUBTITLE --}}
                                <td class="px-4 py-3 text-gray-400">
                                    {{ \Illuminate\Support\Str::limit($section->subtitle_en, 40) }}
                                </td>

                                {{-- MEDIA --}}
                                <td class="px-4 py-3">
                                    @if($section->media_type === 'image')
                                        <img src="{{ asset('storage/' . $section->media_url) }}"
                                             class="w-6 h-6 object-cover rounded">
                                    @else
                                        <span class="text-gray-500 text-xs">
                                            {{ $section->media_type ?? '-' }}
                                        </span>
                                    @endif
                                </td>

                                {{-- SORT --}}
                                <td class="px-4 py-3">
                                    {{ $section->sort_order }}
                                </td>

                                {{-- STATUS --}}
                                <td class="px-4 py-3">
                                    @if($section->is_active)
                                        <span class="text-green-400 text-xs">Active</span>
                                    @else
                                        <span class="text-red-400 text-xs">Inactive</span>
                                    @endif
                                </td>

                                {{-- ACTION --}}
                                <td class="px-4 py-3 text-center space-x-2">

                                     <a href="{{ route('admin.page-sections.show', $section->id) }}"
                                       class="px-3 py-1 text-xs bg-blue-500/20 text-blue-400 rounded hover:bg-blue-500/30">
                                        view
                                    </a>

                                    <a href="{{ route('admin.page-sections.edit', $section->id) }}"
                                       class="px-3 py-1 text-xs bg-blue-500/20 text-blue-400 rounded hover:bg-blue-500/30">
                                        Edit
                                    </a>

                                    <button type="button"
                                            onclick="openDeleteModal(
                                                '{{ route('admin.page-sections.destroy', $section->id) }}',
                                                '{{ $section->section_key }}'
                                            )"
                                            class="px-3 py-1 text-xs bg-red-500/20 text-red-400 rounded hover:bg-red-500/30">
                                        Delete
                                    </button>

                                    @include('backend.components.destroy')

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    @endforeach

</div>

@endsection