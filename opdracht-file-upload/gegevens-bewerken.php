<?php 
	try {
		if (isset($_POST['edit'])) {
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
				}
			} else {
				throw new Exception( 'Ongeldig bestand' );
				header("Location: gegevens-wijzigen-form.php");
			}
		}
	}
	catch(Exception $e) {
		$message[ 'type' ] = 'error';
		$message[ 'text' ] = $e->getMessage();
	}
?>