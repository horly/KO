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

  

    <style type="text/css">
     

      tbody 
        {
          display:block;
          height:300px;
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
        }

      .container-tab1 {
        overflow-y: auto;
        height: 150px;
        background-color: white;
      }

      tr:nth-child(even) {background-color: #d1ecf1;}
      tbody tr:hover{ background-color: #F1F1F1;  }
     

      .user
      {
        background-color: #d1ecf1;
      }
       #libsearchcatart {
        background-image: url('../icons/png/office/search.png');
        background-position: 10px 10px; 
        background-repeat: no-repeat;
        padding: 6px 12px 5px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
      }

      .form_card
      {
        background-color: #d1ecf1;
      }

      .text-info2
      {
        color: #d1ecf1;
      }

      .body-modal-entreprise
        {
          overflow-y: auto;
          /*height: 505px;*/
          background-color: white;
        }

        .ronde
        {
          border : 2px solid #007bff;
          border-radius: 100px;
          width: 120px;
          height: 120px;
          margin-left: auto;
          margin-right: auto;
          padding:15px;
        }

        .div_souscription
        {
          background-color: #f8f9fa;
        }

        .div_souscription:hover
        {
          background-color: #343a40;
          color: #f8f9fa;
        }
      

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

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']))   //si la variable id qu'on a transité existe dans l'url 
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
                      $id_abonnement = $userfos['id_abonnement'];

                      //$getidE = $_GET['idE']; //on recupère l'id de l'entreprise
                      //$nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise

                      $login_required = $userfos['login_required'];
                      $id_connexion = $userfos['id_connexion'];


                      if($id_connexion == $get_id_connexion)
                      {
                        //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                        if($login_required == 1)
                        {

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


        <?php

              $getabonnement = $bdd->prepare('SELECT * FROM abonnement WHERE id = ?');
              $getabonnement->execute(array($id_abonnement));
              $info_abonnement = $getabonnement->fetch();


              setlocale(LC_TIME, 'fr_FR'); //serveur
              //setlocale(LC_TIME, 'fra_fra'); //php 5 en local

              $date = date("d-m-Y"); //jour actuel

              $date_debut = $info_abonnement['date_debut'];

              $date_fin = $info_abonnement['date_fin'];

            ?>

            <div class="container">
                <br>

                <div class="p-3 mb-2 bg-white text-dark">
                   <div class="row">
                     <div class="col-md-6">
                       <h5>Paramètres</h5>
                     </div>
                     <div class="col-md-6">
                       <h5 class="text-right"><a href="parametre.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>">Paramètres </a>/ Abonnements</h5>
                     </div>
                   </div>
                 </div>

                 <div class="card">
                    <h6 class="card-header">
                      <ul class="nav nav-pills card-header-pills">
                          <li class="nav-item">
                            <a class="nav-link active" href="#"><strong>Abonnements</strong></a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#"><strong>Mes méthodes de paiement</strong></a>
                          </li>
                      </ul>
                    </h6>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="bs-callout bs-callout-primary">
                            <div class="row">
                              <div class="col-md-5"><h6 class="text-primary">Type d'abonnement</h6></div>
                              <div class="col-md-2"><h6 class="text-primary text-center">:</h6></div>
                              <div class="col-md-5">
                                <?php 
                                  if($info_abonnement['type'] == 'Avie')
                                  {
                                    echo 'A vie';
                                  }
                                  else
                                  {
                                    echo $info_abonnement['type'];
                                  } 
                                ?>
                                  
                                </div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-5"><h6 class="text-primary">Jours restant</h6></div>
                              <div class="col-md-2"><h6 class="text-primary text-center">:</h6></div>
                              <div class="col-md-5">
                                <?php 
                                  
                                    $dureesejour = (strtotime($date_fin) - strtotime($date));

                                    $jours_restant = $dureesejour/86400;

                                    if($jours_restant == 1)
                                    {
                                      //echo $jours_restant.' jour';
                                      echo number_format($jours_restant, 0, '', '').' jour';
                                    }
                                    else
                                    {
                                      //echo $jours_restant.' jours';
                                      echo number_format($jours_restant, 0, '', '').' jours';
                                    }
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="bs-callout bs-callout-primary">
                            <div class="row">
                              <div class="col-md-5"><h6 class="text-primary">Date de souscription</h6></div>
                              <div class="col-md-2"><h6 class="text-primary text-center">:</h6></div>
                              <div class="col-md-5"><?php echo $info_abonnement['date_debut']; ?></div>
                            </div>
                            <br>
                            <div class="row">
                              <div class="col-md-5"><h6 class="text-primary">Date d'expiration</h6></div>
                              <div class="col-md-2"><h6 class="text-primary text-center">:</h6></div>
                              <div class="col-md-5"><?php echo $info_abonnement['date_fin']; ?></div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <br>

                      <h5 class="text-center" id="abonne_type">Les types d'abonnement</h5>
                      <hr>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="card border div_souscription">
                            <div class="card-body">
                              <h5 class="text-center">PETITE ENTREPRISE</h5>
                              <br>
                              <div class="ronde">
                                <h1 class="text-center">$0</h1>
                                <h6 class="text-center">/mois</h6>
                              </div>
                              <br>
                              <h6 class="text-center">5 factures / mois</h6>
                              <h6 class="text-center">1 Entreprise</h6>
                              <h6 class="text-center">1 Unité d'exploitation</h6>
                              <h6 class="text-center">1 Utilisateur</h6>
                              <br>
                              <button type="button" class="btn btn-outline-primary btn-block text-center" id="abonne_petite">Souscrire</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card border div_souscription">
                             <div class="card-body">
                              <h5 class="text-center">MOYENNE ENTREPRISE</h5>
                              <br>
                              <div class="ronde">
                                <h1 class="text-center">$10</h1>
                                <h6 class="text-center">/mois</h6>
                              </div>
                              <br>
                              <h6 class="text-center">Factures illimitées</h6>
                              <h6 class="text-center">2 Entreprises</h6>
                              <h6 class="text-center">5 Unités d'exploitation/Entreprise</h6>
                              <h6 class="text-center">5/Utilisateurs/Entreprise</h6>
                              <br>
                              <button type="button" class="btn btn-outline-primary btn-block text-center" id="abonne_moyenne">Souscrire</button>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="card border div_souscription">
                            <div class="card-body"> 
                              <h5 class="text-center">ENTREPRISE</h5>
                              <br>
                              <div class="ronde">
                                <h1 class="text-center">$25</h1>
                                <h6 class="text-center">/mois</h6>
                              </div>
                              <br>
                              <h6 class="text-center">Factures illimitées</h6>
                              <h6 class="text-center">Entreprises illimitées</h6>
                              <h6 class="text-center">Unités d'exploitations illimitées</h6>
                              <h6 class="text-center">Utilisateurs illimités</h6>
                              <br>
                              <button type="button" class="btn btn-outline-primary btn-block text-center" id="abonne_entreprise">Souscrire</button>
                            </div>  
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
    </div>

       


            

        

                

         

        <!--*****************************************************-->
        <br><br>
        <!-- Footer -->
        
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

              $('#abonne_petite').click(function()
                {
                  var getid = '<?php echo $getid; ?>';

                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction1/deconnecte_user.php',
                      data  : 'getid=' + getid,
                      success:function(data)
                      {

                        //alert(data);
                        var email = data; 

                        $.ajax(
                        {
                            type    : 'POST', 
                            url     : 'fonction1/paiement_petite_entreprise.php',
                            data    : 'email=' + email,
                            success:function(data)
                            {
                                swal(
                                {
                                    title: "Succès !!",
                                    text: "Abonnement effectué avec succès !!",
                                    type: "success",
                                    confirmButtonColor: "#28a745",
                                    }, function(){ window.location = 'main.php?'; 
                                });
                            }
                        });
                      }
                    });
                });

                //abonnement moyenne entreprise
                $('#abonne_moyenne').click(function()
                  {
                     var getid = '<?php echo $getid; ?>';

                     $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction1/deconnecte_user.php',
                      data  : 'getid=' + getid,
                      success:function(data)
                      {

                        //alert(data);
                        var email = data; 

                        window.location = 'paiment_moyenne_entreprise.php?email=' + email;
                      }
                    });
                  });

                //abonnement  entreprise
                $('#abonne_entreprise').click(function()
                  {
                     var getid = '<?php echo $getid; ?>';

                     $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction1/deconnecte_user.php',
                      data  : 'getid=' + getid,
                      success:function(data)
                      {

                        //alert(data);
                        var email = data; 

                        window.location = 'paiment_entreprise.php?email=' + email;
                      }
                    });
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
