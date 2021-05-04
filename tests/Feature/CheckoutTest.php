<?php


namespace Feature;


use PHPUnit\Framework\TestCase;
use Supermarket\Models\Product;
use Supermarket\Repository\PricingRulesRepository;
use Supermarket\Rules\BulkDiscountRule;
use Supermarket\Rules\GetOneFreeRule;
use Supermarket\Services\Checkout;

class CheckoutTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     * @param float $expectedPrice
     * @param array $productCodes
     */
    public function testCheckoutWithInterviewTaskRule (float $expectedPrice, array $productCodes) {
        $pricing_rules = (new PricingRulesRepository())->getRulesByKey('interview_task_rules');
        $checkout = new Checkout($pricing_rules);
        foreach ($productCodes as $product_code) {
            $checkout->scan($product_code);
        }
        $this->assertCount(count($productCodes),$checkout->cart);
        $this->assertEquals($expectedPrice,$checkout->total);
    }

    public function dataProvider() {
        return [
            'test cart data #1' => [
                22.45,
                ['FR1','SR1','FR1','FR1','CF1']
            ],
            'test cart data #2' => [
                3.11,
                ['FR1','FR1']
            ],
            'test cart data #3' => [
                16.61,
                ['SR1','SR1','FR1','SR1']
            ],
        ];
    }
}