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

        <title>KEDIS ONLINE | Mes ventes</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body>
    <!--Début body-->
    <style type="text/css">

         .section1 {
          position: relative;
          padding-top: 37px;
          border: 1px solid lightgray;
          background: gray;
        }

        .container-tab1 {
          overflow-y: auto;
          background-color: white;
        }

        table {
          border-spacing: 0;
          width:100%;
        }

        td + td {
          /*border-left:1px solid lightgray;*/
        }

        #table_facture tr, 
        #table_facture th, 
        #table_facture td
        {
          border-color: white;
          border-left:1px solid lightgray;
        } 

        #table_article td + td {
          border-left:1px solid lightgray;
        }
        td, th {
          border-bottom:1px solid lightgray;
          padding: 10px 25px;
          text-align: center;
        }
        th {
          height: 0;
          line-height: 0;
          padding-top: 0;
          padding-bottom: 0;
          color: transparent;
          border: none;
          white-space: nowrap;
          text-align: center;
        }
        th div{
          position: absolute;
          background: transparent;
          color: #fff;
          padding: 9px 25px;
          top: 0;
          margin-left: -25px;
          line-height: normal;
          text-align: center;
          /*border-left: 1px solid lightgray;*/
        }
        th:first-child div{
          border: none;
          text-align: center;
        }

        /*rendre le tableau le curseur des pointer*/
        .tbody_article tr, .tbody_fac tr
        {
          cursor: pointer; transition: all .25s ease-in-out;
        }

        .tbody_article tr:hover, .tbody_fac tr:hover
        {
          background-color: #ddd;
        }

        .tbody_fac tr:active
        {
          background-color: #007bff;
        }


       .form_card
        {
          background-color: #d1ecf1;
        }

        .scrollfact
      {
        height:360px;
        width:100%;
        overflow:auto;
        border: 0.5px solid lightgray;
        background-color: white;
      }

      .div_footer
      {
        border: 1px solid lightgray;
      }

      .tr_total
      {
        background-color: lightgray;
      }
    </style>

        <!--Code PHP-->
                <?php 
                    session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['refcaise']) AND isset($_GET['prenomClient']) AND isset($_GET['nomClient'])  AND isset($_GET['mailClient']) AND isset($_GET['societeClient']) AND isset($_GET['echeance']) AND isset($_GET['idvente']) AND isset($_GET['date']))  //si la variable id qu'on a transité existe dans l'url 
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

                      $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise
                      $nomUE = $_GET['nom_unite_exploitation']; //on recupère le nom de l'UE

                      //on recupère la date d'aujourd'hui
                      setlocale(LC_TIME, 'fra_fra');
                      $date = date("Y-m-d");

                      $idUE = $_GET['idEU']; //On recupère l'id de l'unité de production

                      $refcaise = $_GET['refcaise']; //on recupère la référence de caise
                      $prenomClient = $_GET['prenomClient']; //on recupère le prénom du client
                      $nomClient = $_GET['nomClient']; //de même pour le nom
                      $mailClient = $_GET['mailClient']; //idem pour l'émail
                      $societeClient = $_GET['societeClient']; //idem pour la société;

                      $idvente = $_GET['idvente']; //on recupère l'id

                      $echeance = $_GET['echeance']; //on recupère la date de l'échéance 
                      $date = $_GET['date']; 

                  ?>

                <!--Code PHP pour insertion des articles dans lafacturation -->



         <!--*****************************************************-->
      <div class="container-fluid"> 
        <br>
        
          
             <div class="card" id="card_facture">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <img src="../logo/0.png" alt="..." class="img-thumbnail">
                  </div>
                  <div class="col-md-5"></div>
                  <div class="col-md-2">
                    <?php
                        $getPays = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                        $getPays->execute(array($idUE));

                        $fetchPays = $getPays->fetch();

                        $nompays =  $fetchPays['paysUE'];
                    ?>
                    <h6><strong><?php echo $nompays; ?></strong></h6>
                    <br>
                    <p>
                            N° Impôt
                       <br> Votre Réf </p>
                  </div>
                  <div class="col-md-2">
                    <h6><strong>&nbsp;</strong></h6>
                    <br>
                    <p>
                      :<strong></strong><br>
                      :<strong></strong>
                    </p>
                  </div>
                </div>

                <h3 class="text-center">FACTURE</h3>
                <br>

                <div class="row">
                  <div class="col-md-2">
                    <p>
                            N° client 
                        <br>Nom du client  
                        <br>Société du client
                        <br>N° de la facture  
                        <br>Date de la facture
                    </p>
                  </div>
                  <div class="col-md-4">
                    <?php
                        $getClient = $bdd->prepare("SELECT * FROM client_for_user WHERE email_cli = ? AND id_UE_cli = ? ");
                        $getClient->execute(array($mailClient, $idUE));

                        $fetchClient = $getClient->fetch();

                        $numDuClient = $fetchClient['id_cli'];
                    ?>
                    <p>
                      :&nbsp;<strong><?php echo $numDuClient; ?></strong><br>
                      :&nbsp;<strong><?php echo $prenomClient." ".$nomClient; ?></strong><br>
                      :&nbsp;<strong><?php echo $societeClient; ?></strong><br>
                      :&nbsp;<strong><?php echo $refcaise; ?></strong><br>
                      :&nbsp;<strong><?php echo $date; ?></strong>
                    </p>
                  </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-2">
                    <p>
                      Expiration
                    </p>
                  </div>
                    <div class="col-md-2">
                    <p>
                      :&nbsp;<strong><?php echo $echeance; ?></strong>
                    </p>
                  </div>
                </div>

                <section class="section1">
                  <div class="container-tab1">
                    <table id="table_facture" >
                      <thead>
                        <tr class="header">
                          <th title="Code article">
                            Code
                            <div>Code</div>
                          </th>
                          <th>
                            Description
                            <div>Description</div>
                          </th>
                          <th>
                            Quantité
                            <div>Quantité</div>
                          </th>
                          <th>
                            Prix unitaire
                            <div>Prix unitaire</div>
                          </th>
                          <th>
                            Montant hors tva
                            <div>Montant hors tva</div>
                          </th>
                          <th>
                            TVA %
                            <div>TVA %</div>
                          </th>
                          <th>
                            Montant TVA
                            <div>Montant TVA</div>
                          </th>
                          <th>
                            Montant TTC
                            <div>Montant TTC</div>
                          </th>
                        </tr>
                      </thead>
                      <tbody class="tbody_striped tbody_fac" id="tbody_fac"> 
                        <?php
                              $viewfact = $bdd->prepare("SELECT * FROM facturation_for_user WHERE id_vente_fact = ?"); 
                              $viewfact->execute(array($idvente));

                              while($rows = $viewfact->fetch()) 
                                {
                             ?>   
                                <tr title="" >
                                    <td class="text-left"><?php echo $rows['code_art_fact']; ?></td>
                                    <td class="text-left"><?php echo utf8_encode($rows['libelle_art_fact']); ?></td>
                                    <td class="text-right"><?php echo $rows['quantite_art_fact']; ?></td>
                                    <td class="text-right"><?php echo number_format($rows['prix_hors_tva_fact'], 2, '.', ''); ?></td>
                                    <td class="text-right">
                                      <?php 

                                        $montanthtva = $rows['prix_hors_tva_fact'] * $rows['quantite_art_fact'];

                                        echo number_format($montanthtva, 2, '.', '');
                                      ?> 
                                    </td>
                                    <td class="text-right">
                                      <?php echo number_format($rows['taux_tva_fact'], 2, '.', ''); ?> %
                                    </td>
                                    <td class="text-right">
                                      <?php echo number_format($rows['montant_tva_fact'], 2, '.', ''); ?> 
                                    </td>
                                    <td class="text-right">
                                      <?php 

                                        $montanttc = $rows['prix_unit_art_fat'] * $rows['quantite_art_fact'];

                                        echo number_format($montanttc, 2, '.', '');
                                      ?> 
                                    </td>
                                  </tr>
                              <?php } ?>
                                  <tr class="tr_total">
                                    <?php

                                        $totalhtva = $bdd->prepare("SELECT SUM(prix_hors_tva_fact * quantite_art_fact) AS prix_totalhtva FROM facturation_for_user WHERE id_vente_fact = ? ");
                                        $totalhtva->execute(array($idvente));

                                        $prix_totalhtva = $totalhtva->fetch();

                                        $totalhtva = number_format($prix_totalhtva['prix_totalhtva'], 2, '.', '');


                                        $total_monttva = $bdd->prepare("SELECT SUM(montant_tva_fact) AS totalmonttva FROM facturation_for_user WHERE id_vente_fact = ? ");
                                        $total_monttva->execute(array($idvente));

                                        $mont_tva_total = $total_monttva->fetch();

                                        $total_mont_tva = number_format($mont_tva_total['totalmonttva'], 2, '.', '');


                                        $totalttc = $bdd->prepare("SELECT SUM(prix_unit_art_fat * quantite_art_fact) AS prix_totalttc FROM facturation_for_user WHERE id_vente_fact = ? ");
                                        $totalttc->execute(array($idvente));

                                        $prix_totalttc = $totalttc->fetch();

                                        $totalttc = number_format($prix_totalttc['prix_totalttc'], 2, '.', '');

                                    ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="text-right"><h6><strong><?php echo $totalhtva; ?></strong></h6></td>
                                    <td></td>
                                    <td class="text-right"><h6><strong><?php echo $total_mont_tva; ?></strong></h6></td>
                                    <td class="text-right"><h6><strong><?php echo $totalttc; ?></strong></h6></td>
                                  </tr>
                      </tbody>
                    </table>
                  </div>
                </section>
                
                <br>
                <div class="row">
                  <div class="col-md-9"></div>
                  <div class="col-md-3">
                    <?php 
                      $getventemont = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_fact = ? AND id_UE_fact = ?");
                      $getventemont->execute(array($idvente, $idUE));

                      $fetchVente = $getventemont->fetch();
                      $monApayer = $fetchVente['prix_unit_fact'];
                      $paiemant_recu = $fetchVente['paiemant_recu_fact'];
                    ?>
                    <table>
                      <tbody class="table table-bordered">
                        <tr>
                          <td><h6 class="text-right"><strong>Total à payer</strong></h6></td>
                        </tr>
                        <tr>
                          <td class="table-secondary"><h6 class="text-right"><strong><?php echo number_format($monApayer, 2, '.', ''); ?></strong></h6></td>
                        </tr>
                      </tbody>
                    </table>
                    
                    
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td class="text-left">Accompte à versé</th>
                          <td class="text-right"><?php echo number_format($paiemant_recu, 2, '.', ''); ?></td>
                        </tr>
                        <tr>
                          <td class="text-left">Reste à payer</th>
                          <td class="text-right">
                            <?php 
                              $restApyer = $monApayer - $paiemant_recu; 
                              echo number_format($restApyer, 2, '.', '');
                            ?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          

          
        
      </div>
           
    </div>
  </div>
        <!--*****************************************************-->
        <br><br>
    
        <!-- Bootstrap JS -->

       <script src="../asserts/js/vendor/jquery-slim.min.js"></script>
        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/dropdown.js"></script>
        <script src="../dist/js/tab.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>
        <script src="../asserts/js/jquery/jquery-3.3.1.js"></script>
        <script src="../asserts/js/jquery/jspdf.debug.js"></script>
        <script src="../asserts/js/jquery/html2pdf.js"></script>

        <script type="text/javascript">
        var pdf = new jsPDF('p', 'cm', [297, 210]);
        var canvas = pdf.canvas;
        canvas.height = 720 * 11;
        canvas.width=720 * 8.5;

        // var width = 400;
        /*html2pdf(document.body, pdf, function(pdf) {
                var iframe = document.createElement('iframe');
                iframe.setAttribute('style','position:absolute;right:0; top:0; bottom:0; height:100%; width:100%');
                document.body.appendChild(iframe);
                iframe.src = pdf.output('datauristring');

                var div = document.createElement('pre');
                div.innerText=pdf.output();
                 document.body.appendChild(div);
            }
        );*/
  
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
