<?php
 
namespace InnoShop\Common\Models;

class OrderReturn extends BaseModel
{
    protected $table = 'order_returns';

    protected $fillable = [
        'customer_id', 'order_id', 'order_number', 'number', 'name', 'email', 'telephone',
    ];
}
