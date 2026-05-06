<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\MenuGroup;
use Illuminate\Http\Request;

class MenuGroupController extends Controller
{
    public function index()
    {
        $groups = MenuGroup::orderBy('sort_order')->paginate(20);

        return view('Backend.page.cms.menu-groups.index', compact('groups'));
    }

    public function create()
    {
        return view('Backend.page.cms.menu-groups.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'slug'       => 'required|string|max:255|unique:menu_groups,slug',
            'name_en'    => 'required|string|max:255',
            'name_km'    => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active'  => 'boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active', true);

        MenuGroup::create($data);

        return redirect()->route('admin.menu-groups.index')->with('success', 'Menu group created.');
    }

    public function edit(string $id)
    {
        $group = MenuGroup::findOrFail($id);

        return view('Backend.page.cms.menu-groups.create', compact('group'));
    }

    public function update(Request $request, string $id)
    {
        $group = MenuGroup::findOrFail($id);

        $data = $request->validate([
            'slug'       => 'required|string|max:255|unique:menu_groups,slug,' . $group->id,
            'name_en'    => 'required|string|max:255',
            'name_km'    => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
            'is_active'  => 'sometimes|boolean',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $group->update($data);

        return redirect()->route('admin.menu-groups.index')->with('success', 'Menu group updated.');
    }

    public function destroy(string $id)
    {
        MenuGroup::findOrFail($id)->delete();

        return redirect()->route('admin.menu-groups.index')->with('success', 'Menu group deleted.');
    }
}

