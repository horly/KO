<?php  
	
	session_start();
	
	include('connecting_data_base.php');

	if(isset($_GET['id']) AND $_GET['id'] > 0)
	{
		$getid = $_GET['id']; //on protège la variable 
        $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
        $requser->execute(array($getid));
        //$login_required = $userfos['login_required'];
        /*on récupère la valeur du login_required pour le mettre à 0
        cela indiqué belle et bien que l'utilisateur s'est déconnecté */
        $login = 0;
        $id_connexion = 0;
        $udatelogin = $bdd->prepare("UPDATE user SET login_required = ?, id_connexion = ? WHERE id_cl = ?");
        $udatelogin->execute(array($login, $id_connexion, $getid));

		$_SESSION = array(); //on vide la session  
		session_destroy(); // on détruit la session 
		header('location:main.php');
	}
	else
	{
		header('location:error404.php');
	}

?>