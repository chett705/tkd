<footer class="shrink-0 px-4 sm:px-6 py-3 sm:py-4 border-t border-orange-500/10 bg-[#0f0f1a] text-xs text-gray-600">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-2">
        <span>&copy; {{ date('Y') }} <span class="text-orange-500/70">LED Events</span>. All rights reserved.</span>

        <div class="flex items-center gap-4">
            {{-- Legal Links --}}
            <a href="{{ route('privacy') }}"
               class="hover:text-orange-400 transition {{ request()->routeIs('privacy') ? 'text-orange-400' : '' }}">
                Privacy Policy
            </a>
            <span class="w-px h-3 bg-white/10"></span>
            <a href="{{ route('terms') }}"
               class="hover:text-orange-400 transition {{ request()->routeIs('terms') ? 'text-orange-400' : '' }}">
                Terms of Service
            </a>
            <span class="w-px h-3 bg-white/10 hidden sm:block"></span>
            {{-- Status --}}
            <span class="hidden sm:flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                System Online
            </span>
            <span class="hidden sm:inline">v1.0.0</span>
        </div>
    </div>
</footer>
