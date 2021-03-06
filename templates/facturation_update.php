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

        <title>KEDIS ONLINE | Mes recettes | facturation</title>
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
          height: 462px;
          background-color: white;
        }

        .container-tab1 {
          overflow-y: auto;
          height: 240px;
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
          .scrollfact
      {
        height:360px;
        width:100%;
        overflow:auto;
        border: 0.5px solid lightgray;
        background-color: white;
      }


      .calc_btn, .calc_rm
      {
        /*width: 80px;*/
        height: 60px;
        margin-bottom: 10px;
      }

      .btn-orange
      {
        background-color: #CD853F;
      }

      .btn-orange:hover
      {
        background-color: #D2691E;
      }

      .viewtva
      {
        display: none;
      }

      .viewtva_ser
      {
        display: none;
      }

    </style>

        <!--Code PHP-->
                <?php 

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['idClient']) AND isset($_GET['refcaise']))  //si la variable id qu'on a transité existe dans l'url 
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


                      if($id_connexion == $get_id_connexion)
                      {
                        //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                        if($login_required == 1)
                        {

                          $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise
                          $nomUE = $_GET['nom_unite_exploitation']; //on recupère le nom de l'UE
                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production

                          $idClient = $_GET['idClient'];

                          //on recupère la date d'aujourd'hui
                          setlocale(LC_TIME, 'fra_fra');
                          $date = date("Y-m-d");

                          $refcaise = $_GET['refcaise']; //on recupère la référence de caise

                          /*on recupère aussi l'id de la vente à partir de la 
                           référence de caise et de l'idUE*/
                          $getCodeVente = $bdd->prepare("SELECT * FROM vente_for_user WHERE reference_caise = ? AND id_UE_fact = ? ");
                          $getCodeVente->execute(array($refcaise, $idUE));

                          $fetchIdVente = $getCodeVente->fetch();

                          $idvente = $fetchIdVente['id_fact']; //on recupère l'id
                          $remise = $fetchIdVente['remise_fact'];
                          $montantPaye = $fetchIdVente['paiemant_recu_fact'];
                          $unite_remise = $fetchIdVente['unite_remise_fact'];

                          

                          /*on recupère aussi l'id de la vente à partir de la 
                           référence de caise et de l'idUE*/


                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];



                          //Enregistrement et annulation de la vente
                         /* if(isset($_POST['saveVente']))
                          {
                            $Apayer = htmlspecialchars($_POST['Apayer']);
                            $Montpaye = htmlspecialchars($_POST['Montpaye']);

                            //header("location:./tests/test1.php");
                           $UpadateVente = $bdd->prepare("UPDATE vente_for_user SET prix_unit_fact = ?, paiemant_recu_fact = ? WHERE id_fact = ? AND id_UE_fact = ? ");
                            $UpadateVente->execute(array($Apayer, $Montpaye, $idvente, $idUE));

                            header("location:factureVente.php?id=".$getid."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refcaise."&prenomClient=".$prenomClient."&nomClient=".$nomClient."&mailClient=".$mailClient."&societeClient=".$societeClient."&echeance=".$echeance."&idvente=".$idvente."&date=".$date);
                          }*/

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
                <h1 class="h2">Mes recettes</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                  <a class="btn btn-sm btn-outline-info" href="vente.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>" role="button" title="RETOUR A LA PAGE PRECEDENTE">
                    <span class="step size-32">
                        <i class="icon ion-arrow-left-a"></i>
                    </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </a>
                </div>
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

                               <div class="row">
                                <div class="col-md-12">
                                  <label for="lib_article"><h6>Libellé</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Entrer le libellé ou la désignation de l'article" name="lib_article" id="lib_article" required="">
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
                                    <label for="sous_cat_article"><h6>Sous-catégorie</h6></label>
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

                        <br>

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
                                    <div class="row" ">
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

                        <br>

                        <div class="card form_card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="stock_article"><h6>Stock actuel</h6></label>
                                  <input type="text" class="form-control text-right"  placeholder="0" " name="stock_article" required="" id="stock_article">
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
                        <h6 class="modal-title" id="exampleModalLabel">Ajouter un nouveau service</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
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

                      <br>
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



              <div class="card">
                <div class="card-header bg-secondary text-white">
                  <h6><strong>Créer une nouvelle Vente/Facture</strong></h6>
                </div>

                <!--début card body-->
                <div class="card-body">

                    <!--début card-body 2-->
                    
                        <?php

                          $getclient = $bdd->prepare("SELECT * FROM client_for_user WHERE id_cli = ?");
                          $getclient->execute(array($idClient));

                          $fetchClient = $getclient->fetch();

                        ?>

                        <!--Début row 1-->
                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="exampleInputEmail1"><h6>Nom du Client</h6></label>
                              <div class="input-group mb-3">
                                <input name="lib_article" type="text" class="form-control" value="<?php echo $fetchClient['prenom_cli']; echo " "; echo $fetchClient['nom_cli']; ?>" disabled="">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                              <label for="exampleInputEmail1"><h6>Entreprise du client</h6></label>
                              <div class="input-group mb-3">
                                <input name="lib_article" type="text" class="form-control" value="<?php echo $fetchClient['societe_cli']; ?>" disabled="">
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-md-3">
                            <div class="form-group">
                                 <label for="date"><h6>Date</h6></label>
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date" value="<?php echo $date; ?>">
                                        <div class="input-group-prepend">
                                        </div>
                                    </div>
                              </div>
                          </div>

                          <div class="col-md-3">
                            <div class="form-group">
                                 <label for="date_echeance"><h6>Echéance</h6></label>
                                    <div class="input-group mb-3">
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date_echeance" value="<?php echo $date; ?>">
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
                                            Type
                                            <div>Type</div>
                                          </th>
                                          <th>
                                            Quantité
                                            <div>Quantité</div>
                                          </th>
                                          <th>
                                            PU
                                            <div>Prix TTC</div>
                                          </th>
                                          <th>
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
                                                <span class="input-group-text" id="basic-addon1">Quantité</span>
                                              </div>
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
                                        <label><h6>Type : </h6></label> <label><h6 id="type_element"></h6></label>
                                         <div class="input-group mb-3">
                                              <input name="code_art" id="code_art" type="text" class="form-control" placeholder="Code" readonly="">

                                              <input name="lib_art" id="lib_art" type="text" class="form-control" placeholder="Libellé" readonly="">
                                            </div>
                                       </div>
                                       <div class="col-md-5">
                                          <label for="exampleFormControlInput1"><h6>A payer</h6></label>
                                          <div class="input-group mb-3">
                                            <input type="text" class="form-control text-right" name="Apayer" id="Apayer" step="0.01" readonly=""  >

                                           <div class="input-group-append click-search">
                                              <span class="input-group-text">
                                                <?php echo $devise; ?>
                                              </span>
                                            </div>
                                          </div>
                                       </div>
                                     </div>
                                   </div>
                                <!--</form>-->

                                <div class="card">
                                  <div class="card-body bg-secondary text-white">
                                    <div class="row">
                                    <div class="col-md-6">
                                      <form class="myForm">
                                        <div class="form-group">
                                             <label for="remise"><h6>Remise : </h6></label>&nbsp;&nbsp;
                                             <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input devise" checked="true" >
                                                <label class="custom-control-label" for="customRadioInline1" id="devise_remise"><?php echo $devise; ?></label>
                                              </div>
                                              <div class="custom-control custom-radio custom-control-inline">
                                                <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input pourcentage">
                                                <label class="custom-control-label" for="customRadioInline2" id="pourc_devise">%</label>
                                              </div>
                                             <div class="input-group mb-3">
                                              <input type="text" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="remise" id="remise" min="1" value="" step="0.01">

                                              <!--<input type="text" class="form-control text-right" aria-label="Recipient's username" aria-describedby="basic-addon2" name="remise" value="<?php echo $devise; ?>" id="remise_devise" readonly="">-->

                                              <div class="input-group-append">
                                                  <span class="input-group-text" id="remise_devise">
                                                    <?php echo $devise; ?>
                                                  </span>
                                                </div>
                                                <!--<div class="input-group-prepend">
                                                  <span class="input-group-text" id="legende_device_pour">FC</span>
                                                </div>-->
                                              </div>
                                        </div>
                                        <br>
                                      </form>
                                            
                                    </div>
                                    <div class="col-md-6">
                                      <label><h6>&nbsp;</h6></label>
                                      <button type="button" class="btn btn-success btn-block" id="paiement">Paiement</button>
                                    </div>
                                  </div>
                                  </div>
                                </div>

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
                                                  <th>
                                                    <div></div>
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
                                         <!-- <div class="p-3 mb-2 bg-info text-white">
                                            <div class="input-group mb-3">
                                              <input name="code_article" id="code_articles" type="text" class="form-control" placeholder="Code" readonly="">

                                              <input name="lib_article" id="lib_articles" type="text" class="form-control" placeholder="Libellé" readonly="">
                                            </div>
                                             <div class="row">
                                                <div class="col-md-6">
                                                </div>
                                                  
                                                <div class="col-md-6">
                                                  <div class="input-group mb-3">
                                                    <button type="submit" id="add_article" class="btn btn-success btn-block"  name="select_art">
                                                                Insérer
                                                    </button>
                                                  </div>
                                                </div>
                                              </div>
                                          </div> -->

                                         
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
                                                  <th>
                                                    <div></div>
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
                                          <!--<div class="p-3 mb-2 bg-info text-white">
                                            <div class="input-group mb-3">
                                              <input name="code_service" id="code_services" type="text" class="form-control" placeholder="Code" readonly="">

                                              <input name="lib_service" id="lib_services" type="text" class="form-control" placeholder="Libellé" readonly="">
                                            </div>
                                            <div class="row">
                                              <div class="col-md-6">
                                              </div>
                                                
                                              <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                  <button type="submit" id="add_service" class="btn btn-success btn-block"  name="select_serv">
                                                              Insérer
                                                  </button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>-->

                                          
                                        <!--</form>-->

                                    </div>

                                  </div>
                                  
                              </div>
                            </div>
                          </div>
                        </div>  <!--Fin form_card-->

                       
                    
                    <!--fin card-body 2-->

                </div>
                <!--fin card body-->
              </div>
            </main>

            <!--pour le paiement-->
              <div class="modal fade bd-example-modal-lg" id="get-paiement" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bg-secondary text-white">
                        <h6 class="modal-title " id="exampleModalLongTitle">Paiement</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body bg-light">
                        <div class="p-3 mb-2 text-dark border form_card">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="Apyer2"><h6>A payer</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="Apayer2" id="Apayer2" disabled="">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="remise_devise">
                                      <?php echo $devise; ?>
                                    </span>
                                  </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label for="reste"><h6>Reste</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="reste" id="reste" disabled="">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="remise_devise">
                                      <?php echo $devise; ?>
                                    </span>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <br>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="card">
                              <div class="card-body form_card">

                                <label for="id_mpaie"><h6>Mode de paiement</h6></label>
                                <div class="input-group mb-3">
                                  <select class="custom-select" id="id_mpaie">
                                    <option value="" selected="">Choissir un mode de paiement</option>
                                    <option value="" >Dette</option>
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

                                <label for="num_cmp_cli"><h6>Numéro de compte du client</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="num_cmp_cli" id="num_cmp_cli" placeholder="Saisir le numéro de compte du client">
                                </div>

                              </div>
                            </div>
                            <br>
                          </div>

                          <div class="col-md-6">
                            
                            <div class="card">
                              <div class="card-body form_card">
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

                                <label for="Montpaye"><h6>Montant payé</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control text-right" placeholder="0.00" name="Montpaye" id="Montpaye" step="0.01" required="" value="<?php echo number_format($montantPaye, 2, '.', ''); ?>">


                                    <div class="input-group-append">
                                      <span class="input-group-text" id="devise_paie">
                                        <?php echo $devise; ?>
                                      </span>
                                    </div>
                                  </div>
                            </div>
                            
                          </div>

                          
                              
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-success btn-lg" name='payer' id="payer">Enregistrer</button>
                      </div>
                  </div>
                </div>
              </div>
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

              
              //lorsqu'on recherche un article
              $('#libsearchcatart').keyup(function()
              {
                var recherche = $('#libsearchcatart').val();
                var idUE = '<?php echo $idUE; ?>';
                var idvente = '<?php echo $idvente; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/rechercher_article.php',
                  data : 'recherche=' + recherche + '&idUE=' + idUE + '&idvente=' + idvente,
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
                var idvente = '<?php echo $idvente; ?>';
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_article.php',
                  data : 'idUE=' + idUE + '&idvente=' + idvente,
                  success:function(data)
                  {
                    $('#tbody_article').html(data);

                    
                  }
                });
              }

              
              //lorsqu'on recherche un service
              $('#libsearchcatart1').keyup(function()
              {
                var idUE = '<?php echo $idUE; ?>';
                var idvente = '<?php echo $idvente; ?>';
                var recherche_service = $('#libsearchcatart1').val();

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/rechercher_service.php',
                  data : 'recherche_service=' + recherche_service + '&idUE=' + idUE + '&idvente=' + idvente,
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
                var idvente = '<?php echo $idvente; ?>';
                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_service.php',
                  data : 'idUE=' + idUE + '&idvente=' + idvente,
                  success:function(data)
                  {
                    $('#tbody_service').html(data);

                    
                  }
                });
              }

              //lors qu'on insère un article dans la facture
              /*$('#add_article').click(function()
                {
                  select_facture();

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
                        if(data == 1)
                        {
                          err3("Le stock de cet article est épuisé !");
                        }
                        else
                        {
                          valid();
                          affiche_designation();
                        } 
                      }
                    });
                  }
                  else
                  {
                    err(); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                  }

                });

              //lors qu'on insère un service dans la facture
             /* $('#add_service').click(function()
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
                        affiche_designation();
                      }
                    });
                  }
                  else
                  {
                    err2(); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                  }

                });*/

              //on exécute la fonction et recharge la page 
               

             

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



                //lorsqu'on clique sur le bouton paiement
              $('#paiement').click(function()
                {
                  //affiche_article();

                  var Apayer = $('#Apayer').val();
                  var total_ttc = $('#total_ttc').val();
                  //var reste = $('#reste').val();
                  //var rembours = $('#rembours').val();

                    $('#reste').val(Apayer);
                    $('#Apayer2').val(Apayer);

                    $('#get-paiement').modal('show');
                  
                });



              //on exécute la fonction de séléction des éléments dans la tble des articles
              //select_article(); 
              //setInterval(select_article, 50); //on actualise la page à chaque milli séconde

              //cette fonction, nous permet de séléctionner les élément dans la table des articles
              /*function select_article()
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
              }*/

              //on exécute la fonction de séléction des éléments dans la tble des articles
              //select_service(); 
              //setInterval(select_service, 1000); //on actualise la page à chaque milli séconde

              //cette fonction, nous permet de séléctionner les élément dans la table des articles
             /* function select_service()
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
              }*/
              

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

                  $('#type_element').text(this.cells[2].innerHTML);
                  //document.getElementById("qt_article").value = this.cells[2].innerHTML;
                }
              }
            }


            //lorsqqu'on modifie la quantite dans l'input, elle change automatiquement
           /* $('#qt_article').keyup(function()
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
                      affiche_designation();
                    }
                  });
                }
                else
                {
                  err1();
                }
              });*/

            //on augemente la quantité de l'article avec le bouton add
            $('#add_qt').click(function()
              {
                var code_designation = $('#code_art').val();
                var designation = $('#lib_art').val();
                //var quantite = $('#qt_article').val();
                var idvente = '<?php echo $idvente; ?>';
                var type_element = $('#type_element').text();

                if(code_designation != '' && designation != '')
                {
                    $.ajax({
                      type: "POST",
                      url: "fonction/add_quantite_facture.php",
                      data: "code_designation=" + code_designation + "&designation=" + designation + "&idvente=" + idvente + 
                            "&type_element=" + type_element,
                      success:function(data)
                      {
                        //alert(data);
                        if(data == 1)
                        {
                          err3("Le stock de cet article est épuisé !");
                        }
                        else
                        {
                          //$('#qt_article').val(data);
                          $('#remise').val('');
                          calcul_tota_ttc();
                          affiche_designation();
                        }
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
                //var quantite = $('#qt_article').val();
                var idvente = '<?php echo $idvente; ?>';
                var type_element = $('#type_element').text();

                if(code_designation != '' && designation != '')
                {
                  $.ajax({
                    type: "POST",
                    url: "fonction/remove_quantite_facture.php",
                    data: "code_designation=" + code_designation + "&designation=" + designation + "&idvente=" + idvente + 
                          "&type_element=" + type_element,
                    success:function(data)
                    {
                      if(data == 1)
                      {
                        err3("Vous ne pouvez plus diminuer la quantité !");
                      }
                      else
                      {
                        //$('#qt_article').val(data);
                        $('#remise').val('');
                        calcul_tota_ttc();
                        affiche_designation();
                      }
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
                var type_element = $('#type_element').text();

                if(code_designation != '' && designation != '')
                {
                  $.ajax({
                    type: "POST",
                    url: "fonction/delete_element_facture.php",
                    data: "code_designation=" + code_designation + "&designation=" + designation + "&idvente=" + idvente + 
                          "&type_element=" + type_element,
                    success:function(data)
                    {
                      $('#code_art').val('');
                      $('#lib_art').val('');
                      $('#qt_article').val('');
                      $('#remise').val('');
                      $('#type_element').text('');
                      calcul_tota_ttc();
                      affiche_designation();
                    }
                  });
                }
                else
                {
                  err1();
                }
              });
            

            /*$('.myForm').bind('keyup mouseup', calcul_remise); // appel de la fonction de calcul lors d'un événement 'keyup' ou 'mouseup'

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
              }*/

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

            function calcul_remise(remise)
            {

              //var remise = $('input[name="remise"]').val();
              var Apayer = $('#total_ttc').val();
              var devise = $('.devise');
              var pourcentage = $('.pourcentage');
              
                if(devise.is(':checked')) //on vérifie si l'utilisateur à cliquer sur devise
                {
                    var paie = parseFloat(Apayer.replace(',', '.')); //on essaye de remplacer la virgule par le point
                    var temp = (remise/100).toFixed(2);
                    var montant = (paie * temp).toFixed(2);
                    var resultat = (paie - montant).toFixed(2);
                    $('input[name="Apayer"]').val(resultat);
                }
                if(pourcentage.is(':checked'))
                {
                   var paie = parseFloat(Apayer.replace(',', '.'));
                   var montant = (paie - remise).toFixed(2);
                   $('input[name="Apayer"]').val(montant);
                }
              }

            //lorsqu'on click sur le radio ou le label du radio % on change directement la légende à côte de l'input
            $('#pourc_devise').click(function()
              {
                var remise = $('#remise').val();
                $('#remise_devise').html('%');
                calcul_remise(remise);
              });

            //idem pour la dévise
            $('#devise_remise').click(function()
              {
                var remise = $('#remise').val();
                var devise_remise = '<?php echo $devise; ?>';
                $('#remise_devise').html(devise_remise);
                calcul_remise(remise);
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

                                    valid3('Nouvvel article inséré avec succès');
                                    $('.ajouter-article').modal('hide');
                                  }
                                  affiche_article();
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
                                    }
                                    affiche_service();
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

               /* lors qu'on écrire manuellement le montant à payer, on calcul automatiquement
              le reste à payer et à rembourser*/
              $('#Montpaye').keyup(function(event)
                {
                  var Montpaye = $('#Montpaye').val();
                  var Apayer2 = $('#Apayer2').val();
                  //var total_ttc = $('#total_ttc').val();
                  var reste = $('#reste').val();
                  var autre_devise = $('#autre_devise').val();

                  if(/^[0-9]+[.][0-9]+/.test(Montpaye) || /^[0-9]+/.test(Montpaye) || Montpaye == '')
                  {
                 
                    $.ajax(
                      {
                        type  : 'POST',
                        url   : 'fonction/get_equivelent_devise.php',
                        data  : 'autre_devise=' + autre_devise,
                        success:function(data)
                        {

                          var equiv = data;
                          var montant = Montpaye / equiv;
                          var resultat = Apayer2 - montant;


                          if(resultat < 0)
                          {
                            $('#reste').val('');
                            $('#Montpaye').addClass('is-invalid');
                            err3('Le montant payé ne peut pas être supérieur au montant au coût total');
                          }
                          else if(Montpaye == '')
                          {
                            $('#Montpaye').removeClass('is-invalid');
                            //$('#Apayer2').removeClass('is-invalid');
                            $('#reste').val(Apayer2)
                          }
                          else
                          {
                            //$('#Apayer2').removeClass('is-invalid');
                            $('#Montpaye').removeClass('is-invalid');
                            var result = (resultat/1).toFixed(2);
                            $('#reste').val(result);
                          }   

                        }
                      });
                  }
                  else
                  {
                    $('#Montpaye').addClass('is-invalid');
                    err3("Le montant à payé saisie n'est pas valide !");
                  }

                });

              //on enregistre la vente
              $('#payer').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var idClient = '<?php echo $idClient; ?>'; 
                  var idvente = '<?php echo $idvente; ?>';

                  var date = $('#date').val();
                  var date_echeance = $('#date_echeance').val();

                  var total_ttc = $('#total_ttc').val();
                  var remise = $('#remise').val();
                  var remise_devise = $('#remise_devise').text();
                  var Apayer = $('#Apayer2').val();
                  var Montpaye = $('#Montpaye').val();
                  var autre_devise = $('#autre_devise').val();
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  var num_cmp_cli = $('#num_cmp_cli').val();

                  var id_cmp = $('#id_mpaie').val();

                  if(/^[0-9]+[.][0-9]+/.test(Montpaye) || /^[0-9]+/.test(Montpaye) || Montpaye == '')
                  {
                    $.ajax(
                      {
                        type  : 'POST',
                        url   : 'fonction/get_equivelent_devise.php',
                        data  : 'autre_devise=' + autre_devise,
                        success:function(data)
                        {
                          var equiv = data;

                          var taux_echange = Montpaye / equiv;
                          var resteApayer = Apayer - taux_echange; //A payer - montant payer 

                          if(taux_echange > Apayer)
                          {
                            err3('Le montant payé ne peut être supérieur au total à payer !');
                            $('#Montpaye').addClass('is-invalid');
                            $('#autre_devise').addClass('is-invalid');
                          }
                          else
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
                                                type : 'POST',
                                                url : 'fonction/update_vente.php',
                                                data : "idvente=" + idvente + "&date=" + date + 
                                                        "&date_echeance=" + date_echeance + "&remise=" + remise + 
                                                        "&taux_echange=" + taux_echange + "&resteApayer=" + resteApayer + 
                                                        "&remise_devise=" + remise_devise + '&idUE=' + idUE + '&equiv=' + equiv
                                                        + "&id_cmp=" + id_cmp + '&getid=' + getid + '&num_cmp_cli=' + num_cmp_cli + '&Apayer=' + Apayer ,
                                                success:function(data1)
                                                {
                                                  //alert(data1);
                                                  if(data1 != 1)
                                                  {
                                                    err3("Veuillez au moins insérer un artcle ou un service, car la facture ne peut pas être vide !");
                                                  }
                                                  else
                                                  {
                                                    window.location.href = 'facturation_finish.php?id=' + getid + '&id_connexion=' + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE + "&idvente=" + idvente;
                                                  }
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
                                    else //ici donc le mode paiement contient un numéro de compte
                                    {
                                      if(num_cmp_cli != '')
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
                                                    type : 'POST',
                                                    url : 'fonction/update_vente.php',
                                                    data : "idvente=" + idvente + "&date=" + date + 
                                                            "&date_echeance=" + date_echeance + "&remise=" + remise + 
                                                            "&taux_echange=" + taux_echange + "&resteApayer=" + resteApayer + 
                                                            "&remise_devise=" + remise_devise + '&idUE=' + idUE + '&equiv=' + equiv
                                                            + "&id_cmp=" + id_cmp + '&getid=' + getid + '&num_cmp_cli=' + num_cmp_cli + '&Apayer=' + Apayer ,
                                                    success:function(data1)
                                                    {
                                                      //alert(data1);
                                                      if(data1 != 1)
                                                      {
                                                        err3("Veuillez au moins insérer un artcle ou un service, car la facture ne peut pas être vide !");
                                                      }
                                                      else
                                                      {
                                                        window.location.href = 'facturation_finish.php?id=' + getid + '&id_connexion=' + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE + "&idvente=" + idvente;
                                                      }
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
                                        err3('Veuillez saisir le numéro de compte du client S.V.P !');
                                        $('#num_cmp_cli').addClass('is-invalid');
                                      }
                                    }
                                  }
                                });
                            }
                            else //sinon c'est une dette du client donc une créance
                            {
                              if(Montpaye == '' || Montpaye == 0 || Montpaye == 0.00)
                              {
                                 $.ajax(
                                  {
                                    type : 'POST',
                                    url : 'fonction/update_vente.php',
                                    data : "idvente=" + idvente + "&date=" + date + 
                                            "&date_echeance=" + date_echeance + "&remise=" + remise + 
                                            "&taux_echange=" + taux_echange + "&resteApayer=" + resteApayer + 
                                            "&remise_devise=" + remise_devise + '&idUE=' + idUE + '&equiv=' + equiv
                                            + "&id_cmp=" + id_cmp + '&getid=' + getid + '&num_cmp_cli=' + num_cmp_cli + '&Apayer=' + Apayer ,
                                    success:function(data1)
                                    {
                                      //alert(data1);
                                      if(data1 != 1)
                                      {
                                        err3("Veuillez au moins insérer un artcle ou un service, car la facture ne peut pas être vide !");
                                      }
                                      else
                                      {
                                        window.location.href = 'facturation_finish.php?id=' + getid + '&id_connexion=' + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE + "&idvente=" + idvente;
                                      }
                                    }
                                  });
                              }
                              else
                              {
                                err3("Veuillez choisir le mode de paiement pour le paiement de l'avance du client");
                                $('#id_mpaie').addClass('is-invalid');
                              }
                            }
                          }
                        }
                      });
                  }
                  else
                  {
                    $('#Montpaye').addClass('is-invalid');
                    err3("Le montant à payé saisie n'est pas valide !");
                  }
                  
                });

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
    header('location:deconnexion.php?id='.$getid);
  }
}  
else
{
  header('location:error404.php');
}
?>
