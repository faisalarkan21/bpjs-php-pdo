<?php

require_once("session.php");

require_once("class.user.php");
$auth_user = new USER();


$user_id = $_SESSION['user_session'];

$stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
$stmt->execute(array(":user_id"=>$user_id));

$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen">

  <script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
  <link href="home.css" rel="stylesheet" type="text/css">
  <title>welcome - <?php print($userRow['user_email']); ?></title>
</head>

<body>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="font-family: Kotta One; font-size:23px;" class="navbar-brand" href="index.php"><span>Event Seminar</span></a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li   class="active"><a >Halaman Peserta</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
             <span class="glyphicon glyphicon-user"></span>&nbsp;Hallo  <?php echo $userRow['user_email']; ?>&nbsp;<span class="caret"></span></a>
             <ul class="dropdown-menu">
              <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
              <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
            </ul>
          </li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>


  <div class="clearfix"></div>


  <div class="container-fluid" style="margin-top:80px;">

    <div class="container">

    	<label style="font-family: Kotta One; font-size:20px;" class="h5">Selamat Datang : <?php print($userRow['user_name']); ?></label>

      <br/>
      <label style="font-family: Kotta One; font-size:20px;" class="h5">Anda Telah Terdaftar dengan rincian sebagai berikut : </label>
      
      <div class="form-group <?php echo !empty($nameError)?'error':'';?>"> 

       <form class="form-horizontal"  action="update.php" >

      <br/>
      <!--- Nama Input -->
      <div class="form-group <?php echo !empty($nameError)?'error':'';?>"> 

        <div class="controls col-md-5 <?php echo $red;?>">
          <label class="form-control-label">Nama</label>  
          <input class="form-control"  name="name" type="name" placeholder="Nama" value="<?php echo $userRow['user_name']; ?>" disabled >
          <?php if (!empty($nameError)): ?>
            <span class="help-inline text-danger" style="line-height:25px;"><?php echo "$nameError";?> </span>
          <?php endif; ?>

        </div>


      </div>  


      <!-- Email Input -->
      <div class="form-group control-group row <?php echo !empty($emailError)?'error':'';?>">

        <div class="controls col-md-5 <?php echo $red;?>">
          <label class="form-control-label">Email</label> 
          <input class="form-control" name="email" type="text" placeholder="Ex. Novan@gmail.com" value="<?php echo $userRow['user_email']; ?>" disabled>         
          <?php if (!empty($emailError)): ?>
            <span class="help-inline text-danger" style="line-height:25px;"><?php echo "$emailError";?> </span>
          <?php endif; ?>

        </div>

      </div>


  

      <!-- No Hp Input -->

      <div class="form-group control-group row <?php echo !empty($mobileError)?'error':'';?>">  

        <div class="controls col-md-5 <?php echo $red;?>">
          <label class="form-control-label">No hanphone</label>
          <input class="form-control" name="mobile" type="text" placeholder="No handphone" value="<?php echo $userRow['mobile']; ?>" disabled>

          <?php if (!empty($mobileError)): ?>
            <span class="help-inline text-danger" style="line-height:25px;"><?php echo "$mobileError";?> </span>
          <?php endif; ?>

        </div>

      </div>







      <div class="form-actions col-md-offset-2" style="line-height:50px;">
        <button id="clicker" type="submit" class="btn btn-success">Ubah</button>
        <a class="btn btn-danger" href="index.php">Kembali</a>    
      </div>



      <br/>
      <br/>
    </form>

      

    </div>

    <script src="css/bootstrap.min.js"></script>


    <script type="text/javascript">

$().ready(function() {


    $('#clicker').click(function() {
        $('input').each(function() {
            if ($(this).attr('disabled')) {
                $(this).removeAttr('disabled');
            }
            else {
                $(this).attr({
                    'disabled': 'disabled'
                });
            }
        });
    });
});


    </script>  


  </body>
  </html>