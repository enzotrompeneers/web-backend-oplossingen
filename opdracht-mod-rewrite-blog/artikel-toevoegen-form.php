<?php
    session_start();
    if (isset($_SESSION['notification'])) {
        $notification = $_SESSION['notification'];
        unset($_SESSION['notification']);
    }
    if (isset($_SESSION['form'])) {
        $titel = $_SESSION['form']['titel'];
        $artikel = $_SESSION['form']['artikel'];
        $kernwoorden = $_SESSION['form']['kernwoorden'];
        $datum = $_SESSION['form']['datum'];
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

                <h1>Artikel toevoegen</h1>
                <?php if(isset($notification)): ?>
                    <ul>
                        <li><?= $notification ?></li>
                    </ul>
                <?php endif ?>
                <a href="artikel-overzicht.php">Terug naar overzicht</a>
                <form action="artikel-toevoegen.php" method="GET">
                    <ul>
                        <li>
                            <label for="titel">Titel</label>
                            <input type="text" id="titel" name="titel" value="<?= (isset($titel)) ? $titel : '' ?>" >
                        </li>
                        <li>
                            <label for="artikel">Artikel</label>
                            <textarea id="artikel" name="artikel"><?= (isset($artikel)) ? $artikel : '' ?></textarea>
                        </li>
                        <li>
                            <label for="kernwoorden">Kernwoorden</label>
                            <input type="text" id="kernwoorden" name="kernwoorden" value="<?= (isset($kernwoorden)) ? $kernwoorden : '' ?>" >
                        </li>
                        <li>
                            <label for="datum">Datum</label>
                            <input type="date" id="datum" name="datum" value="<?= (isset($datum)) ? $datum : '' ?>">
                        </li>
                    </ul>
                    <input type="submit" name="submit" value="verzenden">
                </form>
        </section>
   
    </body>
</html>
