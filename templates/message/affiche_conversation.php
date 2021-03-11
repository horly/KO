<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$id_sender = $_POST['sender'];

  setlocale(LC_TIME, 'fr_FR'); //serveur
  $date = date("Y:m:d");
  $heure = date("H:i");

  $hier = date('Y:m:d',strtotime("-1 days"));

	$reqmess = $bdd->prepare('SELECT * FROM messages WHERE id_receiver = ? AND id_sender = ? OR id_sender = ? AND id_receiver = ? ORDER BY id DESC');
	$reqmess->execute(array($getid, $id_sender, $getid, $id_sender));


	//on recupère les informations de l'expéditeurs
	$get_exp = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
	$get_exp->execute(array($id_sender));
	$info_exp = $get_exp->fetch();

	//on recupère aussi l'informations du recepteurr
	$get_send = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
	$get_send->execute(array($getid));
	$info_send = $get_send->fetch();


  $count_message = $reqmess->rowCount();

	//echo $id_sender;
?>
  <div class="container">
    <div class="col-md-12">
<?php

  if(preg_match("/^[1-9]+/", $count_message))
  {
  	while($row = $reqmess->fetch())
  	{
  		if($row['id_receiver'] == $getid)
  		{
?>
    <div class="message">
      <img class="avatar-md" src="../profil/<?php echo $info_exp['profil_cl']; ?>.png" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
      <div class="text-main">
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
                      <h5><a href="../image_message_file/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" target="_blank"><?php echo $row['message']; ?></a></h5>
                      <span><?php echo $row['taille_fichier'].'Kb '.ucfirst($row['type']); ?></span>
                    </div>
                  </div>
              <?php   
                }
                else if($row['type'] == "image")
                {
              ?>
                <a href="../image_message_file/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" target="_blank">
                  <img src="../image_message_file/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" alt="..." class="img-thumbnail">
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
                      <h5><a href="../image_message_file/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" target="_blank"><?php echo $row['message']; ?></a></h5>
                      <span><?php echo $row['taille_fichier'].'Kb '.ucfirst($row['type']); ?></span>
                    </div>
                  </div>
              <?php   
                }
                else if($row['type'] == "image")
                {
              ?>
                <a href="../image_message_file/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" target="_blank">
                  <img src="../image_message_file/<?php echo $row['id']; ?>.<?php echo $row['extention']; ?>" alt="..." class="img-thumbnail">
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
      <img class="avatar-md" src="../profil/<?php echo $info_send['profil_cl']; ?>.png" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
    </div>
<?php
  		}
  	}
  }
  else
  {
?>
    <div class="content empty">
      <div class="container">
        <div class="col-md-12">
          <div class="no-messages">
            <i class="material-icons md-48">forum</i>
            <p>Vous n'avez aucune conversation, veuillez lancer une nouvelle.</p>
          </div>
        </div>
      </div>
    </div>

<?php
  }
?>
    </div>
  </div>

<script type="text/javascript">
  jQuery(document).ready(function($) 
  {

    /*function scrollToBottom(el) { el.scrollTop = el.scrollHeight; }
    scrollToBottom(document.getElementById('content'));*/

  });
</script>