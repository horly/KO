<?php
	include('../connecting_data_base.php');

	$idvente = $_GET['idvente'];
	$getid = $_GET['id'];
	$id_connexion = $_GET['id_connexion'];
	$idUE = $_GET['idEU'];
	$nomE = $_GET['nom_entreprise'];
	$nomUE = $_GET['nom_unite_exploitation'];
	$devise = $_GET['devise'];

	 //on récupère le modèle de facture 
    $get_modele = $bdd->prepare("SELECT * FROM modele_facture WHERE idUE = ?");
    $get_modele->execute(array($idUE));
    $fetch_modele = $get_modele->fetch();

    $type_modele = $fetch_modele['type'];

    if($type_modele == 0)
    {
    	header('location:../facture/pdf/facture_default.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele);
    }
    if($type_modele == 1)
    {
      header('location:../facture/pdf/facture_model1.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele);
    }
    if($type_modele == 2)
    {
      header('location:../facture/pdf/facture_model2.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele);
    }
    if($type_modele == 3)
    {
      header('location:../facture/pdf/facture_model3.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele);
    }
    if($type_modele == 4)
    {
      header('location:../facture/pdf/facture_model4.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele);
    }
    if($type_modele == 5)
    {
      header('location:../facture/pdf/facture_model5.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele);
    }
?>