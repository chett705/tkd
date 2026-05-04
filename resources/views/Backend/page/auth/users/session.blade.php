@extends('backend.layout.app')

@section('title', 'Sessions')
@section('page-title', 'User Sessions')
@section('page-subtitle', 'Track user login activity')

@section('content')

<div class="space-y-4">

    {{-- HEADER --}}
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-bold text-white">Sessions</h1>
    </div>

    {{-- TABLE WRAPPER (SCROLLABLE) --}}
    <div class="bg-gray-900 border border-gray-800 rounded-lg overflow-x-auto">

        <table class="w-full min-w-[900px] text-sm text-left text-gray-300">

            <thead class="text-xs text-gray-400 uppercase border-b border-gray-800 text-center">
                <tr>
                    <th class="px-4 py-3">User</th>
                    <th class="px-4 py-3">IP Address</th>
                    <th class="px-4 py-3">Device</th>
                    <th class="px-4 py-3">Last Activity</th>
                    <th class="px-4 py-3">Action</th>
                </tr>
            </thead>

            <tbody class="text-center">

                @foreach($sessions as $session)
                    <tr class="border-b border-gray-800 hover:bg-gray-800/40">

                        {{-- USER --}}
                        <td class="px-4 py-3 font-medium text-white">
                            {{ $session->user->name ?? 'Guest' }}
                        </td>

                        {{-- IP --}}
                        <td class="px-4 py-3">
                            {{ $session->ip_address }}
                        </td>

                        {{-- DEVICE --}}
                        <td class="px-4 py-3 text-xs text-gray-400 truncate max-w-xs">
                            {{ $session->user_agent }}
                        </td>

                        {{-- LAST ACTIVITY --}}
                        <td class="px-4 py-3">
                            {{ \Carbon\Carbon::createFromTimestamp($session->last_activity)->diffForHumans() }}
                        </td>

                        {{-- ACTION --}}
                        <td class="px-4 py-3">

                            <form action="#" method="POST">
                                @csrf

                                <button type="button"
                                        class="px-3 py-1 text-xs bg-red-500/20 text-red-400 rounded hover:bg-red-500/30">
                                    Revoke
                                </button>

                            </form>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>

    {{-- PAGINATION --}}
    <div>
        {{ $sessions->links() }}
    </div>

</div>

@endsection