<?php
    session_start();
    $createMessage = false;
    $isValid = false;
    try {
        if (isset($_POST["submit"])) {
            if (isset($_POST["code"])) {
                if (strlen($_POST["code"]) == 8) {
                    $isValid = true;
                }
                else {
                    throw new Exception("VALIDATION-CODE-LENGTH");
                }
            }
            else {
                throw new Exception("SUBMIT-ERROR");
            }
        }
    }
    catch(Exception $e) {
        $messageCode = $e->getMessage();
        $message["type"];
        $message["text"];
        
        switch($messageCode) {
            case "SUBMIT-ERROR":
                $message["type"] = $messageCode;
                $message["text"] = "Er werd met het formulier geknoeid";
                
                break;
            case "VALIDATION-CODE-LENGTH":
                $message["type"] = $messageCode;
                $message["text"] = "De kortingscode heeft niet de juiste lengte";
                $createMessage = true;
                break;
        }
        logToFile($message);
        if ($createMessage) {
            createMessage($message);
        }
    }
    
    function logToFile($message) {
        $dateAndTime = "[" . date( "H:i:s", time() ) . "]";
        // $_SERVER['REMOTE_ADDR'] or $_SERVER['REMOTE_HOST']
        $localIP = " - " . $_SERVER['REMOTE_ADDR'] . " - ";
        $typeError = "type:[" . $message["text"] . "] ";
        
        $error = $dateAndTime . $localIP . $typeError . $message["text"] . "\n\r"; //geen single quotes bij newline en return
		file_put_contents( 'error.txt', $error, FILE_APPEND );
    }
    function createMessage($message) {
        $_SESSION["message"]["type"] = $_SESSION[$message["type"]][$message["text"]];
        session_destroy();
    }
    function showMessage() {
        /*
        Deze haalt de message-data uit de $_SESSION en unset daarna deze data zodat ze niet meer in de $_SESSION voorkomt
Als er geen message-data in de $_SESSION zit, returnt deze functie FALSE
Anders wordt de message-data gereturnd
Spreek deze functie onderaan de try/catch-block aan en vang het resultaat op in een variabele. Gebruik deze variabele om een gepaste boodschap te tonen.
        */
    }
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht error handling: try catch</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        
        <section class="body">
            <h1>Geef uw kortingscode op</h1>
            <?php if($isValid): ?>
            <?= "Korting toegekend!" ?>
            <?php endif ?> 
            
            <form action="#" method="post">
                <ul>
                    <li>
                        <label for="code">Kortingscode</label>
                        <input type="text" id="code" name="code">
                    </li>
                </ul>
                <input type="submit">
            </form>
		</section>
    </body>
</html>
