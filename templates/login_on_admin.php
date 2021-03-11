<?php
	//session_start();
	include('connecting_data_base.php');

	
    $id = $_GET['id']; 

    $login = 1;

    $longueurcode = 20; //ici nous allons gérérer une clé pour la sécurité de l'utilisateur,
    $code = ""; 
    for($i=1;$i<$longueurcode;$i++)
    {
        $code .= mt_rand(0,9); //on génère les clés
    }

    $udatelogin = $bdd->prepare("UPDATE administrateur SET login_required = ?, id_connexion = ? WHERE id = ?");
    $udatelogin->execute(array($login, $code, $id));

    $id_connexion = $code;

    header('location:administration.php?id='.$id."&id_connexion=".$id_connexion);

?>