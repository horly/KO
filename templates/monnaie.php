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
     

    .container-tab1 {
        overflow-y: auto;
        height: 150px;
        background-color: white;
      }

      /*tr:nth-child(even) {background-color: #d1ecf1;}
      tbody tr:hover{ background-color: #F1F1F1;  }*/

      .scrollcat
      {
        height:550px;
        width:100%;
        overflow:auto;
      }

      #dropdownMenuLink
      {
        border: 1px solid gray;
        color: black;
      }

      .form_card
        {
          background-color: #d1ecf1;
        }

        /* .body-modal-article
        {
          overflow-y: auto;
          height: 485px;
          background-color: white;
        }*/

       #libsearchcatart {
          background-image: url('../icons/png/office/search.png');
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 6px 12px 5px 40px;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
      }

      

    </style>
        

         <title>KEDIS Online! | Mes monnaies étrangères</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <?php 
                    //session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']))  //si la variable id qu'on a transité existe dans l'url 
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
                          
                          $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise
                          $nomUE = $_GET['nom_unite_exploitation']; //on recupère le nom de l'UE

                          //on recupère la date debut du mois
                          $datedebut = date("Y-m-d", mktime(0,0,0,date("m"),1,date("Y")));
                          //on recupère la date fin du mois
                          $datefin = date("Y-m-d", mktime(0,0,0,date("m")+1,0,date("Y")));

                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production

                          
                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];

                          setlocale(LC_TIME, 'fra_fra');
                          $date = date("Y-m-d");

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
                                    <h1>Mes modes de paiement</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Mes modes de paiement</a></li>
                                        <li class="active">Mes monnaies étrangères</li>
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
                          if($fetch_user['mode_paiement'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="compte_finacier.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes modes de paiement</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['monnaie_etrangere'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link active" href="#"><strong>Mes monnaies étrangères</strong></a>
                        </li>
                      <?php
                          }
                      ?>
                      
                    </ul>
                  </h6>

                  <?php 
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise != ?");
                          $view->execute(array($idUE, 1));
                          $i = 1;
                          $existallvente = $view->rowCount();
                        ?>

                      <div class="card-body">
                          <div class="card border-info mb-3" >
                              <div class="card-header text-left"><strong><b>Liste des monnaies étrangères (Total : <?php echo $existallvente; ?>)</b></strong></div>
                                <div class="card-body">
                                  <div class="p-3 mb-2 bg-light text-dark border">
                                    <div class="row">
                                      <div class="col-md-2">
                                        
                                        <?php

                                          if($type_abonne == 'Petite Entreprise')
                                          {
                                            if($existallvente < 5)
                                            {
                                        ?>

                                            <button class="btn btn-success btn-block" data-toggle="modal" data-target=".ajouter-monnaie">
                                          <span class="step size-21">
                                              <i class="icon ion-earth"></i>
                                          </span>
                                              &nbsp;&nbsp;Ajouter</button>

                                        <?php
                                            }
                                            else
                                            {
                                        ?>

                                          <div class="alert alert-primary" role="alert">
                                            Vous avez atteint le nombre maximal de monnaies étrangères.
                                          </div>

                                        <?php
                                            }
                                          }
                                          else
                                          {

                                        ?>

                                          <button class="btn btn-success btn-block" data-toggle="modal" data-target=".ajouter-monnaie">
                                          <span class="step size-21">
                                              <i class="icon ion-earth"></i>
                                          </span>
                                              &nbsp;&nbsp;Ajouter</button>

                                        <?php
                                          }

                                        ?>
                                        
                                        
                                      </div>
                                      <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                      </div>
                                    </div>                               
                                  </div>
                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>N°</th>
                                        <th>Devise</th>
                                        <th>Désignation</th>
                                        <th>Date</th>
                                        <th>Taux</th>
                                        <th>Equivalence en <?php echo $devise; ?></th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered" id="table_article">
                                      <?php

                                        $view = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise != ?");
                                        $view->execute(array($idUE, 1));
                                        $i = 1;

                                        $existallcat = $view->rowCount();

                                        
                                            while($row = $view->fetch()) 
                                            {
                                         ?>   
                                            <tr>
                                              <td><?php echo $i++; ?></td>
                                              <td class="text-left"><?php echo $row['devise_dev']; ?></td>
                                              <td class="text-left"><?php echo $row['libelle_dev']; ?></td>
                                              <td class="text-left"><?php echo $row['date_dev']; ?></td>
                                              <td class="text-right"><?php echo number_format($row['taux_dev'], 2, ',', ''); ?></td>
                                              <td class="text-right"><?php echo number_format($row['equivalent_dev'], 2, ',', ''); ?></td>
                                              <td>
                                                <a class="text-primary" href="viewMonnaie.php?id=<?php echo $getid;?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&idmonnaie=<?php echo $row['id_dev'];?>">Détails</a>
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
               <!--debut modale new money-->
              <div class="modal fade bd-example-modal-lg ajouter-monnaie" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Ajouter une monnaie étrangère</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                            
                      </div>

                      <div class="modal-body body-modal-article scrollcat">

                       <div class="card form_card">
                        <div class="card-body">
                            <div class="form-group">
                              <label for="devise_dev"><h6>Devise</h6></label>
                              <div class="input-group mb-3">
                                <select class="custom-select" id="devise_dev" name="devise_dev">
                                  <option value="" selected="">Sélectionner une dévise</option>
                                    <?php

                                        //On séléctionne tous les devises ou monnaie
                                        $get_monnaie = $bdd->prepare('SELECT * FROM monnaie ORDER BY Code_iso ASC');
                                        $get_monnaie->execute(array());

                                        while($row = $get_monnaie->fetch())
                                        {
                                    ?>
                                        <option value="<?php echo $row['Code_iso']; ?>">
                                          <?php echo $row['Code_iso']; ?> 
                                          (<?php echo $row['Devise']; ?>)
                                        </option>

                                    <?php
                                        }
                                    ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="lib_dev"><h6>Libellé</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Entrer le libellé de la devise" name="lib_dev" id="lib_dev" required="">
                              </div>
                            </div>
                        </div>
                      </div>

                         <div class="card form_card">
                        <div class="card-body">
                          <h6 class="card-title">Taux de change</h6>
                          <hr>

                             <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="taux_dev"><h6>Taux</h6></label>
                                  <input name="taux_dev" id="taux_dev" type="text" class="form-control text-right" placeholder="0.00">
                                </div>

                                <div class="form-group">
                                  <label for="date_dev"><h6>Date</h6></label>
                                  <input type="date" class="form-control" name="date_dev" id="date_dev" value="<?php echo $date; ?>">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="equiv_dev"><h6>Equivaut</h6></label>
                                  <div class="input-group mb-3">
                                    <input name="equiv_dev" id="equiv_dev" type="text" class="form-control text-right" placeholder="0.00" >
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><?php echo $devise; ?></span>
                                    </div>
                                  </div>
                                </div>
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
                        <button type="bouton" class="btn btn-primary" name="save_dev" id="save_dev">
                            <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Enregistrer
                        </button>
                      </div>

                    </div>
                </div>
              </div>
              <!--fin modale new money-->

                


            </div>
        </div>
         

        <!--*****************************************************-->
        <br><br>
  </div>
    
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
            $('.paiement').addClass('active');

             //affiche_moyen_paiement();

            function affiche_moyen_paiement()
            {
              var idUE = '<?php echo $idUE; ?>';
              var getid = '<?php echo $getid; ?>';
              var nomUE = '<?php echo $nomUE; ?>';
              var nomE = '<?php echo $nomE; ?>';
              var id_connexion = '<?php echo $id_connexion; ?>';

              $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/affiche_moyen_paiement.php',
                  data  : 'idUE=' + idUE + '&getid=' + getid + 
                          '&nomUE=' + nomUE + '&nomE=' + nomE + 
                          '&id_connexion=' + id_connexion,
                  success:function(data)
                  {
                    $('#table_moyen_paiement').html(data);
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

             //insertion de la nouvelle monnaie étrangères
                $('#save_dev').click(function()
                  {
                    var devise_dev = $('#devise_dev').val();
                    var lib_dev = $('#lib_dev').val();
                    var taux_dev = $('#taux_dev').val();
                    var date_dev = $('#date_dev').val();
                    var equiv_dev = $('#equiv_dev').val();

                    var idUE = '<?php echo $idUE; ?>';

                    if(devise_dev != '')
                    {
                      if(lib_dev != '')
                      {
                        if(/^[a-zA-Z]+/.test(lib_dev))
                        {
                          if(/^[0-9]+[.][0-9]+/.test(taux_dev) || /^[0-9]+/.test(taux_dev) || taux_dev != '')
                          {
                            if(/^[0-9]+[.][0-9]+/.test(equiv_dev) || /^[0-9]+/.test(equiv_dev) || equiv_dev != '')
                            {
                              $.ajax({
                                  type : 'POST',
                                  url : 'fonction/add_new_monnaie.php',
                                  data : "devise_dev=" + devise_dev + "&lib_dev=" + lib_dev + 
                                          "&taux_dev=" + taux_dev + "&date_dev=" + date_dev +  
                                          "&equiv_dev=" + equiv_dev + "&idUE=" + idUE,
                                  success:function(data)
                                  {
                                    //alert(data);
                                    if(data == 1)
                                    {
                                      err3("Cette monnaie étrangère existe déjà !");
                                      $('#lib_dev').addClass('is-invalid');
                                      $('#devise_dev').addClass('is-invalid');
                                    }
                                    else if(data == 3)
                                    {
                                      err3("Vous ne pouvez pas utiliser cette nommaie comme monnaie étrangère !");
                                      $('#lib_dev').addClass('is-invalid');
                                      $('#devise_dev').addClass('is-invalid');
                                    }
                                    else
                                    {
                                      $('#lib_dev').removeClass('is-invalid');
                                      $('#devise_dev').removeClass('is-invalid');
                                      $('#taux_dev').removeClass('is-invalid');
                                      $('#equiv_dev').removeClass('is-invalid');

                                      $('#lib_dev').val('');
                                      $('#devise_dev').val('');
                                      $('#taux_dev').val('');
                                      $('#equiv_dev').val('');
                                      valid3('Nouvelle monnaie insérée avec succès !');
                                      $('.ajouter-monnaie').modal('hide');
                                      setTimeout(function()
                                      {
                                        window.location.reload();
                                      }, 5000);
                                    }
                                    //affiche_monnaie();
                                  }
                                });
                            }
                            else
                            {
                              $('#equiv_dev').addClass('is-invalid');
                              err3("Veuillez renseigner l'équivalence de la monnaie étrangère en " + "<?php echo $devise; ?>");
                            }
                          }
                          else
                          {
                            $('#taux_dev').addClass('is-invalid');
                            err3("Veuillez renseigner le taux d'échange de la monnaie étrangère");
                          }
                        }
                        else
                        {
                          err3("Le libellé de la monnaie étrangère saisi n'est pas valide !");
                          $('#lib_dev').addClass('is-invalid');
                        }
                      }
                      else
                      {
                        $('#lib_dev').addClass('is-invalid');
                        err3('Veuillez renseigner le libellé de la monnaie étrangère');
                      }
                    }
                    else
                    {
                      $('#lib_dev').addClass('is-invalid');
                      err3('Veuillez choisir une devise S.V.P!');
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
