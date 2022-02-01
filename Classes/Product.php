<?php

class Product
{
    private $_name;
    private $_price;

    /**
     * @param string $name
     * @param int $price
     */
    public function __construct(string $name = null, int $price = null){
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

    /**
     * @param array $products
     * @param string $name
     */
    public function searchByName(array $products, string $name)
    {
        foreach ($products as $product) {
            $result = strpos($product, $name);

            if ($result) {
                return $product;
            }
        }
    }
}