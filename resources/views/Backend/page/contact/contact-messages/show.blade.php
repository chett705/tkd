@extends('backend.layout.app')

@section('title', 'Message Detail')
@section('page-title', 'Message Detail')
@section('page-subtitle', 'View full contact message')

@section('content')

<div class="max-w-5xl mx-auto space-y-6">

    {{-- TOP CARD --}}
    <div class="bg-gray-900 rounded-xl shadow p-6 flex items-center justify-between">

        <div>
            <h2 class="text-2xl font-bold text-white">
                {{ $message->first_name }} {{ $message->last_name }}
            </h2>

            <p class="text-gray-500 text-sm mt-1">
                {{ $message->email }}
            </p>
        </div>

        {{-- STATUS BADGE --}}
        <div>
            <span class="px-4 py-1 text-sm rounded-full font-medium
                {{ $message->status === 'read' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                {{ strtoupper($message->status) }}
            </span>
        </div>

    </div>

    {{-- CONTENT GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- LEFT INFO --}}
        <div class="bg-gray-900 rounded-xl shadow p-5 space-y-4">

            <h3 class="text-gray-400 font-semibold border-b pb-2">
                Information
            </h3>

            <div>
                <p class="text-xs text-gray-400">Project Type</p>
                <p class="font-semibold text-gray-400">
                    {{ $message->project_type ?? '-' }}
                </p>
            </div>

            <div>
                <p class="text-xs text-gray-400">Created At</p>
                <p class="font-semibold text-gray-800">
                    {{ $message->created_at?->format('d M Y, H:i') }}
                </p>
            </div>

        </div>

        {{-- RIGHT MESSAGE BOX (MAIN) --}}
        <div class="md:col-span-2 bg-gray-900 rounded-xl shadow p-6">

            <h3 class="text-gray-400 font-semibold border-b pb-2 mb-4">
                Message
            </h3>

            <div class="bg-gray-900 border rounded-lg p-5 text-gray-400 leading-relaxed whitespace-pre-line min-h-[200px]">
                {{ $message->message }}
            </div>

        </div>

    </div>

    {{-- ACTIONS --}}
    <div class="flex justify-between">

        <a href="{{ url()->previous() }}"
           class="px-5 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">
            Back
        </a>

        <div class="space-x-2">

            {{-- <button class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">
                Reply
            </button> --}}

          <button type="button"
    onclick="openDeleteModal(
        '{{ route('admin.contact.destroy', $message->id) }}',
        '{{ $message->first_name }} {{ $message->last_name }}'
    )"
    class="px-3 py-1 text-xs bg-red-500/20 text-red-400 rounded hover:bg-red-500/30">
    Delete
</button>

        </div>

    </div>

       {{-- DELETE MODAL --}}
        @include('backend.components.destroy')
</div>

@endsection


     
