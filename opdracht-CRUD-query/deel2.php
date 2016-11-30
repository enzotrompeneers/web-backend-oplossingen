<?php
    $msg = "";
    $id = 1;
    try {
        $db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root', array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // Connectie maken
        $querystr = 'SELECT brouwernr, brnaam 
                     from brouwers 
                     ';
        $statement = $db->prepare($querystr);
        $statement->execute();
        $brouwers = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { // fetchAssoc !!! fetchRow geeft telkens een nummer!!!
            $brouwers[] = $row;
        }

         $querystr = 'SELECT brnaam 
                     from brouwers 
                     ';
        $statement = $db->prepare($querystr);
        $statement->execute();
        $brouwerijNamen = array();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { 
            $brouwerijNamen[] = $row;
        }

        if (isset($_GET["submit"] ) )
        {
            if (isset($_GET["brouwerijNaam"] ) ) {
                $gekozenBrouwer = $_GET["brouwerijNaam"];
                echo $gekozenBrouwer;
            }

        }


    }
    catch ( PDOException $e ) {
        $msg = "Foutboodschap: " . $e->getMessage();
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
            <h1>deel 2:</h1>
            <form action="deel2.php" method="GET">
               <select name="brouwerijNaam">
                <?php foreach ($brouwerijNamen as $brouwerij): ?>
                    <?php foreach ($brouwerij as $value): ?>
                        <option value="<?= $value ?>" > <?= $value ?> </option>
                    <?php endforeach ?>
                <?php endforeach ?>
              </select>
              <input type="submit" name="submit" value="Geef mij alle bieren van deze brouwerij">
            </form> 

            <?php if ($msg != ""): ?>
                <?= $msg ?>
            <?php endif ?>


            <table>
                <thead>
                    <tr>
                        <th>Aantal</th>
                        <th>Naam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($brouwers as $brouwer): ?>
                    <tr>
                        <?php for ($i = 1; $i < 2; $i++): ?>
                            <?php foreach ($brouwer as $value): ?>
                                <td><?= $value ?></td>
                            <?php endforeach ?>
                        <?php endfor ?>
                    </tr>
                 <?php endforeach ?>
                </tbody>
            </table>
        </section>  
    </body>
</html>