<?php

	

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