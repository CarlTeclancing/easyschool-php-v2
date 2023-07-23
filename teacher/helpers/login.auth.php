<?php
// session_start();
session_start();
//connectiong to the database

require('../inc/db.config.php');
require('../inc/functions.php');
require('../../path.php');
//require('../inc/dir.php');


if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $email = $_POST['email'];
        $password = $_POST['password'];
    
        verify_input($email, 'email_error');
    
        verify_input($password, 'password_error');

        $sql = ("SELECT * FROM teachers");
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            //looping through the data 
            while($row = $result->fetch_assoc()) {
                if((password_verify($password, $row['password']))&& ($email == $row['email'])) {
                    // Passwords match, login successful

                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['username'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['role_id'] = $row['role_id'];
    
                    
                    
                    $query = http_build_query(['succes' => 'loginsucces']);
                    header('Location:'. TEACHERURL.'?' .$query);
                  }else{
                    $query = http_build_query(['error' => 'loginerror']);
                     header('Location:' .BASEURL .'/login.php?' . $query);
                  }


                  }
                // echo "<pre>";

                // print_r($row);

                // echo "<pre>";           
  }

        
    }


// $conn->close();

