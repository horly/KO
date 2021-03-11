<?php
  
  include('../connecting_data_base.php');

  $idvente = $_POST['idvente'];
  $getid = $_POST['getid'];
  $id_connexion = $_POST['id_connexion'];
  $idUE = $_POST['idUE'];
  $nomE = $_POST['nomE'];
  $nomUE = $_POST['nomUE'];
  $devise = $_POST['devise'];

   //on récupère le modèle de facture 
    $get_modele = $bdd->prepare("SELECT * FROM modele_facture WHERE idUE = ?");
    $get_modele->execute(array($idUE));
    $fetch_modele = $get_modele->fetch();

    $type_modele = $fetch_modele['type'];


    //on recupère l'id du client pour récupérer ensuite l'émail du client
    $getid_cli = $bdd->prepare("SELECT * FROM vente_for_user WHERE id_fact = ?");
    $getid_cli->execute(array($idvente));
    $fetch_id_cl = $getid_cli->fetch();
    $id_cli = $fetch_id_cl['id_cl_fact'];
    $reference = $fetch_id_cl['num_facture'];

    //on récupère maintenant l'émail du client à partir de son id 
    $get_email_cl = $bdd->prepare("SELECT * FROM client_for_user WHERE id_cli = ?");
    $get_email_cl->execute(array($id_cli));
    $fetch_email_cli = $get_email_cl->fetch();
    $email_cli = $fetch_email_cli['email_cli'];
    $civilite_cli = $fetch_email_cli['civilite_cli'];
    $nom_cli = $fetch_email_cli['nom_cli'];
    $prenom_cli = $fetch_email_cli['prenom_cli']; 

    //On récupère le titre du document facture
    $get_doc = $bdd->prepare("SELECT * FROM uniteexploit WHERE idUE = ?");
    $get_doc->execute(array($idUE));
    $fetch_doc = $get_doc->fetch();
    $nom_doc = $fetch_doc['titre_document_facture']; 

    setlocale(LC_TIME, 'fr_FR'); //serveur
    $year = date("Y");

    ini_set ( 'display_errors', 1);  
    error_reporting ( E_ALL );

    $statu_mail = ""; //cette variable nous indiquera si le mail a été envoyé ou pas

    //compte_active.php

  $header = "MINE-Version: 1.0\r\n";
    $header.= 'Content-Type:text/html; charset="utf-8"'."\n";
    $header.= 'De:"kedisonline.com"<contact@kedisonline.com>'."\n";
    $header.= 'Content-Transfert-Encoding: 8bits';
    $to = $email_cli;
    $subject = strtoupper("VOTRE ".$nom_doc." N° ".$reference);

    $message ='
      <html>
        <body style="background-color: lightgray;">
            <div style="width: 700px; margin-left: auto; margin-right: auto; background-color: white; padding: 1rem !important; margin-bottom: 0.5rem !important;">
              <a href="https://www.kedisonline.com" target="_blank"><img src="https://www.kedisonline.com/img/logo_kedis.png"></a>
              <br>
              <div style="height: 10px; background-color: #007bff;"></div>
              <p style="font-size: 18px; font-family: Century Gothic;">';


              if($civilite_cli == 'Monsieur')
              {
                $message.= 'Cher '.$civilite_cli.' <b>'.$prenom_cli.' '.$nom_cli.'</b>, <br><br>';
              }
              else
              {
                $message.= 'Chère '.$civilite_cli.' <b>'.$prenom_cli.' '.$nom_cli.'</b>, <br><br>';
              }
                
              $message.='
                Veuillez trouver ci-dessous la '.$nom_doc.' de votre fournisseur <b>'.$nomE.'</b>.<br>
                Cliquez sur le lien pour la télécharger.<br><br>
                Coordialement<br>
                L\'équipe <a href="https://www.kedisonline.com" target="_blank" style="text-decoration: none; color:#007bff; "><b>KEDIS Online!</b></a>.
              </p>

              <div style="position: relative;
                          padding: 0.75rem 1.25rem;
                          margin-bottom: 1rem;
                          border: 1px solid transparent;
                          border-radius: 0.25rem;
                          color: #007bff;
                          background-color: #fefefe;
                          border-color: lightgray;
                          font-family: Century Gothic;">
                  <b>'.strtoupper($nom_doc.' N° '.$reference).'</b> ';


        if($type_modele == 0)
          {
            $message.= ': <a href="https://www.kedisonline.com/templates/facture/pdf/facture_default.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele.'" style="color: #007bff;"><b>Télécharger</b></a>';
          }

          if($type_modele == 1)
          {
            $message.= ': <a href="https://www.kedisonline.com/templates/facture/pdf/facture_model1.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele.'" style="color: #007bff;"><b>Télécharger</b></a>';
          }

          if($type_modele == 2)
          {
            $message.= ': <a href="https://www.kedisonline.com/templates/facture/pdf/facture_model2.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele.'" style="color: #007bff;"><b>Télécharger</b></a>';
          }

          if($type_modele == 3)
          {
            $message.= ': <a href="https://www.kedisonline.com/templates/facture/pdf/facture_model3.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele.'" style="color: #007bff;"><b>Télécharger</b></a>';
          }

          if($type_modele == 4)
          {
            $message.= ': <a href="https://www.kedisonline.com/templates/facture/pdf/facture_model4.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele.'" style="color: #007bff;"><b>Télécharger</b></a>';
          }

          if($type_modele == 5)
          {
            $message.= ': <a href="https://www.kedisonline.com/templates/facture/pdf/facture_model5.php?id='.$getid.'&id_connexion='.$id_connexion.'&idEU='.$idUE.'&nom_entreprise='.$nomE.'&nom_unite_exploitation='.$nomUE.'&idvente='.$idvente.'&devise='.$devise.'&select_model='.$type_modele.'" style="color: #007bff;"><b>Télécharger</b></a>';
          }



        $message.= '               
              </div>
              <br>
              <div style="height: 10px; background-color: #007bff;"></div>
              <h2 style="font-family: Century Gothic; text-align: center;">Votre business à portée de main!</h2>
              <p style="text-align: center;">
                <img src="https://www.kedisonline.com/img/online.png">
              </p>

              <div style="position: relative;
                          padding: 0.75rem 1.25rem;
                          margin-bottom: 1rem;
                          border: 1px solid transparent;
                          border-radius: 0.25rem;
                          color: #0c5460;
                          background-color: #d1ecf1;
                          border-color: #bee5eb;
                          width: 500px;
                          margin-left: auto;
                          margin-right: auto;
                          text-align: center;
                          font-family: Century Gothic;">
                          Grâce à KEDIS Online ! gardez le contrôle de votre activité partout où vous êtes en toute tranquillité. 
                </div>

                 <div style="position: relative;
                          padding: 0.75rem 1.25rem;
                          margin-bottom: 1rem;
                          border: 1px solid transparent;
                          border-radius: 0.25rem;
                          color: #856404;
                          background-color: #fff3cd;
                          border-color: #ffeeba;
                          width: 500px;
                          margin-left: auto;
                          margin-right: auto;
                          text-align: center;
                          font-family: Century Gothic;">
                          Comptabilité - Facturation - Gestion des clients et fournisseurs - Gestion de caisse - Stock. ..et plus encore 
         
                </div>

                <br> <br><br><br>
                <p style="text-align: center; font-family: Century Gothic;">© '.$year.' <a href="https://kedisonline.com" style="color: #007bff; text-decoration: none;">KEDIS Online!</a> | Tous droits réservés</p>
            </div>
        </body>
      </html>
    ';

    /*mail("andmatboy@gmail.com", "Activation compte", $message, $header);*/

  $envoiemail = mail($to, $subject, $message, $header);

  //echo "Le message électronique a été envoyé." ;

  if($envoiemail == true)
  {
    echo "mail_send";
  }
  else
  {
    echo "main_not_send";
  }

  //echo $to;


?>