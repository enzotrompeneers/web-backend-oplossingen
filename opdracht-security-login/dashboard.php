<?php
    $loginForm = "login-form.php";
    session_start();
    if (isset($_COOKIE["login"])) {
        echo "cookie is geset " . $_COOKIE["login"];
    } else {
        header("Location: " . $loginForm);
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
            <h1>Dashboard</h1>
             
        </section>
    </body>
</html>
