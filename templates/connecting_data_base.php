<?php 
	//connextion en ligne 
	/*$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u261568441_kedis', 'u261568441_admin', 'kedisbusiness200000', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
    ));*/
	//connexion dans la base de données en local
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=u261568441_kedis', 'root', '');

?>