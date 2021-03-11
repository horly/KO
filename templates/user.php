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


      #traitement
      {
        display: none;
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

                      $id_abonne = $userfos['id_abonnement'];


                      $get_abonnement = $bdd->prepare("SELECT * FROM abonnement WHERE id = ? ");
                      $get_abonnement->execute(array($id_abonne));

                      $info_abonne = $get_abonnement->fetch();
                      $type_abonne = $info_abonne['type'];

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
                       <h5 class="text-right"><a href="parametre.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>">Paramètres </a>/ Gestion des utilisateurs</h5>
                     </div>
                   </div>
                 </div>

              <div class="card border-info mb-3" >
                <div class="card-header text-left"><strong><b>Listes des utilisateurs</b></strong></div>
                  <div class="card-body">
                    <div class="p-3 mb-2 bg-light text-dark border">

                      <?php

                        $view_user = $bdd->prepare('SELECT * FROM user WHERE id_abonnement = ? AND statut != 1');
                        $view_user->execute(array($id_abonne));


                        $count_user = $view_user->rowCount();


                        if($count_user < 5)
                        {
                      ?>

                            <button type="button" class="btn btn-success" role="button" id="new-user">
                                <span class="step size-21">
                                    <i class="icon ion-person"></i>
                                </span>
                                Nouvel utilisateur
                            </button>
                      <?php
                        }
                      ?>

                    </div>
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Prénom</th>
                          <th>Nom</th>
                          <th>Fonction</th>
                          <th>Entreprise</th>
                          <?php

                            if($type_abonne == 'Moyenne Entreprise')
                            {
                          ?>
                          <th>Statut</th>
                          <?php
                            }
                          ?>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody class="table-bordered" id="table_client">
                      <?php

                            $statut = 'admin';

                            $get = $bdd->prepare("SELECT * FROM user WHERE id_cl = ?"); //on séléctionne l'UE correspondant à l'entreprise
                            $get->execute(array($getid));

                            $fetch_user = $get->fetch();
                            $id_abonnement = $fetch_user['id_abonnement'];

                            $view = $bdd->prepare('SELECT * FROM user WHERE id_abonnement = ? AND statut != ?');
                            $view->execute(array($id_abonnement, $statut));

                            $i = 1;


                            while($row = $view->fetch()) 
                            {
                            ?>   
                            <tr>
                                <td><strong><?php echo $i++; ?></strong></td>
                                <td><?php echo $row['prenom_cl']; ?></td>
                                <td><?php echo $row['nom_cl']; ?></td>
                                <td><?php echo $row['profession']; ?></td>
                                <td>
                                  <?php 

                                    $viewch = $bdd->prepare("SELECT * FROM gestion, user WHERE id_cl = ? AND id_user = id_cl");
                                      $viewch->execute(array($row['id_cl']));

                                      $fetch_Entr = $viewch->fetch();
                                      $id_Entr = $fetch_Entr['id_E'];

                                      $get_Ent = $bdd->prepare('SELECT * FROM entreprise WHERE idE = ?');
                                      $get_Ent->execute(array($id_Entr));
                                      $fetch_nomE = $get_Ent->fetch();

                                      echo $fetch_nomE['nomE'];

                                  ?>
                                  <?php

                                    if($type_abonne == 'Moyenne Entreprise')
                                    {
                                      if($row['actif'] == 1)
                                      {
                                  ?>
                                    <td class="text-success">Actif</td>
                                  <?php
                                      }
                                      else
                                      {
                                  ?>
                                    <td class="text-danger">Inactif</td>
                                  <?php
                                      }
                                    }
                                  ?>
                                </td>
                                <td><a class="text-primary" href="viewInfoUser.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&id_user=<?php echo $row['id_cl'];?>">Consulter</a></td>
                            </tr>
                          <?php 
                            }    
                          ?>
                      </tbody>
                  </table>

                  </div>
              </div>
          
          
        </div>


       

            <!--debut modale new user-->
            <div class="modal fade bd-example-modal-lg ajouter-entreprise" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Ajouter un nouvel utilisateur</h6>
                          </div>

                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                      </div>

                      <div class="modal-body body-modal-entreprise">

                        <div class="card form_card">
                          <div class="card-body">

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="civilite"><h6>Civilié</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/genre.png"></span>
                                    </div>
                                    <select class="custom-select" name="civilite" id="civilite">
                                        <option selected value="Monsieur">Monsieur</option>
                                        <option value="Madame">Madame</option>
                                    </select>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <label for="prenom"><h6>Prénom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le prénom de l'utilisateur" name="prenom" id="prenom">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <label for="nom"><h6>Nom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le nom de l'utilisateur" name="nom" id="nom">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="email"><h6>Email</h6></label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                                        </div>
                                        <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="toi@exemple.com" name="email" id="email" required="">
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!--<div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="password1"><h6>Mot de passe</h6></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                                        </div>
                                        <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Créer mot de passe" name="password1" id="password1" required="">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                  <label for="password2"><h6>Confirmation mot de passe</h6></label>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                                      </div>
                                      <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Retaper le mot de passe" name="password2" id="password2" required="">
                                  </div>
                                </div>
                                </div>
                              </div>-->

                          </div>
                        </div>


                          <div class="card form_card">
                            <div class="card-body">
                                <label for="fonction"><h6>Fonction</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/briefcase.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="La fonction de l'utilisateur" name="fonction" id="fonction">
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
                        <button type="bouton" class="btn btn-primary" name="traitement" id="traitement">
                           
                              &nbsp;&nbsp;&nbsp;Traitement...
                        </button>
                        <button type="bouton" class="btn btn-primary" name="saveUser" id="saveUser">
                            <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Enregistrer
                        </button>
                      </div>

                    </div>
                </div>
            </div>
            <!--fin modale new user-->

       

        

                

         

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

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

         <!--pour le clavier numérique de la caise-->
        <script src="../asserts/js/clavier_numerique.js"></script>
        <!--pour la fonction de plein écran-->
        <script src="../asserts/fullscreen/screenfull.js"></script>

        <script type="text/javascript">
          jQuery(document).ready(function($) 
          {

             //on affiche les UE
              affiche_user();
              //ici on affiche toutes les catégories d'articles
              function affiche_user()
              {
                var getid = '<?php echo $getid; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction1/affiche_user.php',
                  data : 'getid=' + getid + '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_UE').html(data);  
                  }
                });
              }



              $('#new-user').click(function()
                {
                  $('.ajouter-entreprise').modal('show');
                });


              function affiche_UE()
              {
                var idE = $('#entreprise_select').val();

                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction1/select_entreprise_UE.php',
                    data  : 'idE=' + idE,
                    success:function(data)
                    {
                      $('#input-UE').html(data);
                    } 
                  });
              }

              //sélection entreprise pour l'affichage des UE
              $('#entreprise_select').click(function()
                {
                  var idE = $('#entreprise_select').val();

                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction1/select_entreprise_UE.php',
                      data  : 'idE=' + idE,
                      success:function(data)
                      {
                        $('#input-UE').html(data);
                      } 
                    });
                });



              //lorsqu'on recherche une entrerise
              $('#libsearchcatart').keyup(function()
              {
                var getid = '<?php echo $getid; ?>';
                var recherche = $('#libsearchcatart').val();
                var id_connexion = '<?php echo $id_connexion; ?>';
                var condition = $('#condition').val();

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction1/rechercher_user.php',
                  data : 'recherche=' + recherche + '&getid=' + getid +
                         '&id_connexion=' + id_connexion + '&condition=' + condition,
                  success:function(data)
                  {
                    $('#table_UE').html(data);
                    //alert(data);
                  } 
                });

              });

              //supprimer un utilisateur
              $('#delete_user').click(function()
                {
                  var id_user = $('#id-user-delete').text();

                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction1/delete_user.php',
                      data  : 'id_user=' + id_user, 
                      success:function(data)
                      {
                        affiche_user();
                        $('#delete_user').modal('hide');

                        valid3('Utilisateur supprimé avec succès !');

                        
                      }
                    });
                });

              $('#all_entreprise').click(function()
                {
                  var all_entreprise = $('#all_entreprise');

                  if(all_entreprise.is(':checked'))
                  {
                    $('#ue_select').attr("disabled", 'true');
                  }
                  else
                  {
                    $('#ue_select').removeAttr("disabled", 'true');
                  }
                });

            


              //ajouter une nouvelle entrerise
              $('#saveUser').click(function()
                {
                  var nom = $('#nom').val();
                  var prenom = $('#prenom').val();
                  var civilite = $('#civilite').val();
                  var email = $('#email').val();
                  //var password1 = $('#password1').val();
                  //var password2 = $('#password2').val();
                  var fonction = $('#fonction').val();
                  /*var idE = '';*/
                  var getid = '<?php echo $getid; ?>';

                  var id_connexion = '<?php echo $id_connexion; ?>';
                  
                  if(nom != '')
                  {
                    if(prenom != '')
                    {
                      if(email != '')
                      {  
                        if(/^[a-zA-Z]+/.test(nom))
                        {
                          if(/^[a-zA-Z]+/.test(prenom))
                          {
                            if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email))
                            {
                              $('#traitement').css('display', 'block');
                              $('#saveUser').css('display', 'none');

                              $.ajax(
                                {
                                  type  : 'POST',
                                  url   : 'fonction1/mailExist.php',
                                  data  : 'email=' + email,
                                  success:function(data)
                                  {
                                    if(data == 0)
                                    {
                                      $.ajax(
                                        {
                                          type  : 'POST',
                                          url   : 'fonction1/insert_user.php',
                                          data  : 'nom=' + nom + '&prenom=' + prenom + '&civilite=' + civilite + 
                                                  '&email=' + email + '&fonction=' + fonction + '&getid=' + getid,
                                          success:function(donnee)
                                          {
                                            //alert(donnee);
                                           
                                            $('#nom').removeClass('is-invalid');
                                            $('#prenom').removeClass('is-invalid');
                                            $('#email').removeClass('is-invalid');
                                            //$('#password1').removeClass('is-invalid');
                                            //$('#password2').removeClass('is-invalid');

                                            $('#nom').val('');
                                            $('#prenom').val('');
                                            $('#email').val('');
                                            //$('#password1').val('');
                                            //$('#password2').val('');
                                            $('#fonction').val('');

                                            $('#id-user').text(donnee);
                                            $('#nom_user').text(prenom);

                                            $('.ajouter-entreprise').modal('hide');
                                            //$('#ajouter-autorisation').modal('show');
                                            //affiche_UE();

                                            //affiche_user();

                                             valid3("Nouvel utilisateur ajouté avec succès !");


                                            setTimeout(function()
                                            {
                                              window.location.reload();
                                            }, 5000);
                                          }
                                        });
                                    }
                                    else
                                    {
                                      $('#email').addClass('is-invalid');
                                      err3("Cette adresse email est déjà utilisé !");
                                    }
                                  }
                                });
                            }
                            else
                            {
                              $('#email').addClass('is-invalid');
                              err3("L'adresse email saisie est invalide");
                            }
                          }
                          else
                          {
                            $('#nom').addClass('is-invalid');
                            err3("Le prénom saisie est invalide");
                          }
                        }
                        else
                        {
                          $('#nom').addClass('is-invalid');
                          err3("Le nom saisie est invalide");
                        }
                          
                        
                      }
                      else
                      {
                        $('#email').addClass('is-invalid');
                        err3("Veuillez saisir l'émail de l'utilsateur S.V.P !");
                      }
                    }
                    else
                    {
                      $('#prenom').addClass('is-invalid');
                      err3("Veuillez saisir le prénom de l'utilisateur S.V.P !");
                    }
                  }
                  else
                  {
                    $('#nom').addClass('is-invalid');
                    err3("Veuillez saisir le nom de l'utilisateur S.V.P !");
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
            
            //initialisation du datatable
           $('#bootstrap-data-table').DataTable({
                lengthMenu: [[5, 10, 20, 50,-1], [5, 10, 20, 50, "Tout"]],
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

              }

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
