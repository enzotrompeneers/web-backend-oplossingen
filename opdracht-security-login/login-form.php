<?php
    session_start();
    unset($_COOKIE['login']); 
    $_SESSION['notification']["message"] = "U bent uitgelogd. Tot de volgende keer";
    
    
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
             <form action="registratie-process.php" method="POST">
                <ul>
                    <li>
                        <label for="email">e-mail</label>
                        <input type="text" id="email" name="email">
                    </li>
                    <li>
                        <label for="password">paswoord</label>
                        <input type="password" id="password" name="password"">
                    </li>
                </ul>
                <input type="submit" name="submit" value="inloggen">
            </form>
        </section>
    </body>
</html>
