<?php
	
	/*ini_set ( 'display_errors' , 1 ) ;  
    error_reporting ( E_ALL ) ;

	$header = "MINE-Version: 1.0\r\n";
    $header.= 'De:"kedisonline.com"<contact@kedisonline.com>'."\n";
    $header.= 'Content-Type:text/html; charset="utf-8"'."\n";
    $header.= 'Content-Transfert-Encoding: 8bits';
    $to = "andmatboy@gmail.com";
    $subject = "Activation compte KEDIS Online!";

    /*$message ='
			<html>
				<body style="background-color: #D3D3D3;
							padding-top: 20px;">
					<div style="margin-right: auto; 
								margin-left: auto; 
								width: 600px;  
								padding-right: 30px;
				 		 		padding-left: 30px; 
				 		 		background-color: white;
				 		 		border-top: 10px solid #007bff;">
						<h1 style=" margin-bottom: 0.5rem;
				  					font-family: inherit;
				  					font-weight: bold;
				  					line-height: 1.2;
				  					color: #007bff;">KEDIS Online!</h1>
				  		<h5 style="	margin-bottom: 0.5rem;
				  					font-family: Century Gothic;
				  					line-height: 1.2;
				  					color: #696969;
				  					font-weight: bold;
				  					font-size: 1.25rem;
				  					text-align: center">Confirmation compte</h5>

				  		<p style="	font-family: Century Gothic;
				  					color: #696969;
				  					font-weight: 500;
				  					text-align: justify;">
				  			Bonjour monsieur Andelo et bienvenue sur <a style="text-decoration: none; font-weight: bold; color: #007bff;" href="https://kedisonline.com" target="_blank">KEDIS Online!</a>, <br><br>
				  			Veuillez confirmer votre compte
							Il reste une dernière étape avant de pouvoir vous connecter: veuillez activer votre compte en cliquant sur le bouton ci-dessous.
				  		</p>

				  		<a style="display: block;
				  				  margin-left: auto;
				    			  margin-right: auto;
				    			  width: 300px;
								  font-weight: 400;
								  text-align: center;
								  white-space: nowrap;
								  vertical-align: middle;
								  -webkit-user-select: none;
								  -moz-user-select: none;
								  -ms-user-select: none;
								  user-select: none;
								  border: 1px solid transparent;
								  padding: 0.375rem 0.75rem;
								  font-size: 1.25rem;
								  line-height: 1.5;
								  border-radius: 0.25rem;
								  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
								  color: #fff;
								  background-color: #007bff;
								  border-color: #007bff;
								  text-decoration: none;" href="#">Je confirme mon compte</a>
						<br>
						<h2 style="text-align: center;">Votre business à portée de main!</h2>
						<img style="display: block;
									margin-left: auto;
				    				margin-right: auto;"src="https://kedisonline.com/img/online.png">

						<p style="	font-family: Century Gothic;
				  					color: #696969;
				  					font-weight: 500;
				  					text-align: center;
				  					position: relative;
									  padding: 0.75rem 1.25rem;
									  margin-bottom: 1rem;
									  border: 1px solid transparent;
									  border-radius: 0.25rem;
									  color: #0c5460;
									  background-color: #d1ecf1;
									  border-color: #bee5eb;">
				  					Grâce à KEDIS Online ! gardez le contrôle de votre activité partout où vous êtes en toute tranquillité.
				  		</p>
				  		<p style="	font-family: Century Gothic;
				  					color: #696969;
				  					font-weight: 500;
				  					text-align: center;
				  					position: relative;
									  padding: 0.75rem 1.25rem;
									  margin-bottom: 1rem;
									  border: 1px solid transparent;
									  border-radius: 0.25rem;
									  color: #856404;
				  					background-color: #fff3cd;
				  					border-color: #ffeeba;">
				  					Comptabilité - Facturation - Gestion des clients et fournisseurs - Gestion de caisse - Stock. ..et plus encore
				  		</p>
				  		<br>
				  		<br>
					</div>
					<p style="	font-family: Century Gothic;
				  					color: #696969;
				  					font-weight: 500;
				  					text-align: center;">© 2018 <a style="text-decoration: none;color:#007bff; font-weight: bold; " href="https://kedisonline.com" target="_blank">KEDIS Online!</a> | Tous droits réservés</p>
				</body>
			</html>
    ';

    /*mail("andmatboy@gmail.com", "Activation compte", $message, $header);*/

	//$envoiemail = mail($to, $subject, $message, $header);

	//echo "Le message électronique a été envoyé." ;

	/*if($envoiemail == true)
	{
		echo "mail envoyé";
	}
	else
	{
		echo "erreur envoie mail";
	}*/
