<style type="text/css">
  .main-menu
  {
    padding: 10px;
  }
</style>
<?php
    $get_autoris = $bdd->prepare("SELECT * FROM autorisation WHERE id_user = ?");
    $get_autoris->execute(array($getid));

    $fetch_user =  $get_autoris->fetch();

  ?>
  <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dashboard">
                    <a href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><i class="menu-icon fa fa-laptop"></i>Tableau de bord</a>
                </li>
                <li class="menu-title">OPERATIONS</li><!-- /.menu-title -->
                
                <?php
                    //on vérifie pour le menu contact
                    if($fetch_user['client'] == 0 || $fetch_user['fournisseur'] == 0 || $fetch_user['autre_tiers'] == 0 || $fetch_user['serveur'] == 0)
                    {  
                ?>
                <li class="menu-item-has-children dropdown contacts">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-address-book-o"></i>Mes contacts</a>
                    <ul class="sub-menu children dropdown-menu">   
                      <?php
                        if($fetch_user['client'] == 0)
                        {
                      ?>                         
                        <li><i class="fa fa-user-o"></i><a href="contacts.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes clients</a></li>
                      
                      <?php
                        }
                        if($fetch_user['fournisseur'] == 0)
                        {
                      ?>

                        <li><i class="fa fa-user-o"></i><a href="fournisseur.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes fournisseurs</a></li>
                      
                      <?php
                        }
                        if($fetch_user['autre_tiers'] == 0)
                        {
                      ?>
                        <li><i class="fa fa-user-o"></i><a href="autres_tiers.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes autres tiers</a></li>
                      
                      <?php
                        }
                        if($fetch_user['serveur'] == 0)
                          {
                      ?>
                        <li><i class="fa fa-user-o"></i><a href="serveur.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes serveur(se)s</a></li>
                      
                      <?php
                        }
                        ?>
                    </ul>
                </li>
                <?php
                    } 
                ?>

                <!--stock-->

                <?php
                    //on vérifie pour le menu contact
                    if($fetch_user['article'] == 0 || $fetch_user['categorie_article'] == 0 || $fetch_user['sous_categorie_article'] == 0)
                    {  
                ?>
                <li class="menu-item-has-children dropdown stock">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-inbox"></i>Mon stock</a>
                    <ul class="sub-menu children dropdown-menu">
                      <?php
                        if($fetch_user['article'] == 0)
                        {
                      ?>
                        <li><i class="fa fa-inbox"></i><a href="stock_article.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes articles</a></li>

                      <?php
                        }
                        if($fetch_user['categorie_article'] == 0)
                        {
                      ?>
                        <li><i class="fa fa-inbox"></i><a href="stock.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes catégories d'articles</a></li>

                      <?php
                        }
                      ?>
                    </ul>
                </li>
                <?php
                    } 
                ?>

                <?php
                    //on vérifie pour le menu contact
                    if($fetch_user['service'] == 0 || $fetch_user['categorie_service'] == 0)
                    {  
                ?>              
                <li class="menu-item-has-children dropdown service">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Mes services</a>
                    <ul class="sub-menu children dropdown-menu">
                      <?php
                        if($fetch_user['service'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-cogs"></i><a href="service_grille_tarifaire.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Ma grille tarifaire</a></li>

                      <?php
                        }
                        if($fetch_user['categorie_service'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-cogs"></i><a href="service.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes catégories de services</a></li>
                      <?php
                        }
                      ?>
                    </ul>
                </li>
                <?php
                    } 
                ?>

                <!--Table -->
                <?php 

                  if($fetch_user['tables'] == 0)
                    {
                ?>

                <li class="tables">
                    <a href="tables.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><i class="menu-icon fa fa-glass"></i>Mes tables</a>
                </li>


                <?php
                  }
                ?>

                <?php
                    //on vérifie pour le menu contact
                    if($fetch_user['mode_paiement'] == 0 || $fetch_user['monnaie_etrangere'] == 0)
                    {  
                ?>  
                <li class="menu-item-has-children dropdown paiement">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-credit-card"></i>Modes de paiement</a>
                    <ul class="sub-menu children dropdown-menu">
                      <?php
                        if($fetch_user['mode_paiement'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-credit-card"></i><a href="compte_finacier.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes modes de paiement</a></li>

                      <?php
                        }
                        if($fetch_user['monnaie_etrangere'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-globe"></i><a href="monnaie.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes monnaies étrangères</a></li>
                      <?php
                        }
                      ?>
                    </ul>
                </li>
                <?php
                    } 
                ?>

                <?php
                    //on vérifie pour le menu contact
                    if($fetch_user['vente'] == 0 || $fetch_user['note_credit'] == 0 || $fetch_user['devis'] == 0 || $fetch_user['caisse'] == 0)
                    {  
                ?>
                <li class="menu-item-has-children dropdown vente">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-money"></i>Mes recettes</a>
                    <ul class="sub-menu children dropdown-menu">
                      <?php
                        if($fetch_user['vente'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-money"></i><a href="vente.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes ventes</a></li>

                      <?php
                        }
                        if($fetch_user['note_credit'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-file-text"></i><a href="noteCredit.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes notes de crédit</a></li>
                      
                      <?php
                        }
                        if($fetch_user['devis'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-file-text-o"></i><a href="devis.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes offres/devis</a></li>
                      
                      <?php
                        }
                        if($fetch_user['caisse'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-desktop"></i><a href="caisse.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Ma caisse enregistreuse</a></li>
                      <?php
                        }
                      ?>
                    </ul>
                </li>
                <?php
                    } 
                ?>

                <?php
                    //on vérifie pour le menu contact
                    if($fetch_user['achat'] == 0 || $fetch_user['note_credit_achat'] == 0 || $fetch_user['commande'] == 0 || $fetch_user['depense'] == 0)
                    {  
                ?>
                <li class="menu-item-has-children dropdown achat">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Mes dépenses</a>
                    <ul class="sub-menu children dropdown-menu">
                      <?php
                        if($fetch_user['achat'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-shopping-cart"></i><a href="depense.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes achats</a></li>

                      <?php
                        }
                        if($fetch_user['note_credit_achat'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-file-text"></i><a href="noteCredit_achat.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes notes de crédit/achats</a></li>
                      
                      <?php
                        }
                        if($fetch_user['commande'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-file-text-o"></i><a href="commande.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes commandes</a></li>
                      
                      <?php
                        }
                        if($fetch_user['depense'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-files-o"></i><a href="poste_depense.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes notes de frais</a></li>
                      <?php
                        }
                      ?>
                    </ul>
                </li>
                <?php
                    } 
                ?>

                <?php
                  //on vérifie pour les autres opérations
                  if($fetch_user['creance'] == 0 || $fetch_user['dette'] == 0 || $fetch_user['rapport'] == 0)
                  {
                ?>
                <li class="menu-title">AUTRES OPERATIONS</li><!-- /.menu-title -->
                <?php
                    } 
                ?>

                <?php
                  //on vérifie pour les autres opérations
                  if($fetch_user['creance'] == 0 || $fetch_user['dette'] == 0)
                  {
                ?>
                <li class="menu-item-has-children dropdown creance">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-usd"></i>Mes dettes/créances</a>
                    <ul class="sub-menu children dropdown-menu">
                      <?php
                        if($fetch_user['creance'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-usd"></i><a href="creance.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes créances</a></li>

                      <?php
                        }
                        if($fetch_user['dette'] == 0)
                        {
                      ?>
                        <li><i class="menu-icon fa fa-usd"></i><a href="dette.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>">Mes dettes</a></li>
                      <?php
                        }
                      ?>
                    </ul>
                </li>
                <?php
                    } 
                ?>

                <?php
                  //on vérifie pour les autres opérations
                  if($fetch_user['rapport'] == 0)
                  {
                ?>
                <li class="rapport">
                    <a href="rapport.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nomE; ?>&nom_unite_exploitation=<?php echo $nomUE; ?>"><i class="menu-icon fa fa-sticky-note"></i>Mes rapports</a>
                </li>
                <?php
                    } 
                ?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
  </aside>