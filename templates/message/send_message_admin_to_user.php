<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$id_sender = $_POST['id_sender'];
	$message = $_POST['message_content'];

	setlocale(LC_TIME, 'fra_fra');

    //on récupère le jour, le mois et l'année séparement
    $date = date("Y:m:d");
    $heure = date("H:i");

    $type = "texte"; //les autres types seront vérifiés après
    $statut = "non_lu";

    $longueurkey = 20; //ici nous allons définir la longueur de clé pour la confirmation du mail
    $key = ""; //ici on initialise la variable key qui contiendra toutes les clés qui sera généré pour les users 
    for($i=1;$i<$longueurkey;$i++)
    {
        $key .= mt_rand(0,9); //on génère les clés
    }

    $new_mess = $bdd->prepare('INSERT INTO message_admin(id_sender, id_admin, message, datem, heurem, type, statut, dernier_message, code) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$new_mess->execute(array($id_sender, $getid, $message, $date, $heure, $type, $statut, 1, $key));


	$reqmess = $bdd->prepare('SELECT * FROM message_admin WHERE id_sender = ? AND id_admin = ?  AND code = ?');
	$reqmess->execute(array($id_sender, $getid, $key));

	$info_message = $reqmess->fetch();
	$id_mess = $info_message['id'];


	$upadate2 = $bdd->prepare('UPDATE message_admin SET dernier_message = 0 WHERE id != ? AND id_sender = ?');
	$upadate2->execute(array($id_mess, $id_sender));

	$upadate1 = $bdd->prepare('UPDATE message_admin SET code = 0 WHERE id = ?');
	$upadate1->execute(array($id_mess));
?>