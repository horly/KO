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

        <title>KEDIS ONLINE | Contacts</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body>
    <!--Début body-->
    <style type="text/css">
     .contact
      {
        background-color: #d1ecf1;
      }

      .card
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
                  ?>

                <!--Code PHP-->

                <?php

                if(isset($_POST['savefour']))
                {
                  //le nom, le prénom et le téléphone pour un client, c'est obligatoire mais le reste c'est optionnel
                  if(!empty($_POST['prenomfour']) AND !empty($_POST['nomfour']) AND !empty($_POST['emailfour']) AND !empty($_POST['telfour']) AND !empty($_POST['socfour']) AND !empty($_POST['adressfour']) AND !empty($_POST['villefour']) AND !empty($_POST['depfour']))
                    {
                      $prenomfour = htmlspecialchars($_POST['prenomfour']);
                      $nomfour = htmlspecialchars($_POST['nomfour']);
                      $emailfour = htmlspecialchars($_POST['emailfour']);
                      $telfour = htmlspecialchars($_POST['telfour']);
                      $faxfour = htmlspecialchars($_POST['faxfour']);
                      $socfour = htmlspecialchars($_POST['socfour']);
                      $tvafour = htmlspecialchars($_POST['tvafour']);
                      $postalefour = htmlspecialchars($_POST['postalefour']);
                      $adressfour = htmlspecialchars($_POST['adressfour']);
                      $villefour = htmlspecialchars($_POST['villefour']);
                      $paysfour = htmlspecialchars($_POST['paysfour']);
                      $depfour = htmlspecialchars($_POST['depfour']);

                      $prenomtaille = strlen($prenomfour); //on recupère la longueur du nom du client
                      $nomtaille = strlen($nomfour); // de même pour le nom du client
                      if($prenomtaille <= 30)
                      {
                        if($nomtaille <= 30)
                        {
                          if(preg_match("/^[a-zA-Z]+/", $prenomfour))
                          {
                            if(preg_match("/^[a-zA-Z]+/", $nomfour))
                            {
                              if(preg_match("/^[0-9]+/", $telfour))
                              {
                                if(preg_match("/^[0-9]+/", $faxfour))
                                {
                                  if(preg_match("/^[0-9]+/", $postalefour))
                                  {
                                      $insertfour = $bdd->prepare("INSERT INTO fournis_for_user(prenom_four, nom_four, email_four, tel_four, code_post_four, societe_four, tva_four, adresse_four, ville_four, pays_four, departement_four, idUE_four, fax_four) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                                      $insertfour->execute(array($prenomfour, $nomfour, $emailfour, $telfour, $postalefour, $socfour, $tvafour, $adressfour, $villefour, $paysfour, $depfour, $idUE, $faxfour)) or die (print_r($insertfour->errorInfo()));

                                      header("location:fournisseur.php?id=".$getid.'&id_connexion='.$id_connexion."&idEU=".$idUE."&nom_entreprise=".$nomE."&nom_unite_exploitation=".$nomUE);
                                  }
                                  else 
                                  {
                                    $erpostalfour = "";
                                    $erreur = "Le code postale du fournisseur saisie n'est pas valide !";
                                  }
                                }
                                else
                                {
                                  $erfaxfour = "Le fax du fournisseur saisie n'est pas valide !";
                                }
                              }
                              else
                              {
                                $ertelfour = "";
                                $erreur = "Le numéro de téléphone du fournisseur saisie n'est pas valide !";
                              }
                            }
                            else
                            {
                              $ernomfour = "";
                              $erreur = "Le nom du fournisseur saisie n'est pas valide !";
                            }
                          }
                          else
                          {
                            $erprenomfour = "";
                            $erreur = "Le prénom du fournisseur saisie n'est pas valide !";
                          }
                        }
                        else
                        {
                          $ernomfour = "";
                          $erreur = "Le nom du fournisseur ne doit pas dépassé 30 caractères !";
                        }
                      }
                      else
                      {
                        $erprenomfour = "";
                        $erreur = "Le nom du fournisseur ne doit pas dépassé 30 caractères !";
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
            <h1 class="h2">Mes contacts</h1>
             <div class="btn-toolbar mb-2 mb-md-0">
                <a class="btn btn-sm btn-outline-info" href="fournisseur.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>" role="button" title="RETOUR A LA PAGE PRECEDENTE">
                  <span class="step size-32">
                      <i class="icon ion-arrow-left-a"></i>
                  </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </div>
          </div>
            <form method="post" action="">
                <div class="card border-secondary mb-3">
                  <div class="card-header text-white bg-secondary"><h6><strong>Ajouter un fournisseur</strong></h6></div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Société</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/briefcase.png"></span>
                                </div>
                                <input type="text" class="form-control <?php if(isset($ersocfour)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nom de la société du fournisseur" value="<?php if(isset($socfour)){ echo $socfour;} ?>" name="socfour" required="">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Contact Prénom</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                              </div>
                              <input type="text" class="form-control <?php if(isset($erprenomfour)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Prénom du contact fournisseur" value="<?php if(isset($prenomfour)){ echo $prenomfour;} ?>" name="prenomfour" required="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Adresse email</label>
                          <div class="input-group mb-3">
                             <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-mail.png"></span>
                              </div>
                              <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Adresse email du fournisseur" value="<?php if(isset($emailfour)){ echo $emailfour;} ?>" name="emailfour" required="">
                          </div>
                        </div>

                       
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Adresse :</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" placeholder="Adresse du fournisseur" name="adressfour" required=""></textarea>
                        </div>

                      </div>
                      
                      <div class="col-md-6">
                         <div class="form-group">
                          <label for="exampleInputEmail1">N° Entreprise ou TVA</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/checkmark-circled.png"></span>
                              </div>
                              <input type="text" class="form-control <?php if(isset($ertvafour)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro TVA de la société du fournisseur" value="<?php if(isset($tvafour)){ echo $tvafour;} ?>" name="tvafour" required="">
                          </div>
                        </div>
                       
                        <div class="form-group">
                          <label for="exampleInputEmail1">Contact Nom</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/person.png"></span>
                              </div>
                              <input type="text" class="form-control <?php if(isset($ernomfour)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nom du contact fournisseur" value="<?php if(isset($nomfour)){ echo $nomfour;} ?>" name="nomfour" required="">
                          </div>
                        </div>

                         <div class="form-group">
                          <label for="exampleInputEmail1">Téléphone</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-call.png"></span>
                              </div>
                              <input type="text" class="form-control <?php if(isset($ertelfour)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le numéro téléphone du fournisseur" value="<?php if(isset($telfour)){ echo $telfour;} ?>" name="telfour" required="">
                          </div>
                        </div>


                        <div class="form-group">
                          <label for="exampleInputEmail1">Code postale</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-email-outline.png"></span>
                              </div>
                              <input type="text" class="form-control <?php if(isset($erpostalfour)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le code postale du fournisseur" value="<?php if(isset($postalefour)){ echo $postalefour;} ?>" name="postalefour" required="">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ville</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
                                </div>
                                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville du fournisseur" value="<?php if(isset($villefour)){ echo $villefour;} ?>" name="villefour" required="">
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Département / Etat / Province</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-system-home.png"></span>
                              </div>
                              <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le département du fournisseur" value="<?php if(isset($depfour)){ echo $depfour;} ?>" name="depfour" >
                          </div>
                        </div>

                      </div>
                      <div class="col-md-6">

                        <div class="form-group">
                          <label for="exampleInputEmail1">Fax</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/document-text.png"></span>
                              </div>
                              <input type="text" class="form-control <?php if(isset($erfaxfour)){echo 'is-invalid';} ?>" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Le Fax du fournisseur" value="<?php if(isset($faxfour)){ echo $faxfour;} ?>" name="faxfour" required="">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Pays</label>
                          <div class="input-group mb-3">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                              </div>
                              <select class="custom-select" name="paysfour">
                                  <option value="Congo République Démocratique" selected="selected">Congo République Démocratique </option>
                                  <option value="Afghanistan">Afghanistan </option>
                                  <option value="Afrique Centrale">Afrique Centrale </option>
                                  <option value="Afrique du Sud">Afrique du Sud </option> 
                                  <option value="Albanie">Albanie </option>
                                  <option value="Algerie">Algerie </option>
                                  <option value="Allemagne">Allemagne </option>
                                  <option value="Andorre">Andorre </option>
                                  <option value="Angola">Angola </option>
                                  <option value="Anguilla">Anguilla </option>
                                  <option value="Arabie Saoudite">Arabie Saoudite </option>
                                  <option value="Argentine">Argentine </option>
                                  <option value="Armenie">Armenie </option> 
                                  <option value="Australie">Australie </option>
                                  <option value="Autriche">Autriche </option>
                                  <option value="Azerbaidjan">Azerbaidjan </option>

                                  <option value="Bahamas">Bahamas </option>
                                  <option value="Bangladesh">Bangladesh </option>
                                  <option value="Barbade">Barbade </option>
                                  <option value="Bahrein">Bahrein </option>
                                  <option value="Belgique">Belgique </option>
                                  <option value="Belize">Belize </option>
                                  <option value="Benin">Benin </option>
                                  <option value="Bermudes">Bermudes </option>
                                  <option value="Bielorussie">Bielorussie </option>
                                  <option value="Bolivie">Bolivie </option>
                                  <option value="Botswana">Botswana </option>
                                  <option value="Bhoutan">Bhoutan </option>
                                  <option value="Boznie Herzegovine">Boznie Herzegovine </option>
                                  <option value="Bresil">Bresil </option>
                                  <option value="Brunei">Brunei </option>
                                  <option value="Bulgarie">Bulgarie </option>
                                  <option value="Burkina Faso">Burkina Faso </option>
                                  <option value="Burundi">Burundi </option>

                                  <option value="Caiman">Caiman </option>
                                  <option value="Cambodge">Cambodge </option>
                                  <option value="Cameroun">Cameroun </option>
                                  <option value="Canada">Canada </option>
                                  <option value="Canaries">Canaries </option>
                                  <option value="Cap vert">Cap Vert </option>
                                  <option value="Chili">Chili </option>
                                  <option value="Chine">Chine </option> 
                                  <option value="Chypre">Chypre </option> 
                                  <option value="Colombie">Colombie </option>
                                  <option value="Comores">Colombie </option>
                                  <option value="République du Congo">République du Congo </option>
                                  <option value="Congo République Démocratique">Congo République Démocratique</option>
                                  <option value="Cook">Cook </option>
                                  <option value="Corée du Nord">Corée du Nord </option>
                                  <option value="Corée du Sud">Corée du Sud </option>
                                  <option value="Costa Rica">Costa Rica </option>
                                  <option value="Cote d'Ivoire">Côte d'Ivoire </option>
                                  <option value="Croatie">Croatie </option>
                                  <option value="Cuba">Cuba </option>

                                  <option value="Danemark">Danemark </option>
                                  <option value="Djibouti">Djibouti </option>
                                  <option value="Dominique">Dominique </option>

                                  <option value="Egypte">Egypte </option> 
                                  <option value="Emirats Arabes Unis">Emirats Arabes Unis </option>
                                  <option value="Equateur">Equateur </option>
                                  <option value="Erythree">Erythree </option>
                                  <option value="Espagne">Espagne </option>
                                  <option value="Estonie">Estonie </option>
                                  <option value="Etats-Unis d'Amérique">Etats-Unis d'Amérique </option>
                                  <option value="Ethiopie">Ethiopie </option>

                                  <option value="Falkland">Falkland </option>
                                  <option value="Feroe">Feroe </option>
                                  <option value="Fidji">Fidji </option>
                                  <option value="Finlande">Finlande </option>
                                  <option value="France">France </option>

                                  <option value="Gabon">Gabon </option>
                                  <option value="Gambie">Gambie </option>
                                  <option value="Georgie">Georgie </option>
                                  <option value="Ghana">Ghana </option>
                                  <option value="Gibraltar">Gibraltar </option>
                                  <option value="Grece">Grece </option>
                                  <option value="Grenade">Grenade </option>
                                  <option value="Groenland">Groenland </option>
                                  <option value="Guadeloupe">Guadeloupe </option>
                                  <option value="Guam">Guam </option>
                                  <option value="Guatemala">Guatemala</option>
                                  <option value="Guernesey">Guernesey </option>
                                  <option value="Guinee">Guinee </option>
                                  <option value="Guinée Bissau">Guinée Bissau </option>
                                  <option value="Guinée equatoriale">Guinée Equatoriale </option>
                                  <option value="Guyana">Guyana </option>
                                  <option value="Guyane Francaise ">Guyane Francaise </option>

                                  <option value="Haiti">Haiti </option>
                                  <option value="Hawaii">Hawaii </option> 
                                  <option value="Honduras">Honduras </option>
                                  <option value="Hong Kong">Hong Kong </option>
                                  <option value="Hongrie">Hongrie </option>

                                  <option value="Inde">Inde </option>
                                  <option value="Indonesie">Indonesie </option>
                                  <option value="Iran">Iran </option>
                                  <option value="Iraq">Iraq </option>
                                  <option value="Irlande">Irlande </option>
                                  <option value="Islande">Islande </option>
                                  <option value="Israel">Israel </option>
                                  <option value="Italie">italie </option>

                                  <option value="Jamaique">Jamaique </option>
                                  <option value="Jan Mayen">Jan Mayen </option>
                                  <option value="Japon">Japon </option>
                                  <option value="Jersey">Jersey </option>
                                  <option value="Jordanie">Jordanie </option>

                                  <option value="Kazakhstan">Kazakhstan </option>
                                  <option value="Kenya">Kenya </option>
                                  <option value="Kirghizstan">Kirghizistan </option>
                                  <option value="Kiribati">Kiribati </option>
                                  <option value="Koweit">Koweit </option>

                                  <option value="Laos">Laos </option>
                                  <option value="Lesotho">Lesotho </option>
                                  <option value="Lettonie">Lettonie </option>
                                  <option value="Liban">Liban </option>
                                  <option value="Liberia">Liberia </option>
                                  <option value="Liechtenstein">Liechtenstein </option>
                                  <option value="Lituanie">Lituanie </option> 
                                  <option value="Luxembourg">Luxembourg </option>
                                  <option value="Lybie">Lybie </option>

                                  <option value="Macao">Macao </option>
                                  <option value="Macedoine">Macedoine </option>
                                  <option value="Madagascar">Madagascar </option>
                                  <option value="Madère">Madère </option>
                                  <option value="Malaisie">Malaisie </option>
                                  <option value="Malawi">Malawi </option>
                                  <option value="Maldives">Maldives </option>
                                  <option value="Mali">Mali </option>
                                  <option value="Malte">Malte </option>
                                  <option value="Man">Man </option>
                                  <option value="Mariannes du Nord">Mariannes du Nord </option>
                                  <option value="Maroc">Maroc </option>
                                  <option value="Marshall">Marshall </option>
                                  <option value="Martinique">Martinique </option>
                                  <option value="Maurice">Maurice </option>
                                  <option value="Mauritanie">Mauritanie </option>
                                  <option value="Mayotte">Mayotte </option>
                                  <option value="Mexique">Mexique </option>
                                  <option value="Micronesie">Micronesie </option>
                                  <option value="Midway">Midway </option>
                                  <option value="Moldavie">Moldavie </option>
                                  <option value="Monaco">Monaco </option>
                                  <option value="Mongolie">Mongolie </option>
                                  <option value="Montserrat">Montserrat </option>
                                  <option value="Mozambique">Mozambique </option>

                                  <option value="Namibie">Namibie </option>
                                  <option value="Nauru">Nauru </option>
                                  <option value="Nepal">Nepal </option>
                                  <option value="Nicaragua">Nicaragua </option>
                                  <option value="Niger">Niger </option>
                                  <option value="Nigeria">Nigeria </option>
                                  <option value="Niue">Niue </option>
                                  <option value="Norfolk">Norfolk </option>
                                  <option value="Norvege">Norvege </option>
                                  <option value="Nouvelle Caledonie">Nouvelle Caledonie </option>
                                  <option value="Nouvelle Zelande">Nouvelle Zelande </option>

                                  <option value="Oman">Oman </option>
                                  <option value="Ouganda">Ouganda </option>
                                  <option value="Ouzbekistan">Ouzbekistan </option>

                                  <option value="Pakistan">Pakistan </option>
                                  <option value="Palau">Palau </option>
                                  <option value="Palestine">Palestine </option>
                                  <option value="Panama">Panama </option>
                                  <option value="Papouasie Nouvelle Guinée">Papouasie Nouvelle Guinée </option>
                                  <option value="Paraguay">Paraguay </option>
                                  <option value="Pays_Bas">Pays_Bas </option>
                                  <option value="Perou">Perou </option>
                                  <option value="Philippines">Philippines </option> 
                                  <option value="Pologne">Pologne </option>
                                  <option value="Polynesie">Polynesie </option>
                                  <option value="Porto Rico">Porto Rico </option>
                                  <option value="Portugal">Portugal </option>

                                  <option value="Qatar">Qatar </option>

                                  <option value="Republique Dominicaine">Republique Dominicaine </option>
                                  <option value="Republique Tchèque">Republique Tchèque </option>
                                  <option value="Reunion">Reunion </option>
                                  <option value="Roumanie">Roumanie </option>
                                  <option value="Royaume Uni">Royaume Uni </option>
                                  <option value="Russie">Russie </option>
                                  <option value="Rwanda">Rwanda </option>

                                  <option value="Sahara Occidental">Sahara Occidental </option>
                                  <option value="Sainte Lucie">Sainte Lucie </option>
                                  <option value="Saint Marin">Saint Marin </option>
                                  <option value="Salomon">Salomon </option>
                                  <option value="Salvador">Salvador </option>
                                  <option value="Samoa Occidentales">Samoa Occidentales</option>
                                  <option value="Samoa Americaine">Samoa Americaine </option>
                                  <option value="Sao-Tome et Principe">Sao-Tome et Principe </option> 
                                  <option value="Senegal">Senegal </option> 
                                  <option value="Seychelles">Seychelles </option>
                                  <option value="Sierra Leone">Sierra Leone </option>
                                  <option value="Singapour">Singapour </option>
                                  <option value="Slovaquie">Slovaquie </option>
                                  <option value="Slovenie">Slovenie</option>
                                  <option value="Somalie">Somalie </option>
                                  <option value="Soudan">Soudan </option> 
                                  <option value="Sri Lanka">Sri Lanka </option> 
                                  <option value="Suede">Suede </option>
                                  <option value="Suisse">Suisse </option>
                                  <option value="Surinam">Surinam </option>
                                  <option value="Swaziland">Swaziland </option>
                                  <option value="Syrie">Syrie </option>

                                  <option value="Tadjikistan">Tadjikistan </option>
                                  <option value="Taiwan">Taiwan </option>
                                  <option value="Tonga">Tonga </option>
                                  <option value="Tanzanie">Tanzanie </option>
                                  <option value="Tchad">Tchad </option>
                                  <option value="Thailande">Thailande </option>
                                  <option value="Tibet">Tibet </option>
                                  <option value="Timor Oriental">Timor Oriental </option>
                                  <option value="Togo">Togo </option> 
                                  <option value="Trinite et Tobago">Trinite et Tobago </option>
                                  <option value="Tristan da cunha">Tristan de cuncha </option>
                                  <option value="Tunisie">Tunisie </option>
                                  <option value="Turkmenistan">Turmenistan </option> 
                                  <option value="Turquie">Turquie </option>

                                  <option value="Ukraine">Ukraine </option>
                                  <option value="Uruguay">Uruguay </option>

                                  <option value="Vanuatu">Vanuatu </option>
                                  <option value="Vatican">Vatican </option>
                                  <option value="Venezuela">Venezuela </option>
                                  <option value="Vierges Americaines">Vierges Americaines </option>
                                  <option value="Vierges Britanniques">Vierges Britanniques </option>
                                  <option value="Vietnam">Vietnam </option>

                                  <option value="Wake">Wake </option>
                                  <option value="Wallis et Futuma">Wallis et Futuma </option>

                                  <option value="Yemen">Yemen </option>
                                  <option value="Yougoslavie">Yougoslavie </option>

                                  <option value="Zambie">Zambie </option>
                                  <option value="Zimbabwe">Zimbabwe </option>
                              </select>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="card-footer text-white bg-secondary">
                    <div class="row">
                      <div class="col-md-2">
                        
                        <button type="submit" class="btn btn-primary btn-block" name="savefour">
                          <span class="step size-21">
                            <i class="icon ion-android-done"></i>
                          </span>
                            &nbsp;&nbsp;Enregistrer</button>
                      </div>
                      <div class="col-md-2">
                        <a class="btn btn-danger btn-block" href="fournisseur.php?id=<?php echo $getid; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>" role="button">
                          <span class="step size-21">
                            <i class="icon ion-ios-undo"></i>
                          </span>
                            &nbsp;&nbsp;Annuler</a>
                      </div>
                      <div class="col-md-8"></div>
                    </div>
                  </div>
                </div>
            </form>
            <div class="row">
              <div class="col-md-6">
                <?php 
                  if(isset($erreur))
                  {
                ?>
                  <div class="alert alert-danger text-center" role="alert"><?php echo $erreur; ?></div>
                <?php
                }
                ?>
              </div>
              <div class="col-md-6"></div>
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
        <script src="../asserts/js/canvasjs.min.js"></script>


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
