<?php
	
	session_start();

	require_once "Google/autoload.php";

	$gClient = new Google_client();
	$gClient->setClientId("64997659170-p3bvt4pn767kron473b48d8c8vd0tne1.apps.googleusercontent.com");
	$gClient->setClientSecret("FUy-rfgSiBtH7_UufgvrKfwf");
	$gclient->setApplicationName("Kedis");
	$gClient->setRedirectUri("https://www.kedisonline.com/templates/teste2.php");
	$gClient->addSc
?>