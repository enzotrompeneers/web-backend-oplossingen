<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "bieren";
    $isSubmitted = false;

    $msg = "";
    if (isset($_GET["submit"])) {
       
        $brnaam = $_GET["brnaam"];
        $adres = $_GET["adres"];
        $postcode = $_GET["postcode"];
        $gemeente = $_GET["gemeente"];
        $omzet = $_GET["omzet"];
        $isSubmitted = true;
    }
    if ($isSubmitted) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $insertQuery = "INSERT INTO brouwers (brnaam, adres, postcode, gemeente, omzet)
                            VALUES ('$brnaam', '$adres', '$postcode', '$gemeente', '$omzet')"; // variabele ook tussen quotes !!!
            $statement = $conn->prepare($insertQuery);
            $statement->execute();
            $lastInsertId = $conn->lastInsertId();
            echo "Brouwerij succesvol toegevoegd. Het unieke nummer van deze brouwerij is " . $lastInsertId;
        }
        catch(PDOException $e ) {
            $msg = "Foutboodschap: " . $e->getMessage();
        }
    }
    
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht CRUD insert</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">         
            <h1>Voeg een brouwer toe</h1>
            <?php if ($msg != ""): ?>
                <?= $msg ?>
            <?php endif ?>
            <form action="deel1.php" method="GET">
                <ul>
                    <li>
                        <label for="brnaam">Brouwernaam</label>
                        <input type="text" id="brnaam" name="brnaam">
                    </li>
                    <li>
                        <label for="adres">adres</label>
                        <input type="text" id="adres" name="adres">
                    </li>
                    <li>
                        <label for="postcode">postcode</label>
                        <input type="text" id="postcode" name="postcode">
                    </li>
                    <li>
                        <label for="gemeente">gemeente</label>
                        <input type="text" id="gemeente" name="gemeente">
                    </li>
                    <li>
                        <label for="omzet">omzet</label>
                        <input type="text" id="omzet" name="omzet">
                    </li>
                </ul>
                <input type="submit" name="submit">
            </form>
        </section>     
    </body>
</html>
