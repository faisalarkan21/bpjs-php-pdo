<!DOCTYPE html>
<?php
session_start();
if($_SESSION){
  header("Location: user.php");
}
?>


<html >
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>


  <link rel="stylesheet" href="css/reset.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/style.css">




</head>

<body>


  <!-- Buat Login -->

  <?php
  if(isset($_POST['login'])){
    include("koneksi.php");

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $level=1;

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($query) == 0){
      echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
    }else{

     $row = mysqli_fetch_assoc($query);

     if($row['level'] == 1 && $level == 1){
      $_SESSION['username']=$username;
      $_SESSION['level']='Administrator';
      header("Location: admin/home-admin.php");
    }else{
      echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
    }

  }
}
?>


<!-- Register Nang wkkw -->

<?php
//including the database connection file

require 'database.php';

if(isset($_POST['submit'])) { 
  $nama = $_POST['nama'];
  $password =  md5($_POST['passwordulangi']);
  $email = $_POST['email'];
  $bpjs = $_POST['bpjs'];
  $hp = $_POST['hp'];


    // if all the fields are filled (not empty) 

    //insert data to database 
 // $result = mysql_query("INSERT INTO users(nama,password,email,bpjs,hp) VALUES('$nama','$password','$email','$bpjs','$hp')");

    //display success message

  //echo "<font color='green'>Data added successfully.";
  //echo "<br/><a href='index.php'>View Result</a>";

  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO users(username,password,nama_level,email,bpjs, mobile,level) values(?, ?, ?,?,?,?,?)";
  $q = $pdo->prepare($sql);

 
  $q->execute(array($nama,$password,"User",$email,$bpjs,$hp,3));
  Database::disconnect();



//  $input = mysql_query("INSERT INTO users(nama,password,email,bpjs,hp) VALUES('$nama','$password','$email','$bpjs','$hp')") or die(mysql_error());
  
  //jika query input sukses
 





  
}

?>





<!-- Form Mixin-->
<!-- Input Mixin-->
<!-- Button Mixin-->
<!-- Pen Title-->
<div class="pen-title">
  <h1>Login Admin BPJS</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="janganditoggle"><i class=""></i>
    <div class="tooltip">Daftar BPJS</div>
  </div>
  <div class="form">
    <h2>Login Sebagai Administrator </h2>
    <form method="post">
      <input type="text" name="username" placeholder="Nama Akun" required="required"/>
      <input type="password" name="password" placeholder="Kata Sandi" required="required"/>


      <button type="submit" name="login">Masuk</button>
    </form>
  </div>
  <div class="form">
    <h2>Daftar Akun BPJS</h2>
    <form method="post">
      <input type="text" name="nama" placeholder="Nama Akun" required="required"/>
      <input id="password1" type="password" name="password" placeholder="Kata Sandi" required="required"/>
      <input id="password2" type="password" name="passwordulangi" placeholder="Ulangi Kata Sandi" required="required"/>
      <input type="email" name="email" placeholder="Alamat Email" required="required"/>
      <input type="tel" name="bpjs" placeholder="No BPJS" required="required"/>
      <input type="tel" name="hp" placeholder="No Telepon" required="required"/>      
      <button type="submit" name="submit">Daftar</button>
    </form>
  </div>

</div>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js'></script>


<script src="js/index.js"></script>




</body>
<br/>
<br/>
<br/>
<br/>

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
