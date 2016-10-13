<?php
    $aGetallen = array(1,2,3,4,5);
    $aGetallenRev =  array_reverse( $aGetallen );
    $aGetallenProduct = array_product($aGetallen);
    $arrayLen = count($aGetallen);
    
    $aOnevenGetallen;
    foreach($aGetallen as $value) {
        if ($value % 2 != 0) {
            $aOnevenGetallen[] = $value;
        }
    }

    $somArray = array();
    foreach ($aGetallen as $key => $getal) {
        $getal1 = $getal;
        $getal2 = $aGetallenRev[$key];
        $somArray[] = $getal1+$getal2;
    }
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

            <h1 class="extra">Opdracht arrays basis: deel 2</h1>
            <p>Array getallen:</p>
             <?php foreach ($aGetallen as $key => $value): ?>
                <p>aGetallen[<?= $key ?>]: <?= $value ?></p>
             <?php endforeach ?> <br>

              <p>Array getallen reverse:</p>
             <?php foreach ($aGetallenRev as $key => $value): ?>
                <p>aGetallenRev[<?= $key ?>]: <?= $value ?></p>
             <?php endforeach ?> <br>

              <p>Product van de getallen uit array 1: <?php echo $aGetallenProduct ?></p> <br>
            
              <p>De oneven getallen: </p>
              <?php foreach ($aOnevenGetallen as $key => $value): ?>
                <p>aOnevenGetallen[<?= $key ?>]: <?= $value ?></p>
             <?php endforeach ?> <br>

              <p>De getallen van beide arrays met elkaar opgeteld: </p>
              <?php foreach ($somArray as $key => $value): ?>
                <p>somArray[<?= $key ?>]: <?= $value ?></p>
             <?php endforeach ?>
            
        
        </section>

    </body>
</html>
