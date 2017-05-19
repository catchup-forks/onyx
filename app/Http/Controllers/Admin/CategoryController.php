<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CategoryController extends Controller{
    public function getList(){
        $this->loadComponentsData('Admin\Category@listing');
        return $this->respond('admin.components-container', ['title' => trans('admin/category.listing.title')]);
    }

    public function postList(){
        return response()->json($this->loadAjaxData('Admin\Category@listing'));
    }

    public function getAdd(){
        $this->loadComponentsData('Admin\Category@add');
        return $this->respond('admin.components-container', ['title' => trans('admin/category.add_edit.add'), 'form' => 'add', 'image' => asset('resources/assets/img/placeholder.png')]);
    }

    public function postAdd(){
        $this->loadComponentsData('Admin\Category@add');
        if($this->data['admin.category.add']['success'] == true)
            $response = ['status' => 1, 'message' => trans('admin/category.add_edit.success')];
        else{
            \Log::error($this->data['admin.category.add']['error']);
            $response = ['status' => 0, 'message' => trans('admin/category.add_edit.failure')];
        }
        return redirect('admin/category/list')->with($response);
    }

    public function postAutocomplete(){
        return response()->json($this->loadAjaxData('Admin\Category@autocomplete'));
    }
}