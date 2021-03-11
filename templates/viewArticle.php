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


         <!--css callout message-->
        <link href="../asserts/css/callout.css" rel="stylesheet">

        <!--<link rel="stylesheet" type="text/css" href="assets/css/loader.css">-->
        <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">

           <!--cropper-->
      <link rel="stylesheet" href="../asserts/css/cropper/cropper.css">
      <link rel="stylesheet" href="../asserts/css/cropper/main.css">

  

    <style type="text/css">
     
     .form_card
        {
          background-color: #d1ecf1;
        }

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

      .stock
      {
        background-color: #d1ecf1;
      }

      .body-modal-article
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        #libsearchcatart {
          background-image: url('../icons/png/office/search.png');
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 6px 12px 5px 40px;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
      }

      .viewtva
      {
        display: none;
      }

      #logoArt
      {
        height: 120px;
        width: 120px;
      }

       #traitement, #traitement_fin
      {
          display: none;
      }

      #dernier
      {
        height: 38px;
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

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['idart']))  //si la variable id qu'on a transité existe dans l'url 
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

                          //on recupère la date debut du mois
                          $datedebut = date("Y-m-d", mktime(0,0,0,date("m"),1,date("Y")));
                          //on recupère la date fin du mois
                          $datefin = date("Y-m-d", mktime(0,0,0,date("m")+1,0,date("Y")));

                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production
                          $idart = $_GET['idart']; //on recupère l'id de l'article

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

          <?php include('navigation.php'); ?>

            <?php

              $getfArticle = $bdd->prepare("SELECT * FROM article_for_user WHERE id_art = ?");
              $getfArticle->execute(array($idart));

              $fetchart = $getfArticle->fetch();

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
                                        <li><a href="stock_article.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes articles</a></li>
                                        <li class="active">Détails article</li>
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
                  <div class="card-header">
                    <h6>Détails article</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#update">
                          <span class="step size-21">
                            <i class="icon ion-edit"></i>
                          </span>
                          &nbsp;&nbsp;Modifier
                        </button>
                      </div>
                      <div class="col-md-2">
                          <?php
                            //on vérifie si l'article a été utilisé dans une opération vente
                            $verif_op = $bdd->prepare("SELECT * FROM facturation_for_user, vente_for_user WHERE id_art_fact = ? AND type_fact = ? AND complete_vente = 1 AND id_vente_fact = id_fact");
                            $verif_op->execute(array($idart, 'article'));
                            $count_op = $verif_op->rowCount();

                            //on vérifie si l'article a été utilisé dans une opération achat
                            $verif_op1 = $bdd->prepare("SELECT * FROM achat_for_user, depense_for_user WHERE id_art_dp = ? AND    type_dp = ? AND complete_dp = 1 AND  id_achat_dp = id_dp");
                            $verif_op1->execute(array($idart, 'article'));
                            $count_op1 = $verif_op1->rowCount();

                            //on vérifie si l'article a été utilisé dans une opération note de crédit vente
                            $verif_op2 = $bdd->prepare("SELECT * FROM facturation_note_credit, note_credit WHERE id_art_cr = ? AND type_cr = ? AND complete_credit = 1 AND id_note_cr = id_cr");
                            $verif_op2->execute(array($idart, 'article'));
                            $count_op2 = $verif_op2->rowCount();

                            //on vérifie si l'article a été utilisé dans une opération note de crédit achat
                            $verif_op3 = $bdd->prepare("SELECT * FROM facturation_note_credit_achat, note_credit_achat WHERE id_art_cra = ? AND type_cra = ? AND complete_credit = 1 AND id_note_cra = id_cra");
                            $verif_op3->execute(array($idart, 'article'));
                            $count_op3 = $verif_op3->rowCount();

                            //on vérifie si l'article a été utilisé dans une opération devis
                            $verif_op4 = $bdd->prepare("SELECT * FROM facturation_devis, devis WHERE id_art_dv = ? AND type_dv = ? AND complete_devis = 1 AND id_devis_dv = id_dv");
                            $verif_op4->execute(array($idart, 'article'));
                            $count_op4 = $verif_op4->rowCount();

                            //on vérifie si l'article a été utilisé dans une opération commande
                            $verif_op5 = $bdd->prepare("SELECT * FROM facturation_commande, commande WHERE id_art_cmd = ? AND type_cmd = ? AND complete_cmd = 1 AND facturation_commande.id_cmd = commande.id_cmd");
                            $verif_op5->execute(array($idart, 'article'));
                            $count_op5 = $verif_op5->rowCount();

                            if(preg_match("/^[1-9]+/", $count_op) || preg_match("/^[1-9]+/", $count_op1) || preg_match("/^[1-9]+/", $count_op2) || preg_match("/^[1-9]+/", $count_op3) || preg_match("/^[1-9]+/", $count_op4) || preg_match("/^[1-9]+/", $count_op5))
                            {

                           
                            }
                            else
                            {
                          ?>
                              <button type="button" class="btn btn-danger btn-block" id="delete_article">
                                <span class="step size-21">
                                  <i class="icon ion-ios-trash"></i>
                                </span>
                                &nbsp;&nbsp;Supprimer
                              </button>

                          <?php
                            }
                          ?>

                      </div>
                      <div class="col-md-8"></div>
                    </div>

                    <div id="detail_content">
                      
                    </div>
                       
                  </div>
                </div>
              </div>
              <!-- Animated -->

            </div>


            <!--Les modales-->

             <!--debut modale update article-->
              <div class="modal fade bd-example-modal-lg" id="update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Modifier l'article</h6>
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
                                    <input type="text" class="form-control" placeholder="Entrer le libellé ou la désignation de l'article" name="lib_article" id="lib_article" required="" value="<?php echo $fetchart['libelle_art']; ?>">
                                  </div>
                                </div>
                                 <div class="col-md-6">
                                  <label for="code-article"><h6>Code article</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Entrer le code de l'article" name="code-article" id="code-article" required="" value="<?php echo $fetchart['num_art']; ?>">
                                  </div>
                                </div>
                              </div>

                              <?php

                                  $reqcatart = $bdd->prepare("SELECT * FROM categorie_article WHERE id_UE_art = ?");
                                  $reqcatart->execute(array($idUE));
                              ?>

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="code-barre"><h6>Code barre</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Entrer le code barre de l'article" name="code-barre" id="code-barre" required="" value="<?php echo $fetchart['code_barre']; ?>">
                                  </div>
                                </div>

                                <?php

                                    $reqscatart = $bdd->prepare("SELECT * FROM sous_categorie_article WHERE   id_s_UE_art = ?");
                                    $reqscatart->execute(array($idUE));
                                ?>

                                <div class="col-md-6">

                                  <label for="cat_article"><h6>Catégorie</h6></label>
                                  <div class="input-group mb-3">
                                    <select class="custom-select" name="cat_article" id="cat_article">
                                      <option value="<?php echo $fetchart['id_CAT']; ?>" selected="">
                                        <?php 
                                            //on séléctionne dans la table catégorie d'article pour récupérer le libelle du catégorie d'article appartennant à l'article 
                                              $getlibser = $bdd->prepare("SELECT * FROM categorie_article WHERE id_cat_art = ?");
                                              $getlibser->execute(array($fetchart['id_CAT']));

                                              $lib_cat_ser = $getlibser->fetch();
                                              echo $lib_cat_ser['libelle_cat_art'];  //on affiche le libellé service 
                                          ?>
                                      </option>
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
                                        <option value="<?php echo $fetchart['id_SOUS_CAT']; ?>" selected="">
                                          <?php 
                                            //on séléctionne dans la table sous-catégorie d'article pour récupérer le libelle du sous-scatégorie d'article appartennant à l'article 
                                              $getlibser = $bdd->prepare("SELECT * FROM sous_categorie_article WHERE id_s_cat_art = ?");
                                              $getlibser->execute(array($fetchart['id_SOUS_CAT']));

                                              $lib_cat_ser = $getlibser->fetch();
                                              echo $lib_cat_ser['libelle_s_cat_art'];  //on affiche le libellé service 
                                          ?>
                                        </option>
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
                                    <option value="<?php echo $fetchart['unite_art']; ?>" selected=""><?php echo $fetchart['unite_art']; ?></option>
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
                                    <input type="text" class="form-control text-right" required="" name="expiration_article" placeholder="0" required="" id="expiration_article" value="<?php echo $fetchart['expiration_jours_art']; ?>">
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
                                    <input type="text" class="form-control text-right" placeholder="0.00"  name="prix_achat_article" id="prix_achat_article" value="<?php echo number_format($fetchart['prix_achat_art'], 2, '.', ''); ?>">
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
                                          <input name="prix_ttc" type="text" placeholder="0.00" class="form-control text-right" id="prix_ttc" value="<?php echo number_format($fetchart['prix_vente_TTC'], 2, '.', ''); ?>">
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
                                      <input name="prix_ht" type="text" class="form-control text-right" placeholder="0.00" id="prix_ht" value="<?php echo number_format($fetchart['prix_vente_HTVA_art'], 2, '.', ''); ?>">
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
                                          <input name="taux_tva" type="text" class="form-control text-right" placeholder="0.00" id="taux_tva" value="<?php echo number_format($fetchart['tva_art'], 2, '.', ''); ?>">
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
                                  <input type="text" class="form-control text-right"  placeholder="0" name="stock_article" required="" id="stock_article" value="<?php echo $fetchart['stock_actuel_art']; ?>">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <?php

                                    $reqfourn = $bdd->prepare("SELECT * FROM fournis_for_user WHERE idUE_four = ? ");
                                    $reqfourn->execute(array($idUE));

                                  ?>
                                  
                                    <label for="fournisseur_article"><h6>Fournisseur</h6></label>
                                    <div class="input-group mb-3">
                                      <select class="custom-select" name="fournisseur_article" id="fournisseur_article">
                                        <option value="<?php echo $fetchart['id_fournis_art']; ?>" selected="">
                                         <?php 
                                            //on récupère le nom et le prénom du fournisseur
                                            $getlibser = $bdd->prepare("SELECT * FROM fournis_for_user WHERE id_four = ?");
                                              $getlibser->execute(array($fetchart['id_fournis_art']));

                                              $lib_cat_ser = $getlibser->fetch();
                                              echo $lib_cat_ser['societe_four'];  //on affiche le nom et le prénom du forurnisseur
                                          ?> 
                                          </option>
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
              <!--fin modale update article-->

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
             

                


            </div>
        </div>
         

        <!--*****************************************************-->
        <br><br>
  </div>
      
       <!--chat discusion-->
       <?php  include('chat_discution.php'); ?>
        <!-- Bootstrap JS -->

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

          <!--<script src="assets/js/lib/data-table/datatables.min.js"></script>
          <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
          <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
          <script src="assets/js/lib/data-table/jszip.min.js"></script>
          <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
          <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>-->
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

         <!--cropper-->
        <script src="../asserts/js/cropper/cropper.js"></script>
        <!--<script src="../asserts/js/cropper/cropper.min.js"></script>-->
        <!--<script src="../asserts/js/cropper/docs.js"></script>-->
        <!--<script src="../asserts/js/cropper/main.js"></script>-->

        <!--switch arlert-->
        <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>

        <script type="text/javascript">

          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.stock').addClass('active');

            affiche_detail(); 

              function affiche_detail()
              {
                
                var idart = '<?php echo $idart; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/detail_article.php',
                  data : 'idart=' + idart + '&devise=' + devise,
                  success:function(data)
                  {
                    $('#detail_content').html(data);
                  }
                });
              }

              //lorsqu'on appui sur le bouton nouvelle catégorie d'article
              $('#new_categorie').click(function()
                {
                  $('#update').modal('hide');
                  $('.ajouter-categorie-article').modal('show');
                });

              //lorsqu'on appui sur le bouton nouvelle SOUS catégorie  d'article
              $('#new_sous_categorie').click(function()
                {
                  $('#update').modal('hide');
                  $('.ajouter-sous-categorie-article').modal('show');
                });


              //ajout du catégorie d'article
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


              //mis à jour de l'article
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

                var idart = '<?php echo $idart; ?>';
                var getprenom = '<?php echo $getprenom; ?>';
                var getname = '<?php echo $getname; ?>';
                var idUE = '<?php echo $idUE; ?>';

                
                if(libelle_article != '')
                  {
                     if(/^[0-9]+[.][0-9]+/.test(prix_achat_article) || /^[0-9]+/.test(prix_achat_article) || prix_achat_article != '')
                     {
                        if(/^[0-9]+[.][0-9]+/.test(prix_vente_HTVA) || /^[0-9]+/.test(prix_vente_HTVA) || prix_vente_HTVA != '')
                        {
                          if(/^[0-9]+[.][0-9]+/.test(prix_vente_TTC_article) || /^[0-9]+/.test(prix_vente_TTC_article) || prix_vente_TTC_article != '')
                          {
                            if(/^[0-9]+[.][0-9]+/.test(TVA_article) || /^[0-9]+/.test(TVA_article) || TVA_article != '')
                            {
                              if(/^[0-9]+/.test(stock_article) || stock_article != '')
                              {
                                if(/^[0-9]+/.test(expiration_article) || expiration_article != '')
                                {
                                  $.ajax({
                                    type : 'POST',
                                    url : 'fonction/update_article.php',
                                    data : "libelle_article=" + libelle_article + "&cat_article=" + cat_article + 
                                            "&unite_article=" + unite_article + "&expiration_article=" + expiration_article + "&stock_article=" + stock_article + "&prix_achat_article=" + prix_achat_article + "&prix_vente_HTVA=" + prix_vente_HTVA + 
                                            "&TVA_article=" + TVA_article + "&prix_vente_TTC_article=" + prix_vente_TTC_article + 
                                            "&fournisseur_article=" + fournisseur_article + "&getprenom=" + getprenom + '&idart=' + idart +
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
                                        valid3('Article mis à jour avec succès !');
                                        $('#update').modal('hide');

                                        setTimeout(function()
                                        {
                                          window.location.reload();
                                        }, 5000);

                                      }
                                      affiche_detail();
                                    }
                                  });

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

            //supprimer un article
            $('#delete_article').click(function()
                {

                  var idart = '<?php echo $idart; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';

                  swal({
                          title: "Confirmer !",
                          text: "Voulez-vous vraiment supprimer cette article ?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#28a745",
                          confirmButtonText: "Oui",
                          cancelButtonText: "Non",
                          closeOnConfirm: false
                          },
                          function(){
                              //swal("Supprimé !!", "L'utilisateur a été supprimé avec succès !!", "success");
                              delete_article();
                              swal(
                                {
                                  title: "Supprimé !!",
                                text: "L'arlticle a été supprimé avec succès !!",
                                type: "success",
                                confirmButtonColor: "#28a745",
                                }, function(){ window.location = 'stock_article.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE; });
                          });
                });


            //fonction supprimer article
            function delete_article()
            {
              var idart = '<?php echo $idart; ?>';

              $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/delete_article.php',
                  data  : 'idart=' + idart, 
                  success:function(data)
                  {
                    
                  }
                });
            }


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
            


              /*Ici, on affiche les erreurs et les dans un toast*/

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
