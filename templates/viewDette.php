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
        
      .table_transaction tbody
      {
        display:block;
        height:140px;
        overflow:auto;
      }

       .table_transaction thead, tbody tr, tfoot
        {
          display:table;
          width:100%;
          table-layout:fixed;
        }

        .table_transaction thead tr
        {
          cursor: pointer;
        }

        .table_transaction thead, tfoot 
        {
            width: calc( 100% - 1em )
        }

      .table_transaction1 tbody
      {
        display:block;
        height:140px;
        overflow:auto;
      }

      .table_transaction1 thead, tbody tr, tfoot
        {
          display:table;
          width:100%;
          table-layout:fixed;
        }

        .table_transaction1 thead tr
        {
          cursor: pointer;
        }

        .table_transaction1 thead, tfoot 
        {
            width: calc( 100% - 1em )
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

      .creance, .dette
      {
        background-color: #d1ecf1;
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

      .body-modal-fournisseur
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        

       #libsearchcatart, #libsearchcatart1 {
          background-image: url('../icons/png/office/search.png');
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 6px 12px 5px 40px;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
      }



      #adresstr
      {
        height: 126px;
      }
      

    </style>
        

         <title>KEDIS Online! | Mes dépenses | Détails dette</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 
                    //session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['id_det']))  //si la variable id qu'on a transité existe dans l'url 
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

                          setlocale(LC_TIME, 'fra_fra');
                          $date_echeance = date("Y-m-d");
                          $date = date("Y-m-d");

                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];

                          $id_det = $_GET['id_det'];
                          $reqvente = $bdd->prepare("SELECT * FROM dette_for_user WHERE id_det = ?"); 
                          $reqvente->execute(array($id_det));

                          $infosVente = $reqvente->fetch();
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

          <?php include('navigation.php'); ?>


            <!-- Breadcrumbs-->
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Mes dettes/créances</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="dette.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes dettes</a></li>
                                        <li class="active">Détails dettes</li>
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
                  <div class="card-header text-white bg-secondary">
                    <h6>Détails dettes</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#apercu">
                          <span class="step size-21">
                            <i class="icon ion-ios-eye-outline"></i>
                          </span>
                          &nbsp;&nbsp;Aperçu
                        </button>
                      </div>
                      
                      <?php

                          if($infosVente['reste_a_payer'] != 0)
                          {

                      ?>

                      <div class="col-md-2">
                        <button role="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#solder-creance">
                          <span class="step size-21">
                            <i class="icon ion-cash"></i>
                          </span>
                          &nbsp;&nbsp;Solder
                        </button>
                      </div>

                      <?php
                          }
                      ?>
                      
                      <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-block" id="delete_dette">
                          <span class="step size-21">
                            <i class="icon ion-ios-trash"></i>
                          </span>
                          &nbsp;&nbsp;Supprimer
                        </button>
                      </div>
                      <div class="col-md-6"></div>
                    </div>

                    <div id="detail_content">
                      
                    </div>
                       
                  </div>
                </div>
              </div>
              <!-- Animated -->

            </div>


            <!--Les modales-->
            <!-- confirme Modal -->
              <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary text-white">
                      <h6 class="modal-title" id="exampleModalLabel">Confirmation</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body bg-light text-dark">
                      <div class="bs-callout bs-callout-warning">
                        <div class="row">
                          <div class="col-md-8">
                            <h5 class="text-warning">Attention !</h5>
                            <h6>Voulez-vous vraiment supprimer cette dette ?</h6>
                          </div>
                          <div class="col-md-4 text-center">
                              <img width="100" height="100" class="icone" src="../icons/png/office/warning.png">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="delete_creance" id="delete_dette">Oui</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- fin confirme Modal -->


             <!-- Modal détail transaction -->
              <div class="modal fade" id="apercu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header badge-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLabel">Aperçu transaction dette</h6>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>
                      
                          
                    </div>
                    <div class="modal-body" id="apercu_creance">
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal détail transaction -->

              <!-- Modal détail facture à payer -->
              <div class="modal fade" id="solder-creance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header badge-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLabel">Solder emprunt <label class="text-secondary" id="dette_initial"><?php echo number_format($infosVente['reste_a_payer'], 2, '.', ''); ?></label></h6>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                      </div>
                      
                          
                    </div>
                    <div class="modal-body" id="apercu_transaction_creance">

                                           
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      <button type="button" class="btn btn-primary" id="solder_dette">Solder</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal détail facture à payer -->


               <!-- Modal détail new échance -->
                <div class="modal fade" id="echance_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header badge-secondary text-white">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Echéance dette <label class="text-secondary" id="id_echeance">0</label></h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                      </div>
                      <div class="modal-body" id="body_new_echeance">
                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-primary" id="change_echeance">Enregistrer</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal détail new échance -->
         
           


        



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

        <script type="text/javascript" src="MDB/js/bootstrap.min.js"></script>
          <!-- MDB core JavaScript -->

        <script type="text/javascript">

          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.creance').addClass('active');

            affiche_detail(); 

              function affiche_detail()
              {
                
                var id_det = '<?php echo $id_det; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/detail_dette.php',
                  data : 'id_det=' + id_det + '&devise=' + devise,
                  success:function(data)
                  {
                    $('#detail_content').html(data);
                  }
                });
              }

              affiche_transaction(); 
              function affiche_transaction()
              {
                var devise = '<?php echo $devise; ?>';
                var id_det = '<?php echo $id_det; ?>';
                var idUE = '<?php echo $idUE; ?>';

                $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/affiche_transaction_dette.php',
                    data  : 'id_det=' + id_det + '&idUE=' + idUE + '&devise=' + devise,
                    success:function(data)
                    {
                      $('#apercu_transaction_creance').html(data);
                    }
                  });
              }

              /*$('#solder').click(function()
                {
                  affiche_transaction();
                  $('#solder-creance').modal('show');
                });*/


              //lorsqu'on clique sur boutton pour enregistrer le changement de  l'échéance
             $('#change_echeance').click(function()
              {
                var id_det = '<?php echo $id_det; ?>';
                var date_echeance = $('#date_echeance').val();

                $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/new_echeance_dette.php',
                  data  : 'id_det=' + id_det + '&date_echeance=' + date_echeance,
                  success:function(data)
                  {
                    valid3('Ehéance prolongé avec succès');
                    affiche_detail();
                    $('#echance_new').modal('hide');
                    setTimeout(function()
                    {
                      window.location.reload();
                    }, 5000);
                  }
                });
              });


              /*$('#get_apercu').click(function()
                {
                  apercu();
                  $('#apercu').modal('show');
                });*/


              //on affiche l'aperçu de la dépense
              apercu();
              function apercu()
              {
                var id_det = '<?php echo $id_det; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/apercu_dette.php',
                  data : 'id_det=' + id_det + '&devise=' + devise,
                  success:function(data)
                  {
                    $('#apercu_creance').html(data);
                  }
                });
              }

               //supprimer dette
            $('#delete_dette').click(function()
                {

                  var id_det = '<?php echo $id_det; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';

                  swal({
                          title: "Confirmer !",
                          text: "Voulez-vous vraiment supprimer cette dette ?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#28a745",
                          confirmButtonText: "Oui",
                          cancelButtonText: "Non",
                          closeOnConfirm: false
                          },
                          function(){
                              //swal("Supprimé !!", "L'utilisateur a été supprimé avec succès !!", "success");
                              delete_dette();
                              swal(
                                {
                                  title: "Supprimé !!",
                                text: "La dette a été supprimé avec succès !!",
                                type: "success",
                                confirmButtonColor: "#28a745",
                                }, function(){ window.location = 'dette.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE; });
                          });
                });


              function delete_dette()
              {
                  var id_det = '<?php echo $id_det; ?>';

                  $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/deleteDette.php',
                    data  : 'id_det=' + id_det, 
                    success:function()
                    {

                    }
                  }); 
              }

               


              //solder la créance 
              $('#solder_dette').click(function()
                {
                  var montantPaye = $('#montantPaye').val();
                  var id_cmp = $('#id_mpaie').val();
                  var autre_devise = $('#autre_devise1').val();
                  var num_cmp = $('#num_cmp').val();
                  var id_det = '<?php echo $id_det; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var dette_initial = $('#dette_initial').text();

                  if(montantPaye != '')
                  {
                    if(/^[0-9]+[.][0-9]+/.test(montantPaye) || /^[0-9]+/.test(montantPaye))
                    {
                      if(id_cmp != '')
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
                                url   : 'fonction/get_equivelent_devise.php',
                                data  : 'autre_devise=' + autre_devise,
                                success:function(data)
                                {
                                  var equiv = data;
                                  var montant = montantPaye / equiv;
                                  var resteApayer = dette_initial - montant;

                                   $.ajax(
                                    {
                                      type  : 'POST',
                                      url   : 'fonction/verif_total_encaissement.php',
                                      data  : 'id_cmp=' + id_cmp + '&taux_echange=' + montant + '&idUE=' + idUE,
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
                                                  if(resteApayer < 0)
                                                  {
                                                    $('#montantPaye').addClass('is-invalid');
                                                    err3('Le montant payé ne peut pas être supérieur au montant de la dette');
                                                  }
                                                  else
                                                  {
                                                    $.ajax(
                                                      {
                                                        type  : 'POST', 
                                                        url   : 'fonction/solder_dette.php',
                                                        data  : 'id_det=' + id_det + '&montant=' + montant +
                                                              '&id_cmp=' + id_cmp + '&autre_devise=' + autre_devise + 
                                                              '&idUE=' + idUE + '&resteApayer=' + resteApayer + 
                                                              '&getid=' + getid + '&num_cmp=' + num_cmp,
                                                        success:function(data)
                                                        {
                                                          //alert(data);
                                                          affiche_detail(); 
                                                          $('#montantPaye').removeClass('is-invalid');
                                                          $('#montantPaye').val('');
                                                          $('#solder-creance').modal('hide');
                                                          $('#num_cmp').removeClass('is-invalid');
                                                          $('#id_mpaie').removeClass('is-invalid');
                                                          $('#autre_devise1').removeClass('is-invalid');
                                                          $('#num_cmp').val('');
                                                          valid3('Dette soldée avec succès');

                                                          //on initialise la dette initial
                                                          $('#dette_initial').text(resteApayer);
                                                          setTimeout(function()
                                                          {
                                                            window.location.reload();
                                                          }, 5000);
                                                        }
                                                      });
                                                  }
                                                }
                                                else
                                                {
                                                  //le mode de paiement contient un numéro de compte
                                                  if(num_cmp != '')
                                                  {
                                                    if(resteApayer < 0)
                                                    {
                                                      $('#montantPaye').addClass('is-invalid');
                                                      err3('Le montant payé ne peut pas être supérieur au montant de la dette');
                                                    }
                                                    else
                                                    {
                                                      $.ajax(
                                                        {
                                                          type  : 'POST', 
                                                          url   : 'fonction/solder_dette.php',
                                                          data  : 'id_det=' + id_det + '&montant=' + montant +
                                                                '&id_cmp=' + id_cmp + '&autre_devise=' + autre_devise + 
                                                                '&idUE=' + idUE + '&resteApayer=' + resteApayer + 
                                                                '&getid=' + getid + '&num_cmp=' + num_cmp,
                                                          success:function(data)
                                                          {
                                                            //alert(data);
                                                            affiche_detail(); 
                                                            $('#montantPaye').removeClass('is-invalid');
                                                            $('#montantPaye').val('');
                                                            $('#solder-creance').modal('hide');
                                                            $('#num_cmp').removeClass('is-invalid');
                                                            $('#id_mpaie').removeClass('is-invalid');
                                                            $('#autre_devise1').removeClass('is-invalid');
                                                            $('#num_cmp').val('');
                                                            valid3('Dette soldée avec succès');

                                                            //on initialise la dette initial
                                                            $('#dette_initial').text(resteApayer);
                                                            setTimeout(function()
                                                            {
                                                              window.location.reload();
                                                            }, 5000);
                                                          }
                                                        });
                                                    }
                                                  }
                                                  else
                                                  {
                                                    //si le numéro de compte n'est pas saisie
                                                    $('#num_cmp').addClass('is-invalid');
                                                    err3('Veuillez saisir le numéro de compte du Débiteur S.V.P !');
                                                  }
                                                }
                                              }
                                            });
                                        }
                                        else
                                        {
                                          err3("Impossible d'effectuer un décaissement car la caisse ne peut être négative !");
                                          $('#montantPaye').addClass('is-invalid');
                                        }
                                      }
                                    });
                                }
                              });
                            }
                            else
                            {
                              $('#autre_devise1').addClass('is-invalid');
                              err3('Veuillez Choissir la devise correspondant à la devise du mode paiement');
                            }
                          }
                        });
                      }
                      else
                      {
                        $('#id_mpaie').addClass('is-invalid');
                        err3('Veuillez choisir le mode de paiement S.V.P !');
                      }
                    }
                    else
                    {
                      $('#montantPaye').addClass('is-invalid');
                      err3('Le montant payé est invalide !');
                    }
                  }
                  else
                  {
                    $('#montantPaye').addClass('is-invalid');
                    err3('Veuillez saisir le montant payé S.V.P !');
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
