<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminMenu;
use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    public function index()
    {
        $menus = AdminMenu::whereNull('parent_id')->orderBy('order')->with('children')->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:header,menu',
            'roles_allowed' => 'nullable|array',
        ]);

        $data = $request->except('_token');
        if (!isset($data['is_active'])) $data['is_active'] = false;
        
        AdminMenu::create($data);

        return back()->with('success', 'Menu created successfully.');
    }

    public function update(Request $request, AdminMenu $menu)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:header,menu',
            'roles_allowed' => 'nullable|array',
        ]);

        $data = $request->except(['_token', '_method']);
        $data['is_active'] = $request->has('is_active');
        $data['roles_allowed'] = $request->roles_allowed ?? [];

        $menu->update($data);

        return back()->with('success', 'Menu updated successfully.');
    }

    public function reorder(Request $request)
    {
        $menus = json_decode($request->menu_structure, true);
        if (!$menus) return back()->with('error', 'Invalid structure format');

        $this->updateMenuHierarchy($menus, null);

        return back()->with('success', 'Menu structure updated successfully.');
    }

    private function updateMenuHierarchy($menus, $parentId)
    {
        foreach ($menus as $order => $item) {
            AdminMenu::where('id', $item['id'])->update([
                'parent_id' => $parentId,
                'order' => $order + 1
            ]);

            if (isset($item['children'])) {
                $this->updateMenuHierarchy($item['children'], $item['id']);
            }
        }
    }

    public function destroy(AdminMenu $menu)
    {
        $menu->delete();
        return back()->with('success', 'Menu deleted successfully.');
    }
}
