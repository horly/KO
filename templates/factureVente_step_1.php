<!doctype html>
<!--Début html-->
<html lang="fr">
<!--Début html-->
    <head>
    <!--Début head-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../asserts/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../asserts/css/dashboard.css" >

        <!--Style personnel-->
        <link rel="stylesheet" href="../asserts/css/style.css" >
        
        <!--Chargement des styles pour les icones des reseaux socio-->
        <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <link rel="stylesheet" href="../asserts/css/docs.css" >
        <link rel="stylesheet" href="../asserts/css/font-awesome.css" >

         <!--chargement des icones-->
        <link href="../icons/css/ionicons.css" rel="stylesheet" type="text/css" />
        <link href="../icons/css/iconstyles.css" rel="stylesheet" type="text/css" />

        <title>KEDIS ONLINE | Mes ventes | étapes 1</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body>
    <!--Début body-->
    <style type="text/css">

        section {
        position: relative;
        padding-top: 37px;
         border: 1px solid lightgray;
        background: #17a2b8;
      }
      section.positioned {
        position: absolute;
        top:100px;
        left:100px;
        width:800px;
        box-shadow: 0 0 15px #333;
      }
      .container-tab {
        overflow-y: auto;
        height: 200px;
        background-color: white;
      }
      table {
        border-spacing: 0;
        width:100%;
      }

      /*td + td {
        border-left:1px solid lightgray;
      }*/
      td, th {
        /*border-bottom:1px solid lightgray;*/
        /*background:  #d1ecf1;*/
        padding: 10px 25px;
      }
      tr:nth-child(even) {background-color: #d1ecf1;}
      tr:hover{ background-color: #F1F1F1;  }
      th {
        height: 0;
        line-height: 0;
        padding-top: 0;
        padding-bottom: 0;
        color: transparent;
        border: none;
        white-space: nowrap;
      }
      th div{
        position: absolute;
        background: transparent;
        color: #fff;
        padding: 9px 25px;
        top: 0;
        margin-left: -25px;
        line-height: normal;
        /*border-left: 1px solid lightgray;*/
      }
      th:first-child div{
        border: none;
      }

      #table_client tr
      {
        cursor: pointer;
        transition: all .25s ease-in-out;
      }

      #tab_facture td + td {
        border-left:1px solid lightgray;
      }

      #tab_facture td, th 
      {
        border-bottom:1px solid lightgray;
      }

      .vente
      {
        background-color: #d1ecf1;
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

      .cards
      {
        background-color: #d1ecf1;
      }
    </style>

        <!--Code PHP-->
                <?php 
                    session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']))  //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; //on protège la variable 
                      $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
                      $requser->execute(array($getid));

                      $userfos = $requser->fetch();
                      $getname = $userfos['nom_cl'];
                      $getprenom = $userfos['prenom_cl'];
                      $getmail = $userfos['email_cl'];
                      $getprofil = $userfos['profil_cl']; 
                      $sexe= $userfos['sexe_cl'];
                      $login_required = $userfos['login_required'];

                      //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                      if($login_required == 1)
                      {

                        $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise
                        $nomUE = $_GET['nom_unite_exploitation']; //on recupère le nom de l'UE

                        //on recupère la date d'aujourd'hui
                        setlocale(LC_TIME, 'fra_fra');
                        $date = date("Y-m-d");

                        $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production

                  ?>

                   <!--slélection client-->
                  <?php

                    if(isset($_POST['select_client']))
                    {

                      if(!empty($_POST['prenom_client']) AND !empty($_POST['nom_client']) AND !empty($_POST['mail_client']) AND !empty($_POST['societe_client']))
                      {
                        $prenom_client = htmlspecialchars($_POST['prenom_client']);
                        $nom_client = htmlspecialchars($_POST['nom_client']);
                        $mail_client = htmlspecialchars($_POST['mail_client']);
                        $societe_client = htmlspecialchars($_POST['societe_client']);
                        $date_echeance = htmlspecialchars($_POST['date_echeance']);
                        $dates = htmlspecialchars($_POST['date']);


                        $getidClient = $bdd->prepare("SELECT * FROM client_for_user WHERE email_cli = ? AND id_UE_cli = ? ");
                        $getidClient->execute(array($mail_client, $idUE)) or die (print_r($getidClient->errorInfo()));;

                        $idclfecth = $getidClient->fetch();
                        $idCl = $idclfecth['id_cli']; //on recupère l'id du client

                        /*ici nous allons juste vérifier combien de facture/vente qui ont déjà été établie
                        dans l'Unité d'Exploitaion*/
                        $verifVente = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_UE_fact = ?");
                        $verifVente->execute(array($idUE)) or die (print_r($verifVente->errorInfo()));

                        $refCaise = 1; //initialement égal à 3

                        $factCount = $verifVente->rowCount();
                        if(preg_match("/^[1-9]+/", $factCount)) //s'il y a déjà des ventes
                        {
                          $refCaise = 0; //on initialise 
                          $refCaise = $factCount + 1; /*ici nous incrémenter le nombre de la réf caise par rapport 
                                                        rapport au nombre de facture que nous avons dans l'UE*/

                          $insertTempVent = $bdd->prepare("INSERT INTO vente_for_user(reference_caise, id_UE_fact, id_gest_fact, id_cl_fact, date_fact, echeance_fact) VALUES(?, ?, ?, ?, ?, ?)");
                          $insertTempVent->execute(array($refCaise, $idUE, $getid, $idCl, $date, $date_echeance));

                          header("location:factureVente_step_2.php?id=".$getid."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&prenomClient=".$prenom_client."&nomClient=".$nom_client."&mailClient=".$mail_client."&societeClient=".$societe_client."&echeance=".$date_echeance."&date=".$dates);

                        }
                        else //sinon
                        {
                          $insertTempVent = $bdd->prepare("INSERT INTO vente_for_user(reference_caise, id_UE_fact, id_gest_fact, id_cl_fact, date_fact, echeance_fact) VALUES(?, ?, ?, ?, ?, ?)") or die (print_r($insertTempVent->errorInfo()));;
                          $insertTempVent->execute(array(1, $idUE, $getid, $idCl, $date, $date_echeance));

                          header("location:factureVente_step_2.php?id=".$getid."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE."&refcaise=".$refCaise."&prenomClient=".$prenom_client."&nomClient=".$nom_client."&mailClient=".$mail_client."&societeClient=".$societe_client."&echeance=".$date_echeance."&date=".$dates);
                        }
                      }
                      else
                      {
                        $erreurclt = "Vous n'avez sélectionné aucun client !"; 
                      }              
                    }
                  ?>

                  <!--enregistrement client-->
                  <?php

                    if(isset($_POST['savecli']))
                    {
                      //le nom, le prénom et le téléphone pour un client, c'est obligatoire mais le reste c'est optionnel
                      if(!empty($_POST['prenomcli']) AND !empty($_POST['nomcli']) AND !empty($_POST['telcli']) AND !empty($_POST['adresscli']))
                        {
                          $prenomcli = htmlspecialchars($_POST['prenomcli']);
                          $nomcli = htmlspecialchars($_POST['nomcli']);
                          $emailcli = htmlspecialchars($_POST['emailcli']);
                          $telcli = htmlspecialchars($_POST['telcli']);
                          $fctcli = htmlspecialchars($_POST['fctcli']);
                          $soccli = htmlspecialchars($_POST['soccli']);
                          $tvacli = htmlspecialchars($_POST['tvacli']);
                          $postalecli = htmlspecialchars($_POST['postalecli']);
                          $adresscli = htmlspecialchars($_POST['adresscli']);
                          $villecli = htmlspecialchars($_POST['villecli']);
                          $payscli = htmlspecialchars($_POST['payscli']);
                          $depcli = htmlspecialchars($_POST['depcli']);

                          $prenomtaille = strlen($prenomcli); //on recupère la longueur du nom du client
                          $nomtaille = strlen($nomcli); // de même pour le nom du client
                          if($prenomtaille <= 30)
                          {
                            if($nomtaille <= 30)
                            {
                              if(preg_match("/^[a-zA-Z]+/", $prenomcli))
                              {
                                if(preg_match("/^[a-zA-Z]+/", $nomcli))
                                {
                                  if(preg_match("/^[0-9]+/", $telcli))
                                  {
                                    if(preg_match("/^[0-9]+/", $postalecli))
                                    {
                                        $insertcli = $bdd->prepare("INSERT INTO client_for_user(prenom_cli, nom_cli, email_cli, tel_cli, code_post_cli, societe_cli, tva_cli, fonction_cli, adresse_cli, ville_cli, pays_cli, departement_cli, id_UE_cli) VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                        $insertcli->execute(array($prenomcli, $nomcli, $emailcli, $telcli, $postalecli, $soccli, $tvacli, $fctcli, $adresscli, $villecli, $payscli, $depcli, $idUE)) or die (print_r($insertcli->errorInfo()));

                                    }
                                    else 
                                    {
                                      $erpostalcli = "";
                                      $erreur = "Le code postale du client saisie n'est pas valide !";
                                    }
                                  }
                                  else
                                  {
                                    $ertelcli = "";
                                    $erreur = "Le numéro de téléphone du client saisie n'est pas valide !";
                                  }
                                }
                                else
                                {
                                  $ernomcli = "";
                                  $erreur = "Le nom du client saisie n'est pas valide !";
                                }
                              }
                              else
                              {
                                $erprenomcli = "";
                                $erreur = "Le prénom du client saisie n'est pas valide !";
                              }
                            }
                            else
                            {
                              $ernomcli = "";
                              $erreur = "Le nom du client ne doit pas dépassé 30 caractères !";
                            }
                          }
                          else
                          {
                            $erprenomcli = "";
                            $erreur = "Le nom du client ne doit pas dépassé 30 caractères !";
                          }
                        }  
                    }

                  ?>

           <!--on inlus la la barre de navigation au dessus-->
          <?php  include('navbar.php'); ?>

         <!--*****************************************************-->
      <div class="container-fluid"> 
        <div class="row">
           <!--on inlus la navigation du menu -->
            <?php include('navigation.php'); ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">Mes ventes</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                  <a class="btn btn-sm btn-outline-info" href="vente.php?id=<?php echo $getid; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>" role="button" title="RETOUR A LA PAGE PRECEDENTE">
                    <span class="step size-32">
                        <i class="icon ion-arrow-left-a"></i>
                    </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </a>
                </div>
              </div>

              <?php  

                if(isset($_POST['searchcatart']))
                {
                  $libellerech = htmlspecialchars($_POST['libsearchcatart']);
                  /*juste pour afficher le cotenue dans l'inpute de recherche 
                  mais l'exécution réel se fais au dessous
                  raison pour laquelle j'ai dupluqué le if */
                }
              ?>

              <div class="card">
                <div class="card-header">
                  <h6><strong>Créer une nouvelle Vente/Facture</strong></h6>
                </div>

                <!--début card body-->
                <div class="card-body">
                    <ul class="nav nav-pills nav-fill">
                      <li class="nav-item">
                        <a class="nav-link active" href="#"><strong>Etape 1 : sélection client</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#"><strong>Etape 2 : Désignation</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link disabled" href="#"><strong>Etape 3 : établissement facture</strong></a>
                      </li>
                    </ul>

                    <br>
                    <!--début card-body 2-->
                    <div class="card">
                      <div class="card-body">
                        <nav>
                          <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><h6>Mes clients</h6></a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><h6>Ajouter un nouveau client</h6></a>
                          </div>
                        </nav>

                        

                        <!--début tab-content-->
                        <div class="tab-content" id="nav-tabContent">
                          <!--début tab-pane fade-->
                          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <br>
                            <form method="post" action="">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="input-group mb-3">
                                    <select class="custom-select" id="inputGroupSelect04" name="condition">
                                      <option selected value="prenom">Prénom</option>
                                      <option value="nom">Nom</option>
                                      <option value="entreprise">Entreprise</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="Rechercher un client" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libsearchcatart" value="<?php if(isset($libellerech)){ echo $libellerech; }?>" required="">
                                    <div class="input-group-append">
                                      <button type="submit" class="btn btn-outline-info" name="searchcatart" >
                                        <span class="step size-21">
                                          <i class="icon ion-ios-search-strong"></i>
                                        </span>
                                        &nbsp;&nbsp; <!--ceci nous permet de rajouter des espaces-->
                                      </button>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-2">
                                  <a class="btn btn-primary btn-block" href="factureVente_step_1.php?id=<?php echo $getid; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>" title="Actualiser le tableau">
                                    <span class="step size-21">
                                      <i class="icon ion-android-refresh"></i>
                                    </span>
                                    Actualiser</a>
                                </div>
                                <div class="col-md-4"></div>
                              </div>
                            </form>

                            <section>
                              <div class="container-tab">
                                <table id="table_client">
                                  <thead>
                                    <tr class="header">
                                      <th>
                                        N°
                                        <div>N°</div>
                                      </th>
                                      <th>
                                        Prénom
                                        <div>Prénom</div>
                                      </th>
                                      <th>
                                        Nom
                                        <div>Nom</div>
                                      </th>
                                      <th>
                                        E-mail
                                        <div>E-mail</div>
                                      </th>
                                       <th>
                                        Entreprise
                                        <div>Entreprise</div>
                                      </th>
                                    </tr>
                                  </thead>
                                   <tbody class="tbody_striped">
                                      <?php 

                                      if(isset($_POST['searchcatart']))
                                      {
                                        $libellerech = htmlspecialchars($_POST['libsearchcatart']); //on recupère l'inpute pour faire la recherche
                                        $condition = htmlspecialchars($_POST['condition']);

                                        //si la condion de recherche = au prénom
                                        if($condition == "prenom")
                                        {
                                          $viewch = $bdd->prepare("SELECT * FROM client_for_user WHERE prenom_cli LIKE ? AND id_UE_cli = ?");
                                          $viewch->execute(array("$libellerech%", $idUE));
                                          $i=1;

                                          $existcat = $viewch->rowCount();

                                          if(preg_match("/^[1-9]+/", $existcat)) //on vérifie si la carégorie l'article recherché existe dans la base de donnée
                                          {
                                            while($row1 = $viewch->fetch()) 
                                            {

                                          ?>
                                              <tr>
                                                  <td><?php echo $i++; ?></td>
                                                  <td><?php echo $row1['prenom_cli']; ?></td>
                                                  <td><?php echo $row1['nom_cli']; ?></td>
                                                  <td><?php echo $row1['email_cli']; ?></td>
                                                  <td><?php echo $row1['societe_cli']; ?></td>
                                              </tr>
                                            <?php
                                            }//fin whyle
                                          }//fin si if(preg_match("/^[1-9]+/", $existcat)) 
                                          else// si la catégorie n'existe pas on affiche un erreur
                                          {
                                          ?>
                                              <div class="alert alert-warning" role="alert">
                                                <h6 class="text-center">
                                                  Le prénom <strong><?php echo $libellerech; ?></strong> n'existe pas dans la liste de vos clients
                                                </h6>
                                            </div>
                                          <?php
                                          }//fin else if(preg_match("/^[1-9]+/", $existcat))   
                                        } //fin if($condition == "prenom")
                                        if($condition == "nom")
                                        {
                                          $viewch = $bdd->prepare("SELECT * FROM client_for_user WHERE nom_cli LIKE ? AND id_UE_cli = ?");
                                          $viewch->execute(array("$libellerech%", $idUE));
                                          $i=1;

                                          $existcat = $viewch->rowCount();

                                          if(preg_match("/^[1-9]+/", $existcat)) //on vérifie si la carégorie l'article recherché existe dans la base de donnée
                                          {
                                            while($row1 = $viewch->fetch()) 
                                            {

                                          ?>
                                              <tr>
                                                  <td><?php echo $i++; ?></td>
                                                  <td><?php echo $row1['prenom_cli']; ?></td>
                                                  <td><?php echo $row1['nom_cli']; ?></td>
                                                  <td><?php echo $row1['email_cli']; ?></td>
                                                  <td><?php echo $row1['societe_cli']; ?></td>
                                              </tr>
                                            <?php
                                            }//fin whyle
                                          }//fin si if(preg_match("/^[1-9]+/", $existcat)) 
                                          else// si la catégorie n'existe pas on affiche un erreur
                                          {
                                          ?>
                                              <div class="alert alert-warning" role="alert">
                                                <h6 class="text-center">
                                                  Le nom <strong><?php echo $libellerech; ?></strong> n'existe pas dans la liste de vos clients
                                                </h6>
                                            </div>
                                          <?php
                                          }//fin else if(preg_match("/^[1-9]+/", $existcat))
                                        }//fin if($condition == "nom")
                                        if($condition == "entreprise")
                                        {
                                          $viewch = $bdd->prepare("SELECT * FROM client_for_user WHERE societe_cli LIKE ? AND id_UE_cli = ?");
                                          $viewch->execute(array("$libellerech%", $idUE));
                                          $i=1;

                                          $existcat = $viewch->rowCount();

                                          if(preg_match("/^[1-9]+/", $existcat)) //on vérifie si la carégorie l'article recherché existe dans la base de donnée
                                          {
                                            while($row1 = $viewch->fetch()) 
                                            {

                                          ?>
                                              <tr>
                                                  <td><?php echo $i++; ?></td>
                                                  <td><?php echo $row1['prenom_cli']; ?></td>
                                                  <td><?php echo $row1['nom_cli']; ?></td>
                                                  <td><?php echo $row1['email_cli']; ?></td>
                                                  <td><?php echo $row1['societe_cli']; ?></td>
                                              </tr>
                                            <?php
                                            }//fin whyle
                                          }//fin si if(preg_match("/^[1-9]+/", $existcat)) 
                                          else// si la catégorie n'existe pas on affiche un erreur
                                          {
                                          ?>
                                              <div class="alert alert-warning" role="alert">
                                                <h6 class="text-center">
                                                  L'entreprise <strong><?php echo $libellerech; ?></strong> ne correspond à aucun client dans la liste de vos clients
                                                </h6>
                                            </div>
                                          <?php
                                          }//fin else if(preg_match("/^[1-9]+/", $existcat))
                                        }
                                      }// fin if(isset($_POST['searchcatart']))
                                      else
                                      {
                                          $view = $bdd->prepare("SELECT * FROM client_for_user WHERE id_UE_cli = ?");
                                          $view->execute(array($idUE));
                                          $i = 1;

                                          $existallcat = $view->rowCount();

                                          if(preg_match("/^[1-9]+/", $existallcat))
                                          {
                                           while($row = $view->fetch()) 
                                            {
                                       ?>   
                                          <tr>
                                              <td><?php echo $i++; ?></td>
                                              <td><?php echo $row['prenom_cli']; ?></td>
                                              <td><?php echo $row['nom_cli']; ?></td>
                                              <td><?php echo $row['email_cli']; ?></td>
                                              <td><?php echo $row['societe_cli']; ?></td>
                                            </tr>
                                        <?php 
                                          } 
                                        }
                                        else
                                      {
                                        ?>
                                          <div class="alert alert-warning" role="alert">
                                            <h6 class="text-center">
                                              Vous ne disposez d'aucun client
                                            </h6>
                                          </div>
                                      <?php
                                      }   
                                    }?> 
                                    </tbody>
                                </table>
                              </div>
                            </section>

                            <form class="myForm" action="" method="post">
                              <div class="p-3 mb-2 bg-info text-white">
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="input-group mb-3">
                                      <input type="text" name="prenom_client" id="prenom_client"  class="form-control" placeholder="Prénom du client" required="" readonly="true">
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="input-group mb-3">
                                      <input name="nom_client" id="nom_client" type="text" class="form-control" placeholder="Nom du client"  required="" readonly="true">
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="input-group mb-3">
                                      <input type="email" class="form-control" aria-describedby="basic-addon1" name="mail_client" id="mail_client" placeholder="Email du client" required="" readonly="true">
                                    </div>
                                  </div>

                                   <div class="col-md-3">
                                    <div class="input-group mb-3">
                                      <input type="text" class="form-control" aria-describedby="basic-addon1" name="societe_client" id="societe_client" placeholder="Société du client" required="" readonly="true">
                                    </div>
                                  </div>
                                </div>
                              </div>

                               <div class="p-3 mb-2 bg-light text-dark">
                                <div class="row">
                                  <div class="col-md-3"> 
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Date</label>
                                      <div class="input-group mb-3">
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"  name="date" value="<?php echo $date; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3"> 
                                    <div class="form-group">
                                      <label for="exampleInputEmail1">Echéance</label>
                                      <div class="input-group mb-3">
                                        <input type="date" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" id="date_echeance" name="date_echeance" value="<?php echo $date; ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label for="exampleInputEmail1">&nbsp;</label>
                                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">
                                    <span class="step size-21">
                                      <i class="icon ion-android-cancel"></i>
                                    </span>
                                    &nbsp;&nbsp;Annuler</button>
                                  </div>
                                  <div class="col-md-3">
                                     <label for="exampleInputEmail1">&nbsp;</label>
                                    <button type="submit" class="btn btn-success btn-block" name="select_client"> 
                                      <span class="step size-21">
                                        <i class="icon ion-android-done"></i>
                                      </span>
                                      &nbsp;&nbsp;Valider</button>
                                    </div>
                                  </div>
                                </div>
                            </form>

                          </div>
                          <!--fin tab-pane fade-->

                          <!--début tab-pane fade-->
                          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <br>
                            <form method="post" action="">
                              <div class="card border-secondary mb-3 cards">
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Prénom</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                            </div>
                                            <input type="text" class="form-control <?php if(isset($erprenomcli)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le prénom du client" value="<?php if(isset($prenomcli)){ echo $prenomcli;} ?>" name="prenomcli" required="">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Adresse email</label>
                                        <div class="input-group mb-3">
                                           <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                                            </div>
                                            <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'email du client" value="<?php if(isset($emailcli)){ echo $emailcli;} ?>" name="emailcli" required="">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Société</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/briefcase.png"></span>
                                            </div>
                                            <input type="text" class="form-control <?php if(isset($ersoccli)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="La société du client" value="<?php if(isset($soccli)){ echo $soccli;} ?>" name="soccli">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Adresse :</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Adresse du client ou société" name="adresscli" required=""></textarea>
                                      </div> 
                                    </div>
                                    
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Nom</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                            </div>
                                            <input type="text" class="form-control <?php if(isset($ernomcli)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le nom du client" value="<?php if(isset($nomcli)){ echo $nomcli;} ?>" name="nomcli" required="">
                                        </div>
                                      </div>

                                       <div class="form-group">
                                        <label for="exampleInputEmail1">Téléphone</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-call.png"></span>
                                            </div>
                                            <input type="text" class="form-control <?php if(isset($ertelcli)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro téléphone du client" value="<?php if(isset($telcli)){ echo $telcli;} ?>" name="telcli" required="">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Fonction</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/levels.png"></span>
                                            </div>
                                            <input type="text" class="form-control <?php if(isset($erfctcli)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="La fonction du client" value="<?php if(isset($fctcli)){ echo $fctcli;} ?>" name="fctcli">
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Code postale</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                                            </div>
                                            <input type="text" class="form-control <?php if(isset($erpostalcli)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale du client" value="<?php if(isset($postalecli)){ echo $postalecli;} ?>" name="postalecli" required="">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Ville</label>
                                          <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                                  <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
                                              </div>
                                              <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville du client ou de l'entreprise" value="<?php if(isset($villecli)){ echo $villecli;} ?>" name="villecli" required="">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Département / Etat / Province</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-system-home.png"></span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le département de la société du client" value="<?php if(isset($depcli)){ echo $depcli;} ?>" name="depcli" >
                                        </div>
                                      </div>

                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Pays</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                                            </div>
                                            <select class="custom-select" name="payscli">
                                                <option value="Congo République Démocratique" selected="selected">Congo République Démocratique </option>
                                                <option value="Afghanistan">Afghanistan </option>
                                                <option value="Afrique Centrale">Afrique Centrale </option>
                                                <option value="Afrique du Sud">Afrique du Sud </option> 
                                                <option value="Albanie">Albanie </option>
                                                <option value="Algerie">Algerie </option>
                                                <option value="Allemagne">Allemagne </option>
                                                <option value="Andorre">Andorre </option>
                                                <option value="Angola">Angola </option>
                                                <option value="Anguilla">Anguilla </option>
                                                <option value="Arabie Saoudite">Arabie Saoudite </option>
                                                <option value="Argentine">Argentine </option>
                                                <option value="Armenie">Armenie </option> 
                                                <option value="Australie">Australie </option>
                                                <option value="Autriche">Autriche </option>
                                                <option value="Azerbaidjan">Azerbaidjan </option>

                                                <option value="Bahamas">Bahamas </option>
                                                <option value="Bangladesh">Bangladesh </option>
                                                <option value="Barbade">Barbade </option>
                                                <option value="Bahrein">Bahrein </option>
                                                <option value="Belgique">Belgique </option>
                                                <option value="Belize">Belize </option>
                                                <option value="Benin">Benin </option>
                                                <option value="Bermudes">Bermudes </option>
                                                <option value="Bielorussie">Bielorussie </option>
                                                <option value="Bolivie">Bolivie </option>
                                                <option value="Botswana">Botswana </option>
                                                <option value="Bhoutan">Bhoutan </option>
                                                <option value="Boznie Herzegovine">Boznie Herzegovine </option>
                                                <option value="Bresil">Bresil </option>
                                                <option value="Brunei">Brunei </option>
                                                <option value="Bulgarie">Bulgarie </option>
                                                <option value="Burkina Faso">Burkina Faso </option>
                                                <option value="Burundi">Burundi </option>

                                                <option value="Caiman">Caiman </option>
                                                <option value="Cambodge">Cambodge </option>
                                                <option value="Cameroun">Cameroun </option>
                                                <option value="Canada">Canada </option>
                                                <option value="Canaries">Canaries </option>
                                                <option value="Cap vert">Cap Vert </option>
                                                <option value="Chili">Chili </option>
                                                <option value="Chine">Chine </option> 
                                                <option value="Chypre">Chypre </option> 
                                                <option value="Colombie">Colombie </option>
                                                <option value="Comores">Colombie </option>
                                                <option value="République du Congo">République du Congo </option>
                                                <option value="Congo République Démocratique">Congo République Démocratique</option>
                                                <option value="Cook">Cook </option>
                                                <option value="Corée du Nord">Corée du Nord </option>
                                                <option value="Corée du Sud">Corée du Sud </option>
                                                <option value="Costa Rica">Costa Rica </option>
                                                <option value="Cote d'Ivoire">Côte d'Ivoire </option>
                                                <option value="Croatie">Croatie </option>
                                                <option value="Cuba">Cuba </option>

                                                <option value="Danemark">Danemark </option>
                                                <option value="Djibouti">Djibouti </option>
                                                <option value="Dominique">Dominique </option>

                                                <option value="Egypte">Egypte </option> 
                                                <option value="Emirats Arabes Unis">Emirats Arabes Unis </option>
                                                <option value="Equateur">Equateur </option>
                                                <option value="Erythree">Erythree </option>
                                                <option value="Espagne">Espagne </option>
                                                <option value="Estonie">Estonie </option>
                                                <option value="Etats-Unis d'Amérique">Etats-Unis d'Amérique </option>
                                                <option value="Ethiopie">Ethiopie </option>

                                                <option value="Falkland">Falkland </option>
                                                <option value="Feroe">Feroe </option>
                                                <option value="Fidji">Fidji </option>
                                                <option value="Finlande">Finlande </option>
                                                <option value="France">France </option>

                                                <option value="Gabon">Gabon </option>
                                                <option value="Gambie">Gambie </option>
                                                <option value="Georgie">Georgie </option>
                                                <option value="Ghana">Ghana </option>
                                                <option value="Gibraltar">Gibraltar </option>
                                                <option value="Grece">Grece </option>
                                                <option value="Grenade">Grenade </option>
                                                <option value="Groenland">Groenland </option>
                                                <option value="Guadeloupe">Guadeloupe </option>
                                                <option value="Guam">Guam </option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernesey">Guernesey </option>
                                                <option value="Guinee">Guinee </option>
                                                <option value="Guinée Bissau">Guinée Bissau </option>
                                                <option value="Guinée equatoriale">Guinée Equatoriale </option>
                                                <option value="Guyana">Guyana </option>
                                                <option value="Guyane Francaise ">Guyane Francaise </option>

                                                <option value="Haiti">Haiti </option>
                                                <option value="Hawaii">Hawaii </option> 
                                                <option value="Honduras">Honduras </option>
                                                <option value="Hong Kong">Hong Kong </option>
                                                <option value="Hongrie">Hongrie </option>

                                                <option value="Inde">Inde </option>
                                                <option value="Indonesie">Indonesie </option>
                                                <option value="Iran">Iran </option>
                                                <option value="Iraq">Iraq </option>
                                                <option value="Irlande">Irlande </option>
                                                <option value="Islande">Islande </option>
                                                <option value="Israel">Israel </option>
                                                <option value="Italie">italie </option>

                                                <option value="Jamaique">Jamaique </option>
                                                <option value="Jan Mayen">Jan Mayen </option>
                                                <option value="Japon">Japon </option>
                                                <option value="Jersey">Jersey </option>
                                                <option value="Jordanie">Jordanie </option>

                                                <option value="Kazakhstan">Kazakhstan </option>
                                                <option value="Kenya">Kenya </option>
                                                <option value="Kirghizstan">Kirghizistan </option>
                                                <option value="Kiribati">Kiribati </option>
                                                <option value="Koweit">Koweit </option>

                                                <option value="Laos">Laos </option>
                                                <option value="Lesotho">Lesotho </option>
                                                <option value="Lettonie">Lettonie </option>
                                                <option value="Liban">Liban </option>
                                                <option value="Liberia">Liberia </option>
                                                <option value="Liechtenstein">Liechtenstein </option>
                                                <option value="Lituanie">Lituanie </option> 
                                                <option value="Luxembourg">Luxembourg </option>
                                                <option value="Lybie">Lybie </option>

                                                <option value="Macao">Macao </option>
                                                <option value="Macedoine">Macedoine </option>
                                                <option value="Madagascar">Madagascar </option>
                                                <option value="Madère">Madère </option>
                                                <option value="Malaisie">Malaisie </option>
                                                <option value="Malawi">Malawi </option>
                                                <option value="Maldives">Maldives </option>
                                                <option value="Mali">Mali </option>
                                                <option value="Malte">Malte </option>
                                                <option value="Man">Man </option>
                                                <option value="Mariannes du Nord">Mariannes du Nord </option>
                                                <option value="Maroc">Maroc </option>
                                                <option value="Marshall">Marshall </option>
                                                <option value="Martinique">Martinique </option>
                                                <option value="Maurice">Maurice </option>
                                                <option value="Mauritanie">Mauritanie </option>
                                                <option value="Mayotte">Mayotte </option>
                                                <option value="Mexique">Mexique </option>
                                                <option value="Micronesie">Micronesie </option>
                                                <option value="Midway">Midway </option>
                                                <option value="Moldavie">Moldavie </option>
                                                <option value="Monaco">Monaco </option>
                                                <option value="Mongolie">Mongolie </option>
                                                <option value="Montserrat">Montserrat </option>
                                                <option value="Mozambique">Mozambique </option>

                                                <option value="Namibie">Namibie </option>
                                                <option value="Nauru">Nauru </option>
                                                <option value="Nepal">Nepal </option>
                                                <option value="Nicaragua">Nicaragua </option>
                                                <option value="Niger">Niger </option>
                                                <option value="Nigeria">Nigeria </option>
                                                <option value="Niue">Niue </option>
                                                <option value="Norfolk">Norfolk </option>
                                                <option value="Norvege">Norvege </option>
                                                <option value="Nouvelle Caledonie">Nouvelle Caledonie </option>
                                                <option value="Nouvelle Zelande">Nouvelle Zelande </option>

                                                <option value="Oman">Oman </option>
                                                <option value="Ouganda">Ouganda </option>
                                                <option value="Ouzbekistan">Ouzbekistan </option>

                                                <option value="Pakistan">Pakistan </option>
                                                <option value="Palau">Palau </option>
                                                <option value="Palestine">Palestine </option>
                                                <option value="Panama">Panama </option>
                                                <option value="Papouasie Nouvelle Guinée">Papouasie Nouvelle Guinée </option>
                                                <option value="Paraguay">Paraguay </option>
                                                <option value="Pays_Bas">Pays_Bas </option>
                                                <option value="Perou">Perou </option>
                                                <option value="Philippines">Philippines </option> 
                                                <option value="Pologne">Pologne </option>
                                                <option value="Polynesie">Polynesie </option>
                                                <option value="Porto Rico">Porto Rico </option>
                                                <option value="Portugal">Portugal </option>

                                                <option value="Qatar">Qatar </option>

                                                <option value="Republique Dominicaine">Republique Dominicaine </option>
                                                <option value="Republique Tchèque">Republique Tchèque </option>
                                                <option value="Reunion">Reunion </option>
                                                <option value="Roumanie">Roumanie </option>
                                                <option value="Royaume Uni">Royaume Uni </option>
                                                <option value="Russie">Russie </option>
                                                <option value="Rwanda">Rwanda </option>

                                                <option value="Sahara Occidental">Sahara Occidental </option>
                                                <option value="Sainte Lucie">Sainte Lucie </option>
                                                <option value="Saint Marin">Saint Marin </option>
                                                <option value="Salomon">Salomon </option>
                                                <option value="Salvador">Salvador </option>
                                                <option value="Samoa Occidentales">Samoa Occidentales</option>
                                                <option value="Samoa Americaine">Samoa Americaine </option>
                                                <option value="Sao-Tome et Principe">Sao-Tome et Principe </option> 
                                                <option value="Senegal">Senegal </option> 
                                                <option value="Seychelles">Seychelles </option>
                                                <option value="Sierra Leone">Sierra Leone </option>
                                                <option value="Singapour">Singapour </option>
                                                <option value="Slovaquie">Slovaquie </option>
                                                <option value="Slovenie">Slovenie</option>
                                                <option value="Somalie">Somalie </option>
                                                <option value="Soudan">Soudan </option> 
                                                <option value="Sri Lanka">Sri Lanka </option> 
                                                <option value="Suede">Suede </option>
                                                <option value="Suisse">Suisse </option>
                                                <option value="Surinam">Surinam </option>
                                                <option value="Swaziland">Swaziland </option>
                                                <option value="Syrie">Syrie </option>

                                                <option value="Tadjikistan">Tadjikistan </option>
                                                <option value="Taiwan">Taiwan </option>
                                                <option value="Tonga">Tonga </option>
                                                <option value="Tanzanie">Tanzanie </option>
                                                <option value="Tchad">Tchad </option>
                                                <option value="Thailande">Thailande </option>
                                                <option value="Tibet">Tibet </option>
                                                <option value="Timor Oriental">Timor Oriental </option>
                                                <option value="Togo">Togo </option> 
                                                <option value="Trinite et Tobago">Trinite et Tobago </option>
                                                <option value="Tristan da cunha">Tristan de cuncha </option>
                                                <option value="Tunisie">Tunisie </option>
                                                <option value="Turkmenistan">Turmenistan </option> 
                                                <option value="Turquie">Turquie </option>

                                                <option value="Ukraine">Ukraine </option>
                                                <option value="Uruguay">Uruguay </option>

                                                <option value="Vanuatu">Vanuatu </option>
                                                <option value="Vatican">Vatican </option>
                                                <option value="Venezuela">Venezuela </option>
                                                <option value="Vierges Americaines">Vierges Americaines </option>
                                                <option value="Vierges Britanniques">Vierges Britanniques </option>
                                                <option value="Vietnam">Vietnam </option>

                                                <option value="Wake">Wake </option>
                                                <option value="Wallis et Futuma">Wallis et Futuma </option>

                                                <option value="Yemen">Yemen </option>
                                                <option value="Yougoslavie">Yougoslavie </option>

                                                <option value="Zambie">Zambie </option>
                                                <option value="Zimbabwe">Zimbabwe </option>
                                            </select>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">N° Entreprise ou TVA</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/checkmark-circled.png"></span>
                                            </div>
                                            <input type="text" class="form-control <?php if(isset($ertvacli)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro de la société du client" value="<?php if(isset($tvacli)){ echo $tvacli;} ?>" name="tvacli" >
                                        </div>
                                      </div>

                                    </div>
                                  </div>

                                </div>
                                <div class="card-footer text-white bg-secondary">
                                  <div class="row">
                                    <div class="col-md-2">
                                      
                                      <button type="submit" class="btn btn-primary btn-block" name="savecli">
                                        <span class="step size-21">
                                          <i class="icon ion-android-done"></i>
                                        </span>
                                          &nbsp;&nbsp;Enregistrer</button>
                                    </div>
                                    <div class="col-md-2">
                                      <a class="btn btn-danger btn-block" href="contacts.php?id=<?php echo $getid; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>" role="button">
                                        <span class="step size-21">
                                          <i class="icon ion-ios-undo"></i>
                                        </span>
                                          &nbsp;&nbsp;Annuler</a>
                                    </div>
                                    <div class="col-md-8"></div>
                                  </div>
                                </div>
                              </div>
                            </form>

                            <div class="row">
                              <div class="col-md-6">
                                <?php 
                                  if(isset($erreur))
                                  {
                                ?>
                                  <div class="alert alert-danger text-center" role="alert"><?php echo $erreur; ?></div>
                                <?php
                                }
                                ?>
                              </div>
                              <div class="col-md-6"></div>
                            </div>

                          </div>
                          <!--fin tab-pane fade-->

                        </div>
                        <!--fin tab-content-->

                      </div>
                    </div>
                    <!--fin card-body 2-->

                </div>
                <!--fin card body-->
              </div>
            </main>
          </div>
        </div>
           
      </div>
    </div>
        <!--*****************************************************-->
        <br><br>
    
        <!-- Bootstrap JS -->

       <script src="../asserts/js/vendor/jquery-slim.min.js"></script>
        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/dropdown.js"></script>
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>
        <script src="../asserts/js/jquery/jquery-3.3.1.js"></script>
        <script src="../asserts/js/jquery/jspdf.debug.js"></script>
        <script src="../asserts/js/jquery/html2pdf.js"></script>

        <script type="text/javascript">
          var table_client = document.getElementById("table_client"),rIndex;

            for(var i = 1; i < table_client.rows.length; i++)
            {
              table_client.rows[i].onclick = function()
              {
                rIndex = this.rowsIndex;
                document.getElementById("prenom_client").value = this.cells[1].innerHTML;
                document.getElementById("nom_client").value = this.cells[2].innerHTML;
                document.getElementById("mail_client").value = this.cells[3].innerHTML;
                document.getElementById("societe_client").value = this.cells[4].innerHTML;
              }
            }
  
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
  header('location:error404.php');
}
?>
