<?php

namespace App\Admin\Repositories;

use App\Admin\Models\Article;
use App\Admin\Repositories\Interfaces\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface
{
    protected $language, $content, $category, $articles = array();

    public function getById($id)
    {
        return Article::where('status','1')->findOrFail($id);
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
        	foreach ($properties as $key => $property) {
        		if(!empty($property))
    				$q->where($property[0],'=',$property[1]);
        	}
        })->get();
    	return $this->articles;
    }
}