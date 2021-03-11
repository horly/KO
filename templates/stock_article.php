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
        

         <title>KEDIS Online! | Mes articles</title>
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
                                    <h1>Mon stock</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Mon stock</a></li>
                                        <li class="active">Mes articles</li>
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
                          if($fetch_user['article'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link active" href="#"><strong>Mes articles</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['categorie_article'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="stock.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes catégories d’articles</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['sous_categorie_article'] == 0)
                          {
                      ?>
                        <!--<li class="nav-item">
                          <a class="nav-link" href="stock_sous_categorie_article.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes sous-catégories d’articles </strong></a>-->
                        </li>
                      <?php
                          }
                      ?>

                    </ul>
                  </h6>

                        <?php 
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM article_for_user WHERE idUE_art = ?");
                          $view->execute(array($idUE));
                          $i = 1;
                          $existallvente = $view->rowCount();
                        ?>
                      <div class="card-body">
                          <div class="card border-info mb-3" >
                              <div class="card-header text-left"><strong><b>Liste des articles (Total : <?php echo $existallvente; ?>)</b></strong></div>
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

                                            <button type="button" class="btn btn-success" id="new-article">
                                          <span class="step size-21">
                                              <i class="icon ion-ios-filing-outline"></i>
                                          </span>
                                          &nbsp;&nbsp;Ajouter
                                        </button>

                                        <?php
                                            }
                                            else
                                            {
                                        ?>

                                          <div class="alert alert-primary" role="alert">
                                            Vous avez atteint le nombre maximal de articles.
                                          </div>

                                        <?php
                                            }
                                          }
                                          else
                                          {

                                        ?>

                                          <button type="button" class="btn btn-success" id="new-article">
                                          <span class="step size-21">
                                              <i class="icon ion-ios-filing-outline"></i>
                                          </span>
                                          &nbsp;&nbsp;Ajouter
                                        </button>

                                        <?php
                                          }

                                        ?>


                                      </div>
                                      <div class="col-md-3">
                                      <?php
                                          $reqcatart = $bdd->prepare("SELECT * FROM categorie_article WHERE id_UE_art = ?");
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

                                              <option value="<?php echo $categorie['id_cat_art']; ?>">
                                                <?php echo $categorie['libelle_cat_art']; ?>
                                              </option>
                                              <?php
                                                }
                                              ?>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                      <?php

                                          $reqscatart = $bdd->prepare("SELECT * FROM sous_categorie_article WHERE   id_s_UE_art = ?");
                                          $reqscatart->execute(array($idUE));
                                      ?>
                                      <!--<label>Sous-catégorie</label>-->
                                      <!--<div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1"><strong>Sous-catégorie :</strong></span>
                                        </div>
                                        <select class="custom-select" id="sous_categorie_art">
                                          <option value="all" selected>Toutes</option>
                                              <?php
                                                  while($scategorie = $reqscatart->fetch()) 
                                                  {
                                              ?>

                                              <option value="<?php echo $scategorie['id_s_cat_art']; ?>">
                                                <?php echo $scategorie['libelle_s_cat_art']; ?>
                                              </option>

                                              <?php
                                                }
                                              ?>
                                            </select>
                                          </div>-->
                                      </div>
                                    </div>                               
                                  </div>
                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Référence</th>
                                        <th>Désignation</th>
                                        <th>Catégorie</th>
                                        <th>Prix unitaire (<?php echo $devise; ?>)</th>
                                        <th>Stock</th>
                                        <th>Commandé</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered" id="table_article">
                                      <?php

                                        $view = $bdd->prepare("SELECT * FROM article_for_user WHERE idUE_art = ?");
                                        $view->execute(array($idUE));

                                        $existallcat = $view->rowCount();

                                        
                                            while($row = $view->fetch()) 
                                            {
                                         ?>   
                                            <tr>
                                              <td><a class="text-primary" href="viewArticle.php?id=<?php echo $getid;?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&idart=<?php echo $row['id_art'];?>"><?php echo $row['num_art']; ?></a></td>
                                              <td class="text-left"><?php echo $row['libelle_art']; ?></td>
                                              <td class="text-left">
                                                <?php 
                                                  //on séléctionne dans la table catégorie d'article pour récupérer le libelle du catégorie d'article appartennant à l'article 
                                                    $getlibser = $bdd->prepare("SELECT * FROM categorie_article WHERE id_cat_art = ?");
                                                    $getlibser->execute(array($row['id_CAT']));

                                                    $lib_cat_ser = $getlibser->fetch();
                                                    echo $lib_cat_ser['libelle_cat_art'];  //on affiche le libellé service 
                                                ?>
                                              </td>
                                              <td class="text-right"><?php echo number_format($row['prix_vente_TTC'], 2, ',', ' '); ?>
                                              </td>
                                              <td class="text-center"><?php echo $row['stock_actuel_art']; ?>
                                              </td>
                                              <td class="text-center"><?php echo $row['nombre_cmd_art']; ?>
                                              </td>
                                              <td>
                                                <a class="text-primary" href="viewArticle.php?id=<?php echo $getid;?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&idart=<?php echo $row['id_art'];?>">Détails</a>
                                              </td>
                                            </tr>
                                          <?php 
                                            } 
                                    ?>
                                    </tbody>

                                     <?php 
                                        //le total ttc de tous les articles
                                        $get_valstock = $bdd->prepare('SELECT SUM(prix_vente_TTC) AS total_ttc FROM article_for_user WHERE idUE_art = ?');
                                        $get_valstock->execute(array($idUE));
                                        $valeur = $get_valstock->fetch();
                                        $total_ttc = $valeur['total_ttc'];

                                        //le total stock des articles
                                        $get_stock = $bdd->prepare('SELECT SUM(stock_actuel_art) AS total_stock FROM article_for_user WHERE idUE_art = ?');
                                        $get_stock->execute(array($idUE));
                                        $fetch_stock = $get_stock->fetch();
                                        $total_stock = $fetch_stock['total_stock'];

                                        //total commandé 
                                        $get_commande = $bdd->prepare('SELECT SUM(nombre_cmd_art) AS total_commande FROM article_for_user WHERE idUE_art = ?');
                                        $get_commande->execute(array($idUE));
                                        $fetch_commande = $get_commande->fetch();
                                        $total_commande = $fetch_commande['total_commande'];
                                        
                                      ?>
                                    <tfoot>
                                      <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th class="text-right"><?php echo number_format($total_ttc, 2, '.', ' '); ?></th>
                                        <th class="text-center"><?php echo number_format($total_stock, 2, '.', ' '); ?></th>
                                        <th class="text-center"><?php echo number_format($total_commande, 2, '.', ' '); ?></th>
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
                      <div class="modal-body" id="body-categorie">
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
            $('.stock').addClass('active');

             //on affiche les articles
              //affiche_article();
              //ici on affiche tous les services
              function affiche_article()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_article_stock.php',
                  data : 'idUE=' + idUE  + 
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_article').html(data);
                  }
                });
              }

              //boutton modal nouveau catégorie
              $('#new-article').click(function()
                {
                  $('.ajouter-article').modal('show');
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
                    affiche_article();
                  }
                  else
                  {
                    $.ajax({
                      type : 'POST', 
                      url  : 'fonction/affiche_article_categorie.php',
                      data : 'idcat=' + idcat + '&idUE=' + idUE  + 
                              '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                              '&id_connexion=' + id_connexion,
                      success:function(data)
                      {
                        $('#table_article').html(data);
                      }
                    });
                  }
                    
                });

              //séléctionner une sous-catégorie d'article
              $('#sous_categorie_art').click(function()
                {
                  var idcat = $('#sous_categorie_art').val();
                  var getid = '<?php echo $getid; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  if(idcat == 'all')
                  {
                    affiche_article();
                  }
                  else
                  {
                    $.ajax({
                      type : 'POST', 
                      url  : 'fonction/affiche_article_sous-categorie.php',
                      data : 'idcat=' + idcat + '&idUE=' + idUE  + 
                              '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                              '&id_connexion=' + id_connexion,
                      success:function(data)
                      {
                        $('#table_article').html(data);
                      }
                    });
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
                                      window.location.reload();
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

              //lorsqu'on appui sur le bouton nouvelle catégorie d'article
              $('#new_categorie').click(function()
                {
                  /*$('#modal').removeClass('modal-lg');
                  var idUE = '<?php echo $idUE; ?>';

                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction/contente_categorie_article.php',
                      data  : 'idUE=' + idUE,
                      success:function(data)
                      {
                        $('#content-modal').html(data);
                      }
                    });*/

                  //$('#title-modal').html("Ajouter une catégorie d'articles");
                   $('.ajouter-article').modal('hide');
                   $('.ajouter-categorie-article').modal('show');
                });

              //lorsqu'on appui sur le bouton nouvelle SOUS catégorie  d'article
              $('#new_sous_categorie').click(function()
                {

                  /*$('#modal').removeClass('modal-lg');
                  var idUE = '<?php echo $idUE; ?>';

                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction/contente_categorie_sous_article.php',
                      data  : 'idUE=' + idUE,
                      success:function(data)
                      {
                        $('#content-modal').html(data);
                      }
                    });*/

                    $('.ajouter-article').modal('hide');
                    $('.ajouter-sous-categorie-article').modal('show');
                });


              //ajouter une nouvelle catégorie d'article
            $('#addcatart').click(function()
              {
                var libelleart = $('#libelleart').val();
                var idUE = '<?php echo $idUE; ?>';

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
                        //$('.ajouter-article').modal('hide');
                        setTimeout(function()
                        {
                          window.location.reload();
                        }, 5000);
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


            //ajout du sous-catégorie d'article
            $('#addcatartsous').click(function()
              {
                var libelleart = $('#libelleartsous').val();
                var idUE = '<?php echo $idUE; ?>';

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
                        setTimeout(function()
                        {
                          window.location.reload();
                        }, 5000);
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
