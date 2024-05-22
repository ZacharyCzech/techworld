<?php

declare(strict_types=1);


function is_email_taken(object $pdo, string $email)
{
    return get_email($pdo, $email);
}

function is_email_invalid(string $email): bool
{
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
}

function is_email_empty(string $email): bool
{
    return empty($email);
}

function is_password_invalid(string $password): bool
{
    return strlen($password)<6;
}

function is_password_empty(string $password): bool
{
    return empty($password);
}

function is_repeat_password_invalid(string $password, string $repeat_password): bool
{
    return $password != $repeat_password;
}

function is_repeat_password_empty(string $repeat_password): bool
{
    return empty($repeat_password);
}

function is_checkbox_empty(string $checkbox): bool
{
    return empty($checkbox);
}

function is_captcha_invalid(string $captcha_key): bool
{
    $captcha_verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$captcha_key.'&response='.$_POST['g-recaptcha-response']);
    $captcha_response = json_decode($captcha_verify);
    return !($captcha_response->success);
}

function create_user(object $pdo, string $email, string $password) {
    set_user($pdo, $email, $password);
}



if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat-password"];
    $checkbox = $_POST["checkbox"] ?? '';
    $captcha_key = "6Lc3CywpAAAAAEpVzza4AuAmI9T896HltmSu7RQx";


    try {

        require_once 'connect.inc.php';
        require_once 'register_model.inc.php';

        $e_email = "";
        $e_password = "";
        $e_repeat_password = "";
        $e_checkbox = "";
        $e_captcha = "";



        if (is_email_taken($pdo, $email)) {
            $e_email = "Ten e-mail jest już zarejestrowany!";
        }
        if (is_email_invalid($email)) {
            $e_email = "Niepoprawny e-mail!";
        }
        if (is_email_empty($email)) {
            $e_email = "To pole nie może być puste!";
        }
        if (is_password_invalid($password)) {
            $e_password = "Hasło musi mieć przynajmniej 6 znaków!";
        }
        if (is_password_empty($password)) {
            $e_password = "To pole nie może być puste!";
        }
        if (is_repeat_password_invalid($password, $repeat_password)) {
            $e_repeat_password = "Hasła muszą być takie same!";
        }
        if (is_repeat_password_empty($repeat_password)) {
            $e_repeat_password = "To pole nie może być puste!";
        }
        if (is_checkbox_empty($checkbox)) {
            $e_checkbox = "Potwierdź akceptację regulaminu!";
        }
        if (is_captcha_invalid($captcha_key)) {
            $e_captcha = "Zweryfikuj swoją tożsamość!";
        }



        require_once 'config.inc.php';

        if (!empty($e_email)) {
            $_SESSION["e_email_session"] = $e_email;
            $_SESSION["fr_email"] = $email;
            $error = true;
        }
        if (!empty($e_password)) {
            $_SESSION["e_password_session"] = $e_password;
            $error = true;
        }
        if (!empty($e_repeat_password)) {
            $_SESSION["e_repeat_password_session"] = $e_repeat_password;
            $error = true;
        }
        if (!empty($e_checkbox)) {
            $_SESSION["e_checkbox_session"] = $e_checkbox;
            $error = true;
        }
        if (!empty($e_captcha)) {
            $_SESSION["e_captcha_session"] = $e_captcha;
            $error = true;
        }

        if (isset($error)) {
            header("Location: ../register-form.php");
            die();
        }



        create_user($pdo, $email, $password);

        header("Location: ../login-form.php?register=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Błąd zapytania: " . $e->getMessage());
    }

} else {
    header("Location: ../register-form.php");
    die();
}