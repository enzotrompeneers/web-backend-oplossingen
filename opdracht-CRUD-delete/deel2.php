<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "bieren";

    $isSubmitted = false;
    $alertBox = false;
    $msg = "";
    $del = 0;
    $brouwerID = false;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        if (isset($_GET["delete"])) {
            $alertBox = true;
            $brouwerID = $_GET["delete"];
            echo 'btn Delete = brouwerid: '.$brouwerID;
        }
        echo 'temp = brouwerid: '.$brouwerID;

        if (isset($_GET["deleted"])) {
            echo 'btn Deleted = brouwerid: '.$brouwerID;
            $brouwerID = $_GET['deleted'];
            if ($_GET["deleted"]) {
                $deleteQuery = 'DELETE FROM brouwers WHERE brouwernr = :deleteBrouwerNr';
                $statement = $conn->prepare($deleteQuery);
                $statement->bindParam(':deleteBrouwerNr',  $brouwerID);
                $isDeleted = $statement->execute();
                $msg = ($isDeleted ? " De datarij werd goed verwijderd" : " De datarij kon niet verwijderd worden. Probeer opnieuw.");
                }
            else {
                $alertbox = false;
            }
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
            .odd {
                background: #F1F1F1;
            }
            .deleteImage {
                padding:0;
                background-color:transparent;
                border:none;
            }
            .redBox {
                color: #b94a48;
                background-color: #f2dede;
                border: 1px solid #eed3d7;
                margin: 5px 0px;
                padding: 5px;
                border-radius: 5px;
            }

        </style>
        <section class="body">
            <h1>Overzicht van de brouwers</h1>
            <?php if ($msg != ""): ?>
                <?= $msg ?>
            <?php endif ?>
            <?php if ($alertBox): ?>
                <div class="redBox">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
                        <p>Bent u zeker dat u deze datarij wil verwijderen?</p>
                        <button type="submit" name="deleted" value="<?= $brouwerID ?>">Ja</button>
                        <button type="submit">Nee</button>
                    </form>
                </div>
            <?php endif ?>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
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
                            <tr class=" <?= ($key % 2 === 0 )? "odd" : "" ?>  <?= ($brouwer["brouwernr"] == $brouwerID)? "redBox" : "" ?>">
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
