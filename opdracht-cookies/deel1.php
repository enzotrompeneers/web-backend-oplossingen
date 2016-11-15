<?php
    $isIngelogd = false;
    $message = "";
    $fileGegevens = file_get_contents("gegevens.txt", "r");
    $gegevens =	explode( ',', $fileGegevens );
    $usernameInFile = $gegevens[0];
    $passwordInFile = $gegevens[1];
    
    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if ($usernameInFile == $username && $passwordInFile == $password) {
            $message = "U bent ingelogd";
            setcookie("username", $username, time()+360); #6min
            setcookie("password", $password, time()+360); #6min
            #echo $_COOKIE["username"];
            #echo $_COOKIE["password"];
            $isIngelogd = true;
        } else {
            $message = "Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.";
        }
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht cookies</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">
    
    <section class="body">
        <h1>Inloggen</h1>
        <?php if(!$isIngelogd): ?>
        <p><?= $message ?></p>
            <form action="deel1.php" method="post">
                <ul>
                    <li>
                        <label for="username">gebruikersnaam</label>
                        <input type="text" id="username" name="username">
                    </li>
                    <li>
                        <label for="password">paswoord</label>
                        <input type="password" id="password" name="password">
                    </li>
                </ul>
                <input type="submit" name="submit" value="verzenden">
            </form>
        <?php else: ?>
            <p><?= $message ?></p>
            <a href="deel1.php">Uitloggen</a><br><br>
            <?php print_r($_COOKIE) ?>
        <?php endif ?>
    </section>
    </body>
</html>
