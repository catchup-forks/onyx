<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class CategoryController extends Controller{
    public function getList(){
        $this->loadComponentsData('Admin\Category@listing');
        return $this->respond('admin.category', ['title' => 'Categories Listing']);
    }

    public function postList(){
        return response()->json($this->loadAjaxData('Admin\Category@listing'));
    }
}