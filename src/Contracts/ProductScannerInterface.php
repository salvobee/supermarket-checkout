<?php


namespace Supermarket\Contracts;


interface ProductScannerInterface
{
    public function scan(string $productCode);
}