<style type="text/css">
  .brand
  {
    margin-top: 10px;
    margin-bottom: 10px;
  }

  .input-nav, .nav-profil
  {
    margin-top: 5px;
    margin-bottom: 5px;
  }

  .input-serch
  {
    height: 30px;
  }
  
  .icon-nav a
  {
    display: inline-block;
  }

  .profil
  {
    display: inline-block;
  }

  .name_profil
  {
    text-decoration: none;
    color: white;
    margin-right: 10px;
    font-weight: bold;
  }

  .click-search
  {
    cursor: pointer;
  }

  .icone_cont1{
      position: relative;
      height: 200px;
      width: 200px;
      margin-left: auto;
      margin-right: auto;
      display: block;
  }

  .notif_icone{
    position: absolute;
    height: 15px;
    width:15px;
    background-color: red;
    border-radius: 50%;
    bottom: 25px;
    right: 215px;
    color: white;
    /*border:1.5px solid white;*/
  }

  #search-zone
  {
    width: 400px;
  }

  .red
  {
    width: 320px;
  }

  #zone-mess
  {
    overflow: auto;
    height: 250px;
  }
</style>

<header id="header" class="header bg-primary">
            <div class="top-left">
                <?php

                  $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
                  $requser->execute(array($getid));
                  $userfos = $requser->fetch();

                  if($userfos['statut'] == 'admin')
                  {
              ?>
                    <div class="navbar-header bg-primary">
                        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars text-white"></i></a>
                        <a class="navbar-brand" href="accueille.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>"><img src="../img/K@Online-sans.png" alt="Logo"></a>
                        <a class="navbar-brand hidden" href="accueille.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>"><img src="../img/K@Online-sans.png" alt="Logo"></a>
                        
                    </div>
              <?php
                  }
                  else
                  {
                    //on récupère l'id de l'entreprise dans gestion
                      $get_gestion = $bdd->prepare('SELECT * FROM gestion WHERE id_user = ?');
                      $get_gestion->execute(array($getid));
                      $fetch_gestion = $get_gestion->fetch();
                      $idE = $fetch_gestion['id_E'];

                      //on recupère l'entreprise dans entreprise
                      $get_entreprise = $bdd->prepare('SELECT * FROM entreprise WHERE idE = ?');
                      $get_entreprise->execute(array($idE));
                      $fetch_entreprise = $get_entreprise->fetch();
                      $nom_E = $fetch_entreprise['nomE'];

                      $entre_unique = $fetch_entreprise['entre_unique'];

                      //on vérifie maintenant les autorisations 
                      $get_autoris = $bdd->prepare('SELECT * FROM autorisation WHERE id_user = ?');
                      $get_autoris->execute(array($getid));
                      $fetch_autoris = $get_autoris->fetch();
                      if($fetch_autoris['all_entreprise'] == 0)
                      {
                        if($entre_unique != 1)
                        {
                    ?>
                            <div class="navbar-header bg-primary">
                                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars text-white"></i></a>
                                <a class="navbar-brand" href="unitexpl.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $idE; ?>&nom_entreprise=<?php echo $nom_E; ?>"><img src="../img/K@Online-sans.png" alt="Logo"></a>
                                <a class="navbar-brand hidden" href="unitexpl.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $idE; ?>&nom_entreprise=<?php echo $nom_E; ?>"><img src="../img/K@Online-sans.png" alt="Logo"></a>
                            </div>
                    <?php
                        }
                        else
                        {
                            //on récupère l'autorisation ue
                            $get_ue_autoris = $bdd->prepare('SELECT * FROM autorisation_ue WHERE id_user = ?');
                            $get_ue_autoris->execute(array($getid));
                            $fetch_ue_autoris = $get_ue_autoris->fetch();
                            $idUE = $fetch_ue_autoris['id_UE'];

                            //on récupère l'UE 
                            $get_UE = $bdd->prepare('SELECT * FROM uniteexploit WHERE idUE = ?');
                            $get_UE->execute(array($idUE));
                            $fetch_UE = $get_UE->fetch();
                            $nom_UE = $fetch_UE['nomUE'];
                    ?>

                        <div class="navbar-header bg-primary">
                            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars text-white"></i></a>
                            <a class="navbar-brand" href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nom_E; ?>&nom_unite_exploitation=<?php echo $nom_UE; ?>"><img src="../img/K@Online-sans.png" alt="Logo"></a>
                            <a class="navbar-brand hidden" href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nom_E; ?>&nom_unite_exploitation=<?php echo $nom_UE; ?>"><img src="../img/K@Online-sans.png" alt="Logo"></a>
                        </div>

                    <?php
                        }
                      }
                      else
                      {

                        //on récupère l'autorisation ue
                          $get_ue_autoris = $bdd->prepare('SELECT * FROM autorisation_ue WHERE id_user = ?');
                          $get_ue_autoris->execute(array($getid));
                          $fetch_ue_autoris = $get_ue_autoris->fetch();
                          $idUE = $fetch_ue_autoris['id_UE'];

                          //on récupère l'UE 
                          $get_UE = $bdd->prepare('SELECT * FROM uniteexploit WHERE idUE = ?');
                          $get_UE->execute(array($idUE));
                          $fetch_UE = $get_UE->fetch();
                          $nom_UE = $fetch_UE['nomUE'];

              ?>

                    <div class="navbar-header bg-primary">
                        <a id="menuToggle" class="menutoggle"><i class="fa fa-bars text-white"></i></a>
                        <a class="navbar-brand" href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nom_E; ?>&nom_unite_exploitation=<?php echo $nom_UE; ?>"><img src="../img/K@Online-sans.png" alt="Logo"></a>
                        <a class="navbar-brand hidden" href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nom_E; ?>&nom_unite_exploitation=<?php echo $nom_UE; ?>"><img src="../img/K@Online-sans.png" alt="Logo"></a>
                    </div>
              <?php
                      }
                  }
              ?>

            </div>

            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <!--<button class="search-trigger"><i class="fa fa-search"></i></button>-->
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Rechercher..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-search">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-search text-white"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="search">
                                <div class="p-3 mb-2 bg-white text-dark" id="search-zone">
                                  <div class="input-group">
                                    <input type="text" class="form-control" aria-label=""  placeholder="Rechercher" id="rechercher_user" value="<?php if(isset($rechercher_user)){ echo $rechercher_user; } ?>">
                                    <div class="input-group-append click-search">
                                      <span class="input-group-text" id="get_recherche">
                                        <span class="step size-18">
                                          <i class="icon ion-android-search"></i>
                                        </span>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <!--Pour le boutton home -->
                        <?php

                          $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
                          $requser->execute(array($getid));
                          $userfos = $requser->fetch();

                          if($userfos['statut'] == 'admin')
                          {
                      ?>
                          <a href="accueille.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>" class="btn btn-primary" type="button" >
                              <i class="fa fa-home"></i>
                          </a>
                      <?php
                          }
                          else
                          {
                            //on récupère l'id de l'entreprise dans gestion
                              $get_gestion = $bdd->prepare('SELECT * FROM gestion WHERE id_user = ?');
                              $get_gestion->execute(array($getid));
                              $fetch_gestion = $get_gestion->fetch();
                              $idE = $fetch_gestion['id_E'];

                              //on recupère l'entreprise dans entreprise
                              $get_entreprise = $bdd->prepare('SELECT * FROM entreprise WHERE idE = ?');
                              $get_entreprise->execute(array($idE));
                              $fetch_entreprise = $get_entreprise->fetch();
                              $nom_E = $fetch_entreprise['nomE'];

                              $entre_unique = $fetch_entreprise['entre_unique'];

                              //on vérifie maintenant les autorisations 
                              $get_autoris = $bdd->prepare('SELECT * FROM autorisation WHERE id_user = ?');
                              $get_autoris->execute(array($getid));
                              $fetch_autoris = $get_autoris->fetch();
                              if($fetch_autoris['all_entreprise'] == 0)
                              {
                                if($entre_unique != 1)
                                {
                            ?>
                              <a href="unitexpl.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $idE; ?>&nom_entreprise=<?php echo $nom_E; ?>" class="btn btn-primary" type="button" >
                                  <i class="fa fa-home"></i>
                              </a>
                          <?php
                                }
                                else
                                {
                                  //on récupère l'autorisation ue
                                  $get_ue_autoris = $bdd->prepare('SELECT * FROM autorisation_ue WHERE id_user = ?');
                                  $get_ue_autoris->execute(array($getid));
                                  $fetch_ue_autoris = $get_ue_autoris->fetch();
                                  $idUE = $fetch_ue_autoris['id_UE'];

                                  //on récupère l'UE 
                                  $get_UE = $bdd->prepare('SELECT * FROM uniteexploit WHERE idUE = ?');
                                  $get_UE->execute(array($idUE));
                                  $fetch_UE = $get_UE->fetch();
                                  $nom_UE = $fetch_UE['nomUE'];
                          ?>
                                
                                <a href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nom_E; ?>&nom_unite_exploitation=<?php echo $nom_UE; ?>" class="btn btn-primary" type="button" >
                                    <i class="fa fa-home"></i>
                                </a>
                          <?php
                                }
                              }
                              else
                              {

                                //on récupère l'autorisation ue
                                  $get_ue_autoris = $bdd->prepare('SELECT * FROM autorisation_ue WHERE id_user = ?');
                                  $get_ue_autoris->execute(array($getid));
                                  $fetch_ue_autoris = $get_ue_autoris->fetch();
                                  $idUE = $fetch_ue_autoris['id_UE'];

                                  //on récupère l'UE 
                                  $get_UE = $bdd->prepare('SELECT * FROM uniteexploit WHERE idUE = ?');
                                  $get_UE->execute(array($idUE));
                                  $fetch_UE = $get_UE->fetch();
                                  $nom_UE = $fetch_UE['nomUE'];

                      ?>
                            <a href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nom_E; ?>&nom_unite_exploitation=<?php echo $nom_UE; ?>" class="btn btn-primary" type="button" >
                                <i class="fa fa-home"></i>
                            </a>
                      <?php
                              }
                          }
                      

                          setlocale(LC_TIME, 'fr_FR'); //serveur
                          $date = date("Y:m:d");
                          $heure = date("H:i");

                          $hier = date('Y:m:d',strtotime("-1 days"));

                          //on recupère maintenant l'expéditeur et le recepteur du message 
                          $get_mess = $bdd->prepare('SELECT * FROM messages WHERE (id_receiver = ? OR id_sender = ?) AND dernier_message = 1 ORDER BY id DESC LIMIT 4');
                          $get_mess->execute(array($getid, $getid));

                          $statut = 'non_lu';
                          //on récupère tous les derniers messages qui nous sont destinés
                          $get_mess_dest = $bdd->prepare('SELECT * FROM messages WHERE id_receiver = ? AND dernier_message = 1 AND statut = ? ORDER BY id DESC');
                          $get_mess_dest->execute(array($getid, $statut));

                          $count_mess_dest = $get_mess_dest->rowCount();


                          $count_mess = $get_mess->rowCount();


                          //on récupère le message du groupe
                          $get_message_group = $bdd->prepare("SELECT * FROM messages_groupe, entreprise, gestion WHERE id_user = ? AND dernier_message = 1 AND idEG = idE AND idE = id_E");
                          $get_message_group->execute(array($getid));
                          $count_messG = $get_message_group->rowCount();

                          //on l'additionne avec le nombre des messages normales 
                          $totalmessage = $count_mess_dest + $count_messG;


                          

                          //$totalmessage = $count_mess_dest + $count_messG;

                        ?>
                        

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope text-white"></i>
                                
                                  <?php 
                                    if(preg_match("/^[1-9]+/", $totalmessage))
                                    {
                                  ?>
                                      <span class="count bg-danger"><?php echo $totalmessage; ?></span>
                                  <?php
                                    }
                                  ?>  
                                  
                            </button>
                              <div class="dropdown-menu" aria-labelledby="message">
                                <div id="zone-mess">
                                  <p class="red">
                                    <?php 
                                      if(preg_match("/^[1-9]+/", $totalmessage))
                                      {
                                        echo 'Vous avez '.$totalmessage.' messages';
                                      }
                                      else
                                      {
                                        echo "Vous n'avez aucun nouveau message";
                                      }
                                    ?></p>

                                    <?php

                                      while($row = $get_mess->fetch())
                                      {
                                        //on recupère les informations de l'expéditeurs
                                        $get_exp = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
                                        $get_exp->execute(array($row['id_sender']));
                                        $info_sender = $get_exp->fetch();

                                        //on recupère aussi l'informations du recepteurr
                                        $get_send = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
                                        $get_send->execute(array($row['id_receiver']));

                                        $info_exp = $get_send->fetch();
                                        //si c'est moi l'expéditeur
                                        if($row['id_sender'] == $getid)
                                        {

                                    ?>

                                      <a class="dropdown-item media" href="message.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&sender=<?php echo $info_exp['id_cl']; ?>&email=<?php echo $info_exp['email_cl']; ?>"  target="_blank">
                                          <span class="photo media-left"><img alt="avatar" src="../profil/<?php echo $info_exp['profil_cl']; ?>.png"></span>
                                          <div class="message media-body">
                                              <span class="name float-left"><?php echo $info_exp['prenom_cl'].' '.$info_exp['nom_cl'] ?></span>
                                              <span class="time float-right">
                                                <?php 

                                                    if($row['datem'] == $date)
                                                    {
                                                      echo "Aujourd'hui";
                                                    }
                                                    else if($row['datem'] == $hier)
                                                    {
                                                      echo "Hier";
                                                    }
                                                    else
                                                    {
                                                       echo $row['datem']; 
                                                    }
                                                ?>
                                              </span>
                                              <p>Vous : 
                                                <?php  
                                                    if(strlen($row['message']) <= 22)
                                                    {
                                                      echo $row['message'];
                                                    }
                                                    else
                                                    {
                                                      echo substr($row['message'], 0, 22).'...';
                                                    }

                                                ?>
                                                
                                              </p>
                                          </div>
                                      </a>

                                    <?php
                                        }
                                        else
                                        {
                                    ?>

                                        <a class="dropdown-item media" href="message.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&sender=<?php echo $info_sender['id_cl']; ?>&email=<?php echo $info_sender['email_cl']; ?>"  target="_blank">
                                            <span class="photo media-left"><img alt="avatar" src="../profil/<?php echo $info_sender['profil_cl']; ?>.png"></span>
                                            <div class="message media-body">
                                                <span class="name float-left"><?php echo $info_sender['prenom_cl'].' '.$info_sender['nom_cl'] ?></span>
                                                <span class="time float-right">
                                                  <?php 
                                                    if($row['datem'] == $date)
                                                      {
                                                        echo "Aujourd'hui";
                                                      }
                                                      else if($row['datem'] == $hier)
                                                      {
                                                        echo "Hier";
                                                      }
                                                      else
                                                      {
                                                         echo $row['datem']; 
                                                      }
                                                  ?>
                                                  </span>
                                                <?php

                                                if($row['statut'] == 'non_lu')
                                                {
                                                ?>
                                                    <p><strong>
                                                      <?php  
                                                          if(strlen($row['message']) <= 22)
                                                          {
                                                            echo $row['message'];
                                                          }
                                                          else
                                                          {
                                                            echo substr($row['message'], 0, 22).'...';
                                                          }

                                                      ?></strong>
                                                    </p>

                                              <?php
                                                }
                                                else
                                                {
                                              ?>
                                                  <p>
                                                      <?php  
                                                          if(strlen($row['message']) <= 22)
                                                          {
                                                            echo $row['message'];
                                                          }
                                                          else
                                                          {
                                                            echo substr($row['message'], 0, 22).'...';
                                                          }

                                                      ?>
                                                    </p>
                                              <?php
                                                }
                                              ?>

                                            </div>
                                        </a>

                                    <?php

                                        }
                                      }
                                    ?>

                                    <?php

                                      //on repète la requête pour limiter le nombre d'affichage 
                                      /*$get_message_group2 = $bdd->prepare("SELECT * FROM messages_groupe, entreprise WHERE dernier_message = 1 AND idEG = idE ORDER BY id DESC LIMIT 2");
                                      $get_message_group2->execute(array($getid)) or die (print_r($get_message_group2->errorInfo()));*/

                                      //on repète la requête pour limiter le nombre d'affichage 
                                      /*$get_message_group2 = $bdd->prepare("SELECT * FROM messages_groupe, gestion WHERE id_user = ? AND dernier_message = 1 AND idEG = id_E ORDER BY id DESC LIMIT 2");
                                      $get_message_group2->execute(array($getid)) or die (print_r($get_message_group2->errorInfo()));*/

                                      $views = $bdd->prepare("SELECT * FROM gestion, entreprise WHERE id_user = ? AND id_E = idE"); //on séléctionne les entreprise appartenant à cet utlisateur
                                      $views->execute(array($getid));


                                      //ici nous effectuons les requêtes des messages groupes
                                      while($rowG = $views->fetch())
                                      {
                                        $sql = $bdd->prepare("SELECT * FROM messages_groupe WHERE idEG = ?");
                                        $sql->execute(array($rowG['idE']));
                                        $info_mess = $sql->fetch();

                                        $count_mess = $sql->rowCount();

                                        if(preg_match("/^[1-9]+/", $count_mess))
                                        {
                                    ?>
                                      <a class="dropdown-item media" href="message_groupe.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $rowG['idE']; ?>"  target="_blank">
                                          <span class="photo media-left"><img alt="avatar" src="../logo/entreprise/<?php echo $rowG['logo']; ?>.png"></span>
                                          <div class="message media-body">
                                              <span class="name float-left"><?php echo $rowG['nomE']; ?></span>
                                              <span class="time float-right">
                                                <?php 
                                                  if($info_mess['datem'] == $date)
                                                    {
                                                      echo "Aujourd'hui";
                                                    }
                                                    else if($info_mess['datem'] == $hier)
                                                    {
                                                      echo "Hier";
                                                    }
                                                    else
                                                    {
                                                       echo $info_mess['datem']; 
                                                    }
                                                ?>
                                              </span>
                                              
                                                  <p><strong>
                                                    <?php
                                                      //on recupère les informations de l'expéditeurs
                                                      $get_exp = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
                                                      $get_exp->execute(array($row['id_sender']));
                                                      $info_sender = $get_exp->fetch();

                                                      if($info_mess['id_sender'] == $getid)
                                                      {
                                                        echo "Vous : ";
                                                      }
                                                      else
                                                      {
                                                        echo $info_sender['prenom_cl'];
                                                      }
                                                    ?>
                                                    <?php  
                                                        if(strlen($info_mess['message']) <= 22)
                                                        {
                                                          echo $info_mess['message'];
                                                        }
                                                        else
                                                        {
                                                          echo substr($info_mess['message'], 0, 22).'...';
                                                        }

                                                    ?></strong>
                                                  </p>
                                          </div>
                                      </a>
                                    <?php
                                        }
                                      }
                                    ?>

                                <!--Fin zone_mess-->
                                </div>
                                    <?php

                                      //on recupère maintenant l'expéditeur et le recepteur du message 
                                      $get_mess_all = $bdd->prepare('SELECT * FROM messages WHERE (id_receiver = ? OR id_sender = ?) AND dernier_message = 1');
                                      $get_mess_all->execute(array($getid, $getid));

                                      $row_all = $get_mess_all->fetch();
                                      $count_message_all = $get_mess_all->rowCount();

                                      //on recupère les informations de l'expéditeurs
                                      $get_exp = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
                                      $get_exp->execute(array($row_all['id_sender']));
                                      $info_sender = $get_exp->fetch();

                                      //on recupère aussi l'informations du recepteurr
                                      $get_send = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
                                      $get_send->execute(array($row_all['id_receiver']));

                                      $info_exp = $get_send->fetch();

                                      if(preg_match("/^[1-9]+/", $count_message_all))
                                      {
                                        if($row_all['id_sender'] == $getid)
                                        {
                                    ?>
                                        <!--Nouveau message-->
                                        <a class="dropdown-item media" href="message.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&sender=<?php echo $info_exp['id_cl']; ?>&email=<?php echo $info_exp['email_cl']; ?>"  target="_blank" >Afficher tous les messages</a>
                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                        <a class="dropdown-item media" href="message.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&sender=<?php echo $info_sender['id_cl']; ?>&email=<?php echo $info_sender['email_cl']; ?>" target="_blank" >Afficher tous les messages</a>
                                    <?php
                                        }
                                      }
                                    ?>

                              </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="../profil/<?php echo $userfos['profil_cl']; ?>.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><?php echo $getprenom; ?></a>
                            <a class="nav-link" href="profile.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>"><i class="fa fa-user"></i>Profil</a>

                            <a class="nav-link" href="parametre.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>"><i class="fa fa-cog"></i>Paramètres</a>

                            <a class="nav-link" href="deconnexion.php?id=<?php echo $getid; ?>"><i class="fa fa-power-off"></i>Déconnexion</a>
                        </div>
                    </div>

                </div>
            </div>
