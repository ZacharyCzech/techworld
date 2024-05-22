<?php

require_once 'includes/register_view.inc.php';
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
    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>
<body>

<div class="all">
    <div class="login">
        <div class="title"> <img src="img/logo.svg" class="title-content" alt="TechLord"> </div>
        <form class="form" action="includes/register_contr.inc.php" method="post">
            <div class="form-element <?php if (isset($_SESSION['e_email_session'])) { echo "error"; } ?> ">
                <span class="validation">
                    <?php
                        check_email_errors();
                    ?>
                </span>
                <input type="text" name="email" id="email"
                       value="<?php if (isset($_SESSION['fr_email'])) { echo $_SESSION['fr_email']; unset($_SESSION['fr_email']); }?>"
                >
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

            <div class="form-element <?php if (isset($_SESSION['e_repeat_password_session'])) { echo "error"; } ?>">
                <span class="validation">
                    <?php
                        check_repeat_password_errors();
                    ?>
                </span>
                <input type="password" name="repeat-password" id="repeat-password">
                <label for="repeat-password" class="form-label">powtórz hasło</label>
            </div>

            <div class="verification-form <?php if (isset($_SESSION['e_checkbox_session'])) { echo "error"; } ?>">
                <div class="checkbox-label">
                    <input type="checkbox" name="checkbox" id="checkbox">
                    <label for="checkbox">Akceptuję <a href="#">regulamin</a> sklepu </label>
                </div>
                <span class="validation">
                    <?php
                        check_checkbox_errors();
                    ?>
                </span>
                <div class="checkbox-label">
                    <input type="checkbox" name="notif" id="notif">
                    <label for="notif">Chcę otrzymywać informacje o ofertach sklepu </label>
                </div>
            </div>

            <div class="captcha <?php if (isset($_SESSION['e_captcha_session'])) { echo "error"; } ?>">
                <div class="g-recaptcha" data-sitekey="6Lc3CywpAAAAACRkOvNhCqmnrU80NjLsJQc0v2sO"></div>
                <span class="validation">
                    <?php
                        check_captcha_errors();
                    ?>
                </span>
            </div>

            <button class="login-button">Utwórz konto</button>

            <div class="bottom-message">
                <span> Masz już konto? <a href="login-form.php">Zaloguj się</a> </span>
                <span> <a href="index.php">Strona główna</a> </span>
            </div>
        </form>
    </div>
</div>


</body>
</html>
