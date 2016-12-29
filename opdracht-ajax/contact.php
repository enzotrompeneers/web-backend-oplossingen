<?php
	session_start();

	function __autoload($className) { 
        include_once "classes/" . $className . ".php";
    }

	if (isset($_POST['submit'])) {
		$email = $_POST['email'];
		$message = $_POST['message'];
		$copy = (isset($_POST['copy']))? true : false;

		$_SESSION['form']['email'] = $email;
        $_SESSION['form']['message'] = $message;
        $_SESSION['form']['copy'] = $copy;

		if (!$email || !$message) {
			$_SESSION['notification'] = "niet alle velden zijn ingevuld";
			header('location: contact-form.php');
		} else {
			$send = new SendForm();
			$send->insertDatabase($email, $message);
			$send->mailTo($email, $message, $copy);

			$_SESSION['notification'] = "mail is verzonden";
			unset($_SESSION['form']);
	        header("Location: contact-form.php");
		}

		


		

	}

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
            header("Location: contact-form.php");
        }
	}
?>