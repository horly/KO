<style type="text/css">
	.footer-success
	{
		border-bottom: 10px solid #28a745;
		width: 100%;
	}

	.callout-left
	{
		padding: 20px;
	    margin: 20px 0;
	    border: 1px solid #eee;
	    border-left-width: 5px;
	    border-radius: 3px;
	    border-left-color: #5cb85c;
	}
	.callout-right
	{
		padding: 20px;
	    margin: 20px 0;
	    border: 1px solid #eee;
	    border-right-width: 5px;
	    border-radius: 3px;
	    border-right-color: #5cb85c;
	}

	tbody tr:nth-child(odd)
	{
		background:  #b2d9b2;
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
		<div class="col-md-8">
			<img id="logoUE" src="../logo/<?php echo $fetchUE['logo']; ?>.png"  alt="...">
		</div>
		<div class="col-md-4">
			<?php
			    if($fetchUE['titre_document_commande'] == '')
			    {
			  ?>
				   <h3 class="text-success"><strong>BON DE COMMANDE N° <?php echo $fetchvente['num_cmd']; ?></strong></h3>
			  <?php
			    }
			    else
			    {
			  ?>
			    <h3 class="text-success"><strong><?php echo strtoupper($fetchUE['titre_document_commande']); ?> N° <?php echo $fetchvente['num_cmd']; ?></strong></h3>
			  <?php
			    }
			  ?>
			  <h5><b>Date : <?php echo $fetchvente['date_cmd']; ?></b></h5>
			  <h5><b>Délai de livraison : <?php echo $fetchvente['delai_livraison']; ?></b></h5>
		</div>
	</div>
	
	<br>
	
	<div class="footer-success"></div>
	
	<br>
	
	<div class="row">
		<div class="col-md-6">
			<div class="callout-left">
				<h6><b><?php echo $nomE; ?></b></h6>
	        	<h6><b><?php echo $fetchUE['adresseUE']; ?></b></h6>
	        	<h6><b><?php echo $fetchUE['villeUE']; ?>, <br><?php echo $fetchUE['paysUE']; ?></b></h6>
	        	<h6><b>N° TVA : <?php echo $fetchentrep['tvaE'];?></b></h6>
	        	
	        </div>
		</div>
		<div class="col-md-6 text-right">
			<div class="callout-right">
				<h6><b><?php echo $fetchclient['societe_four']; ?></b></h6>
		        <h6><b><?php echo $fetchclient['adresse_four']; ?></b></h6>
		        <h6><b><?php echo $fetchclient['ville_four'].', '.$fetchclient['pays_four']; ?></b></h6>
		        <h6><b>N° TVA : <?php echo $fetchclient['tva_four']; ?></b></h6>
		        <h6><b>&nbsp;</b></h6>
			</div>
		</div>
	</div>
	
	<br><br>

	<table class="table border border-success">
			    <thead class="border border-success bg-success text-white">
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
		  <div class="footer-success"></div>

</div>