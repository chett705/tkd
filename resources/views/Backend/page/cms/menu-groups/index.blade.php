@extends('backend.layout.app')

@section('title', 'Group Menu')
@section('page-title', 'Group Menu')
@section('page-subtitle', 'Manage system Group Menu')

@section('content')

<div class="space-y-4">

    {{-- HEADER --}}
    <div class="flex justify-between items-center">
        <h1 class="text-white text-lg font-semibold">Menu Groups</h1>

        <a href="{{ route('admin.menu-groups.create') }}"
           class="px-4 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600">
            + Create Group
        </a>
    </div>

    {{-- TABLE --}}
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">

        <table class="w-full text-sm text-left text-gray-300">

            <thead class="text-xs text-gray-400 border-b border-gray-800">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Name EN</th>
                    <th class="px-4 py-3">Name KH</th>
                    <th class="px-4 py-3">Slug</th>
                    <th class="px-4 py-3 text-center">Order</th>
                    <th class="px-4 py-3 text-center">Action</th>
                </tr>
            </thead>

            <tbody>

                @forelse($groups as $group)

                    <tr class="border-b border-gray-800 hover:bg-gray-800/40">

                        <td class="px-4 py-3 text-gray-400">
                            {{ $group->id }}
                        </td>

                        <td class="px-4 py-3 text-white">
                            {{ $group->name_en }}
                        </td>

                        <td class="px-4 py-3 text-white">
                            {{ $group->name_km }}
                        </td>

                        <td class="px-4 py-3 text-gray-400">
                            {{ $group->slug }}
                        </td>

                        <td class="px-4 py-3 text-center text-gray-400">
                            {{ $group->sort_order }}
                        </td>

                       <td class="px-4 py-3 text-center space-x-1">

    {{-- EDIT --}}
    <a href="{{ route('admin.menu-groups.edit', $group->id) }}"
       class="px-3 py-1 text-xs bg-blue-500/20 text-blue-400 rounded hover:bg-blue-500/30">
        Edit
    </a>

    {{-- DELETE --}}
    <button type="button"
        onclick="openDeleteModal(
            '{{ route('admin.menu-groups.destroy', $group->id) }}',
            '{{ $group->name_en }}'
        )"
        class="px-3 py-1 text-xs bg-red-500/20 text-red-400 rounded hover:bg-red-500/30">
        Delete
    </button>

</td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-500">
                            No menu groups found
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>
        {{-- DELETE MODAL --}}
        @include('backend.components.destroy')
            

    {{-- PAGINATION --}}
    <div>
        {{ $groups->links() }}
    </div>

</div>

@endsection