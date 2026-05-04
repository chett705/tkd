@extends('backend.layout.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Welcome back, overview of LED Events')

@section('content')

{{-- Stats Grid --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4 mb-4 sm:mb-6">

    {{-- Stat Card: Projects --}}
    <div class="relative overflow-hidden rounded-xl border border-orange-500/10 bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-4 sm:p-5">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-[10px] sm:text-xs text-gray-500 font-medium uppercase tracking-wider">Total Projects</p>
                <p class="mt-1 text-xl sm:text-2xl font-bold text-white">{{ $stats['projects'] ?? 0 }}</p>
                <p class="mt-1 text-xs text-green-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    +12% this month
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-orange-500/10 border border-orange-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-orange-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/></svg>
            </div>
        </div>
        <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full bg-orange-500/5 blur-xl"></div>
    </div>

    {{-- Stat Card: Services --}}
    <div class="relative overflow-hidden rounded-xl border border-blue-500/10 bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-4 sm:p-5">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-[10px] sm:text-xs text-gray-500 font-medium uppercase tracking-wider">Services</p>
                <p class="mt-1 text-xl sm:text-2xl font-bold text-white">{{ $stats['services'] ?? 5 }}</p>
                <p class="mt-1 text-xs text-blue-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    All active
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-blue-500/10 border border-blue-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
        </div>
        <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full bg-blue-500/5 blur-xl"></div>
    </div>

    {{-- Stat Card: Blog Posts --}}
    <div class="relative overflow-hidden rounded-xl border border-purple-500/10 bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-4 sm:p-5">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-[10px] sm:text-xs text-gray-500 font-medium uppercase tracking-wider">Blog Articles</p>
                <p class="mt-1 text-xl sm:text-2xl font-bold text-white">{{ $stats['articles'] ?? 0 }}</p>
                <p class="mt-1 text-xs text-purple-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                    Published
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-purple-500/10 border border-purple-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
        </div>
        <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full bg-purple-500/5 blur-xl"></div>
    </div>

    {{-- Stat Card: Contacts --}}
    <div class="relative overflow-hidden rounded-xl border border-green-500/10 bg-gradient-to-br from-[#1a1a2e] to-[#16213e] p-4 sm:p-5">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-[10px] sm:text-xs text-gray-500 font-medium uppercase tracking-wider">Contact Forms</p>
                <p class="mt-1 text-xl sm:text-2xl font-bold text-white">{{ $stats['contacts'] ?? 0 }}</p>
                <p class="mt-1 text-xs text-green-400 flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    New inquiries
                </p>
            </div>
            <div class="w-11 h-11 rounded-xl bg-green-500/10 border border-green-500/20 flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
        </div>
        <div class="absolute -bottom-4 -right-4 w-20 h-20 rounded-full bg-green-500/5 blur-xl"></div>
    </div>

</div>

{{-- Main Content Grid --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6">

    {{-- Services Overview --}}
    <div class="lg:col-span-2 rounded-xl border border-white/5 bg-[#1a1a2e] overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-white/5">
            <h2 class="text-sm font-semibold text-white">Services Overview</h2>
            <span class="text-xs text-gray-500">LED Events</span>
        </div>
        <div class="p-5 space-y-4">

            @php
            $services = [
                ['name' => 'LED Screen Rental',       'icon' => 'monitor',    'color' => 'orange', 'pct' => 85],
                ['name' => 'Stage Rental',             'icon' => 'template',   'color' => 'blue',   'pct' => 70],
                ['name' => 'Sound System',             'icon' => 'volume',     'color' => 'purple', 'pct' => 60],
                ['name' => 'Lighting Production',      'icon' => 'sun',        'color' => 'yellow', 'pct' => 75],
                ['name' => 'Full Event Production',    'icon' => 'collection', 'color' => 'green',  'pct' => 90],
            ];
            $colors = [
                'orange' => ['bar' => 'bg-orange-500', 'text' => 'text-orange-400'],
                'blue'   => ['bar' => 'bg-blue-500',   'text' => 'text-blue-400'],
                'purple' => ['bar' => 'bg-purple-500', 'text' => 'text-purple-400'],
                'yellow' => ['bar' => 'bg-yellow-500', 'text' => 'text-yellow-400'],
                'green'  => ['bar' => 'bg-green-500',  'text' => 'text-green-400'],
            ];
            @endphp

            @foreach($services as $svc)
            @php $c = $colors[$svc['color']]; @endphp
            <div>
                <div class="flex items-center justify-between mb-1.5">
                    <span class="text-xs text-gray-300">{{ $svc['name'] }}</span>
                    <span class="text-xs {{ $c['text'] }} font-medium">{{ $svc['pct'] }}%</span>
                </div>
                <div class="h-1.5 w-full bg-white/5 rounded-full overflow-hidden">
                    <div class="{{ $c['bar'] }} h-full rounded-full transition-all duration-700" style="width: {{ $svc['pct'] }}%"></div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    {{-- Quick Links --}}
    <div class="rounded-xl border border-white/5 bg-[#1a1a2e] overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-white/5">
            <h2 class="text-sm font-semibold text-white">Quick Actions</h2>
        </div>
        <div class="p-4 grid grid-cols-2 gap-3">

            @php
            $quicklinks = [
                ['label' => 'Add Project',   'icon' => 'folder',   'color' => 'orange'],
                ['label' => 'New Article',   'icon' => 'pencil',   'color' => 'purple'],
                ['label' => 'Upload Media',  'icon' => 'photo',    'color' => 'blue'],
                ['label' => 'View Contacts', 'icon' => 'phone',    'color' => 'green'],
                ['label' => 'LED Display',   'icon' => 'desktop',  'color' => 'yellow'],
                ['label' => 'Why Us',        'icon' => 'badge',    'color' => 'pink'],
            ];
            $qcolors = [
                'orange' => 'bg-orange-500/10 border-orange-500/20 text-orange-400 hover:bg-orange-500/20',
                'purple' => 'bg-purple-500/10 border-purple-500/20 text-purple-400 hover:bg-purple-500/20',
                'blue'   => 'bg-blue-500/10   border-blue-500/20   text-blue-400   hover:bg-blue-500/20',
                'green'  => 'bg-green-500/10  border-green-500/20  text-green-400  hover:bg-green-500/20',
                'yellow' => 'bg-yellow-500/10 border-yellow-500/20 text-yellow-400 hover:bg-yellow-500/20',
                'pink'   => 'bg-pink-500/10   border-pink-500/20   text-pink-400   hover:bg-pink-500/20',
            ];
            $icons = [
                'folder'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 7a2 2 0 012-2h4l2 2h8a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V7z"/>',
                'pencil'  => '<path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>',
                'photo'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>',
                'phone'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>',
                'desktop' => '<path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                'badge'   => '<path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>',
            ];
            @endphp

            @foreach($quicklinks as $ql)
            <a href="#" class="flex flex-col items-center justify-center gap-2 p-3 rounded-xl border text-center transition {{ $qcolors[$ql['color']] }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    {!! $icons[$ql['icon']] !!}
                </svg>
                <span class="text-[11px] font-medium leading-tight">{{ $ql['label'] }}</span>
            </a>
            @endforeach

        </div>
    </div>

</div>

{{-- Recent Activity + System Status --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-6 mt-4 sm:mt-6">

    {{-- Recent Activity --}}
    <div class="rounded-xl border border-white/5 bg-[#1a1a2e] overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-white/5">
            <h2 class="text-sm font-semibold text-white">Recent Activity</h2>
            {{-- <a href="{{ route('admin.activity-logs.index') }}" class="text-xs text-orange-400 hover:text-orange-300 transition">View all</a> --}}
        </div>
        <div class="divide-y divide-white/5">
            @forelse($activities as $a)
            @php
                $actionType = strtolower($a->action ?? '');
                $isCreate = str_contains($actionType, 'create') || str_contains($actionType, 'add');
                $isDelete = str_contains($actionType, 'delete');
                $isUpdate = str_contains($actionType, 'update') || str_contains($actionType, 'edit');
            @endphp
            <div class="flex items-start gap-3 px-5 py-3.5 hover:bg-white/2 transition">
                <div class="mt-0.5 w-7 h-7 rounded-full flex items-center justify-center flex-shrink-0
                    {{ $isCreate ? 'bg-green-500/15 text-green-400' : ($isDelete ? 'bg-red-500/15 text-red-400' : 'bg-blue-500/15 text-blue-400') }}">
                    @if($isCreate)
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                    @elseif($isDelete)
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    @else
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-xs text-gray-300 font-medium truncate">{{ $a->action }} {{ $a->model }}</p>
                    <p class="text-[11px] text-gray-600 truncate">{{ $a->description }} — by {{ $a->user->name ?? 'System' }}</p>
                </div>
                <span class="text-[11px] text-gray-600 flex-shrink-0">{{ $a->created_at->diffForHumans() }}</span>
            </div>
            @empty
            <div class="px-5 py-6 text-center text-xs text-gray-600">No recent activity.</div>
            @endforelse
        </div>
    </div>

    {{-- Content Sections Status --}}
    <div class="rounded-xl border border-white/5 bg-[#1a1a2e] overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-white/5">
            <h2 class="text-sm font-semibold text-white">Content Sections</h2>
            <span class="text-xs text-gray-500">Status</span>
        </div>
        <div class="p-5 space-y-3">
            @foreach($sections as $s)
            <div class="flex items-center justify-between py-1.5">
                <span class="text-xs text-gray-400">{{ $s['name'] }}</span>
                <div class="flex items-center gap-3">
                    <span class="text-xs text-gray-600">{{ $s['items'] }} items</span>
                    <span class="inline-flex items-center gap-1 text-[11px] font-medium px-2 py-0.5 rounded-full
                        {{ $s['status'] === 'active' ? 'bg-green-500/10 text-green-400' : 'bg-gray-500/10 text-gray-500' }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $s['status'] === 'active' ? 'bg-green-400' : 'bg-gray-600' }}"></span>
                        {{ ucfirst($s['status']) }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>

@endsection
