<?php

declare(strict_types=1);

function display_products(array $products): void {
    foreach ($products as $product) {
        echo '
        <a href="product.php?id=' . htmlspecialchars((string)$product['id']) . '">
            <div class="product"> 
                <div class="product-image">
                    <img src="img/products/product_' . htmlspecialchars((string)$product['id']) . '.png" class="product-image-content">
                </div>
                <div class="product-header">' . htmlspecialchars($product['name']) . '</div>
                <div class="product-bottom">
                    <div class="product-price">' . htmlspecialchars(number_format(floatval($product['price']), 2, ',', ' ')) . ' zł</div>
                    <div class="product-cart">
                        <button class="product-cart-button">
                            <img class="product-cart-image" src="img/icons/cart-add-1.svg" width="30px" height="30px">
                        </button>
                    </div>
                </div>
            </div>
        </a>
        ';
    }
}

function display_pagination(int $current_page, int $total_products, int $limit): void {
    $total_pages = ceil($total_products / $limit);

    $query = isset($_GET['query']) ? trim($_GET['query']) : '';
    $category = isset($_GET['category']) ? (int)$_GET['category'] : 0;
    $subcategory = isset($_GET['subcategory']) ? (int)$_GET['subcategory'] : 0;
    $min_price = isset($_GET['min_price']) ? (int)$_GET['min_price'] : 0;
    $max_price = isset($_GET['max_price']) ? (int)$_GET['max_price'] : PHP_INT_MAX;

    if ($current_page > 1) {
        echo '<a href="?page=' . ($current_page - 1) . '&query=' . urlencode($query) . '&category=' . $category . '&subcategory=' . $subcategory . '&min_price=' . $min_price . '&max_price=' . $max_price . '"> <div class="page-button-active"> < Poprzednia </div> </a>';
    } else {
        echo '<div class="page-button-inactive"> < </div>';
    }

    for ($i = 1; $i <= $total_pages; $i++) {
        if ($i == $current_page) {
            echo '<div class="page-button-current">' . $i . '</div>';
        } else {
            echo '<a href="?page=' . $i . '&query=' . urlencode($query) . '&category=' . $category . '&subcategory=' . $subcategory . '&min_price=' . $min_price . '&max_price=' . $max_price . '"> <div class="page-button">' . $i . '</div> </a>';
        }
    }

    if ($current_page < $total_pages) {
        echo '<a href="?page=' . ($current_page + 1) . '&query=' . urlencode($query) . '&category=' . $category . '&subcategory=' . $subcategory . '&min_price=' . $min_price . '&max_price=' . $max_price . '"> <div class="page-button-active"> Następna > </div> </a>';
    } else {
        echo '<div class="page-button-inactive"> > </div>';
    }
}