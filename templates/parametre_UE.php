<!doctype html>
<!--Début html-->
<html lang="fr">
<!--Début html-->
    <head>
    <!--Début head-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <!--<link rel="stylesheet" href="../asserts/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../asserts/css/dashboard.css" >-->

        <!--Style personnel-->
        <link rel="stylesheet" href="../asserts/css/style.css" >
        
        <!--Chargement des styles pour les icones des reseaux socio-->
        <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <link rel="stylesheet" href="../asserts/css/docs.css" >
        <link rel="stylesheet" href="../asserts/css/font-awesome.css" >

         <!--chargement des icones-->
        <link href="../icons/css/ionicons.css" rel="stylesheet" type="text/css" />
        <link href="../icons/css/iconstyles.css" rel="stylesheet" type="text/css" />

        <!--CSS charts-->
        <!--<link rel="stylesheet" href="../asserts/css/chartist.min.css">-->

        <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">

        <!--ceci pour le chart graphique (tableau de statystique)-->
        <link rel="stylesheet" type="text/css" href="../asserts/C3/css/c3.css">


        <link rel="stylesheet" href="assets/css/normalize.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/icons/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/icons/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="assets/icons/pixeden-stroke-7-icon-master/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
        <link rel="stylesheet" href="assets/icons/flag-icon-css/flag-icon.min.css">
        <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <link href="assets/icons/weather-icons/css/weather-icons.min.css" rel="stylesheet" />
        <link href="assets/css/lib/calendar/fullcalendar.css" rel="stylesheet" />


        <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">

        <!--Mon modal personnel-->
        <link rel="stylesheet" type="text/css" href="assets/css/modal.mata.css">

        <!--loader-->
        <link rel="stylesheet" type="text/css" href="assets/css/loader.css">


        <!--<link rel="stylesheet" type="text/css" href="assets/css/loader.css">-->
        <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">

         <!--css callout-->
        <link href="../asserts/css/callout.css" rel="stylesheet">

        <!--cropper-->
    	<link rel="stylesheet" href="../asserts/css/cropper/cropper.css">
    	<link rel="stylesheet" href="../asserts/css/cropper/main.css">

  

    <style type="text/css">
     


      

      .form_card
      {
        background-color: #d1ecf1;
      }

      .body-modal-entreprise
        {
          overflow-y: auto;
          height: 505px;
          background-color: white;
        }

        .container-tab1 {
        overflow-y: auto;
        height: 150px;
        background-color: white;
      }

      .container-tab1 li
      {
        cursor: pointer;
      }

      .text-info2
      {
        color: #d1ecf1;
      }

      #traitement, #traitement_fin
	    {
	        display: none;
	    }

    .img-container1
    {
      height: 410px;
      margin-left: auto;
      margin-right: auto;
      display: block;
    }

    #logoUE
    {
    	height: 77px;
    }



      

    </style>
        

         <title>KEDIS Online!</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
               <?php 

                   // session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']))  //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; 
                      $get_id_connexion = $_GET['id_connexion'];
                      $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
                      $requser->execute(array($getid));

                      $userfos = $requser->fetch();
                      $getname = $userfos['nom_cl'];
                      $getprenom = $userfos['prenom_cl'];
                      $getmail = $userfos['email_cl'];
                      $getprofil = $userfos['profil_cl']; 
                      $sexe= $userfos['sexe_cl'];
                      $login_required = $userfos['login_required'];
                      $id_connexion = $userfos['id_connexion'];


                      if($id_connexion == $get_id_connexion)
                      {
                        //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                        if($login_required == 1)
                        {

                          $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise
                          $nomUE = $_GET['nom_unite_exploitation']; //on recupère le nom de l'UE

                          setlocale(LC_TIME, 'fr_FR'); //serveur
                          //setlocale(LC_TIME, 'fra_fra'); //php 5 en local 

                          //on recupère la date debut du mois
                          $datedebut = date("d-m-Y", mktime(0,0,0,date("m"),1,date("Y")));
                          //on recupère la date fin du mois
                          $datefin = date("d-m-Y", mktime(0,0,0,date("m")+1,0,date("Y")));

                          $date = date("Y-m-d");
                          $heure = date("H:i");

                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production


                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];
                          $idE = $fetchDevise['idEnt'];

                        

                     
                  ?>

                <!--Code PHP-->
      <!--chargement de la page-->
      <div class="preload">
          <div id="floatingBarsG">
            <div class="blockG" id="rotateG_01"></div>
            <div class="blockG" id="rotateG_02"></div>
            <div class="blockG" id="rotateG_03"></div>
            <div class="blockG" id="rotateG_04"></div>
            <div class="blockG" id="rotateG_05"></div>
            <div class="blockG" id="rotateG_06"></div>
            <div class="blockG" id="rotateG_07"></div>
            <div class="blockG" id="rotateG_08"></div>
          </div>
        </div>

    <div id="body">              

         <div id="right-panel" class="right-panel">
            
            <!--on inlus la la barre de navigation au dessus-->
            <?php  include('navbar.php'); ?>
        </div>

         <?php 
              //on recupère le numéro d'entreprise pour retourner en arrière 
              $getidEntrep = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
              $getidEntrep->execute(array($idUE));
              $infoart = $getidEntrep->fetch();

            ?>

        <div class="container">
          <br>
          <!--<div class="alert alert-light" role="alert">
             <h1 class="h2">Gestion des utilisateurs</h1>
         </div>-->

         <div class="p-3 mb-2 bg-white text-dark">
           <div class="row">
             <div class="col-md-6">
               <h5>Unité d'exploitations</h5>
             </div>
             <div class="col-md-6">
               <h5 class="text-right"><a href="unitexpl.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $idE; ?>&nom_entreprise=<?php echo $nomE; ?>">Unité d'exploitations </a>/ Paramètres</h5>
             </div>
           </div>
         </div>

         

          <div class="card border-info mb-3" >
            <div class="card-header text-left"><strong><b>Paramètres Unité d'exploitations</b></strong></div>
              <div class="card-body">
              	<div class="row">
                      <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#update">
                          <span class="step size-21">
                            <i class="icon ion-edit"></i>
                          </span>
                          &nbsp;&nbsp;Modifier
                        </button>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-block" id="delete_UE">
                          <span class="step size-21">
                            <i class="icon ion-ios-trash"></i>
                          </span>
                          &nbsp;&nbsp;Supprimer
                        </button>
                      </div>
                      <div class="col-md-8"></div>
                    </div>

                    <div id="detail_content">

                    	
                    </div>
               
                

              </div>
              </div>
        </div>

        <!-- Début Modal -->
	        <!--debut modale new entreprise-->
	         <div class="modal fade bd-example-modal-lg" id="update" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	            <div class="modal-dialog modal-lg">
	                <div class="modal-content">

	                  <div class="modal-header text-white bg-secondary">
	                    <div class="row">
	                      <div class="col-md-10"><h6 class="modal-title" id="exampleModalLabel">Modifier l'unité d'exploitation</h6></div>
	                      <div class="col-md-2">
	                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                          <span aria-hidden="true">&times;</span>
	                        </button>
	                      </div>
	                    </div>
	                  </div>

	                  <div class="modal-body body-modal-entreprise">
	                    <div class="card form_card">
	                      <div class="card-body">

	                                <div class="form-group">
	                                    <label for="nomUE">Nom</label>
	                                    <div class="input-group mb-3">
	                                        <div class="input-group-prepend">
	                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-briefcase.png"></span>
	                                        </div>
	                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nom de l'unité d'exploitation" value="<?php echo $infoart['nomUE']; ?>" name="nomUE" id="nomUE" required="">
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="adressUE">Adresse :</label>
	                                    <textarea class="form-control"  rows="2" name="adressUE" id="adressUE" placeholder="l'adresse de votre unité d'exploitation" required=""><?php echo $infoart['adresseUE']; ?></textarea>
	                                </div>
	                                <div class="form-group">
                                      <label for="postalecli"><h6>Code postal</h6></label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                                          </div>
                                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale" value="<?php echo $infoart['code_postal']; ?>" name="postale" id="postale">
                                      </div>
                                    </div>
	                                <div class="form-group">
	                                    <label for="villeUE">Ville</label>
	                                    <div class="input-group mb-3">
	                                        <div class="input-group-prepend">
	                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
	                                        </div>
	                                        <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville de l'unité d'exploitation" value="<?php echo $infoart['villeUE']; ?>" name="villeUE" id="villeUE" required="">
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="paysUE">Pays</label>
	                                    <div class="input-group mb-3">
	                                        <div class="input-group-prepend">
	                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
	                                        </div>
	                                        <select class="custom-select" name="paysUE" id="paysUE">
	                                        	<?php

	                                                //On séléctionne tous les pays dans la base de données
	                                                $get_payss = $bdd->prepare('SELECT * FROM pays WHERE id = ?');
	                                                $get_payss->execute(array($infoart['id_pays']));
	                                                $fetch_pays = $get_payss->fetch();

	                                            ?>

	                                            <option value="<?php echo $infoart['id_pays']; ?>" selected="selected"><?php echo $fetch_pays['nom_fr_fr']; ?></option>

	                                            <?php

	                                                //On séléctionne tous les pays dans la base de données
	                                                $get_pays = $bdd->prepare('SELECT * FROM pays ORDER BY nom_fr_fr ASC');
	                                                $get_pays->execute(array());

	                                                while($row = $get_pays->fetch())
	                                                {
	                                            ?>
	                                                <option value="<?php echo $row['id']; ?>">
	                                                  <?php echo $row['nom_fr_fr']; ?> 
	                                                </option>

	                                            <?php
	                                                }
	                                            ?>
	                                        </select>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <label for="deviseUE">Devise :</label>
	                                    <div class="input-group mb-3">
	                                        <div class="input-group-prepend">
	                                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/cash.png"></span>
	                                        </div>
	                                          <select class="form-control" id="deviseUE" name="deviseUE">

	                                          	<?php

	                                                //On séléctionne tous les pays dans la base de données
	                                                $get_mon = $bdd->prepare('SELECT * FROM monnaie WHERE id = ?');
	                                                $get_mon->execute(array($infoart['id_monnaie']));
	                                                $fetch_mon = $get_mon->fetch();

	                                            ?>

	                                            <option value="<?php echo $infoart['id_monnaie']; ?>" selected="">
	                                            	<?php echo $fetch_mon['Code_iso']; ?>
	                                            	(<?php echo $fetch_mon['Devise']; ?>)		
	                                            </option>

	                                            <?php

	                                                //On séléctionne tous les devises ou monnaie
	                                                $get_monnaie = $bdd->prepare('SELECT * FROM monnaie ORDER BY Code_iso ASC');
	                                                $get_monnaie->execute(array());

	                                                while($row = $get_monnaie->fetch())
	                                                {
	                                            ?>
	                                                <option value="<?php echo $row['id']; ?>">
	                                                  <?php echo $row['Code_iso']; ?> 
	                                                  (<?php echo $row['Devise']; ?>)
	                                                </option>

	                                            <?php
	                                                }
	                                            ?>
	                                          </select>
	                                    </div>

	                                </div>
	                      </div>
	                    </div>
	                  </div>

	                   <div class="modal-footer">
	                    <button type="button" class="btn btn-danger" data-dismiss="modal">
	                      <span class="step size-21">
	                          <i class="icon ion-ios-undo"></i>
	                        </span>
	                          &nbsp;&nbsp;&nbsp;Annuler
	                    </button>
	                    <button type="bouton" class="btn btn-primary" name="saveUE" id="saveUE">
	                        <span class="step size-21">
	                          <i class="icon ion-android-done"></i>
	                        </span>
	                          &nbsp;&nbsp;&nbsp;Enregistrer
	                    </button>
	                  </div>

	                </div>
	            </div>
	         </div>
	        <!--fin modale new entreprise-->
        
        <!-- Fin Modal -->


              

       

        

                

         

        <!--*****************************************************-->
        
  </div>

       <!--chat discusion-->
       <?php  include('chat_discution.php'); ?>

       
    
        <!-- Bootstrap JS -->

         <!--<script src="../asserts/js/vendor/jquery-slim.min.js"></script>-->
        <script src="../asserts/js/jquery/jquery.min.js"></script>

        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.matchHeight.min.js"></script>
        <script src="assets/js/main.js"></script>


        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/lib/calendar/fullcalendar.min.js"></script>
        <script src="assets/js/init/fullcalendar-init.js"></script>


        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>



          <!--<script src="assets/js/lib/data-table/datatables.min.js"></script>
          <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
          <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
          <script src="assets/js/lib/data-table/jszip.min.js"></script>
          <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
          <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
          <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>-->
          <!--<script src="assets/js/init/datatables-init.js"></script>-->

          <!--Mon modal personnel-->
          <script src="assets/js/modal.mata.js"></script>

          <!--loader-->
          <script src="assets/js/loader.js"></script>

          <!--switch arlert-->
          <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>
          <!-- scripit init-->
          <!--<script src="assets/js/lib/sweetalert/sweetalert.init.js"></script>-->

          <!--cropper-->
        <script src="../asserts/js/cropper/cropper.js"></script>
        <!--<script src="../asserts/js/cropper/cropper.min.js"></script>-->
        <!--<script src="../asserts/js/cropper/docs.js"></script>-->
        <!--<script src="../asserts/js/cropper/main.js"></script>-->

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">

        jQuery(document).ready(function($) 
        {
          
          	affiche_detail(); 

	        function affiche_detail()
	        {
	            
	            var idUE = '<?php echo $idUE; ?>';

	            $.ajax({
	              type : 'POST', 
	              url  : 'fonction1/detail_UE.php',
	              data : 'idUE=' + idUE,
	              success:function(data)
	              {
	                $('#detail_content').html(data);
	              }
	            });
	        }

	         function delete_UE()
              {
                var idUE = '<?php echo $idUE; ?>';

                $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction1/delete_UE.php',
                  data  : 'idUE=' + idUE, 
                  success:function(data)
                  {
                    
                  }
                });
              }

			//supprimer client
              $('#delete_UE').click(function()
                {

                  var idUE = '<?php echo $idUE; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var idE = '<?php echo $idE; ?>';
                  var nomE = '<?php echo $nomE; ?>';

                  swal({
                          title: "Confirmer !",
                          text: "Voulez-vous vraiment supprimer cette unité d'exploitation ?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#28a745",
                          confirmButtonText: "Oui",
                          cancelButtonText: "Non",
                          closeOnConfirm: false
                          },
                          function(){
                              //swal("Supprimé !!", "L'utilisateur a été supprimé avec succès !!", "success");
                              delete_UE();
                              swal(
                                {
                                  title: "Supprimé !!",
                                text: "L'unité d'exploitation a été supprimé avec succès !!",
                                type: "success",
                                confirmButtonColor: "#28a745",
                                }, function(){ window.location = 'unitexpl.php?id=' + getid + "&id_connexion=" + id_connexion + "&idE=" + idE + "&nom_entreprise=" + nomE; });
                          });
                });


	        //mis à jour  une nouvelle entrerise
              $('#saveUE').click(function()
                {
                  var idUE = '<?php echo $idUE; ?>';
                  var nomUE = $('#nomUE').val();
                  var adressUE = $('#adressUE').val();
                  var villeUE = $('#villeUE').val();
                  var paysUE = $('#paysUE').val();
                  var deviseUE = $('#deviseUE').val();
                  var postale = $('#postale').val();
                  
                  if(nomUE != '')
                    {
                       if(adressUE != '')
                       {
                          if(villeUE != '')
                          {
                            if(paysUE != '')
                            {
                              if(deviseUE != '')
                              {
                                 $.ajax({
                                  type : 'POST',
                                  url : 'fonction1/update_UE.php',
                                  data : "nomUE=" + nomUE + "&adressUE=" + adressUE + 
                                          "&villeUE=" + villeUE + "&paysUE=" + paysUE + 
                                          "&deviseUE=" + deviseUE + '&postale=' + postale + '&idUE=' + idUE,
                                  success:function(data)
                                  {
                                    //alert(data);
                                    
                                      $('#nomUE').removeClass('is-invalid');
                                      $('#adressUE').removeClass('is-invalid');
                                      $('#villeUE').removeClass('is-invalid');
                                      $('#paysUE').removeClass('is-invalid');
                                      $('#deviseUE').removeClass('is-invalid');

                                      valid3("Unité d'exploitation mis à jour avec succès !");
                                      $('#update').modal('hide');

                                      affiche_detail();

                                      setTimeout(function()
                                      {
                                        window.location.reload();
                                      }, 5000);

                                  }
                                });
                              }
                              else
                              {
                                $('#deviseUE').addClass('is-invalid');
                                err3("Veuillez renseigner la dévise de l'unité d'exploitation S.V.P!");
                              }   
                            }
                            else
                            {
                              $('#paysE').addClass('is-invalid');
                              err3("Veuillez sélectionner le pays de l'unité d'exploitation S.V.P!");
                            }
                          }
                          else
                          {
                            $('#villeUE').addClass('is-invalid');
                            err3("Veuillez renseigner la ville de l'unité d'exploitation S.V.P!");
                          }
                       }
                        else
                        {
                          $('#adressUE').addClass('is-invalid');
                          err3("Veuillez renseigner l'adresse de l'unité d'exploitation S.V.P!");
                        }
                    }
                    else
                    {
                      $('#nomUE').addClass('is-invalid');
                      err3("Veuillez renseigner le nom de l'unité d'exploitation S.V.P!"); //on affiche le message d'erreur dans un toast défini dans la fonction err();
                    }

                });

            function err3(element){
                toastr.error(element,'Erreur',{
                  "positionClass": "toast-bottom-right",
                  timeOut: 5000,
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "preventDuplicates": true,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut",
                  "tapToDismiss": false

                })
              }

              function valid3(element)
              {
                toastr.success(element,'Succès',{
                  "positionClass": "toast-bottom-left",
                  timeOut: 5000,
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "preventDuplicates": true,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut",
                  "tapToDismiss": false

                })
              }

          });
        </script>

    <!--fin body-->
    </body>
<!--fin html-->
</html>
<?php
    }
    else
    {
      header('location:deconnexion.php?id='.$getid);
    }
  }
  else
  {
    header('location:deconnexion.php?id='.$getid);
  }
}  
else
{
  header('location:error404.php');
}
?>
