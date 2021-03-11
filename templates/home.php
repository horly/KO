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



           <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">

        <title>KEDIS Online!</title>

        <!--pour la publicité google-->
        <script data-ad-client="ca-pub-5528389732176896" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <!--c head-->
    </head>
  <body>

    <style type="text/css">
      #homes
      {
        background: transparent;
        color: #6195FF;
      }
    </style>

    <!-- Header -->
    <header id="home">
      <!-- Background Image -->
      <div class="bg-img" style="background-image: url('../screenshots/8.jpg');">
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


          <?php 

            //on inclus le nav
            include('nav_home.php'); 

          ?>

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
                  <h2 class="white-text">Plateforme de gestion d'entreprise en ligne</h2>
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

    <!-- About -->
    <div class="section md-padding ">

      <!-- Container -->
      <div class="container">

        <!-- Row -->
        <div class="row">

          <!-- Section header -->
          <div class="section-header text-center">
            <h2 class="title">Bienvenue dans KEDIS Online!</h2>
          </div>
          <!-- /Section header -->

          <!-- about -->
          <div class="col-md-4">
            <div class="about">
              <i class="fa fa-users"></i>
              <h3>Communication</h3>
              <p>Grâce à Kedis Online!, je peux partager toutes les activités de mon entreprise avec mes collaborateurs ainsi qu'avec mes clients.</p>
              <!--<a href="communication.php">Plus de détails</a>-->
            </div>
          </div>
          <!-- /about -->

          <!-- about -->
          <div class="col-md-4">
            <div class="about">
              <i class="fa fa-envelope"></i>
              <h3>Facturation</h3>
              <p>Grâce à Kedis Online!, je peux facilement créer mes factures en suite les envoyer directement à mes clients via mail.</p>
              <br>
              <!--<a href="communication.php">Plus de détails</a>-->
            </div>
          </div>
          <!-- /about -->

          <!-- about -->
          <div class="col-md-4">
            <div class="about">
              <i class="fa fa-archive"></i>
              <h3>Stock</h3>
              <p>Grâce à Kedis Online!, je peux facilement stocker mes articles et produits pour une bonne gestion de mon entreprise.</p>
              <br>
              <!--<a href="communication.php">Plus de détails</a>-->
            </div>
          </div>
          <!-- /about -->

        </div>
        <!-- /Row -->
        
        

      </div>
      <!-- /Container -->

    </div>
    <!-- /About -->

    <div class="section md-padding bg-grey">
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
                        <p>Gérer vos états financiers.</p>
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
    </div>


    <!-- Service -->
    <div class="section md-padding ">

      <!-- Container -->
      <div class="container">

        <!-- Row -->
        <div class="row">

          <!-- Section header -->
          <div class="section-header text-center">
            <h2 class="title">Les services</h2>
          </div>
          <!-- /Section header -->

          <!-- service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <i class="fa fa-users"></i>
              <h3>Clients et Fournisseurs</h3>
              <p>L'utlisateur de KEDIS Online! a la possibilité d'enregistrer directement les informations sur ses clients, ses fournisseurs ainsi que ses créanciers et débiteurs divers.</p>
            </div>
          </div>
          <!-- /service -->

          <!-- service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <i class="fa fa-inbox"></i>
              <h3>Articles et Services</h3>
              <p>Le commerçant qui utilise KEDIS Online! a la possibilité d'enregistrer l'ensemble de ses articles par catégorie et sous catégorie. <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
            </div>
          </div>
          <!-- /service -->

          <!-- service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <i class="fa fa-credit-card"></i>
              <h3>Trésorerie</h3>
              <p>L'utilisateur dans KEDIS Online! peut configurer plusieurs modes de paiement (caisse espèces, banque, carte de crédit, paiement mobile…). <br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
            </div>
          </div>
          <!-- /service -->

          <!-- service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <i class="fa fa-file"></i>
              <h3>Facturation</h3>
              <p> KEDIS Online! permet à ses utilisateurs de créer leurs factures, les envoyer au client via mail ou autre messagerie et s'assurer de leur suivi jusqu'à l'encaissement.</p>
            </div>
          </div>
          <!-- /service -->

          <!-- service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <i class="fa fa-exchange"></i>
              <h3>Emprunts et Prêts</h3>
              <p>KEDIS Online offre la possibilité d'enregistrer les créances et dettes non commercialles (avances sur salaire, emprunts bancaires, prélèvement des dirigeants…).</p>
            </div>
          </div>
          <!-- /service -->

          <!-- service -->
          <div class="col-md-4 col-sm-6">
            <div class="service">
              <i class="fa fa-comments"></i>
              <h3>La communication interne</h3>
              <p>Nous avons développé un module qui permette à l'utilisateur de chatter avec ses collaborateurs. Ils peuvent ainsi s'échanger des fichiers et s'assigner des tâches à réaliser.</p>
            </div>
          </div>
          <!-- /service -->

        </div>
        <!-- /Row -->

      </div>
      <!-- /Container -->

    </div>
    <!-- /Service -->


    <!---other service -->

    <!-- Portfolio -->
    <div class="section md-padding bg-grey">

      <!-- Container -->
      <div class="container">

        <!-- Row -->
        <div class="row">

          <!-- Section header -->
          <div class="section-header text-center">
            <h2 class="title">Captures des activités</h2>
          </div>
          <!-- /Section header -->

          <!-- Work -->
          <div class="col-md-4 col-xs-6 work">
            <img class="img-responsive" src="../screenshots/client.jpg" alt="">
            <div class="overlay"></div>
            <div class="work-content">
              <span>Client</span>
              <h3>Le formulaire d'enregistrement d'un client</h3>
              <div class="work-link">
                <a href="#"><i class="fa fa-external-link"></i></a>
                <a class="lightbox" href="../screenshots/client.jpg"><i class="fa fa-search"></i></a>
              </div>
            </div>
          </div>
          <!-- /Work -->

          <!-- Work -->
          <div class="col-md-4 col-xs-6 work">
            <img class="img-responsive" src="../screenshots/article.jpg" alt="">
            <div class="overlay"></div>
            <div class="work-content">
              <span>Article</span>
              <h3>Le formulaire d'enregistrement d'un article</h3>
              <div class="work-link">
                <a href="#"><i class="fa fa-external-link"></i></a>
                <a class="lightbox" href="../screenshots/article.jpg"><i class="fa fa-search"></i></a>
              </div>
            </div>
          </div>
          <!-- /Work -->

          <!-- Work -->
          <div class="col-md-4 col-xs-6 work">
            <img class="img-responsive" src="../screenshots/paiement.jpg" alt="">
            <div class="overlay"></div>
            <div class="work-content">
              <span>Caisse</span>
              <h3>Paiement caisse</h3>
              <div class="work-link">
                <a href="#"><i class="fa fa-external-link"></i></a>
                <a class="lightbox" href="../screenshots/paiement.jpg"><i class="fa fa-search"></i></a>
              </div>
            </div>
          </div>
          <!-- /Work -->

          <!-- Work -->
          <div class="col-md-4 col-xs-6 work">
            <img class="img-responsive" src="../screenshots/depense.jpg" alt="">
            <div class="overlay"></div>
            <div class="work-content">
              <span>Dépense</span>
              <h3>Enregistrement dépense</h3>
              <div class="work-link">
                <a href="#"><i class="fa fa-external-link"></i></a>
                <a class="lightbox" href="../screenshots/depense.jpg"><i class="fa fa-search"></i></a>
              </div>
            </div>
          </div>
          <!-- /Work -->

          <!-- Work -->
          <div class="col-md-4 col-xs-6 work">
            <img class="img-responsive" src="../screenshots/fatucture-default.jpg" alt="">
            <div class="overlay"></div>
            <div class="work-content">
              <span>Facturation</span>
              <h3>Facture par défaut</h3>
              <div class="work-link">
                <a href="#"><i class="fa fa-external-link"></i></a>
                <a class="lightbox" href="../screenshots/fatucture-default.jpg"><i class="fa fa-search"></i></a>
              </div>
            </div>
          </div>
          <!-- /Work -->

          <!-- Work -->
          <div class="col-md-4 col-xs-6 work">
            <img class="img-responsive" src="../screenshots/facture-pers.jpg" alt="">
            <div class="overlay"></div>
            <div class="work-content">
              <span>Facturation</span>
              <h3>Facture personalisée</h3>
              <div class="work-link">
                <a href="#"><i class="fa fa-external-link"></i></a>
                <a class="lightbox" href="../screenshots/facture-pers.jpg"><i class="fa fa-search"></i></a>
              </div>
            </div>
          </div>
          <!-- /Work -->

        </div>
        <!-- /Row -->

      </div>
      <!-- /Container -->

    </div>
    <!-- /Portfolio -->

    <!-- Numbers -->
    <div id="numbers" class="section sm-padding">

      <!-- Background Image -->
      <div class="bg-img" style="background-image: url('../img/background2.jpg');">
        <div class="overlay"></div>
      </div>
      <!-- /Background Image -->

      <!-- Container -->
      <div class="container">

        <!-- Row -->
        <div class="row">

          <!-- number -->
          <div class="col-sm-3 col-xs-6">
            <div class="number">
              <i class="fa fa-users"></i>
              <h3 class="white-text"><span class="counter">1.6</span>K</h3>
              <span class="white-text">Utilisateurs</span>
            </div>
          </div>
          <!-- /number -->

          <!-- number -->
          <div class="col-sm-3 col-xs-6">
            <div class="number">
              <i class="fa fa-shopping-bag"></i>
              <h3 class="white-text"><span class="counter">1.1</span>K</h3>
              <span class="white-text">Entreprises</span>
            </div>
          </div>
          <!-- /number -->

          <!-- number -->
          <div class="col-sm-3 col-xs-6">
            <div class="number">
              <i class="fa fa-shopping-bag"></i>
              <h3 class="white-text"><span class="counter">1.9</span>K</h3>
              <span class="white-text">Sous-entreprises</span>
            </div>
          </div>
          <!-- /number -->

          <!-- number -->
          <div class="col-sm-3 col-xs-6">
            <div class="number">
              <i class="fa fa-file"></i>
              <h3 class="white-text"><span class="counter">1</span>T</h3>
              <span class="white-text">Factures/Jours</span>
            </div>
          </div>
          <!-- /number -->

        </div>
        <!-- /Row -->

      </div>
      <!-- /Container -->

    </div>
    <!-- /Numbers -->

    <!-- Contact -->
    <div class="section md-padding">

      <!-- Container -->
      <div class="container">

        <!-- Row -->
        <div class="row">

          <!-- Section-header -->
          <div class="section-header text-center">
            <h2 class="title">Nous contacter</h2>
          </div>
          <!-- /Section-header -->

          <!-- contact -->
          <div class="col-sm-4">
            <div class="contact">
              <i class="fa fa-phone"></i>
              <h3>Téléphone</h3>
              <p>+44-74-59-13-99-41</p>
            </div>
          </div>
          <!-- /contact -->

          <!-- contact -->
          <div class="col-sm-4">
            <div class="contact">
              <i class="fa fa-envelope"></i>
              <h3>Email</h3>
              <p>contact@kedisonline.com</p>
            </div>
          </div>
          <!-- /contact -->

          <!-- contact -->
          <div class="col-sm-4">
            <div class="contact">
              <i class="fa fa-map-marker"></i>
              <h3>Adresse</h3>
              <p>2 LOWRY HOUSE PALMERSTON - LONDON - W3 8BF - England.</p>
            </div>
          </div>
          <!-- /contact -->

          <!-- contact form -->
          <div class="col-md-8 col-md-offset-2">
            <div class="contact-form">
              <input type="text" class="input" id="nom" placeholder="Nom">
              <input type="email" class="input" id="email" placeholder="Email">
              <input type="text" class="input" id="objet" placeholder="Sujet">
              <textarea class="input" id="message" placeholder="Message"></textarea>
              <button class="main-btn" id="send-message">Envoyer le message</button>
            </div>
          </div>
          <!-- /contact form -->

        </div>
        <!-- /Row -->

      </div>
      <!-- /Container -->

    </div>
    <!-- /Contact -->

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
          $(function()
            {
              //envoyer le message
              $('#send-message').click(function()
                {
                  var nom = $('#nom').val();
                  var email = $('#email').val();
                  var objet = $('#objet').val();
                  var message = $('#message').val();

                  //alert('OKOKO');

                  if(nom != '')
                  {
                    if(email != '')
                    {
                      if(objet != '')
                      {
                        if(message != '')
                        {
                          if(/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(nom))
                          {
                            if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email))
                            {
                              $.ajax(
                                {
                                  type  : 'POST', 
                                  url   : 'fonction1/send_message_visiteur.php',
                                  data  : 'nom=' + nom + '&email=' + email + '&objet=' + objet + '&message=' + message,
                                  success:function(data)
                                  {
                                    //alert(data);

                                    //$('#message').val(data);
                                    /*if(data == 'mail_send')
                                    {*/
                                      valid3("Message envoyé avec succès !");

                                      $('#nom').val('');
                                      $('#email').val('');
                                      $('#objet').val('');
                                      $('#message').val('');
                                    /*}
                                    else
                                    {
                                      err3("Erreur lors de l'envoie du message");
                                    }*/
                                    
                                  }
                                });
                            }
                            else
                            {
                              err4("L'adresse émail que vous avez saisie est invalide");
                            }
                          }
                          else
                          {
                             err4("Le nom ne doit conténir que des lettres !");
                          }
                        }
                        else
                        {
                          err3("Veuillez saisir le message S.V.P!");
                        }
                      }
                      else
                      {
                        err3("Veuillez saisir le sujet S.V.P!");
                      }
                    }
                    else
                    {
                      err3("Veuillez saisir l'émail S.V.P!");
                    }
                  }
                  else
                  {
                    err3("Veuillez saisir le nom S.V.P!");
                  }
                });



                function valid3(element)
                    {
                      toastr.success(element,'Succès',{
                        "positionClass": "toast-bottom-center",
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

                    function err3(element){
                    toastr.error(element,'Erreur',{
                      "positionClass": "toast-bottom-center",
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

  </body>
</html>
