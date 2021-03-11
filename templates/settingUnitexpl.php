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

        <title>KEDIS ONLINE</title>
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
        height: 300px;
        background-color: white;
      }
      table {
        border-spacing: 0;
        width:100%;
      }

      /*td + td {
        border-left:1px solid lightgray;
      }*/
      td, th {
        /*border-bottom:1px solid lightgray;*/
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

      .settngUE
      {
        background-color: #d1ecf1;
      }
    </style>
        <!--Code PHP-->
                <?php 
                    session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idE']) AND isset($_GET['nom_entreprise']))   //si la variable id qu'on a transité existe dans l'url 
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

                      $getidE = $_GET['idE']; //on recupère l'id de l'entreprise
                      $nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise

                      $login_required = $userfos['login_required'];
                      $id_connexion = $userfos['id_connexion'];


                      if($id_connexion == $get_id_connexion)
                      {
                        //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                        if($login_required == 1)
                        {
                          //enregistrement de l'utilisateur
                          if(isset($_POST['save_user']))
                          {
                           if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['password1']) AND !empty($_POST['password2']) AND !empty($_POST['grade']))
                              {
                                $prenom = htmlspecialchars($_POST['prenom']); //On recupère le prenom de l'utilisateur avec htmlspecialchars pour éviter les insertions du code html
                                $nom = htmlspecialchars($_POST['nom']); //de même pour le nom
                                $sexe = htmlspecialchars($_POST['sexe']); //de même pour le sexe
                                $email = htmlspecialchars($_POST['email']); // de même pour l'émail 
                                $password1 = htmlspecialchars($_POST['password1']);
                                $password2 = htmlspecialchars($_POST['password2']);
                                $grade = htmlspecialchars($_POST['grade']);
                                $prenomtaille = strlen($prenom); //on rajoute une condition de taille maximal d'un prenom
                                $nomtaille = strlen($nom); //de même pour le nom 

                                if($prenomtaille <= 30) //on vérifie si le prénom ne dépassent pas 30 caractères 
                                  {
                                      if($nomtaille <= 30) //on vérifie si le nom  ne dépassent pas 30 caractères
                                      {
                                          if(preg_match("/^[a-zA-Z]+/", $prenom)) //on vérifie si le prénom est uniquement du texte en utilisant les expressions regulières preg_match
                                          {
                                              if(preg_match("/^[a-zA-Z]+/", $nom)) //de même pour le nom
                                              {
                                                  if($password1 == $password2)//on vérifie si les deux mots de passe sont égaux  
                                                  {
                                                      $passwordtaille = strlen($password1);//on récupère la taille du mot de passe
                                                      if($passwordtaille >= 8) //on vérifie si le mot de passe contient au moins 8 caractères 
                                                      {
                                                          if(preg_match("/[a-zA-Z0-9]+/", $password1))
                                                          {
                                                              $reqmail = $bdd->prepare("SELECT * FROM user WHERE email_cl = ?"); //on vérifie si le mail est déjà utilisé ou pas 
                                                              $reqmail->execute(array($email)); //exécution de la requete 
                                                              $mailexist = $reqmail->rowCount();
                                                              if($mailexist == 0) //s'il n'existe pas on continue 
                                                              {
                                                                  $longueurkey = 20; //ici nous allons définir la longueur de clé pour la confirmation du mail
                                                                  $key = ""; //ici on initialise la variable key qui contiendra toutes les clés qui sera généré pour les users 
                                                                  for($i=1;$i<$longueurkey;$i++)
                                                                  {
                                                                      $key .= mt_rand(0,9); //on génère les clés
                                                                  }

                                                                  $passwordscure = sha1($password1); //on cripte le mot de passe

                                                                  $profil = 0; //le profil reçoit 0 par défaut
                                                                  $statut = "user";

                                                                  $insertion = $bdd->prepare("INSERT INTO user(prenom_cl, nom_cl, sexe_cl, email_cl, mdp_cl, cle_cl, profil_cl, statut, profession) 
                                                                  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");//on insert les valeurs dans la base de données 
                                                                  $insertion->execute(array($prenom, $nom, $sexe, $email, $passwordscure, $key, $profil, $statut, $grade))or die (print_r($insertion->errorInfo()));

                                                                  $connectuser = $bdd->prepare("SELECT * FROM user WHERE email_cl = ? "); //on se connecte encore pour recupérer l'email enregistré 
                                                                  $connectuser->execute(array($email)); //on exécute la requette 
                                                                  $userfetch = $connectuser->fetch();

                                                                  $idUser = $userfetch['id_cl'];

                                                                  $insergest = $bdd->prepare("INSERT INTO gestion(id_user, id_E) VALUES(?,?)");
                                                                  $insergest->execute(array($idUser, $getidE));
                                                              }
                                                              else
                                                              {
                                                                  $erreur = "cette adresse email est déjà utilisé !";
                                                              }
                                                          }
                                                          else
                                                          {
                                                              $erpass1 = "";
                                                              $erreur = "le mot de passe doit contenir des lettres et des chiffres !";
                                                          }
                                                      }
                                                      else
                                                      {
                                                          $erpass1 = "";
                                                          $erreur = "le mot de passe doit contenir au moins 8 caractères !";
                                                      }
                                                  }
                                                  else
                                                  {
                                                      $erpass2 = "";
                                                      $erreur = "les deux mots de passe doivent correspondre !";
                                                  }
                                              }
                                              else
                                              {
                                                  $ernom = "";
                                                  $erreur = "Le nom saisie n'est pas valide !";
                                              }
                                          }
                                          else
                                          {
                                              $erprenom = "";
                                              $erreur = "Le prénom saisie n'est pas valide !";
                                          }
                                      } 
                                      else
                                      {
                                          $ernom = "";
                                          $erreur = "Le nom ne doit pas dépassé 30 caractères !";
                                      }
                                  }
                                  else
                                  {
                                      $erprenom = "";
                                      $erreur = "Le prénom ne doit pas dépassé 30 caractères !";
                                  }
                              }
                          }

                 ?>

           <!--on inlus la la barre de navigation au dessus-->
          <?php  include('navbar.php'); ?>
         <!--*****************************************************-->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form method="post" action="">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Ajouter un utilisateur</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                      <label for="exampleInputEmail1">Prénom</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                          </div>
                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="le prénom de l'utilisateur" value="<?php if(isset($prenom)){ echo $prenom;} ?>" name="prenom" required="">
                      </div>
                      <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Sexe</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/genre.png"></span>
                          </div>
                          <select class="custom-select" name="sexe">
                              <option selected value="Homme">Homme</option>
                              <option value="Femme">Femme</option>
                          </select>
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputEmail1">Mot de passe</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                          </div>
                          <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Lui attribuer mot de passe"  name="password1" required="">
                      </div>
                      <!--c-->
                  </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Grade</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-briefcase.png"></span>
                          </div>
                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="la grade de l'utilisateur" value="<?php if(isset($grade)){ echo $grade;} ?>" name="grade" required="">
                      </div>
                      <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                  </div>
                </div>
                <div class="col-md-6">
                   <div class="form-group">
                      <label for="exampleInputEmail1">Nom</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text " id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                          </div>
                          <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="le nom de l'utilisateur" value="<?php if(isset($nom)){ echo $nom;} ?>" name="nom" required="">
                      </div>
                      <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                  </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">E-mail</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                          </div>
                          <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="lui@exemple.com" value="<?php if(isset($email)){ echo $email;} ?>" name="email" required="">
                      </div>
                      <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                  </div>
                   <div class="form-group">
                      <label for="exampleInputEmail1">Confirmation mot de passe</label>
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/locked.png"></span>
                          </div>
                          <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Retaper le mot de passe" name="password2" required="">
                      </div>
                  </div>
                  <div class="alert alert-warning text-center" role="alert">
                    Après l'enregistrement de l'utilisateurr, n'oubliez pas de lui attribuer les accès dans la plateforme tout en cliquant sur son détail dans le tableau
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">
                <span class="step size-21">
                  <i class="icon ion-android-cancel"></i>
                </span>
                &nbsp;&nbsp;Annuler</button>
              <button type="submit" class="btn btn-primary" name="save_user"> 
                <span class="step size-21">
                  <i class="icon ion-archive"></i>
                </span>
                &nbsp;&nbsp;Enregistrer</button>
            </div>
          </form>
        </div>
      </div>
    </div>




    <div class="container-fluid">
        <div class="row">
            <!--On inclut la navigation de UE-->
            <?php include("navigationUE.php"); ?>


                 <?php 

                    if(isset($_POST['searchcatart']))
                    {
                          $libellerech = htmlspecialchars($_POST['libsearchcatart']);
                          /*juste pour afficher le cotenue dans l'inpute de recherche 
                          mais l'exécution réel se fais au dessous
                          raison pour laquelle j'ai dupluqué le if */
                    }
                ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                     <h5 class="text-left">Entreprise : <strong class="text-primary"><?php echo $nomE; ?></strong></h5>
                </div>

               <div class="card">
                  <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                      <li class="nav-item">
                        <a class="nav-link active" href="#"><strong>Gestion des utilisateurs</strong></a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#"><strong>Modifier l'entreprise</strong></a>
                      </li>
                      <li class="nav-item">
                        <button class="btn btn-outline-danger">Supprimer cette entreprise</button>
                      </li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <form method="post" action="">
                          <div class="row">
                            <div class="col-md-2">
                              <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">
                              <span class="step size-21">
                                  <i class="icon ion-ios-filing-outline"></i>
                              </span>
                                  Ajouter</button>
                            </div>
                            <div class="col-md-4">
                              <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Rechercher un utilisateur" aria-label="Recipient's username" aria-describedby="basic-addon2" name="libsearchcatart" value="<?php if(isset($libellerech)){ echo $libellerech; }?>" required="">
                                <div class="input-group-append">
                                  <button type="submit" class="btn btn-outline-info" name="searchcatart" >
                                    <span class="step size-21">
                                      <i class="icon ion-ios-search-strong"></i>
                                    </span>
                                    &nbsp;&nbsp; <!--ceci nous permet de rajouter des espaces-->
                                  </button>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-2">
                              <a class="btn btn-primary btn-block" href="settingUnitexpl.php?id=<?php echo $getid; ?>&idE=<?php echo $getidE; ?>&nom_entreprise=<?php echo $nomE; ?>">
                                <span class="step size-21">
                                  <i class="icon ion-android-refresh"></i>
                                </span>
                                Actualiser</a>
                            </div>
                            <div class="col-md-4"></div>
                          </div>
                        </form>


                      <div class="card border-info mb-3" >
                        <div class="card-header text-left"><strong><h6>Liste des utilisateurs</h6></strong></div>
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
                                          Prénom
                                          <div>Prénom</div>
                                        </th>
                                        <th>
                                          Nom
                                          <div>Nom</div>
                                        </th>
                                        <th>
                                          Adresse émail
                                          <div>Adresse émail</div>
                                        </th>
                                        <th>
                                          Grade
                                          <div>Grade</div>
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
                                        $statut = "admin";

                                        $viewch = $bdd->prepare("SELECT * FROM gestion, user WHERE prenom_cl LIKE ? AND id_E = ? AND id_user = id_cl AND statut != ?");
                                        $viewch->execute(array("$libellerech%", $getidE, $statut));
                                        $i=1;

                                        $existcat = $viewch->rowCount();

                                        if(preg_match("/^[1-9]+/", $existcat)) //on vérifie si la carégorie l'article recherché existe dans la base de donnée
                                        {
                                            while($row1 = $viewch->fetch()) 
                                            {

                                          ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td class="text-left"><?php echo $row1['prenom_cl']; ?></td>
                                                <td class="text-left"><?php echo $row1['nom_cl']; ?></td>
                                                <td class="text-left"><?php echo $row1['email_cl']; ?></td>
                                                <td class="text-left"><?php echo $row1['profession']; ?></td>
                                                <td>
                                                  <a href="viewCatArticle.php?id=<?php echo $getid;?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&idcatart=<?php echo $row['id_cat_art'];?>"><strong>Détails</strong></a>
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
                                                  <strong><?php echo $libellerech; ?></strong> n'existe pas dans la liste de vos utilisateurs
                                                </h6>
                                            </div>
                                          <?php
                                          }    
                                        }
                                        else
                                        {
                                            $statut = "admin";
                                            $view = $bdd->prepare("SELECT * FROM gestion, user WHERE id_E = ? AND id_user = id_cl AND statut != ?");
                                            $view->execute(array($getidE, $statut));
                                            $i = 1;

                                            $existallcat = $view->rowCount();

                                            if(preg_match("/^[1-9]+/", $existallcat))
                                            {
                                             while($row = $view->fetch()) 
                                              {
                                         ?>   
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td class="text-left"><?php echo $row['prenom_cl']; ?></td>
                                                <td class="text-left"><?php echo $row['nom_cl']; ?></td>
                                                <td class="text-left"><?php echo $row['email_cl']; ?></td>
                                                <td class="text-left"><?php echo $row['profession']; ?></td>
                                                <td>
                                                  <a href="viewCatArticle.php?id=<?php echo $getid;?>&idEU=<?php echo $idUE;?>&nom_entreprise=<?php echo $nomE;?>&nom_unite_exploitation=<?php echo $nomUE;?>&idcatart=<?php echo $row['id_cat_art'];?>"><strong>Détails</strong></a>
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
                                                Vous ne disposez d'aucun utilisateurs 
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

            </main>
        </div>
    </div>

        <div class="container">
            <br><br>
            >
        </div> <!-- /container -->
        <!--*****************************************************-->
        <br><br>
        
        <!-- Bootstrap JS -->

        <script src="../asserts/js/vendor/jquery-slim.min.js"></script>
        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/dropdown.js"></script>
        <script src="../dist/js/collapse.js"></script>
        <script src="../dist/js/modal.js"></script>

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
