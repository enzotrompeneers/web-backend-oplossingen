<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "bieren";
    $isSubmitted = false;
    $msg = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        if (isset($_GET["delete"])) {
            $deleteBrouwerNr = $_GET["delete"];
            echo $deleteBrouwerNr;
            $deleteQuery = 'DELETE FROM brouwers WHERE brouwernr= $deleteBrouwerNr '; // getal lukt wel maar een variabele niet??? 
            $statement = $conn->prepare($deleteQuery);
            $isDeleted = $statement->execute();
            $msg = ($isDeleted ? " De datarij werd goed verwijderd" : " De datarij kon niet verwijderd worden. Probeer opnieuw.");

        }
        

        $selectQuery = 'SELECT * FROM brouwers';
        $statement = $conn->prepare($selectQuery);
        $statement->execute();

        $brouwers = array();
        while ($row = $statement->fetch( PDO::FETCH_ASSOC)) { 
            $brouwers[] = $row;
        }

        $theadNames = array();
        $theadNames[0] = "#";
        foreach($brouwers[0] as $key => $brouwer) {
            $theadNames[] = $key;
        }
        array_push($theadNames, "");
        // echo print_r($theadNames);


    }
    catch (PDOException $e) {
        $msg = "Foutboodschap: " . $e->getMessage() . " De datarij kon niet verwijderd worden. Probeer opnieuw.";
    }
    
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD delete</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <style>
            .odd
            {
                background: #F1F1F1;
            }
            .deleteImage {
                padding:0;
                background-color:transparent;
                border:none;
            }
        </style>
        <section class="body">
            <?php if ($msg != ""): ?>
                <?= $msg ?>
            <?php endif ?>
            <h1>Overzicht van de brouwers</h1>
            <form action="deel1.php" method="GET">
                <table>
                    <thead>
                        <tr>
                            <?php foreach ($theadNames as $name): ?>
                                <th><?= $name ?></th>
                            <?php endforeach ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($brouwers as $key => $brouwer): ?>
                            <tr class="<?= ($key % 2 === 0 )? "odd" : "" ?>">
                                <td><?= ++$key ?></td>
                                <?php foreach ($brouwer as $value): ?>
                                    <td><?= $value ?></td>
                                <?php endforeach ?>
                                <td>
                                    <button class="deleteImage" type="submit" name="delete" value="<?= $brouwer["brouwernr"] ?>">
                                        <img src="icon-delete.png" alt="delete">
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </form>
        </section>
    </body>
</html>
