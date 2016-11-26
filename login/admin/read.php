<?php 
include '../database.php';
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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>
</head>

<body >
	<div class="container">

		<div class="span10 offset1">
			<div class="row">
				<br/>
				<h3 align="center">Data Lengkap Peserta</h3>
				<br/>
			</div>

			<div class="form-horizontal" >
				<div class="control-group">
					<label class="control-label">Nama</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data['user_name'];?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Alamat Email</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data['user_email'];?>
						</label>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">No Handphone</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data['mobile'];?>
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Jenis Kelamin</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data['gender'];?>
						</label>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label">Tanggal Daftar</label>
					<div class="controls">
						<label class="checkbox">
							<?php echo $data['joining_date'];?>
						</label>
					</div>
				</div>

				<div class="form-actions">
					<a class="btn" href="halaman-admin.php">Back</a>
				</div>


			</div>
		</div>

	</div> <!-- /container -->
</body>
</html>