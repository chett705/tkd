@extends('backend.layout.app')

@section('title', 'Section Items')
@section('page-title', 'Section Items')
@section('page-subtitle', 'Manage CMS section items')

@section('content')

@php use Illuminate\Support\Str; @endphp


<form method="GET"
      class="bg-gray-900 border border-gray-800 p-4 rounded-xl ">

    <div class="flex flex-wrap items-center justify-between gap-3">

        {{-- LEFT SIDE (FILTERS) --}}
        <div class="flex flex-wrap gap-3 items-center">

            {{-- PAGE --}}
            <select name="page_filter" class="bg-gray-800 text-white px-3 py-2 rounded text-sm">
                <option value="">All Pages</option>
                @foreach($menuGroups as $mg)
                    <option value="{{ $mg->slug }}" {{ request('page_filter') == $mg->slug ? 'selected' : '' }}>
                        {{ $mg->name_en }}
                    </option>
                @endforeach
            </select>

            {{-- SECTION --}}
            <select name="section" class="bg-gray-800 text-white px-3 py-2 rounded text-sm">
                <option value="">All Sections</option>
                @foreach($sections as $s)
                    <option value="{{ $s }}" {{ request('section') == $s ? 'selected' : '' }}>
                        {{ $s }}
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
            <select name="status" class="bg-gray-800 text-white px-3 py-2 rounded text-sm">
                <option value="">All Status</option>
                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>

            {{-- FILTER BUTTON --}}
            <button class="bg-orange-500 text-white px-4 py-2 rounded text-sm hover:bg-orange-600">
                Filter
            </button>

            {{-- RESET --}}
            <a href="{{ route('admin.section-items.index') }}"
               class="bg-gray-700 text-white px-4 py-2 rounded text-sm hover:bg-gray-600">
                Reset
            </a>

        </div>

        {{-- RIGHT SIDE (CREATE BUTTON) --}}
        <div class="flex items-center">

            <a href="{{ route('admin.section-items.create') }}"
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


<div class="space-y-4 mt-4">
    

    @foreach($items as $page => $pageItems)

        {{-- PAGE CARD --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">

            {{-- PAGE TITLE --}}
            <div class="px-4 py-3 border-b border-gray-800">
                <h2 class="text-white font-semibold uppercase">
                    Page: {{ $page }}
                </h2>
            </div>

            {{-- GROUP BY SECTION --}}
            @foreach($pageItems->groupBy('section_key') as $section => $sectionItems)

                {{-- SECTION HEADER --}}
                <div class="px-4 py-2 bg-gray-800/40 text-sm text-orange-400 font-medium border-t border-gray-800">
                    Section: {{ $section }}
                </div>

                {{-- TABLE --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-300">

                        <thead class="text-xs text-gray-400 border-b border-gray-800">
                            <tr>
                                <th class="px-4 py-3">Title</th>
                                <th class="px-4 py-3">Image</th>
                                <th class="px-4 py-3">Sort</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-center">Action</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($sectionItems as $item)

                                <tr class="border-b border-gray-800 hover:bg-gray-800/40">

                                    {{-- TITLE --}}
                                    <td class="px-4 py-3">
                                        <div class="text-white">
                                            {{ $item->title_en }}
                                        </div>
                                        <div class="text-xs text-gray-500">
                                            {{ Str::limit($item->description_en, 40) }}
                                        </div>
                                    </td>

                                    {{-- IMAGE --}}
                                    <td class="px-4 py-3">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                 class="h-10 w-16 object-cover rounded">
                                        @else
                                            <span class="text-gray-500 text-xs">No Image</span>
                                        @endif
                                    </td>

                                    {{-- SORT --}}
                                    <td class="px-4 py-3">
                                        {{ $item->sort_order }}
                                    </td>

                                    {{-- STATUS --}}
                                    <td class="px-4 py-3 text-center">
                                        @if($item->is_active)
                                            <span class="px-2 py-1 text-xs bg-green-500/20 text-green-400 rounded">
                                                Active
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-red-500/20 text-red-400 rounded">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>

                                    {{-- ACTION --}}
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('admin.section-items.show', $item->id) }}"
                                                class="px-3 py-1 text-xs bg-purple-500/20 text-purple-400 rounded hover:bg-purple-500/30">
                                                View
                                            </a>

                                            <a href="{{ route('admin.section-items.edit', $item->id) }}"
                                               class="px-3 py-1 text-xs bg-blue-500/20 text-blue-400 rounded">
                                                Edit
                                            </a>

                                            {{-- <button type="button"
                                                    onclick="openDeleteModal(
                                                        '{{ route('admin.section-items.destroy', $item->id) }}',
                                                        '{{ $item->title_en }}'
                                                    )"
                                                    class="px-3 py-1 text-xs bg-red-500/20 text-red-400 rounded">
                                                Delete
                                            </button> --}}

                                            <button type="button"
                                                    onclick="openDeleteModal(
                                                        '{{ route('admin.section-items.destroy', $item->id) }}',
                                                        '{{ $item->title_en }}'
                                                    )"
                                                    class="px-3 py-1 text-xs bg-red-500/20 text-red-400 rounded hover:bg-red-500/30">
                                                Delete
                                            </button>

                                        </div>
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>
                </div>

            @endforeach

        </div>

    @endforeach

    {{-- DELETE MODAL --}}
    @include('backend.components.destroy')
            
</div>

@endsection