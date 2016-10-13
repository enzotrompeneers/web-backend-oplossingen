<?php 
    $aGetallen = array();
    $aantal = 101;
    $i = 0;
    while ($i < $aantal) {
        $aGetallen[] = $i;
        ++$i;
    }
    $getallenReeks = implode(", ", $aGetallen);

    $aSpecifiekeGetallen = array();
    foreach ($aGetallen as $value) {
        if ($value%3==0 && $value>40 && $value < 80) {
            $aSpecifiekeGetallen[] = $value;
        } 
    }
    $getallenReeks2 = implode(", ", $aSpecifiekeGetallen);
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
        
            <h1>Opdracht while: deel 1</h1>
            <p>Getallen 1 - 100:</p>
            <p><?php echo $getallenReeks ?></p> <br>
            <p>Getallen deelbaar door 3 tussen 40 en 80</p>
            <p><?php echo  $getallenReeks2 ?></p>
        </section>
    </body>
</html>
