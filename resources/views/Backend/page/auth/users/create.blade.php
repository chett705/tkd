@extends('backend.layout.app')

@section('title', 'Create User')

@section('content')

<div class="max-w-full space-y-5">

    <h1 class="text-xl mb-4 font-bold text-white">Create User</h1>

    <form action="{{ route('admin.users.store') }}"
          method="POST"
          class="space-y-4 bg-gray-900   p-5 rounded-xl">

        @csrf

        {{-- NAME --}}
        <input type="text" name="name" placeholder="Name"
               class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg border border-gray-700
                      focus:outline-none focus:border-orange-500 hover:border-gray-600 transition">

        {{-- EMAIL --}}
        <input type="email" name="email" placeholder="Email"
               class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg border border-gray-700
                      focus:outline-none focus:border-orange-500 hover:border-gray-600 transition">

        {{-- PASSWORD --}}
        <input type="password" name="password" placeholder="Password"
               class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg border border-gray-700
                      focus:outline-none focus:border-orange-500 hover:border-gray-600 transition">

        {{-- CONFIRM PASSWORD --}}
        <input type="password" name="password_confirmation" placeholder="Confirm Password"
               class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg border border-gray-700
                      focus:outline-none focus:border-orange-500 hover:border-gray-600 transition">

        {{-- ROLE --}}
        <select name="role"
                class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg border border-gray-700
                       focus:outline-none focus:border-orange-500 hover:border-gray-600 transition">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        {{-- STATUS --}}
        <select name="status"
                class="w-full p-3 bg-gray-800 text-gray-400 rounded-lg border border-gray-700
                       focus:outline-none focus:border-orange-500 hover:border-gray-600 transition">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        {{-- ACTION BUTTONS --}}
        <div class="flex gap-3 pt-2">

            {{-- CANCEL --}}
            <a href="{{ route('admin.users.index') }}"
               class="text-center px-4 py-3 bg-gray-700 text-gray-100 rounded-lg border
                      hover:bg-gray-600 transition font-medium">
                Cancel
            </a>

            {{-- SUBMIT --}}
            <button type="submit"
                    class=" px-4 py-3 bg-orange-500 text-gray-100 rounded-lg
                           hover:bg-orange-600 transition font-medium">
                Create User
            </button>

        </div>

    </form>

</div>

@endsection