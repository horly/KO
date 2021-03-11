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

    <!--css callout-->
    <link href="../asserts/css/callout.css" rel="stylesheet">

    <!--cropper-->
    <link rel="stylesheet" href="../asserts/css/cropper/cropper.css">
    <link rel="stylesheet" href="../asserts/css/cropper/main.css">

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
        height: 300px;
        /*background-color: white;*/
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

      #libsearchcatart {
        background-image: url('../icons/png/office/search.png');
        background-position: 10px 10px; 
        background-repeat: no-repeat;
        padding: 6px 12px 5px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
      }


      .body-modal-entreprise
        {
          overflow-y: auto;
          height: 505px;
          background-color: white;
        }

        .card_setting
        {
          height: 200px;
        }

        .img-container1
        {
          height: 410px;
          margin-left: auto;
          margin-right: auto;
          display: block;
        }

        #traitement, #traitement_fin
        {
            display: none;
        }

      #adresscli
      {
        height: 126px;
      }

       #link_user1, #link_user
      {
        text-decoration: none;
      }





    </style>


    <title>KEDIS Online!</title>
    <!--c head-->
</head>
<!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

    <?php
        //session_start();
        include('connecting_data_base.php');

            if(isset($_GET['id']) AND $_GET['id'] > 0 AND isset($_GET['id_connexion']))  //si la variable id qu'on a transité existe dans l'url
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
            $id_abonnement = $userfos['id_abonnement'];
            $id_abonne = $userfos['id_abonnement'];


            if($id_connexion == $get_id_connexion)
            {
            //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
            if($login_required == 1)
            {
            if($sexe == "Homme")
            {
                $genre = "monsieur";
            }
            else
            {
                $genre = "madame";
            }

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

        <div id="right-panel" class="right-panel">

            <!--on inlus la la barre de navigation au dessus-->
            <?php  include('navbar.php'); ?>
        </div>


        <div class="container" id="container">
            <br>
            <div class="card">
                <div class="card-header"><b>Profil</b></div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">
                            <img src="../profil/<?php echo $getprofil; ?>.png" alt="..." class="img-thumbnail rounded-circle">
                            <button class="btn btn-success btn-block" id="get_profil">
                              <span class="step size-18">
                              <i class="icon ion-android-create"></i>
                            </span>Modifier</button>
                        </div>
                        <div class="col-md-9">
                            <div class="bs-callout bs-callout-primary">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="text-primary"><?php echo $userfos['prenom_cl'].' '.$userfos['nom_cl']; ?></h4>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#modif-info">Modifier</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>
                                            <i class="icon ion-briefcase size-18"></i>&nbsp;<strong>Grade</strong> : <?php echo $userfos['profession']; ?>
                                        </h6>
                                        <h6>
                                            <i class="icon ion-android-contacts size-18"></i>&nbsp;<strong>Sexe</strong> :
                                            <?php
                                            if($userfos['sexe_cl'] == 'Monsieur')
                                            {
                                                echo 'Homme';
                                            }
                                            else
                                            {
                                                echo 'Femme';
                                            }
                                            ?>
                                        </h6>
                                        <h6>
                                            <i class="icon ion-android-mail size-18"></i>&nbsp;<strong>Email</strong> : <?php echo $userfos['email_cl']; ?>
                                        </h6>
                                        <h6>
                                            <i class="icon ion-ios-telephone size-18"></i>&nbsp;<strong>Téléphone</strong> : <?php echo $userfos['telephone']; ?>
                                        </h6>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>
                                            <i class="icon ion-android-pin size-18"></i>&nbsp;<strong>Adresse</strong> : <?php echo $userfos['adresse']; ?>
                                        </h6>
                                        <h6>
                                            <i class="icon ion-ios-home size-18"></i>&nbsp;<strong>Code postal</strong> : <?php echo $userfos['code_postale']; ?>
                                        </h6>
                                        <h6>
                                            <i class="icon ion-android-home size-18"></i>&nbsp;<strong>Ville</strong> : <?php echo $userfos['ville']; ?>
                                        </h6>
                                        <h6>
                                            <i class="icon ion-android-globe size-18"></i>&nbsp;<strong>Pays</strong> : <?php echo $userfos['pays']; ?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                            <h6>Profil complété à :</h6>

                            <?php

                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 40%;">40%</div>
                                </div>

                                <!-- Les 50% -->

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] == ''AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;">50%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;">50%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;">50%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;">50%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;">50%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 50%;">50%</div>
                                </div>

                                <!-- Les 60% -->

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 60%;">60%</div>
                                </div>

                                <!-- Les 70% -->

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 70%;">70%</div>
                                </div>

                                <!-- Les 80% -->

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 80%;">80%</div>
                                </div>

                                <!-- Les 90%-->

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] == '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 90%;">90%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] == '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 90%;">90%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] == '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 90%;">90%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] == '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 90%;">90%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] == ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 90%;">90%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] == '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 90%;">90%</div>
                                </div>

                                <?php
                            }
                            if($userfos['nom_cl'] != '' AND $userfos['prenom_cl'] != '' AND $userfos['sexe_cl'] != '' AND $userfos['email_cl'] != '' AND $userfos['telephone'] != '' AND $userfos['adresse'] != ''
                                AND $userfos['code_postale'] != '' AND $userfos['ville'] != '' AND $userfos['pays'] != '' AND $userfos['profession'] != '')
                            {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 100%;">100%</div>
                                </div>

                                <?php
                            }
                            ?>


                        </div>
                    </div>
                    <br>
                    <?php

                    $view = $bdd->prepare("SELECT * FROM gestion, entreprise WHERE id_user = ? AND id_E = idE "); //on séléctionne les entreprise appartenant à cet utlisateur
                    $view->execute(array($getid));

                    $existallE = $view->rowCount();

                    ?>
                    <div class="p-3 mb-2 bg-white text-dark border">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <b class="card-header"><i class="icon ion-briefcase size-18"></i>&nbsp;Entreprises : <?php echo $existallE; ?></b>
                                    <div class="card-body container-tab">
                                        <div class="list-group">
                                        <?php

                                            if($type_abonne == 'Avie' || $type_abonne == 'Essaie' || $type_abonne == 'Entreprise')
                                            {


                                                if(preg_match("/^[1-9]+/", $existallE))
                                                {
                                                    while($row = $view->fetch())
                                                    {

                                                        ?>
                                                        <a href="consulter_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $row['idE'];?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1 text-primary"><?php echo $row['nomE']; ?></h5>
                                                                <!--<small class="text-muted">3 days ago</small>-->
                                                            </div>
                                                            <p class="mb-1"><i class="icon ion-android-pin size-18"></i>&nbsp;<?php echo $row['villeE']; ?>.</p>
                                                            <!--<small class="text-muted">Donec id elit non mi porta.</small>-->
                                                        </a>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                    <div class="alert alert-light" role="alert">
                                                        <h6 class="text-center">
                                                            Vous ne disposez d'aucune entreprises
                                                        </h6>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            if($type_abonne == 'Petite Entreprise' || $type_abonne == 'Moyenne Entreprise')
                                            {
                                                if(preg_match("/^[1-9]+/", $existallE))
                                                {
                                                    while($row = $view->fetch())
                                                    {
                                                        if($row['statut'] == 1)
                                                        {

                                        ?>
                                                        <a href="consulter_entreprise.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $row['idE'];?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1 text-primary"><?php echo $row['nomE']; ?></h5>
                                                                <!--<small class="text-muted">3 days ago</small>-->
                                                            </div>
                                                            <p class="mb-1"><i class="icon ion-android-pin size-18"></i>&nbsp;<?php echo $row['villeE']; ?>.</p>
                                                            <!--<small class="text-muted">Donec id elit non mi porta.</small>-->
                                                        </a>
                                        <?php
                                                        }
                                                        else
                                                        {
                                        ?>
                                                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-1 text-primary"><?php echo $row['nomE']; ?></h5>
                                                                <!--<small class="text-muted">3 days ago</small>-->
                                                            </div>
                                                            <p class="mb-1"><i class="icon ion-android-pin size-18"></i>&nbsp;<?php echo $row['villeE']; ?>.</p>
                                                            <!--<small class="text-muted">Donec id elit non mi porta.</small>-->
                                                        </a>
                                        <?php

                                                        }
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                    <div class="alert alert-light" role="alert">
                                                        <h6 class="text-center">
                                                            Vous ne disposez d'aucune entreprises
                                                        </h6>
                                                    </div>
                                                    <?php
                                                }
                                            }

                                        ?>
                                        </div>
                                    </div>
                                    <!--<h6 class="card-footer">Total nombre :</h6>-->
                                </div>
                            </div>
                            <?php

                            $get_user = $bdd->prepare('SELECT * FROM user WHERE id_abonnement = ? AND id_cl != ?');
                            $get_user->execute(array($id_abonnement, $getid));

                            $nbr_user = $get_user->rowCount();

                            ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <b class="card-header"><i class="icon ion-android-people size-18"></i>&nbsp;Utilisateurs : <?php echo $nbr_user; ?></b>
                                    <div class="card-body container-tab">
                                        <div class="list-group">
                                            <?php

                                            if(preg_match("/^[1-9]+/", $nbr_user))
                                            {
                                                while($us = $get_user->fetch())
                                                {
                                                    ?>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <a class="col-md-2" id="link_user" href="profil_user.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&id_user=<?php echo $us['id_cl']; ?>"><img src="../profil/<?php echo $us['profil_cl']; ?>.png" alt="..." class="rounded-circle" height="50" width="50"></a>
                                                            <a class="col-md-6" id="link_user1" href="profil_user.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&id_user=<?php echo $us['id_cl']; ?>">
                                                                <h5 class="mb-1 text-primary"><?php echo $us['prenom_cl'].' '.$us['nom_cl']; ?></h5>
                                                                <p class="mb-1 text-dark"><strong><?php echo $us['profession'];?></strong> dans <strong>
                                                                        <?php

                                                                        $get_entr = $bdd->prepare("SELECT * FROM gestion, entreprise WHERE id_user = ? AND id_E = idE ");
                                                                        $get_entr->execute(array($us['id_cl']));
                                                                        $info_entrep = $get_entr->fetch();

                                                                        echo $info_entrep['nomE'];
                                                                        ?>
                                                                    </strong></p>
                                                            </a>
                                                            <div class="col-md-4">
                                                                <button class="btn btn-primary btn-block" onclick="newmessage(<?php echo $us['id_cl']; ?>);">Message</button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php

                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                <div class="alert alert-light" role="alert">
                                                    <h6 class="text-center">
                                                        Vous n'avez pas encore ajouté des utilisateurs
                                                    </h6>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <!--<h6 class="card-footer">Total nombre :</h6>-->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--Modal de photo de profil-->
            <div class="modal fade bd-example-modal-lg" id="new_profil" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-white bg-secondary">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="modal-title">Photo de profil</h6>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="img-container1">
                                <!--<img id="image" src="../profil/<?php echo $getprofil; ?>.jpg" alt="Picture">-->
                                <img id="image" src="../profil/<?php echo $getprofil; ?>.png" alt="Picture">
                            </div>

                            <label>&nbsp;</label>
                            <label class="btn btn-light border btn-upload" for="inputImage" title="Upload image file">
                                <input type="file" class="sr-only" id="inputImage" name="file" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                Importer...
                            </label>
                            <br>
                            &nbsp;
                            <div class="docs-buttons">

                                <!-- <div class="btn-group">
                                   <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Bouger">
                                     <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                       <span class="fa fa-arrows"></span>
                                     </span>
                                   </button>
                                   <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Rogner">
                                     <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                       <span class="fa fa-crop"></span>
                                     </span>
                                   </button>
                                 </div>-->
                                &nbsp;&nbsp;
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom Avant">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false" >
                                <span class="fa fa-search-plus"></span>
                              </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Arrière">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-search-minus"></span>
                              </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Déplacer à gauche">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrow-left">&nbsp;</span>
                              </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Déplacer à droite">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrow-right"></span>
                              </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Déplacer en haut">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrow-up"></span>
                              </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Déplacer en bas">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrow-down"></span>
                              </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Tourne à gauche">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-rotate-left">&nbsp;</span>
                              </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Tourne à droite">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-rotate-right"></span>
                              </span>
                                    </button>
                                </div>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Retourner horizontalement">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrows-h"></span>
                              </span>
                                    </button>
                                    <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Retourner verticalement">
                              <span class="docs-tooltip" data-toggle="tooltip" data-animation="false">
                                <span class="fa fa-arrows-v">&nbsp;&nbsp;</span>
                              </span>
                                    </button>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer docs-buttons">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-success" id="save_profil" data-method="getCroppedCanvas" data-option="{ &quot;maxWidth&quot;: 4096, &quot;maxHeight&quot;: 4096 }" >Enregistrer</button>
                            <button type="button" name="traitement" id="traitement" class="btn btn-success">Traitement en cours...</button>
                            <button type="button" name="traitement_fin" id="traitement_fin" class="btn btn-success">Traitement effectué
                                <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                          </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!--Modal des informations utilisateurs-->
            <div class="modal fade bd-example-modal-lg" id="modif-info" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header text-white bg-secondary">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="modal-title">Vos informations</h6>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-body">

                            <div class="card form_card">
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="civilite"><h6>Civilié</h6></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/genre.png"></span>
                                                </div>
                                                <select class="custom-select" name="civilite" id="civilite">
                                                    <option selected value="Monsieur" value="<?php echo $userfos['sexe_cl']; ?>" selected><?php echo $userfos['sexe_cl']; ?></option>
                                                    <option>Monsieur</option>
                                                    <option value="Madame">Madame</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="grade_cli"><h6>Grade/Fonction</h6></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/briefcase.png"></span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="L'entreprise du client" name="grade_cli" id="grade_cli" value="<?php echo $userfos['profession']; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="adresscli"><h6>Adresse :</h6></label>
                                                <textarea class="form-control" id="adresscli" rows="2" placeholder="Adresse du client ou de son entreprise" name="adresscli" required=""><?php echo $userfos['adresse']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telcli"><h6>Téléphone</h6></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-call.png"></span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro téléphone du client" name="telcli" id="telcli" value="<?php echo $userfos['telephone']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="postalecli"><h6>Code postale</h6></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale du client" name="postalecli" id="postalecli" value="<?php echo $userfos['code_postale']; ?>">
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
                                                    <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville du client ou de l'entreprise" name="villecli" id="villecli" value="<?php echo $userfos['ville']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="payscli"><h6>Pays</h6></label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                                                    </div>
                                                    <select class="custom-select" name="payscli" id="payscli">
                                                        <option value="<?php echo $userfos['pays']; ?>" selected><?php echo $userfos['pays']; ?></option>
                                                        <option value="">Sélectionner un pays</option>
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
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer docs-buttons">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-success" id="save_info">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>


            <!--Modal message-->
            <div class="modal fade bd-example-modal-lg" id="new_message" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-white bg-secondary">
                            <div class="row">
                                <div class="col-md-6"><h6 class="modal-title">Message <label class="text-secondary" id="id_sender"></label></h6></div>
                                <div class="col-md-6">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-2">
                                    <img src="" id="pic-sender" alt="..." class="rounded-circle" height="50" width="50">
                                </div>
                                <div class="col-md-10">
                                    <h6>Ecrire à : <br><label class="text-primary" id="nom_sender"></label></h6>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="message_content">&nbsp;</label>
                                <textarea class="form-control" id="message_content" rows="6" placeholder="Taper votre message..."></textarea>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="button" class="btn btn-success" id="send_message">Envoyer</button>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- /container -->







        <!--*****************************************************-->
        <br><br>
        <!-- Footer -->
       
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

        <script src="../asserts/js/bootstrap.bundle.min.js"></script>
        <!--cropper-->
        <script src="../asserts/js/cropper/cropper.js"></script>
        <!--<script src="../asserts/js/cropper/cropper.min.js"></script>-->
        <!--<script src="../asserts/js/cropper/docs.js"></script>-->
        <!--<script src="../asserts/js/cropper/main.js"></script>-->

        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="../dist/js/util.js"></script>
        <!--<script src="../dist/js/dropdown.js"></script>-->
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>


        <!--
        <script src="assets/js/lib/data-table/datatables.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
        <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
        <script src="assets/js/lib/data-table/jszip.min.js"></script>
        <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
        <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
        <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
        <script src="assets/js/init/datatables-init.js"></script>-->

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
    //lorsqu'on clique sur le bouton message 
              function newmessage(id_cl)
              {
                var id_user = id_cl;

                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'message/get_nom_sender.php',
                    data  : 'id_sender=' + id_user,
                    success:function(data)
                    {
                      $('#id_sender').text(id_user);
                      $('#nom_sender').text(data);
                      $('#new_message').modal('show');
                    }
                  });

                //on recupère la photo
                $.ajax(
                {
                  type  : 'POST',
                  url   : 'message/get_photo_sender.php',
                  data  : 'id_sender=' + id_user, 
                  success:function(data)
                  {
                    $('#pic-sender').attr('src', '../profil/'+ data +'.png');
                  }
                });
              }

        jQuery(document).ready(function($)
        {

            cropperpage(); 
              //lorsqu'on clique sur le boutton gestion d'utilisateur
              $('#user-gestion').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                   window.location = 'user.php?id=' + getid + "&id_connexion=" + id_connexion;
                });

              //lorsqu'on clique sur le boutton abonnement
              $('#abonnement').click(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';

                   window.location = 'abonnement.php?id=' + getid + "&id_connexion=" + id_connexion;
                });



              $('#get_profil').click(function(){
                $('#new_profil').modal('show');
              });


              //enregistrer
              $('#save_info').click(function()
                {
                    var civilite = $('#civilite').val();
                    var grade_cli = $('#grade_cli').val();
                    var adresscli = $('#adresscli').val();
                    var telcli = $('#telcli').val();
                    var postalecli = $('#postalecli').val();
                    var villecli = $('#villecli').val();
                    var payscli = $('#payscli').val();
                    var getid = '<?php echo $getid; ?>';

                    if(/^[0-9]+/.test(telcli) || telcli == '')
                    {
                      $.ajax(
                        {
                          type  : 'POST',
                          url   : 'fonction1/save_info_user.php',
                          data  : 'getid=' + getid + '&civilite=' + civilite +
                                  '&grade_cli=' + grade_cli + '&adresscli=' + adresscli +
                                  '&telcli=' + telcli + '&postalecli=' + postalecli + 
                                  '&villecli=' + villecli + '&payscli=' + payscli, 
                          success:function(data)
                          {
                            //alert(data);
                            $('#telcli').removeClass('is-invalid');
                            $('#modif-info').modal('hide');

                            
                            valid3('Informations mis à jour avec succès !');

                            setTimeout(function()
                            {
                              window.location.reload();
                            }, 5000);

                          }
                        });
                    }
                    else
                    {
                      $('#telcli').addClass('is-invalid');
                      err3("Le numéro de téléphone saisie n'est pas valide ");
                    }
                });

                //envoyer le message
                $('#send_message').click(function()
                  {
                    var id_sender = $('#id_sender').text()
                    var getid = '<?php echo $getid; ?>';
                    var message_content = $('#message_content').val();

                    if(message_content != '')
                    {
                      $.ajax(
                        {
                          type  : 'POST',
                          url   : 'message/send_message.php',
                          data  : 'getid=' + getid + '&id_sender=' + id_sender + '&message_content=' + message_content,
                          success:function(data)
                          {
                            $('#message_content').val('');
                            $('#new_message').modal('hide');
                            valid3('Message envoyé avec succès !');
                          }
                        });
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


                function cropperpage()
                {
                  // Methods cropper
                    'use strict';

                    var console = window.console || { log: function () {} };
                    var URL = window.URL || window.webkitURL;
                    var $image = $('#image');
                    var $download = $('#download');
                    var $dataX = $('#dataX');
                    var $dataY = $('#dataY');
                    var $dataHeight = $('#dataHeight');
                    var $dataWidth = $('#dataWidth');
                    var $dataRotate = $('#dataRotate');
                    var $dataScaleX = $('#dataScaleX');
                    var $dataScaleY = $('#dataScaleY');
                    var options = {
                      aspectRatio: 1 / 1,
                      preview: '.img-preview',
                      minContainerWidth: 465,
                      minContainerHeight: 400,
                      viewMode: 3,
                      crop: function (e) {
                        $dataX.val(Math.round(e.detail.x));
                        $dataY.val(Math.round(e.detail.y));
                        $dataHeight.val(Math.round(e.detail.height));
                        $dataWidth.val(Math.round(e.detail.width));
                        $dataRotate.val(e.detail.rotate);
                        $dataScaleX.val(e.detail.scaleX);
                        $dataScaleY.val(e.detail.scaleY);
                      }
                    };

                    
                    var originalImageURL = $image.attr('src');
                    var uploadedImageName = 'cropped.jpg';
                    var uploadedImageType = 'image/jpeg';
                    var uploadedImageURL;

                    // Tooltip
                    //$('[data-toggle="tooltip"]').tooltip();

                    // Cropper
                    $image.on({
                      ready: function (e) {
                        console.log(e.type);
                      },
                      cropstart: function (e) {
                        console.log(e.type, e.detail.action);
                      },
                      cropmove: function (e) {
                        console.log(e.type, e.detail.action);
                      },
                      cropend: function (e) {
                        console.log(e.type, e.detail.action);
                      },
                      crop: function (e) {
                        console.log(e.type);
                      },
                      zoom: function (e) {
                        console.log(e.type, e.detail.ratio);
                      }
                    }).cropper(options);

                    // Buttons
                    if (!$.isFunction(document.createElement('canvas').getContext)) {
                      $('button[data-method="getCroppedCanvas"]').prop('disabled', true);
                    }

                    if (typeof document.createElement('cropper').style.transition === 'undefined') {
                      $('button[data-method="rotate"]').prop('disabled', true);
                      $('button[data-method="scale"]').prop('disabled', true);
                    }

                    // Download
                    /*if (typeof $download[0].download === 'undefined') {
                      $download.addClass('disabled');
                    }*/

                    // Options
                    $('.docs-toggles').on('change', 'input', function () {
                      var $this = $(this);
                      var name = $this.attr('name');
                      var type = $this.prop('type');
                      var cropBoxData;
                      var canvasData;

                      if (!$image.data('cropper')) {
                        return;
                      }

                      if (type === 'checkbox') {
                        options[name] = $this.prop('checked');
                        cropBoxData = $image.cropper('getCropBoxData');
                        canvasData = $image.cropper('getCanvasData');

                        options.ready = function () {
                          $image.cropper('setCropBoxData', cropBoxData);
                          $image.cropper('setCanvasData', canvasData);
                        };
                      } else if (type === 'radio') {
                        options[name] = $this.val();
                      }

                      $image.cropper('destroy').cropper(options);
                    });

                    // Methods
                    $('.docs-buttons').on('click', '[data-method]', function () {
                      var $this = $(this);
                      var data = $this.data();
                      var cropper = $image.data('cropper');
                      var cropped;
                      var $target;
                      var result; 

                      if ($this.prop('disabled') || $this.hasClass('disabled')) {
                        return;
                      }

                      if (cropper && data.method) {
                        data = $.extend({}, data); // Clone a new one

                        if (typeof data.target !== 'undefined') {
                          $target = $(data.target);

                          if (typeof data.option === 'undefined') {
                            try {
                              data.option = JSON.parse($target.val());
                            } catch (e) {
                              console.log(e.message);
                            }
                          }
                        }

                        cropped = cropper.cropped;

                        switch (data.method) {
                          case 'rotate':
                            if (cropped && options.viewMode > 0) {
                              $image.cropper('clear');
                            }

                            break;

                          case 'getCroppedCanvas':
                            if (uploadedImageType === 'image/jpeg') {
                              if (!data.option) {
                                data.option = {};
                              }

                              data.option.fillColor = '#fff';
                            }

                            break;
                        }

                        result = $image.cropper(data.method, data.option, data.secondOption);

                        switch (data.method) {
                          case 'rotate':
                            if (cropped && options.viewMode > 0) {
                              $image.cropper('crop');
                            }

                            break;

                          case 'scaleX':
                          case 'scaleY':
                            $(this).data('option', -data.option);
                            break;

                          case 'getCroppedCanvas':
                            if (result) {
                              // Bootstrap's Modal
                              //alert(result.toDataURL(uploadedImageType));
                              //$('#getCroppedCanvasModal').modal().find('.modal-body').html(result);

                              var image = result.toDataURL(uploadedImageType);
                              var getid = '<?php echo $getid; ?>';

                              $('#save_profil').css('display', 'none');
                              $('#traitement').css('display', 'block');

                              //rognage de l'image
                              $.ajax(
                                {
                                  type  : 'POST', 
                                  url   : 'fonction1/saveprofil.php',
                                  data  : {
                                    base64 : image, getid : getid
                                  },
                                  success:function(donnee)
                                  {
                                    //alert(donnee);
                                    //$('.donnee').html(image);
                                    //$('.donnee').html("<img src='" + donnee + "'>");
                                    setTimeout(function()
                                    {
                                        $('#save_profil').css('display', 'none');
                                        $('#traitement').css('display', 'none');
                                        $('#traitement_fin').css('display', 'block');
                                        valid3('Photo de profil mis à jour avec succès');
                                    }, 5000);

                                    setTimeout(function()
                                    {
                                        window.location.reload();
                                    }, 10000);
                                  }
                                });

                              if (!$download.hasClass('disabled')) {
                                download.download = uploadedImageName;
                                $download.attr('href', result.toDataURL(uploadedImageType));
                              }
                            }

                            break;

                          case 'destroy':
                            if (uploadedImageURL) {
                              URL.revokeObjectURL(uploadedImageURL);
                              uploadedImageURL = '';
                              $image.attr('src', originalImageURL);
                            }

                            break;

                        }

                        if ($.isPlainObject(result) && $target) {
                          try {
                            $target.val(JSON.stringify(result));
                          } catch (e) {
                            console.log(e.message);
                          }
                        }
                      }
                    });

                    // Keyboard
                    $(document.body).on('keydown', function (e) {
                      if (e.target !== this || !$image.data('cropper') || this.scrollTop > 300) {
                        return;
                      }

                      switch (e.which) {
                        case 37:
                          e.preventDefault();
                          $image.cropper('move', -1, 0);
                          break;

                        case 38:
                          e.preventDefault();
                          $image.cropper('move', 0, -1);
                          break;

                        case 39:
                          e.preventDefault();
                          $image.cropper('move', 1, 0);
                          break;

                        case 40:
                          e.preventDefault();
                          $image.cropper('move', 0, 1);
                          break;
                      }
                    });

                    // Import image
                    var $inputImage = $('#inputImage');

                    if (URL) {
                      $inputImage.change(function () {
                        var files = this.files;
                        var file;

                        if (!$image.data('cropper')) {
                          return;
                        }

                        if (files && files.length) {
                          file = files[0];

                          if (/^image\/\w+$/.test(file.type)) {
                            uploadedImageName = file.name;
                            uploadedImageType = file.type;

                            if (uploadedImageURL) {
                              URL.revokeObjectURL(uploadedImageURL);
                            }

                            uploadedImageURL = URL.createObjectURL(file);
                            $image.cropper('destroy').attr('src', uploadedImageURL).cropper(options);
                            $inputImage.val('');
                          } else {
                            window.alert("Votre fichier doit être au format jpg, jpeg, png ou gif.");
                          }
                        }
                      });
                    } else {
                      $inputImage.prop('disabled', true).parent().addClass('disabled');
                    }
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
