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
        $message = array();
        #$message["type"];
        #$message["text"];
        
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
    $message = showMessage();
    
    function logToFile($message) {
        $dateAndTime = "[" . date("d/n/y") . " " . date("H:i:s")  . "]";
        // $_SERVER['REMOTE_ADDR'] or $_SERVER['REMOTE_HOST']
        $localIP = " - " . $_SERVER['REMOTE_ADDR'] . " - ";
        $typeError = "type:[" . $message["type"] . "] ";
        
        $error = $dateAndTime . $localIP . $typeError . $message["text"] . "\n\r"; //geen single quotes bij newline en return
		file_put_contents( 'error.txt', $error, FILE_APPEND );
    }
    function createMessage($message) {
       $_SESSION['message']	=	$message;
    }
    function showMessage() {
		if (isset($_SESSION["message"])) {
			$message = $_SESSION["message"];
			unset($_SESSION["message"]);
		}
        else {
            $message = false;
        }
		return $message;
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
            
            <?php if ( $message ): ?>
			<?= $message["text"] ?>
		    <?php endif ?>
            
            <?php if($isValid): ?>
            <?= "Korting toegekend!" ?>
            <?php endif ?> 
            
            <form action="index.php" method="post">
                <ul>
                    <li>
                        <label for="code">Kortingscode</label>
                        <input type="text" id="code" name="code">
                    </li>
                </ul>
                <input type="submit" name="submit">
            </form>
		</section>
    </body>
</html>
