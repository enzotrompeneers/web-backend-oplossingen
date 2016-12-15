<?php
    $loginForm = "login-form.php";
    session_start();
    unset($_COOKIE['login']); 
    unset($_SESSION["register"]);
    $_SESSION['notification']["message"] = "U bent uitgelogd. Tot de volgende keer";
    header("Location: " . $loginForm);   
?>