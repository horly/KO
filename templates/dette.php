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

      

    </style>
        

         <title>KEDIS Online! | Mes dépenses | Mes dettes</title>
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
                                    <h1>Mes dettes/créances</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Mes dettes/créances</a></li>
                                        <li class="active">Mes dettes</li>
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
                          if($fetch_user['creance'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="creance.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes créances</strong></a>
                        </li>
                        <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['dette'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link active" href="#"><strong>Mes dettes</strong></a>
                        </li>
                      <?php
                          }
                      ?>
                    </ul>
                  </h6>

                  <?php 
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM dette_for_user WHERE id_UE_det = ? AND default_det != 1");
                          $view->execute(array($idUE));
                          $i = 1;
                          $existallvente = $view->rowCount();
                        ?>

                     

                      <div class="card-body">
                          <div class="card border-info mb-3" >
                              <div class="card-header text-left"><strong><b>Liste des dettes/emprunts (Total : <?php echo $existallvente; ?>)</b></strong></div>
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

                                            <button type="button" class="btn btn-success btn-block" id="get-dette">
                                          <span class="step size-21">
                                              <i class="icon ion-clipboard"></i>
                                          </span>
                                              &nbsp;Enregistrer une dette</button>

                                        <?php
                                            }
                                            else
                                            {
                                        ?>

                                          <div class="alert alert-primary" role="alert">
                                            Vous avez atteint le nombre maximal de dettes.
                                          </div>

                                        <?php
                                            }
                                          }
                                          else
                                          {

                                        ?>

                                          <button type="button" class="btn btn-success btn-block" id="get-dette">
                                          <span class="step size-21">
                                              <i class="icon ion-clipboard"></i>
                                          </span>
                                              &nbsp;Enregistrer une dette</button>

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
                                        <th>Débiteur</th>
                                        <th>Montant dette (<?php echo $devise; ?>)</th>
                                        <th>Echéance</th>
                                        <th>A rembourser (<?php echo $devise; ?>)</th>
                                        <th>Gestionnaire</th>
                                        <th>Remarques</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered" id="table_article">
                                      <?php

                                        $view = $bdd->prepare("SELECT * FROM dette_for_user WHERE id_UE_det = ? AND default_det != 1 ORDER BY id_det DESC");
                                        $view->execute(array($idUE));
                                        $i = 1; 

                                        $existallvente = $view->rowCount();

                                        
                                            while($row = $view->fetch()) 
                                            {
                                         ?>   
                                           <tr>
                                              <td class="text-left"><?php echo $row['date_det']; ?></td>
                                              <td class="text-left">
                                                <?php
                                                    $nbrcli = $bdd->prepare("SELECT * FROM autres_tiers WHERE id_tr = ?"); 
                                                    $nbrcli->execute(array($row['id_autre_tier_det']));

                                                    $nameCli = $nbrcli->fetch();

                                                    echo $nameCli['prenom_tr'].' '.$nameCli['nom_tr'];  
                                                ?>
                                              </td>
                                              <td class="text-right"><?php echo number_format($row['montant_det'], 2, '.', ' '); ?></td>
                                              <td class="text-left"><?php echo $row['echeance_det']; ?></td>
                                              <td class="text-right"><?php echo number_format($row['reste_a_payer'], 2, '.', ' '); ?></td>
                                              <td class="text-left">
                                                <?php 
                                                  $nbrcli = $bdd->prepare("SELECT * FROM user WHERE id_cl = ?"); 
                                                    $nbrcli->execute(array($row['id_gest_det']));

                                                    $nameCli = $nbrcli->fetch();

                                                    echo $nameCli['prenom_cl'].' '.$nameCli['nom_cl']; 
                                                ?>
                                              </td>
                                              <td class="text-left"><?php echo $row['remarque_det']; ?></td>
                                              <td>
                                                <a class="text-primary" href="viewDette.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&id_det=<?php echo $row['id_det']; ?>">Détails</a>
                                              </td>
                                            </tr>
                                          <?php 
                                            } 
                                    ?>
                                    </tbody>

                                    <?php

                                        //somme total à payer
                                        $somme_mt_fact = $bdd->prepare("SELECT SUM(montant_det) AS somme_ttc FROM dette_for_user WHERE id_UE_det = ? AND default_det != 1");
                                        $somme_mt_fact->execute(array($idUE));
                                        $fetch_ttc = $somme_mt_fact->fetch();
                                        $total_ttc = number_format($fetch_ttc['somme_ttc'], 2, '.', '');


                                        //somme reste à payer
                                        $somme_reste = $bdd->prepare("SELECT SUM(reste_a_payer) AS somme_reste FROM dette_for_user WHERE id_UE_det = ? AND default_det != 1");
                                        $somme_reste->execute(array($idUE));
                                        $fetch_reste = $somme_reste->fetch();
                                        $total_reste = number_format($fetch_reste['somme_reste'], 2, '.', '');
                                    ?>

                                    <tfoot>
                                      <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th class="text-right"><?php echo number_format($total_ttc, 2, '.', ' '); ?></th>
                                        <th></th>
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
                <!--debut modale new poste-->
                <div class="modal fade bd-example-modal-lg " id="new-dette" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    
                      <div class="modal-content">

                        <div class="modal-header text-white bg-secondary">
                          <div class="row">
                            <div class="col-md-10">
                              <h6 class="modal-title" id="exampleModalLabel">Enregistrer une dette</h6>
                            </div>
                            <div class="col-md-2">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                          </div>
                          
                              
                        </div>

                      <div class="modal-body bg-light">

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
                              <label for="Montpaye"><h6>Montant dette/emprunt</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control text-right" placeholder="0.00" name="Montpaye" id="Montpaye" step="0.01" required="">


                                <div class="input-group-append">
                                  <span class="input-group-text" id="devise_paie">
                                    <?php echo $devise; ?>
                                  </span>
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
                                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="num_cmp" id="num_cmp" placeholder="Saisir le numéro de compte du débiteur">
                              </div>
                            </div>
                          </div>
                        </div>

                         <div class="p-3 mb-2 form_card text-dark border">
                          <div class="form-group">
                                <label for="commentaire"><h6>Remarque (pas obligatoire)</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" name="commentaire" id="commentaire" placeholder="Saisir une remarque">
                                </div>
                              </div>
                        </div>

                        <div class="p-3 mb-2 bg-secondary text-white border">  
                          <div class="row">
                            <div class="col-md-6">
                              <label for="autre-tiers"><h6>Autre tiers/débiteur</h6></label>
                              <div class="input-group mb-3">
                                <select class="custom-select" id="autre-tiers">
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

                             <?php

                              //on recupère la date d'aujourd'hui
                              setlocale(LC_TIME, 'fra_fra');
                              $date = date("Y-m-d");
                              
                            ?>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="date-dette"><h6>Echéance</h6></label>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="date-dette" id="date-dette" value="<?php echo $date; ?>">
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
                        <button type="submit" class="btn btn-primary" name="save-dette" id="save-dette">
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
            $('.creance').addClass('active');

             //affiche_dette();

              function affiche_dette()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';

                 $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_dette.php',
                  data : 'idUE=' + idUE  + '&id_connexion=' + id_connexion +
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid,
                  success:function(data)
                  {
                    $('#table_creance').html(data);
                  }
                });
              }
            
            //nouveau dépense
            $('#get-dette').click(function()
              {
                $('#new-dette').modal('show');
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


          //affichage des créance
               $('#affichage').click(function()
                {
                  var affichage = $('#affichage').val();
                  var getid = '<?php echo $getid; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  if(affichage == 'all')
                  {
                    affiche_dette();
                  }
                  else
                  {
                    $.ajax({
                      type : 'POST', 
                      url  : 'fonction/affiche_dette_selection.php',
                      data : 'idUE=' + idUE  + '&id_connexion=' + id_connexion +
                              '&nomE=' + nomE + '&nomUE=' + nomUE + 
                              '&affichage='+ affichage + '&getid=' + getid,
                      success:function(data)
                      {
                        $('#table_creance').html(data);
                      }
                    });
                  }
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
                          $('#devise_paie').html(data);
                        }
                      });
                  }
                  else
                  {
                    $('#devise_paie').html(devise);
                  }
                });

              //lorsqu'on clique sur le bouton qui ajoute un autre tiers
              $('#new_autre_tiers').click(function()
              {
                $('#new-dette').modal('hide');
                $('#ajouter-autres-tiers').modal('show');
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


             $('#save-dette').click(function()
              {
                var designation_creance = '';

                var date_dette = $('#date-dette').val();
                var montant = $('#Montpaye').val();
                //var Apayer = $('#montant-dette').val();
                var id_cmp = $('#id_mpaie').val();
                var num_cmp = $('#num_cmp').val();
                var autr = $('#autre-tiers').val();
                var com = $('#commentaire').val();

                var autre_devise = $('#autre_devise').val();

                var idUE = '<?php echo $idUE; ?>';
                var getid = '<?php echo $getid; ?>';

                
                
                  
               $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/get_equivelent_devise.php',
                  data  : 'autre_devise=' + autre_devise,
                  success:function(data)
                  {
                    var equiv = data;
                    var montant_dette = montant / equiv;
                    //var resteApayer = Apayer - montant_dette; //A payer - montant payer 

                    
                    if(/^[0-9]+[.][0-9]+/.test(montant) || /^[0-9]+/.test(montant) || montant != '')
                    {
                      if(autr != '')
                      {
                        if(id_cmp != '')
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
                                            url   : 'fonction/saveDette.php',
                                            data  : 'date_dette=' + date_dette +
                                                    '&montant_dette=' + montant_dette + '&id_cmp=' + id_cmp + 
                                                    '&num_cmp=' + num_cmp +
                                                    '&autr=' + autr + '&com=' + com + '&equiv=' + equiv + 
                                                    '&idUE=' + idUE + '&getid=' + getid,
                                            success:function(data1) 
                                            {
                                              //alert(data1);
                                              affiche_dette();
                                              
                                              $('#new-dette').modal('hide');
                                              valid3('Dette enregistrée avec succès !');

                                              $('#autre_devise').removeClass('is-invalid');
                                              $('#id_mpaie').removeClass('is-invalid');
                                              $('#autre-tiers').removeClass('is-invalid');
                                              $('#num_cmp').removeClass('is-invalid');
                                              $('#Montpaye').removeClass('is-invalid');
                                              $('#designation_creance').removeClass('is-invalid');
                                              //$('#montant-dette').removeClass('is-invalid');

                                              $('#montant-dette').val('');
                                              $('#num_cmp').val('');
                                              $('#commentaire').val('');
                                              $('#Montpaye').val('');
                                              $('#designation_creance').val('');

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
                                else //le mode de paiement contient un numéro de compte
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
                                              url   : 'fonction/saveDette.php',
                                              data  : 'date_dette=' + date_dette +
                                                      '&montant_dette=' + montant_dette + '&id_cmp=' + id_cmp + 
                                                      '&num_cmp=' + num_cmp +
                                                      '&autr=' + autr + '&com=' + com + '&equiv=' + equiv + 
                                                      '&idUE=' + idUE + '&getid=' + getid,
                                              success:function(data1) 
                                              {
                                                //alert(data1);
                                                affiche_dette();
                                                
                                                $('#new-dette').modal('hide');
                                                valid3('Dette enregistrée avec succès !');

                                                $('#autre_devise').removeClass('is-invalid');
                                                $('#id_mpaie').removeClass('is-invalid');
                                                $('#autre-tiers').removeClass('is-invalid');
                                                $('#num_cmp').removeClass('is-invalid');
                                                $('#Montpaye').removeClass('is-invalid');
                                                $('#designation_creance').removeClass('is-invalid');
                                                //$('#montant-dette').removeClass('is-invalid');

                                                $('#montant-dette').val('');
                                                $('#num_cmp').val('');
                                                $('#commentaire').val('');
                                                $('#Montpaye').val('');
                                                $('#designation_creance').val('');
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
                                    err3('Veuillez saisir le numéro de compte du débiteur S.V.P !');
                                    $('#num_cmp').addClass('is-invalid');
                                  }
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
                        $('#autre-tiers').addClass('is-invalid');
                        err3('Veuillez sélectionner un débiteur S.V.P');
                      }
                    }
                    else
                    {
                      $('#Montpaye').addClass('is-invalid');
                      err3("Le montant de la dette que vous avez saisie n'est pas valide !");
                    }
                    
                  }
                });
                

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
