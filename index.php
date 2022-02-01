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
</body>
</html>
<?php
require_once('Classes/Product.php');
session_start();
//$_SESSION['products']=[];

if (isset($_POST['add'])) {
    $products = new Product($_POST['name'], $_POST['price']);
    $_SESSION['products'][] = $products->getProduct();

    foreach ($_SESSION['products'] as $item) {
        echo $item . '<br>';
    }
//    echo tempnam(sys_get_temp_dir(), 'products');
}

