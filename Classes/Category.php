<?php

class Category
{
    private $_name;
    private $_productsList;

    /**
     * @param string|null $name
     * @param array|null $productsList
     */
    public function __construct(string $name = null, array $productsList = null)
    {
        $this->_name = $name;
        $this->_productsList = $productsList;
    }

    public function getCategoryName()
    {
        return $this->_name;
    }

    public function getCategoryProducts()
    {
        return $this->_productsList;
    }
}