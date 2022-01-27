<?php

class Product
{
    private $_name;
    private $_price;

    /**
     * @param string $name
     * @param int $price
     */
    public function __construct(string $name, int $price){
        $this->_name = $name;
        $this->_price = $price;
    }

    /**
     * @return string
     */
    public function getProduct(): string
    {
        $product = 'Name ' . $this->_name . ' Price ' . $this->_price;
        return $product;
    }
}