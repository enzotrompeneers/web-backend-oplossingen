<?php
    session_start();
    $email = false;
    unset($_COOKIE['login']);
    setcookie("login", "", time()-3600);
    unset($_COOKIE['register']);
    $msg = false;

    if (isset($_SESSION['notification']["message"])) {
        $msg = $_SESSION['notification']["message"];
    }
    $_SESSION['notification']["message"] = "U bent uitgelogd. Tot de volgende keer";

    if (isset($_SESSION['register']["email"])) {
        $email = $_SESSION['register']["email"];
    }
    
    
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
            <h1>Inloggen</h1>
            <?php if ($msg): ?>
                <ul>
                        <li><?= $msg ?></li>
                </ul>
            <?php endif ?>
             <form action="login-process.php" method="POST">
                <ul>
                    <li>
                        <label for="email">e-mail</label>
                        <input type="text" id="email" name="email" value="<?= $email ?>">
                    </li>
                    <li>
                        <label for="password">paswoord</label>
                        <input type="password" id="password" name="password"">
                    </li>
                </ul>
                <input type="submit" name="submit" value="inloggen">
            </form>
            <p>Nog geen account? Maak er dan eentje aan op de <a href="registratie-form.php">registratiepagina</a>.</p>
        </section>
    </body>
</html>
