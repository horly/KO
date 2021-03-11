<style type="text/css">
	.footer-warning
	{
		border-bottom: 10px solid #ffc107;
		width: 100%;
	}
	.bg-yellow-pal
	{
		background-color: #ffef99;
	}
	tbody tr:nth-child(odd)
	{
		background:  #ffef99;
	}
</style>
<br>
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

<div class="p-3 mb-2 bg-white text-dark border">
	<div class="row">
		<div class="col-md-3">
			<img id="logoUE" src="../logo/<?php echo $fetchUE['logo']; ?>.png"  alt="...">
		</div>
		<div class="col-md-9">
			<h3 class="text-center"><b><?php echo $nomE; ?></b></h3>
        	<h6 class="text-center"><b><?php echo $fetchUE['adresseUE']; ?></b></h6>
        	<h6 class="text-center"><b><?php echo $fetchUE['villeUE']; ?>, <br><?php echo $fetchUE['paysUE']; ?></b></h6>
        	<h6 class="text-center"><b>N° TVA : <?php echo $fetchentrep['tvaE'];?></b></h6>
		</div>
	</div>
	<div class="footer-warning"></div>
	<br>

	<div class="row">
		<div class="col-md-6">
			<?php
			    if($fetchUE['titre_document_commande'] == '')
			    {
			  ?>
				   <h3><strong>BON DE COMMANDE N° <?php echo $fetchvente['num_cmd']; ?></strong></h3>
			  <?php
			    }
			    else
			    {
			  ?>
			    <h3><strong><?php echo strtoupper($fetchUE['titre_document_commande']); ?> N° <?php echo $fetchvente['num_cmd']; ?></strong></h3>
			  <?php
			    }
			  ?>
			  <h5><b>Date : <?php echo $fetchvente['date_cmd']; ?></b></h5>
			  <h5><b>Délai de livraison : <?php echo $fetchvente['delai_livraison']; ?></b></h5>
		</div>
		<div class="col-md-6">
			<div class="p-3 mb-2 bg-yellow-pal text-right">
				<h6><b><?php echo $fetchclient['societe_four']; ?></b></h6>
		        <h6><b><?php echo $fetchclient['adresse_four']; ?></b></h6>
		        <h6><b><?php echo $fetchclient['ville_four'].', '.$fetchclient['pays_four']; ?></b></h6>
		        <h6><b>N° TVA : <?php echo $fetchclient['tva_four']; ?></b></h6>
			</div>
		</div>
	</div>

	<br><br>

	<table class="table border border-warning">
	    <thead class="border border-warning bg-warning text-white">
	      <tr>
	          <th title="Code article">Code</th>
	          <th>Description</th>
	          <th class="text-center">Quantité</th>
	      </tr>
	    </thead>
	    <tbody class=""> 
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