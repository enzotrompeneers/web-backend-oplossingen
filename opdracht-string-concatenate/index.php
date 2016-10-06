<?php
    $voornaam = "enzo";
    $naam = "trompeneers";
    $volledigeNaam = $voornaam . " " . $naam;
    $lenVolledigeNaam = strlen($volledigeNaam)
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht string concatenate</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
    		<h1>Opdracht string concatenate: deel 1</h1>
            <p>Naam: <?php echo $volledigeNaam ?></p>
            <p>Aantal karakters: <?php echo $lenVolledigeNaam ?></p>
            

        </section>

    </body>
</html>
