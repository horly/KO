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
        <title>KEDIS Online!</title>

        <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body>
    <!--Début body-->
    <style type="text/css">
        #alert-good
        {
            height: 72px;
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
                Salutation <strong><?php echo $prenom; ?></strong></h3>
            <hr>
            <div class="row">
                <div class="col-md-7">
                    <div class="alert alert-success" role="alert">
                        <h6 class="text-center">Votre compte n'a pas encore été activé </h6>
                    </div>
                    <div class="alert alert-success" role="alert">
                        <h6 class="text-center">Veuillez consulter vos mails pour activer votre compte ou changer d'adresse émail</h6>
                    </div>
                    <!--<div class="alert alert-success" role="alert">
                        <h5 class="text-center">Veuillez cliquer <a href="main.php">ici</a> pour retourner à la page d'accueille et vous connecter</h5>
                    </div>-->
                    <div class="alert alert-info" id="alert-good" role="alert"><h6 class="text-center">Nous vous en remercions. <img id="god" src="../img/good.png"></h6></div>
                    </div>
                <div class="col-md-5">
                    <div class="card">
                        <h6 class="card-header text-center">Adresse émail</h6>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                                </div>
                                <input type="email" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Adresse e-mail" name="mailconnect" required="" id="mailconnect" value="<?php echo $email; ?>">
                            </div>
                        </div>
                        <div class="card-footer">
                            <h6>&nbsp;</h6>
                            <button type="button" name="reenvoyer" id="reenvoyer" class="btn btn-success btn-block">Envoyer</button>
                        </div>
                    </div>
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
                     <p>© 2018 <a href="https://kedisonline.com">KEDIS Online!</a> | Tous droits réservés</p>
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
                    $('#reenvoyer').click(function()
                        {
                            var email = $('#mailconnect').val();
                            var actue_mail = '<?php echo $email; ?>'

                            if(email != '')
                            {
                                if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(email))
                                {
                                    $.ajax(
                                        {
                                            type    : 'POST',
                                            url     : 'fonction1/resend_mail_confirmation_user.php',
                                            data    : 'email=' + email + '&actue_mail=' + actue_mail,
                                            success:function(data)
                                            {
                                                if(data == 'mail_send')
                                                {
                                                    valid3('Mail de confirmation envoyé avec success');
                                                    $('#mailconnect').removeClass('is-invalid');
                                                }
                                                else if(data == 'mail_exist')
                                                {
                                                    err3("Cette adresse émail est déjà utilisée par un autre utilisateur, veuillez réessayer S.V.P!");
                                                    $('#mailconnect').addClass('is-invalid');
                                                }
                                                else
                                                {
                                                    err3("Erreur, mail de confirmation non envoyé, veuillez réessayer S.V.P!");
                                                    $('#mailconnect').addClass('is-invalid');
                                                }
                                            }
                                        });
                                }
                                else
                                {
                                    err3("L'adresse émail que vous avez saisie est incorrecte !");
                                    $('#mailconnect').addClass('is-invalid');
                                }
                            }
                            else
                            {
                                err3("Veuillez remplir le champ de l'adresse émail S.V.P!");
                                $('#mailconnect').addClass('is-invalid');
                            }
                        });

                    //on vérie si l'adresse email correcte
                    $('#mailconnect').keyup(function()
                        {
                            var mail = $('#mailconnect').val();

                            if(/^[a-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$/.test(mail))
                            {
                                $('#mailconnect').addClass('is-valid');
                                $('#mailconnect').removeClass('is-invalid');
                            }
                            else
                            {
                                $('#mailconnect').removeClass('is-valid');
                                $('#mailconnect').addClass('is-invalid');
                            }
                        });

                    function valid3(element)
                  {
                    toastr.success(element,'Succès',{
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
