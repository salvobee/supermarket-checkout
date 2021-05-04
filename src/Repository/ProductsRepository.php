<?php


namespace Supermarket\Repository;


use Supermarket\Exceptions\ProductNotFoundException;
use Supermarket\Models\Product;

class ProductsRepository
{
    private array $allProducts;

    /**
     * Products constructor.
     */
    public function __construct()
    {
        $this->allProducts = [
            'FR1' => new Product('FR1', 'Fruit Tea', 3.11),
            'SR1' => new Product('SR1', 'Strawberries', 5.00),
            'CF1' => new Product('CF1', 'Coffe', 11.23),
        ];
    }

    public function getAllProducts() {
        return $this->allProducts;
    }

    public function getProductByCode(string $code) {
        $product = $this->allProducts[$code];
        if (empty($product))
            throw new ProductNotFoundException('product not fuound');

        return $product;
    }

}