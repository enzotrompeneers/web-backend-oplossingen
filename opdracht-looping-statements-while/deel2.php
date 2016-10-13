<?php
    $aBoodschappenLijstje = array("brood", "vlees", "vis", "saus");
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht while</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">  
        <h1>Opdracht while: deel 2</h1>
        <ul>
            <?php foreach($aBoodschappenLijstje as $value) {?><li><?php echo $value;?></li><?php }?>
        </ul>
        </section>
    </body>
</html>
