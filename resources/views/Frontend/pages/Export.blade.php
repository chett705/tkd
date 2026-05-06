@extends('Frontend.layouts.Main')

@section('content')
  {{-- hero section --}}
    <div class="h-[93vh] bg-cover bg-center bg-no-repeat text-white relative"
        style="background-image: url('{{ asset('storage/' . $hero->media_url) }}');">

        <div class="absolute inset-0 bg-gradient-to-r from-[#050530]/70 via-[#050530]/35 to-black/10"></div>

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
{{-- Who We Serve --}}
<div class="mt-20 bg-[#0B0B54] py-16">

    <!-- TITLE -->
    <div class="text-center mb-12">
        <p class="uppercase text-2xl font-bold text-white">Who we serve</p>
        <div class="w-[60px] h-[3px] bg-[#ED1C24] mx-auto mt-2"></div>
    </div>

    <!-- CARDS -->
    <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-5 md:px-6">
        @foreach ($whoWeServe as $item)
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <p class="font-semibold text-[#0B0B54] uppercase text-sm mb-2">
                {{ $item->title_en }}
            </p>
            <p class="text-sm">
                {{ $item->description_en }}
            </p>
        </div>

        @endforeach



    </div>
</div>

    {{-- main product --}}
    <div class="min-h-[60vh] px-6 py-40 bg-[#0B0B54] ">

        <div class="container mx-auto px-4 sm:px-6 lg:px-10 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-3 sm:gap-4">

                @if ($images && $images->images)
                    @foreach ($images->images as $img)
                        <img src="{{ asset('storage/' . $img) }}" class="w-full object-cover rounded-lg shadow-lg" />
                    @endforeach
                @endif

            </div>
            <!-- RIGHT CONTENT -->
            <div class="flex flex-col gap-8">

                <!-- TITLE -->
                @if ($title)
                    <h2 class="text-3xl md:text-4xl font-bold text-white">
                        {{ $title->title_en }}
                    </h2>
                @endif

                <!-- FEATURES GRID -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                    @foreach ($sub as $item)
                        <div>
                            <h4 class="font-bold text-sm text-white uppercase">{{ $item->title_en }}</h4>
                            <p class="text-white">{{ $item->description_en }}</p>
                        </div>
                    @endforeach

                </div>

                <!-- TECHNICAL BOX -->
                <div class="border border-gray-200 bg-white p-6 rounded-lg shadow-sm">

                    <h3 class="font-bold text-[#0B0B54] mb-4 flex items-center gap-2">
                        ⚙️ Technical Specifications
                    </h3>

                    <div class="space-y-3 text-sm">

                        @foreach ($technical as $item)
                            <div class="flex justify-between">
                                <span class="text-gray-600">{{ $item->title_en }}</span>
                                <span class="font-semibold">{{ $item->description_en }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
{{-- Strategic Manufacturing Advantages --}}
<div class="mt-20 bg-[#0B0B54] py-20 text-white">
    <div class="max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        @foreach ($manufacturing as $manu)
        <div class="text-center mb-14">
            <h2 class="text-3xl md:text-4xl font-bold">
                {{ $manu->title_en }}
            </h2>
            <p class="mt-4 text-white/70 max-w-2xl mx-auto">
                {{ $manu->description_en }}
            </p>
        </div>
        @endforeach

        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">

            <!-- ITEM -->
            @foreach ($manufacturingCont as $manuCont)
            <div class="border-l border-white/10 pl-6">
                <h3 class="text-sm font-semibold text-[#ED1C24] uppercase">{{ $manuCont->title_en }}</h3>
                <p class="mt-3 text-white/80 text-sm leading-relaxed">
                    {{ $manuCont->description_en }}
                </p>
            </div>
            @endforeach




        </div>
    </div>
</div>

{{-- Production & Quality Assurance --}}
<section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @foreach ($production as $prod)
        <h2 class="text-3xl font-bold mb-8">
            {{ $prod->title_en }}
        </h2>
        @endforeach

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">

            <!-- Left: Text content -->
            <div class="space-y-6">
                <div>
                    @foreach ($productionCont as $prodCont)
                    <h3 class="text-xl font-semibold text-[#ED1C24]">{{ $prodCont->title_en }}</h3>
                    <p class="text-sm sm:text-base">
                        {{ $prodCont->description_en }}
                    </p>
                    @endforeach
                </div>


            </div>

            <!-- Right: Images -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                @foreach($productionImg as $item)
                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $item->image) }}"

                        class="w-full h-48 sm:h-56 object-cover">

                    <div class="p-4 text-center text-sm font-medium text-gray-700">
                        {{ $item->title_en }}
                    </div>
                </div>
                @endforeach



            </div>
        </div>
    </div>
