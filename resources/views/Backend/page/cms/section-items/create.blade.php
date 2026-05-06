@extends('Backend.layout.app')

@section('title', 'Create Section Item')
@section('page-title', 'Create Section Item')
@section('page-subtitle', 'Add new CMS item')

@section('content')

<div class="max-w-full mx-auto">

    <form action="{{ route('admin.section-items.store') }}" method="POST" enctype="multipart/form-data" class="bg-white border border-slate-200 rounded-xl p-6 space-y-5 shadow-sm">
        @csrf

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="text-xs text-slate-700">Page</label>
                <select id="pageSelect" name="page" class="w-full border border-slate-200 mt-1 bg-slate-50 text-slate-700 p-2 rounded-xl">
                    <option value="">Select Page</option>
                    @foreach ($pages as $page)
                        <option value="{{ $page->slug }}" data-id="{{ $page->id }}">
                            {{ $page->name_en }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-xs text-slate-700">Section Key *</label>
                <div class="grid grid-cols-2 gap-3 mt-1">
                    <select id="sectionSelect" class="w-full border border-slate-200 bg-slate-50 text-slate-700 p-2 rounded-xl">
                        <option value="">Select Existing</option>
                        @foreach ($sectionKeys as $key)
                            <option value="{{ $key }}">{{ $key }}</option>
                        @endforeach
                    </select>

                    <input type="text" id="sectionInput" name="section_key" value="{{ old('section_key') }}" placeholder="Or type new key..." class="w-full border border-slate-200 bg-slate-50 text-slate-700 p-2 rounded-xl @error('section_key') border-red-500 @enderror">
                </div>
                @error('section_key')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-4">
            <label class="text-xs text-slate-700">Group (Menu)</label>
            <select id="groupSelect" name="group_title" class="w-full mt-1 border border-slate-200 bg-slate-50 text-slate-700 p-2 rounded-xl">
                <option value="">Select Group</option>
            </select>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <input type="text" name="component_type" placeholder="component_type ..." class="border border-slate-200 bg-slate-50 text-slate-700 p-2 rounded-xl">
            <input type="text" name="type" placeholder="Type" class="border border-slate-200 bg-slate-50 text-slate-700 p-2 rounded-xl">
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <input type="text" name="title_en" placeholder="Title EN" class="border border-slate-200 bg-slate-50 text-slate-700 px-2 py-2 rounded-xl">

            <div class="mt-4">
                <label class="text-xs text-slate-700">Description (General)</label>
                <textarea name="description_en" class="w-full border border-slate-200 bg-slate-50 text-slate-700 px-2 rounded-xl">{{ old('description_en') }}</textarea>
            </div>

            <div class="mt-4">
                <label class="text-xs text-slate-700">Description KM</label>
                <textarea id="description_km" name="description_km" class="w-full border border-slate-200 bg-slate-50 text-slate-700 px-2 rounded-xl">{{ old('description_km') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-4">
                <div>
                    <label class="text-xs text-slate-700">Image</label>
                    <input type="file" name="image" class="w-full border border-slate-200 bg-slate-50 text-slate-700 p-2 rounded-xl">
                </div>

                <div>
                    <label class="text-xs text-slate-700">Icon</label>
                    <input type="file" name="icon" accept="image/*,.svg" class="w-full border border-slate-200 bg-slate-50 text-slate-700 p-2 rounded-xl">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between mb-2">
                    <label class="text-xs text-slate-700">Gallery Images</label>
                    <span id="gallery-count-create" class="text-xs text-slate-400">0 / 30 images</span>
                </div>

                <div id="gallery-drop-create" class="border-2 border-dashed border-slate-300 rounded-xl p-6 text-center cursor-pointer hover:border-[#0d66b5] transition" onclick="document.getElementById('gallery-input-create').click()">
                    <svg class="mx-auto mb-2 w-7 h-7 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                    </svg>
                    <p class="text-slate-600 text-sm">Click or drag & drop images here</p>
                    <p class="text-slate-400 text-xs mt-1">JPG, PNG, GIF, WEBP - max 40 images</p>
                    <input type="file" id="gallery-input-create" name="images[]" multiple accept="image/jpeg,image/png,image/gif,image/webp" class="hidden">
                </div>

                <div id="gallery-preview-create" class="mt-3 flex gap-2 overflow-x-scroll pb-2" style="max-width:1136px"></div>
                <p id="gallery-error-create" class="text-red-500 text-xs mt-1 hidden">Maximum 40 images allowed.</p>
            </div>

            <div class="grid grid-cols-2 gap-4 mt-4">
                <input type="text" name="link" placeholder="Link" class="border border-slate-200 bg-slate-50 text-slate-700 p-2 rounded-xl">
                <input type="text" name="button_text_en" placeholder="Button EN" class="border border-slate-200 bg-slate-50 text-slate-700 px-2 py-2 rounded-xl">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4 mt-4">
                <input type="number" name="sort_order" placeholder="Sort Order" class="border border-slate-200 bg-slate-50 text-slate-700 p-2 rounded-xl">
                <select name="is_active" class="border border-slate-200 bg-slate-50 text-slate-700 p-2 rounded-xl">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div>
                <label class="text-xs text-slate-700">Meta (JSON)</label>
                <textarea name="meta" class="w-full border border-slate-200 bg-slate-50 text-slate-700 p-2 rounded-xl" placeholder='{"key":"value"}'></textarea>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <a href="{{ route('admin.section-items.index') }}" class="px-4 py-2 border border-slate-200 rounded-xl bg-slate-100 text-slate-700 hover:bg-slate-200">
                    Cancel
                </a>

                <button class="px-4 py-2 m-2 bg-[#0d66b5] text-white rounded-xl hover:bg-[#0a4f97]">
                    Create Item
                </button>
            </div>
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
            galleryCount.className = selectedFiles.length >= MAX_IMAGES ? 'text-xs text-[#0d66b5]' : 'text-xs text-slate-400';

            [...selectedFiles].reverse().forEach((file, ri) => {
                const i = selectedFiles.length - 1 - ri;
                const reader = new FileReader();
                reader.onload = e => {
                    const div = document.createElement('div');
                    div.className = 'relative group flex-shrink-0 w-24';
                    div.innerHTML = `
                        <img src="${e.target.result}" class="w-24 h-20 object-cover rounded-xl border border-slate-200">
                        <button type="button" onclick="removeGalleryFile(${i})" class="absolute top-1 right-1 w-5 h-5 bg-red-500/80 hover:bg-red-500 rounded flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>`;
                    galleryPreview.appendChild(div);
                };
                reader.readAsDataURL(file);
            });

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
            galleryDrop.classList.add('border-[#0d66b5]');
        });
        galleryDrop.addEventListener('dragleave', () => galleryDrop.classList.remove('border-[#0d66b5]'));
        galleryDrop.addEventListener('drop', e => {
            e.preventDefault();
            galleryDrop.classList.remove('border-[#0d66b5]');
            addFiles([...e.dataTransfer.files].filter(f => f.type.startsWith('image/')));
        });

        dragScroll(galleryPreview);

        function dragScroll(el) {
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
            el.style.cursor = 'grab';
        }

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
                        groupSelect.innerHTML += `<option value="${group.name_en}">${group.name_en}</option>`;
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
            color: #0f172a !important;
            min-height: 150px;
        }

        .ck.ck-toolbar {
            background-color: #eff6ff !important;
            border: 1px solid #cbd5e1 !important;
        }

        .ck.ck-button {
            color: #334155 !important;
        }
    </style>
@endpush

