@extends('Backend.layout.app')

@section('title', isset($group) ? 'Edit Group Menu' : 'Create Group Menu')
@section('page-title', isset($group) ? 'Edit Group Menu' : 'Create Group Menu')
@section('page-subtitle', 'Manage system group menu')

@section('content')

<div class="max-w-xl mx-auto">

    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">

        {{-- HEADER --}}
        <div class="px-5 py-4 border-b border-gray-800">
            <h2 class="text-white font-semibold">
                {{ isset($group) ? 'Edit Menu Group' : 'Create Menu Group' }}
            </h2>
        </div>

        {{-- FORM --}}
        <form action="{{ isset($group)
                ? route('admin.menu-groups.update', $group->id)
                : route('admin.menu-groups.store') }}"
              method="POST">

            @csrf

            @if(isset($group))
                @method('PUT')
            @endif

            <div class="p-5 space-y-4">

                {{-- NAME EN --}}
                <div>
                    <label class="text-gray-400 text-xs">Name (EN)</label>
                    <input type="text" name="name_en"
                        value="{{ $group->name_en ?? '' }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2"
                        placeholder="Group name in English">
                </div>

                {{-- NAME KH --}}
                <div>
                    <label class="text-gray-400 text-xs">Name (KH)</label>
                    <input type="text" name="name_km"
                        value="{{ $group->name_km ?? '' }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2"
                        placeholder="Group name in Khmer">
                </div>

                {{-- SLUG --}}
                <div>
                    <label class="text-gray-400 text-xs">Slug</label>
                    <input type="text" name="slug"
                        value="{{ $group->slug ?? '' }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2"
                        placeholder="menu-group-slug">
                </div>

                {{-- SORT ORDER --}}
                <div>
                    <label class="text-gray-400 text-xs">Sort Order</label>
                    <input type="number" name="sort_order"
                        value="{{ $group->sort_order ?? '' }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2"
                        placeholder="0">
                </div>

                {{-- ACTIVE --}}
                <input type="hidden" name="is_active" value="0">

                <label class="flex items-center gap-2 text-gray-300 text-sm">
                    <input type="checkbox" name="is_active" value="1"
                        {{ old('is_active', isset($group) ? $group->is_active : true) ? 'checked' : '' }}>
                    Active
                </label>

                {{-- ACTIONS --}}
                <div class="flex justify-between pt-4 border-t border-gray-800">

                    <a href="{{ route('admin.menu-groups.index') }}"
                       class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600">
                        Back
                    </a>

                    <button type="submit"
                        class="px-4 py-2 bg-[#0d66b5] text-white rounded hover:bg-[#0a4f97]">
                        {{ isset($group) ? 'Update Group' : 'Create Group' }}
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection

