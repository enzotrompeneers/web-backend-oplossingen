<?php
	session_start();
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
		}

		$admin = "trompeneers@telenet.be";
		$headers = 'From: '. $email;
		$headers .=	'Reply-To: ' . $email  . "\r\n";
		$headers .= 'MIME-Version: 1.0'. "\r\n";
		$headers .= 'Content-Type: text/html; charset=ISO-8859-1';

		insertDatabase($email, $message);
		if ($copy) {
			mail( $email, $message, $message, $headers );
		} 

		mail( $admin, $message, $message, $headers );
		$_SESSION['notification'] = "mail is verzonden";
		unset($_SESSION['form']);
        header("Location: contact-form.php");


		

	}

	function insertDatabase($email, $message) {
		$servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "opdracht-mail";
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