<?php

namespace App\Admin\Repositories\Interfaces;

interface ContentRepositoryInterface
{
    public function all();

    public function getById($id);

    public function IdByContentTypeName($content);
}
