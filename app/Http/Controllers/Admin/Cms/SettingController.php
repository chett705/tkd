<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class SettingController extends Controller
{


    // ─────────────────────────────
    // INDEX
    // ─────────────────────────────
    public function index(Request $request)
    {
        $query = Setting::query();

        // FILTER: group
        if ($request->filled('group')) {
            $query->where('group_name', $request->group);
        }

        // FILTER: key name search
        if ($request->filled('key')) {
            $query->where('key_name', 'like', '%' . $request->key . '%');
        }

        // FILTER: type
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        // FILTER: status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status);
        }

        $settings = $query->orderBy('group_name')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('group_name');

        // All groups for the filter dropdown (unfiltered)
        $allGroups = Setting::select('group_name')->distinct()->orderBy('group_name')->pluck('group_name');

        return view('backend.page.cms.settings.index', compact('settings', 'allGroups'));
    }

    // ─────────────────────────────
    // QUICK INLINE UPDATE
    // ─────────────────────────────
    public function quickUpdate(Request $request, string $id)
    {
        $setting = Setting::findOrFail($id);

        $request->validate([
            'value_en' => 'nullable|string',
            'value_km' => 'nullable|string',
            'file'     => 'nullable|file|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('file')) {
            // Delete old image
            if ($setting->type === 'image' && $setting->value_en) {
                Storage::disk('public')->delete($setting->value_en);
            }

            $setting->update([
                'value_en' => $request->file('file')->store('settings', 'public'),
                'type'     => 'image',
            ]);
        } else {
            $setting->update([
                'value_en' => $request->value_en,
                'value_km' => $request->value_km,
            ]);
        }

        return back()->with('success', 'Setting updated successfully.');
    }

    // ─────────────────────────────
    // FULL UPDATE (EDIT PAGE)
    // ─────────────────────────────
    public function update(Request $request, string $id)
    {
        $setting = Setting::findOrFail($id);

        $data = $request->validate([
            'group_name' => 'required|string|max:255',
            'key_name'   => 'required|string|max:255',
            'value_en'   => 'nullable|string',
            'value_km'   => 'nullable|string',
            'type'       => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active'  => 'boolean',
            'file'       => 'nullable|file|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('file')) {
            if ($setting->type === 'image' && $setting->value_en) {
                Storage::disk('public')->delete($setting->value_en);
            }

            $data['value_en'] = $request->file('file')->store('settings', 'public');
            $data['type'] = 'image';
        }

        $data['is_active'] = $request->boolean('is_active');

        $setting->update($data);

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting updated successfully.');
    }


    public function create()
{
    $groups = Setting::select('group_name')
        ->distinct()
        ->pluck('group_name');

    $types = [
        'text',
        'image',
        'textarea',
        'phone',
        'email'
    ];

    return view('backend.page.cms.settings.create', compact('groups', 'types'));
}

    public function store(Request $request)
{
    $data = $request->validate([
        'group_name' => 'required|string|max:255',
        'key_name'   => 'required|string|max:255|unique:settings,key_name',
        'value_en'   => 'nullable|string',
        'value_km'   => 'nullable|string',
        'type'       => 'nullable|string|max:255',
        'sort_order' => 'nullable|integer',
        'is_active'  => 'boolean',
        'file'       => 'nullable|file|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
    ]);

    // IMAGE UPLOAD
    if ($request->hasFile('file')) {
        $data['value_en'] = $request->file('file')->store('settings', 'public');
        $data['type'] = 'image';
    }

    // DEFAULT STATUS
    $data['is_active'] = $request->boolean('is_active', true);

    Setting::create($data);

    return redirect()->route('admin.settings.index')
        ->with('success', 'Setting created successfully.');
}

public function destroy(string $id)
{
    $setting = Setting::findOrFail($id);

    // If it's an image, delete file from storage
    if ($setting->type === 'image' && $setting->value_en) {
        Storage::disk('public')->delete($setting->value_en);
    }

    // Delete database record
    $setting->delete();

    return redirect()->route('admin.settings.index')
        ->with('success', 'Setting deleted successfully.');
}
}
