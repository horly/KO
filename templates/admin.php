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
        #id_admin
        {
            color : #f8f9fa;
        }

        
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

                <!--  Main navigation  -->
                  <!--<ul class="main-nav nav navbar-nav navbar-right ">
                    <li><a href="home.php#home">Accueil</a></li>
                    <li><a href="about.php">A propos</a></li>
                    <li><a href="home.php#pricing">Tarif</a></li>
                    <li class="has-dropdown" id="admin"><a href="#">Administration</a>
                      <ul class="dropdown">
                        <li><a href="admin.php">Admin</a></li>
                        <li><a href="equipe.php">Equipe</a></li>
                      </ul>
                    </li>
                    <li><a href="main.php">Se connecter</a></li>
                  </ul>-->
                  <!-- /Main navigation -->

            </div>
        </nav>
        <!-- /Nav -->

        <hr>
        <br><br>

    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="blog">
                    <div class="section-header text-center">
                        <h2 class="title">Administrateur</h2>
                            <input type="email" id="email" class="input" placeholder="Nom d'utilisateur">
                            <input type="password" id="password" class="input" placeholder="Mot de passe">
                            <br><br>
                            <button class="main-btn" id="connexion">Connexion</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>


     <!--Modal pour l'insertion d'une nouvelle article-->
              <div class="modal fade" id="code_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  
                    <div class="modal-content">
                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-sm-10">
                            <h6 class="modal-title" id="myModalLabel">Dernière vérification <label id="id_admin"></label></h6>
                          </div>
                          <div class="col-sm-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        </div>
                        
                      </div>
                      <div class="modal-body">
                        <label for="libelleart"><h6>Code secret</h6></label>
                        <input type="password" class="form-control" placeholder="*****************" aria-label="Recipient's username" aria-describedby="basic-addon2" name="code_secret" id="code_secret" required=""> 
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                            <i class="icon ion-android-cancel"></i>
                          </span>
                          &nbsp;&nbsp;Annuler</button>
                        <button type="submit" class="btn btn-success" name="valider" id="valider"> 
                          <span class="step size-21">
                            <i class="icon ion-archive"></i>
                          </span>
                          &nbsp;&nbsp;Valider</button>
                      </div>
                    </div>
                  
                </div>
              </div>
                <!--fin du modale-->
 


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
                    $('#connexion').click(function()
                        {
                            //alert('HELLO');
                            var email = $('#email').val();
                            var mot_de_passe = $('#password').val();

                            if(email != '')
                            {
                                if(mot_de_passe != '')
                                {
                                    $.ajax(
                                    {
                                        type    : 'POST',
                                        url     : 'fonction_admin/connexion_admin.php',
                                        data    :  'email=' + email + '&mot_de_passe=' + mot_de_passe,
                                        success:function(data)
                                        {
                                            if(data == 'note_exist')
                                            {
                                                err3("Email incorrecte !" );
                                            }
                                            else if(data == 'password_note_exist')
                                            {
                                                err3("Mot de passe incorrecte !" );
                                            }
                                            else
                                            {
                                                $('#code_modal').modal('show');
                                                $('#id_admin').text(data);
                                            }
                                        }
                                    });
                                }
                                else
                                {
                                    $('#password').addClass('is-invalid');
                                    err3("Veuillez saisir le mot de passe S.V.P !" );
                                }
                            }
                            else
                            {
                                $('#email').addClass('is-invalid');
                                err3("Veuillez saisir l'email ou le nom d'utilisateur S.V.P !" );
                            }
                        });

                    //validation code secret
                    $('#valider').click(function()
                        {
                            var id_admin = $('#id_admin').text();
                            var code_secret = $('#code_secret').val();

                            if(code_secret != '')
                            {
                                $.ajax(
                                    {
                                        type    : 'POST',
                                        url     : 'fonction_admin/verif_code_secret.php',
                                        data    : 'id_admin=' + id_admin + '&code_secret=' + code_secret,
                                        success:function(data)
                                        {
                                            //alert(data);
                                            if(data == 'exist')
                                            {
                                                window.location = 'login_on_admin.php?id=' + id_admin;
                                            }
                                            else
                                            {
                                                err3('Code secret incorrecte !');
                                            }
                                        } 
                                    });
                            }
                            else
                            {
                                err3("Veuillez saisir le code secret S.V.P !" );
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
