<header class="sticky top-0 z-40 flex items-center justify-between h-14 sm:h-16 px-4 sm:px-6 bg-[#0f0f1a] border-b border-orange-500/10 backdrop-blur-sm">

    {{-- Left: Page title / breadcrumb --}}
    <div class="flex items-center gap-3">
        <button id="sidebar-toggle" class="p-1.5 rounded-lg text-gray-400 hover:text-orange-400 hover:bg-orange-500/10 transition lg:hidden flex-shrink-0">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
        <div>
            <h1 class="text-sm font-semibold text-white leading-tight">@yield('page-title', 'Dashboard')</h1>
            <p class="text-[11px] text-gray-500 leading-tight">@yield('page-subtitle', 'LED Events Admin Panel')</p>
        </div>
    </div>

    {{-- Right: Actions --}}
    <div class="flex items-center gap-1.5 sm:gap-3">

        {{-- Search — hidden on xs, visible md+ --}}
        <div class="relative hidden md:block">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <circle cx="11" cy="11" r="8"/><path stroke-linecap="round" d="m21 21-4.35-4.35"/>
            </svg>
            <input type="text" placeholder="Search…"
                class="w-36 lg:w-48 pl-9 pr-4 py-2 text-xs bg-white/5 border border-white/10 rounded-lg text-gray-300 placeholder-gray-600 focus:outline-none focus:border-orange-500/50 transition">
        </div>

        {{-- Notifications --}}
        <button class="relative p-2 rounded-lg text-gray-400 hover:text-orange-400 hover:bg-orange-500/10 transition">
            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
            </svg>
            <span class="absolute top-1.5 right-1.5 w-1.5 h-1.5 sm:w-2 sm:h-2 bg-orange-500 rounded-full ring-2 ring-[#0f0f1a]"></span>
        </button>

        {{-- Divider --}}
        <div class="w-px h-6 bg-white/10 hidden sm:block"></div>

        {{-- User Menu --}}
        <div class="relative group">
            <button class="flex items-center gap-2 p-1 rounded-lg hover:bg-white/5 transition">
                <div class="w-7 h-7 sm:w-8 sm:h-8 rounded-full bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-xs font-semibold text-white flex-shrink-0">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 2)) }}
                </div>
                <div class="hidden sm:block text-left">
                    <p class="text-xs font-medium text-white leading-tight">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-[11px] text-gray-500 leading-tight">Administrator</p>
                </div>
                <svg class="w-3 h-3 text-gray-500 hidden sm:block" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>

            {{-- Dropdown --}}
            <div class="absolute right-0 top-full mt-2 w-44 bg-[#1a1a2e] border border-white/10 rounded-xl shadow-xl shadow-black/40 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                <div class="p-1">
                    <a href="#" class="flex items-center gap-2.5 px-3 py-2 text-xs text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Profile
                    </a>
                    <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-2.5 px-3 py-2 text-xs text-gray-300 hover:text-white hover:bg-white/5 rounded-lg transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><circle cx="12" cy="12" r="3"/></svg>
                        Settings
                    </a>
                    <div class="my-1 border-t border-white/10"></div>
                    <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Logout?')">
                        @csrf
                       <button type="button"
                                onclick="openLogoutModal()"
                                class="w-full flex items-center gap-2.5 px-3 py-2 text-xs text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-lg transition">

                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                            </svg>

                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>

    
</header>

{{-- Modal --}}
<div id="logoutModal"
     class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50 ">

    <div class="bg-gray-900 rounded-xl p-6 w-full max-w-md border border-gray-800 shadow-xl">

        <h2 class="text-lg font-semibold text-white mb-3">
            Confirm Logout
        </h2>

        <p class="text-sm text-gray-400 mb-6">
            Are you sure you want to logout from your account?
        </p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <div class="flex justify-end gap-2">

                <button type="button"
                        onclick="closeLogoutModal()"
                        class="px-4 py-2 bg-gray-700 text-white rounded">
                    Cancel
                </button>

                <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded">
                    Logout
                </button>

            </div>
        </form>

    </div>
</div>

@push('scripts')
    <script>
    function openLogoutModal() {
        const modal = document.getElementById('logoutModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeLogoutModal() {
        const modal = document.getElementById('logoutModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // click outside to close
    window.addEventListener('click', function (e) {
        const modal = document.getElementById('logoutModal');
        if (e.target === modal) {
            closeLogoutModal();
        }
    });
</script>
@endpush