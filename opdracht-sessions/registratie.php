<?php
    $focus = "";
    if(isset($_GET["focus"])) {
        $focus = $_GET["focus"];
    }
    
    session_start();
    $email = (isset($_SESSION["gegevens"]["email"]))? $_SESSION["gegevens"]["email"] : "";
    $nickname = (isset($_SESSION["gegevens"]["nickname"]))? $_SESSION["gegevens"]["nickname"] : "";
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht sessions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
    </head>
    <body class="web-backend-opdracht">
        
        <h1>Opdracht sessions: deel 1</h1>
        <ul>
            <li>
                <h2>Registratiepagina</h2>
                <ul>                       
                    <form action="adres.php" method="post">
                        <ul>
                            <li>
                                <label for="email">e-mail</label>
                                <input type="text" id="email" name="email" value="<?= $email ?>" <?= ( $focus == "email" )? "autofocus" : "" ?>>
                            </li>
                            <li>
                                <label for="nickname">nickname</label>
                                <input type="text" id="nickname" name="nickname" value="<?= $nickname ?>" <?= ( $focus == "nickname" )? "autofocus" : "" ?>>
                            </li>
                        </ul>
                        <input type="submit" name="submit" value="Volgende">
                    </form>
                </ul>
            </li>            
        </ul>
    </body>
</html>
