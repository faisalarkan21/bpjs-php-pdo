<!DOCTYPE html>
<html>

<?php
session_start();
if(empty($_SESSION)){
  header("Location: ../../index.php");
}


include '../database.php';

?>


<?php  


?>


<?php 


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //something posted

  if (isset($_POST['submit'])) {

    $id = null;
    if ( !empty($_GET['id'])) {
      $id = $_REQUEST['id'];
    }

    if ( null==$id ) {
      header("Location: home-admin.php");
    } else {
      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "DELETE FROM users where id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($id));

      Database::disconnect();
    }

    header("Location: home-admin-update.php");



        // btnDelete
  } else {
        //assume btnSubmit
  }
}







$id = null;
if ( !empty($_GET['id'])) {
  $id = $_REQUEST['id'];
}

if ( null==$id ) {
  header("Location: home-admin.php");
} else {
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM users where id = ?";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  $data = $q->fetch(PDO::FETCH_ASSOC);
  Database::disconnect();
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
      
      <body>
        <div class="container">


          <!-- Dari sini  !-->
          <div class="container">

            <div class="">
              <div class="row">
                <br/>
                <h3 align="center">Data Lengkap User</h3>
                <br/>
              </div>




            </div>
          </div>


          <!--- NEwwwwwww !-->
          <form class="form-horizontal" method="post" id="contact_form">
            <fieldset>


              <div class="form-group">
                <label class="col-md-4 control-label">Nama</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input disabled name="user-name" placeholder="First Name" class="form-control" value="<?php echo $data['nama'];?>"  type="text">
                  </div>
                </div>
              </div>

              <!-- Text input-->

              <div class="form-group">
                <label class="col-md-4 control-label">User Name</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input disabled name="username" placeholder="First Name" class="form-control" value="<?php echo $data['username'];?>"  type="text">


                  </div>
                </div>
              </div>






              <div class="form-group">
                <label class="col-md-4 control-label">User Name</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input disabled name="user-name" placeholder="First Name" class="form-control" value="<?php echo $data['email'];?>"  type="text">
                  </div>
                </div>
              </div>


              <!-- Text input-->

              <div class="form-group">
                <label class="col-md-4 control-label" >No Handphone</label> 
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input disabled name="mobile" placeholder="Last Name" class="form-control" value="<?php echo $data['mobile'];?>" type="text">
                  </div>
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label">Level User</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input disabled name="level" placeholder="E-Mail Address" class="form-control" value="<?php echo $data['nama_level'];?>" type="text">
                  </div>
                </div>
              </div>


              <!-- Text input-->

              <div class="form-group">
                <label class="col-md-4 control-label">No BPJS</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input disabled name="bpjs" placeholder="(845)555-1212" class="form-control" value="<?php echo $data['bpjs'];?>" type="text">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label">Waktu Terdataftar</label>  
                <div class="col-md-4 inputGroupContainer">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                    <input disabled name="bpjs" placeholder="(845)555-1212" class="form-control" value="<?php echo $data['joining_date'];?>" type="text">
                  </div>
                </div>
              </div>


            <div class="col-md-4 col-md-offset-4">            
             
            
                <p class="alert alert-error">Apakah anda yakin untuk mendelete <?php echo $data['nama'];?> ?</p>
                <div class="form-actions">
                 <input class="btn btn-danger" value="Delete User"  type="submit" name="submit" ></input>
                 <a class="btn btn-primary" href="home-admin-delete.php">Kembali</a>
               </div>
            
           </div>

         </div> <!-- /container -->
       </body>
       </html>
