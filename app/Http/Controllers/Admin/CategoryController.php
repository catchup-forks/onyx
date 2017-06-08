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
        return $this->respond('admin.components-container', ['title' => trans('admin/category.add_edit.add'), 'form' => 'add']);
    }

    public function postAdd(){
        $this->loadComponentsData('Admin\Category@add');
        if($this->data['admin.category.add']['success'] == true)
            $response = ['status' => 1, 'message' => trans('admin/category.add.success')];
        else{
            \Log::error($this->data['admin.category.add']['error']);
            $response = ['status' => 0, 'message' => trans('admin/category.add.failure')];
        }
        return redirect('admin/category/list')->with($response);
    }

    public function getEdit(){
        $this->loadComponentsData('Admin\Category@edit');
        return $this->respond('admin.components-container', ['title' => trans('admin/category.add_edit.edit'), 'form' => 'edit']);
    }

    public function postEdit(){
        $this->loadComponentsData('Admin\Category@edit');
        if($this->data['admin.category.edit']['success'] == true)
            $response = ['status' => 1, 'message' => trans('admin/category.edit.success')];
        else{
            \Log::error($this->data['admin.category.edit']['error']);
            $response = ['status' => 0, 'message' => trans('admin/category.edit.failure')];
        }
        return redirect('admin/category/list')->with($response);
    }

    public function postAutocomplete(){
        return response()->json($this->loadAjaxData('Admin\Category@autocomplete'));
    }
}