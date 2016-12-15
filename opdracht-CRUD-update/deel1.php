<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "bieren";

    $isSubmitted = false;
    $alertBox = false;
    $brouwerID = false;
    $msg = "";
    $h1Tekst = "";
    $showEdit = false;
    $editBrouwer = array();


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        
        if (isset($_GET["edit"])) {
            if ($_GET["edit"] > -1) {
                $searchQuery = 'SELECT * FROM brouwers WHERE brouwernr = :brouwerNr';
                $statement = $conn->prepare($searchQuery);
                $statement->bindParam(':brouwerNr', $_GET['edit']);
                $statement->execute();
                $editSucces = $editBrouwer = $statement->fetch( PDO::FETCH_ASSOC);           
                $h1Tekst = "Brouwerij " . $editBrouwer["brnaam"] . " (# " . $editBrouwer["brouwernr"] . ") wijzigen";
                $showEdit = true;
                $brouwerID = $_GET["edit"];
            }
            else {
                $msg = "Deze brouwerij werd niet gevonden.";
            }
        }

        if (isset($_GET["edited"])) {
            $updateQuery = 'UPDATE brouwers 
                            SET brnaam = :brnaam,
                                adres = :adres,
                                postcode = :postcode,
                                gemeente = :gemeente,
                                omzet = :omzet
                            WHERE brouwernr = :brouwernr ' ;
            $statement = $conn->prepare($updateQuery);
            $statement->bindValue(':brouwernr', $_GET['brouwernr']);
            $statement->bindValue(':brnaam', $_GET['brnaam']);
            echo $_GET['brnaam'];

            var_dump($_GET);
            $statement->bindParam(':adres', $_GET['adres']);
            $statement->bindParam(':postcode', $_GET['postcode']);
            $statement->bindParam(':gemeente', $_GET['gemeente']);
            $statement->bindParam(':omzet', $_GET['omzet']);
            $isEdited = $statement->execute();
            $msg = ($isEdited ? ' Aanpassing succesvol doorgevoerd.' : ' Aanpassing is niet gelukt. Probeer opnieuw of neem contact op met de <a href="mailto:trompeneers@telenet.be">systeembeheerder</a>. wanneer deze fout blijft aanhouden.');
            
        }
        

        if (isset($_GET["delete"])) {
            $alertBox = true;
            $brouwerID = $_GET["delete"];
        }

        if (isset($_GET["deleted"])) {
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
        array_push($theadNames, "", "");
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
        <title>Opdracht CRUD update</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <style>
            }
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
        <section>
            <?php if ($showEdit): ?>
                <h1><?=  $h1Tekst ?></h1>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="GET">
                <?= $editBrouwer["brnaam"] ?>
                <ul>
                <li><input type="hidden" name="brouwernr" value="<?= $brouwerID ?>"></li>
                    <?php foreach ($editBrouwer as $key => $value): ?>
                        <?php if ( $key != "brouwernr" ): ?>
                             <li>
                                <label for="<?= $key ?>"><?= $key ?></label>
                                <input type="text" id="<?= $key ?>" name="<?= $key ?>" value="<?= $value ?>">
                            </li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
                <input type="submit" name="edited" value="wijzigen">
            </form>
            <?php endif ?>
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
                                <td>
                                    <button class="deleteImage" type="submit" name="edit" value="<?= $brouwer["brouwernr"] ?>">
                                        <img src="icon-edit.png" alt="edit">
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
