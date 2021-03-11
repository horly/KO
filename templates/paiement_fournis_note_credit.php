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


      .table_transaction tbody
      {
        display:block;
        height:150px;
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
        

         <title>KEDIS Online! | Paiement fournisseur</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 
                    //session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['id_cmp']))  //si la variable id qu'on a transité existe dans l'url 
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

                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];

                          $id_cmp = $_GET['id_cmp'];

                          $reqfournis = $bdd->prepare("SELECT * FROM compte_financier WHERE id_cmp = ?");
                          $reqfournis->execute(array($id_cmp));

                          $infofournis = $reqfournis->fetch();

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
                                    <h1>Mes modes de paiement</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="viewComptfin.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&id_cmp=<?php echo $id_cmp; ?>"><?php echo $infofournis['lib_cmp']; ?></a></li>
                                        <li class="active">Paiement fournisseur</li>
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
                      <li class="nav-item">
                        <a class="nav-link" href="paiement_fournis.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&id_cmp=<?php echo $id_cmp; ?>"><strong>Factures</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="#"><strong>Notes de crédit</strong></a>
                      </li>
                      <!--<li class="nav-item">
                        <a class="nav-link" href="paiement_fournis_note_frais.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&id_cmp=<?php echo $id_cmp; ?>"><strong>Notes de frais/dépense</strong></a>
                      </li>-->
                    </ul>
                  </h6>
                  <?php 
                    //on séléctionne le nombre des clients dans l'UE
                    $view = $bdd->prepare("SELECT * FROM note_credit_achat WHERE id_UE_cra = ? AND reste_a_payer_cra != 0 AND complete_credit != ?");
                    $view->execute(array($idUE, 0));
                    $i = 1;
                    $existallvente = $view->rowCount();
                  ?>

                      <div class="card-body">
                          <div class="card border-info mb-3" >
                              <div class="card-header text-left"><strong><b>Liste des notes de crédit/achat (Total : <?php echo $existallvente; ?>)</b></strong></div>
                                <div class="card-body">
                                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Référence</th>
                                        <th>Date Achat</th>
                                        <th>Echéance</th>
                                        <th>Fournisseur</th>
                                        <th>Montant (<?php echo $devise;?>)</th>
                                        <th>Gestionnaire</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody class="table-bordered" id="table_article">
                                      <?php

                                          //on affiche aussi les notes de crédits non payés 
                                          $get_note = $bdd->prepare('SELECT * FROM note_credit_achat WHERE id_UE_cra = ? AND reste_a_payer_cra != 0 ORDER BY id_cra DESC');
                                          $get_note->execute(array($idUE));

                                          $i = 1;

                                          $existallcat = $get_note->rowCount();

                                        
                                            while($row1 = $get_note->fetch()) 
                                            {
                                         ?>   
                                            <tr>
                                                <td class="text-left"><?php echo $row1['num_credit']; ?></td>
                                                <td class="text-left"><?php echo $row1['date_cra']; ?></td>
                                                <td class="text-left"><?php echo $row1['echeance_cra']; ?></td>
                                                <td class="text-left">
                                                 <?php
                                                      //on recupère le fournisseur qui est le debiteur
                                                      $get_debiteur = $bdd->prepare('SELECT * FROM fournis_for_user WHERE id_four = ?');
                                                      $get_debiteur->execute(array($row1['id_four_cra']));
                                                      $fournis_info = $get_debiteur->fetch();

                                                      echo $fournis_info['societe_four'];
                                                  ?>   
                                                  </td>
                                                <td class="text-right"><?php echo number_format($row1['reste_a_payer_cra'] * -1, 2, ',', ' '); ?></td>
                                                <td class="text-left">
                                                  <?php
                                                      //on recupère le gestionnaire
                                                      $get_gestionnaire = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
                                                      $get_gestionnaire->execute(array($row1['id_gest_cra']));
                                                      $gestionnaire_info = $get_gestionnaire->fetch();

                                                      echo $gestionnaire_info['prenom_cl'];
                                                  ?>  
                                                </td>
                                                <td>
                                                  <a role="button" class="text-primary viewFacture" href="#" id="<?php echo $row1['id_cra']; ?>" option="<?php echo $row1['reste_a_payer_cra']; ?>" data-toggle="modal" data-target="#detail-facture">Consulter</a>
                                                </td>
                                              </tr>
                                          <?php 
                                            } 
                                    ?>
                                    </tbody>
                                      <?php
                                        $sum_fact = $bdd->prepare("SELECT SUM(reste_a_payer_cra) AS montant_reste FROM note_credit_achat WHERE id_UE_cra = ? AND reste_a_payer_cra != 0 ");
                                        $sum_fact->execute(array($idUE));
                                        $fetch_som = $sum_fact->fetch();

                                        $total_reste = $fetch_som['montant_reste'];

                                      ?>
                                    <tfoot>
                                      <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th class="text-right"><?php echo number_format($total_reste *-1, 2, ',', ' '); ?></th>
                                        <th></th>
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
              <!-- Modal détail facture à payer -->
              <div class="modal fade" id="detail-facture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header badge-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLabel">Détail remboursement fournisseur <label class="text-secondary" id="idachat">0</label> <label class="text-secondary"  id="dette_initial">0</label></h6>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="modal-body" id="apercu_dette">
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      <button type="button" class="btn btn-primary" id="solder_facture">Solder</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal détail facture à payer -->

               <!-- Modal détail new échance -->
              <div class="modal fade" id="echance_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header badge-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLabel">Echéance remboursement <label class="text-secondary" id="id_echeance">0</label></h6>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>

                    </div>
                    <div class="modal-body" id="body_new_echeance">
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      <button type="button" class="btn btn-primary" id="change_echeance">Enregistrer</button>
                    </div>
                  </div>
                </div>
              </div>
              <<!-- Modal détail new échance -->

                


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
            $('.paiement').addClass('active');

             //affiche_facture_apayer();

            function affiche_facture_apayer()
            {
              var idUE = '<?php echo $idUE; ?>';
              var devise = '<?php echo $devise; ?>';
              var id_cmp = '<?php echo $id_cmp; ?>';

              $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/affiche_facture_apayer_fournisseur_note_credit.php',
                  data  : 'idUE=' + idUE + '&devise=' + devise + '&id_cmp=' + id_cmp,
                  success:function(data)
                  {
                    $('#facture_a_payer').html(data);
                  }
                });
            }

            //consulter facture achat
            $('.viewFacture').click(function()
            {
              var id_cr = $(this).attr('id');
              var dette_initial = $(this).attr('option');
              var devise = '<?php echo $devise; ?>';
              var idUE = '<?php echo $idUE; ?>';
              var id_cmp = '<?php echo $id_cmp; ?>';
              //alert('id :' + id_dp + '\n' + 'reste :' + dette_initial);
              //$('#detail-facture').modal('show');

              $.ajax(
              {
                type  : 'POST',
                url   : 'fonction/affiche_detail_dette_fournis_note_credit.php',
                data  : 'id_cr=' + id_cr + '&devise=' + devise + '&idUE=' + idUE + '&id_cmp=' + id_cmp,
                success:function(data)
                {
                  $('#idachat').text(id_cr);
                  $('#apercu_dette').html(data);
                  //$('#detail-facture').modal('show');
                  $('#dette_initial').text(dette_initial);
                  

                  //on vérifie si le compte financier possède un numéro de compte pour l'afficher
                  $.ajax(
                          {
                            type  : 'POST',
                            url   : 'fonction/get_num_compte.php',
                            data  : 'id_cmp=' + id_cmp,
                            success:function(donnee)
                            {
                              if(donnee == 1)
                              {
                                $('#num-compte').css('display', 'none');
                              }
                              else
                              {
                                $('#num-compte').css('display', 'block');
                              }
                            }
                        });
                }
              });

            });


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

             //cette fonction nous permet de solder la facture
            $('#solder_facture').click(function()
            {
              var Montpaye = $('#Montpaye').val();
              var id_cmp = '<?php echo $id_cmp; ?>';
              var autre_devise = $('#autre_devise').val();
              var dette_initial = $('#dette_initial').text(); 
              var id_cr = $('#idachat').text();
              var idUE = '<?php echo $idUE; ?>';
              //var id_four = '<?php /*echo $id_four; */?>';
              var getid = '<?php echo $getid; ?>';
              var num_cmp_cli = $('#num_cmp_cli').val();

             

              if(Montpaye != '')
              {
                if(/^[0-9]+[.][0-9]+/.test(Montpaye) || /^[0-9]+/.test(Montpaye))
                {
                  $.ajax(
                      {
                          type  : 'POST',
                          url   : 'fonction/get_equivelent_devise.php',
                          data  : 'autre_devise=' + autre_devise,
                          success:function(data)
                          {
                            var equiv = data;
                            var montant = Montpaye / equiv;
                            var resteApayer = dette_initial - montant;

                             //alert(dette_initial);

                             //on vérifie si le compte financier possède un numéro de compte pour le saisir
                             $.ajax(
                              {
                                type  : 'POST',
                                url   : 'fonction/get_num_compte.php',
                                data  : 'id_cmp=' + id_cmp,
                                success:function(donnee)
                                {
                                  $.ajax(
                                  {
                                    type  : 'POST',
                                    url   : 'fonction/verif_total_encaissement.php',
                                    data  : 'id_cmp=' + id_cmp + '&taux_echange=' + montant + '&idUE=' + idUE,
                                    success:function(info)
                                    {
                                      if(info != 1)
                                      {
                                        if(donnee == 1)
                                        {
                                          if(resteApayer < 0)
                                          {
                                            $('#Montpaye').addClass('is-invalid');
                                            err3('Le montant remboursé ne peut pas être supérieur à dette de la note de crédit');
                                          }
                                          else
                                          {               
                                            $.ajax(
                                              {
                                                type  : 'POST', 
                                                url   : 'fonction/solder_facture_note_credit_achat.php',
                                                data  : 'id_cr=' + id_cr + '&montant=' + montant +
                                                      '&id_cmp=' + id_cmp + '&autre_devise=' + autre_devise + 
                                                      '&idUE=' + idUE + '&resteApayer=' + resteApayer + 
                                                      '&getid=' + getid + '&num_cmp_cli=' + num_cmp_cli,
                                                success:function(data)
                                                {
                                                  //alert(data);
                                                  affiche_facture_apayer();
                                                  $('#Montpaye').removeClass('is-invalid');
                                                  $('#Montpaye').val('');
                                                  $('#detail-facture').modal('hide');
                                                  $('#num_cmp_cli').removeClass('is-invalid');
                                                  $('#num_cmp_cli').val('');
                                                  valid3('Note de crédit payé avec succès');

                                                  setTimeout(function()
                                                  {
                                                    window.location.reload();
                                                  }, 5000);
                                                }
                                              });       
                                          }
                                        }
                                        else
                                        {
                                          //le mode de paiement contient un numéro de compte
                                          if(num_cmp_cli != '')
                                          {
                                            if(resteApayer < 0)
                                            {
                                              $('#Montpaye').addClass('is-invalid');
                                              err3('Le montant remboursé ne peut pas être supérieur à dette de la note de crédit');
                                            }
                                            else
                                            {
                                              $.ajax(
                                                {
                                                  type  : 'POST', 
                                                  url   : 'fonction/solder_facture_note_credit_achat.php',
                                                  data  : 'id_cr=' + id_cr + '&montant=' + montant +
                                                        '&id_cmp=' + id_cmp + '&autre_devise=' + autre_devise + 
                                                        '&idUE=' + idUE + '&resteApayer=' + resteApayer + 
                                                        '&getid=' + getid + '&num_cmp_cli=' + num_cmp_cli,
                                                  success:function(data)
                                                  {
                                                    //alert(data);
                                                    affiche_facture_apayer();
                                                    $('#Montpaye').removeClass('is-invalid');
                                                    $('#Montpaye').val('');
                                                    $('#detail-facture').modal('hide');
                                                    $('#num_cmp_cli').removeClass('is-invalid');
                                                    $('#num_cmp_cli').val('');
                                                    valid3('Note de crédit payé avec succès');

                                                    setTimeout(function()
                                                    {
                                                      window.location.reload();
                                                    }, 5000);
                                                  }
                                                }); 
                                            }
                                          }
                                          else
                                          {
                                            //si le numéro de compte n'est pas saisie
                                            $('#num_cmp_cli').addClass('is-invalid');
                                            err3('Veuillez saisir le numéro de compte du founisseur S.V.P !');
                                          }
                                        }
                                      }
                                      else
                                      {
                                        
                                      }
                                    }
                                  });
                                }
                              });
                          }
                      });
                }
                else
                {
                  $('#Montpaye').addClass('is-invalid');
                  err3('Le montant à payer est invalide !');
                }
              }
              else
              {
                $('#Montpaye').addClass('is-invalid');
                err3('Veuillez saisir le montant à payer S.V.P !');
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
