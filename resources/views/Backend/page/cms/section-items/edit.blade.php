@extends('backend.layout.app')

@section('title', 'Update Section Item')
@section('page-title', 'Update Section Item')
@section('page-subtitle', 'Edit CMS section item')

@section('content')

    <div class="max-w-full mx-auto">

        <form action="{{ route('admin.section-items.update', $item->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-5">

            @csrf
            @method('PUT')

            {{-- PAGE + SECTION --}}
            <div class="grid grid-cols-2 gap-4 mb-4">

                {{-- PAGE --}}
                <div>
                    <label class="text-xs text-gray-100">Page</label>

                    <select id="pageSelect" name="page" class="w-full border mt-1 bg-gray-800 text-gray-400 p-2 rounded-xl">

                        <option value="">Select Page</option>

                        @foreach ($pages as $page)
                            <option value="{{ $page->slug }}" data-id="{{ $page->id }}"
                                {{ $item->page == $page->slug ? 'selected' : '' }}>
                                {{ $page->name_en }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- SECTION KEY --}}
                <div>
                    <label class="text-xs text-white">Section Key *</label>

                    <input type="text" name="section_key" value="{{ old('section_key', $item->section_key) }}"
                        class="w-full border mt-1 bg-gray-800 text-gray-400 p-2 rounded-xl @error('section_key') border-red-500 @enderror"
                        placeholder="services, projects, why-us">
                </div>

            </div>

            {{-- GROUP --}}
            <div>
                <label class="text-xs text-gray-100">Group (Menu)</label>

                <select id="groupSelect" name="group_title"
                    class="w-full mt-1 border bg-gray-800 text-gray-400 p-2 rounded-xl">

                    <option value="">Select Group</option>

                    @foreach ($groups as $group)
                        <option value="{{ $group->name_en }}" {{ $item->group_title == $group->name_en ? 'selected' : '' }}>
                            {{ $group->name_en }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- TYPE --}}
            <div class="grid grid-cols-2 gap-4 mt-4">

                <input type="text" name="component_type" value="{{ old('component_type', $item->component_type) }}"
                    placeholder="component_type..." class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

                <input type="text" name="type" value="{{ old('type', $item->type) }}" placeholder="Type"
                    class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

            </div>

            {{-- TITLE + DESCRIPTION --}}
            <div class="grid grid-cols-2 gap-4 mt-4">

                {{-- TITLE EN --}}
                <input type="text" name="title_en" value="{{ old('title_en', $item->title_en) }}" placeholder="Title EN"
                    class="border bg-gray-800 text-gray-400 px-2 rounded-xl">

                {{-- DESCRIPTION EN --}}
                <textarea name="description_en" class="w-full border bg-gray-800 text-gray-400 px-2 rounded-xl"
                    placeholder="Description EN">{{ old('description_en', $item->description_en) }}</textarea>

                {{-- DESCRIPTION KM --}}
                <textarea id="description_km" name="description_km" class="w-full border bg-gray-800 text-gray-400 px-2 rounded-xl"
                    placeholder="Description KM">{{ old('description_km', $item->description_km) }}</textarea>

            </div>

            {{-- IMAGE + ICON --}}
            <div class="grid grid-cols-2 gap-4 mt-4">

                <div>
                    <label class="text-xs text-gray-100">Image</label>
                    <input type="file" name="image" class="w-full border bg-gray-800 text-gray-400 p-2 rounded-xl">

                    @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" class="h-16 mt-2 rounded border border-gray-700">
                    @endif
                </div>

                <div>
                    <label class="text-xs text-gray-100">Icon</label>
                    <input type="file" name="icon" class="w-full border bg-gray-800 text-gray-400 p-2 rounded-xl">

                    @if ($item->icon)
                        <img src="{{ asset('storage/' . $item->icon) }}" class="h-10 mt-2 rounded border border-gray-700">
                    @endif
                </div>

            </div>

            {{-- GALLERY IMAGES --}}
            <div>
                @php $existingCount = $item->images ? count($item->images) : 0; @endphp

                <div class="flex items-center justify-between mb-2">
                    <label class="text-xs text-gray-100">Gallery Images</label>
                    <span id="gallery-count-edit" class="text-xs text-gray-500">
                        {{ $existingCount }} saved &nbsp;·&nbsp; <span id="new-count-edit">0</span> new / 40 max
                    </span>
                </div>

                {{-- EXISTING --}}
                @if ($item->images && $existingCount)
                    <div id="gallery-existing-edit" class="flex gap-2 overflow-x-scroll pb-2 mb-3" style="max-width:1136px">
                        @foreach (array_reverse($item->images, true) as $index => $img)
                            <div class="relative group flex-shrink-0 w-24">
                                <img src="{{ asset('storage/' . $img) }}"
                                    class="w-24 h-20 object-cover rounded-xl border border-gray-700">
                                <label
                                    class="absolute inset-0 flex items-end justify-center pb-1 opacity-0 group-hover:opacity-100 transition cursor-pointer">
                                    <input type="checkbox" name="remove_images[]" value="{{ $index }}"
                                        class="hidden peer" onchange="toggleRemove(this)">
                                    <span
                                        class="peer-checked:bg-red-600 bg-red-500/70 text-white text-xs px-2 py-0.5 rounded-lg select-none">
                                        Remove
                                    </span>
                                </label>
                                <div class="absolute top-1 right-1 w-5 h-5 bg-red-600 rounded hidden peer-checked:flex items-center justify-center pointer-events-none"
                                    id="mark-{{ $index }}">
                                    <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="2.5"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- UPLOAD NEW --}}
                <div id="gallery-drop-edit"
                    class="border-2 border-dashed border-gray-700 rounded-xl p-5 text-center cursor-pointer hover:border-orange-500 transition"
                    onclick="document.getElementById('gallery-input-edit').click()">
                    <svg class="mx-auto mb-2 w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="1.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    <p class="text-gray-400 text-sm">Click or drag & drop to add more images</p>
                    <p class="text-gray-600 text-xs mt-1">JPG, PNG, GIF, WEBP — total max 40</p>
                    <input type="file" id="gallery-input-edit" name="images[]" multiple
                        accept="image/jpeg,image/png,image/gif,image/webp" class="hidden">
                </div>

                <div id="gallery-preview-edit" class="mt-3 flex gap-2 overflow-x-scroll pb-2" style="max-width:1136px">
                </div>
                <p id="gallery-error-edit" class="text-red-400 text-xs mt-1 hidden">Maximum 40 images total allowed.</p>
            </div>

            {{-- LINK + BUTTON --}}
            <div class="grid grid-cols-2 gap-4 mt-4">

                <input type="text" name="link" value="{{ old('link', $item->link) }}" placeholder="Link"
                    class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

                <input type="text" name="button_text_en" value="{{ old('button_text_en', $item->button_text_en) }}"
                    placeholder="Button EN" class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

            </div>

            {{-- SORT + STATUS --}}
            <div class="grid grid-cols-2 gap-4 mt-4">

                <input type="number" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}"
                    placeholder="Sort Order" class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

                <select name="is_active" class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

                    <option value="1" {{ $item->is_active ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$item->is_active ? 'selected' : '' }}>Inactive</option>

                </select>

            </div>

            {{-- META --}}
            <div class="mt-4">
                <label class="text-xs text-gray-100">Meta (JSON)</label>

                <textarea name="meta" class="w-full border bg-gray-800 text-gray-400 p-2 rounded-xl"
                    placeholder='{"key":"value"}'>{{ $item->meta ? json_encode($item->meta) : '' }}</textarea>
            </div>

            {{-- ACTION --}}
            <div class="flex justify-end gap-2">

                <a href="{{ route('admin.section-items.index') }}"
                    class="px-4 py-2 border rounded-xl bg-gray-700 text-white hover:bg-gray-600">
                    Cancel
                </a>

                <button class="px-4 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600">
                    Update Item
                </button>

            </div>

        </form>

    </div>


