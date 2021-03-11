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
        

         <title>KEDIS Online! | Mes rapports</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 

                   // session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']))  //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; 
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


                      if($id_connexion == $get_id_connexion)
                      {
                        //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                        if($login_required == 1)
                        {

                          $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise
                          $nomUE = $_GET['nom_unite_exploitation']; //on recupère le nom de l'UE

                          setlocale(LC_TIME, 'fr_FR'); //serveur
                          //setlocale(LC_TIME, 'fra_fra'); //php 5 en local 

                          //on recupère la date debut du mois
                          $datedebut = date("d-m-Y", mktime(0,0,0,date("m"),1,date("Y")));
                          //on recupère la date fin du mois
                          $datefin = date("d-m-Y", mktime(0,0,0,date("m")+1,0,date("Y")));

                          $date = date("Y-m-d");
                          $heure = date("H:i");

                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production


                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];


                     
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
                                    <h1>Mes rapports</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Mes rapports</a></li>
                                        <li class="active">Mes rapports</li>
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
                  <div class="card-body">

                    <div class="row">
                      <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Vente</a>
                              <!--<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Caisse</a>-->
                              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-achat" role="tab" aria-controls="v-pills-messages" aria-selected="false">Achat</a>
                              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-devis" role="tab" aria-controls="v-pills-settings" aria-selected="false">Devis</a>
                              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-commande" role="tab" aria-controls="v-pills-settings" aria-selected="false">Commande</a>
                              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-depense" role="tab" aria-controls="v-pills-settings" aria-selected="false">Dépense</a>
                              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-creance" role="tab" aria-controls="v-pills-settings" aria-selected="false">Créance</a>
                              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-dette" role="tab" aria-controls="v-pills-settings" aria-selected="false">Dette</a>
                            </div>
                      </div>
                      <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">

                          <!--Début tab-vente-->
                          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="card border">
                              <div class="card-body">

                                <?php

                                    setlocale(LC_TIME, 'fr_FR'); //serveur
                                    $date = date("Y-m-d");
                                    $heure = date("H:i");

                                ?>

                                <div class="row">
                                  <div class="col-md-4">
                                    <label for="date-debut"><h6>De</h6></label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                      </div>
                                      <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-debut" value="<?php echo $date; ?>">
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="date-fin"><h6>A</h6></label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                      </div>
                                      <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-fin" value="<?php echo $date; ?>">
                                      </div>
                                  </div>

                                  <div class="col-md-4">
                                    <label for="type-vente"><h6>Type de vente</h6></label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/refresh.png"></span>
                                      </div>
                                      <select class="custom-select" id="type-vente">
                                        <option selected value="">Toutes</option>
                                        <option value="caisse">Caisse</option>
                                        <option value="principale">Principale</option>
                                      </select>
                                    </div>
                                  </div>

                                </div>

                                <br>

                                <div class="row">
                                  <div class="col-md-4">
                                    <label for="user"><h6>Gestionnaire</h6></label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                      </div>
                                      <?php
                                      //on récupère les gestionnaires
                                          $get_gestionnaire = $bdd->prepare('SELECT * FROM  user, gestion WHERE id_E = ? AND id_cl = id_user');
                                          $get_gestionnaire->execute(array($idE));
                                      ?>
                                      <select class="custom-select" id="user">
                                        <option selected value="">Tous</option>
                                        <?php
                                          while($user = $get_gestionnaire->fetch())
                                          {
                                        ?>
                                          <option value="<?php echo $user['id_cl']; ?>"><?php echo $user['prenom_cl'].' '.$user['nom_cl']; ?></option>
                                        <?php
                                          }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="client"><h6>Client</h6></label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                      </div>
                                      <?php
                                      //on récupère les clients
                                          $get_client = $bdd->prepare('SELECT * FROM  client_for_user WHERE id_UE_cli = ?');
                                          $get_client->execute(array($idUE));
                                      ?>
                                      <select class="custom-select" id="client">
                                        <option selected value="">Tous</option>
                                        <?php
                                          while($client = $get_client->fetch())
                                          {
                                        ?>
                                          <option value="<?php echo $client['id_cli']; ?>"><?php echo $client['prenom_cli'].' '.$client['nom_cli']; ?></option>
                                        <?php
                                          }
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="vente"><h6>Vente effectuée en</h6></label>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/cash.png"></span>
                                      </div>
                                      <select class="custom-select" id="vente">
                                        <option selected value="">Toutes</option>
                                        <option value="partie">Partie</option>
                                        <option value="total">Totalité</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>

                                <br>

                                <button type="button" class="btn btn-success" id="generer-vente">Générer</button>
                              </div>
                            </div>
                          </div>
                          <!--Fin tab-vente-->

                          <!--Début tab-achat-->
                          <div class="tab-pane fade" id="v-pills-achat" role="tabpanel" aria-labelledby="">
                            
                            <div class="card border">
                                <div class="card-body">
                                  <div class="row">
                                    
                                    <div class="col-md-4">
                                      <label for="date-debut-a"><h6>De</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-debut-a" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="date-fin-a"><h6>A</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-fin-a" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="user-a"><h6>Gestionnaire</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                        </div>
                                        <?php
                                        //on récupère les gestionnaires
                                            $get_gestionnaire = $bdd->prepare('SELECT * FROM  user, gestion WHERE id_E = ? AND id_cl = id_user');
                                            $get_gestionnaire->execute(array($idE));
                                        ?>
                                        <select class="custom-select" id="user-a">
                                          <option selected value="">Tous</option>
                                          <?php
                                            while($user = $get_gestionnaire->fetch())
                                            {
                                          ?>
                                            <option value="<?php echo $user['id_cl']; ?>"><?php echo $user['prenom_cl'].' '.$user['nom_cl']; ?></option>
                                          <?php
                                            }
                                          ?>
                                        </select>
                                      </div>

                                    </div>

                                    <br>




                                  </div>

                                  <br>

                                  <div class="row">
                                      
                                      <div class="col-md-4">
                                        <label for="four"><h6>Fournisseur</h6></label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                          </div>
                                          <?php
                                          //on récupère les clients
                                              $get_client = $bdd->prepare('SELECT * FROM fournis_for_user WHERE idUE_four = ?');
                                              $get_client->execute(array($idUE));
                                          ?>
                                          <select class="custom-select" id="four">
                                            <option selected value="">Tous</option>
                                            <?php
                                              while($client = $get_client->fetch())
                                              {
                                            ?>
                                              <option value="<?php echo $client['id_four']; ?>"><?php echo $client['societe_four'].' ('.$client['prenom_four'].' '.$client['nom_four'].')'; ?></option>
                                            <?php
                                              }
                                            ?>
                                          </select>
                                        </div>
                                        
                                      </div>

                                      <div class="col-md-4">
                                        <label for="achat"><h6>Achat effectué en</h6></label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/cash.png"></span>
                                          </div>
                                          <select class="custom-select" id="achat">
                                            <option selected value="">Tous</option>
                                            <option value="partie">Partie</option>
                                            <option value="total">Totalité</option>
                                          </select>
                                        </div>
                                      </div>
                                  </div>

                                  <br>

                                  <button type="button" class="btn btn-success" id="generer-achat">Générer</button>

                                </div>
                            </div>

                          </div>
                          <!--Fin tab-vente-->

                          <!--Début tab-devis-->
                          <div class="tab-pane fade" id="v-pills-devis" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            
                            <div class="card border">
                                <div class="card-body">
                                  <div class="row">
                                    
                                    <div class="col-md-4">
                                      <label for="date-debut-d"><h6>De</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-debut-d" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="date-fin-d"><h6>A</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-fin-d" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="user-d"><h6>Gestionnaire</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                        </div>
                                        <?php
                                        //on récupère les gestionnaires
                                            $get_gestionnaire = $bdd->prepare('SELECT * FROM  user, gestion WHERE id_E = ? AND id_cl = id_user');
                                            $get_gestionnaire->execute(array($idE));
                                        ?>
                                        <select class="custom-select" id="user-d">
                                          <option selected value="">Tous</option>
                                          <?php
                                            while($user = $get_gestionnaire->fetch())
                                            {
                                          ?>
                                            <option value="<?php echo $user['id_cl']; ?>"><?php echo $user['prenom_cl'].' '.$user['nom_cl']; ?></option>
                                          <?php
                                            }
                                          ?>
                                        </select>
                                      </div>

                                    </div>

                                    <br>




                                  </div>

                                  <br>

                                  <div class="row">
                                      
                                      <div class="col-md-4">
                                        <label for="client-d"><h6>Client</h6></label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                          </div>
                                          <?php
                                          //on récupère les clients
                                              $get_client = $bdd->prepare('SELECT * FROM client_for_user WHERE id_UE_cli = ?');
                                              $get_client->execute(array($idUE));
                                          ?>
                                          <select class="custom-select" id="client-d">
                                            <option selected value="">Tous</option>
                                            <?php
                                              while($client = $get_client->fetch())
                                              {
                                            ?>
                                              <option value="<?php echo $client['id_cli']; ?>"><?php echo $client['prenom_cli'].' '.$client['nom_cli']; ?></option>
                                            <?php
                                              }
                                            ?>
                                          </select>
                                        </div>
                                        
                                      </div>

                                      <div class="col-md-4">
                                        <label for="devis"><h6>Devis déjà payé en</h6></label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/cash.png"></span>
                                          </div>
                                          <select class="custom-select" id="devis">
                                            <option selected value="">Tous</option>
                                            <option value="partie">Partie</option>
                                            <option value="total">Totalité</option>
                                          </select>
                                        </div>
                                      </div>
                                  </div>

                                  <br>

                                  <button type="button" class="btn btn-success" id="generer-devis">Générer</button>

                                </div>
                            </div>
                          </div>
                          <!--Fin tab-devis-->

                          <!--Début tab-commande-->
                          <div class="tab-pane fade" id="v-pills-commande" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            
                            
                            <div class="card border">
                                <div class="card-body">
                                  <div class="row">
                                    
                                    <div class="col-md-4">
                                      <label for="date-debut-cmd"><h6>De</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-debut-cmd" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="date-fin-cmd"><h6>A</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-fin-cmd" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="user-cmd"><h6>Gestionnaire</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                        </div>
                                        <?php
                                        //on récupère les gestionnaires
                                            $get_gestionnaire = $bdd->prepare('SELECT * FROM  user, gestion WHERE id_E = ? AND id_cl = id_user');
                                            $get_gestionnaire->execute(array($idE));
                                        ?>
                                        <select class="custom-select" id="user-cmd">
                                          <option selected value="">Tous</option>
                                          <?php
                                            while($user = $get_gestionnaire->fetch())
                                            {
                                          ?>
                                            <option value="<?php echo $user['id_cl']; ?>"><?php echo $user['prenom_cl'].' '.$user['nom_cl']; ?></option>
                                          <?php
                                            }
                                          ?>
                                        </select>
                                      </div>

                                    </div>

                                    <br>




                                  </div>

                                  <br>

                                  <div class="row">
                                      
                                      <div class="col-md-4">
                                        <label for="four-cmd"><h6>Fournisseur</h6></label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                          </div>
                                          <?php
                                          //on récupère les clients
                                              $get_client = $bdd->prepare('SELECT * FROM fournis_for_user WHERE idUE_four = ?');
                                              $get_client->execute(array($idUE));
                                          ?>
                                          <select class="custom-select" id="four-cmd">
                                            <option selected value="">Tous</option>
                                            <?php
                                              while($client = $get_client->fetch())
                                              {
                                            ?>
                                              <option value="<?php echo $client['id_four']; ?>"><?php echo $client['societe_four'].' ('.$client['prenom_four'].' '.$client['nom_four'].')'; ?></option>
                                            <?php
                                              }
                                            ?>
                                          </select>
                                        </div>
                                        
                                      </div>
                                  </div>

                                  <br>

                                  <button type="button" class="btn btn-success" id="generer-commande">Générer</button>

                                </div>
                            </div>
                          </div>
                          <!--Fin tab-commande-->

                          <!--Début tab-depense-->
                          <div class="tab-pane fade" id="v-pills-depense" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            
                            <div class="card border">
                                <div class="card-body">
                                  <div class="row">
                                    
                                    <div class="col-md-4">
                                      <label for="date-debut-dep"><h6>De</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-debut-dep" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="date-fin-dep"><h6>A</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-fin-dep" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="user-dep"><h6>Gestionnaire</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                        </div>
                                        <?php
                                        //on récupère les gestionnaires
                                            $get_gestionnaire = $bdd->prepare('SELECT * FROM  user, gestion WHERE id_E = ? AND id_cl = id_user');
                                            $get_gestionnaire->execute(array($idE));
                                        ?>
                                        <select class="custom-select" id="user-dep">
                                          <option selected value="">Tous</option>
                                          <?php
                                            while($user = $get_gestionnaire->fetch())
                                            {
                                          ?>
                                            <option value="<?php echo $user['id_cl']; ?>"><?php echo $user['prenom_cl'].' '.$user['nom_cl']; ?></option>
                                          <?php
                                            }
                                          ?>
                                        </select>
                                      </div>

                                    </div>

                                    <br>




                                  </div>

                                  <br>

                                  <div class="row">
                                      
                                      <div class="col-md-4">
                                        <label for="benefi"><h6>Bénéficiaire</h6></label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                          </div>
                                          <?php
                                          //on récupère les clients
                                              $get_autr = $bdd->prepare('SELECT * FROM autres_tiers WHERE idUE_tr = ? AND default_tr != 1');
                                              $get_autr->execute(array($idUE));  
                                              //$fetch_tr = $get_autr->fetch();

                                              $get_four = $bdd->prepare('SELECT * FROM fournis_for_user WHERE idUE_four = ? AND default_four != 1');
                                              $get_four->execute(array($idUE));
                                              //$fetch_four = $get_four->fetch();
                                          ?>
                                          <select class="custom-select" id="benefi">
                                            <option selected value="">Tous</option>
                                            <option class="bg-secondary text-white" value="tiers">Tous les autres tiers</option>

                                            <?php

                                                while($row = $get_autr->fetch())
                                                {
                                                  
                                            ?>
                                                <option value="<?php echo $row['id_tr']; ?>"><?php echo $row['prenom_tr'].' '.$row['nom_tr'].' ('.$row['societe_tr'].')'; ?></option>
                                            <?php
                                                  
                                                }

                                            ?>

                                            <option class="bg-secondary text-white" value="four">Tous les fournisseurs</option>

                                            <?php

                                                while($row1 = $get_four->fetch())
                                                {
                                                  
                                            ?>
                                                <option value="<?php echo $row1['id_four']; ?>"><?php echo $row1['societe_four'].' ('.$row1['prenom_four'].' '.$row1['nom_four'].')'; ?></option>
                                            <?php
                                                }
                                                
                                            ?>
                                          </select>
                                        </div>
                                        
                                      </div>

                                      <div class="col-md-4">
                                        <label for="dep"><h6>Dépense payé en</h6></label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/cash.png"></span>
                                          </div>
                                          <select class="custom-select" id="dep">
                                            <option selected value="">Tous</option>
                                            <option value="partie">Partie</option>
                                            <option value="total">Totalité</option>
                                          </select>
                                        </div>
                                      </div>
                                  </div>

                                  <br>

                                  <button type="button" class="btn btn-success" id="generer-depense">Générer</button>

                                </div>
                            </div>

                          </div>
                          <!--Fin tab-depense-->

                          <!--Début tab-creance-->
                          <div class="tab-pane fade" id="v-pills-creance" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            
                            <div class="card border">
                                <div class="card-body">
                                  <div class="row">
                                    
                                    <div class="col-md-4">
                                      <label for="date-debut-cre"><h6>De</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-debut-cre" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="date-fin-cre"><h6>A</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-fin-cre" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="user-cre"><h6>Gestionnaire</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                        </div>
                                        <?php
                                        //on récupère les gestionnaires
                                            $get_gestionnaire = $bdd->prepare('SELECT * FROM  user, gestion WHERE id_E = ? AND id_cl = id_user');
                                            $get_gestionnaire->execute(array($idE));
                                        ?>
                                        <select class="custom-select" id="user-cre">
                                          <option selected value="">Tous</option>
                                          <?php
                                            while($user = $get_gestionnaire->fetch())
                                            {
                                          ?>
                                            <option value="<?php echo $user['id_cl']; ?>"><?php echo $user['prenom_cl'].' '.$user['nom_cl']; ?></option>
                                          <?php
                                            }
                                          ?>
                                        </select>
                                      </div>

                                    </div>

                                    <br>




                                  </div>

                                  <br>

                                  <div class="row">
                                      
                                      <div class="col-md-4">
                                        <label for="creancier"><h6>Créancier</h6></label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                          </div>
                                          <?php
                                          //on récupère les clients
                                              $get_autr = $bdd->prepare('SELECT * FROM autres_tiers WHERE idUE_tr = ? AND default_tr != 1 ');
                                              $get_autr->execute(array($idUE));  
                                              //$fetch_tr = $get_autr->fetch();

                                          ?>
                                          <select class="custom-select" id="creancier">
                                            <option selected value="">Tous</option>

                                            <?php

                                                while($row = $get_autr->fetch())
                                                {
                                                  
                                            ?>
                                                <option value="<?php echo $row['id_tr']; ?>"><?php echo $row['prenom_tr'].' '.$row['nom_tr'].' ('.$row['societe_tr'].')'; ?></option>
                                            <?php
                                                  
                                                }

                                            ?>

                                           
                                          </select>
                                        </div>
                                        
                                      </div>

                                      <div class="col-md-4">
                                        <label for="cre"><h6>Créance encaissé en</h6></label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/cash.png"></span>
                                          </div>
                                          <select class="custom-select" id="cre">
                                            <option selected value="">Tous</option>
                                            <option value="partie">Partie</option>
                                            <option value="total">Totalité</option>
                                          </select>
                                        </div>
                                      </div>
                                  </div>

                                  <br>

                                  <button type="button" class="btn btn-success" id="generer-creance">Générer</button>

                                </div>
                            </div>

                          </div>
                          <!--Fin tab-creance-->

                          <!--Début tab-dette-->
                          <div class="tab-pane fade" id="v-pills-dette" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            
                            <div class="card border">
                                <div class="card-body">
                                  <div class="row">
                                    
                                    <div class="col-md-4">
                                      <label for="date-debut-det"><h6>De</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-debut-det" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="date-fin-det"><h6>A</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                        </div>
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date-fin-det" value="<?php echo $date; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                      <label for="user-det"><h6>Gestionnaire</h6></label>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                        </div>
                                        <?php
                                        //on récupère les gestionnaires
                                            $get_gestionnaire = $bdd->prepare('SELECT * FROM  user, gestion WHERE id_E = ? AND id_cl = id_user');
                                            $get_gestionnaire->execute(array($idE));
                                        ?>
                                        <select class="custom-select" id="user-det">
                                          <option selected value="">Tous</option>
                                          <?php
                                            while($user = $get_gestionnaire->fetch())
                                            {
                                          ?>
                                            <option value="<?php echo $user['id_cl']; ?>"><?php echo $user['prenom_cl'].' '.$user['nom_cl']; ?></option>
                                          <?php
                                            }
                                          ?>
                                        </select>
                                      </div>

                                    </div>

                                    <br>




                                  </div>

                                  <br>

                                  <div class="row">
                                      
                                      <div class="col-md-4">
                                        <label for="debiteur"><h6>Débiteur</h6></label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                          </div>
                                          <?php
                                          //on récupère les clients
                                              $get_autr = $bdd->prepare('SELECT * FROM autres_tiers WHERE idUE_tr = ? AND default_tr != 1 ');
                                              $get_autr->execute(array($idUE));  
                                              //$fetch_tr = $get_autr->fetch();

                                          ?>
                                          <select class="custom-select" id="debiteur">
                                            <option selected value="">Tous</option>

                                            <?php

                                                while($row = $get_autr->fetch())
                                                {
                                                  
                                            ?>
                                                <option value="<?php echo $row['id_tr']; ?>"><?php echo $row['prenom_tr'].' '.$row['nom_tr'].' ('.$row['societe_tr'].')'; ?></option>
                                            <?php
                                                  
                                                }

                                            ?>

                                           
                                          </select>
                                        </div>
                                        
                                      </div>

                                      <div class="col-md-4">
                                        <label for="det"><h6>Dette à remboursée en</h6></label>
                                        <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/cash.png"></span>
                                          </div>
                                          <select class="custom-select" id="det">
                                            <option selected value="">Tous</option>
                                            <option value="partie">Partie</option>
                                            <option value="total">Totalité</option>
                                          </select>
                                        </div>
                                      </div>
                                  </div>

                                  <br>

                                  <button type="button" class="btn btn-success" id="generer-dette">Générer</button>

                                </div>
                            </div>

                          </div>
                          <!--Fin tab-dette-->


                        </div>
                      </div>
                    </div>

                  </div>   
                </div>

                <div class="card">
                  <div class="card-header">Aperçu</div>
                  <div class="card-body" id="apercu">
                    <div class="p-3 mb-2 bg-light text-muted text-center border">
                      A l'attente d'une requête
                    </div>
                  </div>
                </div>
              </div>
              <!-- Animated -->

            </div>


                


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

          <script src="assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
          <script src="assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
          <script src="assets/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
          <script src="assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
          <script src="assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
          <script src="assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
          <script src="assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

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
            $('.rapport').addClass('active');

            //générer une requête de la vente 
            $('#generer-vente').click(function()
              {
                var date_debut = $('#date-debut').val();
                var jour_debut = parseJour(date_debut);
                var mois_debut = parseMois(date_debut);
                var annee_debut = parseAnnee(date_debut);
                
                var date_fin = $('#date-fin').val();
                var jour_fin = parseJour(date_fin);
                var mois_fin = parseMois(date_fin);
                var annee_fin = parseAnnee(date_fin);

                var type_vente = $('#type-vente').val();
                var user = $('#user').val();
                var client = $('#client').val();
                var vente = $('#vente').val();
                var idUE = '<?php echo $idUE; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/get_rapport_vente.php', 
                    data  : 'date_debut=' + date_debut + '&jour_debut' + '&mois_debut=' + mois_debut + '&annee_debut=' + annee_debut + 
                            '&date_fin=' + date_fin + '&jour_fin=' + jour_fin + '&mois_fin=' + mois_fin + '&annee_fin=' + annee_fin + 
                            '&type_vente=' + type_vente + '&user=' + user + '&client=' + client + '&vente=' + vente + '&idUE=' + idUE + 
                            '&devise=' + devise,
                    success:function(data)
                    {
                      $('#apercu').html(data);
                    }
                  });



              });

            //générer achat 
            $('#generer-achat').click(function()
              {
                var date_debut = $('#date-debut-a').val();
                var jour_debut = parseJour(date_debut);
                var mois_debut = parseMois(date_debut);
                var annee_debut = parseAnnee(date_debut);
                
                var date_fin = $('#date-fin-a').val();
                var jour_fin = parseJour(date_fin);
                var mois_fin = parseMois(date_fin);
                var annee_fin = parseAnnee(date_fin);

                //var type_vente = $('#type-achat').val();
                var user = $('#user-a').val();
                var four = $('#four').val();
                var achat = $('#achat').val();
                var idUE = '<?php echo $idUE; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/get_rapport_achat.php', 
                    data  : 'date_debut=' + date_debut + '&jour_debut' + '&mois_debut=' + mois_debut + '&annee_debut=' + annee_debut + 
                            '&date_fin=' + date_fin + '&jour_fin=' + jour_fin + '&mois_fin=' + mois_fin + '&annee_fin=' + annee_fin + 
                            '&user=' + user + '&four=' + four + '&achat=' + achat + '&idUE=' + idUE + 
                            '&devise=' + devise,
                    success:function(data)
                    {
                      $('#apercu').html(data);
                    }
                  });
              });


            //générer devis
            $('#generer-devis').click(function()
              {
                var date_debut = $('#date-debut-d').val();
                var jour_debut = parseJour(date_debut);
                var mois_debut = parseMois(date_debut);
                var annee_debut = parseAnnee(date_debut);
                
                var date_fin = $('#date-fin-d').val();
                var jour_fin = parseJour(date_fin);
                var mois_fin = parseMois(date_fin);
                var annee_fin = parseAnnee(date_fin);

                //var type_vente = $('#type-vente').val();
                var user = $('#user-d').val();
                var client = $('#client-d').val();
                var devis = $('#devis').val();
                var idUE = '<?php echo $idUE; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/get_rapport_devis.php', 
                    data  : 'date_debut=' + date_debut + '&jour_debut' + '&mois_debut=' + mois_debut + '&annee_debut=' + annee_debut + 
                            '&date_fin=' + date_fin + '&jour_fin=' + jour_fin + '&mois_fin=' + mois_fin + '&annee_fin=' + annee_fin + 
                            '&user=' + user + '&client=' + client + '&devis=' + devis + '&idUE=' + idUE + 
                            '&devise=' + devise,
                    success:function(data)
                    {
                      $('#apercu').html(data);
                    }
                  });



              });


             //générer commande 
            $('#generer-commande').click(function()
              {
                var date_debut = $('#date-debut-cmd').val();
                var jour_debut = parseJour(date_debut);
                var mois_debut = parseMois(date_debut);
                var annee_debut = parseAnnee(date_debut);
                
                var date_fin = $('#date-fin-cmd').val();
                var jour_fin = parseJour(date_fin);
                var mois_fin = parseMois(date_fin);
                var annee_fin = parseAnnee(date_fin);

                //var type_vente = $('#type-achat').val();
                var user = $('#user-cmd').val();
                var four = $('#four-cmd').val();
                //var achat = $('#achat').val();
                var idUE = '<?php echo $idUE; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/get_rapport_commande.php', 
                    data  : 'date_debut=' + date_debut + '&jour_debut' + '&mois_debut=' + mois_debut + '&annee_debut=' + annee_debut + 
                            '&date_fin=' + date_fin + '&jour_fin=' + jour_fin + '&mois_fin=' + mois_fin + '&annee_fin=' + annee_fin + 
                            '&user=' + user + '&four=' + four + '&idUE=' + idUE + 
                            '&devise=' + devise,
                    success:function(data)
                    {
                      $('#apercu').html(data);
                    }
                  });
              });

            //générer dépense
            $('#generer-depense').click(function()
              {
                var date_debut = $('#date-debut-dep').val();
                var jour_debut = parseJour(date_debut);
                var mois_debut = parseMois(date_debut);
                var annee_debut = parseAnnee(date_debut);
                
                var date_fin = $('#date-fin-dep').val();
                var jour_fin = parseJour(date_fin);
                var mois_fin = parseMois(date_fin);
                var annee_fin = parseAnnee(date_fin);

                //var type_vente = $('#type-achat').val();
                var user = $('#user-dep').val();
                var benefi = $('#benefi').val();
                var dep = $('#dep').val();
                var idUE = '<?php echo $idUE; ?>';
                var devise = '<?php echo $devise; ?>'; 

                $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/get_rapport_depense.php', 
                    data  : 'date_debut=' + date_debut + '&jour_debut' + '&mois_debut=' + mois_debut + '&annee_debut=' + annee_debut + 
                            '&date_fin=' + date_fin + '&jour_fin=' + jour_fin + '&mois_fin=' + mois_fin + '&annee_fin=' + annee_fin + 
                            '&user=' + user + '&benefi=' + benefi + '&dep=' + dep + '&idUE=' + idUE + 
                            '&devise=' + devise,
                    success:function(data)
                    {
                      $('#apercu').html(data);
                    }
                  });

              });

            //générer créance
            $('#generer-creance').click(function()
              {
                var date_debut = $('#date-debut-cre').val();
                var jour_debut = parseJour(date_debut);
                var mois_debut = parseMois(date_debut);
                var annee_debut = parseAnnee(date_debut);
                
                var date_fin = $('#date-fin-cre').val();
                var jour_fin = parseJour(date_fin);
                var mois_fin = parseMois(date_fin);
                var annee_fin = parseAnnee(date_fin);

                //var type_vente = $('#type-achat').val();
                var user = $('#user-cre').val();
                var creancier = $('#creancier').val();
                var cre = $('#cre').val();
                var idUE = '<?php echo $idUE; ?>';
                var devise = '<?php echo $devise; ?>'; 

                $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/get_rapport_creance.php', 
                    data  : 'date_debut=' + date_debut + '&jour_debut' + '&mois_debut=' + mois_debut + '&annee_debut=' + annee_debut + 
                            '&date_fin=' + date_fin + '&jour_fin=' + jour_fin + '&mois_fin=' + mois_fin + '&annee_fin=' + annee_fin + 
                            '&user=' + user + '&creancier=' + creancier + '&cre=' + cre + '&idUE=' + idUE + 
                            '&devise=' + devise,
                    success:function(data)
                    {
                      $('#apercu').html(data);
                    }
                  });

              });

            //générer dette
            $('#generer-dette').click(function()
              {
                var date_debut = $('#date-debut-det').val();
                var jour_debut = parseJour(date_debut);
                var mois_debut = parseMois(date_debut);
                var annee_debut = parseAnnee(date_debut);
                
                var date_fin = $('#date-fin-det').val();
                var jour_fin = parseJour(date_fin);
                var mois_fin = parseMois(date_fin);
                var annee_fin = parseAnnee(date_fin);

                //var type_vente = $('#type-achat').val();
                var user = $('#user-det').val();
                var debiteur = $('#debiteur').val();
                var det = $('#det').val();
                var idUE = '<?php echo $idUE; ?>';
                var devise = '<?php echo $devise; ?>'; 

                $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/get_rapport_dette.php', 
                    data  : 'date_debut=' + date_debut + '&jour_debut' + '&mois_debut=' + mois_debut + '&annee_debut=' + annee_debut + 
                            '&date_fin=' + date_fin + '&jour_fin=' + jour_fin + '&mois_fin=' + mois_fin + '&annee_fin=' + annee_fin + 
                            '&user=' + user + '&debiteur=' + debiteur + '&det=' + det + '&idUE=' + idUE + 
                            '&devise=' + devise,
                    success:function(data)
                    {
                      $('#apercu').html(data);
                    }
                  });

              });

            //on recupère l'année
            function parseAnnee(input)
            {
              var vals= input.split('-');

              var year = vals[0];
              var month = vals[1];
              var day = vals[2];

              return year;
            }

            //on recupère le mois
            function parseMois(input)
            {
              var vals= input.split('-');

              var year = vals[0];
              var month = vals[1];
              var day = vals[2];

              return month;
            }

            //on recupère le jour
            function parseJour(input)
            {
              var vals= input.split('-');

              var year = vals[0];
              var month = vals[1];
              var day = vals[2];

              return day;
            }

            


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
