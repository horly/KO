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
    </style>
        

         <title>KEDIS Online! | Mes services</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

              <?php 
                    //session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['idser']))  //si la variable id qu'on a transité existe dans l'url 
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
                          $idser = $_GET['idser']; //on recupère l'id de l'article

                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];



                         /* if(isset($_POST['delete_service']))
                          {
                            $deletereq = $bdd->prepare("DELETE FROM service_for_user WHERE id_ser = ?");
                            $deletereq->execute(array($idser));

                            header('location:service_grille_tarifaire.php?id='.$getid."&id_connexion=".$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE);
                          }*/


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

              $getfService = $bdd->prepare("SELECT * FROM service_for_user WHERE id_ser = ?");
              $getfService->execute(array($idser)) or die (print_r($verifVente->errorInfo()));

              $fetctser = $getfService->fetch();

            ?>


            <!-- Breadcrumbs-->
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Mes services</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="service_grille_tarifaire.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes services</a></li>
                                        <li class="active">Détails service</li>
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
                    <h6>Détails service</h6>
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
                            $verif_op->execute(array($idser, 'service'));
                            $count_op = $verif_op->rowCount();

                            //on vérifie si l'article a été utilisé dans une opération note de crédit vente
                            $verif_op2 = $bdd->prepare("SELECT * FROM facturation_note_credit, note_credit WHERE id_art_cr = ? AND type_cr = ? AND complete_credit = 1 AND id_note_cr = id_cr");
                            $verif_op2->execute(array($idser, 'service'));
                            $count_op2 = $verif_op2->rowCount();

                    
                            //on vérifie si l'article a été utilisé dans une opération devis
                            $verif_op4 = $bdd->prepare("SELECT * FROM facturation_devis, devis WHERE id_art_dv = ? AND type_dv = ? AND complete_devis = 1 AND id_devis_dv = id_dv");
                            $verif_op4->execute(array($idser, 'service'));
                            $count_op4 = $verif_op4->rowCount();

                            

                            if(preg_match("/^[1-9]+/", $count_op) || preg_match("/^[1-9]+/", $count_op2) || preg_match("/^[1-9]+/", $count_op4))
                            {

                           ?>
                            <!--On affiche rien-->
                          <?php
                            }
                            else
                            {
                          ?>

                            <button type="button" class="btn btn-danger btn-block" id="delete_service">
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
               <!--debut modale update service-->
               <div class="modal fade bd-example-modal-lg " id='update' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Modifier le service</h6>
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
                                <label for="lib_ser"><h6>Désignation</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" id="lib_ser" placeholder="Entrer le libellé ou la désignation du service" name="lib_ser" required="" value="<?php echo $fetctser['lib_ser']; ?>">
                                </div>
                              </div>

                            <?php

                                $reqcatart = $bdd->prepare("SELECT * FROM categorie_service WHERE id_UE_ser = ?");
                                $reqcatart->execute(array($idUE));
                            ?>

                              <div class="col-md-6">
                               <label><h6>Catégorie</h6></label>
                                <div class="input-group mb-3">
                                  <select class="custom-select" id="cat_ser" name="cat_ser">
                                    <option value="<?php echo $fetctser['id_cat_serv']; ?>" selected="">
                                        <?php 
                                          //on séléctionne dans la table catégorie de service pour récupérer le libelle du catégorie service appartennant au service 
                                          $getlibser = $bdd->prepare("SELECT * FROM categorie_service WHERE id_cat_ser = ?");
                                          $getlibser->execute(array($fetctser['id_cat_serv']));

                                          $lib_cat_ser = $getlibser->fetch();
                                          echo $lib_cat_ser['lib_cat_ser'];  //on affiche le libellé service
                                        ?>
                                      </option>
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
                                <label for="remarque_ser"><h6>Remarque</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" id="remarque_ser" placeholder="Entrer une remarque pour le service" name="remarque_ser" required="" value="<?php echo $fetctser['remarque_ser']; ?>">
                                </div>
                              </div>

                        </div>
                      </div>

                       <form id="modal-form1">
                         <div class="card form_card">
                          <div class="card-body">

                               <!--<div class="row">
                                <div class="col-md-6">
                                  <label for="prix_ht_s">Prix de vente HTVA</label>
                                  <div class="input-group mb-3">
                                    <input name="prix_ht_s" type="number" class="form-control text-right" placeholder="0.00" step="0.01" id="prix_ht_s" value="<?php echo number_format($fetctser['prix_HTVA_ser'], 2, '.', ''); ?>">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><?php echo $devise; ?></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="taux_tva_s">Taux TVA</label>
                                  <div class="input-group mb-3">
                                    <input name="taux_tva_s" type="number" class="form-control text-right" step="0.01" id="taux_tva_s" value="<?php echo number_format($fetctser['tva_ser'], 2, '.', ''); ?>">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">%</span>
                                    </div>
                                  </div>
                                </div>
                              </div>-->

                              <!--<div class="form-group">
                                <label for="prix_ttc_s">Prix de vente TTC</label>
                                  <div class="input-group mb-3">
                                    <input name="prix_ttc_s" type="number" placeholder="0.00" class="form-control text-right" step="0.01" id="prix_ttc_s" value="<?php echo number_format($fetctser['prix_TTC_ser'], 2, '.', ''); ?>">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><?php echo $devise; ?></span>
                                    </div>
                                  </div>
                              </div>-->

                              <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <label for="prix_ttc"><h6>Prix de vente TTC</h6></label>
                                        <div class="input-group mb-3">
                                          <input name="prix_ttc" type="text" placeholder="0.00" class="form-control text-right" id="prix_ttc" value="<?php echo number_format($fetctser['prix_TTC_ser'], 2, '.', ''); ?>">
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
                                    <label for="prix_ht_s"><h6>Prix de vente HTVA</h6></label>
                                    <div class="input-group mb-3">
                                      <input name="prix_ht_s" type="text" class="form-control text-right" placeholder="0.00" id="prix_ht_s" value="<?php echo number_format($fetctser['prix_HTVA_ser'], 2, '.', ''); ?>">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo $devise; ?></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 viewtva">
                                    <div class="row" ">
                                      <div class="col-md-6">
                                        <label for="taux_tva_s"><h6>Taux TVA</h6></label>
                                        <div class="input-group mb-3">
                                          <input name="taux_tva_s" type="text" class="form-control text-right" placeholder="0.00" id="taux_tva_s" value="<?php echo number_format($fetctser['tva_ser'], 2, '.', ''); ?>">
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
              <!--fin modale update service-->

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
                <!--fin du modale-->
             

                


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



        <script src="../dist/js/util.js"></script>
        <!--<script src="../dist/js/dropdown.js"></script>-->
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>


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

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">

          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.service').addClass('active');

            affiche_detail(); 

              function affiche_detail()
              {
                
                var idser = '<?php echo $idser; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/detail_service.php',
                  data : 'idser=' + idser + '&devise=' + devise,
                  success:function(data)
                  {
                    $('#detail_content').html(data);
                  }
                });
              }

                 //lorsqu'on appui sur le bouton nouvelle  catégorie  d'article
           $('#new_categorie_service').click(function()
                {
                  $('#update').modal('hide');
                  $('.ajouter-categorie-service').modal('show');
                });


           //ajout du catégorie service
            $('#addcatser').click(function()
              {
                var libelleser = $('#libelleser').val();
                var idUE = '<?php echo $idUE; ?>';

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

                        setTimeout(function()
                        {
                          window.location.reload();
                        }, 5000);
                      }
                      affiche_cat_service();
                    }
                  });
                }
                else
                {
                  $('#libelleser').addClass('is-invalid');
                  err3("Veuillez entrer le libellé du catégorie de service S.V.P!");
                }
              });

              //lorsqu'on clique pour appliquer la TVA 
              $('#addtva').click(function()
                {
                  $('.viewtva').css('display', 'block');
                  $('.body-modal-article').css('height', '515px');

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
              $('#removetva').click(function()
                {
                  $('.body-modal-article').css('height', '420px');
                  $('.viewtva').css('display', 'none');
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
                  var prix_ttc = $('#prix_ttc').val();
                  
                  var idser = '<?php echo $idser; ?>';
                  var getprenom = '<?php echo $getprenom; ?>';
                  var getname = '<?php echo $getname; ?>';
                  var idUE = '<?php echo $idUE; ?>';

                  
                  if(lib_ser != '')
                    {
                       if(/^[0-9]+[.][0-9]+/.test(prix_ht) || /^[0-9]+/.test(prix_ht))
                       {
                          if(/^[0-9]+[.][0-9]+/.test(taux_tva) || /^[0-9]+/.test(taux_tva))
                          {
                            if(/^[0-9]+[.][0-9]+/.test(prix_ttc) || /^[0-9]+/.test(prix_ttc))
                            {
                              
                                 $.ajax({
                                  type : 'POST',
                                  url : 'fonction/update_service.php',
                                  data : "lib_ser=" + lib_ser + "&cat_ser=" + cat_ser + 
                                          "&remarque_ser=" + remarque_ser + "&prix_ht=" + prix_ht + 
                                          "&taux_tva=" + taux_tva + "&prix_ttc=" + prix_ttc + 
                                          "&getprenom=" + getprenom + 
                                          "&getname=" + getname + "&idUE=" + idUE + '&idser=' + idser,
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
                                      $('#prix_ttc').removeClass('is-invalid');
                                      $('#taux_tva_s').removeClass('is-invalid');
                                      
                                      valid3('Service mis à jour avec succès !');
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
                          $('#taux_tva_s').addClass('is-invalid');
                          err3("Le taux TVA du service saisie n'est pas valide!");
                        }
                    }
                    else
                    {
                      $('#lib_ser').addClass('is-invalid');
                      err3('Veuillez remplir le libellé du service S.V.P!'); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                    }

                });



              //on calcul le taux tva pour la mis à jour  du service
              function calcule_ht_ttc1(event) // fonction de calcul
              {
                var prix_ht = $('input[name="prix_ht_s"]').val();
                var taux_tva  = $('input[name="taux_tva_s"]').val();
                var prix_ttc = $('input[name="prix_ttc"]').val();
                
                if(event.target.name=='prix_ttc')
                {
                  var new_prix_ht = (prix_ttc/(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ht_s"]').val(new_prix_ht);
                }
                else
                {
                  var new_prix_ttc = (prix_ht*(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ttc"]').val(new_prix_ttc);
                } 
              }

              $('#modal-form1').bind('keyup mouseup', calcule_ht_ttc1);

              /*Ici, on affiche les erreurs et les dans un toast*/

              //supprimer un article
            $('#delete_service').click(function()
                {

                  var idser = '<?php echo $idser; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';

                  swal({
                          title: "Confirmer !",
                          text: "Voulez-vous vraiment supprimer ce service ?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#28a745",
                          confirmButtonText: "Oui",
                          cancelButtonText: "Non",
                          closeOnConfirm: false
                          },
                          function(){
                              //swal("Supprimé !!", "L'utilisateur a été supprimé avec succès !!", "success");
                              delete_service();
                              swal(
                                {
                                  title: "Supprimé !!",
                                text: "Le service a été supprimé avec succès !!",
                                type: "success",
                                confirmButtonColor: "#28a745",
                                }, function(){ window.location = 'service_grille_tarifaire.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE; });
                          });
                });



             //fonction supprimer article
              function delete_service()
              {
                var idser = '<?php echo $idser; ?>';

                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/delete_service.php',
                    data  : 'idser=' + idser, 
                    success:function(data)
                    {
                      
                    }
                  });
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
