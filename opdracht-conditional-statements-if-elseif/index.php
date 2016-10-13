<?php
    $getal = 33;
    $ondergrens = 0;
    $bovengrens = 0;
    
    if ($getal>= 0 && $getal < 10) {$ondergrens=0;$bovengrens=10;}
    elseif ($getal>= 10 && $getal < 20) {$ondergrens=10;$bovengrens=20;}
    elseif ($getal>= 20 && $getal < 30) {$ondergrens=20;$bovengrens=30;}
    elseif ($getal>= 30 && $getal < 40) {$ondergrens=30;$bovengrens=40;}
    elseif ($getal>= 40 && $getal < 50) {$ondergrens=40;$bovengrens=50;}
    elseif ($getal>= 50 && $getal < 60) {$ondergrens=50;$bovengrens=60;}
    elseif ($getal>= 60 && $getal < 70) {$ondergrens=60;$bovengrens=70;}
    elseif ($getal>= 70 && $getal < 80) {$ondergrens=70;$bovengrens=80;}
    elseif ($getal>= 80 && $getal < 90) {$ondergrens=80;$bovengrens=90;}
    elseif ($getal>= 90 && $getal < 100) {$ondergrens=90;$bovengrens=100;}

    $tekst = "het getal ".$getal." ligt tussen ".$ondergrens." en ".$bovengrens;
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht if else if</title> 
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht if else if: deel 1</h1>
            <p><?php echo $tekst ?></p>
             
        
        </section>

    </body>
</html>
