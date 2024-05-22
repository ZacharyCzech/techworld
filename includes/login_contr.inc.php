<?php

declare(strict_types=1);

function is_email_empty(string $email): bool
{
    return empty($email);
}

function is_email_incorrect(bool|array $result)
{
    if (!$result) {
        return true;
    } else {
        return false;
    }
}

function is_password_empty(string $password): bool
{
    return empty($password);
}

function is_password_incorrect(string $password, string $hashed_password)
{
    if (!password_verify($password, $hashed_password)) {
        return true;
    } else {
        return false;
    }
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    try {
        require_once 'connect.inc.php';
        require_once 'login_model.inc.php';

        $e_email = "";
        $e_password = "";



        $result = get_data($pdo, $email);
        if (is_email_incorrect($result)) {
            $e_email = "Ten e-mail nie jest zarejestrowany!";
        }
        if (is_email_empty($email)) {
            $e_email = "To pole nie może być puste!";
        }

        if (!is_email_incorrect($result) && is_password_incorrect($password, $result["pass"])) {
            $e_password = "Nieprawidłowe hasło!";
        }
        if (is_password_empty($password)) {
            $e_password = "To pole nie może być puste!";
        }

        require_once 'config.inc.php';

        if (!empty($e_email)) {
            $_SESSION["e_email_session"] = $e_email;
            $error = true;
        }
        if (!empty($e_password)) {
            $_SESSION["e_password_session"] = $e_password;
            $error = true;
        }

        if (isset($error)) {
            header("Location: ../login-form.php");
            die();
        }

        $new_session_id = session_create_id();
        $session_id = $new_session_id . "_" . $result["id"];
        session_id($session_id);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_email"] = htmlspecialchars($result["email"]);

        $_SESSION["last_regeneration"] = time();

        header("Location: ../index.php");
        $pdo = null;
        $statement = null;

        die();

    } catch (PDOException $e) {
        die("Błąd zapytania: " . $e->getMessage());
    }
} else {
    header("Location: ../login-form.php");
    die();
}
