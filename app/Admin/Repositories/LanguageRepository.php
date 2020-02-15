<?php

namespace App\Admin\Repositories;

use App\Admin\Models\Language;
use App\Admin\Repositories\Interfaces\LanguageRepositoryInterface;

class LanguageRepository implements LanguageRepositoryInterface
{
    
    public function all()
    {
        return Language::all();
    }

    public function IdByLanguageAlias($alias)
    {
        try{
        	$languageID = Language::where('alias', $alias)->firstOrFail('id')->toArray();
        	return isset($languageID['id'])?$languageID['id']:0;
   		}catch(Exception $exception){
   			$languageID = Language::where('alias', 'en')->firstOrFail('id')->toArray();
        	return isset($languageID['id'])?$languageID['id']:0;
   		}
    }
}