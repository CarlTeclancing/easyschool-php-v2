<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . "/../inc/db.config.php";
require( __DIR__ . '/../inc/functions.php');

//checking and getting data from the form

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $class_id = $_POST['class'];


    if(empty($name)){
        $query = http_build_query(['error'=> 'name_error']);
        header('Location: http://localhost/easyschool/new.php'. '?' . $query);
        exit(0);
    }

    if(empty($email) && !empty($name)){
        $query = http_build_query(['error'=> 'email_error', 'name' => $name]);
        header('Location: http://localhost/easyschool/new.php'. '?' . $query);
        exit(0);
    }

    if(empty($email)){
        $query = http_build_query(['error'=> 'email_error']);
        header('Location: http://localhost/easyschool/new.php'. '?' . $query);
        exit(0);
    }

    if(empty($name) && !empty($email)){
        $query = http_build_query(['error'=> 'email_error', 'email' => $email]);
        header('Location: http://localhost/easyschool/new.php'. '?' . $query);
        exit(0);
    }

    if(empty($password))
    {
        $query = http_build_query(['error'=> 'password_error']);
        header('Location: http://localhost/easyschool/new.php'. '?' . $query);
        exit(0);
    }


    if ((isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['class']))) {

        $user_role = 3;

        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO students (`name`, `email`,`role_id`, `class_id`, `password`) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiis", $name, $email, $user_role, $class_id, $hashed_password);
        

        if ($stmt->execute()) {

            $query = http_build_query(['succes' => 'Acount_succesfully_created']);

            header('location: http://localhost/easyschool/student.php?' . $query);
            exit(0);
        }

        $stmt->close();
    }
} else {

    header('location: http://localhost/easyschool/register.php?' . $query);
}
