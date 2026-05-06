@extends('Backend.layout.app')

@section('title', 'Menus')
@section('page-title', 'Menus')
@section('page-subtitle', 'Manage grouped system menus')

@section('content')

<div class="space-y-4">

    @foreach($groups as $group)

        {{-- GROUP CARD --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">

            {{-- GROUP HEADER --}}
            <div class="px-4 py-3 border-b border-gray-800 flex justify-between items-center">

                <h2 class="text-white font-semibold">
                    {{ $group->name_en }}
                </h2>

                <a href="{{ route('admin.menus.create') }}?group={{ $group->id }}"
                   class="text-xs px-3 rounded-xl py-1 bg-[#0d66b5] text-white rounded hover:bg-[#0a4f97]">
                    + Add Menu
                </a>

            </div>

            {{-- MENU ITEMS --}}
            <table class="w-full text-sm text-left text-gray-300">

                <thead class="text-xs text-gray-400 border-b border-gray-800">
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Slug</th>
                        <th class="px-4 py-2">Route</th>
                        <th class="px-4 py-2 text-center">Order</th>
                        <th class="px-4 py-2 text-center">Status</th>
                        <th class="px-4 py-2 text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($group->menus as $menu)

                        <tr class="border-b border-gray-800 hover:bg-gray-800/40">

                            <td class="px-4 py-2 text-white">
                                {{ $menu->name_en }}
                            </td>

                            <td class="px-4 py-2 text-gray-400">
                                {{ $menu->slug }}
                            </td>

                            <td class="px-4 py-2 text-gray-400">
                                {{ $menu->route }}
                            </td>

                            <td class="px-4 py-2 text-center text-gray-400">
                                {{ $menu->sort_order }}
                            </td>

                            <td class="px-4 py-2 text-center">
                                @if($menu->is_active)
                                    <span class="text-xs px-2 py-1 bg-green-500/20 text-green-400 rounded">
                                        Active
                                    </span>
                                @else
                                    <span class="text-xs px-2 py-1 bg-red-500/20 text-red-400 rounded">
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <td class="px-4 py-2 text-center space-x-1">

                                <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                   class="text-xs px-2 py-1 bg-blue-500/20 text-blue-400 rounded">
                                    Edit
                                </a>

                                <button onclick="openDeleteModal(
                                    '{{ route('admin.menus.destroy', $menu->id) }}',
                                    '{{ $menu->name_en }}'
                                )"
                                class="text-xs px-2 py-1 bg-red-500/20 text-red-400 rounded">
                                    Delete
                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                                No menus in this group
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    @endforeach
   {{-- DELETE MODAL --}}
    @include('Backend.components.destroy')
            
</div>

@endsection

