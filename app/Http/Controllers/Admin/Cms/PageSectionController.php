<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\PageSection;
use App\Models\Cms\MenuGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageSectionController extends Controller
{
    public function index(Request $request)
    {
        $query = PageSection::query();

        // FILTER: PAGE
        if ($request->page) {
            $query->where('page', $request->page);
        }

        // FILTER: SECTION KEY
        if ($request->section_key) {
            $query->where('section_key', $request->section_key);
        }

        // SEARCH
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('title_en', 'like', '%' . $request->search . '%')
                ->orWhere('section_key', 'like', '%' . $request->search . '%');
            });
        }

        // STATUS
        if ($request->status !== null && $request->status !== '') {
            $query->where('is_active', $request->status);
        }

        // RESULT
        $sections = $query->orderBy('page')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('page');

        // FIX: get pages correctly
        $pages = PageSection::select('page')
            ->distinct()
            ->pluck('page');

        $sectionKeys = PageSection::select('section_key')
            ->distinct()
            ->pluck('section_key');

        return view('backend.page.cms.page-sections.index', compact(
            'sections',
            'pages',
            'sectionKeys'
        ));
    }

    private function mediaTypes()
    {
        return [
            'image' => 'Image',
            'video' => 'Video',
            'youtube' => 'YouTube',
        ];
    }

    public function create()
    {
        $pages = MenuGroup::orderBy('sort_order')->get();

        $mediaTypes = [
            'image' => 'Image',
            'video' => 'Video',
            'youtube' => 'YouTube',
        ];

        return view('backend.page.cms.page-sections.create', compact(
            'pages',
            'mediaTypes'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'page'            => 'required|string|max:255',
            'section_key'     => 'required|string|max:255',
            'title_en'        => 'nullable|string|max:255',
            'title_km'        => 'nullable|string|max:255',
            'subtitle_en'     => 'nullable|string|max:255',
            'subtitle_km'     => 'nullable|string|max:255',
            'description_en'  => 'nullable|string',
            'description_km'  => 'nullable|string',
            'button_text_en'  => 'nullable|string|max:255',
            'button2_text_en'  => 'nullable|string|max:255',
            'button_text_km'  => 'nullable|string|max:255',
            'button2_text_km'  => 'nullable|string|max:255',
            'button_link_en'  => 'nullable|string|max:255',
            'button2_link_en'  => 'nullable|string|max:255',
            'button_link_km'  => 'nullable|string|max:255',
            'button2_link_km'  => 'nullable|string|max:255',
            'media_type'      => 'nullable|string|max:255',
            'media_url'       => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,mp4|max:20480',
            'sort_order'      => 'nullable|integer',
            'is_active'       => 'boolean',
        ]);

        if ($request->hasFile('media_url')) {
            $data['media_url'] = $request->file('media_url')->store('sections', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);

        PageSection::create($data);

        return redirect()->route('admin.page-sections.index')->with('success', 'Section created.');
    }

    public function show(string $id)
    {
         $section = PageSection::with('items')->findOrFail($id);

        return view('backend.page.cms.page-sections.show', compact('section'));
    }

    public function edit(string $id)
    {
        $section = PageSection::findOrFail($id);

        $pages = MenuGroup::orderBy('sort_order')->get();

        $mediaTypes = [
            'image' => 'Image',
            'video' => 'Video',
            'youtube' => 'YouTube',
        ];

        return view('backend.page.cms.page-sections.update', compact(
            'section',
            'pages',
            'mediaTypes'
        ));
    }

    public function update(Request $request, string $id)
    {
        $section = PageSection::findOrFail($id);

        $data = $request->validate([
            'page'            => 'required|string|max:255',
            'section_key'     => 'required|string|max:255',
            'title_en'        => 'nullable|string|max:255',
            'title_km'        => 'nullable|string|max:255',
            'subtitle_en'     => 'nullable|string|max:255',
            'subtitle_km'     => 'nullable|string|max:255',
            'description_en'  => 'nullable|string',
            'description_km'  => 'nullable|string',
            'button_text_en'  => 'nullable|string|max:255',
            'button2_text_en'  => 'nullable|string|max:255',
            'button_text_km'  => 'nullable|string|max:255',
            'button2_text_km'  => 'nullable|string|max:255',
            'button_link_en'  => 'nullable|string|max:255',
            'button2_link_en'  => 'nullable|string|max:255',
            'button_link_km'  => 'nullable|string|max:255',
            'button2_link_km'  => 'nullable|string|max:255',
            'media_type'      => 'nullable|string|max:255',
            'media_url'       => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,mp4|max:20480',
            'sort_order'      => 'nullable|integer',
            'is_active'       => 'boolean',
        ]);

        if ($request->hasFile('media_url')) {
            if ($section->media_url) {
                Storage::disk('public')->delete($section->media_url);
            }
            $data['media_url'] = $request->file('media_url')->store('sections', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        $section->update($data);

        return redirect()->route('admin.page-sections.index')->with('success', 'Section updated.');
    }

    public function destroy(string $id)
    {
        $section = PageSection::findOrFail($id);

        if ($section->media_url) {
            Storage::disk('public')->delete($section->media_url);
        }

        $section->delete();

        return redirect()->route('admin.page-sections.index')->with('success', 'Section deleted.');
    }
}
