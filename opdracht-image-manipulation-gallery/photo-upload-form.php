<?php
    session_start();
    $messages = false;
    if (isset($_SESSION['messages'])) {
        $messages = $_SESSION['messages'];
       
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
	<section class="body"><br>
        <a href="gallery.php">Terug naar gallery</a>
		<h1>Foto uploaden</h1>
        <?php if($messages): ?>
            <ul>
                <li><?= $messages ?></li>
            </ul>
        <?php endif ?>
		<form action="photo-upload.php" method="POST" enctype="multipart/form-data">
            <label for="picture">Bestand uploaden</label>
            <input type="file" name="picture" id="picture"> 
            <label for="title">Titel</label>
            <input type="text" id="title" name="title">
            <label for="caption">beschrijving</label>
            <input type="text" id="caption" name="caption"><br>
            <input type="submit" name="submit" value="verzenden">
        </form>
	</section>

</body>
</html>