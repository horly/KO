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
        height:150px;
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
        

         <title>KEDIS Online! | Mes notes de crédits</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
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

                          setlocale(LC_TIME, 'fra_fra');
                          $date_echeance = date("Y-m-d");
                          $date = date("Y-m-d");


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
                                    <h1>Mes recettes</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Mes recettes</a></li>
                                        <li class="active">Mes notes de crédits</li>
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
                          if($fetch_user['vente'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="vente.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes ventes</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['note_credit'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link active" href="#"><strong>Mes notes de crédit/vente</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['devis'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="devis.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes offres/devis</strong></a>
                        </li>
                      <?php
                          }
                      ?>

                      <?php
                          //on vérifie pour le menu contact
                          if($fetch_user['caisse'] == 0)
                          {
                      ?>
                        <li class="nav-item">
                          <a class="nav-link" href="caisse.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Ma caisse enregistreuse</strong></a>
                        </li>
                      <?php
                          }
                      ?>
                    </ul>
                  </h6>

                       <?php 
                          //on séléctionne le nombre des clients dans l'UE
                          $view = $bdd->prepare("SELECT * FROM note_credit WHERE id_UE_cr = ? AND complete_credit != ?");
                          $view->execute(array($idUE, 0));
                          $i = 1;
                          $existallvente = $view->rowCount();
                        ?>

                      <div class="card-body">
                          <div class="card border-info mb-3" >
                              <div class="card-header text-left"><strong><b>Liste des notes de crédit (Total : <?php echo $existallvente; ?>)</b></strong></div>
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

                                           <a role="button" class="btn btn-success btn-block" href="notecredit_init.php?id=<?php echo $getid;?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>">
                                            <span class="step size-21">
                                                <i class="icon ion-document-text"></i>
                                            </span>
                                                &nbsp;Ajouter une note de crédit</a>

                                        <?php
                                            }
                                            else
                                            {
                                        ?>

                                          <div class="alert alert-primary" role="alert">
                                            Vous avez atteint le nombre maximal de notes de crédit.
                                          </div>

                                        <?php
                                            }
                                          }
                                          else
                                          {

                                        ?>

                                          <a role="button" class="btn btn-success btn-block" href="notecredit_init.php?id=<?php echo $getid;?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>">
                                            <span class="step size-21">
                                                <i class="icon ion-document-text"></i>
                                            </span>
                                                &nbsp;Ajouter une note de crédit</a>

                                        <?php
                                          }

                                        ?>


                                        
                                      </div>
                                      <div class="col-md-2">
                                    </div>
                                    <div class="col-md-3">
                                      </div>
                                    </div>                               
                                  </div>
                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Référence</th>
                                        <th>Date</th>
                                        <th>Client</th>
                                        <th>Echéance</th>
                                        <th>Montant (<?php echo $devise; ?>)</th>
                                        <th>Montant payé (<?php echo $devise; ?>)</th>
                                        <th>Solde restant (<?php echo $devise; ?>)</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered" id="table_article">
                                      <?php

                                        $view = $bdd->prepare("SELECT * FROM note_credit WHERE id_UE_cr = ? AND complete_credit != ? ORDER BY reference_cr DESC");
                                        $view->execute(array($idUE, 0));

                                        $existallvente = $view->rowCount();
                                        $i = 1;

                                        
                                            while($row = $view->fetch()) 
                                            {
                                         ?>   
                                            <tr>
                                              <td><a class="text-primary" href="viewNoteCredit.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&idcredit=<?php echo $row['id_cr']; ?>"><?php echo $row['num_credit']; ?></a></td>
                                              <td class="text-left"><?php echo $row['date_cr']; ?></td>
                                              <td class="text-left">
                                                <?php
                                                    $nbrcli = $bdd->prepare("SELECT * FROM client_for_user WHERE id_cli = ?"); 
                                                    $nbrcli->execute(array($row['id_cl_cr']));

                                                    $nameCli = $nbrcli->fetch();

                                                    echo $nameCli['prenom_cli']; //on affiche le nom du client 
                                                ?>
                                              </td>
                                              <td class="text-left"><?php echo $row['echeance_cr']; ?></td>
                                              <td class="text-right"><?php echo number_format($row['montant_facture'] * -1, 2, '.', ' '); ?></td>
                                              <td class="text-right"><?php echo number_format($row['paiemant_recu_cr'] * -1, 2, '.', ' '); ?></td>
                                              <td class="text-right"><?php echo number_format($row['reste_a_payer_cr'] * -1, 2, '.', ' '); ?></td>
                                              <td>
                                                <a class="text-primary" href="viewNoteCredit.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&idcredit=<?php echo $row['id_cr']; ?>">Détails</a>
                                              </td>
                                            </tr>
                                          <?php 
                                            } 
                                    ?>
                                    </tbody>

                                    <?php

                                        //somme total à payer
                                        $somme_mt_fact = $bdd->prepare("SELECT SUM(montant_facture) AS somme_ttc FROM note_credit WHERE id_UE_cr = ? AND complete_credit = 1");
                                        $somme_mt_fact->execute(array($idUE));
                                        $fetch_ttc = $somme_mt_fact->fetch();
                                        $total_ttc = number_format($fetch_ttc['somme_ttc'], 2, '.', '');

                                        //somme montant payé
                                        $somme_paie = $bdd->prepare("SELECT SUM(paiemant_recu_cr) AS somme_paie FROM note_credit WHERE id_UE_cr = ? AND complete_credit = 1");
                                        $somme_paie->execute(array($idUE));
                                        $fetch_paie = $somme_paie->fetch();
                                        $total_paie = number_format($fetch_paie['somme_paie'], 2, '.', '');

                                        //somme reste à payer
                                        $somme_reste = $bdd->prepare("SELECT SUM(reste_a_payer_cr) AS somme_reste FROM note_credit WHERE id_UE_cr = ? AND complete_credit = 1");
                                        $somme_reste->execute(array($idUE));
                                        $fetch_reste = $somme_reste->fetch();
                                        $total_reste = number_format($fetch_reste['somme_reste'], 2, '.', '');
                                    ?>

                                    <tfoot>
                                      <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="text-right"><?php echo number_format($total_ttc * -1, 2, '.', ' '); ?></th>
                                        <th class="text-right"><?php echo number_format($total_paie * -1, 2, '.', ' '); ?></th>
                                        <th class="text-right"><?php echo number_format($total_reste * -1, 2, '.', ' '); ?></th>
                                        <th></th>
                                      </tr>
                                    </tfoot>
                                </table>

                                </div>
                            </div>
                      </div>
                  </div>
              </div>
              <!-- Animated -->

            </div>

               <!--les modales-->
                 

                


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
            $('.vente').addClass('active');

             //affiche_note_credit();

              function affiche_note_credit()
              {
                var getid = '<?php echo $getid; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';

                 $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_note_credit.php',
                  data : 'idUE=' + idUE  + '&id_connexion=' + id_connexion +
                          '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid,
                  success:function(data)
                  {
                    $('#table_vente').html(data);
                  }
                });
              }


            //initialisation du datatable
           $('#bootstrap-data-table').DataTable({
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
