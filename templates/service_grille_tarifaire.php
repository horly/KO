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

        .body-modal-article
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
        

         <title>KEDIS Online! | Mes services</title>
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
                                    <h1>Mes services</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Mes services</a></li>
                                        <li class="active">Ma grille tarifaire</li>
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
                          if($fetch_user['service'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link active" href="#"><strong>Ma grille tarifaire</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['categorie_service'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="service.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes catégories de services</strong></a>
                        </li>
                      <?php
                          }
                      ?>
                    </ul>
                  </h6>
                      <?php 
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM service_for_user WHERE id_UE_ser = ?");
                          $view->execute(array($idUE));
                          $i = 1;
                          $existallvente = $view->rowCount();
                        ?>

                      <div class="card-body">
                          <div class="card border-info mb-3" >
                              <div class="card-header text-left"><strong><b>Liste des services (Total : <?php echo $existallvente; ?>)</b></strong></div>
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

                                           <button type="button" class="btn btn-success" id="new-service">
                                            <span class="step size-21">
                                                <i class="icon ion-ios-cog"></i>
                                            </span>
                                            &nbsp;&nbsp;Ajouter
                                          </button>

                                        <?php
                                            }
                                            else
                                            {
                                        ?>

                                          <div class="alert alert-primary" role="alert">
                                            Vous avez atteint le nombre maximal des services.
                                          </div>

                                        <?php
                                            }
                                          }
                                          else
                                          {

                                        ?>

                                          <button type="button" class="btn btn-success" id="new-service">
                                            <span class="step size-21">
                                                <i class="icon ion-ios-cog"></i>
                                            </span>
                                            &nbsp;&nbsp;Ajouter
                                          </button>

                                        <?php
                                          }

                                        ?>



                                          
                                        </div>
                                        <div class="col-md-3">
                                        <?php

                                            $reqcatart = $bdd->prepare("SELECT * FROM categorie_service WHERE id_UE_ser = ?");
                                            $reqcatart->execute(array($idUE));

                                        ?>
                                        <!--<label>Catégorie</label>-->
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><strong>Catégorie :</strong></span>
                                          </div>
                                          <select class="custom-select" id="categorie_art">
                                            <option value="all" selected>Toutes</option>
                                            <?php
                                              
                                              while($categorie = $reqcatart->fetch()) 
                                              {
                                            ?>
                                              <option value="<?php echo $categorie['id_cat_ser']; ?>">
                                                <?php echo $categorie['lib_cat_ser']; ?>
                                              </option>
                                            <?php
                                              }
                                            ?>
                                          </select>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                      </div>
                                    </div>                               
                                  </div>
                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Référence</th>
                                        <th>Désignation</th>
                                        <th>Catégorie</th>
                                        <th>Prix HTVA (<?php echo $devise; ?>)</th>
                                        <th>Prix TTC (<?php echo $devise; ?>)</th>
                                        <th>Remarques</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered" id="table_service">
                                      <?php

                                        $view = $bdd->prepare("SELECT * FROM service_for_user WHERE id_UE_ser = ?");
                                        $view->execute(array($idUE));

                                        $existallcat = $view->rowCount();

                                        
                                            while($row = $view->fetch()) 
                                            {
                                         ?>   
                                            <tr>
                                              <td><a class="text-primary" href="viewService.php?id=<?php echo $getid;?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&idser=<?php echo $row['id_ser'];?>"><?php echo $row['num_ser']; ?></a></td>
                                              <td class="text-left"><?php echo utf8_encode($row['lib_ser']); ?></td>
                                              <td class="text-left">
                                                <?php 
                                                  //on séléctionne dans la table catégorie de service pour récupérer le libelle du catégorie service appartennant au service 
                                                  $getlibser = $bdd->prepare("SELECT * FROM categorie_service WHERE id_cat_ser = ?");
                                                  $getlibser->execute(array($row['id_cat_serv']));

                                                  $lib_cat_ser = $getlibser->fetch();
                                                  echo $lib_cat_ser['lib_cat_ser'];  //on affiche le libellé service
                                                ?>
                                              </td>
                                              <td class="text-right"><?php echo number_format($row['prix_HTVA_ser'], 2, ',', ' '); ?>
                                              </td>
                                              <td class="text-right"><?php echo number_format($row['prix_TTC_ser'], 2, ',', ' '); ?>
                                              </td>
                                              <td class="text-left"><?php echo utf8_encode($row['remarque_ser']); ?>
                                              </td>
                                              <td>
                                                <a class="text-primary" href="viewService.php?id=<?php echo $getid;?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&idser=<?php echo $row['id_ser'];?>">Détails</a>
                                              </td>
                                            </tr>
                                          <?php 
                                            } 
                                    ?>
                                    </tbody>

                                    <?php 
                                        //le total ttc de tous les services
                                        $get_valstock = $bdd->prepare('SELECT SUM(prix_TTC_ser) AS total_ttc FROM service_for_user WHERE id_UE_ser = ?');
                                        $get_valstock->execute(array($idUE));
                                        $valeur = $get_valstock->fetch();
                                        $total_ttc = $valeur['total_ttc'];

                                        $get_totalhtva = $bdd->prepare('SELECT SUM(prix_HTVA_ser) AS total_htva FROM service_for_user WHERE id_UE_ser = ?');
                                        $get_totalhtva->execute(array($idUE));
                                        $fetch_htva = $get_totalhtva->fetch();
                                        $total_htva = $fetch_htva['total_htva'];
                                    ?>

                                    <tfoot>
                                      <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th class="text-right"><?php echo number_format($total_htva, 2, '.', ' '); ?></th>
                                        <th class="text-right"><?php echo number_format($total_ttc, 2, '.', ' '); ?></th>
                                        <th></th>
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
              <div class="modal fade bd-example-modal-lg ajouter-service" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" id="modal">
                    <div class="modal-content" id="content-modal">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Ajouter un nouveau service</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                        
                      </div>

                      <div class="modal-body body-modal-service">

                       <div class="card form_card">
                        <div class="card-body">

                             <div class="row">
                              <div class="col-md-6">
                                <label for="lib_ser"><h6>Désignation</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" id="lib_ser" placeholder="Entrer le libellé ou la désignation du service" name="lib_ser" required="">
                                </div>
                              </div>

                            <?php

                                $reqcatart = $bdd->prepare("SELECT * FROM categorie_service WHERE id_UE_ser = ? AND default_cat_ser != ?");
                                $reqcatart->execute(array($idUE, 1));

                                //pour les services qui n'ont pas de catégorie
                                $reqc = $bdd->prepare("SELECT * FROM categorie_service WHERE id_UE_ser = ? AND default_cat_ser = ?");
                                $reqc->execute(array($idUE, 1));
                                $aucune_cat = $reqc->fetch();

                            ?>

                              <div class="col-md-6">
                               <label><h6>Catégorie</h6></label>
                                <div class="input-group mb-3">
                                  <select class="custom-select" id="cat_ser" name="cat_ser">
                                    <option value="<?php echo $aucune_cat['id_cat_ser']; ?>" selected="">Sélectionner une catégorie de service</option>
                                    <option value="<?php echo $aucune_cat['id_cat_ser']; ?>">Aucune</option>
                                    <?php
                                        while($categorie = $reqcatart->fetch()) 
                                        {
                                    ?>
                                    <option value="<?php echo $categorie['id_cat_ser']; ?>"><?php echo $categorie['lib_cat_ser']; ?></option>
                                    <?php }?>
                                  </select>
                                  <div class="input-group-append">
                                    <button class="btn btn-info" type="button" id="new_categorie">Nouvelle</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                              <div class="form-group">
                                <label for="remarque_ser"><h6>Remarques</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" id="remarque_ser" placeholder="Entrer une remarque pour le service" name="remarque_ser" required="">
                                </div>
                              </div>

                        </div>
                      </div>

                       <form id="modal-form1">
                         <div class="card form_card">
                          <div class="card-body">

                               <!--<div class="row">
                                <div class="col-md-6">
                                  <label for="prix_ht_s"><h6>Prix de vente HTVA</h6></label>
                                  <div class="input-group mb-3">
                                    <input name="prix_ht_s" type="number" class="form-control text-right" placeholder="0.00" value="0.00" step="0.01" id="prix_ht_s">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><?php echo $devise; ?></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="taux_tva_s"><h6>Taux TVA</h6></label>
                                  <div class="input-group mb-3">
                                    <input name="taux_tva_s" type="number" class="form-control text-right" value="20.00" step="0.01" id="taux_tva_s">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">%</span>
                                    </div>
                                  </div>
                                </div>
                              </div>-->

                              <!--<div class="form-group">
                                  <label for="prix_ttc"><h6>Prix de vente TTC</h6></label>
                                    <div class="input-group mb-3">
                                      <input name="prix_ttc" type="number" placeholder="0.00" class="form-control text-right" value="0.00" step="0.01" id="prix_ttc">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo $devise; ?></span>
                                      </div>
                                    </div>
                                </div>-->

                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <label for="prix_ttc"><h6>Prix de vente TTC</h6></label>
                                        <div class="input-group mb-3">
                                          <input name="prix_ttc" type="text" placeholder="0.00" class="form-control text-right" id="prix_ttc" value="0">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><?php echo $devise; ?></span>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <label><h6>&nbsp;</h6></label>
                                        <button type="button" class="btn btn-success btn-block" id="addtva">
                                          <span class="step size-21">
                                            <i class="icon ion-android-add-circle"></i>
                                          </span>
                                            &nbsp;Appliquer la TVA
                                        </button>
                                      </div>
                                  </div>

                                </div>

                                <!-- cette div est caché tant qu'on pas appyer sur le bouton Appliquer la TVA-->
                                 <div class="row">
                                  <div class="col-md-6 viewtva">
                                    <label for="prix_ht_s"><h6>Prix de vente HTVA</h6></label>
                                    <div class="input-group mb-3">
                                      <input name="prix_ht_s" type="text" class="form-control text-right" placeholder="0.00" id="prix_ht_s" value="0">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo $devise; ?></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 viewtva">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label for="taux_tva_s"><h6>Taux TVA</h6></label>
                                        <div class="input-group mb-3">
                                          <input name="taux_tva_s" type="text" class="form-control text-right" placeholder="0.00" id="taux_tva_s" value="0">
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

                          </div>
                         </div>
                       </form>
                      </div>

                       <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                              <i class="icon ion-ios-undo"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Annuler
                        </button>
                        <button type="bouton" class="btn btn-primary" name="saveser" id="saveser">
                            <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Enregistrer
                        </button>
                      </div>

                    </div>
                </div>
              </div>

              <!--Nouvelle catégorie de service-->
              <div class="modal fade ajouter-categorie-article" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="myModalLabel">Ajouter une catégorie de services</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                          </div>
                        </div>
                                
                                
                          </div>
                          <div class="modal-body">
                            <label for="libelleser"><h6>Désignation</h6></label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-inbox.png"></span>
                              </div>
                              <input type="text" class="form-control" placeholder="Entrer le libellé de votre catégorie de services" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libelleser" id="libelleser" required="">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                              <span class="step size-21">
                                <i class="icon ion-android-cancel"></i>
                              </span>
                              &nbsp;&nbsp;Annuler</button>
                            <button type="submit" class="btn btn-primary" name="addcatser" id="addcatser"> 
                              <span class="step size-21">
                                <i class="icon ion-archive"></i>
                              </span>
                              &nbsp;&nbsp;Enregistrer</button>
                          </div>
                    </div>
                  
                </div>
              </div>
              <!--Nouvelle catégorie service-->

             

                


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
            $('.service').addClass('active');

             //on affiche les articles
              //affiche_service();
              //ici on affiche tous les services
              function affiche_service()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var recherche = $('#libsearchcatart').val();
                var id_connexion = '<?php echo $id_connexion; ?>';
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_service_grille.php',
                  data : 'recherche=' + recherche + '&idUE=' + idUE  + 
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_service').html(data);
                  }
                });
              }


              //ajouter un nouveau service 
              $('#new-service').click(function()
                {
                  $('.ajouter-service').modal('show');
                });


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

            //séléctionner une catégorie d'article
              $('#categorie_art').click(function()
                {
                  var idcat = $('#categorie_art').val();
                  var getid = '<?php echo $getid; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  if(idcat == 'all')
                  {
                    affiche_service();
                  }
                  else
                  {
                    $.ajax({
                      type : 'POST', 
                      url  : 'fonction/affiche_service_categorie.php',
                      data : 'idcat=' + idcat + '&idUE=' + idUE  + 
                              '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                             '&id_connexion=' + id_connexion,
                      success:function(data)
                      {
                        $('#table_service').html(data);
                      }
                    });
                  }
                    
                });

              

              //lorsqu'on clique pour appliquer la TVA 
              $('#addtva').click(function()
                {
                  $('.viewtva').css('display', 'block');
                  $('.body-modal-service').css('height', '515px');

                  var idUE = '<?php echo $idUE; ?>';

                  $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/getTVA.php', 
                    data  : 'idUE=' + idUE,
                    success:function(data)
                    {
                      //alert(data);
                      $('#taux_tva_s').val(data);
                      calcule_ht_ttc1(event);
                    }
                  });
                });

               //lorsqu'on annule la TVA
              $('#removetva').click(function()
                {
                  $('.body-modal-service').css('height', '420px');
                  $('.viewtva').css('display', 'none');
                  $('#taux_tva_s').val('0');
                  calcule_ht_ttc1(event);
                });


               //on calcul le taux tva pour l'ajout des services
              function calcule_ht_ttc1(event) // fonction de calcul
              {
                var prix_ht = $('input[name="prix_ht_s"]').val();
                var taux_tva  = $('input[name="taux_tva_s"]').val();
                var prix_ttc = $('input[name="prix_ttc"]').val();
                
                if(event.target.name=='prix_ttc')
                {
                  var new_prix_ht = (prix_ttc/(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ht_s"]').val(new_prix_ht);
                }
                else
                {
                  var new_prix_ttc = (prix_ht*(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ttc"]').val(new_prix_ttc);
                } 
              }

              $('#modal-form1').bind('keyup mouseup', calcule_ht_ttc1);

              //ajouter un nouveau service
              $('#saveser').click(function()
                {
                  var lib_ser = $('#lib_ser').val();
                  var cat_ser = $('#cat_ser').val();
                  var remarque_ser = $('#remarque_ser').val();
                  var prix_ht = $('#prix_ht_s').val();
                  var taux_tva = $('#taux_tva_s').val();
                  var prix_ttc = $('#prix_ttc').val();
                  
                  var getprenom = '<?php echo $getprenom; ?>';
                  var getname = '<?php echo $getname; ?>';
                  var idUE = '<?php echo $idUE; ?>';

                  
                  if(lib_ser != '')
                    {
                      if(/^[0-9]+[.][0-9]+/.test(prix_ht) || /^[0-9]+/.test(prix_ht) || prix_ht == '')
                      {
                        if(/^[0-9]+[.][0-9]+/.test(taux_tva) || /^[0-9]+/.test(taux_tva) || taux_tva == '')
                        {
                          if(/^[0-9]+[.][0-9]+/.test(prix_ttc) || /^[0-9]+/.test(prix_ttc) || prix_ttc == '')
                          {
                            $.ajax(
                              {
                                  type : 'POST',
                                  url : 'fonction/add_new_service.php',
                                  data : "lib_ser=" + lib_ser + "&cat_ser=" + cat_ser + 
                                          "&remarque_ser=" + remarque_ser + "&prix_ht=" + prix_ht + 
                                          "&taux_tva=" + taux_tva + "&prix_ttc=" + prix_ttc + 
                                          "&getprenom=" + getprenom + 
                                          "&getname=" + getname + "&idUE=" + idUE,
                                  success:function(data)
                                  {
                                    //alert(data);
                                    if(data == 1)
                                    {
                                      err3("Ce service existe déjà !");
                                      $('#lib_ser').addClass('is-invalid');
                                    }
                                    else
                                    {
                                      $('#lib_ser').removeClass('is-invalid');
                                      $('#prix_ht_s').removeClass('is-invalid');
                                      $('#prix_ttc_s').removeClass('is-invalid');
                                      $('#taux_tva_s').removeClass('is-invalid');

                                      $('#lib_ser').val('');
                                      $('#prix_ht_s').val('');
                                      $('#prix_ttc_s').val('');
                                      $('#taux_tva_s').val('');
                                      $('#remarque_ser').val('');
                                      $('#cat_ser').val('');
                                      
                                      valid3('Nouveau service inséré avec succès !');
                                      $('.ajouter-service').modal('hide');
                                      setTimeout(function()
                                      {
                                        window.location.reload();
                                      }, 5000);
                                    }
                                    //affiche_service();
                                  }
                              });  
                          }
                          else
                          {
                            $('#prix_ttc').addClass('is-invalid');
                            err3("Le prix de vente TTC du service saisie n'est pas valide!");
                          }
                        }
                        else
                        {
                          $('#taux_tva_s').addClass('is-invalid');
                          err3("Le taux TVA du service saisie n'est pas valide!");
                        }
                      }
                      else
                      {
                        $('#prix_ht_s').addClass('is-invalid');
                        err3("Le prix de vente HTVA du service saisie n'est pas valide!");
                      }
                    }
                    else
                    {
                      $('#lib_ser').addClass('is-invalid');
                      err3('Veuillez remplir le libellé du service S.V.P!'); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                    }

                });

              //lorsqu'on appui sur le bouton nouvelle catégorie d'article
              $('#new_categorie').click(function()
                {
                  /*$('#modal').removeClass('modal-lg');
                  var idUE = '<?php echo $idUE; ?>';

                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction/contente_categorie_service.php',
                      data  : 'idUE=' + idUE,
                      success:function(data)
                      {
                        $('#content-modal').html(data);
                      }
                    });*/

                  //$('#title-modal').html("Ajouter une catégorie d'articles");
                    $('.ajouter-service').modal('hide');
                    $('.ajouter-categorie-article').modal('show');
                });

              $('#addcatser').click(function()
                {
                  var libelleser = $('#libelleser').val();
                  var idUE = '<?php echo $idUE; ?>';

                  if(libelleser != '')
                  {
                    $.ajax({
                      type : 'POST',
                      url : 'fonction/add_new_categorie_service.php',
                      data : "libelleser=" + libelleser +  
                             "&idUE=" + idUE,
                      success:function(data)
                      {
                        //alert(data);
                        if(data == 1)
                        {
                          err3("Cette catégorie de service existe déjà !");
                          $('#libelleser').addClass('is-invalid');
                        }
                        else
                        {
                          $('#libelleser').removeClass('is-invalid');
                          valid3('Nouvelle catégorie service inséré avec succès !');
                          $('.ajouter-categorie-article').modal('hide');
                          //$('.ajouter-service').modal('hide');
                          setTimeout(function()
                            {
                              window.location.reload();
                            }, 5000);
                        }
                        //affiche_cat_service();
                      }
                    });
                  }
                  else
                  {
                    $('#libelleser').addClass('is-invalid');
                    err3("Veuillez entrer le libellé du catégorie de service S.V.P!");
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
