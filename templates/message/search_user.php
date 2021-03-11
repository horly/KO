<?php
  include('../connecting_data_base.php');
  $contact = htmlspecialchars($_POST['contact']);

  $chaine = $contact;
  $tab = explode(" ", $chaine); //qui te renvoie un tableau avec tous les mots séparés par un espace.
  $mot = $tab[0]; //on récupère le première mot avant l'espace

  $getUserSeach = $bdd->prepare('SELECT * FROM user WHERE prenom_cl LIKE ? OR nom_cl LIKE ?');
  $getUserSeach->execute(array("%$mot%", "%$mot%"));

  $nbr_user = $getUserSeach->rowCount();

  if(preg_match("/^[1-9]+/", $nbr_user))
  {
    while($us = $getUserSeach->fetch()) 
    {
?>
    <a class="dropdown-item select-sender" option="<?php echo $us['id_cl'];?>" name="<?php echo $us['nom_cl'].' '.$us['prenom_cl']; ?>" href="#">
      <div class="row">
        <div class="col-md-3">
          <img class="avatar-md" src="../profil/<?php echo $us['profil_cl']; ?>.png" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
        </div>
        <div class="col-md-6">
          <b class="mb-1 text-primary"><?php echo $us['nom_cl']." ".$us['prenom_cl']; ?></b>
          <p class="mb-1"><?php echo $us['ville'].", ".$us['pays']; ?></p>
        </div>
      </div>
    </a>
    <div class="dropdown-divider"></div>
<?php
    }
  }
  else
  {
?>
  <div class="alert alert-light" role="alert">
    <h6 class="text-center">
      Aucun résultat de la recherche n'a été trouvé
    </h6>
  </div>
<?php
  }
?>
<script type="text/javascript">
  jQuery(document).ready(function($) 
  {
    $('.select-sender').click(function()
    {
      var id_sender = $(this).attr('option');
      var name = $(this).attr('name');
      
      $('#id-sender-user').text(id_sender);
      $('#contat-name').text(name);

       $('#contat-name').addClass('btn-outline-info');
      $('#contat-name').removeClass('btn-outline-danger');
    })
  });
</script>