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

	$verifVente = $bdd->prepare("SELECT * FROM devis WHERE id_UE_dv = ?");
    $verifVente->execute(array($idUE)) or die (print_r($verifVente->errorInfo()));

    $refCaise = 1; //initialement égal à 3
    $complete_devis = 0;

    $factCount = $verifVente->rowCount();
    if(preg_match("/^[1-9]+/", $factCount)) //s'il y a déjà des ventes
    {
    	$selectmax = $bdd->prepare("SELECT MAX(reference_dv) AS maxref FROM devis WHERE id_UE_dv = ?");
	    $selectmax->execute(array($idUE));

	    $fetchref = $selectmax->fetch();
	    $maxref = $fetchref['maxref'];

	    $refCaise = 0; //on initialise 
	    $refCaise = $maxref + 1; /*ici nous incrémenter le nombre de la réf caise par rapport 
	                                    rapport au nombre de facture que nous avons dans l'UE*/
        $num_devis = "D".str_pad($refCaise, 5, 0, STR_PAD_LEFT); //on crée un numéro dU DEVIS du genre D00005 exemple

	    $insertTempVent = $bdd->prepare("INSERT INTO devis(reference_dv, id_UE_dv, id_gest_dv, id_cl_dv, num_dv, complete_devis) VALUES(?, ?, ?, ?, ?, ?)");
	    $insertTempVent->execute(array($refCaise, $idUE, $getid, $idClient, $num_devis, $complete_devis));

	    header("location:facturation_devis.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&idClient=".$idClient);

    }
    else //sinon
    {
     	$num_devis = "D".str_pad($refCaise, 5, 0, STR_PAD_LEFT); //on crée un numéro dU DEVIS du genre D00005 exemple

        $insertTempVent = $bdd->prepare("INSERT INTO devis(reference_dv, id_UE_dv, id_gest_dv, id_cl_dv, num_dv, complete_devis) VALUES(?, ?, ?, ?, ?, ?)");
        $insertTempVent->execute(array($refCaise, $idUE, $getid, $idClient, $num_devis, $complete_devis));

        header("location:facturation_devis.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&idClient=".$idClient);
    }


?>