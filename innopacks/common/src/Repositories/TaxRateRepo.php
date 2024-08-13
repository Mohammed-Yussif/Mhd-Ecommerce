<?php
 
namespace InnoShop\Common\Repositories;

use InnoShop\Common\Models\TaxRate;

class TaxRateRepo extends BaseRepo
{
    /**
     * @param  $taxRateId
     * @return string
     */
    public function getNameByRateId($taxRateId): string
    {
        $taxRate = TaxRate::query()->find($taxRateId);

        return $taxRate->name ?? '';
    }
}
