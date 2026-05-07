@php
    $footerLogo = !empty($branding['logo']->value_en ?? null)
        ? asset('storage/' . $branding['logo']->value_en)
        : asset('images/logo.png');
@endphp

<div class=" pt-5 relative overflow-hidden mt-30">

    <!-- 🔵 GLOW (FIXED + PROPER ELLIPSE) -->
    {{-- <div
        class="absolute bottom-[-100px] right-0 -translate-x-1/2 translate-y-1/2
        w-[974px] h-[700px] rounded-full
        bg-[radial-gradient(ellipse_at_center,#1100FF_0%,#0E00D4_40%,rgba(0,0,0,0)_60%)]
        blur-3xl opacity-70 pointer-events-none z-0">
    </div> --}}

    <!-- MAIN CONTENT -->
    <div class="relative z-10 bg-[#0B0B54] py-20">

        <div
            class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3
        gap-10 md:gap-5 lg:gap-2  px-3 md:px-10 lg:px-6 xl:px-6 text-white">
            {{-- left --}}
            <div>
                <div class="flex items-center justify-center lg:justify-normal gap-3">
                    <img src="{{ $footerLogo }}" class="w-[48px] h-[48px]">
                    <div class="uppercase text-[22px]">
                        <p class="font-bold">TK<span class=" text-[#ED1C24]">&</span>D
                            
                        </p>
                        <!-- <p>Events</p> -->
                    </div>
                </div>

                <p class="mt-5 text-center lg:text-left">
                    {{ $contacts['description']->value_en ?? '' }}
                </p>
            </div>

            {{-- center --}}
            <div class="flex flex-col md:items-center">
                <p class="text-[20px] font-bold">Company</p>
                <ul class="flex flex-col mt-5 gap-4">

                    <li><a href="/">Home</a></li>
                    <li><a href="/about-us">About Us</a></li>
                    <li><a href="/our-trading-products">Our Trading Products</a></li>
                    <li><a href="/export">Export</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/activities">Activities</a></li>
                    <li><a href="/contact">Contact</a></li>

                </ul>
            </div>


            {{-- right --}}
            <div class="flex flex-col  gap-10">

                <!-- CONTACT -->
                <div>
                    <p class="text-[20px] font-bold">Contact</p>

                    <div class="flex flex-col mt-6 gap-5">
                        <p class="flex items-start gap-3 leading-relaxed">
                            <i class="fa-solid fa-location-dot mt-1"></i>
                            {{ $contacts['address']->value_en ?? '' }}
                        </p>

                        <p class="flex items-center gap-3">
                            <i class="fa-solid fa-phone"></i>
                           {{ $contacts['phone']->value_en ?? '' }}
                        </p>

                        <p class="flex items-center gap-3 break-all">
                            <i class="fa-solid fa-envelope"></i>
                            {{ $contacts['email']->value_en ?? '' }}
                        </p>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <!-- BOTTOM BAR -->
    {{-- <div class="bg-black border-t border-gray-800">
        <div
            class="max-w-6xl mx-auto px-4 py-6
        flex flex-col md:flex-row items-center justify-between gap-4 text-white text-sm">

            <!-- LEFT -->
            <div class="text-center md:text-left">
                <p>© <span id="year"></span> LED EVENTS.</p>
                <p class="text-gray-400">All rights reserved.</p>
            </div>

            <!-- RIGHT -->
            <div class="flex items-center gap-6">
                <a href="#" class="hover:underline text-gray-300 hover:text-white transition">
                    Privacy Policy
                </a>

                <a href="#" class="hover:underline text-gray-300 hover:text-white transition">
                    Terms of Service
                </a>
            </div>

        </div>
    </div> --}}

</div>

<script>
    document.getElementById("year").textContent = new Date().getFullYear();
</script>
