<?php
    $msg = "";
    $id = 1;
    try {
        $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
        $querystr = 'SELECT * 
                     from bieren 
                     JOIN brouwers 
                     ON bieren.brouwernr = brouwers.brouwernr
                     WHERE bieren.naam LIKE "du%"
                     AND brouwers.brnaam LIKE "%a%"   
                     ';
        $statement = $db->prepare($querystr);
        $statement->execute();

        $bieren = array();
        while ($row = $statement->fetch( PDO::FETCH_ASSOC)) { // fetchAssoc !!! fetchRow geeft telkens een nummer!!!
            $bieren[] = $row;
        }
        $bierenLength = count($bieren);

        $theadNames = array();
        $theadNames[0] = "#";
        foreach($bieren[0] as $key => $bier) {
            $theadNames[] = $key;
        }
    }
    catch ( PDOException $e ) {
        $msg = "Foutboodschap: " . $e.getMessage();
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD query</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <style>
            .odd {
                background-color: #F1F1F1;
            }
        </style>
        <section class="body">
        <h1>Overzicht van de bieren</h1>
        <?php if ($msg != ""): ?>
            <?= $msg ?>
        <?php endif ?>
            <table>
                <thead>
                    <tr>
                        <?php foreach ($theadNames as $name): ?>
                            <th><?= $name ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bieren as $bier): ?>
                        <tr class="<?= ($id % 2 === 0 )? "" : "odd" ?>">
                            <td><?= $id++ ?></td>
                            <?php foreach ($bier as $value): ?>
                                <td><?= $value ?></td>
                            <?php endforeach ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </section>  
    </body>
</html>
