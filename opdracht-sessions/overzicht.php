<?php
 
    session_start();
    if( isset( $_GET['session'] )) {
         session_destroy();
        header("Location: overzicht.php");
     }

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

    $_SESSION["gegevens"]["straat"] = $straat;
    $_SESSION["gegevens"]["nummer"] = $nummer;
    $_SESSION["gegevens"]["gemeente"] = $gemeente;
    $_SESSION["gegevens"]["postcode"] = $postcode;

    $email = (isset($_SESSION["gegevens"]["email"]))? $_SESSION["gegevens"]["email"] : "";
    $nickname = (isset($_SESSION["gegevens"]["nickname"]))? $_SESSION["gegevens"]["nickname"] : "";
    $straat = (isset($_SESSION["gegevens"]["straat"]))? $_SESSION["gegevens"]["straat"] : "";
    $nummer = (isset($_SESSION["gegevens"]["nummer"]))? $_SESSION["gegevens"]["nummer"] : "";
    $gemeente = (isset($_SESSION["gegevens"]["gemeente"]))? $_SESSION["gegevens"]["gemeente"] : "";
    $postcode = (isset($_SESSION["gegevens"]["postcode"]))? $_SESSION["gegevens"]["postcode"] : "";
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
            <li>e-mail: <?= $email ?> | <a href="registratie.php?focus=email">Wijzig</a></li>
            <li>nickname: <?= $nickname ?> | <a href="registratie.php?focus=nickname">Wijzig</a></li>       
            <li>straat: <?= $straat ?> | <a href="adres.php?focus=straat">Wijzig</a></li>  
            <li>nummer: <?= $nummer ?> | <a href="adres.php?focus=nummer">Wijzig</a></li>  
            <li>gemeente: <?= $gemeente ?> | <a href="adres.php?focus=gemeente">Wijzig</a></li>  
            <li>postcode: <?= $postcode ?> | <a href="adres.php?focus=postcode">Wijzig</a></li>  
        </ul>
    </body>
</html>
