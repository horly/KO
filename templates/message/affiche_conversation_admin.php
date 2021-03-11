<?php
	//session_start();
	include('../connecting_data_base.php');

	$getid = $_POST['getid'];
	$id_sender = $_POST['sender'];

  setlocale(LC_TIME, 'fr_FR'); //serveur
  $date = date("Y:m:d");
  $heure = date("H:i");

  $hier = date('Y:m:d',strtotime("-1 days"));

	$reqmess = $bdd->prepare('SELECT * FROM message_admin WHERE id_sender = ? ORDER BY id DESC');
  $reqmess->execute(array($id_sender));

	//echo $id_sender;
?>
  <div class="container">
    <div class="col-md-12">
<?php
	while($row = $reqmess->fetch())
	{

    if($row['id_sender'] == $id_sender AND $row['id_admin'] == 0)
    {

      //on récupère l'UTILISATEUR
        $get_user = $bdd->prepare("SELECT * FROM user WHERE id_cl = ?");
        $get_user->execute(array($id_sender));

        $fetch_user = $get_user->fetch();
?>
    <div class="message">
      <img class="avatar-md" src="../profil/<?php echo $fetch_user['profil_cl']; ?>.png" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
      <div class="text-main">
        <div class="text-group">

          <span><b><?php echo $fetch_user['prenom_cl']?></b></span>
          <div class="text">
            
            <p><?php echo $row['message']; ?></p>

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
      if($row['id_admin'] != 0)
      {
        //si c'est moi l'administrateur qui a envoyé le message
        if($row['id_admin'] == $getid)
        {

          //on récupère l'administrateur
          $get_admin = $bdd->prepare("SELECT * FROM administrateur WHERE id = ?");
          $get_admin->execute(array($getid));

          $fetch_admin = $get_admin->fetch();
?>
        <div class="message me">
          <div class="text-main">

            <span><b>Moi</b></span>
            <div class="text-group me">

              <div class="text me">

                  <p><?php echo $row['message']; ?></p>

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

          <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <img class="avatar-md" src="../profil_admin/<?php echo $getid; ?>.png" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
        </div>

<?php
        }//sinon donc si c'est un autre administrateur qui a envoyé le message
        else
        {

          //on récupère l'administrateur
          $get_admin = $bdd->prepare("SELECT * FROM administrateur WHERE id = ?");
          $get_admin->execute(array($row['id_admin']));

          $fetch_admin = $get_admin->fetch();
?>
          <div class="message">
            <img class="avatar-md" src="../profil_admin/<?php echo $fetch_admin['profil']; ?>.png" data-toggle="tooltip" data-placement="top" title="Keith" alt="avatar">
            <div class="text-main">
              <div class="text-group">

                <span><b><?php echo $fetch_admin['prenom']; ?></b></span>
                <div class="text">
                  
                  <p><?php echo $row['message']; ?></p>

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
      }
    }
  }
?>

  </div>
</div>