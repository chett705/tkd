<div x-data="{ open: false }" class="relative text-white capitalize">

    <!-- TOP NAV -->
    <div class="bg-[#0B0B54] font-semibold relative z-50">
        <div class="container mx-auto flex items-center justify-between py-5 px-5">

            <!-- MOBILE BRAND -->
            <div class="flex items-center xl:hidden text-[#ED1C24] font-bold text-xl">
                TK & D
            </div>

            <!-- DESKTOP MENU -->
            <ul class="hidden xl:flex items-center gap-5 ml-auto">
                <li><a href="/" class="hover:text-[#ED1C24]">home</a></li>
                <li><a href="/about-us" class="hover:text-[#ED1C24]">about us</a></li>
                <li><a href="/our-trading-products" class="hover:text-[#ED1C24]">our trading products</a></li>
                <li><a href="/export" class="hover:text-[#ED1C24]">export</a></li>
                <li><a href="/blog" class="hover:text-[#ED1C24]">blog</a></li>
                <li><a href="/activities" class="hover:text-[#ED1C24]">activities</a></li>
                <li><a href="/contact-us" class="hover:text-[#ED1C24]">contact us</a></li>
            </ul>

            <!-- HAMBURGER BUTTON -->
            <button @click="open = !open"
                class="xl:hidden text-white text-2xl relative z-[10001]">
                <i :class="open ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'"></i>
            </button>

        </div>
    </div>

    <!-- BACKDROP -->
    <div x-show="open"
         x-cloak
         x-transition.opacity
         class="fixed inset-0 bg-black/50 xl:hidden z-40"
         @click="open = false">
    </div>

    <!-- SIDEBAR -->
    <div x-show="open"
         x-cloak
         x-transition:enter="transition transform duration-300"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition transform duration-300"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         class="fixed top-0 left-0 h-full w-72 bg-[#0B0B54] p-6 space-y-6 xl:hidden z-[9999]">

        <h2 class="text-[#ED1C24] text-xl font-bold">TK & D</h2>

        <a href="/" @click="open=false" class="block hover:text-[#ED1C24]">home</a>
        <a href="/about-us" @click="open=false" class="block hover:text-[#ED1C24]">about us</a>
        <a href="/our-trading-products" @click="open=false" class="block hover:text-[#ED1C24]">products</a>
        <a href="/export" @click="open=false" class="block hover:text-[#ED1C24]">export</a>
        <a href="/blog" @click="open=false" class="block hover:text-[#ED1C24]">blog</a>
        <a href="/activities" @click="open=false" class="block hover:text-[#ED1C24]">activities</a>
        <a href="/contact-us" @click="open=false" class="block hover:text-[#ED1C24]">contact</a>

    </div>

    <!-- SUB HEADER -->
    <div class="absolute top-0 left-0 w-1/3 overflow-hidden hidden xl:block z-50">
        <div class="absolute inset-0 bg-[#ED1C24]
            [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)]">
        </div>

        <div class="relative z-10 px-6 py-6 flex justify-center">
            <h1 class="text-2xl font-bold">Production Factory</h1>
        </div>
    </div>

</div>
