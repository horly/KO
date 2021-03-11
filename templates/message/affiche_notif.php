<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];

	//on récupère les messages non lu de l'utilisateur
	  $statut_message = 'non_lu';
	  $get_message = $bdd->prepare("SELECT * FROM messages WHERE statut = ? AND id_receiver = ?");
	  $get_message->execute(array($statut_message, $getid));

	  $nbr_message = $get_message->rowCount();

	  echo $nbr_message;
?>