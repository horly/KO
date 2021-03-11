<!doctype html>
<!--Début html-->
<html lang="fr">
<!--Début html-->
    <head>
    <!--Début head-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../asserts/css/bootstrap.min.css" >

        <!--Style personnel-->
        <link rel="stylesheet" href="../asserts/css/style.css" >
        
        <!--Chargement des styles pour les icones des reseaux socio-->
        <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <link rel="stylesheet" href="../asserts/css/docs.css" >
        <link rel="stylesheet" href="../asserts/css/font-awesome.css" >

 

        <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">

        
        <!--<link rel="stylesheet" type="text/css" href="assets/css/loader.css">-->
        <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">

        
      
        

        <title>KEDIS Online! | Paiement mouenne Entreprise</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body>
    <!--Début body-->
    <style type="text/css">
        #alert-good
        {
            height: 91px;
        }

        #card-paiement
        {
          margin-bottom: 1.875em;
          border-radius: 5px;
          padding: 0;
          border: 0px solid transparent;
          -webkit-box-shadow: 0 0 20px rgba(0, 0, 0, 0.08);
                  box-shadow: 0 0 20px rgba(0, 0, 0, 0.08); }
    </style>

        


        <?php 
            //session_start();
            include('connecting_data_base.php');

            if(isset($_GET['email']))  //si la variable id qu'on a transité existe dans l'url 
            {
                $email = $_GET['email']; //on protège la variable 

                $requser = $bdd->prepare("SELECT * FROM user WHERE email_cl = ? ");
                $requser->execute(array($email));

                $userfos = $requser->fetch();

                $prenom = $userfos['prenom_cl'];
                $sexe= $userfos['sexe_cl'];

                //on active le compte 
                /*$upadate_compte = $bdd->prepare("UPDATE user SET confirm_comp = 1 WHERE email_cl = ?");
                $upadate_compte->execute(array($email));*/

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
        </div>

        <div class="container">
            <br><br><br>
            <h3>
                <?php
                    if($sexe == 'Monsieur')
                    {
                ?>
                    Cher <?php echo $sexe ?> <strong><?php echo $prenom; ?></strong>
                <?php
                    }
                    else
                    {
                ?>
                    Cher <?php echo $sexe ?> <strong><?php echo $prenom; ?></strong>
                <?php
                    }
                ?>
                 </h3>
            <hr>
            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-success" role="alert">
                        <h6 class="text-center">Vous avez choissi le type d'abonnement "ENTREPRISE". </h6>
                    </div>
                    <div class="alert alert-success" role="alert">
                        <h6 class="text-center">Veuillez compléter la transanction pour pouvoir utiliser votre abonnement d'un mois rénouvelable.</h6>
                    </div>
                    <!--<div class="alert alert-success" role="alert">
                        <h5 class="text-center">Veuillez cliquer <a href="main.php">ici</a> pour retourner à la page d'accueille et vous connecter</h5>
                    </div>-->
                    <div class="alert alert-info" id="alert-good" role="alert"><h6 class="text-center">Nous vous en remercions. <img id="god" src="../img/good.png"></h6></div>
                    </div>
                <div class="col-md-5">
                    <div class="card" id="card-paiement">
                        <h6 class="card-header text-center">Mode de paiement</h6>
                        <div class="card-body" id="paypal-button-container">

                            



                        </div>
                    </div>
                </div>
        </div>

        </div> <!-- /container -->
        <!--*****************************************************-->
        <br><br><br><br><br><br><br><br><br><br><br>
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
        <!--<script src="../asserts/js/vendor/jquery-slim.min.js"></script>-->
        <script src="../asserts/js/jquery/jquery.min.js"></script>

        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/dropdown.js"></script>
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>

        <!--switch arlert-->
        <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>


       <!--Paypal id live -->
        <script src="https://www.paypal.com/sdk/js?client-id=AYwFdEpFKxul_yF_xELUOX2h8MNriBIzM5z_J6pGevaHK8n-UVHxl_FCgkbAItV9nOtzitPITwGwmLvl">
        </script>

        <!--Paypal id sandbox local -->
        <!--<script src="https://www.paypal.com/sdk/js?client-id=AQ_QkkywhY6O-ys6ueeu8xP8MKQqollF8-EhAlkqoVpJv-SNUSaaNIQeWBvmeY3lGpEncb49WTYUI3DS">
        </script>-->

        <script>
          
        </script>

        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>
        <script type="text/javascript">
            $(function()
                {
                    paypal.Buttons({
                        createOrder: function(data, actions) {
                          return actions.order.create({
                            purchase_units: [{
                              amount: {
                                value: '25.00', 
                              }
                            }]
                          });
                        },
                        onApprove: function(data, actions) {
                          // Capture the funds from the transaction
                          return actions.order.capture().then(function(details) {
                            // Show a success message to your buyer
                            //alert('Transaction completed by ' + details.payer.name.given_name);
                            var email = '<?php echo $email; ?>';

                            $.ajax(
                                {
                                    type    : 'POST', 
                                    url     : 'fonction1/paiement_entreprise.php',
                                    data    : 'email=' + email,
                                    success:function(data)
                                    {
                                        swal(
                                        {
                                            title: "Payé !!",
                                            text: "Le paiement a été effectué avec succès !!",
                                            type: "success",
                                            confirmButtonColor: "#28a745",
                                            }, function(){ window.location = 'main.php?'; 
                                        });
                                    }
                                });

                          });
                        }
                      }).render('#paypal-button-container');
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