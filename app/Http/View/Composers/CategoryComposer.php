<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $mainCategories = Category::whereNull('parent_id')->orderBy('urutan')->get();
        $subCategories = Category::whereNotNull('parent_id')->orderBy('urutan')->get()->groupBy('parent_id');

        $view->with('main_categories', $mainCategories);
        $view->with('sub_categories_map', $subCategories);
    }
}
