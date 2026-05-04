@extends('backend.layout.app')

@section('title', 'Settings')
@section('page-title', 'Settings')
@section('page-subtitle', 'Manage system setting')

@section('content')


{{-- FILTER --}}
<form method="GET"
      class="bg-gray-900 border border-gray-800 p-4 rounded-xl mb-4">

    <div class="flex flex-wrap items-center justify-between gap-3">

        {{-- LEFT SIDE FILTERS --}}
        <div class="flex flex-wrap gap-3 items-center">

            {{-- GROUP --}}
            <select name="group"
                    class="bg-gray-800 text-gray-400 border border-gray-800 rounded-xl px-3 py-2 text-sm focus:border-orange-500 outline-none">
                <option value="">All Groups</option>
                @foreach($allGroups as $group)
                    <option value="{{ $group }}" {{ request('group') == $group ? 'selected' : '' }}>
                        {{ $group }}
                    </option>
                @endforeach
            </select>

            {{-- KEY --}}
            <input type="text"
                   name="key"
                   value="{{ request('key') }}"
                   placeholder="Search key..."
                   class="bg-gray-800 text-gray-400 border border-gray-800 rounded-xl px-3 py-2 text-sm focus:border-orange-500 outline-none">

            {{-- TYPE --}}
            <select name="type"
                    class="bg-gray-800 text-gray-400 border border-gray-800 rounded-xl px-3 py-2 text-sm focus:border-orange-500 outline-none">
                <option value="">All Types</option>
                <option value="text" {{ request('type') == 'text' ? 'selected' : '' }}>Text</option>
                <option value="image" {{ request('type') == 'image' ? 'selected' : '' }}>Image</option>
                <option value="textarea" {{ request('type') == 'textarea' ? 'selected' : '' }}>Textarea</option>
                <option value="phone" {{ request('type') == 'phone' ? 'selected' : '' }}>Phone</option>
                <option value="email" {{ request('type') == 'email' ? 'selected' : '' }}>Email</option>
            </select>

            {{-- STATUS --}}
            <select name="status"
                    class="bg-gray-800 text-gray-400 border border-gray-800 rounded-xl px-3 py-2 text-sm focus:border-orange-500 outline-none">
                <option value="">All Status</option>
                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>

            {{-- FILTER BUTTON --}}
            <button class="bg-orange-500 text-white px-4 py-2 rounded-xl text-sm hover:bg-orange-600 transition">
                Filter
            </button>

            {{-- RESET --}}
            <a href="{{ route('admin.settings.index') }}"
               class="bg-gray-800 text-gray-400 border border-gray-800 px-4 py-2 rounded-xl text-sm hover:bg-gray-700 transition">
                Reset
            </a>

        </div>

        {{-- RIGHT SIDE CREATE BUTTON --}}
        <div class="flex items-center">

            <a href="{{ route('admin.settings.create') }}"
               class="inline-flex items-center gap-2 bg-orange-500 text-white px-4 py-2 rounded-xl text-sm hover:bg-orange-600 transition">

                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 4v16m8-8H4"/>
                </svg>

                Create Setting
            </a>

        </div>

    </div>

</form>

{{-- LIST --}}
<div class="space-y-4">

    @if($settings->isEmpty())
        <div class="bg-gray-900 border border-gray-800 rounded-xl px-6 py-10 text-center text-gray-500 text-sm">
            No settings found matching your filters.
        </div>
    @endif

    @foreach($settings as $group => $items)

        {{-- GROUP CARD --}}
        <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden">

            {{-- HEADER --}}
            <div class="px-4 py-3 border-b border-gray-800">
                <h2 class="text-white font-semibold capitalize">
                    {{ $group }}
                </h2>
            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left text-gray-300">

                    <thead class="text-xs text-gray-400 border-b border-gray-800 bg-gray-900">
                        <tr>
                            <th class="px-4 py-3">Key</th>
                            <th class="px-4 py-3">Value EN</th>
                            <th class="px-4 py-3">Value KH</th>
                            <th class="px-4 py-3 text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($items as $setting)

                            <tr class="border-b border-gray-800 hover:bg-gray-800/40">

                                {{-- KEY --}}
                                <td class="px-4 py-3 text-white">
                                    {{ $setting->key_name }}
                                </td>

                                {{-- IMAGE TYPE --}}
                                @if($setting->type === 'image')

                                    <td class="px-4 py-3" colspan="2">

                                        <div class="flex items-center gap-4">

                                            {{-- CURRENT IMAGE --}}
                                            @if($setting->value_en)
                                                <img src="{{ asset('storage/' . $setting->value_en) }}"
                                                     class="h-14 w-auto max-w-[120px] rounded-xl border border-gray-800 object-contain bg-gray-800 p-1">
                                            @else
                                                <div class="h-14 w-24 rounded-xl border border-gray-800 flex items-center justify-center text-gray-600 text-xs bg-gray-800">
                                                    No image
                                                </div>
                                            @endif

                                            {{-- UPLOAD --}}
                                            <label class="flex flex-col gap-1 cursor-pointer">
                                                <span class="text-xs text-gray-500">Upload new image</span>

                                                <input type="file"
                                                       form="form-{{ $setting->id }}"
                                                       name="file"
                                                       accept="image/*"
                                                       onchange="previewImage(this, 'preview-{{ $setting->id }}')"
                                                       class="text-sm text-gray-400 file:mr-3 file:py-1 file:px-3 file:rounded-xl file:border-0 file:bg-orange-500/20 file:text-orange-400 hover:file:bg-orange-500/30 cursor-pointer">
                                            </label>

                                            {{-- PREVIEW --}}
                                            <img id="preview-{{ $setting->id }}"
                                                 class="hidden h-14 w-auto max-w-[120px] rounded-xl border border-orange-500/40 object-contain bg-gray-800 p-1">

                                        </div>

                                    </td>

                                @else

                                    {{-- VALUE EN --}}
                                    <td class="px-4 py-3">
                                        <input type="text"
                                               form="form-{{ $setting->id }}"
                                               name="value_en"
                                               value="{{ $setting->value_en }}"
                                               class="w-full bg-gray-800 text-gray-400 rounded-xl px-2 py-2 border border-gray-800 focus:border-orange-500 outline-none">
                                    </td>

                                    {{-- VALUE KH --}}
                                    <td class="px-4 py-3">
                                        <input type="text"
                                               form="form-{{ $setting->id }}"
                                               name="value_km"
                                               value="{{ $setting->value_km }}"
                                               class="w-full bg-gray-800 text-gray-400 rounded-xl px-2 py-2 border border-gray-800 focus:border-orange-500 outline-none">
                                    </td>

                                @endif

                                {{-- ACTION --}}
                                <td class="px-4 py-3 text-center">

                                    <form id="form-{{ $setting->id }}"
                                          action="{{ route('admin.settings.quick-update', $setting->id) }}"
                                          method="POST"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <button class="px-3 py-1 text-xs bg-green-500/20 text-green-400 rounded-xl border border-green-500/20 hover:bg-green-500/30 transition">
                                            Save
                                        </button>

                                          <button type="button"
                                            onclick="openDeleteModal(
                                                '{{ route('admin.settings.destroy', $setting->id) }}',
                                                '{{ $setting->section_key }}'
                                            )"
                                            class="px-3 py-1 text-xs bg-red-500/20 text-red-400 rounded hover:bg-red-500/30">
                                            Delete
                                        </button>

                                    </form>

                                  

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    @endforeach

   @include('backend.components.destroy')


</div>

{{-- SCRIPT --}}
<script>
function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection