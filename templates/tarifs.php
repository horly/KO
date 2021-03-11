<!doctype html>
<!--Début html-->
<html lang="fr">
<!--Début html-->
    <head>
    <!--Début head-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="../asserts/css/bootstrap.min.css" >-->

        <!--Style personnel-->
        <!--<link rel="stylesheet" href="../asserts/css/style.css" >-->
        
        <!--Chargement des styles pour les icones des reseaux socio-->
        <!--<link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <link rel="stylesheet" href="../asserts/css/docs.css" >-->
        <!--<link rel="stylesheet" href="../asserts/css/font-awesome.css" >-->

        <!--chargement des icones-->
        <!--<link href="../icons/css/ionicons.css" rel="stylesheet" type="text/css" />
        <link href="../icons/css/iconstyles.css" rel="stylesheet" type="text/css" />-->

          <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >


        <link type="text/css" rel="stylesheet" href="../assert1/css/bootstrap.min.css" />
        <!-- Owl Carousel -->
        <link type="text/css" rel="stylesheet" href="../assert1/css/owl.carousel.css" />

        <link type="text/css" rel="stylesheet" href="../assert1/css/owl.theme.default.css" />
        <!-- Magnific Popup -->
        <link type="text/css" rel="stylesheet" href="../assert1/css/magnific-popup.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../assert1/css/font-awesome.min.css">
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="../assert1/css/style.css" />

           <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">


        <title>KEDIS Online !</title>
        
    <!--c head-->
    </head>
  <body>
    <style type="text/css">
        #id_admin
        {
            color : #f8f9fa;
        }

        #tarif
        {
          background: transparent;
          color: #6195FF;
        }
    </style>
   <!-- Header -->
    <header>

        <!-- Nav -->
        <nav id="nav" class="navbar">
            <div class="container">

                <div class="navbar-header">
                    <!-- Logo -->
                    <div class="navbar-brand">
                        <a href="home.php">
                            <img class="logo" src="../img/logo_kedis.png" alt="logo">
                        </a>
                    </div>
                    <!-- /Logo -->

                    <!-- Collapse nav button -->
                    <div class="nav-collapse">
                        <span></span>
                    </div>
                    <!-- /Collapse nav button -->
                </div>

                <?php 

                    //on inclus le nav
                    include('nav_home.php'); 

                ?>

            </div>
        </nav>
        <!-- /Nav -->

          <!-- header wrapper -->
        <div class="header-wrapper sm-padding bg-grey">
          <div class="container">
            <h2>Nos offres et tarifs!</h2><br>
            <span>1 mois d'essai gratuit</span>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Accueil</a></li>
              <li class="breadcrumb-item active">Tarif</li>
            </ul>
          </div>
        </div>
        <!-- /header wrapper -->

    </header>

      <!-- Pricing -->
      <div id="pricing" class="section md-padding">

        <!-- Container -->
        <div class="container">

          <!-- Row -->
          <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
              <h2 class="title">Prix</h2>
            </div>
            <!-- /Section header -->

            <!-- pricing -->
            <div class="col-sm-4">
              <div class="pricing">
                <div class="price-head">
                  <span class="price-title">Petite Entreprise</span>
                  <div class="price">
                    <h3>$0<span class="duration">/ mois</span></h3>
                  </div>
                </div>
                <ul class="price-content">
                  <li>
                    <p>5 factures / mois</p>
                  </li>
                  <li>
                    <p>Entreprises limitées</p>
                  </li>
                  <li>
                    <p>Unités d'exploitations limitées</p>
                  </li>
                  <li>
                    <p>Utilisateurs limités</p>
                  </li>
                </ul>
                <div class="price-btn">
                  <a href="main.php" class="outline-btn">Inscription gratuite</a>
                </div>
              </div>
            </div>
            <!-- /pricing -->

            <!-- pricing -->
            <div class="col-sm-4">
              <div class="pricing">
                <div class="price-head">
                  <span class="price-title">Moyenne Entreprise</span>
                  <div class="price">
                    <h3>$10<span class="duration">/ mois</span></h3>
                  </div>
                </div>
                <ul class="price-content">
                  <li>
                    <p>Factures illimitées</p>
                  </li>
                  <li>
                    <p>Entreprises limitées</p>
                  </li>
                  <li>
                    <p>Unités d'exploitations limitées</p>
                  </li>
                  <li>
                    <p>Utilisateurs limités</p>
                  </li>
                </ul>
                <div class="price-btn">
                  <a href="main.php" class="outline-btn">Commencer</a>
                </div>
              </div>
            </div>
            <!-- /pricing -->

            <!-- pricing -->
            <div class="col-sm-4">
              <div class="pricing">
                <div class="price-head">
                  <span class="price-title">Enterprise</span>
                  <div class="price">
                    <h3>$25<span class="duration">/ mois</span></h3>
                  </div>
                </div>
                <ul class="price-content">
                  <li>
                    <p>Factures illimitées</p>
                  </li>
                  <li>
                    <p>Entreprises illimitées</p>
                  </li>
                  <li>
                    <p>Unités d'exploitations illimitées</p>
                  </li>
                  <li>
                    <p>Utilisateurs illimités</p>
                  </li>
                </ul>
                <div class="price-btn">
                  <a href="main.php" class="outline-btn">Commencer</a>
                </div>
              </div>
            </div>
            <!-- /pricing -->

          </div>
          <!-- Row -->

        </div>
        <!-- /Container -->

      </div>
      <!-- /Pricing -->

   <?php 

      //on inclus le nav
      include('footer_home.php'); 

    ?>
 

<!-- Back to top -->
  <div id="back-to-top"></div>
  <!-- /Back to top -->

  <!-- Preloader -->
  <div id="preloader">
    <div class="preloader">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <!-- /Preloader -->
     
   

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
        <!--<script src="../asserts/js/vendor/jquery-slim.min.js"></script>
        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="../asserts/js/vendor/holder.min.js"></script>
        <script src="../dist/js/bootstrap.min.js"></script>
        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/dropdown.js"></script>
        <script src="../dist/js/collapse.js"></script>-->

        <script type="text/javascript" src="../assert1/js/jquery.min.js"></script>
        <script type="text/javascript" src="../assert1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../assert1/js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="../assert1/js/jquery.magnific-popup.js"></script>
        <script type="text/javascript" src="../assert1/js/main.js"></script>

        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>

        <script type="text/javascript">
            
        </script>

  </body>
</html>
