@extends('backend.layout.app')

@section('title', isset($menu) ? 'Edit Menu' : 'Create Menu')
@section('page-title', isset($menu) ? 'Edit Menu' : 'Create Menu')
@section('page-subtitle', 'Manage system menu')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">

        {{-- HEADER --}}
        <div class="px-5 py-4 border-b border-gray-800">
            <h2 class="text-white font-semibold">
                {{ isset($menu) ? 'Edit Menu' : 'Create Menu' }}
            </h2>
        </div>

        {{-- FORM --}}
        <form action="{{ isset($menu)
                ? route('admin.menus.update', $menu->id)
                : route('admin.menus.store') }}"
              method="POST">

            @csrf

            @if(isset($menu))
                @method('PUT')
            @endif

            <div class="p-5 space-y-4">

                {{-- VALIDATION ERRORS --}}
                @if($errors->any())
                    <div class="bg-red-500/10 border border-red-500/30 rounded px-4 py-3 text-sm text-red-400">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- GROUP --}}
                <div>
                    <label class="text-gray-400 text-xs">Menu Group</label>
                    <select name="menu_group_id"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">

                        <option value="">-- Select Group --</option>

                        @foreach($groups as $group)
                            <option value="{{ $group->id }}"
                                {{ old('menu_group_id', $menu->menu_group_id ?? '') == $group->id ? 'selected' : '' }}>
                                {{ $group->name_en }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- NAME EN --}}
                <div>
                    <label class="text-gray-400 text-xs">Name (EN)</label>
                    <input type="text" name="name_en"
                        value="{{ old('name_en', $menu->name_en ?? '') }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">
                    @error('name_en') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- NAME KM --}}
                <div>
                    <label class="text-gray-400 text-xs">Name (KM)</label>
                    <input type="text" name="name_km"
                        value="{{ old('name_km', $menu->name_km ?? '') }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">
                    @error('name_km') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- SLUG --}}
                <div>
                    <label class="text-gray-400 text-xs">Slug</label>
                    <input type="text" name="slug"
                        value="{{ old('slug', $menu->slug ?? '') }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">
                    @error('slug') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- ROUTE --}}
                <div>
                    <label class="text-gray-400 text-xs">Route</label>
                    <input type="text" name="route"
                        value="{{ old('route', $menu->route ?? '') }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">
                </div>

                {{-- SORT ORDER --}}
                <div>
                    <label class="text-gray-400 text-xs">Sort Order</label>
                    <input type="number" name="sort_order"
                        value="{{ old('sort_order', $menu->sort_order ?? 0) }}"
                        class="w-full mt-1 bg-gray-800 border border-gray-700 text-white rounded px-3 py-2">
                </div>

                {{-- ACTIVE --}}
             <input type="hidden" name="is_active" value="0">

<label class="flex items-center gap-2 text-gray-300 text-sm">
    <input type="checkbox" name="is_active" value="1"
        {{ old('is_active', isset($menu) ? $menu->is_active : true) ? 'checked' : '' }}>
    Active
</label>

                {{-- ACTIONS --}}
                <div class="flex justify-between pt-4 border-t border-gray-800">

                    <a href="{{ route('admin.menus.index') }}"
                       class="px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-600">
                        Back
                    </a>

                    <button type="submit"
                        class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">
                        {{ isset($menu) ? 'Update Menu' : 'Create Menu' }}
                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection