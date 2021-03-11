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

        #about
        {
          background: transparent;
          color: #6195FF;
        }
    </style>
   <!-- Header -->
    <header id="#about">

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

                <!--  Main navigation  
                  <ul class="main-nav nav navbar-nav navbar-right ">
                    <li><a href="home.php#home">Accueil</a></li>
                    <li><a href="about.php" id="about">A propos</a></li>
                    <li><a href="home.php#pricing">Tarif</a></li>
                    <li class="has-dropdown"><a href="#">Administration</a>
                      <ul class="dropdown">
                        <li><a href="admin.php">Admin</a></li>
                        <li><a href="equipe.php">Equipe</a></li>
                      </ul>
                    </li>
                    <li><a href="main.php">Se connecter</a></li>
                  </ul>
                   /Main navigation -->

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
            <h2>A propos de KEDIS Online!</h2>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Accueil</a></li>
              <li class="breadcrumb-item active">A propos</li>
            </ul>
          </div>
        </div>
        <!-- /header wrapper -->

    </header>

    <div class="section md-padding">

      <div class="container">
   
          <p><b><a href="https://www.kedisonline.com">KEDIS Online!</a></b> est plateforme de gestion d'entreprise et de comptabilité en ligne, elle présente comme activité : la gestion des clients et fournisseurs, gestion de trésorerie, caisse enregistreuse, gestion des tâches, communication (chat en ligne), gestion des stocks, comptabilité et Conseil en ligne en management, comptabilité et fiscalité pour les PME.</p>
          <br>
          <p><b><a href="https://www.kedisonline.com">KEDIS Online!</a></b> est un outil simple à utiliser et qui s'adapte aux besoins essentiels de gestion pour les petites et moyennes entreprises. L'objectif est de permettre à l'entrepreneur d'avoir le contrôle et une vue globale de ses activités partout où il se trouve et quelles que soient les périphéques utilisées (ordianateur, tablette, smartphone…). Aussi il peut donner accès à ses collaborateurs ou comptable à utiliser l'ensemble ou une partie de l'application en fonction des tâches leur assignées.</p>
          <br>
          <p>L'accent est mis sur la facilité de son utilisation avec une convivialité similaire aux réseaux sociaux. Cela afin que ses utilisateurs qui ne bénéficient pas nécessairement des notions de comptabilité et de gestion l'exploite sans forcément être des experts. Ils n'auront qu'à remplir des champs d'information simples et les rapports comptables et de gestion seront générés directement.</p>

      </div>
    </div>

  <!-- Team -->
    <div  class="section md-padding bg-grey">

      <!-- Container -->
      <div class="container">

        <div class="text-center">
              <h2 class="title">Notre équipe</h2>
            </div>

        <!-- Row -->
        <div class="row">

          <!-- team -->
          <div class="col-sm-4">
            <div class="team">
              <div class="team-img">
                <img class="img-responsive" src="../img/equipe1.jpg" alt="">
                <div class="overlay">
                  <div class="team-social">
                    <a href="https://www.facebook.com/horly.andelomata" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                  </div>
                </div>
              </div>
              <div class="team-content">
                <h3>Horly Andelo Mata</h3>
                <span>Développeur web</span><br>
                <a href="detail1.php">Plus de détails</a>
              </div>
            </div>
          </div>
          <!-- /team -->

          <!-- team -->
          <div class="col-sm-4">
            <div class="team">
              <div class="team-img">
                <img class="img-responsive" src="../img/equipe3.jpg" alt="">
                <div class="overlay">
                  <div class="team-social">
                    <a href="https://www.facebook.com/ddiambwana" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                  </div>
                </div>
              </div>
              <div class="team-content">
                <h3>John Doe</h3>
                <span>Développeur web</span><br>
                <a href="detail3.php">Plus de détails</a>
              </div>
            </div>
          </div>
          <!-- /team -->


          <!-- team -->
          <div class="col-sm-4">
            <div class="team">
              <div class="team-img">
                <img class="img-responsive" src="../img/equipe2.jpg" alt="">
                <div class="overlay">
                  <div class="team-social">
                    <a href="https://www.facebook.com/ddiambwana" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                  </div>
                </div>
              </div>
              <div class="team-content">
                <h3>Dim Diambwana Mambote</h3>
                <span>Expert comptable</span><br>
                <a href="detail2.php">Plus de détails</a>
              </div>
            </div>
          </div>
          <!-- /team -->

        </div>
        <!-- /Row -->

      </div>
      <!-- /Container -->

    </div>
    <!-- /Team -->

   <!-- Footer -->
   <?php 

        //on inclus le nav
        include('footer_home.php'); 

    ?>>
 

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
