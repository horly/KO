<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];

	/*$reqmess = $bdd->prepare('SELECT * FROM messages WHERE id_receiver = ? OR id_sender = ?');
	$reqmess->execute(array($getid, $getid));*/

	//on récupère le message recent dont nous sommes expédicteurs ou recepteur 
	$reqmess = $bdd->prepare('SELECT  MAX(id) AS id_mess FROM messages WHERE id_receiver = ? OR id_sender = ?');
	$reqmess->execute(array($getid, $getid));

	$info_message = $reqmess->fetch();
	$id_mess = $info_message['id_mess'];

	//on recupère maintenant l'expéditeur et le recepteur du message 
	$get_mess1 = $bdd->prepare('SELECT * FROM messages WHERE id = ?');
	$get_mess1->execute(array($id_mess));

	$get_info_mess = $get_mess1->fetch();
	$expedit = $get_info_mess['id_sender']; //l'expéditeur
	$recept = $get_info_mess['id_receiver']; //recepteur




	//on recupère maintenant l'expéditeur et le recepteur du message 
	$get_mess = $bdd->prepare('SELECT * FROM messages WHERE (id_receiver = ? OR id_sender = ?) AND dernier_message = 1 ORDER BY id DESC');
	$get_mess->execute(array($getid, $getid));


	$count_mess = $get_mess->rowCount();

	if(preg_match("/^[1-9]+/", $count_mess))
	{ 
		while($row = $get_mess->fetch())
		{
			//on recupère les informations de l'expéditeurs
			$get_exp = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
			$get_exp->execute(array($row['id_sender']));
			$info_sender = $get_exp->fetch();

			//on recupère aussi l'informations du recepteurr
			$get_send = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
			$get_send->execute(array($row['id_receiver']));

			$info_exp = $get_send->fetch();
			//si c'est moi l'expéditeur
			if($row['id_sender'] == $getid)
			{
?>
		<a class="row" id="link_user1" href="#" onclick="visualise_chat2(<?php echo $info_exp['id_cl']; ?>);">
	        <div class="col-md-2">
	          <div class="img_cont">
	            <img src="<?php echo $info_exp['profil_cl']; ?>" alt="..." class="rounded-circle" height="45" width="45"> 
	            <span class="<?php if($info_exp['login_required'] == 1 AND $info_exp['id_connexion'] != 0 ){ echo 'online_icon'; }else{ echo 'online_icon offline'; } ?>"></span>
	          </div>
	        </div>
	        <div class="col-md-10">
	            <h6 class="mb-1 text-dark"><?php echo $info_exp['prenom_cl'].' '.$info_exp['nom_cl'] ?></h6>
	            <p class="text-muted message"> Vous : <?php echo substr($row['message'], 0, 22).'...'; ?></p>
	            <small id="emailHelp" class="form-text text-primary text-right"><?php echo $row['datem']; ?></small>
	        </div>
	      </a>

<?php
			}
			else
			{

?>

		<a class="row" id="link_user1" href="#" onclick="visualise_chat2(<?php echo $info_sender['id_cl']; ?>);">
	        <div class="col-md-2">
	          <div class="img_cont">
	            <img src="<?php echo $info_sender['profil_cl']; ?>" alt="..." class="rounded-circle" height="45" width="45"> 
	            <span class="<?php if($info_sender['login_required'] == 1 AND $info_sender['id_connexion'] != 0 ){ echo 'online_icon'; }else{ echo 'online_icon offline'; } ?>"></span>
	          </div>
	        </div>
	        <div class="col-md-10">
	            <h6 class="mb-1 text-dark"><?php echo $info_sender['prenom_cl'].' '.$info_sender['nom_cl'] ?></h6>
	            <?php 
	            		if($row['statut'] == 'non_lu')
                        {
                    ?>
                    	<h6 class="text-muted message"><?php echo substr($row['message'], 0, 22).'...'; ?></h6>
	            	<?php	
	            		}
	            		else
	            		{
	            	?>
	            		<p class="text-muted message"><?php echo substr($row['message'], 0, 22).'...'; ?></p>
	            	<?php
	            		}
	            	?>
	            <small id="emailHelp" class="form-text text-primary text-right"><?php echo $row['datem']; ?></small>
	        </div>
	      </a>
<?php
			}
		}
	}
	else
	{
?>
	<div class="alert alert-light" role="alert">
	  <h6 class="text-center">
	    Aucun message à afficher  
	  </h6>
	</div>
<?php
	}
?>
