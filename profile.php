<?php

    require_once 'includes/config.inc.php';

    if (!isset($_SESSION["user_id"])) {
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

</head>
<body>

<div class="all">
    <?php

    if (isset($_SESSION["user_email"])) {
        echo $_SESSION["user_email"];
        echo '<br/>';
    }

    ?>

    <form action="includes/logout.inc.php" method="post">
        <button>Wyloguj się</button>
    </form>
</div>


</body>
</html>