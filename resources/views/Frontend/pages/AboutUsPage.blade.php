@extends('Frontend.layouts.Main')

@section('content')
    <div x-data="overviewTabs({
        tabs: {{ Js::from(
            $sub->map(function ($item) {
                return [
                    'title' => $item->title_en,
                    'icon' => asset('storage/' . $item->icon),
                    'content' => $item->description_en,
                ];
            }),
        ) }}
    })" class="relative">

        {{-- HERO SECTION --}}
        <div class="relative h-[93vh] bg-cover bg-center text-white"
            style="background-image: url('{{ asset('storage/' . $hero->media_url) }}');">

            <div class="absolute inset-0 bg-black/40"></div>

            {{-- HERO CONTENT --}}
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

            {{-- TABS (CENTER BOTTOM OF HERO) --}}
            {{-- TABS --}}
            <div class="absolute bottom-[-50px] left-1/2 -translate-x-1/2 w-full max-w-5xl bg-white shadow-lg text-black">

                <div class="grid grid-cols-4">

                    <template x-for="(tab, index) in tabs" :key="index">
                        <button @click="active = index" class="flex flex-col items-center gap-2 py-4 transition"
                            :class="active === index ? ' text-[#ED1C24]' : ''">

                            <img :src="tab.icon" class="w-8 h-8">
                            <p class="text-sm font-medium" x-text="tab.title"></p>

                        </button>
                    </template>

                </div>
            </div>
        </div>

        {{-- TAB CONTENT --}}
        <div class="container mx-auto text-center py-20">

            <template x-for="(tab, index) in tabs" :key="index">
                <div x-show="active === index" x-transition class="text-center">
                    <h3 class="text-2xl font-bold mb-3" x-text="tab.title"></h3>
                    <p class="text-gray-600 text-lg" x-text="tab.content"></p>
                </div>
            </template>

        </div>

    </div>
    <!-- CTA SECTION -->
    <div class="mt-60 bg-[#0B0B54] text-white py-20 text-center relative overflow-hidden">

        <!-- OPENING QUOTE (TOP LEFT) -->
        <div class="text-[120px] leading-none font-bold absolute top-5 left-1/7 text-white">
            “
        </div>

        <!-- CLOSING QUOTE (BOTTOM RIGHT) -->
        <div class="text-[120px] leading-none font-bold  absolute bottom-0 right-1/7 text-white">
            ”
        </div>

        <!-- TEXT -->
        @if ($quote)
            <h2 class="text-[26px] md:text-[32px] font-bold mb-8 relative z-10">
                {{ $quote->title_en }}
            </h2>
        @endif

    </div>

    {{-- our leader ship --}}
    <div class="my-20">
        <h2 class="text-2xl text-center font-bold text-[#ED1C24]">
            Our Leadership Team
        </h2>

        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-10 my-10 px-5">

            @foreach ($team as $item)
                <div class="p-3 flex flex-col gap-2 border border-gray-400 shadow-lg">

                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title_en }}">

                    <div>
                        <p>{{ $item->title_en }}</p>

                        @if ($item->description_en === 'founder')
                            <p class="text-[#ED1C24] uppercase">
                                {{ $item->description_en }}
                            </p>
                        @else
                            <p class="uppercase">
                                {{ $item->description_en }}
                            </p>
                        @endif

                    </div>
                </div>
            @endforeach

        </div>
    </div>


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
    </div>
@endsection
{{-- ALPINE --}}
{{-- <script>
    function overviewTabs() {
        return {
            active: 0,
            tabs: [{
                    title: 'Company Overview',
                    icon: '{{ asset('icons/company.png') }}',
                    content: 'We are a Cambodian company focused on sustainable and eco-friendly straw production.'
                },
                {
                    title: 'Vision',
                    icon: '{{ asset('icons/vision.png') }}',
                    content: 'To become a leading eco-friendly straw manufacturer in Southeast Asia.'
                },
                {
                    title: 'Mission',
                    icon: '{{ asset('icons/mission.png') }}',
                    content: 'Reduce plastic waste by offering biodegradable alternatives worldwide.'
                },
                {
                    title: 'Values',
                    icon: '{{ asset('icons/value.png') }}',
                    content: 'Sustainability, innovation, and responsibility toward the environment.'
                }
            ]
        }
    }
</script> --}}
<script>
    function overviewTabs(data) {
        return {
            active: 0,
            tabs: data.tabs || []
        }
    }
</script>
