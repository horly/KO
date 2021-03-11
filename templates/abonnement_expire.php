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

        <!--Style personnel-->
        <link rel="stylesheet" href="../asserts/css/style.css" >
        
        <!--Chargement des styles pour les icones des reseaux socio-->
        <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <link rel="stylesheet" href="../asserts/css/docs.css" >
        <link rel="stylesheet" href="../asserts/css/font-awesome.css" >


        <!--<link rel="stylesheet" type="text/css" href="assets/css/loader.css">-->
        <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">

        <title>KEDIS Online!</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body>
    <!--Début body-->
    <style type="text/css">
    	.ronde
        {
          border : 2px solid #007bff;
          border-radius: 100px;
          width: 120px;
          height: 120px;
          margin-left: auto;
          margin-right: auto;
          padding:15px;
        }

        .div_souscription
        {
          background-color: #f8f9fa;
          margin-bottom: 1.875em;
          border-radius: 5px;
          padding: 0;
          border: 0px solid transparent;
          -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
                  box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
        }

        .div_souscription:hover
        {
          background-color: #343a40;
          color: #f8f9fa;
        }
    </style>

        <?php 
            session_start();
            include('connecting_data_base.php');

            if(isset($_GET['email']))  //si la variable id qu'on a transité existe dans l'url 
            {
                $email = $_GET['email']; //on protège la variable 

                $requser = $bdd->prepare("SELECT * FROM user WHERE email_cl = ? ");
                $requser->execute(array($email));

                $userfos = $requser->fetch();

                $prenom = $userfos['prenom_cl'];
                $sexe= $userfos['sexe_cl'];

                /*if($sexe == "Homme")
                {
                    $genre = "monsieur";
                }
                else
                {
                    $genre = "madame";
                }*/

        ?>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
            <a class="navbar-brand" href="home.php"><img class="logo-alt" src="../img/logo_kedis2.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                
            </div>
        </nav>
         <!--*****************************************************-->
        <div class="container">
            <br><br><br><br><br>
            <h3>
                Bonjour <strong><?php echo $prenom; ?></strong></h3>
            <hr>
            <div class="alert alert-success" role="alert">
                <h6 class="text-center">Votre abonnement a expiré, nous vous prions de le renouveller en choisissant les tarifs ci-dessous ! </h6>
            </div>
            <div class="alert alert-info" role="alert"><h6 class="text-center">Nous vous en remercions. 		
            	<img id="god" src="../img/good.png"></h6></div>

            <br><br>
        	<h5 class="text-center" id="abonne_type">Les types d'abonnement</h5>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <div class="p-3 mb-2 border div_souscription">
                  <h5 class="text-center">PETITE ENTREPRISE</h5>
                  <br>
                  <div class="ronde">
                    <h1 class="text-center">$0</h1>
                    <h6 class="text-center">/mois</h6>
                  </div>
                  <br>
                  <h6 class="text-center">5 factures / mois</h6>
                  <h6 class="text-center">1 Entreprise</h6>
                  <h6 class="text-center">1 Unité d'exploitation</h6>
                  <h6 class="text-center">1 Utilisateur</h6>
                  <br>
                  <button type="button" class="btn btn-outline-primary btn-block text-center" id="abonnement_petite_entre">Souscrire</button>
                </div>
              </div>
              <div class="col-md-4">
                <div class="p-3 mb-2 border div_souscription">
                  <h5 class="text-center">MOYENNE ENTREPRISE</h5>
                  <br>
                  <div class="ronde">
                    <h1 class="text-center">$10</h1>
                    <h6 class="text-center">/mois</h6>
                  </div>
                  <br>
                  <h6 class="text-center">Factures illimitées</h6>
                  <h6 class="text-center">2 Entreprises</h6>
                  <h6 class="text-center">5 Unités d'exploitation</h6>
                  <h6 class="text-center">5 Utilisateurs</h6>
                  <br>
                  <a href="paiment_moyenne_entreprise.php?email=<?php echo $email; ?>" role="button" class="btn btn-outline-primary btn-block text-center">Souscrire</a>
                </div>
              </div>
              <div class="col-md-4">
                <div class="p-3 mb-2 border div_souscription">
                  <h5 class="text-center">ENTREPRISE</h5>
                  <br>
                  <div class="ronde">
                    <h1 class="text-center">$25</h1>
                    <h6 class="text-center">/mois</h6>
                  </div>
                  <br>
                  <h6 class="text-center">Factures illimitées</h6>
                  <h6 class="text-center">Entreprises illimitées</h6>
                  <h6 class="text-center">Unités d'exploitations illimitées</h6>
                  <h6 class="text-center">Utilisateurs illimités</h6>
                  <br>
                  <a href="paiment_entreprise.php?email=<?php echo $email; ?>" role="button" class="btn btn-outline-primary btn-block text-center">Souscrire</a>
                </div>
              </div>
            </div>
                    

        </div> <!-- /container -->
        <!--*****************************************************-->
        <br><br>
        <hr class="featurette-divider">
        <nav class="nav bg-dark text-white">
            <div class="container-fluid">
                <br><br>
                <div class="text-center">
                    <a href="home.php"><img src="../img/K@Online-sans.png" alt="logo"></a>
                </div>
                <br><br>
                <div class="text-center"><!--début text-center-->
                    <a href="https://twitter.com/" target="_blank" class="btn btn-social-icon btn-twitter"><span class="fa fa-twitter"></span></a>
                    <a href="https://web.facebook.com" target="_blank" class="btn btn-social-icon btn-facebook"><span class="fa fa-facebook"></span></a>
                    <a href="https://fr.linkedin.com/" target="_blank" class="btn btn-social-icon btn-linkedin"><span class="fa fa-linkedin"></span></a>
                    <a href="https://plus.google.com/collections/featured" target="_blank" class="btn btn-social-icon btn-google"><span class="fa fa-google"></span></a>
                    <p> E-mail : contact@kedisonline.com</strong></p>

                    <?php
                            setlocale(LC_TIME, 'fr_FR'); //serveur
                            $year = date("Y");
                    ?>
                     <p>© <?php echo $year; ?> <a href="https://kedisonline.com">KEDIS Online!</a> | Tous droits réservés</p>
                    <p></p>
                </div><!--fin text-center-->
            </div>
            <br><br><br>
        </nav>
        <!-- Bootstrap JS -->
       <script src="../asserts/js/vendor/jquery-slim.min.js"></script>
        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/dropdown.js"></script>
        <script src="../dist/js/collapse.js"></script>


        <!--switch arlert-->
        <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>

        <script type="text/javascript">
          $(function()
            {
              $('#abonnement_petite_entre').click(function()
                {
                  var email = '<?php echo $email; ?>';

                  $.ajax(
                      {
                          type    : 'POST', 
                          url     : 'fonction1/paiement_petite_entreprise.php',
                          data    : 'email=' + email,
                          success:function(data)
                          {
                              swal(
                              {
                                  title: "Succès !!",
                                  text: "Abonnement effectué avec succès !!",
                                  type: "success",
                                  confirmButtonColor: "#28a745",
                                  }, function(){ window.location = 'main.php?'; 
                              });
                          }
                      });
                });
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
        header("location:deconnexion.php");
    }
?>
