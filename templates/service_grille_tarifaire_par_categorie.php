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

        <title>KEDIS ONLINE | Ma grille tarifaire</title>
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
      .service
      {
        background-color: #d1ecf1;
      }
    </style>

        <!--Code PHP-->
                <?php 
                    session_start(); 

                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idEU']) AND isset($_GET['nom_entreprise']) AND isset($_GET['nom_unite_exploitation']) AND isset($_GET['idcat']))  //si la variable id qu'on a transité existe dans l'url 
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

                          $idcat = $_GET['idcat'];
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
            <h1 class="h2">Mes services</h1>
          </div>

              <?php  

                if(isset($_POST['addcatart']))
                {
                  if(!empty($_POST['libelleart']))
                  {
                    $libelleart = htmlspecialchars($_POST['libelleart']);

                    $insertart = $bdd->prepare("INSERT INTO sous_categorie_article(libelle_s_cat_art,  id_s_UE_art) VALUES(?, ?)");
                    $insertart->execute(array($libelleart, $idUE));
                  }
                }

                if(isset($_POST['searchcatart']))
                {
                  $libellerech = htmlspecialchars($_POST['libsearchcatart']);
                  /*juste pour afficher le cotenue dans l'inpute de recherche 
                  mais l'exécution réel se fais au dessous
                  raison pour laquelle j'ai dupluqué le if */
                }
              ?>
          
            <!--Modal pour l'insertion d'une nouvelle article-->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <form method="post" action="">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Ajouter une sous-catégorie d'articles</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-inbox.png"></span>
                          </div>
                          <input type="text" class="form-control" placeholder="Entrer le libellé de votre sous-catégorie d'articles" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libelleart" required="">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                          <span class="step size-21">
                            <i class="icon ion-android-cancel"></i>
                          </span>
                          &nbsp;&nbsp;Annuler</button>
                        <button type="submit" class="btn btn-primary" name="addcatart"> 
                          <span class="step size-21">
                            <i class="icon ion-archive"></i>
                          </span>
                          &nbsp;&nbsp;Enregistrer</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
                <!--fin du modale-->

                <div class="card">
                  <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                      <li class="nav-item">
                          <a class="nav-link" href="service.php?id=<?php echo $getid; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><strong>Mes catégories de services</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="#"><strong>Ma grille tarifaire</strong></a>
                      </li>
                    </ul>
                  </div>
                  <div class="card-body">
                          <div class="row">
                            <div class="col-md-8">
                              <div class="alert alert-info" role="alert">
                                <div class="row">
                                  <div class="col-md-3">
                                    <a class="btn btn-info btn-block" href="addService.php?id=<?php echo $getid; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>" >
                                    <span class="step size-21">
                                        <i class="icon ion-ios-filing-outline" role="button"></i>
                                    </span>
                                        Ajouter</a>
                                  </div>
                                  <div class="col-md-6">
                                    <form method="post" action="">
                                      <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Rechercher un service" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libsearchcatart" value="<?php if(isset($libellerech)){ echo $libellerech; }?>" required="">
                                        <div class="input-group-append">
                                          <button type="submit" class="btn btn-outline-info" name="searchcatart" >
                                            <span class="step size-21">
                                              <i class="icon ion-ios-search-strong"></i>
                                            </span>
                                            &nbsp;&nbsp; <!--ceci nous permet de rajouter des espaces-->
                                          </button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                  <div class="col-md-3">
                                    <a class="btn btn-primary btn-block" href="service_grille_tarifaire.php?id=<?php echo $getid; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">
                                      <span class="step size-21">
                                        <i class="icon ion-android-refresh"></i>
                                      </span>
                                      Actualiser</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <?php
                                  $reqcatart = $bdd->prepare("SELECT * FROM categorie_service WHERE id_UE_ser = ?");
                                  $reqcatart->execute(array($idUE));

                                  $reqseecat = $bdd->prepare("SELECT * FROM categorie_service WHERE id_cat_ser = ? AND id_UE_ser = ?");
                                  $reqseecat->execute(array($idcat, $idUE));

                                  $libcat =  $reqseecat->fetch();


                              ?>
                              <label>Catégorie</label>
                              <div class="dropdown show">
                                <a class="btn btn-default btn-block dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <?php echo $libcat['lib_cat_ser']; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <div class="scrollcat"> 
                                    <a class="dropdown-item" href="service_grille_tarifaire.php?id=<?php echo $getid; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Toutes</a>
                                    <?php
                                        while($categorie = $reqcatart->fetch()) 
                                        {
                                    ?>

                                    <a class="dropdown-item" href="service_grille_tarifaire_par_categorie.php?id=<?php echo $getid; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>&idcat=<?php echo $categorie['id_cat_ser']; ?>"><?php echo $categorie['lib_cat_ser']; ?></a>
                                    <?php
                                      }
                                    ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                             
                            </div>
                          </div>

                      <div class="card border-info mb-3" >
                            <div class="card-header text-left"><strong><h6>Liste de services</h6></strong></div>
                            <div class="card-body">
                              <section class="">
                                <div class="container-tab">
                                  <table>
                                    <thead>
                                      <tr class="header">
                                        <th>
                                               Code
                                          <div>Code</div>
                                        </th>
                                        <th>
                                          Description
                                          <div>Description</div>
                                        </th>
                                        <th>
                                          Catégorie
                                          <div>Catégorie</div>
                                        </th>
                                        <th>
                                          Prix HTVA
                                          <div>Prix HTVA</div>
                                        </th><th>
                                          Prix TTC
                                          <div>Prix TTC</div>
                                        </th>
                                        <th>
                                          Remarques
                                          <div>Remarques</div>
                                        </th>
                                        <th>
                                          <div></div>
                                        </th>
                                      </tr>
                                    </thead>
                                    <tbody class="tbody_striped">
                                       <?php 

                                      if(isset($_POST['searchcatart']))
                                      {
                                        $libellerech = htmlspecialchars($_POST['libsearchcatart']); //on recupère l'inpute pour faire la recherche

                                        $viewch = $bdd->prepare("SELECT * FROM service_for_user WHERE lib_ser LIKE ? AND id_UE_ser = ?");
                                        $viewch->execute(array("$libellerech%", $idUE));

                                        $i=1;

                                        $existcat = $viewch->rowCount();

                                        if(preg_match("/^[1-9]+/", $existcat)) //on vérifie si la carégorie l'article recherché existe dans la base de donnée
                                        {

                                          while($row1 = $viewch->fetch()) 
                                          {

                                          ?>
                                            <tr>
                                                <td><?php echo $row1['code_ser']; ?></td>
                                                 <td class="text-left"><?php echo $row1['lib_ser']; ?>
                                                </td>
                                                <td class="text-left"><?php echo utf8_encode($row1['cat_ser']); ?>
                                                </td>
                                                <td class="text-right"><?php echo number_format($row1['prix_HTVA_ser'], 2, ',', ''); ?>
                                                </td>
                                                <td class="text-right"><?php echo number_format($row1['prix_TTC_ser'], 2, ',', ''); ?>
                                                </td>
                                                <td class="text-left"><?php echo utf8_encode($row1['remarque_ser']); ?>
                                                <td>
                                                  <a href="viewService.php?id=<?php echo $getid;?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&idser=<?php echo $row1['id_ser'];?>" ><strong>Détails</strong></a>
                                                </td>
                                              </tr>
                                          <?php 
                                              }
                                          }
                                          else// si la catégorie n'existe pas on affiche un erreur
                                          {
                                          ?>
                                              <div class="alert alert-warning" role="alert">
                                                <h6 class="text-center">
                                                  <strong><?php echo $libellerech; ?></strong> n'existe pas dans la liste de vos services
                                                </h6>
                                              </div>
                                          <?php
                                          }    
                                        }
                                        else
                                        {
                                          $view = $bdd->prepare("SELECT * FROM service_for_user WHERE id_cat_serv = ? AND id_UE_ser = ?");
                                          $view->execute(array($idcat, $idUE));
                                          $i = 1;

                                          $existallcat = $view->rowCount();

                                          if(preg_match("/^[1-9]+/", $existallcat))
                                          {
                                            while($row = $view->fetch()) 
                                            {
                                         ?>   
                                            <tr>
                                                <td><?php echo $row['code_ser']; ?></td>
                                                <td class="text-left"><?php echo utf8_encode($row['lib_ser']); ?></td>
                                                <td class="text-left"><?php echo utf8_encode($row['cat_ser']); ?>
                                                </td>
                                                <td class="text-right"><?php echo number_format($row['prix_HTVA_ser'], 2, ',', ''); ?>
                                                </td>
                                                <td class="text-right"><?php echo number_format($row['prix_TTC_ser'], 2, ',', ''); ?>
                                                </td>
                                                <td class="text-left"><?php echo utf8_encode($row['remarque_ser']); ?>
                                                </td>
                                                <td>
                                                  <a href="viewService.php?id=<?php echo $getid;?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&idser=<?php echo $row['id_ser'];?>"><strong>Détails</strong></a>
                                                </td>
                                              </tr>
                                          <?php 
                                            } 
                                          }
                                          else
                                        {
                                          ?>
                                            <div class="alert alert-warning" role="alert">
                                              <h6 class="text-center">
                                                Vous ne disposez d'aucun service de cette catégorie
                                              </h6>
                                            </div>
                                        <?php
                                        }   
                                      }?> 
                                    </tbody>
                                  </table>
                                </div>
                              </section>
                             
                            </div>
                          </div>
                      </div>
                </div>
          </div>
          
        </main>
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

        <script type="text/javascript">
            //ce script nous permet d'afficher la date fin et debut du mois dans le champ date
            var datedebut = document.getElementById("datedebut");
            var datefin = document.getElementById("datefin");
      
            datedebut.value = "<?php echo $datedebut; ?>";
            datefin.value = "<?php echo $datefin; ?>";
      
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
