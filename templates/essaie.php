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

        <!--chargement des icones-->
        <link href="../icons/css/ionicons.css" rel="stylesheet" type="text/css" />
        <link href="../icons/css/iconstyles.css" rel="stylesheet" type="text/css" />

        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../assert1/css/font-awesome.min.css">

        <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">

        <title>KEDIS Online!</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body>
    <!--Début body-->
    <style type="text/css">
        #prenom_error, #nom_error, #email_error, #password_error1, #password_error2
        {
            display: none;
        }
       
    </style>

        

        <nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
            <a class="navbar-brand" href="home.php"><img class="logo-alt" src="../img/logo_kedis2.png" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                
            </div>
            <div class="float-right">
                     <form class="form-inline my-2 my-lg-0" method="post" action="">                        
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                            </div>

                            <input type="email" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Adresse e-mail" name="mailconnect" required="" id="mailconnect">

                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                            </div>

                            <input type="password" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Mot de passe" name="passwordconnect" id="passwordconnect" required="">
                            <button type="button" name="connexion" id="connexion" class="btn btn-info">connexion</button>
                        </div> 
                     </form>   
                </div>
        </nav>
         <!--*****************************************************-->
        <div class="container">
            <br><br><br><br><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="text-center">
                        <h2><strong>Votre business à portée de main!</strong></h2>
                        <img src="../img/online.png" class="img-responsive center-block" alt="KEDIS ONLINE">
                        <div class="alert alert-info" role="alert">Grâce à KEDIS Online ! gardez le contrôle de votre activité partout où vous êtes en toute tranquillité.</div>
                        <div class="alert alert-warning" role="alert">Comptabilité - Facturation - Gestion des clients et fournisseurs - Gestion de caisse - Stock. ..et plus encore</div>
                    </div>
                </div>
                 <!--*****************************************************-->

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                          <!--*****************************************************-->
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="text-center">Inscription gratuite</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="prenom"><h6>Prénom</h6></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Votre prénom" name="prenom" id="prenom" required="">
                                            </div>
                                            <small id="prenom_error" class="form-text text-danger text-right"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="nom"><h6>Nom</h6></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text " id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                                                </div>
                                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Votre Nom" name="nom" id="nom" required="">
                                            </div>
                                            <small id="nom_error" class="form-text text-danger text-right"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="sexe"><h6>Genre</h6></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/genre.png"></span>
                                                </div>
                                                <select class="custom-select" name="sexe" id="sexe">
                                                    <option selected value="Monsieur">Monsieur</option>
                                                    <option value="Madame">Madame</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email"><h6>E-mail</h6></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                                                </div>
                                                <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="toi@exemple.com" name="email" id="email" required="">
                                            </div>
                                            <small id="email_error" class="form-text text-danger text-right"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password1"><h6>Mot de passe</h6></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                                                </div>
                                                <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Créer un mot de passe" name="password1" id="password1" required="">
                                            </div>
                                            <small id="password_error1" class="form-text text-danger text-right"></small>
                                        </div>
                                        <div class="form-group">
                                            <label for="password2"><h6>Confirmation mot de passe</h6></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                                                </div>
                                                <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Retaper le mot de passe" name="password2" id="password2" required="">
                                            </div>
                                            <small id="password_error2" class="form-text text-danger text-right"></small>

                                            <small id="emailHelp" class="form-text text-muted">En cliquant sur le bouton Inscription, vous acceptez nos conditions</small>
                                        </div>
                                            <button type="button" class="btn btn-primary btn-block" id="inscription">Inscription</button>
                                    </form>
                                </div>
                                <div class="card-footer text-muted">
                                     <label>Connexion avec </label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" name="fb_connect" class="btn btn-social btn-facebook btn-block">
                                                <span class="fa fa-facebook"></span> Facebook
                                            </button>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" name="gl_connect" class="btn  btn-social btn-google btn-block">
                                                <span class="fa fa-google"></span> Google+
                                            </button>
                                        </div>
                                    </div>
                                   
                                  
                                </div>
                            </div>
                        </div>
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
                        connexion();
                    });

                    
                    //lors qu'on appuye sur la touche entrer on se connecte
                    $(document).keypress(function(e)
                        {
                            var code = event.which || event.keyCode;

                            if(code === 13)
                            {
                                connexion();
                            }
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
                    }

                    //on vérivie le spécification du prénom dans le formulaire d'enregistrement 
                    $('#prenom').keyup(function()
                        {
                            var prenom = $('#prenom').val();
                            if(/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(prenom))
                            {
                                $('#prenom').addClass('is-valid');
                                $('#prenom').removeClass('is-invalid');
                                $('#prenom_error').css('display','none');
                                $('#prenom_error').html('');
                            }
                            else if(prenom == '')
                            {
                                $('#prenom').removeClass('is-valid');
                                $('#prenom').removeClass('is-invalid');
                                $('#prenom_error').css('display','none');
                                $('#prenom_error').html('');
                            }
                            else
                            {
                                $('#prenom').addClass('is-invalid');
                                $('#prenom').removeClass('is-valid');
                                $('#prenom_error').css('display','block');
                                $('#prenom_error').html('Le prénom ne doit conténir que des lettres !');
                            }
                        });

                    //on vérivie le spécification du nom dans le formulaire d'enregistrement 
                    $('#nom').keyup(function()
                        {
                            var nom = $('#nom').val();
                            if(/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(nom))
                            {
                                $('#nom').addClass('is-valid');
                                $('#nom').removeClass('is-invalid');
                                $('#nom_error').css('display','none');
                                $('#nom_error').html('');
                            }
                            else if(nom == '')
                            {
                                $('#nom').removeClass('is-valid');
                                $('#nom').removeClass('is-invalid');
                                $('#nom_error').css('display','none');
                                $('#nom_error').html('');
                            }
                            else
                            {
                                $('#nom').addClass('is-invalid');
                                $('#nom').removeClass('is-valid');
                                $('#nom_error').css('display','block');
                                $('#nom_error').html('Le nom ne doit conténir que des lettres !');
                            }
                        });

                    //on vérifie si le mail existe
                    $('#email').keyup(function()
                        {
                            var mail = $('#email').val();

                            if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(mail))
                            {

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
                                                $('#email').addClass('is-invalid');
                                                $('#email').removeClass('is-valid');
                                                $('#email_error').css('display','block');
                                                $('#email_error').html("Cette adresse émail est déjà utilisée !");
                                            }
                                            else
                                            {
                                                $('#email').removeClass('is-invalid');
                                                $('#email').addClass('is-valid');
                                                $('#email_error').css('display','none');
                                                $('#email_error').html("");
                                            }
                                        }
                                    });
                            }
                            else if(mail == '')
                            {
                                $('#email').removeClass('is-invalid');
                                $('#email').removeClass('is-valid');
                                $('#email_error').css('display','none');
                                $('#email_error').html("");
                            }
                            else
                            {
                                $('#email').addClass('is-invalid');
                                $('#email').removeClass('is-valid');
                                $('#email_error').css('display','none');
                                $('#email_error').html("");
                            }
                        });


                    //pour le mot de passe 
                    $('#password1').keyup(function()
                    {
                        var password = $('#password1').val();
                        var taille = password.length; 
                        if(password != '')
                        {
                            if(taille < 8)
                            {
                                $('#password1').addClass('is-invalid');
                                $('#password_error1').css('display','block');
                                $('#password_error1').html('Le mot de passe doit conténir au moins 8 caractères');
                            }
                            else
                            {
                                $('#password1').addClass('is-valid');
                                $('#password1').removeClass('is-invalid');
                                $('#password_error1').css('display','none');
                                $('#password_error1').html('');
                            }
                        }
                        else
                        {
                            $('#password1').removeClass('is-valid');
                            $('#password1').removeClass('is-invalid');
                            $('#password_error1').css('display','none');
                            $('#password_error1').html('');
                        }
                    });

                    //pour la confirmlation du mot de passe 
                    $('#password2').keyup(function()
                        {
                            var password = $('#password1').val();
                            var password2 = $('#password2').val();
                            if(password != '') 
                            {
                                if(password == password2)
                                {
                                    $('#password2').removeClass('is-invalid');
                                    $('#password2').addClass('is-valid');
                                    $('#password_error2').css('display','none');
                                    $('#password_error2').html('');
                                }
                                else if(password2 == '')
                                {
                                    $('#password1').removeClass('is-valid');
                                    $('#password1').removeClass('is-invalid');
                                    $('#password_error1').css('display','none');
                                    $('#password_error1').html('');

                                    $('#password2').removeClass('is-invalid');
                                    $('#password2').removeClass('is-valid');
                                    $('#password_error2').css('display','none');
                                    $('#password_error2').html('');
                                }
                                else
                                {
                                    $('#password2').addClass('is-invalid');
                                    $('#password2').removeClass('is-valid');
                                    $('#password_error2').css('display','block');
                                    $('#password_error2').html('Les deux mot de passe ne correspondent pas');
                                }
                            }
                            else if(password2 == '')
                            {
                                $('#password1').removeClass('is-valid');
                                $('#password1').removeClass('is-invalid');
                                $('#password_error1').css('display','none');
                                $('#password_error1').html('');

                                $('#password2').removeClass('is-invalid');
                                $('#password2').removeClass('is-valid');
                                $('#password_error2').css('display','none');
                                $('#password_error2').html('');
                            }
                            else
                            {
                                $('#password1').addClass('is-invalid');
                                $('#password1').removeClass('is-valid');
                                $('#password_error1').css('display','block');
                                $('#password_error1').html("Veuillez d'abord saisir le mot de passe ");

                                $('#password2').removeClass('is-invalid');
                                $('#password2').removeClass('is-valid');
                                $('#password_error2').css('display','none');
                                $('#password_error2').html('');
                            }  
                        });

                    //inscription d'un utilisateur
                    $('#inscription').click(function()
                        {
                            var prenom = $('#prenom').val();
                            var nom = $('#nom').val();
                            var sexe = $('#sexe').val();
                            var email = $('#email').val();
                            var password1 = $('#password1').val();
                            var password2 = $('#password2').val();

                            if(prenom != '')
                            {
                                if(nom != '')
                                {
                                    if(email != '')
                                    {
                                        if(password1 != '')
                                        {
                                            if(password2 != '')
                                            {
                                                if(/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(prenom))
                                                {
                                                    if(/^[a-zA-Z ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ]+$/.test(nom))
                                                    {
                                                        if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email))
                                                        {
                                                            var taille = password1.length; 

                                                            if(taille >= 8)
                                                            {
                                                                if(password1 == password2)
                                                                {
                                                                   $.ajax(
                                                                   {
                                                                        type    : 'POST', 
                                                                        url     : 'fonction1/verifmail.php',
                                                                        data    : 'mail=' + email,
                                                                        success:function(data)
                                                                        {
                                                                            if(data != 'exist')
                                                                            {
                                                                                $.ajax(
                                                                                    {
                                                                                        type    : 'POST',
                                                                                        url     : 'fonction1/create_user.php',
                                                                                        data    : 'prenom=' + prenom + '&nom=' + nom + '&sexe=' + sexe + '&email=' + email + '&password1=' + password1, 
                                                                                        success:function(donnee)
                                                                                        {
                                                                                            //alert(donnee);
                                                                                            if(donnee == 'main_not_send')
                                                                                            {
                                                                                                  //si le mail de confirmation n'as pas été envoyé, on supprime l'utilisateur
                                                                                                $.ajax(
                                                                                                    {
                                                                                                        type    : 'POST',
                                                                                                        url     : 'fonction1/detele_new_user.php',
                                                                                                        data    :'email=' + email,
                                                                                                        success:function(dele)
                                                                                                        {
                                                                                                            err4("Erreur lors de lors de l'enregistrement de l'utilisateur, mail de confirmation non envoyé, veuillez réessayer S.V.P!");
                                                                                                        }
                                                                                                    });
                                                                                               
                                                                                            }
                                                                                            else
                                                                                            {
                                                                                               window.location = 'welcom.php?email=' + email;
                                                                                            }
                                                                                        }
                                                                                    });
                                                                            }
                                                                            else
                                                                            {
                                                                                $('#email').addClass('is-invalid');
                                                                                err4('Cette adresse émail est déjà utilisée !');
                                                                            }
                                                                        }
                                                                   }); 
                                                                }
                                                                else
                                                                {
                                                                    $('#password2').addClass('is-invalid');
                                                                    err4("Les deux mot de passe ne correspondent pas");
                                                                }
                                                            }
                                                            else
                                                            {
                                                                $('#password1').addClass('is-invalid');
                                                                err4("Le mot de passe doit conténir au moins 8 caractères");
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $('#email').addClass('is-invalid');
                                                            err4("L'adresse émail que vous avez saisie est invalide");
                                                        }
                                                    }
                                                    else
                                                    {
                                                        $('#nom').addClass('is-invalid');
                                                        err4("Le nom ne doit conténir que des lettres !");
                                                    }
                                                }
                                                else
                                                {
                                                    $('#prenom').addClass('is-invalid');
                                                    err4("Le prénom ne doit conténir que des lettres !");
                                                }
                                            }
                                            else
                                            {
                                                $('#password1').addClass('is-invalid');
                                                err4('Veuillez confirmer le mot de passe S.V.P !'); 
                                            }
                                        }
                                        else
                                        {
                                            $('#password1').addClass('is-invalid');
                                            err4('Veuillez saisir un mot de passe S.V.P !');  
                                        }
                                    }
                                    else
                                    {
                                       $('#email').addClass('is-invalid');
                                        err4('Veuillez saisir votre adresse émail S.V.P !');  
                                    }
                                }
                                else
                                {
                                    $('#nom').addClass('is-invalid');
                                    err4('Veuillez saisir votre nom S.V.P !'); 
                                }
                            }
                            else
                            {
                                $('#prenom').addClass('is-invalid');
                                err4('Veuillez saisir votre prénom S.V.P !');
                            }
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

                    function err4(element){
                toastr.error(element,'Erreur',{
                  "positionClass": "toast-bottom-right",
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
                        "positionClass": "toast-bottom-left",
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
