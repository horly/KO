<!doctype html>
<!--Début html-->
<html lang="fr">
<!--Début html-->
    <head>
    <!--Début head-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="../asserts/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../asserts/css/dashboard.css" >-->

        <!--Style personnel-->
        <link rel="stylesheet" href="../asserts/css/style.css" >
        
        <!--Chargement des styles pour les icones des reseaux socio-->
        <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <link rel="stylesheet" href="../asserts/css/docs.css" >
        <link rel="stylesheet" href="../asserts/css/font-awesome.css" >

         <!--chargement des icones-->
        <link href="../icons/css/ionicons.css" rel="stylesheet" type="text/css" />
        <link href="../icons/css/iconstyles.css" rel="stylesheet" type="text/css" />

        <!--CSS charts-->
        <!--<link rel="stylesheet" href="../asserts/css/chartist.min.css">-->

        <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">

        <!--ceci pour le chart graphique (tableau de statystique)-->
        <link rel="stylesheet" type="text/css" href="../asserts/C3/css/c3.css">


        <link rel="stylesheet" href="assets/css/normalize.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/icons/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/icons/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="assets/icons/pixeden-stroke-7-icon-master/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <link rel="stylesheet" href="assets/icons/flag-icon-css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <link href="assets/icons/weather-icons/css/weather-icons.min.css" rel="stylesheet" />
        <link href="assets/css/lib/calendar/fullcalendar.css" rel="stylesheet" />


        <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">

        <!--Mon modal personnel-->
        <link rel="stylesheet" type="text/css" href="assets/css/modal.mata.css">

        <!--loader-->
        <link rel="stylesheet" type="text/css" href="assets/css/loader.css">

  

    <style type="text/css">
     

    .container-tab1 {
        overflow-y: auto;
        height: 150px;
        background-color: white;
      }

      /*tr:nth-child(even) {background-color: #d1ecf1;}
      tbody tr:hover{ background-color: #F1F1F1;  }*/

      .scrollcat
      {
        height:150px;
        width:100%;
        overflow:auto;
      }

      #dropdownMenuLink
      {
        border: 1px solid gray;
        color: black;
      }

      .form_card
        {
          background-color: #d1ecf1;
        }

        /* .body-modal-article
        {
          overflow-y: auto;
          height: 485px;
          background-color: white;
        }*/

       #libsearchcatart {
          background-image: url('../icons/png/office/search.png');
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 6px 12px 5px 40px;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
      }

      

    </style>
        

         <title>KEDIS Online! | Mes moyens de paiements</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 
                    //session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']))  //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; //on protège la variable
                      $get_id_connexion = $_GET['id_connexion']; 
                      $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
                      $requser->execute(array($getid));

                      $userfos = $requser->fetch();
                      $getname = $userfos['nom_cl'];
                      $getprenom = $userfos['prenom_cl'];
                      $getmail = $userfos['email_cl'];
                      $getprofil = $userfos['profil_cl']; 
                      $sexe= $userfos['sexe_cl'];
                      $login_required = $userfos['login_required'];
                      $id_connexion = $userfos['id_connexion'];
                      $id_abonne = $userfos['id_abonnement'];


                      if($id_connexion == $get_id_connexion)
                      {

                        //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                        if($login_required == 1)
                        {

                          $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise
                          $nomUE = $_GET['nom_unite_exploitation']; //on recupère le nom de l'UE

                          //on recupère la date debut du mois
                          $datedebut = date("Y-m-d", mktime(0,0,0,date("m"),1,date("Y")));
                          //on recupère la date fin du mois
                          $datefin = date("Y-m-d", mktime(0,0,0,date("m")+1,0,date("Y")));

                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production

                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];

                          //on récupère d'abord le type d'abonnement du client 
                          $get_abonnement = $bdd->prepare("SELECT * FROM abonnement WHERE id = ? ");
                          $get_abonnement->execute(array($id_abonne));

                          $info_abonne = $get_abonnement->fetch();
                          $type_abonne = $info_abonne['type'];
                  ?>
                <!--Code PHP-->

                <!--Code PHP-->
      <!--chargement de la page-->
      <div class="preload">
          <div id="floatingBarsG">
            <div class="blockG" id="rotateG_01"></div>
            <div class="blockG" id="rotateG_02"></div>
            <div class="blockG" id="rotateG_03"></div>
            <div class="blockG" id="rotateG_04"></div>
            <div class="blockG" id="rotateG_05"></div>
            <div class="blockG" id="rotateG_06"></div>
            <div class="blockG" id="rotateG_07"></div>
            <div class="blockG" id="rotateG_08"></div>
          </div>
        </div>

    <div id="body">              
       <!--on inlus la navigation du menu -->
        <?php include('navigation.php'); ?>

         <div id="right-panel" class="right-panel">
            
            <!--on inlus la la barre de navigation au dessus-->
            <?php  include('navbar.php'); ?>

            <?php 
              //on recupère le numéro d'entreprise pour retourner en arrière 
              $getidEntrep = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
              $getidEntrep->execute(array($idUE));
              $fetchUE = $getidEntrep->fetch();
              $idE = $fetchUE['idEnt'];

            ?>
            <!-- Breadcrumbs-->
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Mes modes de paiement</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Mes modes de paiement</a></li>
                                        <li class="active">Mes modes de paiement</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
              <!-- Animated -->
              <div class="animated fadeIn">
                <div class="card">
                  <h6 class="card-header">
                     <ul class="nav nav-pills card-header-pills">
                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['mode_paiement'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link active" href="#"><strong>Mes modes de paiement</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['monnaie_etrangere'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="monnaie.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes monnaies étrangères</strong></a>
                        </li>
                      <?php
                          }
                      ?>
                    </ul>
                  </h6>

                      <?php 
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM compte_financier WHERE id_UE_cmp = ?");
                          $view->execute(array($idUE));
                          $i = 1;
                          $existallvente = $view->rowCount();

                        ?>
                      <div class="card-body">
                          <div class="card border-info mb-3" >
                              <div class="card-header text-left"><strong><b>Liste de moyens de paiement (Total : <?php echo $existallvente; ?>)</b></strong></div>
                                <div class="card-body">
                                  <div class="p-3 mb-2 bg-light text-dark border">
                                    <div class="row">
                                      <div class="col-md-2">
                                        
                                        <?php

                                          if($type_abonne == 'Petite Entreprise')
                                          {
                                            if($existallvente < 5)
                                            {
                                        ?>

                                           <button class="btn btn-success btn-block" data-toggle="modal" data-target=".ajouter-moyen-paiement">
                                              <span class="step size-21">
                                                  <i class="icon ion-card" role="button"></i>
                                              </span>
                                                  &nbsp;&nbsp;Ajouter</button>

                                        <?php
                                            }
                                            else
                                            {
                                        ?>

                                          <div class="alert alert-primary" role="alert">
                                            Vous avez atteint le nombre maximal de moyens de paiement.
                                          </div>

                                        <?php
                                            }
                                          }
                                          else
                                          {

                                        ?>

                                          <button class="btn btn-success btn-block" data-toggle="modal" data-target=".ajouter-moyen-paiement">
                                              <span class="step size-21">
                                                  <i class="icon ion-card" role="button"></i>
                                              </span>
                                                  &nbsp;&nbsp;Ajouter</button>

                                        <?php
                                          }

                                        ?>


                                            
                                      </div>
                                      <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                      </div>
                                    </div>                               
                                  </div>
                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>N°</th>
                                        <th>Désignation</th>
                                        <th>Encaissements</th>
                                        <th>Décaissements</th>
                                        <th>Solde</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered" id="table_article">
                                      <?php

                                       $view = $bdd->prepare("SELECT * FROM compte_financier WHERE id_UE_cmp = ?");
                                        $view->execute(array($idUE));
                                        $i = 1;

                                        $existallcat = $view->rowCount();

                                        
                                            while($row = $view->fetch()) 
                                            {
                                         ?>   
                                            <tr>
                                              <td><?php echo $i++; ?></td>
                                              <td class="text-left"><?php echo $row['lib_cmp']; ?></td>
                                              <td class="text-right">
                                                <?php 

                                                    $encaissement = $bdd->prepare("SELECT SUM(montant) AS total_montant_vente_op FROM operation_vente WHERE id_comp = ? AND id_UE = ?");
                                                    $encaissement->execute(array($row['id_cmp'], $idUE));
                                                    $fetch_encaiss = $encaissement->fetch();
                                                    $total_encaissement = $fetch_encaiss['total_montant_vente_op'];


                                                    //on rajoute aussi le decaissement de paiement des clients
                                                    $caissement_note_cra = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_note_credit_achat WHERE id_comp = ? AND id_UE = ?");
                                                    $caissement_note_cra->execute(array($row['id_cmp'], $idUE));
                                                    $fetch_encaiss_cra = $caissement_note_cra->fetch();
                                                    $total_encaissement_cra = $fetch_encaiss_cra['total_montant_note_op'];

                                                    //on rajoute aussi les paiements des créances
                                                    $caissement_creance = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_creance WHERE id_comp = ? AND id_UE = ? AND initial != 1 ");
                                                    $caissement_creance->execute(array($row['id_cmp'], $idUE));
                                                    $fetch_encaiss_creance = $caissement_creance->fetch();
                                                    $total_encaissement_creance = $fetch_encaiss_creance['total_montant_note_op'];

                                                    //on rajoute les dettes initial parce que c'est des encaissement
                                                    $caissement_dette_init = $bdd->prepare("SELECT SUM(montant) AS total_montant_dette_init FROM operation_dette WHERE id_comp = ? AND id_UE = ? AND initial = 1 ");
                                                    $caissement_dette_init->execute(array($row['id_cmp'], $idUE));
                                                    $fetch_encaiss_dette_init = $caissement_dette_init->fetch();
                                                    $total_encaissement_dette_init = $fetch_encaiss_dette_init['total_montant_dette_init'];

                                                    //on rajoute aussi l'encaissement de pour les dépenses(note de frais)
                                                    $encaissement_note_depense = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_note_frais WHERE id_comp = ? AND id_UE = ? AND initial != 1 ");
                                                    $encaissement_note_depense->execute(array($row['id_cmp'], $idUE));
                                                    $fetch_encaiss_depense = $encaissement_note_depense->fetch();
                                                    $total_encaissement_depense = $fetch_encaiss_depense['total_montant_note_op'];


                                                    //on rajoute aussi l'encaissement de pour les fonds de caisse
                                                    $encaissement_fond_caisse = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_fond_caisse WHERE id_comp = ? AND id_UE = ?");
                                                    $encaissement_fond_caisse->execute(array($row['id_cmp'], $idUE));
                                                    $fetch_encaiss_fond_caisse = $encaissement_fond_caisse->fetch();
                                                    $total_encaissement_fond_caisse = $fetch_encaiss_fond_caisse['total_montant_note_op'];

                                                    $total_encaissement_final = $total_encaissement + $total_encaissement_cra + $total_encaissement_creance + $total_encaissement_dette_init + $total_encaissement_depense +   $total_encaissement_fond_caisse;


                                                    echo number_format($total_encaissement_final, 2, ',', ' '); 
                                                ?>
                                              </td>
                                              <td class="text-right">
                                                <?php 

                                                    $decaissement = $bdd->prepare("SELECT SUM(montant) AS total_montant_depense_op FROM operation_achat WHERE id_comp = ? AND id_UE = ?");
                                                    $decaissement->execute(array($row['id_cmp'], $idUE));
                                                    $fetch_decaiss = $decaissement->fetch();
                                                    $total_decaissement = $fetch_decaiss['total_montant_depense_op'];


                                                    //on rajoute aussi le decaissement de paiement des clients
                                                    $decaissement_note_cr = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_note_credit WHERE id_comp = ? AND id_UE = ?");
                                                    $decaissement_note_cr->execute(array($row['id_cmp'], $idUE));
                                                    $fetch_decaiss_cr = $decaissement_note_cr->fetch();
                                                    $total_decaissement_cr = $fetch_decaiss_cr['total_montant_note_op'];

                                                    //on rajoute aussi le decaissement de pour les dépenses(note de frais)
                                                    $decaissement_note_depense = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_note_frais WHERE id_comp = ? AND id_UE = ? AND initial = 1 ");
                                                    $decaissement_note_depense->execute(array($row['id_cmp'], $idUE));
                                                    $fetch_decaiss_depense = $decaissement_note_depense->fetch();
                                                    $total_decaissement_depense = $fetch_decaiss_depense['total_montant_note_op'];

                                                    //on rajoute aussi les paiements des dettes
                                                    $decaissement_dette = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_dette WHERE id_comp = ? AND id_UE = ? AND initial != 1 ");
                                                    $decaissement_dette->execute(array($row['id_cmp'], $idUE));
                                                    $fetch_decaiss_dette = $decaissement_dette->fetch();
                                                    $total_decaissement_dette = $fetch_decaiss_dette['total_montant_note_op'];

                                                    //on rajoute les créances initial parce que c'est des décaissement
                                                    $caissement_creance_init = $bdd->prepare("SELECT SUM(montant) AS total_montant_creance_init FROM operation_creance WHERE id_comp = ? AND id_UE = ? AND initial = 1 ");
                                                    $caissement_creance_init->execute(array($row['id_cmp'], $idUE));
                                                    $fetch_encaiss_creance_init = $caissement_creance_init->fetch();
                                                    $total_encaissement_creance_init = $fetch_encaiss_creance_init['total_montant_creance_init'];


                                                    $total_decaissement_final = $total_decaissement + $total_decaissement_cr + $total_decaissement_depense + $total_decaissement_dette + $total_encaissement_creance_init;

                                                    echo number_format($total_decaissement_final, 2, ',', ' ');
                                                ?>
                                              </td>
                                              <td class="text-right">
                                                <?php 

                                                    //$solde = $encaissement - $total_decaissement;

                                                    echo number_format($total_encaissement_final - $total_decaissement_final, 2, ',', ' ');

                                                ?>
                                              </td>
                                              <td>
                                                <a class="text-primary" href="viewComptfin.php?id=<?php echo $getid;?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&id_cmp=<?php echo $row['id_cmp'];?>">Détails</a>
                                              </td>
                                          </tr>
                                          <?php 
                                            } 
                                    ?>
                                    </tbody>

                                    <?php

                                        //total ancaissement
                                        $encaissement = $bdd->prepare("SELECT SUM(montant) AS total_montant_vente_op FROM operation_vente WHERE id_UE = ?");
                                        $encaissement->execute(array($idUE));
                                        $fetch_encaiss = $encaissement->fetch();
                                        $total_encaissement = $fetch_encaiss['total_montant_vente_op'];


                                        //on rajoute aussi le decaissement de paiement des clients
                                        $caissement_note_cra = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_note_credit_achat WHERE id_UE = ?");
                                        $caissement_note_cra->execute(array($idUE));
                                        $fetch_encaiss_cra = $caissement_note_cra->fetch();
                                        $total_encaissement_cra = $fetch_encaiss_cra['total_montant_note_op'];

                                        //on rajoute aussi les paiements des créances
                                        $caissement_creance = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_creance WHERE id_UE = ? AND initial != 1 ");
                                        $caissement_creance->execute(array($idUE));
                                        $fetch_encaiss_creance = $caissement_creance->fetch();
                                        $total_encaissement_creance = $fetch_encaiss_creance['total_montant_note_op'];

                                        //on rajoute les dettes initial parce que c'est des encaissement
                                        $caissement_dette_init = $bdd->prepare("SELECT SUM(montant) AS total_montant_dette_init FROM operation_dette WHERE id_UE = ? AND initial = 1 ");
                                        $caissement_dette_init->execute(array($idUE));
                                        $fetch_encaiss_dette_init = $caissement_dette_init->fetch();
                                        $total_encaissement_dette_init = $fetch_encaiss_dette_init['total_montant_dette_init'];

                                        //on rajoute aussi l'encaissement de pour les dépenses(note de frais)
                                        $encaissement_note_depense = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_note_frais WHERE id_UE = ? AND initial != 1 ");
                                        $encaissement_note_depense->execute(array($idUE));
                                        $fetch_encaiss_depense = $encaissement_note_depense->fetch();
                                        $total_encaissement_depense = $fetch_encaiss_depense['total_montant_note_op'];

                                        //on rajoute aussi l'encaissement de pour les fonds de caisse
                                        $encaissement_fond_caisse = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_fond_caisse WHERE id_UE = ?");
                                        $encaissement_fond_caisse->execute(array($idUE));
                                        $fetch_encaiss_fond_caisse = $encaissement_fond_caisse->fetch();
                                        $total_encaissement_fond_caisse = $fetch_encaiss_fond_caisse['total_montant_note_op'];

                                        $total_encaissement_final = $total_encaissement + $total_encaissement_cra + $total_encaissement_creance + $total_encaissement_dette_init + $total_encaissement_depense + $total_encaissement_fond_caisse;


                                        //total décaissement
                                        $decaissement = $bdd->prepare("SELECT SUM(montant) AS total_montant_depense_op FROM operation_achat WHERE id_UE = ?");
                                        $decaissement->execute(array($idUE));
                                        $fetch_decaiss = $decaissement->fetch();
                                        $total_decaissement = $fetch_decaiss['total_montant_depense_op'];


                                        //on rajoute aussi le decaissement de paiement des clients
                                        $decaissement_note_cr = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_note_credit WHERE id_UE = ?");
                                        $decaissement_note_cr->execute(array($idUE));
                                        $fetch_decaiss_cr = $decaissement_note_cr->fetch();
                                        $total_decaissement_cr = $fetch_decaiss_cr['total_montant_note_op'];

                                        //on rajoute aussi le decaissement de pour les dépenses(note de frais)
                                        $decaissement_note_depense = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_note_frais WHERE id_UE = ? AND initial = 1 ");
                                        $decaissement_note_depense->execute(array($idUE));
                                        $fetch_decaiss_depense = $decaissement_note_depense->fetch();
                                        $total_decaissement_depense = $fetch_decaiss_depense['total_montant_note_op'];

                                        //on rajoute aussi les paiements des dettes
                                        $decaissement_dette = $bdd->prepare("SELECT SUM(montant) AS total_montant_note_op FROM operation_dette WHERE id_UE = ? AND initial != 1 ");
                                        $decaissement_dette->execute(array($idUE));
                                        $fetch_decaiss_dette = $decaissement_dette->fetch();
                                        $total_decaissement_dette = $fetch_decaiss_dette['total_montant_note_op'];

                                        //on rajoute les créances initial parce que c'est des décaissement
                                        $caissement_creance_init = $bdd->prepare("SELECT SUM(montant) AS total_montant_creance_init FROM operation_creance WHERE id_UE = ? AND initial = 1 ");
                                        $caissement_creance_init->execute(array($idUE));
                                        $fetch_encaiss_creance_init = $caissement_creance_init->fetch();
                                        $total_encaissement_creance_init = $fetch_encaiss_creance_init['total_montant_creance_init'];


                                        $total_decaissement_final = $total_decaissement + $total_decaissement_cr + $total_decaissement_depense + $total_decaissement_dette + $total_encaissement_creance_init;

                                        
                                         


                                    ?>

                                    <tfoot>
                                      <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th class="text-right"><?php echo number_format($total_encaissement_final, 2, ',', ' '); ?></th>
                                        <th class="text-right"><?php echo number_format($total_decaissement_final, 2, ',', ' '); ?></th>
                                        <th class="text-right"><?php echo number_format($total_encaissement_final - $total_decaissement_final, 2, ',', ' '); ?></th>
                                        <th></th>
                                      </tr>
                                    </tfoot>

                                </table>

                                </div>
                            </div>
                      </div>
                  </div>
              </div>
              <!-- Animated -->

            </div>

               <!--les modales-->
                 <!--debut modale new mode de paiement-->
              <div class="modal fade bd-example-modal-lg ajouter-moyen-paiement" id="modal_moyen_paiement" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Ajouter un mode de paiement</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                        
                      </div>

                      <div class="modal-body body-modal-article">

                       <div class="card form_card">
                        <div class="card-body">

                             <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lib_cmp"><h6>Libellé</h6></label>
                                    <input type="text" class="form-control" id="lib_cmp" aria-describedby="emailHelp" placeholder="Libellé moyen de paiement" name="lib_cmp">
                                </div>
                              </div>


                              <div class="col-md-6">
                               <div class="form-group">
                                  <label for="nom_inst_cmp"><h6>Nom de l'institution (si banque)</h6></label>
                                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Entrez le nom de l'institution" name="nom_inst_cmp" id="nom_inst_cmp">
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="iban_cmp"><h6>Iban (si banque))</h6></label>
                                  <input type="text" class="form-control" id="iban_cmp" aria-describedby="emailHelp" placeholder="Entrez l'Iban" name="iban_cmp">
                                </div>
                              </div>


                              <div class="col-md-6">
                               <div class="form-group">
                                  <label for="gest_neg_cmp"><h6>Gestion des négatifs</h6></label>
                                  <select class="custom-select" name="gest_neg_cmp" id="gest_neg_cmp">
                                    <option value="Oui" selected>Oui</option>
                                    <option value="Non">Non</option>
                                  </select>
                                  <!--<small id="emailHelp" class="form-text text-muted"><strong>La caise ne peut pas être négative</strong></small>-->
                                </div>
                              </div>
                            </div>

                            <?php

                              $getOtherm = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise != ?");
                              $getOtherm->execute(array($idUE, 1));

                            ?>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="devise_cmp"><h6>Devise</h6></label>
                                  <select class="custom-select" name="devise_cmp" id="devise_cmp">
                                      <option value="<?php echo $devise; ?>" selected><?php echo $devise; ?></option>
                                    <?php 
                                      while($dev = $getOtherm->fetch()) 
                                      {
                                    ?>
                                      <option value="<?php echo $dev['devise_dev']; ?>">
                                        <?php echo $dev['devise_dev']; ?> (<?php echo $dev['libelle_dev']; ?>)
                                      </option>
                                    <?php
                                      }
                                    ?>
                                  </select>
                                </div>
                              </div>


                              <div class="col-md-6">
                               <div class="form-group">
                                <label for="num_cmp"><h6>Numéro de compte (si banque)</h6></label>
                                <input type="text" class="form-control" id="num_cmp" aria-describedby="emailHelp" placeholder="Entrez le numéro de compte" name="num_cmp">
                              </div>
                              </div>
                            </div>

                              <div class="form-group">
                                <label for="bic_cmp"><h6>BIC/Swiff (si banque)</h6></label>
                                <input type="text" class="form-control" id="bic_cmp" aria-describedby="emailHelp" placeholder="Entrez le BIC/Swiff" name="bic_cmp">
                              </div>

                        </div>
                      </div>
                      </div>

                       <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                              <i class="icon ion-ios-undo"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Annuler
                        </button>
                        <button type="bouton" class="btn btn-primary" name="saveser" id="savecmp">
                            <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Enregistrer
                        </button>
                      </div>

                    </div>
                </div>
              </div>
              <!--fin modale new mode de paiement-->

                


            </div>
        </div>
         

        <!--*****************************************************-->
        <br><br>
  </div>

       <!--chat discusion-->
       <?php  include('chat_discution.php'); ?>
    
        <!-- Bootstrap JS -->

         <!--<script src="../asserts/js/vendor/jquery-slim.min.js"></script>-->
        <script src="../asserts/js/jquery/jquery.min.js"></script>

        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>


        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/lib/calendar/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>


        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>



          <script src="assets/js/lib/data-table/datatables.min.js"></script>
          <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
          <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
          <script src="assets/js/lib/data-table/jszip.min.js"></script>
          <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
          <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
          <!--<script src="assets/js/init/datatables-init.js"></script>-->

          <!--Mon modal personnel-->
          <script src="assets/js/modal.mata.js"></script>

          <!--loader-->
          <script src="assets/js/loader.js"></script>

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">
          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.paiement').addClass('active');

             //affiche_moyen_paiement();

            function affiche_moyen_paiement()
            {
              var idUE = '<?php echo $idUE; ?>';
              var getid = '<?php echo $getid; ?>';
              var nomUE = '<?php echo $nomUE; ?>';
              var nomE = '<?php echo $nomE; ?>';
              var id_connexion = '<?php echo $id_connexion; ?>';

              $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/affiche_moyen_paiement.php',
                  data  : 'idUE=' + idUE + '&getid=' + getid + 
                          '&nomUE=' + nomUE + '&nomE=' + nomE + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_moyen_paiement').html(data);
                  }
                });
            }


            //initialisation du datatable
           $('#bootstrap-data-table').DataTable({
                lengthMenu: [[5, 10, 20, 50,-1], [5, 10, 20, 50, "Tout"]],
                "language": {
                  "lengthMenu": "Afficher les _MENU_ premiers enregistrements par page",
                  "zeroRecords": "Désolé - Aucun enregistrement trouvé",
                  "emptyTable":     "Aucune donnée disponible",
                  "info": "Affichage de la page _PAGE_ sur _PAGES_",
                  "infoEmpty": "Aucun enregistrement disponible",
                  "infoFiltered": "(filtré de _MAX_ enregistrements au total)",
                  "search":         "Rechercher",
                  "paginate": {
                  "first":      "Premier",
                  "last":       "Dernier",
                  "next":       "Suivant",
                  "previous":   "Précédent"
                },

              }

            });

            $('#savecmp').click(function()
              {

                var lib_cmp = $('#lib_cmp').val();
                var devise_cmp = $('#devise_cmp').val();
                var nom_inst_cmp = $('#nom_inst_cmp').val();
                var iban_cmp = $('#iban_cmp').val();
                var num_cmp = $('#num_cmp').val();
                var bic_cmp = $('#bic_cmp').val();
                var gest_neg_cmp = $('#gest_neg_cmp').val();
                var idUE = '<?php echo $idUE; ?>';

                if(lib_cmp != '')
                {
                  if(nom_inst_cmp != '')
                  {
                    if(num_cmp != '')
                    { 
                      $.ajax(
                        {
                          type  : 'POST', 
                          url   : 'fonction/add_new_moyen_paiement.php',
                          data  : 'lib_cmp=' + lib_cmp + '&devise_cmp=' + devise_cmp + 
                                  '&nom_inst_cmp=' + nom_inst_cmp + '&iban_cmp=' + iban_cmp +
                                  '&num_cmp=' + num_cmp + '&bic_cmp=' + bic_cmp + 
                                  '&gest_neg_cmp=' + gest_neg_cmp + '&idUE=' + idUE,
                          success:function(data)
                          {
                            if(data == 1)
                            {
                              err3("Ce mode paiement existe déjà");
                            }
                            else
                            {
                              $('#lib_cmp').val('');
                              $('#devise_cmp').val('');
                              $('#nom_inst_cmp').val('');
                              $('#iban_cmp').val('');
                              $('#num_cmp').val('');
                              $('#bic_cmp').val('');
                              $('#gest_neg_cmp').val('');


                              $('#lib_cmp').removeClass('is-invalid');
                              $('#devise_cmp').removeClass('is-invalid');
                              $('#nom_inst_cmp').removeClass('is-invalid');
                              $('#iban_cmp').removeClass('is-invalid');
                              $('#num_cmp').removeClass('is-invalid');
                              $('#bic_cmp').removeClass('is-invalid');
                              $('#gest_neg_cmp').removeClass('is-invalid');

                              $("#modal_moyen_paiement").modal('hide');
                              valid3("Mode de paiement enregistré avec succès !");

                              setTimeout(function()
                              {
                                window.location.reload();
                              }, 5000);
                              //affiche_moyen_paiement();
                            }
                          }
                        });
                    }
                    else
                    {
                      $('#num_cmp').addClass('is-invalid');
                      err3("Veuillez renseigner le numéro de compte S.V.P !");
                    }
                  }
                  else
                  {
                    $.ajax(
                      {
                        type  : 'POST', 
                        url   : 'fonction/add_new_moyen_paiement.php',
                        data  : 'lib_cmp=' + lib_cmp + '&devise_cmp=' + devise_cmp + 
                                '&nom_inst_cmp=' + nom_inst_cmp + '&iban_cmp=' + iban_cmp +
                                '&num_cmp=' + num_cmp + '&bic_cmp=' + bic_cmp + 
                                '&gest_neg_cmp=' + gest_neg_cmp + '&idUE=' + idUE,
                        success:function(data)
                        {
                          if(data == 1)
                          {
                            err3("Ce mode paiement existe déjà");
                          }
                          else
                          {
                            $('#lib_cmp').val('');
                            $('#devise_cmp').val('');
                            $('#nom_inst_cmp').val('');
                            $('#iban_cmp').val('');
                            $('#num_cmp').val('');
                            $('#bic_cmp').val('');
                            $('#gest_neg_cmp').val('');


                            $('#lib_cmp').removeClass('is-invalid');
                            $('#devise_cmp').removeClass('is-invalid');
                            $('#nom_inst_cmp').removeClass('is-invalid');
                            $('#iban_cmp').removeClass('is-invalid');
                            $('#num_cmp').removeClass('is-invalid');
                            $('#bic_cmp').removeClass('is-invalid');
                            $('#gest_neg_cmp').removeClass('is-invalid');

                            valid3("Mode de paiement enregistré avec succès !");
                            $("#modal_moyen_paiement").modal('hide');

                            setTimeout(function()
                            {
                              window.location.reload();
                            }, 5000);

                            //affiche_moyen_paiement();
                          }
                        }
                      });
                  }
                }
                else
                {
                  $('#lib_cmp').addClass('is-invalid');
                  err3("Veuillez renseigner le libellé du mode de paiement S.V.P !");
                }
              });



              function err3(element){
                toastr.error(element,'Erreur',{
                  "positionClass": "toast-bottom-right",
                  timeOut: 5000,
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "preventDuplicates": true,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut",
                  "tapToDismiss": false

                })
              }

              function valid3(element)
              {
                toastr.success(element,'Succès',{
                  "positionClass": "toast-bottom-left",
                  timeOut: 5000,
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "preventDuplicates": true,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut",
                  "tapToDismiss": false

                })
              }



          
            

          });
        </script>

    <!--fin body-->
    </body>
<!--fin html-->
</html>
<?php
    }
    else
    {
      header('location:deconnexion.php?id='.$getid);
    }
  }
  else
  {
    header('location:deconnexion.php?id='.$getid);
  }
}  
else
{
  header('location:error404.php');
}
?>
