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
     


      

      .form_card
      {
        background-color: #d1ecf1;
      }

      .body-modal-entreprise
        {
          overflow-y: auto;
          /*height: 505px;*/
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

      .custom-switch .custom-control-label::before {
        left: -2.25rem;
        width: 1.75rem;
        pointer-events: all;
        border-radius: 0.5rem;
      }

      .custom-switch .custom-control-label::after {
        top: calc(0.25rem + 2px);
        left: calc(-2.25rem + 2px);
        width: calc(1rem - 4px);
        height: calc(1rem - 4px);
        background-color: #adb5bd;
        border-radius: 0.5rem;
        transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out;
        transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: transform 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-transform 0.15s ease-in-out;
      }

      @media (prefers-reduced-motion: reduce) {
        .custom-switch .custom-control-label::after {
          transition: none;
        }
      }

      .custom-switch .custom-control-input:checked ~ .custom-control-label::after {
        background-color: #fff;
        -webkit-transform: translateX(0.75rem);
        transform: translateX(0.75rem);
      }

      .custom-switch .custom-control-input:disabled:checked ~ .custom-control-label::before {
        background-color: rgba(0, 123, 255, 0.5);
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

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['id_user']))   //si la variable id qu'on a transité existe dans l'url 
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


                      $id_user = $_GET['id_user'];

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


        <div class="container">
          <br>
          <!--<div class="alert alert-light" role="alert">
             <h1 class="h2">Gestion des utilisateurs</h1>
         </div>-->

         <div class="p-3 mb-2 bg-white text-dark">
           <div class="row">
             <div class="col-md-6">
               <h5>Paramètres</h5>
             </div>
             <div class="col-md-6">
               <h5 class="text-right"><a href="user.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>">Gestion des utilisateurs </a>/ Détails utilisateur</h5>
             </div>
           </div>
         </div>

         

          <div class="card border-info mb-3" >
            <div class="card-header text-left"><strong><b>Détails utilisateur</b></strong></div>
              <div class="card-body">
                <div id="detail_user">
                  
                </div>

                <div class="card">
                      <div class="card-header">Historique de connexion</div>
                      <div class="card-body">
                        <table class="table table-striped table-bordered bootstrap-data-table">
                          <thead>
                            <tr>
                              <th>Heure et Date</th>
                              <th>Pays</th>
                              <th>Ville</th>
                              <th>Dispositif</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php

                              $get_hist = $bdd->prepare("SELECT * FROM historique_connexion WHERE id_user = ? ORDER BY id DESC");
                              $get_hist->execute(array($id_user));

                              while($row = $get_hist->fetch())
                              {
                            ?>
                                <tr>
                                  <td><?php echo $row['date_h']." à ".$row['heure']; ?></td>
                                  <td><?php echo $row['pays']; ?></td>
                                  <td><?php echo $row['ville']; ?></td>
                                  <td><?php echo $row['dispositif']; ?></td>
                                </tr>
                            <?php
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                

              </div>
              </div>
        </div>


        <!-- confirme Modal -->
            <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-secondary text-white">
                    <h6 class="modal-title" id="exampleModalLabel">Confirmation <label id="id-user-delete" class="text-secondary"></label></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body bg-light text-dark">
                    <div class="bs-callout bs-callout-warning">
                      <div class="row">
                        <div class="col-md-8">
                          <h5 class="text-warning">Attention !</h5>
                          <h6>Voulez-vous vraiment supprimer l'utilisateur <label class="text-primary" id="name-user-delete"></label> ?</h6>
                        </div>
                        <div class="col-md-4 text-center">
                            <img width="100" height="100" class="icone" src="../icons/png/office/warning.png">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <form action="" method="post">
                      <button type="submit" class="btn btn-primary" name="delete_user" id="delete_user">Oui</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- fin confirme Modal -->


            <!--Modal pour mis à jour des accès à l'utilisateur-->
            <div class="modal fade " id="update-autorisation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                
                  <div class="modal-content">
                    <div class="modal-header text-white bg-secondary">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="myModalLabel">Droit d'accès pour l'utilisateur <label id="nom_user_upd"></label><label id="id-user-upd" class="text-secondary">0</label></h6>
                        </div>
                        <div class="col-md-2">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                      </div>
                    </div>
                    <div class="modal-body" id="modal-access-update">


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span class="step size-21">
                          <i class="icon ion-android-cancel"></i>
                        </span>
                        &nbsp;&nbsp;Annuler</button>
                      <button type="submit" class="btn btn-primary" name="update_autorisation" id="update_autorisation"> 
                        <span class="step size-21">
                          <i class="icon ion-archive"></i>
                        </span>
                        &nbsp;&nbsp;Enregistrer</button>
                    </div>
                  </div>
                
              </div>
            </div>
            <!--Modal pour mis à jour des accès à l'utilisateur-->


              

       

        

                

         

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

           //pour le click des aurotisations
          function clickautorisation(id_auto, variable)
          {
            if($(variable).is(':checked'))
            {
              $(id_auto).text(0);
            }
            else
            {
              $(id_auto).text(1);
            }
          }


          jQuery(document).ready(function($) 
          {

             affiche_info_user();
            //afficher les infos des utilisateurs

            function affiche_info_user()
            {
              var id = '<?php echo $id_user; ?>';
              var getid = '<?php echo $getid; ?>';
              var id_connexion = '<?php echo $id_connexion; ?>';

              $.ajax({
                type  : 'POST',
                url   : 'fonction1/detail_user.php',
                data  : 'id=' + id + '&getid=' + getid + '&id_connexion=' + id_connexion,
                success:function(data)
                {
                  $('#detail_user').html(data);  
                }
              });
            }



             //mettre à jour les autorisations
              $('#update_autorisation').click(function()
                {
                  var id_user = $('#id-user-upd').text();
                  var all_entreprise = $('#get_all_entreprise_upd').text();
                  var idUE = $('#ue_select_upd').val();
                  var idE = $('#entreprise_select_upd').val();

                  var client = $('#get_client_upd').text(); 
                  var fourniss = $('#get_fourniss_upd').text(); 
                  var autre_tiers = $('#get_autre_tiers_upd').text();
                  var article = $('#get_article_upd').text(); 
                  var cat_article = $('#get_cat_article_upd').text(); 
                  var sous_cat_article = $('#get_sous_cat_article_upd').text();
                  var service = $('#get_service_upd').text();
                  var cat_service = $('#get_cat_service_upd').text();
                  var mode_paiement = $('#get_mode_paiement_upd').text();
                  var monnaie = $('#get_monnaie_upd').text();
                  var vente = $('#get_vente_upd').text();
                  var note_credit_vente = $('#get_note_credit_vente_upd').text();
                  var devis = $('#get_devis_upd').text();
                  var caisse = $('#get_caisse_upd').text();
                  var achat = $('#get_achat_upd').text();
                  var note_credit_achat = $('#get_note_credit_achat_upd').text();
                  var commande = $('#get_commande_upd').text();
                  var depense = $('#get_depense_upd').text();
                  var creance = $('#get_creance_upd').text();
                  var dette = $('#get_dette_upd').text();
                  var rapport = $('#get_rapport_upd').text();

                  if($('#all_entreprise_upd').is(':checked'))
                  {
                      $.ajax(
                        {
                          type  : 'POST',
                          url   : 'fonction1/update_autorisation.php',
                          data  : 'id_user=' + id_user + '&all_entreprise=' + all_entreprise + 
                                  '&client=' + client + '&fourniss=' + fourniss + 
                                  '&autre_tiers=' + autre_tiers + '&article=' + article + 
                                  '&cat_article=' + cat_article + '&sous_cat_article=' + sous_cat_article + 
                                  '&service=' + service + '&cat_service=' + cat_service + 
                                  '&mode_paiement=' + mode_paiement + '&monnaie=' + monnaie + 
                                  '&vente=' + vente + '&note_credit_vente=' + note_credit_vente + 
                                  '&devis=' + devis + '&caisse=' + caisse + 
                                  '&achat=' + achat + '&note_credit_achat=' + note_credit_achat +
                                  '&commande=' + commande + '&depense=' + depense + 
                                  '&creance=' + creance + '&dette=' + dette +
                                  '&rapport=' + rapport + '&idE=' + idE,
                          success:function(data)
                          {
                            /*$('#id-user').text(0);
                            $('#get_all_entreprise').text(1);*/

                            //alert(data);

                            valid3('Les autorisations ont été attribuées avec succès');

                            $('#ue_select_upd').removeClass('is-invalid');

                            $('#entreprise_select_upd').removeClass('is-invalid');

                            $('#update-autorisation').modal('hide');
                            
                            setTimeout(function()
                            {
                              window.location.reload();
                            }, 5000);
                                    

                          }
                        });
                  }
                  else
                  {
                    if(idUE != '')
                    {
                      $.ajax(
                        {
                          type  : 'POST',
                          url   : 'fonction1/update_autorisation_ue.php',
                          data  : 'id_user=' + id_user + '&idUE=' + idUE,
                          success:function(donnee)
                          {
                            $.ajax(
                            {
                              type  : 'POST',
                              url   : 'fonction1/update_autorisation.php',
                              data  : 'id_user=' + id_user + '&all_entreprise=' + all_entreprise + 
                                      '&client=' + client + '&fourniss=' + fourniss + 
                                      '&autre_tiers=' + autre_tiers + '&article=' + article + 
                                      '&cat_article=' + cat_article + '&sous_cat_article=' + sous_cat_article + 
                                      '&service=' + service + '&cat_service=' + cat_service + 
                                      '&mode_paiement=' + mode_paiement + '&monnaie=' + monnaie + 
                                      '&vente=' + vente + '&note_credit_vente=' + note_credit_vente + 
                                      '&devis=' + devis + '&caisse=' + caisse + 
                                      '&achat=' + achat + '&note_credit_achat=' + note_credit_achat +
                                      '&commande=' + commande + '&depense=' + depense + 
                                      '&creance=' + creance + '&dette=' + dette +
                                      '&rapport=' + rapport + '&idE=' + idE,
                              success:function(data)
                              {
                                
                                /*$('#id-user').text(0);
                                $('#get_all_entreprise').text(1);*/

                                
                                $('#ue_select_upd').removeClass('is-invalid');

                                $('#entreprise_select_upd').removeClass('is-invalid');

                                $('#update-autorisation').modal('hide');

                                valid3('Les autorisations ont été attribuées avec succès');

                              }
                            });
                          }
                        });
                    }
                    else
                    {
                      $('#ue_select_upd').addClass('is-invalid');
                      err3("Veuillez Sélectionner une Unité d'Exploitation S.V.P!");
                    }
                  }
                });


              //initialisation du datatable
           $('.bootstrap-data-table').DataTable({
                lengthMenu: [[5, 10, 20, 50,-1], [5, 10, 20, 50, "Tout"]],
                "order": [[ 3, "desc" ]],
                "language": {
                  "lengthMenu": "Afficher les _MENU_ premiers enregistrements par page",
                  "zeroRecords": "Désolé - Aucun enregistrement trouvé",
                  "emptyTable":     "Aucune donnée disponible",
                  "info": "Affichage de la page _PAGE_ sur _PAGES_",
                  "infoEmpty": "Aucun enregistrement disponible",
                  "infoFiltered": "(filtré de _MAX_ enregistrements au total)",
                  "search":         "Rechercher",
                  "paginate": {
                  "first":      "Premier",
                  "last":       "Dernier",
                  "next":       "Suivant",
                  "previous":   "Précédent"
                },


              },
              "searching": false,

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
