<?php
    function __autoload($className) { 
        include_once "Classes/" . $className . ".php";
    }
    $penguin = new Animal("pingu", "male", "75");
    $penguin->changeHealth(10);
    $lion = new Animal("bas", "male", "95");
    $lion->changeHealth(-5);
    $zebra = new Animal("kelly", "female", "80");
    $zebra->changeHealth(5);

    $simba = new Lion("simba", "male", "65", "congo lion");
    $scar = new Lion("scar", "female", "85", "kenia lion");

    $zeke = new Zebra("zeke", "female", "75", "quagga");
    $zana = new Zebra("zana", "female", "55", "selous");

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht classes: extends</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
            
            <h1>Instanties van de Animal class</h1>
            <p>
                <?= $penguin->getName() ?> is van het geslacht <?= $penguin->getGender() ?> en heeft momenteel <?= $penguin->getHealth() ?> levenspunten
                (special move: <?= $penguin->doSpecialMove() ?>)<br>
                <?= $lion->getName() ?> is van het geslacht <?= $lion->getGender() ?> en heeft momenteel <?= $lion->getHealth() ?> levenspunten
                (special move: <?= $lion->doSpecialMove() ?>)<br>
                <?= $zebra->getName() ?> is van het geslacht <?= $zebra->getGender() ?> en heeft momenteel <?= $zebra->getHealth() ?> levenspunten
                (special move: <?= $zebra->doSpecialMove() ?>)<br>
            </p>
            <p>
                De speciale move van <?= $simba->getName() ?> (soort: <?= $simba->getSpecies() ?>):  <?= $simba->doSpecialMove()?> <br>
                De speciale move van <?= $scar->getName() ?> (soort: <?= $scar->getSpecies() ?>):  <?= $scar->doSpecialMove()?> 
            </p>
            <p>
                De speciale move van <?= $zeke->getName() ?> (soort: <?= $zeke->getSpecies() ?>):  <?= $zeke->doSpecialMove()?> <br>
                De speciale move van <?= $zana->getName() ?> (soort: <?= $zana->getSpecies() ?>):  <?= $zana->doSpecialMove()?> 
            </p>
            
        </section>
        
    </body>
</html>

