<?php

namespace App\Admin\Repositories\Interfaces;

interface LanguageRepositoryInterface
{
    public function all();

    public function IdByLanguageAlias($id);
}
