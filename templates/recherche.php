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

         <!--Les emojis-->
        <link rel="stylesheet" type="text/css" href="../emoji/emojionearea.min.css" media="screen">

  

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



      

    </style>
        

         <title>KEDIS Online!</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 
                    session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND $_GET['id'] > 0 AND isset($_GET['id_connexion']) AND isset($_GET['rechercher_user']))  //si la variable id qu'on a transité existe dans l'url 
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

                      //la recherche
                      $rechercher_user = $_GET['rechercher_user'];


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

                  <?php 

                      $chaine = $rechercher_user;
                      $tab = explode(" ", $chaine); //qui te renvoie un tableau avec tous les mots séparés par un espace.
                      $mot = $tab[0]; //on récupère le première mot avant l'espace

                      $getUserSeach = $bdd->prepare('SELECT * FROM user WHERE prenom_cl LIKE ? OR nom_cl LIKE ?');
                      $getUserSeach->execute(array("%$mot%", "%$mot%"));

                      $nbr_user = $getUserSeach->rowCount();
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
              <div class="card-header"><b>Résultats de la recherche</b></div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    
                    <div class="list-group">
                        <?php

                          if(preg_match("/^[1-9]+/", $nbr_user))
                          {
                           while($us = $getUserSeach->fetch()) 
                            {
                        ?>
                            <li class="list-group-item">
                              <div class="row">
                                <a class="col-md-2" id="link_user" href="
                                <?php
                                    if($getid != $us['id_cl'])
                                      {
                                  ?>
                                    profil_user.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&id_user=<?php echo $us['id_cl']; ?>
                                  <?php
                                      }
                                      else
                                      {
                                  ?>
                                    profile.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>
                                  <?php
                                      }
                                  ?>

                                "><img src="../profil/<?php echo $us['profil_cl']; ?>.png" alt="..." class="rounded-circle" height="50" width="50"></a>
                                <a class="col-md-6 " id="link_user1" href="
                                  <?php
                                    if($getid != $us['id_cl'])
                                      {
                                  ?>
                                    profil_user.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&id_user=<?php echo $us['id_cl']; ?>
                                  <?php
                                      }
                                      else
                                      {
                                  ?>
                                    profile.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>
                                  <?php
                                      }
                                  ?>

                                ">
                                  <b class="mb-1 text-primary"><?php echo $us['prenom_cl'].' '.$us['nom_cl']; ?></b>
                                  <p class="mb-1 text-dark"><strong><?php echo $us['profession'];?></strong> à <strong>
                                    <?php

                                      $get_entr = $bdd->prepare("SELECT * FROM gestion, entreprise WHERE id_user = ? AND id_E = idE ");
                                      $get_entr->execute(array($us['id_cl']));
                                      $info_entrep = $get_entr->fetch();

                                      echo $info_entrep['nomE'];
                                    ?>
                                  </strong></p>
                                </a>
                                <div class="col-md-4">
                                  <?php
                                      if($getid != $us['id_cl'])
                                      {
                                  ?>
                                      <button class="btn btn-primary btn-block" onclick="newmessage(<?php echo $us['id_cl']; ?>);">Message</button>
                                  <?php
                                      }
                                  ?>
                                </div>
                              </div>
                            </li>
                        <?php

                            }
                          }
                          else
                          {
                        ?>
                          <div class="alert alert-light" role="alert">
                            <h6 class="text-center">
                              Aucun résultat de recherche n'a été trouvé
                            </h6>
                          </div>
                        <?php
                          }
                        ?>                        
                    </div>

                  </div>
                  <div class="col-md-6">
                    
                  </div>
                </div>
              </div>
            </div>

            <!--Modal message-->
            <div class="modal fade bd-example-modal-lg" id="new_message" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header text-white bg-secondary">
                    <div class="row">
                      <div class="col-md-10"><h6 class="modal-title">Message <label class="text-secondary" id="id_sender"></label></h6></div>
                      <div class="col-md-2">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                    </div>
                   
                  </div>
                  <div class="modal-body">
                    
                    <div class="row">
                      <div class="col-md-2">
                        <img src="" id="pic-sender" alt="..." class="rounded-circle" height="50" width="50">
                      </div>
                      <div class="col-md-10">
                        <b>Ecrire à : <br><label class="text-primary" id="nom_sender"></label></b>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="message_content">&nbsp;</label>
                      <textarea class="form-control" id="message_content" rows="6" placeholder="Taper votre message..."></textarea>
                    </div>

                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-success" id="send_message">Envoyer</button>
                  </div>
                </div>
              </div>
            </div>
                
             
            
           
        </div> <!-- /container -->

        

        

                

         

        <!--*****************************************************-->
        <br><br>
        <!-- Footer -->
        <nav class="bg-light">
          <div class="p-3 mb-2  text-dark">
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



        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>
        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/lib/calendar/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>

          <!--Mon modal personnel-->
          <script src="assets/js/modal.mata.js"></script>

          <!--loader-->
          <script src="assets/js/loader.js"></script>

          <!--switch arlert-->
          <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>
          <!-- scripit init-->
          <!--<script src="assets/js/lib/sweetalert/sweetalert.init.js"></script>-->

          <!--Les emojo-->
        <script type="text/javascript" src="../emoji/emojionearea.js"></script>

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">

           //lorsqu'on clique sur le bouton message 
              function newmessage(id_cl)
              {
                var id_user = id_cl;

                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'message/get_nom_sender.php',
                    data  : 'id_sender=' + id_user,
                    success:function(data)
                    {
                      $('#id_sender').text(id_user);
                      $('#nom_sender').text(data);
                      $('#new_message').modal('show');
                    }
                  });

                //on recupère la photo
                $.ajax(
                {
                  type  : 'POST',
                  url   : 'message/get_photo_sender.php',
                  data  : 'id_sender=' + id_user, 
                  success:function(data)
                  {
                    $('#pic-sender').attr('src', '../profil/'+ data +'.png');
                  }
                });
              }

          jQuery(document).ready(function($) 
          {

            
           


           $("#message_content").emojioneArea({
                  autoHideFilters: true,
                  search: false,
                  buttonTitle: "Utilisez la touche TAB pour insérer les emojis plus rapidement",
                  tonesStyle: "bullet",
                  filtersPosition: "bottom",
              });


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



               //envoyer le message
                $('#send_message').click(function()
                  {
                    var id_sender = $('#id_sender').text()
                    var getid = '<?php echo $getid; ?>';
                    var message_content = $('#message_content').val();

                    if(message_content != '')
                    {
                      $.ajax(
                        {
                          type  : 'POST',
                          url   : 'message/send_message.php',
                          data  : 'getid=' + getid + '&id_sender=' + id_sender + '&message_content=' + message_content,
                          success:function(data)
                          {
                            $('#message_content').val('');
                            $('#new_message').modal('hide');
                            valid3('Message envoyé avec succès !');
                          }
                        });
                    }
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
