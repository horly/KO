  <!--Les emojis-->
<!--<link rel="stylesheet" type="text/css" href="../emoji/emojionearea.min.css" media="screen">-->
  <link rel="stylesheet" href="../emoji/css/twemoji-picker.css" />
<style>
/*body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}*/

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 190px;
  border-radius: 10px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  /*border: 3px solid #f1f1f1;*/
  z-index: 9;
  width: 400px;
}

/* Add styles to the form container */
.form-container {
  /*max-width: 300px;*/
  padding: 10px;
  background-color: white;
}

/* Full-width textarea */
/*.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}*/

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

#zone-message
{
  /*overflow-y: scroll;*/
  height: 250px;
  background-color: white;

  overflow: auto;
  transform: rotate(180deg);
  direction: rtl;
}

.messages
{
  transform: rotate(180deg);
  direction: ltr;
}

.equipe
{
  width: 70px;
  display: inline-block;
  text-align: center;
  padding: 5px;
}

span.b {
  display: inline-block; 
}

.card-message
{
  border-radius: 5px;
  box-shadow: 0px 0px 20px #aaaaaa;
}

.card-body-message {
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 0.70rem;
}


/*.zone-equipe
{
  display: inline-block;
}*/
</style>
</head>
<body>

<?php

    $statut = 'non_lu';
    //on vérifie s'il y a un nouveau message
    $get_message_admin_user = $bdd->prepare("SELECT * FROM message_admin WHERE id_sender = ? AND statut = ? AND id_admin != 0");
    $get_message_admin_user->execute(array($getid, $statut));
    $count_message_admin_user = $get_message_admin_user->rowCount();

?>

<button class="open-button btn btn-info openForm">
  <span class="step size-21">
    <i class="icon ion-chatbox"></i>
  </span>
  &nbsp;&nbsp;Chat 
  <?php
      if(preg_match("/^[1-9]+/", $count_message_admin_user))
      {
  ?>
      <span class="badge badge-danger text-white"><?php echo $count_message_admin_user; ?></span>
  <?php
      }
  ?>
</button>

<div class="chat-popup card border border-info" id="myForm">
  <div class="modal-header bg-info text-white">
    <div class="row">
      <div class="col-md-10">
        <h5><b>Discussion</b></h5>
      </div>
      <div class="col-md-2">
        <button type="button" class="close closeForm">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
  <div class="form-container bg-light card-body">
    <h5 class="text-center">Bonjour <b><?php echo $getprenom; ?></b> lancer une discution avec notre équipe.</h5>
    <div class="p-3 mb-2 zone-equipe text-center">
        <span class="b">
          <img src="../img/equipe2.jpg" class="rounded-circle mx-auto d-block equipe" alt="...">
        </span>
        <span class="b">
          <img src="../img/equipe1.jpg" class="rounded-circle mx-auto d-block equipe" alt="...">
        </span>
        <br>
        <small class="text-muted ">Avez-vous des difficultés ? Nous pouvons répondre à toutes vos questions. </small>
    </div>

    <div class="text-white border" id="zone-message">
      
      <div class="messages">
        <!--<div class="p-3 mb-2 bg-transparent"> 
          <div class="row">
            <div class="col-md-9">

              <span class="text-secondary"><b>Moi</b></span>
              <div class="card-message bg-primary text-white">
                  <div class="card-body-message">
                    Lorem ipsum dolor sit amet, sdqfs.
                  </div>  
              </div>
              <span class="text-secondary time-message">2019:08:30 à 16:26</span>

            </div>

            <div class="col-md-3">
              <img src="../profil/<?php echo $getid; ?>.png" alt="..." class="rounded-circle" height="50" width="50">
            </div>

          </div>
        </div>

        <div class="p-3 mb-2 bg-transparent"> 
          <div class="row">

            <div class="col-md-3">
              <img src="../profil/<?php echo 4 ?>.png" alt="..." class="rounded-circle" height="50" width="50">
            </div>

            <div class="col-md-9">

              <span class="text-secondary"><b>Dim</b></span>
              <div class="card-message bg-light text-secondary">
                  <div class="card-body-message">
                    Lorem ipsum dolor sit amet, sdqfs.
                  </div>  
              </div>
              <span class="text-secondary time-message">2019:08:30 à 16:26</span>

            </div>

          </div>
        </div>-->
      </div>

    </div>

    <label for="msg"><b>Message</b></label>
    <textarea class="form-control" id="chat-box" placeholder="Taper votre message.." name="msg" required></textarea>
    <!--<button type="submit" class="btn">Send</button>-->
    <!--<button type="button" class="btn cancel" onclick="closeForm()">Close</button>-->
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-danger closeForm">
      <span class="step size-21">
        <i class="icon ion-android-close"></i>
      </span>
      &nbsp;&nbsp;Fermer
    </button>
    <button type="button" class="btn btn-success" id="send-message-admin">
    <span class="step size-21">
        <i class="icon ion-android-send"></i>
      </span>
      &nbsp;&nbsp;Envoyer
    </button>
  </div>
</div>

<!--Les emojo-->
<!--<script type="text/javascript" src="../emoji/emojionearea.js"></script>-->
<script src="../asserts/js/jquery/jquery.min.js"></script>
 <script src="../emoji/js/twemoji-picker.js"></script>
<script>
  jQuery(document).ready(function($) 
  {
      $('#chat-box').twemojiPicker({
            placeholder: 'Taper votre message...',
            size: '30px',
            icon: 'grinning',
            iconSize: '25px',
            iconPosition:'left',
            height: '100px',
            width: '100%',
            category: ['smile', 'cherry-blossom', 'video-game', 'oncoming-automobile', 'symbols'],
            categorySize: '30px',
            pickerPosition: 'top',
            pickerHeight: '200px',
            pickerWidth: '300px',
          });

    $('.openForm').click(function()
      {
        document.getElementById("myForm").style.display = "block";
      });

    $('.closeForm').click(function(){
      document.getElementById("myForm").style.display = "none";
    });

    setInterval(affiche_conversation, 1000);
    affiche_conversation();

    function affiche_conversation()
    {
      var getid = '<?php echo $getid; ?>';

      $.ajax(
        {
          type  : 'POST', 
          url   : 'message/affiche_conversation_send_admin.php',
          data  : 'getid=' + getid,
          success:function(data)
          {
            $('.messages').html(data);
            //affiche_conversation();
            //fixe_scroll();
            //affiche_membres();
          }
        });
    }

    //envoyer le message
    $('#send-message-admin').click(function()
      {
        var getid = '<?php echo $getid; ?>';
        var message = $('#chat-box').val();

        if(message != '')
        {
          $.ajax(
            {
              type  : 'POST',
              url   : 'message/send_message_admin.php',
              data  : 'getid=' + getid + '&message=' + message,
              success:function(data)
              {
                $('.twemoji-textarea').text('');
              }
            });
        }
      });

    /*$("#chat-box").emojioneArea({
        autoHideFilters: true,
        search: false,
        buttonTitle: "Utilisez la touche TAB pour insérer les emojis plus rapidement",
        tonesStyle: "bullet",

    });*/
  });  
</script>

