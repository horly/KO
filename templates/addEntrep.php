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

        <!--Style personnel-->
        <link rel="stylesheet" href="../asserts/css/style.css" >
        
        <!--Chargement des styles pour les icones des reseaux socio-->
        <link rel="stylesheet" href="../asserts/css/bootstrap-social.css" >
        <link rel="stylesheet" href="../asserts/css/docs.css" >
        <link rel="stylesheet" href="../asserts/css/font-awesome.css" >

         <!--chargement des icones-->
        <link href="../icons/css/ionicons.css" rel="stylesheet" type="text/css" />
        <link href="../icons/css/iconstyles.css" rel="stylesheet" type="text/css" />

        <title>KEDIS ONLINE | Ajouter entreprise</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body>
    <!--Début body-->

        <!--Code PHP-->
                <?php 
                    session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND $_GET['id'] > 0)  //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; //on protège la variable 
                      $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
                      $requser->execute(array($getid));

                      $userfos = $requser->fetch();
                      $getname = $userfos['nom_cl'];
                      $getprenom = $userfos['prenom_cl'];
                      $getmail = $userfos['email_cl'];
                      $getprofil = $userfos['profil_cl']; 
                      $sexe= $userfos['sexe_cl'];

                       $login_required = $userfos['login_required'];

                      //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                      if($login_required == 1)
                      {

                        // si l'utilisateur clique sur enregistrer 
                          if(isset($_POST['saveEntr']))
                          {
                            $nomE = htmlspecialchars($_POST['nomE']);
                            $adressE = htmlspecialchars($_POST['adressE']);
                            $villeE = htmlspecialchars($_POST['villeE']);
                            $paysE = htmlspecialchars($_POST['paysE']);
                            $numtvaE = htmlspecialchars($_POST['tvaE']);

                            if(!empty($_POST['nomE']) AND !empty($_POST['adressE']) AND !empty($_POST['villeE']) AND !empty($_POST['tvaE']))
                            {
                                 $longueurcode = 20; //ici nous allons définir la longueur du code pour l'entreprise
                                 $code = ""; 
                                for($i=1;$i<$longueurcode;$i++)
                                {
                                    $code .= mt_rand(0,9); //on génère les clés
                                }

                                $insertion = $bdd->prepare("INSERT INTO entreprise(nomE, adresseE, villeE, paysE, tvaE, codeE) 
                                VALUES(?, ?, ?, ?, ?, ?)");//on insert les valeurs dans la base de données 
                                $insertion->execute(array($nomE, $adressE, $villeE, $paysE ,$numtvaE, $code));

                                //ici on recupère l'id de l'entreprise insérée
                                $getidE = $bdd->prepare("SELECT * FROM entreprise WHERE codeE = ?");
                                $getidE->execute(array($code));

                                $idE = $getidE->fetch();

                                $id_entrp = $idE['idE']; //l'id est récupéré
                                //ensuite on insère dans gestion 
                                $nom_entrp = $idE['nomE'];
                                $insergest = $bdd->prepare("INSERT INTO gestion(id_user, id_E) VALUES(?,?)");
                                $insergest->execute(array($getid, $id_entrp));

                                header("location:unitexpl.php?id=".$getid."&idE=".$id_entrp."&nom_entreprise=".$nom_entrp);
                            }   
                            else
                            {
                                $error = "tout les champs sont obigatoire";
                            }
                        }

                  ?>

                <!--Code PHP-->

     <!--on inlus la la barre de navigation au dessus-->
                <?php  include('navbar.php'); ?>
         <!--*****************************************************-->
        <div class="container">
            <br><br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form method="post" action="">
                        <div class="card border-info mb-3">
                            <div class="card-header"><h6><strong>Creer une nouvelle entreprise</strong></h6></div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nom</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-briefcase.png"></span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Nom de l'entreprise" value="" name="nomE" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea">Adresse :</label>
                                        <textarea class="form-control"  rows="2" name="adressE" placeholder="l'adresse de votre entreprise" required=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Ville</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/ios7-home.png"></span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="Ville de l'entreprise" value="" name="villeE" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pays</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/android-earth.png"></span>
                                            </div>
                                            <select class="custom-select" name="paysE">
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
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Numéro d'entreprise ou T.V.A</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-default"><img width="18" height="18" class="icone" src="../png/512/checkmark.png"></span>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="N° TVA de l'entreprise" value="" name="tvaE" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary btn-block" name="saveEntr">Enregistrer</button>
                                        </div>
                                        <div class="col-md-3">
                                            <a role="button" class="btn btn-danger btn-block" href="accueille.php?&id=<?php echo $getid; ?>">Annuler</a>
                                        </div>
                                        <div class="col-md-6">
                                            <?php 
                                                if(isset($error))
                                                { ?>
                                                <div class="alert alert-danger" role="alert">
                                                   <small><?php echo $error; ?></small>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
                <div class="col-md-2"></div>
            </div>
            
            


        </div> <!-- /container -->
        <!--*****************************************************-->
        <br><br>
    
        <!-- Bootstrap JS -->

        <script src="../asserts/js/vendor/jquery-slim.min.js"></script>
        <script src="../asserts/js/vendor/popper.min.js"></script>
        <script src="../dist/js/util.js"></script>
        <script src="../dist/js/dropdown.js"></script>
        <script src="../dist/js/collapse.js"></script>

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
  header('location:error404.php');
}
?>
