<?php

	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$idE = htmlspecialchars($_POST['idE']);

	setlocale(LC_TIME, 'fr_FR'); //serveur
  	$date = date("Y:m:d");
  	$heure = date("H:i");

  	$hier = date('Y:m:d',strtotime("-1 days"));


  	//on recupère les informations de l'expéditeurs qui est moi 
	$get_exp = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
	$get_exp->execute(array($getid));
	$info_exp = $get_exp->fetch();

  	//on recupère d'abord les messages envoyez par moi 
  	$get_me_mess = $bdd->prepare("SELECT * FROM messages_groupe WHERE idEG = ? ORDER BY id DESC");
  	$get_me_mess->execute(array($idE));

  	$count_message = $get_me_mess->rowCount();
?>
<div class="container">
    <div class="col-md-12">
<?php
  	if(preg_match("/^[1-9]+/", $count_message))
	{
		while($row = $get_me_mess->fetch())
		{
			if($row['id_sender'] != $getid)
			{
				//on recupère aussi les informations des recepteurs
				$get_send = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
				$get_send->execute(array($row['id_sender']));
				$info_send = $get_send->fetch();
?>				
				<div class="message">
			      <img class="avatar-md" src="../profil/<?php echo $info_send['profil_cl']; ?>.png" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
			      <div class="text-main">
			      	
			      	<span><b><?php echo $info_send['prenom_cl'].' '.$info_send['nom_cl']; ?></b></span>

			        <div class="text-group">
			          <div class="text">
			            <p>
			              <?php 
			                
			                if($row['type'] == "fichier")
			                {
			              ?>
			                <div class="attachment">
			                    <button class="btn attach"><i class="material-icons md-18">insert_drive_file</i></button>
			                    <div class="file">
			                      <h5><a href="../image_message_file_groupe/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" target="_blank"><?php echo $row['message']; ?></a></h5>
			                      <span><?php echo $row['taille_fichier'].'Kb '.ucfirst($row['type']); ?></span>
			                    </div>
			                  </div>
			              <?php   
			                }
			                else if($row['type'] == "image")
			                {
			              ?>
			                <a href="../image_message_file_groupe/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" target="_blank">
			                  <img src="../image_message_file_groupe/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" alt="..." class="img-thumbnail">
			                </a>
			              <?php
			                }
			                else
			                {
			                  echo $row['message']; 
			                }
			              ?>
			            </p>
			          </div>
			        </div>
			        <span>
			          <?php 
			            if($row['datem']== $date)
			            {
			              echo "Aujourd'hui";
			            }
			            else if(($row['datem']== $hier))
			            {
			              echo "Hier";
			            }
			            else
			            {
			              echo $row['datem'];
			            }
			             
			          ?> à <?php echo $row['heurem']; ?>
			            
			          </span>
			      </div>
			    </div>

<?php
			}
			else
			{
?>

				<div class="message me">
			      <div class="text-main">
			      	<span><b>Moi</b></span>

			        <div class="text-group me">
			          <div class="text me">
			            <p>
			              <?php 
			                
			                if($row['type'] == "fichier")
			                {
			              ?>
			                <div class="attachment">
			                    <button class="btn attach"><i class="material-icons md-18">insert_drive_file</i></button>
			                    <div class="file">
			                      <h5><a href="../image_message_file_groupe/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" target="_blank"><?php echo $row['message']; ?></a></h5>
			                      <span><?php echo $row['taille_fichier'].'Kb '.ucfirst($row['type']); ?></span>
			                    </div>
			                  </div>
			              <?php   
			                }
			                else if($row['type'] == "image")
			                {
			              ?>
			                <a href="../image_message_file_groupe/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" target="_blank">
			                  <img src="../image_message_file_groupe/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" alt="..." class="img-thumbnail">
			                </a>
			              <?php
			                }
			                else
			                {
			                  echo $row['message']; 
			                }
			              ?>
			            </p>
			          </div>
			        </div>
			        <span>
			          <?php
			            if($row['statut'] == 'non_lu')
			            {
			          ?>
			            <i class="material-icons">check</i>
			          <?php
			            }
			            else
			            {
			          ?>
			          <?php
			            }
			          ?>
			          <?php 
			            if($row['datem']== $date)
			            {
			              echo "Aujourd'hui";
			            }
			            else if(($row['datem']== $hier))
			            {
			              echo "Hier";
			            }
			            else
			            {
			              echo $row['datem'];
			            } 
			            ?> à <?php echo $row['heurem']; ?>
			        </span>
			      </div>
			      <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			      <img class="avatar-md" src="../profil/<?php echo $info_exp['profil_cl']; ?>.png" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
			    </div>

<?php
			}
		}
?>
	</div>
</div>
<?php
	}
	else
	{
?>
	<div class="content empty">
		<div class="container">
			<div class="col-md-12">
				<div class="no-messages">
					<i class="material-icons md-48">forum</i>
					<p>Commencer une conversation dans le groupe de l'entreprise.</p>
				</div>
			</div>
		</div>
	</div>
<?php
	}
?>