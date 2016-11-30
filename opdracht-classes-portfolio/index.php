<?php
    function __autoload($className) { 
        var_dump($className);
        include_once "classes/" . $className . ".php";
    }
    $htmlBuild = new HTMLBuilder("header.partial","body.partial","footer.partial");
    echo "1";
?>
