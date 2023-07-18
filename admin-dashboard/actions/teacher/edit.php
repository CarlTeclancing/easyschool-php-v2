<?php
ob_start();
require('../../header.php');
require('../../inc/db.config.php');

$id = $_GET['id'];

$sql = "SELECT * FROM teachers WHERE id= $id"; 
$result = mysqli_query($conn, $sql);




if(isset($_POST['submit'])){
        // Get the data from the form
        $name = $_POST['name'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $class = $_POST['class'];
        $role_id = 2;

        $hash_pass = password_hash($password, PASSWORD_DEFAULT);
        // Update the entry in the database
        
        $sql = "UPDATE teachers SET `name`=?, `email`=?, `role_id`=?, `class_id`=?, `password`=? WHERE id =?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssiisi", $name, $email, $role_id, $class, $hash_pass, $id);
        mysqli_stmt_execute($stmt);
    
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Update successful
            echo "Updated successful!";
        } else {
            // Update failed
            echo "Action failed!";
        }
    
       
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <?php foreach ($result as $row) : ?>
                    <div class="form-elements">
                        <label for="name" class="form-label mt-5">Student Name</label><br />
                        <input type="text" name="name" class="form-control" id="" value="<?=$row['name']?>">
                    </div>
                    <div class="form-elements">
                        <label for="class" class="form-label mt-display 5">Chose Class</label>
                        <select name="class" id="">
                            
                            <?php 
                                $class = $row['class_id'];
                                $query = "SELECT * FROM classes"; 
                                $result = mysqli_query($conn, $query);
                            ?>
                            <?php if (mysqli_num_rows($result) > 0) : ?>

                                <?php foreach ($result as $data) : ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                                <?php endforeach ?>

                            <?php endif ?>

                        </select>
                    </div>

                    <div class="form-elements">
                        <label for="email" class="form-label mt-5">Student Email</label><br />
                        <input type="email" name="email" class="form-control" value="<?=$row['email']?>" id="">
                    </div>

                    <div class="form-elements">
                        <label for="password" class="form-label mt-5">Student password</label><br />
                        <input type="password" name="password" class="form-control" id="">
                    </div>

                    <input type="submit" name="submit" value="Update Teacher Details" class="btn btn-primary mt-5">
                    <?php endforeach ?>
                </form>
            </div>
        </div>
    </div>
</main>

<?php

require('../../footer.php');

?>