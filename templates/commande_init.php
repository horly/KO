<?php
	session_start();
    include('connecting_data_base.php');

	$idUE = $_GET['idEU'];
    $getid = $_GET['id'];
    $nomE = $_GET['nom_entreprise'];
    $nomUE = $_GET['nom_unite_exploitation'];
    //$idFour = $_GET['idFour'];
    $id_connexion = $_GET['id_connexion'];

    $verifAchat = $bdd->prepare("SELECT * FROM commande WHERE id_UE_cmd = ?");
    $verifAchat->execute(array($idUE)) or die (print_r($verifAchat->errorInfo()));


    //on récupère le fournisseur par défaut
    $get_four = $bdd->prepare("SELECT * FROM fournis_for_user WHERE default_four = ? AND idUE_four = ?");
    $get_four->execute(array(1, $idUE));

    $fetch_four = $get_four->fetch();
    $idFour = $fetch_four['id_four'];


    $refCaise = 1; //initialement égal à 3
    $complete_commande = 0;

    $factCount = $verifAchat->rowCount();

    if(preg_match("/^[1-9]+/", $factCount)) //s'il y a déjà des achats
    {
    	$selectmax = $bdd->prepare("SELECT MAX(reference_cmd) AS maxref FROM commande WHERE id_UE_cmd = ?");
	    $selectmax->execute(array($idUE));

	    $fetchref = $selectmax->fetch();
	    $maxref = $fetchref['maxref'];

	    $refCaise = 0; //on initialise 
	    $refCaise = $maxref + 1; /*ici nous incrémenter le nombre de la réf caise par rapport 
	                                    rapport au nombre de facture que nous avons dans l'UE*/
	    $num_commande = "CMD".str_pad($refCaise, 5, 0, STR_PAD_LEFT); //on crée un numéro de la commande du genre CMD00005 exemple

	    $insertTempVent = $bdd->prepare("INSERT INTO commande(reference_cmd, id_UE_cmd, id_gest_cmd, id_four_cmd, num_cmd, complete_cmd) VALUES(?, ?, ?, ?, ?, ?)");
	    $insertTempVent->execute(array($refCaise, $idUE, $getid, $idFour, $num_commande, $complete_commande));

	    header("location:facturation_commande.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&idFour=".$idFour);
    }
    else
    {
    	 $num_commande = "CMD".str_pad($refCaise, 5, 0, STR_PAD_LEFT); //on crée un numéro de la commande du genre CMD00005 exemple
    	 
    	$insertTempVent = $bdd->prepare("INSERT INTO commande(reference_cmd, id_UE_cmd, id_gest_cmd, id_four_cmd, num_cmd, complete_cmd) VALUES(?, ?, ?, ?, ?, ?)");
	    $insertTempVent->execute(array($refCaise, $idUE, $getid, $idFour, $num_commande, $complete_commande));

	    header("location:facturation_commande.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&idFour=".$idFour);
    }

?>