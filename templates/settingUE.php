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

        <title>KEDIS ONLINE | Paramètres</title>
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
        height: 200px;
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

      #libsearchcatart {
        background-image: url('../icons/png/office/search.png');
        background-position: 10px 10px; 
        background-repeat: no-repeat;
        padding: 6px 12px 5px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
      }

      .settingUE
      {
        background-color: #d1ecf1;
      }
    </style>

        <!--Code PHP-->
                <?php 
                    session_start();

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']))  //si la variable id qu'on a transité existe dans l'url 
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
            <h1 class="h2">Paramètres</h1>
          </div>

              <?php  

                if(isset($_POST['searchcatart']))
                {
                  $libellerech = htmlspecialchars($_POST['libsearchcatart']);
                  /*juste pour afficher le cotenue dans l'inpute de recherche 
                  mais l'exécution réel se fais au dessous
                  raison pour laquelle j'ai dupluqué le if */
                }
              ?>

                <div class="card">
                  <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                      <li class="nav-item">
                        <a class="nav-link active" href="#"><strong>Modifier l'unité d'exploitation</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link">Supprimer cette unité d'exploitation</a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">

                  </div>
              </div>
          </div>
          
        </main>
      </div>
    </div>
        <!--*****************************************************-->
        <br><br>
    
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
        <script src="../asserts/js/toastr/toastr.min.js"></script>>

        <script type="text/javascript">
            $(function()
              {
                 affiche_monnaie();
                //ici on affiche tous les monnaies
                function affiche_monnaie()
                {
                  var getid = '<?php echo $getid; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var recherche = $('#libsearchcatart').val();
                  $.ajax({
                    type : 'POST', 
                    url  : 'fonction/affiche_monnaie.php',
                    data : 'recherche=' + recherche + '&idUE=' + idUE  + 
                            '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid,
                    success:function(data)
                    {
                      $('#table_monnaie').html(data);
                    }
                  });
                }

                //lorsqu'on recherche un article
                $('#libsearchcatart').keyup(function()
                {
                  var getid = '<?php echo $getid; ?>';
                  var idUE = '<?php echo $idUE; ?>';
                  var nomE = '<?php echo $nomE; ?>';
                  var nomUE = '<?php echo $nomUE; ?>';
                  var recherche = $('#libsearchcatart').val();
                  $.ajax({
                    type : 'POST', 
                    url  : 'fonction/rechercher_monnaie.php',
                    data : 'recherche=' + recherche + '&idUE=' + idUE  + 
                            '&nomE=' + nomE + '&nomUE=' + nomUE + '&getid=' + getid,
                    success:function(data)
                    {
                      $('#table_monnaie').html(data);
                      //alert(data);
                    } 
                  });

                });
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
