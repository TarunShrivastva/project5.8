<?php

namespace App\Admin\Repositories\Interfaces;

interface ArticleRepositoryInterface
{
    public function all();

    public function getById($id);
}
