<?php
	
	//fonction de la page accueille.php
    include('connecting_data_base.php');

    $getid = $_GET['id'];
    $id_connexion = $_GET['id_connexion'];
    $idE = $_GET['idE'];
    //$nomE = $_GET['nom_entreprise'];

    $getidE = $bdd->prepare("SELECT * FROM entreprise WHERE idE = ?");
	$getidE->execute(array($idE));

	$fetchE = $getidE->fetch();
	$entre_unique = $fetchE['entre_unique'];
	$nomE = $fetchE['nomE'];

	if($entre_unique != 1)
	{
		header('location:unitexpl.php?id='.$getid.'&id_connexion='.$id_connexion.'&idE='.$idE.'&nom_entreprise='.$nomE);
	}
	else
	{
		/*$get_ue_entrep = $bdd->prepare('SELECT * FROM entreprise_ue WHERE id_entrep = ?');
		$get_ue_entrep->execute(array($idE));

		$fetch_ue_entrep = $get_ue_entrep->fetch();

		$id_ue = $fetch_ue_entrep['id_ue'];  */

		$verifnomE = $bdd->prepare("SELECT * FROM uniteexploit WHERE idEnt = ?");
    	$verifnomE->execute(array($idE));
    	$fetch_ue = $verifnomE->fetch();

    	$idUE = $fetch_ue['idUE']; 
    	$nom_UE = $fetch_ue['nomUE'];

		header('location:dashboard.php?id='.$getid."&id_connexion=".$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE.'&nom_unite_exploitation='.$nom_UE);
	}

?>