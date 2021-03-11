<?php
  include('../connecting_data_base.php');

  $getid = $_POST['getid'];
  $id_connexion = $_POST['id_connexion'];


  //on commence par sélectionner les entreprises géré par l'utilisateur 
  $sql = $bdd->prepare("SELECT * FROM entreprise, gestion WHERE id_user = ? AND idE = id_E");
  $sql->execute(array($getid));

  while($row =  $sql->fetch())
  {
 ?>
 	<a href="#" option="<?php echo $row['idE']; ?>" name="<?php echo $row['nomE']; ?>"  class="filterMembers all online contact get-membre" data-toggle="list">
		<img class="avatar-md" src="../logo/entreprise/<?php echo $row['logo']; ?>.png" data-toggle="tooltip" data-placement="top" title="Janette" alt="avatar">
		<div class="data">
			<h5><?php echo $row['nomE']; ?></h5>
			<p><?php echo $row['villeE'].', '.$row['paysE']; ?></p>
		</div>
	</a>

 <?php
 }
 ?>

 <script type="text/javascript">
 jQuery(document).ready(function($) 
 {
 	$('.get-membre').click(function()
	{
		var idE = $(this).attr('option');
	 	var getid = '<?php echo $getid; ?>';
	 	var name = $(this).attr('name');
	 	var id_connexion = '<?php echo $id_connexion; ?>';

	 	$.ajax(
	 		{
	 			type 	: 'POST',
	 			url 	: 'message/affiche_contact_entreprise_liste.php',
	 			data  	: 'idE=' + idE + '&getid=' + getid + '&id_connexion=' + id_connexion,
	 			success:function(data)
	 			{

	 				window.location.href = 'message_groupe.php?id=' + getid + '&id_connexion=' + id_connexion + "&idE=" + idE;

	 				/*$('#contacts').html(data);
	 				$('#titre-entreprise').html('Membres : ' + name);
	 				$('#back').css('display', 'block');

	 				//on cache la zone du message contact et on affiche la zone du message du goupe
	 				$('#content').css('display', 'none');
	 				$('#content-empty').css('display', 'block');

	 				//de même pour l'entête
	 				$('#top').css('display', 'none');
	 				$('#top-entreprise').css('display', 'block');

	 				//de même pour le bouton d'envoie
	 				$('#zone_send_message').css('display', 'none');
	 				$('#zone_send_message_groupe').css('display', 'block');

	 				affiche_message_groupe(idE);
	 				entreprise_titre(idE);*/
	 			}
	 		});
	});

	function affiche_message_groupe(idE)
	{
		var getid = '<?php echo $getid; ?>';

        $.ajax(
          {
            type  : 'POST', 
            url   : 'message/affiche_message_groupe.php',
            data  : 'getid=' + getid + '&idE=' + idE,
            success:function(data)
            {
              $('#content-empty').html(data);
              //affiche_conversation();
              //fixe_scroll();
              //affiche_membres();
            }
          });
	}

	function entreprise_titre(idE)
	{
		$.ajax(
			{
				type 	: 'POST',
				url 	: 'message/entreprise_titre.php',
				data 	: 'idE=' + idE,
				success:function(data)
				{
					$('#top-entreprise').html(data);
				}
			});
	}

	//envoie du message dans le groupe 
	$('#zone_send_message_groupe').click(function()
		{
            var idE = $('#id_entrep').text();
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
                form_data.append("sender", sender);

                $.ajax(
                  {
                    type  : 'POST',
                    url   : 'message/send_message_file.php',
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
 });
 </script>