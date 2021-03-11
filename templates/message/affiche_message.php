<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$sender = $_POST['sender'];
	$id_connexion = $_POST['id_connexion'];

	/*$reqmess = $bdd->prepare('SELECT * FROM messages WHERE id_receiver = ? OR id_sender = ?');
	$reqmess->execute(array($getid, $getid));*/

	 setlocale(LC_TIME, 'fr_FR'); //serveur
	  $date = date("Y:m:d");
	  $heure = date("H:i");
	  $hier = date('Y:m:d',strtotime("-1 days"));

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
		<a href="#" class="filterDiscussions all read single" sender="<?php echo $info_exp['id_cl']; ?>" email="<?php echo $info_exp['email_cl']; ?>" id="list-chat-list2" data-toggle="list" role="tab">
	        <img class="avatar-md" src="../profil/<?php echo $info_exp['profil_cl']; ?>.png" data-toggle="tooltip" data-placement="top" title="Lean" alt="avatar">
	        <div class="status">
	        	<?php
	          		if($info_exp['login_required'] != 0 AND $info_exp['id_connexion'] != 0)
	      						{
	      		?>
	      			<i class="material-icons online">fiber_manual_record</i>
	      		<?php
					}
					else
					{
	      		?>
	      			<i class="material-icons offline">fiber_manual_record</i>
				<?php
					}
                 ?>
	        </div>
	        <div class="data">
	          <h5><?php echo $info_exp['prenom_cl'].' '.$info_exp['nom_cl'] ?></h5>
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
	          	?>
	          	</span>
	          <p> Vous :
	          	<?php  
                    if(strlen($row['message']) <= 22)
                    {
                      echo $row['message'];
                    }
                    else
                    {
                      echo substr($row['message'], 0, 22).'...';
                    }

                ?>
	          </p>
	        </div>
	      </a>

<?php
			}
			else
			{
				$statut = 'non_lu';
          		//on récupère tous les derniers messages qui nous sont destinés
          		$get_mess_dest = $bdd->prepare('SELECT * FROM messages WHERE id_receiver = ? AND id_sender = ? AND statut = ? ORDER BY id DESC');
         		$get_mess_dest->execute(array($getid, $info_sender['id_cl'], $statut));

          		$count_mess_dest = $get_mess_dest->rowCount();

?>
		<a href="#" class="filterDiscussions all read single" sender="<?php echo $info_sender['id_cl']; ?>" email="<?php echo $info_sender['email_cl']; ?>" id="list-chat-list2" data-toggle="list" role="tab">
	        <img class="avatar-md" src="../profil/<?php echo $info_sender['profil_cl']; ?>.png" data-toggle="tooltip" data-placement="top" title="Lean" alt="avatar">
	        <div class="status">
	        	<?php
	          		if($info_sender['login_required'] != 0 AND $info_sender['id_connexion'] != 0)
	      			{
	      		?>
	      			<i class="material-icons online">fiber_manual_record</i>
	      		<?php
					}
					else
					{
	      		?>
	      			<i class="material-icons offline">fiber_manual_record</i>
				<?php
					}
                 ?>
	        </div>
		        <?php 
	            	if(preg_match("/^[1-9]+/", $count_mess_dest))
	            	{
	            		if($count_mess_dest > 100)
	            		{
	          	?>
	              		<div class="new bg-pink">
	                      <span><?php echo '+99'; ?></span>
	                    </div>
	          	<?php
	          			}
	          			else
	          			{
	          	?>
	          			<div class="new bg-pink">
	                      <span><?php echo '+'.$count_mess_dest; ?></span>
	                    </div>
	          	<?php
	          			}
	            	}
	          	?>
	        <div class="data">
	          <h5><?php echo $info_sender['prenom_cl'].' '.$info_sender['nom_cl'] ?></h5>
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
	          	?>
	          		
	          	</span>
	          <p>
	          	<?php  
                    if(strlen($row['message']) <= 22)
                    {
                      echo $row['message'];
                    }
                    else
                    {
                      echo substr($row['message'], 0, 22).'...';
                    }

                ?>
	          </p>
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

<script type="text/javascript">
	jQuery(document).ready(function($) 
    {
    	$('.read').click(function()
    		{
    			var getid = '<?php echo $getid; ?>';
            	//var id_sender = $('#id_sender').val();
            	//var sender = '<?php echo $sender; ?>';
            	var id_connexion = '<?php echo $id_connexion; ?>';
            	var sender = $(this).attr('sender');
            	var email = $(this).attr('email');

            	window.location.href = 'message.php?id=' + getid + '&id_connexion=' + id_connexion + "&sender=" + sender + "&email=" + email;


    			//alert(email);
    		});
    });
</script>