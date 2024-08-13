<?php
 
namespace InnoShop\Common\Models\Product;

use InnoShop\Common\Models\BaseModel;

class Image extends BaseModel
{
    protected $table = 'product_images';

    protected $fillable = ['path', 'position'];
}
