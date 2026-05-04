@extends('Frontend.layouts.Main')

@section('content')
    {{-- hero section --}}
    <div class="h-[93vh] bg-cover bg-center text-white relative"
        style="background-image: url('{{ asset('storage/' . $hero->media_url) }}');">

        <div class="absolute inset-0 bg-black/40"></div>

        <!-- RED STRIP -->
        <div class="absolute bottom-0 right-0 w-full lg:w-8/10 overflow-hidden">

            <div class="absolute inset-0 bg-[#ED1C24]
        [clip-path:polygon(10%_0,100%_0,100%_100%,0_100%)]">
            </div>

            <div
                class="relative z-10 px-5 md:pl-15 lg:pl-20 2xl:px-40 py-4 md:py-6 flex flex-col md:flex-row items-center justify-between gap-3 text-sm md:text-base">

                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-phone text-black"></i>
                    <p class="break-all">{{ $contacts['phone']->value_en ?? '' }}</p>
                </div>

                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-envelope text-black"></i>
                    <p class="break-all">{{ $contacts['email']->value_en ?? '' }}</p>
                </div>

                <div class="flex items-center gap-2 text-center md:text-left">
                    <i class="fa-solid fa-bullhorn text-black"></i>
                    <p class="text-xs md:text-sm lg:text-base">
                        {{ $contacts['description']->value_en ?? '' }}
                    </p>
                </div>

            </div>
        </div>

        <!-- HERO CONTENT -->
        <div class="container mx-auto px-5 flex items-center h-full relative z-10">
            <div class="w-full lg:w-1/2 flex flex-col gap-5 text-center md:text-left">

                <h2
                    class="text-xl sm:text-2xl md:text-4xl lg:text-[44px]
                       leading-snug md:leading-tight font-bold break-words">
                    {{ $hero->title_en }}
                </h2>

                <p class="text-sm sm:text-base md:text-lg lg:text-[22px] leading-relaxed">
                    {{ $hero->subtitle_en }}
                </p>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 w-full">
                    @if ($hero->button_text_en)
                        <a href={{ $hero->button_link_en }}
                            class="w-full sm:w-auto px-6 py-3 border border-[#ED1C24]
                          bg-white text-[#ED1C24] font-semibold text-center capitalize">
                            {{ $hero->button_text_en }}
                        </a>
                    @endif

                    @if ($hero->button_text_km)
                        <a href={{ $hero->button_link_km }}
                            class="w-full sm:w-auto px-6 py-3 border border-[#ED1C24]
                          bg-white text-[#ED1C24] font-semibold text-center capitalize">
                            {{ $hero->button_text_km }}
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- key products --}}
    <div class="py-20 relative">

        <!-- SECTION TITLE -->
        <div class="absolute top-10 md:top-20 left-0 w-2/3 md:w-1/3 overflow-hidden">

            <div class="absolute inset-0 bg-[#ED1C24]
            [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)]">
            </div>

            <div class="relative z-10 px-4 md:px-6 py-3 flex justify-start md:justify-center">
                <h1 class="text-lg md:text-2xl font-bold text-white capitalize">
                    our key products
                </h1>
            </div>

        </div>

        <!-- GRID -->
        <div class="container mx-auto px-5 pt-24 md:pt-30">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-10">

                @foreach ($products as $item)
                    <!-- CARD -->
                    <div class="group">

                        <div class="relative">

                            <img src="{{ asset('storage/' . $item->image) }}"
                                class="w-full h-[220px] sm:h-[260px] md:h-[300px] object-cover"
                                alt="{{ $item->title_en ?? 'Product Image' }}">
                            <!-- TOP BAR -->
                            <div
                                class="absolute top-[-10px] right-0 w-[85%] h-[22px] bg-[#0B0B54] z-50 transition-all duration-500 group-hover:w-[90%] group-hover:bg-[#ED1C24]
                        [clip-path:polygon(0_0,100%_0,100%_100%,10%_100%)]">
                            </div>

                            <!-- BOTTOM BAR -->
                            <div
                                class="absolute bottom-[-10px] left-0 w-[85%] h-[22px] bg-[#0B0B54] z-50 transition-all duration-500 group-hover:w-[90%] group-hover:bg-[#ED1C24]
                        [clip-path:polygon(0_0,90%_0,100%_100%,0_100%)]">
                            </div>

                        </div>

                        <!-- INFO -->
                        <div class="flex flex-col justify-center items-center gap-3 py-6 px-4">

                            <p class="font-semibold text-[17px] md:text-[19px] line-clamp-1">{{ $item->title_en }}</p>

                            <p class="line-clamp-3 text-center text-sm md:text-base">
                                {{ $item->description_en }}
                            </p>

                            <a href=""
                                class="w-full text-center py-2 border bg-[#0B0B54] hover:bg-[#ED1C24] transition-all duration-500 text-white">
                                Explore Product
                            </a>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>
    </div>

    {{-- why choose us --}}
    <div class="relative h-[110vh] md:h-[70vh] lg:h-[80vh] bg-cover bg-top"
        style="background-image: url('https://wp-themes.com/wp-content/themes/production-factory/assets/images/section-img.png');">

        <!-- DARK OVERLAY -->
        <div class="absolute inset-0 bg-[#0B0B54]/75"></div>

        <!-- CONTENT -->
        <div class="relative z-10 h-full text-white py-10 lg:py-20">

            <div class="flex flex-col lg:flex-row items-center justify-center gap-10">

                {{-- images (HIDE ON MOBILE/TABLET) --}}
                <div class="hidden lg:flex items-center justify-center gap-3">
                    <div class="flex flex-col items-center gap-3">
                        <img src="https://wp-themes.com/wp-content/themes/production-factory/assets/images/about01.png"
                            class="rounded-md">
                        <img src="https://wp-themes.com/wp-content/themes/production-factory/assets/images/about02.png"
                            class="rounded-md">
                    </div>

                    <img src="https://wp-themes.com/wp-content/themes/production-factory/assets/images/about03.png"
                        class="rounded-md">
                </div>

                {{-- text (FULL WIDTH ON MOBILE) --}}
                <div class="flex flex-col gap-5 w-full lg:w-auto px-5 lg:px-0">

                    <div>
                        <p class="text-[#ED1C24] font-bold text-[16px] lg:text-[19px]">
                            Why Choose Us
                        </p>
                        <p class="text-[22px] lg:text-[28px] font-bold">
                            We want to give you the best service
                        </p>
                    </div>

                    <p class="text-sm lg:text-base max-w-full lg:w-[770px]">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                        industry's standard dummy text ever since the 1500s
                    </p>

                    {{-- icon & text --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

                        <!-- item -->
                        <div class="flex flex-col gap-3 items-start">
                            <img src="{{ asset('icons/biodegradable.png') }}"
                                class="w-8 h-8 lg:w-10 lg:h-10 object-contain filter brightness-0 invert">

                            <div class="flex flex-col">
                                <p class="text-base lg:text-[19px] font-bold">
                                    100% biodegradable products
                                </p>
                                <p class="text-sm">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                            </div>
                        </div>

                        <!-- item -->
                        <div class="flex flex-col gap-3 items-start">
                            <img src="{{ asset('icons/security (1).png') }}"
                                class="w-8 h-8 lg:w-10 lg:h-10 object-contain filter brightness-0 invert">

                            <div class="flex flex-col">
                                <p class="text-base lg:text-[19px] font-bold">
                                    Strong & durable
                                </p>
                                <p class="text-sm">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                            </div>
                        </div>

                        <!-- item -->
                        <div class="flex flex-col gap-3 items-start">
                            <img src="{{ asset('icons/dollar.png') }}"
                                class="w-8 h-8 lg:w-10 lg:h-10 object-contain filter brightness-0 invert">

                            <div class="flex flex-col">
                                <p class="text-base lg:text-[19px] font-bold">
                                    Competitive pricing
                                </p>
                                <p class="text-sm">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                            </div>
                        </div>

                        <!-- item -->
                        <div class="flex flex-col gap-3 items-start">
                            <img src="{{ asset('icons/global-shipping.png') }}"
                                class="w-8 h-8 lg:w-10 lg:h-10 object-contain filter brightness-0 invert">

                            <div class="flex flex-col">
                                <p class="text-base lg:text-[19px] font-bold">
                                    Export-ready production
                                </p>
                                <p class="text-sm">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                            </div>
                        </div>

                        <!-- item -->
                        <div class="flex flex-col gap-3 items-start sm:col-span-2 lg:col-span-1">
                            <img src="{{ asset('icons/development.png') }}"
                                class="w-8 h-8 lg:w-10 lg:h-10 object-contain filter brightness-0 invert">

                            <div class="flex flex-col">
                                <p class="text-base lg:text-[19px] font-bold">
                                    OEM/ODM
                                </p>
                                <p class="text-sm">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    {{-- Production & Quality --}}
    <div class="my-20 px-20">
        <p class="text-[26px] font-bold text-center mb-10">Production & Quality</p>

        <!-- OUTER WRAPPER (important) -->
        <div class="relative container mx-auto">

            <!-- LEFT BUTTON (outside feel) -->
            <button onclick="prevSlide()"
                class="absolute -left-12 top-1/2 -translate-y-1/2 z-10
                   bg-black text-white rounded-full px-4 py-2 shadow cursor-pointer">
                ‹
            </button>

            <!-- RIGHT BUTTON -->
            <button onclick="nextSlide()"
                class="absolute -right-12 top-1/2 -translate-y-1/2 z-10
                   bg-black text-white rounded-full px-4 py-2 shadow cursor-pointer">
                ›
            </button>

            <!-- CAROUSEL -->
            <div class="overflow-hidden">
                <div id="carousel" class="flex transition-transform duration-500 ease-in-out">

                    <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-2">
                        <div class="border rounded-md p-3">
                            <p class="text-center font-bold pb-3">ISO & HACCP aligned</p>
                            <p class="text-center line-clamp-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Laboriosam nemo culpa, modi totam exercitationem incidunt reiciendis inventore iusto maiores
                                consectetur doloribus rem rerum. Magni exercitationem accusantium doloribus vero molestias
                                quae.</p>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-2">
                        <div class="border rounded-md p-3">
                            <p class="text-center font-bold pb-3">Food Safety</p>
                            <p class="text-center line-clamp-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Laboriosam nemo culpa, modi totam exercitationem incidunt reiciendis inventore iusto maiores
                                consectetur doloribus rem rerum. Magni exercitationem accusantium doloribus vero molestias
                                quae.</p>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-2">
                        <div class="border rounded-md p-3">
                            <p class="text-center font-bold pb-3">Quality Control</p>
                            <p class="text-center line-clamp-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Laboriosam nemo culpa, modi totam exercitationem incidunt reiciendis inventore iusto maiores
                                consectetur doloribus rem rerum. Magni exercitationem accusantium doloribus vero molestias
                                quae.</p>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-2">
                        <div class="border rounded-md p-3">
                            <p class="text-center font-bold pb-3">Export Standard</p>
                            <p class="text-center line-clamp-5">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Laboriosam nemo culpa, modi totam exercitationem incidunt reiciendis inventore iusto maiores
                                consectetur doloribus rem rerum. Magni exercitationem accusantium doloribus vero molestias
                                quae.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- Markets We Serve --}}
    <div class="mt-20 bg-[#F0ECF3]">

        <div class="container mx-auto px-5 py-10 lg:py-20">

            <div class="flex flex-col lg:flex-row justify-between gap-10">

                <!-- LEFT CONTENT -->
                <div class="flex flex-col gap-10 w-full lg:w-1/2">

                    <div>
                        <p class="uppercase text-lg text-[#ED1C24] font-bold">our reach</p>
                        <p class="text-base lg:text-lg">
                            Serving local markets and global economy
                        </p>
                    </div>

                    <!-- Cambodia -->
                    <div>
                        <div class="text-[#ED1C24] flex items-center gap-5">
                            <i class="fa-solid fa-location-dot"></i>
                            <p>Cambodia</p>
                        </div>

                        <ul class="grid grid-cols-2 gap-5 lg:gap-10 capitalize mt-5">
                            <li class="flex items-center">
                                <span class="mr-2">■</span>
                                <span>cafes</span>
                            </li>
                            <li class="flex items-center">
                                <span class="mr-2">■</span>
                                <span>hotels</span>
                            </li>
                            <li class="flex items-center">
                                <span class="mr-2">■</span>
                                <span>supermarkets</span>
                            </li>
                        </ul>
                    </div>

                    <!-- International -->
                    <div class="flex flex-col gap-3">
                        <div class="text-[#ED1C24] flex items-center gap-5">
                            <i class="fa-solid fa-earth-europe"></i>
                            <p>International</p>
                        </div>

                        <p class="text-sm lg:text-base">
                            Strategic partnerships across key regions with full export documentation support.
                        </p>

                        <div class="flex flex-wrap items-center gap-3 lg:gap-5">
                            <p class="px-4 py-1 border border-gray-400 bg-white">Australia</p>
                            <p class="px-4 py-1 border border-gray-400 bg-white">Asia</p>
                            <p class="px-4 py-1 border border-gray-400 bg-white">Europe</p>
                            <p class="px-4 py-1 border border-gray-400 bg-white">Global</p>
                        </div>
                    </div>

                </div>

                <!-- RIGHT PLACEHOLDER (MAP LATER) -->
                <div class="w-full lg:w-1/2 min-h-[200px] lg:min-h-[400px] bg-gray-200 flex items-center justify-center">
                    <p class="text-gray-500">Map will go here</p>
                </div>

            </div>

        </div>

    </div>

    {{-- faq --}}
    <div id="faqSection" class="relative bg-cover bg-top text-white transition-all duration-500"
        style="background-image: url('https://wp-themes.com/wp-content/themes/production-factory/assets/images/section-img.png');">

        <div class="absolute inset-0 bg-[#0B0B54]/75"></div>

        <div class="relative z-10 container mx-auto px-5 lg:px-0 grid grid-cols-1 lg:grid-cols-2 gap-10 pt-20 pb-20">

            <!-- LEFT -->
            <div>
                <p class="text-[17px] text-[#ED1C24] mb-3">
                    Frequently Asked Questions
                </p>

                <p class="text-[26px] font-bold capitalize mb-3">
                    have any question for us?
                </p>

                <p class="text-sm md:text-base">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit...
                </p>

                <img src="https://wp-themes.com/wp-content/themes/production-factory/assets/images/FAQ.png"
                    class="mt-5 rounded-md w-full object-cover">
            </div>

            <!-- RIGHT -->
            <div>

                <div class="space-y-3">

                    {{-- 6 VISIBLE FAQ --}}
                    <div class="border rounded-md p-4">
                        <button class="faq-btn w-full flex justify-between font-semibold">
                            What are your straws made from?
                            <span>+</span>
                        </button>
                        <div class="faq-content hidden mt-3">
                            Our straws are made from rice flour and tapioca starch.
                        </div>
                    </div>

                    <div class="border rounded-md p-4">
                        <button class="faq-btn w-full flex justify-between font-semibold">
                            Are rice straws safe for hot drinks?
                            <span>+</span>
                        </button>
                        <div class="faq-content hidden mt-3">
                            Yes, safe for hot & cold drinks.
                        </div>
                    </div>

                    <div class="border rounded-md p-4">
                        <button class="faq-btn w-full flex justify-between font-semibold">
                            Do you offer bulk orders?
                            <span>+</span>
                        </button>
                        <div class="faq-content hidden mt-3">
                            Yes, we support bulk export orders.
                        </div>
                    </div>

                    <div class="border rounded-md p-4">
                        <button class="faq-btn w-full flex justify-between font-semibold">
                            Can you customize packaging?
                            <span>+</span>
                        </button>
                        <div class="faq-content hidden mt-3">
                            Yes, OEM/ODM available.
                        </div>
                    </div>

                    <div class="border rounded-md p-4">
                        <button class="faq-btn w-full flex justify-between font-semibold">
                            What sizes are available?
                            <span>+</span>
                        </button>
                        <div class="faq-content hidden mt-3">
                            6mm, 8mm, 12mm.
                        </div>
                    </div>

                    <div class="border rounded-md p-4">
                        <button class="faq-btn w-full flex justify-between font-semibold">
                            What is MOQ?
                            <span>+</span>
                        </button>
                        <div class="faq-content hidden mt-3">
                            Depends on order type.
                        </div>
                    </div>

                    {{-- EXTRA 4 (hidden by default) --}}
                    <div class="extra-faq hidden space-y-3">

                        <div class="border rounded-md p-4">
                            <button class="faq-btn w-full flex justify-between font-semibold">
                                Do you ship internationally?
                                <span>+</span>
                            </button>
                            <div class="faq-content hidden mt-3">
                                Yes, worldwide shipping available.
                            </div>
                        </div>

                        <div class="border rounded-md p-4">
                            <button class="faq-btn w-full flex justify-between font-semibold">
                                Are products certified?
                                <span>+</span>
                            </button>
                            <div class="faq-content hidden mt-3">
                                ISO & HACCP certified.
                            </div>
                        </div>

                        <div class="border rounded-md p-4">
                            <button class="faq-btn w-full flex justify-between font-semibold">
                                How long do straws last?
                                <span>+</span>
                            </button>
                            <div class="faq-content hidden mt-3">
                                40–120 minutes depending on drink.
                            </div>
                        </div>

                        <div class="border rounded-md p-4">
                            <button class="faq-btn w-full flex justify-between font-semibold">
                                How to request quote?
                                <span>+</span>
                            </button>
                            <div class="faq-content hidden mt-3">
                                Contact via form or WhatsApp.
                            </div>
                        </div>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="text-center mt-6">
                    <button id="faqToggleBtn" class="px-6 py-2 bg-[#ED1C24] text-white rounded-md">
                        View More
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- CTA SECTION -->
    <div class="my-20 bg-[#0B0B54] text-white py-20 text-center relative overflow-hidden">

        <!-- OPENING QUOTE (TOP LEFT) -->
        <div class="text-[120px] leading-none font-bold absolute top-5 left-1/6 text-white">
            “
        </div>

        <!-- CLOSING QUOTE (BOTTOM RIGHT) -->
        <div class="text-[120px] leading-none font-bold  absolute bottom-20 right-1/6 text-white">
            ”
        </div>

        <!-- TEXT -->
        <h2 class="text-[26px] md:text-[32px] font-bold mb-8 relative z-10">
            Looking for a reliable eco-friendly supplier?
        </h2>

        <!-- BUTTON -->
        <a href="#contact"
            class="inline-block mt-10 bg-[#ED1C24] px-10 py-3 font-semibold rounded-md relative z-10 hover:bg-red-700 transition">
            👉 Contact Us Today
        </a>

    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function() {

        let index = 0;
        const carousel = document.getElementById("carousel");
        const totalSlides = carousel.children.length;

        function getVisible() {
            if (window.innerWidth < 640) return 1; // mobile
            if (window.innerWidth < 1024) return 2; // tablet
            return 3; // desktop
        }

        function updateCarousel() {
            const visible = getVisible();
            const slideWidth = 100 / visible;
            carousel.style.transform = `translateX(-${index * slideWidth}%)`;
        }

        window.nextSlide = function() {
            const visible = getVisible();
            if (index < totalSlides - visible) {
                index++;
                updateCarousel();
            }
        }

        window.prevSlide = function() {
            if (index > 0) {
                index--;
                updateCarousel();
            }
        }

        window.addEventListener("resize", () => {
            index = 0; // reset for safety
            updateCarousel();
        });

    });

    document.addEventListener("DOMContentLoaded", function() {

        // FAQ accordion
        document.querySelectorAll(".faq-btn").forEach(btn => {
            btn.addEventListener("click", function() {
                const content = this.nextElementSibling;
                content.classList.toggle("hidden");
                this.querySelector("span").textContent =
                    content.classList.contains("hidden") ? "+" : "-";
            });
        });

        // View more (6 → 10)
        const btn = document.getElementById("faqToggleBtn");
        const extra = document.querySelector(".extra-faq");

        btn.addEventListener("click", function() {
            extra.classList.toggle("hidden");

            const open = !extra.classList.contains("hidden");
            btn.textContent = open ? "View Less" : "View More";
        });

    });
</script>
