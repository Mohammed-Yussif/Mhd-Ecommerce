<?php
 
namespace InnoShop\Common\Repositories;

use InnoShop\Common\Models\OrderReturn;

class OrderReturnRepo extends BaseRepo
{
    protected string $model = OrderReturn::class;

    public function create($data): mixed
    {
        dd($data);
    }
}
