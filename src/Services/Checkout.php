<?php


namespace Supermarket\Services;


use Supermarket\Contracts\CheckoutAbstract;
use Supermarket\Contracts\PricingRuleAbstract;
use Supermarket\Contracts\ProductAbstract;

class Checkout extends CheckoutAbstract
{

    public function scan(string $productCode)
    {
        $this->cart[] = $this->productsRepository->getProductByCode($productCode);
        $this->total = $this->calculateTotal();
    }

    private function calculateTotal() {
        $total = 0;
        $products_count =  $this->getCartProductCounts();

        foreach ($products_count as $product_code => $qty) {
            $product_rule = $this->getProductRule($product_code);
            $product_price = $this->productsRepository->getProductByCode($product_code)->price;
            if (!empty($product_rule)) {
                $total += $product_rule->calculatePrice($qty,$product_price);
            } else {
                $total += $product_price * $qty;
            }
        }
        return $total;
    }

    private function getCartProductCounts() {
        return array_count_values(
            array_map(
                function (ProductAbstract $product) {
                    return $product->code;
                    },
                $this->cart
            )
        );
    }

    private function getProductRule($productCode) :?PricingRuleAbstract {
        return $this->pricingRules[$productCode] ?? null;
    }
}