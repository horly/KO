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
		$getvente = $bdd->prepare('SELECT * FROM vente_for_user WHERE id_fact = ?');
		$getvente->execute(array($idvente));
		$fetchvente = $getvente->fetch();

		//on recupère le client 
		$getclient = $bdd->prepare('SELECT * FROM client_for_user WHERE id_cli = ?');
		$getclient->execute(array($fetchvente['id_cl_fact']));
		$fetchclient = $getclient->fetch();
	?>

<div class="p-3 mb-2 bg-white text-dark border">
	<div class="row">
		<div class="col-md-8">
			<img id="logoUE" src="../logo/<?php echo $fetchUE['logo']; ?>.png"  alt="...">
		</div>
		<div class="col-md-4">
			<?php
			    if($fetchUE['titre_document_facture'] == '')
			    {
			  ?>
				   <h3 class="text-success"><strong>FACTURE N° <?php echo $fetchvente['num_facture']; ?></strong></h3>
			  <?php
			    }
			    else
			    {
			  ?>
			    <h3 class="text-success"><strong><?php echo strtoupper($fetchUE['titre_document_facture']); ?> N° <?php echo $fetchvente['num_facture']; ?></strong></h3>
			  <?php
			    }
			  ?>
			  <h5><b>Date : <?php echo $fetchvente['date_fact']; ?></b></h5>
			  <h5><b>Date échéance : <?php echo $fetchvente['echeance_fact']; ?></b></h5>
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
	        	<h6><b>&nbsp;</b></h6>
	        </div>
		</div>
		<div class="col-md-6">
			<div class="callout-right">
				<h6 class="text-right"><b><?php echo $fetchclient['civilite_cli']; ?> <?php echo $fetchclient['prenom_cli']; ?> <?php echo $fetchclient['nom_cli']; ?></b></h6>
			    <h6 class="text-right"><b><?php echo $fetchclient['societe_cli']; ?></b></h6>
			    <h6 class="text-right"><b><?php echo $fetchclient['adresse_cli']; ?></b></h6>
			    <h6 class="text-right"><b><?php echo $fetchclient['ville_cli']; ?> <br> <?php echo$fetchclient['pays_cli']; ?></b></h6>
			    <h6 class="text-right"><b>N° TVA : <?php echo $fetchclient['tva_cli']; ?></b></h6>
			</div>
		</div>
	</div>
	
	<br><br>

	<table class="table border border-success">
			    <thead class="border border-success bg-success text-white">
			      <tr>
			        <?php
			          // si la référence est activé 
			          if($fetch_modele['reference'] == 1)
			          {
			        ?>

			          <th>Réf</th>

			        <?php
			          }
			        ?>

			          <th class="text-center">Qté</th>
			          <th>Description</th>
			          <th class="text-right">Prix Unit. TTC</th>

			        <?php
			          // si le montant hors tva est activé 
			          if($fetch_modele['montant_hors_tva'] == 1)
			          {
			        ?>

			          <th class="text-right">Prix HTVA</th>

			        <?php
			          }
			          // si la tva est activé 
			          if($fetch_modele['tva'] == 1)
			          {
			        ?>

			          <th class="text-right">TVA %</th>

			        <?php
			          }
			          // si la tva est activé 
			          if($fetch_modele['montant_tva'] == 1)
			          {
			        ?>

			          <th class="text-right">Montant TVA</th>

			        <?php
			          }
			        ?>
			          <th class="text-right">Total</th>
			      </tr>
			    </thead>
			    <tbody class=""> 
			      <?php
			        $viewfact = $bdd->prepare("SELECT * FROM facturation_for_user WHERE id_vente_fact = ?"); 
			        $viewfact->execute(array($idvente));

			        while($rows = $viewfact->fetch()) 
			        {
			       ?>   
			          <tr>
			            <?php
			              // si la référence est activé 
			              if($fetch_modele['reference'] == 1)
			              {
			                if($rows['type_fact'] == 'article')
			                {
			                  //on récupère la référence de l'article d'abord
			                  $get_ref_art = $bdd->prepare("SELECT * FROM article_for_user WHERE code_art = ? AND idUE_art = ?");
			                  $get_ref_art->execute(array($rows['code_art_fact'], $idUE));
			                  $info_art = $get_ref_art->fetch();
			            ?>

			                  <td><?php echo  $info_art['num_art']; ?></td>

			            <?php
			                }
			                else
			                {
			                  //on récupère la référence du service
			                  $get_ref_ser = $bdd->prepare("SELECT * FROM service_for_user WHERE code_ser = ? AND id_UE_ser = ?");
			                  $get_ref_ser->execute(array($rows['code_art_fact'], $idUE));
			                  $info_ser = $get_ref_ser->fetch();
			            ?>
			                  <td><?php echo  $info_ser['num_ser']; ?></td>
			            <?php
			                }
			              }
			            ?>
			              <td class="text-center"><?php echo $rows['quantite_art_fact']; ?></td>
			              <td class="text-left"><?php echo utf8_encode($rows['libelle_art_fact']); ?></td>
			              <td class="text-right"><?php echo number_format($rows['prix_hors_tva_fact'], 2, '.', ' '); ?></td>

			            <?php
			              // si le montant hors tva est activé 
			              if($fetch_modele['montant_hors_tva'] == 1)
			              {
			            ?>

			              <td class="text-right">
			                <?php 

			                  $montanthtva = $rows['prix_hors_tva_fact'] * $rows['quantite_art_fact'];
			                  echo number_format($montanthtva, 2, '.', ' ');
			                ?> 
			              </td>

			            <?php
			              }
			              // si la tva est activé 
			              if($fetch_modele['tva'] == 1)
			              {
			            ?>

			              <td class="text-right">
			                <?php echo number_format($rows['taux_tva_fact'], 2, '.', ' '); ?> %
			              </td>

			            <?php
			              }
			              // si la tva est activé 
			              if($fetch_modele['montant_tva'] == 1)
			              {
			            ?>

			              <td class="text-right">
			                <?php echo number_format($rows['montant_tva_fact'], 2, '.', ' '); ?> 
			              </td>

			            <?php
			              }
			            ?>
			              <td class="text-right">
			                <?php 

			                  $montanttc = $rows['prix_unit_art_fat'] * $rows['quantite_art_fact'];
			                  echo number_format($montanttc, 2, '.', ' ');
			                ?> 
			              </td>
			            </tr>
			          <?php 
			            } 
			          ?> 
			        </tbody>
			        <tfoot class="border border-success bg-success text-white">
			          <tr>
			              <?php

			                  $totalhtva = $bdd->prepare("SELECT SUM(prix_hors_tva_fact * quantite_art_fact) AS prix_totalhtva FROM facturation_for_user WHERE id_vente_fact = ? ");
			                  $totalhtva->execute(array($idvente));

			                  $prix_totalhtva = $totalhtva->fetch();

			                  $totalhtva = number_format($prix_totalhtva['prix_totalhtva'], 2, '.', ' ');


			                  $total_monttva = $bdd->prepare("SELECT SUM(montant_tva_fact) AS totalmonttva FROM facturation_for_user WHERE id_vente_fact = ? ");
			                  $total_monttva->execute(array($idvente));

			                  $mont_tva_total = $total_monttva->fetch();

			                  $total_mont_tva = number_format($mont_tva_total['totalmonttva'], 2, '.', ' ');


			                  $totalttc = $bdd->prepare("SELECT SUM(prix_unit_art_fat * quantite_art_fact) AS prix_totalttc FROM facturation_for_user WHERE id_vente_fact = ? ");
			                  $totalttc->execute(array($idvente));

			                  $prix_totalttc = $totalttc->fetch();

			                  $totalttc = number_format($prix_totalttc['prix_totalttc'], 2, '.', ' ');

			              ?>
			              <?php
			                // si la référence est activé 
			                if($fetch_modele['reference'] == 1)
			                {
			              ?>
			                <td></td>
			              <?php
			                }
			              ?>
			              <td></td>
			              <td></td>
			              <td></td>

			              <?php
			                // si le montant hors tva est activé 
			                if($fetch_modele['montant_hors_tva'] == 1)
			                {
			              ?>

			                <td class="text-right"><h6><strong><?php echo $totalhtva; ?></strong></h6></td>

			              <?php
			                }
			                // si la tva est activé 
			                if($fetch_modele['tva'] == 1)
			                {
			              ?>

			                <td></td>

			              <?php
			                }
			                // si la tva est activé 
			                if($fetch_modele['montant_tva'] == 1)
			                {
			              ?>

			                <td class="text-right"><h6><strong><?php echo $total_mont_tva; ?></strong></h6></td>

			              <?php
			                }
			              ?>
			              <td class="text-right"><h6><strong><?php echo $totalttc; ?></strong></h6></td>
			            </tr>
			        </tfoot>
	</table>

	<h5 class="text-right"><b>Total à payer</b></h5>
   		<h5 class="text-right"><b><?php echo number_format($fetchvente['montant_facture'], 2, '.', ' '); ?> <?php echo $devise; ?></b></h5>
   		<?php
   			if($fetchvente['remise_fact'] != 0)
   			{
   		?>

   		 <h6 class="text-right">Remise : <?php echo $fetchvente['remise_fact'] * -1; ?> <?php echo $fetchvente['unite_remise_fact']; ?></h6>
   		
      <?php 
        }
      ?>


      <?php 

        if($fetchvente['rembourser_fact'] != 0)
        {

      ?>


      <h6 class="text-right">Paiement reçu : <?php echo number_format($fetchvente['paiemant_recu_fact'], 2, '.', ' '); ?> <?php echo $devise; ?></h6>

      <h6 class="text-right">A rembourser : <?php echo number_format($fetchvente['rembourser_fact'], 2, '.', ' '); ?> <?php echo $devise; ?></h6>

      <?php
      }
      else
      {
      ?>


      <h6 class="text-right">Acompte versé : <?php echo number_format($fetchvente['paiemant_recu_fact'], 2, '.', ' '); ?> <?php echo $devise; ?></h6>

   		<h6 class="text-right">Reste à payer : <?php echo number_format($fetchvente['reste_a_payer_fact'], 2, '.', ' '); ?> <?php echo $devise; ?></h6>

      <?php

        }
      ?>

      <?php 

	  		//onséléctionne le taux tva positif
	  		$gettva = $bdd->prepare('SELECT * FROM facturation_for_user WHERE id_vente_fact = ? AND taux_tva_fact != ?');
	  		$gettva->execute(array($idvente, 0));

	  		$fetchtva = $gettva->fetch();

	      $counttva = $gettva->rowCount();

	      
	  	?>
      <br>
		  	<div class="row">
			 	<div class="col-md-6">
			      	<table class="table border border-success">
				      	<thead>
				      		<tr class="bg-success boder border-success text-white">
				      			<td class="text-left"><strong>TAUX TVA</strong></td>
				      			<td class="text-right"><strong>0 %</strong></td>
				            <?php
				              //s'il y a au moins un taux de tva différent de 0
				              if(preg_match('/^[1-9]+/', $counttva))
				              {
				            ?>
				      			   <td class="text-right"><strong><?php echo $fetchtva['taux_tva_fact']; ?> %</strong></td>
				            <?php
				              }
				            ?>
				      		</tr>
				        	<?php

				        		$totalhtvaA = $bdd->prepare("SELECT SUM(prix_hors_tva_fact * quantite_art_fact) AS prix_totalhtva FROM facturation_for_user WHERE id_vente_fact = ? AND taux_tva_fact = ? ");
				          			$totalhtvaA->execute(array($idvente, 0));

				          			$fetchtotalhtvaA = $totalhtvaA->fetch();

				        		$totalhtvaB = $bdd->prepare("SELECT SUM(prix_hors_tva_fact * quantite_art_fact) AS prix_totalhtva FROM facturation_for_user WHERE id_vente_fact = ? AND taux_tva_fact != ? ");
				          			$totalhtvaB->execute(array($idvente, 0));

				          			$fetchtotalhtvaB = $totalhtvaB->fetch();
				        	?>
				        </thead>
			        	<tbody>
			          <tr>
			          	<td class="text-left"><strong>Base imposble</strong></td>
			          	<td class="text-right"><?php echo number_format($fetchtotalhtvaA['prix_totalhtva'], 2, '.', ' '); ?></td>

			            <?php
			              //s'il y a au moins un taux de tva différent de 0
			              if(preg_match('/^[1-9]+/', $counttva))
			              {
			            ?>

			          	 <td class="text-right"><?php echo number_format($fetchtotalhtvaB['prix_totalhtva'], 2, '.', ' '); ?></td>

			            <?php
			              }
			            ?>
			          </tr>

			          <?php
			          	 $total_monttvaA = $bdd->prepare("SELECT SUM(montant_tva_fact) AS totalmonttva FROM facturation_for_user WHERE id_vente_fact = ? AND taux_tva_fact = ?");
			                  $total_monttvaA->execute(array($idvente, 0));

			                  $fetchtotal_monttvaA = $total_monttvaA->fetch();

			                  $total_monttvaB = $bdd->prepare("SELECT SUM(montant_tva_fact) AS totalmonttva FROM facturation_for_user WHERE id_vente_fact = ? AND taux_tva_fact != ?");
			                  $total_monttvaB->execute(array($idvente, 0));

			                  $fetchtotal_monttvaB = $total_monttvaB->fetch();
			          ?>
			          <tr>
			          	<td class="text-left"><strong>Montant TVA</strong></td>
			          	<td class="text-right"><?php echo number_format($fetchtotal_monttvaA['totalmonttva'], 2, '.', ' '); ?></td>

			            <?php
			              //s'il y a au moins un taux de tva différent de 0
			              if(preg_match('/^[1-9]+/', $counttva))
			              {
			            ?>

			          	 <td class="text-right"><?php echo number_format($fetchtotal_monttvaB['totalmonttva'], 2, '.', ' '); ?></td>

			            <?php
			              }
			            ?>
			          </tr>
			          </tbody>
			          <tfoot>
			            <tr class="bg-success border border-success text-white">
			              <td class="text-left"><strong>Total</strong></td>
			              <td class="text-right"><?php echo number_format($fetchtotalhtvaA['prix_totalhtva'] + $fetchtotal_monttvaA['totalmonttva'], 2, '.', ''); ?></td>

			              <?php
			              //s'il y a au moins un taux de tva différent de 0
			              if(preg_match('/^[1-9]+/', $counttva))
			              {
			              ?>
			                <td class="text-right"><?php echo number_format($fetchtotalhtvaB['prix_totalhtva'] + $fetchtotal_monttvaB['totalmonttva'], 2, '.', ''); ?></td>

			              <?php
			              }
			            ?>
			          </tr>
			          </tfoot>
			        </table>
			 	</div>

		   		<div class="col-md-6">
		   			
		   		</div>
			</div>
			<p>
		    <?php 
		      if($fetch_modele['note_bas'] != '')
		      {
		       
		         echo $fetch_modele['note_bas']; 
		      }
		      else
		      {
		         echo "---";
		      }
		    ?>  
		  </p>
		  <div class="footer-success"></div>

</div>