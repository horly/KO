<!DOCTYPE html>
<html>
<head>
  <title>Facture</title>
</head>

<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require '../vendor/autoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.hostinger.fr';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'contact@kedisonline.com';
    $mail->Password = 'kedisbusiness';
    $mail->setFrom('contact@kedisonline.com', 'KEDIS Online!');
    $mail->addReplyTo('contact@kedisonline.com', 'KEDIS Online!');
    $mail->addAddress('andmatboy@gmail.com', 'Horly Andelo Mata');
    $mail->Subject = 'PHPMailer SMTP message';
    $mail->msgHTML(file_get_contents('main.php'), __DIR__);
    $mail->AltBody = 'This is a plain text message body';
    //$mail->addAttachment('test.txt');
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message sent!';
    }
?>
<body style="background-color: lightgray;">
    <div style="width: 700px; margin-left: auto; margin-right: auto; background-color: white; padding: 1rem !important; margin-bottom: 0.5rem !important;">
      <a href="https://www.kedisonline.com" target="_blank"><img src="https://www.kedisonline.com/img/logo_kedis.png"></a>
      <br>
      <div style="height: 10px; background-color: #007bff;"></div>
      <p style="font-size: 18px; font-family: Century Gothic;">
         Cher/Chère Monsieur <b>Andelo Mata Horly</b>, <br><br>

        Veuillez trouver ci-dessous la facture de votre fournisseur <b>ANDELO ENTREPRISE</b>.<br>
        Cliquez sur le lien pour la télécharger.<br> <br>
        Coordialement<br>
        L'équipe <a href="https://www.kedisonline.com" target="_blank" style="text-decoration: none; color:#007bff; "><b>KEDIS Online!</b></a>.
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
          <b>FACTURE N° V00685</b> : <a href="#" style="color: #007bff;"><b>Télécharger</b></a>              
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
        <p style="text-align: center; font-family: Century Gothic;">© 2019 <a href="https://kedisonline.com" style="color: #007bff; text-decoration: none;">KEDIS Online!</a> | Tous droits réservés</p>
    </div>
</body>
</html>


