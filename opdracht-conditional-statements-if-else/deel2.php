<?php
    $seconden = 221108521; 

    $minuut = 60;
    $uur = $minuut * 60;
    $dag = $uur * 24;
    $week = $dag * 7;
    $maand = $dag * 31;
    $jaar = $dag * 365;

    $minuten = floor($seconden/$minuut);
    $uren = floor($seconden/$uur);
    $dagen = floor($seconden/$dag);
    $weken = floor($seconden/$week);
    $maanden = floor($seconden/$maand);
    $jaren = floor($seconden/$jaar);

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
    		<h1 class="extra">Opdracht if else: deel 2</h1>
            <p><?php echo $seconden ?> seconden zijn:</p>
            <p><?php echo $minuten?> minuten</p>
            <p><?php echo $uren?> uren</p>
            <p><?php echo $dagen?> dagen</p>
            <p><?php echo $weken?> weken</p>
            <p><?php echo $maanden?> maanden</p>
            <p><?php echo $jaren?> jaren</p>

        </section>

    </body>
</html>
