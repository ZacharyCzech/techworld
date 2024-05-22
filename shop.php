<?php

    require_once 'includes/config.inc.php';

    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $query = isset($_GET['query']) ? trim($_GET['query']) : '';
    $category = isset($_GET['category']) ? (int)$_GET['category'] : 0;
    $subcategory = isset($_GET['subcategory']) ? (int)$_GET['subcategory'] : 0;
    $min_price = isset($_GET['min_price']) && $_GET['min_price'] !== '' ? (int)$_GET['min_price'] : 0;
    $max_price = isset($_GET['max_price']) && $_GET['max_price'] !== '' ? (int)$_GET['max_price'] : PHP_INT_MAX;
    $limit = 12;

    $min_price_display = $min_price !== 0 ? $min_price : '';
    $max_price_display = $max_price !== PHP_INT_MAX ? $max_price : '';

    require_once 'includes/shop_contr.inc.php';

    if (isset($_SESSION['products_data'])) {
        $products = $_SESSION['products_data'];
        $no_products = $_SESSION['no_products'] ?? false;
        $total_products = $_SESSION['total_products'] ?? 0;
    } else {
        $products = [];
        $no_products = true;
        $total_products = 0;
    }

    require_once 'includes/shop_view.inc.php';

?>

<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatibile" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.svg">
    <title>TechWorld</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/nav.scss">
    <link rel="stylesheet" href="css/products.scss">
    <script src="scripts/navbar.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"> </script>
    <script src="scripts/slick.js"></script>


</head>
<body>

