<?php

    session_start();


    if ( isset( $_GET['session'] ) )
    {
        if ( $_GET['session']  == 'destroy' )
        {
            session_destroy( );
            header( 'location: adres.php' );
        }
    }
    $focus = "";
    if(isset($_GET["focus"])) {
        $focus = $_GET["focus"];
    }


    if(isset($_POST["submit"])) {
        $_SESSION["gegevens"]["email"] = $_POST["email"];
        $_SESSION["gegevens"]["nickname"] = $_POST["nickname"];
    }
    
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
        
        <h1>Registratiegegevens</h1>
        <a href="adres.php?session=destroy">Verwijder sessie</a>
        <ul>
            <li>e-mail: <?= $email ?></li>
            <li>nickname: <?= $nickname ?></li>            
        </ul>
        <h2>Deel 2: adres</h2>
        <form action="overzicht.php" method="post">
            <ul>
                <li>
                    <label for="straat">straat</label>
                    <input type="text" id="straat" name="straat" value="<?= $straat ?>" <?= ( $focus == "straat" )? "autofocus" : "" ?>>
                </li>
                <li>
                    <label for="nummer">nummer</label>
                    <input type="text" id="nummer" name="nummer" value="<?= $nummer ?>" <?= ( $focus == "nummer" )? "autofocus" : "" ?>>
                </li>
                <li>
                    <label for="gemeente">gemeente</label>
                    <input type="text" id="gemeente" name="gemeente" value="<?= $gemeente ?>" <?= ( $focus == "gemeente" )? "autofocus" : "" ?>>
                </li>
                <li>
                    <label for="postcode">postcode</label>
                    <input type="text" id="postcode" name="postcode" value="<?= $postcode ?>" <?= ( $focus == "postcode" )? "autofocus" : "" ?>>
                </li>
            </ul>
            <input type="submit" name="submit" value="Volgende">
        </form>
    </body>
</html>
