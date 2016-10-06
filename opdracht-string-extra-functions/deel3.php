<?php
    $lettertje = "e";
    $cijfertje = 3;
    $langsteWoord = "zandzeepsodemineralenwatersteenstralen";
    $veranderWoord	= str_replace( $lettertje, $cijfertje, $langsteWoord)
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht string extra functions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht string extra functions: deel 3</h1>
            <p>Het woord is: <?php echo $langsteWoord ?></p>
            <p>Verander alle 'e'-letters in het cijfer 3: <?php echo $veranderWoord ?></p>
        </section>

    </body>
</html>