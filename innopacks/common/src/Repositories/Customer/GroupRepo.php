<?php
 
namespace InnoShop\Common\Repositories\Customer;

use InnoShop\Common\Models\Customer\Group;
use InnoShop\Common\Repositories\BaseRepo;
use InnoShop\Common\Resources\CustomerGroupSimple;

class GroupRepo extends BaseRepo
{
    /**
     * @param  $data
     * @return mixed
     * @throws \Throwable
     */
    public function create($data): mixed
    {
        $group = new Group($this->handleData($data));
        $group->saveOrFail();

        $group->translations()->delete();
        $group->translations()->createMany($data['translations']);

        return $group;
    }

    /**
     * @return array
     */
    public function getSimpleList(): array
    {
        $groups = GroupRepo::getInstance()->all();

        return CustomerGroupSimple::collection($groups)->jsonSerialize();
    }

    /**
     * @param  $requestData
     * @return array
     */
    private function handleData($requestData): array
    {
        return [
            'level'         => $requestData['level'],
            'mini_cost'     => $requestData['mini_cost'],
            'discount_rate' => $requestData['discount_rate'],
        ];
    }
}
