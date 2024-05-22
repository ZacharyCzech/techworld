<?php

require_once 'includes/login_view.inc.php';
require_once 'includes/config.inc.php';

if (isset($_SESSION["user_id"])) {
    header("Location: index.php");
}

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
    <link rel="stylesheet" href="css/form.scss">
    <script src="scripts/login.js"></script>

</head>
<body>

<div class="all">
    <div class="login">
        <div class="title"> <img src="img/logo.svg" class="title-content" alt="TechLord"> </div>

        <?php
            if (isset($_GET["register"]) && $_GET["register"] === "success") {
                echo '<div class="register-success"> <span>Udało ci się utworzyć konto!</span> </div>';
            }
        ?>

        <form class="form" action="includes/login_contr.inc.php" method="post">
            <div class="form-element <?php if (isset($_SESSION['e_email_session'])) { echo "error"; } ?> ">
                <span class="validation">
                    <?php
                        check_email_errors();
                    ?>
                </span>
                <input type="text" name="email" id="email">
                <label for="email" class="form-label">e-mail</label>
            </div>

            <div class="form-element form-password <?php if (isset($_SESSION['e_password_session'])) { echo "error"; $label_active = true; } ?>">
                <span class="validation">
                    <?php
                        check_password_errors();
                    ?>
                </span>
                <div class="password-elements <?php if (isset($label_active)) { echo "error"; unset($label_active); } ?>">
                    <input type="password" name="password" id="password" class="password-label">
                    <button class="toggle-password" type="button">pokaż</button>
                </div>
                <label for="password" class="form-label">hasło</label>
            </div>

            <div class="middle-form">
                <div class="checkbox-label">
                    <input type="checkbox" name="checkbox">
                    <label for="checkbox">Zapamiętaj mnie</label>
                </div>

                <div class="forgot-password">
                    <a href="#">Nie pamiętam hasła</a>
                </div>
            </div>

            <button type="submit" class="login-button">Zaloguj się</button>

            <div class="bottom-message">
                <span> Nie masz konta? <a href="register-form.php">Zarejestruj się</a> </span>
                <span> <a href="index.php">Strona główna</a> </span>
            </div>
        </form>
    </div>
</div>


</body>
</html>
