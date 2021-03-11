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
     
     /* tbody 
        {
          display:block;
          height:200px;
          overflow:auto;
        }

        thead, tbody tr, tfoot
        {
          display:table;
          width:100%;
          table-layout:fixed;
        }

        thead tr
        {
          cursor: pointer;
        }

        thead, tfoot 
        {
            width: calc( 100% - 1em )
        }*/

      .container-tab1 {
        overflow-y: auto;
        height: 150px;
        background-color: white;
      }

      /*tr:nth-child(even) {background-color: #d1ecf1;}
      tbody tr:hover{ background-color: #F1F1F1;  }*/

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

      .finance
      {
        background-color: #d1ecf1;
      }
    </style>
        

         <title>KEDIS Online! | Détails mode de paiement</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

         <!--Code PHP-->
                <?php 
                    //session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['id_cmp']))  //si la variable id qu'on a transité existe dans l'url 
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

                          $id_cmp = $_GET['id_cmp']; //on récupère l'id du client

                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];


                          /*if(isset($_POST['delete_cmp']))
                          {
                            $deletereq = $bdd->prepare("DELETE FROM compte_financier WHERE id_cmp = ?");
                            $deletereq->execute(array($id_cmp));

                            header('location:compte_finacier.php?id='.$getid."&id_connexion=".$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE);
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

              $reqfournis = $bdd->prepare("SELECT * FROM compte_financier WHERE id_cmp = ?");
              $reqfournis->execute(array($id_cmp));

              $infofournis = $reqfournis->fetch();
            ?>


            <!-- Breadcrumbs-->
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Mes  modes de paiement</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="compte_finacier.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes  modes de paiement</a></li>
                                        <li class="active">Détails mode de paiement</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
              <!-- Animated -->
              <div class="row">
              <div class="col-md-3">
                <a class="btn btn-success btn-block" href="paiement_fournis.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&id_cmp=<?php echo $id_cmp; ?>" role="button">
                  <span class="step size-21">
                    <i class="icon ion-arrow-up-c"></i>
                  </span>
                  Effectuer un paiement
                </a>
              </div>
              <div class="col-md-3">
                <a class="btn btn-success btn-block" href="paiement_client.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&id_cmp=<?php echo $id_cmp; ?>" role="button">
                  <span class="step size-21">
                    <i class="icon ion-arrow-down-c"></i>
                  </span>
                  Enregistrer un encaissement
                </a>
              </div>
              <div class="col-md-6">
                
              </div>
            </div>
            <br>

              <div class="animated fadeIn">
                <div class="card">
                  <div class="card-header">
                    <h6>Détails mode de paiement</h6>
                  </div>
                  <div class="card-body">

                    <?php

                      //si l'autres tiers n'est pas par défault alors, on affiche les bouttons supprimer et modifier
                      if($infofournis['default_cmp'] != 1)
                      {
                    ?>
                      <div class="row">
                        <div class="col-md-2">
                          <button role="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal_moyen_paiement">
                            <span class="step size-21">
                              <i class="icon ion-edit"></i>
                            </span>
                            &nbsp;&nbsp;Modifier
                          </button>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="btn btn-danger btn-block" id="delete">
                            <span class="step size-21">
                              <i class="icon ion-ios-trash"></i>
                            </span>
                            &nbsp;&nbsp;Supprimer
                          </button>
                        </div>
                        <div class="col-md-8"></div>
                      </div>
                      
                    <?php
                      }
                    ?>

                     

                    <?php

                      //si l'autres tiers n'est pas par défault alors, on affiche les bouttons supprimer et modifier
                      if($infofournis['default_cmp'] == 1)
                      {
                    ?>

                       <div class="row">
                        <div class="col-md-2">
                          <button role="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#fond-caisse">
                            <span class="step size-21">
                              <i class="icon ion-social-usd"></i>
                            </span>
                            &nbsp;&nbsp;Encaisser
                          </button>
                        </div>
                        <div class="col-md-10"></div>
                      </div>

                    <?php
                      }

                    ?>

                    <div id="detail_content">
                      
                    </div>
                       
                  </div>
                </div>
              </div>
              <!-- Animated -->

            </div>


            <!--Les modales-->
             <div class="modal fade bd-example-modal-lg ajouter-moyen-paiement" id="modal_moyen_paiement" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Modifier le mode de paiement</h6>
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
                                <div class="form-group">
                                    <label for="lib_cmp"><h6>Libellé</h6></label>
                                    <input type="text" class="form-control" id="lib_cmp" aria-describedby="emailHelp" placeholder="Libellé moyen de paiement" name="lib_cmp" value="<?php echo $infofournis['lib_cmp']; ?>">
                                </div>
                              </div>


                              <div class="col-md-6">
                               <div class="form-group">
                                  <label for="nom_inst_cmp"><h6>Nom de l'institution (si banque)</h6></label>
                                  <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Entrez le nom de l'institution" name="nom_inst_cmp" id="nom_inst_cmp" value="<?php echo $infofournis['nom_inst_cmp']; ?>">
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="iban_cmp"><h6>Iban (si banque))</h6></label>
                                  <input type="text" class="form-control" id="iban_cmp" aria-describedby="emailHelp" placeholder="Entrez l'Iban" name="iban_cmp" value="<?php echo $infofournis['iban_cmp']; ?>">
                                </div>
                              </div>


                              <div class="col-md-6">
                               <div class="form-group">
                                  <label for="gest_neg_cmp"><h6>Gestion des négatifs</h6></label>
                                  <select class="custom-select" name="gest_neg_cmp" id="gest_neg_cmp">
                                    <option value="<?php echo $infofournis['gestion_negatif_cmp']; ?>" selected><?php echo $infofournis['gestion_negatif_cmp']; ?></option>
                                    <option value="Oui">Oui</option>
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
                                      <option value="<?php echo $infofournis['devise_cmp']; ?>" selected><?php echo $infofournis['devise_cmp']; ?></option>
                                      <option value="<?php echo $devise; ?>"><?php echo $devise; ?></option>
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
                                <label for="num_cmp"><h6>Numéro de compte (si banque)</h6></label>
                                <input type="text" class="form-control" id="num_cmp" aria-describedby="emailHelp" placeholder="Entrez le numéro de compte" name="num_cmp" value="<?php echo $infofournis['num_cmp']; ?>">
                              </div>
                              </div>
                            </div>

                              <div class="form-group">
                                <label for="bic_cmp"><h6>BIC/Swiff (si banque)</h6></label>
                                <input type="text" class="form-control" id="bic_cmp" aria-describedby="emailHelp" placeholder="Entrez le BIC/Swiff" name="bic_cmp" value="<?php echo $infofournis['bic_swiff_cmp']; ?>">
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

            
              <!--Nouvelle sous-catégirie-->


              <!-- Modal -->
              <div class="modal fade" id="fond-caisse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLabel">Ajouter ou augmenter le fond de caisse</h6>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>
                      
                        
                    </div>
                    <div class="modal-body">
                      <label for="lib-fond-caisse"><h6>Désignation</h6></label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/clipboard.png"></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Désignation de l'encaissement" name="lib-fond-caisse" id="lib-fond-caisse">
                      </div>

                      <label for="montant-fond-caisse"><h6>Montant</h6></label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/cash.png"></span>
                          </div>
                          <input type="text" class="form-control text-right" placeholder="0.00" name="montant-fond-caisse" id="montant-fond-caisse">
                          <div class="input-group-append">
                              <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $devise; ?></span>
                          </div>
                      </div>


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                      <button type="button" class="btn btn-primary" id="save-fond-caisse">Enregistrer</button>
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



        <script src="../dist/js/util.js"></script>
        <!--<script src="../dist/js/dropdown.js"></script>-->
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>


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

          <!--switch arlert-->
          <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">

          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.paiement').addClass('active');

            affiche_detail(); 

              function affiche_detail()
              {
                
                var id_cmp = '<?php echo $id_cmp; ?>';
                var devise = '<?php echo $devise; ?>';
                var idUE = '<?php echo $idUE; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/detail_mode_paiement.php',
                  data : 'id_cmp=' + id_cmp + '&devise=' + devise + '&idUE=' + idUE,
                  success:function(data)
                  {
                    $('#detail_content').html(data);
                  }
                });
              }

              //enregistrer un encaissement ou un fon de caisse
              $('#save-fond-caisse').click(function()
                {
                  var designation = $('#lib-fond-caisse').val();
                  var montant = $('#montant-fond-caisse').val();
                  var id_cmp = '<?php echo $id_cmp; ?>';
                  var devise = '<?php echo $devise; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var getid = '<?php echo $getid; ?>';

                  if(designation != '')
                  {
                    if(/^[0-9]+[.][0-9]+/.test(montant) || montant != '')
                    {
                      $.ajax(
                        {
                          type  : 'POST', 
                          url   : 'fonction/save_fond_caisse.php',
                          data  : 'designation=' + designation + '&montant=' + montant + '&id_cmp=' + id_cmp +
                                  '&devise=' + devise + '&idUE=' + idUE + '&getid=' + getid, 
                          success:function(data)
                          {

                            valid3("Encaissement enregistré avec succès !");
                            $('#fond-caisse').modal('hide');

                            $('#lib-fond-caisse').val('');
                            $('#montant-fond-caisse').val('');
                            $('#montant-fond-caisse').removeClass('is-invalid');
                            $('#lib-fond-caisse').removeClass('is-invalid');

                            setTimeout(function()
                              {
                                window.location.reload();
                              }, 5000);
                              affiche_detail();
                          }
                        });
                    }
                    else
                    {
                      err3("Veuillez saisir le montant S.V.P!");
                      $('#montant-fond-caisse').addClass('is-invalid');
                    }
                  }
                  else
                  {
                    err3("Veuillez saisir la désignation S.V.P!");
                    $('#lib-fond-caisse').addClass('is-invalid');
                  }

                });


               /*Mis à jour du mode de paiement*/

            $('#savecmp').click(function()
              {
                var id_cmp = '<?php echo $id_cmp; ?>';
                var lib_cmp = $('#lib_cmp').val();
                var devise_cmp = $('#devise_cmp').val();
                var nom_inst_cmp = $('#nom_inst_cmp').val();
                var iban_cmp = $('#iban_cmp').val();
                var num_cmp = $('#num_cmp').val();
                var bic_cmp = $('#bic_cmp').val();
                var gest_neg_cmp = $('#gest_neg_cmp').val();

                if(lib_cmp != '')
                {
                  if(nom_inst_cmp != '')
                  { 
                    if(num_cmp != '')
                    { 
                      $.ajax(
                        {
                          type  : 'POST', 
                          url   : 'fonction/update_moyen_paiement.php',
                          data  : 'id_cmp=' + id_cmp + '&lib_cmp=' + lib_cmp + '&devise_cmp=' + devise_cmp + 
                                  '&nom_inst_cmp=' + nom_inst_cmp + '&iban_cmp=' + iban_cmp +
                                  '&num_cmp=' + num_cmp + '&bic_cmp=' + bic_cmp + 
                                  '&gest_neg_cmp=' + gest_neg_cmp,
                          success:function(data)
                          {
                            if(data == 1)
                            {
                              err3("Ce mode paiement existe déjà");
                            }
                            else
                            {
                              $('#lib_cmp').removeClass('is-invalid');
                              $('#devise_cmp').removeClass('is-invalid');
                              $('#nom_inst_cmp').removeClass('is-invalid');
                              $('#iban_cmp').removeClass('is-invalid');
                              $('#num_cmp').removeClass('is-invalid');
                              $('#bic_cmp').removeClass('is-invalid');
                              $('#gest_neg_cmp').removeClass('is-invalid');

                              $("#modal_moyen_paiement").modal('hide');
                              valid3("Mode de paiement mis à jour avec succès !");
                              setTimeout(function()
                              {
                                window.location.reload();
                              }, 5000);
                              affiche_detail();
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
                        url   : 'fonction/update_moyen_paiement.php',
                        data  : 'id_cmp=' + id_cmp + '&lib_cmp=' + lib_cmp + '&devise_cmp=' + devise_cmp + 
                                '&nom_inst_cmp=' + nom_inst_cmp + '&iban_cmp=' + iban_cmp +
                                '&num_cmp=' + num_cmp + '&bic_cmp=' + bic_cmp + 
                                '&gest_neg_cmp=' + gest_neg_cmp,
                        success:function(data)
                        {
                          if(data == 1)
                          {
                            err3("Ce mode paiement existe déjà");
                          }
                          else
                          {
                            $('#lib_cmp').removeClass('is-invalid');
                            $('#devise_cmp').removeClass('is-invalid');
                            $('#nom_inst_cmp').removeClass('is-invalid');
                            $('#iban_cmp').removeClass('is-invalid');
                            $('#num_cmp').removeClass('is-invalid');
                            $('#bic_cmp').removeClass('is-invalid');
                            $('#gest_neg_cmp').removeClass('is-invalid');

                            $("#modal_moyen_paiement").modal('hide');
                            valid3("Mode de paiement mis à jour avec succès !");

                            setTimeout(function()
                            {
                              window.location.reload();
                            }, 5000);
                            affiche_detail();
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


               //supprimer un moyen de paiement
              $('#delete').click(function()
                {

                  
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';

                  swal({
                          title: "Confirmer !",
                          text: "Voulez-vous vraiment supprimer ce mode paiement ?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#28a745",
                          confirmButtonText: "Oui",
                          cancelButtonText: "Non",
                          closeOnConfirm: false
                          },
                          function(){
                              //swal("Supprimé !!", "L'utilisateur a été supprimé avec succès !!", "success");
                              delete_mode();
                              swal(
                                {
                                  title: "Supprimé !!",
                                text: "Le mode paiement a été supprimé avec succès !!",
                                type: "success",
                                confirmButtonColor: "#28a745",
                                }, function(){ window.location = 'compte_finacier.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE; });
                          });
                });


              //fonction supprimer un mode de paiement
              function delete_mode()
              {
                var id_cmp = '<?php echo $id_cmp; ?>';

                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/delete_mode_paiement.php',
                    data  : 'id_cmp=' + id_cmp, 
                    success:function(data)
                    {
                      
                    }
                  });
              }


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
