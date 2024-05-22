<?php

declare(strict_types=1);

function get_data(object $pdo, string $email)
{
    $query = "SELECT * FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    return $result = $stmt->fetch(PDO::FETCH_ASSOC);
}
