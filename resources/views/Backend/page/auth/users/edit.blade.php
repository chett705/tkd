@extends('backend.layout.app')

@section('title', 'Edit User')

@section('content')

<div class="max-w-full space-y-6 mx-auto">

    <h1 class="text-xl font-bold text-white">Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
          class="space-y-4 bg-gray-900 border border-gray-800 p-6 rounded-xl">

        @csrf
        @method('PUT')

        {{-- NAME --}}
        <input type="text" name="name"
               value="{{ $user->name }}"
               class="w-full p-3 bg-gray-800 text-gray-300  rounded-lg border border-gray-700
                    focus:outline-none focus:border-orange-500 transition
                    hover:border-gray-600">

        {{-- EMAIL --}}
        <input type="email" name="email"
               value="{{ $user->email }}"
               class="w-full p-3 bg-gray-800 text-gray-300   rounded-lg border border-gray-700
                      focus:outline-none focus:border-orange-500 transition
                      hover:border-gray-600">

        {{-- ROLE --}}
        <select name="role"
                class="w-full p-3 bg-gray-800 text-gray-300   rounded-lg border border-gray-700
                       focus:outline-none focus:border-orange-500 transition
                       hover:border-gray-600">

            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>

        {{-- STATUS --}}
        <select name="status"
                class="w-full p-3 bg-gray-800 text-gray-300   rounded-lg border border-gray-700
                       focus:outline-none focus:border-orange-500 transition
                       hover:border-gray-600">

            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>

        {{-- PASSWORD --}}
        <input type="password" name="password" placeholder="New Password"
               class="w-full p-3 bg-gray-800 text-gray-300   rounded-lg border border-gray-700
                      focus:outline-none focus:border-orange-500 transition
                      hover:border-gray-600">

        {{-- CONFIRM PASSWORD --}}
        <input type="password" name="password_confirmation" placeholder="Confirm Password"
               class="w-full p-3 bg-gray-800 text-gray-300   rounded-lg border border-gray-700
                    focus:outline-none focus:border-orange-500 transition
                    hover:border-gray-600">

        {{-- BUTTONS --}}
        <div class="flex gap-3 pt-2">
            <a href="{{ route('admin.users.index') }}"
                class="px-4 border py-2 bg-gray-700 hover:bg-gray-600 text-gray-100  rounded-lg transition">
                Cancel
            </a>

            <button type="submit"
                    class="px-4 py-2 bg-blue-500 bg-orange-500 text-gray-100  rounded-lg transition">
                Update User
            </button>

        </div>


    </form>

</div>

@endsection