<?php 
	session_start();
	try {
		if (isset($_POST['edit'])) {
			if (isset($_FILES['file'])) {
				if ((($_FILES["file"]["type"] == "image/gif")
				|| ($_FILES["file"]["type"] == "image/jpeg")
				|| ($_FILES["file"]["type"] == "image/png"))
				&& ($_FILES["file"]["size"] < 2000000)) { // max 2MB
					if ($_FILES["file"]["error"] > 0) {
						throw new Exception( "Return Code: " . $_FILES["file"]["error"] );
						header("Location: gegevens-wijzigen-form.php");
					} else {
						$filename = time()."_".$_FILES["file"]["name"];
						define('ROOT', dirname(__FILE__));
						$destination = ROOT . "/img/";
						
						while (file_exists($destination.$filename)) {
							$filename = time()."_".$_FILES["file"]["name"];
						}

						move_uploaded_file($_FILES["file"]["tmp_name"], $destination.$filename);
						$message['type']= 'success';
						$message['text']['upload'] = $_FILES["file"]["name"];
						$message['text']['type'] = $_FILES["file"]["type"];
						$message['text']['size'] = ( $_FILES["file"]["size"] / 1024 ) . 'kb';
						$message['text']['tmp_filename'] = $_FILES["file"]["tmp_name"];
						$message['text']['opgeslagen_in'] =	ROOT . "/img/" . $_FILES["file"]["name"];
						$_SESSION['notification'] = $message['text'];

						########  session notifcations bijwerken

						try {
							$email = $_POST["email"];

					        $servername = "localhost";
					        $username = "root";
					        $password = "root";
					        $dbname = "opdracht-file-upload";
					        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

					        
					        $updateQry = 'UPDATE user 
			                              SET profile_picture = :profilePicture
			                            WHERE email = :email ';
			                $statement = $db->prepare($updateQry);
			                $statement->bindValue(':profilePicture', $filename);
					        $statement->bindValue(':email', $email);
					        $statement->execute();
					        $_SESSION['notification']['message'] = "Gegevens werden succesvol gewijzigd";
					        header("Location: gegevens-wijzigen-form.php");
					       
					    } catch (PDOException $e) {
					        echo "Foutboodschap: " . $e->getMessage();
					    }
					}
				}
			}
		} else {
			throw new Exception( 'Ongeldig bestand' );
			header("Location: gegevens-wijzigen-form.php");
		}
	}
	catch(Exception $e) {
		$message[ 'type' ] = 'error';
		$message[ 'text' ] = $e->getMessage();
	}
?>