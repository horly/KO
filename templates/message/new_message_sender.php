<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$sender = $_POST['sender'];

	$new = 0;

	//$statut = 'lu';

	$select = $bdd->prepare('SELECT * FROM messages WHERE id_receiver = ? AND id_sender = ?');
	$select->execute(array($getid, $sender));

	$fetch = $select->fetch();

	$statut = $fetch['statut'];

	if($statut == 1)
	{
		$new = 1;
	}
	else
	{
		$new = 0;
	}

	echo $new;
?>