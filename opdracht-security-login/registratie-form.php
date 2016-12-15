<?php
    session_start();
    $email = false;
    $password = false;
    $messages = false;
    $dashboard = "dashboard.php";

    if (isset($_COOKIE["login"])) {
        header("Location: " . $dashboard);
    }
    if (isset($_SESSION["register"])) {
        $email = $_SESSION["register"]["email"];
        $password = $_SESSION["register"]["password"];
        var_dump( $_SESSION["register"]);
    }
    if (isset($_SESSION["notification"])) {
        $messages = $_SESSION["notification"];
    }
    //unset($_SESSION['register']);
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht security: login</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
            <h1>Registreren</h1>
            <?php if ($messages): ?>
                <ul>
                    <?php foreach ($messages as $msg): ?>
                        <li><?= $msg ?></li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
             <form action="registratie-process.php" method="POST">
                <ul>
                    <li>
                        <label for="email">e-mail</label>
                        <input type="text" id="email" name="email" value="<?= $email ?>">
                    </li>
                    <li>
                        <label for="password">paswoord</label>
                        <input type="<?= ($password)? "text" : "password" ?>" id="password" name="password" value="<?= $password ?>">
                        <input type="submit" name="generatePassword" value="Genereer een paswoord">
                    </li>
                </ul>
                <input type="submit" name="submit" value="Registreer">
            </form>
        </section>
    </body>
</html>
