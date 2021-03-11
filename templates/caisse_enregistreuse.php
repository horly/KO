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

        <!--<link href="MDB/css/mdb.min.css" rel="stylesheet">-->
        <!-- Your custom styles (optional) -->
        <link href="MDB/css/style.css" rel="stylesheet">

  

    <style type="text/css">
     .section 
        {
          position: relative;
          padding-top: 37px;
          border: 1px solid lightgray;
          background: #17a2b8;
        }
        
        .section1 {
          position: relative;
          padding-top: 37px;
           border: 1px solid lightgray;
          background: gray;
        }

        .section.positioned {
          position: absolute;
          top:100px;
          left:100px;
          width:800px;
          box-shadow: 0 0 15px #333;
        }

        .demo-2 table
        {
          background:white;
          padding-top: 0px;
        }

        .demo-2 table th
        {
          /*height: 0;*/
          line-height: 20px;
          padding-top: 0;
          padding-bottom: 0;
          color: transparent;
          border: none;
          white-space: nowrap;
          text-align: center;
        }

    

        .container-tab {
          overflow-y: auto;
          height: 400px;
          background-color: white;
        }

        .container-tab1 {
          overflow-y: auto;
          height: 296px;
          background-color: white;
        }

        .container-tab2
        {
          height: 254px;
          background-color: white;
        }

        .container-tab3
        {
          overflow-y: auto;
          height: 150px;
          background-color: white;
        }

        table {
          border-spacing: 0;
          width:100%;
        }

        td + td {
          /*border-left:1px solid lightgray;*/
        }

        #table_pause_vente, #table_print_facture_vente, 
        #table_print_ticket_vente, 
        #table_mode_paiement {
        border-spacing: 0;
        width:100%;
      }

      #table_pause_vente td, th, #table_print_facture_vente td, th, #table_print_ticket_vente td, th{
        border-bottom:1px solid lightgray;
        /*background:  #d1ecf1;*/
        padding: 5px 25px;
      }

      #table_facture td, th {
        border-bottom:1px solid lightgray;
        /*background:  #d1ecf1;*/
        padding: 5px 25px;
      }

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
        height:250px;
        overflow:auto;
      }

      /*rendre le tableau le curseur des pointer*/
        .tbody_article tr, .table_facture tr
        {
          cursor: pointer; transition: all .25s ease-in-out;
        }

        .table_facture tr:hover
        {
          background-color: #ddd;
        }



       .form_card
        {
          background-color: #d1ecf1;
        }

      

      .div_footer
      {
        border: 1px solid lightgray;
      }

      .vente
      {
        background-color: #d1ecf1;
      }

      .body-modal-article
      {
        overflow-y: auto;
        height: 550px;
        background-color: white;
      }

      .body-modal-client
      {
        overflow-y: auto;
        height: 550px;
        background-color: white;
      }

      .scrollfact
      {
        height:610px;
        width:100%;
        overflow:auto;
        border: 0.5px solid lightgray;
        background-color: white;
      }

      #libsearchcatart, #recherche, #search_mode_paiement {
          background-image: url('../icons/png/office/search.png');
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 6px 12px 5px 40px;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
      }

      .btn-orange
      {
        background-color: #CD853F;
      }

      .btn-orange:hover
      {
        background-color: #D2691E;
      }

      .card_article
      {
        height: 100px;
        white-space: pre-line; /*pour le saut en ligne du texte du bouton*/
        box-shadow: 0px 0px 20px #aaaaaa;
        /*border-radius: 20px;*/
      }

      .card_article_caisse
      {
        height: 200px;
        white-space: pre-line; /*pour le saut en ligne du texte du bouton*/
        box-shadow: 0px 0px 20px #aaaaaa;
        /*border-radius: 20px;*/
      }

      #Apayer, #devise_Apayer
      {
        /*font-size: 17px;*/
        font-weight: bold;
        /*color: white;*/
        /*background-color: #6c757d;*/
        /*border: 0px #6c757d;*/
        text-align: right;
      }

       .body-modal-mode-paiement
        {
          overflow-y: auto;
          height: 485px;
          background-color: white;
        }

      /*#payer
      {
        height: 55px;
      }*/

      .calc_rm
      {
        /*width: 80px;*/
        height: 60px;
        margin-bottom: 10px;
      }

      .calc_btn
      {
        /*width: 80px;*/
        height: 90px;
        margin-bottom: 10px;
      }

      #calc, #rm
      {
        /*width: 270px;*/
      }

      .text_ticket
      {
        font-family: Arial;
      }

      .ticket-body
      {
        height:550px;
        width:100%;
        overflow:auto;
        border: 0.5px solid lightgray;
        background-color: white;
      }

      #exit_fullscreen
      {
        display: none;
      }

      #adresscli
      {
        height: 126px;
      }

      .viewtva
      {
        display: none;
      }

      ul, li { list-style: none; }

      #back
      {
        display: none;
      }

      #logoArt
      {
        height: 100px;
        width: 100px;
      }

      #zone-dette
      {
        display: none;
      }

      #zone-mode-paiement
      {
        height: 200px;
      }


     
    </style>
        

         <title>KEDIS Online! | Caisse enregistreuse</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

               <!--Code PHP-->
                 <?php 
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['idClient']) AND isset($_GET['refcaise']))  //si la variable id qu'on a transité existe dans l'url 
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
                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production

                          $idClient = $_GET['idClient'];

                          //on recupère la date d'aujourd'hui
                          setlocale(LC_TIME, 'fra_fra');
                          $date = date("Y-m-d");
                          $heure = date("H:i:s");


                          $refcaise = $_GET['refcaise']; //on recupère la référence de caise

                          /*on recupère aussi l'id de la vente à partir de la 
                           référence de caise et de l'idUE*/
                          $getCodeVente = $bdd->prepare("SELECT * FROM vente_for_user WHERE reference_caise = ? AND id_UE_fact = ? ");
                          $getCodeVente->execute(array($refcaise, $idUE));

                          $fetchIdVente = $getCodeVente->fetch();

                          $idvente = $fetchIdVente['id_fact']; //on recupère l'id
                          $remise = $fetchIdVente['remise_fact'];
                          $montantPaye = $fetchIdVente['paiemant_recu_fact'];
                          $unite_remise = $fetchIdVente['unite_remise_fact'];

                          

                          /*on recupère aussi l'id de la vente à partir de la 
                           référence de caise et de l'idUE*/


                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];



                          //Enregistrement et annulation de la vente
                         /* if(isset($_POST['saveVente']))
                          {
                            $Apayer = htmlspecialchars($_POST['Apayer']);
                            $Montpaye = htmlspecialchars($_POST['Montpaye']);

                            //header("location:./tests/test1.php");
                           $UpadateVente = $bdd->prepare("UPDATE vente_for_user SET prix_unit_fact = ?, paiemant_recu_fact = ? WHERE id_fact = ? AND id_UE_fact = ? ");
                            $UpadateVente->execute(array($Apayer, $Montpaye, $idvente, $idUE));

                            header("location:factureVente.php?id=".$getid."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refcaise."&prenomClient=".$prenomClient."&nomClient=".$nomClient."&mailClient=".$mailClient."&societeClient=".$societeClient."&echeance=".$echeance."&idvente=".$idvente."&date=".$date);
                          }*/


                          //on recupère les clients
                          //client par défaut
                          $getclient = $bdd->prepare('SELECT * FROM client_for_user WHERE id_UE_cli = ? AND default_cli = ?');
                          $getclient->execute(array($idUE, 1));
                          $info_cli_df = $getclient->fetch();

                          $client_comptoire = $info_cli_df['prenom_cli'];
                          $id_client_comptoire = $info_cli_df['id_cli'];

                          $get_autoris = $bdd->prepare("SELECT * FROM autorisation WHERE id_user = ?");
                          $get_autoris->execute(array($getid));

                          $fetch_user =  $get_autoris->fetch();


                          $viewcmpdf = $bdd->prepare("SELECT * FROM compte_financier WHERE id_UE_cmp = ? AND default_cmp = 1");
                          $viewcmpdf->execute(array($idUE));
                          $fechtdef = $viewcmpdf->fetch();
                          $caisse_id = $fechtdef['id_cmp'];

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
        <aside id="left-panel" class="left-panel">
          <nav class="navbar navbar-expand-sm navbar-default">
              <div id="main-menu" class="main-menu collapse navbar-collapse">
                  <ul class="nav navbar-nav">
                      <li class="menu-title">Opérations vente</li><!-- /.menu-title -->
                      <li>
                          <a href="#" id="new_vente"><i class="menu-icon fa fa-repeat"></i>Nouvelle vente </a>
                      </li>
                      <li>
                          <a href="#" id="pause_vente"><i class="menu-icon fa fa-pause"></i>Pause vente </a>
                      </li>
                      <li>
                          <a href="#" id="reprise_vente"><i class="menu-icon fa fa-play"></i>Reprise vente </a>
                      </li>
                      <li>
                          <a href="#" id="cancel_vente"><i class="menu-icon fa fa-close"></i>Annuler vente </a>
                      </li>

                      <li class="menu-title">Autres Opérations</li><!-- /.menu-title -->
                      <li>
                          <a href="#"><i class="menu-icon fa fa-window-maximize"></i><label id="go_fullscreen" title="Appuyer sur F11 pour l'affichage plein écran ou pour quitter le plein écran">Plein écran</label> <label id="exit_fullscreen" title="Appuyer sur F11 pour l'affichage plein écran ou pour quitter le plein écran">Quitter plein écran</label> </a>
                      </li>
                  </ul>
              </div><!-- /.navbar-collapse -->
          </nav>
        </aside>

        <!--modal reprise vente-->
          <div class="modal fade bd-example-modal-lg" id="reprise_vente_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header bg-secondary text-white">
                  <div class="row">
                    <div class="col-md-10">
                      <h6 class="modal-title" id="exampleModalLongTitle">Vente en pause</h6>
                    </div>
                    <div class="col-md-2">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>

                </div>
                <div class="modal-body">

                      <table class="bootstrap-data-table table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Référence</th>
                            <th>Date</th>
                            <th>Total (<?php echo $devise; ?>)</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody class="tbody_striped" id="table_pause_vente">
                          <?php

                              $view = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_UE_fact = ? AND caisse_vente = ? AND reprise_vente = ? AND complete_vente = ? ORDER BY reference_caise DESC");
                              $view->execute(array($idUE, 1, 1, 0));

                              $existallvente = $view->rowCount();

                              while($row = $view->fetch()) 
                              {
                          ?>
                              <tr>
                                <td class="text-left"><?php echo $row['num_facture']; ?></td>
                                <td class="text-left"><?php echo $row['date_fact']; ?></td>
                                <td class="text-right"><?php echo number_format($row['montant_facture'], 2, '.', ''); ?></td>
                                <td class="text-center">
                                  <a class="text-primary get_reprise_vente" href="#" id="<?php echo $row['reference_caise']; ?>" >Sélectionner
                                  </a>
                                </td>
                             </tr>
                          <?php
                            }
                          ?>
                        </tbody>
                      </table>


                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
          </div>
          <!--modal reprise vente-->

          <!--modal impression facture vente-->
              <div class="modal fade bd-example-modal-lg" id="print_facture_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLongTitle">Imprimer une facture de vente</h6>
                        </div>
                        <div class="col-md-2">
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>
                      
                         
                    </div>
                    <div class="modal-body">

                          <table class="bootstrap-data-table table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Date et Heure</th>
                                <th>Référence</th>
                                <th>Total (<?php echo $devise; ?>)</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody class="tbody_striped" id="table_print_facture_vente">
                              <?php
                                  $view = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_UE_fact = ? AND caisse_vente = ? AND reprise_vente = ? AND complete_vente = ? ORDER BY reference_caise DESC");
                                  $view->execute(array($idUE, 1, 0, 1));

                                  $existallvente = $view->rowCount();

                                  while($row = $view->fetch()) 
                                  {
                              ?>

                                <tr>
                                  <td class="text-left"><?php echo $row['date_fact']; ?> à <?php echo $row['heure_fact']; ?></td>
                                  <td class="text-left"><?php echo $row['num_facture']; ?></td>
                                  <td class="text-right"><?php echo number_format($row['montant_facture'], 2, '.', ' '); ?></td>
                                  <td class="text-center">
                                        <a class="text-primary" href="facturation_finish.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&idvente=<?php echo $row['id_fact']; ?>" class="btn btn-info btn-sm" target="_blank">Facture
                                      </a>
                                    </td>
                               </tr>
                               <?php
                                  }
                               ?>
                            </tbody>
                          </table>


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--modal impression facture vente-->

              <!--modal impression facture vente-->
              <div class="modal fade bd-example-modal-lg" id="print_ticket_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLongTitle">Imprimer un ticket</h6>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>
                      
                          
                    </div>
                    <div class="modal-body">

                          <table class="bootstrap-data-table table table-striped table-bordered">
                            <thead>
                              <tr class="header">
                                <th>Date et Heure</th>
                                <th>Référence</th>
                                <th>Total (<?php echo $devise; ?>)</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody class="tbody_striped" id="table_print_ticket_vente">
                              <?php

                                  $view = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_UE_fact = ? AND caisse_vente = ? AND reprise_vente = ? AND complete_vente = ? ORDER BY reference_caise DESC");
                                  $view->execute(array($idUE, 1, 0, 1));

                                  while($row = $view->fetch()) 
                                  {
                              ?>
                                  <tr>
                                    <td class="text-left"><?php echo $row['date_fact']; ?> à <?php echo $row['heure_fact']; ?></td>
                                    <td class="text-left"><?php echo $row['num_facture']; ?></td>
                                    <td class="text-right"><?php echo number_format($row['montant_facture'], 2, '.', ' '); ?></td>
                                    <td class="text-center">
                                          <a class="text-primary" href="facture/pdf/ticket_vente.php?idvente=<?php echo $row['id_fact']; ?>&idUE=<?php echo $idUE; ?>&getprenom=<?php echo $getprenom; ?>&devise=<?php echo $devise; ?>" target="_blank">Ticket
                                        </a>
                                    </td>
                                 </tr>
                              <?php
                                }
                              ?>
                            </tbody>
                          </table>


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--modal impression facture vente-->

        <div id="right-panel" class="right-panel">


            <!--debut modale new article-->
              <div class="modal fade bd-example-modal-lg ajouter-article" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" id="modal">
                  
                    <div class="modal-content" id="content-modal">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="title-modal">Ajouter un nouvel article</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                      </div>

                      <div class="modal-body body-modal-article">

                        <div class="card form_card">
                          <div class="card-body">

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="lib_article"><h6>Libellé</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Entrer le libellé ou la désignation de l'article" name="lib_article" id="lib_article" required="">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="code-article"><h6>Code article</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Entrer le code de l'article" name="code-article" id="code-article" required="">
                                  </div>
                                </div>
                              </div>

                              <?php

                                  $reqcatart = $bdd->prepare("SELECT * FROM categorie_article WHERE id_UE_art = ? AND default_cat_art != ?");
                                  $reqcatart->execute(array($idUE, 1));

                                  //pour les articles qui n'ont ^pas des catégories
                                  $reqc = $bdd->prepare("SELECT * FROM categorie_article WHERE id_UE_art = ? AND default_cat_art = ?");
                                  $reqc->execute(array($idUE, 1));
                                  $aucune_cat = $reqc->fetch();
                              ?>

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="code-barre"><h6>Code barre</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Entrer le code barre de l'article" name="code-barre" id="code-barre" required="">
                                  </div>
                                </div>

                                <?php

                                    $reqscatart = $bdd->prepare("SELECT * FROM sous_categorie_article WHERE   id_s_UE_art = ? AND default_s_cat_art != ?");
                                    $reqscatart->execute(array($idUE, 1));

                                    //pour les articles qui n'ont pas de sous catégorie
                                    $reqsc = $bdd->prepare("SELECT * FROM sous_categorie_article WHERE   id_s_UE_art = ? AND default_s_cat_art = ?");
                                    $reqsc->execute(array($idUE, 1));
                                    $aucune_s_cat = $reqsc->fetch();
                                ?>

                                <div class="col-md-6">
                                  <label for="cat_article"><h6>Catégorie</h6></label>
                                  <div class="input-group mb-3">
                                    <select class="custom-select" name="cat_article" id="cat_article">
                                      <option value="<?php echo $aucune_cat['id_cat_art']; ?>" selected="">Sélectionner une catégorie d'articles</option>
                                      <option value="<?php echo $aucune_cat['id_cat_art']; ?>">Aucune</option>
                                      <?php
                                          while($categorie = $reqcatart->fetch()) 
                                          {
                                      ?>
                                      <option value="<?php echo $categorie['id_cat_art']; ?>"><?php echo $categorie['libelle_cat_art']; ?></option>
                                      <?php }?>
                                    </select>
                                    <div class="input-group-append">
                                      <button class="btn btn-info" type="button" id="new_categorie">Nouvelle</button>
                                    </div>
                                  </div>
                                    <!--<label for="sous_cat_article"><h6>Sous-catégorie</h6></label>
                                    <div class="input-group mb-3">
                                      <select class="custom-select" name="sous_cat_article" id="sous_cat_article">
                                        <option value="<?php echo $aucune_s_cat['id_s_cat_art']; ?>" selected="">Sélectionner une sous-catégorie d'articles</option>
                                        <option value="<?php echo $aucune_s_cat['id_s_cat_art']; ?>">Aucune</option>
                                        <?php
                                            while($scategorie = $reqscatart->fetch()) 
                                            {
                                        ?>
                                        <option value="<?php echo $scategorie['id_s_cat_art']; ?>"><?php echo $scategorie['libelle_s_cat_art']; ?></option>
                                        <?php }?>
                                      </select>
                                      <div class="input-group-append">
                                        <button class="btn btn-info" type="button" id="new_sous_categorie">Nouvelle</button>
                                      </div>
                                    </div>-->
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <label for="unite_article"><h6>Unité</h6></label>
                                  <select class="custom-select" id="unite_article" name="unite_article">
                                    <option value="Aucune" selected="">Sélectionner une unité </option>
                                    <option value="Aucune">Aucune</option>
                                    <?php

                                        //On séléctionne tous les unité de mesure dans la base de données
                                        $get_unite = $bdd->prepare('SELECT * FROM unite_mesure ORDER BY symbole ASC');
                                        $get_unite->execute(array());

                                        while($row = $get_unite->fetch())
                                        {
                                    ?>
                                        <option value="<?php echo $row['symbole']; ?> (<?php echo $row['libelle']; ?>)">
                                          <?php echo $row['symbole']; ?> (<?php echo $row['libelle']; ?>) 
                                        </option>

                                    <?php
                                        }
                                    ?>
                                  </select>
                                </div>
                                <div class="col-md-6">
                                  <label for="expiration_article"><h6>Expiration</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control text-right" required="" name="expiration_article" placeholder="0" required="" id="expiration_article">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">Jours</span>
                                    </div>
                                  </div>
                                </div>
                              </div>

                          </div>
                        </div>


                        <form id="modal-form">
                          <div class="card form_card">
                            <div class="card-body">
                              
                              <div class="form-group">
                                <label for="prix_achat_article"><h6>Prix d'achats</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control text-right" placeholder="0.00"  name="prix_achat_article" id="prix_achat_article" value="0">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><?php echo $devise; ?></span>
                                  </div>
                                </div>
                              </div>

                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <label for="prix_ttc"><h6>Prix de vente TTC</h6></label>
                                        <div class="input-group mb-3">
                                          <input name="prix_ttc" type="text" placeholder="0.00" class="form-control text-right" id="prix_ttc" value="0">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><?php echo $devise; ?></span>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <label><h6>&nbsp;</h6></label>
                                        <button type="button" class="btn btn-success btn-block" id="addtva">
                                          <span class="step size-21">
                                            <i class="icon ion-android-add-circle"></i>
                                          </span>
                                            &nbsp;Appliquer la TVA
                                        </button>
                                      </div>
                                  </div>

                                </div>


                                  <!-- cette div est caché tant qu'on pas appyer sur le bouton Appliquer la TVA-->
                                 <div class="row">
                                  <div class="col-md-6 viewtva">
                                    <label for="prix_ht"><h6>Prix de vente HTVA</h6></label>
                                    <div class="input-group mb-3">
                                      <input name="prix_ht" type="text" class="form-control text-right" placeholder="0.00" id="prix_ht" value="">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo $devise; ?></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 viewtva">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label for="taux_tva"><h6>Taux TVA</h6></label>
                                        <div class="input-group mb-3">
                                          <input name="taux_tva" type="text" class="form-control text-right" placeholder="0.00" id="taux_tva" value="0">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">%</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label><h6>&nbsp;</h6></label>
                                        <button type="button" class="btn btn-danger btn-block" id="removetva">Annuler la TVA</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                            </div>
                          </div>
                        </form>


                        <div class="card form_card">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="stock_article"><h6>Stock actuel</h6></label>
                                  <input type="text" class="form-control text-right"  placeholder="0" name="stock_article" required="" id="stock_article">
                                </div>
                              </div>
                              <?php

                                $reqfourn = $bdd->prepare("SELECT * FROM fournis_for_user WHERE idUE_four = ? AND default_four != ?");
                                $reqfourn->execute(array($idUE, 1));

                                //pour les articles qui n'ont pas de fournisseur 
                                $reqf = $bdd->prepare("SELECT * FROM fournis_for_user WHERE idUE_four = ? AND default_four = ?");
                                $reqf->execute(array($idUE, 1));
                                $aucun_four = $reqf->fetch();

                              ?>
                              <div class="col-md-6">
                                <label><h6>Fournisseur</h6></label>
                                <div class="input-group mb-3">
                                  <select class="custom-select" name="fournisseur_article" id="fournisseur_article">
                                    <option value="<?php echo $aucun_four['id_four']; ?>" selected="">Sélectionner un fournisseur</option>
                                    <option value="<?php echo $aucun_four['id_four']; ?>" >Aucun</option>
                                    <?php
                                        while($fournis = $reqfourn->fetch()) 
                                        {
                                    ?>
                                    <option value="<?php echo $fournis['id_four']; ?>"><?php echo $fournis['societe_four']; ?></option>
                                    <?php }?>
                                  </select>
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
                        <button type="submit" class="btn btn-primary" name="saveart" id="saveart">
                            <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Enregistrer
                        </button>
                      </div>

                    </div>

                </div>
              </div>
              <!--fin modale new article-->

              <!--Nouvelle catégorie d'article-->
              <div class="modal fade ajouter-categorie-article" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="myModalLabel">Ajouter une catégorie d'articles</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                            
                      </div>
                      <div class="modal-body" id="body-categorie">
                        <label for="libelleart"><h6>Désignation</h6></label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-inbox.png"></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Entrer le libellé de votre catégorie d'articles" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libelleart" id="libelleart" required="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                            <i class="icon ion-android-cancel"></i>
                          </span>
                          &nbsp;&nbsp;Annuler</button>
                        <button type="submit" class="btn btn-primary" name="addcatser" id="addcatart"> 
                          <span class="step size-21">
                            <i class="icon ion-archive"></i>
                          </span>
                          &nbsp;&nbsp;Enregistrer</button>
                      </div>
                    </div>
                  
                </div>
              </div>
              <!--Nouvelle catégorie d'article-->

              <!--Nouvelle sous-catégirie-->
              <div class="modal fade ajouter-sous-categorie-article" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="myModalLabel">Ajouter une sous-catégorie d'articles</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                        </div>
                        
                        
                      </div>
                      <div class="modal-body">
                        <label for="libelleartsous"><h6>Désignation</h6></label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-inbox.png"></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Entrer le libellé de votre sous-catégorie d'articles" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libelleartsous" id="libelleartsous" required="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                            <i class="icon ion-android-cancel"></i>
                          </span>
                          &nbsp;&nbsp;Annuler</button>
                        <button type="submit" class="btn btn-primary" name="addcatartsous" id="addcatartsous"> 
                          <span class="step size-21">
                            <i class="icon ion-archive"></i>
                          </span>
                          &nbsp;&nbsp;Enregistrer</button>
                      </div>
                    </div>
                  
                </div>
              </div>
              <!--Nouvelle sous-catégirie-->


               <!--les modales-->
              <!--debut modale new client-->
              <div class="modal fade bd-example-modal-lg" id="ajouter-client" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10"><h6 class="modal-title" id="exampleModalLabel">Ajouter un nouveau client</h6></div>
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
                                  <div class="form-group">
                                    <label for="fidelitecard"><h6>Carte de fidélité</h6></label>
                                    <div class="input-group mb-3">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/card.png"></span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="N° de la carte de fidélité du client"  name="fidelitecard" id="fidelitecard">
                                    </div>
                                  </div>
                                </div>
                              </div>

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="prenomcli"><h6>Prénom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le prénom du client" name="prenomcli" id="prenomcli">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <label for="nomcli"><h6>Nom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le nom du client" name="nomcli" id="nomcli">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="soccli"><h6>Nom Entreprise</h6></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/briefcase.png"></span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'entreprise du client" name="soccli" id="soccli">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                  <label for="tvacli"><h6>N° Entreprise ou TVA</h6></label>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/checkmark-circled.png"></span>
                                      </div>
                                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro d'entreprise du client" name="tvacli" id="tvacli">
                                  </div>
                                </div>
                                </div>
                              </div>

                          </div>
                        </div>

                        

                          <div class="card form_card">
                            <div class="card-body">

                                 <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="adresscli"><h6>Adresse :</h6></label>
                                      <textarea class="form-control" id="adresscli" rows="2" placeholder="Adresse du client ou de son entreprise" name="adresscli" required=""></textarea>
                                    </div> 
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="telcli"><h6>Téléphone</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-call.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro téléphone du client" name="telcli" id="telcli">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="postalecli"><h6>Code postale</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale du client" name="postalecli" id="postalecli">
                                      </div>
                                    </div>
                                  </div>

                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="villecli"><h6>Ville</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville du client ou de l'entreprise" name="villecli" id="villecli">
                                      </div>
                                    </div>    
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="depcli"><h6>Département / Etat / Province</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-system-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le département de la société du client"  name="depcli" id="depcli" >
                                      </div>
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="payscli"><h6>Pays</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                                          </div>
                                          <select class="custom-select" name="payscli" id="payscli">
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

                                  <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="emailcli"><h6>Adresse email</h6></label>
                                  <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                                      </div>
                                      <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'email du client"  name="emailcli" id="emailcli">
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
                        <button type="submit" class="btn btn-primary" name="savecli" id="savecli">
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

               <!-- Modal ticket -->
              <div class="modal fade" id="print_ticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLongTitle">Imprimer ticket</h6>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>
                      
                          
                    </div>
                    <div class="modal-body ticket-body" id="tiket_detail">
                     
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      <button type="button" class="btn btn-primary" id="print-ticket-vente">Imprimer</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal ticket -->

              <!--fond de caisse-->
              <div class="modal fade" id="fond-caisse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLabel">Ajouter ou augmenter le fond de caisse</h6>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>
                      
                        
                    </div>
                    <div class="modal-body">
                      <label for="lib-fond-caisse"><h6>Désignation</h6></label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/clipboard.png"></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Désignation de l'encaissement" name="lib-fond-caisse" id="lib-fond-caisse">
                      </div>

                      <label for="montant-fond-caisse"><h6>Montant</h6></label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/cash.png"></span>
                          </div>
                          <input type="text" class="form-control text-right" placeholder="0.00" name="montant-fond-caisse" id="montant-fond-caisse">
                          <div class="input-group-append">
                              <span class="input-group-text" id="inputGroup-sizing-default"><?php echo $devise; ?></span>
                          </div>
                      </div>


                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                      <button type="button" class="btn btn-primary" id="save-fond-caisse">Enregistrer</button>
                    </div>
                  </div>
                </div>
              </div>
            
            <!--on inlus la la barre de navigation au dessus-->
            <?php  include('navbar.php'); ?>


            <!-- Breadcrumbs-->
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-md-3">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Caisse enregistreuse</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="p-3 mb-2 bg-white text-dark">
                              <div class="row">
                                <div class="col-md-2">
                                  <button role="button" class="btn btn-primary btn-block" id="show-fond-caisse">
                                    <span class="step size-21">
                                      <i class="icon ion-social-usd"></i>
                                    </span>
                                    &nbsp;&nbsp;Encaisser
                                  </button>
                                </div>
                                <div class="col-md-3">
                                  <button type="button" class="btn btn-primary btn-block" id="print_facture">Imprimer Facture&nbsp;&nbsp;
                                    <span class="step size-21">
                                      <i class="icon ion-ios-printer"></i>
                                    </span>
                                  </button>
                                </div>
                                <div class="col-md-3">
                                  <button type="button" class="btn btn-primary btn-block" id="print_ticket_up">Imprimer Ticket&nbsp;&nbsp;
                                    <span class="step size-21">
                                      <i class="icon ion-android-print"></i>
                                    </span>
                                  </button>
                                </div>
                                <div class="col-md-3">
                                  <a role="button" class="btn btn-danger btn-block" href="caisse.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Fermer&nbsp;&nbsp;
                                    <span class="step size-21">
                                      <i class="icon ion-android-cancel"></i>
                                    </span>
                                  </a>
                                </div>
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
                  <div class="card-body">
                    <?php

                      $getclient = $bdd->prepare("SELECT * FROM client_for_user WHERE id_UE_cli = ? AND default_cli != 1");
                      $getclient->execute(array($idUE));

                      //$fetchClient = $getclient->fetch();

                      $get_default_client = $bdd->prepare("SELECT * FROM client_for_user WHERE id_UE_cli = ? AND default_cli = 1");
                      $get_default_client->execute(array($idUE));
                      $fetch_default_client = $get_default_client->fetch();

                    ?>
                    

                    <div class="row">
                      <div class="col-md-6">

                        <div class="row">
                          <div class="col-md-6">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                              </div>
                              <select class="custom-select" id="id-client">
                                <option selected value="<?php echo $fetch_default_client['id_cli']; ?>">Client <?php echo $fetch_default_client['prenom_cli']; ?> </option>
                                <?php
                                    while($rowd = $getclient->fetch())
                                    {
                                ?>
                                  <option value="<?php echo $rowd['id_cli']; ?>"><?php echo $rowd['prenom_cli'].' '.$rowd['nom_cli'].' ('.$rowd['societe_cli'].')'; ?></option>
                                <?php
                                    }
                                ?>
                              </select>
                              <!--<div class="input-group mb-3">
                                <input name="lib_article" type="text" class="form-control" value="<?php echo $fetchClient['prenom_cli']; echo " "; echo $fetchClient['nom_cli']; ?>" disabled="">
                              </div>-->
                            </div>
                          </div>

                          <div class="col-md-6">
                            <?php
                                  //on vérifie pour le menu contact
                                  if($fetch_user['client'] == 0)
                                  {
                              ?>
                                  <button type="button" class="btn btn-success btn-block" id="new-client" title="Ajouter un client">
                                      <span class="step size-21">
                                          <i class="icon ion-person-add"></i>
                                      </span>
                                        &nbsp;&nbsp;Nouveau client
                                  </button>
                              <?php
                                  }
                              ?>
                              <!--<div class="input-group mb-3">
                                <input name="lib_article" type="text" class="form-control" value="<?php echo $fetchClient['societe_cli']; ?>" disabled="">
                              </div>-->
                          </div>

                        </div>

                        <table class="table table_facture" id="table_facture">
                          <thead class="bg-secondary text-white border">
                            <tr>
                              <th title="Code article">N°</th>
                              <th>Désignation</th>
                              <th class="text-center">Quantité</th>
                              <th class="text-right">PU</th>
                              <th class="text-right">Total</th>
                            </tr>
                          </thead>
                          <tbody class="tbody_striped tbody_fac border" id="tbody_fac"> 
                            

                          </tbody>
                        </table>

                        <div class="card bg-secondary text-white">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-5">
                                <div class="input-group mb-3">
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend" title="Quantité">
                                      <span class="input-group-text" id="basic-addon1">Qté</span>
                                    </div>
                                    <input name="qte" id="qte" type="text" class="form-control text-center" placeholder="0">
                                    <div class="input-group-append">
                                      <button class="btn btn-info" type="submit" title="Diminuer la quantité" name="remove_qt" id="remove_qt">
                                        <span class="step size-21">
                                          <i class="icon ion-android-remove"></i>
                                        </span>&nbsp;&nbsp;
                                      </button>
                                      <button class="btn btn-success" type="submit" title="Augmenter la quantité" name="add_qt" id="add_qt">
                                        <span class="step size-21">
                                          <i class="icon ion-android-add"></i>
                                        </span>&nbsp;&nbsp;
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-2">
                                <div class="input-group mb-3">
                                  &nbsp;&nbsp;
                                  <button type="submit" class="btn btn-danger" title="Supprimer un élément" name="delete_art" id="delete_art">
                                    <span class="step size-21">
                                        <i class="icon ion-android-delete"></i>
                                    </span>
                                    &nbsp;&nbsp;
                                  </button>
                                </div>
                              </div>

                              <div class="col-md-5">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Total TTC</span>
                                  </div>
                                  <input type="text" class="form-control text-right" aria-label="Username" aria-describedby="basic-addon1" id="total_ttc" disabled="">
                                </div>
                              </div>
                            </div>

                            <div class="row">
                             <div class="col-md-7">
                              <h5>&nbsp;</h5>
                               <div class="input-group mb-3">
                                    <input name="code_art" id="code_art" type="text" class="form-control" placeholder="Numéro article" readonly="">

                                    <input name="lib_art" id="lib_art" type="text" class="form-control" placeholder="Libellé" readonly="">
                                  </div>
                             </div>
                             <div class="col-md-5">
                              <h5 class="text-right">A payer : </h5>
                              <div class="input-group mb-3">
                                <input type="number" class="form-control text-right" name="Apayer" id="Apayer" step="0.01" readonly="">

                               <div class="input-group-append click-search">
                                  <span class="input-group-text" id="devise_Apayer">
                                    <?php echo $devise; ?>
                                  </span>
                                </div>
                              </div>
                             </div>
                           </div>
                          </div>
                        </div>

                        <div class="card bg-secondary text-white">
                          <div class="card-body">
                            <div class="row">
                            <div class="col-md-6">
                              <form class="myForm">
                                <div class="form-group">
                                     <label for="remise"><h6>Remise : </h6></label>&nbsp;&nbsp;
                                     <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input devise" checked="true" >
                                        <label class="custom-control-label" for="customRadioInline1" id="devise_remise"><?php echo $devise; ?></label>
                                      </div>
                                      <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input pourcentage">
                                        <label class="custom-control-label" for="customRadioInline2" id="pourc_devise">%</label>
                                      </div>
                                     <div class="input-group mb-3">
                                      <input type="text" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="remise" id="remise" min="1" value="" step="0.01">

                                      <!--<input type="text" class="form-control text-right" aria-label="Recipient's username" aria-describedby="basic-addon2" name="remise" value="<?php echo $devise; ?>" id="remise_devise" readonly="">-->

                                      <div class="input-group-append">
                                          <span class="input-group-text" id="remise_devise">
                                            <?php echo $devise; ?>
                                          </span>
                                        </div>
                                        <!--<div class="input-group-prepend">
                                          <span class="input-group-text" id="legende_device_pour">FC</span>
                                        </div>-->
                                      </div>
                                </div>
                                <br>
                              </form>
                                    
                            </div>
                            <div class="col-md-6">
                              <label><h6>&nbsp;</h6></label>
                              <button type="button" class="btn btn-success btn-block" id="paiement">Paiement</button>
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">

                        <div class="row">
                          <div class="col-md-8">
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="mode-recherche">Désignation</button>
                                <div class="dropdown-menu">
                                  <a class="dropdown-item" href="#" id="designation">Désignation</a>
                                  <a class="dropdown-item" href="#" id="code">Code article</a>
                                  <!--<a class="dropdown-item" href="#" id="code-barres">Code barre</a>--->
                                </div>
                              </div>
                              <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Rechercher un article" id="recherche">
                            </div>

                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Code barre</span>
                              </div>
                              <input type="text" class="form-control" placeholder="Ex : 4587542547854" autofocus="" id="barre-code">
                            </div>
                          </div>

                          <div class="col-md-4">
                            <?php
                                  //on vérifie pour le menu contact
                                  if($fetch_user['article'] == 0)
                                  {
                              ?>
                                  <button type="button" class="btn btn-success btn-block" id="new-article">
                                     <span class="step size-21">
                                        <i class="icon ion-ios-filing-outline"></i>
                                     </span>
                                      &nbsp;&nbsp;Nouvel article
                                  </button>
                              <?php
                                  }
                              ?>
                              <!--<div class="input-group mb-3">
                                <input name="lib_article" type="text" class="form-control" value="<?php echo $fetchClient['societe_cli']; ?>" disabled="">
                              </div>-->
                          </div>

                        </div>

                        <div class="card">
                          <div class="modal-header bg-secondary text-white">
                            <div class="row">
                              <div class="col-md-9"><b id="titre-article">Catégorie d'articles</b></div>
                              <div class="col-md-3 float-right">
                                <button type="button" class="btn btn-info btn-block" id="back">Retour</button>
                              </div>
                            </div>
                          </div>
                          <div class="card-body scrollfact" id="view_article">
                            
                          </div>
                        </div>

                        <!--<div class="scrollfact p-3 mb-2" id="view_article">
                            --<div id="aff_articla">
                              <div class="row" id="view_article">

                              </div>
                            </div>-->
                            <!--Fin aff_articla
                        </div>-->
                      </div>
                    </div>

                  </div>
                </div>

              </div>
              <!-- Animated -->


            </div>

            <!--les modales-->
              

            <!-- Modal clavier remise-->
              <div class="modal fade bd-example-modal-sm" id="clavier_remise" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header bg-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLabel">Remise</h6>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="modal-body">
                      <input type="text" class="form-control text-right" id="display_remise" name="" placeholder="0.00">
                      <br>
                      <table id="rm">
                        <tr>
                          <td>
                            <button class="btn btn-block btn-orange text-white calc_rm" value="7"><strong>7</strong></button>
                          </td>
                          <td>
                            <button class="btn btn-block btn-orange text-white calc_rm" value="8"><strong>8</strong></button>
                          </td>
                          <td>
                            <button class="btn btn-block btn-orange text-white calc_rm" value="9"><strong>9</strong></button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <button class="btn btn-block btn-orange text-white calc_rm" value="4"><strong>4</strong></button>
                          </td>
                          <td>
                            <button class="btn btn-block btn-orange text-white calc_rm" value="5"><strong>5</strong></button>
                          </td>
                          <td>
                            <button class="btn btn-block btn-orange text-white calc_rm" value="6"><strong>6</strong></button>
                          </td>
                        </tr>
                         <tr>
                          <td>
                            <button class="btn btn-block btn-orange text-white calc_rm" value="1"><strong>1</strong></button>
                          </td>
                          <td>
                            <button class="btn btn-block btn-orange text-white calc_rm" value="2"><strong>2</strong></button>
                          </td>
                          <td>
                            <button class="btn btn-block btn-orange text-white calc_rm" value="3"><strong>3</strong></button>
                          </td>
                        </tr>
                         <tr>
                          <td>
                            <button class="btn btn-block btn-orange text-white calc_rm" value="0"><strong>0&nbsp;</strong></button>
                          </td>
                          <td>
                            <button class="btn btn-block btn-orange text-white calc_rm" value="."><strong>&nbsp;.&nbsp;</strong></button>
                          </td>
                          <td>
                            <button class="btn btn-block btn-danger text-white calc_rm" id="del_rm">&larr;
                            </button>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                      <button type="button" class="btn btn-success" id="valid_remise">Valider</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal clavier remise-->

              <!--Paiement vente-->
              <div class="modal fade bd-example-modal-lg" id="get-paiement" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bg-secondary text-white">
                        <div class="row">
                          <div class="col-md-10">
                             <h6 class="modal-title " id="exampleModalLongTitle">Paiement</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                       
                            
                      </div>
                      <div class="modal-body bg-light">
                        <div class="card bg-secondary text-white">
                          <div class="card-body">
                            <div class="row">
                              <div class="col-md-4">
                                <label for="Apyer2"><h6>A payer</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="Apayer2" id="Apayer2" readonly="">
                                  <div class="input-group-append">
                                      <span class="input-group-text" id="remise_devise">
                                        <?php echo $devise; ?>
                                      </span>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <label for="reste"><h6>Reste</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="reste" id="reste" readonly="">
                                  <div class="input-group-append">
                                      <span class="input-group-text" id="remise_devise">
                                        <?php echo $devise; ?>
                                      </span>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <label for="rembours"><h6>A rembouser</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="rembours" id="rembours" readonly="">
                                  <div class="input-group-append">
                                      <span class="input-group-text" id="remise_devise">
                                        <?php echo $devise; ?>
                                      </span>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="mode-paiement" name="customRadioInline1" class="custom-control-input" checked="true">
                          <label class="custom-control-label" for="mode-paiement"><b>Mode de paiement</b></label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="dette" name="customRadioInline1" class="custom-control-input">
                          <label class="custom-control-label" for="dette"><b>Dette</b></label>
                        </div>
                        <br><br>
                        <div class="row">
                          <div class="col-md-7">
                            <div class="card bg-secondary text-white" id="zone-mode-paiement">
                                <div class="card-body" id="zone-paiement">

                                  <label for="id_mpaie"><h6>Mode de paiement</h6></label>
                                  <div class="input-group mb-3">
                                    <select class="custom-select" id="id_mpaie">
                                      <option value="<?php echo $fechtdef['id_cmp']; ?>" selected=""><?php echo $fechtdef['lib_cmp']; ?> (<?php echo $fechtdef['devise_cmp']; ?>)</option>
                                      <?php

                                        $viewcmp = $bdd->prepare("SELECT * FROM compte_financier WHERE id_UE_cmp = ? AND default_cmp != 1");
                                        $viewcmp->execute(array($idUE));

                                        while($row = $viewcmp->fetch()) 
                                        {

                                      ?>
                                        <option value="<?php echo $row['id_cmp']; ?>"><?php echo $row['lib_cmp']; ?> (<?php echo $row['devise_cmp']; ?>)</option>
                                      <?php
                                        }
                                      ?>
                                    </select>
                                  </div>

                                  <label for="num_cmp_cli"><h6>Numéro de compte du client</h6></label>
                                  <div class="input-group mb-3">
                                    <input type="text" class="form-control" aria-label="Recipient's username" aria-describedby="basic-addon2" name="num_cmp_cli" id="num_cmp_cli" placeholder="Saisir le numéro de compte du client">
                                  </div>

                                </div>

                                <?php

                                    //on recupère la date d'aujourd'hui
                                    setlocale(LC_TIME, 'fra_fra');
                                    $date = date("Y-m-d");
                                    $heure = date("H:i:s");
                                ?>

                                <div class="card-body" id="zone-dette">

                                  <label for="date_echeance"><h6>Date Echéance</h6></label>
                                  <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                    </div>
                                    <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date_echeance" value="<?php echo $date; ?>">
                                  </div>
                                </div>
                              </div>

                            <div class="card bg-secondary text-white">
                              <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                      <label for="autre_devise"><h6>Dévise</h6></label>
                                        <?php
                                          $getotherdevise = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise != 1");
                                          $getotherdevise->execute(array($idUE));

                                          $getdefaultdevise = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ? AND defaut_devise = 1");
                                          $getdefaultdevise->execute(array($idUE));
                                          $defautl_devise = $getdefaultdevise->fetch();

                                        ?>
                                        <select class="custom-select" id="autre_devise">
                                          <option selected value="<?php echo $defautl_devise['id_dev']; ?>"><?php echo $defautl_devise['devise_dev']; ?></option>
                                          <?php
                                            while($row = $getotherdevise->fetch())
                                            {
                                          ?>
                                          <option value="<?php echo $row['id_dev']; ?>"><?php echo $row['devise_dev']; ?></option>
                                          <?php
                                            }
                                          ?>
                                        </select>
                                    </div>
                                    <?php

                                      $getdefautcmp = $bdd->prepare('SELECT * FROM compte_financier WHERE default_cmp = 1 AND id_UE_cmp = ?');
                                      $getdefautcmp->execute(array($idUE));

                                      $infocmp = $getdefautcmp->fetch();
                                      $defaulcmp = $infocmp['id_cmp'];

                                    ?>
                                    <div class="col-md-7">
                                      <label for="cash"><h6 class="text-secondary" id="id_mpaie"><?php echo $defaulcmp; ?></h6></label>
                                          <button type="button" class="btn btn-info btn-block" id="cash" title="Ecrire montant exacte à payer">Montant exact
                                          </button>
                                  </div>
                                </div>
                                <br>
                            <label for="Montpaye"><h6>Montant payé <strong id="tab-dette-id" class="text-secondary">0</strong></h6></label>
                            <div class="input-group mb-3">
                              <input type="text" class="form-control text-right" placeholder="0.00" name="Montpaye" id="Montpaye" step="0.01" required="">


                              <div class="input-group-append">
                                <span class="input-group-text" id="devise_paie">
                                  <?php echo $devise; ?>
                                </span>
                              </div>
                            </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <div class="card form_card border">
                              <div class="card-content">
                                <div class="card-body">
                                  <table id="calc">
                                    <tr>
                                      <td>
                                        <button class="btn btn-block btn-orange text-white calc_btn" value="7"><strong>7</strong></button>
                                      </td>
                                      <td>
                                        <button class="btn btn-block btn-orange text-white calc_btn" value="8"><strong>8</strong></button>
                                      </td>
                                      <td>
                                        <button class="btn btn-block btn-orange text-white calc_btn" value="9"><strong>9</strong></button>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <button class="btn btn-block btn-orange text-white calc_btn" value="4"><strong>4</strong></button>
                                      </td>
                                      <td>
                                        <button class="btn btn-block btn-orange text-white calc_btn" value="5"><strong>5</strong></button>
                                      </td>
                                      <td>
                                        <button class="btn btn-block btn-orange text-white calc_btn" value="6"><strong>6</strong></button>
                                      </td>
                                    </tr>
                                     <tr>
                                      <td>
                                        <button class="btn btn-block btn-orange text-white calc_btn" value="1"><strong>1</strong></button>
                                      </td>
                                      <td>
                                        <button class="btn btn-block btn-orange text-white calc_btn" value="2"><strong>2</strong></button>
                                      </td>
                                      <td>
                                        <button class="btn btn-block btn-orange text-white calc_btn" value="3"><strong>3</strong></button>
                                      </td>
                                    </tr>
                                     <tr>
                                      <td>
                                        <button class="btn btn-block btn-orange text-white calc_btn" value="0"><strong>0&nbsp;</strong></button>
                                      </td>
                                      <td>
                                        <button class="btn btn-block btn-orange text-white calc_btn" value="."><strong>&nbsp;.&nbsp;</strong></button>
                                      </td>
                                      <td>
                                        <button class="btn btn-block btn-danger text-white calc_btn" id="del_btn">&larr;
                                        </button>
                                      </td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>

                        
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="button" class="btn btn-success" name='payer' id="payer">Payer</button>
                      </div>
                  </div>
                </div>
              </div>
              <!--Paiement vente-->

             

              


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
        <!--<script src="assets/js/bootstrap.min.js"></script>-->
        <script src="assets/js/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>


        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/lib/calendar/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>


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

        <!--code barre-->
        <script type="text/javascript" src="Scanner_detection_barre_code/jquery.scannerdetection.js"></script>

        <script type="text/javascript">

          jQuery(document).ready(function($) 
          {

            affiche_designation();
             //setInterval(affiche_designation, 2500);
            //cette méthode nous permet l'affichage des articles et services dans la facture lorsqu'on inser

            function affiche_designation()
            {
              var idvente = '<?php echo $idvente; ?>';
              $.post('fonction/recup_facture_vente_caisse.php', {idvente:idvente}, function(data)
              {
                $('#tbody_fac').html(data);
              });
            }

            calcul_tota_ttc();
            //setInterval(calcul_tota_ttc, 500);
            //ici nous calculons instatanement la somme du prix TTC de la facture
            function calcul_tota_ttc()
            {
              var idvente = '<?php echo $idvente; ?>';
              $.post('fonction/calcul_total_ttc.php', {idvente:idvente}, function(data)
              {
                $('#total_ttc').val(data);
                $('#Apayer').val(data);
                //$('#Apayer').attr("placeholder", data);
                //$('#Apayer').text(data);
                //$('#Apayer2').attr("placeholder", data);
                $('#Apayer2').val(data);
              });
            }

            //changement de mode de recherche
            $('#code').click(function()
              {
                $('#mode-recherche').text('Code article');
              });

            $('#designation').click(function()
              {
                $('#mode-recherche').text('Désignation');
              });

            $('#code-barres').click(function()
              {
                $('#mode-recherche').text('Code barre');
              });





             affiche_article();

              function affiche_article()
              {
                var idUE = '<?php echo $idUE; ?>'; 
                //var num_vente = $('#num_vente').text();
                var idvente = '<?php echo $idvente; ?>'; 

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/affiche_famille_article_caisse.php',
                  data : 'idUE=' + idUE  + '&idvente=' + idvente,
                  success:function(data)
                  {
                    $('#view_article').html(data);
                    //alert(condition);
                  } 
                });
              }


              //rechercher un article
              $('#recherche').keyup(function()
                {
                  var recherche = $('#recherche').val();
                  var idUE = '<?php echo $idUE; ?>';
                  var idvente = '<?php echo $idvente; ?>';
                  var mode_recherche = $('#mode-recherche').text();

                  //alert(mode_recherche);

                  if(recherche == '')
                  {
                    affiche_article();
                    $('#titre-article').text("Catégorie d'articles");
                  }
                  else
                  {
                    $.ajax({
                      type : 'POST', 
                      url  : 'fonction/rechercher_article_caisse_enregistreuse.php',
                      data : 'idUE=' + idUE  + '&idvente=' + idvente + '&recherche=' + recherche + '&mode_recherche=' + mode_recherche,
                      success:function(data)
                      {
                        $('#view_article').html(data);
                        $('#titre-article').text('Articles');
                        //alert(condition);


                      } 
                    });
                  }  
                });


              //recherche code barre
              /*$('#barre-code').keypress(function()
                {
                  var code_barre = $('#barre-code').val();
                  var idUE = '<?php echo $idUE; ?>';
                  var idvente = '<?php echo $idvente; ?>';

                  $.ajax(
                    {
                      type  : 'POST', 
                      url   : 'fonction/get_id_article_by_code_barre.php',
                      data  : 'code_barre=' + code_barre + '&idUE=' + idUE,
                      success:function(data)
                      {
                        var id_art = data; 

                        if(id_art != '' || id_art != 0)
                        {
                          $.ajax(
                          {
                              type  : 'POST',
                              url   : 'fonction/select_article_caisse.php',
                              data  : 'id_art=' + id_art + '&num_vente=' + idvente,
                              success:function(data)
                              {
                                //alert(data);
                                if(data == 1)
                                {
                                  err3("Le stock de cet article est épuisé !");
                                }
                                else
                                {
                                  valid3('Article inséré avec succès');
                                  affiche_designation();
                                  calcul_tota_ttc();
                                }

                                $('#barre-code').val('');
                              }
                          });
                        }  
                      } 
                    });
                });*/


                $(document).scannerDetection({
                  timeBeforeScanTest: 200, // wait for the next character for upto 200ms
                  startChar: [120], // Prefix character for the cabled scanner (OPL6845R)
                  endChar: [13], // be sure the scan is complete if key 13 (enter) is detected
                  avgTimeByChar: 40, // it's not a barcode if a character takes longer than 40ms
                  onComplete: function(barcode, qty){ 

                    var idUE = '<?php echo $idUE; ?>';
                    var idvente = '<?php echo $idvente; ?>';

                    $('#barre-code').val('');
                    $('#barre-code').val(barcode);

                    $.ajax(
                    {
                      type  : 'POST', 
                      url   : 'fonction/get_id_article_by_code_barre.php',
                      data  : 'code_barre=' + barcode + '&idUE=' + idUE,
                      success:function(data)
                      {
                        var id_art = data; 

                        if(id_art != '' || id_art != 0)
                        {
                          $.ajax(
                          {
                              type  : 'POST',
                              url   : 'fonction/select_article_caisse.php',
                              data  : 'id_art=' + id_art + '&num_vente=' + idvente,
                              success:function(data)
                              {
                                //alert(data);
                                if(data == 1)
                                {
                                  err3("Le stock de cet article est épuisé !");
                                }
                                else
                                {
                                  valid3('Article inséré avec succès');
                                  affiche_designation();
                                  calcul_tota_ttc();
                                }

                                
                              }
                          });
                        }
                        else
                        {
                          err3("Ce code barre ne correspond à aucun article !");
                        }  
                      } 
                    });
                  } // main callback function 
                });

                $('#show-fond-caisse').click(function()
                  {
                    $('#fond-caisse').modal('show');
                  });

                //enregistrer un encaissement ou un fon de caisse
              $('#save-fond-caisse').click(function()
                {
                  var designation = $('#lib-fond-caisse').val();
                  var montant = $('#montant-fond-caisse').val();
                  //var id_cmp = '<?php //echo $id_cmp; ?>';
                  var devise = '<?php echo $devise; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var getid = '<?php echo $getid; ?>';

                  if(designation != '')
                  {
                    if(/^[0-9]+[.][0-9]+/.test(montant) || montant != '')
                    {
                      $.ajax(
                        {
                          type  : 'POST', 
                          url   : 'fonction/save_fond_caisse_enregistreuse.php',
                          data  : 'designation=' + designation + '&montant=' + montant +
                                  '&devise=' + devise + '&idUE=' + idUE + '&getid=' + getid, 
                          success:function(data)
                          {

                            valid3("Encaissement enregistré avec succès !");
                            $('#fond-caisse').modal('hide');

                            $('#lib-fond-caisse').val('');
                            $('#montant-fond-caisse').val('');
                            $('#montant-fond-caisse').removeClass('is-invalid');
                            $('#lib-fond-caisse').removeClass('is-invalid');

                            /*setTimeout(function()
                              {
                                window.location.reload();
                              }, 5000);
                              affiche_detail();*/
                          }
                        });
                    }
                    else
                    {
                      err3("Veuillez saisir le montant S.V.P!");
                      $('#montant-fond-caisse').addClass('is-invalid');
                    }
                  }
                  else
                  {
                    err3("Veuillez saisir la désignation S.V.P!");
                    $('#lib-fond-caisse').addClass('is-invalid');
                  }

                });





              select_facture();
              setInterval(select_facture, 1000);
                //on séléction les éléments de la facture pour mettre dans l'input
              function select_facture()
              {
                var table_facture = document.getElementById("table_facture"), rIndex;

                for(var i = 1; i < table_facture.rows.length; i++)
                {
                  table_facture.rows[i].onclick = function()
                  {
                    rIndex = this.rowsIndex;
                    document.getElementById("code_art").value = this.cells[0].innerHTML;
                    document.getElementById("lib_art").value = this.cells[1].innerHTML;
                    document.getElementById("qte").value = parseInt(this.cells[2].innerHTML);
                  }
                }
              }

              //on augemente la quantité de l'article avec le bouton add
              $('#add_qt').click(function()
              {
                  var code_designation = $('#code_art').val();
                  var designation = $('#lib_art').val();
                  //var quantite = $('#qt_article').val();
                  var idvente = '<?php echo $idvente; ?>';
                  var quantite = $('#qte').val();

                 

                  if(code_designation != '' && designation != '')
                  {

                    $.ajax({
                      type: "POST",
                      url: "fonction/add_quantite_facture_caisse.php",
                      data: "code_designation=" + code_designation + "&designation=" + designation + "&idvente=" + idvente,
                      success:function(data)
                      {
                        //alert(data);
                        //$('#qt_article').val(data);
                        if(data == 1)
                        {
                          err3("Le stock de cet article est épuisé !");
                        }
                        else
                        {
                          $('#remise').val('');
                          affiche_designation();
                          calcul_tota_ttc();

                          //on augmente la quantité dans l'input
                          var sum_qte = parseInt(quantite) + 1;
                          $('#qte').val(sum_qte);
                        }
                        
                      }
                    });
                  }
                  else
                  {
                    err3("Veuillez d'abord sélectionner un article ou un service S.V.P !");
                  }

              });


              //on diminue la quantité de l'article avec le bouton remove
              $('#remove_qt').click(function()
              {
                  var code_designation = $('#code_art').val();
                  var designation = $('#lib_art').val();
                  var idvente = '<?php echo $idvente; ?>';
                  var quantite = $('#qte').val();

                  if(code_designation != '' && designation != '')
                  {
                    $.ajax({
                      type: "POST",
                      url: "fonction/remove_quantite_facture_caisse.php",
                      data: "code_designation=" + code_designation + "&designation=" + designation + "&idvente=" + idvente,
                      success:function(data)
                      {
                        if(data == 1)
                        {
                          err3("Vous ne pouvez plus diminuer la quantité !");
                        }
                        else
                        {
                          //$('#qt_article').val(data);
                          $('#remise').val('');
                          affiche_designation();
                          calcul_tota_ttc();

                          //on diminue la quantité dans l'input
                          var sum_qte = parseInt(quantite) - 1;
                          $('#qte').val(sum_qte);

                        }
                      }
                    });
                  }
                  else
                  {
                    err3("Veuillez d'abord sélectionner un article ou un service S.V.P !");
                  }

              });


             //ici on supprime un élément dans la facture
              $('#delete_art').click(function()
              {
                  var code_designation = $('#code_art').val();
                  var designation = $('#lib_art').val();
                  var idvente = '<?php echo $idvente; ?>';

                  if(code_designation != '' && designation != '')
                  {
                    $.ajax({
                      type: "POST",
                      url: "fonction/delete_element_facture_caisse.php",
                      data: "code_designation=" + code_designation + "&designation=" + designation + "&idvente=" + idvente,
                      success:function(data)
                      {
                        $('#code_art').val('');
                        $('#lib_art').val('');
                        $('#qt_article').val('');
                        $('#remise').val('');
                        $('#qte').val('');
                        affiche_designation();
                        calcul_tota_ttc();
                      }
                    });
                  }
                  else
                  {
                    err3("Veuillez d'abord sélectionner un article ou un service S.V.P !");
                  }
              });


              //lorsqu'on augmente la quantité à la main
              $('#qte').keyup(function()
                {
                  var code_designation = $('#code_art').val();
                  var designation = $('#lib_art').val();
                  var idvente = '<?php echo $idvente; ?>';
                  var quantite = $('#qte').val();

                  if(code_designation != '' && designation != '')
                  {
                    if(quantite != '')
                    {
                      if(/^[1-9]/.test(quantite))
                      {
                        $.ajax({
                          type: "POST",
                          url: "fonction/modified_quantite_facture_caisse.php",
                          data: "code_designation=" + code_designation + "&designation=" + designation + "&idvente=" + idvente + '&quantite=' + quantite,
                          success:function(data)
                          {
                            //alert(data);
                            if(data == 1)
                            {
                              err3("Vous ne pouvez plus modifier la quantité. Le stock est épuisé !");
                            }
                            else
                            {
                              //$('#qt_article').val(data);
                              $('#remise').val('');
                              affiche_designation();
                              calcul_tota_ttc();

                            }
                          }
                        });
                      }
                      else
                      {
                        err3("La quantité saisie est incorrecte !");
                      }
                    }
                  }
                  else
                  {
                    err3("Veuillez d'abord sélectionner un article ou un service S.V.P !");
                  }

                });



              //lorsqu'on click sur le radio ou le label du radio % on change directement la légende à côte de l'input
              $('#pourc_devise').click(function()
                {
                  var remise = $('#remise').val();

                  $('#remise_devise').html('%');
                  calcul_remise(remise);
                });

              //idem pour la dévise
              $('#devise_remise').click(function()
                {
                  var remise = $('#remise').val();

                  var devise_remise = '<?php echo $devise; ?>';

                  $('#remise_devise').html(devise_remise);
                  calcul_remise(remise);
                });

              //lorsqu'on clique sur l'input remise pour afficher le clavier de la remise
              $('#remise').click(function()
                {
                  $('#clavier_remise').modal('show');
                });

              $('#del_rm').click(function()
              {

                $('#display_remise').val('');

              });

              $('#del_btn').click(function()
              {

                $('#Montpaye').val('');

              });

              var num = new Numerique();
              num.run();
              num.run1();

              $('#valid_remise').click(function()
              {
                var remise = $('#display_remise').val();
                var Apayer = $('#total_ttc').val();
                var devise = $('.devise');
                var pourcentage = $('.pourcentage');

                if(/^[0-9]+[.][0-9]+/.test(remise) || /^[0-9]+/.test(remise))
                {

                  if(pourcentage.is(':checked')) //on vérifie si l'utilisateur à cliquer sur devise
                    {
                        var paie = parseFloat(Apayer.replace(',', '.')); //on essaye de remplacer la virgule par le point
                        var temp = (remise/100).toFixed(2);
                        var montant = (paie * temp).toFixed(2);
                        var resultat = (paie - montant).toFixed(2);
                        $('input[name="Apayer"]').val(resultat);
                        $('input[name="Apayer2"]').val(resultat);
                    }
                    if(devise.is(':checked'))
                    {
                       var paie = parseFloat(Apayer.replace(',', '.'));
                       var montant = (paie - remise).toFixed(2);
                       $('input[name="Apayer"]').val(montant);
                       $('input[name="Apayer2"]').val(montant);
                    }

                    remises = ((remise/100) * 100).toFixed(2);

                    $('#clavier_remise').modal('hide');
                    $('#remise').val(remises);

                  }
                  else
                  {
                    err3("Les caractères saisies ne sont pas valide !");
                  }


              });


              function calcul_remise(remise)
              {

                //var remise = $('input[name="remise"]').val();
                var Apayer = $('#total_ttc').val();
                var devise = $('.devise');
                var pourcentage = $('.pourcentage');
                
                  if(devise.is(':checked')) //on vérifie si l'utilisateur à cliquer sur devise
                  {
                      var paie = parseFloat(Apayer.replace(',', '.')); //on essaye de remplacer la virgule par le point
                      var temp = (remise/100).toFixed(2);
                      var montant = (paie * temp).toFixed(2);
                      var resultat = (paie - montant).toFixed(2);
                      $('input[name="Apayer"]').val(resultat);
                      $('input[name="Apayer2"]').val(resultat);
                  }
                  if(pourcentage.is(':checked'))
                  {
                     var paie = parseFloat(Apayer.replace(',', '.'));
                     var montant = (paie - remise).toFixed(2);
                     $('input[name="Apayer"]').val(montant);
                     $('input[name="Apayer2"]').val(montant);
                  }
                }


                function err3(element){
                toastr.error(element,'Erreur',{
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


              //lorsqu'on met une vente en pause 
            $('#pause_vente').click(function()
              {
                var idvente = '<?php echo $idvente; ?>';
                var date_fact = '<?php echo $date; ?>';
                var mont_facture = $('#total_ttc').val();

                var idUE = '<?php echo $idUE; ?>';
                var getid = '<?php echo $getid; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var nomE = '<?php echo $nomE; ?>';

                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/verif_element_in-facture.php',
                    data  : 'idvente=' + idvente, 
                    success:function(data)
                    {
                      //alert(data1);
                      if(data != 1)
                      {
                        err3("Veuillez au moins insérer un artcle, car la facture ne peut pas être vide !");
                      }
                      else
                      {
                        $.ajax(
                        {
                          type  : 'POST', 
                          url   : 'fonction/pause_vente.php',
                          data  : 'idvente=' + idvente + '&date_fact=' + date_fact +'&mont_facture=' + mont_facture, 
                          success:function(data)
                          {
                            window.location.href = 'vente_init_caisse.php?id=' + getid + '&id_connexion=' + id_connexion + "&idUE=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                          }
                        });
                      }
                    }
                  });
              });

            //reprise de la vente
          $('#reprise_vente').click(function()
            {
              //affiche_vente_pause();
              $('#reprise_vente_modal').modal('show');
            });

          //impression de la facture 
          $('#print_facture').click(function()
            {
              //affiche_print_facture();
              $('#print_facture_modal').modal('show');
            });

          //impression de la facture  du bouton imprimer ticket
          $('#print_ticket_up').click(function()
            {
              //affiche_print_ticket();
              $('#print_ticket_modal').modal('show');
            });

          //lorsqu'on clique sur sélection pour réprendre la vente
          $('.get_reprise_vente').click(function()
            {
              var reference_caise = $(this).attr('id');
              var id_cl = '<?php echo $id_client_comptoire; ?>';

              var idUE = '<?php echo $idUE; ?>';
              var getid = '<?php echo $getid; ?>';
              var id_connexion = '<?php echo $id_connexion; ?>';
              var nomUE = '<?php echo $nomUE; ?>';
              var nomE = '<?php echo $nomE; ?>';

              
              window.location.href = 'fonction/reprise_vente.php?id=' + getid + '&id_connexion=' + id_connexion + "&idUE=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE + "&refcaise=" + reference_caise + "&idClient=" + id_cl;
            });


           //lorsqu'on annule une vente 
          $('#cancel_vente').click(function()
            {
              var idvente = '<?php echo $idvente; ?>';

              var idUE = '<?php echo $idUE; ?>';
              var getid = '<?php echo $getid; ?>';
              var id_connexion = '<?php echo $id_connexion; ?>';
              var nomUE = '<?php echo $nomUE; ?>';
              var nomE = '<?php echo $nomE; ?>';

              $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/cancel_vente.php',
                  data  : 'idvente=' + idvente,
                  success:function(data)
                  {
                    window.location.href = 'vente_init_caisse.php?id=' + getid + '&id_connexion=' + id_connexion + "&idUE=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                  }
                });
            });

              //lorsqu'on clique sur le bouton paiement
            $('#paiement').click(function()
              {
                //affiche_article();

                var Apayer = $('#Apayer').val();
                var total_ttc = $('#total_ttc').val();
                var reste = $('#reste').val();
                var rembours = $('#rembours').val();
                var idvente = '<?php echo $idvente; ?>';

                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/verif_element_in-facture.php',
                    data  : 'idvente=' + idvente, 
                    success:function(data)
                    {
                      //alert(data1);
                      if(data != 1)
                      {
                        err3("Veuillez au moins insérer un artcle, car la facture ne peut pas être vide !");
                      }
                      else
                      {
                        if(Apayer != '')
                        {
                          $('#reste').val(Apayer);

                          $('#get-paiement').modal('show');
                          
                        }
                        else
                        {
                          $('#reste').val(total_ttc);

                          $('#get-paiement').modal('show');

                        }
                      }
                    }
                  });

                      
              });

            //radio button pour mode de paiement ou dette
            $('#mode-paiement').click(function()
              {
                $('#zone-paiement').css('display', 'block');
                $('#zone-dette').css('display', 'none');
              });

            $('#dette').click(function()
              {
                $('#zone-paiement').css('display', 'none');
                $('#zone-dette').css('display', 'block');
              });


            //lorsqu'on choissi le mode paiement
              $('#id_mpaie').click(function()
                {
                  var id_cmp = $('#id_mpaie').val();
                  $.ajax(
                  {
                    type  : 'POST',
                    url   : 'fonction/get_num_compte.php',
                    data  : 'id_cmp=' + id_cmp,
                    success:function(data)
                    {
                      if(data == 1)
                      {
                        $('#num_cmp_cli').attr('disabled', true);
                        $('#num_cmp_cli').attr("placeholder", '');
                      }
                      else
                      {
                        $('#num_cmp_cli').attr('disabled', false);
                        $('#num_cmp_cli').attr("placeholder", 'Saisir le numéro de compte du client');
                      }
                    }
                  });
                });


            //lorsqu'on change le monnaie de paiement 
            $('#autre_devise').click(function()
              {
                var devise = '<?php echo $devise; ?>';
                var autre_devise = $('#autre_devise').val();

                if(devise != autre_devise)
                {
                  $.ajax(
                    {
                      type  : 'POST', 
                      url   : 'fonction/get_devise.php',
                      data  : 'autre_devise=' + autre_devise,
                      success:function(data)
                      {
                        $('#devise_paie').html(data);
                      }
                    });
                }
                else
                {
                  $('#devise_paie').html(devise);
                }
              });

             //lorsqu'on click sur cash
          $('#cash').click(function()
            {
              var total_ttc = $('#total_ttc').val();
              var Apayer = $('#Apayer').val();

              if(Apayer != '')
              {
                $('#Montpaye').val(Apayer);
                operation(Apayer);
              }
              else
              {
                $('#Montpaye').val(total_ttc);
                operation(total_ttc);
              }

            });

          /*lorsqu'on clique sur les boutons pour écrire les montant 
            à payer, on calcul le reste à payer et à rembourser automatiquement */
            $('.calc_btn').click(function()
              {
                var Montpaye = $('#Montpaye').val();
                operation(Montpaye); 
                verifmontpaie(Montpaye);
              });

            /* cette fonction fait le calcul automatique du reste à payer et à rembourser */
            function operation(mont)
            {
              var Montpaye = $('#Montpaye').val();
              var Apayer = $('#Apayer').val();
              var total_ttc = $('#total_ttc').val();
              var reste = $('#reste').val();
              var rembours = $('#rembours').val();
              var autre_devise = $('#autre_devise').val();


              $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/get_equivelent_devise.php',
                  data  : 'autre_devise=' + autre_devise,
                  success:function(data)
                  {
                    var equiv = data;

                    if(Apayer != '')
                    {
                      var montant = Montpaye / equiv;
                      var resultat = Apayer - montant;


                      if(resultat <= 0)
                      {
                        $('#reste').val('');
                        var remb = montant - Apayer;
                        var remb2 = (remb/1).toFixed(2);
                        $('#rembours').val(remb2);
                      }
                      else
                      {
                        var result = (resultat/1).toFixed(2);
                        $('#reste').val(result);
                        $('#rembours').val('');
                      }
                    }
                    else
                    {
                      var montant = Montpaye / equiv;
                      var resultat = total_ttc - montant;

                      if(resultat <= 0)
                      {
                        $('#reste').val('');
                        var remb = montant - total_ttc;
                        var remb2 = (remb/1).toFixed(2);
                        $('#rembours').val(remb2);
                      }
                      else
                      {
                        var result = (resultat/1).toFixed(2);
                        $('#reste').val(result);
                        $('#rembours').val('');
                      }
                    }
                  }
                });
            }

            //vérification des caractères saisie sur le montant payé
            $('#Montpaye').keyup(function()
              {
                var Montpaye = $('#Montpaye').val();

                if(/^[0-9]+[.][0-9]+/.test(Montpaye) || /^[0-9]+/.test(Montpaye))
                {
                  $('#Montpaye').removeClass('is-invalid');
                  $('#Montpaye').addClass('is-valid');
                }
                else if(Montpaye == '')
                {
                  $('#Montpaye').removeClass('is-valid');
                  $('#Montpaye').removeClass('is-invalid');
                }
                else
                {
                  $('#Montpaye').addClass('is-invalid');
                  $('#Montpaye').removeClass('is-valid');
                }
              });

            $('#Montpaye').keyup(function()
            {
              var Montpaye = $('#Montpaye').val();
              var Apayer = $('#Apayer').val();
              var total_ttc = $('#total_ttc').val();
              var reste = $('#reste').val();
              var rembours = $('#rembours').val();
              var autre_devise = $('#autre_devise').val();


              $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/get_equivelent_devise.php',
                  data  : 'autre_devise=' + autre_devise,
                  success:function(data)
                  {
                    var equiv = data;

                    if(Apayer != '')
                    {
                      var montant = Montpaye / equiv;
                      var resultat = Apayer - montant;


                      if(resultat <= 0)
                      {
                        $('#reste').val('');
                        var remb = montant - Apayer;
                        var remb2 = (remb/1).toFixed(2);
                        $('#rembours').val(remb2);
                      }
                      else
                      {
                        var result = (resultat/1).toFixed(2);
                        $('#reste').val(result);
                        $('#rembours').val('');
                      }
                    }
                    else
                    {
                      var montant = Montpaye / equiv;
                      var resultat = total_ttc - montant;

                      if(resultat <= 0)
                      {
                        $('#reste').val('');
                        var remb = montant - total_ttc;
                        var remb2 = (remb/1).toFixed(2);
                        $('#rembours').val(remb2);
                      }
                      else
                      {
                        var result = (resultat/1).toFixed(2);
                        $('#reste').val(result);
                        $('#rembours').val('');
                      }
                    }
                  }
                });
            });

            /*on fais de même pour la fonction*/
            function verifmontpaie(montpay)
            {
              var Montpaye = montpay;

                if(/^[0-9]+[.][0-9]+/.test(Montpaye) || /^[0-9]+/.test(Montpaye))
                {
                  $('#Montpaye').removeClass('is-invalid');
                  $('#Montpaye').addClass('is-valid');
                }
                else if(Montpaye == '')
                {
                  $('#Montpaye').removeClass('is-valid');
                  $('#Montpaye').removeClass('is-invalid');
                }
                else
                {
                  $('#Montpaye').addClass('is-invalid');
                  $('#Montpaye').removeClass('is-valid');
                }
            }


            function affiche_ticket()
            {
               var num_vente = '<?php echo $idvente; ?>';
               var idUE = '<?php echo $idUE; ?>';
               var getprenom = '<?php echo $getprenom; ?>';
               var devise = '<?php echo $devise; ?>';

               $.ajax(
                {
                  type  : 'POST', 
                  url   : 'fonction/affiche_ticket.php',
                  data  : 'num_vente=' + num_vente + '&idUE=' + idUE + '&getprenom=' + getprenom + '&devise=' + devise,
                  success:function(data)
                  {
                    $('#tiket_detail').html(data);
                  }
                });
            }


             //imprimer ticket
            $('#print-ticket-vente').click(function()
              {
                var idvente = '<?php echo $idvente; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var getprenom = '<?php echo $getprenom; ?>';
                var devise = '<?php echo $devise; ?>';

                var getid = '<?php echo $getid; ?>';

                var id_connexion = '<?php echo $id_connexion; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var nomE = '<?php echo $nomE; ?>';


                window.open('facture/pdf/ticket_vente.php?idvente=' + idvente + '&idUE=' + idUE + '&getprenom=' + getprenom + '&devise=' + devise, '_blank');

                window.location.href = 'vente_init_caisse.php?id=' + getid + '&id_connexion=' + id_connexion + "&idUE=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;



              });


            //nouvelle vente
            $('#new_vente').click(function()
              {
                var idvente = '<?php echo $idvente; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var getprenom = '<?php echo $getprenom; ?>';
                var devise = '<?php echo $devise; ?>';

                var getid = '<?php echo $getid; ?>';

                var id_connexion = '<?php echo $id_connexion; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var nomE = '<?php echo $nomE; ?>';

                 window.location.href = 'vente_init_caisse.php?id=' + getid + '&id_connexion=' + id_connexion + "&idUE=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
              });


            //lorsque la paie s'effectue
            $('#payer').click(function()
            {
              var idvente = '<?php echo $idvente; ?>';
              var client_caisse = $('#id-client').val();
              var date_fact = '<?php echo $date; ?>';
              var heure = '<?php echo $heure; ?>';
              var total_ttc = $('#total_ttc').val();
              var remise = $('#remise').val();
              var remise_devise = $('#remise_devise').text();
              var Apayer = $('#Apayer').val();
              var Montpaye = $('#Montpaye').val();
              var autre_devise = $('#autre_devise').val();
              var idUE = '<?php echo $idUE; ?>';
              var getid = '<?php echo $getid; ?>';
              
              var defaulcmp = '<?php echo $defaulcmp; ?>';

              var id_cmp = $('#id_mpaie').val();
              var caisse_id = '<?php echo $caisse_id; ?>'; //mode de paiement par défaut donc la caisse espèce

              var num_cmp_cli = $('#num_cmp_cli').val();

              var dette = $('#dette');

              var date_dette = $('#date_echeance').val();

              var client_comptoire = '<?php echo $id_client_comptoire; ?>';

              var id_connexion = '<?php echo $id_connexion; ?>';
              var nomUE = '<?php echo $nomUE; ?>';
              var nomE = '<?php echo $nomE; ?>';

              if(client_caisse != '')
              {
                  if(/^[0-9]+[.][0-9]+/.test(Montpaye) || /^[0-9]+/.test(Montpaye) || Montpaye == '')
                  {
                    if(id_cmp != '')
                    {
                      $.ajax(
                      {
                        type  : 'POST',
                        url   : 'fonction/verif_egal_devise.php',
                        data  : 'id_cmp=' + id_cmp + '&autre_devise=' + autre_devise,
                        success:function(dev)
                        {
                          if(dev != 1)
                          {
                            //alert('OK');
                            $.ajax(
                            {
                              type  : 'POST',
                              url   : 'fonction/get_equivelent_devise.php',
                              data  : 'autre_devise=' + autre_devise,
                              success:function(data)
                              {

                                var equiv = data;
                                var taux_echange = Montpaye / equiv;
                                var resteApayer = Apayer - taux_echange; //A payer - montant payer
                                var remboursser = Montpaye - Apayer;
                                var mont_facture = Apayer;

                                taux_echange = taux_echange.toFixed(2);

                                taux_echange = parseFloat(taux_echange);
                                Apayer = parseFloat(Apayer);

                                //alert('A payer : ' + Apayer + '\nMontant payé : ' + taux_echange);

                                //si la dette est cochet
                                if(dette.is(':checked'))
                                {
                                  if(client_caisse != client_comptoire)
                                  {
                                    //si c'est une dette donc le montant payé doit obligatoire être inférieur au montant à payer
                                    if(taux_echange >= Apayer)
                                    {
                                      $('#Montpaye').addClass('is-invalid');
                                      err3("Le montant payé ne doit pas dépasser ou être égal au montant à payer de la dette !");
                                    }
                                    else
                                    {
                                      //on vérifie si le mode de paiement contient un numéro de compte
                                      $.ajax(
                                      {
                                        type  : 'POST',
                                        url   : 'fonction/get_num_compte.php',
                                        data  : 'id_cmp=' + id_cmp,
                                        success:function(donnee)
                                        {
                                          if(donnee == 1) //si donnee = 1 donc le mode de paiement ne contient pas de nuéro de compte
                                          {
                                            $.ajax(
                                            {
                                              type : 'POST',
                                              url : 'fonction/save_vente_caisse.php',
                                              data : "idvente=" + idvente + "&date_fact=" + date_fact + '&heure=' + heure + 
                                                     "&remise=" + remise + 
                                                      "&taux_echange=" + taux_echange + "&resteApayer=" + resteApayer + 
                                                      "&remise_devise=" + remise_devise + '&remboursser=' + remboursser + 
                                                      '&mont_facture=' + mont_facture + '&idUE=' + idUE + '&id_cmp=' + id_cmp +
                                                      '&num_cmp_cli=' + num_cmp_cli + '&client_caisse=' + client_caisse + '&getid=' + getid + '&equiv=' + equiv  + '&date_dette=' + date_dette,
                                              success:function(content)
                                              {
                                                  //alert(content);
                                                  if(content != 1)
                                                  {
                                                    err3("Veuillez au moins insérer un artcle, car la facture ne peut pas être vide !");
                                                  }
                                                  else
                                                  {

                                                    $('#get-paiement').modal('hide');
                                                    affiche_ticket();
                                                    $('#print_ticket').modal('show');

                                                    valid3("Vente effectuée avec succès !");
                                                    


                                                    //window.open('ticket.php', '_blank');

                                                    /*setTimeout(function()
                                                    {
                                                      window.location.href = 'vente_init_caisse.php?id=' + getid + '&id_connexion=' + id_connexion + "&idUE=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                                    }, 5000);*/

                                                    //on remplace le texte qu'on a caché par le numéro de la vente
                                                    /*$('#num_vente').text('0');
                                                    affiche_article();*/
                                                  }
                                              }
                                            });
                                          }
                                          else
                                          {
                                            //le mode de paiement contient un numéro de compte
                                            if(num_cmp_cli != '')
                                            {
                                              $.ajax(
                                              {
                                                type : 'POST',
                                                url : 'fonction/save_vente_caisse.php',
                                                data : "idvente=" + idvente + "&date_fact=" + date_fact + '&heure=' + heure + 
                                                       "&remise=" + remise + 
                                                        "&taux_echange=" + taux_echange + "&resteApayer=" + resteApayer + 
                                                        "&remise_devise=" + remise_devise + '&remboursser=' + remboursser + 
                                                        '&mont_facture=' + mont_facture + '&idUE=' + idUE + '&id_cmp=' + id_cmp +
                                                        '&num_cmp_cli=' + num_cmp_cli + '&client_caisse=' + client_caisse + '&getid=' + getid + '&equiv=' + equiv  + '&date_dette=' + date_dette,
                                                success:function(content)
                                                {
                                                    //alert(content);
                                                    if(content != 1)
                                                    {
                                                      err3("Veuillez au moins insérer un artcle, car la facture ne peut pas être vide !");
                                                    }
                                                    else
                                                    {

                                                      $('#get-paiement').modal('hide');


                                                      affiche_ticket();
                                                      $('#print_ticket').modal('show');

                                                      valid3("Vente effectuée avec succès !");


                                                      //window.open('ticket.php', '_blank');

                                                      /*setTimeout(function()
                                                      {
                                                        window.location.href = 'vente_init_caisse.php?id=' + getid + '&id_connexion=' + id_connexion + "&idUE=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                                      }, 5000);*/

                                                      //on remplace le texte qu'on a caché par le numéro de la vente
                                                      /*$('#num_vente').text('0');
                                                      affiche_article();*/
                                                    }
                                                }
                                              });
                                            }
                                            else
                                            {
                                              //si le numéro de compte n'est pas saisie
                                              $('#num_cmp_cli').addClass('is-invalid');
                                              err3('Veuillez saisir le numéro de compte du client S.V.P !');
                                            }
                                          }
                                        }
                                      });

                                    }
                                  }
                                  else
                                  {
                                    $('#id-client').addClass('is-invalid');
                                    err3("Veuillez choissir le compte client pour enregistrer la dette S.V.P !");
                                  }
                                }
                                else //si la dette n'est pas coché 
                                {
                                  //si c'est une dette donc le montant payé doit obligatoire être inférieur au montant à payer
                                    if(taux_echange < Apayer)
                                    {
                                      $('#Montpaye').addClass('is-invalid');
                                      err3("Veuillez saisir le montant exact ou enregistrer une dette client!");
                                    }
                                    else
                                    {
                                       //on vérifie si le mode de paiement contient un numéro de compte
                                        $.ajax(
                                        {
                                          type  : 'POST',
                                          url   : 'fonction/get_num_compte.php',
                                          data  : 'id_cmp=' + id_cmp,
                                          success:function(donnee)
                                          {
                                            if(donnee == 1) //si donnee = 1 donc le mode de paiement ne contient pas de nuéro de compte
                                            {
                                              $.ajax(
                                              {
                                                type : 'POST',
                                                url : 'fonction/save_vente_caisse.php',
                                                data : "idvente=" + idvente + "&date_fact=" + date_fact + '&heure=' + heure + 
                                                       "&remise=" + remise + 
                                                        "&taux_echange=" + taux_echange + "&resteApayer=" + resteApayer + 
                                                        "&remise_devise=" + remise_devise + '&remboursser=' + remboursser + 
                                                        '&mont_facture=' + mont_facture + '&idUE=' + idUE + '&id_cmp=' + id_cmp +
                                                        '&num_cmp_cli=' + num_cmp_cli + '&client_caisse=' + client_caisse + '&getid=' + getid + '&equiv=' + equiv  + '&date_dette=' + date_dette,
                                                success:function(content)
                                                {
                                                    //alert(content);
                                                    if(content != 1)
                                                    {
                                                      err3("Veuillez au moins insérer un artcle, car la facture ne peut pas être vide !");
                                                    }
                                                    else
                                                    {
                                                      $('#get-paiement').modal('hide');

                                                      affiche_ticket();
                                                      $('#print_ticket').modal('show');

                                                      valid3("Vente effectuée avec succès !");


                                                      //window.open('ticket.php', '_blank');

                                                      /*setTimeout(function()
                                                      {
                                                        window.location.href = 'vente_init_caisse.php?id=' + getid + '&id_connexion=' + id_connexion + "&idUE=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                                      }, 5000);*/

                                                      //on remplace le texte qu'on a caché par le numéro de la vente
                                                      /*$('#num_vente').text('0');
                                                      affiche_article();*/
                                                    }
                                                }
                                              });
                                            }
                                            else
                                            {
                                              //le mode de paiement contient un numéro de compte
                                              if(num_cmp_cli != '')
                                              {
                                                $.ajax(
                                                {
                                                  type : 'POST',
                                                  url : 'fonction/save_vente_caisse.php',
                                                  data : "idvente=" + idvente + "&date_fact=" + date_fact + '&heure=' + heure + 
                                                         "&remise=" + remise + 
                                                          "&taux_echange=" + taux_echange + "&resteApayer=" + resteApayer + 
                                                          "&remise_devise=" + remise_devise + '&remboursser=' + remboursser + 
                                                          '&mont_facture=' + mont_facture + '&idUE=' + idUE + '&id_cmp=' + id_cmp +
                                                          '&num_cmp_cli=' + num_cmp_cli + '&client_caisse=' + client_caisse + '&getid=' + getid + '&equiv=' + equiv  + '&date_dette=' + date_dette,
                                                  success:function(content)
                                                  {
                                                      //alert(content);
                                                      if(content != 1)
                                                      {
                                                        err3("Veuillez au moins insérer un artcle, car la facture ne peut pas être vide !");
                                                      }
                                                      else
                                                      {
                                                        $('#get-paiement').modal('hide');


                                                        affiche_ticket();
                                                        $('#print_ticket').modal('show');

                                                        valid3("Vente effectuée avec succès !");


                                                        //window.open('ticket.php', '_blank');

                                                        /*setTimeout(function()
                                                        {
                                                          window.location.href = 'vente_init_caisse.php?id=' + getid + '&id_connexion=' + id_connexion + "&idUE=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE;
                                                        }, 5000);*/

                                                        //on remplace le texte qu'on a caché par le numéro de la vente
                                                        /*$('#num_vente').text('0');
                                                        affiche_article();*/
                                                      }
                                                  }
                                                });
                                              }
                                              else
                                              {
                                                //si le numéro de compte n'est pas saisie
                                                $('#num_cmp_cli').addClass('is-invalid');
                                                err3('Veuillez saisir le numéro de compte du client S.V.P !');
                                              }
                                            }
                                          }
                                        });
                                    }
                                }
                              }
                            });
                          }
                          else
                          {
                            $('#autre_devise').addClass('is-invalid');
                            err3('Veuillez Choissir la devise correspondant à la devise du mode paiement');
                          }
                        }
                      });
                    }
                    else
                    {
                      err3("Veuillez choisir le mode de paiement S.V.P !");
                      $('#id_mpaie').addClass('is-invalid');
                    }
                  }
                  else
                  {
                    $('#Montpaye').addClass('is-invalid');
                    err3("Le montant à payé saisie n'est pas valide !");
                  }
              }
              else
              {
                $('#id-client').addClass('is-invalid');
                err3("Veuillez sélectionner le client S.V.P !");
              }
            });




            //les articles et les clients 

            //boutton modal article
              $('#new-article').click(function()
                {
                  $('.ajouter-article').modal('show');
                });


              //lorsqu'on appui sur le bouton nouvelle catégorie d'article
              $('#new_categorie').click(function()
                {
                  /*$('#modal').removeClass('modal-lg');
                  var idUE = '<?php echo $idUE; ?>';

                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction/contente_categorie_article.php',
                      data  : 'idUE=' + idUE,
                      success:function(data)
                      {
                        $('#content-modal').html(data);
                      }
                    });*/

                  //$('#title-modal').html("Ajouter une catégorie d'articles");
                   $('.ajouter-article').modal('hide');
                   $('.ajouter-categorie-article').modal('show');
                });

              //lorsqu'on appui sur le bouton nouvelle SOUS catégorie  d'article
              $('#new_sous_categorie').click(function()
                {

                  /*$('#modal').removeClass('modal-lg');
                  var idUE = '<?php echo $idUE; ?>';

                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction/contente_categorie_sous_article.php',
                      data  : 'idUE=' + idUE,
                      success:function(data)
                      {
                        $('#content-modal').html(data);
                      }
                    });*/

                    $('.ajouter-article').modal('hide');
                    $('.ajouter-sous-categorie-article').modal('show');
                });
             //enregistrer un article
             //enregistrer un article
             $('#saveart').click(function()
              {
                var libelle_article = $('#lib_article').val();
                var cat_article = $('#cat_article').val();
                var code_article = $('#code-article').val();
                var code_barre = $('#code-barre').val();
                //var sous_cat_article = $('#sous_cat_article').val();
                var unite_article = $('#unite_article').val();
                var expiration_article = $('#expiration_article').val();
                var stock_article = $('#stock_article').val();
                var prix_achat_article = $('#prix_achat_article').val();
                var prix_vente_HTVA = $('#prix_ht').val();
                var TVA_article = $('#taux_tva').val();
                var prix_vente_TTC_article = $('#prix_ttc').val();

                var fournisseur_article = $('#fournisseur_article').val();
                var getprenom = '<?php echo $getprenom; ?>';
                var getname = '<?php echo $getname; ?>';
                var idUE = '<?php echo $idUE; ?>';

                /*var beneficeDevise = ((prix_vente_TTC_article - prix_achat_article) * 100)/ prix_achat_article

                alert(beneficeDevise)*/

                /*/^[0-9]+[.][0-9]+/.test(remise) || /^[0-9]+/.test(remise)*/
                if(libelle_article != '') 
                {
                  if(/^[0-9]+/.test(expiration_article) || expiration_article == '')
                  {
                    if(/^[0-9]+[.][0-9]+/.test(prix_achat_article) || /^[0-9]+/.test(prix_achat_article) || prix_achat_article == '')
                    {
                      if(/^[0-9]+[.][0-9]+/.test(prix_vente_HTVA) || /^[0-9]+/.test(prix_vente_HTVA) || prix_vente_HTVA == '')
                      {
                        if(/^[0-9]+[.][0-9]+/.test(TVA_article) || /^[0-9]+/.test(TVA_article) || TVA_article == '')
                        {
                          if(/^[0-9]+[.][0-9]+/.test(prix_vente_TTC_article) || /^[0-9]+/.test(prix_vente_TTC_article) || prix_vente_TTC_article == '')
                          {
                            if(/^[0-9]+/.test(stock_article) || stock_article == '')
                            {
                              $.ajax(
                              {
                                type : 'POST',
                                url : 'fonction/add_new_article.php',
                                data : "libelle_article=" + libelle_article + "&cat_article=" + cat_article + "&unite_article=" + unite_article +
                                        "&expiration_article=" + expiration_article + "&stock_article=" + stock_article + 
                                        "&prix_achat_article=" + prix_achat_article + "&prix_vente_HTVA=" + prix_vente_HTVA + 
                                        "&TVA_article=" + TVA_article + "&prix_vente_TTC_article=" + prix_vente_TTC_article + 
                                        "&fournisseur_article=" + fournisseur_article + "&getprenom=" + getprenom + 
                                        "&getname=" + getname + "&idUE=" + idUE + '&code_barre=' + code_barre + '&code_article=' + code_article,
                                success:function(data)
                                {
                                  //alert(data);
                                  if(data == 1)
                                  {
                                    err3("Cette article existe déjà !");
                                    $('#lib_article').addClass('is-invalid');
                                  }
                                  else if(data == 2)
                                  {
                                    err3("Ce code article est déjà utilisé !");
                                    $('#code-article').addClass('is-invalid');
                                  }
                                  else
                                  {
                                    $('#lib_article').removeClass('is-invalid');
                                    $('#prix_ttc').removeClass('is-invalid');
                                    $('#prix_ht').removeClass('is-invalid');
                                    $('#prix_achat_article').removeClass('is-invalid');
                                    $('#taux_tva').removeClass('is-invalid');
                                    $('#stock_article').removeClass('is-invalid');
                                    $('#expiration_article').removeClass('is-invalid');
                                    //$('#cat_article').removeClass('is-invalid');
                                    //$('#sous_cat_article').removeClass('is-invalid');
                                    //$('#fournisseur_article').removeClass('is-invalid');

                                    $('#lib_article').val('');
                                    $('#prix_ttc').val('');
                                    $('#prix_ht').val('');
                                    $('#prix_achat_article').val('');
                                    $('#taux_tva').val('');
                                    $('#stock_article').val('');
                                    $('#expiration_article').val('');
                                    $('#cat_article').val('');
                                    $('#sous_cat_article').val('');
                                    $('#fournisseur_article').val('');
                                    $('#code-barre').val('');
                                    $('#code-article').val('');

                                    valid3('Nouvvel article inséré avec succès');
                                    $('.ajouter-article').modal('hide');
                                    setTimeout(function()
                                    {
                                      window.location.reload();
                                    }, 5000);
                                    
                                  }
                                  //affiche_article();
                                }
                              });
                            }
                            else
                            {
                              $('#stock_article').addClass('is-invalid');
                              err3("Le stock de l'article saisie n'est pas valide!");
                            }
                          }
                          else
                          {
                            $('#prix_ttc').addClass('is-invalid');
                            err3("Le prix de vente TTC de l'article saisie n'est pas valide!");
                          }
                        }
                        else
                        {
                          $('#taux_tva').addClass('is-invalid');
                          err3("Le taux TVA de l'article saisie n'est pas valide!");
                        }
                      }
                      else
                      {
                        $('#prix_ht').addClass('is-invalid');
                        err3("Le prix de vente HTVA de l'article saisie n'est pas valide!");
                      }
                    }
                    else
                    {
                      $('#prix_achat_article').addClass('is-invalid');
                      err3("Le prix d'achat de l'article saisie n'est pas valide!");
                    }
                  }
                  else
                  {
                    $('#expiration_article').addClass('is-invalid');
                    err3("Le nombre jour de l'expiration de l'article saisie n'est pas valide!");
                  }
                }
                else
                {
                  $('#lib_article').addClass('is-invalid');
                  err3('Veuillez remplir le libellé article S.V.P!'); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                }
                  
              });

              //lorsqu'on clique pour appliquer la TVA 
              $('#addtva').click(function()
                {
                  $('.viewtva').css('display', 'block');

                  var idUE = '<?php echo $idUE; ?>';

                  $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/getTVA.php', 
                    data  : 'idUE=' + idUE,
                    success:function(data)
                    {
                      //alert(data);
                      $('#taux_tva').val(data);
                      calcule_ht_ttc(event);
                    }
                  });
                });


              //lorsqu'on annule la TVA
              $('#removetva').click(function()
                {
                  $('.viewtva').css('display', 'none');
                  $('#taux_tva').val('0');
                  calcule_ht_ttc(event);
                });


               //on calcul le taux tva pour l'ajout des articles 
              function calcule_ht_ttc(event) // fonction de calcul
              {
                var prix_ht = $('input[name="prix_ht"]').val();
                var taux_tva  = $('input[name="taux_tva"]').val();
                var prix_ttc = $('input[name="prix_ttc"]').val();
                
                if(event.target.name=='prix_ttc')
                {
                  var new_prix_ht = (prix_ttc/(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ht"]').val(new_prix_ht);
                }
                else
                {
                  var new_prix_ttc = (prix_ht*(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ttc"]').val(new_prix_ttc);
                } 
              }

              $('#modal-form').bind('keyup mouseup', calcule_ht_ttc); // appel de la fonction de calcul lors d'un événement 'keyup' ou 'mouseup'


               //ajouter une nouvelle catégorie d'article
            $('#addcatart').click(function()
              {
                var libelleart = $('#libelleart').val();
                var idUE = '<?php echo $idUE; ?>';

                if(libelleart != '')
                {
                  $.ajax({
                    type : 'POST',
                    url : 'fonction/add_new_categorie_article.php',
                    data : "libelleart=" + libelleart +  
                           "&idUE=" + idUE,
                    success:function(data)
                    {
                      //alert(data);
                      if(data == 1)
                      {
                        err3("Cette catégorie de d'articles existe déjà !");
                        $('#libelleart').addClass('is-invalid');
                      }
                      else
                      {
                        $('#libelleart').removeClass('is-invalid');
                        $('#libelleart').val('');
                        valid3("Nouvelle catégorie d'articles insérée avec succès !");
                        $('.ajouter-categorie-article').modal('hide');
                        //$('.ajouter-article').modal('hide');
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
                  $('#libelleart').addClass('is-invalid');
                  err3("Veuillez entrer le libellé du catégorie de d'articles S.V.P!");
                }
              });


            //ajout du sous-catégorie d'article
            $('#addcatartsous').click(function()
              {
                var libelleart = $('#libelleartsous').val();
                var idUE = '<?php echo $idUE; ?>';

                if(libelleart != '')
                {
                  $.ajax({
                    type : 'POST',
                    url : 'fonction/add_new_sous_categorie_article.php',
                    data : "libelleart=" + libelleart +  
                           "&idUE=" + idUE,
                    success:function(data)
                    {
                      //alert(data);
                      if(data == 1)
                      {
                        err3("Cette sous-catégorie de d'articles existe déjà !");
                        $('#libelleartsous').addClass('is-invalid');
                      }
                      else
                      {
                        $('#libelleartsous').removeClass('is-invalid');
                        $('#libelleartsous').val('');
                        valid3("Nouvelle sous-catégorie d'articles insérée avec succès !");
                        $('.ajouter-sous-categorie-article').modal('hide');
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
                  $('#libelleartsous').addClass('is-invalid');
                  err3("Veuillez entrer le libellé du sous-catégorie de d'articles S.V.P!");
                }
              });




            //les clients 
            $('#new-client').click(function()
              {
                $('#ajouter-client').modal('show');
              });

            //ajouter un nouveau client 
              $('#savecli').click(function()
                {
                  var civilite = $('#civilite').val();
                  var fidelitecard = $('#fidelitecard').val();
                  var nomcli = $('#nomcli').val();
                  var prenomcli = $('#prenomcli').val();
                  var soccli = $('#soccli').val();
                  var tvacli = $('#tvacli').val();
                  var adresscli = $('#adresscli').val();
                  var telcli = $('#telcli').val();
                  var postalecli = $('#postalecli').val();
                  var villecli = $('#villecli').val();
                  var depcli = $('#depcli').val();
                  var payscli = $('#payscli').val();
                  var emailcli = $('#emailcli').val();
                  var idUE = '<?php echo $idUE; ?>';


                  if(prenomcli != '')
                  {
                    if(nomcli != '')
                    {
                      if(emailcli != '')
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
                                  url : 'fonction/add_new_client.php',
                                  data : "civilite=" + civilite + "&prenomcli=" + prenomcli + 
                                          "&nomcli=" + nomcli + "&fidelitecard=" + fidelitecard + 
                                          "&soccli=" + soccli + "&tvacli=" + tvacli + 
                                          "&adresscli=" + adresscli + "&telcli=" + telcli + 
                                          "&postalecli=" + postalecli + "&villecli=" + villecli + 
                                          "&depcli=" + depcli + "&payscli=" + payscli + 
                                          "&emailcli=" + emailcli + "&idUE=" + idUE,
                                  success:function(data)
                                  {
                                    //alert(data);
                                    $('#nomcli').removeClass('is-invalid');
                                    $('#prenomcli').removeClass('is-invalid');
                                    $('#emailcli').removeClass('is-invalid');

                                    $('#soccli').val('');
                                    $('#tvacli').val('');
                                    $('#prenomcli').val('');
                                    $('#nomcli').val('');
                                    $('#adresscli').val('');
                                    $('#telcli').val('');
                                    $('#villecli').val('');
                                    $('#depcli').val('');
                                    $('#emailcli').val('');
                                    $('#civilite').val('');
                                    $('#fidelitecard').val('');

                                    $('#ajouter-client').modal("hide");


                                    valid3('Nouveau client ajouté avec succès');
                                    
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
                                $('#emailcli').addClass('is-invalid');
                                err3("L'adresse émail du client saisie n'est pas valide !");
                              }
                            }
                            else
                            {
                              $('#nomcli').addClass('is-invalid');
                              err3("Le nom du client saisie n'est pas valide !");
                            }
                          }
                          else
                          {
                            $('#prenomcli').addClass('is-invalid');
                            err3("Le prénom du client saisie n'est pas valide !");
                          }
                        }
                        else
                        {
                          $('#payscli').addClass('is-invalid');
                          err3("Veuillez Sélectionner un pays S.V.P !");
                        }
                      }
                      else
                      {
                        $('#emailcli').addClass('is-invalid');
                        err3("L'émail du client est obligatoire S.V.P!");
                      }
                    }
                    else
                    {
                      $('#nomcli').addClass('is-invalid');
                      err3("Veuillez saisir le nom du client ou du représentant de l'entreprise S.V.P!");
                    }
                  }
                  else
                  {
                    $('#prenomcli').addClass('is-invalid');
                    err3("Veuillez saisir le prénom du client ou du représentant de l'entreprise S.V.P!");
                  }
                });



            //fullscreen
             //le boutton qui permet d'afficher la page en plein écran
              $('#go_fullscreen').click(function()
              {
                screenfull.request();
                $('#exit_fullscreen').css('display', 'block');
                $('#go_fullscreen').css('display', 'none');
              });

              //quitter le mode plein écran
              $('#exit_fullscreen').click(function()
              {
                screenfull.exit();
                $('#go_fullscreen').css('display', 'block');
                $('#exit_fullscreen').css('display', 'none');
              });

             //initialisation du datatable
           $('.bootstrap-data-table').DataTable({
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