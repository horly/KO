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

      .body-modal-fournisseur
      {
        overflow-y: auto;
        height: 550px;
        background-color: white;
      }

      #adressfour, #adresstr
      {
        height: 126px;
      }

      .viewtva
      {
        display: none;
      }

      

    </style>
        

         <title>KEDIS Online! | Mes dépenses | Mes notes de frais</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 

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

                          setlocale(LC_TIME, 'fra_fra');
                          $date_echeance = date("Y-m-d");
                          $date = date("Y-m-d");

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
                                    <h1>Mes dépenses</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Mes dépenses</a></li>
                                        <li class="active">Mes notes de frais</li>
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
                          if($fetch_user['achat'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="depense.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes achats</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['note_credit_achat'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="noteCredit_achat.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes notes de crédit/achats</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['commande'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="commande.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes commandes</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['depense'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link active" href="#"><strong>Mes notes de frais</strong></a>
                        </li>
                      <?php
                          }
                      ?>
                    </ul>
                  </h6>

                     <?php 
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM note_de_frais WHERE id_UE_fr = ?");
                          $view->execute(array($idUE));
                          $i = 1;
                          $existallvente = $view->rowCount();
                        ?>

                      <div class="card-body">
                          <div class="card border-info mb-3" >
                              <div class="card-header text-left"><strong><b>Liste des notes de frais (Total : <?php echo $existallvente; ?>)</b></strong></div>
                                <div class="card-body">
                                  <div class="p-3 mb-2 bg-light text-dark border">
                                    <div class="row">
                                      <div class="col-md-3">
                                        

                                        <?php

                                          if($type_abonne == 'Petite Entreprise')
                                          {
                                            if($existallvente < 5)
                                            {
                                        ?>

                                            <button type="button" class="btn btn-success btn-block" id="get-depense">
                                              <span class="step size-21">
                                                  <i class="icon ion-cash"></i>
                                              </span>
                                                  &nbsp;Enregistrer une dépense</button>

                                        <?php
                                            }
                                            else
                                            {
                                        ?>

                                          <div class="alert alert-primary" role="alert">
                                            Vous avez atteint le nombre maximal de dépenses.
                                          </div>

                                        <?php
                                            }
                                          }
                                          else
                                          {

                                        ?>

                                          <button type="button" class="btn btn-success btn-block" id="get-depense">
                                            <span class="step size-21">
                                                <i class="icon ion-cash"></i>
                                            </span>
                                                &nbsp;Enregistrer une dépense</button>

                                        <?php
                                          }

                                        ?>


                                        
                                        
                                      </div>
                                      <div class="col-md-2">
                                    </div>
                                    <div class="col-md-3">
                                      </div>
                                    </div>                               
                                  </div>
                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Date</th>
                                        <th>Désignation</th>
                                        <th>Montant (<?php echo $devise; ?>)</th>
                                        <th>Montant payé (<?php echo $devise; ?>)</th>
                                        <th>Solde restant (<?php echo $devise; ?>)</th>
                                        <th>Bénéficiaire</th>
                                        <th>Gestionnaire</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered" id="table_article">
                                      <?php

                                        $view = $bdd->prepare("SELECT * FROM note_de_frais WHERE id_UE_fr = ? ORDER BY id_fr DESC");
                                        $view->execute(array($idUE));
                                        $i = 1; 

                                        $existallvente = $view->rowCount();

                                        
                                            while($row = $view->fetch()) 
                                            {
                                         ?>   
                                           <tr>
                                              <!--<td><?php echo $i++; ?></td>-->
                                              <td><?php echo $row['date_fr']; ?></td>
                                              <td class="text-left">
                                                <?php echo $row['designation']; ?>    
                                              </td>
                                              <td class="text-right"><?php echo number_format($row['montant_depense'], 2, '.', ' '); ?></td>
                                              <td class="text-right"><?php echo number_format($row['montant_fr'], 2, '.', ' '); ?></td>
                                              <td class="text-right"><?php echo number_format($row['reste_a_payer'], 2, '.', ' '); ?></td>
                                              <td class="text-left">
                                                <?php
                                                    
                                                    $get_autr = $bdd->prepare('SELECT * FROM autres_tiers WHERE id_tr = ?');
                                                    $get_autr->execute(array($row['id_tiers_fr']));  
                                                    $fetch_tr = $get_autr->fetch();

                                                    $get_four = $bdd->prepare('SELECT * FROM fournis_for_user WHERE id_four = ?');
                                                    $get_four->execute(array($row['id_four_fr']));
                                                    $fetch_four = $get_four->fetch();

                                                   

                                                    if($fetch_tr['default_tr'] != 1)
                                                    {
                                                      echo $fetch_tr['prenom_tr'].' '.$fetch_tr['nom_tr'];
                                                    }
                                                    else
                                                    {
                                                      echo $fetch_four['societe_four'];
                                                    }
                                                ?>
                                              </td>
                                              <td class="text-left">
                                                <?php
                                                    
                                                    $get_user = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
                                                    $get_user->execute(array($row['id_gest_fr']));
                                                    $fetch_user = $get_user->fetch();

                                                    echo $fetch_user['prenom_cl'];
                                                 ?> 
                                              </td>
                                              <!--<td><?php echo $row['commentaire_fr']; ?></td>-->
                                              <td>
                                                <a class="text-primary" href="viewNotefrais.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&id_fr=<?php echo $row['id_fr']; ?>">Détails</a>
                                              </td>
                                            </tr>
                                          <?php 
                                            } 
                                    ?>
                                    </tbody>

                                    <?php

                                        //somme total à payer
                                        $somme_mt_fact = $bdd->prepare("SELECT SUM(montant_depense) AS somme_ttc FROM note_de_frais WHERE id_UE_fr = ?");
                                        $somme_mt_fact->execute(array($idUE));
                                        $fetch_ttc = $somme_mt_fact->fetch();
                                        $total_ttc = number_format($fetch_ttc['somme_ttc'], 2, '.', '');


                                        //somme montant payé
                                        $somme_paie = $bdd->prepare("SELECT SUM(montant_fr) AS somme_paie FROM note_de_frais WHERE id_UE_fr = ?");
                                        $somme_paie->execute(array($idUE));
                                        $fetch_paie = $somme_paie->fetch();
                                        $total_paie = number_format($fetch_paie['somme_paie'], 2, '.', '');

                                        //somme reste à payer
                                        $somme_reste = $bdd->prepare("SELECT SUM(reste_a_payer) AS somme_reste FROM note_de_frais WHERE id_UE_fr = ?");
                                        $somme_reste->execute(array($idUE));
                                        $fetch_reste = $somme_reste->fetch();
                                        $total_reste = number_format($fetch_reste['somme_reste'], 2, '.', '');
                                    ?>

                                    <tfoot>
                                      <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th class="text-right"><?php echo number_format($total_ttc, 2, '.', ' '); ?></th>
                                        <th class="text-right"><?php echo number_format($total_paie, 2, '.', ' '); ?></th>
                                        <th class="text-right"><?php echo number_format($total_reste, 2, '.', ' '); ?></th>
                                        <th class="text-right"></th>
                                        <th class="text-right"></th>
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
                <!--debut modale new client-->
              <div class="modal fade bd-example-modal-lg poste-depense" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <h6 class="modal-title" id="exampleModalLabel">Liste des postes de dépense</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">
                            <div class="row">
                              <div class="col-md-3">
                                <button type="button" class="btn btn-primary btn-block" id="add_new_post"  title="Ajouter un nouveau poste">
                                    <span class="step size-21">
                                      <i class="icon ion-ios-filing-outline"></i>
                                    </span>
                                      &nbsp;&nbsp;Ajouter
                                </button>
                              </div>
                              <div class="col-md-6">
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" placeholder="Rechercher un poste" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libsearchcatart" id="libsearchcatart">
                                </div>
                              </div>
                              <div class="col-md-3">
                                
                              </div>
                          </div>

                      
                      <section class="">
                        <div class="container-tab2">
                          <table id="tab_client">
                            <thead>
                              <tr class="header">
                                <th>
                                       N°
                                  <div>N°</div>
                                </th>
                                <th>
                                  Poste
                                  <div>Poste</div>
                                </th>
                                <th>
                                  Désignation
                                  <div>Désignation</div>
                                </th>
                                <th>
                                  <div></div>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="tbody_striped" id="table_fournisseur">
                        
                            </tbody>
                          </table>
                        </div>
                      </section>

                    </div>
                    <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      </div>

                  </div>

                </div>
              </div>
              <!--fin modale new fin-->

             
              <!--debut modale new poste-->
              <div class="modal fade bd-example-modal-lg" id="new_poste" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <h6 class="modal-title" id="exampleModalLabel">Ajouter un nouveau poste de dépense</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body">

                        <div class="card form_card">
                          <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="poste_nom"><h6>Poste</h6></label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Saisir le nom du poste" name="poste_nom" id="poste_nom">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                  <label for="design_post"><h6>Désignation</h6></label>
                                  <div class="input-group mb-3">
                                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Saisir la désignation du poste" name="design_post" id="design_post">
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
                        <button type="submit" class="btn btn-primary" name="saveposte" id="saveposte">
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

           

              <!--debut modale view and update poste-->
              <div class="modal fade bd-example-modal-lg" id="view_poste" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <h6 class="modal-title" id="exampleModalLabel">Détails poste de dépense <label class="text-secondary" id="id-poste"></label></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body" id="detail_poste">

                        

                      </div>

                       <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                          <span class="step size-21">
                              <i class="icon ion-ios-undo"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Fermer
                        </button>
                        <button type="submit" class="btn btn-danger" name="deleteposte" id="deleteposte">
                            <span class="step size-21">
                              <i class="icon ion-ios-trash"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Supprimer
                        </button>
                        <button type="submit" class="btn btn-primary" name="updateposte" id="updateposte">
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

                 <!-- confirme Modal -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-secondary text-white">
                    <h6 class="modal-title" id="exampleModalLabel">Confirmation</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body bg-light text-dark">
                    <div class="bs-callout bs-callout-warning">
                      <div class="row">
                        <div class="col-md-8">
                          <h5 class="text-warning">Attention !</h5>
                          <h6>Voulez-vous vraiment supprimer ce poste de dépense ?</h6>
                        </div>
                        <div class="col-md-4 text-center">
                            <img width="100" height="100" class="icone" src="../icons/png/office/warning.png">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                      <button type="submit" class="btn btn-primary" name="delete_confirm_poste" id="delete_confirm_poste">Oui</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- fin confirme Modal -->

            <!--debut modale new dépense-->
              <div class="modal fade bd-example-modal-lg" id="new-depense" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Enregistrer une dépense</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                      </div>

                    <div class="modal-body bg-light">
                      <form id="modal-form">
                        <div class="p-3 mb-2 form_card text-dark border">   
                          <div class="row">
                            <div class="col-md-6">
                              <label for="autre_devise"><h6>Dévise</h6></label>
                              <div class="input-group mb-3">
                                <?php
                                  $getotherdevise = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise != 1");
                                  $getotherdevise->execute(array($idUE));

                                  $getdefaultdevise = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise = 1");
                                  $getdefaultdevise->execute(array($idUE));
                                  $defautl_devise = $getdefaultdevise->fetch();

                                ?>
                                <select class="custom-select" id="autre_devise">
                                  <option selected value="<?php echo $defautl_devise['id_dev']; ?>"><?php echo $defautl_devise['devise_dev']; ?></option>
                                  <?php
                                    while($row = $getotherdevise->fetch())
                                    {
                                  ?>
                                  <option value="<?php echo $row['id_dev']; ?>"><?php echo $row['devise_dev']; ?></option>
                                  <?php
                                    }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="prix_ttc"><h6>Montant dépense TTC</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control text-right" placeholder="0.00" name="prix_ttc" id="prix_ttc" step="0.01" required="">


                                <div class="input-group-append">
                                  <span class="input-group-text devise_paie">
                                    <?php echo $devise; ?>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6 applic-tva">
                              <label><h6>&nbsp;</h6></label>
                              <button type="button" class="btn btn-success btn-block" id="addtva">
                                <span class="step size-21">
                                  <i class="icon ion-android-add-circle"></i>
                                </span>
                                  &nbsp;Appliquer la TVA
                              </button>
                            </div>
                            <div class="col-md-6 applic-tva">
                              
                            </div>
                          </div>

                          <br>

                          <!-- cette div est caché tant qu'on pas appyer sur le bouton Appliquer la TVA-->
                          <div class="row">
                            <div class="col-md-6 viewtva">
                              <label for="prix_ht"><h6>Montant dépense HTVA</h6></label>
                              <div class="input-group mb-3">
                                <input name="prix_ht" type="text" class="form-control text-right" placeholder="0.00" id="prix_ht" value="">
                                <div class="input-group-prepend">
                                  <span class="input-group-text devise_paie"><?php echo $devise; ?></span>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 viewtva">
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="taux_tva"><h6>Taux TVA</h6></label>
                                  <div class="input-group mb-3">
                                    <input name="taux_tva" type="text" class="form-control text-right" placeholder="0.00" id="taux_tva" value="0">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">%</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label><h6>&nbsp;</h6></label>
                                  <button type="button" class="btn btn-danger btn-block" id="removetva">Annuler la TVA</button>
                                </div>
                              </div>
                            </div>
                          </div>

                         

                          <div class="row">
                            <div class="col-md-6">
                              <label for="id_mpaie"><h6>Mode de paiement</h6></label>
                              <div class="input-group mb-3">
                                <select class="custom-select" id="id_mpaie">
                                  <option value="" selected="">Choissir un mode de paiement</option>
                                  <?php

                                    $viewcmp = $bdd->prepare("SELECT * FROM compte_financier WHERE id_UE_cmp = ?");
                                    $viewcmp->execute(array($idUE));

                                    while($row = $viewcmp->fetch()) 
                                    {

                                  ?>
                                    <option value="<?php echo $row['id_cmp']; ?>"><?php echo $row['lib_cmp']; ?> (<?php echo $row['devise_cmp']; ?>)</option>
                                  <?php
                                    }
                                  ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="num_cmp"><h6>Numéro de compte</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="num_cmp" id="num_cmp" placeholder="Saisir le numéro de compte du bénéficiaire">
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>

                      <div class="p-3 mb-2 form_card text-dark border">
                            <div class="form-group">
                              <label for="designation_depense"><h6>Désignation</h6></label>
                              <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="designation_depense" id="designation_depense" placeholder="Saisir la désignation de la dépense">
                              </div>
                            </div>
                      </div>

                      
                      <div class="p-3 mb-2 bg-secondary text-white border">  
                        <div class="row">
                          <div class="col-md-6">
                              <div class="custom-control custom-radio">
                                <input type="radio" id="fournisseur-radio" name="customRadio" class="custom-control-input" checked="true">
                                <label class="custom-control-label" for="fournisseur-radio"><h6>Fournisseur</h6></label>
                              </div>
                              <div class="input-group mb-3">
                                <select class="custom-select" id="fournisseur-selected">
                                  <option value="" selected="">Sélectionner un fournisseur</option>
                                  <?php

                                    $viewfour = $bdd->prepare("SELECT * FROM fournis_for_user WHERE idUE_four = ? AND default_four != 1");
                                    $viewfour->execute(array($idUE));

                                    while($row = $viewfour->fetch()) 
                                    {

                                  ?>
                                    <option value="<?php echo $row['id_four']; ?>"><?php echo $row['societe_four']; ?></option>
                                  <?php
                                    }
                                  ?>
                                </select>
                                 <div class="input-group-append">
                                  <button class="btn btn-info" type="button" id="new_fournisseur">Nouveau</button>
                                </div>
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="custom-control custom-radio">
                              <input type="radio" id="autre-tiers-radio" name="customRadio" class="custom-control-input">
                              <label class="custom-control-label" for="autre-tiers-radio"><h6>Autre tiers</h6></label>
                            </div>
                            <div class="input-group mb-3">
                              <select class="custom-select" id="autre-tiers-selected" disabled="true">
                                <option value="" selected="">Sélectionner un autre tiers</option>
                                <?php

                                  $viewautr = $bdd->prepare("SELECT * FROM autres_tiers WHERE idUE_tr = ? AND default_tr != 1");
                                  $viewautr->execute(array($idUE));

                                  while($row = $viewautr->fetch()) 
                                  {

                                ?>
                                  <option value="<?php echo $row['id_tr']; ?>">
                                    <?php echo $row['prenom_tr']; ?>
                                    <?php echo $row['nom_tr']; ?>    
                                  </option>
                                <?php
                                  }
                                ?>
                              </select>
                              <div class="input-group-append">
                                  <button class="btn btn-info" type="button" id="new_autre_tiers">Nouveau</button>
                                </div>
                            </div>
                          </div>
                        </div>

                         <?php

                            //on recupère la date d'aujourd'hui
                            setlocale(LC_TIME, 'fra_fra');
                            $date = date("Y-m-d");
                            
                          ?>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="date-depense"><h6>Date</h6></label>
                              <div class="input-group mb-3">
                                  <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="date-depense" id="date-depense" value="<?php echo $date; ?>">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="commentaire"><h6>Remarque (pas obligatoire)</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" name="commentaire" id="commentaire" placeholder="Saisir une remarque">
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
                      <button type="submit" class="btn btn-primary" name="save-depense" id="save-depense">
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


              <!--debut modale new fournisseur-->
              <div class="modal fade bd-example-modal-lg" id="fournisseur" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Ajouter un nouveau fournisseur</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                      </div>

                      <div class="modal-body body-modal-fournisseur">

                        <div class="card form_card">
                          <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="socfour"><h6>Nom Entreprise</h6></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/briefcase.png"></span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'entreprise du fournisseur" name="socfour" id="socfour">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                  <label for="tvafour"><h6>N° Entreprise ou TVA</h6></label>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/checkmark-circled.png"></span>
                                      </div>
                                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro d'entreprise du fournisseur" name="tvafour" id="tvafour">
                                  </div>
                                </div>
                                </div>
                              </div>

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="prenomfour"><h6>Prénom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Conctat prénom du fournisseur" name="prenomfour" id="prenomfour">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <label for="nomfour"><h6>Nom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Contact nom du fournisseur" name="nomfour" id="nomfour">
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
                                      <label for="adressfour"><h6>Adresse :</h6></label>
                                      <textarea class="form-control" id="adressfour" rows="2" placeholder="Adresse du fournisseur" name="adressfour" required=""></textarea>
                                    </div> 
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="telfour"><h6>Téléphone</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-call.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro téléphone du fournisseur" name="telfour" id="telfour">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="postalefour"><h6>Code postale</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale du fournisseur" name="postalefour" id="postalefour">
                                      </div>
                                    </div>
                                  </div>

                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="villefour"><h6>Ville</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville du fournisseur" name="villefour" id="villefour">
                                      </div>
                                    </div>    
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="depfour"><h6>Département / Etat / Province</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-system-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le département du fournisseur"  name="depfour" id="depfour" >
                                      </div>
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="paysfour"><h6>Pays</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                                          </div>
                                          <select class="custom-select" name="paysfour" id="paysfour">
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
                                       <label for="emailfour"><h6>Adresse email</h6></label>
                                  <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                                      </div>
                                      <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'email du fournisseur"  name="emailfour" id="emailfour">
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
                        <button type="submit" class="btn btn-primary" name="savefour" id="savefour">
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

                      <div class="modal-body body-modal-fournisseur">

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
        <!--<script src="assets/js/bootstrap.min.js"></script>-->
        <script src="assets/js/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>


        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/lib/calendar/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>

        <script src="../dist/js/util.js"></script>
        <!--<script src="../dist/js/dropdown.js"></script>-->
        <script src="../dist/js/tab.js"></script>
        <!--<script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>-->


        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>

           <!--MDB-->
          <!--<script type="text/javascript" src="MDB/js/bootstrap.min.js"></script>-->
          <!-- MDB core JavaScript -->

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

            <!--MDB-->
          <script type="text/javascript" src="MDB/js/bootstrap.min.js"></script>
          <!-- MDB core JavaScript -->

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

         <!--pour le clavier numérique de la caise-->
        <script src="../asserts/js/clavier_numerique.js"></script>
        <!--pour la fonction de plein écran-->
        <script src="../asserts/fullscreen/screenfull.js"></script>

        <script type="text/javascript">
          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.achat').addClass('active');

            //affiche_poste();
              //ici on affiche tous les services
              function affiche_poste()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_poste_depense.php',
                  data : 'idUE=' + idUE  + 
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_fournisseur').html(data);
                  }
                });
              }

              //affiche_note_frais_depense();

              function affiche_note_frais_depense()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';

                 $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_note_frais_depense.php',
                  data : 'idUE=' + idUE  + '&id_connexion=' + id_connexion +
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid,
                  success:function(data)
                  {
                    $('#table_achat').html(data);
                  }
                });
              }

            
            //nouveau dépense
            $('#get-depense').click(function()
              {
                $('#new-depense').modal('show');
              });


               //initialisation du datatable
           $('#bootstrap-data-table').DataTable({
                lengthMenu: [[5, 10, 20, 50,-1], [5, 10, 20, 50, "Tout"]],
                "order": [[ 1, "desc" ]],
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


           //séléctionner une poste
              $('#post-option').click(function()
                {
                  var post = $('#post-option').val();
                  var getid = '<?php echo $getid; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  if(post == 'all')
                  {
                    affiche_note_frais_depense();
                  }
                  else
                  {
                    $.ajax({
                      type : 'POST', 
                      url  : 'fonction/affiche_poste_option.php',
                      data : 'post=' + post + '&idUE=' + idUE  + 
                              '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                             '&id_connexion=' + id_connexion,
                      success:function(data)
                      {
                        $('#table_achat').html(data);
                      }
                    });
                  }
                    
                });


              //lorsqu'on clique pour appliquer la TVA 
              $('#addtva').click(function()
                {
                  $('.viewtva').css('display', 'block');
                  $('.applic-tva').css('display', 'none');

                  var idUE = '<?php echo $idUE; ?>';

                  $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/getTVA.php', 
                    data  : 'idUE=' + idUE,
                    success:function(data)
                    {
                      //alert(data);
                      $('#taux_tva').val(data);
                      calcule_ht_ttc(event);
                    }
                  });
                });

               //lorsqu'on annule la TVA
              $('#removetva').click(function()
                {
                  $('.viewtva').css('display', 'none');
                  $('.applic-tva').css('display', 'block');
                  $('#taux_tva').val('0');
                  calcule_ht_ttc(event);
                });


               //on calcul le taux tva pour l'ajout des articles 
              function calcule_ht_ttc(event) // fonction de calcul
              {
                var prix_ht = $('input[name="prix_ht"]').val();
                var taux_tva  = $('input[name="taux_tva"]').val();
                var prix_ttc = $('input[name="prix_ttc"]').val();
                
                if(event.target.name=='prix_ttc')
                {
                  var new_prix_ht = (prix_ttc/(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ht"]').val(new_prix_ht);
                }
                else
                {
                  var new_prix_ttc = (prix_ht*(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ttc"]').val(new_prix_ttc);
                } 
              }

              $('#modal-form').bind('keyup mouseup', calcule_ht_ttc); // appel de la fonction de calcul lors d'un événement 'keyup' ou 'mouseup'


              //lorsqu'on clique sur le radio autre tiers
              $('#autre-tiers-radio').click(function()
                {
                  $('#autre-tiers-selected').removeAttr('disabled', 'true');
                  $('#fournisseur-selected').attr('disabled', 'true');
                });

              //lorsqu'on clique sur le radio fournisseur
              $('#fournisseur-radio').click(function()
                {
                  $('#fournisseur-selected').removeAttr('disabled', 'true');
                  $('#autre-tiers-selected').attr('disabled', 'true');
                });


              //ajouter un nouveau poste
              $('#add_new_post').click(function()
                {
                  $('.poste-depense').modal('hide');
                  $('#new_poste').modal('show');
                });



              

             


              

              //lorsqu'on change le monnaie de paiement 
              $('#autre_devise').click(function()
                {
                  var devise = '<?php echo $devise; ?>';
                  var autre_devise = $('#autre_devise').val();

                  if(devise != autre_devise)
                  {
                    $.ajax(
                      {
                        type  : 'POST', 
                        url   : 'fonction/get_devise.php',
                        data  : 'autre_devise=' + autre_devise,
                        success:function(data)
                        {
                          $('.devise_paie').html(data);
                        }
                      });
                  }
                  else
                  {
                    $('.devise_paie').html(devise);
                  }
                });


              //lorsqu'on clique sur le bouton qui ajoute un fournisseur
              $('#new_fournisseur').click(function()
              {
                $('#new-depense').modal('hide');
                $('#fournisseur').modal('show');
              });
              
              //lorsqu'on clique sur le bouton qui ajoute un autre tiers
              $('#new_autre_tiers').click(function()
              {
                $('#new-depense').modal('hide');
                $('#ajouter-autres-tiers').modal('show');
              });

              //lorsqu'on choissi le mode paiement
              $('#id_mpaie').click(function()
                {
                  var id_cmp = $('#id_mpaie').val();
                  $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/get_num_compte.php',
                    data  : 'id_cmp=' + id_cmp,
                    success:function(data)
                    {
                      if(data == 1)
                      {
                        $('#num_cmp').attr('disabled', true);
                        $('#num_cmp').attr("placeholder", '');
                      }
                      else
                      {
                        $('#num_cmp').attr('disabled', false);
                        $('#num_cmp').attr("placeholder", 'Saisir le numéro de compte du bénéficiaire');
                      }
                    }
                  });
                });



               //ajouter un nouveau fournisseur
              $('#savefour').click(function()
                {
                  //var civilite = $('#civilite').val();
                  //var fidelitecard = $('#fidelitecard').val();
                  var nomfour = $('#nomfour').val();
                  var prenomfour = $('#prenomfour').val();
                  var socfour = $('#socfour').val();
                  var tvafour = $('#tvafour').val();
                  var adressfour = $('#adressfour').val();
                  var telfour = $('#telfour').val();
                  var postalefour = $('#postalefour').val();
                  var villefour = $('#villefour').val();
                  var depfour = $('#depfour').val();
                  var paysfour = $('#paysfour').val();
                  var emailfour = $('#emailfour').val();
                  var idUE = '<?php echo $idUE; ?>';




                  if(socfour != '')
                  {
                    if(emailfour != '')
                    {
                      if(paysfour != '')
                      {
                        if(/^[a-zA-Z]+/.test(prenomfour))
                        {
                          if(/^[a-zA-Z]+/.test(nomfour))
                          { 
                            if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(emailfour))
                            {
                              $.ajax(
                              {
                                type  : 'POST',
                                url   : 'fonction/add_new_fournisseur.php',
                                data  : "prenomfour=" + prenomfour + "&nomfour=" + nomfour + 
                                        "&socfour=" + socfour + "&tvafour=" + tvafour + 
                                        "&adressfour=" + adressfour + "&telfour=" + telfour + 
                                        "&postalefour=" + postalefour + "&villefour=" + villefour + 
                                        "&depfour=" + depfour + "&paysfour=" + paysfour + 
                                        "&emailfour=" + emailfour + "&idUE=" + idUE,
                                success:function(data)
                                {
                                  //alert(data);
                                  $('#nomfour').removeClass('is-invalid');
                                  $('#prenomfour').removeClass('is-invalid');
                                  $('#socfour').removeClass('is-invalid');
                                  $('#emailfour').removeClass('is-invalid');

                                  $('#socfour').val('');
                                  $('#tvafour').val('');
                                  $('#prenomfour').val('');
                                  $('#nomfour').val('');
                                  $('#adressfour').val('');
                                  $('#telfour').val('');
                                  $('#villefour').val('');
                                  $('#depfour').val('');
                                  $('#emailfour').val('');

                                  valid3('Nouveau fournisseur ajouté avec succès');
                                  $('#fournisseur').modal('hide');
                                  
                                  setTimeout(function()
                                  {
                                    window.location.reload();
                                  }, 5000);
                                }
                              });
                            }
                            else
                            {
                              $('#emailfour').addClass('is-invalid');
                              err3("L'adresse émail du fournisseur saisie n'est pas valide !");
                            }
                          }
                          else
                          {
                            $('#nomfour').addClass('is-invalid');
                            err3("Le nom pour le conctact du fournisseur saisie n'est pas valide !");
                          }
                        }
                        else
                        {
                          $('#prenomfour').addClass('is-invalid');
                          err3("Le prénom pour le contct du fournisseur saisie n'est pas valide !");
                        }
                      }
                      else
                      {
                        $('#paysfour').addClass('is-invalid');
                        err3("Veuillez Sélectionner un pays S.V.P !");
                      }
                    }
                    else
                    {
                      $('#emailfour').addClass('is-invalid');
                      err3("Veuillez saisir l'adresse émail du fournisseur S.V.P!");
                    }
                  }
                  else
                  {
                    $('#socfour').addClass('is-invalid');
                    err3("Veuillez saisir le nom de l'entreprise du fournisseur S.V.P!");
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

              
              $('#save-depense').click(function()
                {
                  var post_depense = $('#designation_depense').val();
                  var date_depense = $('#date-depense').val();
                  //var montant = $('#Montpaye').val();
                  //var Apayer = $('#montant-depense').val();
                  var id_cmp = $('#id_mpaie').val();
                  var num_cmp = $('#num_cmp').val();
                  var four = $('#fournisseur-selected').val();

                  var four_check = $('#fournisseur-radio');
                  var autre_check = $('#autre-tiers-radio');

                  var autr = $('#autre-tiers-selected').val();
                  var com = $('#commentaire').val();

                  var autre_devise = $('#autre_devise').val();

                  var idUE = '<?php echo $idUE; ?>';
                  var getid = '<?php echo $getid; ?>';

                  var montant = $('#prix_ttc').val();
                  var taux_tva = $('#taux_tva').val();
                  var prix_hta = $('#prix_ht').val();

                  
                  
                  if(post_depense != '')
                  {
                    $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction/get_equivelent_devise.php',
                      data  : 'autre_devise=' + autre_devise,
                      success:function(data)
                      {
                        var equiv = data;
                        var montant_depense = montant / equiv;
                        var prix_ht = prix_hta / equiv;
                        //var resteApayer = Apayer - montant_depense; //A payer - montant payer 

                        if(four_check.is(':checked'))
                        {
                          if(/^[0-9]+[.][0-9]+/.test(montant) || /^[0-9]+/.test(montant) || montant != '')
                          {
                            if(four != '')
                            {
                              //on met l'autre tiers à vide, parce que c'est le fournisseur qui est sélectionné
                              autr = '';

                              if(id_cmp != '')
                              {
                                $.ajax(
                                  {
                                    type  : 'POST',
                                    url   : 'fonction/verif_total_encaissement.php',
                                    data  : 'id_cmp=' + id_cmp + '&taux_echange=' + montant_depense + '&idUE=' + idUE,
                                    success:function(info)
                                    {
                                      if(info != 1)
                                      {
                                        $.ajax(
                                          {
                                            type  : 'POST',
                                            url   : 'fonction/get_num_compte.php',
                                            data  : 'id_cmp=' + id_cmp,
                                            success:function(donnee)
                                            {
                                              if(donnee == 1)
                                              {
                                                $.ajax(
                                                  {
                                                    type  : 'POST',
                                                    url   : 'fonction/verif_egal_devise.php',
                                                    data  : 'id_cmp=' + id_cmp + '&autre_devise=' + autre_devise,
                                                    success:function(dev)
                                                    {
                                                      if(dev != 1)
                                                      {
                                                        $.ajax(
                                                          {
                                                            type  : 'POST', 
                                                            url   : 'fonction/saveNotefrais.php',
                                                            data  : 'post_depense=' + post_depense + '&date_depense=' + date_depense +
                                                                    '&montant_depense=' + montant_depense + '&id_cmp=' + id_cmp + 
                                                                    '&num_cmp=' + num_cmp + '&four=' + four +
                                                                    '&autr=' + autr + '&com=' + com + '&equiv=' + equiv + 
                                                                    '&idUE=' + idUE + '&getid=' + getid  + '&taux_tva=' + taux_tva + '&prix_ht=' + prix_ht,
                                                            success:function(data1) 
                                                            {
                                                              //alert(data1);
                                                              //affiche_note_frais_depense();
                                                              
                                                              $('#new-depense').modal('hide');
                                                              valid3('Dépense enregistrée avec succès !');

                                                              $('#autre_devise').removeClass('is-invalid');
                                                              $('#id_mpaie').removeClass('is-invalid');
                                                              $('#fournisseur-selected').removeClass('is-invalid');
                                                              $('#autre-tiers-selected').removeClass('is-invalid');
                                                              $('#num_cmp').removeClass('is-invalid');
                                                              $('#prix_ttc').removeClass('is-invalid');
                                                              $('#designation_depense').removeClass('is-invalid');
                                                              //$('#montant-depense').removeClass('is-invalid');

                                                              //$('#montant-depense').val('');
                                                              $('#num_cmp').val('');
                                                              $('#commentaire').val('');
                                                              $('#Montpaye').val('');
                                                              $('#designation_depense').val('');

                                                              setTimeout(function()
                                                              {
                                                                window.location.reload();
                                                              }, 5000);
                                                            }
                                                          });
                                                      }
                                                      else
                                                      {
                                                        $('#autre_devise').addClass('is-invalid');
                                                        err3('Veuillez Choissir la devise correspondant à la devise du mode paiement');
                                                      }
                                                    }
                                                  });
                                              }
                                              else //le mode paiement contient un numéro de compte
                                              {
                                                if(num_cmp != '')
                                                {
                                                  $.ajax(
                                                    {
                                                      type  : 'POST',
                                                      url   : 'fonction/verif_egal_devise.php',
                                                      data  : 'id_cmp=' + id_cmp + '&autre_devise=' + autre_devise,
                                                      success:function(dev)
                                                      {
                                                        if(dev != 1)
                                                        {
                                                          $.ajax(
                                                            {
                                                              type  : 'POST', 
                                                              url   : 'fonction/saveNotefrais.php',
                                                              data  : 'post_depense=' + post_depense + '&date_depense=' + date_depense +
                                                                      '&montant_depense=' + montant_depense + '&id_cmp=' + id_cmp + 
                                                                      '&num_cmp=' + num_cmp + '&four=' + four +
                                                                      '&autr=' + autr + '&com=' + com + '&equiv=' + equiv + 
                                                                      '&idUE=' + idUE + '&getid=' + getid + '&taux_tva=' + taux_tva + '&prix_ht=' + prix_ht,
                                                              success:function(data1) 
                                                              {
                                                                //alert(data1);
                                                                //affiche_note_frais_depense();

                                                                $('#new-depense').modal('hide');
                                                                valid3('Dépense enregistrée avec succès !');

                                                                $('#autre_devise').removeClass('is-invalid');
                                                                $('#id_mpaie').removeClass('is-invalid');
                                                                $('#fournisseur-selected').removeClass('is-invalid');
                                                                $('#autre-tiers-selected').removeClass('is-invalid');
                                                                $('#num_cmp').removeClass('is-invalid');
                                                                $('#prix_ttc').removeClass('is-invalid');
                                                                $('#designation_depense').removeClass('is-invalid');
                                                                //$('#montant-depense').removeClass('is-invalid');

                                                                //$('#montant-depense').val('');
                                                                $('#num_cmp').val('');
                                                                $('#commentaire').val('');
                                                                $('#prix_ttc').val('');
                                                                $('#designation_depense').val('');

                                                                setTimeout(function()
                                                                {
                                                                  window.location.reload();
                                                                }, 5000);
                                                              }
                                                            });
                                                        }
                                                        else
                                                        {
                                                          $('#autre_devise').addClass('is-invalid');
                                                          err3('Veuillez Choissir la devise correspondant à la devise du mode paiement');
                                                        }
                                                      }
                                                    });
                                                }
                                                else
                                                {
                                                  err3('Veuillez saisir le numéro de compte du bénéficiare S.V.P !');
                                                  $('#num_cmp').addClass('is-invalid');
                                                }
                                              }
                                            }
                                          });
                                      }
                                      else
                                      {
                                        err3("Impossible d'effectuer un décaissement car la caisse ne peut être négative !");
                                        $('#prix_ttc').addClass('is-invalid');
                                      }
                                    }
                                  });
                              }
                              else
                              {
                                $('#id_mpaie').addClass('is-invalid');
                                err3('Veuillez Choissir le mode de paiement S.V.P');
                              }
                            }
                            else
                            {
                              $('#fournisseur-selected').addClass('is-invalid');
                              err3('Veuillez sélectionner un fournisseur S.V.P');
                            }
                          }
                          else
                          {
                            $('#prix_ttc').addClass('is-invalid');
                            err3("Le montant de la dépense que vous avez saisie n'est pas valide");
                          }
                        }
                        else
                        {
                          if(/^[0-9]+[.][0-9]+/.test(montant) || /^[0-9]+/.test(montant) || montant != '')
                          {
                            
                            if(autr != '')
                            {
                              four = '';

                              if(id_cmp != '')
                              {
                                $.ajax(
                                  {
                                    type  : 'POST',
                                    url   : 'fonction/verif_total_encaissement.php',
                                    data  : 'id_cmp=' + id_cmp + '&taux_echange=' + montant_depense + '&idUE=' + idUE,
                                    success:function(info)
                                    {
                                      if(info != 1)
                                      {
                                        $.ajax(
                                          {
                                            type  : 'POST',
                                            url   : 'fonction/get_num_compte.php',
                                            data  : 'id_cmp=' + id_cmp,
                                            success:function(donnee)
                                            {
                                              if(donnee == 1)
                                              {
                                                $.ajax(
                                                  {
                                                    type  : 'POST',
                                                    url   : 'fonction/verif_egal_devise.php',
                                                    data  : 'id_cmp=' + id_cmp + '&autre_devise=' + autre_devise,
                                                    success:function(dev)
                                                    {
                                                      if(dev != 1)
                                                      {
                                                        $.ajax(
                                                          {
                                                            type  : 'POST', 
                                                            url   : 'fonction/saveNotefrais.php',
                                                            data  : 'post_depense=' + post_depense + '&date_depense=' + date_depense +
                                                                    '&montant_depense=' + montant_depense + '&id_cmp=' + id_cmp + 
                                                                    '&num_cmp=' + num_cmp + '&four=' + four +
                                                                    '&autr=' + autr + '&com=' + com + '&equiv=' + equiv + 
                                                                    '&idUE=' + idUE + '&getid=' + getid + '&taux_tva=' + taux_tva + '&prix_ht=' + prix_ht,
                                                            success:function(data1) 
                                                            {
                                                              //alert(data1);

                                                              //affiche_note_frais_depense();

                                                              $('#new-depense').modal('hide');
                                                              valid3('Dépense enregistrée avec succès !');

                                                              $('#autre_devise').removeClass('is-invalid');
                                                              $('#id_mpaie').removeClass('is-invalid');
                                                              $('#fournisseur-selected').removeClass('is-invalid');
                                                              $('#autre-tiers-selected').removeClass('is-invalid');
                                                              $('#num_cmp').removeClass('is-invalid');
                                                              $('#prix_ttc').removeClass('is-invalid');
                                                              $('#designation_depense').removeClass('is-invalid');
                                                              //$('#montant-depense').removeClass('is-invalid');

                                                              //$('#montant-depense').val('');
                                                              $('#num_cmp').val('');
                                                              $('#commentaire').val('');
                                                              $('#prix_ttc').val('');
                                                              $('#designation_depense').val('');

                                                              setTimeout(function()
                                                              {
                                                                window.location.reload();
                                                              }, 5000);
                                                            }
                                                          });
                                                      }
                                                      else
                                                      {
                                                        $('#autre_devise').addClass('is-invalid');
                                                        err3('Veuillez Choissir la devise correspondant à la devise du mode paiement');
                                                      }
                                                    }
                                                  });
                                              }
                                              else //le mode paiement contient un numéro de compte
                                              {
                                                if(num_cmp != '')
                                                {
                                                  $.ajax(
                                                    {
                                                      type  : 'POST',
                                                      url   : 'fonction/verif_egal_devise.php',
                                                      data  : 'id_cmp=' + id_cmp + '&autre_devise=' + autre_devise,
                                                      success:function(dev)
                                                      {
                                                        if(dev != 1)
                                                        {
                                                          $.ajax(
                                                            {
                                                              type  : 'POST', 
                                                              url   : 'fonction/saveNotefrais.php',
                                                              data  : 'post_depense=' + post_depense + '&date_depense=' + date_depense +
                                                                      '&montant_depense=' + montant_depense + '&id_cmp=' + id_cmp + 
                                                                      '&num_cmp=' + num_cmp + '&four=' + four +
                                                                      '&autr=' + autr + '&com=' + com + '&equiv=' + equiv + 
                                                                      '&idUE=' + idUE + '&getid=' + getid + '&taux_tva=' + taux_tva + '&prix_ht=' + prix_ht,
                                                              success:function(data1) 
                                                              {
                                                                //alert(data1);

                                                                //affiche_note_frais_depense();

                                                                $('#new-depense').modal('hide');
                                                                valid3('Dépense enregistrée avec succès !');

                                                                $('#autre_devise').removeClass('is-invalid');
                                                                $('#id_mpaie').removeClass('is-invalid');
                                                                $('#fournisseur-selected').removeClass('is-invalid');
                                                                $('#autre-tiers-selected').removeClass('is-invalid');
                                                                $('#num_cmp').removeClass('is-invalid');
                                                                $('#prix_ttc').removeClass('is-invalid');
                                                                $('#designation_depense').removeClass('is-invalid');
                                                                //$('#montant-depense').removeClass('is-invalid');

                                                                //$('#montant-depense').val('');
                                                                $('#num_cmp').val('');
                                                                $('#commentaire').val('');
                                                                $('#prix_ttc').val('');
                                                                $('#designation_depense').val('');

                                                                setTimeout(function()
                                                                {
                                                                  window.location.reload();
                                                                }, 5000);
                                                              }
                                                            });
                                                        }
                                                        else
                                                        {
                                                          $('#autre_devise').addClass('is-invalid');
                                                          err3('Veuillez Choissir la devise correspondant à la devise du mode paiement');
                                                        }
                                                      }
                                                    });
                                                }
                                                else
                                                {
                                                  err3('Veuillez saisir le numéro de compte du bénéficiare S.V.P !');
                                                  $('#num_cmp').addClass('is-invalid');
                                                }
                                              }
                                            }
                                          });
                                      }
                                      else
                                      {
                                        err3("Impossible d'effectuer un décaissement car la caisse ne peut être négative !");
                                        $('#prix_ttc').addClass('is-invalid');
                                      }

                                    }
                                  });
                              }
                              else
                              {
                                $('#id_mpaie').addClass('is-invalid');
                                err3('Veuillez Choissir le mode de paiement S.V.P');
                              }
                            }
                            else
                            {
                              $('#autre-tiers-selected').addClass('is-invalid');
                              err3('Veuillez sélectionner un autre tiers S.V.P');
                            }
                            
                          }
                          else
                          {
                            $('#prix_ttc').addClass('is-invalid');
                            err3("Le montant de la dépense que vous avez saisie n'est pas valide");
                          }
                        }
                        
                      }
                    });
                  }
                  else
                  {
                    $('#designation_depense').addClass('is-invalid');
                    err3("Veuillez saisir la désignation de la dépense S.V.P !");
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
