<!doctype html>
<!--Début html-->
<?php session_start(); ?>
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

         <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">

        <title>KEDIS ONLINE | Mes ventes | étapes 2</title>
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
          height: 270px;
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

        #table_article td + td, #table_service td + td {
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

        .tbody_article tr:nth-child(even) {background-color: #d1ecf1;}

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

      .vente
      {
        background-color: #d1ecf1;
      }

      .body-modal-article
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

    </style>

        <!--Code PHP-->
                <?php 

                   include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['refcaise']) AND isset($_GET['prenomClient']) AND isset($_GET['idClient']))  //si la variable id qu'on a transité existe dans l'url 
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
                      $login_required = $userfos['login_required'];

                      //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                      if($login_required == 1)
                      {

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
                        $dates = $_GET['date']; 


                        $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                        $getDevise->execute(array($idUE));
                        $fetchDevise = $getDevise->fetch();
                        $devise = $fetchDevise['deviseUE'];



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


          <!--on inlus la la barre de navigation au dessus-->
          <?php  include('navbar.php'); ?>

         <!--*****************************************************-->
         <div class="container-fluid"> 
        <div class="row">
           <!--on inlus la navigation du menu -->
            <?php include('navigation.php'); ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Mes ventes</h1>
                <!--<div class="btn-toolbar mb-2 mb-md-0">
                  <a class="btn btn-sm btn-outline-info" href="vente.php?id=<?php echo $getid; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>" role="button" title="RETOUR A LA PAGE PRECEDENTE">
                    <span class="step size-32">
                        <i class="icon ion-arrow-left-a"></i>
                    </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </a>
                </div>-->
              </div>

              <!--les modales -->

              <!--debut modale new article-->
              <div class="modal fade bd-example-modal-lg ajouter-article" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <h6 class="modal-title" id="exampleModalLabel">Ajouter un nouvel article</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body body-modal-article">

                        <div class="card form_card">
                          <div class="card-body">
                            <h6 class="card-title">Informations</h6>
                            <hr>

                               <div class="row">
                                <div class="col-md-12">
                                  <label for="lib_article">Libellé</label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Entrer le libellé ou la désignation de l'article" name="lib_article" id="lib_article" required="">
                                  </div>
                                </div>
                              </div>

                              <?php

                                  $reqcatart = $bdd->prepare("SELECT * FROM categorie_article WHERE id_UE_art = ?");
                                  $reqcatart->execute(array($idUE));
                              ?>

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="cat_article">Catégorie</label>
                                  <div class="input-group mb-3">
                                    <select class="form-control" name="cat_article" id="cat_article">
                                      <option value="" selected="">Sélectionner une catégorie d'articles</option>
                                      <?php
                                          while($categorie = $reqcatart->fetch()) 
                                          {
                                      ?>
                                      <option value="<?php echo $categorie['libelle_cat_art']; ?>"><?php echo $categorie['libelle_cat_art']; ?></option>
                                      <?php }?>
                                    </select>
                                  </div>
                                </div>

                                <?php

                                    $reqscatart = $bdd->prepare("SELECT * FROM sous_categorie_article WHERE   id_s_UE_art = ?");
                                    $reqscatart->execute(array($idUE));
                                ?>

                                <div class="col-md-6">
                                    <label for="sous_cat_article">Sous-catégorie</label>
                                    <select class="form-control" name="sous_cat_article" id="sous_cat_article">
                                      <option value="" selected="">Sélectionner une sous-catégorie d'articles</option>
                                      <?php
                                          while($scategorie = $reqscatart->fetch()) 
                                          {
                                      ?>
                                      <option value="<?php echo $scategorie['libelle_s_cat_art']; ?>"><?php echo $scategorie['libelle_s_cat_art']; ?></option>
                                      <?php }?>
                                    </select>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <label for="unite_article">Unité</label>
                                  <select class="form-control" id="unite_article" name="unite_article">
                                    <option value="" selected="">Sélectionner une unité </option>
                                    <option value="Aucune">Aucune</option>
                                    <option value="Litre">Litre</option>
                                    <option value="Kilo">Kilo</option>
                                  </select>
                                </div>
                                <div class="col-md-6">
                                  <label for="expiration_article">Expiration</label>
                                  <div class="input-group mb-3">
                                    <input type="number" class="form-control text-right" required="" name="expiration_article" placeholder="0" required="" id="expiration_article">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Jours</span>
                                    </div>
                                  </div>
                                </div>
                              </div>

                          </div>
                        </div>

                        <br>

                        <form id="modal-form">
                          <div class="card form_card">
                            <div class="card-body">
                              <h6 class="card-title">Transaction</h6>
                              <hr>
                                <div class="form-group">
                                  <label for="prix_achat_article">Prix d'achats</label>
                                  <div class="input-group mb-3">
                                    <input type="number" class="form-control text-right" placeholder="0.00" name="prix_achat_article" step="0.01" id="prix_achat_article">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><?php echo $devise; ?></span>
                                    </div>
                                  </div>
                                </div>

                                 <div class="row">
                                  <div class="col-md-6">
                                    <label for="prix_ht">Prix de vente HTVA</label>
                                    <div class="input-group mb-3">
                                      <input name="prix_ht" type="number" class="form-control text-right" placeholder="0.00" step="0.01" id="prix_ht">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo $devise; ?></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <label for="taux_tva">Taux TVA</label>
                                    <div class="input-group mb-3">
                                      <input name="taux_tva" type="number" class="form-control text-right" value="20.00" step="0.01" id="taux_tva">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">%</span>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="prix_ttc">Prix de vente TTC</label>
                                    <div class="input-group mb-3">
                                      <input name="prix_ttc" type="number" placeholder="0.00" class="form-control text-right" step="0.01" id="prix_ttc">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo $devise; ?></span>
                                      </div>
                                    </div>
                                </div>

                            </div>
                          </div>
                        </form>

                        <br>

                        <div class="card form_card">
                          <div class="card-body">
                            <h6 class="card-title">Stock</h6>
                            <hr>
                              <div class="form-group">
                                <label for="stock_article">Stock actuel</label>
                                <input type="number" class="form-control text-right"  placeholder="0" name="stock_article" required="" id="stock_article">
                              </div>
                          </div>
                        </div>

                        <br>
                        <div class="card form_card">
                          <div class="card-body">
                            <h6 class="card-title">Fournisseur</h6>

                            <?php

                              $reqfourn = $bdd->prepare("SELECT * FROM fournis_for_user WHERE idUE_four = ? ");
                              $reqfourn->execute(array($idUE));

                            ?>
                            <hr>
                              <label>Fournisseur</label>
                              <div class="input-group mb-3">
                                <select class="form-control" name="fournisseur_article" id="fournisseur_article">
                                  <option value="" selected="">Sélectionner un fournisseur</option>
                                  <?php
                                      while($fournis = $reqfourn->fetch()) 
                                      {
                                  ?>
                                  <option value="<?php echo $fournis['prenom_four']." ".$fournis['nom_four']; ?>"><?php echo $fournis['prenom_four']." ".$fournis['nom_four']; ?></option>
                                  <?php }?>
                                </select>
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
                        <h6 class="modal-title" id="exampleModalLabel">Ajouter un nouveau service</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <div class="modal-body body-modal-article">

                       <div class="card form_card">
                        <div class="card-body">
                          <h6 class="card-title">Informations</h6>
                          <hr>

                             <div class="row">
                              <div class="col-md-6">
                                <label for="lib_ser">Désignation</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" id="lib_ser" placeholder="Entrer le libellé ou la désignation du service" name="lib_ser" required="">
                                </div>
                              </div>

                            <?php

                                $reqcatart = $bdd->prepare("SELECT * FROM categorie_service WHERE id_UE_ser = ?");
                                $reqcatart->execute(array($idUE));
                            ?>

                              <div class="col-md-6">
                               <label>Catégorie</label>
                                <div class="input-group mb-3">
                                  <select class="form-control" id="cat_ser" name="cat_ser">
                                    <?php
                                        while($categorie = $reqcatart->fetch()) 
                                        {
                                    ?>
                                    <option value="<?php echo $categorie['lib_cat_ser']; ?>" selected=""><?php echo $categorie['lib_cat_ser']; ?></option>
                                    <?php }?>
                                  </select>
                                </div>
                              </div>
                            </div>

                              <div class="form-group">
                                <label for="remarque_ser">Remarques</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" id="remarque_ser" placeholder="Entrer une remarque pour le service" name="remarque_ser" required="">
                                </div>
                              </div>

                        </div>
                      </div>

                      <br>
                       <form id="modal-form1">
                         <div class="card form_card">
                          <div class="card-body">
                            <h6 class="card-title">Transaction</h6>
                            <hr>

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="prix_ht_s">Prix de vente HTVA</label>
                                  <div class="input-group mb-3">
                                    <input name="prix_ht_s" type="number" class="form-control text-right" placeholder="0.00" step="0.01" id="prix_ht_s">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><?php echo $devise; ?></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="taux_tva_s">Taux TVA</label>
                                  <div class="input-group mb-3">
                                    <input name="taux_tva_s" type="number" class="form-control text-right" value="20.00" step="0.01" id="taux_tva_s">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">%</span>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label for="prix_ttc_s">Prix de vente TTC</label>
                                  <div class="input-group mb-3">
                                    <input name="prix_ttc_s" type="number" placeholder="0.00" class="form-control text-right" step="0.01" id="prix_ttc_s">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><?php echo $devise; ?></span>
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


              <div class="card">
                <div class="card-header">
                  <h6><strong>Créer une nouvelle Vente/Facture</strong></h6>
                </div>

                <!--début card body-->
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill">
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#"><strong>Etape 1 : sélection client 
                          <span class="badge badge-success badge-pill">
                            <span class="step size-21">
                                <i class="icon ion-checkmark-circled"></i>
                            </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </span></strong>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="#"><strong>Etape 2 : Désignation</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#"><strong>Etape 3 : établissement facture</strong></a>
                      </li>
                    </ul>

                    <br>
                    <!--début card-body 2-->
                    <div class="card">
                      <div class="card-body">
                        <!--Début row 1-->
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
                        <!--Fin row 1-->

                        <!--Début form_card-->
                        <div class="card form_card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-7">
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
                                            Désignation
                                            <div>Désignation</div>
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
                                        

                                      </tbody>
                                    </table>
                                  </div>
                                </section>
     
                                <!--<form action="" method="post">-->
                                   <div class="p-3 mb-2 bg-secondary text-white">
                                      <div class="row">
                                        <div class="col-md-5">
                                          <div class="input-group mb-3">
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend" title="Quantité">
                                                <span class="input-group-text" id="basic-addon1">Qté</span>
                                              </div>
                                              <input type="text" class="form-control" aria-label="Username" aria-describedby="basic-addon1" id="qt_article" name="qt_article" title="augmenter ou diminuer">
                                              <div class="input-group-append">
                                                <button class="btn btn-info" type="submit" title="Diminuer la quantité" name="remove_qt" id="remove_qt">
                                                  <span class="step size-21">
                                                    <i class="icon ion-android-remove"></i>
                                                  </span>&nbsp;&nbsp;
                                                </button>
                                                <button class="btn btn-success" type="submit" title="Augmenter la quantité" name="add_qt" id="add_qt">
                                                  <span class="step size-21">
                                                    <i class="icon ion-android-add"></i>
                                                  </span>&nbsp;&nbsp;
                                                </button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="col-md-2">
                                          <div class="input-group mb-3">
                                            &nbsp;&nbsp;
                                            <button type="submit" class="btn btn-danger" title="Supprimer un élément" name="delete_art" id="delete_art">
                                              <span class="step size-21">
                                                  <i class="icon ion-android-delete"></i>
                                              </span>
                                              &nbsp;&nbsp;
                                            </button>
                                          </div>
                                        </div>

                                        <div class="col-md-5">
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">Total TTC</span>
                                            </div>
                                            <input type="text" class="form-control text-right" aria-label="Username" aria-describedby="basic-addon1" id="total_ttc" disabled="">
                                          </div>
                                        </div>
                                      </div>

                                      <div class="row">
                                       <div class="col-md-7">
                                         <div class="input-group mb-3">
                                              <input name="code_art" id="code_art" type="text" class="form-control" placeholder="Code" readonly="">

                                              <input name="lib_art" id="lib_art" type="text" class="form-control" placeholder="Libellé" readonly="">
                                            </div>
                                       </div>
                                       <div class="col-md-6">
                                       </div>
                                     </div>
                                   </div>
                                <!--</form>-->

                              </div>
                              <div class="col-md-5">
                                  <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><h6>Mes articles</h6></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><h6>Mes services</h6></a>
                                    </li>
                                  </ul>

                                  <div class="tab-content" role="tablist">
                                    <div class="tab-pane fade p-3 mb-2 bg-white text-dark show active" id="home2" role="tabpanel">
                                        <div class="row">
                                          <div class="col-md-4">
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".ajouter-article">Ajouter</button>
                                          </div>
                                          <div class="col-md-8">

                                              <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Rechercher un article" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libsearchcatart" id="libsearchcatart">
                                                <div class="input-group-append">
                                                </div>
                                              </div>

                                          </div>
                                        </div>

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
                                                </tr>
                                              </thead>
                                              <tbody class="tbody_striped tbody_article" id="tbody_article">

                                                <!--le tableau des articles sont traités avec ajax jquery-->

                                              </tbody>
                                            </table>
                                          </div>
                                        </section>
                                        
                                        <!--<form action="" method="post">-->
                                          <div class="p-3 mb-2 bg-info text-white">
                                            <div class="input-group mb-3">
                                              <input name="code_article" id="code_articles" type="text" class="form-control" placeholder="Code" readonly="">

                                              <input name="lib_article" id="lib_articles" type="text" class="form-control" placeholder="Libellé" readonly="">
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                              
                                            <div class="col-md-6">
                                              <div class="input-group mb-3">
                                                <button type="submit" id="add_article" class="btn btn-info btn-block"  name="select_art">
                                                            Insérer
                                                </button>
                                            </div>
                                            </div>
                                          </div>
                                        <!--</form>-->
                                      </div>

                                    <div class="tab-pane fade p-3 mb-2 bg-white text-dark" id="home3" role="tabpanel">
                                      <div class="row">
                                        <div class="col-md-4">
                                          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".ajouter-service">Ajouter</button>
                                        </div>
                                        <div class="col-md-8">
                                          <form method="post" action="">
                                            <div class="input-group mb-3">
                                              <input type="text" class="form-control" placeholder="Rechercher un service" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libsearchcatart1" id="libsearchcatart1" required="">
                                            </div>
                                          </form>
                                        </div>
                                      </div>

                                      <section class="">
                                          <div class="container-tab">
                                            <table id="table_service">
                                              <thead>
                                                <tr class="header">
                                                  <th title="Code service">
                                                    Code
                                                    <div title="Code service">Code</div>
                                                  </th>
                                                  <th>
                                                    Libellé
                                                    <div>Libellé</div>
                                                  </th>
                                                </tr>
                                              </thead>
                                              <tbody class="tbody_striped tbody_article" id="tbody_service">

                                                 <!--le tableau des services sont traités avec ajax jquery-->

                                              </tbody>
                                            </table>
                                          </div>
                                        </section>
                                        
                                        <!--<form action="" method="post">-->
                                          <div class="p-3 mb-2 bg-info text-white">
                                            <div class="input-group mb-3">
                                              <input name="code_service" id="code_services" type="text" class="form-control" placeholder="Code" readonly="">

                                              <input name="lib_service" id="lib_services" type="text" class="form-control" placeholder="Libellé" readonly="">
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                              
                                            <div class="col-md-6">
                                              <div class="input-group mb-3">
                                                <button type="submit" id="add_service" class="btn btn-info btn-block"  name="select_serv">
                                                            Insérer
                                                </button>
                                            </div>
                                            </div>
                                          </div>
                                        <!--</form>-->

                                    </div>

                                  </div>
                                  
                              </div>
                            </div>
                          </div>
                        </div>  <!--Fin form_card-->

                        <form class="myForm" action="" method="post">
                          <div class="p-3 mb-2 bg-secondary text-white div_footer">
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                 <label for="exampleFormControlInput1">Remise : </label>&nbsp;&nbsp;
                                 <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input devise" checked="true" >
                                    <label class="custom-control-label" for="customRadioInline1" id="devise_remise"><?php echo $devise; ?></label>
                                  </div>
                                  <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input pourcentage" >
                                    <label class="custom-control-label" for="customRadioInline2" id="pourc_devise">%</label>
                                  </div>
                                 <div class="input-group mb-3">
                                  <input type="number" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="remise" value="">

                                  <input type="text" class="form-control text-right" aria-label="Recipient's username" aria-describedby="basic-addon2" name="remise" value="<?php echo $devise; ?>" id="remise_devise" readonly="">
                                    <!--<div class="input-group-prepend">
                                      <span class="input-group-text" id="legende_device_pour">FC</span>
                                    </div>-->
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">A payer</label>
                                  <div class="input-group mb-3">
                                    <input type="number" class="form-control text-right" name="Apayer" id="Apayer" step="0.01" readonly=""  >

                                   <input type="text" class="form-control text-right" aria-label="Recipient's username" aria-describedby="basic-addon2" value="<?php echo $devise; ?>" readonly="">
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-3">
                                <div class="form-group">
                                  <label for="exampleFormControlInput1">Montant payé</label>
                                  <div class="input-group mb-3">
                                    <input type="number" class="form-control text-right" placeholder="0.00" name="Montpaye" step="0.01" required="">

                                    <?php
                                      $getotherdevise = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ?");
                                      $getotherdevise->execute(array($idUE));

                                    ?>
                                    <select class="custom-select" id="inputGroupSelect01">
                                      <option selected value="<?php echo $devise; ?>"><?php echo $devise; ?></option>
                                      <?php
                                        while($row = $getotherdevise->fetch())
                                        {
                                      ?>
                                      <option value="<?php echo $row['devise_dev']; ?>"><?php echo $row['devise_dev']; ?></option>
                                      <?php
                                        }
                                      ?>
                                    </select>
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
                    <!--fin card-body 2-->

                </div>
                <!--fin card body-->
              </div>
            </main>
          </div>
        </div>
           
      </div>
      </div>
    </div>
        <!--*****************************************************-->
        <br><br>
    
        <!-- Bootstrap JS -->

        <!--<script src="../asserts/js/vendor/jquery-slim.min.js"></script>-->
        <script src="../asserts/js/jquery/jquery.min.js"></script>

        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/dropdown.js"></script>
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>

        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>

        <script type="text/javascript">
           $(function()
            {
              //on fait appel à affiche, pour nous afficher les articles et les services 
              affiche_article();
              affiche_service();

              //séléction article 
              //select_article();

              var idUE = '<?php echo $idUE; ?>';
              //lorsqu'on recherche un article
              $('#libsearchcatart').keyup(function()
              {
                var recherche = $('#libsearchcatart').val();
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/rechercher_article.php',
                  data : 'recherche=' + recherche + '&idUE=' + idUE,
                  success:function(data)
                  {
                    $('#tbody_article').html(data);
                  } 
                });

              });

              //ici on affiche tous les articles
              function affiche_article()
              {
                var idUE = '<?php echo $idUE; ?>';
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_article.php',
                  data : 'idUE=' + idUE,
                  success:function(data)
                  {
                    $('#tbody_article').html(data);
                  }
                });
              }

              
              var idUE = '<?php echo $idUE; ?>';
              //lorsqu'on recherche un service
              $('#libsearchcatart1').keyup(function()
              {
                var recherche_service = $('#libsearchcatart1').val();
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/rechercher_service.php',
                  data : 'recherche_service=' + recherche_service + '&idUE=' + idUE,
                  success:function(data)
                  {
                    $('#tbody_service').html(data);
                  } 
                });

              });

              //ici on affiche tous les services
              function affiche_service()
              {
                var idUE = '<?php echo $idUE; ?>';
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_service.php',
                  data : 'idUE=' + idUE,
                  success:function(data)
                  {
                    $('#tbody_service').html(data);
                  }
                });
              }

              //lors qu'on insère un article dans la facture
              $('#add_article').click(function()
                {
                  var code_article = $('#code_articles').val();
                  var libelle_article = $('#lib_articles').val();
                  var idUE = '<?php echo $idUE; ?>';
                  var idvente = '<?php echo $idvente; ?>';

                  if(code_article != '' && libelle_article != '')
                  {
                      $.ajax({
                      type : 'POST',
                      url : 'fonction/select_article_facture.php',
                      data : "code_article=" + code_article + "&libelle_article=" + libelle_article + "&idUE=" + idUE + "&idvente=" + idvente,
                      success:function(data)
                      {
                        valid();
                      }
                    });
                  }
                  else
                  {
                    err(); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                  }

                });

              //lors qu'on insère un service dans la facture
              $('#add_service').click(function()
                {
                  var code_service = $('#code_services').val();
                  var libelle_service = $('#lib_services').val();
                  var idUE = '<?php echo $idUE; ?>';
                  var idvente = '<?php echo $idvente; ?>';

                  if(code_service != '' && libelle_service != '')
                  {
                      $.ajax({
                      type : 'POST',
                      url : 'fonction/select_service_facture.php',
                      data : "code_service=" + code_service + "&libelle_service=" + libelle_service + "&idUE=" + idUE + "&idvente=" + idvente,
                      success:function(data)
                      {
                        valid1();
                      }
                    });
                  }
                  else
                  {
                    err2(); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                  }

                });

              //on exécute la fonction et recharge la page 
               affiche_designation();
               setInterval(affiche_designation, 2500);
              //cette méthode nous permet l'affichage des articles et services dans la facture lorsqu'on inser

              function affiche_designation()
              {
                var idvente = '<?php echo $idvente; ?>';
                $.post('fonction/recup_facture_vente.php', {idvente:idvente}, function(data)
                {
                  $('#tbody_fac').html(data);
                });
              }

              //on calcul le total_ttc de la facture et on recharge la page à chaque 500 miliseconde 
              calcul_tota_ttc();
              setInterval(calcul_tota_ttc, 500);
              //ici nous calculons instatanement la somme du prix TTC de la facture
              function calcul_tota_ttc()
              {
                var idvente = '<?php echo $idvente; ?>';
                $.post('fonction/calcul_total_ttc.php', {idvente:idvente}, function(data)
                {
                  $('#total_ttc').val(data);
                  //$('#Apayer').val(data);
                  $('#Apayer').attr("placeholder", data);
                });
              }



              //on exécute la fonction de séléction des éléments dans la tble des articles
              select_article(); 
              setInterval(select_article, 50); //on actualise la page à chaque milli séconde

              //cette fonction, nous permet de séléctionner les élément dans la table des articles
              function select_article()
              {
                var table_article = document.getElementById("table_article"), rIndex;

                for(var i = 1; i < table_article.rows.length; i++)
                {
                  table_article.rows[i].onclick = function()
                  {
                    rIndex = this.rowsIndex;
                    document.getElementById("code_articles").value = this.cells[0].innerHTML;
                    document.getElementById("lib_articles").value = this.cells[1].innerHTML;
                  }
                }
              }

              //on exécute la fonction de séléction des éléments dans la tble des articles
              select_service(); 
              setInterval(select_service, 1000); //on actualise la page à chaque milli séconde

              //cette fonction, nous permet de séléctionner les élément dans la table des articles
              function select_service()
              {
                var table_service = document.getElementById("table_service"), rIndex;

                for(var i = 1; i < table_service.rows.length; i++)
                {
                  table_service.rows[i].onclick = function()
                  {
                    rIndex = this.rowsIndex;
                    document.getElementById("code_services").value = this.cells[0].innerHTML;
                    document.getElementById("lib_services").value = this.cells[1].innerHTML;
                  }
                }
              }
              

              /**********************************/

              select_facture();
              setInterval(select_facture, 1000);
              //on séléction les éléments de la facture pour mettre dans l'input
            function select_facture()
            {
              var table_facture = document.getElementById("table_facture"), rIndex;

              for(var i = 1; i < table_facture.rows.length; i++)
              {
                table_facture.rows[i].onclick = function()
                {
                  rIndex = this.rowsIndex;
                  document.getElementById("code_art").value = this.cells[0].innerHTML;
                  document.getElementById("lib_art").value = this.cells[1].innerHTML;
                  document.getElementById("qt_article").value = this.cells[3].innerHTML;
                }
              }
            }


            //lorsqqu'on modifie la quantite dans l'input, elle change automatiquement
            $('#qt_article').keyup(function()
              {
                var code_designation = $('#code_art').val();
                var designation = $('#lib_art').val();
                var quantite = $('#qt_article').val();
                var idvente = '<?php echo $idvente; ?>';

                if(code_designation != '' && designation != '')
                {
                  $.ajax({
                    type: "POST",
                    url: "fonction/up_quantite_facture.php",
                    data: "code_designation=" + code_designation + "&designation=" + designation + "&quantite=" + quantite + "&idvente=" + idvente,
                    success:function(data)
                    {
                      //$('#qt_article').val(data);
                    }
                  });
                }
                else
                {
                  err1();
                }
              });

            //on augemente la quantité de l'article avec le bouton add
            $('#add_qt').click(function()
              {
                var code_designation = $('#code_art').val();
                var designation = $('#lib_art').val();
                var quantite = $('#qt_article').val();
                var idvente = '<?php echo $idvente; ?>';

                if(code_designation != '' && designation != '')
                {
                  $.ajax({
                    type: "POST",
                    url: "fonction/add_quantite_facture.php",
                    data: "code_designation=" + code_designation + "&designation=" + designation + "&quantite=" + quantite + "&idvente=" + idvente,
                    success:function(data)
                    {
                      $('#qt_article').val(data);
                    }
                  });
                }
                else
                {
                  err1();
                }

              });

            //on diminue la quantité de l'article avec le bouton add
            $('#remove_qt').click(function()
              {
                var code_designation = $('#code_art').val();
                var designation = $('#lib_art').val();
                var quantite = $('#qt_article').val();
                var idvente = '<?php echo $idvente; ?>';

                if(code_designation != '' && designation != '')
                {
                  $.ajax({
                    type: "POST",
                    url: "fonction/remove_quantite_facture.php",
                    data: "code_designation=" + code_designation + "&designation=" + designation + "&quantite=" + quantite + "&idvente=" + idvente,
                    success:function(data)
                    {
                      $('#qt_article').val(data);
                    }
                  });
                }
                else
                {
                  err1();
                }

              });

            //ici on supprime un élément dans la facture
            $('#delete_art').click(function()
              {
                var code_designation = $('#code_art').val();
                var designation = $('#lib_art').val();
                var idvente = '<?php echo $idvente; ?>';

                if(code_designation != '' && designation != '')
                {
                  $.ajax({
                    type: "POST",
                    url: "fonction/delete_element_facture.php",
                    data: "code_designation=" + code_designation + "&designation=" + designation + "&idvente=" + idvente,
                    success:function(data)
                    {
                      $('#code_art').val('');
                      $('#lib_art').val('');
                      $('#qt_article').val('');
                    }
                  });
                }
                else
                {
                  err1();
                }
              });
            

            $('.myForm').bind('keyup mouseup', calcul_remise); // appel de la fonction de calcul lors d'un événement 'keyup' ou 'mouseup'

            function calcul_remise(event)
            {

              var remise = $('input[name="remise"]').val();
              var Apayer = $('#total_ttc').val();
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

            //lorsqu'on click sur le radio ou le label du radio % on change directement la légende à côte de l'input
            $('#pourc_devise').click(function()
              {
                $('#remise_devise').val('%');
              });

            //idem pour la dévise
            $('#devise_remise').click(function()
              {
                var devise_remise = '<?php echo $devise; ?>';
                $('#remise_devise').val(devise_remise);
              });


            //ajouter un nouvel article
            $('#saveart').click(function()
              {
                var libelle_article = $('#lib_article').val();
                var cat_article = $('#cat_article').val();
                var sous_cat_article = $('#sous_cat_article').val();
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

                
                if(libelle_article != '')
                  {
                     if(prix_achat_article != '')
                     {
                        if(prix_vente_HTVA != '')
                        {
                          if(prix_vente_TTC_article != '')
                          {
                            if(TVA_article != '')
                            {
                              if(stock_article != '')
                              {
                                if(expiration_article != '')
                                {
                                  if(cat_article != '')
                                  {
                                    if(sous_cat_article != '')
                                    {
                                      if(unite_article != '')
                                      {
                                        if(fournisseur_article != '')
                                        {
                                            $.ajax({
                                            type : 'POST',
                                            url : 'fonction/add_new_article.php',
                                            data : "libelle_article=" + libelle_article + "&cat_article=" + cat_article + 
                                                    "&sous_cat_article=" + sous_cat_article + "&unite_article=" + unite_article + 
                                                    "&expiration_article=" + expiration_article + "&stock_article=" + stock_article + 
                                                    "&prix_achat_article=" + prix_achat_article + "&prix_vente_HTVA=" + prix_vente_HTVA + 
                                                    "&TVA_article=" + TVA_article + "&prix_vente_TTC_article=" + prix_vente_TTC_article + 
                                                    "&fournisseur_article=" + fournisseur_article + "&getprenom=" + getprenom + 
                                                    "&getname=" + getname + "&idUE=" + idUE,
                                            success:function(data)
                                            {
                                              //alert(data);
                                              if(data == 1)
                                              {
                                                err3("Cette article existe déjà !");
                                                $('#lib_article').addClass('is-invalid');
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
                                                $('#cat_article').removeClass('is-invalid');
                                                $('#sous_cat_article').removeClass('is-invalid');
                                                $('#unite_article').removeClass('is-invalid');
                                                $('#fournisseur_article').removeClass('is-invalid');

                                                valid3('Nouvvel article inséré avec succès');
                                                $('.ajouter-article').modal('hide');
                                              }
                                              affiche_article();
                                            }
                                          });
                                        }
                                        else
                                        {
                                          $('#fournisseur_article').addClass('is-invalid');
                                          err3("Veuillez séléctionner le fournisseur de l'article S.V.P!");
                                        }
                                      }
                                      else
                                      {
                                        $('#unite_article').addClass('is-invalid');
                                        err3("Veuillez séléctionner l'unité de l'article S.V.P!");
                                      }
                                    }
                                    else
                                    {
                                      $('#sous_cat_article').addClass('is-invalid');
                                      err3("Veuillez séléctionner une sous-catégorie de l'article S.V.P!");
                                    }
                                  }
                                  else
                                  {
                                    $('#cat_article').addClass('is-invalid');
                                    err3("Veuillez séléctionner une catégorie de l'article S.V.P!");
                                  }
                                }
                                else
                                {
                                  $('#expiration_article').addClass('is-invalid');
                                  err3("Veuillez renseigner le nombre de jour pour l'expiration de l'article S.V.P!");
                                }
                              }
                              else
                              {
                                $('#stock_article').addClass('is-invalid');
                                err3("Veuillez renseigner le nombre en stock de l'article S.V.P!");
                              }
                            }
                            else
                            {
                              $('#taux_tva').addClass('is-invalid');
                              err3("Veuillez renseigner le prix taux TVA de l'article S.V.P!");
                            }
                          }
                          else
                          {
                            $('#prix_ttc').addClass('is-invalid');
                            err3("Veuillez remplir le prix de vente TTC de l'article S.V.P!");
                          }
                        }
                        else
                        {
                          $('#prix_ht').addClass('is-invalid');
                          err3("Veuillez remplir le prix de vente HTVA de l'article S.V.P!");
                        }
                     }
                      else
                      {
                        $('#prix_achat_article').addClass('is-invalid');
                        err3("Veuillez remplir le prix d'achat de l'article S.V.P!");
                      }
                  }
                  else
                  {
                    $('#lib_article').addClass('is-invalid');
                    err3('Veuillez remplir le libellé article S.V.P!'); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                  }

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

                  
                  if(lib_ser != '')
                    {
                       if(remarque_ser != '')
                       {
                          if(prix_ht != '')
                          {
                            if(prix_ttc != '')
                            {
                              if(taux_tva != '')
                              {
                                $.ajax({
                                  type : 'POST',
                                  url : 'fonction/add_new_service.php',
                                  data : "lib_ser=" + lib_ser + "&cat_ser=" + cat_ser + 
                                          "&remarque_ser=" + remarque_ser + "&prix_ht=" + prix_ht + 
                                          "&taux_tva=" + taux_tva + "&prix_ttc=" + prix_ttc + 
                                          "&getprenom=" + getprenom + 
                                          "&getname=" + getname + "&idUE=" + idUE,
                                  success:function(data)
                                  {
                                    if(data == 1)
                                    {
                                      err3("Ce service existe déjà !");
                                      $('#lib_ser').addClass('is-invalid');
                                    }
                                    else
                                    {
                                      $('#lib_ser').removeClass('is-invalid');
                                      $('#remarque_ser').removeClass('is-invalid');
                                      $('#prix_ht_s').removeClass('is-invalid');
                                      $('#prix_ttc_s').removeClass('is-invalid');
                                      $('#taux_tva_s').removeClass('is-invalid');
                                      valid3('Nouveau service inséré avec succès !');
                                      $('.ajouter-service').modal('hide');
                                    }
                                  }
                                });
                              }
                              else
                              {
                                $('#taux_tva_s').addClass('is-invalid');
                                err3("Veuillez renseigner le taux du service S.V.P!");
                              }
                            }
                            else
                            {
                              $('#prix_ttc_s').addClass('is-invalid');
                              err3("Veuillez remplir le prix de vente TTC du service S.V.P!");
                            }
                          }
                          else
                          {
                            $('#prix_ht_s').addClass('is-invalid');
                            err3("Veuillez remplir le prix de vente HTC du service S.V.P!");
                          }
                       }
                        else
                        {
                          $('#remarque_ser').addClass('is-invalid');
                          err3("Veuillez entrer une remarque pour le service S.V.P!");
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
              function calcule_ht_ttc1(event) // fonction de calcul
              {
                var prix_ht = $('input[name="prix_ht_s"]').val();
                var taux_tva  = $('input[name="taux_tva_s"]').val();
                var prix_ttc = $('input[name="prix_ttc_s"]').val();
                
                if(event.target.name=='prix_ttc')
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

            /*****************ici on gère les messages de tostr**************************/

  


              function err(){
                toastr.error("Veuillez sélectionner un article S.V.P !",'Erreur',{
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

              function err1(){
                toastr.error("Veuillez d'abord sélectionner un article ou un service S.V.P !",'Erreur',{
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

              function err2(){
                toastr.error("Veuillez sélectionner un service S.V.P !",'Erreur',{
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

              function valid()
              {
                toastr.success("Article inséré avec succès",'Succès',{
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



              function valid1()
              {
                toastr.success("Service inséré avec succès",'Succès',{
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

              function valid2()
              {
                toastr.success("Nouvel article inséré avec succès",'Succès',{
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
  header('location:error404.php');
}
?>
