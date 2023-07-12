<?php
ob_start();
require('../../header.php');
require('../../inc/db.config.php');

$id = $_GET['id'];

$sql = "SELECT * FROM courses WHERE id = $id";

$result = mysqli_query($conn, $sql);

if(isset($_POST['submit'])){
        // Get the data from the form
        $class = $_POST['class'];
        $name = $_POST['name'];
        $desc = $_POST['desc'];
    
        // Update the entry in the database
        $sql = "UPDATE courses SET `class_id`=?, `name`=?, `desc`=? WHERE id=?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "issi", $_POST['class'], $_POST['name'], $_POST['desc'], $_GET['id']);
        mysqli_stmt_execute($stmt);
    
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            // Update successful
            echo "Update successful!";
        } else {
            // Update failed
            echo "Update failed!";
        }
    
       
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <label for="class" class="form-label mt-5">Chose Class</label>
                    <select name="class" id="">
                        <?php if (mysqli_num_rows($result) > 0) : ?>

                            <?php foreach ($result as $data) : ?>
                                <?php 
                                    $id = $data['class_id'];
                                    $sql = "SELECT * FROM classes WHERE id = $id";
                                    $result = mysqli_query($conn, $sql);

                                
                                ?>
                                <?php foreach ($result as $row) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php endforeach ?>

                            <?php endforeach ?>

                        <?php endif ?>

                    </select>

                    <div class="form-elements">
                        <label for="name" class="form-label mt-5">Course Name</label><br />
                        <input type="text" name="name" class="form-control" id="" value="<?=$data['name']?>">
                    </div>

                    <div class="form-elements">
                        <label for="name" class="form-label mt-5">Course Description</label><br />
                        <textarea name="desc" id="" class="form-control" rows="4"><?=$data['desc']?></textarea>
                    </div>

                    <input type="submit" name="submit" value="Update Course" class="btn btn-primary mt-5">
                </form>
            </div>
        </div>
    </div>
</main>

<?php

require('../../footer.php');

?>