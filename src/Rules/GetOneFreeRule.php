<?php


namespace Supermarket\Rules;


use Supermarket\Contracts\PricingRuleAbstract;
use Supermarket\Contracts\PricingRuleInterface;
use Supermarket\Contracts\ProductAbstract;

class GetOneFreeRule extends PricingRuleAbstract implements PricingRuleInterface
{
    public function calculatePrice(int $qty, float $price) :float
    {
        $payed_qty = floor($qty / 2) + floor($qty % 2);
        return $payed_qty * $price;
    }
}