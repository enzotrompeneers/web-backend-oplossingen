<?php 
	session_start();
	/*
	$dashboard = "dashboard.php";
    if (isset($_COOKIE["login"])) {
        header("Location: " . $dashboard);
    }
    */
	if (isset($_POST["submit"])) {
		$email = $_POST["email"];
		$passwordUser = $_POST["password"];
		$loginForm = "login-form.php";
		$dashboard = "dashboard.php";
		try {

			$servername = "localhost";
	        $username = "root";
	        $password = "root";
	        $dbname = "opdracht-file-upload";
	        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	        $srchQry = 'SELECT * FROM user WHERE email = :email LIMIT 1';
	        $statement = $db->prepare($srchQry);
	        $safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
	        $statement->bindParam(':email', $safeEmail);
	        $statement->execute();
	        $userFound = $statement->fetch(PDO::FETCH_ASSOC);
	        if (!$userFound) {
	        	$_SESSION['notification']['message'] = "user not found";
	    		header("Location: " . $loginForm); 
	    	}
	    	$salt = false;
	    	$hashed_password = false;
	    	foreach ($userFound as $key => $value) {
	    		if ($key === "salt") {
	    			$salt = $value;
	    		}
	    		if ($key === "hashed_password") {
	    			$hashed_password = $value;
	    		}
	    	}
	    	$safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
	    	if ($hashed_password === hash("SHA512", $passwordUser . $salt)) {
	    		$cookieValue = $safeEmail . ',' . hash("SHA512", $safeEmail . $salt);
				Setcookie('login', $cookieValue, time() +60*60*24*30); // 30 dagen
	    		header("Location: " . $dashboard);
	    	} else {
	    		$_SESSION['notification']['message'] = "wrong password";
	    		$_SESSION['register']['email'] = $email;
	    		header("Location: " . $loginForm); 

	    	}
		} catch (PDOException $e) {
        	echo "Foutboodschap: " . $e->getMessage();
    	}
	}
?>