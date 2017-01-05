<?php
	session_start();
    function __autoload($className) { 
        include_once "classes/" . $className . ".php";
    } 
	if(isset($_GET['submit'])) {
		$titel = $_GET['titel'];
		$artikel = $_GET['artikel'];
		$kernwoorden = $_GET['kernwoorden'];
		$datum = $_GET['datum'];

		$_SESSION['form']['titel'] = $titel;
        $_SESSION['form']['artikel'] = $artikel;
        $_SESSION['form']['kernwoorden'] = $kernwoorden;
        $_SESSION['form']['datum'] = $datum;


		if(!$titel || !$artikel || !$kernwoorden || !$datum) {
			$_SESSION['notification'] = "niet alle velden zijn ingevuld";
			header("Location: artikel-toevoegen-form.php");
		} else {
			$t = new Toevoegen();
			$t->insertDatabase($titel, $artikel, $kernwoorden, $datum);
			$_SESSION['notification'] = "artikel is toegevoegd";
			unset($_SESSION['form']);
			header("Location: artikel-overzicht.php");
		}
	}
?>