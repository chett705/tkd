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

    {{-- key products --}}
    <div class="py-20 relative">
        <div class="absolute top-20 left-0 w-2/3 md:w-2/3 lg:w-1/3 overflow-hidden">
            <!-- background -->
            <div class="absolute inset-0 bg-[#ED1C24]
                [clip-path:polygon(0_0,100%_0,90%_100%,0_100%)]">
            </div>
            <!-- content aligned EXACTLY with navbar (right side of 1400px) -->
            <div class="relative z-10 px-6 py-3 flex justify-center">
                <h1 class="text-2xl font-bold text-white capitalize">our key products</h1>
            </div>
        </div>

        {{-- card --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-10 py-40 md:py-30 container mx-auto px-5">

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
@endsection
