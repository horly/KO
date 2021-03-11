<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$idE = $_POST['idE'];
	$message_content = $_POST['message_content'];

	setlocale(LC_TIME, 'fra_fra');

    //on récupère le jour, le mois et l'année séparement
    $date = date("Y:m:d");
    $heure = date("H:i");

    $type = "texte"; //les autres types seront vérifiés après

    $longueurkey = 20; //ici nous allons définir la longueur de clé pour la confirmation du mail
    $key = ""; //ici on initialise la variable key qui contiendra toutes les clés qui sera généré pour les users 
    for($i=1;$i<$longueurkey;$i++)
    {
        $key .= mt_rand(0,9); //on génère les clés
    }

    $new_mess = $bdd->prepare('INSERT INTO  messages_groupe(id_sender, idEG, message, datem, heurem, type, dernier_message, code) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
	$new_mess->execute(array($getid, $idE, $message_content, $date, $heure, $type, 1, $key));


	$reqmess = $bdd->prepare('SELECT * FROM messages_groupe WHERE id_sender = ? AND idEG = ? AND code = ?');
	$reqmess->execute(array($getid, $idE, $key));

	$info_message = $reqmess->fetch();
	$id_mess = $info_message['id'];


	$upadate2 = $bdd->prepare('UPDATE messages_groupe SET dernier_message = 0 WHERE id != ? AND idEG = ?');
	$upadate2->execute(array($id_mess, $idE));

	$upadate1 = $bdd->prepare('UPDATE messages_groupe SET code = 0 WHERE id = ?');
	$upadate1->execute(array($id_mess));

?>