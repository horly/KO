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
            <h2>Mentions légales</h2>
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="home.php">Accueil</a></li>
              <li class="breadcrumb-item active">Mentions légales</li>
            </ul>
          </div>
        </div>
        <!-- /header wrapper -->

    </header>

    <div id="team" class="section md-padding">

      <div class="container">
          
          <h5>Société</h5>
          <p>Dirigée par Diambwana Mambote Dim, la société (GVM) Limited édite la plateforme KEDIS Online! permettant de faciliter la gestion en ligne aux entreprises qui l'utilise.</p>

          <br>
          <h5>Siège social</h5>
          <p>2 LOWRY HOUSE PALMERSTON<br>LONDON<br>W3 8BF<br>England.</p>

          <br>
          <h5>Propriétaire du site</h5>
          <p>La plateforme KEDIS Online! est la propriété de la société (GVM) Limited, enregistrée au RCS de Londre sous le numéro 09237428, qui se réserve tous les droits d'exploitation et de diffusion de la plateforme.</p>

          <br>
          <h5>Directeur de la publication</h5>
          <p>Diambwana Mambote Dim<span><br>Le Directeur et Cofondateur.</span></p>

          <br>
          <h5>Hébergement</h5>
          <p>Le site est hébergé par la société : <br>HOSTINGER <br>61 Lordou Vironos Street<br>6023 Larnaca, Chypre.</p>




      </div>
    </div>

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
