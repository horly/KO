<?php
	//session_start();
	include('../connecting_data_base.php');

	$id_sender = $_POST['id_sender'];

	$req = $bdd->prepare('SELECT * FROM user WHERE id_cl = ? ');
	$req->execute(array($id_sender));

	$info_user = $req->fetch();

	echo $info_user['profil_cl'];
?>