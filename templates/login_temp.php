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
            session_start();
            include('connecting_data_base.php');

            if(isset($_GET['email']) AND isset($_GET['erreur']))  //si la variable id qu'on a transité existe dans l'url 
            {
                $email = $_GET['email']; //on protège la variable 
                $erreur = $_GET['erreur'];


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
                Erreur de connexion</h3>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h6 class="card-header text-center">Se connecter</h6>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                                </div>
                                <input type="email" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Adresse e-mail" name="mailconnect" required="" id="mailconnect" value="<?php echo $email; ?>">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                                </div>

                                <input type="password" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Mot de passe" name="passwordconnect" id="passwordconnect" required="">
                            </div>
                            <small class="form-text text-danger text-left"><a href="#" id="password_reinis">Mot de passe oublié ?</a></small>
                        </div>
                        <div class="card-footer">
                            <button type="button" name="connexion" id="connexion" class="btn btn-success btn-block">connexion</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
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
                    erreur();

                    //cette fonction me permet d'afficher les erreurs en fonction de son type lors du chargement de la page
                    function erreur()
                    {
                        var erreur = '<?php echo $erreur; ?>';

                        if(erreur == 'password')
                        {
                            err3('Mot de passe incorrecte !');
                            $('#passwordconnect').addClass('is-invalid');
                        }
                        else
                        {
                            err3('Adresse émail incorrecte !');
                            $('#mailconnect').addClass('is-invalid');
                        }
                    }

                    //on vérifie si le mail existe
                    $('#mailconnect').keyup(function()
                        {
                            var mail = $('#mailconnect').val();

                            $.ajax(
                                {
                                    type    : 'POST',
                                    url     : 'fonction1/verifmail.php', 
                                    data    : 'mail=' + mail,
                                    success :function(data)
                                    {
                                        //alert(data);
                                        if(data == 'exist')
                                        {
                                            $('#mailconnect').addClass('is-valid');
                                            $('#mailconnect').removeClass('is-invalid');
                                        }
                                        else
                                        {
                                            $('#mailconnect').removeClass('is-valid');
                                            $('#mailconnect').addClass('is-invalid');
                                        }
                                    }
                                });
                        });

                    //fonction pour la connexion
                    $('#connexion').click(function()
                        {
                            var mail = $('#mailconnect').val();
                        var password = $('#passwordconnect').val();
                        var erreur = "";

                        if(mail != '')
                        {
                            if(password != '')
                            {
                                $.ajax(
                                {
                                    type    : 'POST',
                                    url     : 'fonction1/connexion.php',
                                    data    : 'mail=' + mail + '&password=' + password,
                                    success :function(data)
                                    {
                                        //alert(data);
                                        if(data == 0)
                                        {
                                            erreur = "email";
                                            //si l'erreur provient de l'adresse émail
                                            window.location = 'login_temp.php?email=' + mail + "&erreur=" + erreur;
                                        }
                                        else if(data == 2)
                                        {
                                            erreur = "password";
                                            //si l'erreur provient de l'adresse du mot de passe
                                            window.location = 'login_temp.php?email=' + mail + "&erreur=" + erreur;
                                        }
                                        else
                                        {
                                            /*on vérifie d'abord si le user est un admin ou un user
                                            pour voir s'il a confirmé son compte de user ou pas */
                                            $.ajax(
                                            {
                                                type    : 'POST',
                                                url     : 'fonction1/verif_user_and_admin.php', 
                                                data    : 'email=' + mail,
                                                success:function(active)
                                                {
                                                    if(active == 1)
                                                    {
                                                        //on vérifie si le compte de l'utilisateur a été activé
                                                        $.ajax(
                                                        {
                                                            type    : 'POST',
                                                            url     : 'fonction1/verif_active_compte.php',
                                                            data    : 'email=' + mail,
                                                            success:function(donnee)
                                                            {
                                                                if(donnee == "actived")
                                                                {
                                                                    /*on vérifie le nombre des jours restant pour l'abonnement de l'utilisateur*/
                                                                    $.ajax(
                                                                        {
                                                                            type    : 'POST',
                                                                            url     : 'fonction1/verif_abonnement.php',
                                                                            data    : 'email=' + mail,
                                                                            success:function(abonne)
                                                                            {
                                                                                //alert(abonne);
                                                                                if(abonne > 0)
                                                                                {
                                                                                    window.location = 'login_on.php?id=' + data;
                                                                                }
                                                                                else
                                                                                {   
                                                                                    window.location = 'abonnement_expire.php?email=' + mail; 
                                                                                }
                                                                            }
                                                                        });
                                                                }
                                                                else
                                                                {
                                                                    window.location = 'compte_non_active.php?email=' + mail;
                                                                }
                                                            }
                                                        });
                                                    }
                                                    else
                                                    {
                                                        window.location = 'compte_non_active_user.php?email=' + mail;
                                                    }
                                                }
                                            });
                                        }
                                    }
                                });  
                            }
                            else
                            {
                                $('#passwordconnect').addClass('is-invalid');
                                err3("Veuillez renseigner le mot de passe S.V.P!");
                            }
                        }
                        else
                        {
                            $('#mailconnect').addClass('is-invalid');
                            err3("Veuillez renseigner l'adresse émail S.V.P!");
                        }
                        });


                    //reinitialisation du mot de passe
                    $('#password_reinis').click(function()
                        {
                            var email = $('#mailconnect').val();

                            $.ajax(
                            {
                                type    : 'POST',
                                url     : 'fonction1/send_code_password.php',
                                data    :  'email=' + email,
                                success:function(data)
                                {
                                    window.location = 'reintis_password.php?email=' + email;
                                }
                            });
                        });

                        function err3(element){
                        toastr.error(element,'Erreur',{
                          "positionClass": "toast-top-center",
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
