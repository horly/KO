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

  

    <style type="text/css">
     


      .badge-maroon {
      color: #fff;
      background-color: #800000;
    }


      .label_view
      {
        size: 10px;
      }

      .card_article
      {
        height: 150px;
       /*white-space: pre-line; /*pour le saut en ligne du texte du bouton*/
      }

       .btn-orange
      {
        background-color: #CD853F;
      }

      .btn-orange:hover
      {
        background-color: #D2691E;
      }

      .btn-violet
      {
        background-color: #BA55D3;
      }

      .btn-violet:hover
      {
        background-color:   #8B008B;
      }

      .text-violet
      {
        color : #8B008B;
      }

      .tache
      {
        height: 429px;
      }

      .scrollfact
      {
        height:285px;
        width:100%;
        overflow:auto;
        border: 0.5px solid lightgray;
        background-color: white;
      }

      .form_card
        {
          background-color: #d1ecf1;
        }

        .body-modal-client
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        .body-modal-fournisseur
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        .body-modal-article
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        .body-modal-modepaiement
        {
          overflow-y: auto;
          height: 485px;
          background-color: white;
        }


      #adressfour, #adresstr, #adresscli, #adressserv
      {
        height: 126px;
      }

      .viewtva
      {
        display: none;
      }

      .viewtva_ser
      {
        display: none;
      }

       #libsearchcatart, #libsearchcatart1, #libsearchcatart2, #libsearchcatart3, 
       #libsearchcatart5, #libsearchcatart6 {
          background-image: url('../icons/png/office/search.png');
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 6px 12px 5px 40px;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
      }



      

    </style>
        

         <title>KEDIS Online! | Contacts | Mes serveur(se)s</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 

                   // session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']))  //si la variable id qu'on a transité existe dans l'url 
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
                      $id_abonne = $userfos['id_abonnement'];


                      if($id_connexion == $get_id_connexion)
                      {
                        //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                        if($login_required == 1)
                        {

                          $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise
                          $nomUE = $_GET['nom_unite_exploitation']; //on recupère le nom de l'UE

                          setlocale(LC_TIME, 'fr_FR'); //serveur
                          //setlocale(LC_TIME, 'fra_fra'); //php 5 en local 

                          //on recupère la date debut du mois
                          $datedebut = date("d-m-Y", mktime(0,0,0,date("m"),1,date("Y")));
                          //on recupère la date fin du mois
                          $datefin = date("d-m-Y", mktime(0,0,0,date("m")+1,0,date("Y")));

                          $date = date("Y-m-d");
                          $heure = date("H:i");

                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production


                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];

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
       <!--on inlus la navigation du menu -->
        <?php include('navigation.php'); ?>

         <div id="right-panel" class="right-panel">
            
            <!--on inlus la la barre de navigation au dessus-->
            <?php  include('navbar.php'); ?>

            <?php 
              //on recupère le numéro d'entreprise pour retourner en arrière 
              $getidEntrep = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
              $getidEntrep->execute(array($idUE));
              $fetchUE = $getidEntrep->fetch();
              $idE = $fetchUE['idEnt'];

            ?>
            <!-- Breadcrumbs-->
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Mes contacts</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Mes contacts</a></li>
                                        <li class="active">Mes serveurs/Serveuses</li>
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
                  <h6 class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                       <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['client'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="contacts.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes clients</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['fournisseur'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="fournisseur.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes fournisseurs</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['autre_tiers'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="autres_tiers.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes autres tiers</strong></a>
                        </li>
                       <?php
                          }
                          //on vérifie pour le menu contact
                          if($fetch_user['serveur'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link active" href="#"><strong>Mes serveur(se)s</strong></a>
                        </li>
                       <?php
                          }
                      ?>
                    </ul>
                  </h6>
                      <?php 
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM serveur WHERE id_UE_serv = ?");
                          $view->execute(array($idUE));
                          $i = 1;
                          $existallvente = $view->rowCount();
                        ?>
                      <div class="card-body">
                          <div class="card border-info mb-3" >
                              <div class="card-header text-left"><strong><b>Liste des serveur(se)s (Total : <?php echo $existallvente; ?>).</b></strong></div>
                                <div class="card-body">
                                  <div class="p-3 mb-2 bg-light text-dark border">
                                    <div class="row">
                                      <div class="col-md-3">
                                        <?php

                                              if($type_abonne == 'Petite Entreprise')
                                              {
                                                if($existallvente < 5)
                                                {
                                            ?>

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ajouter-serveur" title="Ajouter un(e) serveur(se)">
                                                    <span class="step size-21">
                                                        <i class="icon ion-person-add"></i>
                                                    </span>
                                                      &nbsp;&nbsp;&nbsp;&nbsp;Ajouter
                                                </button>

                                            <?php
                                                }
                                                else
                                                {
                                            ?>

                                              <div class="alert alert-primary" role="alert">
                                                Vous avez atteint le nombre maximal des serveur(se)s.
                                              </div>

                                            <?php
                                                }
                                              }
                                              else
                                              {

                                            ?>

                                              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ajouter-serveur" title="Ajouter un(e) serveur(se)">
                                                    <span class="step size-21">
                                                        <i class="icon ion-person-add"></i>
                                                    </span>
                                                      &nbsp;&nbsp;&nbsp;&nbsp;Ajouter
                                                </button>

                                            <?php
                                              }

                                            ?>
                                          </div>
                                          <div class="col-md-9">
                                            <div class="alert alert-primary text-center" role="alert">
                                              Uniquement pour les restaurants et bars.                          
                                            </div>
                                          </div>
                                        </div>

                                  </div>
                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Référence</th>
                                        <th>Prénom</th>
                                        <th>Nom</th>
                                        <th>Téléphone</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered" id="table_client">
                                      <?php

                                        $view = $bdd->prepare("SELECT * FROM serveur WHERE id_UE_serv = ?");
                                        $view->execute(array($idUE));

                                        $existallcat = $view->rowCount();
                                        $i = 1;

                                        while($row = $view->fetch()) 
                                        {
                                         ?>   
                                            <tr>
                                              <td><?php echo $row['reference_serv']; ?></td>
                                              <td><?php echo $row['prenom_serv']; ?></td>
                                              <td><?php echo $row['nom_serv']; ?></td>
                                              <td><?php echo $row['tel_serv']; ?></td>
                                              <td class="text-center">
                                                <a class="text-primary" href="viewServeur.php?id=<?php echo $getid;?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&id_serv=<?php echo $row['id_serv'];?>" title="Voir les détails du serveur <?php echo $row['prenom_serv']; echo " "; echo $row['nom_serv']; ?>">Détails</a>
                                              </td>
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
              <!-- Animated -->

            </div>

               <!--les modales-->
              <!--debut modale new client-->
              <div class="modal fade bd-example-modal-lg" id="ajouter-serveur" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10"><h6 class="modal-title" id="exampleModalLabel">Ajouter un(e) nouveau(velle) serveur(se)</h6></div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                      </div>

                      <div class="modal-body body-modal-client">

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
                                  <label for="prenomserv"><h6>Prénom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le prénom du(de la) serveur(se)" name="prenomserv" id="prenomserv">
                                  </div>
                                </div>
                              </div>

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="nomserv"><h6>Nom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le nom du(de la) serveur(se)" name="nomserv" id="nomserv">
                                  </div>

                                  <label for="telserv"><h6>Téléphone</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-call.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro téléphone du(de la) serveur(s)" name="telserv" id="telserv">
                                      </div>

                                </div>

                                <div class="col-md-6">
                                   <div class="form-group">
                                      <label for="adressserv"><h6>Adresse :</h6></label>
                                      <textarea class="form-control" id="adressserv" rows="2" placeholder="Adresse du(de la) serveur(se)" name="adressserv" required=""></textarea>
                                    </div> 
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <label for="postaleserv"><h6>Code postale</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale du(de la) serveur(se)" name="postaleserv" id="postaleserv">
                                      </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="villeserv"><h6>Ville</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville du(de la) serveur(se)" name="villeserv" id="villeserv">
                                      </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <label for="depserv"><h6>Département / Etat / Province</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-system-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le département du(de la) serveur(se)"  name="depserv" id="depserv" >
                                      </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="paysserv"><h6>Pays</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                                          </div>
                                          <select class="custom-select" name="paysserv" id="paysserv">
                                              <option value="" selected="selected">Sélectionner un pays</option>
                                              <?php

                                                    //On séléctionne tous les pays dans la base de données
                                                    $get_pays = $bdd->prepare('SELECT * FROM pays ORDER BY nom_fr_fr ASC');
                                                    $get_pays->execute(array());

                                                    while($row = $get_pays->fetch())
                                                    {
                                                ?>
                                                    <option value="<?php echo $row['nom_fr_fr']; ?>">
                                                      <?php echo $row['nom_fr_fr']; ?> 
                                                    </option>

                                                <?php
                                                    }
                                                ?>
                                          </select>
                                      </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <label for="emailserv"><h6>Adresse email</h6></label>
                                        <div class="input-group mb-3">
                                           <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                                            </div>
                                            <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'email du(de la) serveur(se)"  name="emailserv" id="emailserv">
                                        </div>
                                </div>
                                <div class="col-md-6">
                                  
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
                        <button type="submit" class="btn btn-primary" name="saveserv" id="saveserv">
                            <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Enregistrer
                        </button>
                      </div>

                    </div>

                </div>
              </div>
              <!--fin modale new fin-->

                


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

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">
          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.contacts').addClass('active');

            //on affiche les 
            //affiche_client();
              //ici on affiche tous les services
             /* function affiche_client()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>'; 

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_client.php',
                  data : 'idUE=' + idUE  + 
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid  + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_client').html(data);
                  }
                });
              }*/

              //lorsqu'on recherche un article
             /* $('#libsearchcatart').keyup(function()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var recherche = $('#libsearchcatart').val();
                var condition = $('#condition').val();
                var id_connexion = '<?php echo $id_connexion; ?>'; 

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/rechercher_client.php',
                  data : 'recherche=' + recherche + '&idUE=' + idUE  + '&condition=' + condition +
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_client').html(data);
                    //alert(condition);
                  } 
                });

              });*/


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

            //ajouter un nouveau serveur 
              $('#saveserv').click(function()
                {
                  var civilite = $('#civilite').val();
                  //var fidelitecard = $('#fidelitecard').val();
                  var nomcli = $('#nomserv').val();
                  var prenomcli = $('#prenomserv').val();
                  //var soccli = $('#soccli').val();
                  //var tvacli = $('#tvacli').val();
                  var adresscli = $('#adressserv').val();
                  var telcli = $('#telserv').val();
                  var postalecli = $('#postaleserv').val();
                  var villecli = $('#villeserv').val();
                  var depcli = $('#depserv').val();
                  var payscli = $('#paysserv').val();
                  var emailcli = $('#emailserv').val();
                  var idUE = '<?php echo $idUE; ?>';


                  if(prenomcli != '')
                  {
                    if(nomcli != '')
                    {   
                      if(payscli != '')
                      {
                        if(/^[a-zA-Z]+/.test(prenomcli))
                        {
                          if(/^[a-zA-Z]+/.test(nomcli))
                          {
                            if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(emailcli))
                            {
                              $.ajax(
                              {
                                type : 'POST',
                                url : 'fonction/add_new_serveur.php',
                                data : "civilite=" + civilite + "&prenomcli=" + prenomcli + 
                                        "&nomcli=" + nomcli +  
                                        "&adresscli=" + adresscli + "&telcli=" + telcli + 
                                        "&postalecli=" + postalecli + "&villecli=" + villecli + 
                                        "&depcli=" + depcli + "&payscli=" + payscli + 
                                        "&emailcli=" + emailcli + "&idUE=" + idUE,
                                success:function(data)
                                {
                                  //alert(data);
                                  $('#nomserv').removeClass('is-invalid');
                                  $('#prenomserv').removeClass('is-invalid');
                                  $('#emailcli').removeClass('is-invalid');

                                  //$('#soccli').val('');
                                  //$('#tvacli').val('');
                                  $('#prenomserv').val('');
                                  $('#nomserv').val('');
                                  $('#adressserv').val('');
                                  $('#telserv').val('');
                                  $('#villeserv').val('');
                                  $('#depserv').val('');
                                  $('#emailserv').val('');
                                  $('#civilite').val('');
                                  //$('#fidelitecard').val('');

                                  $('#ajouter-serveur').modal("hide");


                                  valid3('Nouveau(velle) serveur(se) ajouté(e) avec succès');
                                  
                                  setTimeout(function()
                                  {
                                    window.location.reload();
                                  }, 5000);
                                  
                                  //affiche_client();
                                }
                              });
                            }
                            else
                            {
                              $('#emailserv').addClass('is-invalid');
                              err3("L'adresse émail du(de la) serveur(se) saisie n'est pas valide !");
                            }
                          }
                          else
                          {
                            $('#nomserv').addClass('is-invalid');
                            err3("Le nom du(de la) serveur(se) saisie n'est pas valide !");
                          }
                        }
                        else
                        {
                          $('#prenomserv').addClass('is-invalid');
                          err3("Le prénom du(de la) serveur(se) saisie n'est pas valide !");
                        }
                      }
                      else
                      {
                        $('#paysserv').addClass('is-invalid');
                        err3("Veuillez Sélectionner un pays S.V.P !");
                      }
                    }
                    else
                    {
                      $('#nomserv').addClass('is-invalid');
                      err3("Veuillez saisir le nom du(de la) serveur(se) S.V.P!");
                    }
                  }
                  else
                  {
                    $('#prenomserv').addClass('is-invalid');
                    err3("Veuillez saisir le prénom du(de la) serveur(se) S.V.P!");
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
