<br>
<div class="p-3 mb-2 bg-white text-dark border">
	<div class="row">
        <div class="col-md-3">
            <img id="logoUE" src="../logo/<?php echo $fetchUE['logo']; ?>.png"  alt="...">
          	<h5><b><?php echo $nomE; ?></b></h5>
        	<h6><b><?php echo $fetchUE['adresseUE']; ?></b></h6>
        	<h6><b><?php echo $fetchUE['villeUE']; ?> <br><?php echo $fetchUE['paysUE']; ?></b></h6>
        	<h6><b>N° TVA : <?php echo $fetchentrep['tvaE'];?></b></h6>
        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-5"></div>
	</div>

	<?php
		//on sélectionne la facture pour récupérer le client et d'autres informations 
      $getvente = $bdd->prepare('SELECT * FROM commande WHERE id_cmd = ?');
      $getvente->execute(array($id_cmd));
      $fetchvente = $getvente->fetch();

      //on recupère le client 
      $getclient = $bdd->prepare('SELECT * FROM fournis_for_user WHERE id_four = ?');
      $getclient->execute(array($fetchvente['id_four_cmd']));
      $fetchclient = $getclient->fetch();
	?>

	<div class="row">
    <div class="col-md-8">
    </div>
    <div class="col-md-4 text-right">
    	  <h6><b><?php echo $fetchclient['societe_four']; ?></b></h6>
        <h6><b><?php echo $fetchclient['adresse_four']; ?></b></h6>
        <h6><b><?php echo $fetchclient['ville_four'].', '.$fetchclient['pays_four']; ?></b></h6>
        <h6><b>N° TVA : <?php echo $fetchclient['tva_four']; ?></b></h6>
    </div>
	</div>

  <?php
    if($fetchUE['titre_document_commande'] == '')
    {
  ?>
	   <h3 class="text-center"><strong>BON DE COMMANDE</strong></h3>
  <?php
    }
    else
    {
  ?>
    <h3 class="text-center"><strong><?php echo strtoupper($fetchUE['titre_document_commande']); ?></strong></h3>
  <?php
    }
  ?>
	<br>

	<div class="row">
    <div class="col-md-6">
    	<h6>Date : <?php echo $fetchvente['date_cmd']; ?></h6>
      <h6>Numéro : <?php echo $fetchvente['num_cmd']; ?></h6>
    </div>

    <div class="col-md-6 text-right">
    	<h6>Délai de livraison : <?php echo $fetchvente['delai_livraison']; ?></h6>
    </div>
	</div>

	<br>
  <table class="table table-borderless table-striped border">
    <thead class="border bg-secondary text-white">
      <tr>
          <th title="Code article">Code</th>
          <th>Description</th>
          <th class="text-center">Quantité</th>
      </tr>
    </thead>
    <tbody class="tbody_striped tbody_fac" id="tbody_fac"> 
      <?php
          $viewfact = $bdd->prepare("SELECT * FROM facturation_commande WHERE id_cmd = ?"); 
          $viewfact->execute(array($id_cmd));

        while($rows = $viewfact->fetch()) 
        {
       ?>   
            <tr>
                <td class="text-left"><?php echo $rows['code_art_cmd']; ?></td>
                <td class="text-left"><?php echo utf8_encode($rows['libelle_art_cmd']); ?></td>
                <td class="text-center"><?php echo $rows['quantite_art_cmd']; ?></td>
            </tr>
          <?php 
            } 
          ?> 
        </tbody>
  </table>

  <br>

   
   <br>
   <p>
    <?php 
      if($fetch_modele['note_bas_commande'] != '')
      {
       
         echo $fetch_modele['note_bas_commande']; 
      }
      else
      {
         echo "---";
      }
    ?>  
  </p>


	</div>