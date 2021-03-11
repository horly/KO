<style type="text/css">
.bg-chocolate
{
	background-color: #D2691E;
}

.entete div {
  display: inline-block;
}
.left-div
{
	width: 100px;
	height: 100%;
}

.footer-chocolate
{
	border-bottom: 10px solid #D2691E;
	width: 100%;
}
.border-chocolate
{
	border: 1px solid #D2691E;
}
tbody tr:nth-child(odd)
{
	background:  #ffdcb2;
}
.headline 
{
	writing-mode: vertical-lr;
  	transform: rotate(180deg);
  	text-align: right;
  	width: 100%;
  	height: 100%;
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
	
		
		
		
			<div class="footer-chocolate"></div>
			<br>
			<img id="logoUE" src="../logo/<?php echo $fetchUE['logo']; ?>.png"  alt="...">
			<br><br>
			<h5><b><?php echo $nomE; ?></b></h5>
        	<h6><b><?php echo $fetchUE['adresseUE']; ?></b></h6>
        	<h6><b><?php echo $fetchUE['villeUE']; ?>, <br><?php echo $fetchUE['paysUE']; ?></b></h6>
        	<h6><b>N° TVA : <?php echo $fetchentrep['tvaE'];?></b></h6>

        	<div class="footer-chocolate"></div>
        	<br>
        	<div class="row">
        		<div class="col-md-6">
        			<?php
					    if($fetchUE['titre_document_commande'] == '')
					    {
					  ?>
						   <h1 class=""><strong>BON DE COMMANDE</strong></h1>
					  <?php
					    }
					    else
					    {
					  ?>
					    <h1 class=""><strong><?php echo strtoupper($fetchUE['titre_document_commande']); ?></strong></h1>
					  <?php
					    }
					  ?>
        		</div>
        		<div class="col-md-6">
        			<h6 class="text-right"><b><?php echo $fetchclient['societe_four']; ?></b></h6>
			        <h6 class="text-right"><b><?php echo $fetchclient['adresse_four']; ?></b></h6>
			        <h6 class="text-right"><b><?php echo $fetchclient['ville_four'].', '.$fetchclient['pays_four']; ?></b></h6>
			        <h6 class="text-right"><b>N° TVA : <?php echo $fetchclient['tva_four']; ?></b></h6>
        		</div>
        	</div>
        	

		    <div class="footer-chocolate"></div>

		    <br><br>
			<div class="row">
			    <div class="col-md-6">
			    	<h6>Date : <?php echo $fetchvente['date_cmd']; ?></h6>
      				<h6>Numéro : <?php echo $fetchvente['num_cmd']; ?></h6>
			    </div>

			    <div class="col-md-6 text-right">
			    	<h6>Délai de livraison : <?php echo $fetchvente['delai_livraison']; ?></h6>
			    </div>
			</div>


			<table class="table border-chocolate">
			    <thead class="border-orange bg-chocolate text-white">
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
		  <div class="footer-chocolate"></div>
		  <br><br><br>
		
	
</div>
<!--<div class="p-3 mb-2 bg-white text-dark border">
	<div class="entete">
		<div class="p-3 mb-2 bg-chocolate text-white left-div">FACTURE</div>
		<div>

			<div class="footer-chocolate"></div>
			<img id="logoUE" src="../logo/<?php echo $fetchUE['logo']; ?>.png"  alt="..." class="img-thumbnail logoUE">

		</div>
	</div>
	


</div>-->