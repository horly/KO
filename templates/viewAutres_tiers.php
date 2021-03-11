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
        }

        thead, tbody tr, tfoot
        {
          display:table;
          width:100%;
          table-layout:fixed;
        }

        thead tr
        {
          cursor: pointer;
        }

        thead, tfoot 
        {
            width: calc( 100% - 1em )
        }

      tr:nth-child(even) {background-color: #d1ecf1;}
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


      .form_card
        {
          background-color: #d1ecf1;
        }

        #apercu_creance,  #apercu_dette
      {
        overflow-y: auto;
          height: 570px;
          background-color: white;
      }


      .body-modal-autres-tiers
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        #adresstr
      {
        height: 126px;
      }
      .contact
      {
        background-color: #d1ecf1;
      }
      

    </style>
        

         <title>KEDIS Online! | Contacts | Détails autres tiers</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 
                    //session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['id_autr']))  //si la variable id qu'on a transité existe dans l'url 
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

                          $id_autr = $_GET['id_autr']; //on récupère l'id du client


                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];



                          if(isset($_POST['delete_autre_tiers']))
                          {
                            $deletereq = $bdd->prepare("DELETE FROM autres_tiers WHERE id_tr = ?");
                            $deletereq->execute(array($id_autr));

                            header('location:autres_tiers.php?id='.$getid."&id_connexion=".$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE);
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

            $reqfournis = $bdd->prepare("SELECT * FROM autres_tiers WHERE id_tr = ?");
            $reqfournis->execute(array($id_autr));

            $infofournis = $reqfournis->fetch();

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
                                        <li><a href="autres_tiers.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes autres tiers</a></li>
                                        <li class="active">Détails autre tiers</li>
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
                    <h6>Détails autre tiers</h6>
                  </div>
                  <div class="card-body">
                    <?php

                      //si l'autres tiers n'est pas par défault alors, on affiche les bouttons supprimer et modifier
                      if($infofournis['default_tr'] != 1)
                      {
                    ?>
                    <div class="row">
                      <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#update">
                          <span class="step size-21">
                            <i class="icon ion-edit"></i>
                          </span>
                          &nbsp;&nbsp;Modifier
                        </button>
                      </div>
                      <div class="col-md-2">
                        <?php
                          //on vérifie si le client a déjà des opérations effectuées pour la créance 
                          $verif_op = $bdd->prepare("SELECT * FROM creance_for_user WHERE id_autre_tier_cre = ? AND id_UE_cre = ?");
                          $verif_op->execute(array($id_autr, $idUE));
                          $count_op = $verif_op->rowCount();


                          //on vérifie si le client a déjà des opérations effectuées pour la dette 
                          $verif_op2 = $bdd->prepare("SELECT * FROM dette_for_user WHERE id_autre_tier_det = ? AND id_UE_det = ?");
                          $verif_op2->execute(array($id_autr, $idUE));
                          $count_op2 = $verif_op2->rowCount();

                          //on vérifie si le client a déjà des opérations effectuées pour les notes de frais
                          $verif_op4 = $bdd->prepare("SELECT * FROM note_de_frais WHERE id_tiers_fr = ? AND id_UE_fr = ?");
                          $verif_op4->execute(array($id_autr, $idUE));
                          $count_op4 = $verif_op4->rowCount();

                          if(preg_match("/^[1-9]+/", $count_op) || preg_match("/^[1-9]+/", $count_op2) || preg_match("/^[1-9]+/", $count_op4))
                          {

                        ?>
                          <!--On affiche rien-->
                        <?php
                          }
                          else
                          {
                        ?>

                          <button type="button" class="btn btn-danger btn-block" id="delete_autre_tiers">
                            <span class="step size-21">
                              <i class="icon ion-ios-trash"></i>
                            </span>
                            &nbsp;&nbsp;Supprimer
                          </button>
                          <?php
                            }
                          ?>

                      </div>
                      <div class="col-md-8"></div>
                    </div>
                    <?php
                      }
                    ?>
                    <div id="detail_content">
                      
                    </div>
                       
                  </div>
                </div>
              </div>
              <!-- Animated -->

            </div>

              <!--debut modale new autres tiers-->
              <div class="modal fade bd-example-modal-lg ajouter-autres-tiers" id="update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Modifier un autre tiers</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                            
                      </div>

                      <div class="modal-body body-modal-autres-tiers">

                        <div class="card form_card">
                          <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="soctr"><h6>Nom Entreprise</h6></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/briefcase.png"></span>
                                        </div>
                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'entreprise de l'autre tiers" name="soctr" id="soctr" value="<?php echo $infofournis['societe_tr']; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                  <label for="tvatr"><h6>N° Entreprise ou TVA</h6></label>
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/checkmark-circled.png"></span>
                                      </div>
                                      <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro d'entreprise de l'autre tiers" name="tvatr" id="tvatr" value="<?php echo $infofournis['tva_tr']; ?>">
                                  </div>
                                </div>
                                </div>
                              </div>

                               <div class="row">
                                <div class="col-md-6">
                                  <label for="prenomtr"><h6>Prénom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Conctat prénom de l'autre tiers" name="prenomtr" id="prenomtr" value="<?php echo $infofournis['prenom_tr']; ?>">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <label for="nomtr"><h6>Nom</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                    </div>
                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Contact nom de l'autre tiers" name="nomtr" id="nomtr" value="<?php echo $infofournis['nom_tr']; ?>">
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
                                      <label for="adresstr"><h6>Adresse :</h6></label>
                                      <textarea class="form-control" id="adresstr" rows="2" placeholder="Adresse de l'autre tiers" name="adresstr" required=""><?php echo $infofournis['adresse_tr']; ?></textarea>
                                    </div> 
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="teltr"><h6>Téléphone</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-call.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro téléphone de l'autre tiers" name="teltr" id="teltr" value="<?php echo $infofournis['tel_tr']; ?>">
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label for="postaletr"><h6>Code postale</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale de l'autre tiers" name="postaletr" id="postaletr" value="<?php echo $infofournis['code_post_tr']; ?>">
                                      </div>
                                    </div>
                                  </div>

                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="villetr"><h6>Ville</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville de l'autre tiers" name="villetr" id="villetr" value="<?php echo $infofournis['ville_tr']; ?>">
                                      </div>
                                    </div>    
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="deptr"><h6>Département / Etat / Province</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-system-home.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le département de l'autre tiers"  name="deptr" id="deptr" value="<?php echo $infofournis['departement_tr']; ?>">
                                      </div>
                                    </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="paystr"><h6>Pays</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                                          </div>
                                          <select class="custom-select" name="paystr" id="paystr">
                                              <option value="<?php echo $infofournis['pays_tr']; ?>" selected><?php echo $infofournis['pays_tr']; ?></option>
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
                                       <label for="emailtr"><h6>Adresse email</h6></label>
                                  <div class="input-group mb-3">
                                     <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                                      </div>
                                      <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'email de l'autre tiers"  name="emailtr" id="emailtr" value="<?php echo $infofournis['email_tr']; ?>">
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
                        <button type="submit" class="btn btn-primary" name="savefour" id="savetr">
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

               <!-- confirme Modal -->
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-secondary text-white">
                    <h6 class="modal-title" id="exampleModalLabel">Confirmation</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body bg-light text-dark">
                    <div class="bs-callout bs-callout-warning">
                      <div class="row">
                        <div class="col-md-8">
                          <h5 class="text-warning">Attention !</h5>
                          <h6>Voulez-vous vraiment supprimer cet autre tiers ?</h6>
                        </div>
                        <div class="col-md-4 text-center">
                            <img width="100" height="100" class="icone" src="../icons/png/office/warning.png">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <form action="" method="post">
                      <button type="submit" class="btn btn-primary" name="delete_autre_tiers" id="delete_autre_tiers">Oui</button>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- fin confirme Modal -->

            <!-- Modal détail transaction créance-->
              <div class="modal fade" id="modal_apercu_creance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header badge-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLabel">Aperçu transaction créance</h6>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                      </div>
                    </div>
                    <div class="modal-body" id="apercu_creance">
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal détail transaction créance -->

              <!-- Modal détail transaction dette-->
              <div class="modal fade" id="modal_apercu_dette" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header badge-secondary text-white">
                      <div class="row">
                        <div class="col-md-10">
                          <h6 class="modal-title" id="exampleModalLabel">Aperçu transaction dette</h6>
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
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal détail transaction dette-->
             

                


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

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">

          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.contacts').addClass('active');

            affiche_detail(); 

              function affiche_detail()
              {
                
                var id_autr = '<?php echo $id_autr; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/detail_autres_tiers.php',
                  data : 'id_autr=' + id_autr + '&devise=' + devise,
                  success:function(data)
                  {
                    $('#detail_content').html(data);
                  }
                });
              }

              function delete_autre_tiers()
              {
                var id_autr = '<?php echo $id_autr; ?>';

                $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/delete_autre_tiers.php',
                  data  : 'id_autr=' + id_autr, 
                  success:function(data)
                  {
                    
                  }
                });
              }

              //supprimer autres tiers
             $('#delete_autre_tiers').click(function()
              {

                var id_autr = '<?php echo $id_autr; ?>';
                var getid = '<?php echo $getid; ?>';
                var id_connexion = '<?php echo $id_connexion; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomUE = '<?php echo $nomUE; ?>';
                var nomE = '<?php echo $nomE; ?>';

                swal({
                        title: "Confirmer !",
                        text: "Voulez-vous vraiment supprimer cet autre tiers ?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#28a745",
                        confirmButtonText: "Oui",
                        cancelButtonText: "Non",
                        closeOnConfirm: false
                        },
                        function(){
                            //swal("Supprimé !!", "L'utilisateur a été supprimé avec succès !!", "success");
                            delete_autre_tiers();
                            swal(
                              {
                                title: "Supprimé !!",
                              text: "Autre tiers supprimé avec succès !!",
                              type: "success",
                              confirmButtonColor: "#28a745",
                              }, function(){ window.location = 'autres_tiers.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE; });
                        });
              });


               //mettre à jour un autre tiers
              $('#savetr').click(function()
                {
                  //var civilite = $('#civilite').val();
                  //var fidelitecard = $('#fidelitecard').val();
                  var nomtr = $('#nomtr').val();
                  var prenomtr = $('#prenomtr').val();
                  var soctr = $('#soctr').val();
                  var tvatr = $('#tvatr').val();
                  var adresstr = $('#adresstr').val();
                  var teltr = $('#teltr').val();
                  var postaletr = $('#postaletr').val();
                  var villetr = $('#villetr').val();
                  var deptr = $('#deptr').val();
                  var paystr = $('#paystr').val();
                  var emailtr = $('#emailtr').val();
                  var idUE = '<?php echo $idUE; ?>';
                  var id_autr = '<?php echo $id_autr; ?>';


                  if(soctr != '')
                  {
                    if(emailtr != '')
                    {
                      if(paystr != '')
                      {
                        if(/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(prenomtr))
                        {
                          if(/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(nomtr))
                          {
                            if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(emailtr))
                            {
                              $.ajax(
                              {
                                type  : 'POST',
                                url   : 'fonction/update_autres_tiers.php',
                                data  : "prenomtr=" + prenomtr + "&nomtr=" + nomtr + 
                                        "&soctr=" + soctr + "&tvatr=" + tvatr + 
                                        "&adresstr=" + adresstr + "&teltr=" + teltr + 
                                        "&postaletr=" + postaletr + "&villetr=" + villetr + 
                                        "&deptr=" + deptr + "&paystr=" + paystr + 
                                        "&emailtr=" + emailtr + "&idUE=" + idUE + '&id_autr=' + id_autr,
                                success:function(data)
                                {
                                  //alert(data);
                                  $('#nomtr').removeClass('is-invalid');
                                  $('#prenomtr').removeClass('is-invalid');
                                  $('#soctr').removeClass('is-invalid');
                                  $('#emailtr').removeClass('is-invalid');


                                  valid3('Autre tiers mis à jour avec succès');
                                  $('.ajouter-autres-tiers').modal('hide');

                                  setTimeout(function()
                                  {
                                    window.location.reload();
                                  }, 5000);
                                  
                                  affiche_detail();
                                }
                              });
                            }
                            else
                            {
                              $('#emailtr').addClass('is-invalid');
                              err3("L'adresse émail du fournisseur saisie n'est pas valide !");
                            }
                          }
                          else
                          {
                            $('#nomtr').addClass('is-invalid');
                            err3("Le nom pour le conctact de l'autre tiers saisie n'est pas valide !");
                          }
                        }
                        else
                        {
                          $('#prenomtr').addClass('is-invalid');
                          err3("Le prénom pour le contct de l'autre tiers saisie n'est pas valide !");
                        }
                      }
                      else
                      {
                        $('#paystr').addClass('is-invalid');
                        err3("Veuillez Sélectionner un pays S.V.P !");
                      }
                    }
                    else
                    {
                      $('#emailtr').addClass('is-invalid');
                      err3("Veuillez saisir l'adresse émail de l'autre tiers S.V.P!");
                    }
                  }
                  else
                  {
                    $('#soctr').addClass('is-invalid');
                    err3("Veuillez saisir le nom de l'entreprise de l'autre tiers S.V.P!");
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
