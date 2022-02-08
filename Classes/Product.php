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
    public function getProduct(): array
    {
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

            var_dump($name, $product, $result);
            echo "\n------------------------------";

//            if ($result) {
//                return $product;
//            }
//            else {
//                throw new \Exception('Продукт не найден');
//            }
        }
    }

    public function f()
    {
        return [
            [
                // продукты
                [[
                    'Name' => "продукт1",
                    'Price' => 0.0
                ],[
                    'Name' => "продукт2",
                    'Price' => 0.2
                ],[
                    'Name' => "продукт3",
                    'Price' => 0.1
                ],],
                // какой продукт ищем
                "продукт2",
                // Результат
                [
                    'Name' => "продукт2",
                    'Price' => 0.0
                ],
            ]
        ];
    }

    public function magic()
    {
        // dataprovider
        $data = $this->f();

        foreach ($data as $key => [$products, $product, $result]) {
            $this->searchByNameTest($products, $product, $result);
        }
    }

    /**
     * @dataprovider f
     */
    public function searchByNameTest($products, $product, $result)
    {
        $this->assertEquals(
            // актуальные данные
            $this->searchByName($products, $product),
            // ожидаемый результат
            $result
        );
    }

    private function assertEquals($actual, $expected)
    {
        if ($actual === $expected) {
            return;
        }

        throw new Exception(sprintf(
            "Все плохо!!! актуальный результат : %s, ожидаемый результат : %s",
            implode("|", $actual),
            implode("|", $expected)
        ));
    }
}

$p = new Product();
$p->magic();