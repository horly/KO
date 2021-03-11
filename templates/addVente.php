<!doctype html>
<!--Début html-->
<html lang="fr">
<!--Début html-->
    <head>
    <!--Début head-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../asserts/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../asserts/css/dashboard.css" >

        <!--Style personnel-->
        <link rel="stylesheet" href="../asserts/css/style.css" >
        
        <!--Chargement des styles pour les icones des reseaux socio-->
        <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <link rel="stylesheet" href="../asserts/css/docs.css" >
        <link rel="stylesheet" href="../asserts/css/font-awesome.css" >

         <!--chargement des icones-->
        <link href="../icons/css/ionicons.css" rel="stylesheet" type="text/css" />
        <link href="../icons/css/iconstyles.css" rel="stylesheet" type="text/css" />

        <title>KEDIS ONLINE | Mes ventes</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body>
    <!--Début body-->
    <style type="text/css">

      section {
          position: relative;
          padding-top: 37px;
           border: 1px solid lightgray;
          background: #17a2b8;
        }

         .section1 {
          position: relative;
          padding-top: 37px;
           border: 1px solid lightgray;
          background: gray;
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
          height: 150px;
          background-color: white;
        }

        .container-tab1 {
          overflow-y: auto;
          height: 215px;
          background-color: white;
        }

        table {
          border-spacing: 0;
          width:100%;
        }

        td + td {
          /*border-left:1px solid lightgray;*/
        }

        #table_facture tr, 
        #table_facture th, 
        #table_facture td
        {
          border-color: white;
        } 

        #table_article td + td {
          border-left:1px solid lightgray;
        }
        td, th {
          border-bottom:1px solid lightgray;
          padding: 10px 25px;
          text-align: center;
        }
        th {
          height: 0;
          line-height: 0;
          padding-top: 0;
          padding-bottom: 0;
          color: transparent;
          border: none;
          white-space: nowrap;
          text-align: center;
        }
        th div{
          position: absolute;
          background: transparent;
          color: #fff;
          padding: 9px 25px;
          top: 0;
          margin-left: -25px;
          line-height: normal;
          text-align: center;
          /*border-left: 1px solid lightgray;*/
        }
        th:first-child div{
          border: none;
          text-align: center;
        }

        /*rendre le tableau le curseur des pointer*/
        .tbody_article tr, .tbody_fac tr
        {
          cursor: pointer; transition: all .25s ease-in-out;
        }

        .tbody_article tr:hover, .tbody_fac tr:hover
        {
          background-color: #ddd;
        }

        .tbody_fac tr:active
        {
          background-color: #007bff;
        }


       .form_card
        {
          background-color: #d1ecf1;
        }

        .scrollfact
      {
        height:360px;
        width:100%;
        overflow:auto;
        border: 0.5px solid lightgray;
        background-color: white;
      }

      .div_footer
      {
        border: 1px solid lightgray;
      }
    </style>

        <!--Code PHP-->
                <?php 
                    session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['refcaise']) AND isset($_GET['prenomClient']) AND isset($_GET['nomClient'])  AND isset($_GET['mailClient']) AND isset($_GET['societeClient']) AND isset($_GET['echeance']) AND isset($_GET['date']))  //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; //on protège la variable 
                      $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
                      $requser->execute(array($getid));

                      $userfos = $requser->fetch();
                      $getname = $userfos['nom_cl'];
                      $getprenom = $userfos['prenom_cl'];
                      $getmail = $userfos['email_cl'];
                      $getprofil = $userfos['profil_cl']; 
                      $sexe= $userfos['sexe_cl'];

                      $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise
                      $nomUE = $_GET['nom_unite_exploitation']; //on recupère le nom de l'UE

                      //on recupère la date d'aujourd'hui
                      setlocale(LC_TIME, 'fra_fra');
                      $date = date("Y-m-d");

                      $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production

                      $refcaise = $_GET['refcaise']; //on recupère la référence de caise
                      $prenomClient = $_GET['prenomClient']; //on recupère le prénom du client
                      $nomClient = $_GET['nomClient']; //de même pour le nom
                      $mailClient = $_GET['mailClient']; //idem pour l'émail
                      $societeClient = $_GET['societeClient']; //idem pour la société

                      /*on recupère aussi l'id de la vente à partir de la 
                       référence de caise et de l'idUE*/
                      $getCodeVente = $bdd->prepare("SELECT * FROM vente_for_user WHERE reference_caise = ? AND id_UE_fact = ? ");
                      $getCodeVente->execute(array($refcaise, $idUE));

                      $fetchIdVente = $getCodeVente->fetch();

                      $idvente = $fetchIdVente['id_fact']; //on recupère l'id

                      $echeance = $_GET['echeance']; //on recupère la date de l'échéance
                      $date = $_GET['date']; 




                      //Code PHP pour insertion des articles dans la facturation
                      if(isset($_POST['select_art']))
                      {
                        if(!empty($_POST['lib_article']) AND !empty($_POST['prix_article']) AND !empty($_POST['code_article']) AND !empty($_POST['stock_article']))
                        {

                          $lib_article = htmlspecialchars($_POST['lib_article']);
                          $prix_article = htmlspecialchars($_POST['prix_article']); 
                          $code_article = htmlspecialchars($_POST['code_article']); 
                          $stock_article = htmlspecialchars($_POST['stock_article']);

                          //on recupère l'id de l'article à partir du code article et idUE
                          $getIdArt = $bdd->prepare("SELECT * FROM article_for_user WHERE code_art = ? AND idUE_art = ? ");
                          $getIdArt->execute(array($code_article, $idUE));

                          $fethArtid =  $getIdArt->fetch();

                          $id_art_fact = $fethArtid['id_art'];
                          $prix_hors_tva = $fethArtid['prix_vente_HTVA_art'];
                          $montant_tva = $fethArtid['montant_TVA_art'];
                          $taux_tva = $fethArtid['tva_art'];

                          /*on vérifie si l'article existe déjà dans la table de facturation
                          pour juste incrémenter la quantité */
                          $verifQuant = $bdd->prepare("SELECT * FROM facturation_for_user WHERE id_art_fact = ? AND id_vente_fact = ? ");
                          $verifQuant->execute(array($id_art_fact, $idvente));

                          $factCount = $verifQuant->rowCount();
                          $factFetch = $verifQuant->fetch();

                          if($factCount == 1)
                          {
                            //on augmente la quantité à + 1 
                            $quantitIn =  $factFetch['quantite_art_fact'];
                            $quantitUp = $quantitIn + 1;
                            //on diminue le stock par rapport à la quantité
                            $stockIn = $factFetch['stock_restant_fact'] - $quantitUp;
                            $stockUp = $stockIn - $quantitUp;

                            $Updatefact = $bdd->prepare("UPDATE facturation_for_user SET quantite_art_fact = ?, stock_restant_fact = ? WHERE id_art_fact = ? AND id_vente_fact = ?");
                            $Updatefact->execute(array($quantitUp, $stockUp, $id_art_fact, $idvente));
                          }
                          else
                          {
                            //on diminue le stock
                            $quant = 1;
                            $stockRest = $stock_article - $quant; 

                            $prix_vente = str_replace(",",".",$prix_article);

                            //$prix_vente1 = number_format($prix_article, 2, '.', '');

                            //echo $prix_vente1;
                            //echo $prix_article;

                            $insertFact = $bdd->prepare("INSERT INTO facturation_for_user(id_vente_fact, id_art_fact, code_art_fact, libelle_art_fact, prix_unit_art_fat, quantite_art_fact, stock_restant_fact, prix_hors_tva_fact, montant_tva_fact, taux_tva_fact) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                            $insertFact->execute(array($idvente, $id_art_fact, $code_article, $lib_article, $prix_vente, $quant, $stockRest, $prix_hors_tva, $montant_tva, $taux_tva));

                            /*header("location:addVente.php?id=".$getid."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refcaise."&prenomClient=".$prenomClient."&nomClient=".$nomClient."&mailClient=".$mailClient."&societeClient=".$societeClient);*/
                            }
                          } 
                          else
                          {
                            $erreurart = "Veuillez sélectionner un article S.V.P !";
                          } 
                        }



                        //Mis à jour de la quantité
                        if(isset($_POST['valider_qt']))
                        {
                          if(!empty($_POST['code_art']) AND !empty($_POST['lib_art']))
                          {
                            $code_art = htmlspecialchars($_POST['code_art']);
                            $lib_art = htmlspecialchars($_POST['lib_art']);
                            $qt_article = htmlspecialchars($_POST['qt_article']);

                            //on recupère la quantité 
                            $getQt = $bdd->prepare("SELECT * FROM facturation_for_user WHERE code_art_fact = ? AND id_vente_fact = ? "); 
                            $getQt->execute(array($code_art, $idvente));

                            $takeqt = $getQt->fetch();

                            $existqt = $takeqt['quantite_art_fact'];

                            $updateQt = $existqt + $qt_article; //on rajoute la quantité

                            $updateArtfct = $bdd->prepare("UPDATE facturation_for_user SET quantite_art_fact = ? WHERE code_art_fact = ? AND id_vente_fact = ?");
                            $updateArtfct->execute(array($updateQt, $code_art, $idvente));

                           /* header("location:addVente.php?id=".$getid."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refcaise."&prenomClient=".$prenomClient."&nomClient=".$nomClient."&mailClient=".$mailClient."&societeClient=".$societeClient);*/
                          }
                          else
                          {
                            $errorft = "Veuillez d'abord sélectionner l'article S.V.P !";
                          }
                        }



                        //Suppression de l'article dans la facture
                        if(isset($_POST['delete_art']))
                        {
                          if(!empty($_POST['code_art']) AND !empty($_POST['lib_art']))
                          {
                            $code_art = htmlspecialchars($_POST['code_art']);
                            $lib_art = htmlspecialchars($_POST['lib_art']);
                            $qt_article = htmlspecialchars($_POST['qt_article']);

                            $updateArtfct = $bdd->prepare("DELETE FROM facturation_for_user WHERE code_art_fact = ? AND id_vente_fact = ?");
                            $updateArtfct->execute(array($code_art, $idvente));
                          }
                          else
                          {
                            $errorft = "Veuillez d'abord sélectionner l'article S.V.P !";
                          }
                        }


                        //Enregistrement et annulation de la vente
                        if(isset($_POST['saveVente']))
                        {
                          $Apayer = htmlspecialchars($_POST['Apayer']);
                          $Montpaye = htmlspecialchars($_POST['Montpaye']);

                          //header("location:./tests/test1.php");
                         $UpadateVente = $bdd->prepare("UPDATE vente_for_user SET prix_unit_fact = ?, paiemant_recu_fact = ? WHERE id_fact = ? AND id_UE_fact = ? ");
                          $UpadateVente->execute(array($Apayer, $Montpaye, $idvente, $idUE));

                          header("location:factureVente.php?id=".$getid."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refcaise."&prenomClient=".$prenomClient."&nomClient=".$nomClient."&mailClient=".$mailClient."&societeClient=".$societeClient."&echeance=".$echeance."&idvente=".$idvente."&date=".$date);
                        }

                  ?>


    <nav class="navbar navbar-expand-md sticky-top navbar-dark bg-primary flex-md-nowrap p-0">
        <div class="container">
            <img src="../img/K@Online-sans.png" class="img-fluid" alt="Responsive image" width="100" height="100">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="accueille.php?id=<?php echo $getid; ?>"> 
                            <span class="sr-only">(current)</span>
                            <span class="step size-32">
                                <i class="icon ion-ios-home-outline"></i>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <span class="sr-only"></span>
                            <span class="step size-32">
                                <i class="icon ion-ios-email-outline"></i>
                            </span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <span class="sr-only"></span>
                            <span class="step size-32">
                                <i class="icon ion-ios-gear-outline"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="float-right">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <img src="../profil/<?php echo $getprofil; ?>.jpg" class="img-thumbnail" alt="" height="40" width="40"> 
                    </li>
                     <li class="nav-item dropdown">
                        <h6>
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                 <?php echo $getprenom. " " .$getname; ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    <img width="30" height="30" class="icone" src="../png/512/ios7-contact-outline.png">
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="deconnexion.php">
                                    <img width="30" height="30" class="icone" src="../png/512/log-out.png">
                                    Deconnexion
                                </a>
                            </div>
                        </h6>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

         <!--*****************************************************-->
         <div class="container-fluid">

              <?php  

                if(isset($_POST['addcatser']))
                {
                  if(!empty($_POST['libelleser']))
                  {
                    $libelleser = htmlspecialchars($_POST['libelleser']);

                    $insertser = $bdd->prepare("INSERT INTO categorie_service(lib_cat_ser, id_UE_ser) VALUES(?, ?)");
                    $insertser->execute(array($libelleser, $idUE));
                  }
                }

                if(isset($_POST['searchcatart']))
                {
                  $libellerech = htmlspecialchars($_POST['libsearchcatart']);
                  /*juste pour afficher le cotenue dans l'inpute de recherche 
                  mais l'exécution réel se fais au dessous
                  raison pour laquelle j'ai dupluqué le if */
                }
              ?>
          
                  <br>
                  <div class="card">
                    <div class="card-header">
                      <h6><strong>Créer une nouvelle Vente/Facture</strong></h6>
                    </div>
                    <div class="card-body">
                       <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nom du Client</label>
                                  <div class="input-group mb-3">
                                    <input name="lib_article" type="text" class="form-control" value="<?php echo $prenomClient; echo " "; echo $nomClient; ?>" disabled="">
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="exampleInputEmail1">Nom de la Société</label>
                                  <div class="input-group mb-3">
                                    <input name="lib_article" type="text" class="form-control" value="<?php echo $societeClient; ?>" disabled="">
                                  </div>
                                </div>
                              </div>
                              
                              <div class="col-md-3">
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Date</label>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date" value="<?php echo $date; ?>" disabled>
                                            <div class="input-group-prepend">
                                            </div>
                                        </div>
                                  </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Echéance</label>
                                        <div class="input-group mb-3">
                                            <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date_echeance" value="<?php echo $echeance; ?>" disabled>
                                            <div class="input-group-prepend">
                                            </div>
                                        </div>
                                  </div>
                              </div>
                            </div>

                       <div class="card form_card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-6">
                                <section class="section1">
                                        <div class="container-tab1">
                                          <table id="table_facture" >
                                            <thead>
                                              <tr class="header">
                                                <th title="Code article">
                                                  Code
                                                  <div>Code</div>
                                                </th>
                                                <th>
                                                  Article
                                                  <div>Article</div>
                                                </th>
                                                <th>
                                                  PU
                                                  <div>Prix TTC</div>
                                                </th>
                                                <th>
                                                  Quantité
                                                  <div>Quantité</div>
                                                </th><th>
                                                  Total
                                                  <div>Total</div>
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody class="tbody_striped tbody_fac" id="tbody_fac"> 
                                              <?php
                                                    $viewfact = $bdd->prepare("SELECT * FROM facturation_for_user WHERE id_vente_fact = ?"); 
                                                    $viewfact->execute(array($idvente));

                                                    while($rows = $viewfact->fetch()) 
                                                      {
                                                   ?>   
                                                      <tr title="" >
                                                          <td class="text-left"><?php echo $rows['code_art_fact']; ?></td>
                                                          <td class="text-left"><?php echo utf8_encode($rows['libelle_art_fact']); ?></td>
                                                          <td class="text-right"><?php echo number_format($rows['prix_unit_art_fat'], 2, '.', ''); ?></td>
                                                          <td class="text-center"><?php echo $rows['quantite_art_fact']; ?>
                                                          </td>
                                                          <td class="text-right"><?php echo number_format(($rows['prix_unit_art_fat'] * $rows['quantite_art_fact']), 2, '.', ''); ?>
                                                          </td>
                                                        </tr>
                                                    <?php } ?>

                                            </tbody>
                                          </table>
                                        </div>
                                      </section>

                                        
                                      <form action="" method="post">
                                         <div class="p-3 mb-2 bg-secondary text-white">
                                            <div class="row">
                                              <div class="col-md-5">
                                                <div class="input-group mb-3">
                                                  <div class="input-group mb-3">
                                                    <div class="input-group-prepend" title="Quantité">
                                                      <span class="input-group-text" id="basic-addon1">Qté</span>
                                                    </div>
                                                    <input type="number" class="form-control text-right" aria-label="Username" aria-describedby="basic-addon1" id="qt_article" value="1" name="qt_article" title="augmenter ou diminuer">
                                                    <div class="input-group-append">
                                                      <button class="btn btn-success" type="submit" title="valider" name="valider_qt">
                                                        <span class="step size-21">
                                                          <i class="icon ion-android-done"></i>
                                                        </span>&nbsp;&nbsp;
                                                      </button>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>

                                              <div class="col-md-2">
                                                <div class="input-group mb-3">
                                                  &nbsp;&nbsp;
                                                  <button type="submit" class="btn btn-danger" title="supprimer" name="delete_art">
                                                    <span class="step size-21">
                                                        <i class="icon ion-android-delete"></i>
                                                    </span>
                                                    &nbsp;&nbsp;
                                                  </button>
                                                </div>
                                              </div>

                                                <?php

                                                    $totalprix = $bdd->prepare("SELECT SUM(prix_unit_art_fat * quantite_art_fact) AS prix_total FROM facturation_for_user WHERE id_vente_fact = ? ");
                                                    $totalprix->execute(array($idvente));

                                                    $prix_total = $totalprix->fetch();

                                                    $total = number_format($prix_total['prix_total'], 2, '.', '');

                                                ?>

                                              <div class="col-md-5">
                                                <div class="input-group mb-3">
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Total TTC</span>
                                                  </div>
                                                  <input type="text" class="form-control text-right" aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $total; ?>" disabled="">
                                                </div>
                                              </div>
                                            </div>

                                            <div class="row">
                                             <div class="col-md-6">
                                               <div class="input-group mb-3">
                                                    <input name="code_art" id="code_art" type="text" class="form-control" placeholder="Code" readonly="">

                                                    <input name="lib_art" id="lib_art" type="text" class="form-control" placeholder="Libellé" readonly="">
                                                  </div>
                                             </div>
                                             <div class="col-md-6">
                                                <?php
                                                      if(isset($errorft))
                                                      {
                                                      ?>
                                                      <div class="alert alert-danger text-center" role="alert">
                                                        <h6><?php echo $errorft; ?></h6>
                                                      </div>
                                                    <?php } ?>
                                             </div>
                                           </div>
                                         </div>
                                      </form>
                              </div>
                              <div class="col-md-6">
                                  <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><h6>Mes articles</h6></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><h6>Mes services</h6></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#home4" role="tab"><h6>Nouvel article</h6></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#home5" role="tab"><h6>Nouveau service</h6></a>
                                    </li>
                                  </ul>

                                  <div class="tab-content" role="tablist">
                                    <div class="tab-pane fade show active p-3 mb-2 bg-white text-dark" id="home2" role="tabpanel">

                                      <section class="">
                                        <div class="container-tab">
                                          <table id="table_article">
                                            <thead>
                                              <tr class="header">
                                                <th title="Code article">
                                                  Code
                                                  <div title="Code article">Code</div>
                                                </th>
                                                <th>
                                                  Libellé
                                                  <div>Libellé</div>
                                                </th>
                                                <th>
                                                  Catégorie
                                                  <div>Catégorie</div>
                                                </th>
                                                <th>
                                                  Prix TTC
                                                  <div>Prix TTC</div>
                                                </th><th>
                                                  Stock
                                                  <div>Stock</div>
                                                </th>
                                              </tr>
                                            </thead>
                                            <tbody class="tbody_striped tbody_article" id="tbody_article">
                                               <?php
                                                  $view = $bdd->prepare("SELECT * FROM article_for_user WHERE idUE_art = ? ORDER BY categorie_art");
                                                  $view->execute(array($idUE));
                                                  $i = 1;

                                                  while($row = $view->fetch()) 
                                                      {
                                                   ?>   
                                                      <tr title="Sélectioner l'article <?php echo utf8_encode($row['libelle_art']); ?>">
                                                          <td><?php echo $row['code_art'];?></td>
                                                          <td class="text-left"><?php echo utf8_encode($row['libelle_art']); ?></td>
                                                          <td class="text-left"><?php echo utf8_encode($row['categorie_art']); ?>
                                                          </td>
                                                          <td class="text-right"><?php echo number_format($row['prix_vente_TTC'], 2, ',', ''); ?>
                                                          </td>
                                                          <td class="text-center"><?php echo utf8_encode($row['stock_actuel_art']); ?>
                                                          </td>
                                                        </tr>
                                                    <?php } ?>
                                            </tbody>
                                          </table>
                                        </div>
                                      </section>
                                      
                                      

                                        <form action="" method="post">
                                        <div class="p-3 mb-2 bg-info text-white">
                                          <div class="row">
                                            <div class="col-md-6">
                                              <div class="input-group mb-3">
                                                <input name="lib_article" id="lib_articles" type="text" class="form-control" placeholder="Libellé" readonly="">

                                                <input name="code_article" id="code_articles" type="text" class="form-control" placeholder="Code" readonly="">
                                              </div>
                                            </div>
                                            <div class="col-md-6">
                                              <div class="input-group mb-3">
                                                <input name="prix_article" id="prix_articles" type="texte" class="form-control" placeholder="Prix Unitaire" readonly="">

                                                <input name="stock_article" id="stock_articles" type="text" class="form-control" placeholder="Sctock"  readonly="">
                                              </div>
                                          </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-md-6">
                                              <?php
                                              if(isset($erreurart))
                                                {
                                                ?>
                                                <div class="alert alert-danger text-center" role="alert">
                                                  <?php echo $erreurart; ?>
                                                </div>
                                              <?php } ?>
                                            </div>
                                              
                                            <div class="col-md-6">
                                              <div class="input-group mb-3">
                                                <button type="submit" id="add_article" class="btn btn-info btn-block"  name="select_art">
                                                            Insérer
                                                </button>
                                            </div>
                                            </div>
                                          </div>
                                        </form>
                                    </div>

                                    <div class="tab-pane fade" id="home3" role="tabpanel">

                                    </div>
                                    <div class="tab-pane fade" id="home4" role="tabpanel">

                                    </div>
                                    <div class="tab-pane fade" id="home5" role="tabpanel">

                                    </div>
                                  </div>
                                  
                              </div>
                            </div>
                          </div>
                    </div>  <!--Fin cardform-->

                          <form class="myForm" action="" method="post">
                            <div class="p-3 mb-2 bg-light text-dark div_footer">
                              <div class="row">
                                <div class="col-md-3">
                                  <div class="form-group">
                                   <label for="exampleFormControlInput1">Remise : </label>&nbsp;&nbsp;
                                   <div class="custom-control custom-radio custom-control-inline">
                                      <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input devise" checked="true" onclick="changeDeviseUE();">
                                      <label class="custom-control-label" for="customRadioInline1">FC</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                      <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input pourcentage" onclick="changeDevise();">
                                      <label class="custom-control-label" for="customRadioInline2">%</label>
                                    </div>
                                   <div class="input-group mb-3">
                                    <input type="number" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="remise" value="">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="legende_device_pour">FC</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">A payer</label>
                                    <div class="input-group mb-3">
                                      <input type="number" class="form-control text-right" id="Apayer" name="Apayer" step="0.01" readonly=""  >
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">FC</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-3">
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Montant payé</label>
                                    <div class="input-group mb-3">
                                      <input type="number" class="form-control text-right" placeholder="0.00" name="Montpaye" step="0.01" required="">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">FC</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <div class="row">
                                    <div class="col-md-6">
                                       <label for="exampleFormControlInput1">&nbsp;</label>
                                      <button type="submit" class="btn btn-primary btn-block" name="saveVente">
                                          <span class="step size-21">
                                            <i class="icon ion-android-done"></i>
                                          </span>
                                            &nbsp;&nbsp;&nbsp;Valider
                                      </button>
                                    </div>
                                    <div class="col-md-6">
                                      <label for="exampleFormControlInput1">&nbsp;</label>
                                      <a class="btn btn-danger btn-block" href="#" role="button">
                                        <span class="step size-21">
                                          <i class="icon ion-ios-undo"></i>
                                        </span>
                                          &nbsp;&nbsp;&nbsp;Annuler</a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </form>
                       </div>       
                    </div>

          </div>
      </div>
    </div>
        <!--*****************************************************-->
        <br><br>
    
        <!-- Bootstrap JS -->

       <script src="../asserts/js/vendor/jquery-slim.min.js"></script>
        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/dropdown.js"></script>
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>
        <script src="//asserts/js/jquery/jquery-3.3.1.js"></script>

        <script type="text/javascript">

           var Apayer = document.getElementById("Apayer");
           Apayer.value = "<?php echo $total; ?>";

            var table_article = document.getElementById("table_article"),rIndex;

            for(var i = 1; i < table_article.rows.length; i++)
            {
              table_article.rows[i].onclick = function()
              {
                rIndex = this.rowsIndex;
                document.getElementById("code_articles").value = this.cells[0].innerHTML;
                document.getElementById("lib_articles").value = this.cells[1].innerHTML;
                document.getElementById("prix_articles").value = this.cells[3].innerHTML;
                document.getElementById("stock_articles").value = this.cells[4].innerHTML;
              };
            }

              /**********************************/

              function selectfact()
              {
                for(var i = 1; i < table_facture.rows.length; i++)
                {
                  table_facture.rows[i].onclick = function()
                  {
                    rIndex = this.rowsIndex;
                    document.getElementById("qt_article").value = this.cells[2].innerHTML;
                  };
                }
              }

            var table_facture = document.getElementById("table_facture");

            for(var i = 1; i < table_facture.rows.length; i++)
            {
              table_facture.rows[i].onclick = function()
              {
                rIndex = this.rowsIndex;
                document.getElementById("code_art").value = this.cells[0].innerHTML;
                document.getElementById("lib_art").value = this.cells[1].innerHTML;
              };
            }

            function calcul_remise(event)
            {

              var remise = $('input[name="remise"]').val();
              var Apayer = "<?php echo $total; ?>";
              var devise = $('.devise');
              var pourcentage = $('.pourcentage');
              
              if(event.target.name=='remise')
                {
                  if(pourcentage.is(':checked')) //on vérifie si l'utilisateur à cliquer sur devise
                  {
                      var paie = parseFloat(Apayer.replace(',', '.')); //on essaye de remplacer la virgule par le point
                      var temp = (remise/100).toFixed(2);
                      var montant = (paie * temp).toFixed(2);
                      var resultat = (paie - montant).toFixed(2);
                      $('input[name="Apayer"]').val(resultat);
                  }
                  if(devise.is(':checked'))
                  {
                     var paie = parseFloat(Apayer.replace(',', '.'));
                     var montant = (paie - remise).toFixed(2);
                     $('input[name="Apayer"]').val(montant);
                  }
                }
              }
            
            //lorsqu'on click sur le radio % on change directement la légende à côte de l'input
            function changeDevise()
            {
              document.getElementById('legende_device_pour').innerHTML = "%";
            }

            //idem pour la dévise
            function changeDeviseUE()
            {
              document.getElementById('legende_device_pour').innerHTML = "FC"; //la valeur à récupérer après dans PHP
            }

            $(function() // jQuery
            {
              $('.myForm').bind('keyup mouseup', calcul_remise); // appel de la fonction de calcul lors d'un événement 'keyup' ou 'mouseup'
            });

           /* for(var i = 1; i < table_facture.rows.length; i++)
            {
              table_facture.rows[i].onclick = function()
              {
                rIndex = this.rowsIndex;
                table_facture.rows[i].style.backgroundColor = "yellow";
              };
            }*/

           

            /*function add_Article_in_facture()
            {
              
              var newRow = table_facture.insertRow(table_facture.length), 
                  cell0 = newRow.insertCell(0),
                  cell1 = newRow.insertCell(1),
                  cell2 = newRow.insertCell(2),
                  cell3 = newRow.insertCell(3),
                  lib_articles = document.getElementById("lib_articles").value,
                  prix_articles = document.getElementById("prix_articles").value,
                  quantite_article = document.getElementById("qt_article").value, 

                  prix_articles_cal = parseFloat(prix_articles.replace(',', '.')),

                  total_article = prix_articles_cal * quantite_article,
                  t_art = total_article.toFixed(2);

                  cell0.innerHTML = lib_articles;
                  cell1.innerHTML = prix_articles;
                  cell2.innerHTML = quantite_article;
                  cell3.innerHTML = t_art;

                  selectfact();
            }*/
      
        </script>
    <!--fin body-->
    </body>
<!--fin html-->
</html>
<?php
}  
else
{
  header('location:deconnexion.php');
}
?>
