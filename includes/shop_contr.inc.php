<?php

require_once 'connect.inc.php';
require_once 'shop_model.inc.php';

$query = isset($_GET['query']) ? trim($_GET['query']) : '';
$category = isset($_GET['category']) ? (int)$_GET['category'] : 0;
$subcategory = isset($_GET['subcategory']) ? (int)$_GET['subcategory'] : 0;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$min_price = isset($_GET['min_price']) && $_GET['min_price'] !== '' ? (int)$_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) && $_GET['max_price'] !== '' ? (int)$_GET['max_price'] : PHP_INT_MAX;
$limit = 12;

$total_products = count_total_products($pdo, $query, $category, $subcategory, $min_price, $max_price);
$products = get_products($pdo, $query, $category, $subcategory, $page, $min_price, $max_price, $limit);

if (empty($products)) {
    $_SESSION['no_products'] = true;
    $products = [];
} else {
    $_SESSION['no_products'] = false;
}

$_SESSION['products_data'] = $products;
$_SESSION['total_products'] = $total_products;
$_SESSION['current_page'] = $page;