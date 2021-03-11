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

  

    <style type="text/css">
     


      .badge-maroon {
      color: #fff;
      background-color: #800000;
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

                          
                          //cette page contient les données du graphes en php
                          include('graphe_evolution.php');

                     
                  ?>

                <!--Code PHP-->

                

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
                  ?>

                  <?php
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
                <h6 class="card-header">
                  <nav class="nav nav-pills">
                    <a class="nav-link nav-item" href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Opérations</a>
                    <a class="nav-link nav-item active" href="#">Evolutions</a>
                    <!--<a class="nav-link nav-item" href="dashboard_tresorerie.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Trésorerie</a>-->
                    <a class="nav-link nav-item" href="dashboard_bilan.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Bilan Dettes et Stocks</a>
                    <a class="nav-link nav-item" href="dashboard_echeancier.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Echéancier</a>
                    <!--<a class="nav-link nav-item" href="#">TVA</a>-->
                  </nav>
                </h6>
                <div class="card-body">
                  <div class="row">
                        <div class="col-md-8">
                          <div class="card">
                            <div class="card-body">
                              <h5 class="card-title">Evolutions des recettes et dépenses des 6 derniers mois</h5>
                              <div id="chart"></div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card tache">
                            <div class="card-body">
                              <h5 class="card-title">Mes tâches</h5>
                              <button class="btn btn-block btn-info text-white" data-toggle="modal" data-target=".ajouter-tache" type="button">
                                <span class="step size-21">
                                  <i class="icon ion-android-add-circle"></i>
                                </span>
                                <strong>Ajouter une tâche</strong>
                              </button>
                              <br>
                              <div class="scrollfact">
                                <table class="table">
                                  <tbody id="table_tache">
                                    
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>

               <!--les modales-->


                  <!--Modal pour l'insertion d'une tâche-->
              <div class="modal fade ajouter-tache" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                      <div class="modal-header text-white bg-secondary">
                        <h6 class="modal-title" id="myModalLabel">Ajouter une tâche</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="card form_card">
                          <div class="card-body">
                            <label for="objet_tache"><h6>Objet</h6></label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Entrer l'objet de la tâche" name="objet_tache" id="objet_tache" required="">
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <label for="date_tache"><h6>Date début</h6></label>
                                <input type="date" class="form-control" name="date_tache" id="date_tache" required="" value="<?php echo $date; ?>">
                              </div>
                              <div class="col-md-6">
                                <label for="heure_tache"><h6>Heure début</h6></label>
                                <input type="time" class="form-control" name="heure_tache" id="heure_tache" required="" value="<?php echo $heure; ?>">
                              </div>
                            </div>

                             <br>

                             <div class="row">
                              <div class="col-md-6">
                                <label for="date_tache_fin"><h6>Date fin</h6></label>
                                <input type="date" class="form-control" name="date_tache_fin" id="date_tache_fin" required="" value="<?php echo $date; ?>">
                              </div>
                              <div class="col-md-6">
                                <label for="heure_tache_fin"><h6>Heure fin</h6></label>
                                <input type="time" class="form-control" name="heure_tache_fin" id="heure_tache_fin" required="" value="<?php echo $heure; ?>">
                              </div>
                            </div>

                            <br>

                            <label for="empl_tache"><h6>Emplacement</h6></label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                  <span class="step size-21">
                                    <i class="icon ion-android-pin"></i>
                                  </span>
                                </span>
                              </div>
                              <input type="text" class="form-control" placeholder="Entrer l'emplacement de la tâche" name="empl_tache" id="empl_tache" required="">
                            </div>

                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                            <i class="icon ion-android-cancel"></i>
                          </span>
                          &nbsp;&nbsp;Annuler</button>
                        <button type="submit" class="btn btn-primary" name="savetache" id="savetache"> 
                          <span class="step size-21">
                            <i class="icon ion-archive"></i>
                          </span>
                          &nbsp;&nbsp;Enregistrer</button>
                      </div>
                    </div>
                  
                </div>
              </div>
                <!--fin du modale-->


                <!--Modal pour la mis à jour d'une tâche-->
              <div class="modal fade apercu-tache" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                      <div class="modal-header text-white bg-secondary">
                        <h6 class="modal-title" id="myModalLabel">Aperçu tâche <label class="text-secondary" id="id-tache"></label></h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="apercu_tache">

                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" name="deletetache" id="deletetache"> 
                          <span class="step size-21">
                            <i class="icon ion-ios-trash"></i>
                          </span>
                          &nbsp;&nbsp;Supprimer</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                          <span class="step size-21">
                            <i class="icon ion-android-cancel"></i>
                          </span>
                          &nbsp;&nbsp;Fermer</button>
                        <button type="submit" class="btn btn-success" name="updatetache" id="updatetache"> 
                          <span class="step size-21">
                            <i class="icon ion-android-refresh"></i>
                          </span>
                          &nbsp;&nbsp;Mettre à jour</button>
                      </div>
                    </div>
                  
                </div>
              </div>
                <!--fin du modale-->


            </div>
        </div>
         

        <!--*****************************************************-->
        <br><br>

         <!--chat discusion-->
       <?php  include('chat_discution.php'); ?>
    
        <!-- Bootstrap JS -->

         <!--<script src="../asserts/js/vendor/jquery-slim.min.js"></script>-->
        <script src="../asserts/js/jquery/jquery.min.js"></script>

        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>

        
        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>
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

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">
           jQuery(document).ready(function($) {
            
            //on signal à la barre de navigation qu'on est dans le dashbord
            $('.dashboard').addClass('active');

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

         

          //enregistrer une tâche
          $('#savetache').click(function()
            {
              var objet_tache = $('#objet_tache').val();
              var date_tache = $('#date_tache').val();
              var heure_tache = $('#heure_tache').val();
              var date_tache_fin = $('#date_tache_fin').val();
              var heure_tache_fin = $('#heure_tache_fin').val();
              var empl_tache = $('#empl_tache').val();

              var idUE = '<?php echo $idUE; ?>';
              var getid = '<?php echo $getid; ?>';

              if(objet_tache != '')
              {
                $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/save_tache.php',
                  data  : 'objet_tache=' + objet_tache + '&date_tache=' + date_tache +
                          '&heure_tache=' + heure_tache + '&date_tache_fin=' + date_tache_fin + 
                          '&heure_tache_fin=' + heure_tache_fin + '&empl_tache=' + empl_tache + 
                          '&idUE=' + idUE + '&getid=' + getid,
                  success:function(data)
                  {
                    //alert(data);
                    $('#objet_tache').removeClass('is-invalid');
                    $('#objet_tache').val('');
                    valid3('Tâche planifiée avec succès !');
                    affiche_tache();

                    $('.ajouter-tache').modal('hide');
                  }
                });    
              }
              else
              {
                $('#objet_tache').addClass('is-invalid');
                err3("Veuillez saisir l'objet de la tâche S.V.P!");
              }
            });


            //mettre à jour une tâche
            $('#updatetache').click(function()
              {
                var objet_tache = $('#objet_tache1').val();
                var date_tache = $('#date_tache1').val();
                var heure_tache = $('#heure_tache1').val();
                var date_tache_fin = $('#date_tache_fin1').val();
                var heure_tache_fin = $('#heure_tache_fin1').val();
                var empl_tache = $('#empl_tache1').val();

                var id_tache = $('#id-tache').text();

                var date = '<?php echo $date; ?>';
                var heure = '<?php echo $heure; ?>';

                if(objet_tache != '')
                {
                  $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/update_tache.php',
                    data  : 'objet_tache=' + objet_tache + '&date_tache=' + date_tache +
                            '&heure_tache=' + heure_tache + '&date_tache_fin=' + date_tache_fin + 
                            '&heure_tache_fin='+ heure_tache_fin + '&empl_tache=' + empl_tache + '&id_tache=' + id_tache,
                    success:function(data)
                    {
                      //alert(data);
                      valid3('Tâche mis à jour avec succès !');
                      $('#objet_tache1').removeClass('is-invalid');
                      affiche_tache();

                      $('.apercu-tache').modal('hide');
                    }
                  });
                }
                else
                {
                  $('#objet_tache').addClass('is-invalid');
                  err3("Veuillez saisir l'objet de la tâche S.V.P!");
                }
              });

              //suprimer une tâche 
              $('#deletetache').click(function()
              {
                var id_tache = $('#id-tache').text();

                $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/delete_tache.php', 
                    data  : 'id_tache=' + id_tache, 
                    success:function(data)
                    {
                      $('.apercu-tache').modal('hide');
                      valid3('Tâche supprimée avec succès !');
                      affiche_tache();
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
