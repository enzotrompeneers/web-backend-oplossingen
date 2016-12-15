<?php
    $loginForm = "login-form.php";
    session_start();
    if (isset($_COOKIE["login"])) {
        //echo "cookie is geset " . $_COOKIE["login"];
        $user = explode(',', $_COOKIE["login"]);
        $email = $user[0];
        $hashed_password = $user[1];

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "opdracht-security-login";
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, array (PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        $srchQry = 'SELECT salt FROM user WHERE email = :email LIMIT 1';
        $statement = $db->prepare($srchQry);
        $safeEmail = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
        $statement->bindParam(':email', $email);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        foreach ($row as $r) {
            $salt = $r;
        }
        //echo $salt;
        if (!$hashed_password === hash("SHA512", $email . $salt)) {
            unset($_COOKIE['login']); 
            header("Location: " . $loginForm); 
        } 
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
             <a href="<?= $loginForm ?>">Uitloggen</a>
        </section>
    </body>
</html>
