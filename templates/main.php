<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>KEDIS Online! Connexion</title>
        <meta name="description" content="#">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap core CSS -->
        <link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
        <!-- Swipe core CSS -->
        <link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">
        <!-- Favicon -->
        <!--<link href="dist/img/favicon.png" type="image/png" rel="icon">-->

        <!--Chargement des styles pour les icones des reseaux socio-->
        <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <link rel="stylesheet" href="../asserts/css/docs.css" >
        <link rel="stylesheet" href="../asserts/css/font-awesome.css" >

        <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">

    </head>
    <body class="start">

        <style type="text/css">
            .aside {
                background: #007bff;
            }
        </style>
        <main>
            <div class="layout">
                <!-- Start of Sign In -->
                <div class="main order-md-1">
                    <div class="start">
                        <div class="container">
                            <div class="col-md-12">
                                <div class="content">
                                    <h1>Connectez-vous avec</h1>
                                    <div class="third-party">
                                        <button class="btn item bg-blue text-white">
                                            <span class="fa fa-facebook"></span>
                                        </button>
                                        <button class="btn item bg-danger text-white">
                                            <span class="fa fa-google"></span>
                                        </button>
                                        <!--<button class="btn item bg-purple">
                                            <img src="dist/img/placeholders/250x250.png" alt="social">
                                        </button>-->
                                    </div>
                                    <p>ou utilisez votre compte email:</p>
                                    <form>
                                        <div class="form-group">
                                            <input type="email" id="mailconnect" class="form-control" placeholder="Adresse Email" required>
                                            <button class="btn icon"><i class="material-icons">mail_outline</i></button>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="passwordconnect" class="form-control" placeholder="Mot de passe" required>
                                            <button class="btn icon"><i class="material-icons">lock_outline</i></button>
                                        </div>
                                        <button type="submit" class="btn button" formaction="#" id="connexion">Se connecter</button>
                                        <div class="callout">
                                            <span>Vous n'avez pas de compte ? <a href="inscription.php">Créer un compte</a></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Sign In -->
                <!-- Start of Sidebar -->
                <div class="aside order-md-2">
                    <div class="container">
                        <div class="col-md-12">
                            <div class="preference">
                                <h2><a href="home.php">KEDIS Online!</a></h2>
                                <p>Votre business à portée de main!</p>
                                <a href="inscription.php" class="btn button">S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Sidebar -->
            </div> <!-- Layout -->
        </main>
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Bootstrap JS -->
           <!--<script src="../asserts/js/vendor/jquery-slim.min.js"></script>-->
        <script src="../asserts/js/jquery/jquery.min.js"></script>
        <script src="dist/js/vendor/popper.min.js"></script>
        <script src="dist/js/swipe.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>

        <!--loader-->
        <!--<script src="assets/js/loader.js"></script>-->
        <!--Les emojo-->
        <!--<script type="text/javascript" src="../emoji/emojionearea.js"></script>-->

        <script src="../emoji/js/twemoji-picker.js"></script>

        <!--switch arlert-->
        <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>

        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function($) 
            {

                //lors qu'on appuye sur la touche entrer on se connecte
                $(document).keypress(function(e)
                    {
                        var code = event.which || event.keyCode;

                        if(code === 13)
                        {
                            connexion();
                        }
                    });



                $('#connexion').click(function()
                    {
                        //err3('HELLO');
                         connexion();
                    });


                //fonction de connexion de l'utilisateur
                function connexion()
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
                                                                                /*ici on verifie si l'utilisateur de type user est actif quand son type d'abonnement est Moyenne Entreprise et s'il a déjà des accès dans une entreprise  */
                                                                                $.ajax({
                                                                                    type    : 'POST', 
                                                                                    url     : 'fonction1/verif_user.php',
                                                                                    data    : 'email=' + mail,
                                                                                    success:function(condition)
                                                                                    {
                                                                                        if(condition == 1)
                                                                                        {
                                                                                            //s'il n'est pas actif
                                                                                            window.location = 'noactif_user.php?email=' + mail;
                                                                                        }
                                                                                        else if(condition == 2)
                                                                                        {
                                                                                            //s'il n'as pas d'access
                                                                                            window.location = 'noaccess_user.php?email=' + mail;
                                                                                        }  
                                                                                        else
                                                                                        {
                                                                                            //condition == 0, on se connecte normalement
                                                                                            window.location = 'login_on.php?id=' + data;
                                                                                        }
                                                                                    } 
                                                                                });
                                                                                
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
            });
        </script>
    </body>
</html>