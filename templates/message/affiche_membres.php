<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];

	$req = $bdd->prepare('SELECT * FROM user WHERE id_cl = ? ');
	$req->execute(array($getid));

	$info_user = $req->fetch();

	$getmebres = $bdd->prepare('SELECT * FROM user WHERE id_abonnement = ? 	AND id_cl != ?');
	$getmebres->execute(array($info_user['id_abonnement'], $getid));

	$count_user = $getmebres->rowCount();

	if(preg_match("/^[1-9]+/", $count_user))
	{ 
		while($row = $getmebres->fetch())
		{
?>
			<a class="row" href="#" id="link_user2" onclick="visualise_chat2(<?php echo $row['id_cl']; ?>);">
              <div class="col-md-3">
                <div class="img_cont">
                  <img src="<?php echo $row['profil_cl'] ?>" alt="..." class="rounded-circle" height="45" width="45"> <span class="<?php if($row['login_required'] == 1 AND $row['id_connexion'] != 0 ){ echo 'online_icon'; }else{ echo 'online_icon offline'; } ?>"></span>
                </div>
              </div>
              <div class="col-md-9">
                  <h6 class="mb-1 text-dark"><?php echo $row['prenom_cl'].' '.$row['nom_cl'] ?></h6>
                  <p><?php if($row['login_required'] == 1 AND $row['id_connexion'] != 0 ){ echo 'En ligne'; }else{ echo 'Hors ligne'; } ?></p>
              </div>
            </a>
<?php

		}
	}
	else
	{
?>
		<div class="alert alert-light" role="alert">
          <h6 class="text-center">
            Vous n'avez pas encore ajouté des utilisateurs 
          </h6>
        </div>
<?php
	}
?>