<?php
$fileGegevens = fopen("gegevens.txt", "r") or die("Unable to open file!");
$gegevens		=	explode( ',', $fileGegevens );
fclose($fileGegevens);
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
        <? php foreach $gegevens as $gegeven: ?>
        <p><?= $gegeven ?></p>
        <? endforeach ?>
            <form>
                <ul>
                    <li>
                        <label for="username">gebruikersnaam</label>
                        <input type="text" id="username" name="gebruikersnaam">
                    </li>
                    <li>
                        <label for="password">paswoord</label>
                        <input type="password" id="password" name="password">
                    </li>
                </ul>
                <input type="submit" name="submit" value="verzenden">
            </form>
    </section>
    </body>
</html>
