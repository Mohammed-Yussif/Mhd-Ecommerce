<?php
 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use InnoShop\Common\Models\Customer\Group as CustomerGroup;
use InnoShop\Common\Repositories\Customer\GroupRepo;

class CustomerGroupSeeder extends Seeder
{
    public function run(): void
    {
        $items = $this->getCustomerGroups();
        if ($items) {
            CustomerGroup::query()->truncate();
            foreach ($items as $item) {
                GroupRepo::getInstance()->create($item);
            }
        }
    }

    private function getCustomerGroups(): array
    {
        return [
            [
                'level'         => 1,
                'mini_cost'     => 0,
                'discount_rate' => 100,
                'translations'  => [
                    ['locale' => 'en', 'name' => 'Account', 'description' => 'Account'],
                 
                ],
            ],
            [
                'level'         => 2,
                'mini_cost'     => 1000,
                'discount_rate' => 95,
                'translations'  => [
                    ['locale' => 'en', 'name' => 'VIP', 'description' => 'VIP'],
                    
                ],
            ],
        ];
    }
}
