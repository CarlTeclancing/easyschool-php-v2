<?php


error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_start();
require('../../header.php');
require('../../inc/db.config.php');


// $id = $_SESSION['id'];
// $sql = "SELECT * FROM admins WHERE id = $id";
// $result = mysqli_query($conn, $sql);

// foreach($result as $admin){
//     $user_role = $admin['$role_id'];
// }

// $role_id= $_SESSION['role_id']; 

// echo $id;
// echo $user_role;
// exit(0);


if(isset($_POST['submit'])){
        // Get the data from the form
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $url = $_POST['url'];
        $class_method = $_POST['class_method'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $class_id = $_POST['class'];

        $id = $_POST['teacher_id'];
        $role_id= $_SESSION['role_id'];
        

        // $sql = "SELECT * FROM admins WHERE id = $id";
        // $result = mysqli_query($conn, $sql);

        // foreach($result as $admin){
        //     $user_role = $admin['$role_id'];
        // }

        // echo $id;
        // echo $user_role;
        // exit(0);

        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        // exit(0);
        
        //Update the entry in the database

           
            // $stmt = $conn->prepare("INSERT INTO live_classes (`title`, `desc`, `url`, live_class_method_id, start_time, end_time, class_id, creator_id, role_id) VALUES (?,?,?,?,?,?,?,?,?)");
            // // $stmt->bind_param("sssissiii", $title, $desc, $url, $class_method, $start_time, $end_time, $class_id, $id, $role_id);

            // $stmt->bind_param("sssissiii", $_POST['title'], $_POST['desc'], $_POST['url'], $_POST['class_method'],  $_POST['start_time'], $_POST['end_time'], $_POST['class'], $id, $role_id);

            // $stmt->execute();


            $stmt = $conn->prepare("INSERT INTO live_classes (`title`, `desc`, `url`, `live_class_method_id`, `start_time`, `end_time`, `class_id`, `creator_id`, `role_id`) VALUES (?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param("sssissiii", $_POST['title'], $_POST['desc'], $_POST['url'], $_POST['class_method'], $_POST['start_time'], $_POST['end_time'], $_POST['class'], $_POST['teacher_id'], $_SESSION['role_id']);
            


    
        
            if ($stmt->execute()) {
                var_dump($stmt->error);
                // Update successful
                echo "created successful!";
            } else {
                var_dump($stmt->error);
                // Update failed
                echo "Action failed! succesfully";
            }
        
       
}
?>

<main class="content">
    <div class="container-fluid p-0">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <div class="form-elements">
                        <label for="text" class="form-label mt-5">Class Title</label><br />
                        <input type="text" name="title" class="form-control" id="">
                    </div>

                    <div class="form-elements">
                        <label for="desc" class="form-label mt-5">Live Class Description</label><br />
                        <textarea name="desc" class="form-control" rows="4"></textarea>
                    </div>


                    <div class="form-elements">
                        <label for="url" class="form-label mt-5">Class URL</label><br />
                        <input type="text" name="url" class="form-control" id="">
                    </div>


                    <div class="form-elements">
                        <label for="class_method" class="form-label mt-5">Chose Class Method</label>
                        <select name="class_method" id="">

                            <?php $query = "SELECT * FROM live_class_methods"; 
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
                        <label for="start_time" class="form-label mt-5">Start Time</label><br />
                        <input name="start_time" type="time" class="form-control" style="width: 200px;">
                    </div>

                    <div class="form-elements">
                        <label for="end_time" class="form-label mt-5">End Time</label><br />
                        <input name="end_time" type="time" class="form-control" style="width: 200px;">
                    </div>

                    <div class="form-elements">
                        <label for="class" class="form-label mt-5">Chose Class</label>
                        <select name="class" id="">

                            <?php $query = "SELECT * FROM classes"; 
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
                        <label for="class" class="form-label mt-5">Chose Teacher</label>
                        <select name="teacher_id" id="">

                            <?php $query = "SELECT * FROM teachers"; 
                                $result = mysqli_query($conn, $query);
                            ?>
                            <?php if (mysqli_num_rows($result) > 0) : ?>

                                <?php foreach ($result as $data) : ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                                <?php endforeach ?>

                            <?php endif ?>

                        </select>
                    </div>

                    <input type="submit" name="submit" value="Create Live Class" class="btn btn-primary mt-5">
                </form>
            </div>
        </div>
    </div>
</main>

<?php

require('../../footer.php');

?>