<?php
require_once '../services/Categories.php';

use services\Categories;

$categories = new Categories();

if (isset($_POST['register'])) {
    return $categories->postCategories($_POST);
}

if (isset($_POST['edit'])) {
    return $categories->putCategories($_POST);
}

if (isset($_POST['delete'])) {
    return $categories->deleteCategories($_POST['id']);
}