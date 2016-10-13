<?php
    $aDieren = array("vogel", "hond", "kat", "schildpad", "varken");
    $aDieren[] = "aap";
    $aDieren[] = "krokodil";
    $aDieren[] = "schaap";
    $aDieren[] = "lama";
    $aDieren[] = "kameel";

    $aVoertuigen["audi"] = array("a1", "a2", "a3", "a4", "a5", "a6", "a7", "a8");
    $aVoertuigen["volkswagen"] = array("golf1", "golf2", "golf3", "golf4", "golf5", "golf6", "golf7");
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht arrays basis</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht arrays basis: deel 1</h1>
            <pre><?php var_dump($aDieren) ?></pre>
            <pre><?php print_r($aVoertuigen) ?></pre>
            
        </section>

    </body>
</html>
