<?php
	//fonction de la page caisse_enregistreuse.php
	include('connecting_data_base.php');

	$idUE = $_GET['idUE'];
    $getid = $_GET['id'];
    $nomE = $_GET['nom_entreprise'];
    $nomUE = $_GET['nom_unite_exploitation'];
    $id_table = $_GET['id_table'];
    $id_connexion = $_GET['id_connexion'];

    //on récupère le client comptoire (client par défaut)
    $get_client = $bdd->prepare("SELECT * FROM client_for_user WHERE default_cli = ? AND id_UE_cli = ?");
    $get_client->execute(array(1, $idUE));

    $fetch_client = $get_client->fetch();
    $client_caisse = $fetch_client['id_cli'];


    $verifVente = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_UE_fact = ?");
    $verifVente->execute(array($idUE)) or die (print_r($verifVente->errorInfo()));


    $refCaise = 1; //initialement égal à 1
    $complete_vente = 0;
    $caisse_vente = 1;

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


        //maintenant ici on doit vérifier s'il y a des ventes restaurant bar qui sont pas encore achévées dans une table
        $verif_caise_rest = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_table = ? AND complete_vente = ? AND id_UE_fact = ?");
        $verif_caise_rest->execute(array($id_table, $complete_vente, $idUE));

        $fetch_vente = $verif_caise_rest->fetch();

        $count_vente_rest = $verif_caise_rest->rowCount();

        if(preg_match("/^[1-9]+/", $count_vente_rest)) //s'il y a déjà une vente non achévée
        {

            header("location:caisse_enregistreuse_restau_bar.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$fetch_vente['reference_caise']."&idClient=".$client_caisse);
        }
        else //si ça n'existe pas, je l'insert carrément
        {
            $insertTempVent = $bdd->prepare("INSERT INTO vente_for_user(reference_caise, id_UE_fact, id_gest_fact, id_cl_fact, num_facture, complete_vente, caisse_vente, id_table) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
            $insertTempVent->execute(array($refCaise, $idUE, $getid, $client_caisse, $num_facture, $complete_vente, $caisse_vente, $id_table));

            header("location:caisse_enregistreuse_restau_bar.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&idClient=".$client_caisse);
        }
    }
    else
    {
        $num_facture = "V".str_pad($refCaise, 5, 0, STR_PAD_LEFT); //on crée un numéro de facture du genre V00005 exemple

        //maintenant ici on doit vérifier s'il y a des ventes restaurant bar qui sont pas encore achévées dans une table
        $verif_caise_rest = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_table = ? AND complete_vente = ? AND id_UE_fact = ?");
        $verif_caise_rest->execute(array($id_table, $complete_vente, $idUE));

        $fetch_vente = $verif_caise_rest->fetch();

        $count_vente_rest = $verif_caise_rest->rowCount();

        if(preg_match("/^[1-9]+/", $count_vente_rest)) //s'il y a déjà une vente non achévée
        {
            header("location:caisse_enregistreuse_restau_bar.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$fetch_vente['reference_caise']."&idClient=".$client_caisse);
        }
        else //si ça n'existe pas, je l'insert carrément
        {
            $insertTempVent = $bdd->prepare("INSERT INTO vente_for_user(reference_caise, id_UE_fact, id_gest_fact, id_cl_fact, num_facture, complete_vente, caisse_vente, id_table) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
            $insertTempVent->execute(array($refCaise, $idUE, $getid, $client_caisse, $num_facture, $complete_vente, $caisse_vente, $id_table));

            header("location:caisse_enregistreuse_restau_bar.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&idClient=".$client_caisse);
        }
    }



    //header("location:caisse_enregistreuse_restau_bar.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".''."&idClient=".$client_caisse);

?>