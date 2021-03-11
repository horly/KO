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

        #show-password-now, #show-password-new
        {
          cursor: pointer;
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
          
           

             <div class="p-3 mb-2 bg-white text-dark">
                   <div class="row">
                     <div class="col-md-6">
                       <h5>Paramètres</h5>
                     </div>
                     <div class="col-md-6">
                       <h5 class="text-right"><a href="parametre.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>">Paramètres </a>/ Paramètres compte</h5>
                     </div>
                   </div>
                 </div>

                 <?php
                  $get_compte = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
                  $get_compte->execute(array($getid));
                  $info_compte = $get_compte->fetch();

                 ?>
              <div class="card border-info mb-3" >
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="bs-callout bs-callout-primary">
                          <div class="row">
                            <div class="col-md-4"><h6 class="text-primary">Compte</h6></div>
                            <div class="col-md-1"><h6 class="text-primary text-center">:</h6></div>
                            <div class="col-md-7"><?php echo $info_compte['email_cl']; ?>
                              <br><br>
                              <button type="button" class="btn btn-primary btn-block" id="update-email">
                                <span class="step size-21">
                                  <i class="icon ion-android-mail"></i>
                                </span>
                                &nbsp;&nbsp;Modifier
                              </button>
                            </div>
                          </div>
                          
                        </div>

                        

                      </div>
                      <div class="col-md-6">
                         <div class="bs-callout bs-callout-primary">
                          <div class="row">
                            <div class="col-md-4"><h6 class="text-primary">Mot de passe</h6></div>
                            <div class="col-md-1"><h6 class="text-primary text-center">:</h6></div>
                            <div class="col-md-7">*************
                              <br><br>
                              <button type="button" class="btn btn-primary btn-block" id="update-password">
                                <span class="step size-21">
                                  <i class="icon ion-android-lock"></i>
                                </span>
                                &nbsp;&nbsp;Modifier
                              </button>
                            </div>
                          </div>

                         </div>
                      </div>
                    </div>

                    <button type="button" class="btn btn-danger " id="desactive">
                      <span class="step size-21">
                        <i class="icon ion-android-cancel"></i>
                      </span>
                      &nbsp;&nbsp;Supprimer votre compte
                    </button>

                    <br><br>

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
                              $get_hist->execute(array($getid));

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


        <!-- Modal -->
        <div class="modal fade" id="modal-mail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-secondary text-white">
                <div class="row">
                  <div class="col-md-10">Modifier l'adresse émail</h5>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
              <div class="modal-body">
                <label for="emailcli"><h6>Adresse email</h6></label>
                <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                    </div>
                    <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Entrer le nouvel adresse émail"  name="emailcli" id="emailcli">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-success" id="save-new-email">Enregistrer</button>
              </div>
            </div>
          </div>
        </div>


         <!-- Modal -->
        <div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-secondary text-white">
                <div class="row">
                  <div class="col-md-10">Modifier le mot de passe <label class="text-secondary" id="bolean-see-password">0</label><label class="text-secondary" id="bolean-see-password1">0</label></h5>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                </div>
              </div>
              <div class="modal-body">
                <label for="mdp-actuel"><h6>Mot de passe actuel</h6></label>
                <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                    </div>
                    <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Entrer le mot de passe actuel"  name="mdp-actuel" id="mdp-actuel">
                    <div class="input-group-append" id="show-password-now">
                      <span class="input-group-text">
                        <img id="eyes-password-now" width="18" height="18" class="icone" src="../png/512/eye.png">
                      </span>
                    </div>
                </div>
                <small id="password_error1" class="form-text text-danger text-right"></small>

                <label for="mdp-actuel1"><h6>Nouveau mot de passe</h6></label>
                <div class="input-group mb-3">
                   <div class="input-group-prepend">
                      <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                    </div>
                    <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Entrer le nouveau mot de passe"  name="mdp-actuel1" id="mdp-actuel1">
                    <div class="input-group-append" id="show-password-new">
                      <span class="input-group-text">
                        <img id="eyes-password-new" width="18" height="18" class="icone" src="../png/512/eye.png">
                      </span>
                    </div>
                </div>
                <small id="password_error2" class="form-text text-danger text-right"></small>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-success" id="save-password">Enregistrer</button>
              </div>
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
        <!--<script src="assets/js/bootstrap.min.js"></script>-->
        <script src="assets/js/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>


        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/lib/calendar/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>

        <script src="../dist/js/util.js"></script>
        <!--<script src="../dist/js/dropdown.js"></script>-->
        <script src="../dist/js/tab.js"></script>
        <!--<script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>-->


        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>

           <!--MDB-->
          <!--<script type="text/javascript" src="MDB/js/bootstrap.min.js"></script>-->
          <!-- MDB core JavaScript -->

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

            <!--MDB-->
          <script type="text/javascript" src="MDB/js/bootstrap.min.js"></script>
          <!-- MDB core JavaScript -->

            <!--switch arlert-->
          <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">
          jQuery(document).ready(function($) 
          {
            //affichage du modal de la modification de l'émail
            $('#update-email').click(function()
              {
                $('#modal-mail').modal('show');
              });

            //affichage du modal de la modification mot de passe
            $('#update-password').click(function()
              {
                $('#modal-password').modal('show');
              });

            //lorsqu'on saisie l'adresse émail
            $('#emailcli').keyup(function()
              {
                var emailcli = $('#emailcli').val();

                if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(emailcli) || emailcli == '')
                {
                  $('#emailcli').removeClass('is-invalid');
                }
                else
                {
                  $('#emailcli').addClass('is-invalid');
                }
              });

            //afficher le mot de passe actuel saisie
            $('#show-password-now').click(function()
              {
                var bolean = $('#bolean-see-password').text();

                if(bolean == 0)
                {
                  $('#mdp-actuel').removeAttr('type', 'password');
                  $('#mdp-actuel').attr('type', 'text');
                  $('#bolean-see-password').text(1);
                  $('#eyes-password-now').attr('src', '../png/512/eye-disabled.png');
                }
                else
                {
                  $('#mdp-actuel').removeAttr('type', 'text');
                  $('#mdp-actuel').attr('type', 'password');
                  $('#bolean-see-password').text(0);
                  $('#eyes-password-now').attr('src', '../png/512/eye.png');
                }
                
              });

            //affichage du nouveau mot de passe saisie
            $('#show-password-new').click(function()
              {
                var bolean = $('#bolean-see-password1').text();

                if(bolean == 0)
                {
                  $('#mdp-actuel1').removeAttr('type', 'password');
                  $('#mdp-actuel1').attr('type', 'text');
                  $('#bolean-see-password1').text(1);
                  $('#eyes-password-new').attr('src', '../png/512/eye-disabled.png');
                }
                else
                {
                  $('#mdp-actuel1').removeAttr('type', 'text');
                  $('#mdp-actuel1').attr('type', 'password');
                  $('#bolean-see-password1').text(0);
                  $('#eyes-password-new').attr('src', '../png/512/eye.png');
                }
              });

            

            //lorsqu'on saisie le nouveau mot de passe
            $('#mdp-actuel1').keyup(function()
              {
                var password = $('#mdp-actuel1').val();
                var taille = password.length; 
                if(password != '')
                {
                    if(taille < 8)
                    {
                        $('#mdp-actuel1').addClass('is-invalid');
                        $('#password_error2').css('display','block');
                        $('#password_error2').html('Le nouveau mot de passe doit conténir au moins 8 caractères');
                    }
                    else
                    {
                        $('#mdp-actuel1').removeClass('is-invalid');
                        $('#password_error2').css('display','none');
                        $('#password_error2').html('');
                    }
                }
                else
                {
                    $('#mdp-actuel1').removeClass('is-invalid');
                    $('#password_error2').css('display','none');
                    $('#password_error2').html('');
                }
              });

            //enregistrement du nouvel adresse émail
            $('#save-new-email').click(function()
              {
                var emailcli = $('#emailcli').val();
                var getid = '<?php echo $getid; ?>';

                if(emailcli != '')
                {
                  if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(emailcli))
                  {
                    $.ajax(
                      {
                        type  : 'POST', 
                        url   : 'fonction1/mailExist.php',
                        data  : 'email=' + emailcli,
                        success:function(data)
                        {
                          if(data != 1)
                          {
                            $.ajax(
                              {
                                type  : 'POST',
                                url   : 'fonction1/save_new_email.php',
                                data  : 'email=' + emailcli  + '&getid=' + getid,
                                success:function(data1)
                                {
                                  $('#modal-mail').modal('hide');
                                  valid3("L'adresse émail a été mis à jour avec succès !");

                                  setTimeout(function()
                                    {
                                      window.location.reload();
                                    }, 5000);
                                } 
                              });
                          }
                          else
                          {
                            $('#emailcli').addClass('is-invalid');
                            err3("Cette adresse émail est déjà utilisée.");
                          }
                        }
                      });
                  }
                  else
                  {
                    $('#emailcli').addClass('is-invalid');
                    err3("L'adresse émail que vous avez saisie n'est pas valide.");
                  }
                }
                else
                {
                  $('#emailcli').addClass('is-invalid');
                  err3("Veuillez saisir le nouvel adresse émail S.V.P !");
                }

              });


            //enregistrer le nouveau mot de passe
            $('#save-password').click(function()
              {
                var password = $('#mdp-actuel').val();
                var password2 = $('#mdp-actuel1').val();
                var getid = '<?php echo $getid; ?>';

                var taille = password2.length; 

                if(password != '')
                {
                  if(password2 != '')
                  {
                    if(taille > 8)
                    {
                      $.ajax(
                        {
                          type  : 'POST',
                          url   : 'fonction1/verif_password.php',
                          data  : 'password=' + password + '&getid=' + getid,
                          success:function(data)
                          {
                            //alert(data);
                            if(data == 1)
                            {
                              $.ajax(
                                {
                                  type  : 'POST',
                                  url   : 'fonction1/update_password.php',
                                  data  : 'password=' + password2 + '&getid=' + getid,
                                  success:function(data1)
                                  {
                                    $('#modal-password').modal('hide');
                                    $('#mdp-actuel').removeClass('is-invalid');
                                    $('#mdp-actuel1').removeClass('is-invalid');
                                    valid3("Votre mot de passe a été mis à jour avec succès !");

                                    setTimeout(function()
                                      {
                                        window.location.reload();
                                      }, 5000);

                                  }
                                });
                            }
                            else
                            {
                              $('#mdp-actuel').addClass('is-invalid');
                              err3('Le mot de passe actuel est incorrecte !');
                            }
                          }
                        });
                    }
                    else
                    {
                      $('#mdp-actuel1').addClass('is-invalid');
                      err3('Le nouveau mot de passe doit contenir au moins 8 caractères !');
                    }
                  }
                  else
                  {
                    $('#mdp-actuel1').addClass('is-invalid');
                    err3('Veuillez saisir le nouveau mot de passe S.V.P !');
                  }
                }
                else
                {
                  $('#mdp-actuel').addClass('is-invalid');
                  err3('Veuillez saisir le mot de passe actuel S.V.P !');
                }
              });


              //suprimer votre compte
            $('#desactive').click(function()
              {
                var getid = '<?php echo $getid; ?>';

                swal({
                          title: "Etes-vous vraiment sûr ?",
                          text: "Cette action entraînera la suppression de toutes vos données ainsi que tous les utilisateurs.",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#28a745",
                          confirmButtonText: "Oui",
                          cancelButtonText: "Non",
                          closeOnConfirm: false
                          },
                          function(){
                              //swal("Supprimé !!", "L'utilisateur a été supprimé avec succès !!", "success");
                              delete_user_client();
                              swal(
                                {
                                  title: "Compte Supprimé !!",
                                text: "Merci à bientôt 🤗",
                                type: "success",
                                confirmButtonColor: "#28a745",
                                }, function(){ window.location = 'main.php'; });
                          });
              });


            function delete_user_client()
            {
               var getid = '<?php echo $getid; ?>';

               $.ajax(
                {
                  type  : 'POST', 
                  url   : 'fonction1/delete_user_client.php',
                  data  : 'getid=' + getid,
                  success:function(data)
                  {

                  }
                });
            }
                

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
            
            //initialisation du datatable
           $('.bootstrap-data-table').DataTable({
                lengthMenu: [[5, 10, 20, 50,-1], [5, 10, 20, 50, "Tout"]],
                "order": [[ 1, "desc" ]],
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