</header>

         

<script src="../asserts/js/jquery/jquery.min.js"></script>
<script type="text/javascript">
  document.getElementById("get_recherche").addEventListener("click", recherche);

  //document.addEventListener("keypress", recherche);

  function recherche()
  {
    var getid = '<?php echo $getid; ?>';
    var id_connexion = '<?php echo $id_connexion; ?>';
    var rechercher_user = document.getElementById("rechercher_user").value;

    if(rechercher_user != '')
    {
      //alert(rechercher_user);
      window.location = "recherche.php?id=" + getid + "&id_connexion=" + id_connexion + "&rechercher_user=" + rechercher_user;
    }

  }

  affiche_notif();
  //setInterval(affiche_notif, 5000);
  function affiche_notif()
  {
    var getid = '<?php echo $getid; ?>';

    $.ajax(
      {
        type  : 'POST',
        url   : 'message/affiche_notif.php',
        data  : 'getid=' + getid,
        success:function(data)
        {
          if(data != 0)
          {
            /*$('.badge-notify').css('display', 'block');*/
            $('.badge-notify').css('background', 'red');
            $('.badge-notify').css('position', 'relative');
            $('.badge-notify').css('top', '-16px');
            $('.badge-notify').css('left', '8px');
            $('.badge-notify').css('font-size', '11px');

            $('.badge-notify').html(data);
          }
          else
          {
            $('.badge-notify').css('display', 'none');
          }
        }
      });
   }

   

</script>