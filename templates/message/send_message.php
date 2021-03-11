<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$id_sender = $_POST['id_sender'];
	$message_content = $_POST['message_content'];

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

    //$message = utf8_decode($message_content);

	$new_mess = $bdd->prepare('INSERT INTO messages(id_sender, id_receiver, message, datem, heurem, type, statut, dernier_message, code) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
	$new_mess->execute(array($getid, $id_sender, $message_content, $date, $heure, $type, $statut, 1, $key));


	$reqmess = $bdd->prepare('SELECT * FROM messages WHERE id_receiver = ? AND id_sender = ? AND code = ?');
	$reqmess->execute(array($id_sender, $getid, $key));

	$info_message = $reqmess->fetch();
	$id_mess = $info_message['id'];

	/*$upadate1 = $bdd->prepare('UPDATE messages SET dernier_message = 1 WHERE id = ?');
	$upadate1->execute(array($id_mess));*/

	$upadate2 = $bdd->prepare('UPDATE messages SET dernier_message = 0 WHERE id != ? AND ((id_receiver = ? AND id_sender = ?) OR (id_sender = ? AND id_receiver = ?))');
	$upadate2->execute(array($id_mess, $id_sender, $getid, $id_sender, $getid));

	$upadate1 = $bdd->prepare('UPDATE messages SET code = 0 WHERE id = ?');
	$upadate1->execute(array($id_mess));

	//echo $message_content;

?>