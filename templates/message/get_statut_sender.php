<?php
	//session_start();
	include('../connecting_data_base.php');

	$id_sender = $_POST['id_sender'];
	$statut = "";

	$req = $bdd->prepare('SELECT * FROM user WHERE id_cl = ? ');
	$req->execute(array($id_sender));

	$info_user = $req->fetch();

	if($info_user['login_required'] != 0 AND $info_user['id_connexion'] != 0)
	{
		$statut = "actif";
	}
	else
	{
		$statut = "no_actif";
	}

	echo $statut;
?>