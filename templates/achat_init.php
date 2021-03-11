<?php
	
	//session_start();
    include('connecting_data_base.php');

	$idUE = $_GET['idEU'];
    $getid = $_GET['id'];
    $nomE = $_GET['nom_entreprise'];
    $nomUE = $_GET['nom_unite_exploitation'];
    //$idFour = $_GET['idFour'];
    $id_connexion = $_GET['id_connexion'];


    //on récupère le fournisseur par défaut
    $get_four = $bdd->prepare("SELECT * FROM fournis_for_user WHERE default_four = ? AND idUE_four = ?");
    $get_four->execute(array(1, $idUE));

    $fetch_four = $get_four->fetch();
    $idFour = $fetch_four['id_four'];

	$verifAchat = $bdd->prepare("SELECT * FROM depense_for_user WHERE id_UE_dp = ?");
    $verifAchat->execute(array($idUE)) or die (print_r($verifAchat->errorInfo()));

    $refCaise = 1; 
    $complete_dp = 0;

    $factCount = $verifAchat->rowCount();
    if(preg_match("/^[1-9]+/", $factCount)) //s'il y a déjà des achats
    {
    	$selectmax = $bdd->prepare("SELECT MAX(reference_dp) AS maxref FROM depense_for_user WHERE id_UE_dp = ?");
	    $selectmax->execute(array($idUE));

	    $fetchref = $selectmax->fetch();
	    $maxref = $fetchref['maxref'];

	    $refCaise = 0; //on initialise 
	    $refCaise = $maxref + 1; /*ici nous incrémenter le nombre de la réf caise par rapport 
	                                    rapport au nombre de facture que nous avons dans l'UE*/
        $num_achat = "A".str_pad($refCaise, 5, 0, STR_PAD_LEFT); //on crée un numéro d'achat du genre A00005 exemple

	    $insertTempVent = $bdd->prepare("INSERT INTO depense_for_user(reference_dp, id_UE_dp, id_gest_dp, id_four_dp, num_dp, complete_dp) VALUES(?, ?, ?, ?, ?, ?)");
	    $insertTempVent->execute(array($refCaise, $idUE, $getid, $idFour, $num_achat, $complete_dp));

	    header("location:achat.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&idFour=".$idFour);

    }
    else //sinon
    {
     	$num_achat = "A".str_pad($refCaise, 5, 0, STR_PAD_LEFT); //on crée un numéro d'achat du genre A00005 exemple

        $insertTempVent = $bdd->prepare("INSERT INTO depense_for_user(reference_dp, id_UE_dp, id_gest_dp, id_four_dp, num_dp, complete_dp) VALUES(?, ?, ?, ?, ?, ?)");
        $insertTempVent->execute(array($refCaise, $idUE, $getid, $idFour, $num_achat, $complete_dp));

        header("location:achat.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&idFour=".$idFour);
    }


?>