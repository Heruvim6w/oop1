<?php

class Product
{
    private $_name;
    private $_price;

    /**
     * @param string|null $name
     * @param int|null $price
     */
    public function __construct(string $name = null, int $price = null){
        $this->_name = $name;
        $this->_price = $price;
    }

    /**
     * @return array
     */
    public function getProduct(): array{
        $products = [
            'Name' => $this->_name,
            'Price' => $this->_price
        ];
        return $products;
    }

    /**
     * @param array $products
     * @param string $name
     * @throws Exception
     */
    public function searchByName(array $products, string $name)
    {
        foreach ($products as $product) {
            $result = array_search($name, $product);
            if ($result) {
                return $product;
            }
            else {
                throw new \Exception('Продукт не найден');
            }
        }
    }
}