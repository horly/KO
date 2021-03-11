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
        <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <!--<link rel="stylesheet" href="../asserts/css/docs.css" >-->
        <!--<link rel="stylesheet" href="../asserts/css/font-awesome.css" >-->

        <!--chargement des icones-->
        <!--<link href="../icons/css/ionicons.css" rel="stylesheet" type="text/css" />
        <link href="../icons/css/iconstyles.css" rel="stylesheet" type="text/css" />-->


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

        <title>KEDIS ONLINE</title>

        <title>KEDIS ONLINE</title>
    <!--c head-->
    </head>
  <body>

   <!-- Header -->
    <header id="home">
      <!-- Background Image -->
      <div class="bg-img" style="background-image: url('../img/Collaboration.jpg');">
        <div class="overlay"></div>
      </div>
      <!-- /Background Image -->

      <!-- Nav -->
      <nav id="nav" class="navbar nav-transparent bg-primary">
        <div class="container">

          <div class="navbar-header">
            <!-- Logo -->
            <div class="navbar-brand">
              <a href="home.php">
                <img class="logo" src="../img/logo_kedis.png" alt="logo">
                <img class="logo-alt" src="../img/logo_kedis1.png" alt="logo">
              </a>
            </div>
            <!-- /Logo -->

            <!-- Collapse nav button -->
            <div class="nav-collapse">
              <span></span>
            </div>
            <!-- /Collapse nav button -->
          </div>

          <!--  Main navigation  -->
                  <ul class="main-nav nav navbar-nav navbar-right ">
                    <li><a href="home.php#home">Accueil</a></li>
                    <li><a href="about.php">A propos</a></li>
                    <li><a href="home.php#pricing">Tarif</a></li>
                    <li class="has-dropdown"><a href="#">Administration</a>
                      <ul class="dropdown">
                        <li><a href="admin.php">Admin</a></li>
                        <li><a href="equipe.php">Equipe</a></li>
                      </ul>
                    </li>
                    <li><a href="main.php">Se connecter</a></li>
                  </ul>
                  <!-- /Main navigation -->

        </div>
      </nav>
      <!-- /Nav -->

      <?php

          if(isset($_POST['main']))
          {
            header('location:main.php');
          }

      ?>
      <!-- home wrapper -->
      <div class="home-wrapper">
        <div class="container">
          <div class="row">

            <!-- home content -->
            <div class="col-md-10 col-md-offset-1">
              <form action="" method="post">
                <div class="home-content">
                  <h2 class="white-text">Restez en communication avec vos collègues</h2>
                  <button type="submit" name="main" class="main-btn">Connectez-vous aujourd'hui</button>
                </div>
              </form>
            </div>
            <!-- /home content -->

          </div>
        </div>
      </div>
      <!-- /home wrapper -->

    </header>
    <!-- /Header -->

            <!-- Why Choose Us -->
    <div id="features" class="section md-padding bg-grey">

        <!-- Container -->
        <div class="container">

            <!-- Row -->
            <div class="row">

                <!-- why choose us content -->
                <div class="col-md-6">
                    <div class="section-header">
                        <h2 class="title">Grâce à KEDIS Online!</h2>
                    </div>
                    <p>Gardez le contrôle de toutes vos activités, partout et en toute tranquillité…sans forcément être expert.</p>
                    <p>
                    Comptabilité - Facturation - Gestion des clients et fournisseurs - Gestion de caisse - Stock. ..et plus encore.
                    </p>
                    <p>
                        KEDIS Online! vous aide à :
                    </p>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Créer vos factures</p>
                    </div>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Gérer vos clients et fournisseurs.</p>
                    </div>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Envoyer vos offres et commandes.</p>
                    </div>
                     <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Contrôler vos caisses et votre trésorerie.</p>
                    </div>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Gérer le stock.</p>
                    </div>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Planifier et exécuter vos tâches.</p>
                    </div>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Etablir une communication interne.</p>
                    </div>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Tenir votre comptabilité.</p>
                    </div>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Générer vos états financiers.</p>
                    </div>
                    <div class="feature">
                        <i class="fa fa-check"></i>
                        <p>Rédiger votre déclaration TVA Et plus encore…</p>
                    </div>
                </div>
                <!-- /why choose us content -->

                <!-- About slider -->
                <div class="col-md-6">
                    <div id="about-slider" class="owl-carousel owl-theme">
                        <img class="img-responsive" src="../img/about12.jpg" alt="">
                        <img class="img-responsive" src="../img/about2.jpg" alt="">
                        <img class="img-responsive" src="../img/about3.jpg" alt="">
                        <img class="img-responsive" src="../img/about5.jpg" alt="">
                    </div>
                </div>
                <!-- /About slider -->

            </div>
            <!-- /Row -->

        </div>
        <!-- /Container -->

    </div>
    <!-- /Why Choose Us -->


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

 


  <!-- Footer -->
  <footer id="footer" class="sm-padding bg-dark">

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">

        <div class="col-md-12">

          <!-- footer logo -->
          <div class="footer-logo">
            <a href="home.php"><img src="../img/K@Online-sans.png" alt="logo"></a>
          </div>
          <!-- /footer logo -->

          <div class="text-center">
            <a href="https://twitter.com/" target="_blank" class="btn btn-social-icon btn-twitter"><span class="fa fa-twitter"></span></a>
            <a href="https://web.facebook.com" target="_blank" class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook"></span></a>
            <a href="https://fr.linkedin.com/" target="_blank" class="btn btn-social-icon btn-linkedin"><span class="fa fa-linkedin"></span></a>
            <a href="https://plus.google.com/collections/featured" target="_blank" class="btn btn-social-icon btn-google"><span class="fa fa-google"></span></a>
          </div>
          <p class="text-center"><i class="fa fa-envelope"></i> Email : contact@kedisonline.com</p>
          <!-- footer copyright -->
          <div class="footer-copyright">
            <p>© 2018 <a href="https://kedisonline.com">KEDIS Online!</a> | Tous droits réservés</p>
          </div>
          <!-- /footer copyright -->

        </div>

      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </footer>
  <!-- /Footer -->

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

  </body>
</html>
