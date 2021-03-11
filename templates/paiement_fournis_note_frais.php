<!doctype html>
<!--Début html-->
<html lang="fr">
<!--Début html-->
    <head>
    <!--Début head-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../asserts/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../asserts/css/dashboard.css" >

        <!--Style personnel-->
        <link rel="stylesheet" href="../asserts/css/style.css" >
        
        <!--Chargement des styles pour les icones des reseaux socio-->
        <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <link rel="stylesheet" href="../asserts/css/docs.css" >
        <link rel="stylesheet" href="../asserts/css/font-awesome.css" >

         <!--chargement des icones-->
        <link href="../icons/css/ionicons.css" rel="stylesheet" type="text/css" />
        <link href="../icons/css/iconstyles.css" rel="stylesheet" type="text/css" />

         <!--css toast message-->
        <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">

        <title>KEDIS ONLINE | Paiement fournisseur</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body>
    <!--Début body-->
    <style type="text/css">
        section {
        position: relative;
        padding-top: 37px;
         border: 1px solid lightgray;
        background: #17a2b8;
      }
      section.positioned {
        position: absolute;
        top:100px;
        left:100px;
        width:800px;
        box-shadow: 0 0 15px #333;
      }
      .container-tab {
        overflow-y: auto;
        height: 350px;
        background-color: white;
      }

      .container-tab2
      {
        overflow-y: auto;
        height: 180px;
        background-color: white;
      }

      table {
        border-spacing: 0;
        width:100%;
      }

      td + td {
        border-left:1px solid lightgray;
      }
      td, th {
        border-bottom:1px solid lightgray;
        /*background:  #d1ecf1;*/
        padding: 10px 25px;
      }
      tr:nth-child(even) {background-color: #d1ecf1;}
      tr:hover{ background-color: #F1F1F1;  }
      th {
        height: 0;
        line-height: 0;
        padding-top: 0;
        padding-bottom: 0;
        color: transparent;
        border: none;
        white-space: nowrap;
      }
      th div{
        position: absolute;
        background: transparent;
        color: #fff;
        padding: 9px 25px;
        top: 0;
        margin-left: -25px;
        line-height: normal;
        /*border-left: 1px solid lightgray;*/
      }
      th:first-child div{
        border: none;
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

      .form_card
        {
          background-color: #d1ecf1;
        }

         .body-modal-article
        {
          overflow-y: auto;
          height: 485px;
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

      .finance
      {
        background-color: #d1ecf1;
      }
    </style>

        <!--Code PHP-->
                <?php 
                    session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['id_cmp']))  //si la variable id qu'on a transité existe dans l'url 
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

                          //on recupère la date debut du mois
                          $datedebut = date("Y-m-d", mktime(0,0,0,date("m"),1,date("Y")));
                          //on recupère la date fin du mois
                          $datefin = date("Y-m-d", mktime(0,0,0,date("m")+1,0,date("Y")));

                          $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production

                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];

                          $id_cmp = $_GET['id_cmp'];

                          $reqfournis = $bdd->prepare("SELECT * FROM compte_financier WHERE id_cmp = ?");
                          $reqfournis->execute(array($id_cmp));

                          $infofournis = $reqfournis->fetch();

                  ?>
                <!--Code PHP-->

        <!--on inlus la la barre de navigation au dessus-->
          <?php  include('navbar.php'); ?>

         <!--*****************************************************-->
         <div class="container-fluid">
          <div class="row">
           <!--on inlus la navigation du menu -->
            <?php include('navigation.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Paiement fournisseur <span class="badge badge-secondary"><?php echo $infofournis['lib_cmp']; ?></span></h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a class="btn btn-sm btn-outline-info" href="viewComptfin.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&id_cmp=<?php echo $id_cmp; ?>" role="button" title="RETOUR A LA PAGE PRECEDENTE">
                  <span class="step size-32">
                      <i class="icon ion-arrow-left-a"></i>
                  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </div>
          </div>

    

                <div class="card">
                   <h6 class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                      <li class="nav-item">
                        <a class="nav-link" href="paiement_fournis.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&id_cmp=<?php echo $id_cmp; ?>"><strong>Factures</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="paiement_fournis_note_credit.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&id_cmp=<?php echo $id_cmp; ?>"><strong>Notes de crédit</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="#"><strong>Notes de frais/dépense</strong></a>
                      </li>
                    </ul>
                  </h6>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="row">
                          
                          <div class="col-md-6">
                            <form method="post" action="">
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rechercher une dépense à payer" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libsearchcatart" id="libsearchcatart">
                              </div>
                            </form>
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                      </div>
                    </div>

                      <div class="card border-info mb-3" >
                            <div class="card-header text-left"><strong><h6>Liste des dépenses à payer</h6></strong></div>
                            <div class="card-body">
                              <section class="">
                                <div class="container-tab">
                                  <table>
                                    <thead>
                                      <tr class="header">
                                        <th>
                                               N°
                                          <div>N°</div>
                                        </th>
                                        <th>
                                          Désignation
                                          <div>Désignation</div>
                                        </th>
                                        <th>
                                          Date Dépense
                                          <div>Date Dépense</div>
                                        </th>
                                        <th>
                                          Fournisseur
                                          <div>Fournisseur</div>
                                        </th>
                                        <th>
                                          Montant (<?php echo $devise;?>)
                                          <div>Montant (<?php echo $devise; ?>)</div>
                                        </th>
                                        <th>
                                          Gestionnaire
                                          <div>Gestionnaire</div>
                                        </th>
                                        <th>
                                          <div></div>
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody class="tbody_striped" id="facture_a_payer">
                                       
                                    </tbody>
                                  </table>
                                </div>
                              </section>
                             
                            </div>
                          </div>
                      </div>
                </div>
          </div>


          <!-- Modal détail facture à payer -->
          <div class="modal fade" id="detail-facture" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header badge-secondary text-white">
                  <h6 class="modal-title" id="exampleModalLabel">Détail dette fournisseur <label class="text-secondary" id="idachat">0</label> <label class="text-secondary"  id="dette_initial">0</label></h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="apercu_dette">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  <button type="button" class="btn btn-primary" id="solder_facture">Solder</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal détail facture à payer -->

           <!-- Modal détail new échance -->
          <div class="modal fade" id="echance_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header badge-secondary text-white">
                  <h6 class="modal-title" id="exampleModalLabel">Echéance dette <label class="text-secondary" id="id_echeance">0</label></h6>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="body_new_echeance">
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  <button type="button" class="btn btn-primary" id="change_echeance">Enregistrer</button>
                </div>
              </div>
            </div>
          </div>
          <<!-- Modal détail new échance -->
          
        </main>
      </div>
    </div>
        <!--*****************************************************-->
        <br><br>

         <!--chat discusion-->
       <?php  include('chat_discution.php'); ?>
    
        <!-- Bootstrap JS -->

       <!--<script src="../asserts/js/vendor/jquery-slim.min.js"></script>-->
        <script src="../asserts/js/jquery/jquery.min.js"></script>

        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/dropdown.js"></script>
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>

        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>
        
        <script type="text/javascript">
        $(function()
          {

            affiche_facture_apayer();

            function affiche_facture_apayer()
            {
              var idUE = '<?php echo $idUE; ?>';
              var devise = '<?php echo $devise; ?>';
              var id_cmp = '<?php echo $id_cmp; ?>';

              $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/affiche_depense_fournisseur.php',
                  data  : 'idUE=' + idUE + '&devise=' + devise + '&id_cmp=' + id_cmp,
                  success:function(data)
                  {
                    $('#facture_a_payer').html(data);
                  }
                });
            }


            //cette fonction nous permet de solder la facture
            $('#solder_facture').click(function()
            {
              var Montpaye = $('#Montpaye').val();
              var id_cmp = '<?php echo $id_cmp; ?>';
              var autre_devise = $('#autre_devise').val();
              var dette_initial = $('#dette_initial').text(); 
              var idachat = $('#idachat').text();
              var idUE = '<?php echo $idUE; ?>';
              //var id_four = '<?php /*echo $id_four; */?>';
              var getid = '<?php echo $getid; ?>';
              var num_cmp_cli = $('#num_cmp_cli').val();

             

              if(Montpaye != '')
              {
                if(/^[0-9]+[.][0-9]+/.test(Montpaye) || /^[0-9]+/.test(Montpaye))
                {
                  $.ajax(
                      {
                          type  : 'POST',
                          url   : 'fonction/get_equivelent_devise.php',
                          data  : 'autre_devise=' + autre_devise,
                          success:function(data)
                          {
                            var equiv = data;
                            var montant = Montpaye / equiv;
                            var resteApayer = dette_initial - montant;

                             //alert(dette_initial);

                             //on vérifie si le compte financier possède un numéro de compte pour le saisir
                             $.ajax(
                              {
                                type  : 'POST',
                                url   : 'fonction/get_num_compte.php',
                                data  : 'id_cmp=' + id_cmp,
                                success:function(donnee)
                                {
                                  if(donnee == 1)
                                    {
                                      if(resteApayer < 0)
                                      {
                                        $('#Montpaye').addClass('is-invalid');
                                        err3('Le montant payé ne peut pas être supérieur à dette de la dépense');
                                      }
                                      else
                                      {
                                        $.ajax(
                                            {
                                              type  : 'POST',
                                              url   : 'fonction/verif_total_encaissement.php',
                                              data  : 'id_cmp=' + id_cmp + '&taux_echange=' + montant + '&idUE=' + idUE,
                                              success:function(info)
                                              {
                                                if(info != 1)
                                                {
                                                  $.ajax(
                                                    {
                                                      type  : 'POST', 
                                                      url   : 'fonction/solder_Notefrais.php',
                                                      data  : 'id_fr=' + idachat + '&montant=' + montant +
                                                            '&id_cmp=' + id_cmp + '&autre_devise=' + autre_devise + 
                                                            '&idUE=' + idUE + '&resteApayer=' + resteApayer + 
                                                            '&getid=' + getid + '&num_cmp_cli=' + num_cmp_cli,
                                                      success:function(data)
                                                      {
                                                        //alert(data);
                                                        affiche_facture_apayer();
                                                        $('#Montpaye').removeClass('is-invalid');
                                                        $('#Montpaye').val('');
                                                        $('#detail-facture').modal('hide');
                                                        $('#num_cmp_cli').removeClass('is-invalid');
                                                        $('#num_cmp_cli').val('');
                                                        valid3('Paiement effectué avec succès');
                                                      }
                                                    });
                                                  }
                                                  else
                                                  {
                                                    err3("Impossible d'effectuer un décaissement car ce mode de paiement ne peut être négatif !");
                                                    $('#Montpaye').addClass('is-invalid');
                                                  }
                                              }
                                            });
                                      }
                                    }
                                    else
                                    {
                                      //le mode de paiement contient un numéro de compte
                                      if(num_cmp_cli != '')
                                      {
                                        if(resteApayer < 0)
                                        {
                                          $('#Montpaye').addClass('is-invalid');
                                          err3('Le montant payé ne peut pas être supérieur à dette de la dépense');
                                        }
                                        else
                                        {
                                          $.ajax(
                                            {
                                              type  : 'POST',
                                              url   : 'fonction/verif_total_encaissement.php',
                                              data  : 'id_cmp=' + id_cmp + '&taux_echange=' + montant + '&idUE=' + idUE,
                                              success:function(info)
                                              {
                                                if(info != 1)
                                                {
                                                  $.ajax(
                                                    {
                                                      type  : 'POST', 
                                                      url   : 'fonction/solder_Notefrais.php',
                                                      data  : 'id_fr=' + idachat + '&montant=' + montant +
                                                            '&id_cmp=' + id_cmp + '&autre_devise=' + autre_devise + 
                                                            '&idUE=' + idUE + '&resteApayer=' + resteApayer + 
                                                            '&getid=' + getid + '&num_cmp_cli=' + num_cmp_cli,
                                                      success:function(data)
                                                      {
                                                        //alert(data);
                                                        affiche_facture_apayer();
                                                        $('#Montpaye').removeClass('is-invalid');
                                                        $('#Montpaye').val('');
                                                        $('#detail-facture').modal('hide');
                                                        $('#num_cmp_cli').removeClass('is-invalid');
                                                        $('#num_cmp_cli').val('');
                                                        valid3('Paiement effectué avec succès');
                                                      }
                                                    });
                                                  }
                                                  else
                                                  {
                                                    err3("Impossible d'effectuer un décaissement car ce mode de paiement ne peut être négatif !");
                                                    $('#Montpaye').addClass('is-invalid');
                                                  }
                                              }
                                            });
                                        }
                                      }
                                      else
                                      {
                                        //si le numéro de compte n'est pas saisie
                                        $('#num_cmp_cli').addClass('is-invalid');
                                        err3('Veuillez saisir le numéro de compte du fournisseur S.V.P !');
                                      }
                                    }
                                }
                              });
                          }
                      });
                }
                else
                {
                  $('#Montpaye').addClass('is-invalid');
                  err3('Le montant à payer est invalide !');
                }
              }
              else
              {
                $('#Montpaye').addClass('is-invalid');
                err3('Veuillez saisir le montant à payer S.V.P !');
              }
            });

            

             $('#libsearchcatart').keyup(function()
              {
                var idUE = '<?php echo $idUE; ?>';
                var devise = '<?php echo $devise; ?>';
                var id_cmp = '<?php echo $id_cmp; ?>';;
                var recherche = $('#libsearchcatart').val();

                $.ajax(
                {
                  type  : 'POST',
                  url   : 'fonction/rechercher_depense_fournisseur.php',
                  data  : 'idUE=' + idUE + '&devise=' + devise + '&id_cmp=' + id_cmp + 
                           '&recherche=' + recherche,
                  success:function(data)
                  {
                    $('#facture_a_payer').html(data);
                  }
                });
              });






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

          }
        );
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
