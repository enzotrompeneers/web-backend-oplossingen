<?php
    function __autoload($className) { 
        include_once "classes/" . $className . ".php";
        echo "<br>" . $className;
    }
    $htmlBuild = new HTMLBuilder("header.partial","body.partial","footer.partial");
    print_r($htmlBuild);
?>