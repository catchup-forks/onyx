<?php namespace App\Components\Admin;

class Category{
    /**
     * @var array $responseData data that will be returned within the response.
     */
    private $responseData = ['test' => 'test'];

    public function listing(){
        if(request()->method() == 'POST'){
            // TODO return categories listing data.
        }
        return $this->responseData;
    }
}