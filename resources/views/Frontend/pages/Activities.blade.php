@extends('Frontend.layouts.Main')

@section('content')
{{-- hero section --}}
<div class="min-h-[85vh] md:min-h-[93vh] bg-cover bg-center text-white relative"
    style="background-image: url('https://wp-themes.com/wp-content/themes/production-factory/assets/images/banner-image.png');">

    <div class="absolute inset-0 bg-black/40"></div>

    <!-- RED STRIP -->
    <div class="absolute bottom-0 right-0 w-full lg:w-8/10 overflow-hidden">

        <div class="absolute inset-0 bg-[#ED1C24]
        [clip-path:polygon(10%_0,100%_0,100%_100%,0_100%)]">
        </div>

        <div
            class="relative z-10 px-4 sm:px-5 md:px-8 lg:px-16 2xl:px-40 py-4 md:py-6 flex flex-col md:flex-row items-center justify-between gap-3 text-sm md:text-base">

            <div class="flex items-center gap-2">
                <i class="fa-solid fa-phone text-black"></i>
                <p class="break-all">+855 12 590 666</p>
            </div>

            <div class="flex items-center gap-2">
                <i class="fa-solid fa-envelope text-black"></i>
                <p class="break-all">tkd.manufacturing89@gmail.com</p>
            </div>

            <div class="flex items-center gap-2 text-center md:text-left">
                <i class="fa-solid fa-bullhorn text-black"></i>
                <p class="text-xs md:text-sm lg:text-base">
                    Delivering Industrial Excellence with Every Product.
                </p>
            </div>

        </div>
    </div>

    <!-- HERO CONTENT -->
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 flex items-center h-full relative z-10 py-20 md:py-24">
        <div class="w-full lg:w-1/2 flex flex-col gap-4 md:gap-5 text-center md:text-left">

            <h2
                class="text-2xl sm:text-3xl md:text-4xl lg:text-[44px]
                       leading-snug md:leading-tight font-bold break-words">
                Sustainable Rice-Flour Straws from Cambodia to the World
            </h2>

            <p class="text-sm sm:text-base md:text-lg lg:text-[22px] leading-relaxed">
                Eco-friendly, biodegradable, and durable alternatives to plastic straws.
            </p>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 w-full">
                <a href=""
                    class="w-full sm:w-auto px-6 py-3 border border-[#ED1C24]
                          bg-white text-[#ED1C24] font-semibold text-center">
                    Get a Quote
                </a>

                <a href=""
                    class="w-full sm:w-auto px-6 py-3 border border-[#ED1C24]
                          bg-white text-[#ED1C24] font-semibold text-center">
                    View Products
                </a>
            </div>
        </div>
    </div>
</div>


{{-- Media & News similar  --}}
<div class="my-14 sm:my-18 lg:my-20">
    <h2 class="text-center text-xl sm:text-2xl md:text-3xl text-[#ED1C24] mb-8 sm:mb-10 font-semibold">
        Manufacturing Process
    </h2>

    <div class="container mx-auto px-4 sm:px-6 lg:px-10">

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 md:gap-6 lg:gap-8">

            @foreach ($manufacturingProcess as $step)
            <div class="h-full p-5 md:p-6 border border-gray-200 hover:shadow-lg transition flex flex-col gap-3 bg-white">
                @if (!empty($step->icon))
                <img src="{{ asset('storage/' . $step->icon) }}" alt="{{ $step->title_en ?? 'icon' }}" class="w-10 h-10 object-contain">
                @elseif (!empty($step->image))
                <img src="{{ asset('storage/' . $step->image) }}" alt="{{ $step->title_en ?? 'icon' }}" class="w-10 h-10 object-contain">
                @endif

                <p class="font-semibold text-base leading-snug">
                    {{ $step->title_en ?? '' }}
                </p>

                <p class="text-sm text-gray-600 leading-relaxed flex-1">
                    {{ $step->description_en ?? '' }}
                </p>
            </div>
            @endforeach


        </div>
    </div>
</div>

{{-- Production Capacity --}}
<div class="relative bg-cover bg-top"
    style="background-image: url('https://wp-themes.com/wp-content/themes/production-factory/assets/images/section-img.png');">

    <!-- DARK OVERLAY -->
    <div class="absolute inset-0 bg-[#0B0B54]/75"></div>

    <!-- CONTENT -->

    <div class="relative z-10 text-white py-12 md:py-16 lg:py-20 px-4 sm:px-6">
    <div class="max-w-6xl mx-auto flex flex-col lg:flex-row items-start gap-10 lg:gap-12">

        <!-- LEFT SIDE -->
        <div class="w-full lg:w-1/2">

            <!-- HEADER -->
            @foreach ($manufacturingName as $ma)
            <div class="mb-8 md:mb-10 text-center lg:text-left">
                <h2 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold leading-tight">
                    {{ $ma->title_en ?? '' }}
                </h2>
                <p class="mt-3 md:mt-4 text-white/70 text-sm sm:text-base md:text-lg leading-relaxed">
                    {{ $ma->description_en ?? '' }}
                </p>
            </div>
            @endforeach

            <!-- STATS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 md:gap-8">
                @foreach ($manufacturingCapacity as $pc)
                <div class="border-l-4 border-red-600 pl-4 md:pl-5 py-1">
                    <h3 class="text-xl md:text-2xl font-bold">
                        {{ $pc->title_en ?? '' }}
                    </h3>
                    <p class="text-white/70 text-sm md:text-base leading-relaxed">
                        {{ $pc->description_en ?? '' }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- RIGHT SIDE (IMAGES) -->
        <div class="w-full lg:w-1/2 flex flex-wrap justify-center gap-4 mt-2 lg:mt-0">
            @foreach (json_decode($productionCapacity->images ?? '[]', true) as $image)
            <img 
                src="{{ asset('storage/' . $image) }}"
                class="w-full sm:w-[calc(50%-0.5rem)] lg:w-[calc(50%-0.5rem)] rounded-md object-cover h-48 sm:h-56 lg:h-48 xl:h-56"
                alt="Production">
            @endforeach
        </div>

    </div>
</div>
</div>


<div class="py-14 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-10">

        <!-- TOP HEADER -->
        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6 mb-10">

            <!-- LEFT TEXT -->
            <div class="max-w-3xl">
                <p class="text-red-600 uppercase tracking-widest text-sm font-semibold">
                    Sustainability & Growth
                </p>
                @foreach ($impactHead as $im)

                <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold text-blue-900 mt-2">
                    {{ $im->title_en ?? '' }}
                </h2>

                <p class="text-gray-700 mt-3 text-sm sm:text-base leading-relaxed">
                    {{ $im->description_en ?? '' }}
                </p>
                @endforeach
            </div>

           

        </div>

        <!-- CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 md:gap-6">

            <!-- Card 1 -->
             @foreach ($impactCont as $ic)
            <div class="bg-white border p-5 md:p-6 hover:shadow-lg transition h-full">
                <div class="w-10 h-10 bg-gray-100 flex items-center justify-center mb-4">
                    @if (!empty($ic->icon))
                        <img src="{{ asset('storage/' . $ic->icon) }}" alt="{{ $ic->title_en ?? 'icon' }}" class="w-6 h-6 object-contain">
                    @else
                        <i class="fa-solid fa-seedling text-blue-900"></i>
                    @endif
                </div>
                <h3 class="font-semibold text-lg text-blue-900">{{ $ic->title_en ?? '' }}</h3>
                <p class="text-gray-600 mt-2 text-sm leading-relaxed">
                    {{ $ic->description_en ?? '' }}
                </p>
            </div>
            @endforeach

            <!-- Card 2 -->
           

        </div>

    </div>
</div>
@endsection
