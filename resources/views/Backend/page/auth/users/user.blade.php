@extends('backend.layout.app')

@section('title', 'Users')
@section('page-title', 'Users')
@section('page-subtitle', 'Manage system users')

@section('content')

<div class="space-y-4">

    {{-- HEADER ACTIONS --}}
    <div class="flex items-center justify-between">

        <h1 class="text-xl font-bold text-white">User List</h1>

        {{-- ADD USER BUTTON --}}
        <a href="{{ route('admin.users.create') }}"
           class="px-4 py-2 bg-orange-500 text-white rounded-lg text-sm hover:bg-orange-600">
            + Add User
        </a>

    </div>

    {{-- TABLE --}}
    <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-x-auto">

        <table class="w-full min-w-[900px] text-sm text-left text-gray-300">

            <thead class="text-xs text-gray-400 uppercase border-b border-gray-800 text-center">
                <tr>
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Email</th>
                    <th class="px-4 py-3">Role</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3  ">Actions</th>
                </tr>
            </thead>

            <tbody class="text-center">
            

                @foreach($users as $user)
                    <tr class="border-b border-gray-800 hover:bg-gray-800/40">

                        <td class="px-4 py-3">{{ $user->id }}</td>

                        <td class="px-4 py-3 font-medium text-white">
                            {{ $user->name }}
                        </td>

                        <td class="px-4 py-3">{{ $user->email }}</td>

                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded bg-orange-500/20 text-orange-400">
                                {{ $user->role }}
                            </span>
                        </td>

                        <td class=" py-3">
                            <span class="px-2 py-1 text-xs rounded
                                {{ $user->status === 'active'
                                    ? 'bg-green-500/20 text-green-400'
                                    : 'bg-red-500/20 text-red-400' }}">
                                {{ $user->status }}
                            </span>
                        </td>

                        <td class="py-3">
                            <div class="flex items-center justify-center gap-2">

                                {{-- EDIT --}}
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="px-3 py-1 text-xs bg-blue-500/20 text-blue-400 rounded hover:bg-blue-500/30">
                                    Edit
                                </a>

                                {{-- DELETE (GLOBAL MODAL) --}}
                                <button type="button"
                                        onclick="openDeleteModal(
                                            '{{ route('admin.users.destroy', $user->id) }}',
                                            '{{ $user->name }}'
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

        {{-- DELETE MODAL --}}
        @include('backend.components.destroy')
            
    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $users->links() }}
    </div>

</div>

@endsection
