<?php

namespace App\Admin\Repositories;

use App\Admin\Models\Article;
use App\Admin\Repositories\Interfaces\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface
{
    protected $language, $content, $category, $articles = array();

    protected $perPage;

    public function getById($id)
    {
        $properties = get_object_vars($this);
        $this->articles = Article::where('status','1')->where(function($q) use ($properties){
        	foreach ($properties as $key => $property){
				if(isset($property[1]) && $property[1] !==0)
    				$q->where($property[0],'=',$property[1]);
        	}
        })->findOrFail($id);
    	return $this->articles;
    }

    public function getByContent($id)
    {
        $this->content = ['content_id', $id];
        return $this;
    }

    public function getByCategory($id)
    {
        $this->category = ['category_id', $id];
        return $this;
    }

    public function getByLanguage($id)
    {
        $this->language = ['language_id', $id];
        return $this;
    }

    
    public function get()
    {
        $properties = get_object_vars($this);
        $this->articles = Article::where('status','1')->where(function($q) use ($properties){
        	foreach ($properties as $key => $property){
				if(isset($property[1]) && $property[1] !==0)
    				$q->where($property[0],'=',$property[1]);
        	}
        })->get();
    	return $this->articles;
    }

	public function paginate($perPage = 10)
    {
        $properties = get_object_vars($this);
        
        $this->articles = Article::where('status','1')->where(function($q) use ($properties){
        	foreach ($properties as $key => $property){
				if(isset($property[1]) && $property[1] !==0)
    				$q->where($property[0],'=',$property[1]);
        	}
        })->paginate($perPage);
    	return $this->articles;
    }    

}