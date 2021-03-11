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


        <!--<link rel="stylesheet" type="text/css" href="assets/css/loader.css">-->
        <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">

  

    <style type="text/css">
     


      

      .form_card
      {
        background-color: #d1ecf1;
      }

      .body-modal-entreprise
        {
          overflow-y: auto;
          height: 505px;
          background-color: white;
        }

        .card_setting
        {
          height: 200px;
           box-shadow: 0px 0px 20px #aaaaaa;
        }



      

    </style>
        

         <title>KEDIS Online!</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 
                    //session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND $_GET['id'] > 0 AND isset($_GET['id_connexion']))  //si la variable id qu'on a transité existe dans l'url 
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


                      $get_abonnement = $bdd->prepare("SELECT * FROM abonnement WHERE id = ? ");
                      $get_abonnement->execute(array($id_abonne));

                      $info_abonne = $get_abonnement->fetch();
                      $type_abonne = $info_abonne['type'];


                      if($id_connexion == $get_id_connexion)
                      {
                      //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                          if($login_required == 1)
                          {
                              if($sexe == "Homme")
                              {
                                  $genre = "monsieur";
                              }
                              else
                              {
                                  $genre = "madame";
                              }


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

         <div id="right-panel" class="right-panel">
            
            <!--on inlus la la barre de navigation au dessus-->
            <?php  include('navbar.php'); ?>
        </div>


        <div class="container" id="container">
          <br>
            <div class="card">
              <div class="card-header"><b>Paramètres</b></div>
              <div class="card-body">
                
                <div class="row">
                  <div class="col-md-4">
                    <button class="btn btn-block btn-light text-secondary card_setting" id="paramtre-compte" title="Modifier les paramètres comptes">
                      <span class="step size-48">
                        <i class="icon ion-android-person"></i>
                      </span><br>
                      <strong>Paramètre compte</strong>
                    </button>
                  </div>

                  <?php

                    if($userfos['statut'] == 'admin')
                    {
                      if($type_abonne == 'Moyenne Entreprise' || $type_abonne == 'Entreprise' || $type_abonne == 'Essaie' || $type_abonne == 'Avie')
                      {
                  ?>

                  <div class="col-md-4">
                    <button class="btn btn-block btn-light text-secondary card_setting" id="user-gestion">
                      <span class="step size-48">
                        <i class="icon ion-android-people"></i>
                      </span><br>
                      <strong>Gestion d'utilisateurs</strong>
                    </button>
                  </div>

                  <!--<div class="col-md-4">
                    <button class="btn btn-block btn-light text-secondary card_setting" id="">
                      <span class="step size-48">
                        <i class="icon ion-briefcase"></i>
                      </span><br>
                      <strong>Paramètre entreprise</strong>
                    </button>
                  </div>
                  
                </div>

                <br>

                <div class="row">
                  <div class="col-md-4">
                    <button class="btn btn-block btn-light text-secondary card_setting">
                      <span class="step size-48">
                        <i class="icon ion-home"></i>
                      </span><br>
                      <strong>Paramètre unité d'exploitation</strong>
                    </button>
                  </div>-->
              <?php 
                }
              ?>
                  <div class="col-md-4">
                    <button class="btn btn-block btn-light text-secondary card_setting" id="abonnement">
                      <span class="step size-48">
                        <i class="icon ion-card"></i>
                      </span><br>
                      <strong>Abonnement</strong>
                    </button>
                  </div>
                </div>

                <?php
                  }
                ?>


              </div>
            </div>
                
             
            
           
        </div> <!-- /container -->


        

                

         

        <!--*****************************************************-->
        <br><br>
        <!-- Footer -->
        <nav class="bg-light">
          <div class="p-3 mb-2 text-dark">
            <div class="row fixed-bottom">
                    <div class="col-sm-6">
                        Copyright &copy; 2019 KEDIS Online!
                    </div>
                    <div class="col-sm-6 text-right">
                    </div>
                </div>
          </div>
        </nav>
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
          <!-- scripit init-->
          <!--<script src="assets/js/lib/sweetalert/sweetalert.init.js"></script>-->

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">
          jQuery(document).ready(function($) 
          {

            //lorsqu'on clique sur le boutton gestion d'utilisateur
              $('#user-gestion').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                   window.location = 'user.php?id=' + getid + "&id_connexion=" + id_connexion;
                });

              //lorsqu'on clique sur le boutton abonnement
              $('#abonnement').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                   window.location = 'abonnement.php?id=' + getid + "&id_connexion=" + id_connexion;
                });

              $('#paramtre-compte').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                   window.location = 'parametre_compte.php?id=' + getid + "&id_connexion=" + id_connexion;
                });


               


                 /*les messages d'erreur et valide dans un toast*/

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
