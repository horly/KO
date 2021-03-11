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

      

      .body-modal-article
        {
          overflow-y: auto;
          height: 440px;
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

      #logoUE
      {
        height: 100px;
      }

      #traitement, #traitement_fin
      {
          display: none;
      }

    .img-container1
    {
      height: 410px;
      margin-left: auto;
      margin-right: auto;
      display: block;
    }

    #body-modele-facture
    {
      overflow: auto;
      height: 600px;
    }

    .facture-img
    {
      cursor: pointer;
    }

    .facture-img:hover
    {
      background-color: gray;
    }

    .loading
    {
      display:none; 
    }

   

    </style>
        

         <title>KEDIS Online! | Mes ventes | facturation</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

              <?php 

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['idvente']))  //si la variable id qu'on a transité existe dans l'url 
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

                          $idvente = $_GET['idvente'];


                          /*on recupère aussi l'id de la vente à partir de la 
                           référence de caise et de l'idUE*/


                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];


                          //on recupère l'id du client pour récupérer ensuite l'émail du client
                          $getid_cli = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_fact = ?");
                          $getid_cli->execute(array($idvente));
                          $fetch_id_cl = $getid_cli->fetch();
                          $id_cli = $fetch_id_cl['id_cl_fact'];

                          //on récupère maintenant l'émail du client à partir de son id 
                          $get_email_cl = $bdd->prepare("SELECT * FROM client_for_user WHERE id_cli = ?");
                          $get_email_cl->execute(array($id_cli));
                          $fetch_email_cli = $get_email_cl->fetch();
                          $email_cli = $fetch_email_cli['email_cli'];



                        
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

           

            <!-- Breadcrumbs-->
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Mes recettes</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="vente.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes ventes</a></li>
                                        <li class="active">Aperçu facture</li>
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
                    <h6>Aperçu document</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block create_pdf" myprint="#detail_content" id="print_facture" title="Imprimer la facture">
                          <span class="step size-21">
                            <i class="icon ion-android-print"></i>
                          </span>
                          &nbsp;&nbsp;Imprimer
                        </button>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block" id="send-facture-mail">
                          <span class="step size-21">
                            <i class="icon ion-android-mail"></i>
                          </span>
                          &nbsp;&nbsp;Envoyer
                        </button>
                      </div>
                      <div class="col-md-2">
                        <a role="button" class="btn btn-success btn-block" href="viewVente.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&idvente=<?php echo $idvente; ?>">
                          <span class="step size-21">
                            <i class="icon ion-document"></i>
                          </span>
                          &nbsp;&nbsp;Détails
                        </a>
                      </div>

                      <div class="col-md-2">
                        <button type="button" class="btn btn-info"data-toggle="modal" data-target="#modal-model-facture">
                          <span class="step size-21">
                            <i class="icon ion-android-list"></i>
                          </span>
                         &nbsp;&nbsp;Modèle document</button>
                      </div>

                      <div class="col-md-4"></div>
                    </div>

                    <div class="row">
                      <div class="col-md-8">
                        <div id="detail_content">
                        
                        </div>
                      </div>

                      <?php

                          $reqart = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $reqart->execute(array($idUE));
                          $infoart = $reqart->fetch();

                          //on récupère les champs coché et non coché dans modèle de facture 
                          $get_info_facture = $bdd->prepare("SELECT * FROM modele_facture WHERE idUE = ?");
                          $get_info_facture->execute(array($idUE));

                          $fetch_facture_modele = $get_info_facture->fetch();

                      ?>

                      <div class="col-md-4">
                        <br>
                        <div class="card border border-secondary">
                          <div class="card-header bg-secondary text-white">Paramètres du document
                          </div>
                          <div class="card-body">

                            <div class="card border bg-light">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-5"><h6 class="text-primary">Logo</h6></div>
                                  <div class="col-md-1"><h6 class="text-primary text-center">:</h6></div>
                                  <div class="col-md-6">
                                    <img id="logoUE" src="../logo/<?php echo $infoart['logo']; ?>.png"  alt="..." class="img-thumbnail">
                                    <br><br>
                                   <button class="btn btn-success btn-block" id="get_profil" data-toggle="modal" data-target="#new_logo">
                                      <span class="step size-18">
                                        <i class="icon ion-android-create"></i>
                                      </span>&nbsp;&nbsp;Modifier logo
                                  </button>
                                  </div>
                                </div>

                              </div>
                            </div>

                            <div class="card border bg-light">
                              <div class="card-body">
                                <label for="name-doc"><h6>Titre du document</h6></label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/document-text.png"></span>
                                  </div>
                                  <input type="text" class="form-control" placeholder="Modifier le nom du document" aria-label="Recipient's username" aria-describedby="basic-addon2" name="name-doc" id="name-doc" value="<?php
                                    if($infoart['titre_document_facture'] == '')
                                      {
                                        echo ucwords('facture');
                                      }
                                      else
                                      {
                                          echo ucwords($infoart['titre_document_facture']);
                                      }
                                  ?>">
                                </div>
                                <label>Note de bas du document</label>
                                <textarea class="form-control" rows="3" id="note-bas-page" placeholder="Modifier la note de bas de page"><?php echo $fetch_facture_modele['note_bas']; ?></textarea>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="save-name-doc">Enregistrer</button>  
                              </div>
                            </div>

                            <?php

                             

                            ?>

                            <div class="card border bg-light">
                              <div class="card-header">Champs du document
                              </div>
                              <div class="card-body">

                                <div class="alert alert-primary text-center" role="alert">
                                  Cocher les champs supplémentaires du document que vous voulez ajouter.
                                </div>

                                <form id="check-form">
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input champ" id="ref" 
                                      <?php if($fetch_facture_modele['reference'] == 1){ echo 'checked'; } ?>  
                                      onclick="clickchamp(get_ref_fact, ref)">
                                    <label class="custom-control-label" for="ref">Référence</label>
                                    <label id="get_ref_fact" class="text-light"><?php echo $fetch_facture_modele['reference']; ?></label>
                                  </div>

                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input champ" id="mont_htva"
                                      <?php if($fetch_facture_modele['montant_hors_tva'] == 1){ echo 'checked'; } ?>  
                                      onclick="clickchamp(get_mont_htva_fact, mont_htva)">
                                    <label class="custom-control-label" for="mont_htva">Montant Hors TVA</label>
                                    <label id="get_mont_htva_fact" class="text-light"><?php echo $fetch_facture_modele['montant_hors_tva']; ?></label>
                                  </div>

                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input champ" id="tva"
                                      <?php if($fetch_facture_modele['tva'] == 1){ echo 'checked'; } ?>  
                                      onclick="clickchamp(get_tva_fact, tva)">
                                    <label class="custom-control-label" for="tva">TVA %</label>
                                    <label id="get_tva_fact" class="text-light"><?php echo $fetch_facture_modele['tva']; ?></label>
                                  </div>

                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input champ" id="montant_tva"
                                      <?php if($fetch_facture_modele['montant_tva'] == 1){ echo 'checked'; } ?>  
                                      onclick="clickchamp(get_montant_tva_fact, montant_tva)">
                                    <label class="custom-control-label" for="montant_tva">Montant TVA</label>
                                    <label id="get_montant_tva_fact" class="text-light"><?php echo $fetch_facture_modele['montant_tva']; ?></label>
                                  </div>
                                </form>

                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-success" id="save-champ">Enregistrer</button>  
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>  
                    </div>

                      
                       
                  </div>
                </div>
              </div>
              <!-- Animated -->

            </div>


            <div class="modal fade bd-example-modal-lg" id="modal-model-facture" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                  <div class="row">
                    <div class="col-md-10">Modèle document <label class="text-secondary" id="checked-facture"></label></div>
                    <div class="col-md-2">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="modal-body" id="body-modele-facture">
                  
                  <div class="row">
                    <div class="col-md-4">
                      <img src="../img/facture/normal/Default.png" alt="..." class="img-thumbnail facture-img" id="default">
                      <br><br>
                      <h6 class="text-center loading" id="loading-default"><b>Chargement...</b></h6>
                    </div>

                    <div class="col-md-4">
                      <img src="../img/facture/normal/model1.png" alt="..." class="img-thumbnail facture-img" id="model1">
                      <br><br>
                      <h6 class="text-center loading" id="loading-model1"><b>Chargement...</b></h6>
                    </div>

                    <div class="col-md-4">
                      <img src="../img/facture/normal/model2.png" alt="..." class="img-thumbnail facture-img" id="model2">
                      <br><br>
                      <h6 class="text-center loading" id="loading-model2"><b>Chargement...</b></h6>
                    </div>

                    <div class="col-md-4">
                      <img src="../img/facture/normal/model3.png" alt="..." class="img-thumbnail facture-img" id="model3">
                      <br><br>
                      <h6 class="text-center loading" id="loading-model3"><b>Chargement...</b></h6>
                    </div>

                    <div class="col-md-4">
                      <img src="../img/facture/normal/model4.png" alt="..." class="img-thumbnail facture-img" id="model4">
                      <br><br>
                      <h6 class="text-center loading" id="loading-model4"><b>Chargement...</b></h6>
                    </div>

                    <div class="col-md-4">
                      <img src="../img/facture/normal/model5.png" alt="..." class="img-thumbnail facture-img" id="model5">
                      <br><br>
                      <h6 class="text-center loading" id="loading-model5"><b>Chargement...</b></h6>
                    </div>

                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  <button type="button" class="btn btn-success" id="save-model">Enregistrer</button>
                </div>
              </div>
            </div>
          </div>


            <!--Les modales-->
            <!--Modal de photo de profil-->
           <div class="modal fade bd-example-modal-lg" id="new_logo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-white bg-secondary">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="modal-title">Logo de l'Unité d'exploitation</h6>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="img-container1">
                                <img id="image" src="../logo/<?php echo $infoart['logo']; ?>.png" alt="Picture">
                            </div>

                            <label>&nbsp;</label>
                            <label class="btn btn-light border btn-upload" for="inputImage" title="Upload image file">
                                <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                Importer...
                            </label>
                            <br>
                            &nbsp;
                            <div class="docs-buttons">

                                <!-- <div class="btn-group">
                                   <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Bouger">
                                     <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                       <span class="fa fa-arrows"></span>
                                     </span>
                                   </button>
                                   <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Rogner">
                                     <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                       <span class="fa fa-crop"></span>
                                     </span>
                                   </button>
                                 </div>-->
                                &nbsp;&nbsp;
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom Avant">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" >
                                <span class="fa fa-search-plus"></span>
                              </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Arrière">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-search-minus"></span>
                              </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Déplacer à gauche">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrow-left">&nbsp;</span>
                              </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Déplacer à droite">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrow-right"></span>
                              </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Déplacer en haut">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrow-up"></span>
                              </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Déplacer en bas">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrow-down"></span>
                              </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Tourne à gauche">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-rotate-left">&nbsp;</span>
                              </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Tourne à droite">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-rotate-right"></span>
                              </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Retourner horizontalement">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrows-h"></span>
                              </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Retourner verticalement">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrows-v">&nbsp;&nbsp;</span>
                              </span>
                                    </button>
                                </div>

                            </div>

                          <div class="docs-toggles">
                            <div class="btn-group d-flex flex-nowrap" data-toggle="buttons">
                      <label class="btn btn-primary active">
                        <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777">
                        <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 16 / 9">
                          16:9
                        </span>
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
                        <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 4 / 3">
                          4:3
                        </span>
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
                        <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 1 / 1">
                          1:1
                        </span>
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">
                        <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: 2 / 3">
                          2:3
                        </span>
                      </label>
                      <label class="btn btn-primary">
                        <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">
                        <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" title="aspectRatio: NaN">
                          Libre
                        </span>
                      </label>
                    </div>
                  </div>


                        </div>
                        <div class="modal-footer docs-buttons">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-success" id="save_profil" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }" >Enregistrer</button>
                            <button type="button" name="traitement" id="traitement" class="btn btn-success">Traitement en cours...</button>
                            <button type="button" name="traitement_fin" id="traitement_fin" class="btn btn-success">Traitement effectué
                                <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                          </span>
                            </button>
                        </div>
                    </div>
                </div>
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

          <!--switch arlert-->
          <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>
          <!-- scripit init-->
          <!--<script src="assets/js/lib/sweetalert/sweetalert.init.js"></script>-->

          <!--cropper-->
        <script src="../asserts/js/cropper/cropper.js"></script>
        <!--<script src="../asserts/js/cropper/cropper.min.js"></script>-->
        <!--<script src="../asserts/js/cropper/docs.js"></script>-->
        <!--<script src="../asserts/js/cropper/main.js"></script>-->

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">

           //pour le click des champs coché
          function clickchamp(champ, variable)
          {
            if($(variable).is(':checked'))
            {
              $(champ).text(1);
            }
            else
            {
              $(champ).text(0);
            }
          }

          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.vente').addClass('active');

             affiche_detail(); 

              function affiche_detail()
              {
                
                var idvente = '<?php echo $idvente; ?>';
                var devise = '<?php echo $devise; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/detail_facture.php',
                  data : 'idvente=' + idvente + '&devise=' + devise + '&idUE=' + idUE +
                          '&nomE=' + nomE,
                  success:function(data)
                  {
                    $('#detail_content').html(data);
                  }
                });
              }

              $('#print_facture').click(function()
                {
                  //$('#detail_content').print();
                  var idvente = '<?php echo $idvente; ?>';
                  var devise = '<?php echo $devise; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';

                  //var url = $(this).attr('href'); facture/pdf/facture_pdf.php
                  window.open('page_facture/facture_pdf.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE + '&idvente=' + idvente + '&devise=' + devise, '_blank');

                  //window.location = 'facture/pdf/facture_default.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE + '&idvente=' + idvente;
                });


              //lorsqu'on clicque sur l'un de modèle de facture 
              $('.facture-img').click(function()
                {
                  var name_modele = $(this).attr('id');
                  var select_mode = $('#checked-facture').text();

                  if(name_modele == 'default')
                  {
                    if(select_mode == '')
                    {
                      $('#checked-facture').text('0');
                      $(this).attr('src', '../img/load.gif');
                      $('#loading-default').css('display', 'block');

                      setTimeout(function()
                      {
                        //window.location.reload();
                        $('#default').attr('src', '../img/facture/checked/Default-checked.png');
                        $('#loading-default').css('display', 'none');
                      }, 2000);
                      
                    }
                    else
                    {
                      $('#checked-facture').text('');
                      $(this).attr('src', '../img/facture/normal/Default.png');
                    }

                    //on désélectionne les autres factures 
                    $('#model1').attr('src', '../img/facture/normal/model1.png');
                    $('#model2').attr('src', '../img/facture/normal/model2.png');
                    $('#model3').attr('src', '../img/facture/normal/model3.png');
                    $('#model4').attr('src', '../img/facture/normal/model4.png');
                    $('#model5').attr('src', '../img/facture/normal/model5.png');

                  }
                  if(name_modele == 'model1')
                  {
                    if(select_mode == '')
                    {
                      $('#checked-facture').text('1');
                      $(this).attr('src', '../img/load.gif');
                      $('#loading-model1').css('display', 'block');

                      setTimeout(function()
                      {
                        //window.location.reload();
                        $('#model1').attr('src', '../img/facture/checked/model1-checked.png');
                        $('#loading-model1').css('display', 'none');
                      }, 2000);

                      
                    }
                    else
                    {
                      $('#checked-facture').text('');
                      $(this).attr('src', '../img/facture/normal/model1.png');
                    }

                    //on désélectionne les autres factures 
                    $('#default').attr('src', '../img/facture/normal/Default.png');
                    $('#model2').attr('src', '../img/facture/normal/model2.png');
                    $('#model3').attr('src', '../img/facture/normal/model3.png');
                    $('#model4').attr('src', '../img/facture/normal/model4.png');
                    $('#model5').attr('src', '../img/facture/normal/model5.png');
                  }
                  if(name_modele == 'model2')
                  {
                    if(select_mode == '')
                    {
                      $('#checked-facture').text('2');
                      $(this).attr('src', '../img/load.gif');
                      $('#loading-model2').css('display', 'block');

                      setTimeout(function()
                      {
                        //window.location.reload();
                        $('#model2').attr('src', '../img/facture/checked/model2-checked.png');
                        $('#loading-model2').css('display', 'none');
                      }, 2000);
                    }
                    else
                    {
                      $('#checked-facture').text('');
                      $(this).attr('src', '../img/facture/normal/model2.png');
                    }

                    //on désélectionne les autres factures 
                    $('#default').attr('src', '../img/facture/normal/Default.png');
                    $('#model1').attr('src', '../img/facture/normal/model1.png');
                    $('#model3').attr('src', '../img/facture/normal/model3.png');
                    $('#model4').attr('src', '../img/facture/normal/model4.png');
                    $('#model5').attr('src', '../img/facture/normal/model5.png');
                  }
                  if(name_modele == 'model3')
                  {
                    if(select_mode == '')
                    {
                      $('#checked-facture').text('3');
                      $(this).attr('src', '../img/load.gif');
                      $('#loading-model3').css('display', 'block');

                      setTimeout(function()
                      {
                        //window.location.reload();
                        $('#model3').attr('src', '../img/facture/checked/model3-checked.png');
                        $('#loading-model3').css('display', 'none');
                      }, 2000);
                    }
                    else
                    {
                      $('#checked-facture').text('');
                      $(this).attr('src', '../img/facture/normal/model3.png');
                    }

                    //on désélectionne les autres factures 
                    $('#default').attr('src', '../img/facture/normal/Default.png');
                    $('#model1').attr('src', '../img/facture/normal/model1.png');
                    $('#model2').attr('src', '../img/facture/normal/model2.png');
                    $('#model4').attr('src', '../img/facture/normal/model4.png');
                    $('#model5').attr('src', '../img/facture/normal/model5.png');
                  }
                  if(name_modele == 'model4')
                  {
                    if(select_mode == '')
                    {
                      $('#checked-facture').text('4');
                      $(this).attr('src', '../img/load.gif');
                      $('#loading-model4').css('display', 'block');

                      setTimeout(function()
                      {
                        //window.location.reload();
                        $('#model4').attr('src', '../img/facture/checked/model4-checked.png');
                        $('#loading-model4').css('display', 'none');
                      }, 2000);
                    }
                    else
                    {
                      $('#checked-facture').text('');
                      $(this).attr('src', '../img/facture/normal/model4.png');
                    }

                    //on désélectionne les autres factures 
                    $('#default').attr('src', '../img/facture/normal/Default.png');
                    $('#model1').attr('src', '../img/facture/normal/model1.png');
                    $('#model2').attr('src', '../img/facture/normal/model2.png');
                    $('#model3').attr('src', '../img/facture/normal/model3.png');
                    $('#model5').attr('src', '../img/facture/normal/model5.png');
                  }
                  if(name_modele == 'model5')
                  {
                    if(select_mode == '')
                    {
                      $('#checked-facture').text('5');
                      $(this).attr('src', '../img/load.gif');
                      $('#loading-model5').css('display', 'block');

                      setTimeout(function()
                      {
                        //window.location.reload();
                        $('#model5').attr('src', '../img/facture/checked/model5-checked.png');
                        $('#loading-model5').css('display', 'none');
                      }, 2000);
                    }
                    else
                    {
                      $('#checked-facture').text('');
                      $(this).attr('src', '../img/facture/normal/model5.png');
                    }

                    //on désélectionne les autres factures 
                    $('#default').attr('src', '../img/facture/normal/Default.png');
                    $('#model1').attr('src', '../img/facture/normal/model1.png');
                    $('#model2').attr('src', '../img/facture/normal/model2.png');
                    $('#model3').attr('src', '../img/facture/normal/model3.png');
                    $('#model4').attr('src', '../img/facture/normal/model4.png');
                  }


                });

            //enregistrement du modèle de facture
            $('#save-model').click(function()
              {
                var select_mode = $('#checked-facture').text();
                var idUE = '<?php echo $idUE; ?>';

                if(select_mode != '')
                {
                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction/save_model_facture.php',
                      data  : 'select_mode=' + select_mode + '&idUE=' + idUE,
                      success:function(data)
                      {
                        $('#modal-model-facture').modal('hide');
                        valid3('Modèle de document enregistré avec succès !');
                        affiche_detail();
                      }
                    });
                }
                else
                {
                  err3('Veuillez au moins sélectionner un modèle de facture S.V.P!');
                }
              });


              //lorsqu'on enregistre les champs qu'on a coché
             $('#save-champ').click(function()
                {
                  var ref = $('#get_ref_fact').text();
                  var mont_htva = $('#get_mont_htva_fact').text();
                  var tva = $('#get_tva_fact').text();
                  var montant_tva = $('#get_montant_tva_fact').text();
                  var idUE = '<?php echo $idUE; ?>';

                  
                    $.ajax(
                      {
                        type  : 'POST',
                        url   : 'fonction/add_champ_facture.php',
                        data  : 'ref=' + ref + '&mont_htva=' + mont_htva + '&tva=' + tva + '&montant_tva=' + montant_tva + '&idUE=' + idUE,
                        success:function(data)
                        {
                          //alert(data);

                          valid3("Champ affecté dans le document avec succès.");
                          affiche_detail();
                        }
                      });
                 
                });

             //lorsqu'on enregistre le nom du document et la note de bas de page 
             $('#save-name-doc').click(function()
              {
                var name_doc = $('#name-doc').val();
                var note_bas_page = $('#note-bas-page').val();
                var idUE = '<?php echo $idUE; ?>';

                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/sava_info_doc.php',
                    data  : 'name_doc=' + name_doc + '&note_bas_page=' + note_bas_page + '&idUE=' + idUE, 
                    success:function(data)
                    {
                      //$('#note-bas-page').val('')
                      valid3("Les informations du document ont mis à jour avec succès.");
                      affiche_detail();
                    }
                  });
              });


             //lors qu'on envoie la facture par mail 
             $('#send-facture-mail').click(function()
              {
                  var idvente = '<?php echo $idvente; ?>';
                  var devise = '<?php echo $devise; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var email_cli = '<?php echo $email_cli; ?>';

                  $.ajax(
                    {
                      type  : 'POST', 
                      url   : 'fonction/send_facture_mail.php',
                      data  : 'idvente=' + idvente + '&devise=' + devise + '&getid=' + getid +
                              '&id_connexion=' + id_connexion + '&idUE=' + idUE + '&nomUE=' + nomUE + 
                              '&nomE=' + nomE,
                      success:function(data)
                      {
                        //alert(data);
                        if(data == 'main_not_send')
                        {
                          err3("Une erreur est survenue lors de l'envoie du document, veuillez réessayer plutard !");
                        }
                        else
                        {
                          valid3("Document envoyé avec succès à l'adresse émail : " + email_cli + ".");
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


              cropperpage();

         function cropperpage()
                {
                  // Methods cropper
                    'use strict';

                    var console = window.console || { log: function () {} };
                    var URL = window.URL || window.webkitURL;
                    var $image = $('#image');
                    var $download = $('#download');
                    var $dataX = $('#dataX');
                    var $dataY = $('#dataY');
                    var $dataHeight = $('#dataHeight');
                    var $dataWidth = $('#dataWidth');
                    var $dataRotate = $('#dataRotate');
                    var $dataScaleX = $('#dataScaleX');
                    var $dataScaleY = $('#dataScaleY');
                    var options = {
                      aspectRatio: 1 / 1,
                      preview: '.img-preview',
                      minContainerWidth: 465,
                      minContainerHeight: 400,
                      viewMode: 3,
                      crop: function (e) {
                        $dataX.val(Math.round(e.detail.x));
                        $dataY.val(Math.round(e.detail.y));
                        $dataHeight.val(Math.round(e.detail.height));
                        $dataWidth.val(Math.round(e.detail.width));
                        $dataRotate.val(e.detail.rotate);
                        $dataScaleX.val(e.detail.scaleX);
                        $dataScaleY.val(e.detail.scaleY);
                      }
                    };

                    
                    var originalImageURL = $image.attr('src');
                    var uploadedImageName = 'cropped.jpg';
                    var uploadedImageType = 'image/jpeg';
                    var uploadedImageURL;

                    // Tooltip
                    //$('[data-toggle="tooltip"]').tooltip();

                    // Cropper
                    $image.on({
                      ready: function (e) {
                        console.log(e.type);
                      },
                      cropstart: function (e) {
                        console.log(e.type, e.detail.action);
                      },
                      cropmove: function (e) {
                        console.log(e.type, e.detail.action);
                      },
                      cropend: function (e) {
                        console.log(e.type, e.detail.action);
                      },
                      crop: function (e) {
                        console.log(e.type);
                      },
                      zoom: function (e) {
                        console.log(e.type, e.detail.ratio);
                      }
                    }).cropper(options);

                    // Buttons
                    if (!$.isFunction(document.createElement('canvas').getContext)) {
                      $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
                    }

                    if (typeof document.createElement('cropper').style.transition === 'undefined') {
                      $('button[data-method="rotate"]').prop('disabled', true);
                      $('button[data-method="scale"]').prop('disabled', true);
                    }

                    // Download
                    /*if (typeof $download[0].download === 'undefined') {
                      $download.addClass('disabled');
                    }*/

                    // Options
                    $('.docs-toggles').on('change', 'input', function () {
                      var $this = $(this);
                      var name = $this.attr('name');
                      var type = $this.prop('type');
                      var cropBoxData;
                      var canvasData;

                      if (!$image.data('cropper')) {
                        return;
                      }

                      if (type === 'checkbox') {
                        options[name] = $this.prop('checked');
                        cropBoxData = $image.cropper('getCropBoxData');
                        canvasData = $image.cropper('getCanvasData');

                        options.ready = function () {
                          $image.cropper('setCropBoxData', cropBoxData);
                          $image.cropper('setCanvasData', canvasData);
                        };
                      } else if (type === 'radio') {
                        options[name] = $this.val();
                      }

                      $image.cropper('destroy').cropper(options);
                    });

                    // Methods
                    $('.docs-buttons').on('click', '[data-method]', function () {
                      var $this = $(this);
                      var data = $this.data();
                      var cropper = $image.data('cropper');
                      var cropped;
                      var $target;
                      var result; 

                      if ($this.prop('disabled') || $this.hasClass('disabled')) {
                        return;
                      }

                      if (cropper && data.method) {
                        data = $.extend({}, data); // Clone a new one

                        if (typeof data.target !== 'undefined') {
                          $target = $(data.target);

                          if (typeof data.option === 'undefined') {
                            try {
                              data.option = JSON.parse($target.val());
                            } catch (e) {
                              console.log(e.message);
                            }
                          }
                        }

                        cropped = cropper.cropped;

                        switch (data.method) {
                          case 'rotate':
                            if (cropped && options.viewMode > 0) {
                              $image.cropper('clear');
                            }

                            break;

                          case 'getCroppedCanvas':
                            if (uploadedImageType === 'image/jpeg') {
                              if (!data.option) {
                                data.option = {};
                              }

                              data.option.fillColor = '#fff';
                            }

                            break;
                        }

                        result = $image.cropper(data.method, data.option, data.secondOption);

                        switch (data.method) {
                          case 'rotate':
                            if (cropped && options.viewMode > 0) {
                              $image.cropper('crop');
                            }

                            break;

                          case 'scaleX':
                          case 'scaleY':
                            $(this).data('option', -data.option);
                            break;

                          case 'getCroppedCanvas':
                            if (result) {
                              // Bootstrap's Modal
                              //alert(result.toDataURL(uploadedImageType));
                              //$('#getCroppedCanvasModal').modal().find('.modal-body').html(result);

                              var image = result.toDataURL(uploadedImageType);
                              var idUE = '<?php echo $idUE; ?>';

                              $('#save_profil').css('display', 'none');
                              $('#traitement').css('display', 'block');

                              //rognage de l'image
                              $.ajax(
                                {
                                  type  : 'POST', 
                                  url   : 'fonction1/savelogoUE.php',
                                  data  : {
                                    base64 : image, idUE : idUE
                                  },
                                  success:function(donnee)
                                  {
                                    //alert(donnee);
                                    //$('.donnee').html(image);
                                    //$('.donnee').html("<img src='" + donnee + "'>");
                                    setTimeout(function()
                                    {
                                        $('#save_profil').css('display', 'none');
                                        $('#traitement').css('display', 'none');
                                        $('#traitement_fin').css('display', 'block');
                                        valid3('Logo mis à jour avec succès');
                                    }, 5000);

                                    setTimeout(function()
                                    {
                                        window.location.reload();
                                    }, 10000);
                                  }
                                });

                              if (!$download.hasClass('disabled')) {
                                download.download = uploadedImageName;
                                $download.attr('href', result.toDataURL(uploadedImageType));
                              }
                            }

                            break;

                          case 'destroy':
                            if (uploadedImageURL) {
                              URL.revokeObjectURL(uploadedImageURL);
                              uploadedImageURL = '';
                              $image.attr('src', originalImageURL);
                            }

                            break;

                        }

                        if ($.isPlainObject(result) && $target) {
                          try {
                            $target.val(JSON.stringify(result));
                          } catch (e) {
                            console.log(e.message);
                          }
                        }
                      }
                    });

                    // Keyboard
                    $(document.body).on('keydown', function (e) {
                      if (e.target !== this || !$image.data('cropper') || this.scrollTop > 300) {
                        return;
                      }

                      switch (e.which) {
                        case 37:
                          e.preventDefault();
                          $image.cropper('move', -1, 0);
                          break;

                        case 38:
                          e.preventDefault();
                          $image.cropper('move', 0, -1);
                          break;

                        case 39:
                          e.preventDefault();
                          $image.cropper('move', 1, 0);
                          break;

                        case 40:
                          e.preventDefault();
                          $image.cropper('move', 0, 1);
                          break;
                      }
                    });

                    // Import image
                    var $inputImage = $('#inputImage');

                    if (URL) {
                      $inputImage.change(function () {
                        var files = this.files;
                        var file;

                        if (!$image.data('cropper')) {
                          return;
                        }

                        if (files && files.length) {
                          file = files[0];

                          if (/^image\/\w+$/.test(file.type)) {
                            uploadedImageName = file.name;
                            uploadedImageType = file.type;

                            if (uploadedImageURL) {
                              URL.revokeObjectURL(uploadedImageURL);
                            }

                            uploadedImageURL = URL.createObjectURL(file);
                            $image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
                            $inputImage.val('');
                          } else {
                            window.alert("Votre fichier doit être au format jpg, jpeg, png ou gif.");
                          }
                        }
                      });
                    } else {
                      $inputImage.prop('disabled', true).parent().addClass('disabled');
                    }
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
