<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
        <title>KEDIS Online! Inscription</title>
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

            .custom-select 
            {
			  background: #f5f5f5 url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 4 5'%3E%3Cpath fill='%23343a40' d='M2 0L0 2h4zm0 5L0 3h4z'/%3E%3C/svg%3E") no-repeat right 0.75rem center;
			  background-size: 8px 10px;
			  padding: 25px 15px;
			width: 100%!important;
			border-radius: 6px;
			border: none;
			font-size: 16px;
			font-weight: 500;
			color: #bdbac2!important;
			}

			.signup
			{
				max-width: 466px;
				margin-left: auto;
				margin-right: auto;
			}

            #traitement
            {
                display: none;
            }
        </style>
		<main>
			<div class="layout">
				<!-- Start of Sign Up -->
				<div class="main order-md-2">
					<div class="start">
						<div class="container">
							<div class="col-md-12">
								<div class="content">
									<h1>S'inscrire avec</h1>
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
									<p>ou utilisez votre email pour vous inscrire:</p>
									<div class="signup">
										<div class="form-parent">
											<div class="form-group">
												<input type="text" id="prenom" class="form-control" placeholder="Prénom" required>
												<button class="btn icon"><i class="material-icons">person_outline</i></button>
											</div>
											<div class="form-group">
												<input type="text" id="nom" class="form-control" placeholder="Nom" required>
												<button class="btn icon"><i class="material-icons">person_outline</i></button>
											</div>
											
										</div>
										<div class="form-group">
											<div class="form-group">
												<select class="custom-select form-control" id="sexe">
													<option selected value="Monsieur">Homme</option>
                                                    <option value="Madame">Femme</option>
												</select>
												<button class="btn icon"><i class="material-icons">group_outline</i></button>
											</div>
										</div>
										<div class="form-group">
											<div class="form-group">
												<input type="email" id="email" class="form-control" placeholder="Adresse Email" required>
												<button class="btn icon"><i class="material-icons">mail_outline</i></button>
											</div>
										</div>
										<div class="form-group">
											<input type="password" id="password1" class="form-control" placeholder="Mot de passe" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
										<div class="form-group">
											<input type="password" id="password2" class="form-control" placeholder="Confirmation mot de passe" required>
											<button class="btn icon"><i class="material-icons">lock_outline</i></button>
										</div>
                                        <button type="submit" class="btn button" formaction="#" id="traitement">Traitement...</button>
										<button type="submit" class="btn button" formaction="#" id="inscription">S'inscrire</button>
										<div class="callout">
											<span>Déjà membre ? <a href="main.php">Se connecter</a></span>
										</div>
										<br><br>
										<span>En cliquant sur le bouton S'inscrire, vous acceptez nos termes et conditions.</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sign Up -->
				<!-- Start of Sidebar -->
				<div class="aside order-md-1">
					<div class="container">
						<div class="col-md-12">
							<div class="preference">
								<h2><a href="home.php">KEDIS Online!</a></h2>
								<p>Pour rester connecté avec vos amis, veuillez vous connecter avec vos informations personnelles.</p>
								<a href="main.php" class="btn button">Se connecter</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End of Sidebar -->
			</div> <!-- Layout -->
		</main>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
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
                                                                                $('#traitement').css('display', 'block');
                                                                                $('#inscription').css('display', 'none');

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
                                                                                                $('#traitement').css('display', 'none');
                                                                                                $('#inscription').css('display', 'block');

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
	</body>
</html>