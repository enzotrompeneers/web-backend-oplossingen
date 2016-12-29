<?php
    class SendForm {
        function insertDatabase($email, $message) {
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "opdracht-ajax";
            try {
                $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                $insertQry = "INSERT INTO contact_messages (email, message, time_sent)
                                VALUES ('$email', '$message', CURRENT_TIMESTAMP)";
                $statement = $db->prepare($insertQry);
                $statement->execute();
               
            } catch (PDOException $e) {
                $_SESSION['notification'] ="Foutboodschap: " . $e->getMessage();
            }
        }
        function mailTo($email, $message, $copy) {
            $admin = "trompeneers@telenet.be";
            $headers = 'From: '. $email;
            if ($copy) {
                mail( $email, $message, $message, $headers );
            } 
            mail( $admin, $message, $message, $headers );
        }
    }
?>