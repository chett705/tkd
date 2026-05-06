@php
    $logoPath = $logo ?? ($branding['logo']->value_en ?? null);
    $logoUrl = null;

    if (!empty($logoPath)) {
        $logoUrl = str_starts_with($logoPath, 'settings/')
            ? asset('storage/' . $logoPath)
            : asset('storage/settings/' . ltrim($logoPath, '/'));
    }
@endphp
<aside id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-[linear-gradient(180deg,#0a3d86_0%,#062f68_58%,#041d42_100%)] border-r border-white/10 flex flex-col z-50 -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out shadow-[18px_0_50px_rgba(4,29,66,0.18)]">

    <div class="flex items-center justify-between px-5 py-5 border-b border-white/10">
        <div class="flex items-center gap-3">
            @if (!empty($logoUrl))
                <img src="{{ $logoUrl }}" class="h-9 w-auto object-contain">
            
            @endif

            <div>
                <p class="text-sm font-semibold text-white leading-tight">
                    {{ $title ?? 'Tk & D' }}
                </p>
                <p class="text-[11px] text-slate-300/70">
                    {{ $subtitle ?? '' }}
                </p>
            </div>
        </div>

        <button id="sidebar-close" class="lg:hidden p-1.5 rounded-lg text-slate-300/70 hover:text-white hover:bg-white/10 transition">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <nav class="flex-1 overflow-y-auto py-4 space-y-1 scrollbar-thin">
        <x-admin.nav-label>Main</x-admin.nav-label>
        <x-admin.nav-item route="admin.dashboard" icon="grid">Dashboard</x-admin.nav-item>

        <x-admin.nav-label>Auth System</x-admin.nav-label>
        <x-admin.nav-item route="admin.users.index">Users</x-admin.nav-item>

        <x-admin.nav-label>CMS System</x-admin.nav-label>
        <x-admin.nav-item route="admin.pages.index">Pages</x-admin.nav-item>
        <x-admin.nav-item route="admin.page-sections.index">Page Sections</x-admin.nav-item>
        <x-admin.nav-item route="admin.section-items.index">Section Items</x-admin.nav-item>
        <x-admin.nav-item route="admin.settings.index">Settings</x-admin.nav-item>

        <x-admin.nav-label>Navigation System</x-admin.nav-label>
        <x-admin.nav-item route="admin.menu-groups.index">Menu Groups</x-admin.nav-item>
        <x-admin.nav-item route="admin.menus.index">Menus</x-admin.nav-item>

        <x-admin.nav-label>Contact System</x-admin.nav-label>
        <x-admin.nav-item route="admin.contact-messages.index">Contact Messages</x-admin.nav-item>

        <x-admin.nav-label>Legal</x-admin.nav-label>
    </nav>

    <div class="px-5 py-4 border-t border-white/10 bg-black/10">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-[#d4142a] to-[#a60f22] flex items-center justify-center text-xs font-medium text-white flex-shrink-0 shadow-md">
                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="min-w-0">
                <p class="text-xs font-medium text-white truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                <p class="text-[11px] text-slate-300/70 truncate">{{ auth()->user()->email ?? '' }}</p>
            </div>
        </div>
    </div>

</aside>
