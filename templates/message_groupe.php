<!doctype html>
<!--Début html-->
<html lang="fr">
<!--Début html-->
    <head>
    <!--Début head-->
        <!--Début head-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap core CSS -->
    <link href="dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
    <!-- Swipe core CSS -->
    <link href="dist/css/swipe.min.css" type="text/css" rel="stylesheet">


    <!--loader-->
    <link rel="stylesheet" type="text/css" href="assets/css/loader.css">

    <!--Les emojis-->
    <!--<link rel="stylesheet" type="text/css" href="../emoji/emojionearea.min.css" media="screen">-->
    <link rel="stylesheet" href="../emoji/css/twemoji-picker.css" />



    <!--<link rel="stylesheet" type="text/css" href="assets/css/loader.css">-->
    <link href="assets/css/lib/sweetalert/sweetalert.css" rel="stylesheet">


    <!--css toast message-->
    <link href="../asserts/css/toastr/toastr.min.css" rel="stylesheet">


  

    <style type="text/css">
   
      /*#message_content
      {
        position: fixed;
        height: 50px;
      }*/

      #content, #content-empty
      {
        /*overflow: scroll;*/
        /*height: 65vh;*/
        overflow: auto;
        transform: rotate(180deg);
        direction: rtl;
      }

      .message, .no-messages
      {
        transform: rotate(180deg);
        direction: ltr;
      }
      
      .emoji
      {
        width: 17px;
        height: 17px;
      }

      #close {
      font-size: 1.5rem;
      font-weight: 700;
      line-height: 1;
      color: #000;
      text-shadow: 0 1px 0 #fff;
      opacity: .5;
      cursor: pointer;
    }

    #close:hover, #close:focus {
      color: #000;
      text-decoration: none;
      opacity: .75;
    }

    #joint-file-display
    {
      display: none;
    }

    #dropdown-search
    {
      width: 350px;
    }

    #libsearchcatart {
          background-image: url('../icons/png/office/search.png');
          background-position: 10px 10px; 
          background-repeat: no-repeat;
          padding: 6px 12px 5px 40px;
          -webkit-transition: width 0.4s ease-in-out;
          transition: width 0.4s ease-in-out;
      }

      .btns {
      display: inline-block;
      font-weight: 400;
      text-align: center;
      white-space: nowrap;
      vertical-align: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      border: 1px solid transparent;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: 0.25rem;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    #img-loading
    {
      width: 30px;
    }

    .loader-file
    {
      display: none;
    }

    .search-contact
    {
      overflow-y: auto;
      height: 250px;
    }

    /*#back
    {
      display: none;
    }*/

    #content-empty
    {
      display: none;
    }

    /*#top-entreprise
    {
      display: none;
    }

    #zone_send_message_groupe
    {
      display: none;
    }*/




      

    </style>
        

         <title>KEDIS Online! | Messages</title>
    <!--c head-->
    </head>
    <!--*****************************************************-->
    <body class="bg-light">
    <!--Début body-->

   

        <!--Code PHP-->
                 <?php 
                    //session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND isset($_GET['id_connexion']) AND isset($_GET['idE']))   //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; //on protège la variable 
                      $get_id_connexion = $_GET['id_connexion'];
                      $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
                      $requser->execute(array($getid));

                      //l'expéditeur qui vous envoyé le message 
                      $idE = $_GET['idE']; 

                      $sql = $bdd->prepare("SELECT * FROM entreprise WHERE idE = ?");
                      $sql->execute(array($idE));

                      $info_entrep = $sql->fetch();
                      $nomE = $info_entrep['nomE'];

                      $userfos = $requser->fetch();
                      $getname = $userfos['nom_cl'];
                      $getprenom = $userfos['prenom_cl'];
                      $getmail = $userfos['email_cl'];
                      $getprofil = $userfos['profil_cl']; 
                      $sexe= $userfos['sexe_cl'];

                      //$getidE = $_GET['idE']; //on recupère l'id de l'entreprise
                      //$nomE = $_GET['nom_entreprise']; //on recupère le nom de l'entreprise

                      $login_required = $userfos['login_required'];
                      $id_connexion = $userfos['id_connexion'];


                      //on recupère maintenant l'expéditeur et le recepteur du message 
                      $get_mess = $bdd->prepare('SELECT * FROM messages WHERE (id_receiver = ? OR id_sender = ?) AND dernier_message = 1 ORDER BY id DESC LIMIT 4');
                      $get_mess->execute(array($getid, $getid));

                      $sender = 0;

                      $getsender = $get_mess->fetch();

                      if($getsender['id_sender'] == $getid)
                      {
                        $sender = $getsender['id_sender'];
                      }
                      else
                      {
                        $sender = $getsender['id_receiver'];
                      }


                      //on met à jour les messages donc lu 
                      /*$statut = 'lu';

                      $update = $bdd->prepare('UPDATE messages SET statut = ? WHERE id_receiver = ? AND id_sender = ?');
                      $update->execute(array($statut, $getid, $sender));*/


                      if($id_connexion == $get_id_connexion)
                      {
                        //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                        if($login_required == 1)
                        {

                  ?>

    <!--chargement de la page-->
      <div class="preload">
          <div id="floatingBarsG">
            <div class="blockG" id="rotateG_01"></div>
            <div class="blockG" id="rotateG_02"></div>
            <div class="blockG" id="rotateG_03"></div>
            <div class="blockG" id="rotateG_04"></div>
            <div class="blockG" id="rotateG_05"></div>
            <div class="blockG" id="rotateG_06"></div>
            <div class="blockG" id="rotateG_07"></div>
            <div class="blockG" id="rotateG_08"></div>
          </div>
        </div>             

     <div id="all-content">
        <main>  
          <div class="layout">
            <!-- Start of Navigation -->
            <div class="navigation">
              <div class="container bg-primary">
                <div class="inside">
                  <div class="nav nav-tab menu">
                    <?php

                      $requser = $bdd->prepare("SELECT * FROM user WHERE id_cl = ? ");
                      $requser->execute(array($getid));
                      $userfos = $requser->fetch();

                      if($userfos['statut'] == 'admin')
                      {
                    ?>
                        <a href="accueille.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>">
                          <img width="100" src="../img/K@Online-sans.png" alt="avatar">
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
                          <a href="unitexpl.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idE=<?php echo $idE; ?>&nom_entreprise=<?php echo $nom_E; ?>">
                            <img width="100" src="../img/K@Online-sans.png" alt="avatar">
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
                          <a href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nom_E; ?>&nom_unite_exploitation=<?php echo $nom_UE; ?>">
                            <img width="100" src="../img/K@Online-sans.png" alt="avatar">
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
                        <a href="dashboard.php?id=<?php echo $getid; ?>&id_connexion=<?php echo $id_connexion; ?>&idEU=<?php echo $idUE; ?>&nom_entreprise=<?php echo $nom_E; ?>&nom_unite_exploitation=<?php echo $nom_UE; ?>">
                            <img width="100" src="../img/K@Online-sans.png" alt="avatar">
                          </a>
                    <?php
                        }
                      }
                    ?>
                    <br><br>
                    <button class="btn"><img class="avatar-xl" src="../profil/<?php echo $getprofil; ?>.png" alt="avatar"></button>
                    <a href="#members" data-toggle="tab" class="active"><i class="material-icons active">account_circle</i></a>
                    <a href="#discussions" data-toggle="tab"><i class="material-icons">chat_bubble_outline</i></a>
                    <!--<a href="#notifications" data-toggle="tab" class="f-grow1"><i class="material-icons">notifications_none</i></a>-->
                    <button class="btn mode"><i class="material-icons">brightness_2</i></button>
                    <!--<a href="#settings" data-toggle="tab"><i class="material-icons">settings</i></a>-->
                    <a role="button" href="deconnexion.php?id=<?php echo $getid; ?>" class="btn power"><i class="material-icons">power_settings_new</i></a>
                  </div>
                </div>
              </div>
            </div>


            <!-- End of Navigation -->
            <!-- Start of Sidebar -->
            <div class="sidebar" id="sidebar">
              <div class="container">
                <div class="col-md-12">
                  <div class="tab-content">
                    <!-- Start of Contacts -->
                    <div class="tab-pane fade active show" id="members">
                      <!--<div class="search">
                        <form class="form-inline position-relative">
                          <input type="search" class="form-control" id="people" placeholder="Search for people...">
                          <button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
                        </form>
                        <button class="btn create" data-toggle="modal" data-target="#exampleModalCenter"><i class="material-icons">person_add</i></button>
                      </div>-->
                      <div class="list-group sort">
                        <!--<button class="btn filterMembersBtn active show" data-toggle="list" data-filter="all">Toutes</button>
                        <button class="btn filterMembersBtn" data-toggle="list" data-filter="online">En ligne</button>
                        <button class="btn filterMembersBtn" data-toggle="list" data-filter="offline">Hors ligne</button>-->
                      </div>            
                      <div class="contacts">
                        <div class="row">
                          <div class="col-md-8">
                            <h1>Entreprises</h1>
                          </div>
                          <div class="col-md-4 float-right">
                            <button id="back" class="btns btn-outline-info">Retour</button>
                          </div>
                        </div>
                        <h6 id="titre-entreprise"></h6>
                        <div class="list-group" id="contacts" role="tablist">
                          
                        </div>
                      </div>
                    </div>
                    <!-- End of Contacts -->
                    <!-- Start of Discussions -->
                    <div class="tab-pane fade" id="discussions">
                      <div class="search">
                        <form class="form-inline position-relative">
                          <input type="search" class="form-control" id="conversations" placeholder="Chercher une conversation...">
                          <button type="button" class="btn btn-link loop"><i class="material-icons">search</i></button>
                        </form>
                        <button class="btn create" data-toggle="modal" data-target="#startnewchat" title="nouvelle conversation"><i class="material-icons">create</i></button>
                      </div>
                      <div class="list-group sort">
                        <button class="btn filterDiscussionsBtn active show" data-toggle="list" data-filter="all">Tous</button>
                        <button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="read">Lus</button>
                        <button class="btn filterDiscussionsBtn" data-toggle="list" data-filter="unread">Non lus</button>
                      </div>            
                      <div class="discussions">
                        <h1>Discussions</h1>
                        <div class="list-group" id="chats" role="tablist">
                         
                         
                        </div>
                      </div>
                    </div>
                    <!-- End of Discussions -->
                    
                  </div>
                </div>
              </div>
            </div>
            <!-- End of Sidebar -->
            

            
            <div class="main">
              <div class="tab-content" id="nav-tabContent">
                <!-- Start of Babble -->
                <div class="babble tab-pane fade active show" id="list-chat" role="tabpanel" aria-labelledby="list-chat-list">
                  <!-- Start of Chat -->
                  <div class="chat" id="chat1">
                    <div class="top" id="top">
                      
                    </div>
                    <!--<div class="top" id="top-entreprise">
                      
                    </div>-->
                    <div class="content" id="content">
                      
                    </div>

                    <!--<div class="content" id="content-empty">
                      
                    </div>-->
                    <div class="container ">

                      <div id="joint-file-display">
                        <div class="row">
                          <div class="col-md-3">
                            <div class="progress">
                              <div class="progress-bar " id="progress" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                          <div class="col-md-9">
                            <label id="name-file"></label>.<label id="extention"></label> (<label id="size_file"></label>Kb) &nbsp;&nbsp; &nbsp;&nbsp;<span id="close" aria-hidden="true">&times;</span>
                          </div>
                        </div>
                      </div>

                      <div class="loader-file">
                        <label class="text-info">Envoie encours</label> <img id="img-loading" src="../img/loading.gif">
                      </div>
                      

                      <div class="col-md-12">
                        <div class="bottom" id="bottom">
                          <!--<textarea id="message_content" placeholder="Taper votre message..."></textarea>-->
                          <form class="position-relative w-100" action="">
                            <!--<button type="button" class="btn emoticons" id="emoticon"><i class="material-icons">insert_emoticon</i></button>-->
                            <textarea class="form-control border" rows="1" id="message_content" placeholder="Taper votre message"></textarea>
                            <!--<button type="button" class="btn send"><i class="material-icons">send</i></button>-->
                          </form>
                          <!--<form class="position-relative w-100" action="">
                            <textarea class="form-control" placeholder="Taper votre message..." rows="1" id=""></textarea>
                            <button class="btn emoticons"><i class="material-icons">insert_emoticon</i></button>
                            <button type="submit" class="btn send"><i class="material-icons">send</i></button>
                          </form>-->
                          <form id="form-attach">
                            <label>
                              <input type="file" id="upload-file">
                              <span class="btn attach d-sm-block d-none"><i class="material-icons">attach_file</i></span>
                            </label>
                          </form>
                          <label id="zone_send_message">
                            <span class="btn attach d-sm-block d-none" id="send_message"><i class="material-icons">send</i></span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End of Chat -->
                  <!-- Start of Call -->
                  
                </div>
                <!-- End of Babble -->
                
              </div>
            </div>
          </div> <!-- Layout -->
        </main>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="startnewchat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-dark" id="exampleModalLabel">Nouvelle conversation <label class="text-white" id="id-sender-user"></label></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <label for="contact" class="text-dark"><b>Contact</b></label>
                  <br>
                  <div class="btn-group">
                    <button type="button" class="btns btn-outline-info dropdown-toggle" id="contat-name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Rechercher une personne
                    </button>
                    <div class="dropdown-menu" id="dropdown-search">
                      <input type="search" id="libsearchcatart" class="form-control" placeholder="Rechercher les personnes...">
                      <br>
                      <div class="search-contact">
                        <div class='alert alert-light' role='alert'><h6 class='text-center'>Rechercher un contact... </h6></div>
                      </div>
                    </div>
                  </div>
                  <br><br>
                  <div class="form-group">
                    <label for="new_message_chat" class="text-dark"><b>Message</b></label>
                    <textarea class="form-control" id="new_message_chat" rows="4" placeholder="Taper votre message..." name="new_message_chat" required=""></textarea>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btns btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="button" class="btns btn-success" id="send_new_message_chat">Envoyer</button>
              </div>
            </div>
          </div>
        </div>




        
           
  </div>
    
        <!-- Bootstrap JS -->
           <!--<script src="../asserts/js/vendor/jquery-slim.min.js"></script>-->
        <script src="../asserts/js/jquery/jquery.min.js"></script>
        <script src="dist/js/vendor/popper.min.js"></script>
        <script src="dist/js/swipe.min.js"></script>
        <script src="dist/js/bootstrap.min.js"></script>

        <!--loader-->
        <!--<script src="assets/js/loader.js"></script>-->
        <!--Les emojo-->
        <!--<script type="text/javascript" src="../emoji/emojionearea.js"></script>-->

        <script src="../emoji/js/twemoji-picker.js"></script>

        <!--switch arlert-->
        <script src="assets/js/lib/sweetalert/sweetalert.min.js"></script>

        <!-- on fait appel aux script toast pour l'affichage des erreur en modal miniteux -->
        <script src="../asserts/js/toastr/toastr.min.js"></script>

        <script>  
        jQuery(document).ready(function($) 
        {

          /*setTimeout(function()
          {
            scrollToBottom(document.getElementById('content'));
          }, 1000);*/

          function scrollToBottom(el) { el.scrollTop = el.scrollHeight; }
          /*scrollToBottom(document.getElementById('content'));*/

          $('.preload').fadeOut(2000, function()
          {
            $('#content').fadeIn(500);
          });


          setInterval(affiche_message_groupe, 1000);
          affiche_message_groupe();

          function affiche_message_groupe()
          {
            var getid = '<?php echo $getid; ?>';
            var idE = '<?php echo $idE; ?>';

                $.ajax(
                  {
                    type  : 'POST', 
                    url   : 'message/affiche_message_groupe.php',
                    data  : 'getid=' + getid + '&idE=' + idE,
                    success:function(data)
                    {
                      $('#content').html(data);
                      //affiche_conversation();
                      //fixe_scroll();
                      //affiche_membres();
                    }
                  });
          }

          //on affiche le titre de l'entreprise en principale d'abord
          entreprise_titre_principal();
          function entreprise_titre_principal()
          {
            var idE = '<?php echo $idE; ?>';
            $.ajax(
              {
                type  : 'POST',
                url   : 'message/entreprise_titre.php',
                data  : 'idE=' + idE,
                success:function(data)
                {
                  $('#top').html(data);
                }
              });
          }

          //on affiche la liste des contact
          affiche_contact_entreprise_liste();
          function affiche_contact_entreprise_liste()
          {
            var idE = '<?php echo $idE; ?>';
            var getid = '<?php echo $getid; ?>';
            var id_connexion = '<?php echo $id_connexion; ?>';
            var nomE = '<?php echo $nomE; ?>'

            $.ajax(
              {
                type  : 'POST',
                url   : 'message/affiche_contact_entreprise_liste.php',
                data    : 'idE=' + idE + '&getid=' + getid + '&id_connexion=' + id_connexion,
                success:function(data)
                {

                  //window.location.href = 'message_groupe.php?id=' + getid + '&id_connexion=' + id_connexion + "&idE=" + idE;

                  $('#contacts').html(data);
                  $('#titre-entreprise').html('Membres : ' + nomE);
                  $('#back').css('display', 'block');

                }
              });
          }

          //affiche_contact_entreprise(); 

          function affiche_contact_entreprise()
          {
            var getid = '<?php echo $getid; ?>';
            var id_connexion = '<?php echo $id_connexion; ?>';

            $.ajax(
              {
                type  : 'POST',
                url   : 'message/affiche_contact_entreprise.php',
                data  : 'getid=' + getid + '&id_connexion=' + id_connexion, 
                success:function(data)
                {
                  $('#contacts').html(data);
                }
              });
          }




          $('#back').click(function()
            {
              affiche_contact_entreprise(); 
              $('#back').css('display', 'none');
              $('#titre-entreprise').html('');
            });

        

        

          /*$("#message_content").emojioneArea({
                  autoHideFilters: true,
                  search: false,
                  buttonTitle: "Utilisez la touche TAB pour insérer les emojis plus rapidement",
                  tonesStyle: "bullet",

              });*/

          /*$('#emoticon').click(function()
            {
              $('.emojionearea-button').click();
            });*/

            $('#message_content').twemojiPicker({
              placeholder: 'Taper votre message...',
              size: '30px',
              icon: 'grinning',
              iconSize: '25px',
              height: '50px',
              width: '100%',
              category: ['smile', 'cherry-blossom', 'video-game', 'oncoming-automobile', 'symbols'],
              categorySize: '30px',
              pickerPosition: 'top',
              pickerHeight: '200px',
              pickerWidth: '300px',
            });



          //setInterval(affiche_discution, 1000);
          affiche_discution();

          function affiche_discution()
          {
            var getid = '<?php echo $getid; ?>';
            //var id_sender = $('#id_sender').val();
            var sender = '<?php echo $sender; ?>';
            var id_connexion = '<?php echo $id_connexion; ?>';

            $.ajax(
              {
                type  : 'POST', 
                url   : 'message/affiche_message.php',
                data  : 'getid=' + getid + '&sender=' + sender + '&id_connexion=' + id_connexion,
                success:function(data)
                {
                  $('#chats').html(data);
                  //affiche_conversation();
                  //fixe_scroll();
                  //affiche_membres();
                }
              });
          }

          //on met à jour les messages lus
          /*function update_read_message()
          {
            var sender = '<?php echo $sender; ?>';
            var getid = '<?php echo $getid; ?>';

            $.ajax(
              {
                type  : 'POST', 
                url   : 'message/update_read_message.php',
                data  : 'getid=' + getid + '&sender=' + sender,
                success:function(data)
                {

                }
              });
          }*/

          //envoyer le message 
          $('#send_message').click(function()
            {
              var idE = '<?php echo $idE; ?>';
              var getid = '<?php echo $getid; ?>';
              var message_content = $('#message_content').val();
                
              var file = document.getElementById("upload-file").files[0];

              //alert(idE);

               if(file)
                {
                  var filename_extention = file.name;
                  var extention = filename_extention.split('.').pop().toLowerCase();
                  var filename = filename_extention.split('/').pop().split('.').shift();
                  var file_size = file.size;
                  var fileFinale = filename.substring(0,20);

                  if(file_size < 10240)
                  {
                    file_size = file_size;
                  }
                  else
                  {
                   file_size = parseInt(file_size/1024);
                  }

                  var form_data = new FormData();
                  form_data.append("upload-file", file);
                  form_data.append("filename", fileFinale);
                  form_data.append("extention", extention);
                  form_data.append("file_size", file_size);
                  form_data.append("getid", getid);
                  form_data.append("idE", idE);

                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'message/send_message_file_groupe.php',
                      data  : form_data, 
                      contentType:false,
                      cache :false,
                      processData:false,
                      success:function(data)
                      {
                        //alert(data);
                        $('.twemoji-textarea').text('');
                        $('#joint-file-display').css('display', 'none');
                        $('.loader-file').css('display', 'block');

                        setTimeout(function()
                          {
                            $('.loader-file').css('display', 'none');
                          }, 5000);
                      }
                    });
                }
                else
                {
                  if(message_content != '')
                  {
                    $.ajax(
                      {
                        type  : 'POST',
                        url   : 'message/send_message_groupe.php',
                        data  : 'getid=' + getid + '&idE=' + idE + '&message_content=' + message_content,
                        success:function(data)
                        {
                          affiche_message_groupe(idE);
                          $('.twemoji-textarea').text('');
                        }
                      });
                  }
                }
            });


          //rechercher les contacts pour une nouvelle conversation
          $('#libsearchcatart').keyup(function()
            {
              var contact = $('#libsearchcatart').val();

              if(contact != '')
              {
                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'message/search_user.php',
                    data  : 'contact=' + contact,
                    success:function(data)
                    {
                      $('.search-contact').html(data);
                    }
                  });
              }
              else
              {
                $('.search-contact').html("<div class='alert alert-light' role='alert'><h6 class='text-center'>Rechercher un contact... </h6></div>")
              }
            });


          //nouvelle conversation
          $('#send_new_message_chat').click(function()
            {
              var message_content = $('#new_message_chat').val();
              var sender = $('#id-sender-user').text();
              var getid = '<?php echo $getid; ?>';

              if(message_content != '')
              {
                if(sender != '')
                {
                  $.ajax(
                    {
                      type  : 'POST',
                      url   : 'message/send_message.php',
                      data  : 'getid=' + getid + '&id_sender=' + sender + '&message_content=' + message_content,
                      success:function(data)
                      {
                        affiche_discution();
                        valid3("Message envoyé avec succès !");
                        $('#id-sender-user').text('');
                        $('#contat-name').text('Rechercher une personne');
                        $('#new_message_chat').val('');
                        $('#startnewchat').modal('hide');
                      }
                    });
                }
                else
                {
                  err3("Veuillez d'abord sélectionner un contact S.V.P !");
                  $('#contat-name').removeClass('btn-outline-info');
                  $('#contat-name').addClass('btn-outline-danger');
                }
              }
            });


        $("#message_content").keyup(function()
          {
            //alert(1);
          });

        //setInterval(new_message_sender, 2000);
        //new_message_sender();

        function new_message_sender()
        {
          var sender = '<?php echo $sender; ?>';
          var getid = '<?php echo $getid; ?>';

          $.ajax(
            {
              type  : 'POST',
              url   : 'message/new_message_sender.php',
              data  : 'getid=' + getid + '&sender=' + sender,
              success:function(data)
              {
                //alert(data);
                if(data == 1)
                {
                  $("#message_content").val(1);
                  //setInterval(scrollToBottom(document.getElementById('content')), 500);
                }
              }
            });
        }


        //fermer la jointure du fichier
        $('#close').click(function()
          {
            $('#joint-file-display').css('display', 'none');
            $('#upload-file').val('');

            //on vas reinitialiser le form pour reset input file
            $('#form-attach')[0].reset();
            reset_animetion();
          });

        


        //setInterval(select_file, 1000);
        //select_file();

        $(document).on('change', '#upload-file', function(){

          var file = document.getElementById("upload-file").files[0];
          //var check_size = $('#check-size').text();

          var extentionValide = ["jpg", "jpeg", "png", "gif", "pdf", "docx", "txt", "zip", "rar", "csv", "xlxs", "pub", "pptx"];


            if(file)
            {
              var filename_extention = file.name;
              var extention = filename_extention.split('.').pop().toLowerCase();
              var filename = filename_extention.split('/').pop().split('.').shift();
              var file_size = file.size;

              if(extentionValide.lastIndexOf(extention) == -1)
              {
                sweetAlert("Erreur", "Veuillez choisir un fichier avec une extention valide !", "error");
                  //alert("La taille du fichier ne dois pas dépasser 10 Mo");
                $('#form-attach')[0].reset();
              }
              else
              {
                //alert(file_size)
                if(file_size < 10485760)
                {

                  if(file_size < 10240)
                  {
                    $('#size_file').text(file_size);
                  }
                  else
                  {
                    $('#size_file').text(parseInt(file_size/1024));
                  }

                  $('#joint-file-display').css('display', 'block');

                    var fileFinale = filename.substring(0,20);

                    $('#extention').text(extention);
                    $('#name-file').text(fileFinale);

                  if(file_size > 61440)
                  {
                    animation_progress_30sec();
                  }
                  else if(file_size > 40960)
                  {
                    animation_progress_20sec();
                  }
                  else if(file_size > 20480)
                  {
                    animation_progress_10sec();
                  }
                  else
                  {
                    animation_progress_default();
                  }
                }
                else
                {
                  sweetAlert("Erreur", "La taille du fichier ne dois pas dépasser 10 Mo", "error");
                  //alert("La taille du fichier ne dois pas dépasser 10 Mo");
                  $('#form-attach')[0].reset();
                }
              }
            } 
        });


      function animation_progress_30sec()
      {
        reset_animetion();
         $('#progress').animate(
              {
                width : '100%'}, {duration: 30000,
                specialEasing: {
                width: "linear",
                height: "easeOutBounce"
              }});
      }

      function animation_progress_20sec()
      {
        reset_animetion();
         $('#progress').animate(
              {
                width : '100%'}, {duration: 20000,
                specialEasing: {
                width: "linear",
                height: "easeOutBounce"
              }});
      }

      function animation_progress_10sec()
      {
        reset_animetion();
         $('#progress').animate(
              {
                width : '100%'}, {duration: 10000,
                specialEasing: {
                width: "linear",
                height: "easeOutBounce"
              }});
      }

      function animation_progress_default()
      {
        reset_animetion();
         $('#progress').animate(
              {
                width : '100%'}, {duration: 5000,
                specialEasing: {
                width: "linear",
                height: "easeOutBounce"
              }});
      }

      function reset_animetion()
      {
          $("#progress").css('width', '0%');
      }

      function getExtension(filename)
      {
        return filename.split('.').pop().toLowerCase();
      }
       
      function getFileName(filename) 
      {
        return filename.split('/').pop().split('.').shift();
      } 


      function err3(element){
                toastr.error(element,'Erreur',{
                  "positionClass": "toast-bottom-right",
                  timeOut: 5000,
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "preventDuplicates": true,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut",
                  "tapToDismiss": false

                })
              }

              function valid3(element)
              {
                toastr.success(element,'Succès',{
                  "positionClass": "toast-bottom-left",
                  timeOut: 5000,
                  "closeButton": true,
                  "debug": false,
                  "newestOnTop": true,
                  "progressBar": true,
                  "preventDuplicates": true,
                  "onclick": null,
                  "showDuration": "300",
                  "hideDuration": "1000",
                  "extendedTimeOut": "1000",
                  "showEasing": "swing",
                  "hideEasing": "linear",
                  "showMethod": "fadeIn",
                  "hideMethod": "fadeOut",
                  "tapToDismiss": false

                })
              }
            

      


        });
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
