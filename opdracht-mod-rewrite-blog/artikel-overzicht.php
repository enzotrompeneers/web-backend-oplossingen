<?php
    session_start();
    function __autoload($className) { 
        include_once "classes/" . $className . ".php";
    } 


    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "opdracht-mod-rewrite-blog";
    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $selectQry = "SELECT * FROM artikels";
        $statement = $db->prepare($selectQry);
        $statement->execute();
        $artikels = false;
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) { // fetchAssoc !!! fetchRow geeft telkens een nummer!!!
            $artikels[] = $row;
        }
       
    } catch (PDOException $e) {
        $_SESSION['notification'] ="Foutboodschap: " . $e->getMessage();
        header("Location: artikel-overzicht.php");
    }

    if (isset($_SESSION['notification'])) {
        $notification = $_SESSION['notification'];
        unset($_SESSION['notification']);
    }


?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht mod_rewrite: blog</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
                <h1>Overzicht</h1>
                <?php if(isset($notification)): ?>
                    <ul>
                        <li><?= $notification ?></li>
                    </ul>
                <?php endif ?>
                <form action="artikel-toevoegen.php" method="GET">
                    <ul>
                        <li>
                            <label for="zoeken">Zoeken in artikels:</label>
                            <input type="text" id="zoeken" name="zoeken" >
                            <input type="submit" name="submit" value="Zoeken">
                        </li>
                    </ul>
                </form>
                <form action="zoeken.php" method="GET">
                            <label for="datumZoeken">Zoeken op datum:</label>
                            <select name="gekozenDatum" id="datumZoeken">
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                            <input type="submit" value="Zoeken">
                        </form>

                <h1>Artikels overzicht</h1>
                <a href="artikel-toevoegen-form.php">Artikel toevoegen</a>
                <?php  if($artikels): ?>
                    <?php foreach($artikels as $artikel): ?>
                        <h1><?= $artikel['titel'] ?> | <?= $artikel['datum'] ?> </h1>
                        <p><?= $artikel['artikel'] ?></p>
                        <p>Keywords: <?= $artikel['kernwoorden'] ?></p>
                    <?php endforeach ?>
                <?php endif ?>

        </section>
   
    </body>
</html>
