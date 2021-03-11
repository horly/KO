<?php
	
	setlocale(LC_TIME, 'fr_FR'); //serveur
	//setlocale(LC_TIME, 'fra_fra'); //php 5 en local 



	$mois = date("m"); //on recupère le mois en cours en chiffre
    $annee = date("Y"); //de même pour l'année

    //annee - 1
    $annee1 = 0;
    //mois - 1
    $mois1 = date("m") - 1;
    $mois2 = date("m") - 2;
    $mois3 = date("m") - 3;
    $mois4 = date("m") - 4;
    $mois5 = date("m") - 5;
    


    $mois_actuelle = utf8_encode(ucfirst(strftime('%B'))); //la fonction ucfirst nous permet de mettre la première lettre en majuscule
    $mois_1 = utf8_encode(ucfirst(strftime('%B', strtotime('-1 month'))));
    $mois_2 = utf8_encode(ucfirst(strftime('%B', strtotime('-2 month'))));
    $mois_3 = utf8_encode(ucfirst(strftime('%B', strtotime('-3 month'))));
    $mois_4 = utf8_encode(ucfirst(strftime('%B', strtotime('-4 month'))));
    $mois_5 = utf8_encode(ucfirst(strftime('%B', strtotime('-5 month'))));


    //on calcul toutes les récettes de ce mois actuelles
    $get_recette_actuelle = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS recette FROM vente_for_user WHERE mois_fact = ? AND annee_fact = ? AND id_UE_fact = ?');
    $get_recette_actuelle->execute(array($mois, $annee, $idUE));
    $fetch_recette_actuelle = $get_recette_actuelle->fetch();
    $recette_mois_actuelles = $fetch_recette_actuelle['recette'];
    $rec_act = number_format($recette_mois_actuelles, 2, '.', '');


    //on calcul toutes les dépenses de ce mois actuelles pour les achats et les notes de frais
    $get_achat_actuelle = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS depense FROM depense_for_user WHERE mois_dp = ? AND annee_dp = ? AND id_UE_dp = ?');
    $get_achat_actuelle->execute(array($mois, $annee, $idUE));
    $fetch_achat_actuelle = $get_achat_actuelle->fetch();
    $achat_mois_actuelle = $fetch_achat_actuelle['depense'];

    $get_depense_actuelle = $bdd->prepare('SELECT SUM(reste_a_payer) AS depense FROM note_de_frais WHERE mois_fr = ? AND annee_fr = ? AND id_UE_fr = ?');
    $get_depense_actuelle->execute(array($mois, $annee, $idUE));
    $fetch_depense_actuelle = $get_depense_actuelle->fetch();
    $depense_mois_actuelle = $fetch_depense_actuelle['depense'];

    $total_depense = number_format($achat_mois_actuelle + $depense_mois_actuelle, 2, '.', '');
    $resultat_actuelle = number_format($rec_act - $depense_mois_actuelle, 2, '.', '');


    //on exécute pour le mois précédant donc mois - 1
    //initialisation des variables
    $rec_act1 = 0;
    $total_depense1 = 0;
    $resultat_1 = 0;

    if($mois1 <= 0)
    {
    	$mois1 = $mois1 + 12;
    	$annee1 = $annee - 1;

    	//on calcul toutes les récettes de ce mois - 1
	    $get_recette_1 = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS recette FROM vente_for_user WHERE mois_fact = ? AND annee_fact = ? AND id_UE_fact = ?');
	    $get_recette_1->execute(array($mois1, $annee1, $idUE));
	    $fetch_recette_1 = $get_recette_1->fetch();
	    $recette_mois_1 = $fetch_recette_1['recette'];
	    $rec_act1 = number_format($recette_mois_1, 2, '.', '');


	    //on calcul toutes les dépenses de ce mois - 1 pour les achats et les notes de frais
	    $get_achat_1 = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS depense FROM depense_for_user WHERE mois_dp = ? AND annee_dp = ? AND id_UE_dp = ?');
	    $get_achat_1->execute(array($mois1, $annee1, $idUE));
	    $fetch_achat_1 = $get_achat_1->fetch();
	    $achat_mois_1 = $fetch_achat_1['depense'];


	    $get_depense_1 = $bdd->prepare('SELECT SUM(reste_a_payer) AS depense FROM note_de_frais WHERE mois_fr = ? AND annee_fr = ? AND id_UE_fr = ?');
	    $get_depense_1->execute(array($mois1, $annee1, $idUE));
	    $fetch_depense_1 = $get_depense_1->fetch();
	    $depense_mois_1 = $fetch_depense_1['depense'];

	    $total_depense1 = number_format($achat_mois_1 + $depense_mois_1, 2, '.', '');
    	$resultat_1 = number_format($rec_act1 - $total_depense1, 2, '.', '');
    }
    else
    {

    	//on calcul toutes les récettes de ce mois - 1
	    $get_recette_1 = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS recette FROM vente_for_user WHERE mois_fact = ? AND annee_fact = ? AND id_UE_fact = ?');
	    $get_recette_1->execute(array($mois1, $annee, $idUE));
	    $fetch_recette_1 = $get_recette_1->fetch();
	    $recette_mois_1 = $fetch_recette_1['recette'];
	    $rec_act1 = number_format($recette_mois_1, 2, '.', '');


	    //on calcul toutes les dépenses de ce mois - 1 pour les achats et les notes de frais
	    $get_achat_1 = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS depense FROM depense_for_user WHERE mois_dp = ? AND annee_dp = ? AND id_UE_dp = ?');
	    $get_achat_1->execute(array($mois1, $annee, $idUE));
	    $fetch_achat_1 = $get_achat_1->fetch();
	    $achat_mois_1 = $fetch_achat_1['depense'];


	    $get_depense_1 = $bdd->prepare('SELECT SUM(reste_a_payer) AS depense FROM note_de_frais WHERE mois_fr = ? AND annee_fr = ? AND id_UE_fr = ?');
	    $get_depense_1->execute(array($mois1, $annee, $idUE));
	    $fetch_depense_1 = $get_depense_1->fetch();
	    $depense_mois_1 = $fetch_depense_1['depense'];

	    $total_depense1 = number_format($achat_mois_1 + $depense_mois_1, 2, '.', '');
    	$resultat_1 = number_format($rec_act1 - $total_depense1, 2, '.', '');
    }


    //on exécute pour le mois précédant donc mois - 2
    //initialisation des variables
    $rec_act2 = 0;
    $total_depense2 = 0;
    $resultat_2 = 0;

    if($mois2 <= 0)
    {
    	$mois2 = $mois2 + 12;
    	$annee1 = $annee - 1;

    	//on calcul toutes les récettes de ce mois - 2
	    $get_recette_2 = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS recette FROM vente_for_user WHERE mois_fact = ? AND annee_fact = ? AND id_UE_fact = ?');
	    $get_recette_2->execute(array($mois2, $annee1, $idUE));
	    $fetch_recette_2 = $get_recette_2->fetch();
	    $recette_mois_2 = $fetch_recette_2['recette'];
	    $rec_act2 = number_format($recette_mois_2, 2, '.', '');


	    //on calcul toutes les dépenses de ce mois - 1 pour les achats et les notes de frais
	    $get_achat_2 = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS depense FROM depense_for_user WHERE mois_dp = ? AND annee_dp = ? AND id_UE_dp = ?');
	    $get_achat_2->execute(array($mois2, $annee1, $idUE));
	    $fetch_achat_2 = $get_achat_2->fetch();
	    $achat_mois_2 = $fetch_achat_2['depense'];


	    $get_depense_2 = $bdd->prepare('SELECT SUM(reste_a_payer) AS depense FROM note_de_frais WHERE mois_fr = ? AND annee_fr = ? AND id_UE_fr = ?');
	    $get_depense_2->execute(array($mois2, $annee1, $idUE));
	    $fetch_depense_2 = $get_depense_2->fetch();
	    $depense_mois_2 = $fetch_depense_2['depense'];

	    $total_depense2 = number_format($achat_mois_2 + $depense_mois_2, 2, '.', '');
    	$resultat_2 = number_format($rec_act2 - $total_depense2, 2, '.', '');
    }
    else
    {

    	//on calcul toutes les récettes de ce mois - 2
	    $get_recette_2 = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS recette FROM vente_for_user WHERE mois_fact = ? AND annee_fact = ? AND id_UE_fact = ?');
	    $get_recette_2->execute(array($mois2, $annee, $idUE));
	    $fetch_recette_2 = $get_recette_2->fetch();
	    $recette_mois_2 = $fetch_recette_2['recette'];
	    $rec_act2 = number_format($recette_mois_2, 2, '.', '');


	    //on calcul toutes les dépenses de ce mois - 1 pour les achats et les notes de frais
	    $get_achat_2 = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS depense FROM depense_for_user WHERE mois_dp = ? AND annee_dp = ? AND id_UE_dp = ?');
	    $get_achat_2->execute(array($mois2, $annee, $idUE));
	    $fetch_achat_2 = $get_achat_2->fetch();
	    $achat_mois_2 = $fetch_achat_2['depense'];


	    $get_depense_2 = $bdd->prepare('SELECT SUM(reste_a_payer) AS depense FROM note_de_frais WHERE mois_fr = ? AND annee_fr = ? AND id_UE_fr = ?');
	    $get_depense_2->execute(array($mois2, $annee, $idUE));
	    $fetch_depense_2 = $get_depense_2->fetch();
	    $depense_mois_2 = $fetch_depense_2['depense'];

	    $total_depense2 = number_format($achat_mois_2 + $depense_mois_2, 2, '.', '');
    	$resultat_2 = number_format($rec_act2 - $total_depense2, 2, '.', '');
    }


     //on exécute pour le mois précédant donc mois - 3
    //initialisation des variables
    $rec_act3 = 0;
    $total_depense3 = 0;
    $resultat_3 = 0;

    if($mois3 <= 0)
    {
    	$mois3 = $mois3 + 12;
    	$annee1 = $annee - 1;

    	//on calcul toutes les récettes de ce mois - 3
	    $get_recette_3 = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS recette FROM vente_for_user WHERE mois_fact = ? AND annee_fact = ? AND id_UE_fact = ?');
	    $get_recette_3->execute(array($mois3, $annee1, $idUE));
	    $fetch_recette_3 = $get_recette_3->fetch();
	    $recette_mois_3 = $fetch_recette_3['recette'];
	    $rec_act3 = number_format($recette_mois_3, 2, '.', '');


	    //on calcul toutes les dépenses de ce mois - 1 pour les achats et les notes de frais
	    $get_achat_3 = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS depense FROM depense_for_user WHERE mois_dp = ? AND annee_dp = ? AND id_UE_dp = ?');
	    $get_achat_3->execute(array($mois3, $annee1, $idUE));
	    $fetch_achat_3 = $get_achat_3->fetch();
	    $achat_mois_3 = $fetch_achat_3['depense'];


	    $get_depense_3 = $bdd->prepare('SELECT SUM(reste_a_payer) AS depense FROM note_de_frais WHERE mois_fr = ? AND annee_fr = ? AND id_UE_fr = ?');
	    $get_depense_3->execute(array($mois3, $annee1, $idUE));
	    $fetch_depense_3 = $get_depense_3->fetch();
	    $depense_mois_3 = $fetch_depense_3['depense'];

	    $total_depense3 = number_format($achat_mois_3 + $depense_mois_3, 2, '.', '');
    	$resultat_3 = number_format($rec_act3 - $total_depense3, 2, '.', '');
    }
    else
    {

    	//on calcul toutes les récettes de ce mois - 3
	    $get_recette_3 = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS recette FROM vente_for_user WHERE mois_fact = ? AND annee_fact = ? AND id_UE_fact = ?');
	    $get_recette_3->execute(array($mois3, $annee, $idUE));
	    $fetch_recette_3 = $get_recette_3->fetch();
	    $recette_mois_3 = $fetch_recette_3['recette'];
	    $rec_act3 = number_format($recette_mois_3, 2, '.', '');


	    //on calcul toutes les dépenses de ce mois - 1 pour les achats et les notes de frais
	    $get_achat_3 = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS depense FROM depense_for_user WHERE mois_dp = ? AND annee_dp = ? AND id_UE_dp = ?');
	    $get_achat_3->execute(array($mois3, $annee, $idUE));
	    $fetch_achat_3 = $get_achat_3->fetch();
	    $achat_mois_3 = $fetch_achat_3['depense'];


	    $get_depense_3 = $bdd->prepare('SELECT SUM(reste_a_payer) AS depense FROM note_de_frais WHERE mois_fr = ? AND annee_fr = ? AND id_UE_fr = ?');
	    $get_depense_3->execute(array($mois3, $annee, $idUE));
	    $fetch_depense_3 = $get_depense_3->fetch();
	    $depense_mois_3 = $fetch_depense_3['depense'];

	    $total_depense3 = number_format($achat_mois_3 + $depense_mois_3, 2, '.', '');
    	$resultat_3 = number_format($rec_act3 - $total_depense3, 2, '.', '');
    }


     //on exécute pour le mois précédant donc mois - 4
    //initialisation des variables
    $rec_act4 = 0;
    $total_depense4 = 0;
    $resultat_4 = 0;

    if($mois4 <= 0)
    {
    	$mois4 = $mois4 + 12;
    	$annee1 = $annee - 1;

    	//on calcul toutes les récettes de ce mois - 4
	    $get_recette_4 = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS recette FROM vente_for_user WHERE mois_fact = ? AND annee_fact = ? AND id_UE_fact = ?');
	    $get_recette_4->execute(array($mois4, $annee1, $idUE));
	    $fetch_recette_4 = $get_recette_4->fetch();
	    $recette_mois_4 = $fetch_recette_4['recette'];
	    $rec_act4 = number_format($recette_mois_4, 2, '.', '');


	    //on calcul toutes les dépenses de ce mois - 4 pour les achats et les notes de frais
	    $get_achat_4 = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS depense FROM depense_for_user WHERE mois_dp = ? AND annee_dp = ? AND id_UE_dp = ?');
	    $get_achat_4->execute(array($mois4, $annee1, $idUE));
	    $fetch_achat_4 = $get_achat_4->fetch();
	    $achat_mois_4 = $fetch_achat_4['depense'];


	    $get_depense_4 = $bdd->prepare('SELECT SUM(reste_a_payer) AS depense FROM note_de_frais WHERE mois_fr = ? AND annee_fr = ? AND id_UE_fr = ?');
	    $get_depense_4->execute(array($mois4, $annee1, $idUE));
	    $fetch_depense_4 = $get_depense_4->fetch();
	    $depense_mois_4 = $fetch_depense_4['depense'];

	    $total_depense4 = number_format($achat_mois_4 + $depense_mois_4, 2, '.', '');
    	$resultat_4 = number_format($rec_act4 - $total_depense4, 2, '.', '');
    }
    else
    {

    	//on calcul toutes les récettes de ce mois - 4
	    $get_recette_4 = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS recette FROM vente_for_user WHERE mois_fact = ? AND annee_fact = ? AND id_UE_fact = ?');
	    $get_recette_4->execute(array($mois4, $annee, $idUE));
	    $fetch_recette_4 = $get_recette_4->fetch();
	    $recette_mois_4 = $fetch_recette_4['recette'];
	    $rec_act4 = number_format($recette_mois_4, 2, '.', '');


	    //on calcul toutes les dépenses de ce mois - 4 pour les achats et les notes de frais
	    $get_achat_4 = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS depense FROM depense_for_user WHERE mois_dp = ? AND annee_dp = ? AND id_UE_dp = ?');
	    $get_achat_4->execute(array($mois4, $annee, $idUE));
	    $fetch_achat_4 = $get_achat_4->fetch();
	    $achat_mois_4 = $fetch_achat_4['depense'];


	    $get_depense_4 = $bdd->prepare('SELECT SUM(reste_a_payer) AS depense FROM note_de_frais WHERE mois_fr = ? AND annee_fr = ? AND id_UE_fr = ?');
	    $get_depense_4->execute(array($mois4, $annee, $idUE));
	    $fetch_depense_4 = $get_depense_4->fetch();
	    $depense_mois_4 = $fetch_depense_4['depense'];

	    $total_depense4 = number_format($achat_mois_4 + $depense_mois_4, 2, '.', '');
    	$resultat_4 = number_format($rec_act4 - $total_depense4, 2, '.', '');
    }


      //on exécute pour le mois précédant donc mois - 5
    //initialisation des variables
    $rec_act5 = 0;
    $total_depense5 = 0;
    $resultat_5 = 0;

    if($mois5 <= 0)
    {
    	$mois5 = $mois5 + 12;
    	$annee1 = $annee - 1;

    	//on calcul toutes les récettes de ce mois - 5
	    $get_recette_5 = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS recette FROM vente_for_user WHERE mois_fact = ? AND annee_fact = ? AND id_UE_fact = ?');
	    $get_recette_5->execute(array($mois5, $annee1, $idUE));
	    $fetch_recette_5 = $get_recette_5->fetch();
	    $recette_mois_5 = $fetch_recette_5['recette'];
	    $rec_act5 = number_format($recette_mois_5, 2, '.', '');


	    //on calcul toutes les dépenses de ce mois - 5 pour les achats et les notes de frais
	    $get_achat_5 = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS depense FROM depense_for_user WHERE mois_dp = ? AND annee_dp = ? AND id_UE_dp = ?');
	    $get_achat_5->execute(array($mois5, $annee1, $idUE));
	    $fetch_achat_5 = $get_achat_5->fetch();
	    $achat_mois_5 = $fetch_achat_5['depense'];


	    $get_depense_5 = $bdd->prepare('SELECT SUM(reste_a_payer) AS depense FROM note_de_frais WHERE mois_fr = ? AND annee_fr = ? AND id_UE_fr = ?');
	    $get_depense_5->execute(array($mois5, $annee1, $idUE));
	    $fetch_depense_5 = $get_depense_5->fetch();
	    $depense_mois_5 = $fetch_depense_5['depense'];

	    $total_depense5 = number_format($achat_mois_5 + $depense_mois_5, 2, '.', '');
    	$resultat_5 = number_format($rec_act5 - $total_depense5, 2, '.', '');
    }
    else
    {

    	//on calcul toutes les récettes de ce mois - 5
	    $get_recette_5 = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS recette FROM vente_for_user WHERE mois_fact = ? AND annee_fact = ? AND id_UE_fact = ?');
	    $get_recette_5->execute(array($mois5, $annee, $idUE));
	    $fetch_recette_5 = $get_recette_5->fetch();
	    $recette_mois_5 = $fetch_recette_5['recette'];
	    $rec_act5 = number_format($recette_mois_5, 2, '.', '');


	    //on calcul toutes les dépenses de ce mois - 5 pour les achats et les notes de frais
	    $get_achat_5 = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS depense FROM depense_for_user WHERE mois_dp = ? AND annee_dp = ? AND id_UE_dp = ?');
	    $get_achat_5->execute(array($mois5, $annee, $idUE));
	    $fetch_achat_5 = $get_achat_5->fetch();
	    $achat_mois_5 = $fetch_achat_5['depense'];


	    $get_depense_5 = $bdd->prepare('SELECT SUM(reste_a_payer) AS depense FROM note_de_frais WHERE mois_fr = ? AND annee_fr = ? AND id_UE_fr = ?');
	    $get_depense_5->execute(array($mois5, $annee, $idUE));
	    $fetch_depense_5 = $get_depense_5->fetch();
	    $depense_mois_5 = $fetch_depense_5['depense'];

	    $total_depense5 = number_format($achat_mois_5 + $depense_mois_5, 2, '.', '');
    	$resultat_5 = number_format($rec_act5 - $total_depense5, 2, '.', '');
    }


?>