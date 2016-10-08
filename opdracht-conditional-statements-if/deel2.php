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
    $upperDag = strtoupper($dag);
    $letter = "A";
    $dagMetKleineA = str_replace($letter, strtolower($letter), $upperDag );
    $laatsteAIndex    =   strrpos( $upperDag, $letter );
    $dagMetLaatsteKleineA = substr_replace($upperDag, strtolower($letter), $laatsteAIndex, 1)
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
    		<h1 class="extra">Opdracht conditional statements: deel 2</h1>
            <p>Getal is <?php echo $getal ?> en dat is <?php echo $upperDag ?></p>
            <p>Dag in hoofdletters met kleine letter a: <?php echo $dagMetKleineA ?></p>
            <p>Dag met laatste letter a in het klein: <?php echo $dagMetLaatsteKleineA ?></p>
            
        </section>

    </body>
</html>
