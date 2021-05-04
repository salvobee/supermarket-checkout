<?php


namespace Supermarket\Contracts;

abstract class ProductAbstract
{
    public string $code;
    public string $name;
    public float $price;

    /**
     * @param string $code
     * @return ProductAbstract
     */
    public function setCode(string $code): ProductAbstract
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @param string $name
     * @return ProductAbstract
     */
    public function setName(string $name): ProductAbstract
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param float $price
     * @return ProductAbstract
     */
    public function setPrice(float $price): ProductAbstract
    {
        $this->price = $price;
        return $this;
    }
}