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
    <title>KEDIS Oline! | Nouveau message</title>
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
                        <li class="breadcrumb-item active">Nouveau message</li>
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

                                        

                                        <div class="mt-4">

                                            <form role="form">
                                                <div class="form-group">
                                                    <input type="email" class="form-control" placeholder="A ">
                                                </div>

                                                <!--<div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Sub">
                                                </div>-->
                                                <div class="form-group">
                                                    <textarea name="name" rows="8" cols="80" class="form-control" style="height:300px" placeholder="Ecrire votre message..."></textarea>
                                                </div>

                                                <div class="form-group m-b-0">
                                                    <div class="text-right">
                                                        <!--<button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-floppy-o"></i></button>
                                                        <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-trash-o"></i></button>-->
                                                        <button class="btn btn-purple waves-effect waves-light"> <span>Envoyer</span> <i class="fa fa-send m-l-10"></i> </button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <!-- end card-->

                                    </div>
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