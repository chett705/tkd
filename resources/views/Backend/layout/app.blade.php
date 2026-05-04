<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — LED Events Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    @stack('styles')
    <script>
        ClassicEditor
            .create(document.querySelector('#content_en'))
            .catch(error => {
                console.error(error);
            });
    </script>
</head>

<body class="h-full bg-[#0c0c14] text-gray-100 antialiased font-sans">

    {{-- Mobile overlay --}}
    <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black/60 backdrop-blur-sm hidden lg:hidden" aria-hidden="true">
    </div>

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        @include('backend.components.sidebar')

        {{-- Main Wrapper — no left offset on mobile, offset on lg+ --}}
        <div class="flex flex-col flex-1 min-h-screen lg:ml-64">

            {{-- Top Header --}}
            @include('backend.components.header')

            {{-- Main Content --}}
            <main class="flex-1 p-4 sm:p-6 overflow-auto">
                @if (session('success'))
                    <div
                        class="mb-4 flex items-center gap-3 rounded-lg border border-green-500/30 bg-green-500/10 px-4 py-3 text-sm text-green-400">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div
                        class="mb-4 flex items-center gap-3 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-400">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01" />
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </main>

            {{-- Footer --}}
            @include('backend.components.footer')

        </div>

    </div>

    @stack('scripts')

    <script>
        const toggleBtn = document.getElementById('sidebar-toggle');
        const closeBtn = document.getElementById('sidebar-close');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        toggleBtn?.addEventListener('click', () => {
            sidebar.classList.contains('-translate-x-full') ? openSidebar() : closeSidebar();
        });
        closeBtn?.addEventListener('click', closeSidebar);
        overlay?.addEventListener('click', closeSidebar);

        // Auto-close drawer when resizing to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) closeSidebar();
        });
    </script>
</body>

</html>
