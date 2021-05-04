<?php


namespace Supermarket\Models;


use Supermarket\Contracts\ProductAbstract;

class Product extends ProductAbstract
{
    public function __construct(string $code, string $name, float $price) {
        $this->setCode($code)->setName($name)->setPrice($price);
    }
}