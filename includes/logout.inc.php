<?php

if (isset($_SESSION["logged_in"])) {
    unset($_SESSION["logged_in"]);
}

session_start();
session_unset();
session_destroy();

header('Location: ../index.php');
die();
