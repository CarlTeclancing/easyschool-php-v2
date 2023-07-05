<?php

session_start();

$_SESSION['name'] = '';
$_SESSION['email'] = '';
$_SESSION['id'] = '';
$_SESSION['role_id'] = '';

session_destroy();

header('location:  http://localhost/easyschool/login.php');