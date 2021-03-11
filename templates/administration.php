<!DOCTYPE html>
<html lang="en">

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


        <!--Mon modal personnel-->
        <link rel="stylesheet" type="text/css" href="assets/css/modal.mata.css">

        <!--loader-->
        <link rel="stylesheet" type="text/css" href="assets/css/loader.css">

  

    <style type="text/css">
        
    </style>
        

        <title>KEDIS Online! | Administration</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->

<body class="bg-light">
	

	<!--Code PHP-->
                <?php 
                    //session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND $_GET['id'] > 0 AND isset($_GET['id_connexion']))  //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; //on protège la variable
                      $get_id_connexion = $_GET['id_connexion'];

                      $requser = $bdd->prepare("SELECT * FROM administrateur WHERE id = ? ");
                      $requser->execute(array($getid));

                      $userfos = $requser->fetch();
                      $getname = $userfos['nom'];
                      $getprenom = $userfos['prenom'];
                      $getmail = $userfos['email'];
                      $getprofil = $userfos['profil']; 
                      $sexe= $userfos['sexe'];
                      $login_required = $userfos['login_required'];
                      $id_connexion = $userfos['id_connexion'];


                      if($id_connexion == $get_id_connexion)
                      {
                      //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                          if($login_required == 1)
                          {
                              
                  ?>
    
    
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

        <!-- header header  -->
        <?php include('navigation_admin.php');?>
        

        <div id="right-panel" class="right-panel">
            <?php include('navbar_admin.php')?>
            <!-- Left Sidebar  -->

            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Tableau de bord</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="#">Tableau de bord</a></li>
                                        <li class="active">Administration</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



             <?php

                //cette fonction nous permet d'arrongire les nombre par exemple 145 000 = 145 k
                      function bd_nice_number($n) 
                      {
                        // first strip any formatting;
                        $n = (0+str_replace(",","",$n));
                        
                        // is this a number?
                        if(!is_numeric($n)) return false;
                        
                        // now filter it;
                        /**/

                        if($n>1000000000000000000000000) return round(($n/1000000000000000000000000),1).' y';
                        else if($n>1000000000000000000000) return round(($n/1000000000000000000000),1).' z';
                        else if($n>1000000000000000000) return round(($n/1000000000000000000),1).' e';
                        else if($n>1000000000000000) return round(($n/1000000000000000),1).' p';
                        else if($n>1000000000000) return round(($n/1000000000000),1).' t';
                        else if($n>1000000000) return round(($n/1000000000),1).' g';
                        else if($n>1000000) return round(($n/1000000),1).' m';
                        else if($n>1000) return round(($n/1000),1).' k';
                        
                        return number_format($n);
                      
                    }
            ?>

            <!-- Content -->
            <div class="content">
                <!-- Animated -->
                <div class="animated fadeIn">

                    <div class="row">
                        
                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-1">
                                            <i class="pe-7s-cash"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text">$ <span class="count">0</span></div>
                                                <div class="stat-heading">Revenues</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <?php 

                            $get_user = $bdd->prepare("SELECT * FROM user");
                            $get_user->execute(array());

                            $nbruser = $get_user->rowCount();

                            if($nbruser == '')
                              {
                                $nbruser = 0;
                              }
                        ?>

                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-2">
                                            <i class="pe-7s-users"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count"><?php echo  bd_nice_number($nbruser); ?></span></div>
                                                <div class="stat-heading">Utilisateurs</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php 

                            $get_entrep = $bdd->prepare("SELECT * FROM entreprise");
                            $get_entrep->execute(array());

                            $nbrentrep = $get_entrep->rowCount();

                            if($nbrentrep == '')
                              {
                                $nbrentrep = 0;
                              }
                        ?>

                        <div class="col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="stat-widget-five">
                                        <div class="stat-icon dib flat-color-3">
                                            <i class="fa fa-suitcase f-s-40 color-success"></i>
                                        </div>
                                        <div class="stat-content">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count"><?php echo  bd_nice_number($nbrentrep); ?></span></div>
                                                <div class="stat-heading">Entreprises</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 

                            $get_unite_exp = $bdd->prepare("SELECT * FROM uniteexploit");
                            $get_unite_exp->execute(array());

                            $nbrunite = $get_unite_exp->rowCount();

                            if($nbrunite == '')
                              {
                                $nbrunite = 0;
                              }
                        ?>

                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="stat-widget-five">
                                            <div class="stat-icon dib flat-color-4">
                                                <i class="fa fa-suitcase f-s-40 color-warning"></i>
                                            </div>
                                            <div class="stat-content">
                                                <div class="text-left dib">
                                                    <div class="stat-text"><span class="count"><?php echo  bd_nice_number($nbrunite); ?></span></div>
                                                    <div class="stat-heading">Unités d'exploitations</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="box-title">Traffic </h4>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <!-- <canvas id="TrafficChart"></canvas>   -->
                                        <!--<div id="traffic-chart" class="traffic-chart"></div>-->
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card-body">
                                        <div class="progress-box progress-1">
                                            <h4 class="por-title">Visits</h4>
                                            <div class="por-txt">96,930 Users (40%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-1" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Bounce Rate</h4>
                                            <div class="por-txt">3,220 Users (24%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-2" role="progressbar" style="width: 24%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Unique Visitors</h4>
                                            <div class="por-txt">29,658 Users (60%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-3" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="progress-box progress-2">
                                            <h4 class="por-title">Targeted  Visitors</h4>
                                            <div class="por-txt">99,658 Users (90%)</div>
                                            <div class="progress mb-2" style="height: 5px;">
                                                <div class="progress-bar bg-flat-color-4" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div> <!-- /.card-body -->
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->


                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Les 5 derniers utilisateurs inscrit </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th class="avatar">Avatar</th>
                                                    <th>Prénom</th>
                                                    <th>Nom</th>
                                                    <th>Ville</th>
                                                    <th>Pays</th>
                                                    <th>Type Abonn.</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php

                                                        $get_last_user = $bdd->prepare("SELECT * FROM user ORDER BY id_cl DESC LIMIT 5");
                                                        $get_last_user->execute(array());

                                                        while($row = $get_last_user->fetch())
                                                        {

                                                    ?>

                                                    <tr>
                                                        <td><?php echo $row['date_inscrip']; ?></td>
                                                        <td class="avatar">
                                                            <div class="round-img">
                                                                <a href="#"><img class="rounded-circle" src="../profil/<?php echo $row['profil_cl']; ?>.png" alt=""></a>
                                                            </div>
                                                        </td>
                                                        <td><?php echo $row['prenom_cl']; ?></td>
                                                        <td><span><?php echo $row['nom_cl']; ?></span></td>
                                                        <td><span><?php echo $row['ville']; ?></span></td>
                                                        <td><span><?php echo $row['pays']; ?></span></td>
                                                        <td>
                                                            <span>
                                                            <?php 

                                                                 //on récupère d'abord le type d'abonnement du client 
                                                                  $get_abonnement = $bdd->prepare("SELECT * FROM abonnement WHERE id = ? ");
                                                                  $get_abonnement->execute(array($row['id_abonnement']));

                                                                  $info_abonne = $get_abonnement->fetch();
                                                                  $type_abonne = $info_abonne['type']; 

                                                                  echo $type_abonne;
                                                            ?>  
                                                            </span></td>
                                                        <td>
                                                            <?php
                                                                if($row['statut'] == 'admin')
                                                                {
                                                            ?>
                                                                <span class="badge badge-complete">Administateur</span>

                                                            <?php
                                                                }
                                                                else
                                                                {
                                                            ?>
                                                                <span class="badge badge-pending">Utilisateur</span>
                                                            <?php

                                                                }
                                                            ?>
                                                        </td>

                                                    </tr>

                                                    <?php
                                                        }
                                                    ?>
                                                
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                    </div>
                </div>
            </div>
            
        </div>
    </div>


    <!-- End Wrapper -->
    <!-- All Jquery -->

   

    <!--<script src="../asserts/js/vendor/jquery-slim.min.js"></script>-->
    <script src="../asserts/js/jquery/jquery.min.js"></script>

    <script src="../asserts/js/vendor/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>




    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/lib/calendar/fullcalendar.min.js"></script>
    <script src="assets/js/init/fullcalendar-init.js"></script>

    <!--script chart
    <script type="text/javascript" src="../asserts/js/jquery.min.js"></script>
    <script type="text/javascript" src="../asserts/js/chartist.min.js"></script>-->

    <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
    <script src="../asserts/js/toastr/toastr.min.js"></script>

    <!--ceci pour le chart graphique (tableau de statystique)-->
    <script src="../asserts/C3/js/d3-5.4.0.min.js" charset="utf-8"></script>
    <script src="../asserts/C3/js/c3.min.js"></script>

    <!--Mon modal personnel-->
    <script src="assets/js/modal.mata.js"></script>

      <!--loader-->
    <script src="assets/js/loader.js"></script>

    <!--google maps-->
    <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->


</body>

</html>
<?php
    }
    else
    {
      header('location:deconnexion_admin.php?id='.$getid);
    }
  }
  else
  {
    header('location:deconnexion_admin.php?id='.$getid);
  }
}  
else
{
  header('location:error404.php');
}
?>