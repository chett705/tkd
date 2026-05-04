@extends('backend.layout.app')

@section('title', 'Create Section Item')
@section('page-title', 'Create Section Item')
@section('page-subtitle', 'Add new CMS item')

@section('content')

    <div class="max-w-full mx-auto">

        <form action="{{ route('admin.section-items.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-gray-900  border-gray-800 rounded-xl p-6 space-y-5">

            @csrf

            {{-- PAGE + SECTION --}}
            <div class="grid grid-cols-2 gap-4 mb-4">

                {{-- PAGE --}}
                <div>
                    <label class="text-xs text-gray-100">Page</label>

                    <select id="pageSelect" name="page" class="w-full border mt-1 bg-gray-800 text-gray-400 p-2 rounded-xl">

                        <option value="">Select Page</option>

                        @foreach ($pages as $page)
                            <option value="{{ $page->slug }}" data-id="{{ $page->id }}">
                                {{ $page->name_en }}
                            </option>
                        @endforeach

                    </select>
                </div>

                {{-- SECTION KEY --}}
                <div>
                    <label class="text-xs text-white">Section Key *</label>

                    <div class="grid grid-cols-2 gap-3 mt-1">

                        {{-- SELECT EXISTING --}}
                        <select id="sectionSelect" class="w-full  border  bg-gray-800 text-gray-400 p-2 rounded-xl">
                            <option value="">Select Existing</option>
                            @foreach ($sectionKeys as $key)
                                <option value="{{ $key }}">{{ $key }}</option>
                            @endforeach
                        </select>

                        {{-- INPUT SUBMITTED TO BACKEND --}}
                        <input type="text" id="sectionInput" name="section_key" value="{{ old('section_key') }}"
                            placeholder="Or type new key..."
                            class="w-full border  bg-gray-800 text-gray-400 p-2 rounded-xl @error('section_key') border-red-500 @enderror">

                    </div>

                    @error('section_key')
                        <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- GROUP --}}
            <div class="mb-4">
                <label class="text-xs text-gray-100">Group (Menu)</label>

                <select id="groupSelect" name="group_title"
                    class="w-full mt-1 border bg-gray-800 text-gray-400 p-2 rounded-xl">

                    <option value="">Select Group</option>

                </select>
            </div>

            {{-- TYPE --}}
            <div class="grid grid-cols-2 gap-4 mt-4">

                <input type="text" name="component_type" placeholder="component_type ..."
                    class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

                <input type="text" name="type" placeholder="Type"
                    class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

            </div>


            <div class="grid grid-cols-2 gap-4 mt-4">

                {{-- TITLE --}}
                <input type="text" name="title_en" placeholder="Title EN"
                    class="border bg-gray-800 text-gray-400 px-2 rounded-xl">

                <div class="mt-4">
                    <label class="text-xs text-gray-100">Description (General)</label>

                    <textarea name="description_en" class="w-full border bg-gray-800 text-gray-400 px-2 rounded-xl">
        {{ old('description_en') }}
    </textarea>
                </div>

                <div class="mt-4">
                    <label class="text-xs text-gray-100">Description km</label>
                    <textarea id="description_km" name="description_km" class="w-full border bg-gray-800 text-gray-400 px-2 rounded-xl">
        {{ old('description_km') }}
    </textarea>
                </div>


                <div class="grid grid-cols-2 gap-4 mt-4">
                    {{-- IMAGE --}}
                    <div class="">
                        <label class="text-xs text-gray-100">Image</label>
                        <input type="file" name="image"
                            class="w-full  border bg-gray-800 text-gray-400 p-2 rounded-xl">
                    </div>

                    {{-- ICON --}}
                    <div class="">
                        <label class="text-xs text-gray-100">Icon</label>
                        <input type="file" name="icon" accept="image/*,.svg"
                            class="w-full  border bg-gray-800 text-gray-400 p-2 rounded-xl">
                    </div>
                </div>

                {{-- GALLERY IMAGES --}}
                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="text-xs text-gray-100">Gallery Images</label>
                        <span id="gallery-count-create" class="text-xs text-gray-500">0 / 30 images</span>
                    </div>

                    <div id="gallery-drop-create"
                        class="border-2 border-dashed border-gray-700 rounded-xl p-6 text-center cursor-pointer hover:border-orange-500 transition"
                        onclick="document.getElementById('gallery-input-create').click()">
                        <svg class="mx-auto mb-2 w-7 h-7 text-gray-500" fill="none" stroke="currentColor"
                            stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                        </svg>
                        <p class="text-gray-400 text-sm">Click or drag & drop images here</p>
                        <p class="text-gray-600 text-xs mt-1">JPG, PNG, GIF, WEBP — max 40 images</p>
                        <input type="file" id="gallery-input-create" name="images[]" multiple
                            accept="image/jpeg,image/png,image/gif,image/webp" class="hidden">
                    </div>

                    <div id="gallery-preview-create" class="mt-3 flex gap-2 overflow-x-scroll pb-2"
                        style="max-width:1136px">
                    </div>
                    <p id="gallery-error-create" class="text-red-400 text-xs mt-1 hidden">Maximum 40 images allowed.</p>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4">
                    {{-- LINK --}}
                    <input type="text" name="link" placeholder="Link"
                        class="border bg-gray-800 text-gray-400 p-2 rounded-xl">

                    {{-- BUTTON --}}
                    <input type="text" name="button_text_en" placeholder="Button EN"
                        class=" border bg-gray-800 text-gray-400 px-2 rounded-xl">
                </div>





                {{-- SORT + STATUS --}}
                <div class="grid grid-cols-2 gap-4 mb-4 mt-4">

                    <input type="number" name="sort_order" placeholder="Sort Order"
                        class=" border bg-gray-800 text-gray-400 p-2 rounded-xl">

                    <select name="is_active" class=" border bg-gray-800 text-gray-400 p-2 rounded-xl">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>

                </div>

                {{-- META --}}
                <div>
                    <label class="text-xs text-gray-100">Meta (JSON)</label>
                    <textarea name="meta" class="w-full border bg-gray-800 text-gray-400 p-2 rounded-xl"
                        placeholder='{"key":"value"}'></textarea>
                </div>

                {{-- ACTION --}}
                <div class="flex justify-end gap-2 mt-4">

                    <a href="{{ route('admin.section-items.index') }}"
                        class="px-4 py-2 border rounded-xl bg-gray-700 text-white   hover:bg-gray-600">
                        Cancel
                    </a>

                    <button class="px-4 py-2 m-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600">
                        Create Item
                    </button>

                </div>

        </form>

    </div>

