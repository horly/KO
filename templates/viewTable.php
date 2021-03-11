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


         <!--css callout message-->
        <link href="../asserts/css/callout.css" rel="stylesheet">

        <!--<link rel="stylesheet" type="text/css" href="assets/css/loader.css">-->
        <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">

  

    <style type="text/css">
     
      /*tbody 
        {
          display:block;
          height:200px;
          overflow:auto;
        }*/

        /*thead, tbody tr, tfoot
        {
          display:table;
          width:100%;
          table-layout:fixed;
        }*/

        /*thead tr
        {
          cursor: pointer;
        }

        thead, tfoot 
        {
            width: calc( 100% - 1em )
        }*/

      /*tr:nth-child(even) {background-color: #d1ecf1;}
      tbody tr:hover{ background-color: #F1F1F1;  }*/

      .table_facture thead, .table_facture tbody tr, .table_facture tfoot
      {
        display:table;
        width:100%;
        table-layout:fixed;
      }

      .table_facture thead, .table_facture tfoot 
      {
          width: calc( 100% - 1em )
      }
      
      .table_facture tbody
      {
        display:block;
        height:180px;
        overflow:auto;
      }

      .table_transaction tbody
      {
        display:block;
        height:165px;
        overflow:auto;
      }

      .table_transaction thead, .table_transaction tbody tr, .table_transaction tfoot
      {
        display:table;
        width:100%;
        table-layout:fixed;
      }

      .table_transaction thead, .table_transaction tfoot 
      {
          width: calc( 100% - 1em )
      }


      .form_card
        {
          background-color: #d1ecf1;
        }

        #apercu_vente
      {
        overflow-y: auto;
          height: 570px;
          background-color: white;
      }

       #apercu_note_credit
      {
        overflow-y: auto;
          height: 570px;
          background-color: white;
      }

      .body-modal-client
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        #adressserv
      {
        height: 126px;
      }
      .contact
      {
        background-color: #d1ecf1;
      }
      

    </style>
        

         <title>KEDIS Online! | Contacts | Détails table</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 
                    //session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['id_table']))  //si la variable id qu'on a transité existe dans l'url 
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


                      if($id_connexion == $get_id_connexion)
                      {

                        //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                        if($login_required == 1)
                        {
                          
                          $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise
                          $nomUE = $_GET['nom_unite_exploitation']; //on recupère le nom de l'UE

                          //on recupère la date debut du mois
                          $datedebut = date("Y-m-d", mktime(0,0,0,date("m"),1,date("Y")));
                          //on recupère la date fin du mois
                          $datefin = date("Y-m-d", mktime(0,0,0,date("m")+1,0,date("Y")));

                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production

                          $id_table = $_GET['id_table']; //on récupère l'id du client

                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];


                          if(isset($_POST['delete_client']))
                          {
                            $deletereq = $bdd->prepare("DELETE FROM client_for_user WHERE id_cli = ?");
                            $deletereq->execute(array($id_cl));

                            header('location:contacts.php?id='.$getid."&id_connexion=".$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE);
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
       <!--on inlus la navigation du menu -->
        <?php include('navigation.php'); ?>

         <div id="right-panel" class="right-panel">
            
            <!--on inlus la la barre de navigation au dessus-->
            <?php  include('navbar.php'); ?>

          <?php include('navigation.php'); ?>

            <?php

              $reqart = $bdd->prepare("SELECT * FROM tables WHERE id = ?");
              $reqart->execute(array($id_table));

              $infoart = $reqart->fetch();

            ?>


            <!-- Breadcrumbs-->
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Mes tables</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="tables.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes tables</a></li>
                                        <li class="active">Détails table</li>
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
                  <div class="card-header">
                    <h6>Détails table</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block" id="new_table">
                          <span class="step size-21">
                            <i class="icon ion-edit"></i>
                          </span>
                          &nbsp;&nbsp;Modifier
                        </button>
                      </div>
                      <div class="col-md-2">
                       
                            <button type="button" class="btn btn-danger btn-block" id="delete_client">
                              <span class="step size-21">
                                <i class="icon ion-ios-trash"></i>
                              </span>
                              &nbsp;&nbsp;Supprimer
                            </button>
                        

                      </div>
                      <div class="col-md-8"></div>
                    </div>

                    <div id="detail_content">
                      
                    </div>
                       
                  </div>
             </div>
              </div>
              <!-- Animated -->

            </div>


           <!--les modales-->
              <!--Nouvelle catégorie d'article-->
              <div class="modal fade" id="ajouter-table" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="myModalLabel">Mettre à jour une table</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                            
                      </div>
                      <div class="modal-body" id="body-categorie">
                        <label for="design_table"><h6>Désignation</h6></label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/navicon.png"></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Entrer la désignation de la table" aria-label="Recipient's username" aria-describedby="basic-addon2" name="design_table" id="design_table" value="<?php echo $infoart['designation']; ?>">
                        </div>

                        <label for="serveur"><h6>Serveur(se)</h6></label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                          </div>
                          <select class="custom-select" id="serveur">
                            <?php

                                $get_select_serv = $bdd->prepare("SELECT * FROM serveur WHERE id_serv = ?");
                                $get_select_serv->execute(array($infoart['id_serveur']));
                                $fetch_serv = $get_select_serv->fetch();
                            ?>
                            <option selected="" value="<?php echo $infoart['id_serveur']; ?>"><?php echo $fetch_serv['prenom_serv'].' '.$fetch_serv['nom_serv']; ?></option>
                            <?php
                              $viewserv = $bdd->prepare("SELECT * FROM serveur WHERE id_UE_serv = ?");
                              $viewserv->execute(array($idUE));

                              while($row = $viewserv->fetch())
                              {
                            ?>
                              <option value="<?php echo $row['id_serv']; ?>"><?php echo $row['prenom_serv'].' '.$row['nom_serv']; ?></option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>

                        <button class="btn btn-success btn-block" id="new_serveur">
                          <span class="step size-21">
                              <i class="icon ion-person-add"></i>
                          </span>
                          Ajouter un(e) nouveau(lle) serveur(se)
                        </button>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                            <i class="icon ion-android-cancel"></i>
                          </span>
                          &nbsp;&nbsp;Annuler</button>
                        <button type="submit" class="btn btn-primary" name="save_table" id="save_table"> 
                          <span class="step size-21">
                            <i class="icon ion-archive"></i>
                          </span>
                          &nbsp;&nbsp;Enregistrer</button>
                      </div>
                    </div>
                  
                </div>
              </div>
              <!--Nouvelle catégorie d'article-->

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



        <script src="../dist/js/util.js"></script>
        <!--<script src="../dist/js/dropdown.js"></script>-->
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>


          <!--<script src="assets/js/init/datatables-init.js"></script>-->

          <!--Mon modal personnel-->
          <script src="assets/js/modal.mata.js"></script>

          <!--loader-->
          <script src="assets/js/loader.js"></script>

          <!--switch arlert-->
          <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">

          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.tables').addClass('active');

            $('#new_table').click(function()
                {
                  $('#ajouter-table').modal('show');
                });

              //nouveau serveur
              $('#new_serveur').click(function()
                {
                  $('#ajouter-table').modal('hide');
                  $('#ajouter-serveur').modal('show');
                });

            affiche_detail(); 

              function affiche_detail()
              {
                
                var id_table = '<?php echo $id_table; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/detail_table.php',
                  data : 'id_table=' + id_table + '&devise=' + devise,
                  success:function(data)
                  {
                    $('#detail_content').html(data);
                  }
                });
              }

              function delete_table()
              {
                var id_table = '<?php echo $id_table; ?>';

                $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/delete_table.php',
                  data  : 'id_table=' + id_table, 
                  success:function(data)
                  {
                    
                  }
                });
              }

              //supprimer client
              $('#delete_client').click(function()
                {

                  var id_table = '<?php echo $id_table; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';

                  swal({
                          title: "Confirmer !",
                          text: "Voulez-vous vraiment supprimer cette table ?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#28a745",
                          confirmButtonText: "Oui",
                          cancelButtonText: "Non",
                          closeOnConfirm: false
                          },
                          function(){
                              //swal("Supprimé !!", "L'utilisateur a été supprimé avec succès !!", "success");
                              delete_table();
                              swal(
                                {
                                  title: "Supprimé !!",
                                text: "La table a été supprimé avec succès !!",
                                type: "success",
                                confirmButtonColor: "#28a745",
                                }, function(){ window.location = 'tables.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE; });
                          });
                });


              //ajouter une nouvelle table
               $('#save_table').click(function()
                {
                  var id_table = '<?php echo $id_table; ?>';
                  var design_table = $('#design_table').val();
                  var serveur = $('#serveur').val();
                  var idUE = '<?php echo $idUE; ?>';

                  if(design_table != '')
                  {
                    if(serveur != '')
                    {
                      $.ajax(
                        {
                          type  : 'POST', 
                          url   : 'fonction/update_table.php',
                          data  : 'design_table=' + design_table + '&serveur=' + serveur + '&idUE=' + idUE + '&id_table=' + id_table,
                          success:function(data)
                          {
                            if(data == 1)
                            {
                              err3("Ce nom de table existe déjà !");
                            }
                            else
                            {
                              $('#ajouter-table').modal('hide');

                              $('#design_table').removeClass('is-invalid');
                              $('#serveur').removeClass('is-invalid');


                              valid3('Table mis à jour avec succès');
                                        
                              setTimeout(function()
                              {
                                window.location.reload();
                              }, 5000);

                              affiche_detail();

                            }
                          }
                        });
                    }
                    else
                    {
                      $('#serveur').addClass('is-invalid');
                      err3("Veuillez sélectionner un(e) serveur(se) S.V.P !");
                    }
                  }
                  else
                  {
                    $('#design_table').addClass('is-invalid');
                    err3("Veuillez entrer la désignation de la table S.V.P !");
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
