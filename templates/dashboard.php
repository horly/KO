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


        <!--Mon modal personnel-->
        <link rel="stylesheet" type="text/css" href="assets/css/modal.mata.css">

        <!--loader-->
        <link rel="stylesheet" type="text/css" href="assets/css/loader.css">

  

    <style type="text/css">
     


      .badge-maroon {
      color: #fff;
      background-color: #800000;
    }

    .text-maroon
    {
      color: #800000;
    }


      section {
        position: relative;
        padding-top: 37px;
         border: 1px solid lightgray;
        background: #17a2b8;
      }
      section.positioned {
        position: absolute;
        top:100px;
        left:100px;
        width:800px;
        box-shadow: 0 0 15px #333;
      }
      .container-tab {
        overflow-y: auto;
        background-color: white;
      }

      .container-tab2
      {
        overflow-y: auto;
        height: 355px;
        background-color: white;
        border: 1px solid lightgray;
      }
      table {
        border-spacing: 0;
        width:100%;
      }

      /*td + td {
        border-left:1px solid lightgray;
      }*/
      td, th {
        /*border-bottom:1px solid lightgray;*/
        /*background:  #d1ecf1;*/
        padding: 10px 25px;
      }
      tr:nth-child(even) {background-color: #d1ecf1;}
      tr:hover{ background-color: #F1F1F1;  }
      th {
        height: 0;
        line-height: 0;
        padding-top: 0;
        padding-bottom: 0;
        color: transparent;
        border: none;
        white-space: nowrap;
      }
      th div{
        position: absolute;
        background: transparent;
        color: #fff;
        padding: 9px 25px;
        top: 0;
        margin-left: -25px;
        line-height: normal;
        /*border-left: 1px solid lightgray;*/
      }
      th:first-child div{
        border: none;
      }

      .dashboard
      {
        background-color: #d1ecf1;
      }

      .label_view
      {
        size: 10px;
      }

      .card_article
      {
        height: 150px;
       /*white-space: pre-line; /*pour le saut en ligne du texte du bouton*/
       border-radius: 50px;
      }

       .btn-orange
      {
        background-color: #CD853F;
      }

      .text-orange
      {
        color:#CD853F;
      }

      .btn-orange:hover
      {
        background-color: #D2691E;
      }

      .btn-violet
      {
        background-color: #BA55D3;
      }

      .text-violet
      {
        color:#BA55D3;
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

      .btn-raccourci
      {
        height: 180px;
        box-shadow: 0px 0px 20px #aaaaaa;
        border-radius: 20px;
      }

      .viewtva-depense
      {
        display: none;
      }


      

    </style>
        

        <title>KEDIS Online! | Tableau de bord</title>
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
                      $id_abonne = $userfos['id_abonnement'];


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



                          //on récupère d'abord le type d'abonnement du client 
                          $get_abonnement = $bdd->prepare("SELECT * FROM abonnement WHERE id = ? ");
                          $get_abonnement->execute(array($id_abonne));

                          $info_abonne = $get_abonnement->fetch();
                          $type_abonne = $info_abonne['type'];

                          
                          //cette page contient les données du graphes en php
                          include('graphe_evolution.php');
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
                

         <!--*****************************************************-->
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
                                    <h1>Tableau de bord</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                      <?php

                                          $get_UE = $bdd->prepare("SELECT * FROM uniteexploit WHERE idEnt = ? AND idUE != ?");
                                          $get_UE->execute(array($idE, $idUE));

                                          $getid = $_GET['id']; 
                                          $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
                                          $requser->execute(array($getid));
                                          $userfos = $requser->fetch();

                                          //on vérifie si l'utilisteur est admin ou pas 
                                          if($userfos['statut'] == 'admin')
                                          {

                                            $getidE = $bdd->prepare("SELECT * FROM entreprise WHERE idE = ?");
                                            $getidE->execute(array($idE));

                                            $fetchE = $getidE->fetch();
                                            $entre_unique = $fetchE['entre_unique'];

                                            if($entre_unique != 1)
                                            {
                                        ?>
                                            <a class="btn btn-sm btn-outline-primary" href="unitexpl.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $idE; ?>&nom_entreprise=<?php echo $nomE; ?>" role="button" title="Cliquer ici pour retourner à l'entreprise"><?php echo $nomE; ?></a>
                                            &nbsp;&nbsp;
                                          <?php
                                            }
                                            else
                                            {
                                          ?>
                                            <a class="btn btn-sm btn-outline-primary" href="#" role="button" ><?php echo $nomE; ?></a>
                                            &nbsp;&nbsp;
                                          <?php
                                            }
                                            if($entre_unique != 1)
                                            {
                                          ?>
                                            <div class="dropdown">
                                              <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo $nomUE; ?>
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#"><?php echo $nomUE; ?></a>
                                                <div class="dropdown-divider"></div>
                                                <?php
                                                  while($row = $get_UE->fetch())
                                                  {
                                                ?>
                                                  <a class="dropdown-item" href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $row['idUE']; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $row['nomUE']; ?>"><?php echo $row['nomUE']; ?></a>
                                                  <div class="dropdown-divider"></div>
                                                <?php
                                                  }
                                                ?>
                                              </div>
                                            </div>
                                             &nbsp;&nbsp;
                                        <?php
                                            }
                                          }
                                          else
                                          {
                                            //on récupère l'id de l'entreprise dans gestion
                                            $get_gestion = $bdd->prepare('SELECT * FROM gestion WHERE id_user = ?');
                                            $get_gestion->execute(array($getid));
                                            $fetch_gestion = $get_gestion->fetch();
                                            $idE = $fetch_gestion['id_E'];

                                            //on recupère l'entreprise dans entreprise
                                            $get_entreprise = $bdd->prepare('SELECT * FROM entreprise WHERE idE = ?');
                                            $get_entreprise->execute(array($idE));
                                            $fetch_entreprise = $get_entreprise->fetch();
                                            $nom_E = $fetch_entreprise['nomE'];

                                            //on vérifie maintenant les autorisations 
                                            $get_autoris = $bdd->prepare('SELECT * FROM autorisation WHERE id_user = ?');
                                            $get_autoris->execute(array($getid));
                                            $fetch_autoris = $get_autoris->fetch();
                                            
                                            if($fetch_autoris['all_entreprise'] == 0)
                                            {

                                              $getidE = $bdd->prepare("SELECT * FROM entreprise WHERE idE = ?");
                                              $getidE->execute(array($idE));

                                              $fetchE = $getidE->fetch();
                                              $entre_unique = $fetchE['entre_unique'];

                                              if($entre_unique != 1)
                                              {
                                          ?>
                                            <a class="btn btn-sm btn-outline-primary" href="unitexpl.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $idE; ?>&nom_entreprise=<?php echo $nom_E; ?>" role="button" title="Cliquer ici pour retourner à l'entreprise"><?php echo $nomE; ?></a>
                                            &nbsp;&nbsp;
                                            <?php
                                              }
                                              else
                                              {
                                            ?>
                                              <a class="btn btn-sm btn-outline-primary" href="#" role="button" ><?php echo $nomE; ?></a>
                                            &nbsp;&nbsp;

                                            <?php
                                              }
                                              if($entre_unique != 1)
                                              {
                                            ?>

                                            <div class="dropdown">
                                              <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo $nomUE; ?>
                                              </button>
                                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#"><?php echo $nomUE; ?></a>
                                                <div class="dropdown-divider"></div>
                                                <?php
                                                  while($row = $get_UE->fetch())
                                                  {
                                                ?>
                                                  <a class="dropdown-item" href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $row['idUE']; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $row['nomUE']; ?>"><?php echo $row['nomUE']; ?></a>
                                                  <div class="dropdown-divider"></div>
                                                <?php
                                                  }
                                                ?>
                                              </div>
                                            </div>
                                             &nbsp;&nbsp;
                                            
                                        <?php
                                              }
                                            }
                                            else
                                            {

                                        ?>
                                            <a class="btn btn-sm btn-outline-primary" href="#" role="button"><?php echo $nomE; ?></a>
                                            &nbsp;&nbsp;
                                            <?php

                                              $getidE = $bdd->prepare("SELECT * FROM entreprise WHERE idE = ?");
                                              $getidE->execute(array($idE));

                                              $fetchE = $getidE->fetch();
                                              $entre_unique = $fetchE['entre_unique'];

                                              if($entre_unique != 1)
                                              {

                                            ?>
                                              <button class="btn btn-sm btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php echo $nomUE; ?>
                                              </button>
                                             &nbsp;&nbsp;
                                        <?php
                                              }
                                            }
                                          }
                                        ?>

                                        
                                          <div class="btn-group mr-2">
                                            <button class="btn btn-sm btn-secondary">Du : <?php echo $datedebut; ?></button>
                                            <button class="btn btn-sm btn-secondary">Au : <?php echo $datefin; ?></button>
                                          </div>
                                        
                                          <button class="btn btn-sm btn-outline-secondary">Devise : <?php echo $devise; ?></button>
                                        

                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="content">
              <div class="alert alert-light" role="alert">
                Bonjour <strong><?php echo $getprenom;?></strong>, voici ce que présente les activités de votre entreprise.
              </div>
              <!-- Animated -->
              <div class="animated fadeIn">
                 <!-- Widgets  -->
                <div class="row">

                  <?php 
                    //on séléctionne le nombre des clients dans l'UE
                    $view = $bdd->prepare("SELECT * FROM client_for_user WHERE id_UE_cli = ? AND default_cli != ?");
                    $view->execute(array($idUE, 1));
                    $i = 1;

                    $existallclient = $view->rowCount();
                  
                      $somme_reste = $bdd->prepare("SELECT SUM(reste_a_payer_fact) AS somme_reste FROM vente_for_user WHERE id_UE_fact = ?");
                      $somme_reste->execute(array($idUE));
                      $fetch_reste = $somme_reste->fetch();
                      $total_reste = number_format($fetch_reste['somme_reste'], 2, '.', '');

                      //la même chose pour la note de crédit
                      $somme_reste_cr = $bdd->prepare("SELECT SUM(reste_a_payer_cr) AS somme_reste FROM note_credit WHERE id_UE_cr = ?");
                      $somme_reste_cr->execute(array($idUE));
                      $fetch_reste_cr = $somme_reste_cr->fetch();
                      $total_reste_cr = number_format($fetch_reste_cr['somme_reste'], 2, '.', '');

                      $total_reste_final = $total_reste - $total_reste_cr;

                      if($total_reste_final == '')
                      {
                        $total_reste_final = 0;
                      }


                      //cette fonction nous permet d'arrongire les nombre par exemple 145 000 = 145 k
                      function bd_nice_number($n) 
                      {
                        // first strip any formatting;
                        $n = (0+str_replace(",","",$n));
                        
                        // is this a number?
                        if(!is_numeric($n)) return false;
                        
                        // now filter it;
                        /**/

                        if($n>1000000000000000000000000) return round(($n/1000000000000000000000000),1).' y';
                        else if($n>1000000000000000000000) return round(($n/1000000000000000000000),1).' z';
                        else if($n>1000000000000000000) return round(($n/1000000000000000000),1).' e';
                        else if($n>1000000000000000) return round(($n/1000000000000000),1).' p';
                        else if($n>1000000000000) return round(($n/1000000000000),1).' t';
                        else if($n>1000000000) return round(($n/1000000000),1).' g';
                        else if($n>1000000) return round(($n/1000000),1).' m';
                        else if($n>1000) return round(($n/1000),1).' k';
                        
                        return number_format($n);
                      
                    }

                      
                    ?>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-header">Clients</div>
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Total nombre</div>
                                            <div class="stat-text"><span class="count"><?php echo $existallclient; ?></span></div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Total créances</div>
                                            <div class="stat-text"><?php echo  bd_nice_number($total_reste_final); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    //on séléctionne le nombre des clients dans l'UE
                      $view = $bdd->prepare("SELECT * FROM article_for_user WHERE idUE_art = ?");
                      $view->execute(array($idUE));
                      $i = 1;

                      $existallarticle = $view->rowCount();

                      $get_valstock = $bdd->prepare('SELECT SUM(prix_vente_TTC * stock_actuel_art) AS valeur_stock FROM article_for_user WHERE idUE_art = ?');
                      $get_valstock->execute(array($idUE));
                      $valeur = $get_valstock->fetch();
                      $valeur_stock = $valeur['valeur_stock'];

                      if($valeur_stock == '')
                      {
                        $valeur_stock = 0;
                      }
                    ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-header">Articles</div>
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Total nombre</div>
                                            <div class="stat-text"><span class="count"><?php echo $existallarticle; ?></span></div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Valeur stock</div>
                                            <div class="stat-text"><?php echo  bd_nice_number($valeur_stock); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                      //on séléctionne le nombre des achats dans l'UE
                      $view = $bdd->prepare("SELECT * FROM depense_for_user WHERE id_UE_dp = ? AND complete_dp != ?");
                      $view->execute(array($idUE, 0));
                      $i = 1;

                      $existallachat = $view->rowCount();

                      $view1 = $bdd->prepare("SELECT * FROM note_de_frais WHERE id_UE_fr = ?");
                      $view1->execute(array($idUE));

                      $existalla2 = $view1->rowCount();

                      $get_achat = $bdd->prepare('SELECT SUM(reste_a_payer_dp) AS valeur_achat FROM depense_for_user WHERE id_UE_dp = ?');
                      $get_achat->execute(array($idUE));
                      $fetch_achat = $get_achat->fetch();
                      $valeur_achat = $fetch_achat['valeur_achat'];

                      $get_depense = $bdd->prepare('SELECT SUM(reste_a_payer) AS valeur_depense FROM note_de_frais WHERE id_UE_fr = ?');
                      $get_depense->execute(array($idUE));
                      $fetch_depense = $get_depense->fetch();
                      $valeur_depense = $fetch_depense['valeur_depense'];

                      $total_valeur_depense = $valeur_achat + $valeur_depense;
                      $total_nb_depense = $existallachat +  $existalla2;

                      if($total_valeur_depense == '')
                      {
                        $total_valeur_depense = 0;
                      }

                    ?>

                    <div class="col-lg-3 col-md-6">
                      <div class="card">
                          <div class="card-header">Dépenses</div>
                          <div class="card-body">
                              <div class="stat-widget-five">
                                  <div class="stat-icon dib flat-color-2">
                                      <i class="pe-7s-cart"></i>
                                  </div>
                                  <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Total nombre</div>
                                            <div class="stat-text"><span class="count"><?php echo $total_nb_depense; ?></span></div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Votal valeur</div>
                                            <div class="stat-text"><?php echo  bd_nice_number($total_valeur_depense); ?></div>
                                        </div>
                                    </div>
                              </div>
                          </div>
                      </div>
                    </div>

                    <?php 
                      //on séléctionne le nombre des clients dans l'UE
                      $view = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_UE_fact = ? AND complete_vente != ?");
                      $view->execute(array($idUE, 0));
                      $i = 1;

                      $existallvente = $view->rowCount();

                      $get_vente = $bdd->prepare('SELECT SUM(paiemant_recu_fact) AS valeur_vente FROM vente_for_user WHERE id_UE_fact = ?');
                      $get_vente->execute(array($idUE));
                      $fetch_vente = $get_vente->fetch();
                      $valeur_vente = $fetch_vente['valeur_vente'];

                      if($valeur_vente == '')
                      {
                        $valeur_vente = 0;
                      }
                    ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-header">Ventes</div>
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Total nombre</div>
                                            <div class="stat-text"><span class="count"><?php echo $existallvente; ?></span></div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading">Total valeur</div>
                                            <div class="stat-text"><?php echo  bd_nice_number($valeur_vente); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                  
                    
                </div>
                <!-- /Widgets -->
              </div>
              <!-- Animated -->

              <br>
         
              <div class="card">
                <?php

                  if($userfos['statut'] == 'admin')
                  {
                ?>
                <h6 class="card-header">
                  <nav class="nav nav-pills">
                    <a class="nav-link nav-item active" href="#">Opérations</a>
                    <a class="nav-link nav-item" href="dashboard_evolution.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Evolutions</a>
                    <!--<a class="nav-link nav-item" href="dashboard_tresorerie.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Trésorerie</a>-->
                    <a class="nav-link nav-item" href="dashboard_bilan.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Bilan Dettes et Stocks</a>
                    <a class="nav-link nav-item" href="dashboard_echeancier.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Echéancier</a>
                    <!--<a class="nav-link nav-item" href="#">TVA</a>-->
                  </nav>
                </h6>
                <?php
                  }
                ?>
                <div class="card-body">
                  <div class="card"></div>
                  <div class="row">
                  <?php
                    if($fetch_user['client'] == 0)
                    {
                      //on séléctionne le nombre des clients dans l'UE
                      $view = $bdd->prepare("SELECT * FROM client_for_user WHERE default_cli = 0 AND id_UE_cli = ?");
                      $view->execute(array($idUE));
                      $i = 1;
                      $existallvente = $view->rowCount();

                      if($type_abonne == 'Petite Entreprise')
                      {
                        if($existallvente < 5)
                        {
                  ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci"  data-toggle="modal" data-target=".ajouter-client" title="Ajouter un client" type="button">
                            <span class="step size-48 text-primary">
                              <i class="icon ion-person-add"></i>
                            </span><br>
                            Enregistrer<br> un contact client
                          </button>
                        </div>
                  <?php
                        }
                      }
                      else
                      {
                  ?>
                      <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci"  data-toggle="modal" data-target=".ajouter-client" title="Ajouter un client" type="button">
                            <span class="step size-48 text-primary">
                              <i class="icon ion-person-add"></i>
                            </span><br>
                            Enregistrer<br> un contact client
                          </button>
                        </div>
                  <?php
                      }
                    }
                  ?>

                  <?php
                    if($fetch_user['fournisseur'] == 0)
                    {
                      //on séléctionne le nombre des clients dans l'UE
                      $view = $bdd->prepare("SELECT * FROM fournis_for_user WHERE default_four = 0 AND idUE_four = ?");
                      $view->execute(array($idUE));
                      $i = 1;
                      $existallvente = $view->rowCount();

                      if($type_abonne == 'Petite Entreprise')
                      {
                        if($existallvente < 5)
                        {
                  ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target=".ajouter-fournisseur" title="Ajouter un fournisseur">
                            <span class="step size-48 text-success">
                              <i class="icon ion-person-add"></i>
                            </span><br>
                            Enregistrer<br> un contact fournisseur
                          </button>
                        </div>
                   <?php
                        }
                      }
                      else
                      {
                  ?>
                      <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target=".ajouter-fournisseur" title="Ajouter un fournisseur">
                            <span class="step size-48 text-success">
                              <i class="icon ion-person-add"></i>
                            </span><br>
                            Enregistrer<br> un contact fournisseur
                          </button>
                        </div>
                  <?php
                      }
                    }
                  ?>
                  
                  <?php
                    if($fetch_user['article'] == 0)
                    {
                      //on séléctionne le nombre des clients dans l'UE
                      $view = $bdd->prepare("SELECT * FROM article_for_user WHERE idUE_art = ?");
                      $view->execute(array($idUE));
                      $i = 1;
                      $existallvente = $view->rowCount();

                      if($type_abonne == 'Petite Entreprise')
                      {
                        if($existallvente < 5)
                        {
                  ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target=".ajouter-article">
                            <span class="step size-48 text-warning">
                              <i class="icon ion-ios-filing"></i>
                            </span><br>
                            Enregistrer<br> un article/marchandise
                          </button>
                        </div>
                  <?php
                        }
                      }
                      else
                      {
                  ?>
                      <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target=".ajouter-article">
                            <span class="step size-48 text-warning">
                              <i class="icon ion-ios-filing"></i>
                            </span><br>
                            Enregistrer<br> un article/marchandise
                          </button>
                        </div>
                  <?php     
                      }
                    }
                  ?>

                  <?php
                    if($fetch_user['service'] == 0)
                    {

                      //on séléctionne le nombre des clients dans l'UE
                      $view = $bdd->prepare("SELECT * FROM service_for_user WHERE id_UE_ser = ?");
                      $view->execute(array($idUE));
                      $i = 1;
                      $existallvente = $view->rowCount();

                      if($type_abonne == 'Petite Entreprise')
                      {
                        if($existallvente < 5)
                        {
                  ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target=".ajouter-service" type="button">
                            <span class="step size-48 text-danger">
                              <i class="icon ion-ios-cog"></i>
                            </span><br>
                            Enregistrer<br> un service à vendre
                          </button>
                        </div>
                     <?php
                          }
                        }
                        else
                        {
                    ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target=".ajouter-service" type="button">
                            <span class="step size-48 text-danger">
                              <i class="icon ion-ios-cog"></i>
                            </span><br>
                            Enregistrer<br> un service à vendre
                          </button>
                        </div>
                    <?php
                        }
                      }
                    ?>
                </div>
                <br>

                <div class="row">
                    <?php

                      if($fetch_user['vente'] == 0)
                      {
                        //on séléctionne le nombre des clients dans l'UE
                        $view = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_UE_fact = ? AND complete_vente != ?");
                        $view->execute(array($idUE, 0));
                        $i = 1;
                        $existallvente = $view->rowCount();

                        if($type_abonne == 'Petite Entreprise')
                        {
                          if($existallvente < 5)
                          {
                    ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" id="facturer-client">
                            <span class="step size-48 text-maroon">
                              <i class="icon ion-document-text"></i>
                            </span><br>
                            Etablir<br> une facture de vente
                          </button>
                        </div>

                      <?php
                          }
                        }
                        else
                        {
                    ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" id="facturer-client">
                            <span class="step size-48 text-maroon">
                              <i class="icon ion-document-text"></i>
                            </span><br>
                            Etablir<br> une facture de vente
                          </button>
                        </div>
                    <?php
                        } 
                      }
                    ?>

                      <?php

                        if($fetch_user['achat'] == 0)
                        {
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM depense_for_user WHERE id_UE_dp = ? AND complete_dp != ?");
                          $view->execute(array($idUE, 0));
                          $i = 1;
                          $existallvente = $view->rowCount();

                          if($type_abonne == 'Petite Entreprise')
                          {
                            if($existallvente < 5)
                            {
                      ?>

                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" id="facturer-fournisseur">
                            <span class="step size-48 text-violet">
                              <i class="icon ion-ios-cart"></i>
                            </span><br>
                            Enregistrer<br> un achat marchandise
                          </button>
                        </div>
                      <?php
                            }
                          }
                          else
                          {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" id="facturer-fournisseur">
                            <span class="step size-48 text-violet">
                              <i class="icon ion-ios-cart"></i>
                            </span><br>
                            Enregistrer<br> un achat marchandise
                          </button>
                        </div>
                      <?php
                          }
                        }
                      ?>

                      <?php

                        if($fetch_user['caisse'] == 0)
                        {
                           //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_UE_fact = ? AND complete_vente != ?");
                          $view->execute(array($idUE, 0));
                          $i = 1;
                          $existallvente = $view->rowCount();

                          if($type_abonne == 'Petite Entreprise')
                          {
                            if($existallvente < 5)
                            {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target="#get-caisse">
                            <span class="step size-48 text-orange">
                              <i class="icon ion-android-desktop"></i>
                            </span>&nbsp;&nbsp;<br>
                            Lancer<br> la caisse enregistreuse
                          </button>
                        </div>

                      <?php
                            }
                          }
                          else
                          {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target="#get-caisse">
                            <span class="step size-48 text-orange">
                              <i class="icon ion-android-desktop"></i>
                            </span>&nbsp;&nbsp;<br>
                            Lancer<br> la caisse enregistreuse
                          </button>
                        </div>
                      <?php      
                          }
                        }
                      ?>

                      <?php

                        if($fetch_user['depense'] == 0)
                        {

                           //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM note_de_frais WHERE id_UE_fr = ?");
                          $view->execute(array($idUE));
                          $i = 1;
                          $existallvente = $view->rowCount();

                          if($type_abonne == 'Petite Entreprise')
                          {
                            if($existallvente < 5)
                            {
                      ?>

                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target="#new-depense">
                            <span class="step size-48 text-success">
                              <i class="icon ion-cash"></i>
                            </span>&nbsp;&nbsp;&nbsp;&nbsp;<br>
                            Enregistrer<br> une dépense
                          </button>
                        </div>
                      <?php
                            }
                          }
                          else
                          {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target="#new-depense">
                            <span class="step size-48 text-success">
                              <i class="icon ion-cash"></i>
                            </span>&nbsp;&nbsp;&nbsp;&nbsp;<br>
                            Enregistrer<br> une dépense
                          </button>
                        </div>
                      <?php
                          }
                        }
                      ?>
                    </div>
                    <br>

                    <div class="row">
                      <?php

                        if($fetch_user['devis'] == 0)
                        {
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM devis WHERE id_UE_dv = ? AND complete_devis != ?");
                          $view->execute(array($idUE, 0));
                          $i = 1;
                          $existallvente = $view->rowCount();

                          if($type_abonne == 'Petite Entreprise')
                          {
                            if($existallvente < 5)
                            {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" id="facturer-client-devis">
                            <span class="step size-48 text-primary">
                              <i class="icon ion-document-text"></i>
                            </span><br>
                            Etablir<br> une offre/devis
                          </button>
                        </div>
                      <?php
                            }
                          }
                          else
                          {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" id="facturer-client-devis">
                            <span class="step size-48 text-primary">
                              <i class="icon ion-document-text"></i>
                            </span><br>
                            Etablir<br> une offre/devis
                          </button>
                        </div>
                      <?php
                          }
                        }
                      ?>

                      <?php

                        if($fetch_user['commande'] == 0)
                        {
                           //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM commande WHERE id_UE_cmd = ? AND complete_cmd != ?");
                          $view->execute(array($idUE, 0));
                          $i = 1;
                          $existallvente = $view->rowCount();

                          if($type_abonne == 'Petite Entreprise')
                          {
                            if($existallvente < 5)
                            {
                      ?>

                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" id="facturer-fournisseur-commande">
                            <span class="step size-48 text-warning">
                              <i class="icon ion-document-text"></i>
                            </span><br>
                            Etablir<br> un bon de commande
                          </button>
                        </div>

                      <?php
                            }
                          }
                          else
                          {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" id="facturer-fournisseur-commande">
                            <span class="step size-48 text-warning">
                              <i class="icon ion-document-text"></i>
                            </span><br>
                            Etablir<br> un bon de commande
                          </button>
                        </div>
                      <?php  
                          }
                        }
                      ?>

                      <?php

                        if($fetch_user['creance'] == 0)
                        {
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM creance_for_user WHERE id_UE_cre = ? AND default_cre != 1");
                          $view->execute(array($idUE));
                          $i = 1;
                          $existallvente = $view->rowCount();

                          if($type_abonne == 'Petite Entreprise')
                          {
                            if($existallvente < 5)
                            {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target="#new-creance">
                            <span class="step size-48 text-danger">
                              <i class="icon ion-clipboard"></i>
                            </span><br>
                            Enregistrer<br> une créance
                          </button>
                        </div>
                      <?php
                            }
                          }
                          else
                          {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target="#new-creance">
                            <span class="step size-48 text-danger">
                              <i class="icon ion-clipboard"></i>
                            </span><br>
                            Enregistrer<br> une créance
                          </button>
                        </div>
                      <?php
                          }
                        }
                      ?>

                      <?php

                        if($fetch_user['dette'] == 0)
                        {

                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM dette_for_user WHERE id_UE_det = ? AND default_det != 1");
                          $view->execute(array($idUE));
                          $i = 1;
                          $existallvente = $view->rowCount();

                          if($type_abonne == 'Petite Entreprise')
                          {
                            if($existallvente < 5)
                            {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target="#new-dette">
                            <span class="step size-48 text-maroon">
                              <i class="icon ion-clipboard"></i>
                            </span><br>
                            Enregistrer<br> une dette
                          </button>
                        </div>
                     <?php
                            }
                          }
                          else
                          {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target="#new-dette">
                            <span class="step size-48 text-maroon">
                              <i class="icon ion-clipboard"></i>
                            </span><br>
                            Enregistrer<br> une dette
                          </button>
                        </div>
                      <?php
                          }
                        }
                      ?>
                    </div>
                    <br>

                    <div class="row">
                      <?php

                        if($fetch_user['mode_paiement'] == 0)
                        {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target="#encaisseClient">
                            <span class="step size-48 text-violet">
                              <i class="icon ion-arrow-down-c"></i>
                            </span><br>
                            Enregistrer<br> un encaissement client
                          </button>
                        </div>
                      <?php
                        }
                      ?>

                      <?php

                        if($fetch_user['mode_paiement'] == 0)
                        {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target="#paiementFour">
                            <span class="step size-48 text-primary">
                              <i class="icon ion-arrow-up-c"></i>
                            </span><br>
                            Effectuer<br> un paiement fournisseur
                          </button>
                        </div>
                      <?php
                        }
                      ?>

                      <?php

                        if($fetch_user['mode_paiement'] == 0)
                        {
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM compte_financier WHERE id_UE_cmp = ?");
                          $view->execute(array($idUE));
                          $i = 1;
                          $existallvente = $view->rowCount();

                          if($type_abonne == 'Petite Entreprise')
                          {
                            if($existallvente < 5)
                            {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target=".ajouter-moyen-paiement">
                            <span class="step size-48 text-orange">
                              <i class="icon ion-card"></i>
                            </span><br>
                            Ajouter<br> un mode de paiement
                          </button>
                        </div>
                      <?php
                            }
                          }
                          else
                          {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" data-toggle="modal" data-target=".ajouter-moyen-paiement">
                            <span class="step size-48 text-orange">
                              <i class="icon ion-card"></i>
                            </span><br>
                            Ajouter<br> un mode de paiement
                          </button>
                        </div>
                      <?php
                          }
                        }
                      ?>

                      <?php

                        if($fetch_user['monnaie_etrangere'] == 0)
                        {
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise != ?");
                          $view->execute(array($idUE, 1));
                          $i = 1;
                          $existallvente = $view->rowCount();

                          if($type_abonne == 'Petite Entreprise')
                          {
                            if($existallvente < 5)
                            {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" id="monnaie_ipdate">
                            <span class="step size-48 text-success">
                              <i class="icon ion-earth"></i>
                            </span><br>
                            Mettre à jour<br> une devise étrangère
                          </button>
                        </div>
                      <?php
                            }
                          }
                          else
                          {
                      ?>
                        <div class="col-md-3">
                          <button class="btn btn-block btn-light text-secondary btn-raccourci" id="monnaie_ipdate">
                            <span class="step size-48 text-success">
                              <i class="icon ion-earth"></i>
                            </span><br>
                            Mettre à jour<br> une devise étrangère
                          </button>
                        </div>
                      <?php
                          }
                        }
                      ?>

                </div>
              </div>


              <!--Modal pour l'insertion d'une nouvelle catégorie de service-->
              <div class="modal fade ajouter-categorie-service" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <!--Modal pour l'insertion d'une nouvelle catégorie de service-->

              <!--Nouvelle catégorie d'article-->
              <div class="modal fade ajouter-categorie-article" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="myModalLabel">Ajouter une catégorie d'articles</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                        
                      </div>
                      <div class="modal-body">
                        <label for="libelleart"><h6>Désignation</h6></label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-inbox.png"></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Entrer le libellé de votre catégorie d'articles" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libelleart" id="libelleart" required="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                            <i class="icon ion-android-cancel"></i>
                          </span>
                          &nbsp;&nbsp;Annuler</button>
                        <button type="submit" class="btn btn-primary" name="addcatser" id="addcatart"> 
                          <span class="step size-21">
                            <i class="icon ion-archive"></i>
                          </span>
                          &nbsp;&nbsp;Enregistrer</button>
                      </div>
                    </div>
                  
                </div>
              </div>
              <!--Nouvelle catégorie d'article-->


              <!--Nouvelle sous-catégirie-->
              <div class="modal fade ajouter-sous-categorie-article" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="myModalLabel">Ajouter une sous-catégorie d'articles</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                            
                      </div>
                      <div class="modal-body">
                        <label for="libelleartsous"><h6>Désignation</h6></label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-inbox.png"></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Entrer le libellé de votre sous-catégorie d'articles" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libelleartsous" id="libelleartsous" required="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                            <i class="icon ion-android-cancel"></i>
                          </span>
                          &nbsp;&nbsp;Annuler</button>
                        <button type="submit" class="btn btn-primary" name="addcatartsous" id="addcatartsous"> 
                          <span class="step size-21">
                            <i class="icon ion-archive"></i>
                          </span>
                          &nbsp;&nbsp;Enregistrer</button>
                      </div>
                    </div>
                  
                </div>
              </div>
              <!--Nouvelle sous-catégirie-->

 
              <!--debut modale new client-->
              <div class="modal fade bd-example-modal-lg ajouter-client" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Ajouter un nouveau client</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                      </div>

                      <div class="modal-body body-modal-client">

                        <div class="card form_card">
                          <div class="card-body">

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="civilite"><h6>Civilié</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/genre.png"></span>
                                    </div>
                                    <select class="custom-select" name="civilite" id="civilite">
                                        <option selected value="Monsieur">Monsieur</option>
                                        <option value="Madame">Madame</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="fidelitecard"><h6>Carte de fidélité</h6></label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/card.png"></span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="N° de la carte de fidélité du client"  name="fidelitecard" id="fidelitecard">
                                    </div>
                                  </div>
                                </div>
                              </div>

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="prenomcli"><h6>Prénom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le prénom du client" name="prenomcli" id="prenomcli">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <label for="nomcli"><h6>Nom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le nom du client" name="nomcli" id="nomcli">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="soccli"><h6>Nom Entreprise</h6></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/briefcase.png"></span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'entreprise du client" name="soccli" id="soccli">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                  <label for="tvacli"><h6>N° Entreprise ou TVA</h6></label>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/checkmark-circled.png"></span>
                                      </div>
                                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro d'entreprise du client" name="tvacli" id="tvacli">
                                  </div>
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
                                      <label for="adresscli"><h6>Adresse :</h6></label>
                                      <textarea class="form-control" id="adresscli" rows="2" placeholder="Adresse du client ou de son entreprise" name="adresscli" required=""></textarea>
                                    </div> 
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="telcli"><h6>Téléphone</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-call.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro téléphone du client" name="telcli" id="telcli">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="postalecli"><h6>Code postale</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale du client" name="postalecli" id="postalecli">
                                      </div>
                                    </div>
                                  </div>

                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="villecli"><h6>Ville</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville du client ou de l'entreprise" name="villecli" id="villecli">
                                      </div>
                                    </div>    
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="depcli"><h6>Département / Etat / Province</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-system-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le département de la société du client"  name="depcli" id="depcli" >
                                      </div>
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="payscli"><h6>Pays</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                                          </div>
                                          <select class="custom-select" name="payscli" id="payscli">
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
                                       <label for="emailcli"><h6>Adresse email</h6></label>
                                  <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                                      </div>
                                      <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'email du client"  name="emailcli" id="emailcli">
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
                        <button type="submit" class="btn btn-primary" name="savecli" id="savecli">
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
              <div class="modal fade bd-example-modal-lg ajouter-fournisseur" id="fournisseur" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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


              <!--debut modale new article-->
              <div class="modal fade bd-example-modal-lg ajouter-article" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" id="modal">
                  
                    <div class="modal-content" id="content-modal">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="title-modal">Ajouter un nouvel article</h6>
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
                                  <label for="lib_article"><h6>Libellé</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Entrer le libellé ou la désignation de l'article" name="lib_article" id="lib_article" required="">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="code-article"><h6>Code article</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Entrer le code de l'article" name="code-article" id="code-article" required="">
                                  </div>
                                </div>
                              </div>

                              <?php

                                  $reqcatart = $bdd->prepare("SELECT * FROM categorie_article WHERE id_UE_art = ? AND default_cat_art != ?");
                                  $reqcatart->execute(array($idUE, 1));

                                  //pour les articles qui n'ont ^pas des catégories
                                  $reqc = $bdd->prepare("SELECT * FROM categorie_article WHERE id_UE_art = ? AND default_cat_art = ?");
                                  $reqc->execute(array($idUE, 1));
                                  $aucune_cat = $reqc->fetch();
                              ?>

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="code-barre"><h6>Code barre</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Entrer le code barre de l'article" name="code-barre" id="code-barre" required="">
                                  </div>
                                </div>

                                <?php

                                    $reqscatart = $bdd->prepare("SELECT * FROM sous_categorie_article WHERE   id_s_UE_art = ? AND default_s_cat_art != ?");
                                    $reqscatart->execute(array($idUE, 1));

                                    //pour les articles qui n'ont pas de sous catégorie
                                    $reqsc = $bdd->prepare("SELECT * FROM sous_categorie_article WHERE   id_s_UE_art = ? AND default_s_cat_art = ?");
                                    $reqsc->execute(array($idUE, 1));
                                    $aucune_s_cat = $reqsc->fetch();
                                ?>

                                <div class="col-md-6">
                                  <label for="cat_article"><h6>Catégorie</h6></label>
                                  <div class="input-group mb-3">
                                    <select class="custom-select" name="cat_article" id="cat_article">
                                      <option value="<?php echo $aucune_cat['id_cat_art']; ?>" selected="">Sélectionner une catégorie d'articles</option>
                                      <option value="<?php echo $aucune_cat['id_cat_art']; ?>">Aucune</option>
                                      <?php
                                          while($categorie = $reqcatart->fetch()) 
                                          {
                                      ?>
                                      <option value="<?php echo $categorie['id_cat_art']; ?>"><?php echo $categorie['libelle_cat_art']; ?></option>
                                      <?php }?>
                                    </select>
                                    <div class="input-group-append">
                                      <button class="btn btn-info" type="button" id="new_categorie">Nouvelle</button>
                                    </div>
                                  </div>
                                    <!--<label for="sous_cat_article"><h6>Sous-catégorie</h6></label>
                                    <div class="input-group mb-3">
                                      <select class="custom-select" name="sous_cat_article" id="sous_cat_article">
                                        <option value="<?php echo $aucune_s_cat['id_s_cat_art']; ?>" selected="">Sélectionner une sous-catégorie d'articles</option>
                                        <option value="<?php echo $aucune_s_cat['id_s_cat_art']; ?>">Aucune</option>
                                        <?php
                                            while($scategorie = $reqscatart->fetch()) 
                                            {
                                        ?>
                                        <option value="<?php echo $scategorie['id_s_cat_art']; ?>"><?php echo $scategorie['libelle_s_cat_art']; ?></option>
                                        <?php }?>
                                      </select>
                                      <div class="input-group-append">
                                        <button class="btn btn-info" type="button" id="new_sous_categorie">Nouvelle</button>
                                      </div>
                                    </div>-->
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <label for="unite_article"><h6>Unité</h6></label>
                                  <select class="custom-select" id="unite_article" name="unite_article">
                                    <option value="Aucune" selected="">Sélectionner une unité </option>
                                    <option value="Aucune">Aucune</option>
                                    <?php

                                        //On séléctionne tous les unité de mesure dans la base de données
                                        $get_unite = $bdd->prepare('SELECT * FROM unite_mesure ORDER BY symbole ASC');
                                        $get_unite->execute(array());

                                        while($row = $get_unite->fetch())
                                        {
                                    ?>
                                        <option value="<?php echo $row['symbole']; ?> (<?php echo $row['libelle']; ?>)">
                                          <?php echo $row['symbole']; ?> (<?php echo $row['libelle']; ?>) 
                                        </option>

                                    <?php
                                        }
                                    ?>
                                  </select>
                                </div>
                                <div class="col-md-6">
                                  <label for="expiration_article"><h6>Expiration</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control text-right" required="" name="expiration_article" placeholder="0" required="" id="expiration_article">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Jours</span>
                                    </div>
                                  </div>
                                </div>
                              </div>

                          </div>
                        </div>


                        <form id="modal-form">
                          <div class="card form_card">
                            <div class="card-body">
                              
                              <div class="form-group">
                                <label for="prix_achat_article"><h6>Prix d'achats</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control text-right" placeholder="0.00"  name="prix_achat_article" id="prix_achat_article" value="0">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><?php echo $devise; ?></span>
                                  </div>
                                </div>
                              </div>

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
                                    <label for="prix_ht"><h6>Prix de vente HTVA</h6></label>
                                    <div class="input-group mb-3">
                                      <input name="prix_ht" type="text" class="form-control text-right" placeholder="0.00" id="prix_ht" value="">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo $devise; ?></span>
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

                            </div>
                          </div>
                        </form>


                        <div class="card form_card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="stock_article"><h6>Stock actuel</h6></label>
                                  <input type="text" class="form-control text-right"  placeholder="0" name="stock_article" required="" id="stock_article">
                                </div>
                              </div>
                              <?php

                                $reqfourn = $bdd->prepare("SELECT * FROM fournis_for_user WHERE idUE_four = ? AND default_four != ?");
                                $reqfourn->execute(array($idUE, 1));

                                //pour les articles qui n'ont pas de fournisseur 
                                $reqf = $bdd->prepare("SELECT * FROM fournis_for_user WHERE idUE_four = ? AND default_four = ?");
                                $reqf->execute(array($idUE, 1));
                                $aucun_four = $reqf->fetch();

                              ?>
                              <div class="col-md-6">
                                <label><h6>Fournisseur</h6></label>
                                <div class="input-group mb-3">
                                  <select class="custom-select" name="fournisseur_article" id="fournisseur_article">
                                    <option value="<?php echo $aucun_four['id_four']; ?>" selected="">Sélectionner un fournisseur</option>
                                    <option value="<?php echo $aucun_four['id_four']; ?>" >Aucun</option>
                                    <?php
                                        while($fournis = $reqfourn->fetch()) 
                                        {
                                    ?>
                                    <option value="<?php echo $fournis['id_four']; ?>"><?php echo $fournis['societe_four']; ?></option>
                                    <?php }?>
                                  </select>
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
                        <button type="submit" class="btn btn-primary" name="saveart" id="saveart">
                            <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Enregistrer
                        </button>
                      </div>

                    </div>

                </div>
              </div>
              <!--fin modale new article-->

              <!--debut modale new service-->
              <div class="modal fade bd-example-modal-lg ajouter-service" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

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
                                    <button class="btn btn-info" type="button" id="new_categorie_service">Nouvelle</button>
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
                                      <label for="prix_ttc_s"><h6>Prix de vente TTC</h6></label>
                                        <div class="input-group mb-3">
                                          <input name="prix_ttc_s" type="text" placeholder="0.00" class="form-control text-right" id="prix_ttc_s" value="0">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><?php echo $devise; ?></span>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <label><h6>&nbsp;</h6></label>
                                        <button type="button" class="btn btn-success btn-block" id="addtva_ser">
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
                                  <div class="col-md-6 viewtva_ser">
                                    <label for="prix_ht_s"><h6>Prix de vente HTVA</h6></label>
                                    <div class="input-group mb-3">
                                      <input name="prix_ht_s" type="text" class="form-control text-right" placeholder="0.00" id="prix_ht_s" value="0">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo $devise; ?></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 viewtva_ser">
                                    <div class="row" ">
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
                                        <button type="button" class="btn btn-danger btn-block" id="removetva_ser">Annuler la TVA</button>
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
              <!--fin modale new service-->

              <!--debut modale new dépense-->
              <!--<div class="modal fade bd-example-modal-lg" id="new-depense" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                            <label for="Montpaye"><h6>Montant dépense</h6></label>
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
                              <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="num_cmp" id="num_cmp" placeholder="Saisir le numéro de compte du bénéficiaire">
                            </div>
                          </div>
                        </div>
                      </div>

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
              </div>-->
            <!--fin modale new fin-->

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
                      <form id="modal-form-depense">
                        <div class="p-3 mb-2 form_card text-dark border">   
                          <div class="row">
                            <div class="col-md-6">
                              <label for="autre_devise-depense"><h6>Dévise</h6></label>
                              <div class="input-group mb-3">
                                <?php
                                  $getotherdevise = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise != 1");
                                  $getotherdevise->execute(array($idUE));

                                  $getdefaultdevise = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise = 1");
                                  $getdefaultdevise->execute(array($idUE));
                                  $defautl_devise = $getdefaultdevise->fetch();

                                ?>
                                <select class="custom-select" id="autre_devise-depense">
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
                              <label for="prix_ttc-depense"><h6>Montant dépense TTC</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control text-right" placeholder="0.00" name="prix_ttc-depense" id="prix_ttc-depense" step="0.01" required="">


                                <div class="input-group-append">
                                  <span class="input-group-text devise_paie-depense">
                                    <?php echo $devise; ?>
                                  </span>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6 applic-tva">
                              <label><h6>&nbsp;</h6></label>
                              <button type="button" class="btn btn-success btn-block" id="addtva-depense">
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
                            <div class="col-md-6 viewtva-depense">
                              <label for="prix_ht-depense"><h6>Montant dépense HTVA</h6></label>
                              <div class="input-group mb-3">
                                <input name="prix_ht-depense" type="text" class="form-control text-right" placeholder="0.00" id="prix_ht-depense" value="">
                                <div class="input-group-prepend">
                                  <span class="input-group-text devise_paie-depense"><?php echo $devise; ?></span>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6 viewtva-depense">
                              <div class="row">
                                <div class="col-md-6">
                                  <label for="taux_tva-depense"><h6>Taux TVA</h6></label>
                                  <div class="input-group mb-3">
                                    <input name="taux_tva-depense" type="text" class="form-control text-right" placeholder="0.00" id="taux_tva-depense" value="0">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">%</span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label><h6>&nbsp;</h6></label>
                                  <button type="button" class="btn btn-danger btn-block" id="removetva-depense">Annuler la TVA</button>
                                </div>
                              </div>
                            </div>
                          </div>

                         

                          <div class="row">
                            <div class="col-md-6">
                              <label for="id_mpaie-depense"><h6>Mode de paiement</h6></label>
                              <div class="input-group mb-3">
                                <select class="custom-select" id="id_mpaie-depense">
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
                              <label for="num_cmp-depense"><h6>Numéro de compte</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="num_cmp-depense" id="num_cmp-depense" placeholder="Saisir le numéro de compte du bénéficiaire">
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
                                <select class="custom-select" id="fournisseur-selected-depense">
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
                              <select class="custom-select" id="autre-tiers-selected-depense" disabled="true">
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
                              <label for="commentaire-depense"><h6>Remarque (pas obligatoire)</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" name="commentaire-depense" id="commentaire-depense" placeholder="Saisir une remarque">
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

                    <div class="modal-body">

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
                              <label for="num_cmp1"><h6>Numéro de compte (si banque)</h6></label>
                              <input type="text" class="form-control" id="num_cmp1" aria-describedby="emailHelp" placeholder="Entrez le numéro de compte" name="num_cmp1">
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

            <!-- Modal encaissement client -->
            <div class="modal fade" id="encaisseClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-white bg-secondary">
                    <div class="row">
                      <div class="col-md-10">
                        <h6 class="modal-title" id="exampleModalLabel">Enregistrer un encaissement client</h6>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    </div>
                      
                          
                    </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="mode_paie"><h6>Mode de paiement</h6></label>
                      <select class="custom-select" id="mode_paie">
                        <option value="" selected="">Choisir le mode de paiment</option>
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
                   <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <span class="step size-21">
                            <i class="icon ion-ios-undo"></i>
                          </span>
                            &nbsp;&nbsp;&nbsp;Fermer
                      </button>
                      <button type="bouton" class="btn btn-success" name="encaisseCli" id="encaisseCli">
                          <span class="step size-21">
                            <i class="icon ion-android-done"></i>
                          </span>
                            &nbsp;&nbsp;&nbsp;Sélectionner
                      </button>
                    </div>
                </div>
              </div>
            </div>
            <!-- Modal encaissement client -->

            <!-- Modal paiement fournisseur -->
            <div class="modal fade" id="paiementFour" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-white bg-secondary">
                    <div class="row">
                      <div class="col-md-10">
                        <h6 class="modal-title" id="exampleModalLabel">Effectuer un paiement fournisseur</h6>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    </div>
                      
                          
                    </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="mode_paie1"><h6>Mode de paiement</h6></label>
                      <select class="custom-select" id="mode_paie1">
                        <option value="" selected="">Choisir le mode de paiment</option>
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
                   <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <span class="step size-21">
                            <i class="icon ion-ios-undo"></i>
                          </span>
                            &nbsp;&nbsp;&nbsp;Fermer
                      </button>
                      <button type="bouton" class="btn btn-success" name="paiementF" id="paiementF">
                          <span class="step size-21">
                            <i class="icon ion-android-done"></i>
                          </span>
                            &nbsp;&nbsp;&nbsp;Sélectionner
                      </button>
                    </div>
                </div>
              </div>
            </div>
            <!-- Modal paiement fournisseur -->

            <!--debut modale créance-->
            <div class="modal fade bd-example-modal-lg " id="new-creance" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                
                  <div class="modal-content">

                    <div class="modal-header text-white bg-secondary">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLabel">Ajouter une créance</h6>
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
                          <label for="autre_devise2"><h6>Dévise</h6></label>
                          <div class="input-group mb-3">
                            <?php
                              $getotherdevise = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise != 1");
                              $getotherdevise->execute(array($idUE));

                              $getdefaultdevise = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise = 1");
                              $getdefaultdevise->execute(array($idUE));
                              $defautl_devise = $getdefaultdevise->fetch();

                            ?>
                            <select class="custom-select" id="autre_devise2">
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
                          <label for="Montpaye2"><h6>Montant créance/prêt</h6></label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control text-right" placeholder="0.00" name="Montpaye2" id="Montpaye2" step="0.01" required="">


                            <div class="input-group-append">
                              <span class="input-group-text" id="devise_paie2">
                                <?php echo $devise; ?>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <label for="id_mpaie2"><h6>Mode de paiement</h6></label>
                          <div class="input-group mb-3">
                            <select class="custom-select" id="id_mpaie2">
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
                          <label for="num_cmp2"><h6>Numéro de compte</h6></label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="num_cmp2" id="num_cmp2" placeholder="Saisir le numéro de compte du créancier">
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="p-3 mb-2 form_card text-dark border">
                        <div class="form-group">
                          <label for="commentaire2"><h6>Remarque (pas obligatoire)</h6></label>
                          <div class="input-group mb-3">
                            <input type="text" class="form-control" name="commentaire2" id="commentaire2" placeholder="Saisir une remarque">
                          </div>
                        </div>
                    </div>

                    <div class="p-3 mb-2 bg-secondary text-white border">  
                      <div class="row">
                        <div class="col-md-6">
                          <label for="autre-tiers2"><h6>Autre tiers/créancier</h6></label>
                          <div class="input-group mb-3">
                            <select class="custom-select" id="autre-tiers2">
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
                                <button class="btn btn-info" type="button" id="new_autre_tiers2">Nouveau</button>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="date-creance"><h6>Echéance</h6></label>
                            <div class="input-group mb-3">
                                <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="date-creance" id="date-creance" value="<?php echo $date; ?>">
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
                    <button type="submit" class="btn btn-primary" name="save-creance" id="save-creance">
                        <span class="step size-21">
                          <i class="icon ion-android-done"></i>
                        </span>
                          &nbsp;&nbsp;&nbsp;Enregistrer
                    </button>
                  </div>

                  </div>

              </div>
            </div>
            <!--fin modale créance fin-->

            <!-- Modal new dette -->
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
                            <label for="autre_devise3"><h6>Dévise</h6></label>
                            <div class="input-group mb-3">
                              <?php
                                $getotherdevise = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise != 1");
                                $getotherdevise->execute(array($idUE));

                                $getdefaultdevise = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise = 1");
                                $getdefaultdevise->execute(array($idUE));
                                $defautl_devise = $getdefaultdevise->fetch();

                              ?>
                              <select class="custom-select" id="autre_devise3">
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
                            <label for="Montpaye3"><h6>Montant dette/emprunt</h6></label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control text-right" placeholder="0.00" name="Montpaye3" id="Montpaye3" step="0.01" required="">


                              <div class="input-group-append">
                                <span class="input-group-text" id="devise_paie3">
                                  <?php echo $devise; ?>
                                </span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <label for="id_mpaie3"><h6>Mode de paiement</h6></label>
                            <div class="input-group mb-3">
                              <select class="custom-select" id="id_mpaie3">
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
                            <label for="num_cmp3"><h6>Numéro de compte</h6></label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="num_cmp3" id="num_cmp3" placeholder="Saisir le numéro de compte du débiteur">
                            </div>
                          </div>
                        </div>
                      </div>

                       <div class="p-3 mb-2 form_card text-dark border">
                        <div class="form-group">
                              <label for="commentaire3"><h6>Remarque (pas obligatoire)</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" name="commentaire3" id="commentaire3" placeholder="Saisir une remarque">
                              </div>
                            </div>
                      </div>

                      <div class="p-3 mb-2 bg-secondary text-white border">  
                        <div class="row">
                          <div class="col-md-6">
                            <label for="autre-tiers3"><h6>Autre tiers/débiteur</h6></label>
                            <div class="input-group mb-3">
                              <select class="custom-select" id="autre-tiers3">
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
                                  <button class="btn btn-info" type="button" id="new_autre_tiers3">Nouveau</button>
                                </div>
                            </div>
                          </div>
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
            <!-- Modal new dette -->


            <!-- Modal -->
            <div class="modal fade" id="get-caisse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header  bg-secondary text-white">
                    <div class="row">
                      <div class="col-md-10">
                        <h6 class="modal-title" id="exampleModalLabel">Lancer la caisse</h6>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    </div>
                    
                        
                  </div>
                  <div class="modal-body">
                    <label for="type-caisse">Choisir le type de caisse</label>
                    <select class="custom-select" id="type-caisse">
                      <option value="1">Caisse (Point de vente)</option>
                      <option value="2">Caisse (Restaurant et bar)</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" id="lancer-caisse">Lancer</button>
                  </div>
                </div>
              </div>
            </div>


            </div>
         </div>

        <!--*****************************************************-->
        <br><br>
    </div>
    <!--id body-->

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

        <!--script chart
        <script type="text/javascript" src="../asserts/js/jquery.min.js"></script>
        <script type="text/javascript" src="../asserts/js/chartist.min.js"></script>-->

        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>

        <!--ceci pour le chart graphique (tableau de statystique)-->
        <script src="../asserts/C3/js/d3-5.4.0.min.js" charset="utf-8"></script>
        <script src="../asserts/C3/js/c3.min.js"></script>

        <!--Mon modal personnel-->
        <script src="assets/js/modal.mata.js"></script>

          <!--loader-->
        <script src="assets/js/loader.js"></script>

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">
           jQuery(document).ready(function($) {
            
            //on signal à la barre de navigation qu'on est dans le dashbord
            $('.dashboard').addClass('active');

            //lorsqu'on appui sur le bouton nouvelle  catégorie  d'article
           $('#new_categorie_service').click(function()
                {
                  $('.ajouter-service').modal('hide');
                  $('.ajouter-categorie-service').modal('show');
                });


            //lorsqu'on appui sur le bouton nouvelle  catégorie  d'article
            $('#new_categorie').click(function()
                {
                  $('.ajouter-article').modal('hide');
                  $('.ajouter-categorie-article').modal('show');
                });

                //lorsqu'on appui sur le bouton nouvelle SOUS catégorie  d'article
              $('#new_sous_categorie').click(function()
                {
                  $('.ajouter-article').modal('hide');
                  $('.ajouter-sous-categorie-article').modal('show');
                });


              //ajout du catégorie d'article
              $('#addcatart').click(function()
                {
                  var libelleart = $('#libelleart').val();
                  var idUE = '<?php echo $idUE; ?>';

                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var getid = '<?php echo $getid; ?>';

                  if(libelleart != '')
                  {
                    $.ajax({
                      type : 'POST',
                      url : 'fonction/add_new_categorie_article.php',
                      data : "libelleart=" + libelleart +  
                             "&idUE=" + idUE,
                      success:function(data)
                      {
                        //alert(data);
                        if(data == 1)
                        {
                          err3("Cette catégorie de d'articles existe déjà !");
                          $('#libelleart').addClass('is-invalid');
                        }
                        else
                        {
                          $('#libelleart').removeClass('is-invalid');
                          $('#libelleart').val('');
                          valid3("Nouvelle catégorie d'articles insérée avec succès !");
                          $('.ajouter-categorie-article').modal('hide');

                          window.location = 'stock.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                        }
                      }
                    });
                  }
                  else
                  {
                    $('#libelleart').addClass('is-invalid');
                    err3("Veuillez entrer le libellé du catégorie de d'articles S.V.P!");
                  }
                });


              //lancement caisse
              $('#lancer-caisse').click(function()
                {
                  var type = $('#type-caisse').val();

                  var getid = '<?php echo $getid; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>'; 

                  //caisse point de vente
                  if(type == 1)
                  {
                    window.location = 'vente_init_caisse.php?id=' + getid + '&id_connexion=' + id_connexion + '&idUE=' + idUE + '&nom_entreprise=' + nomE + '&nom_unite_exploitation=' + nomUE;
                  }//caisse restaurant et bar
                  else
                  {
                    window.location = 'vente_init_caisse_restaurant.php?id=' + getid + '&id_connexion=' + id_connexion + '&idUE=' + idUE + '&nom_entreprise=' + nomE + '&nom_unite_exploitation=' + nomUE;
                  }
                });

              //ajout du catégorie service
            $('#addcatser').click(function()
              {
                var libelleser = $('#libelleser').val();
                var idUE = '<?php echo $idUE; ?>';

                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';
                var getid = '<?php echo $getid; ?>';

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
                        $('.ajouter-categorie-service').modal('hide');

                        window.location = 'service.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                      }
                    }
                  });
                }
                else
                {
                  $('#libelleser').addClass('is-invalid');
                  err3("Veuillez entrer le libellé du catégorie de service S.V.P!");
                }
              });

              //ajout du sous-catégorie d'article
              $('#addcatartsous').click(function()
                {
                  var libelleart = $('#libelleartsous').val();
                  var idUE = '<?php echo $idUE; ?>';

                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var getid = '<?php echo $getid; ?>';

                  if(libelleart != '')
                  {
                    $.ajax({
                      type : 'POST',
                      url : 'fonction/add_new_sous_categorie_article.php',
                      data : "libelleart=" + libelleart +  
                             "&idUE=" + idUE,
                      success:function(data)
                      {
                        //alert(data);
                        if(data == 1)
                        {
                          err3("Cette sous-catégorie de d'articles existe déjà !");
                          $('#libelleartsous').addClass('is-invalid');
                        }
                        else
                        {
                          $('#libelleartsous').removeClass('is-invalid');
                          $('#libelleartsous').val('');
                          valid3("Nouvelle sous-catégorie d'articles insérée avec succès !");
                          $('.ajouter-sous-categorie-article').modal('hide');

                          window.location = 'stock_sous_categorie_article.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                        }
                      }
                    });
                  }
                  else
                  {
                    $('#libelleartsous').addClass('is-invalid');
                    err3("Veuillez entrer le libellé du sous-catégorie de d'articles S.V.P!");
                  }
                });



              //lorsqu'on change le monnaie de paiement pour la créance
              $('#autre_devise2').click(function()
                {
                  var devise = '<?php echo $devise; ?>';
                  var autre_devise = $('#autre_devise2').val();

                  if(devise != autre_devise)
                  {
                    $.ajax(
                      {
                        type  : 'POST', 
                        url   : 'fonction/get_devise.php',
                        data  : 'autre_devise=' + autre_devise,
                        success:function(data)
                        {
                          $('#devise_paie2').html(data);
                        }
                      });
                  }
                  else
                  {
                    $('#devise_paie2').html(devise);
                  }
                });

              //lorsqu'on change le monnaie de paiement pour la dette
              $('#autre_devise3').click(function()
                {
                  var devise = '<?php echo $devise; ?>';
                  var autre_devise = $('#autre_devise3').val();

                  if(devise != autre_devise)
                  {
                    $.ajax(
                      {
                        type  : 'POST', 
                        url   : 'fonction/get_devise.php',
                        data  : 'autre_devise=' + autre_devise,
                        success:function(data)
                        {
                          $('#devise_paie3').html(data);
                        }
                      });
                  }
                  else
                  {
                    $('#devise_paie3').html(devise);
                  }
                });


              //lorsqu'on choissi le mode paiement pour la créance
              $('#id_mpaie2').click(function()
                {
                  var id_cmp = $('#id_mpaie2').val();
                  $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/get_num_compte.php',
                    data  : 'id_cmp=' + id_cmp,
                    success:function(data)
                    {
                      if(data == 1)
                      {
                        $('#num_cmp2').attr('disabled', true);
                        $('#num_cmp2').attr("placeholder", '');
                      }
                      else
                      {
                        $('#num_cmp2').attr('disabled', false);
                        $('#num_cmp2').attr("placeholder", 'Saisir le numéro de compte du bénéficiaire');
                      }
                    }
                  });
                });

               //lorsqu'on choissi le mode paiement pour la dette
              $('#id_mpaie3').click(function()
                {
                  var id_cmp = $('#id_mpaie3').val();
                  $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/get_num_compte.php',
                    data  : 'id_cmp=' + id_cmp,
                    success:function(data)
                    {
                      if(data == 1)
                      {
                        $('#num_cmp3').attr('disabled', true);
                        $('#num_cmp3').attr("placeholder", '');
                      }
                      else
                      {
                        $('#num_cmp3').attr('disabled', false);
                        $('#num_cmp3').attr("placeholder", 'Saisir le numéro de compte du bénéficiaire');
                      }
                    }
                  });
                });

              //lorsqu'on clique sur le bouton qui ajoute un autre tiers pour la créance
              $('#new_autre_tiers2').click(function()
              {
                $('#new-creance').modal('hide');
                $('#ajouter-autres-tiers').modal('show');
              });

              //lorsqu'on clique sur le bouton qui ajoute un autre tiers pour la créance
              $('#new_autre_tiers3').click(function()
              {
                $('#new-dette').modal('hide');
                $('#ajouter-autres-tiers').modal('show');
              });

              //enregistrer une créance
              $('#save-creance').click(function()
              {
                //var designation_creance = '';

                var date_creance = $('#date-creance').val();
                var montant = $('#Montpaye2').val();
                //var Apayer = $('#montant-creance').val();
                var id_cmp = $('#id_mpaie2').val();
                var num_cmp = $('#num_cmp2').val();
                var autr = $('#autre-tiers2').val();
                var com = $('#commentaire2').val();

                var autre_devise = $('#autre_devise').val();

                var idUE = '<?php echo $idUE; ?>';
                var getid = '<?php echo $getid; ?>';

                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';

                  
                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/get_equivelent_devise.php',
                    data  : 'autre_devise=' + autre_devise,
                    success:function(data)
                    {
                      var equiv = data;
                      var montant_creance = montant / equiv;
                      //var resteApayer = Apayer - montant_creance; //A payer - montant payer 

                      
                      if(/^[0-9]+[.][0-9]+/.test(montant) || /^[0-9]+/.test(montant) || montant != '')
                      {
                        if(autr != '')
                        {
                          if(id_cmp != '')
                          {
                            $.ajax(
                              {
                                type  : 'POST',
                                url   : 'fonction/verif_total_encaissement.php',
                                data  : 'id_cmp=' + id_cmp + '&taux_echange=' + montant_creance + '&idUE=' + idUE,
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
                                                      url   : 'fonction/saveCreance.php',
                                                      data  : 'date_creance=' + date_creance +
                                                              '&montant_creance=' + montant_creance + '&id_cmp=' + id_cmp + 
                                                              '&num_cmp=' + num_cmp +
                                                              '&autr=' + autr + '&com=' + com + '&equiv=' + equiv + 
                                                              '&idUE=' + idUE + '&getid=' + getid,
                                                      success:function(data1) 
                                                      {
                                                        //alert(data1);
                                                        //affiche_creance();
                                                        
                                                        $('#new-creance').modal('hide');
                                                        valid3('Créance enregistré avec succès !');

                                                        $('#autre_devise').removeClass('is-invalid');
                                                        $('#id_mpaie2').removeClass('is-invalid');
                                                        $('#autre-tiers2').removeClass('is-invalid');
                                                        $('#num_cmp2').removeClass('is-invalid');
                                                        $('#Montpaye2').removeClass('is-invalid');
                                                        //$('#designation_creance').removeClass('is-invalid');
                                                        //$('#montant-creance').removeClass('is-invalid');

                                                        //$('#montant-creance').val('');
                                                        $('#num_cmp2').val('');
                                                        $('#commentaire2').val('');
                                                        $('#Montpaye2').val('');
                                                        //$('#designation_creance').val('');

                                                         window.location = 'creance.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                                      }
                                                  });
                                                }
                                                else
                                                {
                                                  $('#autre_devise2').addClass('is-invalid');
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
                                                        url   : 'fonction/saveCreance.php',
                                                        data  : '&date_creance=' + date_creance +
                                                                '&montant_creance=' + montant_creance + '&id_cmp=' + id_cmp + 
                                                                '&num_cmp=' + num_cmp +
                                                                '&autr=' + autr + '&com=' + com + '&equiv=' + equiv + 
                                                                '&idUE=' + idUE + '&getid=' + getid,
                                                        success:function(data1) 
                                                        {
                                                          //alert(data1);
                                                          //affiche_creance();
                                                          
                                                          $('#new-creance').modal('hide');
                                                          valid3('Créance enregistré avec succès !');

                                                          $('#autre_devise2').removeClass('is-invalid');
                                                          $('#id_mpaie2').removeClass('is-invalid');
                                                          $('#autre-tiers2').removeClass('is-invalid');
                                                          $('#num_cmp2').removeClass('is-invalid');
                                                          $('#Montpaye2').removeClass('is-invalid');
                                                          //$('#designation_creance').removeClass('is-invalid');
                                                          //$('#montant-creance').removeClass('is-invalid');

                                                          //$('#montant-creance').val('');
                                                          $('#num_cmp2').val('');
                                                          $('#commentaire2').val('');
                                                          $('#Montpaye2').val('');
                                                          //$('#designation_creance').val('');

                                                          window.location = 'creance.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                                        }
                                                    });
                                                  }
                                                  else
                                                  {
                                                    $('#autre_devise2').addClass('is-invalid');
                                                    err3('Veuillez Choissir la devise correspondant à la devise du mode paiement');
                                                  }
                                                }
                                              }); 
                                            }
                                            else
                                            {
                                              err3('Veuillez saisir le numéro de compte du bénéficiare S.V.P !');
                                              $('#num_cmp2').addClass('is-invalid');
                                            }
                                          }
                                        }
                                    });
                                  }
                                  else
                                  {
                                    err3("Impossible d'effectuer un décaissement car la caisse ne peut être négative !");
                                    $('#Montpaye2').addClass('is-invalid');
                                  }
                                }
                            });
                          }
                          else
                          {
                            $('#id_mpaie2').addClass('is-invalid');
                            err3('Veuillez Choissir le mode de paiement S.V.P');
                          }
                        }
                        else
                        {
                          $('#autre-tiers2').addClass('is-invalid');
                          err3('Veuillez sélectionner un créancier S.V.P');
                        }
                      }
                      else
                      {
                        $('#Montpaye2').addClass('is-invalid');
                        err3("Le montant de la créance que vous avez saisie n'est pas valide !");
                      }
                      
                    }
                  });
                  
                
              });
              

              //enregistrer une dette
              $('#save-dette').click(function()
              {
                var designation_creance = '';

                var date_dette = $('#date-dette').val();
                var montant = $('#Montpaye3').val();
                //var Apayer = $('#montant-dette').val();
                var id_cmp = $('#id_mpaie3').val();
                var num_cmp = $('#num_cmp3').val();
                var autr = $('#autre-tiers3').val();
                var com = $('#commentaire3').val();

                var autre_devise = $('#autre_devise').val();

                var idUE = '<?php echo $idUE; ?>';
                var getid = '<?php echo $getid; ?>';

                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';

              
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
                                              //affiche_dette();
                                              
                                              $('#new-dette').modal('hide');
                                              valid3('Dette enregistrée avec succès !');

                                              $('#autre_devise3').removeClass('is-invalid');
                                              $('#id_mpaie3').removeClass('is-invalid');
                                              $('#autre-tiers3').removeClass('is-invalid');
                                              $('#num_cmp3').removeClass('is-invalid');
                                              $('#Montpaye3').removeClass('is-invalid');
                                              $('#designation_creance').removeClass('is-invalid');
                                              //$('#montant-dette').removeClass('is-invalid');

                                              //$('#montant-dette').val('');
                                              $('#num_cmp3').val('');
                                              $('#commentaire3').val('');
                                              $('#Montpaye3').val('');
                                              $('#designation_creance').val('');

                                              window.location = 'dette.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                            }
                                        });
                                      }
                                      else
                                      {
                                        $('#autre_devise3').addClass('is-invalid');
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
                                                //affiche_dette();
                                                
                                                $('#new-dette').modal('hide');
                                                valid3('Dette enregistrée avec succès !');

                                                $('#autre_devise3').removeClass('is-invalid');
                                                $('#id_mpaie3').removeClass('is-invalid');
                                                $('#autre-tiers3').removeClass('is-invalid');
                                                $('#num_cmp3').removeClass('is-invalid');
                                                $('#Montpaye3').removeClass('is-invalid');
                                                //$('#designation_creance').removeClass('is-invalid');
                                                //$('#montant-dette').removeClass('is-invalid');

                                                //$('#montant-dette').val('');
                                                $('#num_cmp3').val('');
                                                $('#commentaire3').val('');
                                                $('#Montpaye3').val('');
                                                //$('#designation_creance').val('');

                                                 window.location = 'dette.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                              }
                                          });
                                        }
                                        else
                                        {
                                          $('#autre_devise3').addClass('is-invalid');
                                          err3('Veuillez Choissir la devise correspondant à la devise du mode paiement');
                                        }
                                      }
                                    }); 
                                  }
                                  else
                                  {
                                    err3('Veuillez saisir le numéro de compte du débiteur S.V.P !');
                                    $('#num_cmp3').addClass('is-invalid');
                                  }
                                }
                              }
                          });
                        }
                        else
                        {
                          $('#id_mpaie3').addClass('is-invalid');
                          err3('Veuillez Choissir le mode de paiement S.V.P');
                        }
                      }
                      else
                      {
                        $('#autre-tiers3').addClass('is-invalid');
                        err3('Veuillez sélectionner un débiteur S.V.P');
                      }
                    }
                    else
                    {
                      $('#Montpaye3').addClass('is-invalid');
                      err3("Le montant de la dette que vous avez saisie n'est pas valide !");
                    }
                    
                  }
                });
                

              });



              //lorsqu'on clique sur le bouton encaissement client
              $('#encaisseCli').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var id_cmp = $('#mode_paie').val();

                  if(id_cmp != '')
                  {
                    window.location = 'paiement_client.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE + '&id_cmp=' + id_cmp;
                  }
                  else
                  {
                    $('#mode_paie').addClass('is-invalid');
                    err3('Veuillez Choisir un mode de paiement S.V.P')
                  }

                });


               //lorsqu'on clique sur le bouton paiement fournisseur
              $('#paiementF').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var id_cmp = $('#mode_paie1').val();

                  if(id_cmp != '')
                  {
                    window.location = 'paiement_fournis.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE + '&id_cmp=' + id_cmp;
                  }
                  else
                  {
                    $('#mode_paie1').addClass('is-invalid');
                    err3('Veuillez Choisir un mode de paiement S.V.P')
                  }

                });

              //on affiche les articles
              affiche_client1();
              //ici on affiche tous les services
              function affiche_client1()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_client_devis.php',
                  data : 'idUE=' + idUE  + 
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_client1').html(data);
                  }
                });
              }


               //lorsqu'on recherche un client pour le devis
              $('#libsearchcatart5').keyup(function()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var recherche = $('#libsearchcatart5').val();
                var condition = $('#condition4').val();
                var id_connexion = '<?php echo $id_connexion; ?>'; 

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/rechercher_client_devis.php',
                  data : 'recherche=' + recherche + '&idUE=' + idUE  + '&condition=' + condition +
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_client1').html(data);
                    //alert(condition);
                  } 
                });

              });

          //on affiche les articles
              affiche_client();
              //ici on affiche tous les services
              function affiche_client()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_client_vente.php',
                  data : 'idUE=' + idUE  + 
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_client').html(data);
                  }
                });
              }

               //lorsqu'on recherche un client
              $('#libsearchcatart').keyup(function()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var recherche = $('#libsearchcatart').val();
                var condition = $('#condition').val();
                var id_connexion = '<?php echo $id_connexion; ?>'; 

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/rechercher_client_vente.php',
                  data : 'recherche=' + recherche + '&idUE=' + idUE  + '&condition=' + condition +
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_client').html(data);
                    //alert(condition);
                  } 
                });

              });

              affiche_fournisseur6();
              //ici on affiche tous les services
              function affiche_fournisseur6()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_fournisseur_commande.php',
                  data : 'idUE=' + idUE  + 
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_fournisseur_commande').html(data);
                  }
                });
              }

               //lorsqu'on recherche un client
              $('#libsearchcatart6').keyup(function()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var recherche = $('#libsearchcatart6').val();
                //var condition = $('#condition').val();
                var id_connexion = '<?php echo $id_connexion; ?>'; 

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/rechercher_fournisseur_commande.php',
                  data : 'recherche=' + recherche + '&idUE=' + idUE +
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_fournisseur_commande').html(data);
                    //alert(condition);
                  } 
                });

              });


              //bouton lancer la caisse
              $('#caisse').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  window.location.href = 'vente_init_caisse.php?id=' + getid + '&id_connexion=' + id_connexion + "&idUE=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;

                });


              //établir une facture 
              $('#facturer-client').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  window.location.href = 'vente_init.php?id=' + getid + '&id_connexion=' + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;

                });

              
               //établir une offre/devis
              $('#facturer-client-devis').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  window.location.href = 'devis_init.php?id=' + getid + '&id_connexion=' + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;

                });

              
              //établir une facture fournisseur 
              $('#facturer-fournisseur').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  window.location.href = 'achat_init.php?id=' + getid + '&id_connexion=' + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;

                });

              
              //établir un bon de commande 
              $('#facturer-fournisseur-commande').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  window.location.href = 'commande_init.php?id=' + getid + '&id_connexion=' + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;

                });


              //mettre à jour une monnaie étrangère
              $('#monnaie_ipdate').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  window.location.href = 'monnaie.php?id=' + getid + '&id_connexion=' + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;

                });


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
                          $('#devise_paie').html(data);
                        }
                      });
                  }
                  else
                  {
                    $('#devise_paie').html(devise);
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

                  var getid = '<?php echo $getid; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';


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

                                  window.location = 'autres_tiers.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                  
                                  //window.location.reload(true);
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

              
                //lorsqu'on clique pour appliquer la TVA pour la dépense
              $('#addtva-depense').click(function()
                {
                  $('.viewtva-depense').css('display', 'block');
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
                      $('#taux_tva-depense').val(data);
                      calcule_ht_ttc_depense(event);
                    }
                  });
                });




              //on calcul le taux tva pour la dépense
              function calcule_ht_ttc_depense(event) // fonction de calcul
              {
                var prix_ht = $('input[name="prix_ht-depense"]').val();
                var taux_tva  = $('input[name="taux_tva-depense"]').val();
                var prix_ttc = $('input[name="prix_ttc-depense"]').val();
                
                if(event.target.name=='prix_ttc-depense')
                {
                  var new_prix_ht = (prix_ttc/(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ht-depense"]').val(new_prix_ht);
                }
                else
                {
                  var new_prix_ttc = (prix_ht*(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ttc-depense"]').val(new_prix_ttc);
                } 
              }

              $('#modal-form-depense').bind('keyup mouseup', calcule_ht_ttc_depense); // appel de la fonction de calcul lors d'un événement 'keyup' ou 'mouseup'

              //lorsqu'on annule la TVA pour le dépense
              $('#removetva-depense').click(function()
                {
                  $('.viewtva-depense').css('display', 'none');
                  $('.applic-tva').css('display', 'block');
                  $('#taux_tva-depense').val('0');
                  calcule_ht_ttc_depense(event);
                });


              //lorsqu'on change le monnaie de paiement 
              $('#autre_devise-depense').click(function()
                {
                  var devise = '<?php echo $devise; ?>';
                  var autre_devise = $('#autre_devise-depense').val();

                  if(devise != autre_devise)
                  {
                    $.ajax(
                      {
                        type  : 'POST', 
                        url   : 'fonction/get_devise.php',
                        data  : 'autre_devise=' + autre_devise,
                        success:function(data)
                        {
                          $('.devise_paie-depense').html(data);
                        }
                      });
                  }
                  else
                  {
                    $('.devise_paie-depense').html(devise);
                  }
                });


               //lorsqu'on choissi le mode paiementpour la dépense
              $('#id_mpaie-depense').click(function()
                {
                  var id_cmp = $('#id_mpaie-depense').val();
                  $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/get_num_compte.php',
                    data  : 'id_cmp=' + id_cmp,
                    success:function(data)
                    {
                      if(data == 1)
                      {
                        $('#num_cmp-depense').attr('disabled', true);
                        $('#num_cmp-depense').attr("placeholder", '');
                      }
                      else
                      {
                        $('#num_cmp-depense').attr('disabled', false);
                        $('#num_cmp-depense').attr("placeholder", 'Saisir le numéro de compte du bénéficiaire');
                      }
                    }
                  });
                });

              
              $('#save-depense').click(function()
                {
                  var post_depense = $('#designation_depense').val();
                  var date_depense = $('#date-depense').val();
                  //var montant = $('#Montpaye').val();
                  //var Apayer = $('#montant-depense').val();
                  var id_cmp = $('#id_mpaie-depense').val();
                  var num_cmp = $('#num_cmp-depense').val();
                  var four = $('#fournisseur-selected-depense').val();

                  var four_check = $('#fournisseur-radio');
                  var autre_check = $('#autre-tiers-radio');

                  var autr = $('#autre-tiers-selected-depense').val();
                  var com = $('#commentaire-depense').val();

                  var autre_devise = $('#autre_devise-depense').val();

                  var idUE = '<?php echo $idUE; ?>';
                  var getid = '<?php echo $getid; ?>';

                  var montant = $('#prix_ttc-depense').val();
                  var taux_tva = $('#taux_tva-depense').val();
                  var prix_hta = $('#prix_ht-depense').val();

                  
                  
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

                                                              $('#autre_devise-depense').removeClass('is-invalid');
                                                              $('#id_mpaie-depense').removeClass('is-invalid');
                                                              $('#fournisseur-selected-depense').removeClass('is-invalid');
                                                              $('#autre-tiers-selected-depense').removeClass('is-invalid');
                                                              $('#num_cmp-depense').removeClass('is-invalid');
                                                              $('#prix_ttc-depense').removeClass('is-invalid');
                                                              $('#designation_depense').removeClass('is-invalid');
                                                              //$('#montant-depense').removeClass('is-invalid');

                                                              //$('#montant-depense').val('');
                                                              $('#num_cmp-depense').val('');
                                                              $('#commentaire-depense').val('');
                                                              $('#prix_ttc-depense-').val('');
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
                                                        $('#autre_devise-depense').addClass('is-invalid');
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

                                                                $('#new-depense-').modal('hide');
                                                                valid3('Dépense enregistrée avec succès !');

                                                                $('#autre_devise-depense').removeClass('is-invalid');
                                                                $('#id_mpaie-depense').removeClass('is-invalid');
                                                                $('#fournisseur-selected-depense').removeClass('is-invalid');
                                                                $('#autre-tiers-selected-depense').removeClass('is-invalid');
                                                                $('#num_cmp-depense').removeClass('is-invalid');
                                                                $('#prix_ttc-depense').removeClass('is-invalid');
                                                                $('#designation_depense').removeClass('is-invalid');
                                                                //$('#montant-depense').removeClass('is-invalid');

                                                                //$('#montant-depense').val('');
                                                                $('#num_cmp-depense').val('');
                                                                $('#commentaire-depense').val('');
                                                                $('#prix_ttc-depense').val('');
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
                                                          $('#autre_devise-depense').addClass('is-invalid');
                                                          err3('Veuillez Choissir la devise correspondant à la devise du mode paiement');
                                                        }
                                                      }
                                                    });
                                                }
                                                else
                                                {
                                                  err3('Veuillez saisir le numéro de compte du bénéficiare S.V.P !');
                                                  $('#num_cmp-depense').addClass('is-invalid');
                                                }
                                              }
                                            }
                                          });
                                      }
                                      else
                                      {
                                        err3("Impossible d'effectuer un décaissement car la caisse ne peut être négative !");
                                        $('#prix_ttc-depense').addClass('is-invalid');
                                      }
                                    }
                                  });
                              }
                              else
                              {
                                $('#id_mpaie-depense').addClass('is-invalid');
                                err3('Veuillez Choissir le mode de paiement S.V.P');
                              }
                            }
                            else
                            {
                              $('#fournisseur-selected-depense').addClass('is-invalid');
                              err3('Veuillez sélectionner un fournisseur S.V.P');
                            }
                          }
                          else
                          {
                            $('#prix_ttc-depense').addClass('is-invalid');
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

                                                              $('#autre_devise-depense').removeClass('is-invalid');
                                                              $('#id_mpaie-depense').removeClass('is-invalid');
                                                              $('#fournisseur-selected-depense').removeClass('is-invalid');
                                                              $('#autre-tiers-selected-depense').removeClass('is-invalid');
                                                              $('#num_cmp-depense').removeClass('is-invalid');
                                                              $('#prix_ttc-depense').removeClass('is-invalid');
                                                              $('#designation_depense').removeClass('is-invalid');
                                                              //$('#montant-depense').removeClass('is-invalid');

                                                              //$('#montant-depense').val('');
                                                              $('#num_cmp-depense').val('');
                                                              $('#commentaire-depense').val('');
                                                              $('#prix_ttc-depense').val('');
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
                                                        $('#autre_devise-depense').addClass('is-invalid');
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

                                                                $('#autre_devise-depense').removeClass('is-invalid');
                                                                $('#id_mpaie-depense').removeClass('is-invalid');
                                                                $('#fournisseur-selected-depense').removeClass('is-invalid');
                                                                $('#autre-tiers-selected-depense').removeClass('is-invalid');
                                                                $('#num_cmp-depense').removeClass('is-invalid');
                                                                $('#prix_ttc-depense').removeClass('is-invalid');
                                                                $('#designation_depense').removeClass('is-invalid');
                                                                //$('#montant-depense').removeClass('is-invalid');

                                                                //$('#montant-depense').val('');
                                                                $('#num_cmp-depense').val('');
                                                                $('#commentaire-depense').val('');
                                                                $('#prix_ttc-depense').val('');
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
                                                  $('#num_cmp-depense').addClass('is-invalid');
                                                }
                                              }
                                            }
                                          });
                                      }
                                      else
                                      {
                                        err3("Impossible d'effectuer un décaissement car la caisse ne peut être négative !");
                                        $('#prix_ttc-depense').addClass('is-invalid');
                                      }

                                    }
                                  });
                              }
                              else
                              {
                                $('#id_mpaie-depense').addClass('is-invalid');
                                err3('Veuillez Choissir le mode de paiement S.V.P');
                              }
                            }
                            else
                            {
                              $('#autre-tiers-selected-depense').addClass('is-invalid');
                              err3('Veuillez sélectionner un autre tiers S.V.P');
                            }
                            
                          }
                          else
                          {
                            $('#prix_ttc-depense').addClass('is-invalid');
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


              /*Enregistrement du mode de paiement*/

            $('#savecmp').click(function()
              {

                var lib_cmp = $('#lib_cmp').val();
                var devise_cmp = $('#devise_cmp').val();
                var nom_inst_cmp = $('#nom_inst_cmp').val();
                var iban_cmp = $('#iban_cmp').val();
                var num_cmp = $('#num_cmp1').val();
                var bic_cmp = $('#bic_cmp').val();
                var gest_neg_cmp = $('#gest_neg_cmp').val();
                var idUE = '<?php echo $idUE; ?>';

                var getid = '<?php echo $getid; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';

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
                              //affiche_moyen_paiement();

                              window.location = 'compte_finacier.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
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

                            $("#modal_moyen_paiement").modal('hide');
                            valid3("Mode de paiement enregistré avec succès !");
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

          affiche_tache();
          //affichage des tâches
          function affiche_tache()
          {
            var idUE = '<?php echo $idUE; ?>';
            var getid = '<?php echo $getid; ?>';

            $.ajax(
              {
                type  : 'POST',
                url   : 'fonction/affiche_tache.php',
                data  : 'getid=' + getid + '&idUE=' + idUE,
                success:function(data)
                {
                  $('#table_tache').html(data);
                }
              });
          }

          affiche_fournisseur();
              //ici on affiche tous les services
              function affiche_fournisseur()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_fournisseur_achat.php',
                  data : 'idUE=' + idUE  + 
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_fournisseur').html(data);
                  }
                });
              }
             //lorsqu'on recherche un fournisseur
              $('#libsearchcatart3').keyup(function()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var recherche = $('#libsearchcatart3').val();
                //var condition = $('#condition').val();
                var id_connexion = '<?php echo $id_connexion; ?>'; 

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/rechercher_fournisseur_achat.php',
                  data : 'recherche=' + recherche + '&idUE=' + idUE +
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_fournisseur').html(data);
                    //alert(condition);
                  } 
                });

              });

          


          

               //ajouter un nouveau client 
              $('#savecli').click(function()
                {
                  var civilite = $('#civilite').val();
                  var fidelitecard = $('#fidelitecard').val();
                  var nomcli = $('#nomcli').val();
                  var prenomcli = $('#prenomcli').val();
                  var soccli = $('#soccli').val();
                  var tvacli = $('#tvacli').val();
                  var adresscli = $('#adresscli').val();
                  var telcli = $('#telcli').val();
                  var postalecli = $('#postalecli').val();
                  var villecli = $('#villecli').val();
                  var depcli = $('#depcli').val();
                  var payscli = $('#payscli').val();
                  var emailcli = $('#emailcli').val();
                  var idUE = '<?php echo $idUE; ?>';

                  var getid = '<?php echo $getid; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';


                  if(prenomcli != '')
                  {
                    if(nomcli != '')
                    {
                      if(emailcli != '')
                      {
                        if(payscli != '')
                        {
                          if(/^[a-zA-Z]+/.test(prenomcli))
                          {
                            if(/^[a-zA-Z]+/.test(nomcli))
                            {
                              if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(emailcli))
                              {
                                $.ajax(
                                {
                                  type : 'POST',
                                  url : 'fonction/add_new_client.php',
                                  data : "civilite=" + civilite + "&prenomcli=" + prenomcli + 
                                          "&nomcli=" + nomcli + "&fidelitecard=" + fidelitecard + 
                                          "&soccli=" + soccli + "&tvacli=" + tvacli + 
                                          "&adresscli=" + adresscli + "&telcli=" + telcli + 
                                          "&postalecli=" + postalecli + "&villecli=" + villecli + 
                                          "&depcli=" + depcli + "&payscli=" + payscli + 
                                          "&emailcli=" + emailcli + "&idUE=" + idUE,
                                  success:function(data)
                                  {
                                    //alert(data);
                                    $('#nomcli').removeClass('is-invalid');
                                    $('#prenomcli').removeClass('is-invalid');
                                    $('#emailcli').removeClass('is-invalid');

                                    $('#soccli').val('');
                                    $('#tvacli').val('');
                                    $('#prenomcli').val('');
                                    $('#nomcli').val('');
                                    $('#adresscli').val('');
                                    $('#telcli').val('');
                                    $('#villecli').val('');
                                    $('#depcli').val('');
                                    $('#emailcli').val('');
                                    $('#civilite').val('');
                                    $('#fidelitecard').val('');

                                    valid3('Nouveau client ajouté avec succès');
                                    $('.ajouter-client').modal('hide');

                                    window.location = 'contacts.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                    
                                    //affiche_client();
                                  }
                                });
                              }
                              else
                              {
                                $('#emailcli').addClass('is-invalid');
                                err3("L'adresse émail du client saisie n'est pas valide !");
                              }
                            }
                            else
                            {
                              $('#nomcli').addClass('is-invalid');
                              err3("Le nom du client saisie n'est pas valide !");
                            }
                          }
                          else
                          {
                            $('#prenomcli').addClass('is-invalid');
                            err3("Le prénom du client saisie n'est pas valide !");
                          }
                        }
                        else
                        {
                          $('#payscli').addClass('is-invalid');
                          err3("Veuillez Sélectionner un pays S.V.P !");
                        }
                      }
                      else
                      {
                        $('#emailcli').addClass('is-invalid');
                        err3("L'émail du client est obligatoire S.V.P!");
                      }
                    }
                    else
                    {
                      $('#nomcli').addClass('is-invalid');
                      err3("Veuillez saisir le nom du client ou du représentant de l'entreprise S.V.P!");
                    }
                  }
                  else
                  {
                    $('#prenomcli').addClass('is-invalid');
                    err3("Veuillez saisir le prénom du client ou du représentant de l'entreprise S.V.P!");
                  }
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

                  var getid = '<?php echo $getid; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';


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
                                  $('.ajouter-fournisseur').modal('hide');

                                  window.location = 'fournisseur.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                  
                                  //affiche_fournisseur();
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



                //calcul de la remise automatiquement 
            $('#remise').keyup(function()
              {
                var remise = $('#remise').val();
                var Apayer = $('#total_ttc').val();
                var devise = $('.devise');
                var pourcentage = $('.pourcentage');

                if(pourcentage.is(':checked')) //on vérifie si l'utilisateur à cliquer sur devise
                  {
                      var paie = parseFloat(Apayer.replace(',', '.')); //on essaye de remplacer la virgule par le point
                      var temp = (remise/100).toFixed(2);
                      var montant = (paie * temp).toFixed(2);
                      var resultat = (paie - montant).toFixed(2);
                      $('#Apayer').val(resultat);
                  }
                  if(devise.is(':checked'))
                  {
                     var paie = parseFloat(Apayer.replace(',', '.'));
                     var montant = (paie - remise).toFixed(2);
                     $('#Apayer').val(montant);
                  }

              });


             //lorsqu'on clique pour appliquer la TVA 
              $('#addtva').click(function()
                {
                  $('.viewtva').css('display', 'block');

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
                  $('#taux_tva').val('0');
                  calcule_ht_ttc(event);
                });
            

             //enregistrer un article
               $('#saveart').click(function()
                {
                  var libelle_article = $('#lib_article').val();
                  var cat_article = $('#cat_article').val();
                  var code_article = $('#code-article').val();
                  var code_barre = $('#code-barre').val();
                  //var sous_cat_article = $('#sous_cat_article').val();
                  var unite_article = $('#unite_article').val();
                  var expiration_article = $('#expiration_article').val();
                  var stock_article = $('#stock_article').val();
                  var prix_achat_article = $('#prix_achat_article').val();
                  var prix_vente_HTVA = $('#prix_ht').val();
                  var TVA_article = $('#taux_tva').val();
                  var prix_vente_TTC_article = $('#prix_ttc').val();

                  var fournisseur_article = $('#fournisseur_article').val();
                  var getprenom = '<?php echo $getprenom; ?>';
                  var getname = '<?php echo $getname; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';

                  /*var beneficeDevise = ((prix_vente_TTC_article - prix_achat_article) * 100)/ prix_achat_article

                  alert(beneficeDevise)*/

                  /*/^[0-9]+[.][0-9]+/.test(remise) || /^[0-9]+/.test(remise)*/
                  if(libelle_article != '') 
                  {
                    if(/^[0-9]+/.test(expiration_article) || expiration_article == '')
                    {
                      if(/^[0-9]+[.][0-9]+/.test(prix_achat_article) || /^[0-9]+/.test(prix_achat_article) || prix_achat_article == '')
                      {
                        if(/^[0-9]+[.][0-9]+/.test(prix_vente_HTVA) || /^[0-9]+/.test(prix_vente_HTVA) || prix_vente_HTVA == '')
                        {
                          if(/^[0-9]+[.][0-9]+/.test(TVA_article) || /^[0-9]+/.test(TVA_article) || TVA_article == '')
                          {
                            if(/^[0-9]+[.][0-9]+/.test(prix_vente_TTC_article) || /^[0-9]+/.test(prix_vente_TTC_article) || prix_vente_TTC_article == '')
                            {
                              if(/^[0-9]+/.test(stock_article) || stock_article == '')
                              {
                                $.ajax(
                                {
                                  type : 'POST',
                                  url : 'fonction/add_new_article.php',
                                  data : "libelle_article=" + libelle_article + "&cat_article=" + cat_article + "&unite_article=" + unite_article +
                                          "&expiration_article=" + expiration_article + "&stock_article=" + stock_article + 
                                          "&prix_achat_article=" + prix_achat_article + "&prix_vente_HTVA=" + prix_vente_HTVA + 
                                          "&TVA_article=" + TVA_article + "&prix_vente_TTC_article=" + prix_vente_TTC_article + 
                                          "&fournisseur_article=" + fournisseur_article + "&getprenom=" + getprenom + 
                                          "&getname=" + getname + "&idUE=" + idUE + '&code_barre=' + code_barre + '&code_article=' + code_article,
                                  success:function(data)
                                  {
                                    //alert(data);
                                    if(data == 1)
                                    {
                                      err3("Cette article existe déjà !");
                                      $('#lib_article').addClass('is-invalid');
                                    }
                                    else if(data == 2)
                                    {
                                      err3("Ce code article est déjà utilisé !");
                                      $('#code-article').addClass('is-invalid');
                                    }
                                    else
                                    {
                                      $('#lib_article').removeClass('is-invalid');
                                      $('#prix_ttc').removeClass('is-invalid');
                                      $('#prix_ht').removeClass('is-invalid');
                                      $('#prix_achat_article').removeClass('is-invalid');
                                      $('#taux_tva').removeClass('is-invalid');
                                      $('#stock_article').removeClass('is-invalid');
                                      $('#expiration_article').removeClass('is-invalid');
                                      //$('#cat_article').removeClass('is-invalid');
                                      //$('#sous_cat_article').removeClass('is-invalid');
                                      //$('#fournisseur_article').removeClass('is-invalid');

                                      $('#lib_article').val('');
                                      $('#prix_ttc').val('');
                                      $('#prix_ht').val('');
                                      $('#prix_achat_article').val('');
                                      $('#taux_tva').val('');
                                      $('#stock_article').val('');
                                      $('#expiration_article').val('');
                                      $('#cat_article').val('');
                                      $('#sous_cat_article').val('');
                                      $('#fournisseur_article').val('');
                                      $('#code-barre').val('');
                                      $('#code-article').val('');

                                      valid3('Nouvvel article inséré avec succès');
                                      $('.ajouter-article').modal('hide');
                                      setTimeout(function()
                                      {
                                        window.location = 'stock_article.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                      }, 5000);
                                      
                                    }
                                    //affiche_article();
                                  }
                                });
                              }
                              else
                              {
                                $('#stock_article').addClass('is-invalid');
                                err3("Le stock de l'article saisie n'est pas valide!");
                              }
                            }
                            else
                            {
                              $('#prix_ttc').addClass('is-invalid');
                              err3("Le prix de vente TTC de l'article saisie n'est pas valide!");
                            }
                          }
                          else
                          {
                            $('#taux_tva').addClass('is-invalid');
                            err3("Le taux TVA de l'article saisie n'est pas valide!");
                          }
                        }
                        else
                        {
                          $('#prix_ht').addClass('is-invalid');
                          err3("Le prix de vente HTVA de l'article saisie n'est pas valide!");
                        }
                      }
                      else
                      {
                        $('#prix_achat_article').addClass('is-invalid');
                        err3("Le prix d'achat de l'article saisie n'est pas valide!");
                      }
                    }
                    else
                    {
                      $('#expiration_article').addClass('is-invalid');
                      err3("Le nombre jour de l'expiration de l'article saisie n'est pas valide!");
                    }
                  }
                  else
                  {
                    $('#lib_article').addClass('is-invalid');
                    err3('Veuillez remplir le libellé article S.V.P!'); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                  }
                    
                });



            //lorsqu'on clique pour appliquer la TVA 
              $('#addtva_ser').click(function()
                {
                  $('.viewtva_ser').css('display', 'block');
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
              $('#removetva_ser').click(function()
                {
                  $('.body-modal-service').css('height', '420px');
                  $('.viewtva_ser').css('display', 'none');
                  $('#taux_tva_s').val('0');
                  calcule_ht_ttc1(event);
                });


              //ajouter un nouveau service
              $('#saveser').click(function()
                {
                  var lib_ser = $('#lib_ser').val();
                  var cat_ser = $('#cat_ser').val();
                  var remarque_ser = $('#remarque_ser').val();
                  var prix_ht = $('#prix_ht_s').val();
                  var taux_tva = $('#taux_tva_s').val();
                  var prix_ttc = $('#prix_ttc_s').val();
                  
                  var getprenom = '<?php echo $getprenom; ?>';
                  var getname = '<?php echo $getname; ?>';
                  var idUE = '<?php echo $idUE; ?>';

                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var getid = '<?php echo $getid; ?>';

                  
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

                                      window.location = 'service_grille_tarifaire.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
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

               //on calcul le taux tva pour l'ajout des services
               //on calcul le taux tva pour l'ajout des services
              function calcule_ht_ttc1(event) // fonction de calcul
              {
                var prix_ht = $('input[name="prix_ht_s"]').val();
                var taux_tva  = $('input[name="taux_tva_s"]').val();
                var prix_ttc = $('input[name="prix_ttc_s"]').val();
                
                if(event.target.name=='prix_ttc_s')
                {
                  var new_prix_ht = (prix_ttc/(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ht_s"]').val(new_prix_ht);
                }
                else
                {
                  var new_prix_ttc = (prix_ht*(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ttc_s"]').val(new_prix_ttc);
                } 
              }

              $('#modal-form1').bind('keyup mouseup', calcule_ht_ttc1);



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

          var mois_actuelle = '<?php echo $mois_actuelle; ?>';
          var mois_1 = '<?php echo $mois_1; ?>';
          var mois_2 = '<?php echo $mois_2; ?>';
          var mois_3 = '<?php echo $mois_3; ?>';
          var mois_4 = '<?php echo $mois_4; ?>';
          var mois_5 = '<?php echo $mois_5; ?>';

          //les recettes et depenses + résultats mois actuelles
          var rec_act = '<?php echo $rec_act; ?>';
          var total_depense = '<?php echo $total_depense; ?>';
          var resultat_actuelle = '<?php echo $resultat_actuelle; ?>';

          //les recettes et depenses + résultats mois - 1
          var rec_act1 = '<?php echo $rec_act1; ?>';
          var total_depense1 = '<?php echo $total_depense1; ?>';
          var resultat_1 = '<?php echo $resultat_1; ?>';

          //les recettes et depenses + résultats mois - 2
          var rec_act2 = '<?php echo $rec_act2; ?>';
          var total_depense2 = '<?php echo $total_depense2; ?>';
          var resultat_2 = '<?php echo $resultat_2; ?>';

          //les recettes et depenses + résultats mois - 3
          var rec_act3 = '<?php echo $rec_act3; ?>';
          var total_depense3 = '<?php echo $total_depense3; ?>';
          var resultat_3 = '<?php echo $resultat_3; ?>';

          //les recettes et depenses + résultats mois - 4
          var rec_act4 = '<?php echo $rec_act4; ?>';
          var total_depense4 = '<?php echo $total_depense4; ?>';
          var resultat_4 = '<?php echo $resultat_4; ?>';

          //les recettes et depenses + résultats mois - 5
          var rec_act5 = '<?php echo $rec_act5; ?>';
          var total_depense5 = '<?php echo $total_depense5; ?>';
          var resultat_5 = '<?php echo $resultat_5; ?>';

          var chart = c3.generate({
          bindto: '#chart',
          size: {
            height: 350
            /*width: 100*/
          },
          data: {
            columns: [
              ['Recettes', rec_act5, rec_act4, rec_act3, rec_act2, rec_act1, rec_act],
              ['Dépenses', total_depense5, total_depense4, total_depense3, total_depense2, total_depense1, total_depense],
              ['Résultats', resultat_5, resultat_4, resultat_3, resultat_2, resultat_1, resultat_actuelle]
            ],
            types: {
              Recettes: 'bar',
              Dépenses: 'bar',
              Résultats: 'bar'
            }
          },
          axis: {
            y: {
              label: {
                /*text: 'Y Label',*/
                position: 'outer-middle'
              },
              tick: {
                format: d3.format('.2f')// ADD
              }
            }, 
            x : {
          type: 'category',
            categories:  [mois_5, mois_4, mois_3, mois_2, mois_1, mois_actuelle]
        },
        }
    });

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
