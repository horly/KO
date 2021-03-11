<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$sender = $_POST['sender'];
	$id_connexion = $_POST['id_connexion'];


	setlocale(LC_TIME, 'fr_FR'); //serveur
	$date = date("Y:m:d");
	$heure = date("H:i");
	$hier = date('Y:m:d',strtotime("-1 days"));


	//on recupère le dernier le message avec l'expéditeur
	$get_mess = $bdd->prepare('SELECT * FROM message_admin WHERE dernier_message = 1 ORDER BY id DESC');
	$get_mess->execute(array());

	$count_mess = $get_mess->rowCount();

	if(preg_match("/^[1-9]+/", $count_mess))
	{

		while($row = $get_mess->fetch())
		{
			if($row['id_admin'] == 0)
    		{

    			$statut = 'non_lu';
          		//on récupère tous les derniers messages qui nous sont destinés
          		$get_mess_dest = $bdd->prepare('SELECT * FROM message_admin WHERE id_sender = ? AND statut = ?');
         		$get_mess_dest->execute(array($row['id_sender'], $statut));
          		$count_mess_dest = $get_mess_dest->rowCount();

          		//on récupère l'UTILISATEUR
		        $get_user = $bdd->prepare("SELECT * FROM user WHERE id_cl = ?");
		        $get_user->execute(array($row['id_sender']));

		        $info_sender = $get_user->fetch();

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
			          <h5><?php echo $info_sender['prenom_cl']; ?></h5>
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
			else
			{
				if($row['id_admin'] != 0)
      			{
      				//si c'est moi l'administrateur qui a envoyé le message
			        if($row['id_admin'] == $getid)
			        {

			        	//on récupère l'UTILISATEUR
				        $get_user = $bdd->prepare("SELECT * FROM user WHERE id_cl = ?");
				        $get_user->execute(array($row['id_sender']));

				        $info_exp = $get_user->fetch();
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
					          <h5><?php echo $info_exp['prenom_cl']; ?></h5>
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
					}// si c'est un autre administrateur qui a envoyé le message 
					else
					{
						//on récupère l'UTILISATEUR
				        $get_user = $bdd->prepare("SELECT * FROM user WHERE id_cl = ?");
				        $get_user->execute(array($row['id_sender']));
				        $info_sender = $get_user->fetch();

				        //on récupère l'admin qui a envoyé le 
				        $get_admin = $bdd->prepare("SELECT * FROM administrateur WHERE id = ?");
				        $get_admin->execute(array($row['id_admin']));

				        $fetch_admin = $get_admin->fetch();


				        $statut = 'non_lu';
		          		//on récupère tous les derniers messages qui nous sont destinés
		          		$get_mess_dest = $bdd->prepare('SELECT * FROM message_admin WHERE id_sender = ? AND statut = ?');
		         		$get_mess_dest->execute(array($row['id_sender'], $statut));
		          		$count_mess_dest = $get_mess_dest->rowCount();
?>
						<a href="#" class="filterDiscussions all read single" sender="<?php echo $info_sender['id_cl']; ?>" email="<?php echo $info_sender['email_cl']; ?>" id="list-chat-list2" data-toggle="list" role="tab">
					        <img class="avatar-md" src="../profil_admin/<?php echo $fetch_admin['profil']; ?>.png" data-toggle="tooltip" data-placement="top" title="Lean" alt="avatar">
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
					          <h5><?php echo $fetch_admin['prenom']; ?></h5>
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

            	window.location.href = 'message_admin.php?id=' + getid + '&id_connexion=' + id_connexion + "&sender=" + sender + "&email=" + email;


    			//alert(email);
    		});
    });
</script>