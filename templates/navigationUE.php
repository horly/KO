<style type="text/css">
  .nav-link1:hover
      {
        background-color: lightgray;
      }
</style>
<nav class="col-md-2 d-none d-md-block bg-light sidebar">

            <br><br><br>
              <div class="sidebar-sticky">
                <ul class="nav flex-column">
                  <li class="nav-item UE">
                    <a class="nav-link nav-link1" href="unitexpl.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $getidE;?>&nom_entreprise=<?php echo $nomE;?>">
                      <span class="step size-21">
                        <img width="25" height="25" class="icone" src="../icons/png/office/business.png">
                        </span>&nbsp;&nbsp;&nbsp;Accueil
                    </a>
                  </li>
                  <li class="nav-item user">
                    <a class="nav-link nav-link1" href="user.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $getidE;?>&nom_entreprise=<?php echo $nomE;?>">
                      <span class="step size-21">
                        <img width="25" height="25" class="icone" src="../icons/png/office/user-bg.png">
                        </span>&nbsp;&nbsp;&nbsp;Gestion des utilisateurs
                    </a>
                  </li>
                  <li class="nav-item settngUE">
                     <a class="nav-link nav-link1" href="settingUnitexpl.php?id=<?php echo $getid; ?>&idE=<?php echo $getidE; ?>&nom_entreprise=<?php echo $nomE; ?>">
                       <span class="step size-21">
                           <img width="25" height="25" class="icone" src="../icons/png/office/settings.png">
                        </span>&nbsp;&nbsp;&nbsp;
                            Paramètres
                    </a>
                  </li>

                </ul>
              </div>
            </nav>