@extends('backend.layout.app')

@section('title', 'View Section Item')
@section('page-title', 'Section Item Details')
@section('page-subtitle', 'CMS content overview')

@section('content')

<div class="max-w-5xl mx-auto">

    {{-- MAIN CARD --}}
    <div class="bg-gray-900 border border-gray-800/60 rounded-xl overflow-hidden">

        {{-- HEADER --}}
        <div class="flex justify-between items-center px-5 py-3 border-b border-gray-800/60">

            <div>
                <h2 class="text-lg font-semibold text-white">
                    {{ $item->title_en ?? 'Untitled' }}
                </h2>
                <p class="text-xs text-gray-400">
                    {{ $item->page }} / {{ $item->section_key }}
                </p>
            </div>

            <span class="text-xs px-2 py-1 rounded border border-gray-800/60
                {{ $item->is_active
                    ? 'bg-green-500/10 text-green-400'
                    : 'bg-red-500/10 text-red-400' }}">
                {{ $item->is_active ? 'Active' : 'Inactive' }}
            </span>

        </div>

        {{-- BODY --}}
        <div class="p-4 space-y-4">

            {{-- INFO GRID --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-sm">

                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-2">
                    <p class="text-gray-400 text-xs">Component</p>
                    <p class="text-white">{{ $item->component_type ?? '-' }}</p>
                </div>

                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-2">
                    <p class="text-gray-400 text-xs">Type</p>
                    <p class="text-white">{{ $item->type ?? '-' }}</p>
                </div>

                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-2">
                    <p class="text-gray-400 text-xs">Sort</p>
                    <p class="text-white">{{ $item->sort_order ?? 0 }}</p>
                </div>

                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-2">
                    <p class="text-gray-400 text-xs">Page</p>
                    <p class="text-white">{{ $item->page }}</p>
                </div>

            </div>

            {{-- TITLE --}}
            <div class="grid grid-cols-2 gap-3">

                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-3">
                    <p class="text-gray-400 text-xs">Title EN</p>
                    <p class="text-white text-sm">{{ $item->title_en }}</p>
                </div>

                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-3">
                    <p class="text-gray-400 text-xs">Title KH</p>
                    <p class="text-white text-sm">{{ $item->title_km }}</p>
                </div>

            </div>

            {{-- DESCRIPTION --}}
            <div class="space-y-3">

                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-3">
                    <p class="text-gray-400 text-xs mb-1">Description EN</p>
                    <p class="text-white text-sm">{{ $item->description_en }}</p>
                </div>

                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-3">
                    <p class="text-gray-400 text-xs mb-1">Description KH</p>
                    <p class="text-white text-sm">{{ $item->description_km }}</p>
                </div>

            </div>

            {{-- MEDIA --}}
            <div class="grid grid-cols-2 gap-3">

                @if($item->image)
                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-3">
                    <p class="text-gray-400 text-xs mb-2">Image</p>
                    <img src="{{ asset('storage/' . $item->image) }}"
                         class="h-32 w-full object-cover rounded border border-gray-800/60">
                </div>
                @endif

                @if($item->icon)
                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-3">
                    <p class="text-gray-400 text-xs">Icon</p>
                    <img src="{{ asset('storage/' . $item->icon) }}"
                         class="h-10 mt-1 rounded border border-gray-800/60">
                </div>
                @endif

            </div>

            {{-- GALLERY IMAGES --}}
            @if($item->images && count($item->images))
            <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-3">

                <div class="flex items-center justify-between mb-2">
                    <p class="text-gray-400 text-xs">Gallery Images</p>
                    <span class="text-xs text-gray-500">{{ count($item->images) }} images</span>
                </div>

                <div id="gallery-show-scroll"
                     class="flex gap-2 overflow-x-scroll pb-2"
                     style="max-width:1136px; cursor:grab">
                    @foreach(array_reverse($item->images) as $img)
                        <div class="flex-shrink-0 w-24">
                            <img src="{{ asset('storage/' . $img) }}"
                                 class="w-24 h-20 object-cover rounded-xl border border-gray-700 hover:border-orange-500/60 transition">
                        </div>
                    @endforeach
                </div>

            </div>
            @endif

            {{-- LINK --}}
            @if($item->link)
            <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-3">
                <p class="text-gray-400 text-xs">Link</p>
                <a href="{{ $item->link }}" target="_blank"
                   class="text-blue-400 text-sm hover:underline break-all">
                    {{ $item->link }}
                </a>
            </div>
            @endif

            {{-- BUTTON --}}
            <div class="grid grid-cols-2 gap-3">

                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-3">
                    <p class="text-gray-400 text-xs">Button EN</p>
                    <p class="text-white text-sm">{{ $item->button_text_en }}</p>
                </div>

                <div class="bg-gray-800/30 border border-gray-800/60 rounded-lg p-3">
                    <p class="text-gray-400 text-xs">Button KH</p>
                    <p class="text-white text-sm">{{ $item->button_text_km }}</p>
                </div>

            </div>

        </div>

        {{-- FOOTER --}}
        <div class="flex justify-end gap-2 px-4 py-3 border-t border-gray-800/60">

            <a href="{{ route('admin.section-items.index') }}"
               class="px-3 py-1.5 text-sm bg-gray-800 hover:bg-gray-700 text-white rounded border border-gray-800/60">
                Back
            </a>

            <a href="{{ route('admin.section-items.edit', $item->id) }}"
               class="px-3 py-1.5 text-sm bg-orange-500 hover:bg-orange-600 text-white rounded">
                Edit
            </a>

        </div>

    </div>

</div>

@endsection

@push('scripts')
<script>
    const el = document.getElementById('gallery-show-scroll');
    if (el) {
        let isDown = false, startX, scrollLeft;
        el.addEventListener('mousedown', e => {
            isDown = true;
            el.style.cursor = 'grabbing';
            startX    = e.pageX - el.offsetLeft;
            scrollLeft = el.scrollLeft;
        });
        el.addEventListener('mouseleave', () => { isDown = false; el.style.cursor = 'grab'; });
        el.addEventListener('mouseup',    () => { isDown = false; el.style.cursor = 'grab'; });
        el.addEventListener('mousemove',  e => {
            if (!isDown) return;
            e.preventDefault();
            el.scrollLeft = scrollLeft - (e.pageX - el.offsetLeft - startX);
        });
    }
</script>
@endpush