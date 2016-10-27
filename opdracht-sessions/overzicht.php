<?php
    $straat = "";
    $nummer = "";
    $gemeente = "";
    $postcode = "";

    if(isset($_POST["submit"])) {
        $straat = $_POST["straat"];
        $nummer = $_POST["nummer"];
        $gemeente = $_POST["gemeente"];
        $postcode = $_POST["postcode"];
    }

    session_start();
    $_SESSION["gegevens"]["straat"] = $straat;
    $_SESSION["gegevens"]["nummer"] = $nummer;
    $_SESSION["gegevens"]["gemeente"] = $gemeente;
    $_SESSION["gegevens"]["postcode"] = $postcode;
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
        
        <h1>Overzichtspagina</h1>
        <a href="overzicht.php?session=destroy">Verwijder sessie</a>
        <ul>
            <li>e-mail: <?= $_SESSION["gegevens"]["email"]?> | <a href="registratie.php">Wijzig</a></li>
            <li>nickname: <?= $_SESSION["gegevens"]["nickname"] ?> | <a href="registratie.php">Wijzig</a></li>       
            <li>straat: <?= $_SESSION["gegevens"]["straat"] ?> | <a href="adres.php">Wijzig</a></li>  
            <li>nummer: <?= $_SESSION["gegevens"]["nummer"] ?> | <a href="adres.php">Wijzig</a></li>  
            <li>gemeente: <?= $_SESSION["gegevens"]["gemeente"] ?> | <a href="adres.php">Wijzig</a></li>  
            <li>postcode: <?= $_SESSION["gegevens"]["postcode"] ?> | <a href="adres.php">Wijzig</a></li>  
        </ul>
    </body>
</html>
