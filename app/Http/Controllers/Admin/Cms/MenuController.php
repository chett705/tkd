<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Cms\Menu;
use App\Models\Cms\MenuGroup;
use Illuminate\Http\Request;

class MenuController extends Controller
{
  public function index()
    {
        $groups = MenuGroup::with(['menus' => function ($q) {
            $q->orderBy('sort_order');
        }])->orderBy('sort_order')->get();

        return view('backend.page.cms.menus.index', compact('groups'));
    }

    public function create()
    {
        $groups = MenuGroup::where('is_active', true)->orderBy('sort_order')->get();

        return view('backend.page.cms.menus.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_group_id' => 'nullable|exists:menu_groups,id',
            'slug'          => 'required|string|max:255|unique:menus,slug',
            'name_en'       => 'required|string|max:255',
            'name_km'       => 'nullable|string|max:255',
            'route'         => 'nullable|string|max:255',
            'sort_order'    => 'nullable|integer',
            'is_active'     => 'nullable|boolean',
        ]);

        $data['is_active']     = $request->boolean('is_active', true);
        $data['menu_group_id'] = $request->filled('menu_group_id') ? $data['menu_group_id'] : null;
        $data['sort_order']    = $request->filled('sort_order') ? (int) $data['sort_order'] : 0;

        Menu::create($data);

        return redirect()->route('admin.menus.index')
            ->with('success', 'Menu item created.');
    }

   public function edit($id)
{
    $menu = Menu::findOrFail($id);
    $groups = MenuGroup::where('is_active', true)->get();

    return view('backend.page.cms.menus.create', compact('menu', 'groups'));
}

 
public function update(Request $request, string $id)
{
    $menu = Menu::findOrFail($id);

    $data = $request->validate([
        'menu_group_id' => 'nullable|exists:menu_groups,id',
        'slug'          => 'required|string|max:255|unique:menus,slug,' . $menu->id,
        'name_en'       => 'required|string|max:255',
        'name_km'       => 'nullable|string|max:255',
        'route'         => 'nullable|string|max:255',
        'sort_order'    => 'nullable|integer',
        'is_active'     => 'sometimes|boolean',
    ]);

    // checkbox handling
    $data['is_active'] = $request->boolean('is_active');

    // optional: auto-update slug if empty or based on name
    if (!$request->filled('slug')) {
        $data['slug'] = Str::slug($data['name_en']);
    }

    // auto sort fallback (optional safe guard)
    if (!isset($data['sort_order'])) {
        $data['sort_order'] = $menu->sort_order;
    }

    $menu->update($data);

    return redirect()
        ->route('admin.menus.index')
        ->with('success', 'Menu updated successfully.');
}

    public function destroy(string $id)
    {
        Menu::findOrFail($id)->delete();

        return redirect()->route('admin.menus.index')->with('success', 'Menu item deleted.');
    }
}
