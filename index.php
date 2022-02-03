<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" id="name" name="name" placeholder="Название продукта">
        <label for="name">Название продукта</label>

        <input type="text" id="price" name="price" placeholder="Цена">
        <label for="price">Цена</label>

        <button type="submit" name="add" value="Add">Добавить</button>
    </form>

    <br>

    <form action="" method="post">
        <input type="text" id="nameForSearch" name="nameForSearch" placeholder="Название продукта">
        <label for="nameForSearch">Название продукта</label>
        <br>
        <button type="submit" name="search" value="Search">Поиск</button>
    </form>

    <hr>

    <form action="" method="post">
        <input type="text" id="category" name="category" placeholder="Название категории">
        <label for="category">Название категории</label>
        <br>
        <button type="submit" name="addCategory" value="addCategory">Добавить категорию</button>
    </form>

    <hr>
    <?php var_dump($_SESSION); ?>
    <form action="" method="post">
        <!--        <input type="text" id="findCategory" name="findCategory" placeholder="Название категории">-->
        <!--        <label for="findCategory">Название категории</label>-->
        <!--        <br>-->
        <!--        <button type="submit" name="findCategoryByName" value="findCategoryByName">Поиск категории</button>-->
        <?php
        if ($_SESSION['categories']) {
            foreach ($_SESSION['categories'] as $category) {
                echo $category['_name'];
            }
        }
        ?>
    </form>
</body>
</html>
<?php
require_once('Classes/Product.php');
require_once('Classes/Category.php');
session_start();
//$_SESSION['products']=[];

if (isset($_POST['add'])) {
    $products = new Product($_POST['name'], $_POST['price']);
    $_SESSION['products'][] = $products->getProduct();
//    $_SESSION['products'] = array_push($_SESSION['products'], $products->getProduct());

    foreach ($_SESSION['products'] as $item) {
        echo 'Название: "' . $item['Name'] . '", Цена:' . $item['Price'] . ' руб.;<br>';
    }
//    echo tempnam(sys_get_temp_dir(), 'products');
}

if (isset($_POST['search'])) {
    $products = new Product();

    try {
        $product = $products->searchByName($_SESSION['products'], $_POST['nameForSearch']);
    } catch (Exception $e) {
        echo $e->getMessage();
        exit();
    }

    echo 'Название: "' . $product['Name'] . '", Цена:' . $product['Price'] . ' руб.;<br>';
}

if (isset($_POST['addCategory'])) {
    $category = new Category($_POST['category'], $_SESSION['products']);
    $_SESSION['categories'][] = $category;
    $_SESSION['products'] = [];

    echo $category->getCategoryName();
}

