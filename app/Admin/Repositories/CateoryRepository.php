<?php

namespace App\Admin\Repositories;

use App\Admin\Models\Category;
use App\Admin\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Exceptions\NullException;
use Exception;

class CategoryRepository implements CategoryRepositoryInterface
{
    
    public function all()
    {
        return Category::all();
    }

    public function getById($id)
    {
        return Category::where('id', $id)->get();
    }

    public function IdByCategoryName($category)
    {
    	try{
	    	$categoryID = Category::where('name', $category)->where('status',1)->firstOrFail('id')->toArray();
	        return isset($categoryID['id'])?$categoryID['id']:0;
    	}catch(Exception $exception){
    		// $response = $this->renderException($request, $exception);
    		throw new NullException($exception);
    	}
    }	
}