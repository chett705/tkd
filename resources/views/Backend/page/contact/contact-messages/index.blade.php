@extends('Backend.layout.app')

@section('title', 'Contact Messages')
@section('page-title', 'Contact Messages')
@section('page-subtitle', 'Manage system Contact Messages')

@section('content')

<div class="space-y-6">

    <div class="overflow-x-auto bg-gray-900 rounded-lg shadow">
        <table class="w-full text-sm text-left border-collapse">
            <thead class="bg-gray-600 text-white border-b">
                <tr>
                    <th class="p-3">Name</th>
                    <th class="p-3">Email</th>
                    <th class="p-3">Project Type</th>
                    <th class="p-3">Message</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Date</th>
                     <th class="p-3">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($messages as $message)
                    <tr class="border-b hover:bg-gray-800">

                        <td class="p-3">
                            {{ $message->first_name }} {{ $message->last_name }}
                        </td>

                        <td class="p-3">
                            {{ $message->email }}
                        </td>

                        <td class="p-3">
                            {{ $message->project_type }}
                        </td>

                        <td class="p-3 max-w-xs truncate">
                            {{ $message->message }}
                        </td>

                        <td class="p-3">
                            <span class="px-2 py-1 text-xs rounded 
                                {{ $message->status === 'read' ? 'bg-green-100 text-green-600' : 'bg-yellow-100 text-yellow-600' }}">
                                {{ $message->status }}
                            </span>
                        </td>

                        <td class="p-3">
                            {{ $message->created_at?->format('Y-m-d H:i') }}
                        </td>

                        <td class="p-3">
                            <a href="{{ route('admin.contact-messages.show', $message->id) }}"
                            class="px-3 py-1 text-xs bg-blue-500 text-white rounded hover:bg-blue-600">
                                View
                            </a>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="p-4 text-center text-gray-500">
                            No messages found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection

