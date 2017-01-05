<?php
    class Toevoegen {
        function insertDatabase($titel, $artikel, $kernwoorden, $datum) {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "opdracht-mod-rewrite-blog";
            try {
                $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $insertQry = "INSERT INTO artikels (titel, artikel, kernwoorden, datum)
                                VALUES ('$titel', '$artikel', '$kernwoorden', '$datum')";
                $statement = $db->prepare($insertQry);
                $statement->execute();
               
            } catch (PDOException $e) {
                $_SESSION['notification'] ="Foutboodschap: " . $e->getMessage();
                header("Location: artikel-toevoegen-form.php");
            }
        }
    }
?>