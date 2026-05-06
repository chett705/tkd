<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - TK&amp;D Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <style>
        .backend-theme .bg-orange-500 { background-color: #0d66b5 !important; }
        .backend-theme .bg-orange-500\/40 { background-color: rgba(13, 102, 181, 0.40) !important; }
        .backend-theme .bg-orange-500\/30 { background-color: rgba(13, 102, 181, 0.30) !important; }
        .backend-theme .bg-orange-500\/20 { background-color: rgba(13, 102, 181, 0.20) !important; }
        .backend-theme .bg-orange-500\/15 { background-color: rgba(13, 102, 181, 0.15) !important; }
        .backend-theme .bg-orange-500\/10 { background-color: rgba(13, 102, 181, 0.10) !important; }
        .backend-theme .bg-orange-500\/5 { background-color: rgba(13, 102, 181, 0.08) !important; }
        .backend-theme .text-orange-400 { color: #0d66b5 !important; }
        .backend-theme .text-orange-300 { color: #0a4f97 !important; }
        .backend-theme .border-orange-500 { border-color: #0d66b5 !important; }
        .backend-theme .border-orange-500\/60 { border-color: rgba(13, 102, 181, 0.60) !important; }
        .backend-theme .border-orange-500\/40 { border-color: rgba(13, 102, 181, 0.40) !important; }
        .backend-theme .border-orange-500\/25 { border-color: rgba(13, 102, 181, 0.25) !important; }
        .backend-theme .border-orange-500\/20 { border-color: rgba(13, 102, 181, 0.20) !important; }
        .backend-theme .border-orange-500\/15 { border-color: rgba(13, 102, 181, 0.15) !important; }
        .backend-theme .border-orange-500\/10 { border-color: rgba(13, 102, 181, 0.10) !important; }
        .backend-theme .hover\:bg-orange-600:hover { background-color: #0a4f97 !important; }
        .backend-theme .hover\:bg-orange-500\/30:hover { background-color: rgba(13, 102, 181, 0.30) !important; }
        .backend-theme .hover\:bg-orange-500\/20:hover { background-color: rgba(13, 102, 181, 0.20) !important; }
        .backend-theme .hover\:text-orange-400:hover { color: #0d66b5 !important; }
        .backend-theme .hover\:text-orange-300:hover { color: #0a4f97 !important; }
        .backend-theme .hover\:border-orange-500:hover { border-color: #0d66b5 !important; }
        .backend-theme .hover\:border-orange-500\/60:hover { border-color: rgba(13, 102, 181, 0.60) !important; }
        .backend-theme .focus\:border-orange-500:focus { border-color: #0d66b5 !important; }
        .backend-theme .focus\:border-orange-500\/50:focus { border-color: rgba(13, 102, 181, 0.50) !important; }
        .backend-theme .focus\:ring-orange-500:focus { --tw-ring-color: #0d66b5 !important; }
        .backend-theme .file\:bg-orange-500\/20::file-selector-button { background-color: rgba(13, 102, 181, 0.20) !important; }
        .backend-theme .file\:text-orange-400::file-selector-button { color: #0d66b5 !important; }
        .backend-theme .hover\:file\:bg-orange-500\/30:hover::file-selector-button { background-color: rgba(13, 102, 181, 0.30) !important; }
        .backend-theme .bg-\[\#1a1a2e\] { background-color: #0a3d86 !important; }
        .backend-theme .from-\[\#1a1a2e\] { --tw-gradient-from: #0a3d86 var(--tw-gradient-from-position) !important; --tw-gradient-to: rgb(10 61 134 / 0) var(--tw-gradient-to-position) !important; --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to) !important; }
        .backend-theme .to-\[\#16213e\] { --tw-gradient-to: #062f68 var(--tw-gradient-to-position) !important; }
        .backend-theme .prose a { color: #0d66b5 !important; }
        .backend-theme .prose a:hover { color: #0a4f97 !important; }

        .backend-theme .bg-gray-900 {
            background-color: #ffffff !important;
            border-color: #e2e8f0 !important;
            box-shadow: 0 1px 2px rgba(15, 23, 42, 0.05);
        }
        .backend-theme .bg-gray-800,
        .backend-theme .bg-gray-700 {
            background-color: #f8fafc !important;
        }
        .backend-theme .bg-gray-800\/40,
        .backend-theme .bg-gray-800\/30 {
            background-color: rgba(241, 245, 249, 0.88) !important;
        }
        .backend-theme .bg-gray-600 {
            background-color: #e2e8f0 !important;
        }
        .backend-theme .border-gray-800,
        .backend-theme .border-gray-800\/60,
        .backend-theme .border-gray-700 {
            border-color: #e2e8f0 !important;
        }
        .backend-theme .text-gray-600,
        .backend-theme .text-gray-500,
        .backend-theme .text-gray-400 {
            color: #64748b !important;
        }
        .backend-theme .text-gray-300 {
            color: #475569 !important;
        }
        .backend-theme .bg-gray-900 > .text-white,
        .backend-theme .bg-gray-900 .text-white,
        .backend-theme .bg-gray-800.text-white,
        .backend-theme .bg-gray-700.text-white,
        .backend-theme h1.text-white,
        .backend-theme h2.text-white,
        .backend-theme h3.text-white,
        .backend-theme p.text-white,
        .backend-theme td.text-white,
        .backend-theme div.text-white {
            color: #0f172a !important;
        }
        .backend-theme .hover\:bg-gray-900:hover,
        .backend-theme .hover\:bg-gray-700:hover,
        .backend-theme .hover\:bg-gray-600:hover,
        .backend-theme .hover\:bg-gray-800:hover,
        .backend-theme .hover\:bg-gray-800\/40:hover {
            background-color: #e2e8f0 !important;
        }
        .backend-theme .prose-headings\:text-white :is(h1, h2, h3, h4, h5, h6),
        .backend-theme .prose-strong\:text-white strong {
            color: #0f172a !important;
        }
        .backend-theme .prose-p\:text-gray-400 p,
        .backend-theme .prose-li\:text-gray-400 li {
            color: #64748b !important;
        }
    </style>

    @stack('styles')
    <script>
        ClassicEditor
            .create(document.querySelector('#content_en'))
            .catch(error => {
                console.error(error);
            });
    </script>
</head>

<body class="h-full bg-[linear-gradient(180deg,#edf1f6_0%,#e2e7ef_100%)] text-slate-900 antialiased font-sans">

    <div id="sidebar-overlay" class="fixed inset-0 z-40 bg-black/60 backdrop-blur-sm hidden lg:hidden" aria-hidden="true">
    </div>

    <div class="flex min-h-screen">
        @include('backend.components.sidebar')

        <div class="flex flex-col flex-1 min-h-screen lg:ml-64">
            @include('backend.components.header')

            <main class="backend-theme flex-1 p-4 sm:p-6 overflow-auto">
                @if (session('success'))
                    <div class="mb-4 flex items-center gap-3 rounded-lg border border-green-500/30 bg-green-500/10 px-4 py-3 text-sm text-green-600">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="mb-4 flex items-center gap-3 rounded-lg border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-600">
                        <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01" />
                        </svg>
                        {{ session('error') }}
                    </div>
                @endif
                @yield('content')
            </main>

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

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) closeSidebar();
        });
    </script>
</body>

</html>
