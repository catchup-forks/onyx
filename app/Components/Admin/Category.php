<?php namespace App\Components\Admin;

use App\Components\Component;
use App\QueryBroker\QueryBroker;
use Datatables, Carbon\Carbon;

class Category extends Component{
    public function listing(){
        if(request()->method() == 'POST')
            $this->responseData = Datatables::of(QueryBroker::make('Inventory\CategoryBroker@listing'))
                ->addColumn('select', '<input type="checkbox" name="select_{{$id}}">')
                ->addColumn('action', '<div class="btn btn-sm btn-outline-primary" data-id="{{$id}}"><i class="material-icons">edit</i></div>')
				->addColumn('for', function($category){
					switch($category->type){
						case CATEGORY_ITEMS: return trans('admin/category.listing.items');
						case CATEGORY_PRODUCTS: return trans('admin/category.listing.products');
						default: return trans('admin/category.listing.both');
					}
				})
				->addColumn('full_name', function($category){
                    $categoryName = $category->locales->first()->name;
                    while(!is_null($category = $category->ancestors)){
                        $categoryName = $category->locales->first()->name.' <span class="material-icons">chevron_right</span> '.$categoryName;
                    }
                    return $categoryName;
                })->editColumn('updated_at', function($category){
                	return Carbon::createFromFormat('Y-m-d H:i:s', $category->updated_at)->format('d/m/Y h:i A');
				})->rawColumns(['select', 'action', 'full_name'])->make(true)->original;
        return $this->responseData;
    }
}