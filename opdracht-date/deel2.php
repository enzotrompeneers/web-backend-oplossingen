<?php
    # 22u 35m 25sec 21 januari 1904 om naar een timestamp
    $timestamp = mktime(22, 35, 25, 01, 21, 1904);
    # %P voor kleine pm werkt niet daarom %p voor grote PM
    $localDatum =  strftime('%d %B %Y, %I:%M:%S %p', $timestamp);
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht date</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
            <h1>Opdracht date: deel 2</h1>
            <p><?= $localDatum ?></p>
            
        </section>
    </body>
</html>