?>
<!--Réinitialisation mot de passe-->
<!--<html>
				<body style="background-color: #D3D3D3;
							padding-top: 20px;">
					<div style="margin-right: auto; 
								margin-left: auto; 
								width: 600px;  
								padding-right: 30px;
				 		 		padding-left: 30px; 
				 		 		background-color: white;
				 		 		border-top: 10px solid #007bff;">
						<h1 style=" margin-bottom: 0.5rem;
				  					font-family: inherit;
				  					font-weight: bold;
				  					line-height: 1.2;
				  					color: #007bff;">KEDIS Online!</h1>
				  		<h5 style="	margin-bottom: 0.5rem;
				  					font-family: Century Gothic;
				  					line-height: 1.2;
				  					color: #696969;
				  					font-weight: bold;
				  					font-size: 1.25rem;
				  					text-align: center">Mot de passe oublié</h5>

				  		<p style="	font-family: Century Gothic;
				  					color: #696969;
				  					font-weight: 500;
				  					text-align: justify;">
				  			Bonjour Andelo, <br><br>
				  			Vous avez demandé la réinitialisation de votre mot de passe, cliquez sur le bouton ci-dessous pour le réintialiser.
				  		</p>

				  		<a style="display: block;
				  				  margin-left: auto;
				    			  margin-right: auto;
				    			  width: 300px;
								  font-weight: 400;
								  text-align: center;
								  white-space: nowrap;
								  vertical-align: middle;
								  -webkit-user-select: none;
								  -moz-user-select: none;
								  -ms-user-select: none;
								  user-select: none;
								  border: 1px solid transparent;
								  padding: 0.375rem 0.75rem;
								  font-size: 1.25rem;
								  line-height: 1.5;
								  border-radius: 0.25rem;
								  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
								  color: #fff;
								  background-color: #007bff;
								  border-color: #007bff;
								  text-decoration: none;" href="#">Réinitialiser mon mot de passe</a>
						<br>
						
						<p style="	font-family: Century Gothic;
				  					color: #696969;
				  					font-weight: 500;
				  					text-align: justify;">
				  			Si vous n'êtes pas à l'origine de cette demande, ignorez simplement cet émail.
				  			<br>
				  			<br>
				  			Merci, 
				  			<br>
				  			L'équipe <a style="text-decoration: none; font-weight: bold; color: #007bff;" href="https://kedisonline.com" target="_blank">KEDIS Online!</a>
				  		</p>

				  		<br>
				  		<br>
					</div>
					<p style="	font-family: Century Gothic;
				  					color: #696969;
				  					font-weight: 500;
				  					text-align: center;">© 2018 <a style="text-decoration: none;color:#007bff; font-weight: bold; " href="https://kedisonline.com" target="_blank">KEDIS Online!</a> | Tous droits réservés</p>
				</body>
			</html>-->

			<html>
				<body style="background-color: #D3D3D3;
							padding-top: 20px;">
					<div style="margin-right: auto; 
								margin-left: auto; 
								width: 600px;  
								padding-right: 30px;
				 		 		padding-left: 30px; 
				 		 		background-color: white;
				 		 		border-top: 10px solid #007bff;">
						<h1 style=" margin-bottom: 0.5rem;
				  					font-family: inherit;
				  					font-weight: bold;
				  					line-height: 1.2;
				  					color: #007bff;">KEDIS Online!</h1>
				  		<h5 style="	margin-bottom: 0.5rem;
				  					font-family: Century Gothic;
				  					line-height: 1.2;
				  					color: #696969;
				  					font-weight: bold;
				  					font-size: 1.25rem;
				  					text-align: center">Confirmation compte</h5>

				  		<p style="	font-family: Century Gothic;
				  					color: #696969;
				  					font-weight: 500;
				  					text-align: justify;">
				  			Bonjour Andelo et bienvenue sur <a style="text-decoration: none; font-weight: bold; color: #007bff;" href="https://kedisonline.com" target="_blank">KEDIS Online!</a>, <br><br>
				  				Vous avez été ajouté comme Gérant dans l'entretrise X de monsieur X, nous vous prions de confirmer votre compte en cliquant sur le bouton ci-dessous.
				  		</p>

				  		<a style="display: block;
				  				  margin-left: auto;
				    			  margin-right: auto;
				    			  width: 300px;
								  font-weight: 400;
								  text-align: center;
								  white-space: nowrap;
								  vertical-align: middle;
								  -webkit-user-select: none;
								  -moz-user-select: none;
								  -ms-user-select: none;
								  user-select: none;
								  border: 1px solid transparent;
								  padding: 0.375rem 0.75rem;
								  font-size: 1.25rem;
								  line-height: 1.5;
								  border-radius: 0.25rem;
								  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
								  color: #fff;
								  background-color: #007bff;
								  border-color: #007bff;
								  text-decoration: none;" href="#">Je confirme mon compte</a>
						<br>
						<h2 style="text-align: center;">Votre business à portée de main!</h2>
						<img style="display: block;
									margin-left: auto;
				    				margin-right: auto;"src="https://kedisonline.com/img/online.png">

						<p style="	font-family: Century Gothic;
				  					color: #696969;
				  					font-weight: 500;
				  					text-align: center;
				  					position: relative;
									  padding: 0.75rem 1.25rem;
									  margin-bottom: 1rem;
									  border: 1px solid transparent;
									  border-radius: 0.25rem;
									  color: #0c5460;
									  background-color: #d1ecf1;
									  border-color: #bee5eb;">
				  					Grâce à KEDIS Online ! gardez le contrôle de votre activité partout où vous êtes en toute tranquillité.
				  		</p>
				  		<p style="	font-family: Century Gothic;
				  					color: #696969;
				  					font-weight: 500;
				  					text-align: center;
				  					position: relative;
									  padding: 0.75rem 1.25rem;
									  margin-bottom: 1rem;
									  border: 1px solid transparent;
									  border-radius: 0.25rem;
									  color: #856404;
				  					background-color: #fff3cd;
				  					border-color: #ffeeba;">
				  					Comptabilité - Facturation - Gestion des clients et fournisseurs - Gestion de caisse - Stock. ..et plus encore
				  		</p>
				  		<br>
				  		<br>
					</div>
					<p style="	font-family: Century Gothic;
				  					color: #696969;
				  					font-weight: 500;
				  					text-align: center;">© 2018 <a style="text-decoration: none;color:#007bff; font-weight: bold; " href="https://kedisonline.com" target="_blank">KEDIS Online!</a> | Tous droits réservés</p>
				</body>
			</html>