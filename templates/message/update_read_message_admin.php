<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$sender = $_POST['sender'];

	$statut = 'lu';

	$update = $bdd->prepare('UPDATE message_admin SET statut = ? WHERE id_sender = ?');
	$update->execute(array($statut, $sender));

?>