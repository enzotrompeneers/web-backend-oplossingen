<?php
    session_start();

    if (isset($_COOKIE["login"])) {
        $login = $_COOKIE['login'];
        $user = explode(",", $login);
        $email = $user[0];
    }  
    try {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "opdracht-file-upload";
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $srchQry = 'SELECT profile_picture FROM user WHERE email = :email ';
        $statement = $db->prepare($srchQry);
        $statement->bindParam(':email', $email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        foreach ($user as $key => $value) {
            if ($key = "profile_picture") {
                $profilePicture = $value;
            }
        }
        $hasNoProfilePicture = ($profilePicture == "");
        if ($hasNoProfilePicture) {
            $placeholder = "img/placeholder.png";
            $profilePicture = $placeholder;
        }
    } catch (PDOException $e) {
        echo "Foutboodschap: " . $e->getMessage();
    }

    
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht security: login</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
            <h1>Opties</h1>
            <ul>
                <li><a href="dashboard.php">Terug naar dashboard</a></li>
                <li>Ingelogd als: <?= $email ?></li>
                <li><a href="logout.php">Uitloggen</a></li>
            </ul>
            <h1>Gegevens wijzigen</h1>
            <form action="gegevens-bewerken.php" method="POST" enctype="multipart/form-data">
                <p>Profielfoto</p>
                <img src="<?= $profilePicture ?>" alt="<?= $email ?>" style="width:250px;height:250px;" >
                <label for="file">Bestand:</label>
                <input type="file" name="file" id="file"> 
                <label for="email">e-mail</label>
                <input type="text" id="email" name="email" value="<?= $email ?>"><br>
                <input type="submit" name="edit" value="gegevens wijzigen">
            </form>
            
        </section>
    </body>
</html>

