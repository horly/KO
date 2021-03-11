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
     
     .form_card
        {
          background-color: #d1ecf1;
         
        }

      .scrollcat
      {
        height:150px;
        width:100%;
        overflow:auto;
      }

      #dropdownMenuLink
      {
        border: 1px solid gray;
        color: black;
      }

      

      .body-modal-article
        {
          overflow-y: auto;
          height: 440px;
          background-color: white;
        }

        #libsearchcatart {
          background-image: url('../icons/png/office/search.png');
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 6px 12px 5px 40px;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
      }

      .viewtva
      {
        display: none;
      }

      #logoUE
      {
        height: 100px;
      }
    </style>
        

         <title>KEDIS Online! | Mes devis/offres | facturation</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

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

                           //on recupère l'id du client pour récupérer ensuite l'émail du client
                          $getid_cli = $bdd->prepare("SELECT * FROM devis WHERE id_dv = ?");
                          $getid_cli->execute(array($idoffre));
                          $fetch_id_cl = $getid_cli->fetch();
                          $id_cli = $fetch_id_cl['id_cl_dv'];

                          //on récupère maintenant l'émail du client à partir de son id 
                          $get_email_cl = $bdd->prepare("SELECT * FROM client_for_user WHERE id_cli = ?");
                          $get_email_cl->execute(array($id_cli));
                          $fetch_email_cli = $get_email_cl->fetch();
                          $email_cli = $fetch_email_cli['email_cli'];



                        
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
                                        <li class="active">Aperçu offres/devis</li>
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
                    <h6>Aperçu offres/devis</h6>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block create_pdf" myprint="#detail_content" id="print_facture" title="Imprimer la facture">
                          <span class="step size-21">
                            <i class="icon ion-android-print"></i>
                          </span>
                          &nbsp;&nbsp;Imprimer
                        </button>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-block" id="send-facture-mail">
                          <span class="step size-21">
                            <i class="icon ion-android-mail"></i>
                          </span>
                          &nbsp;&nbsp;Envoyer
                        </button>
                      </div>
                      <div class="col-md-2">
                        <a role="button" class="btn btn-success btn-block" href="viewDevis.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&idoffre=<?php echo $idoffre; ?>">
                          <span class="step size-21">
                            <i class="icon ion-document"></i>
                          </span>
                          &nbsp;&nbsp;Détails
                        </a>
                      </div>

                      <div class="col-md-6"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div id="detail_content">
                          
                            </div>
                        </div>


                        <?php

                          $reqart = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $reqart->execute(array($idUE));
                          $infoart = $reqart->fetch();

                          //on récupère les champs coché et non coché dans modèle de facture 
                          $get_info_facture = $bdd->prepare("SELECT * FROM modele_facture WHERE idUE = ?");
                          $get_info_facture->execute(array($idUE));

                          $fetch_facture_modele = $get_info_facture->fetch();

                      ?>


                        <div class="col-md-4">
                          <br>
                          <div class="card border border-secondary">
                            <div class="card-header bg-secondary text-white">Paramètres du document
                            </div>
                             <div class="card-body">
                              <div class="card border bg-light">
                                <div class="card-body">
                                  <label for="name-doc"><h6>Titre du document</h6></label>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/document-text.png"></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Modifier le nom du document" aria-label="Recipient's username" aria-describedby="basic-addon2" name="name-doc" id="name-doc" value="<?php
                                      if($infoart['titre_document_devis'] == '')
                                        {
                                          echo ucwords('offre de service');
                                        }
                                        else
                                        {
                                            echo ucwords($infoart['titre_document_devis']);
                                        }
                                    ?>">
                                  </div>
                                  <label>Note de bas du document</label>
                                  <textarea class="form-control" rows="3" id="note-bas-page" placeholder="Modifier la note de bas de page"><?php echo $fetch_facture_modele['note_bas_devis']; ?></textarea>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-success" id="save-name-doc">Enregistrer</button>  
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
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

          <!--pour l'impression d'un contenu-->
          <script src="../asserts/print/jQuery.print.js"></script>

          <!--Pdf Générator-->
          <script type="text/javascript" src="GeneratedPdf/jspdf.min.js"></script>
          <script type="text/javascript" src="GeneratedPdf/html2canvas.js"></script>
          <!--<script src="GeneratedPdf/PDF_Genrator.js"></script>-->

        <!--google maps-->
        <!--<script src="https://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>-->

        <script type="text/javascript">

          jQuery(document).ready(function($) 
          {
            //on signal à la barre de navigation qu'on est dans le contacts
            $('.vente').addClass('active');

             affiche_detail(); 

              function affiche_detail()
              {
                
                var idoffre = '<?php echo $idoffre; ?>';
                var devise = '<?php echo $devise; ?>';
                var idUE = '<?php echo $idUE; ?>';
                var nomE = '<?php echo $nomE; ?>';

                $.ajax({
                  type : 'POST', 
                  url  : 'fonction/detail_devis.php',
                  data : 'idoffre=' + idoffre + '&devise=' + devise + '&idUE=' + idUE +
                          '&nomE=' + nomE,
                  success:function(data)
                  {
                    $('#detail_content').html(data);
                  }
                });
              }

              $('#print_facture').click(function()
                {
                  //$('#detail_content').print();
                  var idoffre = '<?php echo $idoffre; ?>';
                  var devise = '<?php echo $devise; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';

                  //var url = $(this).attr('href');
                  //window.open('facture/pdf/facture_devis.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE + '&idoffre=' + idoffre + '&devise=' + devise, '_blank');

                  window.open('page_facture/facture_devis_pdf.php?id=' + getid + "&id_connexion=" + id_connexion + "&idEU=" + idUE + "&nom_entreprise=" + nomE + "&nom_unite_exploitation=" + nomUE + '&idoffre=' + idoffre + '&devise=' + devise, '_blank');
                });


               //lorsqu'on enregistre le nom du document et la note de bas de page 
               $('#save-name-doc').click(function()
                {
                  var name_doc = $('#name-doc').val();
                  var note_bas_page = $('#note-bas-page').val();
                  var idUE = '<?php echo $idUE; ?>';

                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'fonction/sava_info_doc_devis.php',
                      data  : 'name_doc=' + name_doc + '&note_bas_page=' + note_bas_page + '&idUE=' + idUE, 
                      success:function(data)
                      {
                        //$('#note-bas-page').val('')
                        valid3("Les informations du document ont mis à jour avec succès.");
                        affiche_detail();
                      }
                    });
                });

               //lors qu'on envoie la facture par mail 
             $('#send-facture-mail').click(function()
              {
                  var idoffre = '<?php echo $idoffre; ?>';
                  var devise = '<?php echo $devise; ?>';
                  var getid = '<?php echo $getid; ?>';
                  var id_connexion = '<?php echo $id_connexion; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var email_cli = '<?php echo $email_cli; ?>';

                  $.ajax(
                    {
                      type  : 'POST', 
                      url   : 'fonction/send_facture_devis_mail.php',
                      data  : 'idoffre=' + idoffre + '&devise=' + devise + '&getid=' + getid +
                              '&id_connexion=' + id_connexion + '&idUE=' + idUE + '&nomUE=' + nomUE + 
                              '&nomE=' + nomE,
                      success:function(data)
                      {
                        //alert(data);
                        if(data == 'main_not_send')
                        {
                          err3("Une erreur est survenue lors de l'envoie du document, veuillez réessayer plutard !");
                        }
                        else
                        {
                          valid3("Document envoyé avec succès à l'adresse émail : " + email_cli + ".");
                        }
                      }
                    });
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
