<?php

	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$idE = htmlspecialchars($_POST['idE']);
	$id_connexion = $_POST['id_connexion'];

	$sql = $bdd->prepare("SELECT * FROM user, gestion WHERE id_E = ? AND id_cl = id_user AND id_cl != ?");
	$sql->execute(array($idE, $getid));

	$count_user = $sql->rowCount();

	if(preg_match("/^[1-9]+/", $count_user))
	{
		while($row = $sql->fetch())
		{
?>

		<a href="#" class="filterMembers all online contact read" data-toggle="list" sender="<?php echo $row['id_cl']; ?>" email="<?php echo $row['email_cl']; ?>" >
			<img class="avatar-md" src="../profil/<?php echo $row['profil_cl']; ?>.png" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
			<div class="status">
				<?php
	          		if($row['login_required'] != 0 AND $row['id_connexion'] != 0)
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
				<h5><?php echo $row['prenom_cl'].' '.$row['nom_cl'] ?></h5>
				<p><?php echo $row['profession'].', '.$row['ville'] ?></p>
			</div>
			<!--<div class="person-add">
				<i class="material-icons">person</i>
			</div>-->
		</a>

<?php
		}
	}
	else
	{
?>
	<div class="alert alert-light" role="alert">
	  <h6 class="text-center">
	    Il n'existe pas d'autres membres dans cette entreprise  
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
            	var id_connexion = '<?php echo $id_connexion; ?>';
            	var sender = $(this).attr('sender');
            	var email = $(this).attr('email');

            	window.location.href = 'message.php?id=' + getid + '&id_connexion=' + id_connexion + "&sender=" + sender + "&email=" + email;


    			//alert(email);
    		});
    });
</script>