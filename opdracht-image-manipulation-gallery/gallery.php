<?php
	try {
		$servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "opdracht-gallery";
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $srchQry = 'SELECT * FROM gallery WHERE is_archived = 1';
        $statement = $db->prepare($srchQry);
        $statement->execute();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { // fetchAssoc !!! fetchRow geeft telkens een nummer!!!
        	$pictures[] = $row;
    	}
    } catch (PDOException $e) {
    	echo "Foutboodschap: " . $e->getMessage();
	}

	function getThumbnailPicture($picture) {
		$pieces = explode(".", $picture);
		return "uploads/img/thumbs/".$pieces[0].'_thumbs.'.$pieces[1];
	}

?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>gallery</title>
    <link rel="stylesheet" href="http://web-backend.local/css/global.css">
    <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
</head>

<body class="web-backend-opdracht">

	<section class="body">

		<h1>Fotogallerij</h1>

		<a href="photo-upload-form.php">Foto toevoegen</a><br><br>
		<?php foreach($pictures as $picture): ?>
			<a href="uploads/img/<?= $picture['file_name'] ?>">
				<img src="<?= getThumbnailPicture($picture['file_name']) ?>" alt="<?= $picture['title'] ?>"><br>
			</a>
			<figcaption><?= $picture['caption'] ?></figcaption>
			<form action="photo-delete.php" method="POST">
				<input type="hidden" name="id" value="<?= $picture['id'] ?>">
				<input type="hidden" name="file_name" value="<?= $picture['file_name'] ?>">
				<input type="submit" name="submit" value="Verwijderen">
			</form><hr>
		<?php endforeach ?>
	</section>

</body>
</html>