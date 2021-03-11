<?php
	include('../connecting_data_base.php');

	$filename = $_POST['filename'];
	$extention = $_POST['extention'];
	$file_size = $_POST['file_size'];
	$getid = $_POST['getid'];
	$idE = $_POST['idE'];

	if($_FILES["upload-file"]["name"] != '')
	{
		setlocale(LC_TIME, 'fra_fra');

	    //on récupère le jour, le mois et l'année séparement
	    $date = date("Y:m:d");
	    $heure = date("H:i");

	    $type_image = "image"; 
	    $type_fichier = "fichier";
    	//$statut = "non_lu";

    	$extensionImage = array('jpg', 'jpeg', 'gif', 'png');

		$longueurkey = 20; //ici nous allons définir la longueur de clé pour la confirmation du mail
	    $key = ""; //ici on initialise la variable key qui contiendra toutes les clés qui sera généré pour les users 
	    for($i=1;$i<$longueurkey;$i++)
	    {
	        $key .= mt_rand(0,9); //on génère les clés
	    }

	    if(in_array($extention, $extensionImage))
	    {
	    	//si le message est de type image
	    	$new_mess = $bdd->prepare('INSERT INTO messages_groupe(id_sender, idEG, message, datem, heurem, type, dernier_message, code, taille_fichier, extention) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
			$new_mess->execute(array($getid, $idE, $filename.'.'.$extention, $date, $heure, $type_image, 1, $key, $file_size, $extention));

			$reqmess = $bdd->prepare('SELECT * FROM messages_groupe WHERE id_sender = ? AND idEG = ? AND code = ?');
			$reqmess->execute(array($getid, $idE, $key));

			$info_message = $reqmess->fetch();
			$id_mess = $info_message['id'];

			$update_message_file = $bdd->prepare("UPDATE messages_groupe SET file = ? WHERE id = ?");
			$update_message_file->execute(array($id_mess.'.'.$extention, $id_mess));


			$name = $id_mess.'.'.$extention;
			$location = "../../image_message_file_groupe/".$name;
			move_uploaded_file($_FILES["upload-file"]["tmp_name"], $location);


			$upadate2 = $bdd->prepare('UPDATE messages_groupe SET dernier_message = 0 WHERE id != ? AND idEG = ?');
			$upadate2->execute(array($id_mess, $idE));

			$upadate1 = $bdd->prepare('UPDATE messages_groupe SET code = 0 WHERE id = ?');
			$upadate1->execute(array($id_mess));


	    }
	    else
	    {
	    	//si le message est de type image
	    	$new_mess = $bdd->prepare('INSERT INTO messages_groupe(id_sender, idEG, message, datem, heurem, type, dernier_message, code, taille_fichier, extention) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
			$new_mess->execute(array($getid, $idE, $filename.'.'.$extention, $date, $heure, $type_fichier, 1, $key, $file_size, $extention));

			$reqmess = $bdd->prepare('SELECT * FROM messages_groupe WHERE id_sender = ? AND idEG = ? AND code = ?');
			$reqmess->execute(array($getid, $idE, $key));

			$info_message = $reqmess->fetch();
			$id_mess = $info_message['id'];

			$update_message_file = $bdd->prepare("UPDATE messages_groupe SET file = ? WHERE id = ?");
			$update_message_file->execute(array($id_mess.'.'.$extention, $id_mess));


			$name = $id_mess.'.'.$extention;
			$location = "../../image_message_file_groupe/".$name;
			move_uploaded_file($_FILES["upload-file"]["tmp_name"], $location);


			$upadate2 = $bdd->prepare('UPDATE messages_groupe SET dernier_message = 0 WHERE id != ? AND idEG = ?');
			$upadate2->execute(array($id_mess, $idE));

			$upadate1 = $bdd->prepare('UPDATE messages_groupe SET code = 0 WHERE id = ?');
			$upadate1->execute(array($id_mess));
	    }


	    

	}
?>