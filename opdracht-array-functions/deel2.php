<?php
    $aDieren = array("vogel", "hond", "kat", "schildpad","kameel" );
    asort($aDieren);
    $aZoogdieren = array("mol", "vleermuis", "ekhoorn");
    $aDierenLijst = array_merge($aDieren, $aZoogdieren);
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht array functies</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">

            <h1 class="extra">Opdracht array functies: deel 2</h1>
            <p>Gesorteerde array dieren by value:</p>
            <pre><?php  print_r($aDieren) ?></pre>
            <p>Dierenlijst:</p>
            <pre><?php print_r($aDierenLijst) ?></pre>
        </section>

    </body>
</html>
