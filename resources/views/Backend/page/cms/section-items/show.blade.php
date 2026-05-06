@extends('Backend.layout.app')

@section('title', 'View Section Item')
@section('page-title', 'Section Item Details')
@section('page-subtitle', 'CMS content overview')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="bg-white border border-slate-200 rounded-xl overflow-hidden shadow-sm">

        <div class="flex justify-between items-center px-5 py-3 border-b border-slate-200">

            <div>
                <h2 class="text-lg font-semibold text-slate-900">
                    {{ $item->title_en ?? 'Untitled' }}
                </h2>
                <p class="text-xs text-slate-500">
                    {{ $item->page }} / {{ $item->section_key }}
                </p>
            </div>

            <span class="text-xs px-2 py-1 rounded border border-slate-200 {{ $item->is_active ? 'bg-[#0d66b5]/10 text-[#0d66b5]' : 'bg-red-500/10 text-red-500' }}">
                {{ $item->is_active ? 'Active' : 'Inactive' }}
            </span>

        </div>

        <div class="p-4 space-y-4">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-3 text-sm">

                <div class="bg-slate-50 border border-slate-200 rounded-lg p-2">
                    <p class="text-slate-500 text-xs">Component</p>
                    <p class="text-slate-900">{{ $item->component_type ?? '-' }}</p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-lg p-2">
                    <p class="text-slate-500 text-xs">Type</p>
                    <p class="text-slate-900">{{ $item->type ?? '-' }}</p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-lg p-2">
                    <p class="text-slate-500 text-xs">Sort</p>
                    <p class="text-slate-900">{{ $item->sort_order ?? 0 }}</p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-lg p-2">
                    <p class="text-slate-500 text-xs">Page</p>
                    <p class="text-slate-900">{{ $item->page }}</p>
                </div>

            </div>

            <div class="grid grid-cols-2 gap-3">

                <div class="bg-slate-50 border border-slate-200 rounded-lg p-3">
                    <p class="text-slate-500 text-xs">Title EN</p>
                    <p class="text-slate-900 text-sm">{{ $item->title_en }}</p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-lg p-3">
                    <p class="text-slate-500 text-xs">Title KH</p>
                    <p class="text-slate-900 text-sm">{{ $item->title_km }}</p>
                </div>

            </div>

            <div class="space-y-3">

                <div class="bg-slate-50 border border-slate-200 rounded-lg p-3">
                    <p class="text-slate-500 text-xs mb-1">Description EN</p>
                    <p class="text-slate-900 text-sm">{{ $item->description_en }}</p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-lg p-3">
                    <p class="text-slate-500 text-xs mb-1">Description KH</p>
                    <p class="text-slate-900 text-sm">{{ $item->description_km }}</p>
                </div>

            </div>

            <div class="grid grid-cols-2 gap-3">

                @if($item->image)
                <div class="bg-slate-50 border border-slate-200 rounded-lg p-3">
                    <p class="text-slate-500 text-xs mb-2">Image</p>
                    <img src="{{ asset('storage/' . $item->image) }}" class="h-32 w-full object-cover rounded border border-slate-200">
                </div>
                @endif

                @if($item->icon)
                <div class="bg-slate-50 border border-slate-200 rounded-lg p-3">
                    <p class="text-slate-500 text-xs">Icon</p>
                    <img src="{{ asset('storage/' . $item->icon) }}" class="h-10 mt-1 rounded border border-slate-200 bg-white">
                </div>
                @endif

            </div>

            @if($item->images && count($item->images))
            <div class="bg-slate-50 border border-slate-200 rounded-lg p-3">

                <div class="flex items-center justify-between mb-2">
                    <p class="text-slate-500 text-xs">Gallery Images</p>
                    <span class="text-xs text-slate-400">{{ count($item->images) }} images</span>
                </div>

                <div id="gallery-show-scroll" class="flex gap-2 overflow-x-scroll pb-2" style="max-width:1136px; cursor:grab">
                    @foreach(array_reverse($item->images) as $img)
                        <div class="flex-shrink-0 w-24">
                            <img src="{{ asset('storage/' . $img) }}" class="w-24 h-20 object-cover rounded-xl border border-slate-200 hover:border-[#0d66b5]/60 transition">
                        </div>
                    @endforeach
                </div>

            </div>
            @endif

            @if($item->link)
            <div class="bg-slate-50 border border-slate-200 rounded-lg p-3">
                <p class="text-slate-500 text-xs">Link</p>
                <a href="{{ $item->link }}" target="_blank" class="text-[#0d66b5] text-sm hover:underline break-all">
                    {{ $item->link }}
                </a>
            </div>
            @endif

            <div class="grid grid-cols-2 gap-3">

                <div class="bg-slate-50 border border-slate-200 rounded-lg p-3">
                    <p class="text-slate-500 text-xs">Button EN</p>
                    <p class="text-slate-900 text-sm">{{ $item->button_text_en }}</p>
                </div>

                <div class="bg-slate-50 border border-slate-200 rounded-lg p-3">
                    <p class="text-slate-500 text-xs">Button KH</p>
                    <p class="text-slate-900 text-sm">{{ $item->button_text_km }}</p>
                </div>

            </div>

        </div>

        <div class="flex justify-end gap-2 px-4 py-3 border-t border-slate-200">

            <a href="{{ route('admin.section-items.index') }}" class="px-3 py-1.5 text-sm bg-slate-100 hover:bg-slate-200 text-slate-700 rounded border border-slate-200">
                Back
            </a>

            <a href="{{ route('admin.section-items.edit', $item->id) }}" class="px-3 py-1.5 text-sm bg-[#0d66b5] hover:bg-[#0a4f97] text-white rounded">
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
            startX = e.pageX - el.offsetLeft;
            scrollLeft = el.scrollLeft;
        });
        el.addEventListener('mouseleave', () => { isDown = false; el.style.cursor = 'grab'; });
        el.addEventListener('mouseup', () => { isDown = false; el.style.cursor = 'grab'; });
        el.addEventListener('mousemove', e => {
            if (!isDown) return;
            e.preventDefault();
            el.scrollLeft = scrollLeft - (e.pageX - el.offsetLeft - startX);
        });
    }
</script>
@endpush

