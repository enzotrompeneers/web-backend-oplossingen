<?php
    $aDieren = array("vogel", "hond", "kat", "schildpad","kameel" );
    $arrayLen = count($aDieren);
    $teZoekenDier = "schaap";
    if (in_array($teZoekenDier, $aDieren)) {
        $tekst = "gevonden";
    } else {
        $tekst = "niet gevonden";
    }
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
            
            <h1>Opdracht array functies: deel 1</h1>
            <p>Lengte van de array: <?php echo $arrayLen ?></p>
            <p>Het dier: <?php echo $teZoekenDier ?> is <?php echo $tekst ?> in de array dieren </p>
            

        </section>

    </body>
</html>
