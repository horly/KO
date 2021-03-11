<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <title>KEDIS Oline! | Boite de réception</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assert2/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assert2/css/helper.css" rel="stylesheet">
    <link href="../assert2/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">

    <!--Code PHP-->
                <?php 
                    //session_start();
                    include('connecting_data_base.php');

                    if(isset($_GET['id']) AND $_GET['id'] > 0 AND isset($_GET['id_connexion']))  //si la variable id qu'on a transité existe dans l'url 
                    {
                      $getid = $_GET['id']; //on protège la variable
                      $get_id_connexion = $_GET['id_connexion'];

                      $requser = $bdd->prepare("SELECT * FROM administrateur WHERE id = ? ");
                      $requser->execute(array($getid));

                      $userfos = $requser->fetch();
                      $getname = $userfos['nom'];
                      $getprenom = $userfos['prenom'];
                      $getmail = $userfos['email'];
                      $getprofil = $userfos['profil']; 
                      $sexe= $userfos['sexe'];
                      $login_required = $userfos['login_required'];
                      $id_connexion = $userfos['id_connexion'];


                      if($id_connexion == $get_id_connexion)
                      {
                      //on vérivie si l'utilisteur s'est connécté avec le login, sinon deconnexion automatique
                          if($login_required == 1)
                          {
                              
                  ?>
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <?php include('navbar_admin.php')?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php include('navigation_admin.php');?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Message</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Message</a></li>
                        <li class="breadcrumb-item active">Boite de réception</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-content">
                                    <!-- Left sidebar -->
                                    <?php include('navigation_message.php');?>
                                    <!-- End Left sidebar -->

                                    <div class="inbox-rightbar">

                                        

                                        <div class="">
                                            <div class="mt-4">
                                                <div class="">
                                                    <ul class="message-list">
                                                        <li class="unread">
                                                            <a href="email-read.html">
                                                                <div class="col-mail col-mail-1">
                                                                    <div class="checkbox-wrapper-mail">
                                                                        <input type="checkbox" id="chk1">
                                                                        <label class="toggle" for="chk1"></label>
                                                                    </div>
                                                                    <p class="title">Lucas Kriebel (via Twitter)</p><span class="star-toggle fa fa-star-o"></span>
                                                                </div>
                                                                <div class="col-mail col-mail-2">
                                                                    <div class="subject">Lucas Kriebel (@LucasKriebel) has sent you a direct message on Twitter! &nbsp;&ndash;&nbsp;
                                                                        <span class="teaser">@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span>
                                                                    </div>
                                                                    <div class="date">11:49 am</div>
                                                                </div>
                                                            </a>
                                                        </li>

                                                       
                                                        <li>
                                                            <a href="email-read.html">
                                                                <div class="col-mail col-mail-1">
                                                                    <div class="checkbox-wrapper-mail">
                                                                        <input type="checkbox" id="chk16">
                                                                        <label class="toggle" for="chk16"></label>
                                                                    </div>
                                                                    <p class="title">Stack Exchange</p><span class="star-toggle fa fa-star-o"></span>
                                                                </div>
                                                                <div class="col-mail col-mail-2">
                                                                    <div class="subject">1 new items in your Stackexchange inbox &nbsp;&ndash;&nbsp; <span class="teaser">The following items were added to your Stack Exchange global inbox since you last checked it.</span>
                                                                    </div>
                                                                    <div class="date">Feb 21</div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="email-read.html">
                                                                <div class="col-mail col-mail-1">
                                                                    <div class="checkbox-wrapper-mail">
                                                                        <input type="checkbox" id="chk17">
                                                                        <label class="toggle" for="chk17"></label>
                                                                    </div>
                                                                    <p class="title">Google Drive Team</p><span class="star-toggle fa fa-star-o"></span>
                                                                </div>
                                                                <div class="col-mail col-mail-2">
                                                                    <div class="subject">You can now use your storage in Google Drive &nbsp;&ndash;&nbsp; <span class="teaser">Hey Nicklas Sandell! Thank you for purchasing extra storage space in Google Drive.</span>
                                                                    </div>
                                                                    <div class="date">Feb 20</div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li class="unread">
                                                            <a href="email-read.html">
                                                                <div class="col-mail col-mail-1">
                                                                    <div class="checkbox-wrapper-mail">
                                                                        <input type="checkbox" id="chk18">
                                                                        <label class="toggle" for="chk18"></label>
                                                                    </div>
                                                                    <p class="title">me, Susanna (11)</p><span class="star-toggle fa fa-star-o"></span>
                                                                </div>
                                                                <div class="col-mail col-mail-2">
                                                                    <div class="subject">Train/Bus &nbsp;&ndash;&nbsp; <span class="teaser">Yes ok, great! I'm not stuck in Stockholm anymore, we're making progress.</span>
                                                                    </div>
                                                                    <div class="date">Feb 19</div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="email-read.html">
                                                                <div class="col-mail col-mail-1">
                                                                    <div class="checkbox-wrapper-mail">
                                                                        <input type="checkbox" id="chk19">
                                                                        <label class="toggle" for="chk19"></label>
                                                                    </div>
                                                                    <p class="title">Peter, me (3)</p><span class="star-toggle fa fa-star-o"></span>
                                                                </div>
                                                                <div class="col-mail col-mail-2">
                                                                    <div class="subject">Hello &nbsp;&ndash;&nbsp; <span class="teaser">Trip home from Colombo has been arranged, then Jenna will come get me from Stockholm. :)</span>
                                                                    </div>
                                                                    <div class="date">Mar. 6</div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="email-read.html">
                                                                <div class="col-mail col-mail-1">
                                                                    <div class="checkbox-wrapper-mail">
                                                                        <input type="checkbox" id="chk20">
                                                                        <label class="toggle" for="chk20"></label>
                                                                    </div>
                                                                    <p class="title">me, Susanna (7)</p><span class="star-toggle fa fa-star-o"></span>
                                                                </div>
                                                                <div class="col-mail col-mail-2">
                                                                    <div class="subject">Since you asked... and i'm inconceivably bored at the train station &nbsp;&ndash;&nbsp;
                                                                        <span class="teaser">Alright thanks. I'll have to re-book that somehow, i'll get back to you.</span>
                                                                    </div>
                                                                    <div class="date">Mar. 6</div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div>
                                            <!-- panel body -->
                                        </div>
                                        <!-- panel -->

                                        <div class="row">
                                            <div class="col-7">
                                                Afficher 1 - 20 de 289
                                            </div>
                                            <div class="col-5">
                                                <div class="btn-group float-right">
                                                    <button class="btn btn-gradient waves-effect" type="button"><i class="fa fa-chevron-left"></i></button>
                                                    <button class="btn btn-gradient waves-effect" type="button"><i class="fa fa-chevron-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="../assert2/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assert2/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="../assert2/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assert2/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="../assert2/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assert2/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../assert2/js/custom.min.js"></script>

</body>

</html>
<?php
    }
    else
    {
      header('location:deconnexion_admin.php?id='.$getid);
    }
  }
  else
  {
    header('location:deconnexion_admin.php?id='.$getid);
  }
}  
else
{
  header('location:error404.php');
}
?>