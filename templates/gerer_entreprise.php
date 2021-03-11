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

         <!--css callout-->
        <link href="../asserts/css/callout.css" rel="stylesheet">

        <!--cropper-->
        <link rel="stylesheet" href="../asserts/css/cropper/cropper.css">
        <link rel="stylesheet" href="../asserts/css/cropper/main.css">

  

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

        .container-tab1 {
        overflow-y: auto;
        height: 150px;
        background-color: white;
      }

      .container-tab1 li
      {
        cursor: pointer;
      }

      .text-info2
      {
        color: #d1ecf1;
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

    #logoUE
    {
        height: 77px;
    }

    #petite_entreprise
    {
      display: none;
    }

    #moyenne_entreprise
    {
      display: none;
    }



      

    </style>
        

         <title>KEDIS Online! Gérer les entreprises</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
               <?php 

                   // session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['id_abonne']))  //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; 
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

                          setlocale(LC_TIME, 'fr_FR'); //serveur
                          //setlocale(LC_TIME, 'fra_fra'); //php 5 en local 

                          //on recupère la date debut du mois
                          $datedebut = date("d-m-Y", mktime(0,0,0,date("m"),1,date("Y")));
                          //on recupère la date fin du mois
                          $datefin = date("d-m-Y", mktime(0,0,0,date("m")+1,0,date("Y")));

                          $date = date("Y-m-d");
                          $heure = date("H:i");

                          $id_abonne = $_GET['id_abonne'];

                          //on récupère d'abord le type d'abonnement du client 
                          $get_abonnement = $bdd->prepare("SELECT * FROM abonnement WHERE id = ? ");
                          $get_abonnement->execute(array($id_abonne));

                          $info_abonne = $get_abonnement->fetch();
                          $type_abonne = $info_abonne['type'];

                        

                     
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


        <div class="container">
          <br>
          <!--<div class="alert alert-light" role="alert">
             <h1 class="h2">Gestion des utilisateurs</h1>
         </div>-->

         <div class="p-3 mb-2 bg-white text-dark">
           <div class="row">
             <div class="col-md-6">
               <h5>Gérer les entreprises</h5>
             </div>
             <div class="col-md-6">
               <h5 class="text-right"><a href="accueille.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>">Entreprise </a>/ Gérer les entreprises</h5>
             </div>
           </div>
         </div>

         

          <div class="card border-info mb-3" >
            <div class="card-header text-left"><strong><b>Gérer les entreprises</b></strong></div>
              <div class="card-body">
                
                <?php
                  

                ?>

                    <div class="alert alert-warning" role="alert">
                      Votre abonnement est de type <b><?php echo $type_abonne; ?></b>. Veuillez cocher les entreprises que vous voulez utiliser.
                    </div>

                <?php

                    /*if($type_abonne == 'Moyenne Entreprise')
                    {*/
                ?>

                  <div class="alert alert-danger" role="alert" id="petite_entreprise">
                      Vous devez cocher une seule entreprise car votre abonnement est de type <b><?php echo $type_abonne; ?></b>.
                  </div>

                  <div class="alert alert-danger" role="alert" id="moyenne_entreprise">
                      Vous devez juste cocher 2 entreprises car votre abonnement est de type <b><?php echo $type_abonne; ?></b>.
                  </div>

                <?php

                  $view = $bdd->prepare("SELECT * FROM gestion, entreprise WHERE id_user = ? AND id_E = idE "); //on séléctionne les entreprise appartenant à cet utlisateur
                  $view->execute(array($getid));
                  $i = 1;

                  $existallE = $view->rowCount();
                ?>

                  <ul class="list-group">
                <?php
                  while($row = $view->fetch()) 
                  {
                ?>

                      <li class="list-group-item d-flex justify-content-between align-items-center ">
                       
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input checkbox" id="<?php echo $row['nomE']; ?>" <?php if($row['statut'] == 1){ echo 'checked="true"'; }?> statut="<?php echo $row['statut']; ?>" option="<?php echo $row['idE']; ?>">
                          <label class="custom-control-label" for="<?php echo $row['nomE']; ?>"><b><?php echo $row['nomE']; ?></b></label>
                        </div>

                        <span class="statut-text text-white" id="<?php echo $row['idE']; ?>"><?php echo $row['statut']; ?></span>

                        <span class="badge badge-light badge-pill">
                          <span class="step size-16">
                              <i class="icon ion-location"></i>
                          </span> &nbsp;&nbsp;
                          <?php echo $row['paysE']; ?>  
                        </span>
                        
                      </li>
                   

                <?php
                    }

                ?>
                </ul>
                
                <br>
                <!--<button type="button" class="btn btn-success" id="save_entreprise">
                    <span class="step size-21">
                        <i class="icon ion-android-done"></i>
                    </span>
                        &nbsp;&nbsp;Enregistrer
                </button>-->

              </div>

            </div>
        </div>

      


              

       

        

                

         

        <!--*****************************************************-->
        
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

        jQuery(document).ready(function($) 
        {
          
            $('.checkbox').click(function()
              {
                //var check = $(this).attr('id');
                var id = $(this).attr('option');
                var type_abonne = '<?php echo $type_abonne; ?>';
                var nbr = $('input:checked').length;

                if(type_abonne == 'Petite Entreprise')
                {
                  if(nbr <= 1)
                  {
                    if($('#' + id + '').text() == 0)
                    {
                      $('#' + id + '').text(1);
                      var statut = 1;

                      $.ajax(
                      {
                        type  : 'POST', 
                        url   : 'fonction1/check_entreprise.php', 
                        data  : 'id=' + id + '&statut=' + statut,
                        success:function(data)
                        {
                          //alert(data);
                        }
                      });
                    }
                    else
                    {
                      $('#' + id + '').text(0);

                      var statut = 0;

                      $.ajax(
                      {
                        type  : 'POST', 
                        url   : 'fonction1/check_entreprise.php', 
                        data  : 'id=' + id + '&statut=' + statut,
                        success:function(data)
                        {
                          //alert(data);
                        }
                      });
                    }
                  }
                  else
                  {
                    err3("Vous devez juste cocher une seule entreprise.");
                  }
                }
                else
                {
                  if(nbr <= 2)
                  {
                    if($('#' + id + '').text() == 0)
                    {
                      $('#' + id + '').text(1);

                      var statut = 1;

                      $.ajax(
                      {
                        type  : 'POST', 
                        url   : 'fonction1/check_entreprise.php', 
                        data  : 'id=' + id + '&statut=' + statut,
                        success:function(data)
                        {
                          
                        }
                      });
                    }
                    else
                    {
                      $('#' + id + '').text(0);

                      var statut = 0;

                      $.ajax(
                      {
                        type  : 'POST', 
                        url   : 'fonction1/check_entreprise.php', 
                        data  : 'id=' + id + '&statut=' + statut,
                        success:function(data)
                        {
                          
                        }
                      });
                    }
                  }
                  else
                  {
                    err3("Vous devez juste cocher 2 entreprises.");
                  }
                }
                //alert(check);

                

                /*if($('.checkbox').is(':checked'))
                {
                  //alert('1');
                  $('#' + id + '').text(1);
                }
                else
                {
                  $('#' + id + '').text(0);
                  //alert('0');
                }*/
              });

           /* $('#save_entreprise').click(function()
              {
                /*var nbr = $('input:checked').length;

                alert(nbr);

                var statut = $('.statut-text').attr('idù');

                alert(statut);
              });*/


            setInterval(nbr_entreprise, 1000);
            nbr_entreprise();
            //ici on verifie les nombres d'entreprises cocher 
            //pour vérifie si on n'as pas dépassé le nombre exigé
            function nbr_entreprise()
            {
              var nbr = $('input:checked').length;
              var type_abonne = '<?php echo $type_abonne; ?>';

              if(type_abonne == 'Petite Entreprise')
              {
                //alert(type_abonne);
                if(nbr > 1)
                {
                  $('#petite_entreprise').css('display', 'block');
                  $('#moyenne_entreprise').css('display', 'none');
                }
                else
                {
                  $('#petite_entreprise').css('display', 'none');
                  $('#moyenne_entreprise').css('display', 'none');
                }
              }
              else
              {
                //alert(type_abonne);
                if(nbr > 2)
                {
                  $('#petite_entreprise').css('display', 'none');
                  $('#moyenne_entreprise').css('display', 'block');
                }
                else
                {
                  $('#petite_entreprise').css('display', 'none');
                  $('#moyenne_entreprise').css('display', 'none');
                }
              }
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