@endsection
@push('scripts')

    <script>
        ClassicEditor
            .create(document.querySelector('#description_km'), {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold', 'italic', 'underline',
                        '|',
                        'fontColor', 'fontBackgroundColor',
                        '|',
                        'bulletedList', 'numberedList',
                        '|',
                        'link', 'blockQuote',
                        '|',
                        'undo', 'redo'
                    ]
                },

                // Enable Font Color & Background Color
                fontColor: {
                    colors: [
                        { color: '#000000', label: 'Black' },
                        { color: '#ffffff', label: 'White' },
                        { color: '#e74c3c', label: 'Red' },
                        { color: '#3498db', label: 'Blue' },
                        { color: '#2ecc71', label: 'Green' },
                        { color: '#f1c40f', label: 'Yellow' },
                        { color: '#9b59b6', label: 'Purple' },
                    ]
                },

                fontBackgroundColor: {
                    colors: [
                        { color: '#ffff00', label: 'Yellow' },
                        { color: '#ffcccc', label: 'Light Red' },
                        { color: '#ccffcc', label: 'Light Green' },
                        { color: '#cce6ff', label: 'Light Blue' },
                    ]
                },

                // Optional: Better Khmer support
                language: 'km',

                heading: {
                    options: [
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    ]
                }
            })
            .then(editor => {
                console.log('CKEditor 5 is ready ✅');
            })
            .catch(error => {
                console.error('CKEditor error:', error);
            });

        // ── Gallery images (edit) ────────────────────────────────
        const MAX_EDIT = 40;
        const existingCount = {{ $existingCount ?? 0 }};
        const galleryInputE = document.getElementById('gallery-input-edit');
        const galleryDropE = document.getElementById('gallery-drop-edit');
        const galleryPreviewE = document.getElementById('gallery-preview-edit');
        const newCountLabel = document.getElementById('new-count-edit');
        const galleryErrorE = document.getElementById('gallery-error-edit');
        let selectedFilesE = [];

        // How many existing images are NOT checked for removal
        function keptCount() {
            return document.querySelectorAll('input[name="remove_images[]"]:not(:checked)').length;
        }

        function renderGalleryEdit() {
            galleryPreviewE.innerHTML = '';
            newCountLabel.textContent = selectedFilesE.length;
            const total = keptCount() + selectedFilesE.length;
            galleryErrorE.classList.toggle('hidden', total <= MAX_EDIT);

            // newest first
            [...selectedFilesE].reverse().forEach((file, ri) => {
                const i = selectedFilesE.length - 1 - ri;
                const reader = new FileReader();
                reader.onload = e => {
                    const div = document.createElement('div');
                    div.className = 'relative group flex-shrink-0 w-24';
                    div.innerHTML = `
                        <img src="${e.target.result}"
                             class="w-24 h-20 object-cover rounded-xl border border-orange-500/40">
                        <button type="button"
                                onclick="removeEditFile(${i})"
                                class="absolute top-1 right-1 w-5 h-5 bg-red-500/80 hover:bg-red-500 rounded flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>`;
                    galleryPreviewE.appendChild(div);
                };
                reader.readAsDataURL(file);
            });

            const dt = new DataTransfer();
            selectedFilesE.forEach(f => dt.items.add(f));
            galleryInputE.files = dt.files;
        }

        function removeEditFile(index) {
            selectedFilesE.splice(index, 1);
            renderGalleryEdit();
        }

        function addFilesEdit(newFiles) {
            const total = keptCount() + selectedFilesE.length + newFiles.length;
            if (total > MAX_EDIT) {
                galleryErrorE.classList.remove('hidden');
                const canAdd = Math.max(0, MAX_EDIT - keptCount() - selectedFilesE.length);
                selectedFilesE = [...selectedFilesE, ...newFiles.slice(0, canAdd)];
            } else {
                galleryErrorE.classList.add('hidden');
                selectedFilesE = [...selectedFilesE, ...newFiles];
            }
            renderGalleryEdit();
        }

        // Toggle red overlay on existing images when checked for removal
        function toggleRemove(checkbox) {
            const parent = checkbox.closest('.relative');
            const img = parent.querySelector('img');
            if (checkbox.checked) {
                img.classList.add('opacity-40', 'border-red-500');
                img.classList.remove('border-gray-700');
            } else {
                img.classList.remove('opacity-40', 'border-red-500');
                img.classList.add('border-gray-700');
            }
            renderGalleryEdit();
        }

        galleryInputE.addEventListener('change', () => addFilesEdit([...galleryInputE.files]));

        galleryDropE.addEventListener('dragover', e => {
            e.preventDefault();
            galleryDropE.classList.add('border-orange-500');
        });
        galleryDropE.addEventListener('dragleave', () => galleryDropE.classList.remove('border-orange-500'));
        galleryDropE.addEventListener('drop', e => {
            e.preventDefault();
            galleryDropE.classList.remove('border-orange-500');
            addFilesEdit([...e.dataTransfer.files].filter(f => f.type.startsWith('image/')));
        });
        // Mouse-drag scroll
        function dragScroll(el) {
            let isDown = false,
                startX, scrollLeft;
            el.addEventListener('mousedown', e => {
                isDown = true;
                el.style.cursor = 'grabbing';
                startX = e.pageX - el.offsetLeft;
                scrollLeft = el.scrollLeft;
            });
            el.addEventListener('mouseleave', () => {
                isDown = false;
                el.style.cursor = 'grab';
            });
            el.addEventListener('mouseup', () => {
                isDown = false;
                el.style.cursor = 'grab';
            });
            el.addEventListener('mousemove', e => {
                if (!isDown) return;
                e.preventDefault();
                el.scrollLeft = scrollLeft - (e.pageX - el.offsetLeft - startX);
            });
            el.style.cursor = 'grab';
        }

        // Apply to both preview rows
        dragScroll(document.getElementById('gallery-preview-edit'));
        @if ($item->images && count($item->images ?? []))
            dragScroll(document.getElementById('gallery-existing-edit'));
        @endif
        // ────────────────────────────────────────────────────────
    </script>
    <style>
        .ck-editor__editable {
            background-color: #ffffff !important;
            color: #000000 !important;
            min-height: 150px;
        }

        .ck.ck-toolbar {
            background-color: #1f2937 !important;
            /* gray-800 */
            border: 1px solid #374151 !important;
        }

        .ck.ck-button {
            color: #d1d5db !important;
        }
    </style>
@endpush
