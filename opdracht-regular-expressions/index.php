<?php 
    if(isset($_GET['submit'])) {
        $regex = $_GET['regex'];
        $string = $_GET['string'];
        $vervang = "#";
        $error = (!preg_match('/'.$regex.'/', $string))? "geen match gevonden" : false;
        if (!$error) {
             $ingevuld = ($regex && $string)? htmlspecialchars(preg_replace('/'.$regex.'/', $vervang, $string)) : false;
        }
    }
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Opdracht Regular Expressions</title>
        <link rel="stylesheet" href="http://web-backend.local/css/global.css">
        <link rel="stylesheet" href="http://web-backend.local/css/facade.css">
        <link rel="stylesheet" href="http://web-backend.local/css/directory.css">
    </head>
    <body class="web-backend-opdracht">
        <section class="body">
            <style>
                .result span
                {
                    color:  red;
                    font-weight:    bold;
                }
            </style>
            <h1>Opdracht Regular Expressions: deel 1</h1> 
            <h1>RegEx tester</h1>
            <form action="index.php" method="GET">
            <ul>
                <li>
                    <label for="regex">Regular Expression</label>
                    <input type="text" name="regex" id="regex" value= <?= (isset($regex)? $regex : "") ?>>
                </li>
                <li>
                    <label for="string">String</label>                            
                    <textarea name="string" id="string" cols="30" rows="10"><?= (isset($string)? $string : "") ?></textarea>
                </li>
            </ul>
            <input type="submit" name="submit">
            </form>
            <p><?= (isset($error)? $error : "") ?></p>
            <p><?= (isset($ingevuld)? $ingevuld : "") ?></p>
        </section>
    </body>
</html>
