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
</style>
    <header id="header" class="header bg-primary">
        <div class="top-left">
            <div class="navbar-header bg-primary">
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars text-white"></i></a>
                <a class="navbar-brand" href="administration.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>"><img src="../img/K@Online-sans.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="administration.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>"><img src="../img/K@Online-sans.png" alt="Logo"></a>
                
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                    <!--<button class="search-trigger"><i class="fa fa-search"></i></button>-->
                    <div class="form-inline">
                        <form class="search-form">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                            <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                        </form>
                    </div>

                    <a href="administration.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>" class="btn btn-primary" type="button" >
                          <i class="fa fa-home"></i>
                    </a>

                    <?php

                        setlocale(LC_TIME, 'fr_FR'); //serveur
                        $date = date("Y:m:d");
                        $heure = date("H:i");

                        $hier = date('Y:m:d',strtotime("-1 days"));

                        $get_message = $bdd->prepare("SELECT * FROM message_admin WHERE dernier_message = 1 ORDER BY id DESC LIMIT 5");
                        $get_message->execute(array());

                        $count_mess = $get_message->rowCount();

                    ?>
                    
                    <div class="dropdown for-message">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-envelope text-white"></i>
                            
                            <?php 
                                if(preg_match("/^[1-9]+/", $count_mess))
                                {
                              ?>
                                  <span class="count bg-danger"><?php echo $count_mess; ?></span>
                              <?php
                                }
                              ?> 
                        </button>

                        <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">
                              <?php 
                                if(preg_match("/^[1-9]+/", $count_mess))
                                {
                                  echo 'Vous avez '.$count_mess.' messages';
                                }
                                else
                                {
                                  echo "Vous n'avez aucun nouveau message";
                                }
                              ?>     
                            </p>


                            <?php

                                while($row = $get_message->fetch())
                                {

                                  //on recupère les informations de l'expéditeurs
                                  $get_exp = $bdd->prepare('SELECT * FROM user WHERE id_cl = ?');
                                  $get_exp->execute(array($row['id_sender']));
                                  $info_sender = $get_exp->fetch();
                            ?>

                                <a class="dropdown-item media" href="message_admin.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&sender=<?php echo $row['id_sender']; ?>&email=<?php echo $info_sender['email_cl']; ?>"  target="_blank">
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
                            ?>

                           
                        </div>
                    </div>
                </div>

                <div class="user-area dropdown float-right">
                    <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="../profil_admin/<?php echo $userfos['profil']; ?>.png" alt="User Avatar">
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa- user"></i><?php echo $getprenom; ?></a>

                        <a class="nav-link" href="#"><i class="fa fa-cog"></i>Paramètres</span></a>

                        <a class="nav-link" href="deconnexion_admin.php?id=<?php echo $getid; ?>"><i class="fa fa-power-off"></i>Déconnexion</a>
                    </div>
                </div>

            </div>
        </div>
    </header>