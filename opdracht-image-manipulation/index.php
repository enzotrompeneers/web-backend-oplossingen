<?php
	$msg = false;
	if (isset($_POST['submit'])) {
		if (isset($_FILES['picture'])) {
			$picture = $_FILES['picture'];
			$pictureName = $picture["name"];
			if ((($picture["type"] == "image/gif")
			|| ($picture["type"] == "image/jpeg")
			|| ($picture["type"] == "image/png"))
			&& ($picture["size"] < 5000000)) {

				pictureToFile($pictureName);
				convertToJpeg($pictureName);


			} else {
				$msg = "ongeldig bestand";
			}
		} else {
			$msg = "geen foto gekozen";
		}
	}

	function pictureToFile ($pictureName) {
		define('ROOT', dirname(__FILE__));
		$destination = ROOT . "/img/";
		move_uploaded_file($_FILES["picture"]["tmp_name"], $destination.$pictureName);
	}

	function convertToJpeg ($picture) {
		$fileParts = pathinfo($picture);
		$fileName = $fileParts['filename'];
		$ext = strtolower($fileParts['extension']);
		$folder = "img/";
		switch ($ext)
		{
			case ('jpg'):
			case ('jpeg'):
				$source = imagecreatefromjpeg($folder.$picture);
				break;
			case ('png'):
				$source = imagecreatefrompng($folder.$picture);
				break;
			case ('gif'):
				$source = imagecreatefromgif($folder.$picture);
				break;
		}
		imagejpeg($source, $folder.$fileName.'.jpeg', 70);
		imagedestroy($source);
	}

	

?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>image manipulation</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
</head>

<body class="web-backend-opdracht">

	<section class="body">

		<h1>thumbnail genereren</h1>
		<?php if($msg): ?>
			<p><?= $msg ?></p>
		<?php endif ?>
		<form action="index.php" method="POST" enctype="multipart/form-data">
            <label for="picture">Foto kiezen:</label>
            <input type="file" name="picture" id="picture"> <br><br>
            <input type="submit" name="submit" value="verzenden">
        </form>

		


	</section>

</body>
</html>