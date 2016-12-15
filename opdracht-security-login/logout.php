<?php
    $loginForm = "login-form.php";
    session_start();
    unset($_COOKIE['login']); 
    $_SESSION['notification']["message"] = "U bent uitgelogd. Tot de volgende keer";
    header("Location: " . $loginForm);   
?>