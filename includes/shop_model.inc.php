<?php

declare(strict_types=1);

function get_products(object $pdo, string $query, int $category = 0, int $subcategory = 0, int $page = 1, int $min_price = 0, int $max_price = PHP_INT_MAX, int $limit = 24): array
{
    $query = "%" . $query . "%";
    $offset = ($page - 1) * $limit;
    $sql = "SELECT * FROM products WHERE name LIKE :search_query 
            AND (:category = 0 OR category = :category) 
            AND (:subcategory = 0 OR subcategory = :subcategory)
            AND price > :min_price AND price < :max_price
            LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':search_query', $query, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_INT);
    $stmt->bindParam(':subcategory', $subcategory, PDO::PARAM_INT);
    $stmt->bindParam(':min_price', $min_price, PDO::PARAM_INT);
    $stmt->bindParam(':max_price', $max_price, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function count_total_products(object $pdo, string $query, int $category = 0, int $subcategory = 0, int $min_price = 0, int $max_price = PHP_INT_MAX): int
{
    $query = "%" . $query . "%";
    $sql = "SELECT COUNT(*) FROM products WHERE name LIKE :search_query 
            AND (:category = 0 OR category = :category) 
            AND (:subcategory = 0 OR subcategory = :subcategory)
            AND price > :min_price AND price < :max_price";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':search_query', $query, PDO::PARAM_STR);
    $stmt->bindParam(':category', $category, PDO::PARAM_INT);
    $stmt->bindParam(':subcategory', $subcategory, PDO::PARAM_INT);
    $stmt->bindParam(':min_price', $min_price, PDO::PARAM_INT);
    $stmt->bindParam(':max_price', $max_price, PDO::PARAM_INT);
    $stmt->execute();
    return (int)$stmt->fetchColumn();
}

function get_product_by_id(object $pdo, string $id): array
{
    $stmt = $pdo->prepare("SELECT id, name, price FROM products WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $result : [];
}

