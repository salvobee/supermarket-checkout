<?php


namespace Supermarket\Rules;


use Supermarket\Contracts\PricingRuleAbstract;
use Supermarket\Contracts\PricingRuleInterface;

class BulkDiscountRule extends PricingRuleAbstract implements PricingRuleInterface
{
    private float $discount;
    private int $triggerQty;

    /**
     * BulkDiscountRule constructor.
     * @param float $discount
     * @param int $triggerQty
     */
    public function __construct(float $discount, int $triggerQty)
    {
        $this->discount = $discount;
        $this->triggerQty = $triggerQty;
    }


    public function calculatePrice(int $qty, float $price) :float
    {
        $actual_price = $qty >= $this->triggerQty ? $price - ($price * $this->discount) : $price;
        return $qty * $actual_price;
    }
}