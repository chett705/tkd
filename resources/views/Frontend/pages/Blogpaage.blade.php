@extends('Frontend.layouts.Main')

@section('content')
@php
$comparisonMeta = $comparison?->meta ?? [];
$comparisonRows = $comparisonMeta['rows'] ?? [];
$conclusionMeta = $conclusion?->meta ?? [];
$conclusionText = $conclusionMeta['conclusion'] ?? $conclusion?->description_en ?? $conclusion?->description_km;
$quoteMeta = $qoute?->meta ?? [];
$ctaButtons = $quoteMeta['buttons'] ?? [];

if (is_string($ctaButtons)) {
$decodedButtons = json_decode($ctaButtons, true);
$ctaButtons = is_array($decodedButtons) ? $decodedButtons : [];
}
@endphp

<!-- HERO (keep but remove big blog title inside content area) -->
<div class="relative h-[70vh] w-full flex items-center justify-center bg-cover bg-center"
    style="background-image: url('https://wp-themes.com/wp-content/themes/production-factory/assets/images/banner-image.png');">

    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative z-10 text-center px-6">
        <p class="text-white text-lg md:text-2xl font-semibold">
            Sustainable Alternatives for Modern Businesses
        </p>
    </div>
</div>

<!-- COMPARISON SECTION -->
<section class="py-14">
    <div class="container mx-auto px-6 lg:px-8">
        @if($comparison && !empty($comparisonRows))
        <div>
            <div class="px-6 py-4 text-center my-10">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800">
                    {{ $comparison->title_en ?? $comparison->title_km ?? 'Rice Straws vs Paper Straws Comparison' }}
                </h2>
                <p class="text-gray-600 text-sm mt-1">
                    {{ $comparison->description_en ?? $comparison->description_km ?? 'A clear breakdown to help your business choose the right eco solution' }}
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm md:text-base">
                    <thead class="text-gray-700">
                        <tr class="border-b">
                            <th class="text-left px-6 py-4">Feature</th>
                            <th class="text-left px-6 py-4 text-green-700">Rice Straws</th>
                            <th class="text-left px-6 py-4 text-blue-700">Paper Straws</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">
                        @foreach($comparisonRows as $row)
                        <tr>
                            <td class="px-6 py-4 font-medium">{{ $row['label'] ?? '' }}</td>
                            <td class="px-6 py-4">{{ $row['rice'] ?? '' }}</td>
                            <td class="px-6 py-4">{{ $row['paper'] ?? '' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

        @if($conclusion && $conclusionText)
        <section class="py-10">
            <div class="container mx-auto px-6 lg:px-8">
                <div class="bg-white border border-gray-200 rounded-lg p-6 md:p-10 shadow-sm">
                    <h3 class="text-lg md:text-xl font-bold text-gray-800 text-center">
                        {{ $conclusion->title_en ?? $conclusion->title_km ?? 'Conclusion' }}
                    </h3>
                    <div class="text-gray-600 text-sm md:text-base mt-4 leading-relaxed text-center max-w-4xl mx-auto">
                        {!! $conclusionText !!}
                    </div>
                </div>
            </div>
        </section>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="mt-10 text-center bg-[#0B0B54]">
    <div class="container mx-auto py-10">
        <h3 class="text-lg md:text-xl font-semibold text-white">
            {{ $qoute->title_en ?? $qoute->title_km ?? 'Need Bulk Supply for Your Business?' }}
        </h3>
        <p class="text-white mt-2">
            {{ $qoute->description_en ?? $qoute->description_km ?? 'Get sustainable rice straw solutions tailored for restaurants, cafes, and distributors.' }}
        </p>

        <div class="mt-5 flex flex-col sm:flex-row justify-center gap-3">
            @forelse($ctaButtons as $button)
            <a href="{{ $button['link'] ?? '#' }}"
                class="px-6 py-3 rounded-md text-white {{ ($button['style'] ?? 'primary') === 'secondary' ? 'bg-gray-800 hover:bg-black' : 'bg-green-600 hover:bg-green-700' }}">
                {{ $button['text'] ?? 'Learn More' }}
            </a>
            @empty
            <a href="/contact-us" class="px-6 py-3 bg-green-600 text-white rounded-md hover:bg-green-700">
                Request Quotation
            </a>
            <a href="/contact-us" class="px-6 py-3 bg-gray-800 text-white rounded-md hover:bg-black">
                Contact Us
            </a>
            @endforelse
        </div>
    </div>
</section>
@endsection