<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		header('Location: ../login.php');
		exit;
	}
	require(__DIR__ . '/../path.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords"
		content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>EasySchool</title>

	<link href="<?=ADMINURL."/css/app.css" ?>" rel="stylesheet">
	
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="<?=ADMINURL?>">
					<span class="align-middle">EasySchool</span>
				</a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
	
					</li>

					<li class="sidebar-item active">
						<a class="sidebar-link" href="<?=ADMINURL?>">
							<i class="align-middle" data-feather="sliders"></i> <span
								class="align-middle">Dashboard</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a data-target="#ui" data-toggle="collapse" class="sidebar-link collapsed"
							href="#">
							<i class="bi bi-journal-medical"></i> <span class="align-middle">Classes</span>
						</a>
						<ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="<?=ADMINURL. "./actions/classes/add_class.php"?>">Add Class</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="<?=ADMINURL. "./actions/classes/class.php"?>">All Classes</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-target="#courses" data-toggle="collapse" class="sidebar-link collapsed"
							href="#">
							<i class="bi bi-mortarboard"></i> <span class="align-middle">Courses</span>
						</a>
						<ul id="courses" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="<?= ADMINURL. "/actions/courses/add_courses.php"?>">Add Course</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="<?= ADMINURL. "/actions/courses/courses.php"?>">All Courses</a></li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-target="#teachers" data-toggle="collapse" class="sidebar-link collapsed"
							href="#">
							<i class="bi bi-people-fill"></i> <span class="align-middle">Teachers</span>
						</a>
						<ul id="teachers" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="<?= ADMINURL. "/actions/teacher/add_teacher.php"?>">Add Teacher</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="<?= ADMINURL. "/actions/teacher/teachers.php"?>">All Teachers</a>
							</li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-target="#student" data-toggle="collapse" class="sidebar-link collapsed"
							href="#">
							<i class="bi bi-people"></i> <span class="align-middle">Students</span>
						</a>
						<ul id="student" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="<?= ADMINURL. "/actions/student/add_student.php"?>">Add Student</a></li>
							<li class="sidebar-item"><a class="sidebar-link" href="<?= ADMINURL. "/actions/student/student.php"?>">All Students</a>
							</li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-target="#acount" data-toggle="collapse" class="sidebar-link collapsed"
							href="#">
							<i class="bi bi-person-check"></i> <span class="align-middle">User Account</span>
						</a>
						<ul id="acount" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="<?= ADMINURL. "/actions/users/add_user.php"?>">Add User Account</a>
							</li>
							<li class="sidebar-item"><a class="sidebar-link" href="<?= ADMINURL. "/actions/users/allusers.php"?>">All User Account</a>
							</li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-target="#complain" data-toggle="collapse" class="sidebar-link collapsed"
							href="#">
							<i class="bi bi-card-heading"></i> <span class="align-middle">Complains</span>
						</a>
						<ul id="complain" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="<?=ADMINURL . '/actions/complain/allcomplains.php'?>">All Complains</a>
							</li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-target="#attendance" data-toggle="collapse" class="sidebar-link collapsed"
							href="#">
							<i class="bi bi-file-ppt-fill"></i></i> <span class="align-middle">Attendance</span>
						</a>
						<ul id="attendance" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="<?= ADMINURL. "/actions/attendance/allclasses.php"?>">All Attendance</a>
							</li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a data-target="#live" data-toggle="collapse" class="sidebar-link collapsed"
							href="#">
							<i class="bi bi-tv"></i> <span class="align-middle">Live Class</span>
						</a>
						<ul id="live" class="sidebar-dropdown list-unstyled collapse " data-parent="#sidebar">
							<li class="sidebar-item"><a class="sidebar-link" href="<?=ADMINURL . '/actions/liveclass/addliveclass.php'?>">Add Live Class</a>
							</li>
							<li class="sidebar-item"><a class="sidebar-link" href="<?=ADMINURL . '/actions/liveclass/liveclasses.php'?>">All Live Class</a>
							</li>
						</ul>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link" href="">
							<i class="align-middle" data-feather="settings"></i> <span
								class="align-middle">Settings</span>
						</a>
					</li>

				</ul>
			</div>
		</nav>

        
		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle d-flex">
					<i class="hamburger align-self-center"></i>
				</a>

				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search…" aria-label="Search">
						<button class="btn" type="button">
							<i class="align-middle" data-feather="search"></i>
						</button>
					</div>
				</form>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0"
								aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the
													update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate
													hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.
												</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0"
								aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg"
													class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu
													tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg"
													class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod
													vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg"
													class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.
												</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg"
													class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 pl-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed,
													posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
								data-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#"
								data-toggle="dropdown">
								<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded mr-1"
									alt="Charles Hall" /> <span class="text-dark"><?= $_SESSION['name']?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="#"><i class="align-middle mr-1"
										data-feather="user"></i> Profile</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="./helpers/logout.php">Log out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>