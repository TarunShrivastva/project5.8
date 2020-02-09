<?php

namespace App\Admin\Repositories;

use App\Admin\Models\Article;
use App\Admin\Repositories\Interfaces\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface
{
    
    public function all()
    {
        return Article::all();
    }

    public function getById($id)
    {
        return Article::where('id', $id)->get();
    }
}