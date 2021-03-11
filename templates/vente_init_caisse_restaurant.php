<?php
	//fonction de la page caisse_enregistreuse.php
	include('connecting_data_base.php');

	$idUE = $_GET['idUE'];
    $getid = $_GET['id'];
    $nomE = $_GET['nom_entreprise'];
    $nomUE = $_GET['nom_unite_exploitation'];
    //$idClient = $_GET['idClient'];
    $id_connexion = $_GET['id_connexion'];

    //on récupère le client comptoire (client par défaut)
    $get_client = $bdd->prepare("SELECT * FROM client_for_user WHERE default_cli = ? AND id_UE_cli = ?");
    $get_client->execute(array(1, $idUE));

    $fetch_client = $get_client->fetch();
    $client_caisse = $fetch_client['id_cli'];

    header("location:caisse_enregistreuse_restau_bar.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".''."&idClient=".$client_caisse);

?>