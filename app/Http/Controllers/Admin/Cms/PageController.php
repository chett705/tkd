<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(20);

        return view('backend.page.cms.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('backend.page.cms.pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'slug'             => 'required|string|max:255|unique:pages,slug',
            'type'             => 'nullable|string|max:255',
            'title_en'         => 'required|string|max:255',
            'title_km'         => 'nullable|string|max:255',
            'subtitle_en'      => 'nullable|string|max:255',
            'subtitle_km'      => 'nullable|string|max:255',
            'content_en'       => 'nullable|string',
            'content_km'       => 'nullable|string',
            'featured_image'   => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:4096',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords'    => 'nullable|string',
            'is_active'        => 'nullable|boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            $data['featured_image'] = $request->file('featured_image')->store('pages', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);

        Page::create($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page created.');
    }

    public function show(string $id)
    {
        $page = Page::findOrFail($id);

        return view('backend.page.cms.pages.show', compact('page'));
    }

    public function edit(string $id)
    {
        $page = Page::findOrFail($id);

        return view('backend.page.cms.pages.create', compact('page'));
    }

    public function update(Request $request, string $id)
    {
        $page = Page::findOrFail($id);

        $data = $request->validate([
            'slug'             => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'type'             => 'nullable|string|max:255',
            'title_en'         => 'required|string|max:255',
            'title_km'         => 'nullable|string|max:255',
            'subtitle_en'      => 'nullable|string|max:255',
            'subtitle_km'      => 'nullable|string|max:255',
            'content_en'       => 'nullable|string',
            'content_km'       => 'nullable|string',
            'featured_image'   => 'nullable|file|mimes:jpg,jpeg,png,gif,webp|max:4096',
            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords'    => 'nullable|string',
            'is_active'        => 'nullable|boolean',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($page->featured_image) {
                Storage::disk('public')->delete($page->featured_image);
            }
            $data['featured_image'] = $request->file('featured_image')->store('pages', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        $page->update($data);

        return redirect()->route('admin.pages.index')->with('success', 'Page updated.');
    }

    public function destroy(string $id)
    {
        $page = Page::findOrFail($id);

        if ($page->featured_image) {
            Storage::disk('public')->delete($page->featured_image);
        }

        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Page deleted.');
    }
}
