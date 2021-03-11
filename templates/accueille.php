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


        <div class="container-fluid">
          <br>
          <div class="card">
            <div class="card-body">
              <div class="alert alert-light" role="alert">
                <h2 class="text-left">Bienvenue
                  
               <strong><?php echo $getprenom; " "; ?></strong> dans <strong>KEDIS Online!</strong></h2>
             </div>
               <div class="alert alert-primary" role="alert">
                  Veuillez créer une nouvelle entreprise ou cliquez sur une existante pour acceder au menu.
                </div>

                <?php
                  //on récupère d'abord le type d'abonnement du client 
                    $get_abonnement = $bdd->prepare("SELECT * FROM abonnement WHERE id = ? ");
                    $get_abonnement->execute(array($id_abonne));

                    $info_abonne = $get_abonnement->fetch();
                    $type_abonne = $info_abonne['type'];

                    if($type_abonne == 'Petite Entreprise')
                    {

                ?>

                <div class="alert alert-warning" role="alert">
                  Votre abonnement est de type <b><?php echo $type_abonne; ?></b>. Vous pouvez cliquer sur le bouton <b>Gerer les entreprises</b> pour sélectionner l'entreprise que vous voulez utiliser.
                </div>

                <?php
                    }
                    if($type_abonne == 'Moyenne Entreprise')
                    {
                ?>

                    <div class="alert alert-warning" role="alert">
                      Votre abonnement est de type <b><?php echo $type_abonne; ?></b>. Vous pouvez cliquer sur le bouton <b>Gerer les entreprises</b> pour sélectionner les entreprises que vous voulez utiliser.
                    </div>

                <?php
                    }
                ?>

              <div class="card border-info mb-3" >
                <div class="card-header text-left"><strong><b>Mes entreprises</b></strong></div>
                  <div class="card-body">
                    <div class="p-3 mb-2 bg-light text-dark border">
                        <div class="row">
                          <div class="col-md-3">
                          <?php
                            

                            if($type_abonne == 'Avie' || $type_abonne == 'Essaie' || $type_abonne == 'Entreprise')
                            {

                          ?>
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target=".ajouter-entreprise">
                                  <span class="step size-21">
                                      <i class="icon ion-briefcase"></i>
                                  </span>
                                      &nbsp;&nbsp;Créer une entreprise
                              </button>
                          <?php

                            }
                            if($type_abonne == 'Petite Entreprise')
                            {
                              //on verifie s'il n'a qu'un seul entreprise
                              $view = $bdd->prepare("SELECT * FROM gestion, entreprise WHERE id_user = ? AND id_E = idE "); //on séléctionne les entreprise appartenant à cet utlisateur
                              $view->execute(array($getid));
                              $i = 1;

                              $existallE = $view->rowCount();

                              if($existallE == 0)
                              {
                          ?>
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target=".ajouter-entreprise">
                                  <span class="step size-21">
                                      <i class="icon ion-briefcase"></i>
                                  </span>
                                      &nbsp;&nbsp;Créer une entreprise
                              </button>

                          <?php
                              }
                            }
                            if($type_abonne == 'Moyenne Entreprise')
                            {
                              //on verifie s'il n'a que 5 entreprises
                              $view = $bdd->prepare("SELECT * FROM gestion, entreprise WHERE id_user = ? AND id_E = idE "); //on séléctionne les entreprise appartenant à cet utlisateur
                              $view->execute(array($getid));
                              $i = 1;

                              $existallE = $view->rowCount();

                              if($existallE < 2)
                              {
                          ?>
                              <button type="button" class="btn btn-success" data-toggle="modal" data-target=".ajouter-entreprise">
                                  <span class="step size-21">
                                      <i class="icon ion-briefcase"></i>
                                  </span>
                                      &nbsp;&nbsp;Créer une entreprise
                              </button>

                          <?php
                              }
                            }
                          ?>
                        </div>

                        <div class="col-md-6">
                          
                        </div>

                        <div class="col-md-3 text-right">
                          
                          <?php

                            if($type_abonne == 'Petite Entreprise' || $type_abonne == 'Moyenne Entreprise')
                            {

                          ?>

                          <a role="button" class="btn btn-warning text-white" href="gerer_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&id_abonne=<?php echo $id_abonne; ?>">
                              <span class="step size-21">
                                  <i class="icon ion-briefcase"></i>
                              </span>
                                  &nbsp;&nbsp;Gerer les entreprises
                          </a>

                          <?php
                              }
                          ?>

                        </div>


                      </div>
                    </div>
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Nom</th>
                          <th>Adresse</th>
                          <th>Code postal</th>
                          <th>Ville</th>
                          <th>Pays</th>
                          <th>N° entreprise</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody class="table-bordered" id="table_client">
                      <?php

                        if($type_abonne == 'Avie' || $type_abonne == 'Essaie' || $type_abonne == 'Entreprise')
                            {

                            $view = $bdd->prepare("SELECT * FROM gestion, entreprise WHERE id_user = ? AND id_E = idE "); //on séléctionne les entreprise appartenant à cet utlisateur
                            $view->execute(array($getid));
                            $i = 1;

                            $existallE = $view->rowCount();

                            while($row = $view->fetch()) 
                            {
                       ?>   
                          <tr>
                             <td scope="row" width="70"><?php echo $i++; ?></td>
                              <td><a class="text-primary"  href="consulter_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $row['idE'];?>" ><?php echo $row['nomE']; ?></a></td>
                              <td><?php echo $row['adresseE']; ?></td>
                              <td><?php echo $row['code_postal']; ?></td>
                              <td><?php echo $row['villeE']; ?></td>
                              <td>
                                <?php echo $row['paysE']; ?>
                              </td>
                              <td><?php echo $row['tvaE']; ?></td>
                              <td><a class="text-primary"  href="consulter_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $row['idE'];?>">Consulter</a></td>
                              <td class="text-center">
                                <a href="parametre_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $row['idE']; ?>">
                                  <span class="step size-24">
                                    <i class="icon ion-android-settings"></i>
                                  </span>    
                                </a>
                              </td>
                            </tr>
                       <?php
                          }
                        }
                        if($type_abonne == 'Petite Entreprise')
                        {

                          $view = $bdd->prepare("SELECT * FROM gestion, entreprise WHERE id_user = ? AND id_E = idE AND statut = 1 LIMIT 1"); //on séléctionne les entreprise appartenant à cet utlisateur
                            $view->execute(array($getid));
                            $i = 1;

                            $existallE = $view->rowCount();

                            while($row = $view->fetch()) 
                            {
                      ?>
                          <tr>
                             <td scope="row" width="70"><?php echo $i++; ?></td>
                              <td><a class="text-primary"  href="consulter_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $row['idE'];?>" ><?php echo $row['nomE']; ?></a></td>
                              <td><?php echo $row['adresseE']; ?></td>
                              <td><?php echo $row['code_postal']; ?></td>
                              <td><?php echo $row['villeE']; ?></td>
                              <td>
                                <?php echo $row['paysE']; ?>
                              </td>
                              <td><?php echo $row['tvaE']; ?></td>
                              <td><a class="text-primary"  href="consulter_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $row['idE'];?>">Consulter</a></td>
                              <td class="text-center">
                                <a href="parametre_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $row['idE']; ?>">
                                  <span class="step size-24">
                                    <i class="icon ion-android-settings"></i>
                                  </span>    
                                </a>
                              </td>
                          </tr>
                      <?php
                            }
                        }
                        if($type_abonne == 'Moyenne Entreprise')
                        {   
                          $view = $bdd->prepare("SELECT * FROM gestion, entreprise WHERE id_user = ? AND id_E = idE AND statut = 1 LIMIT 2"); //on séléctionne les entreprise appartenant à cet utlisateur
                            $view->execute(array($getid));
                            $i = 1;

                            $existallE = $view->rowCount();

                            while($row = $view->fetch()) 
                            {
                      ?>
                          <tr>
                             <td scope="row" width="70"><?php echo $i++; ?></td>
                              <td><a class="text-primary"  href="consulter_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $row['idE'];?>" ><?php echo $row['nomE']; ?></a></td>
                              <td><?php echo $row['adresseE']; ?></td>
                              <td><?php echo $row['code_postal']; ?></td>
                              <td><?php echo $row['villeE']; ?></td>
                              <td>
                                <?php echo $row['paysE']; ?>
                              </td>
                              <td><?php echo $row['tvaE']; ?></td>
                              <td><a class="text-primary"  href="consulter_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $row['idE'];?>">Consulter</a></td>
                              <td class="text-center">
                                <a href="parametre_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $row['idE']; ?>">
                                  <span class="step size-24">
                                    <i class="icon ion-android-settings"></i>
                                  </span>    
                                </a>
                              </td>
                          </tr>
                      <?php
                            }
                        }
                      ?>
                      </tbody>
                  </table>

                  </div>
              </div>
            </div>
          </div>
        </div>

        <!--debut modale new entreprise-->
            <div class="modal fade bd-example-modal-lg ajouter-entreprise" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10"><h6 class="modal-title" id="exampleModalLabel">Créer une nouvelle entreprise</h6></div>
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
                              <div class="form-group">
                                  <label for="nomE"><h6>Nom</h6></label>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-briefcase.png"></span>
                                      </div>
                                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nom de l'entreprise" value="" name="nomE" id="nomE" required="">
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="adressE"><h6>Adresse</h6></label>
                                  <textarea class="form-control"  rows="2" name="adressE" id="adressE" placeholder="l'adresse de votre entreprise" required=""></textarea>
                              </div>
                              <div class="form-group">
                                  <label for="villeE"><h6>Ville</h6></label>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
                                      </div>
                                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville de l'entreprise" value="" name="villeE" id="villeE" required="">
                                  </div>
                              </div>
                              <div class="form-group">
                                      <label for="postal"><h6>Code postale</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale de la ville de l'entreprise" name="postal" id="postal">
                                      </div>
                                    </div>
                              <div class="form-group">
                                  <label><h6>Pays</h6></label>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                                      </div>
                                      <select class="custom-select" name="paysE" id="paysE">
                                          <option value="" selected="selected">Sélectioner un pays</option>
                                          
                                          <?php

                                              //On séléctionne tous les pays dans la base de données
                                              $get_pays = $bdd->prepare('SELECT * FROM pays ORDER BY nom_fr_fr ASC');
                                              $get_pays->execute(array());

                                              while($row = $get_pays->fetch())
                                              {
                                          ?>
                                              <option value="<?php echo $row['id']; ?>">
                                                <?php echo $row['nom_fr_fr']; ?> 
                                              </option>

                                          <?php
                                              }
                                          ?>

                                      </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label for="tvaE"><h6>Numéro d'entreprise ou T.V.A</h6></label>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/checkmark.png"></span>
                                      </div>
                                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="N° TVA de l'entreprise" value="" name="tvaE" id="tvaE" required="">
                                  </div>
                              </div>
                              <div class="form-group">
                                        <label for="deviseE"><h6>Devise</h6></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/cash.png"></span>
                                            </div>
                                              <select class="form-control" id="deviseE" name="deviseE">
                                                <option value="" selected="">Sélectionner une dévise</option>

                                                <?php

                                                    //On séléctionne tous les devises ou monnaie
                                                    $get_monnaie = $bdd->prepare('SELECT * FROM monnaie ORDER BY Code_iso ASC');
                                                    $get_monnaie->execute(array());

                                                    while($row = $get_monnaie->fetch())
                                                    {
                                                ?>
                                                    <option value="<?php echo $row['id']; ?>">
                                                      <?php echo $row['Code_iso']; ?> 
                                                      (<?php echo $row['Devise']; ?>)
                                                    </option>

                                                <?php
                                                    }
                                                ?>
                                              </select>
                                        </div>

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
                        <button type="bouton" class="btn btn-primary" name="saventrep" id="saventrep">
                            <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Enregistrer
                        </button>

                      </div>

                    </div>
                </div>
            </div>
            <!--fin modale new entreprise-->


            <!-- Modal -->
            <!--Ce modal n'est pas utilisé mais la variable id_entrep est utilisé donc on le laise malgré tout (très important)-->
            <div class="modal fade" id="confirm_entreprise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header text-white bg-secondary">
                    <div class="row">
                        <div class="col-md-10"><h6 class="modal-title" id="exampleModalLabel">Sous entreprise pour <label class="" id="nom_entrep"></label> <label class="text-secondary" id="id_entrep">0</label></h6></div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                    </div>
                  </div>
                  <div class="modal-body">
                    <div class="bs-callout bs-callout-info">
                      <div class="row">
                        <div class="col-md-8">
                          <h5 class="text-info">Confirmer !</h5>
                          <h6>Voulez-vous créer des sous entreprises ou une unités d'exploitations</label> ?</h6>
                        </div>
                        <div class="col-md-4 text-center">
                            <img width="100" height="100" class="icone" src="../icons/png/office/info.png">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="no_ue">Non</button>
                    <button type="button" class="btn btn-primary" id="yes_ue">Oui</button>
                  </div>
                </div>
              </div>
            </div>


        

                

         

        <!--*****************************************************-->
        <br><br>
        <!-- Footer -->
        <nav class="bg-light ">
          <div class="p-3 mb-2 bg-white text-dark">
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

            //on affiche les catégories d'articles
              //affiche_entrerise();
              //ici on affiche toutes les catégories d'articles
              /*function affiche_entrerise()
              {
                var getid = '<?php echo $getid; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction1/affiche_entrerise.php',
                  data : 'getid=' + getid + '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_entreprise').html(data);
                  }
                });
              }


               //lorsqu'on recherche une entrerise
              $('#libsearchcatart').keyup(function()
              {
                var getid = '<?php echo $getid; ?>';
                var recherche = $('#libsearchcatart').val();
                var id_connexion = '<?php echo $id_connexion; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction1/rechercher_entreprise.php',
                  data : 'recherche=' + recherche + '&getid=' + getid + '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_entreprise').html(data);
                    //alert(data);
                  } 
                });

              });*/


               //ajouter une nouvelle entrerise
              $('#saventrep').click(function()
                {
                  
                  var nomE = $('#nomE').val();
                  var adressE = $('#adressE').val();
                  var villeE = $('#villeE').val();
                  var paysE = $('#paysE').val();
                  var tvaE = $('#tvaE').val();
                  var getid = '<?php echo $getid; ?>';
                  var deviseE = $('#deviseE').val();
                  var postal = $('#postal').val();
                  
                  if(nomE != '')
                    {
                       if(adressE != '')
                       {
                          if(villeE != '')
                          {
                            if(paysE != '')
                            {
                              if(tvaE != '')
                                {
                                  if(deviseE != '')
                                  {
                                     $.ajax({
                                      type : 'POST',
                                      url : 'fonction1/add_new_entreprise.php',
                                      data : "nomE=" + nomE + "&adressE=" + adressE + 
                                              "&villeE=" + villeE + "&paysE=" + paysE + 
                                              "&tvaE=" + tvaE + "&getid=" + getid + 
                                              "&deviseE=" + deviseE + '&postal=' + postal,
                                      success:function(data)
                                      {
                                        //alert(data);
                                        if(data == 0)
                                        {
                                          err3("Cette entreprise existe déjà déjà !");
                                          $('#nomE').addClass('is-invalid');
                                        }
                                        else
                                        {
                                          id_entrep = data;

                                          $.ajax({
                                              type  : 'POST',
                                              url   : 'fonction1/get_name_entreprise.php',
                                              data  : 'id_entrep=' + id_entrep,
                                              success:function(donnee)
                                              {

                                                //alert('id : ' + id_entrep + 'nom : ' + donnee);

                                                $('#nomE').removeClass('is-invalid');
                                                $('#adressE').removeClass('is-invalid');
                                                $('#villeE').removeClass('is-invalid');
                                                $('#paysE').removeClass('is-invalid');
                                                $('#tvaE').removeClass('is-invalid');
                                                $('#deviseE').removeClass('is-invalid');

                                                $('#nomE').val("");
                                                $('#adressE').val("");
                                                $('#villeE').val("");
                                                $('#paysE').val("");
                                                $('#tvaE').val("");
                                                $('#postal').val("");

                                                $('#nom_entrep').text(donnee);
                                                $('#id_entrep').text(id_entrep);
                                                
                                                valid3('Nouvelle entreprise insérée avec succès !');

                                                //on confirme si on doit créer des sous-entreprise ou pas
                                                swal({
                                                  title: "Confirmer !",
                                                  text: "Voulez-vous créer des sous entreprises ou unités d'exploitations ?",
                                                  type: "warning",
                                                  showCancelButton: true,
                                                  confirmButtonColor: "#28a745",
                                                  confirmButtonText: "Oui",
                                                  cancelButtonText: "Non",
                                                  closeOnConfirm: false,
                                                  closeOnCancel: false
                                                  },
                                                  function(isConfirm){
                                                      if (isConfirm) {
                                                          //on appel la fonction yes_ue() définie ci-dessous
                                                          yes_ue();
                                                      }
                                                      else {
                                                        //de même ici
                                                          no_ue();
                                                      }
                                                  });

                                                /*$('.ajouter-entreprise').modal('hide');
                                                $('#confirm_entreprise').modal('show');*/

                                                //affiche_entrerise();
                                              }  
                                          });
                                              
                                        }
                                      }
                                    });
                                  }
                                  else
                                  {
                                    $('#deviseE').addClass('is-invalid');
                                    err3("Veuillez renseigner la dévise votre entreprise S.V.P!");
                                  }
                              }
                              else
                              {
                                $('#tvaE').addClass('is-invalid');
                                err3("Veuillez renseigner le numéro TVA ou le numéro de l'entreprise S.V.P!");
                              }   
                            }
                            else
                            {
                              $('#paysE').addClass('is-invalid');
                              err3("Veuillez sélectionner le pays de l'entreprise S.V.P!");
                            }
                          }
                          else
                          {
                            $('#villeE').addClass('is-invalid');
                            err3("Veuillez renseigner la ville de l'entreprise S.V.P!");
                          }
                       }
                        else
                        {
                          $('#adressE').addClass('is-invalid');
                          err3("Veuillez renseigner l'adresse de l'entreprise S.V.P!");
                        }
                    }
                    else
                    {
                      $('#nomE').addClass('is-invalid');
                      err3("Veuillez renseigner le nom de l'entreprise S.V.P!"); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                    }

                });

              //lorsque nous ne voulons pas que notre entreprise puisse ne pas posseder des UE
              function no_ue()
                {
                  var id_entrep = $('#id_entrep').text();
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction1/confirmation_entreprise.php',
                      data  : 'id_entrep=' + id_entrep,
                      success:function(data)
                      {
                        //valid3("Votre entreprise ne possedera pas des sous entreprises ou unités d'exploitation !");
                        window.location = 'consulter_entreprise.php?id=' + getid + '&id_connexion=' + id_connexion + '&idE=' + id_entrep;
                        //$('#confirm_entreprise').modal('hide');
                      }
                    });
                }

                //lorsque nous  voulons  que notre entreprise puisse  posseder des UE
                function yes_ue()
                {
                  var id_entrep = $('#id_entrep').text();
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                  window.location = 'consulter_entreprise.php?id=' + getid + '&id_connexion=' + id_connexion + '&idE=' + id_entrep;
                      
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

                  info_abonnement();

                  function info_abonnement()
                  {
                    var id = '<?php echo $getid; ?>';
                    var exipration = 0;

                    $.ajax(
                      {
                        type  : 'POST',
                        url   : 'fonction1/getid_day_expiration.php',
                        data  : 'id=' + id,
                        success:function(data)
                        {
                          //alert(data);
                          exipration = data;

                          toastr.warning("Il vous reste " + exipration + " jours avant l'expiration de votre abonnement.",'Attention',{
                          "positionClass": "toast-bottom-left",
                          timeOut: 50000,
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
