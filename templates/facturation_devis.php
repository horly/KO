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

       .scrollfact
        {
          height:360px;
          width:100%;
          overflow:auto;
          border: 0.5px solid lightgray;
          background-color: white;
        }

        .body-modal-client
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

        #adresscli
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
     
    </style>
        

         <title>KEDIS Online! | Mes recettes | facturation devis</title>
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

                          $refcaise = $_GET['refcaise']; //on recupère la référence de caise

                          /*on recupère aussi l'id du devis à partir de la 
                           référence de caise et de l'idUE*/
                          $getCodeDevis = $bdd->prepare("SELECT * FROM devis WHERE reference_dv = ? AND id_UE_dv = ? ");
                          $getCodeDevis->execute(array($refcaise, $idUE));

                          $fetchDevis = $getCodeDevis->fetch();

                          $idoffre = $fetchDevis['id_dv']; //on recupère l'id
                          $remise = $fetchDevis['remise_dv'];
                          $montantPaye = $fetchDevis['paiemant_recu_dv'];
                          $unite_remise = $fetchDevis['unite_remise_dv'];
                          $note = $fetchDevis['note_dv'];
                          $objet = $fetchDevis['objet_dv'];

                          

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
                                        <li><a href="devis.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes offres/devis</a></li>
                                        <li class="active">Créer une nouvelle offre/devis</li>
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
                    <h6>Créer une nouvelle offre/devis</h6>
                  </div>
                  <div class="card-body">

                    <?php

                          $getclient = $bdd->prepare("SELECT * FROM client_for_user WHERE id_UE_cli = ?");
                          $getclient->execute(array($idUE));

                          //$fetchClient = $getclient->fetch();

                        ?>
                 
                      <!--Début row 1-->
                        <div class="row">
                          <div class="col-md-3">
                            <label for="id-client"><h6>Client</h6></label>
                            <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                              </div>
                              <select class="custom-select" id="id-client">
                                <option selected value="">Choisir un client</option>
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

                          <div class="col-md-3">
                              <label for="exampleInputEmail1"><h6>&nbsp;&nbsp;</h6></label>
                              <?php
                                  //on vérifie pour le menu contact
                                  if($fetch_user['client'] == 0)
                                  {
                              ?>
                                  <button type="button" class="btn btn-success btn-block" id="new-client" title="Ajouter un client" title="Ajouter un client">
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
                          
                           <?php

                            //on recupère la date d'aujourd'hui
                            setlocale(LC_TIME, 'fra_fra');
                            $date = date("Y-m-d");
                            
                          ?>
                          
                          <div class="col-md-3">
                            <label for="date"><h6>Date</h6></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                </div>
                                <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date" value="<?php echo $date; ?>">
                                  <div class="input-group-prepend">
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-3">
                            <label for="date_echeance"><h6>Echéance</h6></label>
                            <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/calendar.png"></span>
                                </div>
                                <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date_echeance" value="<?php echo $date; ?>">
                                    <div class="input-group-prepend">
                                </div>
                              </div>
                          </div>
                        </div>
                      <!--Fin row 1-->

                       <!--Début form_card-->
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-7">
                              <table class="table table_facture" id="table_facture">
                                <thead class="bg-secondary text-white border">
                                  <tr>
                                    <th title="Code article">Code</th>
                                    <th>Désignation</th>
                                    <th>Type</th>
                                    <th class="text-center">Quantité</th>
                                    <th class="text-right">PU</th>
                                    <th class="text-right">Total</th>
                                  </tr>
                                </thead>
                                <tbody class="tbody_striped tbody_fac border" id="tbody_fac"> 
                                  

                                </tbody>
                              </table>
   
                              <!--<form action="" method="post">-->
                                <div class="card bg-secondary text-white">
                                 <div class="card-body">
                                   
                                      <div class="row">
                                        <div class="col-md-5">
                                          <div class="input-group mb-3">
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend" title="Quantité">
                                                <span class="input-group-text" id="basic-addon1">Quantité</span>
                                              </div>
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
                                          <label><h6>Type : </h6></label> <label><h6 id="type_element"></h6></label>
                                          <div class="input-group mb-3">
                                              <input name="code_art" id="code_art" type="text" class="form-control" placeholder="Code" readonly="">

                                              <input name="lib_art" id="lib_art" type="text" class="form-control" placeholder="Libellé" readonly="">
                                            </div>
                                       </div>
                                       <div class="col-md-5">
                                        <label for="exampleFormControlInput1"><h6>A payer</h6></label>
                                        <div class="input-group mb-3">
                                          <input type="text" class="form-control text-right" name="Apayer" id="Apayer" step="0.01" readonly="" >

                                         <div class="input-group-append click-search">
                                            <span class="input-group-text">
                                              <?php echo $devise; ?>
                                            </span>
                                          </div>
                                        </div>
                                       </div>
                                     </div>

                                     <div class="row">
                                    <div class="col-md-7">
                                      <div class="form-group">
                                       <label for="remise"><h6>Remise : </h6></label>&nbsp;&nbsp;
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input devise" checked="true" >
                                          <label class="custom-control-label" for="customRadioInline1" id="devise_remise"><?php echo $devise; ?></label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input pourcentage" >
                                          <label class="custom-control-label" for="customRadioInline2" id="pourc_devise">%</label>
                                        </div>
                                       <div class="input-group mb-3">
                                        <input type="text" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="remise" id="remise" min="1" value="<?php echo number_format($remise, 2, '.', ''); ?>" step="0.01">

                                        <!--<input type="text" class="form-control text-right" aria-label="Recipient's username" aria-describedby="basic-addon2" name="remise" value="<?php echo $devise; ?>" id="remise_devise" readonly="">-->

                                        <div class="input-group-append click-search">
                                            <span class="input-group-text" id="remise_devise">
                                              <?php //echo $devise;
                                              if($unite_remise == '')
                                                {
                                                  echo $devise;
                                                }
                                                else
                                                {
                                                  echo $unite_remise;
                                                }
                                              ?>
                                            </span>
                                          </div>
                                          <!--<div class="input-group-prepend">
                                            <span class="input-group-text" id="legende_device_pour">FC</span>
                                          </div>-->
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-5">
                                      <label for="autre_devise"><h6>Dévise</h6></label>
                                      <div class="input-group mb-3">
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
                                    </div>
                                  </div>

                                  <div class="row">

                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <label for="Montpaye"><h6>Montant payé</h6></label>
                                        <div class="input-group mb-3">
                                          <input type="text" class="form-control text-right" placeholder="0.00" name="Montpaye" id="Montpaye" step="0.01" required="" value="<?php echo number_format($montantPaye, 2, '.', ''); ?>">

                                          <div class="input-group-append">
                                            <span class="input-group-text" id="devise_paie">
                                              <?php echo $devise; ?>
                                            </span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                       <label for="exampleFormControlInput1"><h6>&nbsp;</h6></label>
                                        <button type="button" class="btn btn-success btn-block" name="saveVente" id="saveVente">
                                            Enregistrer
                                        </button>
                                    </div>
                                  </div>
                                  
                                 </div>
                               </div>
                              <!--</form>-->

                              
                                
                                
                                  
                              
                          

                              

                            </div>
                            <div class="col-md-5">
                              <div class="card">
                                <h6 class="card-header">
                                  <ul class="nav nav-pills card-header-pills">
                                    <li class="nav-item">
                                      <a class="nav-link active" data-toggle="tab" href="#home2" role="tab"><h6>Mes articles</h6></a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><h6>Mes services</h6></a>
                                    </li>
                                  </ul>
                                </h6>

                                <div class="tab-content card-body" role="tablist">
                                  <div class="tab-pane fade show active p-3 mb-2 bg-white text-dark" id="home2" role="tabpanel">
                                      <div class="p-3 mb-2 bg-light text-dark border">
                                          <button type="button" class="btn btn-success" id="new-article">
                                          <span class="step size-21">
                                              <i class="icon ion-ios-filing-outline"></i>
                                          </span>
                                          &nbsp;&nbsp;Ajouter</button>
                                      </div>
                                        <table class="table table-striped table-bordered bootstrap-data-table tbody_article">
                                          <thead>
                                            <tr>
                                              <th>Code</th>
                                              <th>Libellé</th>
                                              <th></th>
                                            </tr>
                                          </thead>
                                          <tbody >
                                            <?php

                                              $view = $bdd->prepare("SELECT * FROM article_for_user WHERE idUE_art = ?");
                                              $view->execute(array($idUE));

                                              while($row = $view->fetch()) 
                                              {
                                            ?>
                                              <tr id="tr_article">
                                                <td class="code_art"><?php echo $row['code_art']; ?></td>
                                                <td class="text-left"><?php echo utf8_encode($row['libelle_art']); ?></td>
                                                <td class="text-right">
                                                    <button class="btn btn-info btn-sm insert-facture" id="<?php echo $row['id_art']; ?>">Insérer
                                                    </button>
                                                  </td>
                                              </tr>
                                            <?php 
                                                }
                                            ?>
                                          </tbody>
                                        </table>
                                      
                                      <!--<form action="" method="post">-->
                                       <!-- <div class="p-3 mb-2 bg-info text-white">
                                          <div class="input-group mb-3">
                                            <input name="code_article" id="code_articles" type="text" class="form-control" placeholder="Code" readonly="">

                                            <input name="lib_article" id="lib_articles" type="text" class="form-control" placeholder="Libellé" readonly="">
                                          </div>
                                           <div class="row">
                                              <div class="col-md-6">
                                              </div>
                                                
                                              <div class="col-md-6">
                                                <div class="input-group mb-3">
                                                  <button type="submit" id="add_article" class="btn btn-success btn-block"  name="select_art">
                                                              Insérer
                                                  </button>
                                                </div>
                                              </div>
                                            </div>
                                        </div> -->

                                       
                                      <!--</form>-->
                                    </div>

                                  <div class="tab-pane p-3 mb-2 bg-white text-dark" id="home3" role="tabpanel">
                                    <div class="p-3 mb-2 bg-light text-dark border">
                                        <button type="button" class="btn btn-success" id="new-service">
                                        <span class="step size-21">
                                                <i class="icon ion-ios-cog"></i>
                                            </span>
                                            &nbsp;&nbsp;Ajouter</button>
                                      </div>

                                      <table class="table table-striped table-bordered bootstrap-data-table tbody_article">
                                          <thead>
                                            <tr>
                                              <th>Code</th>
                                              <th>Libellé</th>
                                              <th></th>
                                            </tr>
                                          </thead>
                                          <tbody >
                                            <?php

                                              $views = $bdd->prepare("SELECT * FROM service_for_user WHERE id_UE_ser = ?");
                                              $views->execute(array($idUE));

                                              while($rows = $views->fetch()) 
                                              {
                                            ?>
                                              <tr>
                                                <td><?php echo $rows['code_ser']; ?></td>
                                                <td class="text-left"><?php echo utf8_encode($rows['lib_ser']); ?></td>
                                                <td class="text-right">
                                                    <button class="btn btn-info btn-sm insert-facture1" id="<?php echo $rows['id_ser']; ?>">Insérer
                                                    </button>
                                                  </td>
                                              </tr>
                                            <?php 
                                                }
                                            ?>
                                          </tbody>
                                        </table>


                                      <!--<form action="" method="post">-->
                                        <!--<div class="p-3 mb-2 bg-info text-white">
                                          <div class="input-group mb-3">
                                            <input name="code_service" id="code_services" type="text" class="form-control" placeholder="Code" readonly="">

                                            <input name="lib_service" id="lib_services" type="text" class="form-control" placeholder="Libellé" readonly="">
                                          </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                            </div>
                                              
                                            <div class="col-md-6">
                                              <div class="input-group mb-3">
                                                <button type="submit" id="add_service" class="btn btn-success btn-block"  name="select_serv">
                                                            Insérer
                                                </button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>-->

                                        
                                      <!--</form>-->

                                  </div>

                                </div>
                              </div>
                            </div>
                          </div>

                          
                        </div>
                        <!--Fin form_card-->





                  </div>
                </div>
              </div>
              <!-- Animated -->


            </div>


            <!--Les modales-->
            <!--debut modale new client-->
              <div class="modal fade bd-example-modal-lg ajouter-client" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Ajouter un nouveau client</h6>
                          </div>
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

             <!--les modales-->
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
                      <div class="modal-body">
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

              <!--debut modale new service-->
              <div class="modal fade bd-example-modal-lg ajouter-service" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Ajouter un nouveau service</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                        
                      </div>

                      <div class="modal-body body-modal-service">

                       <div class="card form_card">
                        <div class="card-body">

                             <div class="row">
                              <div class="col-md-6">
                                <label for="lib_ser"><h6>Désignation</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" id="lib_ser" placeholder="Entrer le libellé ou la désignation du service" name="lib_ser" required="">
                                </div>
                              </div>

                            <?php

                                $reqcatart = $bdd->prepare("SELECT * FROM categorie_service WHERE id_UE_ser = ? AND default_cat_ser != ?");
                                $reqcatart->execute(array($idUE, 1));

                                //pour les services qui n'ont pas de catégorie
                                $reqc = $bdd->prepare("SELECT * FROM categorie_service WHERE id_UE_ser = ? AND default_cat_ser = ?");
                                $reqc->execute(array($idUE, 1));
                                $aucune_cat = $reqc->fetch();

                            ?>

                              <div class="col-md-6">
                               <label><h6>Catégorie</h6></label>
                                <div class="input-group mb-3">
                                  <select class="custom-select" id="cat_ser" name="cat_ser">
                                    <option value="<?php echo $aucune_cat['id_cat_ser']; ?>" selected="">Sélectionner une catégorie de service</option>
                                    <option value="<?php echo $aucune_cat['id_cat_ser']; ?>">Aucune</option>
                                    <?php
                                        while($categorie = $reqcatart->fetch()) 
                                        {
                                    ?>
                                    <option value="<?php echo $categorie['id_cat_ser']; ?>"><?php echo $categorie['lib_cat_ser']; ?></option>
                                    <?php }?>
                                  </select>
                                  <div class="input-group-append">
                                    <button class="btn btn-info" type="button" id="new_categorie_service" data-toggle="modal" data-target=".ajouter-categorie-service">Nouvelle</button>
                                  </div>
                                </div>
                              </div>
                            </div>

                              <div class="form-group">
                                <label for="remarque_ser"><h6>Remarques</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" id="remarque_ser" placeholder="Entrer une remarque pour le service" name="remarque_ser" required="">
                                </div>
                              </div>

                        </div>
                      </div>

                       <form id="modal-form1">
                         <div class="card form_card">
                          <div class="card-body">

                               <!--<div class="row">
                                <div class="col-md-6">
                                  <label for="prix_ht_s"><h6>Prix de vente HTVA</h6></label>
                                  <div class="input-group mb-3">
                                    <input name="prix_ht_s" type="number" class="form-control text-right" placeholder="0.00" value="0.00" step="0.01" id="prix_ht_s">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><?php echo $devise; ?></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="taux_tva_s"><h6>Taux TVA</h6></label>
                                  <div class="input-group mb-3">
                                    <input name="taux_tva_s" type="number" class="form-control text-right" value="20.00" step="0.01" id="taux_tva_s">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text">%</span>
                                    </div>
                                  </div>
                                </div>
                              </div>-->

                              <!--<div class="form-group">
                                  <label for="prix_ttc"><h6>Prix de vente TTC</h6></label>
                                    <div class="input-group mb-3">
                                      <input name="prix_ttc" type="number" placeholder="0.00" class="form-control text-right" value="0.00" step="0.01" id="prix_ttc">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo $devise; ?></span>
                                      </div>
                                    </div>
                                </div>-->

                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <label for="prix_ttc_s"><h6>Prix de vente TTC</h6></label>
                                        <div class="input-group mb-3">
                                          <input name="prix_ttc_s" type="text" placeholder="0.00" class="form-control text-right" id="prix_ttc_s" value="0">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text"><?php echo $devise; ?></span>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-md-6">
                                        <label><h6>&nbsp;</h6></label>
                                        <button type="button" class="btn btn-success btn-block" id="addtva_ser">
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
                                  <div class="col-md-6 viewtva_ser">
                                    <label for="prix_ht_s"><h6>Prix de vente HTVA</h6></label>
                                    <div class="input-group mb-3">
                                      <input name="prix_ht_s" type="text" class="form-control text-right" placeholder="0.00" id="prix_ht_s" value="0">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text"><?php echo $devise; ?></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6 viewtva_ser">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label for="taux_tva_s"><h6>Taux TVA</h6></label>
                                        <div class="input-group mb-3">
                                          <input name="taux_tva_s" type="text" class="form-control text-right" placeholder="0.00" id="taux_tva_s" value="0">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text">%</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label><h6>&nbsp;</h6></label>
                                        <button type="button" class="btn btn-danger btn-block" id="removetva_ser">Annuler la TVA</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                          </div>
                         </div>
                       </form>
                      </div>

                       <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                              <i class="icon ion-ios-undo"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Annuler
                        </button>
                        <button type="bouton" class="btn btn-primary" name="saveser" id="saveser">
                            <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Enregistrer
                        </button>
                      </div>

                    </div>
                </div>
              </div>
              <!--fin modale new service-->

              <!--Ajouter une catégorie de service -->
              <div class="modal fade ajouter-categorie-service" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="myModalLabel">Ajouter une catégorie de services</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                        
                      </div>
                      <div class="modal-body">
                        <label for="libelleser"><h6>Désignation</h6></label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-inbox.png"></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Entrer le libellé de votre catégorie de services" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libelleser" id="libelleser" required="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                            <i class="icon ion-android-cancel"></i>
                          </span>
                          &nbsp;&nbsp;Annuler</button>
                        <button type="submit" class="btn btn-primary" name="addcatser" id="addcatser"> 
                          <span class="step size-21">
                            <i class="icon ion-archive"></i>
                          </span>
                          &nbsp;&nbsp;Enregistrer</button>
                      </div>
                    </div>
                  
                </div>
              </div>
              <!--Modal pour l'insertion d'une nouvelle catégorie de service-->

              <!--pour le paiement-->
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
                          <div class="p-3 mb-2 text-dark border form_card">
                            <div class="row">
                              <div class="col-md-6">
                                <label for="Apyer2"><h6>A payer</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="Apayer2" id="Apayer2" disabled="">
                                  <div class="input-group-append">
                                      <span class="input-group-text" id="remise_devise">
                                        <?php echo $devise; ?>
                                      </span>
                                    </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="reste"><h6>Reste</h6></label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control text-right" placeholder="0.00" aria-label="Recipient's username" aria-describedby="basic-addon2" name="reste" id="reste" disabled="">
                                  <div class="input-group-append">
                                      <span class="input-group-text" id="remise_devise">
                                        <?php echo $devise; ?>
                                      </span>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <br>

                          <div class="row">
                            <div class="col-md-6">
                              <div class="card">
                                <div class="card-body form_card">

                                  <label for="id_mpaie"><h6>Mode de paiement</h6></label>
                                  <div class="input-group mb-3">
                                    <select class="custom-select" id="id_mpaie">
                                      <option value="" selected="">Choissir un mode de paiement</option>
                                      <option value="" >Dette</option>
                                      <?php

                                        $viewcmp = $bdd->prepare("SELECT * FROM compte_financier WHERE id_UE_cmp = ?");
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
                              </div>
                              <br>
                            </div>

                            <div class="col-md-6">
                              
                              <div class="card">
                                <div class="card-body form_card">
                                  <label for="autre_devise"><h6>Dévise</h6></label>
                                  <div class="input-group mb-3">
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

                                  <label for="Montpaye"><h6>Montant payé</h6></label>
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

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Fermer</button>
                          <button type="button" class="btn btn-success btn-lg" name='payer' id="payer">Valider</button>
                        </div>
                    </div>
                  </div>
                  </div>
              </div>
             

                


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
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.vente').addClass('active');

            affiche_designation();
             //setInterval(affiche_designation, 2500);
            //cette méthode nous permet l'affichage des articles et services dans la facture lorsqu'on inser

             function affiche_designation()
              {
                var idoffre = '<?php echo $idoffre; ?>';
                $.post('fonction/recup_devis.php', {idoffre:idoffre}, function(data)
                {
                  $('#tbody_fac').html(data);
                });
              }


            //on inser les articles dans la facture
            $('.insert-facture').click(function()
              {
                var id_article = $(this).attr('id');
                var idUE = '<?php echo $idUE; ?>';
                var idoffre = '<?php echo $idoffre; ?>';

                    $.ajax({
                    type : 'POST',
                    url : 'fonction/select_article_devis.php',
                    data : "id_article=" + id_article + "&idUE=" + idUE + "&idoffre=" + idoffre,
                    success:function(data)
                    {
                      //alert(data);
                    valid3('Article inséré avec succès !');
                    affiche_designation();
                    calcul_tota_ttc();
                    }
                  });

              });

            //on inser les services dans la facture
            $('.insert-facture1').click(function()
              {
                var id_service = $(this).attr('id');
                var idUE = '<?php echo $idUE; ?>';
                var idoffre = '<?php echo $idoffre; ?>';

                  $.ajax({
                  type : 'POST',
                  url : 'fonction/select_service_devis.php',
                  data : "id_service=" + id_service + "&idUE=" + idUE + "&idoffre=" + idoffre,
                  success:function(data)
                  {
                    //alert(data);
                    
                      valid3('Service inséré avec succès !');
                      affiche_designation();
                      calcul_tota_ttc();
                  }
                });

              });

            //on calcul le total_ttc de la facture et on recharge la page à chaque 500 miliseconde 
            calcul_tota_ttc();
            //setInterval(calcul_tota_ttc, 500);
            //ici nous calculons instatanement la somme du prix TTC de la facture
            function calcul_tota_ttc()
            {
              var idoffre = '<?php echo $idoffre; ?>';
              $.post('fonction/calcul_total_ttc_devis.php', {idoffre:idoffre}, function(data)
              {
                $('#total_ttc').val(data);
                $('#Apayer').val(data);
                //$('#Apayer').attr("placeholder", data);
              });
            }


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
                  $('#type_element').text(this.cells[2].innerHTML);
                  //document.getElementById("qt_article").value = this.cells[3].innerHTML;
                }
              }
            }

            //on augemente la quantité de l'article avec le bouton add
            $('#add_qt').click(function()
              {
                var code_designation = $('#code_art').val();
                var designation = $('#lib_art').val();
                //var quantite = $('#qt_article').val();
                var idoffre = '<?php echo $idoffre; ?>';
                var type_element = $('#type_element').text();

                if(code_designation != '' && designation != '')
                {
                  $.ajax({
                    type: "POST",
                    url: "fonction/add_quantite_devis.php",
                    data: "code_designation=" + code_designation + "&designation=" + designation + "&idoffre=" + idoffre + 
                          "&type_element=" + type_element,
                    success:function(data)
                    {
                      //$('#qt_article').val(data);
                      affiche_designation();
                      $('#remise').val('');
                      calcul_tota_ttc();

                    }
                  });
                }
                else
                {
                  err1();
                }

              });

            //on diminue la quantité de l'article avec le bouton add
            $('#remove_qt').click(function()
              {
                var code_designation = $('#code_art').val();
                var designation = $('#lib_art').val();
                //var quantite = $('#qt_article').val();
                var idoffre = '<?php echo $idoffre; ?>';
                var type_element = $('#type_element').text();

                if(code_designation != '' && designation != '')
                {
                  $.ajax({
                    type: "POST",
                    url: "fonction/remove_quantite_devis.php",
                    data: "code_designation=" + code_designation + "&designation=" + designation + "&idoffre=" + idoffre + 
                          "&type_element=" + type_element,
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
                        calcul_tota_ttc();
                        affiche_designation();
                      }
                    }
                  });
                }
                else
                {
                  err1();
                }

              });

            //ici on supprime un élément dans la facture
            $('#delete_art').click(function()
              {
                var code_designation = $('#code_art').val();
                var designation = $('#lib_art').val();
                var idoffre = '<?php echo $idoffre; ?>';
                var type_element = $('#type_element').text();

                if(code_designation != '' && designation != '')
                {
                  $.ajax({
                    type: "POST",
                    url: "fonction/delete_element_devis.php",
                    data: "code_designation=" + code_designation + "&designation=" + designation + "&idoffre=" + idoffre + 
                          "&type_element=" + type_element,
                    success:function(data)
                    {
                      $('#code_art').val('');
                      $('#lib_art').val('');
                      $('#type_element').text('');
                      calcul_tota_ttc();
                      affiche_designation();
                    }
                  });
                }
                else
                {
                  err1();
                }
              });

            //calcul de la remise automatiquement 
            $('#remise').keyup(function()
              {
                var remise = $('#remise').val();
                var Apayer = $('#total_ttc').val();
                var devise = $('.devise');
                var pourcentage = $('.pourcentage');

                if(pourcentage.is(':checked')) //on vérifie si l'utilisateur à cliquer sur devise
                  {
                      var paie = parseFloat(Apayer.replace(',', '.')); //on essaye de remplacer la virgule par le point
                      var temp = (remise/100).toFixed(2);
                      var montant = (paie * temp).toFixed(2);
                      var resultat = (paie - montant).toFixed(2);
                      $('#Apayer').val(resultat);
                  }
                  if(devise.is(':checked'))
                  {
                     var paie = parseFloat(Apayer.replace(',', '.'));
                     var montant = (paie - remise).toFixed(2);
                     $('#Apayer').val(montant);
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
                }
                if(pourcentage.is(':checked'))
                {
                   var paie = parseFloat(Apayer.replace(',', '.'));
                   var montant = (paie - remise).toFixed(2);
                   $('input[name="Apayer"]').val(montant);
                }
              }

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

              //modal client 
              $('#new-client').click(function()
                {
                  $('.ajouter-client').modal('show');
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

                                    valid3('Nouveau client ajouté avec succès');
                                    $('.ajouter-client').modal('hide');

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
              $('#addtva_ser').click(function()
                {
                  $('.viewtva_ser').css('display', 'block');
                  $('.body-modal-service').css('height', '515px');

                  var idUE = '<?php echo $idUE; ?>';

                  $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/getTVA.php', 
                    data  : 'idUE=' + idUE,
                    success:function(data)
                    {
                      //alert(data);
                      $('#taux_tva_s').val(data);
                      calcule_ht_ttc1(event);
                    }
                  });
                });

               //lorsqu'on annule la TVA
              $('#removetva_ser').click(function()
                {
                  $('.body-modal-service').css('height', '420px');
                  $('.viewtva_ser').css('display', 'none');
                  $('#taux_tva_s').val('0');
                  calcule_ht_ttc1(event);
                });

              //modal service
              $('#new-service').click(function()
                {
                  $('.ajouter-service').modal('show');
                });

              //ajouter une catégorie de service
              $('#new_categorie_service').click(function()
                {
                  $('.ajouter-categorie-service').modal('show');
                });

              //ajouter un nouveau service
              $('#saveser').click(function()
                {
                  var lib_ser = $('#lib_ser').val();
                  var cat_ser = $('#cat_ser').val();
                  var remarque_ser = $('#remarque_ser').val();
                  var prix_ht = $('#prix_ht_s').val();
                  var taux_tva = $('#taux_tva_s').val();
                  var prix_ttc = $('#prix_ttc_s').val();
                  
                  var getprenom = '<?php echo $getprenom; ?>';
                  var getname = '<?php echo $getname; ?>';
                  var idUE = '<?php echo $idUE; ?>';

                  
                  if(lib_ser != '')
                    {
                      if(/^[0-9]+[.][0-9]+/.test(prix_ht) || /^[0-9]+/.test(prix_ht) || prix_ht == '')
                      {
                        if(/^[0-9]+[.][0-9]+/.test(taux_tva) || /^[0-9]+/.test(taux_tva) || taux_tva == '')
                        {
                          if(/^[0-9]+[.][0-9]+/.test(prix_ttc) || /^[0-9]+/.test(prix_ttc) || prix_ttc == '')
                          {
                            $.ajax(
                              {
                                  type : 'POST',
                                  url : 'fonction/add_new_service.php',
                                  data : "lib_ser=" + lib_ser + "&cat_ser=" + cat_ser + 
                                          "&remarque_ser=" + remarque_ser + "&prix_ht=" + prix_ht + 
                                          "&taux_tva=" + taux_tva + "&prix_ttc=" + prix_ttc + 
                                          "&getprenom=" + getprenom + 
                                          "&getname=" + getname + "&idUE=" + idUE,
                                  success:function(data)
                                  {
                                    //alert(data);
                                    if(data == 1)
                                    {
                                      err3("Ce service existe déjà !");
                                      $('#lib_ser').addClass('is-invalid');
                                    }
                                    else
                                    {
                                      $('#lib_ser').removeClass('is-invalid');
                                      $('#prix_ht_s').removeClass('is-invalid');
                                      $('#prix_ttc_s').removeClass('is-invalid');
                                      $('#taux_tva_s').removeClass('is-invalid');

                                      $('#lib_ser').val('');
                                      $('#prix_ht_s').val('');
                                      $('#prix_ttc_s').val('');
                                      $('#taux_tva_s').val('');
                                      $('#remarque_ser').val('');
                                      $('#cat_ser').val('');
                                      
                                      valid3('Nouveau service inséré avec succès !');
                                      $('.ajouter-service').modal('hide');
                                      setTimeout(function()
                                      {
                                        window.location.reload();
                                      }, 5000);
                                    }
                                    //affiche_service();
                                  }
                              });  
                          }
                          else
                          {
                            $('#prix_ttc').addClass('is-invalid');
                            err3("Le prix de vente TTC du service saisie n'est pas valide!");
                          }
                        }
                        else
                        {
                          $('#taux_tva_s').addClass('is-invalid');
                          err3("Le taux TVA du service saisie n'est pas valide!");
                        }
                      }
                      else
                      {
                        $('#prix_ht_s').addClass('is-invalid');
                        err3("Le prix de vente HTVA du service saisie n'est pas valide!");
                      }
                    }
                    else
                    {
                      $('#lib_ser').addClass('is-invalid');
                      err3('Veuillez remplir le libellé du service S.V.P!'); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                    }

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

               //on calcul le taux tva pour l'ajout des services
               //on calcul le taux tva pour l'ajout des services
              function calcule_ht_ttc1(event) // fonction de calcul
              {
                var prix_ht = $('input[name="prix_ht_s"]').val();
                var taux_tva  = $('input[name="taux_tva_s"]').val();
                var prix_ttc = $('input[name="prix_ttc_s"]').val();
                
                if(event.target.name=='prix_ttc_s')
                {
                  var new_prix_ht = (prix_ttc/(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ht_s"]').val(new_prix_ht);
                }
                else
                {
                  var new_prix_ttc = (prix_ht*(1+taux_tva/100)).toFixed(2);   
                  $('input[name="prix_ttc_s"]').val(new_prix_ttc);
                } 
              }

              $('#modal-form1').bind('keyup mouseup', calcule_ht_ttc1);

              
              //lorsqu'on appui sur le bouton nouvelle  catégorie  d'article
              $('#new_categorie').click(function()
                {
                  $('.ajouter-article').modal('hide');
                  //$('.ajouter-categorie-article').modal('show');
                });

              //ajout du catégorie d'article
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
              
               //lorsqu'on appui sur le bouton nouvelle SOUS catégorie  d'article
              $('#new_sous_categorie').click(function()
                {
                  $('.ajouter-article').modal('hide');
                  //$('.ajouter-sous-categorie-article').modal('show');
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


                 //lorsqu'on appui sur le bouton nouvelle  catégorie  d'article
           $('#new_categorie_service').click(function()
                {
                  $('.ajouter-service').modal('hide');
                  //$('.ajouter-categorie-service').modal('show');
                });
                

            //ajout du catégorie service
            $('#addcatser').click(function()
              {
                var libelleser = $('#libelleser').val();
                var idUE = '<?php echo $idUE; ?>';

                if(libelleser != '')
                {
                  $.ajax({
                    type : 'POST',
                    url : 'fonction/add_new_categorie_service.php',
                    data : "libelleser=" + libelleser +  
                           "&idUE=" + idUE,
                    success:function(data)
                    {
                      //alert(data);
                      if(data == 1)
                      {
                        err3("Cette catégorie de service existe déjà !");
                        $('#libelleser').addClass('is-invalid');
                      }
                      else
                      {
                        $('#libelleser').removeClass('is-invalid');
                        valid3('Nouvelle catégorie service inséré avec succès !');
                        $('.ajouter-categorie-service').modal('hide');
                        setTimeout(function()
                        {
                          window.location.reload();
                        }, 5000);
                      }
                      //affiche_cat_service();
                    }
                  });
                }
                else
                {
                  $('#libelleser').addClass('is-invalid');
                  err3("Veuillez entrer le libellé du catégorie de service S.V.P!");
                }
              });

           //initialisation du datatable
           $('.bootstrap-data-table').DataTable({
                lengthMenu: [[5, 10, 20, 50,-1], [5, 10, 20, 50, "Tout"]],
                "language": {
                  "lengthMenu": "Afficher _MENU_ premiers",
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


              },

            });
           

           //lorsqu'on clique sur le bouton paiement
            $('#paiement').click(function()
              {
                //affiche_article();

                var Apayer = $('#Apayer').val();
                var total_ttc = $('#total_ttc').val();
                //var reste = $('#reste').val();
                //var rembours = $('#rembours').val();

                  $('#reste').val(Apayer);
                  $('#Apayer2').val(Apayer);

                  //$('#get-paiement').modal('show');
                
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

            //on enregistre la vente
              $('#saveVente').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var idClient = $('#id-client').val(); 
                  var idoffre = '<?php echo $idoffre; ?>';

                  var date = $('#date').val();
                  var date_echeance = $('#date_echeance').val();

                  var total_ttc = $('#total_ttc').val();
                  var remise = $('#remise').val();
                  var remise_devise = $('#remise_devise').text();
                  var Apayer = $('#Apayer').val();
                  var Montpaye = $('#Montpaye').val();
                  var autre_devise = $('#autre_devise').val();
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var note = $('#note').val();
                  var objet = $('#objet').val();

                  if(/^[0-9]+[.][0-9]+/.test(Montpaye) || /^[0-9]+/.test(Montpaye) || Montpaye == '')
                  {
                    if(idClient != '')
                    {
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

                            if(taux_echange > Apayer)
                            {
                              err3('Le montant payé ne peut être supérieur au total à payer !');
                              $('#Montpaye').addClass('is-invalid');
                              $('#autre_devise').addClass('is-invalid');
                            }
                            else
                            {
                              $.ajax({
                                type : 'POST',
                                url : 'fonction/save_devis.php',
                                data : "idoffre=" + idoffre + "&date=" + date + 
                                        "&date_echeance=" + date_echeance + "&remise=" + remise + 
                                        "&taux_echange=" + taux_echange + "&resteApayer=" + resteApayer + 
                                        "&remise_devise=" + remise_devise + '&idUE=' + idUE + '&note=' + note + '&objet=' + objet + "&Apayer=" + Apayer + '&idClient=' + idClient,
                                success:function(data)
                                {
                                  //alert(data);
                                  if(data != 1)
                                  {
                                    err3("Veuillez au moins insérer un artcle ou un service, car la facture ne peut pas être vide !");
                                  }
                                  else
                                  {
                                    window.location.href = 'facturation_devis_finish.php?id=' + getid + '&id_connexion=' + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE + "&idoffre=" + idoffre;
                                  }
                                }
                              });
                            }
                          }
                        });
                    }
                    else
                    {
                      $('#id-client').addClass('is-invalid');
                      err3("Veuillez sélectionner le client S.V.P !");
                    }
                  }
                  else
                  {
                    $('#Montpaye').addClass('is-invalid');
                    err3("Le montant à payé saisie n'est pas valide !");
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
