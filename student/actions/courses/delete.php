<?php
    ob_flush();
    require('../../inc/db.config.php');	

    $id = $_GET['id'];

    $sql = "UPDATE courses SET is_visible =0 WHERE id=$id";


    if(mysqli_query($conn, $sql)){
        header("location: ./courses.php");
    }