@endsection
@push('scripts')
    <script>
        ClassicEditor.create(document.querySelector('#description_km'), {
            toolbar: [
                'heading',
                '|',
                'bold', 'italic', 'underline',
                '|',
                'bulletedList', 'numberedList',
                '|',
                'link', 'blockQuote',
                '|',
                'undo', 'redo'
            ]
        }).catch(error => {
            console.error(error);
        });
        // ── Gallery images (create) ──────────────────────────────
        const MAX_IMAGES = 40;
        const galleryInput = document.getElementById('gallery-input-create');
        const galleryDrop = document.getElementById('gallery-drop-create');
        const galleryPreview = document.getElementById('gallery-preview-create');
        const galleryCount = document.getElementById('gallery-count-create');
        const galleryError = document.getElementById('gallery-error-create');
        let selectedFiles = [];

        function renderGallery() {
            galleryPreview.innerHTML = '';
            galleryCount.textContent = `${selectedFiles.length} / ${MAX_IMAGES} images`;
            galleryCount.className = selectedFiles.length >= MAX_IMAGES ?
                'text-xs text-orange-400' : 'text-xs text-gray-500';

            // newest first
            [...selectedFiles].reverse().forEach((file, ri) => {
                const i = selectedFiles.length - 1 - ri;
                const reader = new FileReader();
                reader.onload = e => {
                    const div = document.createElement('div');
                    div.className = 'relative group flex-shrink-0 w-24';
                    div.innerHTML = `
                        <img src="${e.target.result}"
                             class="w-24 h-20 object-cover rounded-xl border border-gray-700">
                        <button type="button"
                                onclick="removeGalleryFile(${i})"
                                class="absolute top-1 right-1 w-5 h-5 bg-red-500/80 hover:bg-red-500 rounded flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>`;
                    galleryPreview.appendChild(div);
                };
                reader.readAsDataURL(file);
            });

            // Sync to input
            const dt = new DataTransfer();
            selectedFiles.forEach(f => dt.items.add(f));
            galleryInput.files = dt.files;
        }

        function removeGalleryFile(index) {
            selectedFiles.splice(index, 1);
            renderGallery();
        }

        function addFiles(newFiles) {
            const combined = [...selectedFiles, ...newFiles];
            if (combined.length > MAX_IMAGES) {
                galleryError.classList.remove('hidden');
                selectedFiles = combined.slice(0, MAX_IMAGES);
            } else {
                galleryError.classList.add('hidden');
                selectedFiles = combined;
            }
            renderGallery();
        }

        galleryInput.addEventListener('change', () => addFiles([...galleryInput.files]));

        galleryDrop.addEventListener('dragover', e => {
            e.preventDefault();
            galleryDrop.classList.add('border-orange-500');
        });
        galleryDrop.addEventListener('dragleave', () => galleryDrop.classList.remove('border-orange-500'));
        galleryDrop.addEventListener('drop', e => {
            e.preventDefault();
            galleryDrop.classList.remove('border-orange-500');
            addFiles([...e.dataTransfer.files].filter(f => f.type.startsWith('image/')));
        });
        // Mouse-drag scroll
        dragScroll(galleryPreview);

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
        // ────────────────────────────────────────────────────────

        // Section select → copy to input
        document.getElementById('sectionSelect').addEventListener('change', function() {
            const input = document.getElementById('sectionInput');
            if (this.value) {
                input.value = this.value;
            }
        });

        document.getElementById('pageSelect').addEventListener('change', function() {

            let pageId = this.options[this.selectedIndex]?.dataset?.id;
            let groupSelect = document.getElementById('groupSelect');

            if (!pageId) {
                groupSelect.innerHTML = '<option value="">Select Group</option>';
                return;
            }

            groupSelect.innerHTML = '<option value="">Loading...</option>';

            fetch(`/admin/get-groups/${pageId}`)
                .then(res => res.json())
                .then(data => {

                    groupSelect.innerHTML = '<option value="">Select Group</option>';

                    data.forEach(group => {
                        groupSelect.innerHTML +=
                            `<option value="${group.name_en}">${group.name_en}</option>`;
                    });

                })
                .catch(() => {
                    groupSelect.innerHTML = '<option value="">Select Group</option>';
                });
        });
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
