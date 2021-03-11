<?php
	
	//session_start();
    include('connecting_data_base.php');

	$idUE = $_GET['idEU'];
    $getid = $_GET['id'];
    $nomE = $_GET['nom_entreprise'];
    $nomUE = $_GET['nom_unite_exploitation'];
    //$idClient = $_GET['idClient'];
    $id_connexion = $_GET['id_connexion'];

    //on récupère le client comptoire (client par défaut)
    $get_client = $bdd->prepare("SELECT * FROM client_for_user WHERE default_cli = ? AND id_UE_cli = ?");
    $get_client->execute(array(1, $idUE));

    $fetch_client = $get_client->fetch();
    $idClient = $fetch_client['id_cli'];

	$verifVente = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_UE_fact = ?");
    $verifVente->execute(array($idUE)) or die (print_r($verifVente->errorInfo()));

    $refCaise = 1; //initialement égal à 3
    $complete_vente = 0;

    $factCount = $verifVente->rowCount();
    if(preg_match("/^[1-9]+/", $factCount)) //s'il y a déjà des ventes
    {
    	$selectmax = $bdd->prepare("SELECT MAX(reference_caise) AS maxref FROM vente_for_user WHERE id_UE_fact = ?");
	    $selectmax->execute(array($idUE));

	    $fetchref = $selectmax->fetch();
	    $maxref = $fetchref['maxref'];

	    $refCaise = 0; //on initialise 
	    $refCaise = $maxref + 1; /*ici nous incrémenter le nombre de la réf caise par rapport 
	                                    rapport au nombre de facture que nous avons dans l'UE*/
        $num_facture = "V".str_pad($refCaise, 5, 0, STR_PAD_LEFT); //on crée un numéro de facture du genre V00005 exemple

	    $insertTempVent = $bdd->prepare("INSERT INTO vente_for_user(reference_caise, id_UE_fact, id_gest_fact, id_cl_fact, num_facture, complete_vente) VALUES(?, ?, ?, ?, ?, ?)");
	    $insertTempVent->execute(array($refCaise, $idUE, $getid, $idClient, $num_facture, $complete_vente));

	    header("location:facturation.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&idClient=".$idClient);

    }
    else //sinon
    {
     	$num_facture = "V".str_pad($refCaise, 5, 0, STR_PAD_LEFT); //on crée un numéro de facture du genre F00005 exemple

        $insertTempVent = $bdd->prepare("INSERT INTO vente_for_user(reference_caise, id_UE_fact, id_gest_fact, id_cl_fact, num_facture, complete_vente) VALUES(?, ?, ?, ?, ?, ?)");
        $insertTempVent->execute(array($refCaise, $idUE, $getid, $idClient, $num_facture, $complete_vente));

        header("location:facturation.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&idClient=".$idClient);
    }


?>