<?php
    $email = "";
    $nickname = "";

    if(isset($_POST["submit"])) {
        $email = $_POST["email"];
        $nickname = $_POST["nickname"];
    }

    session_start();
    $_SESSION["gegevens"]["email"] = $email;
    $_SESSION["gegevens"]["nickname"] = $nickname;
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht sessions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">
        
        <h1>Registratiegegevens</h1>
        <a href="adres.php?session=destroy">Verwijder sessie</a>
        <ul>
            <li>e-mail: <?= $_SESSION["gegevens"]["email"]?></li>
            <li>nickname: <?= $_SESSION["gegevens"]["nickname"] ?></li>            
        </ul>
        <h2>Deel 2: adres</h2>
        <form action="overzicht.php" method="post">
            <ul>
                <li>
                    <label for="straat">straat</label>
                    <input type="text" id="straat" name="straat">
                </li>
                <li>
                    <label for="nummer">nummer</label>
                    <input type="text" id="nummer" name="nummer">
                </li>
                <li>
                    <label for="gemeente">gemeente</label>
                    <input type="text" id="gemeente" name="gemeente">
                </li>
                <li>
                    <label for="postcode">postcode</label>
                    <input type="text" id="postcode" name="postcode">
                </li>
            </ul>
            <input type="submit" name="submit" value="Volgende">
        </form>
    </body>
</html>