</section>

{{-- Global Export Capability --}}
<section class="bg-[#0B0B54] text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Title -->
        <h2 class="text-3xl font-bold mb-6">
            Global Export Capability
        </h2>

        <p class="mb-10 text-sm sm:text-base">
            We offer streamlined logistics solutions to over 40 countries, ensuring your inventory arrives on time and
            in perfect condition.
        </p>

        <!-- Grid layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <!-- Left column -->
            <div class="space-y-6">
                <div>
                    @foreach ($exportLi as $item)
                    {!! $item->description_km !!}
                    @endforeach
                </div>

                @foreach ($exportcont->where('sort_order', '<=', 2) as $item)
                    <div>
                    <h3 class="text-xl font-semibold">{{ $item->title_en }}</h3>
                    <div class="text-sm sm:text-base">
                        {!! $item->description_en !!}
                    </div>
            </div>
            @endforeach
        </div>

        <!-- Right column -->
        <div class="space-y-6">
            @foreach ($exportcont->where('sort_order', '>', 2) as $item)
            <div>
                <h3 class="text-xl font-semibold">{{ $item->title_en }}</h3>
                <div class="text-sm sm:text-base">
                    {!! $item->description_en !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
</section>

{{-- Wholesale MOQ & Customization --}}
<section class="bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <!-- Title -->
        <h2 class="text-3xl font-bold text-gray-800 mb-10">
            Wholesale MOQ & Customization
        </h2>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            @foreach ($moq as $item)
            <!-- OEM & Customization -->
            <div class="bg-white shadow rounded-lg p-6 space-y-4">
                <h3 class="text-xl font-semibold text-blue-700">{{ $item->title_en }}</h3>
                <p class="text-gray-600">
                    {{ $item->description_en }}
                </p>
                {!! $item->description_km !!}
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- certification --}}
    <div class="py-20 bg-[#0B0B54]">
        <div class="container mx-auto px-4 text-center">

            <!-- TITLE -->
            <h2 class="text-3xl font-bold mb-4 text-white">Our Certifications</h2>
            <p class="mb-12 text-white">
                We meet international standards to ensure quality and sustainability.
            </p>

            <!-- GRID -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach ($certificate as $item)
                    <!-- ITEM -->
                    <div class="group">
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg">
                            <img src="{{ asset('storage/' . $item->image) }}" alt={{ $item->title_en }}
                                class="w-full h-auto object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <p class="mt-3 font-semibold text-white">{{ $item->title_en }}</p>
                    </div>
                @endforeach

            </div>

        </div>
    </div>

{{-- Complex Gallery Section --}}
<section class="py-20 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- TITLE -->

        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold text-[#0B0B54]">Gallery</h2>
            <p class="text-gray-600 mt-2">Structured visual showcase of our work</p>
        </div>


        <!-- COMPLEX GRID -->
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4 auto-rows-[140px]">




            @foreach (($gallery->images ?? []) as $image)
            <img src="{{ asset('storage/' . $image) }}"
                class="w-full h-full object-cover rounded-lg shadow-md">
            @endforeach



        </div>

    </div>
</section>
@endsection
