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


         <!--css callout message-->
        <link href="../asserts/css/callout.css" rel="stylesheet">

        <!--<link rel="stylesheet" type="text/css" href="assets/css/loader.css">-->
        <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">

  

    <style type="text/css">
     

    .container-tab1 {
        overflow-y: auto;
        height: 150px;
        background-color: white;
      }

      /*tr:nth-child(even) {background-color: #d1ecf1;}
      tbody tr:hover{ background-color: #F1F1F1;  }*/

      .scrollcat
      {
        height:550px;
        width:100%;
        overflow:auto;
      }

      #dropdownMenuLink
      {
        border: 1px solid gray;
        color: black;
      }

      .form_card
        {
          background-color: #d1ecf1;
        }

        /* .body-modal-article
        {
          overflow-y: auto;
          height: 485px;
          background-color: white;
        }*/

       #libsearchcatart {
          background-image: url('../icons/png/office/search.png');
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 6px 12px 5px 40px;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
      }

      

    </style>
        

         <title>KEDIS Online! | Détails monnaie étrangère</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['idmonnaie']))  //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; //on protège la variable 
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
                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production

                          $idmonnaie = $_GET['idmonnaie'];


                          /*on recupère aussi l'id de la vente à partir de la 
                           référence de caise et de l'idUE*/


                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];

                          $reqmonnaie = $bdd->prepare("SELECT * FROM devise WHERE id_dev = ?"); 
                          $reqmonnaie->execute(array($idmonnaie));

                          $infosdevise = $reqmonnaie->fetch();

                          


                           /*if(isset($_POST['delete_vente']))
                          {
                            $deletereq = $bdd->prepare("DELETE FROM vente_for_user WHERE id_fact = ?");
                            $deletereq->execute(array($idvente));

                            header('location:vente.php?id='.$getid."&id_connexion=".$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE);
                          }*/



                        
                  ?>
                <!--Code PHP-->

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
       <!--on inlus la navigation du menu -->
        <?php include('navigation.php'); ?>

         <div id="right-panel" class="right-panel">
            
            <!--on inlus la la barre de navigation au dessus-->
            <?php  include('navbar.php'); ?>

          <?php include('navigation.php'); ?>



            <!-- Breadcrumbs-->
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Mes modes de paiement</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="monnaie.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes modes de paiement</a></li>
                                        <li class="active">Détails monnaie étrangère</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
              <!-- Animated -->
              <div class="animated fadeIn">
                <div class="card">
                  <div class="card-header">
                    <h6>Détails monnaie étrangère</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".ajouter-monnaie">
                          <span class="step size-21">
                              <i class="icon ion-edit"></i>
                          </span>
                          &nbsp;&nbsp;Modifier
                        </button>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-block" id="delete-devise">
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
              <!-- Animated -->

            </div>


         <!--debut modale new money-->
              <div class="modal fade bd-example-modal-lg ajouter-monnaie" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                      <div class="modal-header text-white bg-secondary">
                        <div class="row">
                          <div class="col-md-10">
                            <h6 class="modal-title" id="exampleModalLabel">Modifier la monnaie étrangère</h6>
                          </div>
                          <div class="col-md-2">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                        </div>
                              
                              
                      </div>

                      <div class="modal-body body-modal-article scrollcat">

                       <div class="card form_card">
                        <div class="card-body">
                          <h6 class="card-title">Informations</h6>
                          <hr>
                            <div class="form-group">
                              <label for="devise_dev"><h6>Devise</h6></label>
                              <div class="input-group mb-3">
                                <select class="custom-select" id="devise_dev" name="devise_dev">
                                  <?php

                                    $getDevisedf = $bdd->prepare('SELECT * FROM monnaie WHERE Code_iso = ?');
                                    $getDevisedf->execute(array($infosdevise['devise_dev']));

                                    $devisedf = $getDevisedf->fetch();

                                  ?>
                                  <option value="<?php echo $devisedf['Code_iso']?>" selected="">
                                    <?php echo $devisedf['Code_iso']?>
                                    (<?php echo $devisedf['Devise']?>)
                                  </option>
                                    <?php

                                        //On séléctionne tous les devises ou monnaie
                                        $get_monnaie = $bdd->prepare('SELECT * FROM monnaie ORDER BY Code_iso ASC');
                                        $get_monnaie->execute(array());

                                        while($row = $get_monnaie->fetch())
                                        {
                                    ?>
                                        <option value="<?php echo $row['Code_iso']; ?>">
                                          <?php echo $row['Code_iso']; ?> 
                                          (<?php echo $row['Devise']; ?>)
                                        </option>

                                    <?php
                                        }
                                    ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label for="lib_dev"><h6>Libellé</h6></label>
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Entrer le libellé de la devise" name="lib_dev" id="lib_dev" value="<?php echo $infosdevise['libelle_dev'];?>">
                              </div>
                            </div>
                        </div>
                      </div>

                         <div class="card form_card">
                        <div class="card-body">
                          <h6 class="card-title">Taux de change</h6>
                          <hr>

                             <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="taux_dev"><h6>Taux</h6></label>
                                  <input name="taux_dev" id="taux_dev" type="text" class="form-control text-right" placeholder="0.00" value="<?php echo $infosdevise['taux_dev'];?>">
                                </div>

                                <div class="form-group">
                                  <label for="date_dev"><h6>Date</h6></label>
                                  <input type="date" class="form-control" name="date_dev" id="date_dev" value="<?php echo $infosdevise['date_dev'];?>">
                                </div>
                              </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="equiv_dev"><h6>Equivaut</h6></label>
                                  <div class="input-group mb-3">
                                    <input name="equiv_dev" id="equiv_dev" type="text" class="form-control text-right" placeholder="0.00" value="<?php echo $infosdevise['equivalent_dev'];?>">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><?php echo $devise; ?></span>
                                    </div>
                                  </div>
                                </div>
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
                        <button type="bouton" class="btn btn-primary" name="save_dev" id="save_dev">
                            <span class="step size-21">
                              <i class="icon ion-android-done"></i>
                            </span>
                              &nbsp;&nbsp;&nbsp;Enregistrer
                        </button>
                      </div>

                    </div>
                </div>
              </div>
              <!--fin modale new money-->
             

                


            </div>
        </div>
         

        <!--*****************************************************-->
        <br><br>
  </div>
    
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



        <script src="../dist/js/util.js"></script>
        <!--<script src="../dist/js/dropdown.js"></script>-->
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>


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

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">
          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.paiement').addClass('active');

             affiche_detail(); 

              function affiche_detail()
              {
                
                var idmonnaie = '<?php echo $idmonnaie; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/detail_monnaie.php',
                  data : 'idmonnaie=' + idmonnaie + '&devise=' + devise,
                  success:function(data)
                  {
                    $('#detail_content').html(data);
                  }
                });
              }


        

               //insertion de la nouvelle monnaie étrangères
                $('#save_dev').click(function()
                  {
                    var devise_dev = $('#devise_dev').val();
                    var lib_dev = $('#lib_dev').val();
                    var taux_dev = $('#taux_dev').val();
                    var date_dev = $('#date_dev').val();
                    var equiv_dev = $('#equiv_dev').val();
                    var idmonnaie = '<?php echo $idmonnaie; ?>';

                    var idUE = '<?php echo $idUE; ?>';

                    if(devise_dev != '')
                    {
                      if(lib_dev != '')
                      {
                        if(/^[a-zA-Z]+/.test(lib_dev))
                        {
                          if(/^[0-9]+[.][0-9]+/.test(taux_dev) || /^[0-9]+/.test(taux_dev) || taux_dev != '')
                          {
                            if(/^[0-9]+[.][0-9]+/.test(equiv_dev) || /^[0-9]+/.test(equiv_dev) || equiv_dev != '')
                            {
                              $.ajax({
                                  type : 'POST',
                                  url : 'fonction/update_monnaie.php',
                                  data : "devise_dev=" + devise_dev + "&lib_dev=" + lib_dev + 
                                          "&taux_dev=" + taux_dev + "&date_dev=" + date_dev +  
                                          "&equiv_dev=" + equiv_dev + "&idUE=" + idUE + "&idmonnaie=" + idmonnaie,
                                  success:function(data)
                                  {
                                    //alert(data);
                                    if(data == 1)
                                    {
                                      err3("Cette monnaie étrangère existe déjà !");
                                      $('#lib_dev').addClass('is-invalid');
                                      $('#devise_dev').addClass('is-invalid');
                                    }
                                    else if(data == 3)
                                    {
                                      err3("Vous ne pouvez pas utiliser cette nommaie comme monnaie étrangère !");
                                      $('#lib_dev').addClass('is-invalid');
                                      $('#devise_dev').addClass('is-invalid');
                                    }
                                    else
                                    {
                                      $('#lib_dev').removeClass('is-invalid');
                                      $('#devise_dev').removeClass('is-invalid');
                                      $('#taux_dev').removeClass('is-invalid');
                                      $('#equiv_dev').removeClass('is-invalid');
                                      valid3('Nouvelle monnaie insérée avec succès !');
                                      $('.ajouter-monnaie').modal('hide');

                                      setTimeout(function()
                                      {
                                        window.location.reload();
                                      }, 5000);
                                    }
                                    affiche_detail();
                                  }
                                });
                            }
                            else
                            {
                              $('#equiv_dev').addClass('is-invalid');
                              err3("Veuillez renseigner l'équivalence de la monnaie étrangère en " + "<?php echo $devise; ?>");
                            }
                          }
                          else
                          {
                            $('#taux_dev').addClass('is-invalid');
                            err3("Veuillez renseigner le taux d'échange de la monnaie étrangère");
                          }
                        }
                        else
                        {
                          err3("Le libellé de la monnaie étrangère saisi n'est pas valide !");
                          $('#lib_dev').addClass('is-invalid');
                        }
                      }
                      else
                      {
                        $('#lib_dev').addClass('is-invalid');
                        err3('Veuillez renseigner le libellé de la monnaie étrangère');
                      }
                    }
                    else
                    {
                      $('#lib_dev').addClass('is-invalid');
                      err3('Veuillez choisir une devise S.V.P!');
                    }

                  });


              //supprimer monaies
              $('#delete-devise').click(function()
                {

                   var idmonnaie = '<?php echo $idmonnaie; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';

                  swal({
                          title: "Confirmer !",
                          text: "Voulez-vous vraiment supprimer cette monnaie ?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#28a745",
                          confirmButtonText: "Oui",
                          cancelButtonText: "Non",
                          closeOnConfirm: false
                          },
                          function(){
                              //swal("Supprimé !!", "L'utilisateur a été supprimé avec succès !!", "success");
                              delete_monnaie();
                              swal(
                                {
                                  title: "Supprimé !!",
                                text: "La monnaie a été supprimé avec succès !!",
                                type: "success",
                                confirmButtonColor: "#28a745",
                                }, function(){ window.location = 'monnaie.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE; });
                          });
                });

              function delete_monnaie()
              {
                var idmonnaie = '<?php echo $idmonnaie; ?>';

                $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/deleteMonnaie.php',
                    data  : 'idmonnaie=' + idmonnaie, 
                    success:function()
                    {
                      
                    }
                  });
              }



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
