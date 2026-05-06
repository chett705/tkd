@extends('backend.layout.app')

@section('title', 'Section Items')
@section('page-title', 'Section Items')
@section('page-subtitle', 'Manage CMS section items')

@section('content')

@php use Illuminate\Support\Str; @endphp

<form method="GET" class="bg-white border border-slate-200 p-4 rounded-xl shadow-sm">
    <div class="flex flex-wrap items-center justify-between gap-3">

        <div class="flex flex-wrap gap-3 items-center">
            <select name="page_filter" class="bg-slate-50 text-slate-700 border border-slate-200 px-3 py-2 rounded text-sm">
                <option value="">All Pages</option>
                @foreach($menuGroups as $mg)
                    <option value="{{ $mg->slug }}" {{ request('page_filter') == $mg->slug ? 'selected' : '' }}>
                        {{ $mg->name_en }}
                    </option>
                @endforeach
            </select>

            <select name="section" class="bg-slate-50 text-slate-700 border border-slate-200 px-3 py-2 rounded text-sm">
                <option value="">All Sections</option>
                @foreach($sections as $s)
                    <option value="{{ $s }}" {{ request('section') == $s ? 'selected' : '' }}>
                        {{ $s }}
                    </option>
                @endforeach
            </select>

            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search ..." class="bg-slate-50 text-slate-700 border border-slate-200 px-3 py-2 rounded text-sm w-52">

            <select name="status" class="bg-slate-50 text-slate-700 border border-slate-200 px-3 py-2 rounded text-sm">
                <option value="">All Status</option>
                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>

            <button class="bg-[#0d66b5] text-white px-4 py-2 rounded text-sm hover:bg-[#0a4f97]">
                Filter
            </button>

            <a href="{{ route('admin.section-items.index') }}" class="bg-slate-100 text-slate-700 border border-slate-200 px-4 py-2 rounded text-sm hover:bg-slate-200">
                Reset
            </a>
        </div>

        <div class="flex items-center">
            <a href="{{ route('admin.section-items.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-[#0d66b5] text-white text-sm rounded-lg hover:bg-[#0a4f97] transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Create Item
            </a>
        </div>

    </div>
</form>

<div class="space-y-4 mt-4">
    @foreach($items as $page => $pageItems)
        <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">
            <div class="px-4 py-3 border-b border-slate-200">
                <h2 class="text-slate-900 font-semibold uppercase">
                    Page: {{ $page }}
                </h2>
            </div>

            @foreach($pageItems->groupBy('section_key') as $section => $sectionItems)
                <div class="px-4 py-2 bg-slate-50 text-sm text-[#0d66b5] font-medium border-t border-slate-200">
                    Section: {{ $section }}
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-slate-700">
                        <thead class="text-xs text-slate-500 border-b border-slate-200">
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
                                <tr class="border-b border-slate-200 hover:bg-slate-50">
                                    <td class="px-4 py-3">
                                        <div class="text-slate-900">
                                            {{ $item->title_en }}
                                        </div>
                                        <div class="text-xs text-slate-500">
                                            {{ Str::limit($item->description_en, 40) }}
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        @if($item->image)
                                            <img src="{{ asset('storage/' . $item->image) }}" class="h-10 w-16 object-cover rounded border border-slate-200">
                                        @else
                                            <span class="text-slate-400 text-xs">No Image</span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $item->sort_order }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        @if($item->is_active)
                                            <span class="px-2 py-1 text-xs bg-[#0d66b5]/10 text-[#0d66b5] rounded">
                                                Active
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-red-500/10 text-red-500 rounded">
                                                Inactive
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('admin.section-items.show', $item->id) }}" class="px-3 py-1 text-xs bg-slate-100 text-slate-600 rounded border border-slate-200 hover:bg-slate-200">
                                                View
                                            </a>

                                            <a href="{{ route('admin.section-items.edit', $item->id) }}" class="px-3 py-1 text-xs bg-[#0d66b5]/10 text-[#0d66b5] rounded hover:bg-[#0d66b5]/20">
                                                Edit
                                            </a>

                                            <button type="button" onclick="openDeleteModal('{{ route('admin.section-items.destroy', $item->id) }}', '{{ $item->title_en }}')" class="px-3 py-1 text-xs bg-red-500/10 text-red-500 rounded hover:bg-red-500/20">
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

    @include('backend.components.destroy')
</div>

@endsection
