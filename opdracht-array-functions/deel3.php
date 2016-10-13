<?php
    $aGetallen = array(8,7,8,7,3,2,1,2,4);
    $aGetallenUniek = array_unique($aGetallen);
    arsort($aGetallenUniek);
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

            <h1 class="extra">Opdracht array functies: deel 3</h1>

            <p>Duplicaten weg en gesorteerd van hoog naar klein:</p>
            <pre><?php print_r($aGetallenUniek) ?></pre>

        </section>

    </body>
</html>
