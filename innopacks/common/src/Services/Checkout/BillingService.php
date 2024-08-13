<?php
 
namespace InnoShop\Common\Services\Checkout;

use InnoShop\Plugin\Repositories\PluginRepo;
use InnoShop\Plugin\Resources\Checkout\PaymentMethodItem;

class BillingService
{
    /**
     * @return static
     */
    public static function getInstance(): static
    {
        return new static;
    }

    /**
     * @throws \Exception
     */
    public function getMethods(): array
    {
        $billingPlugins = PluginRepo::getInstance()->getBillingMethods();

        return PaymentMethodItem::collection($billingPlugins)->jsonSerialize();
    }
}
