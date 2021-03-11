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

        <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">

        <title>KEDIS Online!</title>
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
        <div class="container">
            <br><br><br><br><br>
            <h3>FIN DE LA TRANSACTION</h3>
            <hr>
                    <div class="alert alert-success" role="alert">
                        <h5 class="text-center">Le paiement a été effectué avec succès. </h5>
                    </div>
                    <div class="alert alert-success" role="alert">
                        <h5 class="text-center">Veuillez cliquer sur ce <a href="main.php"> lien</a> pour vous connecter.</h5>
                    </div>
                    <!--<div class="alert alert-success" role="alert">
                        <h5 class="text-center">Veuillez cliquer <a href="main.php">ici</a> pour retourner à la page d'accueille et vous connecter</h5>
                    </div>-->
                    <div class="alert alert-info" id="alert-good" role="alert"><h5 class="text-center">Nous vous en remercions. <img id="god" src="../img/good.png"></h5></div>
        </div>

        </div> <!-- /container -->
        <!--*****************************************************-->
        <br><br>
        <nav class="nav bg-dark fixed-bottom text-white">
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

        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>
        <script type="text/javascript">
            $(function()
                {
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
