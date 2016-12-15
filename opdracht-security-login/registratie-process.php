<?php
	
	$registratieForm = "registratie-form.php";
	$dashboard = "dashboard.php";
	session_start();
	if (isset($_POST["generatePassword"])) {
		$rndPassword = generatePassword(true, true, true, false, 8);
		$_SESSION["register"]["email"] = $_POST["email"];
		$_SESSION["register"]["password"] = $rndPassword;
		header("Location: " . $registratieForm);
	}
	if (isset($_POST["submit"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];
		$validEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
		$validPassword = ($password != "");
		if ($validEmail) {
			unset($_SESSION["notification"]["email"]);
			$_SESSION["register"]["email"] = $email;
			$_SESSION["register"]["password"] = $password;
		} else {
			$_SESSION["notification"]["email"] = "email is not valid";
			header("Location: " . $registratieForm);
		}
		if ($validPassword) {
			unset($_SESSION["notification"]["password"]);
		} else {
			$_SESSION["notification"]["password"] = "password is empty";
			header("Location: " . $registratieForm);
		}
		// controleren of email al in db zit
		try {
			$servername = "localhost";
		    $username = "root";
		    $password = "root";
		    $dbname = "opdracht-security-login";
        	$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        	$srchQry = 'SELECT * FROM user WHERE email = :email ';
        	$statement = $db->prepare($srchQry);
        	$safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
            $statement->bindParam(':email', $safeEmail);
            $statement->execute();
            if ($statement->fetch(PDO::FETCH_ASSOC)) {
            	$_SESSION["notification"]["email"] = "email already exists";
            	header("Location: " . $registratieForm);
            } else {
            	$safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
            	$salt = uniqid(mt_rand(), true);
            	$hash = $_SESSION["register"]["password"].$salt;
	            $hashed_password = hash('sha512', $hash);
	            $last_login_time = date("Y-m-d H:i:s");
            	
            	$addQry = 'INSERT INTO user (email, salt, hashed_password, last_login_time) 
            			VALUES (:email, :salt, :hashed_password, :last_login_time) ';
	        	$statement = $db->prepare($addQry);       	
	            $statement->bindParam(':email', $safeEmail);	            
	            $statement->bindParam(':salt', $salt);	           
	            $statement->bindParam(':hashed_password', $hashed_password);
	            $statement->bindParam(':last_login_time', $last_login_time);
	            $statement->execute();
	            unset($_SESSION['register']);

	            $cookieValue = $safeEmail . ',' . hash("SHA512", $safeEmail . $salt);
				Setcookie('login', $cookieValue, time() +60*60*24*30); // 30 dagen
				header("Location: " . $dashboard);
            }
        } catch (PDOException $e) {
        	echo "Foutboodschap: " . $e->getMessage();
    	}
	}

	function generatePassword($allowedLetters, $allowedLettersUpper, $allowedNumbers, $allowedSpecialSigns, $passwordLength) {
		$allowedChars = "";
		$letters = 'abcdefghijklmnopqrstuvwxyz';
		$lettersUpper = mb_strtoupper($letters);
		$numbers = '0123456789';
		$specialSigns = '!@#$%&*()_-+/?.';

		if ($allowedLetters) {
			$allowedChars .= $letters;
		}
		if ($allowedLettersUpper) {
			$allowedChars .= $lettersUpper;
		}
		if ($allowedNumbers) {
			$allowedChars .= $numbers;
		}
		if ($allowedSpecialSigns) {
			$allowedChars .= $specialSigns;
		}

	    $password = array();
	    $allowedCharsLength = strlen($allowedChars)-1;
	    for ($i = 0; $i < $passwordLength; $i++) {
	        $n = rand(0, $allowedCharsLength);
	        $password[] = $allowedChars[$n];
	    }
	    return implode($password); // array to string
	}
?>