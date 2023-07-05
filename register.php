<?php 
	require('./admin-dashboard/inc/functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<title>EasySchool login</title>
	<link href="css/app.css" rel="stylesheet">
	<link rel="stylesheet" href="./css/form.css">
</head>

<body>
	<div class="col-12 col-xl-6">
		<div class="card">
			<div class="card-header">
				<h1 class="card-title">EasySchool</h1>
			</div>
			<div class="card-body">
				<form class="form" action="./admin-dashboard/helpers/register.auth.php" method="POST">
					<div class="mb-3">
						<label class="form-label mt-4">Full Names</label>
						<input type="text" name="name" class="form-control mt-4" value="<?= isset($_GET['name']) ? $_GET['name'] : '' ?>" placeholder="Enter name">
					</div>
					<?php if (isset($_GET['error']) && $_GET['error'] = 'name_error') { ?>
						<div class="alert alert-danger">Name not set</div>

					<?php } ?>

					<div class="mb-3">
						<label class="form-label mt-4">Email address</label>
						<input type="email" name="email" class="form-control mt-4" value="<?= isset($_GET['email']) ? $_GET['email'] : '' ?>" placeholder="Enter Email" >
					</div>
					<?php if (isset($_GET['error']) && $_GET['error'] = 'email_error') { ?>
						<div class="alert alert-danger">Email not set</div>

					<?php } ?>
					<div class="mb-3">
						<label class="form-label mt-4">Password</label>
						<input type="password" name="password" class="form-control mt-4" placeholder="Password">
					</div>
					<?php if (isset($_GET['error']) && $_GET['error'] = 'password_error') { ?>
						<div class="alert alert-danger">Pasword not set</div>

					<?php } ?>
					<div class="col-sm-10">
						<label class="form-check mt-4">
							<input type="checkbox" name="accept" class="form-check-input">
							<span class="form-check-label">Accept terms and conditions</span>
						</label>
					</div>
					<input type="submit" class="btn btn-primary mt-4" value="Register">
					<a href="./login.php" class="text-danger mt-4">Already have an acount sign in here</a>
				</form>
			</div>
		</div>
	</div>
</body>

</html>