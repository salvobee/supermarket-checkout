<?php


namespace Supermarket\Contracts;


interface PricingRuleInterface
{
    public function calculatePrice(int $qty, float $price) :float;
}