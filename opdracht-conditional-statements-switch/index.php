<?php
    $getal = 4;
    switch($getal) {
        case 1:
            $dag = "maandag";
            break;
        case 2:
            $dag = "dinsdag";
            break;
        case 3:
            $dag = "woensdag";
            break;
        case 4:
            $dag = "donderdag";
            break;
        case 5:
            $dag = "vrijdag";
            break;
        case 6:
            $dag = "zaterdag";
            break;
        case 7:
            $dag = "zondag";
            break;
        default:
            $dag = "geen bestaande dag";
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht switch</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht switch: deel 1</h1>
            <p><?php echo $dag ?></p>

            

        </section>

    </body>
</html>
