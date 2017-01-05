<?php
    class Tonen {
        function showDatabase() {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "opdracht-mod-rewrite-blog";
            try {
                $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $selectQry = "SELECT * FROM artikels";
                $statement = $db->prepare($selectQry);
                $statement->execute();
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $artikels = false;
                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { // fetchAssoc !!! fetchRow geeft telkens een nummer!!!
                    $artikels[] = $row;
                }
                return $artikels;
               
            } catch (PDOException $e) {
                $_SESSION['notification'] ="Foutboodschap: " . $e->getMessage();
                header("Location: artikel-overzicht.php");
            }
        }
    }
?>