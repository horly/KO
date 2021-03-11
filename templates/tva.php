<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Convertir TTC HT TVA via Javascript et jQuery, script gratuit à télécharger</title>
<meta name="description" content="Trouver le TTC à partir du HT et inversement. Script JS+jQuery de conversion HT/TTC/TVA. Téléchargement gratuit.">
<meta name="author" content="Webnext.fr" />
</head>

<body>
<div class="container">
	<h1>Convertir TTC HT TVA via Javascript et jQuery</h1>

    <form class="form-inline myForm">
      <div class="form-group">
        <label class="control-label" for="prix_ht">Prix HT</label>
        <input name="prix_ht" type="number" class="form-control" step="0.01">
      </div>
      <div class="form-group">
        <label class="control-label" for="taux_tva">Taux de TVA</label>
        <input name="taux_tva" type="number" class="form-control" value="20.00" step="0.01">
      </div>
      <div class="form-group">
        <label class="control-label" for="prix_ttc">Prix TTC</label>
        <input name="prix_ttc" type="number" class="form-control" step="0.01">
      </div>
    </form>

    <footer class="footer" style="margin-top:80px">
	<p style="color:#999"><a href="https://webnext.fr/" class="btn btn-primary btn-sm">Webnext.fr</a> créateurs de sites et applications web</p>
    </footer>  
  
</div>

<script src="jquery-3.3.1.js"></script> 
<script>
function calcule_ht_ttc(event) // fonction de calcul
{
	var prix_ht = $('input[name="prix_ht"]').val();
	var taux_tva  = $('input[name="taux_tva"]').val();
	var prix_ttc = $('input[name="prix_ttc"]').val();
	
	if(event.target.name=='prix_ttc')
	{
		var new_prix_ht = (prix_ttc/(1+taux_tva/100)).toFixed(2);		
		$('input[name="prix_ht"]').val(new_prix_ht);
	}
	else
	{
		var new_prix_ttc = (prix_ht*(1+taux_tva/100)).toFixed(2);		
		$('input[name="prix_ttc"]').val(new_prix_ttc);
	}	
}


$(function() // jQuery
{
	$('.myForm input').bind('keyup mouseup', calcule_ht_ttc); // appel de la fonction de calcul lors d'un événement 'keyup' ou 'mouseup'
});
</script>
</body>
</html>