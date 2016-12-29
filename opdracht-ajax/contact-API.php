<?php
	session_start();

	function __autoload($className) { 
        include_once "classes/" . $className . ".php";
    }

	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {

		$email = $_POST['email'];
		$message = $_POST['message'];
		$copy = (isset($_POST['copy']))? true : false;

		//$_SESSION['form']['email'] = $email;
        //$_SESSION['form']['message'] = $message;
        //$_SESSION['form']['copy'] = $copy;

		if (!$email || !$message) {
			$ajaxMessage['type'] = "error";
		} else {
			$send = new SendForm();
			$send->insertDatabase($email, $message);
			$send->mailTo($email, $message, $copy);
			
			$ajaxMessage['type'] = "succes";
		}
		echo json_encode($ajaxMessage);	
	}

?>