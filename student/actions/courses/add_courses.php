<?php
ob_flush();
require('../../header.php');
require('../../inc/db.config.php');




$query = "SELECT * FROM classes";

$result = mysqli_query($conn, $query);
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
                                <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                            <?php endforeach ?>

                        <?php endif ?>

                    </select>

                    <div class="form-elements">
                        <label for="name" class="form-label mt-5">Course Name</label><br />
                        <input type="text" name="name" class="form-control" id="">
                    </div>

                    <div class="form-elements">
                        <label for="name" class="form-label mt-5">Course Description</label><br />
                        <textarea name="desc" id="" class="form-control" rows="4"></textarea>
                    </div>

                    <input type="submit" value="Create Course" class="btn btn-primary mt-5">
                </form>
            </div>
        </div>
    </div>
</main>
<?php
echo '<main class="content">';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    if (!empty($_POST['name']) && !empty($_POST['desc']) && !empty($_POST['class'])) {

        $query = 'INSERT INTO courses (`class_id`, `name`, `desc`) VALUES(?,?,?);';
        $stmt = $conn->prepare($query);
        $stmt->bind_param('iss', $_POST['class'], $_POST['name'], $_POST['desc']);
        $execute = $stmt->execute();

        if ($execute) {
            $_SESSION['course_created'] = "Course Has Been Created";
        }
    }
    // echo '<main class="content">';
    // echo $name . $class_description;
    // echo '</main>';



}
echo '</main>';

?>



<?php

require('../../footer.php');

?>