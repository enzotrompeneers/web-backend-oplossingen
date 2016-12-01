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

        $gekozenBrouwerNr = 0;
        $bieren = array();
        if (isset($_GET["submit"] ) )
        {
            if (isset($_GET["brouwerijNr"] ) ) {
                $gekozenBrouwerNr = $_GET["brouwerijNr"];
                //echo $gekozenBrouwerNr;

                $querystr  =   'SELECT naam
                                FROM bieren 
                                WHERE brouwernr = :brouwernr
                                ';
                $statement = $db->prepare($querystr);
                $statement->bindParam(":brouwernr", $gekozenBrouwerNr, PDO::PARAM_INT);
                $statement->execute();

                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { // fetchAssoc !!! fetchRow geeft telkens een nummer!!!
                    $bieren[] = $row["naam"]; // heel de rij niet dus ['naam'] enkel
                }
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

                <select name="brouwerijNr">
                    <?php foreach ($brouwers as $key => $brouwer): ?>
                        <option value="<?= $brouwer['brouwernr'] ?>" <?= ($gekozenBrouwerNr === $brouwer["brouwernr"])? "selected": "" ?>><?= $brouwer['brnaam'] ?></option>
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
                    <?php foreach ($bieren as $key => $bier): ?>
                    <tr class="<?= ($key % 2 === 0 )? "" : "odd" ?>">
                            <td><?= ++$key ?></td>
                            <td><?= $bier ?></td>
                    </tr>
                 <?php endforeach ?>
                </tbody>
            </table>
        </section>  
    </body>
</html>