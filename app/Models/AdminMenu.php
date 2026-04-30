<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    use HasFactory;

    public array $children_list = [];

    protected $fillable = [
        'parent_id', 'type', 'title', 'url', 'icon', 'order', 'roles_allowed', 'is_active'
    ];

    protected $casts = [
        'roles_allowed' => 'array',
        'is_active' => 'boolean',
    ];

    public function children()
    {
        return $this->hasMany(AdminMenu::class, 'parent_id')->orderBy('order');
    }

    public function parent()
    {
        return $this->belongsTo(AdminMenu::class, 'parent_id');
    }

    public static function getTreeForRole($role)
    {
        $allMenus = self::where('is_active', true)
            ->orderBy('order')
            ->get();

        $filtered = $allMenus->filter(function ($menu) use ($role) {
            $allowed = $menu->roles_allowed;
            if (empty($allowed)) return true;
            return in_array($role, $allowed);
        });

        // build tree
        $tree = [];
        $items = [];
        foreach ($filtered as $menu) {
            $menu->children_list = [];
            $items[$menu->id] = $menu;
        }

        foreach ($items as $menu) {
            if ($menu->parent_id && isset($items[$menu->parent_id])) {
                $items[$menu->parent_id]->children_list[] = $menu;
            } else {
                $tree[] = $menu;
            }
        }

        return $tree;
    }
}
