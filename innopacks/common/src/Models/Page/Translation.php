<?php
 
namespace InnoShop\Common\Models\Page;

use InnoShop\Common\Models\BaseModel;

class Translation extends BaseModel
{
    protected $table = 'page_translations';

    protected $fillable = [
        'page_id', 'locale', 'title', 'content', 'template', 'meta_title', 'meta_description', 'meta_keywords',
    ];
}
