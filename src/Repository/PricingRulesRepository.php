<?php


namespace Supermarket\Repository;


use Supermarket\Rules\BulkDiscountRule;
use Supermarket\Rules\GetOneFreeRule;

class PricingRulesRepository
{
    private array $allRules;

    /**
     * PricingRulesRepository constructor
     */
    public function __construct()
    {
        $this->allRules = [
            'interview_task_rules' => [
                'FR1' => new GetOneFreeRule(1),
                'SR1' => new BulkDiscountRule(0.10,3)
            ],
        ];
    }

    public function getRulesByKey($key) :?array {
        return $this->allRules[$key] ?? null;
    }

}