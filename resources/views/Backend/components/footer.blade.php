<footer class="shrink-0 px-4 sm:px-6 py-3 sm:py-4 border-t border-[#0d66b5]/12 bg-white/86 text-xs text-slate-500">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-2">
        <span>&copy; {{ date('Y') }} <span class="text-[#0a3d86] font-semibold">TK&amp;D</span>. All rights reserved.</span>

        <div class="flex items-center gap-4">
            <a href="{{ route('privacy') }}" class="hover:text-[#0a3d86] transition {{ request()->routeIs('privacy') ? 'text-[#0a3d86]' : '' }}">
                Privacy Policy
            </a>
            <span class="w-px h-3 bg-slate-300"></span>
            <a href="{{ route('terms') }}" class="hover:text-[#0a3d86] transition {{ request()->routeIs('terms') ? 'text-[#0a3d86]' : '' }}">
                Terms of Service
            </a>
            <span class="w-px h-3 bg-slate-300 hidden sm:block"></span>
            <span class="hidden sm:flex items-center gap-1.5">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                System Online
            </span>
            <span class="hidden sm:inline">v1.0.0</span>
        </div>
    </div>
</footer>
