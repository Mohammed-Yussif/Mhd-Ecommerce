<?php
 
namespace InnoShop\Common\Models\Category;

use InnoShop\Common\Models\BaseModel;

class Translation extends BaseModel
{
    protected $table = 'category_translations';

    protected $fillable = [
        'category_id', 'locale', 'name', 'content', 'meta_title', 'meta_description', 'meta_keywords',
    ];
}
