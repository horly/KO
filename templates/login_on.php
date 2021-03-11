<?php
	//session_start();
	include('connecting_data_base.php');

	
    	$getid = $_GET['id']; 
        $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
        $requser->execute(array($getid));
        $userfos = $requser->fetch();

        setlocale(LC_TIME, 'fr_FR'); //serveur
        //setlocale(LC_TIME, 'fra_fra'); //php 5 en local 
        $heure = date("H:i");
        $date = date("d-m-Y");

        $user_ip = "197.119.233.6"; //en local ip de l'algérie
        //$user_ip = $_SERVER['REMOTE_ADDR']; //dans le serveur enligne 

        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
        $country = $geo["geoplugin_countryName"];
        $city = $geo["geoplugin_city"];
        //$region = $geo["geoplugin_region"];
        $dispositif = "Navigateur";

        //on insert l'historique de la connexion 
        $insert_hist_connex = $bdd->prepare("INSERT INTO historique_connexion(heure, date_h, pays, ville, dispositif, id_user) VALUES(?, ?, ?, ?, ?, ?)");
        $insert_hist_connex->execute(array($heure, $date, $country, $city, $dispositif, $getid));



        $login = 1;

        $longueurcode = 20; //ici nous allons gérérer une clé pour la sécurité de l'utilisateur,
        $code = ""; 
        for($i=1;$i<$longueurcode;$i++)
        {
            $code .= mt_rand(0,9); //on génère les clés
        }

        //on vérifie si l'utilisteur est admin ou pas 
        if($userfos['statut'] == 'admin')
        {
            $udatelogin = $bdd->prepare("UPDATE user SET login_required = ?, id_connexion = ? WHERE id_cl = ?");
            $udatelogin->execute(array($login, $code, $getid));

            $_SESSION['id'] = $getid;
            $id_connexion = $code;

            header('location:accueille.php?id='.$_SESSION['id']."&id_connexion=".$id_connexion);
        }
        else
        {   
            //on récupère l'id de l'entreprise dans gestion
            $get_gestion = $bdd->prepare('SELECT * FROM gestion WHERE id_user = ?');
            $get_gestion->execute(array($getid));
            $fetch_gestion = $get_gestion->fetch();
            $idE = $fetch_gestion['id_E'];

            //on recupère l'entreprise dans entreprise
            $get_entreprise = $bdd->prepare('SELECT * FROM entreprise WHERE idE = ?');
            $get_entreprise->execute(array($idE));
            $fetch_entreprise = $get_entreprise->fetch();
            $nom_E = $fetch_entreprise['nomE'];

            $entre_unique = $fetch_entreprise['entre_unique'];

            //on vérifie maintenant les autorisations 
            $get_autoris = $bdd->prepare('SELECT * FROM autorisation WHERE id_user = ?');
            $get_autoris->execute(array($getid));
            $fetch_autoris = $get_autoris->fetch();
 
            if($fetch_autoris['all_entreprise'] == 0)
            {
                if($entre_unique != 1)
                {
                    $udatelogin = $bdd->prepare("UPDATE user SET login_required = ?, id_connexion = ? WHERE id_cl = ?");
                    $udatelogin->execute(array($login, $code, $getid));

                    $_SESSION['id'] = $getid;
                    $id_connexion = $code;

                    header('location:unitexpl.php?id='.$_SESSION['id']."&id_connexion=".$id_connexion."&idE=".$idE."&nom_entreprise=".$nom_E);
                }
                else
                {
                    //on récupère l'autorisation ue
                    $get_ue_autoris = $bdd->prepare('SELECT * FROM autorisation_ue WHERE id_user = ?');
                    $get_ue_autoris->execute(array($getid));
                    $fetch_ue_autoris = $get_ue_autoris->fetch();
                    $idUE = $fetch_ue_autoris['id_UE'];

                    //on récupère l'UE 
                    $get_UE = $bdd->prepare('SELECT * FROM uniteexploit WHERE idUE = ?');
                    $get_UE->execute(array($idUE));
                    $fetch_UE = $get_UE->fetch();
                    $nom_UE = $fetch_UE['nomUE'];

                    $udatelogin = $bdd->prepare("UPDATE user SET login_required = ?, id_connexion = ? WHERE id_cl = ?");
                    $udatelogin->execute(array($login, $code, $getid));

                    $_SESSION['id'] = $getid;
                    $id_connexion = $code;

                    header('location:dashboard.php?id='.$_SESSION['id']."&id_connexion=".$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nom_E.'&nom_unite_exploitation='.$nom_UE);
                }
            }
            else
            {
                //on récupère l'autorisation ue
                $get_ue_autoris = $bdd->prepare('SELECT * FROM autorisation_ue WHERE id_user = ?');
                $get_ue_autoris->execute(array($getid));
                $fetch_ue_autoris = $get_ue_autoris->fetch();
                $idUE = $fetch_ue_autoris['id_UE'];

                //on récupère l'UE 
                $get_UE = $bdd->prepare('SELECT * FROM uniteexploit WHERE idUE = ?');
                $get_UE->execute(array($idUE));
                $fetch_UE = $get_UE->fetch();
                $nom_UE = $fetch_UE['nomUE'];

                $udatelogin = $bdd->prepare("UPDATE user SET login_required = ?, id_connexion = ? WHERE id_cl = ?");
                $udatelogin->execute(array($login, $code, $getid));

                $_SESSION['id'] = $getid;
                $id_connexion = $code;

                header('location:dashboard.php?id='.$_SESSION['id']."&id_connexion=".$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nom_E.'&nom_unite_exploitation='.$nom_UE);
            } 
        }   


?>