<?php
 
namespace InnoShop\Common\Models\Attribute\Value;

use InnoShop\Common\Models\BaseModel;

class Translation extends BaseModel
{
    protected $table = 'attribute_value_translations';

    protected $fillable = [
        'attribute_value_id', 'locale', 'name',
    ];
}
