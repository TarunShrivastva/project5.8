<?php

namespace App\Admin\Repositories\Interfaces;

interface CategoryRepositoryInterface
{
    public function all();

    public function getById($id);

    public function IdByCategoryName($id);
}
