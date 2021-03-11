<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];


	setlocale(LC_TIME, 'fr_FR'); //serveur
	$date = date("Y:m:d");
	$heure = date("H:i");
	$hier = date('Y:m:d',strtotime("-1 days"));

	$reqmess = $bdd->prepare('SELECT * FROM message_admin WHERE id_sender = ? ORDER BY id ASC');
	$reqmess->execute(array($getid));

	while($row = $reqmess->fetch())
	{
		if($row['id_sender'] == $getid AND $row['id_admin'] == 0)
		{
			//on récupère l'administrateur
			$get_usere = $bdd->prepare("SELECT * FROM user WHERE id_cl = ?");
			$get_usere->execute(array($getid));
			$fetch_usere = $get_usere->fetch();
?>
		<div class="p-3 mb-2 bg-transparent"> 
          <div class="row">
            <div class="col-md-9">

              <span class="text-secondary"><b>Moi</b></span>
              <div class="card-message bg-primary text-white">
                  <div class="card-body-message">
                    <?php echo $row['message']; ?>
                  </div>  
              </div>
              <span class="text-secondary time-message">
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

            <div class="col-md-3">
              <img src="../profil/<?php echo $fetch_usere['profil_cl']; ?>.png" alt="..." class="rounded-circle" height="50" width="50">
            </div>

          </div>
        </div>
<?php
		}
		else
		{

			if($row['id_admin'] != 0)
			{

				//on récupère l'administrateur
				$get_admin = $bdd->prepare("SELECT * FROM administrateur WHERE id = ?");
				$get_admin->execute(array($row['id_admin']));

				$fetch_admin = $get_admin->fetch();
?>
				<div class="p-3 mb-2 bg-transparent"> 
		          <div class="row">

		            <div class="col-md-3">
		              <img src="../profil_admin/<?php echo $fetch_admin['profil'] ?>.png" alt="..." class="rounded-circle" height="50" width="50">
		            </div>

		            <div class="col-md-9">

		              <span class="text-secondary"><b><?php echo $fetch_admin['prenom']; ?></b></span>
		              <div class="card-message bg-light text-secondary">
		                  <div class="card-body-message">
		                    <?php echo $row['message']; ?>
		                  </div>  
		              </div>
		              <span class="text-secondary time-message">
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
		        </div>

<?php
			}
		}
	}
?>