<?php

require_once __DIR__ . "/../inc/db.config.php";
require( __DIR__ . '/../inc/functions.php');

//checking and getting data from the form

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    if(empty($name)){
        $query = http_build_query(['error'=> 'name_error']);
        header('Location: http://localhost/easyschool/register.php'. '?' . $query);
        exit(0);
    }

    if(empty($email) && !empty($name)){
        $query = http_build_query(['error'=> 'email_error', 'name' => $name]);
        header('Location: http://localhost/easyschool/register.php'. '?' . $query);
        exit(0);
    }

    if(empty($email)){
        $query = http_build_query(['error'=> 'email_error']);
        header('Location: http://localhost/easyschool/register.php'. '?' . $query);
        exit(0);
    }

    if(empty($name) && !empty($email)){
        $query = http_build_query(['error'=> 'email_error', 'email' => $email]);
        header('Location: http://localhost/easyschool/register.php'. '?' . $query);
        exit(0);
    }

    if(empty($password))
    {
        $query = http_build_query(['error'=> 'password_error']);
        header('Location: http://localhost/easyschool/register.php'. '?' . $query);
        exit(0);
    }


    if ((isset($_POST['name'], $_POST['email'], $_POST['password']))) {

        $user_role = 1;

        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO admins (name, email, password, role_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $email, $hashed_password, $user_role);
        

        if ($stmt->execute()) {

            $query = http_build_query(['succes' => 'Acount_succesfully_created']);

            header('location: http://localhost/easyschool/login.php?' . $query);
            exit(0);
        }

        $stmt->close();
    }
} else {

    header('location: http://localhost/easyschool/register.php?' . $query);
}
