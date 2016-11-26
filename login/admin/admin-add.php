<!DOCTYPE html>
<html>




<?php

include '../database.php';

session_start();
if(empty($_SESSION)){
  header("Location: ../../index.php");
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted

  if (isset($_POST['submit'])) {



    $level_id = null;
    $nama = $_POST['username'];
    $nama_asli = $_POST['nama'];
    $password =  md5($_POST['passwordulangi']);
    $email = $_POST['email'];
    $bpjs = $_POST['bpjs'];
    $hp = $_POST['mobile'];
    $nama_level = $_POST['nama_leveldrop'];

    if ($nama_level == "Administrator"){

      $level_id=1;

    }elseif ($nama_level == "User") {
     $level_id=3;
   }


   try {
     $pdo = Database::connect();
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO users(username,nama,password,nama_level,email,bpjs, mobile,level) values(?, ?, ?,?,?,?,?,?)";
     $q = $pdo->prepare($sql);


     $q->execute(array($nama,$nama_asli,$password,"User",$email,$bpjs,$hp,3));
     Database::disconnect();
     header("Location: home-admin.php");

   }catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }



        // btnDelete
} else {
        //assume btnSubmit
}
}








?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>
      <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

          <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b></b>BPJS</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg">Website<b></b>  BPJS</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->

              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                  <!-- Messages: style can be found in dropdown.less-->

                  <!-- Notifications: style can be found in dropdown.less -->

                  <!-- Tasks: style can be found in dropdown.less -->

                  <!-- User Account: style can be found in dropdown.less -->
                  <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" style="margin-right:30px ;" data-toggle="dropdown">
                     Anda login sebagai : 
                     <span class="hidden-xs">  <?php echo $_SESSION['username']; ?></span>
                   </a>
                   <ul   class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">

                      <p>
                       Selamat Datang   <?php echo $_SESSION['username']; ?>
                       <small>Anda Telah Login sebagai  <?php echo $_SESSION['level']; ?></small>
                       <br/>
                       Tekan Sign out untuk keluar
                     </p>

                   </li>
                   <!-- Menu Body -->

                   <!-- Menu Footer-->
                   <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" name="keluar" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              
            </ul>
          </div>

          <!-- Disini -->

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          
          <!-- search form -->

          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Halaman Administrator</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="home-admin.php"><i class="fa fa-circle-o"></i>Daftar User</a></li>
                <li class="active"><a href="home-admin-update.php"><i class="fa fa-circle-o"></i>Ubah Data User</a></li>
                <li class="active"><a href="home-admin-add.php"><i class="fa fa-circle-o"></i>Tambah User</a></li>
                <li class="active"><a href="home-admin-delete.php"><i class="fa fa-circle-o"></i>Delete User</a></li>

              </ul>
            </li>

          </section>
          <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <h1>
              Halaman Administrator BPJS
              <small>Keterangan Data User BPJS</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-user"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
          </section>
          <!-- Dari sini  !-->
          <div class="container">

            <div class="">
              <div class="row">
               
                <h3 align="center">Tambah User Baru</h3>
                <br/>
              </div>




            </div>
          </div>


          <!--- NEwwwwwww !-->
          <form class="form-horizontal" method="post"  id="contact_form">
            <fieldset>


              <div class="form-group">
                <label class="col-md-4 control-label">Nama</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input  name="nama" placeholder="First Name" class="form-control"  type="text"  required="required">
                  </div>
                </div>
              </div>

              <!-- Text input-->

              <div class="form-group">
                <label class="col-md-4 control-label">User Name</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input  name="username" placeholder="First Name" class="form-control"  type="text"  required="required">


                  </div>
                </div>
              </div>






              <div class="form-group">
                <label class="col-md-4 control-label">Email</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input  name="email" placeholder="First Name" class="form-control"   type="email"  required="required">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">Password</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input  id="password1" type="password"  name="password" placeholder="First Name" class="form-control"   required="required">


                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">Ulangi Password</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="password2" type="password" name="passwordulangi" placeholder="First Name" class="form-control"  type="text"  required="required">


                  </div>
                </div>
              </div>




              <!-- Text input-->

              <div class="form-group">
                <label class="col-md-4 control-label" >No Handphone</label> 
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input  name="mobile" placeholder="Last Name" class="form-control"  type="text"  required="required">
                  </div>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label">Level User</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>



                    <select class="form-control" name="nama_leveldrop" id="sel1" >
                      <option>Administrator</option>
                      <option >User</option>                    
                    </select>
                  </div>
                </div>
              </div>


              <!-- Text input-->

              <div class="form-group">
                <label class="col-md-4 control-label">No BPJS</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input  name="bpjs" placeholder="(845)555-1212" class="form-control" type="text"  required="required">
                  </div>
                </div>
              </div>






              <div class="form-actions col-md-9 col-md-offset-6">
                <br/>
                <a class="btn btn-primary" href="home-admin.php">Kembali</a>
                <input class="btn btn-success" value="Tambah User"  type="submit" name="submit" ></input>


              </div>
            </div> <!-- /container -->


            <!-- Ampe sini  !-->




          </div><!-- /.content-wrapper -->
        
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
   
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

  </body>



<script type="text/javascript">
  window.onload = function () {
    document.getElementById("password1").onchange = validatePassword;
    document.getElementById("password2").onchange = validatePassword;
  }
  function validatePassword(){
    var pass2=document.getElementById("password2").value;
    var pass1=document.getElementById("password1").value;
    if(pass1!=pass2)
      document.getElementById("password2").setCustomValidity("Passwords Don't Match");
    else
      document.getElementById("password2").setCustomValidity('');  
//empty string means no validation error
}
</script>








  </html>
