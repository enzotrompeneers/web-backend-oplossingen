<?php
    $getal = 1;
    $dag = "";
    if ($getal == 1) {
        $dag = "maandag";
    }
    if ($getal == 2) {
        $dag = "dinsdag";
    }
    if ($getal == 3) {
        $dag = "woensdag";
    }
    if ($getal == 4) {
        $dag = "donderdag";
    }
    if ($getal == 5) {
        $dag = "vrijdag";
    }
    if ($getal == 6) {
        $dag = "zaterdag";
    }
    if ($getal == 7) {
        $dag = "zondag";
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht conditional statements</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht conditional statements: deel 1</h1>

            <p>Getal is <?php echo $getal ?> en dat is <?php echo $dag ?></p>
            
        </section>

    </body>
</html>
