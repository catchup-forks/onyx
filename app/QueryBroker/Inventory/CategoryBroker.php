<?php namespace App\QueryBroker\Inventory;

use App\Models\Category;

class CategoryBroker{
    public function listing(){
        return Category::selectRaw('categories.*, COUNT(pc.category_id) AS products_count, COUNT(ic.category_id) AS items_count')->with([
            'locales' => function($locale){ $locale->where('locale', \App::getLocale()); }, 'ancestors'
        ])->leftJoin('product_categories AS pc', 'categories.id', '=', 'pc.category_id')->leftJoin('item_categories AS ic', 'categories.id', '=', 'ic.category_id')->groupBy('categories.id');
    }

    public function autocomplete(){
        return Category::select(['id', 'parent_id'])->with('locales', 'ancestors')->whereHas('locales', function($locale){
            $locale->where('name', 'LIKE', '%'.request()->input('query').'%');
        });
    }
}