@extends('backend.layout.app')

@section('title', 'Create Setting')
@section('page-title', 'Create Setting')
@section('page-subtitle', 'Add new system setting')

@section('content')

<div class="max-w-full mx-auto">

    <form action="{{ route('admin.settings.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-gray-900 border border-gray-800 rounded-xl p-6 space-y-6">

        @csrf

        {{-- GROUP + KEY --}}
        <div class="grid grid-cols-2 gap-4">

            {{-- GROUP --}}
            <div>
                <label class="text-xs text-gray-400">Group Name</label>

                <select name="group_name"
                        class="w-full mt-2 bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">

                    <option value="">Select Group</option>

                    @foreach($groups as $group)
                        <option value="{{ $group }}">{{ $group }}</option>
                    @endforeach

                </select>
            </div>

            {{-- KEY --}}
            <div>
                <label class="text-xs text-gray-400">Key Name</label>

                <input type="text"
                       name="key_name"
                       placeholder="site_logo, phone, email..."
                       class="w-full mt-2 bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">
            </div>

        </div>

        {{-- TYPE + SORT --}}
        <div class="grid grid-cols-2 gap-4">

            {{-- TYPE --}}
            <div>
                <label class="text-xs text-gray-400">Type</label>

                <select name="type"
                        class="w-full mt-2 bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">

                    <option value="">Select Type</option>

                    @foreach($types as $type)
                        <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                    @endforeach

                </select>
            </div>

            {{-- SORT --}}
            <div>
                <label class="text-xs text-gray-400">Sort Order</label>

                <input type="number"
                       name="sort_order"
                       placeholder="0"
                       class="w-full mt-2 bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">
            </div>

        </div>


         <div class="grid grid-cols-2 gap-4">
            {{-- VALUE EN ONLY --}}
            <div>
                <label class="text-xs text-gray-400">Value</label>

                <input type="text"
                    name="value_en"
                    placeholder="Setting value"
                    class="w-full mt-2 bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">
            </div>

            <div>
                <label class="text-xs text-gray-400">Status</label>

                <select name="is_active"
                        class="w-full mt-2 mb-4 bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">

                    <option value="1">Active</option>
                    <option value="0">Inactive</option>

                </select>
            </div>
         </div>

        


        {{-- FILE --}}
        <div>
            <label class="text-xs text-gray-400">Upload File</label>

            <input type="file"
                   name="file"
                   class="w-full mt-2 bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700">
        </div>

        {{-- STATUS --}}
        <div>
            <label class="text-xs text-gray-400">Status</label>

            <select name="is_active"
                    class="w-full mt-2 mb-4 bg-gray-800 text-gray-400 p-2 rounded-xl border border-gray-700 focus:border-orange-500 outline-none">

                <option value="1">Active</option>
                <option value="0">Inactive</option>

            </select>
        </div>

        {{-- ACTION --}}
        <div class="flex justify-end gap-3 pt-4 border-t border-gray-800 ">

            <a href="{{ route('admin.settings.index') }}"
               class="px-5 py-2 bg-gray-800 text-white rounded-xl border border-gray-700 hover:bg-gray-700">
                Cancel
            </a>

            <button class="px-5 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600">
                Create Setting
            </button>

        </div>

    </form>

</div>

@endsection