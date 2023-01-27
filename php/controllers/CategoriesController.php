<?php
require_once '../services/Categories.php';

use services\Categories;

$categories = new Categories();

if (isset($_POST['register'])) {
    return $categories->postCategories($_POST);
}