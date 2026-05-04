@extends('backend.layout.app')

@section('title', 'Pages')
@section('page-title', 'Pages')
@section('page-subtitle', 'Manage CMS Pages')

@section('content')

<div class="space-y-6">

    {{-- HEADER ACTION --}}
    <div class="flex justify-end">
        <a href="{{ route('admin.pages.create') }}"
           class="px-4 py-2 bg-orange-500 text-white rounded-xl hover:bg-orange-600">
            + Create Page
        </a>
    </div>

    {{-- TABLE CARD --}}
    <div class="bg-gray-900 border border-gray-800 rounded-xl overflow-hidden mt-4">

        <div class="overflow-x-auto">

            <table class="w-full text-sm text-left text-gray-300">

                <thead class="text-xs text-gray-400 border-b border-gray-800">
                    <tr>
                        <th class="px-4 py-3">Slug</th>
                        <th class="px-4 py-3">Type</th>
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Subtitle</th>
                        <th class="px-4 py-3">Image</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($pages as $page)

                        <tr class="border-b border-gray-800 hover:bg-gray-800/40">

                            {{-- SLUG --}}
                            <td class="px-4 py-3 text-orange-400 font-medium">
                                {{ $page->slug }}
                            </td>

                            {{-- TYPE --}}
                            <td class="px-4 py-3 text-gray-300">
                                {{ $page->type ?? '-' }}
                            </td>

                            {{-- TITLE --}}
                            <td class="px-4 py-3 text-white">
                                {{ $page->title_en }}
                            </td>

                            {{-- SUBTITLE --}}
                            <td class="px-4 py-3 text-gray-400">
                                {{ Str::limit($page->subtitle_en, 40) }}
                            </td>

                            {{-- IMAGE --}}
                            <td class="px-4 py-3">
                                @if($page->featured_image)
                                    <img src="{{ asset('storage/' . $page->featured_image) }}"
                                         class="w-10 h-10 rounded object-cover border border-gray-700">
                                @else
                                    <span class="text-gray-500 text-xs">-</span>
                                @endif
                            </td>

                            {{-- STATUS --}}
                            <td class="px-4 py-3">
                                @if($page->is_active)
                                    <span class="text-green-400 text-xs">Active</span>
                                @else
                                    <span class="text-red-400 text-xs">Inactive</span>
                                @endif
                            </td>

                            {{-- ACTION --}}
                            <td class="px-4 py-3 text-center space-x-2">

                                <a href="{{ route('admin.pages.show', $page->id) }}"
                                   class="px-3 py-1 text-xs bg-gray-700 text-white rounded hover:bg-gray-600">
                                    View
                                </a>

                                <a href="{{ route('admin.pages.edit', $page->id) }}"
                                   class="px-3 py-1 text-xs bg-orange-500/20 text-orange-400 rounded hover:bg-orange-500/30">
                                    Edit
                                </a>

                                <button type="button"
                                        onclick="openDeleteModal('{{ route('admin.pages.destroy', $page->id) }}', '{{ $page->title_en }}')"
                                        class="px-3 py-1 text-xs bg-red-500/20 text-red-400 rounded hover:bg-red-500/30">
                                    Delete
                                </button>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-4 py-10 text-center text-gray-500">
                                No pages found
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- PAGINATION --}}
    <div>
        {{ $pages->links() }}
    </div>

     {{-- DELETE MODAL --}}
    @include('backend.components.destroy')

</div>

@endsection