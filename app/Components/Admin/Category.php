<?php namespace App\Components\Admin;

use App\Components\Component;
use App\QueryBroker\QueryBroker;
use Datatables, Carbon\Carbon;
use App\Models\Category as CategoryModel;

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
                    $categoryName = $category->locale->first()->name;
                    while(!is_null($category = $category->ancestors)){
                        $categoryName = $category->locale->first()->name.' <span class="material-icons">chevron_right</span> '.$categoryName;
                    }
                    return $categoryName;
                })->editColumn('updated_at', function($category){
                	return Carbon::createFromFormat('Y-m-d H:i:s', $category->updated_at)->format('d/m/Y h:i A');
				})->rawColumns(['select', 'action', 'full_name'])->make(true)->original;
        return $this->responseData;
    }

    public function add(){
        if(request()->method() == 'POST'){
            try{
                $image = [];
                if(request()->hasFile('image')){
                    $imageFile = request()->file('image');
                    $filename = md5(uniqid('c').time()).'.'.$imageFile->getClientOriginalExtension();
                    \Image::make($imageFile)->resize(config('image-size.category.width'), config('image-size.category.height'))->save(storage_path('app/images/category')."/$filename");
                    $image['image'] = $filename;
                }
                $category = CategoryModel::create(request()->only(['parent_id', 'type', 'position']) + $image);
                foreach(config('locales.available') as &$locale){
                    if(!empty($name = request()->input("name.$locale[code]")))
                        $category->locales()->create(compact('name') + [
                            'description' => request()->input("description.$locale[code]"),
                            'locale' => $locale['code']
                        ]);
                }
                $this->responseData['success'] = true;
            } catch(\Exception $e){
                $this->responseData = [
                    'success' => false,
                    'error' => $e->getMessage()
                ];
            }
        }
        return $this->responseData;
    }

    public function autocomplete(){
        $query = request()->input('query');
        if(strlen($query) > 2){
            $categories = QueryBroker::make('Inventory\CategoryBroker@autocomplete')->take(request()->input('limit', 10))->get();
            $results = [];
            foreach($categories as &$category){
                foreach($category->locales as &$locale){
                    $categoryName = $locale->name;
                    if(strpos(strtolower($categoryName), strtolower($query)) === false)
                        continue;
                    $parentCategory = $category;
                    while(!is_null($parentCategory = $parentCategory->ancestors)){
                        $categoryName = $parentCategory->locales()->where('locale', $locale->locale)->first()->name.' > ' .$categoryName;
                    }
                    $results[] = ['id' => $category->id, 'name' => $categoryName];
                }
            }
        } else
            $results = [];
        return compact('results');
    }
}