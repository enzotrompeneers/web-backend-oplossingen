<?php
    $jaartal = 16;
    $isSchrikkeljaar = false;
    if ($jaartal%4==0) {
        if ($jaartal%100==0) {
            if ($jaartal%400==0) {
                $isSchrikkeljaar = true;
            }
            else {
                $isSchrikkeljaar = false;
            }
        }
        else {
            $isSchrikkeljaar = true;
        }
    } 
    else {
        $isSchrikkeljaar = false;
    }
    
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
        
            <h1>Opdracht if else: deel 1</h1>
            <p>Het jaar <?php echo $jaartal ?> is <?php echo ($isSchrikkeljaar)? "wel":"niet" ?> een schrikkeljaar</p>
            
        </section>

    </body>
</html>
