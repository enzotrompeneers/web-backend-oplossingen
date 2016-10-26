<?php
    $password = "qwerty";
    $username = "enzo";
    $message = "hello";
    if (isset($_POST["submit"])) {
        if ($username == $_POST["username"] && $password == $_POST["password"]) {
            $message = "Welkom";
        } else {
            $message = "Er ging iets mis bij het inloggen, probeer opnieuw";
        }
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht post</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
        
            <h1>Opdracht post: deel 1</h1>
            <p><?= $message ?></p>
            
            <form action="index.php" method="post">
              <fieldset>
                <legend>Register</legend>
                  <label for="user">username</label>
                <input type="text" id="user" name="username">
                  <label for="pass">password</label>
                <input type="password" id="pass" name="password"><br>
                <input type="submit" name="submit" value="submit">
              </fieldset>
            </form>
            
        </section>

    </body>
</html>
