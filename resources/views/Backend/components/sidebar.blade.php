


<aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-gray-900 border-r border-orange-500/10 flex flex-col z-50 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">

    {{-- Logo --}}
    <div class="flex items-center justify-between px-5 py-5 border-b border-orange-500/10">
        <div class="flex items-center gap-3">
              @if (!empty($logo))
                <img src="{{ asset('storage/' . $logo) }}"
                        class="h-9 w-auto object-contain">
            @else
                <div class="w-9 h-9 bg-orange-500 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2"/>
                        <path d="M8 21h8M12 17v4"/>
                    </svg>
                </div>
            @endif

                <div>
                    <p class="text-sm font-semibold text-white leading-tight">
                        {{ $title ?? 'Tk & D'}}
                    </p>
                    <p class="text-[11px] text-gray-500">
                        {{ $subtitle ?? '' }}
                    </p>
                </div>
        </div>
        {{-- Close button — mobile only --}}
        <button id="sidebar-close"
                class="lg:hidden p-1.5 rounded-lg text-gray-500 hover:text-white hover:bg-white/10 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Nav --}}
    <nav class="flex-1 overflow-y-auto py-4 space-y-1 scrollbar-thin">

        {{-- MAIN --}}
        <x-admin.nav-label>Main</x-admin.nav-label>
        <x-admin.nav-item route="admin.dashboard" icon="grid">Dashboard</x-admin.nav-item>

        {{-- AUTH SYSTEM --}}
        <x-admin.nav-label>Auth System</x-admin.nav-label>

        <x-admin.nav-item route="admin.users.index">Users</x-admin.nav-item>
        {{-- <x-admin.nav-item route="admin.sessions.index">Sessions</x-admin.nav-item> --}}

        {{-- CMS SYSTEM --}}
        <x-admin.nav-label>CMS System</x-admin.nav-label>
        <x-admin.nav-item route="admin.pages.index">Pages</x-admin.nav-item>
        <x-admin.nav-item route="admin.page-sections.index">Page Sections</x-admin.nav-item>
        <x-admin.nav-item route="admin.section-items.index">Section Items</x-admin.nav-item>
        <x-admin.nav-item route="admin.settings.index">Settings</x-admin.nav-item>

        {{-- MEDIA SYSTEM --}}
        {{-- <x-admin.nav-label>Media System</x-admin.nav-label>
        <x-admin.nav-item route="admin.media.index">Media Files</x-admin.nav-item> --}}

        {{-- NAVIGATION SYSTEM --}}
        <x-admin.nav-label>Navigation System</x-admin.nav-label>
        <x-admin.nav-item route="admin.menu-groups.index">Menu Groups</x-admin.nav-item>
        <x-admin.nav-item route="admin.menus.index">Menus</x-admin.nav-item>

        {{-- CONTACT SYSTEM --}}
        <x-admin.nav-label>Contact System</x-admin.nav-label>
        <x-admin.nav-item route="admin.contact-messages.index">Contact Messages</x-admin.nav-item>
        {{-- <x-admin.nav-item route="admin.contact-info.index">Contact Info</x-admin.nav-item> --}}

        {{-- TRACKING SYSTEM --}}
        {{-- <x-admin.nav-label>Tracking System</x-admin.nav-label>
        <x-admin.nav-item route="admin.activity-logs.index">Activity Logs</x-admin.nav-item> --}}

        {{-- Legal --}}
        <x-admin.nav-label>Legal</x-admin.nav-label>

        {{-- @if ($legalPages->has('privacy-policy'))
            @php $isPrivacy = request()->routeIs('privacy'); @endphp
            <a href="{{ route('privacy') }}"
               class="group flex items-center gap-3 mx-2 px-3 py-2 rounded-lg text-xs font-medium transition-all duration-150
                      {{ $isPrivacy ? 'bg-orange-500/15 text-orange-400 border border-orange-500/20' : 'text-gray-400 hover:text-gray-200 hover:bg-white/5' }}">
                <svg class="w-4 h-4 flex-shrink-0 {{ $isPrivacy ? 'text-orange-400' : 'text-gray-500 group-hover:text-gray-300' }}"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                </svg>
                <span class="truncate">{{ $legalPages['privacy-policy']->title_en }}</span>
                @if($isPrivacy)<span class="ml-auto w-1.5 h-1.5 rounded-full bg-orange-500 flex-shrink-0"></span>@endif
            </a>
        @endif --}}

        {{-- @if ($legalPages->has('terms-of-service'))
            @php $isTerms = request()->routeIs('terms'); @endphp
            <a href="{{ route('terms') }}"
               class="group flex items-center gap-3 mx-2 px-3 py-2 rounded-lg text-xs font-medium transition-all duration-150
                      {{ $isTerms ? 'bg-orange-500/15 text-orange-400 border border-orange-500/20' : 'text-gray-400 hover:text-gray-200 hover:bg-white/5' }}">
                <svg class="w-4 h-4 flex-shrink-0 {{ $isTerms ? 'text-orange-400' : 'text-gray-500 group-hover:text-gray-300' }}"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="truncate">{{ $legalPages['terms-of-service']->title_en }}</span>
                @if($isTerms)<span class="ml-auto w-1.5 h-1.5 rounded-full bg-orange-500 flex-shrink-0"></span>@endif
            </a>
        @endif --}}

    </nav>

    {{-- Footer --}}
    <div class="px-5 py-4 border-t border-orange-500/10">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-orange-500 flex items-center justify-center text-xs font-medium text-white flex-shrink-0">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="min-w-0">
                <p class="text-xs font-medium truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                <p class="text-[11px] text-gray-500 truncate">{{ auth()->user()->email ?? '' }}</p>
            </div>
        </div>
    </div>

</aside>
