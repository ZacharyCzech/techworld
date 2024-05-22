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
