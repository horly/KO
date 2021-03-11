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

        #password_error1, #password_error2, #traitement, #traitement_fin
        {
            display: none;
        }
    </style>

        <?php 
            session_start();
            include('connecting_data_base.php');

            if(isset($_GET['email']))  //si la variable id qu'on a transité existe dans l'url 
            {
                $email = $_GET['email']; //on protège la variable 
                //$erreur = $_GET['erreur'];

                $requser = $bdd->prepare("SELECT * FROM user WHERE email_cl = ? ");
                $requser->execute(array($email));

                $userfos = $requser->fetch();

                $prenom = $userfos['prenom_cl'];
                $sexe= $userfos['sexe_cl'];


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
                Salutation <strong><?php echo $prenom; ?></strong></h3>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h6 class="card-header text-center">Réinitialisation mot de passe</h6>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <label for="password1"><h6>Nouveau mot de passe</h6></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                                        </div>

                                        <input type="password" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Créer un nouveau mot de passe" name="password1" id="password1" required="">
                                    </div>
                                </div>
                                <small id="password_error1" class="form-text text-danger text-right"></small>
                            </div>
                            <div class="form-group">
                                <label for="password2"><h6>Confirmation mot de passe</h6></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                                    </div>

                                    <input type="password" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Confirmer le mot de passe" name="password2" id="password2" required="">
                                </div>
                                <small id="password_error2" class="form-text text-danger text-right"></small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="button" name="valider" id="valider" class="btn btn-success btn-block">Valider</button>
                            <button type="button" name="traitement" id="traitement" class="btn btn-success btn-block">Traitement en cours...</button>
                            <button type="button" name="traitement_fin" id="traitement_fin" class="btn btn-success btn-block">Traitement effectué
                                <span class="step size-21">
                                    <i class="icon ion-android-done"></i>
                                </span>
                            </button>
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
                    $('#valider').click(function()
                        {
                            var password1 = $('#password1').val();
                            var password2 = $('#password2').val();
                            var email = '<?php echo $email; ?>';

                            if(password1 != '')
                            {
                                if(password2 != '')
                                {
                                    var taille = password1.length; 

                                    if(taille >= 8)
                                    {
                                        if(password1 == password2)
                                        {
                                            
                                            $('#valider').css('display', 'none');
                                            $('#traitement').css('display', 'block');
                                            

                                            $.ajax(
                                            {
                                                type    : 'POST',
                                                url     : 'fonction1/newpassword.php',
                                                data    : 'email=' + email + '&password=' + password1,
                                                success:function(data)
                                                {
                                                    setTimeout(function()
                                                    {
                                                        $('#valider').css('display', 'none');
                                                        $('#traitement').css('display', 'none');
                                                        $('#traitement_fin').css('display', 'block');
                                                        valid3('Mot de passe mis à jour avec succès!');
                                                    }, 5000);

                                                    setTimeout(function()
                                                        {
                                                            window.location = 'main.php?';
                                                        }, 10000);

                                                    //$('#valider').css('display', 'block');
                                                    //$('#traitement').css('display', 'none');
                                                    //valid3('Mot de passe mis à jour avec succès!');
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
                                    $('#password1').addClass('is-invalid');
                                    err4('Veuillez confirmer le mot de passe S.V.P !'); 
                                }
                            }
                            else
                            {
                                $('#password1').addClass('is-invalid');
                                err4('Veuillez saisir un mot de passe S.V.P !');
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
                    

                    

                        function err4(element){
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
<?php
    }
    else
    {
        header("location:deconnexion.php");
    }
?>
