<?php


namespace Supermarket\Contracts;


use Supermarket\Repository\ProductsRepository;

abstract class CheckoutAbstract implements ProductScannerInterface
{
    public float $total = 0;
    public array $cart;
    public array $pricingRules;
    public ProductsRepository $productsRepository;

    public function __construct(array $pricingRules) {
        $this->pricingRules = $pricingRules;
        $this->productsRepository = new ProductsRepository();
    }
}