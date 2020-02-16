<?php

namespace App\Admin\Repositories\Interfaces;

interface ArticleRepositoryInterface
{
    public function get();

    public function getById($id);

    public function getByContent($id);

    public function getByCategory($id);

    public function getByLanguage($id);

    public function paginate($perPage);
}
