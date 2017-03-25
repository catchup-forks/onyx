<?php namespace App\QueryBroker\Inventory;

use App\Models\Category;

class CategoryBroker{
    public function listing(){
        return Category::selectRaw('categories.*, COUNT(p.category_id) AS products_count, COUNT(i.category_id) AS items_count')->with([
            'locales' => function($locale){ $locale->where('locale', \App::getLocale()); }, 'ancestors'
        ])->leftJoin('products AS p', 'categories.id', '=', 'p.category_id')->leftJoin('items AS i', 'categories.id', '=', 'i.category_id')->groupBy('categories.id');
    }
}