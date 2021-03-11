<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$sender = $_POST['sender'];

	$statut = 'lu';

	$update = $bdd->prepare('UPDATE messages SET statut = ? WHERE id_receiver = ? AND id_sender = ?');
	$update->execute(array($statut, $getid, $sender));

?>