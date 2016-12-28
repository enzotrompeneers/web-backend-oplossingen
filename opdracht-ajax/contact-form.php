<?php
    session_start();

    if (isset($_SESSION['form'])) {
        $email = $_SESSION['form']['email'];
        $message = $_SESSION['form']['message'];
        $copy = $_SESSION['form']['copy'];
        echo $message;
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
        <title>Opdracht ajax</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
            <h1>Contacteer ons</h1>
            <?php if(isset($notification)): ?>
                <ul>
                    <li><?= $notification ?></li>
                </ul>
            <?php endif ?>
            <form action="contact.php" method="POST">
                <ul>
                    <li>
                        <label for="email">E-mailadres</label>
                        <input type="text" id="email" name="email" value="<?= (isset($email)) ? $email : '' ?>">
                    </li>
                    <li>
                        <label for="message">Boodschap</label>
                        <textarea name="message" id="message" cols="30" rows="10"><?= (isset($message)) ? $message : '' ?></textarea>
                    </li>
                    <li>
                        <input type="checkbox" name="copy" id="copy" <?= (isset($copy)) ? 'checked' : '' ?>>
                        <label for="copy">Stuur een kopie naar mezelf</label>
                    </li>
                </ul>
                <input type="submit" name="submit">
            </form>
        </section>
    </body>
</html>
