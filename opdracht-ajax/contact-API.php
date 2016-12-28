<?php

	// Check of de request een ajax-request was
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	{
		if ((isset($_POST['email'])) && (isset($_POST['message']))) {
			$ajaxMessage['type'] = "succes";
		}
		echo json_encode($ajaxMessage);	
	}

?>