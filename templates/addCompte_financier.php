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

        <title>KEDIS ONLINE | Ajouter un moyen de paiementr</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body>
    <!--Début body-->
      <style type="text/css">
        .form_card
        {
          background-color: #d1ecf1;
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


                          //on recupère la devise de l'UE
                          $getDevise = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
                          $getDevise->execute(array($idUE));
                          $fetchDevise = $getDevise->fetch();
                          $devise = $fetchDevise['deviseUE'];
                  ?>

                <!--Code PHP-->

                <?php

                if(isset($_POST['save_cmp']))
                {
                  $lib_cmp = htmlspecialchars($_POST['lib_cmp']);
                  $devise_cmp = htmlspecialchars($_POST['devise_cmp']);
                  $nom_inst_cmp = htmlspecialchars($_POST['nom_inst_cmp']); 
                  $iban_cmp = htmlspecialchars($_POST['iban_cmp']); 
                  $num_cmp = htmlspecialchars($_POST['num_cmp']);
                  $bic_cmp = htmlspecialchars($_POST['bic_cmp']);
                  $gest_neg_cmp = htmlspecialchars($_POST['gest_neg_cmp']);

                  if(!empty($_POST['lib_cmp']))
                  {
                    if(!empty($_POST['nom_inst_cmp']))//si le nom de l'institution bancaire != vide alors il faut remplire d'autres champs restants aussi
                    {
                      if(!empty($_POST['iban_cmp']))
                      {
                        if(!empty($_POST['num_cmp']))
                        {
                          if(!empty($_POST['bic_cmp']))
                          {
                            $insertcmp1 = $bdd->prepare("INSERT INTO compte_financier(lib_cmp, devise_cmp, nom_inst_cmp, iban_cmp, num_cmp, bic_swiff_cmp, gestion_negatif_cmp, id_UE_cmp) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
                            $insertcmp1->execute(array($lib_cmp, $devise_cmp, $nom_inst_cmp, $iban_cmp, $num_cmp, $bic_cmp, $gest_neg_cmp, $idUE));

                             header("location:compte_finacier.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE);
                          }
                          else
                          {
                            $erreurbic = "";
                            $erreur = "Veuillez renseigner le BIC ou le Swiff S.V.P !";
                          }
                        }
                        else
                        {
                          $erreurcompte = "";
                          $erreur = "Veuillez renseigner le numéro de compte S.V.P !";
                        }
                      }
                      else
                      {
                        $erreuriban = "";
                        $erreur = "Veuillez renseigner l'Iban S.V.P !";
                      }
                    }
                    else
                    {
                      //on enregistre directement 
                      $insertcmp2 = $bdd->prepare("INSERT INTO compte_financier(lib_cmp, devise_cmp, gestion_negatif_cmp, id_UE_cmp) VALUES(?, ?, ?, ?)");
                      $insertcmp2->execute(array($lib_cmp, $devise_cmp, $gest_neg_cmp, $idUE));

                      header("location:compte_finacier.php?id=".$getid."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE);
                    }
                  }
                }

            ?>



    <!--on inlus la la barre de navigation au dessus-->
          <?php  include('navbar.php'); ?>

         <!--*****************************************************-->
         <div class="container-fluid">
          <div class="row">
            <!--on inlus la navigation du menu -->
            <?php include('navigation.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
              <h1 class="h2">Mes moyens de paiement</h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <a class="btn btn-sm btn-outline-info" href="compte_finacier.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>" role="button" title="RETOUR A LA PAGE PRECEDENTE">
                  <span class="step size-32">
                      <i class="icon ion-arrow-left-a"></i>
                  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </div>
            </div>
            
            <form method="post" action="" class="myForm">
              <div class="card border-secondary">
                <div class="card-header text-white bg-secondary">
                  <h6><strong>Ajouter un moyens de paiement</strong></h6>
                </div>
                <div class="card-body form_card">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Libellé</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Libellé moyen de paiement" required name="lib_cmp" value="<?php if(isset($lib_cmp)){ echo $lib_cmp; }?>">
                        </div>
                        <?php

                          $getOtherm = $bdd->prepare("SELECT * FROM devise WHERE id_UE_dev = ?");
                          $getOtherm->execute(array($idUE));

                        ?>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Devise</label>
                          <select class="custom-select" name="devise_cmp">
                              <option value="<?php echo $devise; ?>" selected><?php echo $devise; ?></option>
                            <?php 
                              while($dev = $getOtherm->fetch()) 
                              {
                            ?>
                              <option value="<?php echo $dev['devise_dev']; ?>">
                                <?php echo $dev['devise_dev']; ?> (<?php echo $dev['libelle_dev']; ?>)
                              </option>
                            <?php
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nom de l'institution (si banque)</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez le nom de l'institution" name="nom_inst_cmp" value="<?php if(isset($nom_inst_cmp)){ echo $nom_inst_cmp; }?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Numéro de compte (si banque)</label>
                          <input type="text" class="form-control <?php if(isset($erreurcompte)){ echo 'is-invalid'; }?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez le numéro de compte" name="num_cmp" value="<?php if(isset($num_cmp)){ echo $num_cmp; }?>">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Iban (si banque))</label>
                          <input type="text" class="form-control <?php if(isset($erreuriban)){ echo 'is-invalid'; }?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez l'Iban" name="iban_cmp" value="<?php if(isset($iban_cmp)){ echo $iban_cmp; }?>">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">BIC/Swiff (si banque)</label>
                          <input type="text" class="form-control <?php if(isset($erreurbic )){ echo 'is-invalid'; }?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez le BIC/Swiff" name="bic_cmp" value="<?php if(isset($bic_cmp)){ echo $bic_cmp; }?>">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Gestion des négatifs</label>
                          <select class="custom-select" name="gest_neg_cmp">
                            <option value="Oui" selected>Oui</option>
                            <option value="Non">Non</option>
                          </select>
                          <small id="emailHelp" class="form-text text-muted"><strong>La caise ne peut pas être négative</strong></small>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="card-footer text-muted">
                  <div class="row">
                    <div class="col-md-3">
                      <button type="submit" class="btn btn-primary" name="save_cmp">
                          <span class="step size-21">
                            <i class="icon ion-android-done"></i>
                          </span>
                            &nbsp;&nbsp;&nbsp;Enregistrer
                      </button>
                      <a class="btn btn-danger" href="compte_finacier.php?id=<?php echo $getid; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>" role="button">
                          <span class="step size-21">
                            <i class="icon ion-ios-undo"></i>
                          </span>
                            &nbsp;&nbsp;&nbsp;Annuler</a>
                    </div>
                    <div class="col-md-9">
                      <?php  
                          if(isset($erreur))
                          {
                      ?>
                          <div class="alert alert-danger" role="alert">
                            <?php echo $erreur; ?>
                          </div>
                      <?php }?>
                    </div>
                  </div>
                </div>

              </div>
            </form>
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
        <script src="../asserts/js/canvasjs.min.js"></script>

        <script src="//asserts/js/jquery/jquery-3.3.1.js"></script>
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
