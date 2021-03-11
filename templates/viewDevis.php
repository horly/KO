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
     
      /*tbody 
        {
          display:block;
          height:200px;
          overflow:auto;
        }*/

        /*thead, tbody tr, tfoot
        {
          display:table;
          width:100%;
          table-layout:fixed;
        }*/

        /*thead tr
        {
          cursor: pointer;
        }

        thead, tfoot 
        {
            width: calc( 100% - 1em )
        }*/

      /*tr:nth-child(even) {background-color: #d1ecf1;}
      tbody tr:hover{ background-color: #F1F1F1;  }*/

      .table_facture thead, .table_facture tbody tr, .table_facture tfoot
      {
        display:table;
        width:100%;
        table-layout:fixed;
      }

      .table_facture thead, .table_facture tfoot 
      {
          width: calc( 100% - 1em )
      }


      
      .table_facture tbody
      {
        display:block;
        height:180px;
        overflow:auto;
      }


      .table_transaction1 thead, .table_transaction1 tbody tr, .table_transaction1 tfoot
      {
        display:table;
        width:100%;
        table-layout:fixed;
      }

      .table_transaction1 thead, .table_transaction1 tfoot 
      {
          width: calc( 100% - 1em )
      }

      .table_transaction1 tbody
      {
        display:block;
        height:150px;
        overflow:auto;
      }

      .table_transaction tbody
      {
        display:block;
        height:165px;
        overflow:auto;
      }

      .table_transaction thead, .table_transaction tbody tr, .table_transaction tfoot
      {
        display:table;
        width:100%;
        table-layout:fixed;
      }

      .table_transaction thead, .table_transaction tfoot 
      {
          width: calc( 100% - 1em )
      }


      .form_card
        {
          background-color: #d1ecf1;
        }

        #apercu_vente
      {
        overflow-y: auto;
          height: 570px;
          background-color: white;
      }

       #apercu_note_credit
      {
        overflow-y: auto;
          height: 570px;
          background-color: white;
      }

      .body-modal-client
        {
          overflow-y: auto;
          height: 550px;
          background-color: white;
        }

        #adresscli
      {
        height: 126px;
      }

      .btn-orange
      {
        background-color: #CD853F;
      }

      .btn-orange:hover
      {
        background-color: #D2691E;
      }
      

    </style>
        

         <title>KEDIS Online! | Mes devis/offres | Détails devis/offre</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

        <!--Code PHP-->
                <?php 

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['idoffre']))  //si la variable id qu'on a transité existe dans l'url 
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

                          $idoffre = $_GET['idoffre'];


                          /*on recupère aussi l'id de la vente à partir de la 
                           référence de caise et de l'idUE*/


                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];

                          $reqvente = $bdd->prepare("SELECT * FROM devis WHERE id_dv = ?"); 
                          $reqvente->execute(array($idoffre));

                          $infosVente = $reqvente->fetch();

                          $refCaise = $infosVente['reference_dv'];
                          $idClient = $infosVente['id_cl_dv'];


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
                                    <h1>Mes recettes</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li><a href="devis.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes offres/devis</a></li>
                                        <li class="active">Détails devis/offre</li>
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
                  <div class="card-header text-white bg-secondary">
                    <h6>Détails devis/offre</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <a role="button" class="btn btn-info btn-block" href="facturation_devis_finish.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&idoffre=<?php echo $idoffre; ?>">
                           <span class="step size-21">
                            <i class="icon ion-document-text"></i>
                          </span>
                          &nbsp;&nbsp;Facture
                        </a>
                      </div>
                      <div class="col-md-2">
                        <a role="button" class="btn btn-primary btn-block" id="update" href="facturation_devis.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&refcaise=<?php echo $refCaise; ?>&idClient=<?php echo $idClient; ?>">
                          <span class="step size-21">
                            <i class="icon ion-edit"></i>
                          </span>
                          &nbsp;&nbsp;Modifier
                        </a>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-block" id="delete-offre">
                          <span class="step size-21">
                            <i class="icon ion-ios-trash"></i>
                          </span>
                          &nbsp;&nbsp;Supprimer
                        </button>
                      </div>
                      <div class="col-md-6"></div>
                    </div>

                    <div id="detail_content">
                      
                    </div>
                       
                  </div>
                </div>
              </div>
              <!-- Animated -->

            </div>

             

                


            </div>
        </div>
         

        <!--*****************************************************-->
        <br><br>
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
            $('.vente').addClass('active');

            affiche_detail(); 

               affiche_detail(); 

              function affiche_detail()
              {
                
                var idoffre = '<?php echo $idoffre; ?>';
                var devise = '<?php echo $devise; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/detail_devis_offre.php',
                  data : 'idoffre=' + idoffre + '&devise=' + devise,
                  success:function(data)
                  {
                    $('#detail_content').html(data);
                  }
                });
              }

              

              $('#delete-offre').click(function()
                {

                  var idoffre = '<?php echo $idoffre; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';

                  swal({
                          title: "Confirmer !",
                          text: "Voulez-vous vraiment supprimer ce devis/offre ?",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#28a745",
                          confirmButtonText: "Oui",
                          cancelButtonText: "Non",
                          closeOnConfirm: false
                          },
                          function(){
                              //swal("Supprimé !!", "L'utilisateur a été supprimé avec succès !!", "success");
                              delete_offre();
                              swal(
                                {
                                  title: "Supprimé !!",
                                text: "Le devis/offre a été supprimé avec succès !!",
                                type: "success",
                                confirmButtonColor: "#28a745",
                                }, function(){ window.location = 'devis.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE; });
                          });
                });


              function delete_offre()
              {
                  var idoffre = '<?php echo $idoffre; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';

                  $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'fonction/deleteDevis.php',
                    data  : 'idoffre=' + idoffre, 
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
