<?php
 
namespace InnoShop\Common\Models\Order;

use InnoShop\Common\Models\BaseModel;

class History extends BaseModel
{
    protected $table = 'order_histories';

    protected $fillable = [
        'order_id', 'status', 'notify', 'comment',
    ];
}
