<?php
	//session_start();
	include('../connecting_data_base.php');

	$idE = $_POST['idE'];

	//on commence par sélectionner les entreprises géré par l'utilisateur 
  	$sql = $bdd->prepare("SELECT * FROM entreprise WHERE idE = ?");
  	$sql->execute(array($idE));

  	$info_entrep = $sql->fetch();

?>

	<div class="container">
            <div class="col-md-12">
              <div class="inside">
                <a href="#"><img class="avatar-md" src="../logo/entreprise/<?php echo $info_entrep['logo']; ?>.png" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar"></a>
                <div class="data">
                  <h5><a href="entreprise-titre"><?php echo $info_entrep['nomE']; ?></a></h5>
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