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
     


      .badge-maroon {
      color: #fff;
      background-color: #800000;
    }


      .label_view
      {
        size: 10px;
      }

      .card_article
      {
        height: 150px;
       /*white-space: pre-line; /*pour le saut en ligne du texte du bouton*/
      }

       .btn-orange
      {
        background-color: #CD853F;
      }

      .btn-orange:hover
      {
        background-color: #D2691E;
      }

      .btn-violet
      {
        background-color: #BA55D3;
      }

      .btn-violet:hover
      {
        background-color:   #8B008B;
      }

      .text-violet
      {
        color : #8B008B;
      }

      .tache
      {
        height: 429px;
      }

      .scrollfact
      {
        height:285px;
        width:100%;
        overflow:auto;
        border: 0.5px solid lightgray;
        background-color: white;
      }

      .form_card
        {
          background-color: #d1ecf1;
        }

        .body-modal-client
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        .body-modal-fournisseur
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        .body-modal-autres-tiers
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        .body-modal-modepaiement
        {
          overflow-y: auto;
          height: 485px;
          background-color: white;
        }


      #adressfour, #adresstr, #adresscli
      {
        height: 126px;
      }

      .viewtva
      {
        display: none;
      }

      .viewtva_ser
      {
        display: none;
      }

       #libsearchcatart, #libsearchcatart1, #libsearchcatart2, #libsearchcatart3, 
       #libsearchcatart5, #libsearchcatart6 {
          background-image: url('../icons/png/office/search.png');
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 6px 12px 5px 40px;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
      }



      

    </style>
        

         <title>KEDIS Online! | Contacts | Mes autres tiers</title>
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
                                    <h1>Mes contacts</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Mes contacts</a></li>
                                        <li class="active">Mes autres tiers</li>
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
                      if($fetch_user['client'] == 0)
                      {
                  ?>
                    <li class="nav-item">
                      <a class="nav-link" href="contacts.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes clients</strong></a>
                    </li>
                  <?php
                      }
                  ?>

                  <?php
                      //on vérifie pour le menu contact
                      if($fetch_user['fournisseur'] == 0)
                      {
                  ?>
                    <li class="nav-item">
                      <a class="nav-link" href="fournisseur.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes fournisseurs</strong></a>
                    </li>
                  <?php
                      }
                  ?>

                  <?php
                      //on vérifie pour le menu contact
                      if($fetch_user['autre_tiers'] == 0)
                      {
                  ?>
                    <li class="nav-item">
                      <a class="nav-link active" href="#"><strong>Mes autres tiers</strong></a>
                    </li>
                   <?php
                      }
                      if($fetch_user['serveur'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="serveur.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes serveur(se)s</strong></a>
                        </li>
                       <?php
                          }
                  ?>
                </ul>
                  </h6>

                    <?php 
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM autres_tiers WHERE idUE_tr = ?");
                          $view->execute(array($idUE));
                          $i = 1;
                          $existallvente = $view->rowCount();
                        ?>

                      <div class="card-body">
                          <div class="card border-info mb-3" >
                              <div class="card-header text-left"><strong><b>Liste des autres tiers (Total : <?php echo $existallvente; ?>)</b></strong></div>
                                <div class="card-body">
                                  <div class="p-3 mb-2 bg-light text-dark border">
                                    
                                    <?php

                                          if($type_abonne == 'Petite Entreprise')
                                          {
                                            if($existallvente < 5)
                                            {
                                        ?>

                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ajouter-autres-tiers" title="Ajouter un client">
                                              <span class="step size-21">
                                                  <i class="icon ion-person-add"></i>
                                              </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;Ajouter
                                          </button>

                                        <?php
                                            }
                                            else
                                            {
                                        ?>

                                          <div class="alert alert-primary" role="alert">
                                            Vous avez atteint le nombre maximal des autres tiers.
                                          </div>

                                        <?php
                                            }
                                          }
                                          else
                                          {

                                        ?>

                                          <<button type="button" class="btn btn-success" data-toggle="modal" data-target="#ajouter-autres-tiers" title="Ajouter un client">
                                              <span class="step size-21">
                                                  <i class="icon ion-person-add"></i>
                                              </span>
                                                &nbsp;&nbsp;&nbsp;&nbsp;Ajouter
                                          </button>

                                        <?php
                                          }

                                        ?>

                                          
                                  </div>
                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                      <th>N°</th>
                                      <th>Entreprise</th>
                                      <th>Téléphone</th>
                                      <th>Montants à récevoir (<?php echo $devise; ?>)</th>
                                      <th>Montants payés (<?php echo $devise; ?>)</th>
                                      <th>Solde restant (<?php echo $devise; ?>)</th>
                                      <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered" id="table_client">
                                      <?php

                                        $view = $bdd->prepare("SELECT * FROM autres_tiers WHERE idUE_tr = ? AND no_afficher != 1");
                                        $view->execute(array($idUE));
                                        $i = 1;

                                        $existallcat = $view->rowCount();

                                        while($row = $view->fetch()) 
                                        {
                                         ?>   
                                          <tr>
                                              <td><?php echo $i++; ?></td>
                                              <td class="text-left"><?php echo $row['societe_tr']; ?></td>
                                              <td class="text-left"><?php echo $row['tel_tr']; ?></td>
                                              <td class="text-right">
                                                  <?php  
                                                      
                                                      if($row['default_tr'] == 1)
                                                      {
                                                          //si c'est l'autres tiers par défaut, on affiche le collecte TVA donc montant encaissé
                                                          $mont_payes = $bdd->prepare("SELECT SUM(montant_encaisse_cre) AS total_montant_payes FROM creance_for_user WHERE id_autre_tier_cre = ?");
                                                              $mont_payes->execute(array($row['id_tr']));

                                                          $fetch_creance = $mont_payes->fetch();
                                                          echo number_format($fetch_creance['total_montant_payes'], 2, ',', ' ');
                                                      }
                                                      else
                                                      {
                                                          //on recupère toutes les créances par défaut d'UE
                                                          $mont_payes = $bdd->prepare("SELECT SUM(reste_a_payer) AS total_montant_payes FROM creance_for_user WHERE id_autre_tier_cre = ?");
                                                              $mont_payes->execute(array($row['id_tr']));

                                                          $fetch_creance = $mont_payes->fetch();
                                                          echo number_format($fetch_creance['total_montant_payes'], 2, ',', ' ');
                                                      }
                                                  ?>
                                              </td>
                                              <td class="text-right">
                                                  <?php 

                                                      
                                                      if($row['default_tr'] == 1)
                                                      {
                                                          //si c'est l'autres tiers par défaut, on affiche le collecte TVA donc montant à remboursé
                                                          $mont_recevoir = $bdd->prepare("SELECT SUM(montant_remb_det) AS total_montant_recevoir FROM dette_for_user WHERE id_autre_tier_det = ?");
                                                          $mont_recevoir->execute(array($row['id_tr']));

                                                          $fetch_dette = $mont_recevoir->fetch();

                                                          echo number_format($fetch_dette['total_montant_recevoir'], 2, ',', ' ');
                                                      }
                                                      else
                                                      {
                                                          //on recupère toutes les dettes par défaut d'UE
                                                          $mont_recevoir = $bdd->prepare("SELECT SUM(reste_a_payer) AS total_montant_recevoir FROM dette_for_user WHERE id_autre_tier_det = ?");
                                                          $mont_recevoir->execute(array($row['id_tr']));

                                                          $fetch_dette = $mont_recevoir->fetch();

                                                          echo number_format($fetch_dette['total_montant_recevoir'], 2, ',', ' ');
                                                      }

                                                  ?>    
                                              </td>
                                              <td class="text-right">
                                                  <?php 
                                                      
                                                      if($row['default_tr'] == 1)
                                                      {
                                                          //si c'est l'autres tiers par défaut, on affiche le collecte TVA donc montant à remboursé
                                                          $mont_recevoir = $bdd->prepare("SELECT SUM(montant_remb_det) AS total_montant_recevoir FROM dette_for_user WHERE id_autre_tier_det = ?");
                                                          $mont_recevoir->execute(array($row['id_tr']));

                                                          $fetch_dette = $mont_recevoir->fetch();

                                                          $mont_payes = $bdd->prepare("SELECT SUM(montant_encaisse_cre) AS total_montant_payes FROM creance_for_user WHERE id_autre_tier_cre = ?");
                                                              $mont_payes->execute(array($row['id_tr']));

                                                          $fetch_creance = $mont_payes->fetch();

                                                          echo number_format($fetch_creance['total_montant_payes'] - $fetch_dette['total_montant_recevoir'], 2, ',', ' ');

                                                      }
                                                      else
                                                      {
                                                          //on recupère toutes les dettes par défaut d'UE
                                                          $mont_recevoir = $bdd->prepare("SELECT SUM(reste_a_payer) AS total_montant_recevoir FROM dette_for_user WHERE id_autre_tier_det = ?");
                                                          $mont_recevoir->execute(array($row['id_tr']));

                                                          $fetch_dette = $mont_recevoir->fetch();

                                                          $mont_recevoir = $bdd->prepare("SELECT SUM(reste_a_payer) AS total_montant_recevoir FROM dette_for_user WHERE id_autre_tier_det = ?");
                                                          $mont_recevoir->execute(array($row['id_tr']));

                                                          $fetch_dette = $mont_recevoir->fetch();

                                                          echo number_format($fetch_creance['total_montant_payes'] - $fetch_dette['total_montant_recevoir'], 2, ',', ' ');

                                                      }
                                                  ?>
                                              </td>
                                              <td>
                                                <a class="text-primary" href="viewAutres_tiers.php?id=<?php echo $getid;?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&id_autr=<?php echo $row['id_tr'];?>" title="Voir les détails de l'autre tiers <?php echo $row['societe_tr']; ?>">Détails</a>
                                              </td>
                                          </tr>
                                          <?php 
                                            } 
                                    ?>
                                    </tbody>
                                </table>

                                </div>
                            </div>
                      </div>
                  </div>
              </div>
              <!-- Animated -->

            </div>

               <!--les modales-->

               <!--debut modale new autre tiers-->
              <div class="modal fade bd-example-modal-lg" id="ajouter-autres-tiers" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Ajouter un autre tiers</h6>
                          </div>
                          <div class="col-md-2">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                      </div>

                      <div class="modal-body body-modal-autres-tiers">

                        <div class="card form_card">
                          <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="soctr"><h6>Nom Entreprise</h6></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/briefcase.png"></span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'entreprise de l'autre tiers" name="soctr" id="soctr">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                  <label for="tvatr"><h6>N° Entreprise ou TVA</h6></label>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/checkmark-circled.png"></span>
                                      </div>
                                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro d'entreprise de l'autre tiers" name="tvatr" id="tvatr">
                                  </div>
                                </div>
                                </div>
                              </div>

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="prenomtr"><h6>Prénom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Conctat prénom de l'autre tiers" name="prenomtr" id="prenomtr">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <label for="nomtr"><h6>Nom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Contact nom de l'autre tiers" name="nomtr" id="nomtr">
                                  </div>
                                </div>
                              </div>

                              

                          </div>
                        </div>

                          <div class="card form_card">
                            <div class="card-body">

                                 <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="adresstr"><h6>Adresse :</h6></label>
                                      <textarea class="form-control" id="adresstr" rows="2" placeholder="Adresse de l'autre tiers" name="adresstr" required=""></textarea>
                                    </div> 
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="teltr"><h6>Téléphone</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-call.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro téléphone de l'autre tiers" name="teltr" id="teltr">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="postaletr"><h6>Code postale</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale de l'autre tiers" name="postaletr" id="postaletr">
                                      </div>
                                    </div>
                                  </div>

                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="villetr"><h6>Ville</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville de l'autre tiers" name="villetr" id="villetr">
                                      </div>
                                    </div>    
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="deptr"><h6>Département / Etat / Province</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-system-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le département de l'autre tiers"  name="deptr" id="deptr" >
                                      </div>
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="paystr"><h6>Pays</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                                          </div>
                                          <select class="custom-select" name="paystr" id="paystr">
                                              <option value="" selected="selected">Sélectionner un pays</option>
                                              <?php

                                                    //On séléctionne tous les pays dans la base de données
                                                    $get_pays = $bdd->prepare('SELECT * FROM pays ORDER BY nom_fr_fr ASC');
                                                    $get_pays->execute(array());

                                                    while($row = $get_pays->fetch())
                                                    {
                                                ?>
                                                    <option value="<?php echo $row['nom_fr_fr']; ?>">
                                                      <?php echo $row['nom_fr_fr']; ?> 
                                                    </option>

                                                <?php
                                                    }
                                                ?>
                                          </select>
                                      </div>
                                    </div>   
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="emailtr"><h6>Adresse email</h6></label>
                                  <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                                      </div>
                                      <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'email de l'autre tiers"  name="emailtr" id="emailtr">
                                  </div>
                                    </div>
                                  </div>
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
                        <button type="submit" class="btn btn-primary" name="savefour" id="savetr">
                            <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Enregistrer
                        </button>
                      </div>

                    </div>

                </div>
              </div>
              <!--fin modale new fin-->



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
            $('.contacts').addClass('active');


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


           //ajouter un nouveau autre tiers
            $('#savetr').click(function()
              {
                //var civilite = $('#civilite').val();
                //var fidelitecard = $('#fidelitecard').val();
                var nomtr = $('#nomtr').val();
                var prenomtr = $('#prenomtr').val();
                var soctr = $('#soctr').val();
                var tvatr = $('#tvatr').val();
                var adresstr = $('#adresstr').val();
                var teltr = $('#teltr').val();
                var postaletr = $('#postaletr').val();
                var villetr = $('#villetr').val();
                var deptr = $('#deptr').val();
                var paystr = $('#paystr').val();
                var emailtr = $('#emailtr').val();
                var idUE = '<?php echo $idUE; ?>';


                if(soctr != '')
                {
                  if(emailtr != '')
                  {
                    if(paystr != '')
                    {
                      if(/^[a-zA-Z]+/.test(prenomtr))
                      {
                        if(/^[a-zA-Z]+/.test(nomtr))
                        {
                          if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(emailtr))
                          {
                            $.ajax(
                            {
                              type  : 'POST',
                              url   : 'fonction/add_new_autres_tiers.php',
                              data  : "prenomtr=" + prenomtr + "&nomtr=" + nomtr + 
                                      "&soctr=" + soctr + "&tvatr=" + tvatr + 
                                      "&adresstr=" + adresstr + "&teltr=" + teltr + 
                                      "&postaletr=" + postaletr + "&villetr=" + villetr + 
                                      "&deptr=" + deptr + "&paystr=" + paystr + 
                                      "&emailtr=" + emailtr + "&idUE=" + idUE,
                              success:function(data)
                              {
                                //alert(data);
                                $('#nomtr').removeClass('is-invalid');
                                $('#prenomtr').removeClass('is-invalid');
                                $('#soctr').removeClass('is-invalid');
                                $('#emailtr').removeClass('is-invalid');

                                $('#soctr').val('');
                                $('#tvatr').val('');
                                $('#prenomtr').val('');
                                $('#nomtr').val('');
                                $('#adresstr').val('');
                                $('#teltr').val('');
                                $('#villetr').val('');
                                $('#deptr').val('');
                                $('#emailtr').val('');

                                valid3('Autre tiers ajouté avec succès');
                                $('#ajouter-autres-tiers').modal('hide');

                                 setTimeout(function()
                                {
                                  window.location.reload();
                                }, 5000);
                                
                                //affiche_autres_tiers();
                              }
                            });
                          }
                          else
                          {
                            $('#emailtr').addClass('is-invalid');
                            err3("L'adresse émail du fournisseur saisie n'est pas valide !");
                          }
                        }
                        else
                        {
                          $('#nomtr').addClass('is-invalid');
                          err3("Le nom pour le conctact de l'autre tiers saisie n'est pas valide !");
                        }
                      }
                      else
                      {
                        $('#prenomtr').addClass('is-invalid');
                        err3("Le prénom pour le contct de l'autre tiers saisie n'est pas valide !");
                      }
                    }
                    else
                    {
                      $('#paystr').addClass('is-invalid');
                      err3("Veuillez Sélectionner un pays S.V.P !");
                    }
                  }
                  else
                  {
                    $('#emailtr').addClass('is-invalid');
                    err3("Veuillez saisir l'adresse émail de l'autre tiers S.V.P!");
                  }
                }
                else
                {
                  $('#soctr').addClass('is-invalid');
                  err3("Veuillez saisir le nom de l'entreprise de l'autre tiers S.V.P!");
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
