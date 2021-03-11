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
        

         <title>KEDIS Online! | Unités d'exploitations</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 
                    //session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idE']) AND isset($_GET['nom_entreprise']))   //si la variable id qu'on a transité existe dans l'url 
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

                      $getidE = $_GET['idE']; //on recupère l'id de l'entreprise
                      $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise

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
                <h5 class="text-left">Entreprise : <strong class="text-primary"><?php echo $nomE; ?></strong></h5>
             </div>

                <?php
                  if($userfos['statut'] == 'admin')
                  {
                ?>

                    <div class="alert alert-primary" role="alert">
                      Veuillez créer une nouvelle unité d'exploitation ou cliquez sur une existante pour acceder au menu.
                    </div>

                <?php
                  }
                  else
                  {

                ?>

                    <div class="alert alert-primary" role="alert">
                      Veuillez cliquez sur une unité d'exploitation pour acceder au menu.
                    </div>

                <?php
                  }
                ?>


                <?php

                  if($userfos['statut'] == 'admin')
                  {
                    if($type_abonne == 'Petite Entreprise')
                    {
                ?>

                    <div class="alert alert-warning" role="alert">
                      Votre abonnement est de type <b><?php echo $type_abonne; ?></b>. Vous pouvez cliquer sur le bouton <b>Gerer les Unités d'exploitation</b> pour sélectionner l'unité d'exploitation que vous voulez utiliser.
                    </div>

                <?php
                    }
                    if($type_abonne == 'Moyenne Entreprise')
                    {
                ?>

                    <div class="alert alert-warning" role="alert">
                      Votre abonnement est de type <b><?php echo $type_abonne; ?></b>. Vous pouvez cliquer sur le bouton <b>Gerer les Unités d'exploitation</b> pour sélectionner les unités d'exploitation que vous voulez utiliser.
                    </div>

                <?php
                    }
                  }
                ?>

              <div class="card border-info mb-3" >
                <div class="card-header text-left"><strong><b>Mes unités d'exploitations / Etablissements</b></strong></div>
                  <div class="card-body">
                    <div class="p-3 mb-2 bg-light text-dark border">
                      <div class="row">
                        <div class="col-md-3">
                          <?php
                            if($userfos['statut'] == 'admin')
                            {
                              if($type_abonne == 'Avie' || $type_abonne == 'Essaie' || $type_abonne == 'Entreprise')
                              {
                          ?>

                         
                            <button type="button" class="btn btn-success" role="button" data-toggle="modal" data-target=".ajouter-entreprise">
                                  <span class="step size-21">
                                      <i class="icon ion-briefcase"></i>
                                  </span>
                                  Nouvelle unité d'exploitation
                              </button>
                          
                          <?php
                                }
                                if($type_abonne == 'Petite Entreprise')
                                {

                                  //on verifie s'il n'a qu'un seul entreprise
                                  $view = $bdd->prepare("SELECT * FROM uniteexploit WHERE idEnt = ? "); //on séléctionne les entreprise appartenant à cet utlisateur
                                  $view->execute(array($getidE));
                                  $i = 1;

                                  $existallE = $view->rowCount();
                                  if($existallE == 0)
                                  {
                          ?>

                                  <button type="button" class="btn btn-success" role="button" data-toggle="modal" data-target=".ajouter-entreprise">
                                      <span class="step size-21">
                                          <i class="icon ion-briefcase"></i>
                                      </span>
                                      Nouvelle unité d'exploitation
                                  </button>
                          <?php
                                  }
                              }
                              if($type_abonne == 'Moyenne Entreprise')
                              {
                                //on verifie s'il n'a que 5 entreprises
                                $view = $bdd->prepare("SELECT * FROM uniteexploit WHERE idEnt = ? "); //on séléctionne les entreprise appartenant à cet utlisateur
                                $view->execute(array($getidE));
                                $i = 1;

                                $existallE = $view->rowCount();

                                if($existallE < 5)
                                {
                          ?>

                                <button type="button" class="btn btn-success" role="button" data-toggle="modal" data-target=".ajouter-entreprise">
                                      <span class="step size-21">
                                          <i class="icon ion-briefcase"></i>
                                      </span>
                                      Nouvelle unité d'exploitation
                                  </button>

                          <?php
                                }
                              }
                            }
                          ?>
                        </div>

                        <div class="col-md-5">
                          
                        </div>

                        <div class="col-md-4 text-right">

                          <?php

                          if($type_abonne == 'Petite Entreprise' || $type_abonne == 'Moyenne Entreprise')
                          {
                            if($userfos['statut'] == 'admin')
                            {

                          ?>
                            <a role="button" class="btn btn-warning text-white" href="gerer_UE.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&id_abonne=<?php echo $id_abonne; ?>&idE=<?php echo $getidE; ?>">
                              <span class="step size-21">
                                  <i class="icon ion-briefcase"></i>
                              </span>
                                  &nbsp;&nbsp;Gerer les Unités d'exploitation
                          </a>

                          <?php
                              }
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
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody class="table-bordered" id="table_client">
                      <?php

                        if($type_abonne == 'Avie' || $type_abonne == 'Essaie' || $type_abonne == 'Entreprise')
                        {
                          $view = $bdd->prepare("SELECT * FROM uniteexploit WHERE idEnt = ?"); //on séléctionne l'UE correspondant à l'entreprise
                          $view->execute(array($getidE));
                          $i = 1;

                          while($row = $view->fetch()) 
                          {
                        ?>   
                          <tr>
                             <td scope="row" width="70"><?php echo $i++; ?></td>
                              <td><a class="text-primary" href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $row['idUE']; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $row['nomUE']; ?>"><?php echo $row['nomUE']; ?></a></td>
                              <td><?php echo $row['adresseUE']; ?></td>
                              <td><?php echo $row['code_postal']; ?></td>
                              <td><?php echo $row['villeUE']; ?></td>
                              <td><?php echo $row['paysUE']; ?></td>
                              <td><a class="text-primary"  href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $row['idUE']; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $row['nomUE']; ?>" >Consulter</a></td>
                              <td class="text-center">
                                <a href="parametre_UE.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $row['idUE']; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $row['nomUE']; ?>">
                                  <span class="step size-24">
                                    <i class="icon ion-android-settings"></i>
                                  </span>
                                  <?php  ?>    
                                </a>
                              </td>
                          </tr>
                        <?php 
                          }
                        }
                        if($type_abonne == 'Petite Entreprise')
                        { 
                          $view = $bdd->prepare("SELECT * FROM uniteexploit WHERE idEnt = ? AND statut = 1 LIMIT 1"); //on séléctionne l'UE correspondant à l'entreprise
                          $view->execute(array($getidE));
                          $i = 1;

                          while($row = $view->fetch()) 
                          {  
                      ?>
                          <tr>
                             <td scope="row" width="70"><?php echo $i++; ?></td>
                              <td><a class="text-primary" href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $row['idUE']; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $row['nomUE']; ?>"><?php echo $row['nomUE']; ?></a></td>
                              <td><?php echo $row['adresseUE']; ?></td>
                              <td><?php echo $row['code_postal']; ?></td>
                              <td><?php echo $row['villeUE']; ?></td>
                              <td><?php echo $row['paysUE']; ?></td>
                              <td><a class="text-primary"  href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $row['idUE']; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $row['nomUE']; ?>" >Consulter</a></td>
                              <td class="text-center">
                                <a href="parametre_UE.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $row['idUE']; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $row['nomUE']; ?>">
                                  <span class="step size-24">
                                    <i class="icon ion-android-settings"></i>
                                  </span>
                                  <?php  ?>    
                                </a>
                              </td>
                          </tr>

                      <?php
                          }
                        }
                        if($type_abonne == 'Moyenne Entreprise')
                        { 
                           $view = $bdd->prepare("SELECT * FROM uniteexploit WHERE idEnt = ? AND statut = 1 LIMIT 5"); //on séléctionne l'UE correspondant à l'entreprise
                          $view->execute(array($getidE));
                          $i = 1;

                          while($row = $view->fetch()) 
                          { 
                      ?>
                          <tr>
                             <td scope="row" width="70"><?php echo $i++; ?></td>
                              <td><a class="text-primary" href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $row['idUE']; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $row['nomUE']; ?>"><?php echo $row['nomUE']; ?></a></td>
                              <td><?php echo $row['adresseUE']; ?></td>
                              <td><?php echo $row['code_postal']; ?></td>
                              <td><?php echo $row['villeUE']; ?></td>
                              <td><?php echo $row['paysUE']; ?></td>
                              <td><a class="text-primary"  href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $row['idUE']; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $row['nomUE']; ?>" >Consulter</a></td>
                              <td class="text-center">
                                <a href="parametre_UE.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $row['idUE']; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $row['nomUE']; ?>">
                                  <span class="step size-24">
                                    <i class="icon ion-android-settings"></i>
                                  </span>
                                  <?php  ?>    
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
                      <div class="col-md-10"><h6 class="modal-title" id="exampleModalLabel">Créer une unité d'exploitation</h6></div>
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
                                    <label for="nomUE">Nom</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-briefcase.png"></span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nom de l'unité d'exploitation" value="" name="nomUE" id="nomUE" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adressUE">Adresse :</label>
                                    <textarea class="form-control"  rows="2" name="adressUE" id="adressUE" placeholder="l'adresse de votre unité d'exploitation" required=""></textarea>
                                </div>
                                <div class="form-group">
                                      <label for="postalecli"><h6>Code postal</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale" name="postale" id="postale">
                                      </div>
                                    </div>
                                <div class="form-group">
                                    <label for="villeUE">Ville</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville de l'unité d'exploitation" value="" name="villeUE" id="villeUE" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="paysUE">Pays</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                                        </div>
                                        <select class="custom-select" name="paysUE" id="paysUE">
                                            <option value="" selected="selected">Sélectionner un pays</option>
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
                                    <label for="deviseUE">Devise :</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/cash.png"></span>
                                        </div>
                                          <select class="form-control" id="deviseUE" name="deviseUE">
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
                    <button type="bouton" class="btn btn-primary" name="saveUE" id="saveUE">
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

            //on affiche les UE
              /*affiche_UE();
              //ici on affiche toutes les catégories d'articles
              function affiche_UE()
              {
                var getid = '<?php echo $getid; ?>';
                var idE = '<?php echo $getidE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction1/affiche_UE.php',
                  data : 'getid=' + getid + '&idE=' + idE + '&nomE=' + nomE +
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_UE').html(data);
                  }
                });
              }*/

              //lorsqu'on recherche une entrerise
              /*$('#libsearchcatart').keyup(function()
              {
                var getid = '<?php echo $getid; ?>';
                var idE = '<?php echo $getidE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var recherche = $('#libsearchcatart').val();
                var id_connexion = '<?php echo $id_connexion; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction1/rechercher_UE.php',
                  data : 'recherche=' + recherche + '&getid=' + getid +
                         '&idE=' + idE + '&nomE=' + nomE + '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_UE').html(data);
                    //alert(data);
                  } 
                });

              });*/


              //ajouter une nouvelle entrerise
              $('#saveUE').click(function()
                {
                  var nomUE = $('#nomUE').val();
                  var adressUE = $('#adressUE').val();
                  var villeUE = $('#villeUE').val();
                  var paysUE = $('#paysUE').val();
                  var deviseUE = $('#deviseUE').val();
                  var idE = '<?php echo $getidE; ?>';
                  var postale = $('#postale').val();
                  
                  if(nomUE != '')
                    {
                       if(adressUE != '')
                       {
                          if(villeUE != '')
                          {
                            if(paysUE != '')
                            {
                              if(deviseUE != '')
                              {
                                 $.ajax({
                                  type : 'POST',
                                  url : 'fonction1/add_new_UE.php',
                                  data : "nomUE=" + nomUE + "&adressUE=" + adressUE + 
                                          "&villeUE=" + villeUE + "&paysUE=" + paysUE + 
                                          "&deviseUE=" + deviseUE + "&idE=" + idE + '&postale=' + postale,
                                  success:function(data)
                                  {
                                    //alert(data);
                                    if(data == 1)
                                    {
                                      err3("Cette unité d'exploitation existe déjà déjà !");
                                      $('#nomUE').addClass('is-invalid');
                                    }
                                    else
                                    {
                                      $('#nomUE').removeClass('is-invalid');
                                      $('#adressUE').removeClass('is-invalid');
                                      $('#villeUE').removeClass('is-invalid');
                                      $('#paysUE').removeClass('is-invalid');
                                      $('#deviseUE').removeClass('is-invalid');

                                      $('#nomUE').val("");
                                      $('#adressUE').val("");
                                      $('#villeUE').val("");
                                      $('#paysUE').val("");;
                                      $('#deviseUE').val("");;

                                      valid3("Nouvelle unité d'exploitation enregistrée avec succès !");
                                      $('.ajouter-entreprise').modal('hide');

                                      setTimeout(function()
                                      {
                                        window.location.reload();
                                      }, 5000);

                                    }
                                  }
                                });
                              }
                              else
                              {
                                $('#deviseUE').addClass('is-invalid');
                                err3("Veuillez renseigner la dévise de l'unité d'exploitation S.V.P!");
                              }   
                            }
                            else
                            {
                              $('#paysE').addClass('is-invalid');
                              err3("Veuillez sélectionner le pays de l'unité d'exploitation S.V.P!");
                            }
                          }
                          else
                          {
                            $('#villeUE').addClass('is-invalid');
                            err3("Veuillez renseigner la ville de l'unité d'exploitation S.V.P!");
                          }
                       }
                        else
                        {
                          $('#adressUE').addClass('is-invalid');
                          err3("Veuillez renseigner l'adresse de l'unité d'exploitation S.V.P!");
                        }
                    }
                    else
                    {
                      $('#nomUE').addClass('is-invalid');
                      err3("Veuillez renseigner le nom de l'unité d'exploitation S.V.P!"); //on affiche le message d'erreur dans un toast défini dans la fonction err();
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
