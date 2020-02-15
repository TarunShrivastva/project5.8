<?php

namespace App\Admin\Repositories;

use App\Admin\Repositories\Interfaces\ContentRepositoryInterface;
use App\Admin\Models\Contenttype as Content;
use Exception;

class ContentRepository implements ContentRepositoryInterface
{
    
    public function all()
    {
        return Content::all();
    }

    public function getById($id)
    {
        return Content::where('id', $id)->get();
    }

    public function IdByContentTypeName($content)
    {
        try{
            $contentID = Content::where('content_type_name', $content)->where('status','1')->firstOrFail('id')->toArray();
            return isset($contentID['id'])?$contentID['id']:0;
        }catch(Exception $exception){
            return 0;
        }
    }
}