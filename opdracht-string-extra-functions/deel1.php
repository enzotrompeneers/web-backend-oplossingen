<?php
    $fruit = "kokosnoot";
    $lenFruit = strlen($fruit);
    $letter = "o";
    $oPositie = strpos($fruit, $letter)
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
        
            <h1>Opdracht string extra functions: deel 1</h1>
            <p>Fruit: <?php echo $fruit ?></p>
            <p>Lengte van fruit: <?php echo $lenFruit ?></p>
            <p>Zoek de letter: <?php echo $letter ?></p>
            <p>Indexpositie is: <?php echo $oPositie ?></p>
        </section>

    </body>
</html>