<div class="header">
    <div class="top-nav">
        <div class="top-nav-elements">
            <div class="menu-button"> <img class="menu" alt="menu"> </div>

            <div class="logo-box">
                <a href="index.php"> <img class="logo" alt="techworld"> </a>
            </div>

            <div class="search-box">
                <form class="search-box-content" action="shop.php" method="get">
                    <button type="submit" class="search-button">
                        <img src="img/icons/search.svg" alt="Szukaj" class="search-icon">
                    </button>
                    <input class="search-input" type="search" name="query" value="<?php echo htmlspecialchars($query); ?>" placeholder="Szukaj...">
                    <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
                    <input type="hidden" name="subcategory" value="<?php echo htmlspecialchars($subcategory); ?>">
                    <input type="hidden" name="min_price" value="<?php echo htmlspecialchars($min_price); ?>">
                    <input type="hidden" name="max_price" value="<?php echo htmlspecialchars($max_price); ?>">
                </form>
            </div>

            <div class="icon-box">
                <ul>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        echo '<li> <a href="profile.php"> <img class="icon" src="img/icons/profile.svg" alt="Twoje konto"> <span> Twoje konto </span> </a> </li>';
                    } else {
                        echo '<li> <a href="login-form.php"> <img class="icon" src="img/icons/login.svg" alt="Zaloguj się"> <span> Zaloguj się </span> </a> </li>';
                    }
                    ?>
                    <li> <a href="#"> <img class="icon" src="img/icons/contact.svg" alt="Kontakt"> <span> Kontakt </span> </a> </li>
                    <li> <a href="#"> <img class="icon" src="img/icons/cart.svg" alt="Koszyk"> <span> Koszyk </span> </a> </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="overlay"></div>

    <div class="bottom-nav">
        <div class="bottom-nav-elements">
            <div class="dropdown" data-dropdown-menu>
                <button class="category-link" data-dropdown-button>
                    <img class="category-icon" src="img/icons/laptops.svg" alt="Laptopy i komputery" data-dropdown-button>
                    Laptopy i komputery
                    <img class="switch-icon" alt="Rozwiń" data-dropdown-button>
                </button>
                <div class="dropdown-menu">
                    <div class="dropdown-category">
                        <div class="dropdown-header">
                            <a href="shop.php?category=1&subcategory=0&query=<?php echo urlencode($query); ?>" class="dropdown-header-link" data-category="1" data-subcategory="0"> Laptopy </a>
                        </div>
                        <div class="dropdown-links">
                            <ul>
                                <li><a href="shop.php?category=1&subcategory=1&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="1" data-subcategory="1">Laptopy biznesowe</a></li>
                                <li><a href="shop.php?category=1&subcategory=2&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="1" data-subcategory="2">Laptopy gamingowe</a></li>
                                <li><a href="shop.php?category=1&subcategory=3&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="1" data-subcategory="3">Laptopy 2w1</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown-category">
                        <div class="dropdown-header">
                            <a href="shop.php?category=2&subcategory=0&query=<?php echo urlencode($query); ?>" class="dropdown-header-link" data-category="2" data-subcategory="0"> Komputery </a>
                        </div>
                        <div class="dropdown-links">
                            <ul>
                                <li><a href="shop.php?category=2&subcategory=1&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="2" data-subcategory="1">Komputery gamingowe</a></li>
                                <li><a href="shop.php?category=2&subcategory=2&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="2" data-subcategory="2">Komputery biurowe</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dropdown" data-dropdown-menu>
                <button class="category-link" data-dropdown-button>
                    <img class="category-icon" src="img/icons/parts.svg" alt="Podzespoły komputerowe" data-dropdown-button>
                    Podzespoły komputerowe
                    <img class="switch-icon" alt="Rozwiń" data-dropdown-button>
                </button>
                <div class="dropdown-menu">
                    <div class="dropdown-category">
                        <div class="dropdown-header">
                            <a href="shop.php?category=3&subcategory=0&query=<?php echo urlencode($query); ?>" class="dropdown-header-link" data-category="3" data-subcategory="0"> Procesory </a>
                        </div>
                        <div class="dropdown-links">
                            <ul>
                                <li><a href="shop.php?category=3&subcategory=1&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="3" data-subcategory="1">Procesory Intel</a></li>
                                <li><a href="shop.php?category=3&subcategory=2&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="3" data-subcategory="2">Procesory AMD</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown-category">
                        <div class="dropdown-header">
                            <a href="shop.php?category=4&subcategory=0&query=<?php echo urlencode($query); ?>" class="dropdown-header-link" data-category="4" data-subcategory="0"> Płyty główne </a>
                        </div>
                        <div class="dropdown-links">
                            <ul>
                                <li><a href="shop.php?category=4&subcategory=1&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="4" data-subcategory="1">Płyty główne LGA1700</a></li>
                                <li><a href="shop.php?category=4&subcategory=2&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="4" data-subcategory="2">Płyty główne AM5</a></li>
                                <li><a href="shop.php?category=4&subcategory=3&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="4" data-subcategory="3">Płyty główne AM4</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown-category">
                        <div class="dropdown-header">
                            <a href="shop.php?category=5&subcategory=0&query=<?php echo urlencode($query); ?>" class="dropdown-header-link" data-category="5" data-subcategory="0"> Karty graficzne </a>
                        </div>
                        <div class="dropdown-links">
                            <ul>
                                <li><a href="shop.php?category=5&subcategory=1&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="5" data-subcategory="1">Karty graficzne NVIDIA</a></li>
                                <li><a href="shop.php?category=5&subcategory=2&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="5" data-subcategory="2">Karty graficzne AMD</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown" data-dropdown-menu>
                <button class="category-link" data-dropdown-button>
                    <img class="category-icon" src="img/icons/peripherals.svg" alt="Urządzenia peryferyjne" data-dropdown-button>
                    Urządzenia peryferyjne
                    <img class="switch-icon" alt="Rozwiń" data-dropdown-button>
                </button>
                <div class="dropdown-menu">
                    <div class="dropdown-category">
                        <div class="dropdown-header">
                            <a href="shop.php?category=6&subcategory=0&query=<?php echo urlencode($query); ?>" class="dropdown-header-link" data-category="6" data-subcategory="0"> Monitory </a>
                        </div>
                        <div class="dropdown-links">
                            <ul>
                                <li><a href="shop.php?category=6&subcategory=1&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="6" data-subcategory="1">Monitory od 32"</a></li>
                                <li><a href="shop.php?category=6&subcategory=2&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="6" data-subcategory="2">Monitory od 27" do 31"</a></li>
                                <li><a href="shop.php?category=6&subcategory=3&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="6" data-subcategory="3">Monitory od 23" do 26"</a></li>
                                <li><a href="shop.php?category=6&subcategory=4&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="6" data-subcategory="4">Monitory do 23"</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown-category">
                        <div class="dropdown-header">
                            <a href="shop.php?category=7&subcategory=0&query=<?php echo urlencode($query); ?>" class="dropdown-header-link" data-category="7" data-subcategory="0"> Klawiatury </a>
                        </div>
                        <div class="dropdown-links">
                            <ul>
                                <li><a href="shop.php?category=7&subcategory=1&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="7" data-subcategory="1">Klawiatury mechaniczne</a></li>
                                <li><a href="shop.php?category=7&subcategory=2&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="7" data-subcategory="2">Klawiatury membranowe</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown-category">
                        <div class="dropdown-header">
                            <a href="shop.php?category=8&subcategory=0&query=<?php echo urlencode($query); ?>" class="dropdown-header-link" data-category="8" data-subcategory="0"> Myszki </a>
                        </div>
                        <div class="dropdown-links">
                            <ul>
                                <li><a href="shop.php?category=8&subcategory=1&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="8" data-subcategory="1">Myszki</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="dropdown-category">
                        <div class="dropdown-header">
                            <a href="shop.php?category=9&subcategory=0&query=<?php echo urlencode($query); ?>" class="dropdown-header-link" data-category="9" data-subcategory="0"> Słuchawki </a>
                        </div>
                        <div class="dropdown-links">
                            <ul>
                                <li><a href="shop.php?category=9&subcategory=1&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="9" data-subcategory="1">Headsety</a></li>
                                <li><a href="shop.php?category=9&subcategory=2&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="9" data-subcategory="2">Słuchawki nauszne</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown" data-dropdown-menu>
                <button class="category-link" data-dropdown-button>
                    <img class="category-icon" src="img/icons/smartphones.svg" alt="Smartfony i akcesoria" data-dropdown-button>
                    Smartfony i akcesoria
                    <img class="switch-icon" alt="Rozwiń" data-dropdown-button>
                </button>
                <div class="dropdown-menu">
                    <div class="dropdown-category">
                        <div class="dropdown-header">
                            <a href="shop.php?category=10&subcategory=0&query=<?php echo urlencode($query); ?>" class="dropdown-header-link" data-category="10" data-subcategory="0"> Smartfony </a>
                        </div>
                        <div class="dropdown-links">
                            <ul>
                                <li><a href="shop.php?category=10&subcategory=1&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="10" data-subcategory="1">Smartfony Apple</a></li>
                                <li><a href="shop.php?category=10&subcategory=2&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="10" data-subcategory="2">Smartfony Samsung</a></li>
                                <li><a href="shop.php?category=10&subcategory=3&query=<?php echo urlencode($query); ?>" class="dropdown-link" data-category="10" data-subcategory="3">Smartfony Xiaomi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="product-page">
        <div class="filter-bar">
            <div class="filter-bar-content">
                <form class="clear-filters-form" action="shop.php" method="get">
                    <input type="hidden" name="query" value="<?php echo htmlspecialchars($query); ?>">
                    <input type="hidden" name="category" value="0">
                    <input type="hidden" name="subcategory" value="0">
                    <input type="hidden" name="min-price" value="<?php echo htmlspecialchars($min_price); ?>">
                    <input type="hidden" name="max-price" value="<?php echo htmlspecialchars($max_price); ?>">
                    <button type="submit" class="clear-filters-button">Wyczyść kategorie</button>
                </form>

                <form class="clear-filters-form" action="shop.php" method="get">
                    <input type="hidden" name="query" value="">
                    <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
                    <input type="hidden" name="subcategory" value="<?php echo htmlspecialchars($subcategory); ?>">
                    <input type="hidden" name="min-price" value="<?php echo htmlspecialchars($min_price); ?>">
                    <input type="hidden" name="max-price" value="<?php echo htmlspecialchars($max_price); ?>">
                    <button type="submit" class="clear-filters-button">Wyczyść wyszukiwanie</button>
                </form>

                <form class="price-filter-form" action="shop.php" method="get">
                    <input type="hidden" name="query" value="<?php echo htmlspecialchars($query); ?>">
                    <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
                    <input type="hidden" name="subcategory" value="<?php echo htmlspecialchars($subcategory); ?>">
                    <input type="number" id="min-price" class="price-filter-element" name="min_price" value="<?php echo htmlspecialchars($min_price_display); ?>" placeholder="od">
                    <input type="number" id="max-price" class="price-filter-element" name="max_price" value="<?php echo htmlspecialchars($max_price_display); ?>" placeholder="do">
                    <button type="submit" class="price-filter-button">Filtruj</button>
                </form>

                <form class="clear-filters-form" action="shop.php" method="get">
                    <input type="hidden" name="query" value="<?php echo htmlspecialchars($query); ?>">
                    <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
                    <input type="hidden" name="subcategory" value="<?php echo htmlspecialchars($subcategory); ?>">
                    <input type="hidden" name="min_price" value="0">
                    <input type="hidden" name="max_price" value="<?php echo PHP_INT_MAX; ?>">
                    <button type="submit" class="clear-filters-button">Wyczyść filtry</button>
                </form>

            </div>
        </div>
        <div class="product-section">
            <div class="pagination">

                <?php
                    display_pagination($current_page, $total_products, $limit);
                ?>
            </div>
            <div class="products">
                <?php
                    if ($no_products) {
                        echo '<div class="no-products"><p>Brak dostępnych produktów.</p></div>';
                    } else {
                        display_products($products);
                    }
                ?>
            </div>
        </div>
    </div>


</div>

</body>
</html>