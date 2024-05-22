<?php

declare(strict_types=1);

function check_email_errors(): void
{
    if (isset($_SESSION['e_email_session'])) {
        $e_email = $_SESSION['e_email_session'];

        echo $e_email;

        unset($_SESSION['e_email_session']);
    }
}

function check_password_errors(): void
{
    if (isset($_SESSION['e_password_session'])) {
        $e_password = $_SESSION['e_password_session'];

        echo $e_password;

        unset($_SESSION['e_password_session']);
    }
}

function check_repeat_password_errors(): void
{
    if (isset($_SESSION['e_repeat_password_session'])) {
        $e_repeat_password = $_SESSION['e_repeat_password_session'];

        echo $e_repeat_password;

        unset($_SESSION['e_repeat_password_session']);
    }
}

function check_checkbox_errors(): void
{
    if (isset($_SESSION['e_checkbox_session'])) {
        $e_checkbox = $_SESSION['e_checkbox_session'];

        echo $e_checkbox;

        unset($_SESSION['e_checkbox_session']);
    }
}

function check_captcha_errors(): void
{
    if (isset($_SESSION['e_captcha_session'])) {
        $e_captcha = $_SESSION['e_captcha_session'];

        echo $e_captcha;

        unset($_SESSION['e_captcha_session']);
    }
}
