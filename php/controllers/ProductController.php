<?php
require_once '../services/Product.php';

use services\Product;

$product = new Product();

if (isset($_POST['register'])) {
    return $product->postProduct($_POST);
}

if (isset($_POST['edit'])) {
    return $product->putProduct($_POST);
}

if (isset($_POST['delete'])) {
    return $product->deleteProduct($_POST['id']);
}
