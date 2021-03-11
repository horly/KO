<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$sender = $_POST['sender'];

	$req = $bdd->prepare('SELECT * FROM user WHERE id_cl = ? ');
	$req->execute(array($sender));

	$info_user = $req->fetch();

  $cont_user = $req->rowCount();

  if(preg_match("/^[1-9]+/", $cont_user))
  {

?>

		<div class="container">
            <div class="col-md-12">
              <div class="inside">
                <a href="#"><img class="avatar-md" src="../profil/<?php echo $info_user['profil_cl']; ?>.png" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar"></a>
                <div class="status">
                	<?php
                  		if($info_user['login_required'] != 0 AND $info_user['id_connexion'] != 0)
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
                  <h5><a href="#"><?php echo $info_user['prenom_cl'].' '.$info_user['nom_cl'] ?></a></h5>
                  <span>
                  	<?php
                  		if($info_user['login_required'] != 0 AND $info_user['id_connexion'] != 0)
						{
							echo "Actif";
						}
						else
						{
							echo "Inactif";
						}
    }
?>
                  </span>
                </div>
                <!--<button class="btn connect d-md-block d-none" name="1"><i class="material-icons md-30">phone_in_talk</i></button>-->
                <!--<button class="btn connect d-md-block d-none" name="1"><i class="material-icons md-36">videocam</i></button>-->
                <!--<button class="btn d-md-block d-none"><i class="material-icons md-30">info</i></button>-->
                <!--<div class="dropdown">
                  <button class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons md-30">more_vert</i></button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <button class="dropdown-item connect" name="1"><i class="material-icons">phone_in_talk</i>Voice Call</button>
                    <button class="dropdown-item connect" name="1"><i class="material-icons">videocam</i>Video Call</button>
                    <hr>
                    <button class="dropdown-item"><i class="material-icons">clear</i>Clear History</button>
                    <button class="dropdown-item"><i class="material-icons">block</i>Block Contact</button>-->
                    <!--<button class="dropdown-item"><i class="material-icons">delete</i>Delete Contact</button>-->
                  </div>
                </div>
              </div>
            </div>
          </div>